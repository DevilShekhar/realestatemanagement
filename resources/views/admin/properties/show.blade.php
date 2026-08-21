@can('show properties')
@extends('admin.layouts.app')

@section('content')
<style>
    /* =========================================================
   RECORD INFORMATION
========================================================= */

.record-information-card {

    width: 100%;

    background: #ffffff;

    border: 1px solid #e7ebf2;

    border-radius: 10px;

    box-shadow:
        0 2px 8px rgba(20, 40, 80, 0.04);

    padding: 20px;

    margin-bottom: 20px;

}


/* =========================================================
   HEADER
========================================================= */

.record-information-header {

    display: flex;

    align-items: center;

    gap: 12px;

    padding-bottom: 17px;

    margin-bottom: 0;

    border-bottom: 1px solid #e7ebf2;

}


.record-information-header h4 {

    margin: 0;

    color: #17213b;

    font-size: 18px;

    font-weight: 700;

}


/* =========================================================
   HEADER ICON
========================================================= */

.record-information-icon {

    width: 32px;

    height: 32px;

    min-width: 32px;

    border-radius: 8px;

    display: flex;

    align-items: center;

    justify-content: center;

    background: #e1eaff;

    color: #3265dc;

}


.record-information-icon svg {

    width: 17px;

    height: 17px;

    stroke-width: 2.4;

}


/* =========================================================
   BODY
========================================================= */

.record-information-body {

    margin-top: 14px;

}


/* =========================================================
   INFORMATION BOX
========================================================= */

.record-info-box {

    background: #f5f7fc;

    border-radius: 8px;

    padding: 10px 12px;

}


/* =========================================================
   ROW
========================================================= */

.record-info-row {

    display: grid;

    grid-template-columns: 42% 58%;

    align-items: center;

    min-height: 38px;

}


/* =========================================================
   LABEL
========================================================= */

.record-info-label {

    color: #4d5970;

    font-size: 14px;

    font-weight: 500;

}


/* =========================================================
   VALUE
========================================================= */

.record-info-value {

    color: #182238;

    font-size: 14px;

    font-weight: 600;

}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 991px) {

    .record-info-box {

        margin-bottom: 12px;

    }

}


@media (max-width: 575px) {

    .record-information-card {

        padding: 16px;

    }


    .record-information-header h4 {

        font-size: 17px;

    }


    .record-info-row {

        grid-template-columns: 45% 55%;

    }


    .record-info-label,
    .record-info-value {

        font-size: 13px;

    }

}
    /* =========================================================
   MEDIA GALLERY
========================================================= */

.media-gallery-card {
    width: 100%;

    background: #ffffff;

    border: 1px solid #e7ebf2;

    border-radius: 12px;

    box-shadow:
        0 3px 10px rgba(20, 40, 80, 0.04);

    padding: 20px;

    margin-bottom: 20px;

    overflow: hidden;
}


/* =========================================================
   HEADER
========================================================= */

.media-gallery-header {
    display: flex;

    align-items: center;

    gap: 12px;

    padding-bottom: 17px;

    margin-bottom: 0;

    border-bottom: 1px solid #e7ebf2;
}


.media-gallery-header h4 {
    margin: 0;

    color: #17213b;

    font-size: 18px;

    font-weight: 700;
}


/* =========================================================
   HEADER ICON
========================================================= */

.media-gallery-icon {
    width: 32px;
    height: 32px;

    min-width: 32px;

    border-radius: 8px;

    display: flex;

    align-items: center;

    justify-content: center;

    background: #f2d9ff;

    color: #c23bd8;
}


.media-gallery-icon svg {
    width: 18px;
    height: 18px;

    stroke-width: 2.2;
}


/* =========================================================
   HORIZONTAL IMAGE SCROLL
========================================================= */

.media-gallery-scroll {

    display: flex;

    gap: 12px;

    overflow-x: auto;

    overflow-y: hidden;

    padding-top: 16px;

    padding-bottom: 5px;

    scroll-behavior: smooth;

    -webkit-overflow-scrolling: touch;

    scrollbar-width: thin;
}


/* =========================================================
   IMAGE ITEM
========================================================= */

.media-gallery-item {

    flex: 0 0 174px;

    width: 174px;

    height: 136px;

    overflow: hidden;

    border-radius: 9px;

    background: #f3f5f8;

    border: 1px solid #e2e7ee;

    cursor: pointer;

    transition:
        transform 0.2s ease,
        box-shadow 0.2s ease;
}


.media-gallery-item:hover {

    transform: translateY(-2px);

    box-shadow:
        0 5px 14px rgba(20, 40, 80, 0.12);
}


/* =========================================================
   IMAGE
========================================================= */

.media-gallery-item img {

    width: 100%;

    height: 100%;

    display: block;

    object-fit: cover;

    transition: transform 0.3s ease;
}


.media-gallery-item:hover img {

    transform: scale(1.04);
}


/* =========================================================
   SCROLLBAR
========================================================= */

.media-gallery-scroll::-webkit-scrollbar {

    height: 6px;
}


.media-gallery-scroll::-webkit-scrollbar-track {

    background: #f1f3f7;

    border-radius: 10px;
}


.media-gallery-scroll::-webkit-scrollbar-thumb {

    background: #c8ced9;

    border-radius: 10px;
}


.media-gallery-scroll::-webkit-scrollbar-thumb:hover {

    background: #aeb6c4;
}


/* =========================================================
   EMPTY STATE
========================================================= */

.media-gallery-empty {

    width: 100%;

    min-height: 136px;

    display: flex;

    align-items: center;

    justify-content: center;

    flex-direction: column;

    gap: 8px;

    color: #8a94a6;

    font-size: 14px;
}


.media-gallery-empty svg {

    width: 28px;

    height: 28px;
}


/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 575px) {

    .media-gallery-card {

        padding: 16px;

    }


    .media-gallery-item {

        flex-basis: 155px;

        width: 155px;

        height: 120px;

    }

}
/* =========================================================
   PROPERTY DETAIL CARD
========================================================= */

.property-detail-card {
    background: #ffffff;

    border: 1px solid #e7ebf2;

    border-radius: 12px;

    box-shadow:
        0 3px 10px rgba(20, 40, 80, 0.04);

    padding: 20px;

    margin-bottom: 20px;
}


/* =========================================================
   CARD HEADER
========================================================= */

.property-card-header {
    display: flex;

    align-items: center;

    gap: 13px;

    padding-bottom: 17px;

    border-bottom: 1px solid #e7ebf2;

    margin-bottom: 8px;
}


.property-card-header h4 {
    margin: 0;

    color: #17213b;

    font-size: 19px;

    font-weight: 700;
}


/* =========================================================
   HEADER ICON
========================================================= */

.property-card-icon {
    width: 34px;

    height: 34px;

    min-width: 34px;

    border-radius: 50%;

    display: flex;

    align-items: center;

    justify-content: center;
}


.property-card-icon svg {
    width: 18px;

    height: 18px;

    stroke-width: 2.4;
}


/* BLUE */

.property-icon-blue {
    background: #e1eaff;

    color: #2860dc;
}


/* GREEN */

.property-icon-green {
    background: #dcf7e5;

    color: #25a958;
}


/* YELLOW */

.property-icon-yellow {
    background: #fff0b7;

    color: #b58a00;
}


/* =========================================================
   PROPERTY DETAILS
========================================================= */

.property-details-list {
    width: 100%;
}


.property-detail-item {
    display: flex;

    align-items: center;

    justify-content: space-between;

    min-height: 49px;

    padding: 5px 0;
}


.property-detail-item span {
    color: #26334b;

    font-size: 15px;

    font-weight: 600;
}


.property-detail-item strong {
    color: #1d273c;

    font-size: 15px;

    font-weight: 600;

    text-align: right;
}


/* =========================================================
   PRICE INFORMATION
========================================================= */

.price-information-list {
    padding-top: 3px;
}


.price-item {
    min-height: 43px;

    display: flex;

    align-items: center;

    justify-content: space-between;
}


.price-item span:first-child {
    color: #26334b;

    font-size: 15px;

    font-weight: 600;
}


.price-item strong {
    color: #1d273c;

    font-size: 15px;

    font-weight: 600;
}


.price-item .main-price {
    color: #16a34a;

    font-size: 20px;

    font-weight: 700;
}


/* =========================================================
   NEGOTIABLE BADGE
========================================================= */

.yes-badge {
    display: inline-flex;

    align-items: center;

    justify-content: center;

    padding: 6px 12px;

    border-radius: 6px;

    background: #dcf8e5;

    border: 1px solid #b9ecc9;

    color: #20934a !important;

    font-size: 13px !important;

    font-weight: 600 !important;
}


.no-badge {
    display: inline-flex;

    align-items: center;

    justify-content: center;

    padding: 6px 12px;

    border-radius: 6px;

    background: #fce7e7;

    border: 1px solid #f3caca;

    color: #d33f3f !important;

    font-size: 13px !important;

    font-weight: 600 !important;
}


/* =========================================================
   AMENITIES
========================================================= */

.amenities-card {
    min-height: 205px;
}


.amenities-list {
    display: flex;

    flex-wrap: wrap;

    gap: 10px;

    padding-top: 12px;
}


/* =========================================================
   AMENITY BADGE
========================================================= */

.amenity-badge {
    display: inline-flex;

    align-items: center;

    gap: 7px;

    padding: 7px 11px;

    border-radius: 7px;

    background: #f2f6ff;

    border: 1px solid #d9e4ff;

    color: #2857b7;

    font-size: 14px;

    font-weight: 500;

    white-space: nowrap;
}


.amenity-badge svg {
    width: 16px;

    height: 16px;

    stroke-width: 2.3;
}


/* =========================================================
   NO AMENITIES
========================================================= */

.no-amenities {
    color: #7a8498;

    font-size: 14px;

    padding-top: 10px;
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 991px) {

    .property-detail-card {
        margin-bottom: 20px;
    }

}


@media (max-width: 575px) {

    .property-detail-card {
        padding: 16px;
    }


    .property-card-header h4 {
        font-size: 17px;
    }


    .property-detail-item span,
    .property-detail-item strong,
    .price-item span:first-child,
    .price-item strong {
        font-size: 14px;
    }


    .property-detail-item {
        min-height: 45px;
    }


    .price-item {
        min-height: 45px;
    }


    .amenity-badge {
        font-size: 13px;

        padding: 6px 9px;
    }

}
.property-card {
    width: 100%;
    background: #ffffff;
    border: 1px solid #e6ebf2;
    border-radius: 18px;
    padding: 16px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    overflow: hidden;
}

.property-card > .row {
    min-height: 390px;
}


