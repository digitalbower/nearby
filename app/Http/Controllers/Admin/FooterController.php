<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FooterNavigationLink;
use App\Models\SocialMediaLink;
use App\Models\ContactInformation;
use App\Models\NewsletterSubscriber;
use App\Models\LegalDisclaimer;
use App\Models\QuickLink;
use App\Models\PaymentMethod;

class FooterController extends Controller
{
    public function index()
    { 
        return view('admin.footer.index', [
            'navigation' => FooterNavigationLink::first(),
            'social' => SocialMediaLink::first(),
            'contact' => ContactInformation::first(),
            'newsletter' => NewsletterSubscriber::first(),
            'legal' => LegalDisclaimer::first(),
            'quick' => QuickLink::first(),
            'payment' => PaymentMethod::first(),
        ]);
    }

    public function updateNavigation(Request $request)
    {
        FooterNavigationLink::updateOrCreate([], $request->only('label', 'link'));
        return back()->with('success', 'Navigation link updated successfully.');
    }

    public function updateSocial(Request $request)
    {
        SocialMediaLink::updateOrCreate([], $request->only('platform', 'url'));
        return back()->with('success', 'Social media link updated successfully.');
    }

    public function updateContact(Request $request)
    {
        ContactInformation::updateOrCreate([], $request->only('address', 'email', 'phone'));
        return back()->with('success', 'Contact information updated successfully.');
    }

    public function updateNewsletter(Request $request)
    {
        
        $request->validate([
            'email' => 'required|email',
            
        ]);
    
        NewsletterSubscriber::updateOrCreate(
            ['email' => $request->input('email')], // Ensure an email is always present
            
        );
    }

    public function updateLegal(Request $request)
    {
        LegalDisclaimer::updateOrCreate([], ['title' => $request->input('title')]);
        return back()->with('success', 'Legal disclaimer updated successfully.');
    }

    public function updateQuick(Request $request)
    {
        QuickLink::updateOrCreate([], $request->only('title', 'link'));
        return back()->with('success', 'Quick link updated successfully.');
    }

    public function updatePayment(Request $request)
    {
        if ($request->hasFile('payment_logo')) {
            $path = $request->file('payment_logo')->store('payment_methods', 'public');
            PaymentMethod::updateOrCreate([], ['logo' => $path]);
        }
        return back()->with('success', 'Payment method updated successfully.');
    }
  
}
