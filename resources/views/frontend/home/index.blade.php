@extends('layouts.app')

@section('content')
        <section class="kalp-hero">
            <div class="kalp-hero-bg"></div>
            <div class="kalp-hero-overlay"></div>
            <div class="kalp-hero-container">
                <div class="kalp-hero-content">
                    <div class="kalp-rating">
                        <span class="kalp-rating-star">★</span>
                        <span class="kalp-rating-number">4.7</span>
                        <span class="kalp-rating-dot">•</span>
                        <span class="kalp-rating-text">18k Google reviews</span>
                    </div>
                    <h1 class="kalp-hero-title">
                        Mumbai & Pune Real Estate
                    </h1>
                    <div class="kalp-hero-subtitle">
                        <span class="kalp-subtitle-static">
                            From Search to Keys, we've got you covered
                        </span>
                        <span class="kalp-subtitle-dot"></span>
                        <span class="kalp-text-slider">
                            <span class="kalp-text-slider-track">
                                <span>3800+ Properties under Management</span>
                                <span>Buy, Sell & Rent Properties</span>
                                <span>Verified Properties Across Bangalore</span>
                                <span>Find Your Dream Property With Kalp Realty</span>
                                <span>3800+ Properties under Management</span>
                            </span>
                        </span>
                    </div>
                </div>
                <div class="kalp-category-wrapper">
                    <div class="kalp-category-tabs">
                        <a href="javascript:void(0)" class="kalp-category-tab active"  data-placeholder='Search by "Property"' data-type="buy" >
                            <span class="kalp-tab-icon">
                                <svg viewBox="0 0 24 24">
                                    <path d="M3 10.5L12 3l9 7.5"></path>
                                    <path d="M5 9.5V20h14V9.5"></path>
                                    <path d="M9 20v-5h6v5"></path>
                                </svg>
                            </span>
                            <span>Buy</span>
                        </a>
                        <a href="javascript:void(0)" class="kalp-category-tab" data-placeholder='Search by "Property"' data-type="rent" >
                            <span class="kalp-tab-icon">
                                <svg viewBox="0 0 24 24">
                                    <path d="M20.5 13.5L12 22l-8.5-8.5"></path>
                                    <path d="M3.5 13.5L12 5l8.5 8.5"></path>
                                    <path d="M12 5V2"></path>
                                    <path d="M7 9h.01"></path>
                                </svg>
                            </span>
                            <span>Rent</span>
                        </a>
                        <a href="javascript:void(0)" class="kalp-category-tab kalp-list-tab kalp-badge-tab" data-type="sell">
                            <span class="kalp-tab-icon">
                                <svg viewBox="0 0 24 24">
                                    <path d="M6 21V7l6-4 6 4v14"></path>
                                    <path d="M3 21h18"></path>
                                    <path d="M9 11h6"></path>
                                    <path d="M9 15h6"></path>
                                    <path d="M10 21v-4h4v4"></path>
                                </svg>
                            </span>
                            <span>List Property</span>
                            <small class="kalp-tab-badge">
                                FREE
                            </small>
                        </a>
                    </div>
                    <div class="kalp-search-box">
                        <div class="kalp-location">
                            <span class="kalp-location-name" id="kalpSelectedLocation">Mumbai</span>
                            <button type="button" class="kalp-location-arrow" id="kalpLocationButton" aria-label="Change location">
                                <svg viewBox="0 0 24 24">
                                    <path d="M6 9l6 6 6-6"></path>
                                </svg>
                            </button>
                            <div class="kalp-location-dropdown" id="kalpLocationDropdown">
                                <button type="button" class="kalp-location-option active" data-location="Mumbai">Mumbai</button>
                                <button type="button" class="kalp-location-option" data-location="Pune">Pune</button>                             
                            </div>
                        </div>
                        <div class="kalp-search-input-wrapper">
                            <span class="kalp-search-icon">
                                <svg viewBox="0 0 24 24">
                                    <circle cx="11" cy="11" r="7"></circle>
                                    <path d="M16.5 16.5L22 22"></path>
                                </svg>
                            </span>
                            <input type="text" id="kalpPropertySearch" class="kalp-search-input"  placeholder='Search by "Builder"' autocomplete="off">
                        </div>
                        <button type="button" class="kalp-search-button" id="kalpSearchButton">
                            Search
                        </button>
                    </div>
                </div>
            </div>
        </section> 
        <section class="pune-properties-section">
            <div class="container">
                <div class="pune-properties-wrapper">
                    <div class="pune-properties-content">
                        <div class="list-property-label">
                            <span class="label-line"></span>
                            <i class="fa fa-home"></i>
                            <span>PROPERTY DESTINATION</span>
                            <span class="label-line"></span>
                        </div>
                        
                        <h2>Explore Properties</h2>
                        <h3>Across Pune</h3>
                        <div class="pune-title-line"></div>
                        <p class="pune-properties-intro">Find properties in locations that suit your lifestyle, business and investment needs.</p>
                        <div class="pune-location-badge">
                            <i class="fa fa-map-marker"></i>
                            <span>Pune</span>
                        </div>
                        <h4>Explore properties across:</h4>
                        <div class="pune-location-list">
                            <span>Hinjawadi</span>
                            <span>Wakad</span>
                            <span>Baner</span>
                            <span>Balewadi</span>
                            <span>Kharadi</span>
                            <span>Viman Nagar</span>
                            <span>Hadapsar</span>
                            <span>Wagholi</span>
                            <span>Tathawade</span>
                            <span>Punawale</span>
                            <span>Ravet</span>
                            <span>Moshi</span>
                            <span>Pimpri-Chinchwad</span>
                            <span>Chakan and more</span>
                        </div>
                        <a href="{{ auth()->check() ? route('properties.index') : route('buyer.login') }}" class="pune-properties-button">
                            <span>
                                <i class="fa fa-map-marker"></i>
                                Explore Pune Properties
                            </span>
                            <i class="fa fa-long-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <section class="pune-properties-section">
            <div class="container">
                <div class="mumbai-properties-wrapper">
                    <div class="pune-properties-content">
                        <div class="list-property-label">
                            <span class="label-line"></span>
                            <i class="fa fa-home"></i>
                            <span>PROPERTY DESTINATION</span>
                            <span class="label-line"></span>
                        </div>
                        <h2>Explore Properties</h2>
                        <h3>Across Mumbai</h3>
                        <div class="pune-title-line"></div>
                        <p class="pune-properties-intro">Find properties in locations that suit your lifestyle, business and investment needs.</p>
                        <div class="pune-location-badge">
                            <i class="fa fa-map-marker"></i>
                            <span>Mumbai</span>
                        </div>
                        <h4>Explore properties across:</h4>
                        <div class="pune-location-list">
                            <span>Andheri</span>
                            <span>Powai</span>
                            <span>Sakinaka</span>
                            <span>Bandra</span>
                            <span>Goregaon</span>
                            <span>Malad</span>
                            <span>Borivali</span>
                            <span>Mulund</span>
                            <span>Bhandup</span>
                            <span>Thane</span>
                            <span>Navi Mumbai</span>
                            <span>Lower Parel</span>
                            <span>Dadar</span>
                            <span>Panvel and more</span>
                        </div>
                        <a href="{{ auth()->check() ? route('properties.index') : route('buyer.login') }}" class="pune-properties-button">
                            <span>
                                <i class="fa fa-map-marker"></i>
                                Explore Mumbai Properties
                            </span>
                            <i class="fa fa-long-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>
         
        
        <section class="property-categories-section">
            <div class="container">
                <div class="property-categories-header text-center">
                    <span class="property-eyebrow">
                        PROPERTY CATEGORIES
                    </span>
                    <h2>
                        Find the Property
                        <span>That's Right for You</span>
                    </h2>
                    <div class="property-title-line">
                        <span></span>
                        <i></i>
                        <span></span>
                    </div>
                    <p>
                        From your dream home to your next business location,<br>
                        Kalp Realty helps you explore different types of properties.
                    </p>
                </div>
                <div class="property-category-row row-residential">
                    <!-- IMAGE -->
                    <div class="property-category-image">
                        <img src="{{ asset('assets/frontend/images/resources/residential.png') }}"
                            alt="Residential Properties">
                        <div class="property-image-shape"></div>
                        <div class="property-category-icon">
                            <span class="icon-architecture-and-city"></span>
                        </div>
                    </div>
                    <div class="property-category-content">             
                        <div class="property-content-wrapper">
                            <div class="property-number">
                                01
                            </div>
                            <div class="property-main-content">
                                <h3>
                                    Residential Properties
                                </h3>
                                <p class="property-short-description">
                                    Find a place to call home.
                                </p>
                                <div class="property-items residential-items">
                                    <span>
                                        Apartments &amp; Flats
                                    </span>
                                    <span>
                                        Villas &amp; Bungalows
                                    </span>
                                    <span>
                                        Independent Houses
                                    </span>

                                    <span>
                                        Builder Floors
                                    </span>

                                    <span>
                                        Resale Homes
                                    </span>

                                    <span>
                                        New Residential Projects
                                    </span>

                                </div>
                                <a href="{{ auth()->check() ? route('properties.index') : route('buyer.login') }}" class="property-category-btn">
                                    <span>Explore Residential Properties</span>
                                    <i class="flaticon-next"></i>
                                </a>
                            </div>
                        </div>
                        <div class="property-decoration">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>

                <div class="property-category-row row-commercial">
                    <!-- CONTENT -->
                    <div class="property-category-content">              
                                    <div class="property-content-wrapper">
                            <div class="property-number">
                                02
                            </div>
                            <div class="property-main-content">
                                <h3>
                                    Commercial Properties
                                </h3>
                                <p class="property-short-description">
                                    Find the right space for your business.
                                </p>
                                <div class="property-items commercial-items">
                                    <span>
                                        Office Spaces
                                    </span>

                                    <span>
                                        Shops
                                    </span>

                                    <span>
                                        Showrooms
                                    </span>

                                    <span>
                                        Commercial Spaces
                                    </span>
                                </div>
                                 <a href="{{ auth()->check() ? route('properties.index') : route('buyer.login') }}" class="property-category-btn">
                                    <span>
                                        Explore Commercial Properties
                                    </span>
                                    <i class="flaticon-next"></i>
                                </a>
                            </div>
                        </div>
                        <div class="property-decoration commercial-decoration">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <div class="property-category-image">
                        <img src="{{ asset('assets/frontend/images/resources/commercial.png') }}"
                            alt="Commercial Properties">
                        <div class="property-image-shape"></div>
                        <div class="property-category-icon">
                            <span class="icon-scheme"></span>
                        </div>
                    </div>
                </div>
                <div class="property-category-row row-industrial">
                    <div class="property-category-image">
                        <img src="{{ asset('assets/frontend/images/resources/industrial.png') }}"
                            alt="Industrial Properties">
                        <div class="property-image-shape"></div>
                        <div class="property-category-icon">
                            <span class="icon-cupboard"></span>
                        </div>
                    </div>
                    <div class="property-category-content">            
                        <div class="property-content-wrapper">
                            <div class="property-number">
                                03
                            </div>
                            <div class="property-main-content">
                                <h3>
                                    Industrial Properties
                                </h3>
                                <p class="property-short-description">
                                    Find properties for business operations and storage.
                                </p>
                                <div class="property-items industrial-items">
                                    <span>
                                        Industrial Units
                                    </span>
                                    <span>
                                        Warehouses
                                    </span>
                                    <span>
                                        Factories
                                    </span>
                                    <span>
                                        Godowns
                                    </span>
                                </div>
                                <a href="{{ auth()->check() ? route('properties.index') : route('buyer.login') }}" class="property-category-btn">
                                    <span>
                                        Explore Industrial Properties
                                    </span>
                                    <i class="flaticon-next"></i>
                                </a>
                            </div>
                        </div>
                        <div class="property-decoration">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
                <div class="property-category-row row-land">
                    <!-- CONTENT -->
                    <div class="property-category-content">              
                        <div class="property-content-wrapper">
                            <div class="property-number">
                                04
                            </div>
                            <div class="property-main-content">
                                <h3>
                                    Land &amp; Plots
                                </h3>
                                <p class="property-short-description">
                                    Explore land for your future plans.
                                </p>
                                <div class="property-items land-items">
                                    <span>
                                        Residential Plots
                                    </span>
                                    <span>
                                        Industrial Land
                                    </span>
                                    <span>
                                        Open Plots
                                    </span>
                                    <span>
                                        Agricultural Land
                                    </span>
                                    <span>
                                        Commercial Land
                                    </span>
                                    <span>
                                        Farm Land
                                    </span>
                                </div>
                                <a href="{{ auth()->check() ? route('properties.index') : route('buyer.login') }}" class="property-category-btn">
                                    <span>
                                        Explore Land &amp; Plots
                                    </span>
                                    <i class="flaticon-next"></i>
                                </a>
                            </div>
                        </div>
                        <div class="property-decoration land-decoration">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <!-- IMAGE -->
                    <div class="property-category-image">
                        <img src="{{ asset('assets/frontend/images/resources/land.png') }}"
                            alt="Land & Plots">
                        <div class="property-image-shape"></div>
                        <div class="property-category-icon">
                            <span class="icon-concept"></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
       
        <section class="buy-property-section">
            <div class="container">
                <div class="property-categories-header text-center">
                    <span class="property-eyebrow">
                      FOR PROPERTY BUYERS
                    </span>
                    <h2>  Looking to  <span>Buy a Property?</span>
                    </h2>
                    <div class="property-title-line">
                        <span></span>
                        <i></i>
                        <span></span>
                    </div>
                    <p > Buying a property is an important decision. Kalp Realty makes it easier to explore different property options based on your needs. </p>
                </div>
                <div class="buy-property-wrapper">
                    <div class="buy-property-image">
                        <img src="{{ asset('assets/frontend/images/resources/buy-a-property.png') }}" alt="Buy Property">
                        <div class="buy-image-overlay"></div>
                        <div class="buy-image-message">
                            <div class="buy-message-icon">
                                <i class="fa fa-home"></i>
                            </div>
                            <div class="buy-message-text">
                                <span>Your Next Property Could Be</span>
                                <strong>Just a Search Away.</strong>
                            </div>
                        </div>
                    </div>
                    <div class="buy-property-content">
                        <div class="buy-property-dots">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <p class="buy-property-description"> Buying a property is an important decision. Kalp Realty makes it easier to explore different property options based on your needs. </p>
                        <div class="buy-property-line"></div>
                        <!-- Find heading -->
                        <div class="buy-find-title">
                            Find:
                        </div>
                        <div class="buy-property-types">
                            <a href="#" class="buy-property-type">
                                <i class="fa fa-building"></i>
                                <span>Flats</span>
                            </a>
                            <a href="#" class="buy-property-type">
                                <i class="fa fa-building"></i>
                                <span>Apartments</span>
                            </a>
                            <a href="#" class="buy-property-type">
                                <i class="fa fa-home"></i>
                                <span>Villas</span>
                            </a>
                            <a href="#" class="buy-property-type">
                                <i class="fa fa-home"></i>
                                <span>Houses</span>
                            </a>
                            <a href="#" class="buy-property-type">
                                <i class="fa fa-building"></i>
                                <span>Offices</span>
                            </a>
                            <a href="#" class="buy-property-type">
                                <i class="fa fa-shopping-bag"></i>
                                <span>Shops</span>
                            </a>
                            <a href="#" class="buy-property-type">
                                <i class="fa fa-map-marker"></i>
                                <span>Plots</span>
                            </a>
                            <a href="#" class="buy-property-type">
                                <i class="fa fa-tree"></i>
                                <span>Land</span>
                            </a>
                            <a href="#" class="buy-property-type">
                                <i class="fa fa-home"></i>
                                <span>Warehouses</span>
                            </a>
                            <a href="#" class="buy-property-type">
                                <i class="fa fa-industry"></i>
                                <span>Factories</span>
                            </a>
                        </div>
                        <div class="buy-search-text">
                            Search by <strong>location</strong>, <strong>property type</strong> and <strong>budget.</strong>
                        </div>
                        <a href="{{ auth()->check() ? route('properties.index') : route('buyer.login') }}" class="buy-property-cta">
                            <span>Find Your Property</span>
                            <i class="fa fa-long-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <section class="rent-property-section">
            <div class="container">
                <div class="property-categories-header text-center">
                    <span class="property-eyebrow">
                      FOR PROPERTY RENTERS
                    </span>
                    <h2>Find a Property<span> for Rent </span>
                    </h2>
                    <div class="property-title-line">
                        <span></span>
                        <i></i>
                        <span></span>
                    </div>
                    <p class="rent-property-description">  Looking for a home or business space?<br>   Explore rental properties across <strong>Pune</strong> and <strong>Mumbai.</strong>  </p>
                </div>
                <div class="rent-property-wrapper">
                    <div class="rent-property-image">
                        <img src="{{ asset('assets/frontend/images/resources/find-property.png') }}" alt="Find a Property for Rent">
                        <div class="rent-image-overlay"></div>
                        <div class="rent-image-content">
                            <div class="rent-image-icon">
                                <i class="fa fa-home"></i>
                            </div>
                            <div class="rent-image-text">
                                <span>FIND A SPACE THAT</span>
                                <strong>FITS YOUR NEEDS.</strong>
                            </div>                     
                        </div>
                    </div>
                    <div class="rent-property-content">
                        <div class="rent-property-decoration">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        
                        <p class="rent-property-description">
                            Looking for a home or business space?<br>
                            Explore rental properties across <strong>Pune</strong> and <strong>Mumbai.</strong>
                        </p>
                        <div class="rent-property-divider">
                            <span></span>
                            <i></i>
                            <span></span>
                        </div>
                        <h3 class="rent-find-title">Find:</h3>
                        <div class="rent-property-types">
                            <a href="#" class="rent-property-type">
                                <div class="rent-type-icon">
                                    <i class="fa fa-building"></i>
                                </div>
                                <span>Flats &amp;<br>Apartments</span>
                            </a>
                            <a href="#" class="rent-property-type">
                                <div class="rent-type-icon">
                                    <i class="fa fa-home"></i>
                                </div>
                                <span>Independent<br>Houses</span>
                            </a>
                            <a href="#" class="rent-property-type">
                                <div class="rent-type-icon">
                                    <i class="fa fa-building"></i>
                                </div>
                                <span>Office<br>Spaces</span>
                            </a>
                            <a href="#" class="rent-property-type">
                                <div class="rent-type-icon">
                                    <i class="fa fa-shopping-bag"></i>
                                </div>
                                <span>Shops &amp;<br>Showrooms</span>
                            </a>
                            <a href="#" class="rent-property-type">
                                <div class="rent-type-icon">
                                    <i class="fa fa-building"></i>
                                </div>
                                <span>Commercial<br>Spaces</span>
                            </a>
                            <a href="#" class="rent-property-type">
                                <div class="rent-type-icon">
                                    <i class="fa fa-home"></i>
                                </div>
                                <span>Warehouses &amp;<br>Godowns</span>
                            </a>
                        </div>
                        <div class="rent-property-message">
                            <div class="rent-message-icon">
                                <i class="fa fa-search"></i>
                            </div>
                            <div class="rent-message-text">
                                Find a Space That Fits <strong>Your Needs.</strong>
                            </div>
                            <div class="rent-message-dots">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                        <a href="{{ auth()->check() ? route('properties.index') : route('buyer.login') }}" class="rent-property-button">
                            <div class="rent-button-icon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <span>Find Rental Property</span>
                            <div class="rent-button-arrow">
                                <i class="fa fa-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <section class="list-property-section">
            <div class="container">
                <div class="list-property-header">
                    <div class="list-property-label">
                        <span class="label-line"></span>
                        <i class="fa fa-home"></i>
                        <span>LIST YOUR PROPERTY</span>
                        <span class="label-line"></span>
                    </div>
                    <h2>Have a Property to Sell or Rent?</h2>
                    <h3>List It on Kalp Realty.</h3>
                    <p>Whether you're a property owner, seller, agent or builder, Kalp Realty gives you a platform to showcase your property to interested users.</p>
                    <p>Add your property details, upload photos and manage your listings from your account.</p>
                </div>
                <div class="list-property-steps-title">
                    <span>List Your Property in</span>
                    <strong>3 Simple Steps</strong>
                </div>
                <div class="list-property-steps">
                    <div class="list-property-line"></div>
                    <div class="list-property-step">
                        <div class="step-number">01</div>
                        <div class="step-icon">
                            <i class="fa fa-user"></i>
                            <span class="step-check"><i class="fa fa-check"></i></span>
                        </div>
                        <h4>Create Your Account</h4>
                        <div class="step-divider"></div>
                        <p>Register with Kalp Realty and access your property dashboard.</p>
                    </div>
                    <div class="list-property-step">
                        <div class="step-number">02</div>
                        <div class="step-icon">
                            <i class="fa fa-home"></i>
                        </div>
                        <h4>Add Your Property</h4>
                        <div class="step-divider"></div>
                        <p>Enter your property details including location, property type, area, price and other important information.</p>
                    </div>
                    <div class="list-property-step">
                        <div class="step-number">03</div>
                        <div class="step-icon">
                            <i class="fa fa-comments"></i>
                        </div>
                        <h4>Receive Enquiries</h4>
                        <div class="step-divider"></div>
                        <p>Interested buyers or tenants can enquire about your property.</p>
                    </div>
                </div>
                <div class="list-property-bottom">
                    <div class="list-property-bottom-icon">
                        <i class="fa fa-bullhorn"></i>
                    </div>
                    <div class="list-property-bottom-text">
                        <span>Your Property Deserves</span>
                        <strong>the Right Visibility.</strong>
                    </div>
                    <div class="list-property-bottom-divider"></div>
                    <a href="{{ route('seller.register') }}" class="list-property-button">
                        <span class="list-button-icon">
                            <i class="fa fa-home"></i>
                        </span>
                        <span class="list-button-text">List My Property</span>
                        <span class="list-button-arrow">
                            <i class="fa fa-long-arrow-right"></i>
                        </span>
                    </a>
                </div>
            </div>
            <div class="list-property-dots list-dots-left">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="list-property-dots list-dots-right">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>             
        </section>
        <section class="new-projects-section">
            <div class="container">
                <div class="new-projects-wrapper">
                    <div class="new-projects-content">
                        <div class="list-property-label">
                            <span class="label-line"></span>
                            <i class="fa fa-building"></i>
                            <span>NEW PROJECTS</span>
                            <span class="label-line"></span>
                        </div>                         
                        <h2>Discover New Projects</h2>
                        <h3>in Pune &amp; Mumbai</h3>
                        <p class="new-projects-intro">Explore new and upcoming residential and commercial projects.</p>
                        <div class="new-projects-location">
                            <span class="location-item"><i class="fa fa-map-marker"></i> Pune</span>
                            <span class="location-divider"></span>
                            <span class="location-item"><i class="fa fa-map-marker"></i> Mumbai</span>
                        </div>
                        <h4>Find:</h4>
                        <div class="new-projects-types">
                            <div class="new-project-type">
                                
                                <div class="new-type-icon">
                                    <i class="fa fa-building"></i>
                                </div>
                                <span>New Apartments</span>
                            </div>
                            <div class="new-project-type">                                
                                <div class="new-type-icon">
                                    <i class="fa fa-home"></i>
                                </div>
                                <span>Premium Homes</span>
                            </div>
                            <div class="new-project-type">                                
                                <div class="new-type-icon">
                                    <i class="fa fa-hospital-o"></i>
                                </div>
                                <span>Villas</span>
                            </div>
                            <div class="new-project-type">                                 
                                <div class="new-type-icon">
                                    <i class="fa fa-industry"></i>
                                </div>
                                <span>Commercial Projects</span>
                            </div>
                            <div class="new-project-type">                                
                                <div class="new-type-icon">
                                    <i class="fa fa-briefcase"></i>
                                </div>
                                <span>Office Spaces</span>
                            </div>
                        </div>
                        <div class="new-projects-bottom">
                            <div class="new-projects-message">
                                <span>Explore Today's Opportunities.</span>
                                <strong>Plan for Tomorrow.</strong>
                            </div>
                            <div class="new-projects-buttons d-flex align-items-center gap-3">
                                <a href="{{ auth()->check() ? route('properties.index') : route('buyer.login') }}" class="new-projects-button mr-2">
                                    <span>Explore Properties</span>
                                    <i class="fa fa-long-arrow-right"></i>
                                </a>
                                <a href="{{ auth()->check() ? route('seller.dashboard') : route('seller.login') }}" class="new-projects-button seller-button">
                                    <span>List Your Property</span>
                                    <i class="fa fa-long-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </section>
        <section class="owner-account-section">
            <div class="container">
                <div class="owner-account-wrapper">
                    <div class="owner-account-content">
                        <div class="owner-account-label">
                            <span></span>
                            <i class="fa fa-users"></i>
                            <span>FOR PROPERTY OWNERS, AGENTS &amp; BUILDERS</span>
                        </div>
                        <h2>Are You a Property Owner,</h2>
                        <h3>Agent or Builder?</h3>
                        <p class="owner-account-intro">Kalp Realty helps you showcase your properties to people looking for homes, commercial spaces and investment opportunities.</p>
                        <div class="owner-account-highlight">
                            <i class="fa fa-check-circle"></i>
                            <span>With your Kalp Realty account, you can:</span>
                        </div>
                        <a href="{{ route('seller.register') }}" class="owner-account-button">
                            <span>Create Your Account</span>
                            <i class="fa fa-long-arrow-right"></i>
                        </a>
                    </div>
                    <div class="owner-account-features">
                        <div class="owner-feature-card"> 
                            <div class="owner-feature-icon">
                                <i class="fa fa-plus"></i>
                            </div>
                            <div class="owner-feature-text">
                                <h4>Add Property Listings</h4>
                                <p>Showcase your properties to interested users.</p>
                            </div>
                        </div>
                        <div class="owner-feature-card"> 
                            <div class="owner-feature-icon">
                                <i class="fa fa-camera"></i>
                            </div>
                            <div class="owner-feature-text">
                                <h4>Upload Property Photos</h4>
                                <p>Present your property with quality images.</p>
                            </div>
                        </div>
                        <div class="owner-feature-card"> 
                            <div class="owner-feature-icon">
                                <i class="fa fa-pencil"></i>
                            </div>
                            <div class="owner-feature-text">
                                <h4>Edit Property Details</h4>
                                <p>Keep your property information updated.</p>
                            </div>
                        </div>
                        <div class="owner-feature-card"> 
                            <div class="owner-feature-icon">
                                <i class="fa fa-th-large"></i>
                            </div>
                            <div class="owner-feature-text">
                                <h4>Manage Your Listings</h4>
                                <p>Manage your properties from one account.</p>
                            </div>
                        </div>
                        <div class="owner-feature-card"> 
                            <div class="owner-feature-icon">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="owner-feature-text">
                                <h4>Track Property Enquiries</h4>
                                <p>Stay informed when users show interest.</p>
                            </div>
                        </div>
                        <div class="owner-feature-card"> 
                            <div class="owner-feature-icon">
                                <i class="fa fa-refresh"></i>
                            </div>
                            <div class="owner-feature-text">
                                <h4>Update Property Availability</h4>
                                <p>Keep listing availability up to date.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="why-kalp-section">
            <div class="container">
                <div class="why-kalp-header">
                    <div class="list-property-label">
                        <span class="label-line"></span>
                        <i class="fa fa-building"></i>
                        <span>WHY KALP REALTY</span>
                        <span class="label-line"></span>
                    </div>                    
                    <h2>Why Choose <span>Kalp Realty?</span></h2>
                    <h3>Property Search Made Simple.</h3>
                    <p>Whether you want to find a property or list one, Kalp Realty helps bring everything together in one place.</p>
                </div>
                <div class="why-kalp-features">
                    <div class="why-kalp-card"> 
                        <div class="why-kalp-icon"><i class="fa fa-search"></i></div>
                        <div class="why-kalp-content">
                            <h4>Easy to Search</h4>
                            <p>Find properties based on location, budget and property type.</p>
                        </div>
                    </div>
                    <div class="why-kalp-card"> 
                        <div class="why-kalp-icon"><i class="fa fa-map-marker"></i></div>
                        <div class="why-kalp-content">
                            <h4>Pune &amp; Mumbai Focused</h4>
                            <p>Explore property opportunities across two of Maharashtra's major real estate markets.</p>
                        </div>
                    </div>
                    <div class="why-kalp-card"> 
                        <div class="why-kalp-icon"><i class="fa fa-building"></i></div>
                        <div class="why-kalp-content">
                            <h4>Multiple Property Categories</h4>
                            <p>From flats and villas to offices, plots, warehouses and factories.</p>
                        </div>
                    </div>
                    <div class="why-kalp-card"> 
                        <div class="why-kalp-icon"><i class="fa fa-list-alt"></i></div>
                        <div class="why-kalp-content">
                            <h4>Easy Property Listing</h4>
                            <p>Property owners can create an account and manage their listings easily.</p>
                        </div>
                    </div>
                    <div class="why-kalp-card"> 
                        <div class="why-kalp-icon"><i class="fa fa-users"></i></div>
                        <div class="why-kalp-content">
                            <h4>For Every Property Need</h4>
                            <p>Whether you're a buyer, seller, tenant, owner, investor, agent or business owner.</p>
                        </div>
                    </div>
                    <div class="why-kalp-card"> 
                        <div class="why-kalp-icon"><i class="fa fa-home"></i></div>
                        <div class="why-kalp-content">
                            <h4>Everything in One Place</h4>
                            <p>Search, explore, shortlist and enquire with ease.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="how-kalp-works-section">
            <div class="container">
                <div class="how-kalp-header">
                     <div class="list-property-label">
                        <span class="label-line"></span>
                        <i class="fa fa-building"></i>
                        <span>HOW KALP REALTY WORKS</span>
                        <span class="label-line"></span>
                    </div>                     
                    <h2>Finding a Property <span>is Simple</span></h2>
                    <p>From searching for the right property to taking the next step, Kalp Realty keeps the process simple and convenient.</p>
                </div>
                <div class="how-kalp-steps">
                    <div class="how-kalp-line"></div>
                    <div class="how-kalp-step">
                        <div class="how-step-number">01</div>
                        <div class="how-step-icon">
                            <i class="fa fa-search"></i>
                        </div>
                        <div class="how-step-content">
                            <h3>Search</h3>
                            <span class="how-step-title">Select what you're looking for</span>
                            <p>Select what you're looking for and choose your preferred location.</p>
                        </div>
                    </div>
                    <div class="how-kalp-step">
                        <div class="how-step-number">02</div>
                        <div class="how-step-icon">
                            <i class="fa fa-compass"></i>
                        </div>
                        <div class="how-step-content">
                            <h3>Explore</h3>
                            <span class="how-step-title">Browse your options</span>
                            <p>Browse properties based on your requirements and budget.</p>
                        </div>
                    </div>
                    <div class="how-kalp-step">
                        <div class="how-step-number">03</div>
                        <div class="how-step-icon">
                            <i class="fa fa-heart"></i>
                        </div>
                        <div class="how-step-content">
                            <h3>Shortlist</h3>
                            <span class="how-step-title">Save your favourites</span>
                            <p>Save properties that you are interested in.</p>
                        </div>
                    </div>
                    <div class="how-kalp-step">
                        <div class="how-step-number">04</div>
                        <div class="how-step-icon">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="how-step-content">
                            <h3>Enquire</h3>
                            <span class="how-step-title">Connect with the property</span>
                            <p>Send an enquiry for the property you want to know more about.</p>
                        </div>
                    </div>
                    <div class="how-kalp-step">
                        <div class="how-step-number">05</div>
                        <div class="how-step-icon">
                            <i class="fa fa-arrow-right"></i>
                        </div>
                        <div class="how-step-content">
                            <h3>Take the Next Step</h3>
                            <span class="how-step-title">Move forward with confidence</span>
                            <p>Connect, visit and move forward with the property that suits your needs.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>      
          
        <!--End about Area-->
         <section class="about-area">
             <div class="container">
                <div class="how-kalp-header">
                     <div class="list-property-label">
                        <span class="label-line"></span>
                        <i class="fa fa-building"></i>
                        <span>Property Services</span>
                        <span class="label-line"></span>
                    </div>                     
                    <h2> We Help <span> You Find</span></h2>
                    <p>  Discover the right property for your needs with our trusted
                        residential and commercial property solutions for sale and rent.</p>
                </div>
                 
                <div class="row fact-counter">
                    <!--Start Single Fact Counter-->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                        <div class="single-fact-counter wow fadeInLeft" data-wow-delay="100ms" data-wow-duration="1500ms">
                            <div class="count-box">
                                <h1>
                                    <span class="timer" data-from="1" data-to="250" data-speed="5000" data-refresh-interval="50">250</span>
                                </h1>
                            </div>
                            <div class="title">
                                <h3>Properties Listed</h3>
                            </div>
                        </div>
                    </div>
                    <!--End Single Fact Counter-->
                    <!--Start Single Fact Counter-->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                        <div class="single-fact-counter wow fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="count-box">
                                <h1>
                                    <span class="timer" data-from="1" data-to="150" data-speed="5000" data-refresh-interval="50">150</span>
                                </h1>
                            </div>
                            <div class="title">
                                <h3>Properties Sold</h3>
                            </div>
                        </div>
                    </div>
                    <!--End Single Fact Counter-->
                    <!--Start Single Fact Counter-->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                        <div class="single-fact-counter wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="1500ms">
                            <div class="count-box">
                                <h1>
                                    <span class="timer" data-from="1" data-to="100" data-speed="5000" data-refresh-interval="50">100</span>
                                </h1>
                            </div>
                            <div class="title">
                                <h3>Properties Rented</h3>
                            </div>
                        </div>
                    </div>
                    <!--End Single Fact Counter-->
                    <!--Start Single Fact Counter-->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                        <div class="single-fact-counter wow fadeInLeft" data-wow-delay="400ms" data-wow-duration="1500ms">
                            <div class="count-box">
                                <h1>
                                    <span class="timer" data-from="1" data-to="500" data-speed="5000" data-refresh-interval="50">500</span>
                                </h1>
                            </div>
                            <div class="title">
                                <h3>Happy Customers</h3>
                            </div>
                        </div>
                    </div>
                    <!--End Single Fact Counter-->
                </div>
            </div>
        </section>
        <!--Start Recently Project Area-->
        <section class="recently-project-area">
            <div class="container">
                <div class="how-kalp-header">
                     <div class="list-property-label">
                        <span class="label-line"></span>
                        <i class="fa fa-building"></i>
                        <span>Property Types</span>
                        <span class="label-line"></span>
                    </div>                     
                    <h2> Explore <span> Properties</span></h2>
                    <p> Find the perfect property with curated residential and commercial spaces for living, investing, and growing your business.</p>
                </div>
                
            </div>
            <div class="container-fluid">
                <div class="project-carousel owl-carousel owl-theme">
                    <!-- Apartment -->
                    <div class="single-project-style1">
                        <div class="img-holder">
                            <img src="{{ asset('assets/frontend/images/projects/lat-pro-1.jpg') }}" alt="Apartment">
                            <div class="overlay-content">
                                <div class="inner-content">
                                    <div class="link-box">
                                        <a class="btn-one" href="{{ route('login') }}"> View Properties<span class="flaticon-next"></span> </a>
                                    </div>
                                </div>
                            </div>
                            <div class="title-box">
                                <span>Residential</span>
                                <h3>Apartment</h3>
                            </div>
                        </div>
                    </div>
                    <!-- Villa -->
                    <div class="single-project-style1">
                        <div class="img-holder">
                            <img src="{{ asset('assets/frontend/images/projects/lat-pro-2.jpg') }}" alt="Villa">
                            <div class="overlay-content">
                                <div class="inner-content">
                                    <div class="link-box">
                                        <a class="btn-one" href="{{ route('login') }}"> View Properties<span class="flaticon-next"></span> </a>
                                    </div>
                                </div>
                            </div>
                            <div class="title-box">
                                <span>Residential</span>
                                <h3>Villa</h3>
                            </div>
                        </div>
                    </div>
                    <!-- House -->
                    <div class="single-project-style1">
                        <div class="img-holder">
                            <img src="{{ asset('assets/frontend/images/projects/lat-pro-3.jpg') }}" alt="House">
                            <div class="overlay-content">
                                <div class="inner-content">
                                    <div class="link-box">
                                        <a class="btn-one" href="{{ route('login') }}"> View Properties<span class="flaticon-next"></span> </a>
                                    </div>
                                </div>
                            </div>
                            <div class="title-box">
                                <span>Residential</span>
                                <h3>House</h3>
                            </div>
                        </div>
                    </div>
                    <!-- Office -->
                    <div class="single-project-style1">
                        <div class="img-holder">
                            <img src="{{ asset('assets/frontend/images/projects/lat-pro-4.jpg') }}" alt="Office">
                            <div class="overlay-content">
                                <div class="inner-content">
                                    <div class="link-box">
                                        <a class="btn-one" href="{{ route('login') }}"> View Properties<span class="flaticon-next"></span> </a>
                                    </div>
                                </div>
                            </div>
                            <div class="title-box">
                                <span>Commercial</span>
                                <h3>Office</h3>
                            </div>
                        </div>
                    </div>
                    <!-- Shop -->
                    <div class="single-project-style1">
                        <div class="img-holder">
                            <img src="{{ asset('assets/frontend/images/projects/lat-pro-5.jpg') }}" alt="Shop">
                            <div class="overlay-content">
                                <div class="inner-content">
                                    <div class="link-box">
                                        <a class="btn-one" href="{{ route('login') }}"> View Properties<span class="flaticon-next"></span> </a>
                                    </div>
                                </div>
                            </div>
                            <div class="title-box">
                                <span>Commercial</span>
                                <h3>Shop</h3>
                            </div>
                        </div>
                    </div>
                    <!-- Land -->
                    <div class="single-project-style1">
                        <div class="img-holder">
                            <img src="{{ asset('assets/frontend/images/projects/lat-pro-1.jpg') }}" alt="Land">
                            <div class="overlay-content">
                                <div class="inner-content">
                                    <div class="link-box">
                                        <a class="btn-one" href="{{ route('login') }}"> View Properties<span class="flaticon-next"></span> </a>
                                    </div>
                                </div>
                            </div>
                            <div class="title-box">
                                <span>Property</span>
                                <h3>Land</h3>
                            </div>
                        </div>
                    </div>
                    <!-- Apartment -->
                    <div class="single-project-style1">
                        <div class="img-holder">
                            <img src="{{ asset('assets/frontend/images/projects/lat-pro-2.jpg') }}" alt="Apartment">
                            <div class="overlay-content">
                                <div class="inner-content">
                                    <div class="link-box">
                                        <a class="btn-one" href="{{ route('login') }}"> View Properties<span class="flaticon-next"></span> </a>
                                    </div>
                                </div>
                            </div>
                            <div class="title-box">
                                <span>Residential</span>
                                <h3>Apartment</h3>
                            </div>
                        </div>
                    </div>
                    <!-- Villa -->
                    <div class="single-project-style1">
                        <div class="img-holder">
                            <img src="{{ asset('assets/frontend/images/projects/lat-pro-3.jpg') }}" alt="Villa">
                            <div class="overlay-content">
                                <div class="inner-content">
                                    <div class="link-box">
                                        <a class="btn-one" href="{{ route('login') }}"> View Properties<span class="flaticon-next"></span> </a>
                                    </div>
                                </div>
                            </div>
                            <div class="title-box">
                                <span>Residential</span>
                                <h3>Villa</h3>
                            </div>
                        </div>
                    </div>
                    <!-- House -->
                    <div class="single-project-style1">
                        <div class="img-holder">
                            <img src="{{ asset('assets/frontend/images/projects/lat-pro-4.jpg') }}" alt="House">
                            <div class="overlay-content">
                                <div class="inner-content">
                                    <div class="link-box">
                                        <a class="btn-one" href="{{ route('login') }}"> View Properties<span class="flaticon-next"></span> </a>
                                    </div>
                                </div>
                            </div>
                            <div class="title-box">
                                <span>Residential</span>
                                <h3>House</h3>
                            </div>
                        </div>
                    </div>
                    <!-- Office -->
                    <div class="single-project-style1">
                        <div class="img-holder">
                            <img src="{{ asset('assets/frontend/images/projects/lat-pro-5.jpg') }}" alt="Office">
                            <div class="overlay-content">
                                <div class="inner-content">
                                    <div class="link-box">
                                        <a class="btn-one" href="{{ route('login') }}"> View Properties<span class="flaticon-next"></span> </a>
                                    </div>
                                </div>
                            </div>
                            <div class="title-box">
                                <span>Commercial</span>
                                <h3>Office</h3>
                            </div>
                        </div>
                    </div>
                    <!-- Shop -->
                    <div class="single-project-style1">
                        <div class="img-holder">
                            <img src="{{ asset('assets/frontend/images/projects/lat-pro-1.jpg') }}" alt="Shop">
                            <div class="overlay-content">
                                <div class="inner-content">
                                    <div class="link-box">
                                        <a class="btn-one" href="{{ route('login') }}"> View Properties<span class="flaticon-next"></span> </a>
                                    </div>
                                </div>
                            </div>
                            <div class="title-box">
                                <span>Commercial</span>
                                <h3>Shop</h3>
                            </div>
                        </div>
                    </div>
                    <!-- Land -->
                    <div class="single-project-style1">
                        <div class="img-holder">
                            <img src="{{ asset('assets/frontend/images/projects/lat-pro-2.jpg') }}" alt="Land">
                            <div class="overlay-content">
                                <div class="inner-content">
                                    <div class="link-box">
                                        <a class="btn-one" href="{{ route('login') }}"> View Properties<span class="flaticon-next"></span> </a>
                                    </div>
                                </div>
                            </div>
                            <div class="title-box">
                                <span>Property</span>
                                <h3>Land</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>        
        <section class="slogan-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="inner-content flex-box-two fix">
                            <div class="title float-left">
                                <h3>Looking for Your Dream Property? Let Our Experts Help You Find the Right One.</h3>
                            </div>
                            <div class="button float-right">
                                <a class="btn-one" href="{{ route('frontend.contact') }}">Contact Us<span class="flaticon-next"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End slogan area-->

        <!--Start Testimonial Area-->
        <section class="testimonial-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="sec-title float-left">
                            <p>Testimonials</p>
                            <div class="title">Our Customer <span>Words</span></div>
                        </div>

                        <div class="more-reviews-button float-right">
                            <a class="btn-two" href="#">
                                More Reviews<span class="flaticon-next"></span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <!--Start Single Testimonial Item-->
                    <div class="col-xl-4 col-lg-4">
                        <div class="single-testimonial-item text-center">
                            <div class="quote-icon">
                                <span class="icon-quote1"></span>
                            </div>

                            <div class="inner-content">
                                <div class="client-info">
                                    <h3>Shelly Johnson</h3>
                                    <span>California</span>
                                </div>

                                <div class="img-box">
                                    <img
                                        src="{{ asset('assets/frontend/images/testimonial/testi-1.png') }}"
                                        alt="Awesome Image"
                                    >
                                </div>

                                <div class="text-box">
                                    <p>
                                        Your guys were great knowledgeable, well experienced,
                                        efficient and neat. A true to work with Crystalo.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Single Testimonial Item-->

                    <!--Start Single Testimonial Item-->
                    <div class="col-xl-4 col-lg-4">
                        <div class="single-testimonial-item text-center">
                            <div class="quote-icon">
                                <span class="icon-quote1"></span>
                            </div>

                            <div class="inner-content">
                                <div class="client-info">
                                    <h3>Cathrine Wagner</h3>
                                    <span>Los Angeles</span>
                                </div>

                                <div class="img-box">
                                    <img
                                        src="{{ asset('assets/frontend/images/testimonial/testi-2.png') }}"
                                        alt="Awesome Image"
                                    >
                                </div>

                                <div class="text-box">
                                    <p>
                                        Indignation and dislike men who are so beguiled and
                                        demoralized by the charms of pleasure of the moment.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Single Testimonial Item-->

                    <!--Start Single Testimonial Item-->
                    <div class="col-xl-4 col-lg-4">
                        <div class="single-testimonial-item text-center">
                            <div class="quote-icon">
                                <span class="icon-quote1"></span>
                            </div>

                            <div class="inner-content">
                                <div class="client-info">
                                    <h3>Cuthbert Brain</h3>
                                    <span>Newyork City</span>
                                </div>

                                <div class="img-box">
                                    <img
                                        src="{{ asset('assets/frontend/images/testimonial/testi-3.png') }}"
                                        alt="Awesome Image"
                                    >
                                </div>

                                <div class="text-box">
                                    <p>
                                        Same as saying through shrinking from all pain these
                                        cases are perfectly simple and easy to distinguish.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Single Testimonial Item-->

                </div>
            </div>
        </section>
        <!--End Testimonial Area-->

        <!--Start appointment Area-->
        <section class="appointment-area" style="background-image:url('{{ asset('assets/frontend/images/resources/newsletter.png') }}');">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="map-content-box">
                            <div class="sec-title">
                                <p>NEWSLETTER</p>
                                <div class="title">Subscribe Our Newsletter</div>
                            </div>
                            <div class="appointment">
                                <form class="appointment-form" action="#" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="single-box">
                                                <input type="email" name="email" value="{{ old('email') }}" placeholder="Enter your email" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="single-box">
                                                <button class="btn-one" type="submit">Subscribe<span class="flaticon-next"></span></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="inner">
                                <p class="text-white">Get latest updates and properties in your inbox.</p>
                            </div>

                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <!--End appointment Area-->
        <section class="working-process-area">
            <div class="container">
                <div class="why-kalp-header">
                    <div class="list-property-label">
                        <span class="label-line"></span>
                        <i class="fa fa-building"></i>
                        <span>FOR PROPERTY BUYERS</span>
                        <span class="label-line"></span>
                    </div>                    
                    <h2>Find Your<span>Perfect Property</span></h2>
                    <h3>Property Search Made Simple.</h3>
                    <p>Discover properties for sale and rent, compare your options and connect with property owners.</p>
                </div>
                 
                <div class="row align-items-center">                    
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <div class="buyer-content-left">                            

                            <div class="buyer-confidence-title">
                                <p>BUY WITH CONFIDENCE</p>
                                <div class="title">Your Search For The Right <span>Property Starts Here</span></div>
                            </div>

                            <div class="buyer-feature-list">
                                <div class="buyer-feature-item">
                                    <div class="buyer-feature-icon">
                                        <span class="icon-architecture-and-city1"></span>
                                    </div>
                                    <div class="buyer-feature-content">
                                        <h4>Explore The Right Properties</h4>
                                        <p>Explore homes, apartments, villas, plots and commercial properties available for sale and rent in your preferred locations.</p>
                                    </div>
                                </div>

                                <div class="buyer-feature-item">
                                    <div class="buyer-feature-icon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <div class="buyer-feature-content">
                                        <h4>Save & Manage Your Interests</h4>
                                        <p>Create your buyer account to save your favourite properties, manage your enquiries and keep track of your property interests.</p>
                                    </div>
                                </div>

                                <div class="buyer-feature-item">
                                    <div class="buyer-feature-icon">
                                        <i class="fa fa-map-marker"></i>
                                    </div>
                                    <div class="buyer-feature-content">
                                        <h4>Connect With Property Owners</h4>
                                        <p>Find the property that matches your requirements and connect directly with property owners for further details.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="button buyer-buttons">
                                <a class="btn-one" href="{{ route('buyer.register') }}">Register As Buyer <span class="flaticon-next"></span></a>
                                <a class="btn-one" href="{{ route('buyer.login') }}">Buyer Login <span class="flaticon-next"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <div class="single-working-box wow fadeInRight" data-wow-delay="100ms" data-wow-duration="1500ms">
                            <div class="img-holder">
                                <div class="inner">
                                    <img src="{{ asset('assets/frontend/images/resources/find-properties.png') }}" alt="Find Your Property">
                                    <div class="overlay-style-one"></div>
                                </div>
                            </div>                           
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="working-process-area">
            <div class="container">
                <div class="why-kalp-header">
                    <div class="list-property-label">
                        <span class="label-line"></span>
                        <i class="fa fa-building"></i>
                        <span>FOR PROPERTY SELLERS</span>
                        <span class="label-line"></span>
                    </div>
                    <h2>Sell Your <span>Property With Confidence</span></h2>
                    <h3>Property Selling Made Simple.</h3>
                    <p>List your property, reach genuine buyers and connect with interested customers easily.</p>
                </div>
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <div class="single-working-box wow fadeInLeft" data-wow-delay="100ms" data-wow-duration="1500ms">
                            <div class="img-holder">
                                <div class="inner">
                                    <img src="{{ asset('assets/frontend/images/resources/sell-property.png') }}" alt="Sell Your Property">
                                    <div class="overlay-style-one"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <div class="buyer-content-left seller-content-left">
                            <div class="buyer-confidence-title">
                                <p>SELL WITH CONFIDENCE</p>
                                <div class="title">List Your Property And <span>Reach More Buyers</span></div>
                            </div>

                            <div class="buyer-feature-list">
                                <div class="buyer-feature-item">
                                    <div class="buyer-feature-icon">
                                        <i class="fa fa-building"></i>
                                    </div>
                                    <div class="buyer-feature-content">
                                        <h4>List Your Property</h4>
                                        <p>Add your residential or commercial property for sale or rent and showcase it to potential buyers and tenants.</p>
                                    </div>
                                </div>

                                <div class="buyer-feature-item">
                                    <div class="buyer-feature-icon">
                                        <i class="fa fa-users"></i>
                                    </div>
                                    <div class="buyer-feature-content">
                                        <h4>Reach Genuine Buyers</h4>
                                        <p>Get your property in front of genuine buyers and tenants who are actively searching for properties in your preferred location.</p>
                                    </div>
                                </div>

                                <div class="buyer-feature-item">
                                    <div class="buyer-feature-icon">
                                        <i class="fa fa-comments"></i>
                                    </div>
                                    <div class="buyer-feature-content">
                                        <h4>Connect With Interested Customers</h4>
                                        <p>Receive enquiries, manage your property interests and connect directly with buyers and tenants.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="button buyer-buttons">
                                <a class="btn-one" href="{{ route('seller.register') }}">Register As Seller <span class="flaticon-next"></span></a>
                                <a class="btn-one" href="{{ route('seller.login') }}">Seller Login <span class="flaticon-next"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>       
       

        <!--Start Brand area-->
       <section class="brand-area">
            <div class="container">
                <div class="sec-title">
                    <p>Corporate Clients</p>
                    <div class="title">More than <span>2000 Clients</span></div>
                </div>

                <div class="row">
                    <div class="col-xl-12">

                        <ul class="brand-items-carousel owl-carousel owl-theme">

                            <!--Start Single Brand Item-->
                            <li class="single-brand-item wow fadeInUp"
                                data-wow-delay="0ms"
                                data-wow-duration="1500ms">

                                <a href="#">
                                    <img
                                        src="{{ asset('assets/frontend/images/brand/1.png') }}"
                                        alt="Awesome Brand Image"
                                    >
                                </a>

                                <div class="overlay-content">
                                    <p>Miesian</p>
                                </div>
                            </li>
                            <!--End Single Brand Item-->

                            <!--Start Single Brand Item-->
                            <li class="single-brand-item wow fadeInUp"
                                data-wow-delay="200ms"
                                data-wow-duration="1500ms">

                                <a href="#">
                                    <img
                                        src="{{ asset('assets/frontend/images/brand/2.png') }}"
                                        alt="Awesome Brand Image"
                                    >
                                </a>

                                <div class="overlay-content">
                                    <p>Miesian</p>
                                </div>
                            </li>
                            <!--End Single Brand Item-->

                            <!--Start Single Brand Item-->
                            <li class="single-brand-item wow fadeInUp"
                                data-wow-delay="400ms"
                                data-wow-duration="1500ms">

                                <a href="#">
                                    <img
                                        src="{{ asset('assets/frontend/images/brand/3.png') }}"
                                        alt="Awesome Brand Image"
                                    >
                                </a>

                                <div class="overlay-content">
                                    <p>Miesian</p>
                                </div>
                            </li>
                            <!--End Single Brand Item-->

                            <!--Start Single Brand Item-->
                            <li class="single-brand-item wow fadeInUp"
                                data-wow-delay="600ms"
                                data-wow-duration="1500ms">

                                <a href="#">
                                    <img
                                        src="{{ asset('assets/frontend/images/brand/4.png') }}"
                                        alt="Awesome Brand Image"
                                    >
                                </a>

                                <div class="overlay-content">
                                    <p>Miesian</p>
                                </div>
                            </li>
                            <!--End Single Brand Item-->

                            <!--Start Single Brand Item-->
                            <li class="single-brand-item wow fadeInUp"
                                data-wow-delay="800ms"
                                data-wow-duration="1500ms">

                                <a href="#">
                                    <img
                                        src="{{ asset('assets/frontend/images/brand/5.png') }}"
                                        alt="Awesome Brand Image"
                                    >
                                </a>

                                <div class="overlay-content">
                                    <p>Miesian</p>
                                </div>
                            </li>
                            <!--End Single Brand Item-->

                            <!--Start Single Brand Item-->
                            <li class="single-brand-item wow fadeInUp"
                                data-wow-delay="800ms"
                                data-wow-duration="1500ms">

                                <a href="#">
                                    <img
                                        src="{{ asset('assets/frontend/images/brand/6.png') }}"
                                        alt="Awesome Brand Image"
                                    >
                                </a>

                                <div class="overlay-content">
                                    <p>Miesian</p>
                                </div>
                            </li>
                            <!--End Single Brand Item-->

                            <!--Start Single Brand Item-->
                            <li class="single-brand-item wow fadeInUp"
                                data-wow-delay="800ms"
                                data-wow-duration="1500ms">

                                <a href="#">
                                    <img
                                        src="{{ asset('assets/frontend/images/brand/5.png') }}"
                                        alt="Awesome Brand Image"
                                    >
                                </a>

                                <div class="overlay-content">
                                    <p>Miesian</p>
                                </div>
                            </li>
                            <!--End Single Brand Item-->

                            <!--Start Single Brand Item-->
                            <li class="single-brand-item wow fadeInUp"
                                data-wow-delay="800ms"
                                data-wow-duration="1500ms">

                                <a href="#">
                                    <img
                                        src="{{ asset('assets/frontend/images/brand/6.png') }}"
                                        alt="Awesome Brand Image"
                                    >
                                </a>

                                <div class="overlay-content">
                                    <p>Miesian</p>
                                </div>
                            </li>
                            <!--End Single Brand Item-->

                        </ul>

                    </div>
                </div>
            </div>
        </section>
        <!--End Brand area-->
         <script>
            document.addEventListener('DOMContentLoaded', function () {
                const tabs = document.querySelectorAll('.kalp-category-tab');
                const searchInput = document.getElementById('kalpPropertySearch');
                const searchButton = document.getElementById('kalpSearchButton');
                tabs.forEach(function (tab) {
                    tab.addEventListener('click', function () {
                        if (
                            this.getAttribute('href') &&
                            this.getAttribute('href') !== 'javascript:void(0)'
                        ) {
                            return;
                        }
                        tabs.forEach(function (item) {
                            item.classList.remove('active');
                        });
                        this.classList.add('active');
                        const placeholder = this.getAttribute('data-placeholder');
                        if (placeholder) {
                            searchInput.placeholder = placeholder;
                        }
                    });
                });
                searchButton.addEventListener('click', function () {
                    const selectedType = document.querySelector('.kalp-category-tab.active')?.getAttribute('data-type');

                    if (selectedType === 'buy') {
                        window.location.href = "{{ url('/buyer/register') }}";
                        return;
                    }

                    if (selectedType === 'rent') {
                        window.location.href = "{{ url('/buyer/register') }}";
                        return;
                    }

                    if (selectedType === 'sell') {
                        window.location.href = "{{ url('/seller/register') }}";
                        return;
                    }
                });
                searchInput.addEventListener('keydown', function (event) {
                    if (event.key === 'Enter') {
                        event.preventDefault();
                        searchButton.click();
                    }
                });

                const locationBox = document.querySelector('.kalp-location');
                const locationButton = document.getElementById('kalpLocationButton');
                const selectedLocation = document.getElementById('kalpSelectedLocation');
                const locationDropdown = document.getElementById('kalpLocationDropdown');
                const locationOptions = document.querySelectorAll('.kalp-location-option');

                locationButton.addEventListener('click', function (event) {
                    event.preventDefault();
                    event.stopPropagation();
                    locationBox.classList.toggle('active');
                });

                locationDropdown.addEventListener('click', function (event) {
                    event.stopPropagation();
                });

                locationOptions.forEach(function (option) {
                    option.addEventListener('click', function (event) {
                        event.preventDefault();
                        event.stopPropagation();

                        const location = this.getAttribute('data-location');

                        selectedLocation.textContent = location;

                        locationOptions.forEach(function (item) {
                            item.classList.remove('active');
                        });

                        this.classList.add('active');
                        locationBox.classList.remove('active');
                    });
                });

                document.addEventListener('click', function () {
                    locationBox.classList.remove('active');
                });
            });
        </script>
        
@endsection