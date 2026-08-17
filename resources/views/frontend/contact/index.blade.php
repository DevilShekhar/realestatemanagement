@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')

<style>
    /* ================================
       CONTACT PAGE
    ================================= */

    .contact-page {
        background: #f7f9fc;
        padding-bottom: 90px;
    }

    /* Breadcrumb */
    .contact-breadcrumb {
        position: relative;
        min-height: 320px;
        display: flex;
        align-items: center;
        background-size: cover;
        background-position: center;
        overflow: hidden;
    }

    .contact-breadcrumb::before {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(
            90deg,
            rgba(8, 25, 55, 0.92),
            rgba(8, 25, 55, 0.70)
        );
    }

    .breadcrumb-inner {
        position: relative;
        z-index: 2;
        width: 100%;
    }

    .breadcrumb-inner .small-title {
        color: #f4b942;
        font-size: 14px;
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: uppercase;
        margin-bottom: 12px;
    }

    .breadcrumb-inner h1 {
        color: #fff;
        font-size: 48px;
        font-weight: 700;
        line-height: 1.2;
        margin: 0 0 15px;
    }

    .breadcrumb-inner p {
        color: rgba(255,255,255,.80);
        font-size: 17px;
        margin: 0;
        max-width: 600px;
    }

    .breadcrumb-links {
        margin-top: 25px;
    }

    .breadcrumb-links a,
    .breadcrumb-links span {
        color: #fff;
        font-size: 14px;
        text-decoration: none;
    }

    .breadcrumb-links span {
        margin: 0 10px;
        opacity: .5;
    }

    .breadcrumb-links .active {
        color: #f4b942;
    }

    /* Main */
    .contact-main {
        margin-top: -60px;
        position: relative;
        z-index: 5;
    }

    /* Left Information */
    .contact-info-card {
        background: #fff;
        border-radius: 14px;
        padding: 42px 35px;
        box-shadow: 0 15px 45px rgba(22, 38, 65, .09);
        height: 100%;
    }

    .contact-label {
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

    .contact-info-card h2 {
        font-size: 32px;
        font-weight: 700;
        color: #17233c;
        margin-bottom: 15px;
    }

    .contact-info-card > p {
        color: #6c7688;
        font-size: 15px;
        line-height: 1.8;
        margin-bottom: 32px;
    }

    .contact-item {
        display: flex;
        align-items: flex-start;
        gap: 18px;
        padding: 20px 0;
        border-bottom: 1px solid #edf0f5;
    }

    .contact-item:last-child {
        border-bottom: 0;
        padding-bottom: 0;
    }

    .contact-icon {
        width: 50px;
        height: 50px;
        min-width: 50px;
        border-radius: 10px;
        background: #f5f7fa;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #17233c;
        font-size: 20px;
    }

    .contact-item h5 {
        margin: 0 0 5px;
        color: #17233c;
        font-size: 15px;
        font-weight: 700;
    }

    .contact-item p,
    .contact-item a {
        margin: 0;
        color: #727c8f;
        font-size: 14px;
        line-height: 1.7;
        text-decoration: none;
    }

    .contact-item a:hover {
        color: #f4b942;
    }

    /* Form */
    .contact-form-card {
        background: #fff;
        border-radius: 14px;
        padding: 42px;
        box-shadow: 0 15px 45px rgba(22, 38, 65, .09);
        height: 100%;
    }

    .form-heading {
        margin-bottom: 30px;
    }

    .form-heading h2 {
        font-size: 32px;
        color: #17233c;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .form-heading p {
        color: #727c8f;
        font-size: 15px;
        margin: 0;
    }

    .contact-form .form-group {
        margin-bottom: 22px;
    }

    .contact-form label {
        display: block;
        color: #17233c;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 9px;
    }

    .contact-form .form-control {
        width: 100%;
        height: 54px;
        border: 1px solid #e2e6ed;
        border-radius: 8px;
        background: #fbfcfe;
        padding: 0 16px;
        color: #17233c;
        font-size: 14px;
        box-shadow: none;
        transition: all .25s ease;
    }

    .contact-form textarea.form-control {
        height: 145px;
        padding: 15px 16px;
        resize: vertical;
    }

    .contact-form .form-control:focus {
        border-color: #f4b942;
        background: #fff;
        box-shadow: 0 0 0 3px rgba(244,185,66,.10);
        outline: none;
    }

    .contact-form .form-control::placeholder {
        color: #a2a9b5;
    }

    .contact-submit {
        height: 54px;
        padding: 0 30px;
        border: 0;
        border-radius: 8px;
        background: #17233c;
        color: #fff;
        font-size: 14px;
        font-weight: 700;
        cursor: pointer;
        transition: all .25s ease;
    }

    .contact-submit:hover {
        background: #f4b942;
        color: #17233c;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(244,185,66,.22);
    }

    .contact-submit i {
        margin-left: 10px;
    }

    /* Map */
    .map-section {
        margin-top: 70px;
    }

    .map-heading {
        text-align: center;
        margin-bottom: 30px;
    }

    .map-heading .contact-label {
        justify-content: center;
    }

    .map-heading h2 {
        color: #17233c;
        font-size: 34px;
        font-weight: 700;
        margin: 0 0 10px;
    }

    .map-heading p {
        color: #727c8f;
        margin: 0;
    }

    .map-wrapper {
        background: #fff;
        padding: 8px;
        border-radius: 14px;
        box-shadow: 0 15px 40px rgba(22, 38, 65, .08);
        overflow: hidden;
    }

    .map-wrapper iframe {
        width: 100%;
        height: 400px;
        border: 0;
        border-radius: 10px;
        display: block;
    }

    /* Alert */
    .contact-alert {
        padding: 14px 18px;
        border-radius: 8px;
        margin-bottom: 25px;
        font-size: 14px;
    }

    /* Responsive */
    @media (max-width: 991px) {

        .contact-breadcrumb {
            min-height: 280px;
        }

        .breadcrumb-inner h1 {
            font-size: 38px;
        }

        .contact-main {
            margin-top: -30px;
        }

        .contact-info-card {
            margin-bottom: 25px;
        }
    }

    @media (max-width: 767px) {

        .contact-page {
            padding-bottom: 60px;
        }

        .contact-breadcrumb {
            min-height: 250px;
        }

        .breadcrumb-inner h1 {
            font-size: 32px;
        }

        .breadcrumb-inner p {
            font-size: 14px;
        }

        .contact-info-card,
        .contact-form-card {
            padding: 28px 22px;
        }

        .contact-info-card h2,
        .form-heading h2 {
            font-size: 26px;
        }

        .map-heading h2 {
            font-size: 28px;
        }

        .map-wrapper iframe {
            height: 300px;
        }
    }
</style>


<div class="contact-page">

    {{-- ============================
         BREADCRUMB
    ============================= --}}
    <section class="contact-breadcrumb"
        style="background-image: url('{{ asset('assets/frontend/images/resources/breadcrumb-bg.jpg') }}');">

        <div class="container">
            <div class="breadcrumb-inner">

                <div class="small-title">
                    Get In Touch
                </div>

                <h1>Contact Us</h1>

                <p>
                    Have a question or need assistance?
                    Our team is here to help you.
                </p>

                <div class="breadcrumb-links">
                    <a href="{{ route('frontend.home') }}">Home</a>

                    <span>/</span>

                    <span class="active">Contact Us</span>
                </div>

            </div>
        </div>

    </section>


    {{-- ============================
         CONTACT MAIN
    ============================= --}}
    <section class="contact-main">

        <div class="container">

            <div class="row g-4">

                {{-- LEFT --}}
                <div class="col-xl-5 col-lg-5">

                    <div class="contact-info-card">

                        <div class="contact-label">
                            <span>●</span>
                            Contact Information
                        </div>

                        <h2>
                            Let's Start a Conversation
                        </h2>

                        <p>
                            Whether you have a question, need more information,
                            or want to discuss a business opportunity, our team
                            is ready to assist you.
                        </p>


                        {{-- Address --}}
                        <div class="contact-item">

                            <div class="contact-icon">
                                <i class="fa fa-map-marker"></i>
                            </div>

                            <div>
                                <h5>Our Location</h5>

                                <p>
                                    Your Company Address,<br>
                                    Pune, Maharashtra, India
                                </p>
                            </div>

                        </div>


                        {{-- Phone --}}
                        <div class="contact-item">

                            <div class="contact-icon">
                                <i class="fa fa-phone"></i>
                            </div>

                            <div>
                                <h5>Phone Number</h5>

                                <a href="tel:+919999999999">
                                    +91 99999 99999
                                </a>
                            </div>

                        </div>


                        {{-- Email --}}
                        <div class="contact-item">

                            <div class="contact-icon">
                                <i class="fa fa-envelope"></i>
                            </div>

                            <div>
                                <h5>Email Address</h5>

                                <a href="mailto:info@example.com">
                                    info@example.com
                                </a>
                            </div>

                        </div>


                        {{-- Working Hours --}}
                        <div class="contact-item">

                            <div class="contact-icon">
                                <i class="fa fa-clock-o"></i>
                            </div>

                            <div>
                                <h5>Working Hours</h5>

                                <p>
                                    Monday – Saturday<br>
                                    9:00 AM – 6:00 PM
                                </p>
                            </div>

                        </div>

                    </div>

                </div>


                {{-- RIGHT --}}
                <div class="col-xl-7 col-lg-7">

                    <div class="contact-form-card">

                        <div class="form-heading">

                            <div class="contact-label">
                                <span>●</span>
                                Send a Message
                            </div>

                            <h2>
                                How Can We Help?
                            </h2>

                            <p>
                                Fill out the form below and our team will
                                get back to you as soon as possible.
                            </p>

                        </div>


                        {{-- Success Message --}}
                        @if(session('success'))

                            <div class="alert alert-success contact-alert">
                                {{ session('success') }}
                            </div>

                        @endif


                        {{-- Form --}}
                        <form
                            action="{{ route('frontend.contact.store') }}"  method="POST"   class="contact-form">

                            @csrf

                            <div class="row">

                                {{-- Name --}}
                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label for="name">
                                            Full Name *
                                        </label>

                                        <input
                                            type="text"
                                            name="name"
                                            id="name"
                                            class="form-control"
                                            placeholder="Enter your full name"
                                            value="{{ old('name') }}"
                                            required
                                        >

                                        @error('name')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror

                                    </div>

                                </div>


                                {{-- Email --}}
                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label for="email">
                                            Email Address *
                                        </label>

                                        <input
                                            type="email"
                                            name="email"
                                            id="email"
                                            class="form-control"
                                            placeholder="Enter your email"
                                            value="{{ old('email') }}"
                                            required
                                        >

                                        @error('email')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror

                                    </div>

                                </div>


                                {{-- Phone --}}
                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label for="phone">
                                            Phone Number
                                        </label>

                                        <input
                                            type="text"
                                            name="phone"
                                            id="phone"
                                            class="form-control"
                                            placeholder="Enter your phone number"
                                            value="{{ old('phone') }}"
                                        >

                                        @error('phone')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror

                                    </div>

                                </div>


                                {{-- Subject --}}
                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label for="subject">
                                            Subject *
                                        </label>

                                        <input
                                            type="text"
                                            name="subject"
                                            id="subject"
                                            class="form-control"
                                            placeholder="What can we help you with?"
                                            value="{{ old('subject') }}"
                                            required
                                        >

                                        @error('subject')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror

                                    </div>

                                </div>


                                {{-- Message --}}
                                <div class="col-md-12">

                                    <div class="form-group">

                                        <label for="message">
                                            Your Message *
                                        </label>

                                        <textarea
                                            name="message"
                                            id="message"
                                            class="form-control"
                                            placeholder="Write your message here..."
                                            required
                                        >{{ old('message') }}</textarea>

                                        @error('message')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror

                                    </div>

                                </div>


                                {{-- Submit --}}
                                <div class="col-md-12">

                                    <button
                                        type="submit"
                                        class="contact-submit">

                                        Send Message

                                        <i class="fa fa-arrow-right"></i>

                                    </button>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- ============================
         MAP
    ============================= --}}
    <section class="map-section">

        <div class="container">

            <div class="map-heading">

                <div class="contact-label">
                    <span>●</span>
                    Find Us
                </div>

                <h2>
                    Visit Our Office
                </h2>

                <p>
                    We would be happy to meet you at our office.
                </p>

            </div>


            <div class="map-wrapper">

                <iframe
                    src="https://www.google.com/maps?q=Pune,Maharashtra,India&output=embed"
                    loading="lazy"
                    allowfullscreen>
                </iframe>

            </div>

        </div>

    </section>

</div>

@endsection