<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class BookingConfirmationEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $name;
    public $variants;
    public function __construct($name,$variants)
    {
        $this->name = $name;
        $this->variants =$variants;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Booking Confirmation Email',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'user.emails.booking_confirmation_email', 
            with: [
                'name' => $this->name,
                'variants' => $this->variants,
                'isPdf' => true 
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        $attachments = [];
        $dir = storage_path('app/public/attachments');
    
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
    
        foreach ($this->variants as $variant) {
            try {
                $fileName = 'booking_' . $variant['id']  . '.pdf';
                $pdfPath = $dir . '/' . $fileName;
    
                $pdf = Pdf::loadView('user.pdf.booking_confirmation_attachment', [
                    'name' => $this->name,
                    'variant' => $variant,
                ]);
               
                try {
                    $pdf->save($pdfPath);
                } catch (\Exception $e) {
                    Log::error('PDF Save Failed:', $e->getMessage());
                }
                
                $attachments[] = Attachment::fromPath($pdfPath)
                    ->as($fileName)
                    ->withMime('application/pdf');
            } catch (\Exception $e) {
                Log::error("PDF generation failed for variant ID {$variant['id']}: " . $e->getMessage());
            }
        }
    
        return $attachments;
    }
}
