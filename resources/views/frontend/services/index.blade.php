@extends('layouts.app')

@section('content')
<style>
    .services-page {
        width: 100%;
        background: #f7f8fc;
        padding: 70px 0 90px;
    }

    .services-container {
        width: min(1200px, calc(100% - 40px));
        margin: 0 auto;
    }

    .services-hero {
        position: relative;
        min-height: 480px;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        background-image: url("{{ asset('assets/frontend/images/services/services-banner.png') }}");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        border-radius: 0 0 14px 14px;
    }

    .services-hero-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(
            90deg,
            rgba(0, 0, 0, 0.72),
            rgba(0, 0, 0, 0.35),
            rgba(0, 0, 0, 0.55)
        );
    }

    .services-hero-content {
        position: relative;
        z-index: 2;
        width: min(900px, calc(100% - 40px));
        text-align: center;
        color: #ffffff;
    }

    .services-hero-label {
        display: inline-block;
        margin-bottom: 15px;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 3px;
        text-transform: uppercase;
    }

    .services-hero-content h1 {
        margin: 0 auto 18px;
        color: #ffffff;
        font-size: clamp(38px, 5vw, 64px);
        line-height: 1.1;
        font-weight: 600;
        letter-spacing: -1px;
    }

    .services-hero-content p {
        max-width: 650px;
        margin: 0 auto;
        font-size: 17px;
        line-height: 1.7;
        color: rgba(255, 255, 255, 0.9);
    }

    .services-heading {
        max-width: 800px;
        margin: 0 auto 65px;
        text-align: center;
    }

    .services-heading > span,
    .category-heading > span {
        display: inline-block;
        margin-bottom: 12px;
        color: #5b4df5;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 2.5px;
        text-transform: uppercase;
    }

    .services-heading h2,
    .category-heading h2 {
        margin: 0 0 18px;
        color: #161616;
        font-size: clamp(28px, 4vw, 42px);
        line-height: 1.2;
        font-weight: 600;
    }

    .services-heading p,
    .category-heading p {
        max-width: 720px;
        margin: 0 auto;
        color: #686868;
        font-size: 15px;
        line-height: 1.8;
    }

    .service-row {
        position: relative;
        width: 100%;
        min-height: 430px;
        display: grid;
        grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
        align-items: center;
        gap: 0;
        margin-bottom: 30px;
        padding: 22px;
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 8px 35px rgba(25, 30, 60, 0.06);
        overflow: hidden;
    }

    .service-row-reverse .service-image {
        order: 2;
    }

    .service-row-reverse .service-content {
        order: 1;
    }

    .service-image {
        width: 100%;
        height: 385px;
        overflow: hidden;
        border-radius: 8px;
    }

    .service-image img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        transition: transform 0.5s ease;
    }

    .service-row:hover .service-image img {
        transform: scale(1.04);
    }

    .service-content {
        width: 100%;
        max-width: 500px;
        padding: 35px 50px;
    }

    .service-content h3 {
        margin: 0 0 8px;
        color: #161616;
        font-size: 28px;
        line-height: 1.25;
        font-weight: 600;
    }

    .service-content h4 {
        margin: 0 0 17px;
        color: #444444;
        font-size: 17px;
        line-height: 1.5;
        font-weight: 500;
    }

    .service-content p {
        margin: 0 0 18px;
        color: #707070;
        font-size: 14px;
        line-height: 1.8;
    }

    .service-list-title {
        margin-bottom: 12px !important;
        color: #333333 !important;
        font-weight: 600;
    }

    .service-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-bottom: 25px;
    }

    .service-tags span {
        display: inline-flex;
        align-items: center;
        min-height: 30px;
        padding: 6px 11px;
        border: 1px solid #e7e7ef;
        border-radius: 5px;
        background: #fafaff;
        color: #555555;
        font-size: 11px;
        line-height: 1.2;
    }

    .service-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 9px;
        min-height: 42px;
        padding: 0 18px;
        border-radius: 5px;
        background: #4d43e8;
        color: #ffffff !important;
        font-size: 12px;
        font-weight: 600;
        text-decoration: none !important;
        transition:
            background 0.25s ease,
            transform 0.25s ease,
            box-shadow 0.25s ease;
    }

    .service-btn i {
        font-size: 11px;
        transition: transform 0.25s ease;
    }

    .service-btn:hover {
        background: #3930c9;
        color: #ffffff !important;
        transform: translateY(-2px);
        box-shadow: 0 8px 18px rgba(77, 67, 232, 0.2);
    }

    .service-btn:hover i {
        transform: translateX(3px);
    }

    .listing-steps {
        display: flex;
        flex-direction: column;
        gap: 12px;
        margin: 0 0 25px;
    }

    .listing-step {
        display: flex;
        align-items: flex-start;
        gap: 12px;
    }

    .listing-step > span {
        flex: 0 0 28px;
        width: 28px;
        height: 28px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: #f0efff;
        color: #5147e8;
        font-size: 10px;
        font-weight: 700;
    }

    .listing-step strong {
        display: block;
        margin-bottom: 2px;
        color: #333333;
        font-size: 12px;
        font-weight: 600;
    }

    .listing-step small {
        display: block;
        color: #777777;
        font-size: 11px;
        line-height: 1.5;
    }

    .category-heading {
        max-width: 800px;
        margin: 100px auto 55px;
        text-align: center;
    }

    .services-cta {
        position: relative;
        overflow: hidden;
        margin-top: 75px;
        padding: 90px 50px;
        border-radius: 16px;
        background:
            linear-gradient(
                115deg,
                rgba(20, 20, 35, 0.97),
                rgba(60, 52, 190, 0.94)
            ),
            url("{{ asset('assets/frontend/images/services/services-banner.png') }}");
        background-size: cover;
        background-position: center;
        text-align: center;
    }

    .services-cta::before {
        content: "";
        position: absolute;
        top: -180px;
        right: -120px;
        width: 480px;
        height: 480px;
        border: 1px solid rgba(255, 255, 255, 0.12);
        border-radius: 50%;
    }

    .services-cta::after {
        content: "";
        position: absolute;
        bottom: -220px;
        left: -150px;
        width: 450px;
        height: 450px;
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 50%;
    }

    .services-cta-content {
        position: relative;
        z-index: 2;
        max-width: 820px;
        margin: 0 auto;
    }

    .services-cta-label {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 20px;
        color: rgba(255, 255, 255, 0.75);
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 2.5px;
        text-transform: uppercase;
    }

    .services-cta-label::before,
    .services-cta-label::after {
        content: "";
        width: 35px;
        height: 1px;
        background: rgba(255, 255, 255, 0.5);
    }

    .services-cta-content > span {
        display: inline-block;
        margin-bottom: 18px;
        color: rgba(255, 255, 255, 0.75);
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 2.5px;
        text-transform: uppercase;
    }

    .services-cta-content h2 {
        margin: 0 0 22px;
        color: #ffffff;
        font-size: clamp(32px, 4.5vw, 54px);
        line-height: 1.15;
        font-weight: 600;
        letter-spacing: -1px;
    }

    .services-cta-content h2 span {
        color: #d8b45a;
    }

    .services-cta-content p {
        max-width: 720px;
        margin: 0 auto 32px;
        color: rgba(255, 255, 255, 0.82);
        font-size: 15px;
        line-height: 1.8;
    }

    .services-cta-buttons {
        position: relative;
        z-index: 3;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: wrap;
        gap: 14px;
        margin-top: 30px;
    }

    .cta-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
        min-width: 200px;
        min-height: 48px;
        padding: 0 24px;
        border-radius: 5px;
        font-size: 12px;
        font-weight: 600;
        text-decoration: none !important;
        transition: all 0.25s ease;
    }

    .cta-btn i {
        font-size: 11px;
        transition: transform 0.25s ease;
    }

    .cta-btn.primary {
        background: #ffffff;
        color: #4037cf !important;
    }

    .cta-btn.secondary {
        border: 1px solid rgba(255, 255, 255, 0.45);
        background: transparent;
        color: #ffffff !important;
    }

    .cta-btn.primary:hover {
        background: #d8b45a;
        color: #161616 !important;
        transform: translateY(-3px);
        box-shadow: 0 12px 25px rgba(0, 0, 0, 0.2);
    }

    .cta-btn.secondary:hover {
        background: #ffffff;
        border-color: #ffffff;
        color: #4037cf !important;
        transform: translateY(-3px);
    }

    .cta-btn:hover i {
        transform: translateX(3px);
    }

    @media (max-width: 991px) {
        .services-page {
            padding: 55px 0 70px;
        }

        .services-container {
            width: min(100% - 30px, 900px);
        }

        .services-hero {
            min-height: 400px;
        }

        .service-row {
            min-height: auto;
            grid-template-columns: 1fr;
            padding: 18px;
        }

        .service-row-reverse .service-image,
        .service-row-reverse .service-content {
            order: initial;
        }

        .service-image {
            height: 350px;
        }

        .service-content {
            max-width: none;
            padding: 35px 25px 25px;
        }

        .services-cta {
            padding: 75px 30px;
        }
    }

    @media (max-width: 767px) {
        .services-page {
            padding: 40px 0 55px;
        }

        .services-container {
            width: calc(100% - 24px);
        }

        .services-hero {
            min-height: 340px;
            border-radius: 0 0 10px 10px;
        }

        .services-hero-content {
            width: calc(100% - 30px);
        }

        .services-hero-content h1 {
            font-size: 34px;
            line-height: 1.15;
        }

        .services-hero-content p {
            font-size: 14px;
        }

        .services-heading {
            margin-bottom: 40px;
        }

        .services-heading h2,
        .category-heading h2 {
            font-size: 28px;
        }

        .services-heading p,
        .category-heading p {
            font-size: 13px;
        }

        .service-row {
            margin-bottom: 20px;
            padding: 12px;
            border-radius: 10px;
        }

        .service-image {
            height: 240px;
            border-radius: 7px;
        }

        .service-content {
            padding: 28px 10px 18px;
        }

        .service-content h3 {
            font-size: 24px;
        }

        .service-content h4 {
            font-size: 15px;
        }

        .service-content p {
            font-size: 13px;
            line-height: 1.7;
        }

        .service-tags {
            gap: 6px;
        }

        .service-tags span {
            font-size: 10px;
            padding: 5px 8px;
        }

        .service-btn {
            width: 100%;
        }

        .category-heading {
            margin: 65px auto 35px;
        }

        .services-cta {
            margin-top: 50px;
            padding: 60px 20px;
            border-radius: 12px;
        }

        .services-cta-content h2 {
            font-size: 30px;
        }

        .services-cta-content p {
            font-size: 13px;
        }

        .services-cta-buttons {
            flex-direction: column;
        }

        .cta-btn {
            width: 100%;
        }
    }

    @media (max-width: 480px) {
        .services-hero {
            min-height: 300px;
        }

        .services-hero-content h1 {
            font-size: 29px;
        }

        .service-image {
            height: 210px;
        }

        .service-content h3 {
            font-size: 22px;
        }

        .listing-step small {
            font-size: 10px;
        }

        .services-cta-label {
            font-size: 9px;
            letter-spacing: 1.5px;
        }

        .services-cta-label::before,
        .services-cta-label::after {
            width: 20px;
        }
    }




    .services-cta {
    position: relative;
    overflow: hidden;
    padding: 100px 40px;
    background: #111827;
    color: #ffffff;
}

