@extends('admin.layouts.app')

@section('content')

<style>
/* =========================================================
   PROPERTY SEARCH PAGE
========================================================= */

.property-search-page {
    width: 100%;
    min-height: 100vh;
    padding: 30px;
    background: #f7f8fa;
}


/* =========================================================
   PAGE HEADER
========================================================= */

.property-page-header {
    display: flex;
    align-items: center;
    justify-content: space-between;

    margin-bottom: 25px;
}


.property-header-left {
    min-width: 0;
}


.property-breadcrumb {
    display: flex;
    align-items: center;
    gap: 8px;

    margin-bottom: 12px;

    font-size: 12px;
    color: #8a9099;
}


.property-breadcrumb a {
    color: #666d77;
    text-decoration: none;
}


.property-breadcrumb a:hover {
    color: #111827;
}


.property-heading-content {
    display: flex;
    align-items: center;
    gap: 15px;
}


.property-heading-icon {
    width: 52px;
    height: 52px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 13px;

    background: #111827;
    color: #ffffff;

    font-size: 22px;

    box-shadow:
        0 7px 18px rgba(17, 24, 39, .12);
}


.property-header-small {
    display: block;

    margin-bottom: 4px;

    font-size: 10px;
    font-weight: 800;

    letter-spacing: 1.4px;

    color: #8b919b;
}


.property-heading-content h1 {
    margin: 0;

    font-size: 28px;
    line-height: 1.2;

    font-weight: 750;

    color: #1f2937;
}


.property-heading-content p {
    margin: 6px 0 0;

    font-size: 13px;

    color: #7b818b;
}


.property-header-right {
    display: flex;
    align-items: center;
}


.property-header-badge {
    display: flex;
    align-items: center;
    gap: 8px;

    padding: 9px 14px;

    border: 1px solid #e3e6ea;
    border-radius: 30px;

    background: #ffffff;

    font-size: 12px;
    font-weight: 600;

    color: #555c66;
}


.badge-dot,
.result-status-dot {
    width: 7px;
    height: 7px;

    border-radius: 50%;

    background: #20a464;

    box-shadow:
        0 0 0 4px rgba(32, 164, 100, .10);
}


/* =========================================================
   SEARCH CARD
========================================================= */

.property-search-card {
    overflow: hidden;

    background: #ffffff;

    border: 1px solid #e5e7eb;
    border-radius: 16px;

    box-shadow:
        0 5px 25px rgba(15, 23, 42, .035);
}


.search-card-header {
    padding: 20px 24px;

    border-bottom: 1px solid #edf0f2;
}


.search-card-title {
    display: flex;
    align-items: center;
    gap: 13px;
}


.search-card-icon {
    width: 40px;
    height: 40px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 10px;

    background: #f2f3f5;

    color: #111827;

    font-size: 17px;
}


.search-card-title h2 {
    margin: 0;

    font-size: 16px;
    font-weight: 700;

    color: #252a32;
}


.search-card-title p {
    margin: 4px 0 0;

    font-size: 12px;

    color: #858b94;
}


.search-card-body {
    padding: 25px;
}


/* =========================================================
   MAIN LABEL
========================================================= */

.filter-main-label {
    display: block;

    margin-bottom: 9px;

    font-size: 12px;
    font-weight: 700;

    color: #363c45;
}


/* =========================================================
   PURPOSE TABS
========================================================= */

.purpose-tabs {
    display: inline-flex;

    gap: 6px;

    padding: 5px;

    background: #f3f4f6;

    border: 1px solid #e5e7eb;
    border-radius: 11px;
}


.purpose-tab {
    margin: 0;

    cursor: pointer;
}


.purpose-tab input {
    display: none;
}


.purpose-tab span {
    min-width: 145px;

    min-height: 48px;

    padding: 7px 17px;

    display: flex;
    align-items: center;
    justify-content: center;

    gap: 9px;

    border-radius: 8px;

    color: #6b7280;

    transition:
        background .2s ease,
        color .2s ease,
        box-shadow .2s ease;
}


.purpose-tab span i {
    font-size: 17px;
}


.purpose-tab span strong {
    font-size: 13px;
    font-weight: 700;
}


.purpose-tab span small {
    display: none;

    font-size: 10px;
}


.purpose-tab input:checked + span {
    background: #111827;

    color: #ffffff;

    box-shadow:
        0 4px 12px rgba(17, 24, 39, .15);
}


/* =========================================================
   FILTER GROUP
========================================================= */

.filter-group {
    width: 100%;
}


.filter-group > label {
    display: block;

    margin-bottom: 8px;

    font-size: 12px;
    font-weight: 700;

    color: #363c45;
}


.required-star {
    color: #dc3545;
}


/* =========================================================
   SELECT
========================================================= */

.select-wrapper {
    position: relative;
}


.select-left-icon {
    position: absolute;

    left: 15px;
    top: 50%;

    z-index: 3;

    transform: translateY(-50%);

    color: #858c96;

    font-size: 15px;

    pointer-events: none;
}


.filter-control {
    width: 100%;
    height: 48px;

    padding-left: 43px;
    padding-right: 42px;

    border: 1px solid #dfe3e7 !important;
    border-radius: 9px !important;

    background-color: #ffffff !important;

    color: #343a43 !important;

    font-size: 13px !important;
    font-weight: 500;

    box-shadow: none !important;

    cursor: pointer;

    transition:
        border-color .2s ease,
        box-shadow .2s ease;
}


.filter-control:hover {
    border-color: #c8cdd3 !important;
}


.filter-control:focus {
    border-color: #111827 !important;

    box-shadow:
        0 0 0 3px rgba(17, 24, 39, .06) !important;
}


.select-arrow {
    position: absolute;

    right: 15px;
    top: 50%;

    z-index: 3;

    transform: translateY(-50%);

    color: #858c96;

    font-size: 11px;

    pointer-events: none;
}


/* =========================================================
   AMENITIES
========================================================= */

