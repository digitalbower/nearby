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

class BookingConfirmationEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
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
        $pdf = Pdf::loadView('user.pdf.booking_confirmation_attachment', [
            'name' => $this->name,
            // 'booking_id ' => $this->booking_id ,
            // 'orderDate' => $this->created_date,
            // 'items' => $this->items,
        ]);
    
        $pdfPath = storage_path("app/public/attachments/booking_attachment.pdf"); // Add booking_id with pdf name
        $pdf->save($pdfPath);
    
        return [
            Attachment::fromPath($pdfPath)
                ->as('BookingConfirmation.pdf')
                ->withMime('application/pdf'),
        ];
    }
}