.services-cta::before {
    content: "";
    position: absolute;
    top: -180px;
    right: -120px;
    width: 520px;
    height: 520px;
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 50%;
}

.services-cta::after {
    content: "";
    position: absolute;
    bottom: -220px;
    left: -160px;
    width: 500px;
    height: 500px;
    border: 1px solid rgba(255, 255, 255, 0.06);
    border-radius: 50%;
}

.services-cta-pattern {
    position: absolute;
    inset: 0;
    opacity: 0.04;
    background-image:
        linear-gradient(
            45deg,
            #ffffff 1px,
            transparent 1px
        );
    background-size: 35px 35px;
    pointer-events: none;
}

.services-cta-inner {
    position: relative;
    z-index: 2;
    max-width: 1250px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: minmax(0, 1.5fr) minmax(300px, 0.8fr);
    align-items: center;
    gap: 80px;
}

.services-cta-content {
    max-width: 800px;
}

.services-cta-label {
    display: flex;
    align-items: center;
    justify-content: flex-start;
    gap: 12px;
    margin-bottom: 25px;
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 2px;
    color: #d4a72c;
}

.services-cta-label span:first-child,
.services-cta-label span:last-child {
    width: 35px;
    height: 1px;
    background: #d4a72c;
}

.services-cta-label i {
    font-size: 13px;
}