/* ================================
   IMAGE
================================ */

.property-image {
    width: 100%;
    height: 100%;
    min-height: 360px;
    overflow: hidden;
    border-radius: 15px;
}

.property-image img {
    width: 100%;
    height: 100%;
    display: block;
    object-fit: cover;
}


/* ================================
   DETAILS
================================ */

.property-details {
    height: 100%;
    padding: 26px 10px 20px 10px;
}


/* ================================
   HEADER
================================ */

.property-header h2 {
    margin: 0 0 14px;

    color: #111a32;

    font-size: 32px;
    font-weight: 700;

    line-height: 1.3;
}

.property-location {
    display: flex;
    align-items: center;
    gap: 12px;

    color: #536078;

    font-size: 17px;
}

.property-location i {
    color: #53617a;
    font-size: 23px;
}


/* ================================
   DIVIDER
================================ */

.property-divider {
    width: 100%;
    height: 1px;

    background: #e7ebf2;

    margin: 28px 0 30px;
}


/* ================================
   INFORMATION ROW
================================ */

.property-info {
    margin-left: 0;
    margin-right: 0;
}


/* Remove Bootstrap column padding */

.property-info > div {
    padding-left: 0;
    padding-right: 0;
}


/* ================================
   INFORMATION ITEM
================================ */

.property-info-item {
    position: relative;
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
}
.property-icon {
    width: 76px;
    height: 76px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
}

.property-icon i {
    font-size: 30px;
}


/* Category */

.category-icon {
    color: #4058df;
    background: #e9edff;
    border: 1px solid #dce3ff;
}


/* Purpose */

.purpose-icon {
    color: #ff7418;
    background: #fff0dc;
    border: 1px solid #ffe5c2;
}


/* Price */

.price-icon {
    color: #11a544;
    background: #dff9e7;
    border: 1px solid #c7efd2;
}


/* Status */

.status-icon {
    background: #ffffff;
    border: 2px solid #dff3e6;
}


/* ================================
   STATUS DOT
================================ */

.status-dot {
    width: 21px;
    height: 21px;
    background: #28b957;
    border-radius: 50%;
}


/* ================================
   LABEL
================================ */

.property-label {
    margin-bottom: 10px;

    color: #59647a;

    font-size: 14px;
    font-weight: 500;

    white-space: nowrap;
}


/* ================================
   VALUE
================================ */

.property-value {
    color: #111a30;

     font-weight: 700;

    line-height: 1.2;

    white-space: nowrap;
}


/* ================================
   STATUS
================================ */

.property-status {
    display: inline-flex;
    align-items: center;
    gap: 8px;

    padding: 9px 15px;

    color: #249846;

    background: #e8faed;

    border: 1px solid #b9efc8;

    border-radius: 7px;

    font-size: 17px;
    font-weight: 500;
}

.status-small-dot {
    width: 10px;
    height: 10px;

    background: #25ad4f;

    border-radius: 50%;
}


/* ================================
   TABLET
================================ */

@media (max-width: 1199px) {

    .property-details {
        padding-left: 25px;
    }

    .property-header h2 {
        font-size: 27px;
    }

    .property-location {
        font-size: 15px;
    }

    .property-info-item {
        padding: 0 18px;
    }

    .property-value {
        font-size: 20px;
    }

    .property-label {
        font-size: 14px;
    }

}


/* ================================
   MOBILE
================================ */

@media (max-width: 991px) {

    .property-card > .row {
        min-height: auto;
    }

    .property-image {
        height: 300px;
        min-height: 300px;
    }

    .property-details {
        padding: 25px 10px 15px;
    }

    .property-info {
        row-gap: 30px;
    }

    .property-info-item {
        padding: 0 20px;
    }

}


/* ================================
   SMALL MOBILE
================================ */

@media (max-width: 575px) {

    .property-card {
        padding: 10px;
        border-radius: 14px;
    }

    .property-image {
        height: 230px;
        min-height: 230px;
    }

    .property-header h2 {
        font-size: 23px;
    }

    .property-location {
        font-size: 14px;
    }

    .property-info-item {
        padding: 0 10px;
    }

    .property-icon {
        width: 65px;
        height: 65px;
    }

    .property-value {
        font-size: 20px;
    }

}
/* =========================================================
   PROPERTY INFORMATION CARDS
========================================================= */

.property-info-card {
    width: 100%;

    background: #ffffff;

    border: 1px solid #e6ebf3;

    border-radius: 10px;

    box-shadow:
        0 2px 8px rgba(25, 45, 80, 0.04);

    overflow: hidden;

    margin-bottom: 24px;
}


/* =========================================================
   CARD HEADER
========================================================= */

.property-info-card-header {
    display: flex;
    align-items: center;

    gap: 13px;

    padding: 22px 20px 17px;

    margin: 0 20px;

    border-bottom: 1px solid #e7ebf2;
}

.property-info-card-header h4 {
    margin: 0;

    color: #17213b;

    font-size: 17px;

    font-weight: 700;

    line-height: 1.3;
}


/* =========================================================
   HEADER ICON
========================================================= */

.property-section-icon {
    width: 28px;
    height: 28px;

    min-width: 28px;

    border-radius: 50%;

    display: flex;
    align-items: center;
    justify-content: center;
}

.property-section-icon svg {
    width: 17px;
    height: 17px;

    stroke-width: 2.3;
}


/* BASIC ICON */

.basic-icon {
    background: #dce5ff;

    color: #3864dc;
}


/* LOCATION ICON */

.location-icon {
    background: #eadcff;

    color: #8651e7;
}


/* =========================================================
   CARD BODY
========================================================= */

.property-info-card-body {
    padding: 8px 20px 14px;
}


/* =========================================================
   BASIC INFORMATION ROW
========================================================= */

.property-detail-row {
    display: grid;

    grid-template-columns: 42% 58%;

    align-items: start;

    min-height: 38px;

    padding: 9px 0;

    font-size: 14px;
}


/* LABEL */

.property-detail-label {
    color: #26334b;

    font-weight: 600;

    padding-right: 15px;
}


/* VALUE */

.property-detail-value {
    color: #1f293d;

    font-weight: 500;

    word-break: break-word;
}


/* =========================================================
   DESCRIPTION
========================================================= */

.description-row {
    align-items: flex-start;

    padding-top: 10px;
}

.description-value {
    line-height: 1.65;

    color: #29344a;

    max-width: 100%;
}


/* =========================================================
   ACTIVE BADGE
========================================================= */

.property-active-badge {
    display: inline-flex;

    align-items: center;

    padding: 4px 10px;

    border-radius: 5px;

    background: #dff8e7;

    border: 1px solid #c0efcf;

    color: #229747;

    font-size: 13px;

    font-weight: 600;

    line-height: 1.2;
}


/* =========================================================
   INACTIVE BADGE
========================================================= */

.property-inactive-badge {
    display: inline-flex;

    align-items: center;

    padding: 4px 10px;

    border-radius: 5px;

    background: #fbe5e5;

    border: 1px solid #f2caca;

    color: #d33d3d;

    font-size: 13px;

    font-weight: 600;

    line-height: 1.2;
}


/* =========================================================
   LOCATION ROW
========================================================= */

.property-location-row {
    display: grid;

    grid-template-columns: 42px 1fr auto;

    align-items: center;

    column-gap: 12px;

    min-height: 67px;

    border-bottom: 1px solid #edf0f5;
}


/* Remove border from last row */

.property-location-row:last-child {
    border-bottom: none;
}


/* =========================================================
   LOCATION ICON
========================================================= */

.property-location-icon {
    width: 30px;
    height: 30px;

    border-radius: 50%;

    display: flex;
    align-items: center;
    justify-content: center;
}

.property-location-icon svg {
    width: 19px;
    height: 19px;

    stroke-width: 2;
}


/* COUNTRY */

.country-icon {
    color: #2763dc;

    background: #e7eeff;
}


/* STATE */

.state-icon {
    color: #0da9c5;

    background: #dcf8fb;
}


/* CITY */

.city-icon {
    color: #3b67dd;

    background: #e6edff;
}


/* AREA */

.area-icon {
    color: #ff4747;

    background: #ffe7e7;
}


/* =========================================================
   LOCATION LABEL
========================================================= */

.property-location-label {
    color: #26334b;

    font-size: 14px;

    font-weight: 600;
}


/* =========================================================
   LOCATION VALUE
========================================================= */

.property-location-value {
    color: #1c263b;

    font-size: 14px;

    font-weight: 600;

    text-align: right;

    padding-left: 10px;
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 991px) {

    .property-info-card {
        margin-bottom: 20px;
    }

}


@media (max-width: 575px) {

    .property-info-card-header {
        padding: 18px 15px 15px;

        margin: 0 15px;
    }

    .property-info-card-body {
        padding: 8px 15px 12px;
    }


    .property-detail-row {
        grid-template-columns: 1fr;

        gap: 5px;

        padding: 10px 0;
    }


    .property-detail-label {
        padding-right: 0;
    }


    .property-location-row {
        grid-template-columns: 38px 1fr;

        min-height: 60px;

        row-gap: 3px;
    }


    .property-location-value {
        grid-column: 2;

        text-align: left;

        padding-left: 0;
    }

}

/* Edit Images Modal Styles */
.edit-images-modal .modal-content {
    border: none;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 15px 50px rgba(20, 35, 70, 0.18);
}

.edit-images-modal .modal-header {
    padding: 18px 22px;
    border-bottom: 1px solid #e7ebf2;
}

.edit-modal-title {
    display: flex;
    align-items: center;
    gap: 12px;
}

.edit-modal-title h5 {
    margin: 0;
    color: #17213b;
    font-size: 18px;
    font-weight: 700;
}

.edit-modal-title small {
    color: #8993a6;
    font-size: 12px;
}

.edit-modal-icon {
    width: 38px;
    height: 38px;
    min-width: 38px;
    border-radius: 9px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #fff3e0;
    color: #e67e22;
}

.edit-modal-icon svg {
    width: 19px;
    height: 19px;
}

/* Existing Images Grid */
.existing-images-grid {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 12px;
    margin-bottom: 20px;
}

.existing-image-item {
    position: relative;
    height: 140px;
    overflow: hidden;
    border-radius: 8px;
    border: 2px solid #e2e7ee;
    background: #f3f5f8;
    transition: all 0.2s ease;
}

.existing-image-item:hover {
    border-color: #e67e22;
}

.existing-image-item img {
    width: 100%;
    height: 100%;
    display: block;
    object-fit: cover;
}

/* Delete Image Button */
.delete-image-btn {
    position: absolute;
    top: 6px;
    right: 6px;
    width: 28px;
    height: 28px;
    border: none;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(220, 53, 69, 0.9);
    color: #ffffff;
    cursor: pointer;
    transition: all 0.2s ease;
    opacity: 0;
}