.amenities-box {
    width: 100%;
    min-height: 48px;

    display: flex;
    align-items: center;
    flex-wrap: wrap;

    gap: 7px;

    padding: 7px 9px;

    border: 1px solid #dfe3e7;
    border-radius: 9px;

    background: #ffffff;
}


.amenity-checkbox {
    margin: 0;

    cursor: pointer;
}


.amenity-checkbox input {
    display: none;
}


.amenity-checkbox span {
    min-height: 31px;

    display: inline-flex;
    align-items: center;

    padding: 5px 11px;

    border: 1px solid #e0e3e6;
    border-radius: 20px;

    background: #f8f9fa;

    color: #666d77;

    font-size: 11px;
    font-weight: 600;

    transition: all .2s ease;
}


.amenity-checkbox span:hover {
    border-color: #c5c9ce;
}


.amenity-checkbox input:checked + span {
    background: #111827;

    border-color: #111827;

    color: #ffffff;
}


.amenity-checkbox input:checked + span::before {
    content: "✓";

    margin-right: 5px;

    font-size: 10px;
}


.amenity-loading {
    display: flex;
    align-items: center;
    gap: 8px;

    color: #9298a1;

    font-size: 11px;
}


.mini-loader {
    width: 13px;
    height: 13px;

    border: 2px solid #e4e6e8;
    border-top-color: #111827;

    border-radius: 50%;

    animation:
        miniLoader .7s linear infinite;
}


@keyframes miniLoader {

    to {
        transform: rotate(360deg);
    }

}


.empty-amenities {
    color: #9298a1;

    font-size: 11px;
}


/* =========================================================
   SEARCH ACTIONS
========================================================= */

.search-actions {
    display: flex;
    align-items: center;
    justify-content: flex-end;

    gap: 10px;

    margin-top: 24px;
    padding-top: 20px;

    border-top: 1px solid #edf0f2;
}


.clear-filter-btn,
.search-property-btn {
    min-height: 44px;

    display: inline-flex;
    align-items: center;
    justify-content: center;

    gap: 7px;

    padding: 0 19px;

    border-radius: 8px;

    font-size: 12px;
    font-weight: 700;

    cursor: pointer;

    transition: all .2s ease;
}


.clear-filter-btn {
    border: 1px solid #dfe2e6;

    background: #ffffff;

    color: #5d646e;
}


.clear-filter-btn:hover {
    background: #f7f8f9;

    border-color: #cdd1d5;

    color: #252a32;
}


.search-property-btn {
    min-width: 175px;

    border: 1px solid #111827;

    background: #111827;

    color: #ffffff;

    box-shadow:
        0 5px 13px rgba(17, 24, 39, .12);
}


.search-property-btn:hover {
    background: #1f2937;

    border-color: #1f2937;

    transform: translateY(-1px);

    box-shadow:
        0 7px 18px rgba(17, 24, 39, .17);
}


/* =========================================================
   RESULT SECTION
========================================================= */

.property-result-section {
    margin-top: 30px;
}


.property-result-header {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;

    margin-bottom: 18px;
}


.result-small-label {
    display: block;

    margin-bottom: 5px;

    font-size: 10px;
    font-weight: 800;

    letter-spacing: 1.2px;

    color: #969ca5;
}


.property-result-header h2 {
    margin: 0;

    font-size: 21px;
    font-weight: 750;

    color: #252a32;
}


.property-result-header p {
    margin: 5px 0 0;

    font-size: 12px;

    color: #858b94;
}


.result-status {
    display: flex;
    align-items: center;
    gap: 8px;

    padding: 8px 13px;

    border: 1px solid #e4e7e9;
    border-radius: 30px;

    background: #ffffff;

    color: #646b75;

    font-size: 11px;
    font-weight: 600;
}


/* =========================================================
   PROPERTY CARD
========================================================= */

.property-card {
    height: 100%;

    overflow: hidden;

    background: #ffffff;

    border: 1px solid #e4e6e9;
    border-radius: 14px;

    box-shadow:
        0 4px 16px rgba(15, 23, 42, .035);

    transition:
        transform .22s ease,
        box-shadow .22s ease,
        border-color .22s ease;
}


.property-card:hover {
    transform: translateY(-4px);

    border-color: #d8dce0;

    box-shadow:
        0 12px 28px rgba(15, 23, 42, .09);
}


/* =========================================================
   PROPERTY IMAGE
========================================================= */

.property-card-image {
    position: relative;

    height: 215px;

    overflow: hidden;

    background: #eef0f2;
}


.property-card-image img {
    width: 100%;
    height: 100%;

    display: block;

    object-fit: cover;

    transition:
        transform .35s ease;
}


.property-card:hover
.property-card-image img {
    transform: scale(1.035);
}


.property-card-overlay {
    position: absolute;

    inset: 0;

    background:
        linear-gradient(
            to bottom,
            rgba(0,0,0,.18),
            transparent 35%,
            rgba(0,0,0,.22)
        );

    pointer-events: none;
}


.property-purpose-badge {
    position: absolute;

    top: 14px;
    left: 14px;

    padding: 6px 11px;

    border-radius: 20px;

    background: #ffffff;

    color: #252a32;

    font-size: 10px;
    font-weight: 800;

    text-transform: uppercase;

    letter-spacing: .4px;

    box-shadow:
        0 3px 10px rgba(0,0,0,.12);
}


.property-favorite {
    position: absolute;

    top: 12px;
    right: 12px;

    width: 34px;
    height: 34px;

    display: flex;
    align-items: center;
    justify-content: center;

    border: 0;
    border-radius: 50%;

    background: rgba(255,255,255,.94);

    color: #4e555e;

    font-size: 15px;

    cursor: pointer;

    box-shadow:
        0 3px 10px rgba(0,0,0,.10);

    transition: all .2s ease;
}


.property-favorite:hover {
    color: #dc3545;

    transform: scale(1.06);
}


/* =========================================================
   NO IMAGE
========================================================= */

.property-no-image {
    width: 100%;
    height: 100%;

    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;

    gap: 6px;

    color: #9aa0a8;

    background: #f0f2f4;

    font-size: 12px;
}


