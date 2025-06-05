@extends('user.layouts.main')
@push('styles')
<style>
 
  body {
    font-family: "Poppins", sans-serif;
    font-weight: 400;
  }
    </style>
@endpush
@push('scripts')
<script>
  tailwind.config = {
    darkMode: "class",
    theme: {
      extend: {
        colors: {
          primary: {
            50: "#f0f9ff",
            100: "#e0f2fe",
            200: "#bae6fd",
            300: "#7dd3fc",
            400: "#38bdf8",
            500: "#0ea5e9",
            600: "#0284c7",
            700: "#0369a1",
            800: "#075985",
            900: "#0c4a6e",
            950: "#0b2e4f",
          },
          background: "#ffffff",
          foreground: "#000000",
          muted: "#f3f4f6",
          "muted-foreground": "#6b7280",
          accent: "#fbbf24",
          "accent-foreground": "#000000",
        },
      },
      fontFamily: {
        body: ["Poppins", "sans-serif"] /* Set Poppins as the body font */,
        sans: [
          "Arial",
          "ui-sans-serif",
          "system-ui",
          "-apple-system",
          "system-ui",
          "Segoe UI",
          "Roboto",
          "Helvetica Neue",
          "Arial",
          "Noto Sans",
          "sans-serif",
          "Apple Color Emoji",
          "Segoe UI Emoji",
          "Segoe UI Symbol",
          "Noto Color Emoji",
        ],
      },
    },
  };