.existing-image-item:hover .delete-image-btn {
    opacity: 1;
}

.delete-image-btn:hover {
    background: #dc3545;
    transform: scale(1.1);
}

.delete-image-btn svg {
    width: 14px;
    height: 14px;
}

/* Image Number Badge */
.image-number-badge {
    position: absolute;
    left: 6px;
    bottom: 6px;
    padding: 3px 8px;
    border-radius: 5px;
    background: rgba(20, 25, 35, 0.75);
    color: #ffffff;
    font-size: 11px;
    font-weight: 600;
}

/* Upload New Images Section */
.edit-upload-area {
    border: 2px dashed #cbd5e5;
    border-radius: 10px;
    background: #f8faff;
    padding: 20px;
    text-align: center;
    cursor: pointer;
    transition: all 0.2s ease;
    margin-top: 15px;
}

.edit-upload-area:hover {
    border-color: #e67e22;
    background: #fffbf5;
}

.edit-upload-area.dragover {
    border-color: #e67e22;
    background: #fff5eb;
}

.edit-upload-content {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 6px;
}

.edit-upload-content svg {
    width: 32px;
    height: 32px;
    color: #e67e22;
}

.edit-upload-content h6 {
    margin: 0;
    color: #202b42;
    font-size: 14px;
    font-weight: 600;
}

.edit-upload-content p {
    margin: 0;
    color: #68758a;
    font-size: 12px;
}

/* New Images Preview Grid */
.new-images-preview-grid {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 12px;
    margin-top: 12px;
}

.new-preview-item {
    position: relative;
    height: 120px;
    overflow: hidden;
    border-radius: 8px;
    border: 1px solid #e2e7ee;
    background: #f3f5f8;
}

.new-preview-item img {
    width: 100%;
    height: 100%;
    display: block;
    object-fit: cover;
}

.remove-new-preview {
    position: absolute;
    top: 4px;
    right: 4px;
    width: 24px;
    height: 24px;
    border: none;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(220, 53, 69, 0.9);
    color: #ffffff;
    cursor: pointer;
    transition: all 0.2s ease;
}

.remove-new-preview:hover {
    background: #dc3545;
    transform: scale(1.1);
}

.remove-new-preview svg {
    width: 12px;
    height: 12px;
}

/* Section Divider */
.edit-section-divider {
    display: flex;
    align-items: center;
    margin: 20px 0;
}

.edit-section-divider::before,
.edit-section-divider::after {
    content: "";
    flex: 1;
    border-bottom: 1px solid #e7ebf2;
}

.edit-section-divider span {
    padding: 0 15px;
    color: #8993a6;
    font-size: 13px;
    font-weight: 500;
}

/* Responsive */
@media (max-width: 767px) {
    .existing-images-grid,
    .new-images-preview-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

@media (max-width: 480px) {
    .existing-images-grid,
    .new-images-preview-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
    .existing-image-item {
        height: 120px;
    }
    .new-preview-item {
        height: 100px;
    }
}

/* Modal Footer */
.edit-images-modal .modal-footer {
    border-top: 1px solid #e7ebf2;
    padding: 15px 22px;
}

.edit-images-modal .modal-footer .btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    border-radius: 7px;
}

.edit-images-modal .modal-footer svg {
    width: 15px;
    height: 15px;
}