.property-no-image i {
    font-size: 28px;
}


/* =========================================================
   CARD CONTENT
========================================================= */

.property-card-content {
    padding: 17px;
}


.property-card-top {
    display: flex;
    align-items: center;
    justify-content: space-between;

    gap: 8px;

    margin-bottom: 7px;
}


.property-category {
    display: inline-flex;

    padding: 5px 9px;

    border-radius: 5px;

    background: #f2f3f5;

    color: #666d76;

    font-size: 10px;
    font-weight: 700;

    white-space: nowrap;

    overflow: hidden;
    text-overflow: ellipsis;
}


.property-approved {
    display: inline-flex;
    align-items: center;
    gap: 4px;

    color: #238b57;

    font-size: 10px;
    font-weight: 700;

    white-space: nowrap;
}


.property-approved i {
    font-size: 11px;
}


/* =========================================================
   TITLE
========================================================= */

.property-title {
    margin: 0 0 8px;

    overflow: hidden;

    color: #252a32;

    font-size: 17px;
    line-height: 1.35;

    font-weight: 750;

    display: -webkit-box;

    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
}


/* =========================================================
   LOCATION
========================================================= */

.property-location {
    display: flex;
    align-items: flex-start;

    gap: 6px;

    min-height: 18px;

    margin-bottom: 14px;

    color: #7c838c;

    font-size: 11px;
    line-height: 1.4;
}


.property-location i {
    flex-shrink: 0;

    margin-top: 1px;

    color: #8d939b;
}


/* =========================================================
   PRICE
========================================================= */

.property-price {
    display: flex;
    align-items: baseline;

    gap: 5px;

    margin-bottom: 14px;

    color: #1f2937;
}


.property-price strong {
    font-size: 20px;
    line-height: 1;

    font-weight: 800;
}


.property-price span {
    color: #8a9098;

    font-size: 11px;
    font-weight: 500;
}


/* =========================================================
   AMENITIES
========================================================= */

.property-amenities {
    display: flex;
    flex-wrap: wrap;

    gap: 6px;

    min-height: 28px;

    margin-bottom: 15px;
}


.property-amenities span {
    display: inline-flex;
    align-items: center;

    gap: 3px;

    padding: 5px 8px;

    border-radius: 5px;

    background: #f6f7f8;

    color: #6d737c;

    font-size: 9px;
    font-weight: 600;
}


.property-amenities span i {
    color: #5c636d;

    font-size: 9px;
}


/* =========================================================
   CARD FOOTER
========================================================= */

.property-card-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;

    gap: 10px;

    padding-top: 13px;

    border-top: 1px solid #edf0f2;
}


.property-code {
    display: flex;
    flex-direction: column;

    gap: 2px;
}


.property-code span {
    color: #9a9fa7;

    font-size: 8px;

    text-transform: uppercase;

    letter-spacing: .5px;
}


.property-code strong {
    color: #5f6670;

    font-size: 10px;
    font-weight: 700;
}


.view-property-btn {
    display: inline-flex;
    align-items: center;

    gap: 5px;

    color: #111827;

    font-size: 11px;
    font-weight: 750;

    text-decoration: none;

    white-space: nowrap;
}


.view-property-btn i {
    font-size: 11px;

    transition:
        transform .2s ease;
}


.view-property-btn:hover {
    color: #111827;
}


.view-property-btn:hover i {
    transform: translateX(3px);
}


/* =========================================================
   LOADING
========================================================= */

.property-loading {
    min-height: 250px;

    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;

    background: #ffffff;

    border: 1px solid #e5e7eb;
    border-radius: 14px;
}


.property-loader {
    width: 34px;
    height: 34px;

    border: 3px solid #e6e8eb;
    border-top-color: #111827;

    border-radius: 50%;

    animation:
        propertyLoader .7s linear infinite;
}


@keyframes propertyLoader {

    to {
        transform: rotate(360deg);
    }

}


.property-loading p {
    margin: 12px 0 0;

    color: #838993;

    font-size: 12px;
}


/* =========================================================
   NO PROPERTIES
========================================================= */

.no-properties {
    padding: 60px 20px;

    text-align: center;

    background: #ffffff;

    border: 1px solid #e5e7eb;
    border-radius: 14px;
}


.no-property-icon {
    width: 60px;
    height: 60px;

    display: flex;
    align-items: center;
    justify-content: center;

    margin: 0 auto 15px;

    border-radius: 50%;

    background: #f1f2f4;

    color: #737a84;

    font-size: 25px;
}


.no-properties h3 {
    margin: 0 0 6px;

    color: #30353d;

    font-size: 17px;
}


.no-properties p {
    margin: 0 0 18px;

    color: #8a9098;

    font-size: 12px;
}


/* =========================================================
   AJAX ERROR
========================================================= */

.ajax-error {
    padding: 55px 20px;

    text-align: center;

    background: #ffffff;

    border: 1px solid #e5e7eb;
    border-radius: 14px;
}


.ajax-error-icon {
    width: 55px;
    height: 55px;

    display: flex;
    align-items: center;
    justify-content: center;

    margin: 0 auto 13px;

    border-radius: 50%;

    background: #fff4f4;

    color: #dc3545;

    font-size: 22px;
}


.ajax-error h3 {
    margin: 0 0 5px;

    color: #30353d;

    font-size: 16px;
}


.ajax-error p {
    margin: 0;

    color: #858b94;

    font-size: 12px;
}


/* =========================================================
   PAGINATION
========================================================= */

.property-pagination {
    display: flex;
    align-items: center;
    justify-content: center;

    flex-wrap: wrap;

    gap: 6px;

    margin-top: 25px;
}


.pagination-btn {
    width: 38px;
    height: 38px;

    display: inline-flex;
    align-items: center;
    justify-content: center;

    border: 1px solid #dfe2e5;
    border-radius: 7px;

    background: #ffffff;

    color: #5f6670;

    font-size: 11px;
    font-weight: 700;

    cursor: pointer;

    transition: all .2s ease;
}


