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
        max-width: 680px;
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

    /* Main */
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

    .legal-section ul,
    .legal-section ol {
        margin: 12px 0 18px;
        padding-left: 24px;
    }

    .legal-section ul li,
    .legal-section ol li {
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

    /* Highlight */
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

    .legal-nav a.active {
        color: #f4b942;
        font-weight: 700;
    }

    /* Contact Box */
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
        .legal-section ul li,
        .legal-section ol li {
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
                                Last Updated:
                                {{ date('F d, Y') }}
                            </p>
                        </div>
                        <div class="legal-section">
                            <h3>1. Acceptance of Terms</h3>
                            <p>
                                Welcome to our website. By accessing, browsing,
                                registering on, or using this website and its
                                services, you agree to be bound by these Terms
                                & Conditions.
                            </p>
                            <p>
                                If you do not agree with any part of these terms,
                                please do not use our website or services.
                            </p>
                        </div>
                        <div class="legal-section">
                            <h3>2. About Our Services</h3>
                            <p>
                                Our website provides information, features and
                                services intended for users, buyers, sellers
                                and other authorized visitors.
                            </p>
                            <p>
                                We reserve the right to modify, update, suspend
                                or discontinue any part of our website or
                                services at any time without prior notice.
                            </p>
                        </div>
                        <div class="legal-section">
                            <h3>3. User Registration</h3>
                            <p>
                                Certain features may require you to create an
                                account or provide registration information.
                            </p>
                            <p>
                                You agree that the information you provide is
                                accurate, complete and current.
                            </p>
                            <ul>
                                <li>
                                    You are responsible for maintaining the
                                    confidentiality of your account information.
                                </li>
                                <li>
                                    You are responsible for activities performed
                                    through your account.
                                </li>
                                <li>
                                    You must notify us promptly if you believe
                                    your account has been accessed without
                                    authorization.
                                </li>
                            </ul>
                        </div>
                        <div class="legal-section">
                            <h3>4. Acceptable Use</h3>
                            <p>
                                You agree to use this website only for lawful
                                purposes and in accordance with these terms.
                            </p>
                            <p>You must not:</p>
                            <ul>
                                <li>
                                    Use the website for unlawful or fraudulent
                                    activities.
                                </li>
                                <li>
                                    Attempt to gain unauthorized access to
                                    systems, accounts or data.
                                </li>
                                <li>
                                    Upload or transmit malicious software,
                                    viruses or harmful code.
                                </li>
                                <li>
                                    Interfere with the normal operation of
                                    the website.
                                </li>
                                <li>
                                    Copy, reproduce or distribute website
                                    content without appropriate authorization.
                                </li>
                                <li>
                                    Use the website in a manner that could
                                    harm other users or our business.
                                </li>
                            </ul>
                        </div>
                        <div class="legal-section">
                            <h3>5. User Content</h3>
                            <p>
                                If you submit information, comments, enquiries,
                                reviews or other content through our website,
                                you are responsible for ensuring that the
                                content is accurate and lawful.
                            </p>
                            <p>
                                You must not submit content that is unlawful,
                                misleading, defamatory, abusive, discriminatory,
                                fraudulent or infringes the rights of another
                                person.
                            </p>
                        </div>
                        <div class="legal-section">
                            <h3>6. Intellectual Property</h3>
                            <p>
                                Unless otherwise stated, all website content,
                                including text, graphics, logos, images,
                                designs, icons, software and other materials,
                                is owned by or licensed to us.
                            </p>
                            <p>
                                You may not reproduce, modify, distribute,
                                publish, sell or commercially exploit our
                                intellectual property without prior written
                                permission.
                            </p>
                        </div>
                        <div class="legal-section">
                            <h3>7. Third-Party Links and Services</h3>
                            <p>
                                Our website may contain links to websites,
                                products or services operated by third parties.
                            </p>
                            <p>
                                These links are provided for convenience only.
                                We do not necessarily endorse or control
                                third-party websites and are not responsible
                                for their content, policies or practices.
                            </p>
                        </div>
                        <div class="legal-section">
                            <h3>8. Payments and Transactions</h3>
                            <p>
                                Where our website provides payment or transaction
                                functionality, users agree to provide accurate
                                information and comply with the applicable
                                payment terms.
                            </p>
                            <p>
                                Any transaction-specific terms, pricing,
                                cancellation, refund or payment conditions
                                may be communicated separately and may apply
                                in addition to these Terms & Conditions.
                            </p>
                        </div>
                        <div class="legal-section">
                            <h3>9. Availability of the Website</h3>
                            <p>
                                We aim to keep our website available and
                                functioning properly. However, we do not
                                guarantee that the website will always be
                                available, uninterrupted, secure or error-free.
                            </p>
                            <div class="legal-highlight">
                                <p>
                                    Website availability may occasionally be
                                    affected by maintenance, technical issues,
                                    third-party services, network failures or
                                    circumstances beyond our reasonable control.
                                </p>
                            </div>
                        </div>                        
                        <div class="legal-section">
                            <h3>10. Disclaimer of Warranties</h3>
                            <p>
                                To the extent permitted by applicable law,
                                the website and its content are provided on
                                an "as available" and "as is" basis.
                            </p>
                            <p>
                                We do not guarantee that all information on
                                the website will always be complete, accurate,
                                current or suitable for every user's particular
                                requirements.
                            </p>
                        </div>
                        <div class="legal-section">
                            <h3>11. Limitation of Liability</h3>
                            <p>
                                To the maximum extent permitted by applicable
                                law, we will not be responsible for indirect,
                                incidental, special or consequential losses
                                arising from or related to your use of the
                                website or services.
                            </p>
                            <p>
                                Nothing in these terms is intended to exclude
                                liability that cannot legally be excluded
                                under applicable law.
                            </p>
                        </div>
                        <div class="legal-section">
                            <h3>12. Indemnification</h3>
                            <p>
                                To the extent permitted by applicable law,
                                you agree to indemnify and hold harmless the
                                company, its directors, employees, partners
                                and service providers from claims, losses,
                                liabilities and expenses arising from your
                                misuse of the website or violation of these
                                terms.
                            </p>
                        </div>
                        <div class="legal-section">
                            <h3>13. Suspension or Termination</h3>
                            <p>
                                We may suspend or terminate access to the
                                website or particular services if we reasonably
                                believe that a user has violated these terms,
                                applicable laws or our policies.
                            </p>
                            <p>
                                We may also suspend access where necessary to
                                protect the security or integrity of our
                                website and users.
                            </p>
                        </div>
                        <div class="legal-section">
                            <h3>14. Privacy</h3>
                            <p>
                                Your use of our website may involve the
                                collection and processing of personal information.
                                Please review our
                                <a href="{{ route('frontend.privacy') }}">
                                    Privacy Policy
                                </a>
                                for information about how we handle personal
                                data.
                            </p>
                        </div>
                        <div class="legal-section">
                            <h3>15. Changes to These Terms</h3>
                            <p>
                                We may update these Terms & Conditions from
                                time to time. Changes will become effective
                                when the revised terms are published on this
                                website unless otherwise stated.
                            </p>
                            <p>
                                Your continued use of the website after changes
                                are published constitutes your acceptance of
                                the revised terms, to the extent permitted by
                                applicable law.
                            </p>
                        </div>
                        <div class="legal-section">
                            <h3>16. Governing Law</h3>
                            <p>
                                These Terms & Conditions shall be governed by
                                and interpreted in accordance with the
                                applicable laws and regulations governing
                                your relationship with the company.
                            </p>
                            <p>
                                Any disputes arising in connection with these
                                terms shall be subject to the jurisdiction of
                                the appropriate courts or authorities as
                                determined under applicable law.
                            </p>
                        </div>
                        <div class="legal-section">
                            <h3>17. Contact Us</h3>
                            <p>
                                If you have any questions regarding these
                                Terms & Conditions, please contact us.
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