</style>
<section class="section">
    <div class="section-header">
        <h1>Property Details</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">
                    Dashboard
                </a>
            </div>
            <div class="breadcrumb-item">
                <a href="{{ route('properties.index') }}">
                    Properties
                </a>
            </div>
            <div class="breadcrumb-item active">
                Property Details
            </div>
        </div>
    </div>
    <div class="section-body">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button   type="button" class="close"  data-dismiss="alert">
                    <span>&times;</span>
                </button>
            </div>
        @endif
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="mb-1">
                        {{ $property->title }}
                    </h4>
                    @if($property->slug)
                        <small class="text-muted">
                            {{ $property->slug }}
                        </small>
                    @endif
                </div>
                <div class="card-header-action d-flex align-items-center justify-content-end">
                    @can('approve property')
                    @if($property->approval == 0)
                        <button  type="button" class="btn btn-success mr-2" data-toggle="modal" data-target="#approvePropertyModal" >
                            <i data-feather="check-circle"></i>
                            Approve Property
                        </button>
                    @else
                        <span class="badge badge-success mr-2 p-2">
                            <i data-feather="check-circle"></i>
                            Approved
                        </span>
                    @endif
                    @endcan
                    @if($property->status == 2)
                        <span class="btn btn-danger">
                            <i class="fas fa-check-circle"></i>
                            Sold Out
                        </span>
                    @elseif($property->approval == 0)
                        @can('edit own properties')
                            <a href="{{ route('properties.edit', $property->id) }}" class="btn btn-primary">
                                <i class="fas fa-edit"></i>
                                Edit Property
                            </a>
                        @endcan
                    @endif
                    @if($property->status != 2)

                        @can('property enquiry')
                            @php
                                $alreadyEnquired = \App\Models\PropertyEnquiry::where('property_id', $property->id)
                                    ->where('buyer_id', auth()->id())
                                    ->exists();
                            @endphp

                            @if(!$alreadyEnquired)
                                <button
                                    type="button"
                                    class="btn btn-info mr-2"
                                    data-toggle="modal"
                                    data-target="#buyerEnquiryModal"
                                >
                                    <i data-feather="message-circle"></i>
                                    Enquiry
                                </button>
                            @else
                                <span class="badge badge-success mr-2 p-2">
                                    <i data-feather="check-circle"></i>
                                    Enquiry Submitted
                                </span>
                            @endif
                        @endcan

                    @endif
                </div>
            </div>
            <div class="card-body">
                <div class="property-card">
                    <div class="row g-0">
                        <div class="col-lg-4">
                            <div class="property-image">
                                @if($property->images && $property->images->count())
                                    <img  src="{{ asset('storage/' . $property->images->first()->image) }}" alt="{{ $property->title }}" >
                                @else
                                    <img src="{{ asset('assets/images/default-property.jpg') }}" alt="{{ $property->title }}" >
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="property-details">
                                <div class="property-header">
                                    <h2>{{ $property->title }} </h2>
                                    <div class="property-location">
                                          <i data-feather="map-pin"></i>
                                        <span>
                                            @if($property->propertyArea)
                                                {{ $property->propertyArea->name }}
                                            @endif
                                            @if($property->city)
                                                @if($property->propertyArea),
                                                @endif
                                                {{ $property->city->name }}
                                            @endif
                                            @if($property->state)
                                                @if($property->city),
                                                @endif
                                                {{ $property->state->name }}
                                            @endif
                                            @if($property->country)
                                                @if($property->state),
                                                @endif
                                                {{ $property->country->name }}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                <div class="property-divider"></div>
                                <div class="row property-info">
                                    <div class="col-lg-3 col-md-6">
                                        <div class="property-info-item">
                                            <div class="property-icon category-icon">
                                                   <i data-feather="home"></i>

                                            </div>
                                            <div class="property-label">
                                                 Property Category
                                            </div>
                                            <div class="property-value">
                                                {{ $property->propertyCategory->name ?? '-' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="property-info-item">
                                            <div class="property-icon purpose-icon">
                                                <i data-feather="target"></i>
                                            </div>
                                            <div class="property-label">
                                               Purpose
                                            </div>
                                            <div class="property-value">
                                                {{ $property->purpose
                                                    ? ucwords(str_replace('_', ' ', $property->purpose))
                                                    : '-'
                                                }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="property-info-item">
                                            <div class="property-icon price-icon">
                                                <i data-feather="dollar-sign"></i>
                                            </div>
                                            <div class="property-label">
                                                Price
                                            </div>
                                            <div class="property-value">
                                                @if($property->price !== null)
                                                    ₹{{ number_format((float) $property->price, 0) }}
                                                @else
                                                    -
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="property-info-item">
                                            <div class="property-icon status-icon">
                                                <i data-feather="shield"></i>
                                            </div>
                                            <div class="property-label">
                                                Status
                                            </div>
                                            <div class="property-status">
                                                <span class="status-small-dot"></span>
                                                {{ $property->status ? 'Active' : 'Inactive' }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="property-info-card">
                            <div class="property-info-card-header">
                                <div class="property-section-icon basic-icon">
                                    <i data-feather="info"></i>
                                </div>
                                <h4>Basic Information </h4>
                            </div>
                            <div class="property-info-card-body">
                                <div class="property-detail-row">
                                    <div class="property-detail-label">
                                        Property Category
                                    </div>
                                    <div class="property-detail-value">
                                        {{ $property->propertyCategory->name ?? '-' }}
                                    </div>
                                </div>
                                <div class="property-detail-row">
                                    <div class="property-detail-label">
                                        Purpose
                                    </div>
                                    <div class="property-detail-value">
                                        {{ $property->purpose
                                            ? ucwords(str_replace('_', ' ', $property->purpose))
                                            : '-'
                                        }}
                                    </div>
                                </div>
                                <div class="property-detail-row">
                                    <div class="property-detail-label">
                                        Status
                                    </div>
                                    <div class="property-detail-value">
                                        @if($property->status)
                                            <span class="property-active-badge">
                                                Active
                                            </span>
                                        @else
                                            <span class="property-inactive-badge">
                                                Inactive
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="property-detail-row">
                                    <div class="property-detail-label">
                                        Title
                                    </div>
                                    <div class="property-detail-value">
                                        {{ $property->title ?? '-' }}
                                    </div>
                                </div>
                                <div class="property-detail-row">
                                    <div class="property-detail-label">
                                        Slug
                                    </div>
                                    <div class="property-detail-value">
                                        {{ $property->slug ?? '-' }}
                                    </div>
                                </div>
                                <div class="property-detail-row description-row">
                                    <div class="property-detail-label">
                                        Description
                                    </div>
                                    <div class="property-detail-value description-value">
                                        @if($property->description)
                                            {!! nl2br(e($property->description)) !!}
                                        @else
                                            -
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="property-info-card">
                            <div class="property-info-card-header">
                                <div class="property-section-icon location-icon">
                                    <i data-feather="map-pin"></i>
                                </div>
                                <h4>Location Information</h4>
                            </div>
                            <div class="property-info-card-body">
                                <div class="property-location-row">
                                    <div class="property-location-icon country-icon">
                                        <i data-feather="globe"></i>
                                    </div>
                                    <div class="property-location-label">
                                        Country
                                    </div>
                                    <div class="property-location-value">
                                        {{ $property->country->name ?? '-' }}
                                    </div>
                                </div>
                                <div class="property-location-row">
                                    <div class="property-location-icon state-icon">
                                        <i data-feather="flag"></i>
                                    </div>
                                    <div class="property-location-label">
                                        State
                                    </div>
                                    <div class="property-location-value">
                                        {{ $property->state->name ?? '-' }}
                                    </div>
                                </div>
                                <div class="property-location-row">
                                    <div class="property-location-icon city-icon">
                                        <i data-feather="home"></i>
                                    </div>
                                    <div class="property-location-label">
                                        City
                                    </div>
                                    <div class="property-location-value">
                                        {{ $property->city->name ?? '-' }}
                                    </div>
                                </div>
                                <div class="property-location-row">
                                    <div class="property-location-icon area-icon">
                                        <i data-feather="map"></i>
                                    </div>
                                    <div class="property-location-label">
                                        Area
                                    </div>
                                    <div class="property-location-value">
                                        {{ $property->propertyArea->name ?? '-' }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="property-detail-card">
                            <div class="property-card-header">
                                <div class="property-card-icon property-icon-blue">
                                    @php
                                        $categoryName = strtolower(
                                            trim($property->propertyCategory->name ?? '')
                                        );
                                    @endphp
                                    @if($categoryName === 'residential')
                                        <i data-feather="home"></i>
                                    @elseif($categoryName === 'commercial')
                                        <i data-feather="briefcase"></i>
                                    @elseif($categoryName === 'plot')
                                        <i data-feather="map"></i>
                                    @else
                                        <i data-feather="home"></i>
                                    @endif
                                </div>
                                <h4>{{ $property->propertyCategory->name ?? 'Property Details' }} Details </h4>
                            </div>
                            <div class="property-details-list">
                                @if($categoryName === 'residential')
                                    <div class="property-detail-item">
                                        <span>  Property Type </span>
                                        <strong> {{ $property->propertyCategory->name ?? '-' }}</strong>
                                    </div>
                                    <div class="property-detail-item">
                                        <span>Residential Type</span>
                                        <strong>
                                            {{ $property->residential_type ?? '-' }}
                                        </strong>
                                    </div>
                                    <div class="property-detail-item">
                                        <span> BHK  </span>
                                        <strong>
                                            {{ $property->bhk
                                                ? $property->bhk . ' BHK'
                                                : '-'
                                            }}
                                        </strong>
                                    </div>
                                    <div class="property-detail-item">
                                        <span> Bedrooms </span>
                                        <strong> {{ $property->bedrooms ?? '-' }}</strong>
                                    </div>
                                    <div class="property-detail-item">
                                        <span>  Bathrooms </span>
                                        <strong>  {{ $property->bathrooms ?? '-' }} </strong>
                                    </div>
                                    <div class="property-detail-item">
                                        <span> Balconies </span>
                                        <strong> {{ $property->balconies ?? '-' }}</strong>
                                    </div>
                                    <div class="property-detail-item">
                                        <span> Furnished Status </span>
                                        <strong>
                                            {{ $property->furnishing
                                                ? ucwords(
                                                    str_replace(
                                                        '_',
                                                        ' ',
                                                        $property->furnishing
                                                    )
                                                )
                                                : '-'
                                            }}
                                        </strong>
                                    </div>
                                    <div class="property-detail-item">
                                        <span>Parking</span>
                                        <strong>
                                            Car: {{ $property->car_parking ?? 0 }}
                                            &nbsp; | &nbsp;
                                            Bike: {{ $property->bike_parking ?? 0 }}
                                        </strong>
                                    </div>
                                    <div class="property-detail-item">
                                        <span> Facing</span>
                                        <strong> {{ $property->facing ?? '-' }}</strong>
                                    </div>
                                    <div class="property-detail-item">
                                        <span> Floor Number</span>
                                        <strong>  {{ $property->floor_number ?? '-' }} </strong>
                                    </div>
                                    <div class="property-detail-item">
                                        <span> Total Floors </span>
                                        <strong> {{ $property->total_floors ?? '-' }} </strong>
                                    </div>
                                    <div class="property-detail-item">
                                        <span> Year Built </span>
                                        <strong> {{ $property->construction_year ?? '-' }}</strong>
                                    </div>
                                    <div class="property-detail-item">
                                        <span> Ownership</span>
                                        <strong>
                                            {{ $property->ownership
                                                ? ucwords(
                                                    str_replace(
                                                        '_',
                                                        ' ',
                                                        $property->ownership
                                                    )
                                                )
                                                : '-'
                                            }}
                                        </strong>
                                    </div>
                                @elseif($categoryName === 'commercial')
                                    <div class="property-detail-item">
                                        <span> Property Type  </span>
                                        <strong>
                                            {{ $property->propertyCategory->name ?? '-' }}
                                        </strong>
                                    </div>
                                    <div class="property-detail-item">
                                        <span>  Commercial Type </span>
                                        <strong>
                                            {{ $property->commercial_type
                                                ? ucwords(
                                                    str_replace(
                                                        '_',
                                                        ' ',
                                                        $property->commercial_type
                                                    )
                                                )
                                                : '-'
                                            }}
                                        </strong>
                                    </div>
                                    <div class="property-detail-item">
                                        <span> Business Type </span>
                                        <strong>
                                            {{ $property->business_type
                                                ? ucwords(
                                                    str_replace(
                                                        '_',
                                                        ' ',
                                                        $property->business_type
                                                    )
                                                )
                                                : '-'
                                            }}
                                        </strong>
                                    </div>
                                    <div class="property-detail-item">
                                        <span> Washrooms </span>
                                        <strong>{{ $property->washrooms ?? '-' }}</strong>
                                    </div>
                                    <div class="property-detail-item">
                                        <span>Parking</span>
                                        <strong>
                                            Car: {{ $property->car_parking ?? 0 }}
                                            &nbsp; | &nbsp;
                                            Bike: {{ $property->bike_parking ?? 0 }}
                                        </strong>
                                    </div>
                                    <div class="property-detail-item">
                                        <span> Furnished Status </span>
                                        <strong>
                                            {{ $property->furnishing
                                                ? ucwords(
                                                    str_replace(
                                                        '_',
                                                        ' ',
                                                        $property->furnishing
                                                    )
                                                )
                                                : '-'
                                            }}
                                        </strong>
                                    </div>
                                    <div class="property-detail-item">
                                        <span> Floor Number </span>
                                        <strong>  {{ $property->floor_number ?? '-' }} </strong>
                                    </div>
                                    <div class="property-detail-item">
                                        <span>  Total Floors </span>
                                        <strong>  {{ $property->total_floors ?? '-' }} </strong>
                                    </div>
                                    <div class="property-detail-item">
                                        <span>Year Built </span>
                                        <strong> {{ $property->construction_year ?? '-' }} </strong>
                                    </div>
                                    <div class="property-detail-item">
                                        <span> Ownership </span>
                                        <strong>
                                            {{ $property->ownership
                                                ? ucwords(
                                                    str_replace(
                                                        '_',
                                                        ' ',
                                                        $property->ownership
                                                    )
                                                )
                                                : '-'
                                            }}
                                        </strong>
                                    </div>
                                    @elseif($categoryName === 'resale')

                                        {{-- Property Type --}}
                                        <div class="property-detail-item">
                                            <span>Property Type</span>
                                            <strong>
                                                {{ $property->propertyCategory->name ?? '-' }}
                                            </strong>
                                        </div>

                                        {{-- Resale Type --}}
                                        <div class="property-detail-item">
                                            <span>Resale Type</span>
                                            <strong>
                                                {{ $property->resale_type ?? '-' }}
                                            </strong>
                                        </div>

                                        {{-- BHK --}}
                                        <div class="property-detail-item">
                                            <span>BHK</span>
                                            <strong>
                                                {{ $property->bhk ? $property->bhk . ' BHK' : '-' }}
                                            </strong>
                                        </div>

                                        {{-- Bedrooms --}}
                                        <div class="property-detail-item">
                                            <span>Bedrooms</span>
                                            <strong>
                                                {{ $property->bedrooms ?? '-' }}
                                            </strong>
                                        </div>

                                        {{-- Bathrooms --}}
                                        <div class="property-detail-item">
                                            <span>Bathrooms</span>
                                            <strong>
                                                {{ $property->bathrooms ?? '-' }}
                                            </strong>
                                        </div>

                                        {{-- Balconies --}}
                                        <div class="property-detail-item">
                                            <span>Balconies</span>
                                            <strong>
                                                {{ $property->balconies ?? '-' }}
                                            </strong>
                                        </div>

                                        {{-- Facing --}}
                                        <div class="property-detail-item">
                                            <span>Facing</span>
                                            <strong>
                                                {{ $property->facing ?? '-' }}
                                            </strong>
                                        </div>

                                        {{-- Floor Number --}}
                                        <div class="property-detail-item">
                                            <span>Floor Number</span>
                                            <strong>
                                                {{ $property->floor_number ?? '-' }}
                                            </strong>
                                        </div>

                                        {{-- Total Floors --}}
                                        <div class="property-detail-item">
                                            <span>Total Floors</span>
                                            <strong>
                                                {{ $property->total_floors ?? '-' }}
                                            </strong>
                                        </div>

                                        {{-- Furnishing --}}
                                        <div class="property-detail-item">
                                            <span>Furnished Status</span>
                                            <strong>
                                                {{ $property->furnishing
                                                    ? ucwords(str_replace('_', ' ', $property->furnishing))
                                                    : '-'
                                                }}
                                            </strong>
                                        </div>

                                        {{-- Purchase Year --}}
                                        <div class="property-detail-item">
                                            <span>Purchase Year</span>
                                            <strong>
                                                {{ $property->purchase_year ?? '-' }}
                                            </strong>
                                        </div>

                                        {{-- Property Age --}}
                                        <div class="property-detail-item">
                                            <span>Property Age</span>
                                            <strong>
                                                {{ $property->property_age !== null
                                                    ? $property->property_age . ' Years'
                                                    : '-'
                                                }}
                                            </strong>
                                        </div>

                                        {{-- Ownership --}}
                                        <div class="property-detail-item">
                                            <span>Ownership</span>
                                            <strong>
                                                {{ $property->ownership
                                                    ? ucwords(str_replace('_', ' ', $property->ownership))
                                                    : '-'
                                                }}
                                            </strong>
                                        </div>
                                @elseif($categoryName === 'plot')
                                    <div class="property-detail-item">
                                        <span> Property Type </span>
                                        <strong> {{ $property->propertyCategory->name ?? '-' }}  </strong>
                                    </div>
                                    <div class="property-detail-item">
                                        <span>  Plot Area  </span>
                                        <strong>
                                            @if($property->plot_area)
                                                {{ number_format(
                                                    (float) $property->plot_area,
                                                    2
                                                ) }}
                                                {{ $property->area_unit ?? '' }}
                                            @else
                                                -
                                            @endif
                                        </strong>
                                    </div>
                                    <div class="property-detail-item">
                                        <span> Road Width</span>
                                        <strong>
                                            @if($property->road_width)
                                                {{ number_format(
                                                    (float) $property->road_width,
                                                    2
                                                ) }}
                                                {{ $property->road_width_unit ?? '' }}
                                            @else
                                                -
                                            @endif
                                        </strong>
                                    </div>
                                    <div class="property-detail-item">
                                        <span>  Boundary Wall </span>
                                        <strong>
                                            {{ $property->boundary_wall ?? '-' }}
                                        </strong>
                                    </div>
                                    <div class="property-detail-item">
                                        <span>  Land Type </span>
                                        <strong>
                                            {{ $property->land_type
                                                ? ucwords(
                                                    str_replace(
                                                        '_',
                                                        ' ',
                                                        $property->land_type
                                                    )
                                                )
                                                : '-'
                                            }}
                                        </strong>
                                    </div>
                                    <div class="property-detail-item">
                                        <span>Facing</span>
                                        <strong>
                                            {{ $property->facing ?? '-' }}
                                        </strong>
                                    </div>
                                    <div class="property-detail-item">
                                        <span>
                                            Ownership
                                        </span>
                                        <strong>
                                            {{ $property->ownership
                                                ? ucwords(
                                                    str_replace(
                                                        '_',
                                                        ' ',
                                                        $property->ownership
                                                    )
                                                )
                                                : '-'
                                            }}
                                        </strong>
                                    </div>
                                    <div class="property-detail-item">
                                        <span> Status</span>
                                        <strong>
                                            {{ $property->status
                                                ? 'Active'
                                                : 'Inactive'
                                            }}
                                        </strong>
                                    </div>
                                @else
                                    <div class="property-detail-item">
                                        <span>Property Type </span>
                                        <strong> {{ $property->propertyCategory->name ?? '-' }} </strong>
                                    </div>
                                    <div class="property-detail-item">
                                        <span>  Area </span>
                                        <strong>
                                            @if($property->area)
                                                {{ number_format(
                                                    (float) $property->area,
                                                    2
                                                ) }}
                                                {{ $property->area_unit ?? '' }}
                                            @else
                                                -
                                            @endif
                                        </strong>
                                    </div>
                                    <div class="property-detail-item">
                                        <span>Land Type</span>
                                        <strong>
                                            {{ $property->land_type ?? '-' }}
                                        </strong>
                                    </div>
                                    <div class="property-detail-item">
                                        <span> Facing</span>
                                        <strong> {{ $property->facing ?? '-' }}</strong>
                                    </div>
                                    <div class="property-detail-item">
                                        <span> Ownership </span>
                                        <strong>
                                            {{ $property->ownership
                                                ? ucwords(
                                                    str_replace(
                                                        '_',
                                                        ' ',
                                                        $property->ownership
                                                    )
                                                )
                                                : '-'
                                            }}
                                        </strong>
                                    </div>
                                    <div class="property-detail-item">
                                        <span>Status </span>
                                        <strong>
                                            {{ $property->status
                                                ? 'Active'
                                                : 'Inactive'
                                            }}
                                        </strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="property-detail-card price-card">
                            <div class="property-card-header">
                                <div class="property-card-icon property-icon-yellow">
                                    <span>₹</span>
                                </div>
                                <h4>Price Information </h4>
                            </div>
                            <div class="price-information-list">
                                @if($property->price !== null)
                                    <div class="price-item">
                                        <span>  Amount </span>
                                        <strong class="main-price">
                                        
                                                ₹{{ number_format((float) $property->price, 2) }}
                                        
                                        </strong>
                                    </div>
                                @endif
                                @if( $property->price !== null && $property->area !== null && (float) $property->area > 0 )
                                    <div class="price-item">
                                        <span>
                                            Price per {{ $property->area_unit ?? 'Sq Ft' }}
                                        </span>
                                        @php
                                            $pricePerSqFt =
                                                (float) $property->price /
                                                (float) $property->area;
                                        @endphp

                                        <strong>
                                            ₹{{ number_format($pricePerSqFt, 2) }}
                                        </strong>
                                    </div>
                                @endif
                                @if($property->commercial_budget !== null)
                                    <div class="price-item">
                                        <span>Commercial Budget</span>
                                        <strong>
                                            ₹{{ number_format((float) $property->commercial_budget, 2) }}
                                        </strong>
                                    </div>
                                @endif
                                @if($property->monthly_rent !== null)
                                    <div class="price-item">
                                        <span> Monthly Rent </span>
                                        <strong> ₹{{ number_format((float) $property->monthly_rent, 2) }}</strong>
                                    </div>
                                @endif
                                @if($property->security_deposit !== null)
                                    <div class="price-item">
                                        <span>  Security Deposit </span>
                                        <strong>
                                            ₹{{ number_format((float) $property->security_deposit, 2) }}
                                        </strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="property-detail-card amenities-card">
                            <div class="property-card-header">
                                <div class="property-card-icon property-icon-blue">
                                    <i data-feather="star"></i>
                                </div>
                                <h4>
                                    Amenities
                                </h4>
                                <div class="ml-auto">
                                    @if($property->status != 2)
                                        @can('manage amenities')
                                        <button  type="button" class="btn btn-sm btn-primary" data-toggle="modal"  data-target="#amenitiesModal">
                                            <i data-feather="plus"></i>
                                            Add Amenities
                                        </button>
                                        @endcan
                                    @endif
                                </div>
                            </div>
                            <div class="amenities-list">
                                @forelse($property->amenities as $amenity)
                                    <span class="amenity-badge">
                                        <i data-feather="check-circle"></i>
                                        {{ $amenity->name }}
                                    </span>
                                @empty
                                    <span class="no-amenities">
                                        No amenities available
                                    </span>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="media-gallery-card">
                    <div class="media-gallery-header">
                        <div class="media-gallery-icon">
                            <i data-feather="image"></i>
                        </div>
                        <h4>
                            Media Gallery
                        </h4>
                        <div class="ml-auto d-flex gap-2">
                            @if($property->status != 2 && $property->approval == 0)
                                @can('add media gallery')
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#uploadImagesModal" >
                                    <i data-feather="plus"></i>
                                    Add Images
                                </button>
                                @endcan
                                @can('media gallery')
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editImagesModal" style="margin-left: 1rem;">
                                    <i data-feather="edit-2"></i>
                                    Edit Images
                                </button>
                                @endcan
                            @endif
                        </div>
                    </div>
                    <div class="media-gallery-scroll">
                        @forelse($property->images as $image)
                            <div class="media-gallery-item">
                            <img src="{{ asset('storage/' . $image->image) }}"  alt="{{ $image->title ?? $property->title }}"  >
                            </div>
                        @empty
                            <div class="media-gallery-empty">
                                <i data-feather="image"></i>
                                <span>
                                    No images available
                                </span>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
            @can('media gallery')
            <div class="card-body">
                <div class="record-information-card">
                    <div class="record-information-header">
                        <div class="record-information-icon">
                            <i data-feather="clipboard"></i>
                        </div>
                        <h4> Record Information </h4>
                    </div>
                    <div class="row record-information-body">
                        <div class="col-lg-6">
                            <div class="record-info-box">
                                <div class="record-info-row">
                                    <div class="record-info-label">
                                        Created By
                                    </div>
                                    <div class="record-info-value">
                                        <p class="mb-1">
                                            <i class="fas fa-user mr-1"></i>
                                            <strong>{{ $property->creator?->name ?? 'Admin' }}</strong>
                                        </p>

                                        <p class="mb-1">
                                            <i class="fas fa-phone mr-1"></i>
                                            {{ $property->creator?->mobile ?? 'N/A' }}
                                        </p>

                                        <p class="mb-0">
                                            <i class="fas fa-envelope mr-1"></i>
                                            {{ $property->creator?->email ?? 'N/A' }}
                                        </p>
                                    </div>
                                </div>
                                <div class="record-info-row">
                                    <div class="record-info-label">
                                        Created At
                                    </div>
                                    <div class="record-info-value">
                                        {{ $property->created_at
                                            ? $property->created_at->format('M d, Y h:i A')
                                            : '-'
                                        }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="record-info-box">
                                <div class="record-info-row">
                                    <div class="record-info-label">
                                        Last Updated By
                                    </div>
                                    <div class="record-info-value">
                                        <div>
                                            <i class="fas fa-user mr-1"></i>
                                            <strong>{{ $property->updater?->name ?? 'Admin' }}</strong>
                                        </div>

                                        <div>
                                            <i class="fas fa-phone mr-1"></i>
                                            {{ $property->updater?->mobile ?? 'N/A' }}
                                        </div>

                                        <div>
                                            <i class="fas fa-envelope mr-1"></i>
                                            {{ $property->updater?->email ?? 'N/A' }}
                                        </div>
                                    </div>
                                </div>
                                <div class="record-info-row">
                                    <div class="record-info-label">
                                        Last Updated At
                                    </div>
                                    <div class="record-info-value">
                                        {{ $property->updated_at
                                            ? $property->updated_at->format('M d, Y h:i A')
                                            : '-'
                                        }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endcan
            @can('property contact info')
            <div class="card-body">
                <div class="record-information-card">

                    <div class="record-information-header">
                        <div class="record-information-icon">
                            <i data-feather="user"></i>
                        </div>
                        <h4>Seller Contact Information</h4>
                    </div>

                    <div class="row record-information-body">

                        {{-- Seller Name --}}
                        <div class="col-lg-4">
                            <div class="record-info-box">
                                <div class="record-info-row">
                                    <div class="record-info-label">
                                        Seller Name
                                    </div>

                                    <div class="record-info-value">
                                        <i class="fas fa-user mr-1"></i>
                                        <strong>
                                            {{ $property->creator?->name ?? 'N/A' }}
                                        </strong>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Mobile --}}
                        <div class="col-lg-4">
                            <div class="record-info-box">
                                <div class="record-info-row">
                                    <div class="record-info-label">
                                        Mobile Number
                                    </div>

                                    <div class="record-info-value">
                                        <i class="fas fa-phone mr-1"></i>
                                        {{ $property->creator?->mobile ?? 'N/A' }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Email --}}
                        <div class="col-lg-4">
                            <div class="record-info-box">
                                <div class="record-info-row">
                                    <div class="record-info-label">
                                        Email Address
                                    </div>

                                    <div class="record-info-value">
                                        <i class="fas fa-envelope mr-1"></i>
                                        {{ $property->creator?->email ?? 'N/A' }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Latitude --}}
                        <div class="col-lg-4">
                            <div class="record-info-box">
                                <div class="record-info-row">
                                    <div class="record-info-label">
                                        Latitude
                                    </div>

                                    <div class="record-info-value">
                                        <i class="fas fa-map-marker-alt mr-1"></i>
                                        {{ $property->latitude ?? 'N/A' }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Longitude --}}
                        <div class="col-lg-4">
                            <div class="record-info-box">
                                <div class="record-info-row">
                                    <div class="record-info-label">
                                        Longitude
                                    </div>

                                    <div class="record-info-value">
                                        <i class="fas fa-map-marker-alt mr-1"></i>
                                        {{ $property->longitude ?? 'N/A' }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Map --}}
                        <div class="col-lg-4">
                            <div class="record-info-box">
                                <div class="record-info-row">
                                    <div class="record-info-label">
                                        Location
                                    </div>

                                    <div class="record-info-value">

                                        @if($property->latitude && $property->longitude)

                                            <a
                                                href="https://www.google.com/maps?q={{ $property->latitude }},{{ $property->longitude }}"
                                                target="_blank"
                                                rel="noopener noreferrer"
                                                class="btn btn-sm btn-primary"
                                            >
                                                <i class="fas fa-map-marker-alt mr-1"></i>
                                                View on Map
                                            </a>

                                        @else

                                            <span class="text-muted">
                                                Location not available
                                            </span>

                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            @endcan
            @can('property enquiries')
                <div class="card-body">
                    <div class="record-information-card">
                        <div class="record-information-header">
                            <div class="record-information-icon">
                                <i data-feather="message-circle"></i>
                            </div>
                            <h4>Buyer Enquiries</h4>
                            <div class="ml-auto">
                                <span class="badge badge-primary p-2">
                                    {{ $property->enquiries->count() }} Enquiries
                                </span>
                            </div>
                        </div>
                        <div class="record-information-body">
                            @if($property->enquiries->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Contact Info</th>
                                                <th>Available</th>
                                                <th>Enquiry </th>
                                                <th>Follow-up</th>
                                                <th>Note</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($property->enquiries as $key => $enquiry)
                                                <tr>
                                                    <td>
                                                        {{ $key + 1 }}
                                                    </td>
                                                    <td>
                                                        <strong>
                                                            {{ $enquiry->buyer?->name ?? 'N/A' }}
                                                        </strong>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <i class="fas fa-phone mr-1"></i>
                                                            {{ $enquiry->buyer?->mobile ?? 'N/A' }}
                                                        </div>

                                                        <div class="mt-1">
                                                            <i class="fas fa-envelope mr-1"></i>
                                                            {{ $enquiry->buyer?->email ?? 'N/A' }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        @if($enquiry->property_available === 'yes')
                                                            <span class="badge badge-success">
                                                                <i class="fas fa-check mr-1"></i>
                                                                Yes
                                                            </span>
                                                        @elseif($enquiry->property_available === 'no')
                                                            <span class="badge badge-danger">
                                                                <i class="fas fa-times mr-1"></i>
                                                                No
                                                            </span>
                                                        @else
                                                            <span class="badge badge-warning">
                                                                <i class="fas fa-question mr-1"></i>
                                                                Maybe
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($enquiry->enquiry_type)
                                                            {{ ucwords(
                                                                str_replace(
                                                                    '_',
                                                                    ' ',
                                                                    $enquiry->enquiry_type
                                                                )
                                                            ) }}
                                                        @else
                                                            N/A
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($enquiry->follow_up_required === 'yes')
                                                            <span class="badge badge-info">
                                                                <i class="fas fa-bell mr-1"></i>
                                                                Required
                                                            </span>
                                                        @else
                                                            <span class="badge badge-secondary">
                                                                Not Required
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td style="min-width: 220px;">
                                                        {{ $enquiry->note ?? 'N/A' }}
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="7" class="text-center py-4">
                                                        <i data-feather="message-circle"></i>
                                                        <div class="mt-2 text-muted">
                                                            No buyer enquiries for this property.
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="text-center py-4">
                                    <i
                                        data-feather="message-circle"
                                        style="width: 45px; height: 45px;"
                                    ></i>
                                    <h5 class="mt-3">
                                        No Buyer Enquiries
                                    </h5>
                                    <p class="text-muted mb-0">
                                        No enquiry has been submitted for this property yet.
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endcan
        </div>
    </div>
</section>
<div  class="modal fade"  id="amenitiesModal"  tabindex="-1" role="dialog" aria-labelledby="amenitiesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content amenities-modal">
            <div class="modal-header">
                <div class="amenities-modal-title">
                    <div class="amenities-modal-icon">
                        <i data-feather="star"></i>
                    </div>
                    <div>
                        <h5 id="amenitiesModalLabel">
                            Property Amenities
                        </h5>
                        <small>
                            Select amenities available for this property
                        </small>
                    </div>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                    <span aria-hidden="true">
                        &times;
                    </span>
                </button>
            </div>
            <form action="{{ route('properties.amenities.update', $property->id) }}"  method="POST" >
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row amenities-modal-list">
                        @forelse($amenities as $amenity)
                            @php
                                $isSelected = $property->amenities->contains('id', $amenity->id);
                            @endphp
                            <div class="col-lg-4 col-md-6 mb-3 amenity-option" data-name="{{ strtolower($amenity->name) }}">
                                <label class="amenity-checkbox">
                                    <input  type="checkbox" name="amenities[]" value="{{ $amenity->id }}" class="amenity-check" {{ $isSelected ? 'checked' : '' }}>
                                    <span class="amenity-checkmark">
                                        <i data-feather="check"></i>
                                    </span>
                                    <span class="amenity-name">
                                        {{ $amenity->name }}
                                    </span>
                                </label>
                            </div>
                        @empty
                            <div class="col-12">
                                <div class="no-amenities-modal">
                                    <i data-feather="info"></i>
                                    <span> No amenities found.</span>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal" >
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i data-feather="save"></i>
                        Save Amenities
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- =========================================================
    UPLOAD IMAGES MODAL
========================================================= --}}
<style>
/* =========================================================
   UPLOAD IMAGES MODAL
========================================================= */

.upload-images-modal {
    border: none;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 15px 50px rgba(20, 35, 70, 0.18);
}


/* =========================================================
   HEADER
========================================================= */

.upload-images-modal .modal-header {
    padding: 18px 22px;
    border-bottom: 1px solid #e7ebf2;
}


.upload-modal-title {
    display: flex;
    align-items: center;
    gap: 12px;
}


.upload-modal-title h5 {
    margin: 0;
    color: #17213b;
    font-size: 18px;
    font-weight: 700;
}


.upload-modal-title small {
    color: #8993a6;
    font-size: 12px;
}


.upload-modal-icon {
    width: 38px;
    height: 38px;
    min-width: 38px;

    border-radius: 9px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #e5edff;
    color: #3265dc;
}


.upload-modal-icon svg {
    width: 19px;
    height: 19px;
}


/* =========================================================
   UPLOAD AREA
========================================================= */

.image-upload-area {
    width: 100%;

    min-height: 190px;

    border: 2px dashed #cbd5e5;

    border-radius: 10px;

    background: #f8faff;

    display: flex;

    align-items: center;

    justify-content: center;

    text-align: center;

    cursor: pointer;

    transition: all 0.2s ease;
}


.image-upload-area:hover {
    border-color: #5477dc;
    background: #f4f7ff;
}


.image-upload-area.dragover {
    border-color: #3265dc;
    background: #edf3ff;
}


.upload-area-content {
    padding: 25px;
}


.upload-icon {
    width: 50px;
    height: 50px;

    margin: 0 auto 12px;

    border-radius: 50%;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #e5edff;
    color: #3265dc;
}


.upload-icon svg {
    width: 24px;
    height: 24px;
}


.upload-area-content h6 {
    margin-bottom: 5px;

    color: #202b42;

    font-size: 16px;

    font-weight: 700;
}


.upload-area-content p {
    margin-bottom: 4px;

    color: #68758a;

    font-size: 13px;
}


.upload-area-content > span {
    color: #9aa3b2;

    font-size: 12px;
}


/* =========================================================
   SELECTED IMAGE INFO
========================================================= */

.selected-image-info {
    margin-top: 15px;

    padding: 9px 12px;

    border-radius: 7px;

    background: #f2f6ff;

    border: 1px solid #dbe5ff;

    color: #3157ae;

    font-size: 13px;
}


.selected-image-info svg {
    width: 15px;
    height: 15px;

    vertical-align: middle;

    margin-right: 4px;
}


/* =========================================================
   PREVIEW GRID
========================================================= */

.image-preview-grid {
    display: grid;

    grid-template-columns:
        repeat(4, minmax(0, 1fr));

    gap: 12px;

    margin-top: 15px;
}


/* =========================================================
   PREVIEW ITEM
========================================================= */

.image-preview-item {
    position: relative;

    height: 125px;

    overflow: hidden;

    border-radius: 8px;

    border: 1px solid #e2e7ee;

    background: #f3f5f8;
}


.image-preview-item img {
    width: 100%;
    height: 100%;

    display: block;

    object-fit: cover;
}


/* =========================================================
   REMOVE PREVIEW
========================================================= */

.remove-preview {
    position: absolute;

    top: 6px;
    right: 6px;

    width: 27px;
    height: 27px;

    border: none;

    border-radius: 50%;

    display: flex;

    align-items: center;

    justify-content: center;

    background: rgba(20, 25, 35, 0.75);

    color: #ffffff;

    cursor: pointer;
}


.remove-preview:hover {
    background: #dc3545;
}


.remove-preview svg {
    width: 14px;
    height: 14px;
}


/* =========================================================
   IMAGE NUMBER
========================================================= */

.preview-number {
    position: absolute;

    left: 6px;
    bottom: 6px;

    padding: 3px 7px;

    border-radius: 5px;

    background: rgba(20, 25, 35, 0.72);

    color: #ffffff;

    font-size: 11px;
}


/* =========================================================
   MODAL FOOTER
========================================================= */

.upload-images-modal .modal-footer {
    border-top: 1px solid #e7ebf2;

    padding: 15px 22px;
}


.upload-images-modal .modal-footer .btn {
    display: inline-flex;

    align-items: center;

    gap: 6px;

    border-radius: 7px;
}


.upload-images-modal .modal-footer svg {
    width: 15px;
    height: 15px;
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 767px) {

    .image-preview-grid {
        grid-template-columns:
            repeat(2, minmax(0, 1fr));
    }

}


@media (max-width: 480px) {

    .image-preview-grid {
        grid-template-columns:
            repeat(2, minmax(0, 1fr));
    }

    .image-preview-item {
        height: 110px;
    }

}
    </style>
<div
    class="modal fade"
    id="uploadImagesModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="uploadImagesModalLabel"
    aria-hidden="true"
>

    <div
        class="modal-dialog modal-lg modal-dialog-centered"
        role="document"
    >

        <div class="modal-content upload-images-modal">


            {{-- =================================================
                HEADER
            ================================================== --}}

            <div class="modal-header">

                <div class="upload-modal-title">

                    <div class="upload-modal-icon">

                        <i data-feather="image"></i>

                    </div>

                    <div>

                        <h5 id="uploadImagesModalLabel">
                            Upload Property Images
                        </h5>

                        <small>
                            Select multiple images for this property
                        </small>

                    </div>

                </div>


                <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                >

                    <span aria-hidden="true">
                        &times;
                    </span>

                </button>

            </div>


            {{-- =================================================
                FORM
            ================================================== --}}

            <form
                action="{{ route('properties.images.store', $property->id) }}"
                method="POST"
                enctype="multipart/form-data"
                id="propertyImagesForm"
            >

                @csrf


                <div class="modal-body">


                    {{-- =================================================
                        UPLOAD AREA
                    ================================================== --}}

                    <div
                        class="image-upload-area"
                        id="imageUploadArea"
                    >

                        <input
                            type="file"
                            name="images[]"
                            id="propertyImages"
                            accept="image/jpeg,image/png,image/jpg,image/webp"
                            multiple
                            hidden
                        >


                        <div class="upload-area-content">

                            <div class="upload-icon">

                                <i data-feather="upload-cloud"></i>

                            </div>


                            <h6>
                                Choose Property Images
                            </h6>


                            <p>
                                Click to browse or drag & drop images here
                            </p>


                            <span>
                                JPG, JPEG, PNG or WEBP
                            </span>


                            <button
                                type="button"
                                class="btn btn-outline-primary btn-sm mt-3"
                                id="chooseImagesBtn"
                            >

                                <i data-feather="folder"></i>

                                Choose Images

                            </button>

                        </div>

                    </div>


                    {{-- =================================================
                        SELECTED IMAGE COUNT
                    ================================================== --}}

                    <div
                        class="selected-image-info"
                        id="selectedImageInfo"
                        style="display:none;"
                    >

                        <span>

                            <i data-feather="image"></i>

                            <strong id="selectedImageCount">
                                0
                            </strong>

                            images selected

                        </span>

                    </div> 

                    <div
                        class="image-preview-grid"
                        id="imagePreviewGrid"
                    >
                    </div>


                </div> 
                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn btn-light"
                        data-dismiss="modal"
                    >

                        Cancel

                    </button>


                    <button
                        type="submit"
                        class="btn btn-primary"
                        id="uploadImagesBtn"
                        disabled
                    >

                        <i data-feather="upload"></i>

                        Upload Images

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>
{{-- =========================================================
    APPROVE PROPERTY MODAL
========================================================= --}}

<div
    class="modal fade"
    id="approvePropertyModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="approvePropertyModalLabel"
    aria-hidden="true"
>

    <div
        class="modal-dialog modal-dialog-centered"
        role="document"
    >

        <div class="modal-content">

            {{-- MODAL HEADER --}}
            <div class="modal-header">

                <h5
                    class="modal-title"
                    id="approvePropertyModalLabel"
                >

                    <i data-feather="check-circle"></i>

                    Approve Property

                </h5>

                <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                >

                    <span aria-hidden="true">
                        &times;
                    </span>

                </button>

            </div>


            {{-- MODAL BODY --}}
            <div class="modal-body text-center">

                <div class="mb-3">

                    <i
                        data-feather="check-circle"
                        style="
                            width: 50px;
                            height: 50px;
                            color: #28a745;
                        "
                    ></i>

                </div>

                <h5>
                    Approve Property?
                </h5>

                <p class="text-muted mb-0">

                    Are you sure you want to approve

                    <strong>
                        {{ $property->title }}
                    </strong>

                    ?

                </p>

            </div>


            {{-- MODAL FOOTER --}}
            <div class="modal-footer">

                <button
                    type="button"
                    class="btn btn-secondary"
                    data-dismiss="modal"
                >

                    Cancel

                </button>


                <form
                    action="{{ route('properties.approve', $property->id) }}"
                    method="POST"
                    class="d-inline"
                >

                    @csrf

                    @method('PUT')

                    <button
                        type="submit"
                        class="btn btn-success"
                    >

                        <i data-feather="check"></i>

                        Yes, Approve

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>
@can('property enquiry')
<div
    class="modal fade"
    id="buyerEnquiryModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="buyerEnquiryModalLabel"
    aria-hidden="true"
>
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">

        <div class="modal-content">

            {{-- HEADER --}}
            <div class="modal-header">

                <h5 class="modal-title" id="buyerEnquiryModalLabel">
                    <i data-feather="message-circle"></i>
                    Buyer Enquiry
                </h5>

                <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                >
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>

            {{-- FORM --}}
            <form
                action="{{ route('properties.enquiry.store', $property->id) }}"
                method="POST"
            >

                @csrf

                <div class="modal-body">

                    {{-- Property --}}
                    <div class="form-group">
                        <label>
                            Property
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            value="{{ $property->title }}"
                            readonly
                        >

                        <input
                            type="hidden"
                            name="property_id"
                            value="{{ $property->id }}"
                        >
                    </div>


                    {{-- Property Available --}}
                    <div class="form-group">
                        <label>
                            Property Available?
                            <span class="text-danger">*</span>
                        </label>

                        <div class="d-flex">

                            <div class="custom-control custom-radio mr-4">
                                <input
                                    type="radio"
                                    id="propertyAvailableYes"
                                    name="property_available"
                                    value="yes"
                                    class="custom-control-input"
                                    required
                                >

                                <label
                                    class="custom-control-label"
                                    for="propertyAvailableYes"
                                >
                                    Yes
                                </label>
                            </div>

                            <div class="custom-control custom-radio mr-4">
                                <input
                                    type="radio"
                                    id="propertyAvailableNo"
                                    name="property_available"
                                    value="no"
                                    class="custom-control-input"
                                >

                                <label
                                    class="custom-control-label"
                                    for="propertyAvailableNo"
                                >
                                    No
                                </label>
                            </div>

                            <div class="custom-control custom-radio">
                                <input
                                    type="radio"
                                    id="propertyAvailableMaybe"
                                    name="property_available"
                                    value="maybe"
                                    class="custom-control-input"
                                >

                                <label
                                    class="custom-control-label"
                                    for="propertyAvailableMaybe"
                                >
                                    Maybe
                                </label>
                            </div>

                        </div>
                    </div> 
                    <div class="form-group">
                        <label for="enquiryType">
                            Enquiry Type
                        </label>

                        <select
                            name="enquiry_type"
                            id="enquiryType"
                            class="form-control"
                        >
                            <option value="">Select Enquiry Type</option>
                            <option value="general">General Enquiry</option>
                            <option value="site_visit">Site Visit</option>
                            <option value="price">Price Discussion</option>
                            <option value="documentation">Documentation</option>
                            <option value="other">Other</option>
                        </select>
                    </div>


                    {{-- Note --}}
                    <div class="form-group">
                        <label for="enquiryNote">
                            Note
                            <span class="text-danger">*</span>
                        </label>

                        <textarea
                            name="note"
                            id="enquiryNote"
                            rows="4"
                            class="form-control"
                            placeholder="Enter buyer enquiry details..."
                            required
                        ></textarea>
                    </div>


                    {{-- Follow Up --}}
                    <div class="form-group mb-0">

                        <label>
                            Follow-up Required?
                        </label>

                        <div class="d-flex">

                            <div class="custom-control custom-radio mr-4">
                                <input
                                    type="radio"
                                    id="followupYes"
                                    name="follow_up_required"
                                    value="yes"
                                    class="custom-control-input"
                                    checked
                                >

                                <label
                                    class="custom-control-label"
                                    for="followupYes"
                                >
                                    Yes
                                </label>
                            </div>

                            <div class="custom-control custom-radio">
                                <input
                                    type="radio"
                                    id="followupNo"
                                    name="follow_up_required"
                                    value="no"
                                    class="custom-control-input"
                                >

                                <label
                                    class="custom-control-label"
                                    for="followupNo"
                                >
                                    No
                                </label>
                            </div>

                        </div>

                    </div>

                </div>


                {{-- FOOTER --}}
                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-dismiss="modal"
                    >
                        Cancel
                    </button>

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        <i data-feather="send"></i>
                        Submit Enquiry
                    </button>

                </div>

            </form>

        </div>
    </div>
</div>
@endcan
<div class="modal fade edit-images-modal" id="editImagesModal" tabindex="-1" role="dialog" aria-labelledby="editImagesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            {{-- HEADER --}}
            <div class="modal-header">
                <div class="edit-modal-title">
                    <div class="edit-modal-icon">
                        <i data-feather="edit-2"></i>
                    </div>
                    <div>
                        <h5 id="editImagesModalLabel">Edit Property Images</h5>
                        <small>Delete existing images or upload new ones</small>
                    </div>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('properties.images.update', $property->id) }}" method="POST" enctype="multipart/form-data" id="editImagesForm">
                @csrf
                @method('PUT')

                <div class="modal-body">
                    {{-- EXISTING IMAGES --}}
                    @if($property->images && $property->images->count() > 0)
                        <div class="existing-images-grid">
                            @foreach($property->images as $image)
                                <div class="existing-image-item">
                                    <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $image->title ?? $property->title }}">
                                    <span class="image-number-badge">#{{ $loop->iteration }}</span>
                                    <button type="button" class="delete-image-btn" onclick="deleteExistingImage('{{ $image->id }}', this)" title="Delete this image">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                        <input type="hidden" name="delete_images" id="deleteImagesInput" value="">
                    @else
                        <div class="text-center py-4" style="color: #8993a6;">
                            <i data-feather="image" style="width: 40px; height: 40px; display: block; margin: 0 auto 10px;"></i>
                            <p>No images available. Upload some below.</p>
                        </div>
                    @endif

                    {{-- DIVIDER --}}
                    <div class="edit-section-divider">
                        <span>Add New Images</span>
                    </div>

                    {{-- UPLOAD NEW IMAGES --}}
                    <div class="edit-upload-area" id="editUploadArea">
                        <input type="file" name="new_images[]" id="editImagesInput" accept="image/jpeg,image/png,image/jpg,image/webp" multiple hidden>
                        <div class="edit-upload-content">
                            <i data-feather="upload-cloud"></i>
                            <h6>Click to browse or drag & drop</h6>
                            <p>JPG, JPEG, PNG or WEBP</p>
                            <button type="button" class="btn btn-outline-warning btn-sm mt-2" id="editChooseImagesBtn">
                                <i data-feather="folder"></i> Choose Images
                            </button>
                        </div>
                    </div>

                    {{-- NEW IMAGES PREVIEW --}}
                    <div class="new-images-preview-grid" id="newImagesPreviewGrid"></div>
                </div>

                {{-- FOOTER --}}
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-warning" id="editImagesSubmitBtn">
                        <i data-feather="save"></i> Update Images
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('scripts')

