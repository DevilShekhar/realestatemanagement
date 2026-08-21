@extends('layouts.app')

@section('title', 'Privacy Policy')

@section('content')

<style>
    .legal-page {
        background: #f7f9fc;
        padding-bottom: 90px;
    }

    /* Breadcrumb */
    .legal-breadcrumb {
        position: relative;
        min-height: 300px;
        display: flex;
        align-items: center;
        background-size: cover;
        background-position: center;
        overflow: hidden;
    }

    .legal-breadcrumb::before {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(
            90deg,
            rgba(8, 25, 55, .93),
            rgba(8, 25, 55, .72)
        );
    }

    .legal-breadcrumb-content {
        position: relative;
        z-index: 2;
    }

    .legal-breadcrumb-content .eyebrow {
        color: #f4b942;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: uppercase;
        margin-bottom: 12px;
    }

    .legal-breadcrumb-content h1 {
        color: #fff;
        font-size: 46px;
        font-weight: 700;
        margin: 0 0 15px;
    }

    .legal-breadcrumb-content p {
        color: rgba(255,255,255,.80);
        font-size: 16px;
        max-width: 650px;
        margin: 0;
        line-height: 1.7;
    }

    .breadcrumb-links {
        margin-top: 22px;
    }

    .breadcrumb-links a,
    .breadcrumb-links span {
        color: #fff;
        font-size: 14px;
        text-decoration: none;
    }

    .breadcrumb-links .separator {
        margin: 0 10px;
        opacity: .5;
    }

    .breadcrumb-links .active {
        color: #f4b942;
    }

    /* Content */
    .legal-content-wrapper {
         position: relative;
        z-index: 5;
    }

    .legal-card {
        background: #fff;
        border-radius: 14px;
        padding: 50px;
        box-shadow: 0 15px 45px rgba(22, 38, 65, .08);
    }

    .legal-intro {
        padding-bottom: 30px;
        margin-bottom: 35px;
        border-bottom: 1px solid #edf0f5;
    }

    .legal-label {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: #f4b942;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        margin-bottom: 12px;
    }

    .legal-label span {
        font-size: 9px;
    }

    .legal-intro h2 {
        color: #17233c;
        font-size: 32px;
        font-weight: 700;
        margin: 0 0 12px;
    }

    .last-updated {
        color: #8a93a3;
        font-size: 13px;
        margin: 0;
    }

    /* Sections */
    .legal-section {
        margin-bottom: 35px;
    }
  

    .legal-section:last-child {
        margin-bottom: 0;
    }

    .legal-section h3 {
        color: #17233c;
        font-size: 22px;
        font-weight: 700;
        margin: 0 0 14px;
    }

    .legal-section h4 {
        color: #27344d;
        font-size: 17px;
        font-weight: 700;
        margin: 22px 0 10px;
    }

    .legal-section p {
        color: #667085;
        font-size: 15px;
        line-height: 1.9;
        margin-bottom: 14px;
    }

  /* Privacy Policy Bullet Lists */
    .legal-section ul {
        display: block;
        margin: 12px 0 18px;
        padding-left: 25px !important;
        list-style: disc !important;
    }

    .legal-section ul li {
        display: list-item !important;
        color: #667085;
        font-size: 15px;
        line-height: 1.9;
        margin-bottom: 7px;
        list-style-type: disc !important;
    }

 
    .legal-section a {
        color: #17233c;
        font-weight: 600;
        text-decoration: none;
    }

    .legal-section a:hover {
        color: #f4b942;
    }

    /* Highlight Box */
    .legal-highlight {
        background: #f8f9fb;
        border-left: 4px solid #f4b942;
        border-radius: 8px;
        padding: 20px 22px;
        margin: 20px 0;
    }

    .legal-highlight p {
        margin: 0;
    }

    /* Table */
    .privacy-table-wrapper {
        overflow-x: auto;
        margin: 20px 0;
    }

    .privacy-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 650px;
    }

    .privacy-table th {
        background: #17233c;
        color: #fff;
        text-align: left;
        padding: 14px 16px;
        font-size: 14px;
        font-weight: 600;
    }

    .privacy-table td {
        border: 1px solid #e8ebf0;
        padding: 14px 16px;
        color: #667085;
        font-size: 14px;
        line-height: 1.7;
        vertical-align: top;
    }

    .privacy-table tr:nth-child(even) td {
        background: #fafbfc;
    }

    /* Sidebar */
    .legal-sidebar {
        position: sticky;
        top: 30px;
    }

    .legal-nav {
        background: #fff;
        border-radius: 14px;
        padding: 25px;
        box-shadow: 0 15px 40px rgba(22, 38, 65, .07);
    }

    .legal-nav h4 {
        color: #17233c;
        font-size: 18px;
        font-weight: 700;
        margin: 0 0 18px;
    }

    .legal-nav a {
        display: block;
        padding: 10px 0;
        color: #667085;
        font-size: 14px;
        text-decoration: none;
        border-bottom: 1px solid #edf0f5;
        transition: all .2s ease;
    }

    .legal-nav a:last-child {
        border-bottom: 0;
    }

    .legal-nav a:hover {
        color: #f4b942;
        padding-left: 5px;
    }

    .contact-box {
        background: #17233c;
        border-radius: 14px;
        padding: 28px;
        margin-top: 20px;
    }

    .contact-box h4 {
        color: #fff;
        font-size: 20px;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .contact-box p {
        color: rgba(255,255,255,.70);
        font-size: 14px;
        line-height: 1.7;
        margin-bottom: 18px;
    }

    .contact-box a {
        color: #f4b942;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
    }

    /* Responsive */
    @media (max-width: 991px) {

        .legal-breadcrumb {
            min-height: 270px;
        }

        .legal-breadcrumb-content h1 {
            font-size: 38px;
        }

        .legal-content-wrapper {
            margin-top: -25px;
        }

        .legal-card {
            padding: 35px;
            margin-bottom: 25px;
        }

        .legal-sidebar {
            position: static;
        }
    }

    @media (max-width: 767px) {

        .legal-page {
            padding-bottom: 60px;
        }

        .legal-breadcrumb {
            min-height: 240px;
        }

        .legal-breadcrumb-content h1 {
            font-size: 31px;
        }

        .legal-breadcrumb-content p {
            font-size: 14px;
        }

        .legal-card {
            padding: 25px 20px;
        }

        .legal-intro h2 {
            font-size: 26px;
        }

        .legal-section h3 {
            font-size: 20px;
        }

        .legal-section p,
        .legal-section ul li {
            font-size: 14px;
        }
    }
</style>
    <section class="legal-breadcrumb"  style="background-image: url('{{ asset('assets/frontend/images/resources/breadcrumb-bg.jpg') }}');">
        <div class="container">

            <div class="legal-breadcrumb-content">

                <div class="eyebrow">
                    Legal Information
                </div>

                <h1>Privacy Policy</h1>

                <p>
                    Learn how we collect, use, protect and manage your
                    personal information when you use our website and services.
                </p>

                <div class="breadcrumb-links">

                    <a href="{{ route('frontend.home') }}">
                        Home
                    </a>

                    <span class="separator">/</span>

                    <span class="active">
                        Privacy Policy
                    </span>

                </div>

            </div>

        </div>

    </section>   
    <section class="legal-content-wrapper py-4">
        <div class="container">
            <div class="row">              
                <div class="col-xl-8 col-lg-8">
                    <div class="legal-card">
                        <div class="legal-intro">
                            <div class="legal-label">
                                <span>●</span>
                                Privacy & Security
                            </div>

                            <h2>
                                Privacy Policy
                            </h2>

                            <p class="last-updated">
                                <strong>Last Updated:</strong> 21 August 2026
                            </p>
                        </div>

                        <div class="legal-section">
                            <h3>Welcome to Kalp Realty</h3>

                            <p>
                                Kalp Realty is a property discovery and listing platform focused
                                primarily on <strong>Pune and Mumbai</strong>. Our platform helps users
                                explore properties for <strong>buying, selling, renting and resale</strong>,
                                while also allowing property owners, sellers, agents, builders and
                                developers to list and manage their properties.
                            </p>

                            <p>
                                This Privacy Policy explains how Kalp Realty collects, uses, stores
                                and shares your information when you use our website and services.
                            </p>

                            <p>
                                By accessing or using the Kalp Realty website, you agree to this
                                Privacy Policy.
                            </p>
                        </div>
                        
                        <div class="legal-section">
                            <h3>1. Information We Collect</h3>

                            <p>
                                Depending on how you use Kalp Realty, we may collect the following
                                information.
                            </p>

                            <h4>Personal Information</h4>

                            <ul>
                                <li>Full Name</li>
                                <li>Mobile Number</li>
                                <li>Email Address</li>
                                <li>City and Preferred Location</li>
                                <li>Account Information</li>
                                <li>Login and Authentication Details</li>
                                <li>Profile Information</li>
                            </ul>

                            <h4>Property Requirement Information</h4>

                            <p>
                                When you search for or enquire about a property, we may collect
                                information such as:
                            </p>
                            

                            <ul>
                                <li>Property Type</li>
                                <li>Preferred Location</li>
                                <li>Budget</li>
                                <li>Property Purpose</li>
                                <li>Residential or Commercial Requirements</li>
                                <li>Other Information You Voluntarily Provide</li>
                            </ul>                            
                            <h4>Property Listing Information</h4>
                            <p>
                                If you list a property on Kalp Realty, we may collect:
                            </p>
                            <ul>
                                <li>Property Type</li>
                                <li>Property Category</li>
                                <li>Property Purpose, such as Sale, Rent or Resale</li>
                                <li>Property Location</li>
                                <li>Property Area</li>
                                <li>Expected Price or Rent</li>
                                <li>Property Description</li>
                                <li>Property Features and Amenities</li>
                                <li>Property Images and Videos</li>
                                <li>Contact Details</li>
                            </ul>
                            <h4>Technical Information</h4>
                            <p>
                                When you use our website, we may automatically collect certain
                                information, including:
                            </p>
                            <ul>
                                <li>IP Address</li>
                                <li>Browser Type</li>
                                <li>Device Information</li>
                                <li>Operating System</li>
                                <li>Pages Visited</li>
                                <li>Date and Time of Access</li>
                                <li>Website Usage Information</li>
                                <li>Cookies and Similar Technologies</li>
                            </ul>
                        </div>
                        <div class="legal-section">
                            <h3>2. How We Use Your Information</h3>
                            <p>
                                We may use your information to:
                            </p>
                            <ul>
                                <li>Create and manage your account</li>
                                <li>Help you search and explore properties</li>
                                <li>Allow you to list and manage properties</li>
                                <li>Process property enquiries</li>
                                <li>
                                    Connect property seekers with relevant property owners,
                                    sellers, agents or builders
                                </li>
                                <li>Contact you regarding your enquiry or account</li>
                                <li>Improve our website and services</li>
                                <li>Provide customer support</li>
                                <li>Maintain the security of our platform</li>
                                <li>Detect and prevent fraudulent or unlawful activities</li>
                                <li>Send important service-related communications</li>
                                <li>
                                    Send promotional or marketing communications, where permitted
                                </li>
                            </ul>
                        </div>
                        <div class="legal-section">
                            <h3>3. How We Share Your Information</h3>
                            <p>
                                Kalp Realty may share relevant information with:
                            </p>
                            <ul>
                                <li>Property Owners</li>
                                <li>Sellers</li>
                                <li>Landlords</li>
                                <li>Real Estate Agents</li>
                                <li>Property Consultants</li>
                                <li>Builders and Developers</li>
                                <li>Authorised Representatives</li>
                                <li>Service Providers supporting our platform</li>
                                <li>
                                    Government or Regulatory Authorities, where required by law
                                </li>
                            </ul>
                            <h4>Property Enquiries</h4>
                            <p>
                                When you submit an enquiry for a property, your relevant contact
                                details and enquiry information may be shared with the person or
                                organisation responsible for that property listing.
                            </p>
                            <p>
                                This helps them contact you regarding your property requirement.
                            </p>
                            <h4>Property Listings</h4>
                            <p>
                                Information that you choose to publish in your property listing
                                may be visible to visitors and users of the Kalp Realty platform.
                            </p>
                            <div class="legal-highlight">
                                <p>
                                    Please do not publish confidential or unnecessary personal
                                    information in your public property listing.
                                </p>
                            </div>
                        </div>
                        <div class="legal-section">
                            <h3>4. Cookies</h3>
                            <p>
                                Kalp Realty may use cookies and similar technologies to:
                            </p>
                            <ul>
                                <li>Improve website functionality</li>
                                <li>Remember your preferences</li>
                                <li>Understand website usage</li>
                                <li>Analyse website traffic</li>
                                <li>Improve user experience</li>
                                <li>Support security features</li>
                            </ul>
                            <div class="legal-highlight">
                                <p>
                                    You may manage or disable cookies through your browser settings.
                                    However, some website features may not work properly if certain
                                    cookies are disabled.
                                </p>
                            </div>
                        </div>
                        <div class="legal-section">
                            <h3>5. Data Security</h3>
                            <p>
                                We take reasonable steps to protect the information under our
                                control from unauthorised access, misuse, loss or disclosure.
                            </p>
                            <p>
                                However, no method of data transmission or storage over the
                                internet is completely secure. Therefore, we cannot guarantee
                                absolute security of your information.
                            </p>
                            <div class="legal-highlight">
                                <p>
                                    You are responsible for keeping your login credentials
                                    confidential.
                                </p>
                            </div>
                        </div>
                        <div class="legal-section">
                            <h3>6. Data Retention</h3>
                            <p>
                                We may retain your information for as long as reasonably necessary
                                to:
                            </p>
                            <ul>
                                <li>Provide our services</li>
                                <li>Maintain your account</li>
                                <li>Manage property listings and enquiries</li>
                                <li>Meet legal or regulatory requirements</li>
                                <li>Resolve disputes</li>
                                <li>Prevent fraud or misuse</li>
                                <li>Enforce our Terms &amp; Conditions</li>
                            </ul>
                        </div>
                        <div class="legal-section">
                            <h3>7. Your Rights and Choices</h3>
                            <p>
                                Subject to applicable law, you may contact us regarding:
                            </p>
                            <ul>
                                <li>Updating your personal information</li>
                                <li>Correcting inaccurate information</li>
                                <li>Deleting your account</li>
                                <li>Requesting deletion of certain personal information</li>
                                <li>Withdrawing applicable consent</li>
                                <li>Privacy-related questions or concerns</li>
                            </ul>
                            <div class="legal-highlight">
                                <p>
                                    We may need to verify your identity before processing certain
                                    requests.
                                </p>
                            </div>
                            <div class="legal-section">
                                <h3>8. Third-Party Websites</h3>
                                <p>
                                    Kalp Realty may contain links to third-party websites or services.
                                </p>
                                <p>
                                    We are not responsible for the privacy practices, content or
                                    policies of third-party websites. We recommend reviewing their
                                    privacy policies before sharing your information.
                                </p>
                            </div>
                            <div class="legal-section">
                                <h3>9. Changes to This Privacy Policy</h3>
                                <p>
                                    Kalp Realty may update this Privacy Policy from time to time.
                                </p>
                                <p>
                                    Any changes will be posted on this page along with an updated
                                    <strong>Last Updated</strong> date.
                                </p>
                            </div>
                            <div class="legal-section">
                                <h3>10. Contact Us</h3>
                                <p>
                                    If you have any questions regarding this Privacy Policy or your
                                    personal information, please contact us:
                                </p>
                                <div class="legal-highlight">
                                    <p>
                                        <strong>Kalp Realty</strong>
                                        <br>
                                        <strong>Email:</strong> [Insert Email Address]
                                        <br>
                                        <strong>Phone:</strong> [Insert Phone Number]
                                        <br>
                                        <strong>Address:</strong> [Insert Business Address]
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>               
                <div class="col-xl-4 col-lg-4">
                    <div class="legal-sidebar">
                        <div class="legal-nav">
                            <h4>
                                Legal Information
                            </h4>
                            <a href="{{ route('frontend.privacy') }}">
                                Privacy Policy
                            </a>
                            <a href="{{ route('frontend.terms') }}">
                                Terms & Conditions
                            </a>
                            <a href="{{ route('frontend.disclaimer') }}">
                                Disclaimer
                            </a>
                        </div>
                        <div class="contact-box">
                            <h4>
                                Need Help?
                            </h4>
                            <p>
                                If you have any questions about our privacy
                                practices or how we handle your information,
                                our team is here to help.
                            </p>
                            <a href="{{ route('frontend.contact') }}">
                                Contact Us →
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection