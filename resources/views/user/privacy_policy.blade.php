@extends('user.layouts.main')
@push('styles')
  <style>
  .to-blue-500 {
    --tw-gradient-to: #3b82f6 var(--tw-gradient-to-position);
  }

  /* Update the body to use the Poppins font */
  body {
    font-family: 'Poppins', sans-serif;
    font-weight: 400;
  }
  .w-8{
    width: 40px !important;
  }
         
        

  .from-cyan-500 {
    --tw-gradient-from: #06b6d4 var(--tw-gradient-from-position);
    --tw-gradient-to: rgb(6 182 212 / 0) var(--tw-gradient-to-position);
    --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
  }

  .bg-gradient-to-r {
    background-image: linear-gradient(to right, var(--tw-gradient-stops));
  }
  .bg-custom {
            background: linear-gradient(135deg, #2b3147 0%, #1a1f2e 100%);
        }
        .product-card {
            background: linear-gradient(135deg, #3a4259 0%, #2b3147 100%);
        }
        .color-dot {
            width: 16px;
            background-color: #000;
            color: #000;
            height: 16px;
            border-radius: 50%;
            cursor: pointer;
        }
        .swiper-pagination-bullet-active{
          background-color: #2b3147 !important;
          backdrop-filter: blur(10px);
        }
        .swiper-pagination{
          color: #fff !important;
          overflow: visible;
          bottom: 10px !important;
          z-index: 999999;
        }
        .swiper-pagination-bullet{
       
          border-radius: 10px !important;
          width: 60px !important;
          height: 4px !important;
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
        body: ["Poppins", "sans-serif"],  /* Set Poppins as the body font */
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

<script>
  window.onscroll = function() {
    const header = document.getElementById('header');
    const sticky = header.offsetTop;

    if (window.pageYOffset > sticky) {
      header.classList.add('fixed-header');
    } else {
      header.classList.remove('fixed-header');
    }
  };
</script>
@endpush
@push('styles')
<style>
   .fixed-header {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      background-color: #fff; /* Blue color */
      color: white;
     
      z-index: 10;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    </style>
@endpush
@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-4">Privacy Policy</h1>
        <p class="mb-4"><strong>Effective Date:</strong> June 4, 2025</p>
        <p class="mb-4">
           This Privacy Policy describes how AJL Gulf Group LLC ("we", "us", "our", or "Company"), operating the <strong>Nearbyvouchers</strong> platform at https://www.nearbyvouchers.com collects, uses, processes, stores, and protects your personal information in accordance with UAE data protection laws.
        </p>

        <section class="mb-6">
            <h2 class="text-2xl font-semibold mb-2">Company Information</h2>
            <ul class="list-disc pl-6 space-y-1">
                <li><strong>Legal Entity:</strong> AJL Gulf Group LLC</li>
                <li><strong>Registration:</strong> Sharjah, SHAMS Free Zone, United Arab Emirates</li>
                <li><strong>Website:</strong>https://www.nearbyvouchers.com</li>
                <li><strong>Email:</strong>privacy@nearbyvouchers.com</li>
            </ul>
        </section>

        <hr class="my-6 border-gray-300">

        <!-- Sections 1 to 15 -->
        <!-- Each section is structured similarly for consistency -->
        <!-- For brevity, only a few examples shown below, but I can generate the full document if needed -->

        <section class="mb-6">
            <h2 class="text-2xl font-semibold mb-2">1. Information We Collect</h2>

            <h3 class="text-xl font-semibold mt-4">1.1 Personal Information You Provide to Us</h3><br>
            <p><strong>Account Registration Data:</strong>When you create an account on our platform, we collect:</p><br>
            <ul class="list-disc pl-6 space-y-1">
                <li>Full Name</li>
                <li>Email Address</li>
                <li>Phone Number</li>
                <li>Date of Birth</li>
                <li>Country of Residence (COR)</li>
                <li>Nationality</li>
                <li>Password (stored in encrypted format)</li>
            </ul><br>
            <p><strong>Transaction and Payment Information:</strong></p><br>
            <ul class="list-disc pl-6 space-y-1">
                <li>Billing address and delivery information</li>
                <li>Payment method details (processed securely through Stripe)</li>
                <li>Purchase history and transaction records</li>
                <li>Voucher usage and redemption data</li>
                <li>Refund and cancellation requests</li>
            </ul><br>
            <p><strong>Communication Data</strong></p><br>
            <ul  class="list-disc pl-6 space-y-1">
                <li>Messages sent through our customer support system</li>
                <li>Feedback, reviews, and ratings you provide</li>
                <li>Survey responses and user-generated content</li>
                <li>Newsletter and marketing preference selections</li>
            </ul>

            <h3 class="text-xl font-semibold mt-4">1.2 Information We Collect Automatically</h3><br>
            <p><strong>Technical and Usage Data:</strong></p><br>
            <ul class="list-disc pl-6 space-y-1">
                <li>IP address and approximate location data</li>
                <li>Device information (type, model, operating system)</li>
                <li>Browser type, version, and language settings</li>
                <li>Website navigation patterns and page interactions</li>
                <li>Session duration and frequency of visits</li>
                <li>Referral sources and search terms used</li>
            </ul><br>
            <p><strong>Cookies and Tracking Technologies:</strong></p><br>
            <ul class="list-disc pl-6 space-y-1">
                <li>Session cookies (expire after 2 hours of inactivity)</li>
                <li>Persistent cookies for user preferences</li>
                <li>Analytics cookies for performance optimization</li>
                <li>Marketing cookies for personalized advertising (with consent)</li>
            </ul><br>
            <h3 class="text-xl font-semibold mt-4">1.3 Information from Third Parties</h3><br>
            <p><strong>Vendor and Partner Data:</strong></p><br>
            <ul class="list-disc pl-6 space-y-1">
                <li>Information from approved vendors for order fulfillment</li>
                <li>Data from marketing partners and affiliates</li> 
                <li>Social media information (if you connect social accounts)</li>
                <li>Public databases for identity verification when required</li>

            </ul>
        </section>
        <hr class="my-6 border-gray-300">
        <!-- Repeat structure for sections 2 to 15 -->
        <!-- Example: -->
        <section class="mb-6">
            <h2 class="text-2xl font-semibold mb-2">2. How We Use Your Information</h2>
            <h3 class="text-xl font-semibold mt-4">2.1 Primary Service Functions</h3><br>
            <p><strong>Account Management:</strong></p><br>
            <ul class="list-disc pl-6 space-y-1">
                <li>Creating and maintaining your user account</li>
                <li>Authenticating your identity and securing your account</li>
                <li>Managing session timeouts (2-hour automatic logout)</li>
                <li>Providing personalized account dashboard</li>
            </ul><br>
            <p><strong>Transaction Processing:</strong></p><br>
            <ul class="list-disc pl-6 space-y-1">
                <li>Processing voucher purchases and payments via Stripe</li>
                <li>Sending purchase confirmations and digital vouchers</li>
                <li>Facilitating voucher redemption with partner vendors</li>
                <li>Managing refunds, exchanges, and customer disputes</li>
            </ul><br>
           <p><strong>Communication Services:</strong></p><br>
            <ul class="list-disc pl-6 space-y-1">
                <li>Sending essential transactional emails (confirmations, receipts, account updates)</li>
                <li>Providing customer support and technical assistance</li>
                <li>Responding to inquiries and resolving issues</li>
                <li>Delivering vouchers and important service notifications</li>
            </ul><br>
            <h3 class="text-xl font-semibold mt-4">2.2 Marketing and Personalization</h3><br>
            <p><strong>Targeted Marketing (with your consent):</strong></p><br>
            <ul class="list-disc pl-6 space-y-1">
                <li>Sending promotional emails about deals and offers</li>
                <li>Customizing website content based on your preferences</li>
                <li>Creating personalized voucher recommendations</li>
                <li>Conducting market research and customer satisfaction surveys</li>
            </ul><br>
            <p><strong>Analytics and Improvement:</strong></p><br>
            <ul class="list-disc pl-6 space-y-1">
                <li>Analyzing user behavior to improve platform functionality</li>
                <li>Optimizing website performance and user experience</li>
                <li>Developing new features and services</li>
                <li>Measuring marketing campaign effectiveness</li>
            </ul><br>
            <h3 class="text-xl font-semibold mt-4">2.3 Legal and Security Purposes</h3><br>
            <p><strong>Fraud Prevention and Security:</strong></p><br>
            <ul class="list-disc pl-6 space-y-1">
                <li>Detecting and preventing fraudulent transactions</li>
                <li>Monitoring for suspicious account activity</li>
                <li>Implementing security measures and access controls</li>
                <li>Protecting against cyber threats and data breaches</li>
            </ul><br>
            <p><strong>Legal Compliance:</strong></p><br>
            <ul class="list-disc pl-6 space-y-1">
                <li>Complying with UAE federal and emirate regulations</li>
                <li>Meeting tax and financial reporting requirements</li>
                <li>Responding to legal requests and court orders</li>
                <li>Maintaining records as required by law</li>
            </ul><br>
        </section>
        <hr class="my-6 border-gray-300">
        <section class="mb-6">
            <h2 class="text-2xl font-semibold mb-2">3.Information Sharing and Disclosure</h2>
            <h3 class="text-xl font-semibold mt-4">3.1 Approved Vendors and Service Providers</h3><br>
            <p><strong>Vendor Partners:</strong>We share minimal necessary information with our approved vendors to facilitate service delivery:</p><br>
            <ul class="list-disc pl-6 space-y-1">
                <li>Customer name and contact details for voucher redemption</li>
                <li>Purchase details and voucher specifications</li>
                <li>Special requirements or preferences you've indicated</li>
            </ul><br>
           <p><strong>Essential Service Providers:</strong></p><br>
           <ul class="list-disc pl-6 space-y-1">
            <li><strong>Stripe:</strong>Payment processing and transaction security</li>
            <li><strong>Cloud Hosting Services:</strong>Secure data storage and platform hosting</li>
            <li><strong>Email Service Providers:</strong>Transactional and marketing communications</li>
            <li><strong>Analytics Providers:</strong>Website performance and user behavior analysis</li>
           </ul><br>
            <h3 class="text-xl font-semibold mt-4">3.2 Marketing and Affiliate Partners</h3><br>
            <p><strong>Limited Data Sharing:</strong>We may share aggregated, non-personally identifiable information with:</p><br>
            <ul class="list-disc pl-6 space-y-1">
                <li>Affiliate partners for commission tracking</li>
                <li>Advertising networks for targeted marketing campaigns</li>
                <li>Market research companies for industry analysis</li>
                <li>Business intelligence providers for performance metrics</li>
            </ul><br>
            <h3 class="text-xl font-semibold mt-4">3.3 Legal and Regulatory Disclosure</h3><br>
            <p><strong>Mandatory Disclosure:</strong>We may disclose your personal information when required by:</p><br>
            <ul class="list-disc pl-6 space-y-1">
                <li>UAE federal laws and regulations</li>
                <li>Emirate-specific legal requirements</li>
                <li>Court orders, subpoenas, or legal processes</li>
                <li>Government agencies for regulatory compliance</li>
                <li>Law enforcement for investigation purposes</li>
            </ul><br>
            <p><strong>Business Transfers:</strong>In the event of a merger, acquisition, or sale of business assets, your information may be transferred to the new entity, subject to the same privacy protections.</p><br>
        </section>
        <!-- 4. Data Security and Protection -->
        <hr class="my-6 border-gray-300">
        <section class="mb-6">
            <h2 class="text-2xl font-semibold mb-2">4. Data Security and Protection</h2>
            <h3 class="text-xl font-semibold mt-4">4.1 Technical Safeguards</h3><br>
            <p><strong>Encryption and Security:</strong></p><br>
            <ul class="list-disc pl-6 space-y-1">
                <li>SSL/TLS encryption for all data transmission</li>
                <li>Advanced encryption for stored sensitive data</li>
                <li>Secure API connections with all third-party services</li>
                <li>Regular security audits and vulnerability assessments</li>
                <li>Multi-factor authentication for administrative access</li>
            </ul><br>
           <p><strong>Access Controls:</strong></p><br>
           <ul class="list-disc pl-6 space-y-1">
            <li>Role-based access restrictions to personal data</li>
            <li>Regular access reviews and permission updates</li>
            <li>Secure employee authentication systems</li>
            <li>Audit logs for all data access activities</li>
           </ul><br>

            <h3 class="text-xl font-semibold mt-4">4.2 Operational Security</h3><br>
            <p><strong>Data Handling Procedures:</strong></p><br>
            <ul class="list-disc pl-6 space-y-1">
                <li>Staff training on privacy and data protection</li>
                <li>Confidentiality agreements with all employees</li>
                <li>Incident response procedures for data breaches</li>
                <li>Regular backup and disaster recovery protocols</li>
                <li>Secure disposal of outdated equipment and data</li>
            </ul><br>
           <p><strong>Session Management:</strong></p><br>
           <ul class="list-disc pl-6 space-y-1">
            <li>Automatic session timeout after 2 hours of inactivity</li>
            <li>Secure session token generation and management</li>
            <li>Protection against session hijacking and fixation</li>
            <li>Regular session security monitoring</li>
           </ul><br>
        </section>
        <!-- 5. Data Retention and Deletion -->
        <hr class="my-6 border-gray-300">
        <section class="mb-6">
            <h2 class="text-2xl font-semibold mb-2">5. Data Retention and Deletion</h2>
            <h3 class="text-xl font-semibold mt-4">5.1 Retention Periods</h3><br>
            <p><strong>Active Accounts:</strong></p><br>
            <ul class="list-disc pl-6 space-y-1">
               <li>Account information: Retained while account is active</li>
                <li>Transaction history: Retained for 7 years for financial compliance</li>
                <li>Communication records: Retained for 3 years</li>
                <li> Technical logs: Retained for 1 year</li>
            </ul><br>
           <p><strong>Closed Accounts:</strong></p><br>
           <ul class="list-disc pl-6 space-y-1">
            <li>Essential data: Retained for 7 years for legal compliance</li>
            <li>Marketing data: Deleted within 30 days of account closure</li>
            <li>Technical data: Anonymized after 1 year</li>
            <li>Backup data: Permanently deleted within 12 months</li>
           </ul><br>
            <h3 class="text-xl font-semibold mt-4">5.2 Data Deletion</h3><br>
            <p><strong>Automatic Deletion:</strong></p><br>
            <ul class="list-disc pl-6 space-y-1">
                <li>Inactive accounts after 3 years of no activity</li>
                <li>Marketing data upon opt-out request</li>
                <li>Session data after timeout expiration</li>
                <li>Regular backup and disaster recovery protocols</li>
                <li>Temporary files after processing completion</li>
            </ul><br>
        </section>
        <hr class="my-6 border-gray-300">
        <section class="mb-6">
            <h2 class="text-2xl font-semibold mb-2">6. Your Privacy Rights and Choices</h2>
            <h3 class="text-xl font-semibold mt-4">6.1 Access and Control Rights</h3><br>
            <p><strong>Data Subject Rights:</strong></p><br>
            <ul class="list-disc pl-6 space-y-1">
                <li><strong>Access: </strong>Request copies of your personal information</li>
                <li><strong>Rectification:</strong>Correct inaccurate or incomplete data</li>
                <li><strong>Erasure:</strong> Request deletion of your personal data</li>
                <li><strong>Portability:</strong> Receive your data in a structured format</li>
                <li><strong>Restriction:</strong> Limit processing of your personal data</li>
                <li><strong>Objection:</strong> Object to certain types of data processing</li>
            </ul><br>
           <p><strong>How to Exercise Your Rights: Submit requests through:</strong></p><br>
           <ul class="list-disc pl-6 space-y-1">
            <li>Account settings dashboard</li>
            <li>Email to privacy@nearbyvouchers.com</li>
            <li>Online privacy request form</li>
           </ul><br>
           <h3 class="text-xl font-semibold mt-4">6.2 Marketing and Communication Preferences</h3><br>
           <p><strong>Email Marketing:</strong></p><br>
             <ul class="list-disc pl-6 space-y-1">
            <li>Opt-in required for promotional communications</li>
            <li>Easy unsubscribe option in every marketing email</li>
            <li>Granular control over types of communications</li>
            <li>Immediate processing of opt-out requests</li>
           </ul><br>
            <p><strong>Essential Communications:</strong> You cannot opt out of:</p><br>
            <ul>
                <li>Transaction confirmations and receipts</li>
                <li>Account security notifications</li>
                <li>Important service updates</li>
                <li>Legal notices and policy changes</li>
            </ul><br>
            <h3 class="text-xl font-semibold mt-4">6.3 Cookie Management</h3><br>
            <p><strong>Cookie Controls:</strong></p><br>
            <ul class="list-disc pl-6 space-y-1">
                <li>Browser settings for cookie preferences</li>
                <li>Website cookie consent management tool</li>
                <li>Opt-out options for advertising cookies</li>
                <li>Session cookie automatic expiration (2 hours)</li>
            </ul>
        </section>
        <hr class="my-6 border-gray-300">
        <section class="mb-6">
            <h2 class="text-2xl font-semibold mb-2">7. International Data Transfers</h2>
            <h3 class="text-xl font-semibold mt-4">7.1 Transfer Safeguards</h3><br>
            <p>When transferring your data outside the UAE, we ensure:</p><br>
            <ul class="list-disc pl-6 space-y-1">
              <li><strong>Adequacy Decisions:</strong>Transfers only to countries with adequate protection</li>
              <li><strong>Standard Contractual Clauses:</strong> Legal agreements with international partners</li>
              <li><strong>Binding Corporate Rules:</strong> Internal policies for data protection</li>
              <li><strong>Your Consent:</strong> Explicit consent for specific transfers when required</li>
            </ul><br>
            <h3 class="text-xl font-semibold mt-4">7.2 Third-Party Processors</h3><br>
            <p><strong>International Services:</strong></p><br>
            <ul class="list-disc pl-6 space-y-1">
              <li><strong>Stripe: </strong>Payment processing (complies with international standards)</li>
              <li><strong>Cloud Providers: </strong>Data hosting with UAE presence or adequate safeguards</li>
              <li><strong>Analytics Services: </strong>Anonymized data processing only</li>
              <li><strong>Marketing Platforms:</strong>Consent-based data processing</li>
            </ul>
        </section>
        <hr class="my-6 border-gray-300">
        <section class="mb-6">
            <h2 class="text-2xl font-semibold mb-2">8. Special Provisions</h2>
            <h3 class="text-xl font-semibold mt-4">8.1 Minors' Privacy</h3><br>
            <p>Age Restrictions:</p><br>
            <ul class="list-disc pl-6 space-y-1">
              <li>Platform not intended for users under 18 years</li>
              <li>Active monitoring for underage account creation</li>
              <li>Immediate deletion of identified minor accounts</li>
              <li>Parental notification procedures when applicable</li>
            </ul><br>
            <h3 class="text-xl font-semibold mt-4">8.2 Sensitive Data</h3><br>
            <p><strong>Special Categories:</strong>We do not intentionally collect:</p><br>
            <ul class="list-disc pl-6 space-y-1">
              <li>Religious or philosophical beliefs</li>
              <li>Political opinions</li>
              <li>Health or medical information</li>
              <li>Biometric or genetic data</li>
            </ul><br>
            <p>If such data is inadvertently collected, it will be deleted immediately upon identification.</p><br>
        </section>
        <hr class="my-6 border-gray-300">
        <section class="mb-6">
            <h2 class="text-2xl font-semibold mb-2">9. Cookies and Tracking Policy</h2>
            <h3 class="text-xl font-semibold mt-4">9.1 Types of Cookies We Use</h3><br>
            <p><strong>Essential Cookies (Always Active):</strong></p><br>
            <ul class="list-disc pl-6 space-y-1">
              <li>Authentication and security cookies</li>
              <li>Session management cookies (2-hour timeout)</li>
              <li>Load balancing and performance cookies</li>
              <li>Shopping cart and transaction cookies</li>
            </ul><br>
            <p><strong>Analytics Cookies (Consent Required):</strong></p><br>
            <ul class="list-disc pl-6 space-y-1">
              <li>Google Analytics for website usage statistics</li>
              <li>Performance monitoring cookies</li>
              <li>Error tracking and debugging cookies</li>
              <li>User experience optimization cookies</li>
            </ul><br>
            <p><strong>Marketing Cookies (Consent Required):</strong></p><br>
            <ul class="list-disc pl-6 space-y-1">
              <li>Advertising personalization cookies</li>
              <li>Conversion tracking cookiess</li>
              <li>Social media integration cookies</li>
              <li>Remarketing and retargeting cookies</li>
            </ul><br>
            <h3 class="text-xl font-semibold mt-4">9.2 Cookie Management</h3><br>
            <p><strong>Your Choices:</strong></p><br>
            <ul class="list-disc pl-6 space-y-1">
              <li>Accept all cookies for full functionality</li>
              <li>Accept only essential cookies</li>
              <li>Customize cookie preferences by category</li>
              <li>Withdraw consent at any time through settings</li>
            </ul><br>
        </section>
        <hr class="my-6 border-gray-300">
        <section class="mb-6">
          <h2 class="text-2xl font-semibold mb-2">10. Third-Party Services and Links</h2>
          <h3 class="text-xl font-semibold mt-4">10.1 External Links</h3><br>
          <p>Our website may contain links to third-party websites. We are not responsible for:</p><br>
          <ul class="list-disc pl-6 space-y-1">
            <li>Privacy practices of external websites</li>
            <li>Content or services provided by third parties</li>
            <li>Data collection by linked websites</li>
            <li>Security of third-party platforms</li>
          </ul><br>
          <p><strong>Recommendation:</strong>Review privacy policies of any external websites before providing personal information.</p><br>
          <h3 class="text-xl font-semibold mt-4">10.2 Social Media Integration</h3><br>
          <p><strong>Social Features:</strong></p><br>
          <ul class="list-disc pl-6 space-y-1">
            <li>Social media sharing buttons</li>
            <li>Social login options (if available)</li>
            <li>Customer review integration</li>
            <li>Community features and forums</li>
          </ul><br>
          <p><strong>Data Sharing:</strong> We only share data with social media platforms based on your explicit actions and consent.</p>
        </section>
        <hr class="my-6 border-gray-300">
        <section class="mb-6">
          <h2 class="text-2xl font-semibold mb-2">11. Data Breach Notification</h2>
          <h3 class="text-xl font-semibold mt-4">11.1 Breach Response Procedures</h3><br>
          <p><strong>Immediate Response:</strong></p><br>
          <ul class="list-disc pl-6 space-y-1">
            <li>Immediate investigation and containment</li>
            <li>Assessment of breach scope and impact</li>
            <li>Implementation of corrective measures</li>
            <li>Documentation of incident details</li>
          </ul><br>
          <p><strong>Notification Timeline:</strong></p><br>
           <ul class="list-disc pl-6 space-y-1">
            <li>Regulatory notification within 72 hours (if required)</li>
            <li>User notification without undue delay for high-risk breaches</li>
            <li>Public disclosure if legally mandated</li>
            <li>Regular updates on remediation progress</li>
          </ul><br>
          <h3 class="text-xl font-semibold mt-4">11.2 User Protection Measures</h3><br>
          <p><strong>Breach Support:</strong></p><br>
          <ul class="list-disc pl-6 space-y-1">
            <li>Credit monitoring services (if applicable)</li>
            <li>Password reset requirements</li>
            <li>Enhanced security recommendations</li>
            <li>Dedicated support for affected users</li>
          </ul><br>
        </section>
        <hr class="my-6 border-gray-300">
        <section class="mb-6">
          <h2 class="text-2xl font-semibold mb-2">12. Compliance and Legal Framework</h2>
          <h3 class="text-xl font-semibold mt-4">12.1 UAE Data Protection Laws</h3><br>
          <p><strong>Primary Legislation:</strong></p><br>
          <ul class="list-disc pl-6 space-y-1">
            <li>UAE Federal Decree-Law No. 45 of 2021 on Personal Data Protection</li>
            <li>UAE Cybercrime Law (Federal Decree-Law No. 5 of 2012)</li>
            <li>UAE Consumer Protection Law</li>
            <li>UAE Electronic Transactions Law</li>
          </ul><br>
          <p><strong>Emirate-Specific Regulations:</strong></p><br>
          <ul class="list-disc pl-6 space-y-1">
            <li>Dubai Data Protection Law (where applicable)</li>
            <li>Abu Dhabi Data Protection Regulations (where applicable)</li>
            <li>Free Zone specific data protection requirements</li>
          </ul><br>
          <h3 class="text-xl font-semibold mt-4">12.2 International Standards</h3><br>
          <p><strong>Compliance Framework:</strong></p><br>
          <ul class="list-disc pl-6 space-y-1">
            <li>ISO 27001 Information Security Management</li>
            <li>Payment Card Industry (PCI) compliance through Stripe</li>
            <li>General Data Protection Regulation (GDPR) principles</li>
            <li>Industry best practices for data protection</li>
          </ul>
        </section>
        <hr class="my-6 border-gray-300">
        <section class="mb-6">
          <h2 class="text-2xl font-semibold mb-2">13. Updates and Changes</h2>
          <h3 class="text-xl font-semibold mt-4">13.1 Policy Updates</h3><br>
          <p><strong>Website-Only Notification:</strong></p><br>
          <ul class="list-disc pl-6 space-y-1">
            <li>Privacy policy updates will be communicated exclusively through our website</li>
            <li>Prominent banner notification on website homepage for 30 days</li>
            <li>Updated effective date clearly displayed on privacy policy page</li>
            <li>Archive of previous policy versions available on our website</li>
            <li>No email, phone, or other external notifications will be sent</li>
          </ul><br>
          <p><strong>Policy Review Requirement:</strong></p><br>
          <ul class="list-disc pl-6 space-y-1">
            <li>Users must review and accept the updated privacy policy before proceeding with transactions</li>
            <li>Account creation process requires visiting and accepting the current privacy policy</li>
            <li>Existing users will be prompted to review policy updates during their next login or transaction attempt</li>
          </ul><br>
          <p><strong>Significant Changes:</strong></p><br>
          <ul class="list-disc pl-6 space-y-1">
            <li>30-day advance website notice for material changes</li>
            <li>Option to close account if you disagree with changes</li>
            <li>Continued use implies acceptance of updates after mandatory review</li>
            <li>Right to withdraw consent for new processing purposes</li>
          </ul><br>
          <h3 class="text-xl font-semibold mt-4">13.2 Regular Reviews</h3><br>
          <p><strong>Policy Maintenance:</strong></p><br>
          <ul class="list-disc pl-6 space-y-1">
            <li>Annual comprehensive policy review</li>
            <li>Quarterly compliance assessments</li>
            <li>Regular updates based on legal changes</li>
            <li>User feedback incorporation</li>
          </ul><br>
        </section>
        <hr class="my-6 border-gray-300">
        <section class="mb-6">
          <h2 class="text-2xl font-semibold mb-2">14. Contact Information and Support</h2><br>
          <h3 class="text-xl font-semibold mt-4">14.1 Privacy Inquiries</h3><br>
          <p><strong>Data Protection Officer:</strong></p><br>
          <ul class="list-disc pl-6 space-y-1">
            <li><strong>Email:</strong>privacy@nearbyvouchers.com</li>
            <li><strong>Response Time:</strong> Within 3 business days</li>
            <li><strong>Languages:</strong> English only</li>
            <li><strong>Business Hours: </strong> Sunday to Thursday, 9 AM to 6 PM UAE Time</li>
          </ul><br>
          <h3 class="text-xl font-semibold mt-4">14.2 General Support</h3><br>
          <p><strong>Customer Service:</strong></p><br>
          <ul class="list-disc pl-6 space-y-1">
            <li><strong>Email:</strong>support@nearbyvouchers.com</li>
            <li><strong>Website:</strong>https://www.nearbyvouchers.com/contact</li>
            <li><strong>Response Time:</strong> Within 24 hours</li>
            <li><strong>Languages:</strong> English only</li>
          </ul><br>
          <h3 class="text-xl font-semibold mt-4">14.3 Regulatory Contacts</h3><br>
          <p><strong>UAE Regulatory Authority:</strong></p><br>
          <ul class="list-disc pl-6 space-y-1">
            <li>Telecommunications and Digital Government Regulatory Authority (TDRA)</li>
            <li>UAE Central Bank (for payment-related matters)</li>
            <li>Ministry of Economy (for consumer protection)</li>
          </ul><br>
          <p><strong>Complaints Process:</strong></p><br>
          <ol class="list-decimal pl-8 space-y-3">
            <li>Contact our Data Protection Officer first</li>
            <li>Allow 30 days for internal resolution</li>
            <li>Escalate to relevant regulatory authority if unsatisfied</li>
            <li>Seek legal advice for unresolved disputes</li>
          </ol><br>
        </section>
        <hr class="my-6 border-gray-300">
        <section class="mb-6">
          <h2 class="text-2xl font-semibold mb-2">15. Final Provisions</h2><br>
          <h3 class="text-xl font-semibold mt-4">15.1 Interpretation</h3><br>
          <p><strong>Policy Interpretation:</strong></p><br>
          <ul class="list-disc pl-6 space-y-1">
            <li>This policy is written in English only</li>
            <li>Legal terms have their standard meanings under UAE law</li>
            <li>Headings are for convenience and do not affect interpretation</li>
            <li>Individual provisions remain valid even if others are invalid</li>
          </ul><br>
          <h3 class="text-xl font-semibold mt-4">15.2 Effective Date and Acknowledgment</h3><br>
          <p><strong>Mandatory Policy Review:</strong>Before creating an account or making any transaction on our platform, you must:</p><br>
          <ul class="list-disc pl-6 space-y-1">
            <li>Visit and read this Privacy Policy in full</li>
            <li>Explicitly acknowledge that you have reviewed the policy</li>
            <li>Accept the terms of data collection and processing described herein</li>
            <li>Confirm your understanding of your rights and our practices</li>
          </ul><br>
          <p><strong>Acceptance: </strong>By completing account creation or transaction processes, you acknowledge that you have:</p><br>
          <ul class="list-disc pl-6 space-y-1">
            <li>Read and understood this Privacy Policy by visiting this page</li>
            <li>Reviewed the current version dated June 4, 2025</li>
            <li>Agree to the collection and use of your information as described</li>
            <li>Understood your rights and how to exercise them</li>
            <li>Agreed to receive essential transactional communications</li>
          </ul><br>
          <p><strong>Policy Update Compliance:</strong></p><br>
          <ul class="list-disc pl-6 space-y-1">
            <li>You agree to check this privacy policy page for updates</li>
            <li>Website-only notifications will be provided for policy changes</li>
            <li>You must review and accept updated policies before proceeding with new transactions</li>
            <li>Failure to accept updated policies will restrict access to certain services</li>
          </ul><br>
          <p><strong>Contact for Clarification:</strong> If any part of this policy is unclear, please contact us at privacy@nearbyvouchers.com before using our services.</p><br>
        </section>
        <hr class="my-6 border-gray-300">
        <section>
          <p><strong>Document Information:</strong></p><br>
          <ul class="list-disc pl-6 space-y-1">
              <li><strong>Last Updated:</strong>June 4, 2025</li>
              <li><strong>Version:</strong> 2.0</li>
              <li><strong>Next Review Date:</strong> June 4, 2026</li>
              <li><strong>Document Owner:</strong> AJL Gulf Group LLC</li>
          </ul>
        </section>
      </div>

@endsection
@push('scripts')
<script>
  function toggleFooterSection(sectionId) {
    const section = document.getElementById(sectionId);
    const icon = document.getElementById(`${sectionId}-icon`);
    if (section.classList.contains('hidden')) {
      section.classList.remove('hidden');
      icon.classList.remove('fa-chevron-down');
      icon.classList.add('fa-chevron-up');
    } else {
      section.classList.add('hidden');
      icon.classList.remove('fa-chevron-up');
      icon.classList.add('fa-chevron-down');
    }
  }
</script>
<script>
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const passwordToggle = document.getElementById('passwordToggle');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            passwordToggle.classList.remove('fa-eye');
            passwordToggle.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            passwordToggle.classList.remove('fa-eye-slash');
            passwordToggle.classList.add('fa-eye');
        }
    }
</script>
<script>
  const toggle = document.getElementById("mobile-menu-toggle");
  const menu = document.getElementById("mobile-menu"); // Ensure this matches the id in the HTML
  toggle.addEventListener("click", () => {
    menu.classList.toggle("hidden");
  });
</script>

<script>
  const dropdown = document.getElementById("dropdown");

  function showDropdown() {
    dropdown.classList.remove("hidden");
  }

  function toggleDropdown() {
    dropdown.classList.toggle("hidden");
  }

  // Hide dropdown when clicking outside
  document.addEventListener("click", (event) => {
    if (
      !event.target.closest("#dropdown") &&
      !event.target.closest("#search-input") &&
      !event.target.closest("button")
    ) {
      dropdown.classList.add("hidden");
    }
  });
</script>
@endpush