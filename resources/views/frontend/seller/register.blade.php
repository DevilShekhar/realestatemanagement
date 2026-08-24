@extends('layouts.app')

@section('content')
<style>
.seller-hero-section {
    position: relative;
    width: 100%;
    background: #101827;
    overflow: hidden;
    padding: 30px 0 28px;
}
.seller-hero-section .container {
    max-width: 1180px;
}
.seller-hero-row {
    display: flex;
    align-items: center;
}
.seller-hero-content {
    padding: 0 20px 0 0;
}
.seller-hero-title {
    margin: 0;
    padding: 0;
}
.seller-hero-title h1 {
    margin: 0;
    color: #ffffff;
    font-size: 58px;
    line-height: 1.05;
    font-weight: 800;
    letter-spacing: -1.5px;
}
.seller-hero-title .free-text {
    display: block;
    margin-top: 5px;
    color: #ffd21c;
    font-size: 58px;
    line-height: 1.05;
    font-weight: 800;
    letter-spacing: -1.5px;
}
.seller-yellow-line {
    position: relative;
    width: 375px;
    max-width: 100%;
    height: 7px;
    margin-top: 15px;
    background: #ffd21c;
}
.seller-yellow-line:before {
    content: "";
    position: absolute;
    left: 0;
    bottom: -5px;
    width: 90px;
    height: 2px;
    background: #ffd21c;
    transform: rotate(-1deg);
}
.seller-hero-description {
    margin-top: 45px;
    max-width: 670px;
}
.seller-hero-description p {
    margin: 0;
    color: #ffffff;
    font-size: 20px;
    line-height: 1.7;
    font-weight: 400;
}
.seller-benefits {
    margin: 25px 0 0;
    padding: 0;
    list-style: none;
}
.seller-benefits li {
    display: flex;
    align-items: center;
    margin-bottom: 13px;
    color: #ffffff;
    font-size: 18px;
    line-height: 1.5;
}
.seller-benefits li:last-child {
    margin-bottom: 0;
}
.seller-benefits li i {
    width: 18px;
    height: 18px;
    margin-right: 14px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    color: #101827;
    background: #ffffff;
    border-radius: 50%;
    font-size: 11px;
}
.seller-stats {
    display: flex;
    width: 100%;
    max-width: 750px;
    margin-top: 55px;
    padding: 15px 0;
    border: 1px solid #b99a00;
    border-radius: 16px;
    background: rgba(255, 255, 255, 0.10);
}
.seller-stat {
    position: relative;
    flex: 1;
    padding: 0 25px;
}
.seller-stat:not(:last-child):after {
    content: "";
    position: absolute;
    right: 0;
    top: 5px;
    width: 1px;
    height: 70px;
    background: rgba(255, 210, 28, 0.35);
}
.seller-stat h3 {
    margin: 0;
    color: #ffffff;
    font-size: 35px;
    line-height: 1.1;
    font-weight: 800;
}
.seller-stat span {
    display: block;
    margin-top: 7px;
    color: #ffffff;
    font-size: 14px;
    line-height: 1.4;
}
.seller-hero-form-column {
    display: flex;
    justify-content: flex-end;
}
.seller-hero-card {
    width: 100%;
    max-width: 370px;
    padding: 28px 24px 24px;
    background: #ffffff;
    border-radius: 17px;
    box-shadow: 0 10px 35px rgba(0, 0, 0, 0.18);
}
.seller-hero-card h2 {
    margin: 0;
    color: #17233b;
    font-size: 21px;
    line-height: 1.25;
    text-align: center;
    font-weight: 800;
    margin-bottom: 15px;
}
.seller-hero-card .seller-form-subtitle {
    margin: 12px 0 24px;
    color: #657083;
    font-size: 15px;
    line-height: 1.5;
}
.seller-hero-form {
    width: 100%;
}
.seller-hero-field {
    position: relative;
    width: 100%;
    margin-bottom: 14px;
}
.seller-hero-field input,
.seller-hero-field select {
    display: block;
    width: 100%;
    height: 51px;
    padding: 0 50px 0 15px;
    border: 1px solid #dedede;
    border-radius: 8px;
    background: #ffffff;
    color: #222222;
    font-size: 14px;
    line-height: 51px;
    outline: none;
    box-shadow: none;
    transition: border-color 0.2s ease;
}
.seller-hero-field input::placeholder {
    color: #777777;
    opacity: 1;
}
.seller-hero-field input:focus,
.seller-hero-field select:focus {
    border-color: #19376d;
    box-shadow: none;
}
.seller-hero-field select {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    cursor: pointer;
    color: #777777;
}
.seller-hero-field select option {
    color: #222222;
}
.seller-hero-field .seller-field-icon {
    position: absolute;
    top: 0;
    right: 0;
    width: 48px;
    height: 51px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #999999;
    font-size: 15px;
    pointer-events: none;
}
.seller-hero-field.select-field:after {
    content: "\f107";
    position: absolute;
    right: 17px;
    top: 50%;
    transform: translateY(-50%);
    font-family: "FontAwesome";
    color: #777777;
    font-size: 14px;
    pointer-events: none;
}
.seller-hero-field.select-field .seller-field-icon {
    display: none;
}
.seller-hero-register-btn {
    width: 100%;
    height: 55px;
    margin-top: 5px;
    border: 0;
    border-radius: 0;
    background: #19376d;
    color: #ffffff;
    font-size: 15px;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.25s ease;
}
.seller-hero-register-btn:hover {
    background: #102b59;
}
.seller-hero-register-btn span {
    margin-left: 8px;
    font-size: 20px;
    vertical-align: middle;
}
.seller-hero-terms {
    margin: 16px 0 0;
    padding-top: 14px;
    border-top: 1px solid #e5e5e5;
    color: #555555;
    font-size: 11px;
    line-height: 1.6;
    text-align: center;
}
.seller-hero-card .col-md-12 {
    padding-left: 0;
    padding-right: 0;
}
.seller-hero-card .row {
    margin-left: 0;
    margin-right: 0;
}
@media only screen and (max-width: 991px) {

    .seller-hero-section {
        padding: 45px 0;
    }
    .seller-hero-row {
        display: block;
    }
    .seller-hero-content {
        padding-right: 0;
        margin-bottom: 40px;
    }
    .seller-hero-form-column {
        justify-content: center;
    }
    .seller-hero-card {
        max-width: 500px;
    }
    .seller-stats {
        max-width: 100%;
    }
}
@media only screen and (max-width: 767px) {
    .seller-hero-section {
        padding: 30px 0;
    }
    .seller-hero-content {
        padding: 0 10px;
    }
    .seller-hero-title h1,
    .seller-hero-title .free-text {
        font-size: 40px;
        letter-spacing: -0.8px;
    }
    .seller-yellow-line {
        width: 280px;
        height: 5px;
    }
    .seller-hero-description {
        margin-top: 30px;
    }
    .seller-hero-description p {
        font-size: 16px;
        line-height: 1.6;
    }
    .seller-benefits {
        margin-top: 20px;
    }
    .seller-benefits li {
        font-size: 15px;
        align-items: flex-start;
    }
    .seller-stats {
        display: grid;
        grid-template-columns: 1fr 1fr;
        margin-top: 35px;
        padding: 12px 0;
    }
    .seller-stat {
        padding: 12px 15px;
    }
    .seller-stat:nth-child(2):after {
        display: none;
    }
    .seller-stat h3 {
        font-size: 27px;
    }
    .seller-stat span {
        font-size: 12px;
    }
    .seller-hero-card {
        max-width: 100%;
        padding: 24px 18px 20px;
        border-radius: 14px;
    }
    .seller-hero-card h2 {
        font-size: 24px;
    }
}
</style>
    <section class="seller-hero-section">
        <div class="container">
            <div class="row seller-hero-row">
                <div class="col-lg-8 col-md-12">
                    <div class="seller-hero-content">
                        <div class="seller-hero-title">
                            <h1>Sell or Rent Faster </h1>
                            <span class="free-text"> 100% Free.</span>
                            <div class="seller-yellow-line"></div>
                        </div>
                        <div class="seller-hero-description">
                            <p>
                                List your property in under 2 minutes and connect
                                directly with verified buyers and tenants.
                            </p>
                        </div>
                        <ul class="seller-benefits">
                            <li>
                                <i class="fa fa-check"></i>
                                <span>
                                    Free unlimited listings, zero hidden fees
                                </span>
                            </li>
                            <li>
                                <i class="fa fa-check"></i>
                                <span>
                                    Direct WhatsApp &amp; call connect with buyers
                                </span>
                            </li>
                            <li>
                                <i class="fa fa-check"></i>
                                <span>
                                    Listing visible to 8M+ active monthly users
                                </span>
                            </li>
                        </ul>
                        <div class="seller-stats">
                            <div class="seller-stat">
                                <h3>$8.4Bn</h3>
                                <span>
                                    Homes Sold
                                </span>
                            </div>
                            <div class="seller-stat">
                                <h3>3.8K+</h3>
                                <span>
                                    Properties Managed
                                </span>
                            </div>
                            <div class="seller-stat">
                                <h3>1M+</h3>
                                <span>
                                    Active Listings
                                </span>
                            </div>
                            <div class="seller-stat">
                                <h3>8M+</h3>
                                <span>
                                    Monthly Users
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="seller-hero-form-column">
                        <div class="seller-hero-card">
                            <h2>
                                List your property — Free
                            </h2>
                            <form action="{{ route('seller.register.store') }}" method="POST" class="seller-hero-form">
                                @csrf
                            
                                <div class="seller-hero-field">
                                    <input type="text" name="name"  id="hero_name" placeholder="Your Name *"  value="{{ old('name') }}" required>
                                    <div class="seller-field-icon">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                    </div>
                                    @error('name')
                                        <span class="seller-field-error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="seller-hero-field">
                                    <input type="email" name="email"  id="hero_email"  placeholder="Your Email *"  value="{{ old('email') }}" required>
                                    <div class="seller-field-icon">
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                    </div>
                                    @error('email')
                                        <span class="seller-field-error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="seller-hero-field">
                                    <input type="number" name="mobile"  id="hero_mobile"  placeholder="Your Phone Number *"  value="{{ old('mobile') }}" required>
                                    <div class="seller-field-icon">
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                    </div>
                                    @error('mobile')
                                        <span class="seller-field-error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="seller-hero-field">
                                    <input type="password" name="password" id="hero_password"  placeholder="Enter Password *" required>
                                    <div class="seller-field-icon">
                                        <i class="fa fa-lock" aria-hidden="true"></i>
                                    </div>
                                    @error('password')
                                        <span class="seller-field-error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!-- CONFIRM PASSWORD -->
                                <div class="seller-hero-field">
                                    <input type="password" name="password_confirmation" id="hero_password_confirmation"  placeholder="Confirm Password *"  required>
                                    <div class="seller-field-icon">
                                        <i class="fa fa-lock" aria-hidden="true"></i>
                                    </div>
                                    @error('password_confirmation')
                                        <span class="seller-field-error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!-- GENDER -->
                                <button type="submit" class="seller-hero-register-btn">
                                    Register Here
                                    <span>
                                        &rarr;
                                    </span>
                                </button>
                                <p class="seller-hero-terms">
                                    By continuing you agree to our terms.
                                    Your details are kept private.
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Start seller information area-->
    <section class="single-service-area">
        <div class="container">
            <div class="row">

                <!--Start left sidebar-->
                <div class="col-xl-4 col-lg-5 col-md-12 col-sm-12">
                    <div class="single-service-sidebar">

                        <!--Start contact box-->
                        <div class="sidebar-contact-box text-center">
                            <div class="inner-content">

                                <div class="icon-holder">
                                    <span class="icon-support1 text-white"></span>
                                </div>

                                <h3>
                                    Need Help?<br>
                                    Our Property Experts Are Here
                                </h3>

                                <div class="bottom-box">
                                    <h2>+888 56 78 9012</h2>
                                    <span>Email: abc@yourdomain.com</span>
                                </div>

                                <div class="button">
                                    <a class="btn-one wow slideInUp"
                                        data-wow-delay="0ms"
                                        data-wow-duration="1500ms"
                                        href="#">
                                        Contact Us
                                        <span class="flaticon-next"></span>
                                    </a>
                                </div>

                            </div>
                        </div>
                        <!--End contact box-->


                        <!--Start download box-->
                        <div class="single-sidebar">
                            <ul class="service-pack-download">
                                <li class="clearfix">

                                    <div class="title-holder">
                                        <a href="#">
                                            Seller Guide
                                            <span>(150kb)</span>
                                        </a>
                                    </div>

                                    <div class="icon-holder">
                                        <i class="fa fa-download" aria-hidden="true"></i>
                                    </div>

                                </li>
                            </ul>
                        </div>
                        <!--End download box-->

                    </div>
                </div>
                <!--End left sidebar-->


                <!--Start right content-->
                <div class="col-xl-8 col-lg-7 col-md-12 col-sm-12">

                    <div class="single-service-top">
                        <div class="text">

                            <h2>Seller Registration</h2>

                            <div class="inner">
                                <p>
                                    Register as a seller and showcase your property to genuine
                                    buyers and tenants. Our platform makes it simple to add,
                                    manage and promote your property listings.
                                </p>

                                <p>
                                    Whether you are an individual property owner, builder,
                                    developer or real estate professional, you can easily
                                    publish your residential and commercial properties.
                                </p>
                            </div>

                        </div>
                    </div>


                    <!--Start seller benefits-->
                    <div class="advantages-content">
                        <div class="row">

                            <!--Start Single Advantages Box-->
                            <div class="col-xl-3 col-lg-6 col-md-6">
                                <div class="single-advantages-box">
                                    <div class="inner">

                                        <div class="static-content">
                                            <div class="icon-holder">
                                                <span class="icon-success"></span>
                                            </div>

                                            <div class="title">
                                                <h3>
                                                    Easy<br>
                                                    Registration
                                                </h3>
                                            </div>
                                        </div>

                                        <div class="overlay-text">
                                            <div class="box">
                                                <div class="inner-text">
                                                    <p>
                                                        Create your seller account quickly
                                                        and start adding your property.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!--End Single Advantages Box-->


                            <!--Start Single Advantages Box-->
                            <div class="col-xl-3 col-lg-6 col-md-6">
                                <div class="single-advantages-box">
                                    <div class="inner">

                                        <div class="static-content">
                                            <div class="icon-holder">
                                                <span class="icon-guarantee-certificate"></span>
                                            </div>

                                            <div class="title">
                                                <h3>
                                                    Verified<br>
                                                    Listings
                                                </h3>
                                            </div>
                                        </div>

                                        <div class="overlay-text">
                                            <div class="box">
                                                <div class="inner-text">
                                                    <p>
                                                        Provide accurate property details
                                                        and build trust with potential buyers.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!--End Single Advantages Box-->


                            <!--Start Single Advantages Box-->
                            <div class="col-xl-3 col-lg-6 col-md-6">
                                <div class="single-advantages-box">
                                    <div class="inner">

                                        <div class="static-content">
                                            <div class="icon-holder">
                                                <span class="icon-hr"></span>
                                            </div>

                                            <div class="title">
                                                <h3>
                                                    Expert<br>
                                                    Support
                                                </h3>
                                            </div>
                                        </div>

                                        <div class="overlay-text">
                                            <div class="box">
                                                <div class="inner-text">
                                                    <p>
                                                        Get assistance from our property
                                                        support team whenever required.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!--End Single Advantages Box-->


                            <!--Start Single Advantages Box-->
                            <div class="col-xl-3 col-lg-6 col-md-6">
                                <div class="single-advantages-box">
                                    <div class="inner">

                                        <div class="static-content">
                                            <div class="icon-holder">
                                                <span class="icon-wallet"></span>
                                            </div>

                                            <div class="title">
                                                <h3>
                                                    Better<br>
                                                    Reach
                                                </h3>
                                            </div>
                                        </div>

                                        <div class="overlay-text">
                                            <div class="box">
                                                <div class="inner-text">
                                                    <p>
                                                        Reach more interested customers
                                                        looking for properties in your area.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!--End Single Advantages Box-->

                        </div>
                    </div>
                    <!--End seller benefits-->


                    <!--Start how to add property-->
                    <div class="how-work-box">
                        <div class="row">

                            <div class="col-xl-6">
                                <div class="image-box">
                                    <img src="{{ asset('assets/frontend/images/services/service-single/how-work.jpg') }}"
                                        alt="How To Add Your Property">
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="how-works-content">

                                    <h2>How To Add Your Property</h2>

                                    <ul>

                                        <li>
                                            <div class="icon">
                                                <span class="icon-tick"></span>
                                            </div>

                                            <div class="text">
                                                <span>Step 1</span>
                                                <h3>Create Seller Account</h3>
                                                <p>
                                                    Register your account by providing
                                                    your basic seller information.
                                                </p>
                                            </div>
                                        </li>


                                        <li>
                                            <div class="icon">
                                                <span class="icon-tick"></span>
                                            </div>

                                            <div class="text">
                                                <span>Step 2</span>
                                                <h3>Add Property Details</h3>
                                                <p>
                                                    Enter property information including
                                                    category, location, price and amenities.
                                                </p>
                                            </div>
                                        </li>


                                        <li>
                                            <div class="icon">
                                                <span class="icon-tick"></span>
                                            </div>

                                            <div class="text">
                                                <span>Step 3</span>
                                                <h3>Publish Your Property</h3>
                                                <p>
                                                    Review your information and submit
                                                    the property listing for customers.
                                                </p>
                                            </div>
                                        </li>

                                    </ul>

                                </div>
                            </div>

                        </div>
                    </div>
                    <!--End how to add property-->


                    <!--Start additional information-->
                    
                    <!--End additional information-->

                </div>
                <!--End right content-->

            </div>
        </div>
    </section>
    <!--End seller information area-->


    <!--Start login register area-->
    <section class="login-register-area">

        <div class="container">

            <div class="row">

                <!--Start login-->
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">

                    <div class="additional-information-box">

                        <div class="title">
                            <h2>Seller Information</h2>
                        </div>

                        <div class="inner-content">
                            <div class="row">

                                <div class="col-xl-12">
                                    <div class="additional-info-content-box">

                                        <div class="accordion-box">

                                            <!--Start single accordion box-->
                                            <div class="accordion accordion-block">

                                                <div class="accord-btn">
                                                    <h4>
                                                        Who can register as a seller?
                                                    </h4>
                                                </div>

                                                <div class="accord-content">
                                                    <p>
                                                        Property owners, builders, developers,
                                                        agents and real estate professionals
                                                        can register and add their properties
                                                        to the platform.
                                                    </p>
                                                </div>

                                            </div>
                                            <!--End single accordion box-->


                                            <!--Start single accordion box-->
                                            <div class="accordion accordion-block">

                                                <div class="accord-btn active">
                                                    <h4>
                                                        What property details are required?
                                                    </h4>
                                                </div>

                                                <div class="accord-content collapsed">
                                                    <p>
                                                        You can provide property category,
                                                        purpose, location, price, area,
                                                        description, amenities and property
                                                        images to create a complete listing.
                                                    </p>
                                                </div>

                                            </div>
                                            <!--End single accordion box-->


                                            <!--Start single accordion box-->
                                            <div class="accordion accordion-block">

                                                <div class="accord-btn">
                                                    <h4>
                                                        Can I add residential and commercial properties?
                                                    </h4>
                                                </div>

                                                <div class="accord-content">
                                                    <p>
                                                        Yes. Sellers can add properties from
                                                        residential and commercial categories
                                                        according to the available property
                                                        options.
                                                    </p>
                                                </div>

                                            </div>
                                            <!--End single accordion box-->


                                            <!--Start single accordion box-->
                                            <div class="accordion accordion-block">

                                                <div class="accord-btn">
                                                    <h4>
                                                        Can I update my property after publishing?
                                                    </h4>
                                                </div>

                                                <div class="accord-content">
                                                    <p>
                                                        Property information can be managed
                                                        and updated from your seller account
                                                        whenever changes are required.
                                                    </p>
                                                </div>

                                            </div>
                                            <!--End single accordion box-->

                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
                <!--End login-->               
            </div>
        </div>
    </section>
    <!--End login register area-->
@endsection