.pagination-btn:hover {
    border-color: #bfc4ca;

    background: #f6f7f8;
}


.pagination-btn.active {
    border-color: #111827;

    background: #111827;

    color: #ffffff;
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 991px) {

    .property-search-page {
        padding: 22px;
    }


    .property-page-header {
        align-items: flex-start;
    }


    .property-header-right {
        display: none;
    }

}


@media (max-width: 767px) {

    .property-search-page {
        padding: 15px;
    }


    .property-heading-icon {
        width: 44px;
        height: 44px;

        font-size: 18px;
    }


    .property-heading-content {
        gap: 10px;
    }


    .property-heading-content h1 {
        font-size: 22px;
    }


    .property-heading-content p {
        font-size: 11px;
    }


    .search-card-header {
        padding: 17px;
    }


    .search-card-body {
        padding: 17px;
    }


    .purpose-tabs {
        width: 100%;
    }


    .purpose-tab {
        flex: 1;
    }


    .purpose-tab span {
        min-width: 0;
        width: 100%;

        padding: 7px 10px;
    }


    .purpose-tab span small {
        display: none;
    }


    .search-actions {
        flex-direction: column-reverse;

        align-items: stretch;
    }


    .clear-filter-btn,
    .search-property-btn {
        width: 100%;
    }


    .property-result-header {
        align-items: flex-start;

        gap: 15px;

        flex-direction: column;
    }


    .result-status {
        align-self: flex-start;
    }


    .property-card-image {
        height: 210px;
    }

}


@media (max-width: 480px) {

    .property-heading-content h1 {
        font-size: 20px;
    }


    .property-heading-content p {
        display: none;
    }


    .purpose-tab span i {
        display: none;
    }


    .purpose-tab span strong {
        font-size: 12px;
    }

}
    </style>
