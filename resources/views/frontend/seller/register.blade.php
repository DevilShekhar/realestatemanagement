@extends('layouts.app')

@section('content')
<style>

/* =========================================
   Seller Registration Form
   ========================================= */

.login-register-area .form.register .input-field {
    position: relative;
    width: 100%;
    margin-bottom: 20px;
}

.login-register-area .form.register .input-field input,
.login-register-area .form.register .input-field select {
    width: 100%;
    height: 55px;
    border: 1px solid #e5e5e5;
    background: #ffffff;
    padding: 0 55px 0 20px;
    font-size: 14px;
    color: #222222;
    outline: none;
    border-radius: 0;
    transition: all 0.3s ease;
}


/* Placeholder */
.login-register-area .form.register .input-field input::placeholder {
    color: #999999;
    opacity: 1;
}


/* Select */
.login-register-area .form.register .input-field select {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    cursor: pointer;
    color: #777777;
}


/* Focus */
.login-register-area .form.register .input-field input:focus,
.login-register-area .form.register .input-field select:focus {
    border-color: #222222;
    box-shadow: none;
}


/* Icon */
.login-register-area .form.register .input-field .icon-holder {
    position: absolute;
    top: 0;
    right: 0;
    width: 55px;
    height: 55px;
    display: flex;
    align-items: center;
    justify-content: center;
    pointer-events: none;
}


.login-register-area .form.register .input-field .icon-holder i {
    font-size: 15px;
    color: #999999;
}


/* Icon focus effect */
.login-register-area .form.register .input-field:focus-within .icon-holder i {
    color: #222222;
}


/* =========================================
   Password Fields
   ========================================= */

.login-register-area .form.register
.input-field input[type="password"] {
    letter-spacing: 0.3px;
}


/* =========================================
   Gender Select Arrow
   ========================================= */

.login-register-area .form.register
.input-field:has(select)::after {
    content: "\f107";
    font-family: "FontAwesome";
    position: absolute;
    right: 20px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 14px;
    color: #999999;
    pointer-events: none;
}


/* =========================================
   Register Button
   ========================================= */

.login-register-area .form.register .btn-one {
    border: none;
    cursor: pointer;
}


/* =========================================
   Mobile Responsive
   ========================================= */

@media only screen and (max-width: 767px) {

    .login-register-area .form.register .input-field {
        margin-bottom: 15px;
    }

    .login-register-area .form.register .input-field input,
    .login-register-area .form.register .input-field select {
        height: 52px;
        padding-left: 16px;
        padding-right: 50px;
    }

    .login-register-area .form.register .input-field .icon-holder {
        width: 50px;
        height: 52px;
    }

}
</style>
    <!--Start breadcrumb area-->
    <section class="breadcrumb-area style2"
        style="background-image: url('{{ asset('assets/frontend/images/resources/breadcrumb-bg-2.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="inner-content-box clearfix">
                        <div class="title-s2 text-center">
                            <span>Seller Registration</span>
                            <h1>List Your Property With Us</h1>
                        </div>

                        <div class="breadcrumb-menu float-left">
                            <ul class="clearfix">
                                <li>
                                    <a href="{{ url('/') }}">Home</a>
                                </li>
                                <li>
                                    <a href="#">Property</a>
                                </li>
                                <li class="active">
                                    Seller Registration
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End breadcrumb area-->


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
                                    <span class="icon-support1"></span>
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
                <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">

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


                <!--Start register-->
                <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">

                    <div class="form register">

                        <div class="shop-page-title">

                            <div class="title">
                                Seller Registration
                                <span>Here</span>
                            </div>

                        </div>

                        <div class="row">

                            <form action="{{ route('seller.register.store') }}" method="POST">
                                @csrf

                                <div class="col-md-12">
                                    <div class="input-field">
                                        <input type="text"
                                            name="name"
                                            id="name"
                                            placeholder="Your Name *"
                                            value="{{ old('name') }}"
                                            required>

                                        <div class="icon-holder">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="input-field">
                                        <input type="email"
                                            name="email"
                                            id="email"
                                            placeholder="Your Email *"
                                            value="{{ old('email') }}"
                                            required>

                                        <div class="icon-holder">
                                            <i class="fa fa-envelope" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="input-field">
                                        <input type="number"
                                            name="mobile"
                                            id="mobile"
                                            placeholder="Your Phone Number *"
                                            value="{{ old('mobile') }}"
                                            required>

                                        <div class="icon-holder">
                                            <i class="fa fa-phone" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="input-field">
                                        <input type="password"
                                            name="password"
                                            id="password"
                                            placeholder="Enter Password *"
                                            required>

                                        <div class="icon-holder">
                                            <i class="fa fa-lock" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="input-field">
                                        <input type="password"
                                            name="password_confirmation"
                                            id="password_confirmation"
                                            placeholder="Confirm Password *"
                                            required>

                                        <div class="icon-holder">
                                            <i class="fa fa-lock" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="input-field">

                                        <select name="gender"
                                            id="gender"
                                            required>

                                            <option value="">Select Gender *</option>

                                            <option value="male"
                                                {{ old('gender') == 'male' ? 'selected' : '' }}>
                                                Male
                                            </option>

                                            <option value="female"
                                                {{ old('gender') == 'female' ? 'selected' : '' }}>
                                                Female
                                            </option>

                                            <option value="other"
                                                {{ old('gender') == 'other' ? 'selected' : '' }}>
                                                Other
                                            </option>

                                        </select>

                                        <div class="icon-holder">
                                            <i class="fa fa-venus-mars" aria-hidden="true"></i>
                                        </div>

                                    </div>
                                </div>

                                


                                <div class="col-md-12">

                                    <div class="row">

                                        <div class="col-lg-5 col-md-5 col-sm-12">

                                            <button class="btn-one"
                                                type="submit">
                                                Register Here
                                            </button>

                                        </div>


                                        

                                    </div>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>
                <!--End register-->

            </div>

        </div>

    </section>
    <!--End login register area-->

@endsection