.services-cta-content h2 {
    margin: 0 0 25px;
    font-size: clamp(42px, 5vw, 50px);
    line-height: 1.05;
    font-weight: 700;
    letter-spacing: -2px;
}

.services-cta-content h2 span {
    color: #d4a72c;
}

.services-cta-description {
    max-width: 720px;
    margin: 0 0 18px;
    color: rgba(255, 255, 255, 0.72);
    font-size: 16px;
    line-height: 1.8;
}

.services-cta-divider {
    width: 70px;
    height: 2px;
    margin: 28px 0;
    background: #d4a72c;
}

.services-cta-question {
    margin: 0 0 10px;
    color: #ffffff;
    font-size: 19px;
    font-weight: 600;
}

.services-cta-content h3 {
    max-width: 700px;
    margin: 30px 0 35px;
    font-size: 25px;
    line-height: 1.4;
    font-weight: 600;
        color: #fff;

}

.services-cta-content h3 span {
    color: #d4a72c;
}

.services-cta-buttons {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
}

.cta-btn {
    position: relative;
    display: inline-flex;
    align-items: center;
    justify-content: space-between;
    gap: 35px;
    min-width: 205px;
    padding: 15px 18px 15px 24px;
    border: 1px solid transparent;
    border-radius: 4px;
    text-decoration: none;
    font-size: 14px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.cta-btn i {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 34px;
    height: 34px;
    border-radius: 50%;
    font-size: 12px;
    transition: transform 0.3s ease;
}

.cta-btn:hover {
    text-decoration: none;
    transform: translateY(-3px);
}

.cta-btn:hover i {
    transform: translateX(4px);
}

.cta-btn.primary {
    background: #d4a72c;
    color: #111827;
}

.cta-btn.primary i {
    background: #111827;
    color: #ffffff;
}

.cta-btn.secondary {
    background: transparent;
    border-color: rgba(255, 255, 255, 0.25);
    color: #ffffff;
}

.cta-btn.secondary i {
    background: rgba(255, 255, 255, 0.1);
    color: #ffffff;
}

.cta-btn.secondary:hover {
    border-color: #d4a72c;
    color: #ffffff;
}

.services-cta-decoration {
    position: relative;
    min-height: 400px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.cta-property-card {
    position: relative;
    z-index: 4;
    width: 300px;
    padding: 25px;
    display: flex;
    align-items: center;
    gap: 18px;
    background: rgba(255, 255, 255, 0.08);
    border: 1px solid rgba(255, 255, 255, 0.14);
    border-radius: 12px;
    backdrop-filter: blur(12px);
    box-shadow: 0 25px 70px rgba(0, 0, 0, 0.25);
}

.cta-property-icon {
    flex-shrink: 0;
    width: 55px;
    height: 55px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #d4a72c;
    border-radius: 10px;
    color: #111827;
    font-size: 22px;
}

.cta-property-content {
    display: flex;
    flex-direction: column;
    gap: 5px;
}

.cta-property-content span {
    font-size: 9px;
    font-weight: 700;
    letter-spacing: 1.5px;
    color: #d4a72c;
}

.cta-property-content strong {
    font-size: 16px;
    font-weight: 600;
    color: #ffffff;
}

.cta-property-arrow {
    margin-left: auto;
}

.cta-property-arrow i {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 32px;
    height: 32px;
    border: 1px solid rgba(255, 255, 255, 0.15);
    border-radius: 50%;
    color: #d4a72c;
    font-size: 11px;
}

.cta-circle {
    position: absolute;
    border-radius: 50%;
    border: 1px solid rgba(212, 167, 44, 0.25);
}

.cta-circle-one {
    width: 280px;
    height: 280px;
}

.cta-circle-two {
    width: 390px;
    height: 390px;
}

.cta-building-icon {
    position: absolute;
    bottom: 25px;
    right: 40px;
    width: 85px;
    height: 85px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid rgba(255, 255, 255, 0.12);
    border-radius: 50%;
    color: rgba(255, 255, 255, 0.15);
    font-size: 34px;
}

@media (max-width: 991px) {
    .services-cta {
        padding: 80px 30px;
    }

    .services-cta-inner {
        grid-template-columns: 1fr;
        gap: 50px;
    }

    .services-cta-content {
        max-width: 100%;
        text-align: center;
    }

    .services-cta-label {
        justify-content: center;
    }

    .services-cta-description {
        margin-left: auto;
        margin-right: auto;
    }

    .services-cta-divider {
        margin: 28px auto;
    }

    .services-cta-buttons {
        justify-content: center;
    }

    .services-cta-decoration {
        min-height: 320px;
    }
}

@media (max-width: 575px) {
    .services-cta {
        padding: 65px 20px;
    }

    .services-cta-label {
        gap: 8px;
        font-size: 9px;
        letter-spacing: 1.2px;
    }

    .services-cta-label span:first-child,
    .services-cta-label span:last-child {
        width: 20px;
    }

    .services-cta-content h2 {
        font-size: 40px;
        letter-spacing: -1px;
    }

    .services-cta-content h3 {
        font-size: 21px;
    }

    .services-cta-buttons {
        flex-direction: column;
    }

    .cta-btn {
        width: 100%;
    }

    .services-cta-decoration {
        min-height: 250px;
    }

    .cta-property-card {
        width: 100%;
        max-width: 300px;
    }

    .cta-circle-one {
        width: 220px;
        height: 220px;
    }

    .cta-circle-two {
        width: 300px;
        height: 300px;
    }

    .cta-building-icon {
        right: 0;
        bottom: 0;
    }
}
</style>
<section class="services-hero">
    <div class="services-hero-overlay"></div>
    <div class="services-hero-content">
        <span class="services-hero-label">SERVICES</span>
        <h1>We Offer a Wide Range of Services </h1>
        <p> Everything you need to find, buy, sell, rent or list a property. </p>
    </div>
</section>
<section class="services-page">
    <div class="services-container">
        <div class="services-heading">
            <span>OUR SERVICES</span>
            <h2>Everything You Need to Find, Buy, Sell, Rent or List a Property </h2>
            <p>
                At Kalp Realty, we make property search and property listing simple.
                Whether you want to buy a home, rent a property, sell your existing
                property or list a property for sale or rent, Kalp Realty brings
                different property opportunities together in one place.
                With a major focus on Pune and Mumbai, you can explore residential,
                commercial, industrial and land properties based on your location,
                budget and requirements.
            </p>
        </div>
        <div class="service-row">
            <div class="service-image">
                <img src="{{ asset('assets/frontend/images/services/buy-property.png') }}" alt="Buy Property" >
            </div>
            <div class="service-content">                
                <h3>Buy Property</h3>
                <h4>Find the Right Property for Your Future</h4>
                <p>  Looking to buy a property?  </p>
                <p>
                    Whether you are searching for your first home, upgrading to a
                    bigger space, starting a business or planning your next investment,
                    Kalp Realty helps you explore different property options in Pune
                    and Mumbai.
                </p>
                <p class="service-list-title">
                    Explore properties such as:
                </p>
                <div class="service-tags">
                    <span>Flats & Apartments</span>
                    <span>Villas & Bungalows</span>
                    <span>Independent Houses</span>
                    <span>Builder Floors</span>
                    <span>Office Spaces</span>
                    <span>Shops & Showrooms</span>
                    <span>Commercial Properties</span>
                    <span>Land & Plots</span>
                    <span>Industrial Properties</span>
                    <span>Warehouses & Godowns</span>
                    <span>Factories</span>
                </div>
                <p>
                    Search based on your preferred location, property type, area and
                    budget to find options that match your requirements.
                </p>
                <a href="{{ route('frontend.home') }}" class="service-btn">
                    Explore Properties for Sale
                    <i class="fa fa-arrow-right"></i>
                </a>
            </div>
        </div>
        <div class="service-row service-row-reverse">
            <div class="service-image">
                <img   src="{{ asset('assets/frontend/images/services/rent-property.png') }}"   alt="Rent Property"  >
            </div>
            <div class="service-content">             
                <h3>Rent Property</h3>
                <h4>Find a Space That Fits Your Needs</h4>
                <p>
                    Looking for a property on rent?
                </p>
                <p>
                    Whether you need a home for your family, an office for your team,
                    a shop for your business or a warehouse for your operations,
                    Kalp Realty helps you explore rental properties across Pune
                    and Mumbai.
                </p>
                <p class="service-list-title">
                    Explore rental properties including:
                </p>
                <div class="service-tags">
                    <span>Flats & Apartments</span>
                    <span>Independent Houses</span>
                    <span>Villas & Bungalows</span>
                    <span>Office Spaces</span>
                    <span>Shops & Showrooms</span>
                    <span>Commercial Spaces</span>
                    <span>Warehouses</span>
                    <span>Godowns</span>
                    <span>Industrial Properties</span>
                </div>
                <p>
                    Choose your preferred location and requirements to explore
                    suitable rental options.
                </p>
                <a href="{{ route('frontend.home') }}" class="service-btn">
                    Explore Rental Properties
                    <i class="fa fa-arrow-right"></i>
                </a>
            </div>
        </div>
        <div class="service-row">
            <div class="service-image">
                <img
                    src="{{ asset('assets/frontend/images/services/sell-property.png') }}"
                    alt="Sell Property"
                >
            </div>
            <div class="service-content">           
                <h3>Sell Property</h3>
                <h4>Have a Property to Sell?</h4>
                <p>
                    Kalp Realty provides property owners, sellers and real estate
                    professionals with a platform to showcase properties to potential buyers.
                </p>
                <p>
                    Whether you want to sell a flat, villa, independent house, office,
                    shop, plot, land, warehouse or factory, you can create an account
                    and add your property listing.
                </p>

                <p>
                    Provide the right details to help interested buyers understand
                    your property and make an enquiry.
                </p>

                <p class="service-list-title">
                    Add important information such as:
                </p>

                <div class="service-tags">
                    <span>Property Type</span>
                    <span>Property Location</span>
                    <span>Expected Price</span>
                    <span>Property Area</span>
                    <span>Configuration</span>
                    <span>Property Description</span>
                    <span>Amenities & Features</span>
                    <span>Property Photos</span>
                </div>

                <p>
                    Give Your Property the Visibility It Deserves.
                </p>

                <a href="{{ route('seller.register') }}" class="service-btn">
                    Sell Your Property
                    <i class="fa fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <div class="service-row service-row-reverse">
            <div class="service-image">
                <img
                    src="{{ asset('assets/frontend/images/services/list-property.png') }}"
                    alt="List Your Property"
                >
            </div>

            <div class="service-content">
                

                <h3>List Your Property</h3>

                <h4>List Your Property on Kalp Realty</h4>

                <p>
                    Have a property available for sale, rent or resale?
                </p>

                <p>
                    Create your account and showcase your property on Kalp Realty.
                </p>

                <p>
                    Our simple property listing process helps property owners, agents
                    and builders add and manage their property details from one place.
                </p>

                <p class="service-list-title">
                    List Your Property in Simple Steps
                </p>

                <div class="listing-steps">
                    <div class="listing-step">
                        <span>01</span>

                        <div>
                            <strong>Create Your Account</strong>

                            <small>
                                Register with Kalp Realty and access your personal
                                property dashboard.
                            </small>
                        </div>
                    </div>

                    <div class="listing-step">
                        <span>02</span>

                        <div>
                            <strong>Add Property Details</strong>

                            <small>
                                Enter the important information about your property,
                                including its type, location, area, price and features.
                            </small>
                        </div>
                    </div>

                    <div class="listing-step">
                        <span>03</span>

                        <div>
                            <strong>Upload Property Photos</strong>

                            <small>
                                Add clear images that help potential buyers or tenants
                                understand your property better.
                            </small>
                        </div>
                    </div>

                    <div class="listing-step">
                        <span>04</span>

                        <div>
                            <strong>Publish Your Listing</strong>

                            <small>
                                Submit your property details and make your listing
                                available for users to explore.
                            </small>
                        </div>
                    </div>

                    <div class="listing-step">
                        <span>05</span>

                        <div>
                            <strong>Manage Your Listing</strong>

                            <small>
                                Update your property details and manage your listing
                                through your account.
                            </small>
                        </div>
                    </div>
                </div>

                <a href="{{ route('seller.register') }}" class="service-btn">
                    List Your Property
                    <i class="fa fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <div class="category-heading">
            <span>PROPERTY CATEGORIES</span>

            <h2>
                Explore Properties by Category
            </h2>

            <p>
                Every property requirement is different.

                Some people are looking for a home. Some need a place for their business.
                Others are searching for land, investment opportunities or industrial spaces.

                Kalp Realty brings multiple property categories together so you can easily
                explore the type of property you need.
            </p>
        </div>

        <div class="service-row">
            <div class="service-image">
                <img
                    src="{{ asset('assets/frontend/images/services/residential.png') }}"
                    alt="Residential Properties"
                >
            </div>

            <div class="service-content">
                

                <h3>Residential Properties</h3>

                <h4>Find a Place to Call Home</h4>

                <p>
                    Explore residential properties across Pune and Mumbai for buying,
                    renting or resale.
                </p>

                <p>
                    Whether you are a first-time buyer, looking for a bigger home or
                    searching for a property for investment, you can explore options
                    based on your requirements.
                </p>

                <p class="service-list-title">
                    Explore:
                </p>

                <div class="service-tags">
                    <span>1 RK</span>
                    <span>1 BHK</span>
                    <span>2 BHK</span>
                    <span>3 BHK</span>
                    <span>4 BHK & More</span>
                    <span>Apartments & Flats</span>
                    <span>Villas & Bungalows</span>
                    <span>Independent Houses</span>
                    <span>Builder Floors</span>
                    <span>Resale Homes</span>
                    <span>Rental Homes</span>
                </div>

                <a href="{{ route('frontend.home') }}" class="service-btn">
                    Explore Residential Properties
                    <i class="fa fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <div class="service-row service-row-reverse">
            <div class="service-image">
                <img
                    src="{{ asset('assets/frontend/images/services/commercial.png') }}"
                    alt="Commercial Properties"
                >
            </div>

            <div class="service-content">
                

                <h3>Commercial Properties</h3>

                <h4>Find the Right Space for Your Business</h4>

                <p>
                    The right location and property can play an important role in your business.
                </p>

                <p>
                    Kalp Realty helps business owners, entrepreneurs and professionals
                    explore commercial properties across Pune and Mumbai.
                </p>

                <p class="service-list-title">
                    Explore:
                </p>

                <div class="service-tags">
                    <span>Office Spaces</span>
                    <span>Shops</span>
                    <span>Showrooms</span>
                    <span>Retail Spaces</span>
                    <span>Commercial Buildings</span>
                    <span>Business Spaces</span>
                </div>

                <p>
                    Find properties based on your preferred location, required area
                    and business requirements.
                </p>

                <a href="{{ route('frontend.home') }}" class="service-btn">
                    Explore Commercial Properties
                    <i class="fa fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <div class="service-row">
            <div class="service-image">
                <img
                    src="{{ asset('assets/frontend/images/services/industrial.png') }}"
                    alt="Industrial Properties"
                >
            </div>

            <div class="service-content">
                

                <h3>Industrial Properties</h3>

                <h4>Find Space for Business Operations and Growth</h4>

                <p>
                    Looking for a property for manufacturing, production, operations
                    or other industrial requirements?
                </p>

                <p>
                    Kalp Realty helps you explore industrial properties across suitable locations.
                </p>

                <p class="service-list-title">
                    Explore:
                </p>

                <div class="service-tags">
                    <span>Industrial Units</span>
                    <span>Industrial Sheds</span>
                    <span>Manufacturing Spaces</span>
                    <span>Factories</span>
                    <span>Industrial Land</span>
                    <span>Business & Operational Spaces</span>
                </div>

                <p>
                    Find a property that supports your business requirements today
                    and your growth tomorrow.
                </p>

                <a href="{{ route('frontend.home') }}" class="service-btn">
                    Explore Industrial Properties
                    <i class="fa fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <div class="service-row service-row-reverse">
            <div class="service-image">
                <img
                    src="{{ asset('assets/frontend/images/services/warehouse.png') }}"
                    alt="Warehouses and Godowns"
                >
            </div>

            <div class="service-content">
                

                <h3>Warehouses & Godowns</h3>

                <h4>Find the Right Space for Storage and Operations</h4>

                <p>
                    Businesses involved in storage, logistics, distribution and operations
                    require the right amount of space in the right location.
                </p>

                <p>
                    Kalp Realty helps you explore warehouses and godowns based on
                    your operational requirements.
                </p>

                <p class="service-list-title">
                    Suitable for:
                </p>

                <div class="service-tags">
                    <span>Storage</span>
                    <span>Logistics</span>
                    <span>Distribution</span>
                    <span>Inventory Management</span>
                    <span>Business Operations</span>
                    <span>Manufacturing Support</span>
                </div>

                <p>
                    Explore available spaces based on location and area requirements.
                </p>

                <a href="{{ route('frontend.home') }}" class="service-btn">
                    Explore Warehouses & Godowns
                    <i class="fa fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <div class="service-row">
            <div class="service-image">
                <img
                    src="{{ asset('assets/frontend/images/services/land.png') }}"
                    alt="Land and Plots"
                >
            </div>

            <div class="service-content">
                

                <h3>Land & Plots</h3>

                <h4>Find Land for Your Future Plans</h4>

                <p>
                    Whether you are planning to build a home, start a business,
                    develop a project or invest for the future, Kalp Realty helps
                    you explore different types of land and plots.
                </p>

                <p class="service-list-title">
                    Explore:
                </p>

                <div class="service-tags">
                    <span>Residential Plots</span>
                    <span>Open Plots</span>
                    <span>Commercial Land</span>
                    <span>Industrial Land</span>
                    <span>Agricultural Land</span>
                    <span>Farm Land</span>
                </div>

                <p>
                    Find land opportunities based on your preferred location and requirements.
                </p>

                <a href="{{ route('frontend.home') }}" class="service-btn">
                    Explore Land & Plots
                    <i class="fa fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <div class="service-row service-row-reverse">
            <div class="service-image">
                <img
                    src="{{ asset('assets/frontend/images/services/new-projects.png') }}"
                    alt="New Projects"
                >
            </div>

            <div class="service-content">
                

                <h3>New Projects</h3>

                <h4>Discover New Property Opportunities</h4>

                <p>
                    Looking for a newly launched or upcoming property?
                </p>

                <p>
                    Explore new residential and commercial projects across Pune and Mumbai.
                </p>

                <p class="service-list-title">
                    Discover opportunities including:
                </p>

                <div class="service-tags">
                    <span>New Residential Projects</span>
                    <span>Apartments & Flats</span>
                    <span>Premium Homes</span>
                    <span>Villas & Bungalows</span>
                    <span>Commercial Projects</span>
                    <span>Office Projects</span>
                </div>

                <p>
                    Explore available project information and find options that suit your requirements.
                </p>

                <a href="{{ route('frontend.home') }}" class="service-btn">
                    Explore New Projects
                    <i class="fa fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <div class="service-row">
            <div class="service-image">
                <img
                    src="{{ asset('assets/frontend/images/services/resale.png') }}"
                    alt="Resale Properties"
                >
            </div>

            <div class="service-content">
                

                <h3>Resale Properties</h3>

                <h4>Explore More Property Opportunities</h4>

                <p>
                    Looking for an existing property in an established location?
                </p>

                <p>
                    Kalp Realty helps you explore resale properties across different
                    residential and commercial categories.
                </p>

                <p class="service-list-title">
                    Explore:
                </p>

                <div class="service-tags">
                    <span>Resale Flats</span>
                    <span>Resale Apartments</span>
                    <span>Resale Houses</span>
                    <span>Resale Villas</span>
                    <span>Resale Office Spaces</span>
                    <span>Resale Shops</span>
                    <span>Other Resale Properties</span>
                </div>

                <p>
                    Find options based on your preferred location, budget and requirements.
                </p>

                <a href="{{ route('frontend.home') }}" class="service-btn">
                    Explore Resale Properties
                    <i class="fa fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <div class="service-row service-row-reverse">
            <div class="service-image">
                <img
                    src="{{ asset('assets/frontend/images/services/service-row-reverse.png') }}"
                    alt="Property Owners, Agents and Builders"
                >
            </div>

            <div class="service-content">
                

                <h3>For Property Owners, Agents & Builders</h3>

                <h4>Showcase Your Properties with Kalp Realty</h4>

                <p>
                    Kalp Realty is designed for both property seekers and property professionals.
                </p>

                <p>
                    If you have one property or manage multiple properties, you can use
                    Kalp Realty to showcase your available listings.
                </p>

                <p class="service-list-title">
                    Suitable for:
                </p>

                <div class="service-tags">
                    <span>Property Owners</span>
                    <span>Individual Sellers</span>
                    <span>Real Estate Agents</span>
                    <span>Property Consultants</span>
                    <span>Builders</span>
                    <span>Developers</span>
                    <span>Channel Partners</span>
                </div>

                <p class="service-list-title">
                    Manage Your Property Listings
                </p>

                <p>
                    With your Kalp Realty account, you can:
                </p>

                <div class="service-tags">
                    <span>Add New Properties</span>
                    <span>Edit Property Details</span>
                    <span>Upload Property Photos</span>
                    <span>Update Price or Rent</span>
                    <span>Manage Property Availability</span>
                    <span>View Property Enquiries</span>
                    <span>Manage Multiple Property Listings</span>
                </div>

                <p>
                    Your Properties. One Simple Platform.
                </p>

                <a href="{{ route('seller.register') }}" class="service-btn">
                    Create Your Account
                    <i class="fa fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <div class="category-heading">
            <span>HOW KALP REALTY WORKS</span>

            <h2>
                Finding the Right Property is Simple
            </h2>
        </div>

        <div class="service-row">
            <div class="service-image">
                <img
                    src="{{ asset('assets/frontend/images/services/service-row-how-works.png') }}"
                    alt="How Kalp Realty Works"
                >
            </div>

            <div class="service-content">
                

                <h3>How Kalp Realty Works</h3>

                <h4>Finding the Right Property is Simple</h4>

                <div class="listing-steps">
                    <div class="listing-step">
                        <span>01</span>

                        <div>
                            <strong>Search</strong>

                            <small>
                                Choose whether you want to buy, rent, sell or explore
                                a specific type of property.
                            </small>
                        </div>
                    </div>

                    <div class="listing-step">
                        <span>02</span>

                        <div>
                            <strong>Choose Your Location</strong>

                            <small>
                                Select your preferred area in Pune or Mumbai.
                            </small>
                        </div>
                    </div>

                    <div class="listing-step">
                        <span>03</span>

                        <div>
                            <strong>Explore Properties</strong>

                            <small>
                                Browse available properties based on your requirements,
                                property type and budget.
                            </small>
                        </div>
                    </div>

                    <div class="listing-step">
                        <span>04</span>

                        <div>
                            <strong>Shortlist</strong>

                            <small>
                                Save the properties you are interested in and review them later.
                            </small>
                        </div>
                    </div>

                    <div class="listing-step">
                        <span>05</span>

                        <div>
                            <strong>Send an Enquiry</strong>

                            <small>
                                Send an enquiry to know more about the property and take the next step.
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="services-cta">
    <div class="services-cta-pattern"></div>

    <div class="services-cta-inner">
        <div class="services-cta-content">
            <div class="services-cta-label">
                <span></span>
                <i class="fa fa-building"></i>
                <span>READY TO FIND YOUR NEXT PROPERTY?</span>
                <span></span>
            </div>

            <h2>
                Find It with <span>Kalp Realty.</span>
            </h2>

            <p class="services-cta-description">
                Whether you are looking for a home, office, shop, warehouse, land
                or another type of property, Kalp Realty helps you explore the right opportunities.
            </p>

            <div class="services-cta-divider"></div>

            <p class="services-cta-question">
                Looking to Sell or Rent a Property?
            </p>

            <p class="services-cta-description">
                Create your account and list your property for people looking for
                properties in Pune and Mumbai.
            </p>

            <h3>
                Find the Right Property.
                <span>Or List the One You Have.</span>
            </h3>

            <div class="services-cta-buttons">
                <a
                    href="{{ route('frontend.home') }}"
                    class="cta-btn primary"
                >
                    <span>Find a Property</span>
                    <i class="fa fa-arrow-right"></i>
                </a>

                <a
                    href="{{ route('seller.register') }}"
                    class="cta-btn secondary"
                >
                    <span>List Your Property</span>
                    <i class="fa fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <div class="services-cta-decoration">
            <div class="cta-property-card">
                <div class="cta-property-icon">
                    <i class="fa fa-home"></i>
                </div>

                <div class="cta-property-content">
                    <span>PROPERTY SEARCH</span>
                    <strong>Find Your Next Space</strong>
                </div>

                <div class="cta-property-arrow">
                    <i class="fa fa-arrow-up"></i>
                </div>
            </div>

            <div class="cta-circle cta-circle-one"></div>
            <div class="cta-circle cta-circle-two"></div>
            <div class="cta-building-icon">
                <i class="fa fa-building"></i>
            </div>
        </div>
    </div>
</div>

    </div>
</section>

@endsection