<section class="property-search-page">

    {{-- =========================================================
        PAGE HEADER
    ========================================================== --}}

    <div class="property-page-header">

        <div class="property-header-left">

            <div class="property-breadcrumb">

                <a href="{{ route('dashboard') }}">
                    Dashboard
                </a>

                <span>
                    /
                </span>

                <span>
                    Properties
                </span>

            </div>


            <div class="property-heading-content">

                <div class="property-heading-icon">

                    <i class="bi bi-buildings"></i>

                </div>

                <div>

                    <span class="property-header-small">
                        FIND YOUR PERFECT PROPERTY
                    </span>

                    <h1>
                        Search Properties
                    </h1>

                    <p>
                        Find verified properties available for rent or purchase.
                    </p>

                </div>

            </div>

        </div>


        {{-- HEADER RIGHT --}}

        <div class="property-header-right">

            <div class="property-header-badge">

                <span class="badge-dot"></span>

                Live Listings

            </div>

        </div>

    </div>


    {{-- =========================================================
        SEARCH CARD
    ========================================================== --}}

    <div class="property-search-card">

        {{-- CARD HEADER --}}

        <div class="search-card-header">

            <div class="search-card-title">

                <div class="search-card-icon">

                    <i class="bi bi-search"></i>

                </div>

                <div>

                    <h2>
                        Find Your Property
                    </h2>

                    <p>
                        Use the filters below to find the right property.
                    </p>

                </div>

            </div>

        </div>


        {{-- CARD BODY --}}

        <div class="search-card-body">

            <form
                id="propertySearchForm"
                autocomplete="off"
            >

                {{-- =================================================
                    PURPOSE
                ================================================== --}}

                <div class="row mb-4">

                    <div class="col-12">

                        <label class="filter-main-label">
                            Property Purpose
                        </label>


                        <div class="purpose-tabs">

                            {{-- RENT --}}

                            <label class="purpose-tab active">

                                <input
                                    type="radio"
                                    name="purpose"
                                    value="rent"
                                    checked
                                >

                                <span>

                                    <i class="bi bi-house-door"></i>

                                    <strong>
                                        Rent
                                    </strong>

                                    <small>
                                        Rental properties
                                    </small>

                                </span>

                            </label>


                            {{-- PURCHASE --}}

                            <label class="purpose-tab">

                                <input
                                    type="radio"
                                    name="purpose"
                                    value="purchase"
                                >

                                <span>

                                    <i class="bi bi-building"></i>

                                    <strong>
                                        Purchase
                                    </strong>

                                    <small>
                                        Properties for sale
                                    </small>

                                </span>

                            </label>

                        </div>

                    </div>

                </div>


                {{-- =================================================
                    FILTER ROW
                ================================================== --}}

                <div class="row g-4">


                    {{-- =================================================
                        PROPERTY TYPE
                    ================================================== --}}

                    <div class="col-lg-6 col-md-6 col-12">

                        <div class="filter-group">

                            <label for="property_category_id">

                                Property Type

                                <span class="required-star">
                                    *
                                </span>

                            </label>


                            <div class="select-wrapper">

                                <i class="bi bi-buildings select-left-icon"></i>

                                <select
                                    name="property_category_id"
                                    id="property_category_id"
                                    class="form-select filter-control"
                                >

                                    <option value="">
                                        All Property Types
                                    </option>

                                </select>


                                <i class="bi bi-chevron-down select-arrow"></i>

                            </div>

                        </div>

                    </div>


                    {{-- =================================================
                        COUNTRY
                    ================================================== --}}

                    <div class="col-lg-6 col-md-6 col-12">

                        <div class="filter-group">

                            <label for="country_id">
                                Country
                            </label>


                            <div class="select-wrapper">

                                <i class="bi bi-globe2 select-left-icon"></i>

                                <select
                                    name="country_id"
                                    id="country_id"
                                    class="form-select filter-control"
                                >

                                    <option value="">
                                        All Countries
                                    </option>

                                </select>


                                <i class="bi bi-chevron-down select-arrow"></i>

                            </div>

                        </div>

                    </div>


                    {{-- =================================================
                        STATE
                    ================================================== --}}

                    <div class="col-lg-6 col-md-6 col-12">

                        <div class="filter-group">

                            <label for="state_id">
                                State
                            </label>


                            <div class="select-wrapper">

                                <i class="bi bi-map select-left-icon"></i>

                                <select
                                    name="state_id"
                                    id="state_id"
                                    class="form-select filter-control"
                                >

                                    <option value="">
                                        All States
                                    </option>

                                </select>


                                <i class="bi bi-chevron-down select-arrow"></i>

                            </div>

                        </div>

                    </div>


                    {{-- =================================================
                        CITY
                    ================================================== --}}

                    <div class="col-lg-6 col-md-6 col-12">

                        <div class="filter-group">

                            <label for="city_id">
                                City
                            </label>


                            <div class="select-wrapper">

                                <i class="bi bi-geo-alt select-left-icon"></i>

                                <select
                                    name="city_id"
                                    id="city_id"
                                    class="form-select filter-control"
                                >

                                    <option value="">
                                        All Cities
                                    </option>

                                </select>


                                <i class="bi bi-chevron-down select-arrow"></i>

                            </div>

                        </div>

                    </div>


                    {{-- =================================================
                        AREA
                    ================================================== --}}

                    <div class="col-lg-6 col-md-6 col-12">

                        <div class="filter-group">

                            <label for="area_id">
                                Area / Locality
                            </label>


                            <div class="select-wrapper">

                                <i class="bi bi-pin-map select-left-icon"></i>

                                <select
                                    name="area_id"
                                    id="area_id"
                                    class="form-select filter-control"
                                >

                                    <option value="">
                                        All Areas
                                    </option>

                                </select>


                                <i class="bi bi-chevron-down select-arrow"></i>

                            </div>

                        </div>

                    </div>


                    {{-- =================================================
                        AMENITIES
                    ================================================== --}}

                    <div class="col-lg-6 col-md-6 col-12">

                        <div class="filter-group">

                            <label>
                                Amenities
                            </label>


                            <div
                                class="amenities-box"
                                id="amenitiesList"
                            >

                                <div class="amenity-loading">

                                    <span class="mini-loader"></span>

                                    Loading amenities...

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- =================================================
                    SEARCH ACTIONS
                ================================================== --}}

                <div class="row">

                    <div class="col-12">

                        <div class="search-actions">

                            <button
                                type="button"
                                id="clearFilters"
                                class="clear-filter-btn"
                            >

                                <i class="bi bi-arrow-counterclockwise"></i>

                                Clear Filters

                            </button>


                            <button
                                type="submit"
                                id="searchPropertyBtn"
                                class="search-property-btn"
                            >

                                <i class="bi bi-search"></i>

                                <span>
                                    Search Properties
                                </span>

                            </button>

                        </div>

                    </div>

                </div>

            </form>

        </div>

    </div>


    {{-- =========================================================
        PROPERTY RESULT HEADER
    ========================================================== --}}

    <div class="property-result-section">

        <div class="property-result-header">

            <div>

                <span class="result-small-label">
                    PROPERTY RESULTS
                </span>

                <h2>
                    Available Properties
                </h2>

                <p id="propertyCount">
                    Loading properties...
                </p>

            </div>


            <div class="result-status">

                <span class="result-status-dot"></span>

                Approved Listings

            </div>

        </div>


        {{-- =====================================================
            LOADING
        ====================================================== --}}

        <div
            id="propertyLoading"
            class="property-loading"
        >

            <div class="property-loader"></div>

            <p>
                Finding properties...
            </p>

        </div>


        {{-- =====================================================
            PROPERTY LISTING
        ====================================================== --}}

        <div
            id="propertyListing"
            class="row g-4"
        ></div>


        {{-- =====================================================
            NO PROPERTY
        ====================================================== --}}

        <div
            id="noProperties"
            class="no-properties"
            style="display:none;"
        >

            <div class="no-property-icon">

                <i class="bi bi-house-x"></i>

            </div>

            <h3>
                No Properties Found
            </h3>

            <p>
                We couldn't find any properties matching your filters.
            </p>

            <button
                type="button"
                id="clearFiltersEmpty"
                class="clear-filter-btn"
            >

                <i class="bi bi-arrow-counterclockwise"></i>

                Clear Filters

            </button>

        </div>


        {{-- =====================================================
            PAGINATION
        ====================================================== --}}

        <div
            id="propertyPagination"
            class="property-pagination"
        ></div>

    </div>

</section>


{{-- =========================================================
    AJAX SCRIPT
========================================================== --}}

<script>