<script>

document.addEventListener('DOMContentLoaded', function () {

    /*
    |--------------------------------------------------------------------------
    | Feather Icons
    |--------------------------------------------------------------------------
    */

    if (typeof feather !== 'undefined') {
        feather.replace();
    }


    const uploadArea =
        document.getElementById('imageUploadArea');

    const fileInput =
        document.getElementById('propertyImages');

    const chooseButton =
        document.getElementById('chooseImagesBtn');

    const previewGrid =
        document.getElementById('imagePreviewGrid');

    const selectedInfo =
        document.getElementById('selectedImageInfo');

    const selectedCount =
        document.getElementById('selectedImageCount');

    const uploadButton =
        document.getElementById('uploadImagesBtn');


    if (
        !uploadArea ||
        !fileInput ||
        !chooseButton
    ) {
        return;
    }


    /*
    |--------------------------------------------------------------------------
    | Selected Files
    |--------------------------------------------------------------------------
    */

    let selectedFiles = [];


    /*
    |--------------------------------------------------------------------------
    | Choose Images
    |--------------------------------------------------------------------------
    */

    chooseButton.addEventListener('click', function (event) {

        event.stopPropagation();

        fileInput.click();

    });


    uploadArea.addEventListener('click', function () {

        fileInput.click();

    });


    /*
    |--------------------------------------------------------------------------
    | File Selection
    |--------------------------------------------------------------------------
    */

    fileInput.addEventListener('change', function () {

        const files = Array.from(this.files);

        addFiles(files);

    });


    /*
    |--------------------------------------------------------------------------
    | Add Files
    |--------------------------------------------------------------------------
    */

    function addFiles(files) {

        files.forEach(function (file) {

            if (!file.type.startsWith('image/')) {
                return;
            }


            /*
            | Prevent duplicate file names
            */

            const exists = selectedFiles.some(function (item) {

                return (
                    item.name === file.name &&
                    item.size === file.size
                );

            });


            if (!exists) {

                selectedFiles.push(file);

            }

        });


        updatePreview();

    }


    /*
    |--------------------------------------------------------------------------
    | Preview
    |--------------------------------------------------------------------------
    */

    function updatePreview() {

        previewGrid.innerHTML = '';


        selectedFiles.forEach(function (file, index) {

            const reader =
                new FileReader();


            reader.onload = function (event) {

                const item =
                    document.createElement('div');

                item.className =
                    'image-preview-item';


                item.innerHTML = `

                    <img
                        src="${event.target.result}"
                        alt="Preview"
                    >

                    <span class="preview-number">
                        ${index + 1}
                    </span>

                    <button
                        type="button"
                        class="remove-preview"
                        data-index="${index}"
                    >

                        <i data-feather="x"></i>

                    </button>

                `;


                previewGrid.appendChild(item);


                if (typeof feather !== 'undefined') {
                    feather.replace();
                }

            };


            reader.readAsDataURL(file);

        });


        /*
        |--------------------------------------------------------------------------
        | Count
        |--------------------------------------------------------------------------
        */

        selectedCount.textContent =
            selectedFiles.length;


        if (selectedFiles.length > 0) {

            selectedInfo.style.display =
                'block';

            uploadButton.disabled =
                false;

        } else {

            selectedInfo.style.display =
                'none';

            uploadButton.disabled =
                true;

        }


        /*
        |--------------------------------------------------------------------------
        | Remove Image
        |--------------------------------------------------------------------------
        */

        document
            .querySelectorAll('.remove-preview')
            .forEach(function (button) {

                button.addEventListener(
                    'click',
                    function (event) {

                        event.preventDefault();

                        event.stopPropagation();


                        const index =
                            parseInt(
                                this.dataset.index
                            );


                        selectedFiles.splice(
                            index,
                            1
                        );


                        updateFileInput();

                        updatePreview();

                    }
                );

            });

    }


    /*
    |--------------------------------------------------------------------------
    | Update Input Files
    |--------------------------------------------------------------------------
    */

    function updateFileInput() {

        const dataTransfer =
            new DataTransfer();


        selectedFiles.forEach(function (file) {

            dataTransfer.items.add(file);

        });


        fileInput.files =
            dataTransfer.files;

    }


    /*
    |--------------------------------------------------------------------------
    | Drag & Drop
    |--------------------------------------------------------------------------
    */

    uploadArea.addEventListener(
        'dragover',
        function (event) {

            event.preventDefault();

            uploadArea.classList.add(
                'dragover'
            );

        }
    );


    uploadArea.addEventListener(
        'dragleave',
        function () {

            uploadArea.classList.remove(
                'dragover'
            );

        }
    );


    uploadArea.addEventListener(
        'drop',
        function (event) {

            event.preventDefault();

            uploadArea.classList.remove(
                'dragover'
            );


            const files =
                Array.from(
                    event.dataTransfer.files
                );


            addFiles(files);

            updateFileInput();

        }
    );


    /*
    |--------------------------------------------------------------------------
    | Update Input After Normal Selection
    |--------------------------------------------------------------------------
    */

    fileInput.addEventListener(
        'change',
        function () {

            updateFileInput();

        }
    );

});