</script>
@endpush
@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-4">TERMS AND CONDITIONS</h1>
        <hr class="my-6 border-gray-300">
        <section class="mb-6">
            <h2 class="text-2xl font-semibold mb-2">Information</h2><br>
            <p><strong>Effective Date: </strong>June 4, 2025</p>
            <p><strong>Last Updated:</strong> June 4, 2025</p>
            <p><strong>Version: 1.0</strong></p><br>
            <p><strong>Company Details:</strong></p><br>
            <ul class="list-disc pl-6 space-y-1">
                <li><strong>Name:</strong> AJL Gulf Group LLC</li>
                <li><strong>Registration:</strong> Sharjah, SHAMS Free Zone, United Arab Emirates</li>
                <li><strong>Website:</strong>https://www.nearbyvouchers.com</li>
                <li><strong>Contact Email:</strong>privacy@nearbyvouchers.com</li>
            </ul><br>
        </section>
        <hr class="my-6 border-gray-300">
        <section class="mb-6">
            <h2 class="text-2xl font-semibold mb-2">1. Company Overview and Services</h2><br>
            <h3 class="text-xl font-semibold mt-4">1.1 About AJL Gulf Group LLC</h3><br>
            <p>We are AJL Gulf Group LLC, a company registered in Sharjah SHAMS Free Zone, UAE, operating the Nearby Vouchers digital marketplace platform through our website and mobile application.</p><br>
            <h3 class="text-xl font-semibold mt-4">1.2 Platform Services</h3><br>
            <p>Our platform operates as a digital marketplace offering vouchers for services across multiple categories:</p><br>
            <p><strong>Service Categories:</strong></p><br>
            <ul class="list-disc pl-6 space-y-1">
                <li><strong>Beauty & Wellness:</strong> Hair salons, nail services, massages, spa treatments</li>
                <li><strong>Food & Beverage:</strong> Restaurants, cafes, catering services</li>
                <li><strong>Entertainment:</strong> Attractions, tours, activities, recreational services</li>
                <li><strong>Professional Services:</strong> Photography, consultations, specialized services</li>
                <li><strong>Health & Fitness:</strong> Gyms, fitness classes, medical services, therapy</li>
                <li><strong>Automotive:</strong> Car services, repairs, maintenance</li>
                <li><strong>Retail:</strong> dress, stationary, bakery</li>
                <li><strong>Home Services:</strong> Cleaning, repairs, maintenance services</li>
                <li><strong>Travel & Hospitality:</strong> Hotels, tours, transportation services</li>
            </ul><br>
            <h3 class="text-xl font-semibold mt-4">1.3 Platform Role and Limitations</h3></br>
            <p><strong>Important Notice - Intermediary Status:</strong></p><br>
            <ul class="list-disc pl-6 space-y-1">
                <li>We function exclusively as an intermediary platform</li>
                <li>We do NOT provide any services directly</li>
                <li>All services are provided by independent third-party businesses</li>
                <li>We facilitate connections between customers and service providers</li>
            </ul><br>
            <p><strong>Service Delivery Limitations:</strong></p><br>
            <ul class="list-disc pl-6 space-y-1">
                <li>No delivery services are provided through our platform</li>
                <li>All voucher redemptions require physical presence at service provider locations</li>
                <li>Remote redemption or home delivery services are not available</li>
            </ul><br>
        </section>
        <hr class="my-6 border-gray-300">
        <section class="mb-6">
            <h2 class="text-2xl font-semibold mb-2">2. Agreement to Terms</h2><br>
            <h3 class="text-xl font-semibold mt-4">2.1 Acceptance of Terms</h3><br>
            <p>By accessing our website, creating an account, or purchasing vouchers, you acknowledge that you have read, understood, and agree to be legally bound by these Terms and Conditions.</p><br>
            <h3 class="text-xl font-semibold mt-4">2.2 Eligibility Requirements</h3><br>
            <p><strong>User Qualifications:</strong></p><br>
            <ul class="list-disc pl-6 space-y-1">
                <li>Must be at least 18 years of age</li>
                <li>Must have legal capacity to enter into binding contracts</li>
                <li>Business purchasers must have appropriate authorization</li>
                <li>Services primarily available in UAE, accessible globally</li>
            </ul><br>
            <h3 class="text-xl font-semibold mt-4"> 2.3 Terms Modification</h3><br>
            <p><strong>Amendment Process:</strong></p><br>
            <ul class="list-disc pl-6 space-y-1">
                <li>Terms may be updated periodically</li>
                <li>Changes will be posted on our website with effective dates</li>
                <li>Significant changes will be communicated via email</li>
                <li>Continued use after modifications constitutes acceptance</li>
            </ul><br>   
        </section>
        <hr class="my-6 border-gray-300">
        <section class="mb-6">
            <h2 class="text-2xl font-semibold mb-2">3. User Accounts</h2><br>
            <h3 class="text-xl font-semibold mt-4">3.1 Account Registration</h3><br>
            <p><strong>Required Information:</strong></p><br>
            <ul class="list-disc pl-6 space-y-1">
                <li>Complete legal name and contact details</li>
                <li>Valid email address and phone number</li>
                <li>Secure password creation</li>
                <li>Payment method verification</li>
            </ul><br>
            <h3 class="text-xl font-semibold mt-4">3.2 Account Security Responsibilities</h3><br>
            <p><strong>User Obligations:</strong></p><br>
            <ul class="list-disc pl-6 space-y-1">
                <li>Maintain confidentiality of login credentials</li>
                <li>Prohibit account sharing with third parties</li>
                <li>Report unauthorized access immediately</li>
                <li>Keep account information current and accurate</li>
                <li>Implement strong password security measures</li>
            </ul><br>
            <p><strong>Company Security Measures:</strong></p><br>
            <ul class="list-disc pl-6 space-y-1">
                <li>Advanced security protocols for data protection</li>
                <li>Account compromise assistance and recovery</li>
                <li>Identity verification procedures when necessary</li>
                <li>Regular security monitoring and updates</li>
            </ul><br>
            <h3 class="text-xl font-semibold mt-4">3.3 Account Suspension and Termination</h3><br>
            <p><strong>Grounds for Account Action:</strong></p><br>
            <ul class="list-disc pl-6 space-y-1">
                <li>Violation of Terms and Conditions</li>
                <li>Fraudulent or suspicious activities</li>
                <li>Unreasonable payment disputes</li>
                <li>Inappropriate conduct toward businesses or staff</li>
                <li>Misuse of platform services</li>
            </ul><br>
        </section>
        <hr class="my-6 border-gray-300">
        <section class="mb-6">
            <h2 class="text-2xl font-semibold mb-2">4. Purchasing Vouchers</h2><br>
            <h3 class="text-xl font-semibold mt-4">4.1 Pricing Structure</h3><br>
            <p><strong>Included in Platform Price:</strong></p><br>
            <ul class="list-disc pl-6 space-y-1">
                <li>Base service cost</li>
                <li>Value Added Tax (VAT)</li>
                <li>Platform processing fees</li>
            </ul><br>
            <p><strong> Additional Costs (Not Included):</strong></p><br>
            <ul class="list-disc pl-6 space-y-1">
                <li>Gratuities and tips</li>
                <li>Parking fees</li>
                <li>Service upgrades or add-ons</li>
                <li>Additional services beyond voucher scope</li>
                <li>Municipality taxes, tourism taxes, or other local taxes (excluding VAT)</li>
            </ul><br>
            <h3 class="text-xl font-semibold mt-4">4.2 Payment Processing</h3><br>
            <p><strong> Payment Requirements:</strong></p><br>
            <ul class="list-disc pl-6 space-y-1">
                <li>Full payment required before voucher issuance</li>
                <li>Accepted methods: Major credit/debit cards and approved payment systems</li>
                <li>Secure payment processing with encryption</li>
                <li>Transaction completion necessary for voucher generation</li>
            </ul><br>
            <h3 class="text-xl font-semibold mt-4">4.3 Transaction Documentation</h3><br>
            <ul class="list-disc pl-6 space-y-1">
                <li>Electronic receipts provided immediately</li>
                <li>VAT invoices available for business purchases</li>
                <li>Receipt retention recommended for dispute resolution</li>
                <li>Failed payment results in automatic cancellation</li>
            </ul><br>
        </section>
        <hr class="my-6 border-gray-300">
        <section class="mb-6">
            <h2 class="text-2xl font-semibold mb-2">5. Voucher Usage and Redemption</h2><br>
            <h3 class="text-xl font-semibold mt-4">5.1 Voucher Components</h3><br>
            <p><strong>Essential Information Included:</strong></p>
            <ul class="list-disc pl-6 space-y-1">
                <li>Detailed service description</li>
                <li>Business name and physical location</li>
                <li>Voucher monetary value</li>
                <li>Expiry date (non-extendable)</li>
                <li>Specific terms and conditions</li>
                <li>One-Time Password (OTP) verification code</li>
            </ul><br>
            <h3 class="text-xl font-semibold mt-4">5.2 Redemption Process</h3><br>
            <p><strong>Step 1: Appointment Booking</strong></p>
            <ul class="list-disc pl-6 space-y-1">
                <li>Contact business directly for scheduling</li>
                <li>Present voucher details during booking</li>
                <li>Ensure booking occurs before expiry date</li>
            </ul><br>
            <p><strong>Step 2: Service Appointment</strong></p>
            <ul class="list-disc pl-6 space-y-1">
                <li>Arrive punctually for scheduled appointment</li>
                <li>Present voucher (digital or printed format)</li>
                <li>Bring valid identification</li>
             </ul><br>
            <p><strong>Step 3: Service Redemption</strong></p>
            <ul class="list-disc pl-6 space-y-1"> 
                <li>Present voucher to service provider staff</li>
                <li><strong>CRITICAL SECURITY PROTOCOL: Share OTP code only when physically present at business location</strong></li>
                <li><strong>PROHIBITED: Sharing OTP via phone, WhatsApp, email, or any remote communication</strong></li>
                <li><strong>TIMING: Share OTP only during actual service delivery</strong></li>
                <li><strong>LIABILITY: No responsibility for service denial due to remote OTP sharing</strong></li>
            </ul><br>
            <h3 class="text-xl font-semibold mt-4">5.3 Voucher Usage Restrictions</h3><br>
            <p><strong>Single-Use Policy:</strong></p><br>
            <ul class="list-disc pl-6 space-y-1"> 
                <li>Each voucher valid for one-time use only</li>
                <li>No partial value retention after use</li>
                <li>Group vouchers require simultaneous redemption</li>
                <li>No splitting of group voucher benefits</li>
            </ul><br>
            <p><strong>Financial Limitations:</strong></p><br>
            <ul class="list-disc pl-6 space-y-1"> 
                <li>No cash exchange or refund value</li>
                <li>No change provided for unused portions</li>
                <li>Limited to specified service only</li>
                <li>Generally cannot combine with other offers</li>
            </ul><br>        
            <p><strong>Expiry Enforcement:</strong></p><br>
            <ul class="list-disc pl-6 space-y-1"> 
                <li>Strict expiry date adherence</li>
                <li>No extensions available from any party</li>
                <li>Expired vouchers become completely invalid</li>
                <li>No refunds for expired vouchers</li>
            </ul><br>
            <h3 class="text-xl font-semibold mt-4">5.4 Appointment Management</h3><br>
             <ul class="list-disc pl-6 space-y-1"> 
                <li>Direct booking with businesses required</li>
                <li>Business controls scheduling and availability</li>
                <li>Peak time availability may be limited</li>
                <li>Early booking recommended after purchase</li>
            </ul><br>
        </section>
        <hr class="my-6 border-gray-300">
        <section class="mb-6">
            <h2 class="text-2xl font-semibold mb-2">6. Company Responsibilities</h2><br>
            <h3 class="text-xl font-semibold mt-4">6.1 Platform Operations</h3><br>
            <p><strong>Technical Responsibilities:</strong></p><br>
            <ul class="list-disc pl-6 space-y-1"> 
                <li>Maintain website functionality and availability</li>
                <li>Secure payment processing systems</li>
                <li>Electronic voucher delivery post-purchase</li>
                <li>Customer support for platform-related issues</li>
                <li>Accurate pricing information maintenance</li>
            </ul><br>
            <p><strong>Information Services:</strong></p><br>
            <ul class="list-disc pl-6 space-y-1"> 
                <li>Basic business information provision (name, location, contact)</li>
                <li>Service descriptions as provided by businesses</li>
                <li>Current pricing and availability display</li>
                <li>Business photos and essential details</li>
            </ul><br>
            <p><strong>Voucher Management:</strong></p><br>
            <ul class="list-disc pl-6 space-y-1"> 
                <li>Immediate post-purchase voucher delivery</li>
                <li>Complete voucher information inclusion</li>
                <li>Technical support for voucher access issues</li>
            </ul><br>   
            <h3 class="text-xl font-semibold mt-4">6.2 Information Accuracy Disclaimer</h3><br>
            <p><strong>Template Information Notice:</strong></p><br>
            <ul class="list-disc pl-6 space-y-1"> 
                <li>Business information provided in standardized template format</li>
                <li>Basic details only, not comprehensive verification</li>
                <li>Standardized service descriptions across similar offerings</li>
                <li>Users should verify specific details directly with businesses</li>
            </ul><br>
        </section>
        <hr class="my-6 border-gray-300">
        <section class="mb-6">
            <h2 class="text-2xl font-semibold mb-2">7. Limitation of Liability</h2><br>
            <h3 class="text-xl font-semibold mt-4">7.1 Service Quality Exclusions</h3><br> 
            <p><strong>No Responsibility For:</strong></p><br>
            <ul class="list-disc pl-6 space-y-1"> 
                <li>Quality of services provided by third-party businesses</li>
                <li>Customer satisfaction with received services</li>
                <li>Professional qualifications of service providers</li>
                <li>Business location cleanliness or safety standards</li>
                <li>Business operational procedures or compliance</li>
                <li>Staff behavior or customer service quality</li>
             </ul><br>
            <h3 class="text-xl font-semibold mt-4">7.2 Business Operations Exclusions</h3><br> 
            <p><strong>No Responsibility For:</strong></p><br>
             <ul class="list-disc pl-6 space-y-1"> 
                <li>Business hours, schedule changes, or closures</li>
                <li>Unexpected business unavailability</li>
                <li>Business relocation or service modifications</li>
                <li>Staff availability or capacity limitations</li>
                <li>Business policies regarding appointments or cancellations</li>
             </ul><br>
            <h3 class="text-xl font-semibold mt-4">7.3 Health and Safety Exclusions</h3><br> 
            <p><strong>No Responsibility For:</strong></p><br>
            <ul class="list-disc pl-6 space-y-1"> 
                <li>Injuries occurring during service delivery</li>
                <li>Allergic reactions to business products or services</li>
                <li>Medical complications from treatments</li>
                <li>Accidents or incidents at business premises</li>
                <li>Equipment failures or safety issues at businesses</li>
                <li><strong>User Health Responsibility:</strong> Customers must disclose all relevant health conditions, allergies, and concerns to service providers.</li>
            </ul><br>
            <h3 class="text-xl font-semibold mt-4">7.4 Financial Exclusions</h3><br> 
            <p><strong>No Responsibility For:</strong></p><br>
            <ul class="list-disc pl-6 space-y-1"> 
                <li>Additional costs required at business locations</li>
                <li>Parking fees, gratuities, or supplementary services</li>
                <li>Currency exchange rates for international customers</li>
                <li>Banking fees or payment provider charges</li>
            </ul><br>
        </section>
        <hr class="my-6 border-gray-300">
        <section class="mb-6">
            <h2 class="text-2xl font-semibold mb-2">8. Refund Policy</h2><br>
            <h3 class="text-xl font-semibold mt-4">8.1 Eligible Refund Circumstances</h3><br> 
            <p><strong>Business-Related Issues:</strong></p><br>
            <ul class="list-disc pl-6 space-y-1"> 
                <li>Permanent business closure</li>
                <li>Discontinuation of purchased service</li>
                <li>Business relocation rendering service inaccessible</li>
            </ul><br>
            <p><strong>Platform Technical Issues:</strong></p><br>
            <ul class="list-disc pl-6 space-y-1"> 
                <li>Payment processing errors by our system</li>
                <li>Incorrect voucher delivery</li>
                <li>Website technical problems causing purchase errors</li>
             </ul><br>
            <p><strong>Unauthorized Account Access:</strong></p><br>
            <ul class="list-disc pl-6 space-y-1"> 
                <li>Proven account compromise without customer involvement</li>
                <li><strong>Exclusion: </strong>No refunds for voluntarily shared credentials</li>
                <li>Unredeemed voucher status required</li>
                <li>Documented proof of unauthorized access required</li>
                <li>48-hour reporting requirement from discovery</li>
            </ul><br>
            <p><strong>Force Majeure Events:</strong></p><br>
            <ul class="list-disc pl-6 space-y-1"> 
                <li>Natural disasters preventing service delivery</li>
                <li>Government-mandated business closures</li>
                <li>Pandemic-related restrictions</li>
            </ul><br>
            <h3 class="text-xl font-semibold mt-4">8.2 Non-Refundable Circumstances</h3><br> 
            <p><strong>Customer-Related Issues:</strong></p><br>
            <ul class="list-disc pl-6 space-y-1"> 
                <li>Personal schedule changes or preference changes</li>
                <li>Missed appointments or late arrivals</li>
                <li>Failure to book appointments before expiry</li>
                <li>Forgotten or expired vouchers</li>
                <li>Transportation or logistics issues</li>
            </ul><br>
            <p><strong>Service Quality Issues:</strong></p><br>
            <ul class="list-disc pl-6 space-y-1"> 
                <li>Dissatisfaction with service quality</li>
                <li>Unmet expectations regarding service delivery</li>
                <li>Staff disagreements or conflicts</li>
                <li>Business environment conditions (crowding, noise)</li>
                <li>Service result dissatisfaction</li>
            </ul><br>
            <p><strong>Voucher Misuse:</strong></p><br>
            <ul class="list-disc pl-6 space-y-1"> 
                <li>Remote OTP code sharing violations</li>
                <li>Premature OTP code sharing before physical presence</li>
                <li>Lost or deleted vouchers</li>
                <li>Unauthorized voucher transfers</li>
                <li>Expired voucher usage attempts</li>
                <li>Service denial due to remote OTP sharing</li>
             </ul><br>
            <p><strong>External Factors:</strong></p><br>
            <ul class="list-disc pl-6 space-y-1"> 
                <li>Weather-related appointment issues</li>
                <li>Traffic or transportation delays</li>
                <li>Third-party disruptions</li>
                <li>Business staffing issues</li>
            </ul><br>
            <h3 class="text-xl font-semibold mt-4">8.3 Refund Request Process</h3><br> 
            <p><strong>Application Procedure:</strong></p><br>
            <ul class="list-disc pl-6 space-y-1"> 
                <li>Email terms@nearbyvouchers.com within 48 hours</li>
                <li>Include voucher number and purchase details</li>
                <li>Provide detailed explanation with supporting documentation</li>
                <li>Await investigation response (5 business days maximum)</li>
                <li>If approved, refund processing within 14-21 business days</li>
            </ul><br>
            <p><strong>Required Documentation:</strong></p><br>
            <ul class="list-disc pl-6 space-y-1"> 
                <li>Business closure verification (official notices, news articles)</li>
                <li>Technical error screenshots</li>
                <li>Unauthorized transaction bank statements</li>
                <li>Government order documentation for force majeure</li>
            </ul><br>     
            <hr class="my-6 border-gray-300">
            <section class="mb-6">
                <h2 class="text-2xl font-semibold mb-2">9. Health and Safety</h2><br> 
                <h3 class="text-xl font-semibold mt-4">9.1 Customer Health Responsibilities</h3><br>
                <p><strong>Pre-Service Disclosure Requirements:</strong></p><br>
                <ul class="list-disc pl-6 space-y-1"> 
                    <li>Complete health condition disclosure</li>
                    <li>Comprehensive allergy information (food, chemical, material)</li>
                    <li>Current medication listings</li>
                    <li>Pregnancy status notification</li>
                    <li>Recent medical procedures or surgeries</li>
                    <li>Physical limitations or mobility concerns</li>
                </ul><br>   
                <h3 class="text-xl font-semibold mt-4">9.2 Acknowledged Health Risks</h3><br>
                <p><strong>Risk Acceptance:</strong></p><br>
                <ul class="list-disc pl-6 space-y-1"> 
                    <li>All health and fitness services carry inherent risks</li>
                    <li>Beauty treatments may cause allergic reactions</li>
                    <li>Spa services may not suit certain medical conditions</li>
                    <li>Physical activities pose injury potential</li>
                    <li>Food services may trigger allergic reactions</li>
                    <li>Medical/wellness services have treatment risks</li>
                </ul><br>
                <p><strong>Customer Liability:</strong></p><br>
                <ul class="list-disc pl-6 space-y-1"> 
                    <li>Personal assessment of service suitability for health conditions</li>
                    <li>Full responsibility for health complications arising from services</li>
                    <li>Medical treatment costs for service-related complications</li>
                    <li>Injury or adverse reaction consequences</li>
                </ul><br>   
                <h3 class="text-xl font-semibold mt-4">9.3 Service-Specific Safety Guidelines</h3><br>
                <p><strong>Beauty & Spa Services:</strong></p><br>
                <ul class="list-disc pl-6 space-y-1"> 
                    <li>Chemical treatment reaction risks</li>
                    <li>Heat therapy medical condition considerations</li>
                    <li>Sharp instrument injury potential</li>
                    <li>Mandatory allergy patch testing recommendations</li>
                </ul><br>   
                <p><strong>Food & Beverage Services:</strong></p><br>
                <ul class="list-disc pl-6 space-y-1"> 
                    <li>Comprehensive food allergy disclosure</li>
                    <li>Cross-contamination possibilities</li>
                    <li>Medication-food interaction considerations</li>
                    <li>Variable alcohol service policies</li>
                </ul><br>   
                <p><strong>Fitness & Physical Activities:</strong></p><br>
                <ul class="list-disc pl-6 space-y-1"> 
                    <li>Honest fitness level assessment</li>
                    <li>Heart condition participation restrictions</li>
                    <li>Pre-existing condition injury risk increases</li>
                    <li>Mandatory safety instruction compliance</li>
                </ul><br>   
                <p><strong>Medical/Wellness Services:</strong></p><br>
                <ul class="list-disc pl-6 space-y-1"> 
                    <li>Qualified professional service verification</li>
                    <li>Independent credential verification responsibility</li>
                    <li>Second opinion recommendations for major treatments</li>
                    <li>Personal medical record maintenance</li>
                </ul><br>   
                <h3 class="text-xl font-semibold mt-4">9.4 Service Provider Expectations</h3><br>
                <p><strong>Professional Standards:</strong></p><br>
                <ul class="list-disc pl-6 space-y-1"> 
                    <li>Health condition and allergy inquiry protocols</li>
                    <li>Service-associated risk explanations</li>
                    <li>Clean, safe equipment maintenance</li>
                    <li>Professional standard adherence</li>
                    <li>Appropriate insurance coverage</li>
                    <li>Problem identification and service cessation protocols</li>
                    <li><strong>Customer Responsibility:</strong>Independent verification of service provider qualifications and safety standards.</li>
                </ul><br>       
            </section>
            <hr class="my-6 border-gray-300">
            <section class="mb-6">
                <h2 class="text-2xl font-semibold mb-2">10. Dispute Resolution</h2><br>
                <h3 class="text-xl font-semibold mt-4">10.1 Business Dispute Resolution</h3><br>
                <p><strong>Primary Resolution Steps:</strong></p><br>
                <ol class="list-decimal pl-8 space-y-3">
                    <li>Direct communication with business management</li>
                    <li>Polite, clear issue explanation</li>
                    <li>Management escalation if staff cannot assist</li>
                    <li>Documentation of all communications</li>
                    <li>Record keeping of interaction details</li>
                </ol><br>
                <p><strong>Platform Assistance:</strong></p><br>
                <ul class="list-disc pl-6 space-y-1"> 
                    <li>Business contact information provision</li>
                    <li>Voucher terms clarification for businesses</li>
                    <li>Communication facilitation when necessary</li>
                </ul><br>
                <p><strong>Platform Limitations:</strong></p><br>
                <ul class="list-disc pl-6 space-y-1"> 
                    <li>Cannot compel business refunds</li>
                    <li>No control over business operations</li>
                    <li>Cannot guarantee specific dispute outcomes</li>
                    <li>Neutral position maintenance in disputes</li>
                </ul><br>
                <h3 class="text-xl font-semibold mt-4">10.2 Platform Service Issues</h3><br>
                <p><strong>Issue Resolution Process:</strong></p><br>
                <ul class="list-disc pl-6 space-y-1"> 
                    <li>Email terms@nearbyvouchers.com with detailed description</li>
                    <li>Include account details and relevant voucher numbers</li>
                    <li>Provide clear problem explanation with supporting screenshots</li>
                    <li>Expect response within 48 hours</li>
                    <li>Technical issue resolution within 5 business days</li>
                </ul><br>
                <h3 class="text-xl font-semibold mt-4">10.3 Formal Complaint Procedure</h3><br>
                <p><strong>Escalation Process:</strong></p><br>
                <ul class="list-disc pl-6 space-y-1"> 
                    <li><strong>Informal Discussion:</strong> Initial email communication for issue discussion</li>
                    <li><strong>Formal Complaint: </strong>Written complaint submission with evidence</li>
                    <li><strong>Investigation:</strong> 14-day investigation period</li>
                    <li><strong>Response:</strong> Written findings and action documentation</li>
                    <li><strong>Legal Escalation:</strong> Available legal remedies if unsatisfied</li>
                </ul><br>        
            </section>
            <hr class="my-6 border-gray-300">
            <section class="mb-6">
                <h2 class="text-2xl font-semibold mb-2">11. Legal Framework</h2><br>
                <h3 class="text-xl font-semibold mt-4">11.1 Governing Law</h3><br>
                <p>These Terms and Conditions are governed by United Arab Emirates law, with disputes subject to Sharjah jurisdiction court systems.</p><br>
                <h3 class="text-xl font-semibold mt-4">11.2 Dispute Limitation</h3><br>
                <p>All disputes must be pursued individually, with class action or group lawsuit participation prohibited. </p><br>
                <h3 class="text-xl font-semibold mt-4">11.3 Statute of Limitations</h3><br>
                <p>Legal claims must be filed within one year of issue occurrence, or rights to claims are forfeited.</p><br>
                <h3 class="text-xl font-semibold mt-4">11.4 Severability</h3><br>
                <p>If any provision is deemed legally invalid, remaining terms remain fully enforceable.</p><br>
            </section>
            <hr class="my-6 border-gray-300">
            <section class="mb-6">
                <h2 class="text-2xl font-semibold mb-2">12. Privacy and Data Protection</h2><br>
                <h3 class="text-xl font-semibold mt-4">12.1 Data Collection</h3><br>
                <p><strong>Information Types:</strong></p><br>
                <ul class="list-disc pl-6 space-y-1"> 
                    <li>Personal details for account creation</li>
                    <li>Payment information for transaction processing</li>
                    <li>Customer service communication records</li>
                    <li>Website usage analytics for service improvement</li>
                </ul><br>
                <h3 class="text-xl font-semibold mt-4">12.2 Data Usage</h3><br>
                <p><strong>Primary Purposes:</strong></p><br>
                <ul class="list-disc pl-6 space-y-1"> 
                    <li>Purchase processing and voucher delivery</li>
                    <li>Customer support provision</li>
                    <li>Important voucher and service updates</li>
                    <li>Service improvement with appropriate consent</li>
                </ul><br>
                <h3 class="text-xl font-semibold mt-4">12.3 Information Sharing</h3><br>
                <p><strong>Authorized Sharing:</strong></p><br>
                <ul class="list-disc pl-6 space-y-1"> 
                    <li>Business voucher information sharing (name, contact, voucher details)</li>
                    <li>Payment processor transaction data</li>
                    <li>Legal compliance with UAE authorities</li>
                    <li>No third-party marketing without explicit consent</li>
                </ul><br>
                <h3 class="text-xl font-semibold mt-4">12.4 Data Protection Measures</h3><br>
                <ul class="list-disc pl-6 space-y-1"> 
                    <li>Secure server infrastructure with encryption</li>
                    <li>Authorized personnel access limitations</li>
                    <li>Regular security updates and monitoring</li>
                    <li>UAE data protection law compliance</li>
                </ul><br>
            </section>
            <hr class="my-6 border-gray-300">
            <section class="mb-6">
                <h2 class="text-2xl font-semibold mb-2">13. Prohibited Activities</h2><br>
                <h3 class="text-xl font-semibold mt-4">13.1 Fraudulent Activities</h3><br>
                <p><strong>Strictly Prohibited:</strong></p><br>
                <ul class="list-disc pl-6 space-y-1"> 
                    <li>Stolen payment method usage</li>
                    <li>False account information or fake accounts</li>
                    <li>Fraudulent refund claims</li>
                    <li>Unauthorized system benefit manipulation</li>
                </ul><br>
                <h3 class="text-xl font-semibold mt-4">13.2 Voucher Misuse</h3><br>
                <p><strong>Prohibited Actions:</strong></p><br>
                <ul class="list-disc pl-6 space-y-1">     
                    <li>Commercial voucher resale for profit</li>
                    <li>Business/commercial voucher usage</li>
                    <li>Inappropriate voucher code sharing or copying</li>
                    <li>Expired or invalid voucher usage attempts</li>
                    <li>Multiple voucher usage attempts</li>
                </ul><br>
                <h3 class="text-xl font-semibold mt-4">13.3 System Security Violations</h3><br>
                <p><strong>Prohibited Activities:</strong></p><br>
                <ul class="list-disc pl-6 space-y-1">     
                    <li>Hacking or security breach attempts</li>
                    <li>Automated voucher purchasing systems</li>
                    <li>Server overload through excessive requests</li>
                    <li>Unauthorized account access attempts</li>
                    <li>Software reverse engineering</li>
                </ul><br>    
                <h3 class="text-xl font-semibold mt-4">13.4 Conduct Violations</h3><br>
                <p><strong> Unacceptable Behavior:</strong></p><br>
                <ul class="list-disc pl-6 space-y-1"> 
                    <li>Business or staff harassment</li>
                    <li>False or malicious review posting</li>
                    <li>Offensive communication language</li>
                    <li>Threatening or intimidating behavior</li>
                    <li>Discriminatory or hateful conduct</li>
                </ul><br>
                <h3 class="text-xl font-semibold mt-4">13.5 Legal Compliance</h3><br>
                <p><strong>Required Compliance:</strong></p><br>
                <ul class="list-disc pl-6 space-y-1">     
                    <li>UAE law and regulation adherence</li>
                    <li>Prohibition of illegal activity usage</li>
                    <li>Intellectual property rights respect</li>
                    <li>Export control and sanctions compliance</li>
                    <li>Anti-money laundering compliance</li>
                </ul><br>
            </section>
            <hr class="my-6 border-gray-300">
            <section class="mb-6">
                <h2 class="text-2xl font-semibold mb-2">14. Intellectual Property</h2><br>
                <h3 class="text-xl font-semibold mt-4">14.1 Company Property Rights</h3><br>
                <p><strong> AJL Gulf Group LLC Ownership:</strong></p><br>
                <ul class="list-disc pl-6 space-y-1">     
                    <li>Nearby Vouchers website and mobile application</li>
                    <li>Company logos, trademarks, and brand identities</li>
                    <li>Proprietary software and technology platforms</li>
                    <li>Original content creation (descriptions, images, text)</li>
                    <li>Business and service databases</li>
                </ul><br>
                <h3 class="text-xl font-semibold mt-4">14.2 Third-Party Property Rights</h3><br>
                <p><strong> Business Ownership:</strong></p><br>
                <ul class="list-disc pl-6 space-y-1">     
                    <li>Individual business names and proprietary logos</li>
                    <li>Business-provided photos and service descriptions</li>
                    <li>Business trademarks and intellectual property</li>
                    <li>Business-created listing content</li>
                </ul><br>
                <h3 class="text-xl font-semibold mt-4">14.3 Permitted Usage</h3><br>
                <p><strong> Authorized Activities:</strong></p><br>
                <ul class="list-disc pl-6 space-y-1">     
                    <li>Personal website usage for voucher purchases</li>
                    <li>Personal voucher printing or digital storage</li>
                    <li>Family/friend voucher gifting</li>
                    <li>Honest service experience reviews</li>
                </ul><br>
                <h3 class="text-xl font-semibold mt-4">14.4 Prohibited Usage</h3><br>
                <p><strong> Unauthorized Activities:</strong></p><br>
                <ul class="list-disc pl-6 space-y-1">     
                    <li>Website design or functionality copying</li>
                    <li>Unauthorized logo or branding usage</li>
                    <li>Commercial content reproduction</li>
                    <li>Competitive service creation using our content</li>
                    <li>Copyright notice or proprietary marking removal</li>
                </ul><br>   
            </section>
            <hr class="my-6 border-gray-300">
            <section class="mb-6">
                <h2 class="text-2xl font-semibold mb-2">15. Force Majeure</h2><br>
                <h3 class="text-xl font-semibold mt-4">15.1 Uncontrollable Events</h3><br>
                <p><strong>Events Beyond Control:</strong></p><br>
                <ul class="list-disc pl-6 space-y-1">     
                    <li>Natural disasters (earthquakes, floods, severe weather)</li>
                    <li>Pandemic or public health emergencies</li>
                    <li>Government actions or regulatory changes</li>
                    <li>War, terrorism, or civil unrest situations</li>
                    <li>Major technical failures or cyber attacks</li>
                    <li>Internet service provider outages</li>
                    <li>Power grid or infrastructure failures</li>
                    <li>Banking system disruptions</li>
                </ul><br>   
                <h3 class="text-xl font-semibold mt-4">15.2 Service Impact During Force Majeure</h3><br>
                <p><strong>Potential Effects:</strong></p><br>
                <ul class="list-disc pl-6 space-y-1">     
                    <li>Service maintenance challenges without guarantees</li>
                    <li>Temporary feature unavailability</li>
                    <li>Business closure requirements</li>
                    <li>Modified refund policy applications</li>
                    <li>Communication updates when possible</li>
                </ul><br>   
                <h3 class="text-xl font-semibold mt-4">15.3 Customer Rights During Force Majeure</h3><br>
                <p><strong>Available Options:</strong></p><br>
                <ul class="list-disc pl-6 space-y-1">
                    <li>Collaborative solution development when possible</li>
                    <li>Extended circumstance refund consideration</li>
                    <li>Essential service and communication prioritization</li>
                    <li>Special consideration documentation requirements</li>
                </ul><br>           
            </section>
            <hr class="my-6 border-gray-300">
            <section class="mb-6">
                <h2 class="text-2xl font-semibold mb-2">16. Contact Information</h2><br>
                <h3 class="text-xl font-semibold mt-4">16.1 Contact Details</h3><br>
                <p><strong>Primary Communication:</strong></p><br>
                <ul class="list-disc pl-6 space-y-1">
                    <li><strong>Email:</strong> terms@nearbyvouchers.com</li>
                    <li><strong>Website:</strong>  https://www.nearbyvouchers.com</li>
                    <li><strong>Response Time:</strong> 48 hours for initial response</li>
                </ul><br>     
                <p><strong>Business Hours:</strong></p><br>
                <ul class="list-disc pl-6 space-y-1">        
                    <li><strong>Operating Days:</strong> Sunday through Thursday</li>
                    <li><strong>Hours:</strong> 9:00 AM - 6:00 PM UAE Time</li>
                    <li><strong>Closed:</strong> Friday and Saturday</li>
                    <li><strong>Emergency Issues:</strong> Email anytime with priority response</li>
                </ul><br>     
                <h3 class="text-xl font-semibold mt-4">16.2 Communication Guidelines</h3><br>
                <p><strong>Information to Include:</strong></p><br>
                <ul class="list-disc pl-6 space-y-1">   
                    <li>Complete name and account email address</li>
                    <li>Relevant voucher numbers</li>
                    <li>Clear issue or question description</li>
                    <li>Supporting screenshots or documents</li>
                    <li>Preferred response method</li>
                </ul><br>     
                <h3 class="text-xl font-semibold mt-4">16.3 Language Support</h3><br>
                <p><strong>Available Support:</strong></p><br>
                <ul class="list-disc pl-6 space-y-1">
                    <li>Primary support in English</li>
                    <li>Arabic support available upon request</li>
                    <li>Senior staff handling for complex issues</li>
                    <li>Translation assistance when needed</li>
                </ul><br>         
            </section>
            <hr class="my-6 border-gray-300">
            <section class="mb-6">
                <h2 class="text-2xl font-semibold mb-2">17. Final Provisions</h2><br>
                <h3 class="text-xl font-semibold mt-4">17.1 Key Reminders</h3><br>
                <p><strong>Essential Points:</strong></p><br>
                <ul class="list-disc pl-6 space-y-1">
                    <li><strong>Intermediary Role:</strong> We connect customers with businesses; we do not provide services</li>
                    <li><strong>Expiry Enforcement:</strong> Vouchers expire on specified dates with no extensions</li>
                    <li><strong>Limited Refunds:</strong> Only specific circumstances qualify for refunds</li>
                    <li><strong>Health Responsibility:</strong> Customers must disclose medical conditions to providers</li>
                    <li><strong>Voucher Details: </strong>Each voucher may contain specific terms and conditions</li>
                </ul><br>     
                <h3 class="text-xl font-semibold mt-4">17.2 Pre-Purchase Checklist</h3><br>
                <p><strong>Before Buying:</strong></p><br>
                <ul class="list-disc pl-6 space-y-1">
                    <li>Verify business location and accessibility</li>
                    <li>Review service descriptions and restrictions</li>
                    <li>Note expiry dates and plan usage accordingly</li>
                    <li>Understand included services versus additional costs</li>
                    <li>Contact businesses directly for specific questions</li>
                </ul><br>     
                <h3 class="text-xl font-semibold mt-4">17.3 Post-Purchase Actions</h3><br>
                <p><strong>After Purchase:</strong></p><br>
                <ul class="list-disc pl-6 space-y-1">
                    <li>Secure voucher storage and backup</li>
                    <li>Prompt appointment booking after purchase</li>
                    <li>Punctual arrival with valid identification</li>
                    <li>OTP code sharing only at business location</li>
                    <li>Immediate problem reporting to customer service</li>
                </ul><br>     
            </section>
            <hr class="my-6 border-gray-300">
            <section class="mb-6">
                <h2 class="text-2xl font-semibold mb-2">Legal Acknowledgment</h2><br>
                <p><strong>IMPORTANT LEGAL NOTICE:</strong> By clicking "I Agree," creating an account, or making any purchase, you confirm that you have read, understood, and agree to be legally bound by all provisions contained within these Terms and Conditions.</p>
            </section>
            <hr class="my-6 border-gray-300">
            <section class="mb-6">
                <p><i>Document Version: 1.0 | Effective Date: June 4, 2025 | Last Updated: June 4, 2025</i></p>
            </section>
    </div>
@endsection