document.addEventListener('DOMContentLoaded', function () {

    const searchForm =
        document.getElementById('propertySearchForm');

    const propertyListing =
        document.getElementById('propertyListing');

    const propertyLoading =
        document.getElementById('propertyLoading');

    const propertyCount =
        document.getElementById('propertyCount');

    const propertyPagination =
        document.getElementById('propertyPagination');

    const noProperties =
        document.getElementById('noProperties');

    const propertyCategorySelect =
        document.getElementById('property_category_id');

    const countrySelect =
        document.getElementById('country_id');

    const stateSelect =
        document.getElementById('state_id');

    const citySelect =
        document.getElementById('city_id');

    const areaSelect =
        document.getElementById('area_id');

    const amenitiesList =
        document.getElementById('amenitiesList');


    /*
    |--------------------------------------------------------------------------
    | Get Purpose
    |--------------------------------------------------------------------------
    */

    function getPurpose()
    {
        const checked =
            document.querySelector(
                'input[name="purpose"]:checked'
            );

        return checked
            ? checked.value
            : '';
    }


    /*
    |--------------------------------------------------------------------------
    | Get Selected Amenities
    |--------------------------------------------------------------------------
    */

    function getSelectedAmenities()
    {
        return Array.from(
            document.querySelectorAll(
                'input[name="amenities[]"]:checked'
            )
        ).map(function (input) {

            return input.value;

        });
    }


    /*
    |--------------------------------------------------------------------------
    | Load Filters
    |--------------------------------------------------------------------------
    */

    function loadFilters(filters)
    {

        /*
        |--------------------------------------------------------------------------
        | Property Categories
        |--------------------------------------------------------------------------
        */

        propertyCategorySelect.innerHTML =
            '<option value="">All Property Types</option>';

        filters.property_categories.forEach(
            function (category) {

                propertyCategorySelect.innerHTML += `
                    <option value="${category.id}">
                        ${escapeHtml(category.name)}
                    </option>
                `;

            }
        );


        /*
        |--------------------------------------------------------------------------
        | Countries
        |--------------------------------------------------------------------------
        */

        countrySelect.innerHTML =
            '<option value="">All Countries</option>';

        filters.countries.forEach(
            function (country) {

                countrySelect.innerHTML += `
                    <option value="${country.id}">
                        ${escapeHtml(country.name)}
                    </option>
                `;

            }
        );


        /*
        |--------------------------------------------------------------------------
        | States
        |--------------------------------------------------------------------------
        */

        stateSelect.innerHTML =
            '<option value="">All States</option>';

        filters.states.forEach(
            function (state) {

                stateSelect.innerHTML += `
                    <option value="${state.id}">
                        ${escapeHtml(state.name)}
                    </option>
                `;

            }
        );


        /*
        |--------------------------------------------------------------------------
        | Cities
        |--------------------------------------------------------------------------
        */

        citySelect.innerHTML =
            '<option value="">All Cities</option>';

        filters.cities.forEach(
            function (city) {

                citySelect.innerHTML += `
                    <option value="${city.id}">
                        ${escapeHtml(city.name)}
                    </option>
                `;

            }
        );


        /*
        |--------------------------------------------------------------------------
        | Areas
        |--------------------------------------------------------------------------
        */

        areaSelect.innerHTML =
            '<option value="">All Areas</option>';

        filters.areas.forEach(
            function (area) {

                areaSelect.innerHTML += `
                    <option value="${area.id}">
                        ${escapeHtml(area.name)}
                    </option>
                `;

            }
        );


        /*
        |--------------------------------------------------------------------------
        | Amenities
        |--------------------------------------------------------------------------
        */

        amenitiesList.innerHTML = '';

        if (
            !filters.amenities ||
            filters.amenities.length === 0
        ) {

            amenitiesList.innerHTML = `
                <span class="empty-amenities">
                    No amenities available
                </span>
            `;

            return;
        }


        filters.amenities.forEach(
            function (amenity) {

                amenitiesList.innerHTML += `

                    <label class="amenity-checkbox">

                        <input
                            type="checkbox"
                            name="amenities[]"
                            value="${amenity.id}"
                        >

                        <span>
                            ${escapeHtml(amenity.name)}
                        </span>

                    </label>

                `;

            }
        );

    }


    /*
    |--------------------------------------------------------------------------
    | Load Properties
    |--------------------------------------------------------------------------
    */

    function loadProperties(page = 1)
    {

        propertyLoading.style.display = 'flex';

        propertyListing.innerHTML = '';

        noProperties.style.display = 'none';

        propertyPagination.innerHTML = '';


        const params =
            new URLSearchParams();


        /*
        |--------------------------------------------------------------------------
        | Purpose
        |--------------------------------------------------------------------------
        */

        const purpose =
            getPurpose();

        if (purpose) {

            params.append(
                'purpose',
                purpose
            );

        }


        /*
        |--------------------------------------------------------------------------
        | Property Type
        |--------------------------------------------------------------------------
        */

        if (propertyCategorySelect.value) {

            params.append(
                'property_category_id',
                propertyCategorySelect.value
            );

        }


        /*
        |--------------------------------------------------------------------------
        | Country
        |--------------------------------------------------------------------------
        */

        if (countrySelect.value) {

            params.append(
                'country_id',
                countrySelect.value
            );

        }


        /*
        |--------------------------------------------------------------------------
        | State
        |--------------------------------------------------------------------------
        */

        if (stateSelect.value) {

            params.append(
                'state_id',
                stateSelect.value
            );

        }


        /*
        |--------------------------------------------------------------------------
        | City
        |--------------------------------------------------------------------------
        */

        if (citySelect.value) {

            params.append(
                'city_id',
                citySelect.value
            );

        }


        /*
        |--------------------------------------------------------------------------
        | Area
        |--------------------------------------------------------------------------
        */

        if (areaSelect.value) {

            params.append(
                'area_id',
                areaSelect.value
            );

        }


        /*
        |--------------------------------------------------------------------------
        | Amenities
        |--------------------------------------------------------------------------
        */

        getSelectedAmenities().forEach(
            function (amenity) {

                params.append(
                    'amenities[]',
                    amenity
                );

            }
        );


        /*
        |--------------------------------------------------------------------------
        | Page
        |--------------------------------------------------------------------------
        */

        params.append(
            'page',
            page
        );


        /*
        |--------------------------------------------------------------------------
        | AJAX
        |--------------------------------------------------------------------------
        */

        fetch(
            `{{ route('properties.search') }}?${params.toString()}`,
            {
                method: 'GET',

                headers: {

                    'X-Requested-With':
                        'XMLHttpRequest',

                    'Accept':
                        'application/json'

                }
            }
        )

        .then(function (response) {

            if (!response.ok) {

                throw new Error(
                    'Unable to load properties.'
                );

            }

            return response.json();

        })

        .then(function (data) {

            /*
            |--------------------------------------------------------------------------
            | Filters
            |--------------------------------------------------------------------------
            */

            if (data.filters) {

                if (
                    propertyCategorySelect.options.length <= 1
                ) {

                    loadFilters(
                        data.filters
                    );

                }

            }


            /*
            |--------------------------------------------------------------------------
            | Hide Loader
            |--------------------------------------------------------------------------
            */

            propertyLoading.style.display =
                'none';


            /*
            |--------------------------------------------------------------------------
            | Property Count
            |--------------------------------------------------------------------------
            */

            propertyCount.innerText =
                `${data.pagination.total} properties found`;


            /*
            |--------------------------------------------------------------------------
            | No Properties
            |--------------------------------------------------------------------------
            */

            if (
                !data.properties ||
                data.properties.length === 0
            ) {

                noProperties.style.display =
                    'block';

                return;

            }


            /*
            |--------------------------------------------------------------------------
            | Render Properties
            |--------------------------------------------------------------------------
            */

            propertyListing.innerHTML =
                data.properties
                    .map(function (property) {

                        return renderProperty(
                            property
                        );

                    })
                    .join('');


            /*
            |--------------------------------------------------------------------------
            | Pagination
            |--------------------------------------------------------------------------
            */

            renderPagination(
                data.pagination
            );

        })

        .catch(function (error) {

            propertyLoading.style.display =
                'none';

            propertyListing.innerHTML = `

                <div class="col-12">

                    <div class="ajax-error">

                        <div class="ajax-error-icon">

                            <i class="bi bi-exclamation-triangle"></i>

                        </div>

                        <h3>
                            Unable to Load Properties
                        </h3>

                        <p>
                            ${escapeHtml(error.message)}
                        </p>

                    </div>

                </div>

            `;

        });

    }


    /*
    |--------------------------------------------------------------------------
    | Render Property
    |--------------------------------------------------------------------------
    */

    function renderProperty(property)
    {

        /*
        |--------------------------------------------------------------------------
        | Image
        |--------------------------------------------------------------------------
        */

        let imageHtml = '';

        if (
            property.images &&
            property.images.length > 0
        ) {

            const image =
                property.images[0];

            imageHtml = `

                <img
                    src="{{ asset('storage') }}/${image.image}"
                    alt="${escapeHtml(
                        property.title ?? 'Property'
                    )}"
                >

            `;

        } else {

            imageHtml = `

                <div class="property-no-image">

                    <i class="bi bi-image"></i>

                    <span>
                        No Image
                    </span>

                </div>

            `;

        }


        /*
        |--------------------------------------------------------------------------
        | Purpose
        |--------------------------------------------------------------------------
        */

        const purpose =
            property.purpose
                ? capitalize(property.purpose)
                : 'Property';


        /*
        |--------------------------------------------------------------------------
        | Category
        |--------------------------------------------------------------------------
        */

        let categoryName =
            'Property';

        if (
            property.property_category
        ) {

            categoryName =
                property.property_category.name;

        }


        /*
        |--------------------------------------------------------------------------
        | Location
        |--------------------------------------------------------------------------
        */

        let locationParts = [];


        if (property.area) {

            locationParts.push(
                property.area.name
            );

        }


        if (property.city) {

            locationParts.push(
                property.city.name
            );

        }


        if (property.state) {

            locationParts.push(
                property.state.name
            );

        }


        const location =
            locationParts.join(', ');


        /*
        |--------------------------------------------------------------------------
        | Price
        |--------------------------------------------------------------------------
        */

        let priceHtml = '';

        if (
            property.purpose &&
            property.purpose.toLowerCase() === 'rent'
        ) {

            if (property.monthly_rent) {

                priceHtml = `

                    <strong>
                        ₹${formatNumber(
                            property.monthly_rent
                        )}
                    </strong>

                    <span>
                        / month
                    </span>

                `;

            } else {

                priceHtml = `
                    <strong>
                        Price on Request
                    </strong>
                `;

            }

        } else {

            if (property.price) {

                priceHtml = `

                    <strong>
                        ₹${formatNumber(
                            property.price
                        )}
                    </strong>

                `;

            } else {

                priceHtml = `
                    <strong>
                        Price on Request
                    </strong>
                `;

            }

        }


        /*
        |--------------------------------------------------------------------------
        | Amenities
        |--------------------------------------------------------------------------
        */

        let amenitiesHtml = '';

        if (
            property.amenities &&
            property.amenities.length
        ) {

            amenitiesHtml = `

                <div class="property-amenities">

                    ${property.amenities
                        .slice(0, 4)
                        .map(function (amenity) {

                            return `

                                <span>

                                    <i class="bi bi-check2"></i>

                                    ${escapeHtml(
                                        amenity.name
                                    )}

                                </span>

                            `;

                        })
                        .join('')}

                </div>

            `;

        }


        /*
        |--------------------------------------------------------------------------
        | Card
        |--------------------------------------------------------------------------
        */

        return `

            <div class="col-xl-4 col-lg-6 col-md-6 col-12">

                <div class="property-card">


                    {{-- IMAGE --}}

                    <div class="property-card-image">

                        ${imageHtml}


                        <div class="property-card-overlay"></div>


                        <span class="property-purpose-badge">

                            ${escapeHtml(purpose)}

                        </span>


                        <button
                            type="button"
                            class="property-favorite"
                            data-id="${property.id}"
                            title="Add to Wishlist"
                        >

                            <i class="bi bi-heart"></i>

                        </button>

                    </div>


                    {{-- CONTENT --}}

                    <div class="property-card-content">


                        <div class="property-card-top">

                            <span class="property-category">

                                ${escapeHtml(
                                    categoryName
                                )}

                            </span>


                            <span class="property-approved">

                                <i class="bi bi-patch-check-fill"></i>

                                Verified

                            </span>

                        </div>


                        <h3 class="property-title">

                            ${escapeHtml(
                                property.title ?? ''
                            )}

                        </h3>


                        <div class="property-location">

                            <i class="bi bi-geo-alt"></i>

                            <span>

                                ${escapeHtml(
                                    location
                                )}

                            </span>

                        </div>


                        <div class="property-price">

                            ${priceHtml}

                        </div>


                        ${amenitiesHtml}


                        <div class="property-card-footer">


                            <div class="property-code">

                                <span>
                                    Property Code
                                </span>

                                <strong>

                                    ${escapeHtml(
                                        property.property_code ?? ''
                                    )}

                                </strong>

                            </div>


                            <a
                                href="/properties/${property.id}"
                                class="view-property-btn"
                            >
                                View Details

                                <i class="bi bi-arrow-right"></i>
                            </a>

                        </div>

                    </div>

                </div>

            </div>

        `;

    }


    /*
    |--------------------------------------------------------------------------
    | Pagination
    |--------------------------------------------------------------------------
    */

    function renderPagination(pagination)
    {

        if (
            pagination.last_page <= 1
        ) {

            return;

        }


        let html = '';


        /*
        |--------------------------------------------------------------------------
        | Previous
        |--------------------------------------------------------------------------
        */

        if (
            pagination.current_page > 1
        ) {

            html += `

                <button
                    type="button"
                    class="pagination-btn"
                    data-page="${
                        pagination.current_page - 1
                    }"
                >

                    <i class="bi bi-chevron-left"></i>

                </button>

            `;

        }


        /*
        |--------------------------------------------------------------------------
        | Pages
        |--------------------------------------------------------------------------
        */

        for (
            let page = 1;
            page <= pagination.last_page;
            page++
        ) {

            html += `

                <button
                    type="button"
                    class="pagination-btn
                    ${
                        page === pagination.current_page
                            ? 'active'
                            : ''
                    }"
                    data-page="${page}"
                >

                    ${page}

                </button>

            `;

        }


        /*
        |--------------------------------------------------------------------------
        | Next
        |--------------------------------------------------------------------------
        */

        if (
            pagination.current_page <
            pagination.last_page
        ) {

            html += `

                <button
                    type="button"
                    class="pagination-btn"
                    data-page="${
                        pagination.current_page + 1
                    }"
                >

                    <i class="bi bi-chevron-right"></i>

                </button>

            `;

        }


        propertyPagination.innerHTML =
            html;


        /*
        |--------------------------------------------------------------------------
        | Pagination Click
        |--------------------------------------------------------------------------
        */

        document
            .querySelectorAll('.pagination-btn')
            .forEach(function (button) {

                button.addEventListener(
                    'click',
                    function () {

                        loadProperties(
                            parseInt(
                                this.dataset.page
                            )
                        );

                        window.scrollTo({
                            top: 0,
                            behavior: 'smooth'
                        });

                    }
                );

            });

    }


    /*
    |--------------------------------------------------------------------------
    | Search Submit
    |--------------------------------------------------------------------------
    */

    searchForm.addEventListener(
        'submit',
        function (event) {

            event.preventDefault();

            loadProperties(1);

        }
    );


    /*
    |--------------------------------------------------------------------------
    | Rent / Purchase
    |--------------------------------------------------------------------------
    */

    document
        .querySelectorAll(
            'input[name="purpose"]'
        )
        .forEach(function (radio) {

            radio.addEventListener(
                'change',
                function () {

                    document
                        .querySelectorAll(
                            '.purpose-tab'
                        )
                        .forEach(function (tab) {

                            tab.classList.remove(
                                'active'
                            );

                        });


                    this
                        .closest('.purpose-tab')
                        .classList.add('active');


                    loadProperties(1);

                }
            );

        });


    /*
    |--------------------------------------------------------------------------
    | Filter Change
    |--------------------------------------------------------------------------
    */

    [
        propertyCategorySelect,
        countrySelect,
        stateSelect,
        citySelect,
        areaSelect
    ].forEach(function (select) {

        select.addEventListener(
            'change',
            function () {

                loadProperties(1);

            }
        );

    });


    /*
    |--------------------------------------------------------------------------
    | Amenity Change
    |--------------------------------------------------------------------------
    */

    amenitiesList.addEventListener(
        'change',
        function (event) {

            if (
                event.target.matches(
                    'input[name="amenities[]"]'
                )
            ) {

                loadProperties(1);

            }

        }
    );


    /*
    |--------------------------------------------------------------------------
    | Clear Filters
    |--------------------------------------------------------------------------
    */

    function clearAllFilters()
    {

        const rentRadio =
            document.querySelector(
                'input[name="purpose"][value="rent"]'
            );


        rentRadio.checked = true;


        document
            .querySelectorAll('.purpose-tab')
            .forEach(function (tab) {

                tab.classList.remove(
                    'active'
                );

            });


        rentRadio
            .closest('.purpose-tab')
            .classList.add('active');


        propertyCategorySelect.value = '';

        countrySelect.value = '';

        stateSelect.value = '';

        citySelect.value = '';

        areaSelect.value = '';


        document
            .querySelectorAll(
                'input[name="amenities[]"]'
            )
            .forEach(function (checkbox) {

                checkbox.checked = false;

            });


        noProperties.style.display =
            'none';


        loadProperties(1);

    }


    document
        .getElementById('clearFilters')
        .addEventListener(
            'click',
            clearAllFilters
        );


    document
        .getElementById('clearFiltersEmpty')
        .addEventListener(
            'click',
            clearAllFilters
        );


    /*
    |--------------------------------------------------------------------------
    | Escape HTML
    |--------------------------------------------------------------------------
    */

    function escapeHtml(value)
    {

        if (
            value === null ||
            value === undefined
        ) {

            return '';

        }


        return String(value)
            .replace(
                /&/g,
                '&amp;'
            )
            .replace(
                /</g,
                '&lt;'
            )
            .replace(
                />/g,
                '&gt;'
            )
            .replace(
                /"/g,
                '&quot;'
            )
            .replace(
                /'/g,
                '&#039;'
            );

    }


    /*
    |--------------------------------------------------------------------------
    | Number Format
    |--------------------------------------------------------------------------
    */

    function formatNumber(value)
    {

        const number =
            parseFloat(value);


        if (isNaN(number)) {

            return '0';

        }


        return new Intl.NumberFormat(
            'en-IN'
        ).format(number);

    }


    /*
    |--------------------------------------------------------------------------
    | Capitalize
    |--------------------------------------------------------------------------
    */

    function capitalize(value)
    {

        if (!value) {

            return '';

        }


        return value
            .charAt(0)
            .toUpperCase()
            + value.slice(1);

    }


    /*
    |--------------------------------------------------------------------------
    | INITIAL AJAX LOAD
    |--------------------------------------------------------------------------
    */

    loadProperties(1);

});

</script>

@endsection