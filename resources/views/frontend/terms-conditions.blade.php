@extends('layouts.app')

@section('title', 'Terms & Conditions')

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
    <section class="legal-breadcrumb" style="background-image: url('{{ asset('assets/frontend/images/resources/breadcrumb-bg.jpg') }}');">
        <div class="container">
            <div class="legal-breadcrumb-content">
                <div class="eyebrow">
                    Legal Information
                </div>
                <h1>Terms & Conditions</h1>
                <p>
                    Please read these terms carefully before accessing or
                    using our website and services.
                </p>
                <div class="breadcrumb-links">
                    <a href="{{ route('frontend.home') }}">
                        Home
                    </a>
                    <span class="separator">/</span>
                    <span class="active">
                        Terms & Conditions
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
                                Terms of Use
                            </div>

                            <h2>
                                Terms & Conditions
                            </h2>

                            <p class="last-updated">
                                <strong>Last Updated: 21 August 2026</strong>
                            </p>

                        </div>


                        <div class="legal-section">

                            <h3>Welcome to Kalp Realty</h3>

                            <p>
                                These Terms &amp; Conditions govern your use of the Kalp Realty
                                website, services, property listings and related features.
                            </p>

                            <p>
                                By accessing or using Kalp Realty, you agree to comply with these
                                Terms &amp; Conditions.
                            </p>

                        </div>


                        <div class="legal-section">

                            <h3>1. About Kalp Realty</h3>

                            <p>
                                Kalp Realty is a property discovery and listing platform that helps users:
                            </p>

                            <ul>
                                <li>Search for Properties</li>
                                <li>Buy Properties</li>
                                <li>Sell Properties</li>
                                <li>Find Rental Properties</li>
                                <li>Explore Resale Properties</li>
                                <li>Discover New Projects</li>
                                <li>List Properties for Sale or Rent</li>
                                <li>Send and Receive Property Enquiries</li>
                            </ul>

                            <p>
                                Our platform may include different property categories, including:
                            </p>

                            <ul>
                                <li>Residential Properties</li>
                                <li>Commercial Properties</li>
                                <li>Resale Properties</li>
                                <li>Rental Properties</li>
                                <li>New Projects</li>
                                <li>Land &amp; Plots</li>
                                <li>Villas &amp; Bungalows</li>
                                <li>Independent Houses</li>
                                <li>Apartments &amp; Flats</li>
                                <li>Builder Floors</li>
                                <li>Office Spaces</li>
                                <li>Shops &amp; Showrooms</li>
                                <li>Industrial Properties</li>
                                <li>Warehouses &amp; Godowns</li>
                                <li>Factories</li>
                                <li>Agricultural Land</li>
                                <li>Farm Land</li>
                            </ul>

                            <p>
                                Kalp Realty primarily focuses on property opportunities in
                                <strong>Pune and Mumbai</strong>.
                            </p>

                        </div>


                        <div class="legal-section">

                            <h3>2. User Accounts</h3>

                            <p>
                                Certain features of Kalp Realty may require you to create an account.
                            </p>

                            <p>
                                You are responsible for:
                            </p>

                            <ul>
                                <li>Providing accurate information</li>
                                <li>Keeping your account details updated</li>
                                <li>Maintaining the confidentiality of your login details</li>
                                <li>Activities performed through your account</li>
                            </ul>

                            <p>
                                You must not create an account using false information or impersonate
                                another person or organisation.
                            </p>

                        </div>


                        <div class="legal-section">

                            <h3>3. Property Listings</h3>

                            <p>
                                Property owners, sellers, landlords, agents, consultants, builders,
                                developers and authorised representatives may be allowed to list
                                properties on Kalp Realty.
                            </p>

                            <p>
                                By submitting a property listing, you confirm that:
                            </p>

                            <ul>
                                <li>You have the authority to list the property</li>
                                <li>The information provided is accurate to the best of your knowledge</li>
                                <li>You have permission to use and upload the images and content</li>
                                <li>The property listing is not misleading or fraudulent</li>
                                <li>You will update important changes, including price and availability</li>
                            </ul>

                            <p>
                                Kalp Realty reserves the right to review, reject, edit, suspend or
                                remove any listing that violates these Terms or applicable laws.
                            </p>

                        </div>


                        <div class="legal-section">

                            <h3>4. Property Information</h3>

                            <p>
                                Property information displayed on Kalp Realty may be provided by
                                property owners, sellers, agents, builders, developers or other third parties.
                            </p>

                            <p>
                                Kalp Realty does not guarantee that every property listing is:
                            </p>

                            <ul>
                                <li>Accurate</li>
                                <li>Complete</li>
                                <li>Available</li>
                                <li>Current</li>
                                <li>Verified</li>
                            </ul>

                            <p>
                                Users are responsible for independently verifying property information
                                before making any decision.
                            </p>

                            <p>
                                This may include verifying:
                            </p>

                            <ul>
                                <li>Property Ownership</li>
                                <li>Legal Title</li>
                                <li>Property Documents</li>
                                <li>Seller or Owner Authority</li>
                                <li>Property Area</li>
                                <li>Price or Rent</li>
                                <li>Approvals and Permissions</li>
                                <li>RERA Registration, where applicable</li>
                                <li>Property Condition</li>
                                <li>Encumbrances or Liabilities</li>
                            </ul>

                        </div>


                        <div class="legal-section">

                            <h3>5. Property Enquiries</h3>

                            <p>
                                When you submit an enquiry regarding a property, your contact details
                                and enquiry information may be shared with the relevant:
                            </p>

                            <ul>
                                <li>Property Owner</li>
                                <li>Seller</li>
                                <li>Landlord</li>
                                <li>Agent</li>
                                <li>Builder</li>
                                <li>Developer</li>
                                <li>Authorised Representative</li>
                            </ul>

                            <p>
                                Submitting an enquiry does not guarantee:
                            </p>

                            <ul>
                                <li>Property Availability</li>
                                <li>A Response</li>
                                <li>A Sale or Rental Agreement</li>
                                <li>Reservation of the Property</li>
                            </ul>

                        </div>


                        <div class="legal-section">

                            <h3>6. No Guarantee of Transaction</h3>

                            <p>
                                Kalp Realty acts as a platform to help users discover and enquire
                                about properties.
                            </p>

                            <p>
                                Unless otherwise expressly agreed in writing, Kalp Realty is not a
                                party to any transaction between buyers, sellers, landlords, tenants,
                                agents, builders or other users.
                            </p>

                            <p>
                                Any purchase, sale, rental, lease, payment, agreement or transfer is
                                the responsibility of the parties involved.
                            </p>

                            <p>
                                Users should conduct appropriate due diligence before entering into
                                any property transaction.
                            </p>

                        </div>


                        <div class="legal-section">

                            <h3>7. Prohibited Activities</h3>

                            <p>
                                Users must not use Kalp Realty to:
                            </p>

                            <ul>
                                <li>Publish false or misleading property information</li>
                                <li>List a property without authority</li>
                                <li>Commit fraud or attempt fraudulent activity</li>
                                <li>Impersonate another person or organisation</li>
                                <li>Upload unlawful or harmful content</li>
                                <li>Violate another person's privacy or intellectual property rights</li>
                                <li>Upload viruses, malware or harmful software</li>
                                <li>Interfere with the security or functionality of the website</li>
                                <li>Use the platform for unlawful purposes</li>
                            </ul>

                        </div>


                        <div class="legal-section">

                            <h3>8. Intellectual Property</h3>

                            <p>
                                The Kalp Realty name, branding, website design, logos, text, graphics
                                and other proprietary content may belong to Kalp Realty or its licensors.
                            </p>

                            <p>
                                You may not copy, reproduce, distribute or commercially use such content
                                without appropriate permission.
                            </p>

                            <p>
                                Users remain responsible for ensuring that the content and images they
                                upload do not violate the rights of any third party.
                            </p>

                        </div>


                        <div class="legal-section">

                            <h3>9. Suspension or Termination</h3>

                            <p>
                                Kalp Realty may suspend, restrict or terminate a user's account or
                                property listing if we reasonably believe that the user has:
                            </p>

                            <ul>
                                <li>Violated these Terms &amp; Conditions</li>
                                <li>Provided misleading information</li>
                                <li>Engaged in fraudulent activity</li>
                                <li>Listed a property without authority</li>
                                <li>Created a security risk</li>
                                <li>Used the platform for unlawful purposes</li>
                            </ul>

                        </div>


                        <div class="legal-section">

                            <h3>10. Website Availability</h3>

                            <p>
                                We aim to keep Kalp Realty available and functioning properly. However,
                                we do not guarantee uninterrupted or error-free access to the website.
                            </p>

                            <p>
                                The platform may occasionally be unavailable due to:
                            </p>

                            <ul>
                                <li>Maintenance</li>
                                <li>Technical Issues</li>
                                <li>System Updates</li>
                                <li>Security Issues</li>
                                <li>Circumstances beyond our reasonable control</li>
                            </ul>

                        </div>


                        <div class="legal-section">

                            <h3>11. Limitation of Liability</h3>

                            <p>
                                To the maximum extent permitted by applicable law, Kalp Realty shall
                                not be responsible for losses or damages arising from:
                            </p>

                            <ul>
                                <li>Incorrect property information provided by third parties</li>
                                <li>Property transactions between users</li>
                                <li>Actions or conduct of property owners, buyers, sellers, tenants or agents</li>
                                <li>Property availability or condition</li>
                                <li>Legal or ownership disputes</li>
                                <li>Financial or investment decisions</li>
                                <li>Communications or agreements between users</li>
                                <li>Unauthorised or fraudulent actions by third parties</li>
                            </ul>

                            <p>
                                Nothing in these Terms excludes liability where such exclusion is not
                                permitted under applicable law.
                            </p>

                        </div>


                        <div class="legal-section">

                            <h3>12. Changes to These Terms</h3>

                            <p>
                                Kalp Realty may update these Terms &amp; Conditions from time to time.
                            </p>

                            <p>
                                The updated version will be published on this page with a revised
                                <strong>Last Updated</strong> date.
                            </p>

                        </div>


                        <div class="legal-section">

                            <h3>13. Governing Law</h3>

                            <p>
                                These Terms &amp; Conditions shall be governed by the applicable
                                laws of India.
                            </p>

                            <p>
                                Any disputes shall be subject to the appropriate jurisdiction as
                                determined under applicable law.
                            </p>

                        </div>


                        <div class="legal-section">

                            <h3>14. Contact Us</h3>

                            <p>
                                For any questions regarding these Terms &amp; Conditions, please contact:
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
                <div class="col-xl-4 col-lg-4">
                    <div class="legal-sidebar">
                        <div class="legal-nav">
                            <h4>
                                Legal Information
                            </h4>
                            <a href="{{ route('frontend.privacy') }}">
                                Privacy Policy
                            </a>
                            <a href="{{ route('frontend.terms') }}"
                               class="active">
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
                                If you have questions about our terms,
                                services or policies, please get in touch
                                with our team.
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