</script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const editUploadArea = document.getElementById('editUploadArea');
    const editFileInput = document.getElementById('editImagesInput');
    const editChooseBtn = document.getElementById('editChooseImagesBtn');
    const editPreviewGrid = document.getElementById('newImagesPreviewGrid');
    const editSubmitBtn = document.getElementById('editImagesSubmitBtn');
    let newSelectedFiles = [];
    let deletedImageIds = [];

    if (editUploadArea && editFileInput && editChooseBtn) {
        // Open file picker
        editChooseBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            editFileInput.click();
        });

        editUploadArea.addEventListener('click', function() {
            editFileInput.click();
        });

        // Handle file selection
        editFileInput.addEventListener('change', function() {
            const files = Array.from(this.files);
            addNewFiles(files);
        });

        // Drag and drop
        editUploadArea.addEventListener('dragover', function(e) {
            e.preventDefault();
            this.classList.add('dragover');
        });

        editUploadArea.addEventListener('dragleave', function() {
            this.classList.remove('dragover');
        });

        editUploadArea.addEventListener('drop', function(e) {
            e.preventDefault();
            this.classList.remove('dragover');
            const files = Array.from(e.dataTransfer.files);
            addNewFiles(files);
        });

        // Add new files to preview
        function addNewFiles(files) {
            files.forEach(function(file) {
                if (!file.type.startsWith('image/')) return;
                const exists = newSelectedFiles.some(function(item) {
                    return item.name === file.name && item.size === file.size;
                });
                if (!exists) {
                    newSelectedFiles.push(file);
                }
            });
            updateNewPreview();
            updateEditFileInput();
        }

        // Update new images preview
        function updateNewPreview() {
            editPreviewGrid.innerHTML = '';

            newSelectedFiles.forEach(function(file, index) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const item = document.createElement('div');
                    item.className = 'new-preview-item';
                    item.innerHTML = `
                        <img src="${e.target.result}" alt="Preview ${index + 1}">
                        <button type="button" class="remove-new-preview" data-index="${index}">
                            <i data-feather="x"></i>
                        </button>
                    `;
                    editPreviewGrid.appendChild(item);
                    if (typeof feather !== 'undefined') feather.replace();
                };
                reader.readAsDataURL(file);
            });

            // Remove new image previews
            document.querySelectorAll('.remove-new-preview').forEach(function(btn) {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    const index = parseInt(this.dataset.index);
                    newSelectedFiles.splice(index, 1);
                    updateNewPreview();
                    updateEditFileInput();
                });
            });
        }

        // Update file input
        function updateEditFileInput() {
            const dataTransfer = new DataTransfer();
            newSelectedFiles.forEach(function(file) {
                dataTransfer.items.add(file);
            });
            editFileInput.files = dataTransfer.files;
        }
    }
    window.deleteExistingImage = function(imageId, buttonElement) {


        // Add to deleted list
        deletedImageIds.push(imageId);
        document.getElementById('deleteImagesInput').value = JSON.stringify(deletedImageIds);

        // Remove from UI
        const item = buttonElement.closest('.existing-image-item');
        item.style.borderColor = '#dc3545';
        item.style.opacity = '0.5';
        item.style.transform = 'scale(0.95)';
        setTimeout(function() {
            item.style.transition = 'all 0.3s ease';
            item.style.opacity = '0';
            item.style.transform = 'scale(0.8)';
            setTimeout(function() {
                item.remove();
                // Check if no images left
                const remaining = document.querySelectorAll('.existing-image-item');
                if (remaining.length === 0) {
                    const grid = document.querySelector('.existing-images-grid');
                    if (grid) {
                        grid.innerHTML = `
                            <div style="grid-column: 1 / -1; text-align: center; padding: 20px; color: #8993a6;">
                                <i data-feather="image" style="width: 40px; height: 40px; display: block; margin: 0 auto 10px;"></i>
                                <p>No images remaining. Upload new ones below.</p>
                            </div>
                        `;
                        if (typeof feather !== 'undefined') feather.replace();
                    }
                }
            }, 300);
        }, 100);
    };
    $('#editImagesModal').on('hidden.bs.modal', function() {
        // Reset new images
        newSelectedFiles = [];
        updateNewPreview();
        updateEditFileInput();
        // Reset deleted images
        deletedImageIds = [];
        document.getElementById('deleteImagesInput').value = '';
        // Reset submit button
        if (editSubmitBtn) {
            editSubmitBtn.disabled = false;
            editSubmitBtn.innerHTML = '<i data-feather="save"></i> Update Images';
            if (typeof feather !== 'undefined') feather.replace();
        }
    });
    if (typeof feather !== 'undefined') {
        feather.replace();
    }

    // Re-run after modal opens
    $('#editImagesModal').on('shown.bs.modal', function() {
        if (typeof feather !== 'undefined') {
            feather.replace();
        }
    });
});
</script>

@endpush
@else
    @php
        abort(403);
    @endphp
@endcan
