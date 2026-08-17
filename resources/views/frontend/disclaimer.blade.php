@extends('layouts.app')

@section('title', 'Disclaimer')

@section('content')

<style>
    .legal-page {
        background: #f7f9fc;
        padding-bottom: 90px;
    }

    /* ================================
       BREADCRUMB
    ================================= */
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

    /* ================================
       MAIN CONTENT
    ================================= */
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

    /* ================================
       SECTIONS
    ================================= */
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

    /* ================================
       HIGHLIGHT BOX
    ================================= */
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

    /* Warning */
    .legal-warning {
        background: #fff8e8;
        border: 1px solid #f4d98a;
        border-radius: 10px;
        padding: 22px;
        margin: 25px 0;
    }

    .legal-warning-title {
        color: #8a6400;
        font-size: 16px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .legal-warning p {
        color: #765c18;
        margin: 0;
    }

    /* ================================
       SIDEBAR
    ================================= */
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

    /* ================================
       RESPONSIVE
    ================================= */
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
                                Website Disclaimer
                            </h2>
                            <p class="last-updated">
                                Last Updated:
                                {{ date('F d, Y') }}
                            </p>
                        </div>
                        <div class="legal-warning">
                            <div class="legal-warning-title">
                                Please Read Carefully
                            </div>
                            <p>
                                The information provided on this website is
                                intended for general informational purposes only.
                                It should not be considered professional, legal,
                                financial, technical or other specialized advice
                                unless expressly stated otherwise.
                            </p>
                        </div>
                        <div class="legal-section">
                            <h3>1. General Information</h3>
                            <p>
                                The content published on this website is provided
                                in good faith and for general information and
                                educational purposes.
                            </p>
                            <p>
                                While we make reasonable efforts to keep the
                                information accurate and current, we do not
                                guarantee that all information is complete,
                                accurate, reliable or up to date at all times.
                            </p>
                        </div>
                        <div class="legal-section">
                            <h3>2. No Professional Advice</h3>
                            <p>
                                Nothing on this website should be interpreted
                                as professional advice unless explicitly stated.
                            </p>
                            <p>
                                Information available through the website should
                                not replace advice from a qualified professional
                                who understands your individual circumstances.
                            </p>
                            <div class="legal-highlight">
                                <p>
                                    Before making important business, financial,
                                    legal, technical or other decisions, you
                                    should obtain appropriate professional advice
                                    where necessary.
                                </p>
                            </div>
                        </div>
                        <div class="legal-section">
                            <h3>3. Accuracy of Information</h3>
                            <p>
                                We make reasonable efforts to maintain accurate
                                information on our website. However, errors,
                                omissions, outdated information or inaccuracies
                                may occasionally occur.
                            </p>
                            <p>
                                We reserve the right to correct, update or modify
                                website content at any time without necessarily
                                providing prior notice.
                            </p>
                        </div>
                        <div class="legal-section">
                            <h3>4. External Links</h3>
                            <p>
                                Our website may contain links to external
                                websites or third-party services.
                            </p>
                            <p>
                                These links may be provided for convenience or
                                additional information. We do not necessarily
                                endorse the content, products or services offered
                                by third-party websites.
                            </p>
                            <p>
                                We are not responsible for the availability,
                                accuracy, security, privacy practices or content
                                of external websites.
                            </p>
                        </div>
                        <div class="legal-section">
                            <h3>5. Third-Party Products and Services</h3>
                            <p>
                                Where third-party products, services, platforms,
                                tools or providers are referenced on our website,
                                such references do not necessarily constitute an
                                endorsement or guarantee.
                            </p>
                            <p>
                                Any transaction or interaction with a third party
                                is subject to that third party's own terms,
                                policies and conditions.
                            </p>
                        </div>
                        <div class="legal-section">
                            <h3>6. Website Availability</h3>
                            <p>
                                We make reasonable efforts to keep our website
                                operational. However, we do not guarantee that
                                the website will always be available,
                                uninterrupted, secure or error-free.
                            </p>
                            <p>
                                Access may occasionally be interrupted due to
                                maintenance, technical issues, network failures,
                                hosting problems or circumstances beyond our
                                reasonable control.
                            </p>
                        </div>
                        <div class="legal-section">
                            <h3>7. Limitation of Liability</h3>
                            <p>
                                To the maximum extent permitted by applicable law,
                                we shall not be liable for any direct, indirect,
                                incidental, special or consequential loss arising
                                from your use of, or reliance upon, information
                                provided through this website.
                            </p>
                            <p>
                                This includes, where legally permitted, loss of
                                data, business opportunities, revenue, profits
                                or other economic loss.
                            </p>
                        </div>
                        <div class="legal-section">
                            <h3>8. User Responsibility</h3>
                            <p>
                                Users are responsible for evaluating the accuracy,
                                completeness and suitability of information
                                available through the website before relying
                                upon it.
                            </p>
                            <ul>
                                <li>
                                    Verify important information before making
                                    decisions.
                                </li>
                                <li>
                                    Obtain professional advice where appropriate.
                                </li>
                                <li>
                                    Review applicable third-party terms before
                                    using external services.
                                </li>
                                <li>
                                    Maintain appropriate security when using
                                    online services.
                                </li>
                            </ul>
                        </div>
                        <div class="legal-section">
                            <h3>9. Results and Outcomes</h3>
                            <p>
                                Any examples, statements, descriptions or
                                information regarding potential results or
                                outcomes should not be interpreted as a guarantee
                                of a particular result.
                            </p>
                            <p>
                                Actual results may vary depending on individual
                                circumstances, market conditions, user actions,
                                third-party services and other factors.
                            </p>
                        </div>
                        <div class="legal-section">
                            <h3>10. Testimonials and Examples</h3>
                            <p>
                                If the website contains testimonials, case
                                studies or examples, they represent the individual
                                experiences or circumstances of the persons
                                involved.
                            </p>
                            <p>
                                Such examples should not be interpreted as a
                                guarantee that another user will experience
                                identical or similar results.
                            </p>
                        </div>
                        <div class="legal-section">
                            <h3>11. Changes to This Disclaimer</h3>
                            <p>
                                We may update this Disclaimer from time to time
                                to reflect changes to our services, website,
                                business practices or applicable requirements.
                            </p>
                            <p>
                                The updated version will be published on this
                                page with a revised "Last Updated" date.
                            </p>
                        </div>
                        <div class="legal-section">
                            <h3>12. Acceptance</h3>
                            <p>
                                By accessing or using this website, you acknowledge
                                that you have read and understood this Disclaimer
                                and agree to use the information provided at your
                                own discretion and responsibility.
                            </p>
                        </div>
                        <div class="legal-section">
                            <h3>13. Related Policies</h3>
                            <p>
                                For additional information, please review our
                                other website policies:
                            </p>
                            <ul>
                                <li>
                                    <a href="{{ route('frontend.privacy') }}">
                                        Privacy Policy
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('frontend.terms') }}">
                                        Terms & Conditions
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="legal-section">
                            <h3>14. Contact Us</h3>
                            <p>
                                If you have questions regarding this Disclaimer
                                or any information published on our website,
                                please contact us.
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