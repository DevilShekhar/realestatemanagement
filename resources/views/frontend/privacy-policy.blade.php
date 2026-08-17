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

    .legal-section ul {
        margin: 12px 0 18px;
        padding-left: 22px;
    }

    .legal-section ul li {
        color: #667085;
        font-size: 15px;
        line-height: 1.9;
        margin-bottom: 7px;
    }

    .legal-section ul li::marker {
        color: #f4b942;
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
                                Our Privacy Policy
                            </h2>
                            <p class="last-updated">
                                Last Updated:
                                {{ date('F d, Y') }}
                            </p>
                        </div>
                        <div class="legal-section">
                            <h3>1. Introduction</h3>
                            <p>
                                We respect your privacy and are committed to
                                protecting the personal information you provide
                                to us. This Privacy Policy explains how we
                                collect, use, store and protect your information
                                when you visit our website or use our services.
                            </p>
                            <p>
                                By accessing or using our website, you acknowledge
                                that you have read and understood this Privacy
                                Policy.
                            </p>
                        </div>
                        <div class="legal-section">
                            <h3>2. Information We Collect</h3>
                            <p>
                                We may collect information that you voluntarily
                                provide when you register, contact us, submit a
                                form, or use our services.
                            </p>
                            <h4>Personal Information</h4>
                            <ul>
                                <li>Full name</li>
                                <li>Email address</li>
                                <li>Phone number</li>
                                <li>Business or company information</li>
                                <li>Account and registration information</li>
                                <li>Information submitted through contact forms</li>
                            </ul>
                            <h4>Technical Information</h4>
                            <ul>
                                <li>IP address</li>
                                <li>Browser type</li>
                                <li>Device information</li>
                                <li>Operating system</li>
                                <li>Website usage information</li>
                            </ul>
                        </div>
                        <div class="legal-section">
                            <h3>3. How We Use Your Information</h3>
                            <p>
                                The information we collect may be used for the
                                following purposes:
                            </p>
                            <ul>
                                <li>
                                    To provide and maintain our services.
                                </li>
                                <li>
                                    To process registrations and enquiries.
                                </li>
                                <li>
                                    To respond to your questions and requests.
                                </li>
                                <li>
                                    To improve our website and services.
                                </li>
                                <li>
                                    To communicate important service updates.
                                </li>
                                <li>
                                    To prevent fraud, misuse and unauthorized access.
                                </li>
                                <li>
                                    To comply with applicable legal requirements.
                                </li>
                            </ul>
                        </div>
                        <div class="legal-section">
                            <h3>4. Cookies</h3>
                            <p>
                                Our website may use cookies and similar technologies
                                to improve your browsing experience, understand
                                website usage and provide relevant functionality.
                            </p>
                            <div class="legal-highlight">
                                <p>
                                    You can configure your browser to refuse or
                                    restrict cookies. However, disabling certain
                                    cookies may affect some features of the website.
                                </p>
                            </div>
                        </div>                        
                        <div class="legal-section">
                            <h3>5. How We Protect Your Information</h3>
                            <p>
                                We take reasonable technical and organizational
                                measures to protect your personal information
                                against unauthorized access, alteration,
                                disclosure or destruction.
                            </p>
                            <p>
                                However, no method of transmission over the
                                Internet or method of electronic storage is
                                completely secure. Therefore, we cannot guarantee
                                absolute security.
                            </p>
                        </div>
                        <div class="legal-section">
                            <h3>6. Sharing of Information</h3>
                            <p>
                                We do not sell or rent your personal information.
                                We may share information with trusted service
                                providers where necessary to operate our website
                                and provide our services.
                            </p>
                            <p>
                                Information may also be disclosed where required
                                by applicable law, regulation, legal process or
                                governmental request.
                            </p>
                        </div>
                        <div class="legal-section">
                            <h3>7. Data Retention</h3>
                            <p>
                                We retain personal information only for as long
                                as reasonably necessary to fulfill the purposes
                                described in this Privacy Policy, comply with
                                legal obligations, resolve disputes and enforce
                                our agreements.
                            </p>
                        </div>
                        <div class="legal-section">
                            <h3>8. Your Rights</h3>
                            <p>
                                Depending on applicable laws, you may have certain
                                rights regarding your personal information,
                                including the ability to:
                            </p>
                            <ul>
                                <li>Request access to your personal information.</li>
                                <li>Request correction of inaccurate information.</li>
                                <li>Request deletion where legally applicable.</li>
                                <li>Withdraw consent where applicable.</li>
                                <li>Ask questions about how your information is used.</li>
                            </ul>
                        </div>
                        <div class="legal-section">
                            <h3>9. Third-Party Links</h3>
                            <p>
                                Our website may contain links to third-party
                                websites or services. We are not responsible for
                                the privacy practices, policies or content of
                                those third-party websites.
                            </p>
                            <p>
                                We recommend reviewing the privacy policy of any
                                third-party website you visit.
                            </p>
                        </div>
                        <div class="legal-section">
                            <h3>10. Children's Privacy</h3>
                            <p>
                                Our services are not intended to knowingly collect
                                personal information from children where such
                                collection is prohibited by applicable law.
                            </p>
                        </div>
                        <div class="legal-section">
                            <h3>11. Changes to This Privacy Policy</h3>
                            <p>
                                We may update this Privacy Policy from time to
                                time to reflect changes to our practices,
                                technology, legal requirements or services.
                            </p>
                            <p>
                                Any updated version will be published on this
                                page with a revised "Last Updated" date.
                            </p>
                        </div>
                        <div class="legal-section">
                            <h3>12. Contact Us</h3>
                            <p>
                                If you have questions, concerns or requests
                                regarding this Privacy Policy, please contact us.
                            </p>
                            <div class="legal-highlight">
                                <p>
                                    <strong>Email:</strong>
                                    <a href="mailto:info@example.com">
                                        info@example.com
                                    </a>
                                    <br>
                                    <strong>Phone:</strong>
                                    <a href="tel:+919999999999">
                                        +91 99999 99999
                                    </a>
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