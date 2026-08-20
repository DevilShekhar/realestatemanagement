@extends('layouts.app')
    @section('content')
        <!--Start breadcrumb area-->
        <section class="breadcrumb-area"  style="background-image: url('{{ asset('assets/frontend/images/resources/breadcrumb-bg.jpg') }}');">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="inner-content clearfix">
                            <div class="title">
                                <h1>About Kalp Realty.</h1>
                            </div>
                            <div class="breadcrumb-menu float-right">
                                <ul class="clearfix">
                                    <li><a href="index-2.html">Home</a></li>
                                    <li class="active">Account</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End breadcrumb area-->
        <section class="about-kalp-section">
            <div class="container">
                <div class="about-kalp-header">
                    <div class="about-kalp-label">
                        <span class="about-kalp-label-line"></span>
                        <i class="fa fa-building"></i>
                        <span>ABOUT KALP REALTY</span>
                        <span class="about-kalp-label-line"></span>
                    </div>
                    <h2>Making Property Search Simple in <span>Pune &amp; Mumbai</span></h2>
                    <p>Kalp Realty is a real estate platform designed to make it easier to <strong>buy, sell, rent and list properties</strong>.</p>
                </div>
                <div class="about-kalp-intro">
                    <div class="about-kalp-intro-number">01</div>
                    <div class="about-kalp-intro-content">
                        <h3>About Kalp Realty</h3>
                        <p>We understand that every property search is different.</p>
                        <p>Some people are looking for their first home. Some are searching for a bigger space for their family. A business may need an office, shop or warehouse. An investor may be looking for land or a property with future potential.</p>
                    </div>
                    <div class="about-kalp-intro-mark">
                        <i class="fa fa-home"></i>
                    </div>
                </div>
            </div>
        </section>

        <section class="about-kalp-vision-section">
            <div class="container">
                <div class="about-kalp-vision-wrapper">
                    <div class="about-kalp-vision-number">02</div>
                    <div class="about-kalp-vision-content">
                        <div class="about-kalp-label about-kalp-label-left">
                            <span class="about-kalp-label-line"></span>
                            <span>OUR APPROACH</span>
                        </div>
                        <h2>Kalp Realty brings these property needs <span>together in one place.</span></h2>
                        <p>Our platform helps users explore different types of properties while also giving property owners, sellers, agents and builders a simple way to showcase their properties.</p>
                    </div>
                    <div class="about-kalp-vision-icon">
                        <i class="fa fa-map-marker"></i>
                    </div>
                </div>
            </div>
        </section>
        <section class="kalp-find-section">
            <div class="container">
                <div class="kalp-find-header">
                    <div class="about-kalp-label">
                        <span class="about-kalp-label-line"></span>
                        <i class="fa fa-th-large"></i>
                        <span>PROPERTY CATEGORIES</span>
                        <span class="about-kalp-label-line"></span>
                    </div>                     
                    <h2>What Can You Find on <span>Kalp Realty?</span></h2>
                    <p>You can explore:</p>
                </div>
                <div class="kalp-find-grid">
                    <div class="kalp-find-card">
                        <span class="kalp-find-number">01</span>
                        <div class="kalp-find-icon">
                            <i class="fa fa-home"></i>
                        </div>
                        <h3>Residential Properties</h3>
                        <p>Apartments &amp; Flats</p>
                    </div>
                    <div class="kalp-find-card">
                        <span class="kalp-find-number">02</span>
                        <div class="kalp-find-icon">
                            <i class="fa fa-building"></i>
                        </div>
                        <h3>Villas &amp; Bungalows</h3>
                        <p>Independent Houses</p>
                    </div>
                    <div class="kalp-find-card">
                        <span class="kalp-find-number">03</span>
                        <div class="kalp-find-icon">
                            <i class="fa fa-key"></i>
                        </div>
                        <h3>Builder Floors</h3>
                        <p>Resale Properties</p>
                    </div>
                    <div class="kalp-find-card">
                        <span class="kalp-find-number">04</span>
                        <div class="kalp-find-icon">
                            <i class="fa fa-exchange"></i>
                        </div>
                        <h3>Rental Properties</h3>
                        <p>New Projects</p>
                    </div>
                    <div class="kalp-find-card">
                        <span class="kalp-find-number">05</span>
                        <div class="kalp-find-icon">
                            <i class="fa fa-briefcase"></i>
                        </div>
                        <h3>Office Spaces</h3>
                        <p>Shops &amp; Showrooms</p>
                    </div>
                    <div class="kalp-find-card">
                        <span class="kalp-find-number">06</span>
                        <div class="kalp-find-icon">
                            <i class="fa fa-building-o"></i>
                        </div>
                        <h3>Commercial Properties</h3>
                        <p>Land &amp; Plots</p>
                    </div>
                    <div class="kalp-find-card">
                        <span class="kalp-find-number">07</span>
                        <div class="kalp-find-icon">
                            <i class="fa fa-industry"></i>
                        </div>
                        <h3>Industrial Properties</h3>
                        <p>Warehouses &amp; Godowns</p>
                    </div>
                    <div class="kalp-find-card">
                        <span class="kalp-find-number">08</span>
                        <div class="kalp-find-icon">
                            <i class="fa fa-leaf"></i>
                        </div>
                        <h3>Factories</h3>
                        <p>Agricultural &amp; Farm Land</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="kalp-focus-section">
            <div class="container">
                <div class="kalp-focus-wrapper">
                    <div class="kalp-focus-image">
                        <img src="{{ asset('assets/frontend/images/resources/pune-mumbai-focus.png') }}" alt="Pune and Mumbai Properties">
                        <div class="kalp-focus-image-overlay"></div>
                        <div class="kalp-focus-location">
                            <i class="fa fa-map-marker"></i>
                        </div>
                    </div>
                    <div class="kalp-focus-content">
                        <div class="kalp-focus-label">
                            <span></span>
                            <i class="fa fa-map-marker"></i>
                            <span>OUR FOCUS</span>
                        </div>
                        <h2>Pune <span>&amp;</span> Mumbai</h2>
                        <div class="kalp-focus-line"></div>
                        <p>Kalp Realty is focused on helping people explore property opportunities across Pune and Mumbai.</p>
                        <p>From growing residential locations to major business hubs, we aim to make property discovery easier and more convenient.</p>
                        <div class="kalp-focus-cities">
                            <div class="kalp-focus-city">
                                <i class="fa fa-map-marker"></i>
                                <span>Pune</span>
                            </div>
                            <div class="kalp-focus-city-divider"></div>
                            <div class="kalp-focus-city">
                                <i class="fa fa-map-marker"></i>
                                <span>Mumbai</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="mission-vision-section">
            <div class="mission-vision-wrapper">
                <div class="mission-panel">
                    <div class="mission-content">
                        <div class="mission-icon">
                            <i class="fa fa-bullseye"></i>
                        </div>
                        <div class="mission-heading-line"></div>
                        <h3>OUR MISSION</h3>
                        <div class="mission-small-line"></div>
                        <h2>To Make Property<br>Search and Listing<br><span>Simple for Everyone.</span></h2>
                        <div class="mission-divider"></div>
                        <p>Whether you're looking for one property or managing multiple listings, Kalp Realty is designed to make the process easy to understand and easy to use.</p>
                        <div class="mission-features">
                            <div class="mission-feature">
                                <i class="fa fa-search"></i>
                                <span>EASY SEARCH</span>
                            </div>
                            <div class="mission-feature">
                                <i class="fa fa-list-alt"></i>
                                <span>EASY LISTING</span>
                            </div>
                            <div class="mission-feature">
                                <i class="fa fa-users"></i>
                                <span>FOR EVERYONE</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="vision-panel">
                    <div class="vision-content">
                        <div class="vision-icon">
                            <i class="fa fa-eye"></i>
                        </div>
                        <div class="vision-heading-line"></div>
                        <h3>OUR VISION</h3>
                        <div class="vision-small-line"></div>
                        <p>To build a reliable property platform that helps people discover the right opportunities and helps property owners connect with the right audience.</p>
                    </div>
                    <div class="vision-brand">
                        <div class="vision-brand-logo">
                            <i class="fa fa-building"></i>
                        </div>
                        <div class="vision-brand-name">KALP</div>
                        <div class="vision-brand-subtitle">REALTY</div>
                        <div class="vision-brand-tagline">FIND • CONNECT • GROW</div>
                    </div>
                </div>
            </div>
        </section>
       
    @endsection