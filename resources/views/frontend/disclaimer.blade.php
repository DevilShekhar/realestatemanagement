@extends('layouts.app')

@section('title', 'Disclaimer')

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
            <h1>Disclaimer</h1>
            <p>
                Important information about the use of our website,
                content and services.
            </p>
            <div class="breadcrumb-links">
                <a href="{{ route('frontend.home') }}">
                    Home
                </a>
                <span class="separator">/</span>
                <span class="active">
                    Disclaimer
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
                            Important Notice
                        </div>

                        <h2>
                            Disclaimer
                        </h2>

                        <p class="last-updated">
                            Last Updated: 21 August 2026
                        </p>
                    </div>

                    <div class="legal-warning">
                        <div class="legal-warning-title">
                            Disclaimer
                        </div>

                        <p>
                            Kalp Realty is a property discovery and listing platform.
                        </p>

                        <p>
                            Our website is designed to help users explore and enquire about
                            properties and allow property owners, sellers, landlords, agents,
                            consultants, builders and developers to list and manage their properties.
                        </p>
                    </div>

                    <div class="legal-section">
                        <h3>1. Property Information Disclaimer</h3>

                        <p>
                            Property information displayed on Kalp Realty may be provided by
                            property owners, sellers, agents, builders, developers or other third parties.
                        </p>

                        <p>
                            While we aim to maintain useful and relevant information, Kalp Realty
                            does not guarantee that every property listing, description, image, price,
                            area, amenity, location or availability status is:
                        </p>

                        <ul>
                            <li>Accurate</li>
                            <li>Complete</li>
                            <li>Current</li>
                            <li>Verified</li>
                        </ul>

                        <p>
                            Users should independently verify all property information before making
                            any decision.
                        </p>
                    </div>

                    <div class="legal-section">
                        <h3>2. No Ownership or Title Guarantee</h3>

                        <p>
                            Unless specifically stated otherwise, a property being listed on Kalp
                            Realty does not mean that Kalp Realty has verified or guaranteed:
                        </p>

                        <ul>
                            <li>Ownership</li>
                            <li>Legal Title</li>
                            <li>Seller Authority</li>
                            <li>Property Approvals</li>
                            <li>RERA Registration</li>
                            <li>Property Boundaries</li>
                            <li>Encumbrances</li>
                            <li>Government Permissions</li>
                            <li>Legal Status</li>
                            <li>Availability</li>
                        </ul>

                        <p>
                            Users are strongly advised to conduct appropriate legal and property due
                            diligence.
                        </p>
                    </div>

                    <div class="legal-section">
                        <h3>3. No Legal, Financial or Investment Advice</h3>

                        <p>
                            The information available on Kalp Realty is provided for general
                            information and property discovery purposes only.
                        </p>

                        <p>
                            Nothing on this website should be considered as:
                        </p>

                        <ul>
                            <li>Legal Advice</li>
                            <li>Financial Advice</li>
                            <li>Investment Advice</li>
                            <li>Tax Advice</li>
                            <li>Property Valuation Advice</li>
                        </ul>

                        <p>
                            Users should consult qualified professionals before making important
                            property or financial decisions.
                        </p>
                    </div>

                    <div class="legal-section">
                        <h3>4. No Guarantee of Sale or Rental</h3>

                        <p>
                            Kalp Realty does not guarantee that:
                        </p>

                        <ul>
                            <li>A property will be sold</li>
                            <li>A property will be rented</li>
                            <li>A buyer or tenant will be found</li>
                            <li>A property listing will receive enquiries</li>
                            <li>A transaction will be completed</li>
                            <li>A property will remain available</li>
                            <li>A property will be available at the displayed price or rent</li>
                        </ul>

                        <p>
                            All property transactions depend on the discussions, negotiations,
                            agreements and decisions of the parties involved.
                        </p>
                    </div>

                    <div class="legal-section">
                        <h3>5. Third-Party Listings and Communications</h3>

                        <p>
                            Kalp Realty may allow users to connect with property owners, sellers,
                            agents, landlords, builders or other users.
                        </p>

                        <p>
                            Kalp Realty is not responsible for the statements, actions, conduct
                            or representations of third parties.
                        </p>

                        <p>
                            Users should exercise caution when:
                        </p>

                        <ul>
                            <li>Communicating with another party</li>
                            <li>Sharing personal documents</li>
                            <li>Making payments</li>
                            <li>Paying token amounts or deposits</li>
                            <li>Signing agreements</li>
                            <li>Entering into property transactions</li>
                        </ul>
                    </div>

                    <div class="legal-section">
                        <h3>6. Fraud and Payment Warning</h3>

                        <p>
                            Users should independently verify the identity and authority of the
                            person they are dealing with before making any payment.
                        </p>

                        <p>
                            Before making any property-related payment, users are advised to:
                        </p>

                        <ul>
                            <li>Verify Property Documents</li>
                            <li>Verify Ownership or Authority</li>
                            <li>Conduct Legal Due Diligence</li>
                            <li>Use Appropriate Written Agreements</li>
                            <li>Seek Professional Advice where required</li>
                        </ul>

                        <p>
                            Do not make payments based solely on information displayed on the
                            Kalp Realty website.
                        </p>
                    </div>

                    <div class="legal-section">
                        <h3>7. Images, Maps and Visual Content</h3>

                        <p>
                            Property photographs, videos, renderings, layouts, maps and other
                            visual materials may be provided by third parties.
                        </p>

                        <p>
                            Such content may be for illustrative purposes and may not always
                            represent:
                        </p>

                        <ul>
                            <li>The Current Condition of the Property</li>
                            <li>Exact Dimensions</li>
                            <li>Final Specifications</li>
                            <li>Actual Surroundings</li>
                            <li>Current Availability</li>
                        </ul>

                        <p>
                            Users should physically inspect and independently verify the property
                            wherever appropriate.
                        </p>
                    </div>

                    <div class="legal-section">
                        <h3>8. Price and Availability</h3>

                        <p>
                            Property prices, rents and availability may change at any time.
                        </p>

                        <p>
                            A property displayed on Kalp Realty may already be:
                        </p>

                        <ul>
                            <li>Sold</li>
                            <li>Rented</li>
                            <li>Withdrawn</li>
                            <li>Unavailable</li>
                        </ul>

                        <p>
                            Users should confirm the latest price, availability and other important
                            information with the relevant property owner, seller, agent, builder or
                            authorised representative.
                        </p>
                    </div>

                    <div class="legal-section">
                        <h3>9. Website Availability</h3>

                        <p>
                            Kalp Realty does not guarantee uninterrupted or error-free access to the
                            website.
                        </p>

                        <p>
                            The website may occasionally be unavailable due to maintenance,
                            technical problems, updates or circumstances beyond our control.
                        </p>
                    </div>

                    <div class="legal-section">
                        <h3>10. External Links</h3>

                        <p>
                            Kalp Realty may contain links to third-party websites or services.
                        </p>

                        <p>
                            We do not control or guarantee the content, availability or practices
                            of these external websites.
                        </p>
                    </div>

                    <div class="legal-section">
                        <h3>11. User Responsibility</h3>

                        <p>
                            By using Kalp Realty, you understand that buying, selling, renting or
                            investing in property may involve financial and legal risks.
                        </p>

                        <p>
                            You are responsible for your own decisions and should conduct
                            appropriate verification and due diligence before entering into any
                            property transaction.
                        </p>
                    </div>

                    <div class="legal-section">
                        <h3>Contact Us</h3>

                        <p>
                            For any questions regarding this Disclaimer, please contact:
                        </p>

                        <div class="legal-highlight">
                            <p>
                                <strong>Kalp Realty</strong>
                                <br><br>

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

                        <a href="{{ route('frontend.terms') }}">
                            Terms & Conditions
                        </a>

                        <a href="{{ route('frontend.disclaimer') }}"
                           class="active">
                            Disclaimer
                        </a>
                    </div>

                    <div class="contact-box">
                        <h4>
                            Need Help?
                        </h4>

                        <p>
                            If you have questions about our policies,
                            services or website information, please
                            get in touch with our team.
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