@extends('admin.layouts.app')

@section('content')
<style id="property-search-professional-final">
.property-search-page{
    --p-primary:#2563eb;
    --p-primary-dark:#1d4ed8;
    --p-primary-soft:#eff6ff;
    --p-dark:#0f172a;
    --p-text:#172033;
    --p-muted:#7b8798;
    --p-border:#e4e9f0;
    --p-bg:#f5f7fb;
    background:
        radial-gradient(circle at 5% 0%,rgba(37,99,235,.07),transparent 25%),
        linear-gradient(180deg,#f8fafc 0%,#f3f6fa 100%) !important;
    padding:24px 24px 48px !important;
    min-height:100vh;
}

.property-search-page *,
.property-search-page *::before,
.property-search-page *::after{box-sizing:border-box}

.property-search-page .property-page-header{
    max-width:1480px;
    margin:0 auto 20px !important;
     display:flex !important;
    align-items:flex-end !important;
    justify-content:space-between !important;
    gap:24px;
    border:0 !important;
    background:transparent !important;
}

.property-search-page .property-page-eyebrow{
    display:inline-flex !important;
    align-items:center;
    gap:7px;
    margin:0 0 8px !important;
    padding:5px 9px !important;
    background:#eaf2ff !important;
    border:1px solid #dbeafe !important;
    border-radius:6px !important;
    color:#2563eb !important;
    font-size:9px !important;
    font-weight:800 !important;
    letter-spacing:.11em;
    text-transform:uppercase;
}

.property-search-page .property-page-title h1{
    margin:0 !important;
    color:#0f172a !important;
    font-size:29px !important;
    line-height:1.15 !important;
    font-weight:800 !important;
    letter-spacing:-.035em;
}

.property-search-page .property-page-title p{
    margin:7px 0 0 !important;
    color:#8490a2 !important;
    font-size:12px !important;
}

.property-search-page .property-breadcrumb{
    display:flex !important;
    align-items:center !important;
    gap:8px !important;
    min-height:38px;
    padding:0 12px !important;
    background:#fff !important;
    border:1px solid var(--p-border) !important;
    border-radius:9px !important;
    box-shadow:0 5px 18px rgba(15,23,42,.035) !important;
    font-size:10px !important;
}

.property-search-page .property-breadcrumb a{
    color:#64748b !important;
    text-decoration:none !important;
}

.property-search-page .property-breadcrumb a:hover{color:#2563eb !important}
.property-search-page .property-breadcrumb .active{
    color:#2563eb !important;
    font-weight:700 !important;
}

.property-search-page .section-body{
    max-width:1480px;
    margin:0 auto !important;
    padding:0 !important;
}

.property-search-page .property-search-card{
    overflow:hidden !important;
    margin:0 !important;
    background:#fff !important;
    border:1px solid #e3e8ef !important;
    border-radius:18px !important;
    box-shadow:0 18px 55px rgba(15,23,42,.07),0 3px 12px rgba(15,23,42,.025) !important;
}

.property-search-page .property-search-card .card-body{padding:0 !important}

/* Premium header */
.property-search-page .property-search-header{
    position:relative !important;
    overflow:hidden;
    display:flex !important;
    align-items:center !important;
    justify-content:space-between !important;
    gap:25px;
    min-height:106px;
    padding:24px 28px !important;
    background:linear-gradient(115deg,#0f172a 0%,#172554 62%,#1d4ed8 100%) !important;
    border:0 !important;
}

.property-search-page .property-search-header::before{
    content:"";
    position:absolute;
    width:300px;height:300px;
    top:-190px;right:4%;
    border-radius:50%;
    background:rgba(255,255,255,.055);
}

.property-search-page .property-search-header-content{
    position:relative;
    z-index:1;
    display:flex !important;
    align-items:center !important;
    gap:14px !important;
}

.property-search-page .property-search-icon{
    display:flex !important;
    align-items:center !important;
    justify-content:center !important;
    width:50px !important;
    height:50px !important;
    flex:0 0 50px !important;
    background:rgba(255,255,255,.11) !important;
    border:1px solid rgba(255,255,255,.16) !important;
    border-radius:13px !important;
    color:#fff !important;
}

.property-search-page .property-search-label{
    margin:0 0 4px !important;
    color:#93c5fd !important;
    font-size:9px !important;
    font-weight:800 !important;
    letter-spacing:.14em !important;
}

.property-search-page .property-search-header h4{
    margin:0 !important;
    color:#fff !important;
    font-size:19px !important;
    font-weight:800 !important;
}

.property-search-page .property-search-header p{
    margin:5px 0 0 !important;
    color:rgba(255,255,255,.68) !important;
    font-size:10px !important;
}

.property-search-page .property-clear-btn{
    position:relative;
    z-index:2;
    display:inline-flex !important;
    align-items:center !important;
    justify-content:center !important;
    gap:7px !important;
    min-height:38px !important;
    padding:0 14px !important;
    background:rgba(255,255,255,.1) !important;
    border:1px solid rgba(255,255,255,.22) !important;
    border-radius:8px !important;
    color:#fff !important;
    font-size:10px !important;
    font-weight:700 !important;
}

.property-search-page .property-clear-btn:hover{
    background:#fff !important;
    color:#1d4ed8 !important;
}

/* Body */
.property-search-page .property-search-body{
    padding:27px 28px 30px !important;
    background:#fff !important;
}

.property-search-page .filter-section{
    margin:0 !important;
    padding:0 !important;
    background:transparent !important;
    border:0 !important;
}

.property-search-page .filter-section-heading{
    display:flex !important;
    align-items:center !important;
    justify-content:space-between !important;
    gap:15px;
    margin:0 0 17px !important;
}

.property-search-page .filter-section-heading-left{
    display:flex !important;
    align-items:center !important;
    gap:10px !important;
}

.property-search-page .filter-section-icon{
    display:flex !important;
    align-items:center !important;
    justify-content:center !important;
    width:34px !important;
    height:34px !important;
    flex:0 0 34px !important;
    background:#eff6ff !important;
    border:1px solid #dbeafe !important;
    border-radius:9px !important;
    color:#2563eb !important;
}

.property-search-page .filter-section-heading h5{
    margin:0 0 2px !important;
    color:#334155 !important;
    font-size:12px !important;
    font-weight:800 !important;
}

.property-search-page .filter-section-heading p{
    margin:0 !important;
    color:#98a3b2 !important;
    font-size:9px !important;
}

.property-search-page .property-filter-grid{
    margin-left:-8px !important;
    margin-right:-8px !important;
    row-gap:17px !important;
}

.property-search-page .property-filter-grid>[class*="col-"]{
    padding-left:8px !important;
    padding-right:8px !important;
}

.property-search-page .property-filter-field label{
    display:block !important;
    margin:0 0 7px !important;
    color:#475569 !important;
    font-size:10px !important;
    font-weight:750 !important;
}

.property-search-page .property-input-wrapper{position:relative !important}

.property-search-page .property-input-icon{
    position:absolute !important;
    top:50% !important;
    left:12px !important;
    z-index:5 !important;
    display:flex !important;
    color:#94a3b8 !important;
    transform:translateY(-50%) !important;
    pointer-events:none !important;
}

.property-search-page .property-filter-field input,
.property-search-page .property-filter-field select,
.property-search-page .property-filter-field .form-control{
    width:100% !important;
    height:43px !important;
    min-height:43px !important;
    padding:0 12px !important;
    background:#fff !important;
    border:1px solid #dfe5ec !important;
    border-radius:9px !important;
    color:#334155 !important;
    font-size:10.5px !important;
    font-weight:500 !important;
    box-shadow:none !important;
}

.property-search-page .property-input-wrapper select{
    padding-left:36px !important;
    padding-right:30px !important;
}

.property-search-page .property-filter-field input:focus,
.property-search-page .property-filter-field select:focus{
    border-color:#60a5fa !important;
    box-shadow:0 0 0 3px rgba(37,99,235,.08) !important;
    outline:0 !important;
}

/* Dynamic category panels */
.property-search-page .category-filter-section{
    position:relative !important;
    margin:25px 0 0 !important;
    padding:20px !important;
    background:linear-gradient(135deg,#fbfdff 0%,#f7faff 100%) !important;
    border:1px solid #dfe8f3 !important;
    border-radius:12px !important;
}

.property-search-page .category-filter-header{
    display:flex !important;
    align-items:center !important;
    justify-content:space-between !important;
    gap:15px;
    margin:0 0 19px !important;
    padding:0 0 14px !important;
    border-bottom:1px solid #e8eef5 !important;
}

.property-search-page .category-filter-header-left{
    display:flex !important;
    align-items:center !important;
    gap:10px !important;
}

.property-search-page .category-filter-icon{
    display:flex !important;
    align-items:center !important;
    justify-content:center !important;
    width:36px !important;
    height:36px !important;
    flex:0 0 36px !important;
    background:#eaf2ff !important;
    border:1px solid #d7e7ff !important;
    border-radius:9px !important;
    color:#2563eb !important;
}

.property-search-page .category-filter-header h5{
    margin:0 0 3px !important;
    color:#27364a !important;
    font-size:13px !important;
    font-weight:800 !important;
}

.property-search-page .category-filter-header p{
    margin:0 !important;
    color:#98a3b2 !important;
    font-size:9px !important;
}

.property-search-page .category-filter-badge{
    display:inline-flex !important;
    align-items:center !important;
    min-height:26px !important;
    padding:0 10px !important;
    background:#eff6ff !important;
    border:1px solid #dbeafe !important;
    border-radius:20px !important;
    color:#2563eb !important;
    font-size:9px !important;
    font-weight:800 !important;
}

/* Amenities — keep both old/new class names working */
.property-search-page #amenitiesList,
.property-search-page #amenitiesContainer{
    display:flex !important;
    flex-wrap:wrap !important;
    gap:8px !important;
}

.property-search-page .amenity-checkbox,
.property-search-page .amenity-item{
    display:inline-flex !important;
    align-items:center !important;
    gap:7px !important;
    min-height:35px !important;
    margin:0 !important;
    padding:0 11px !important;
    background:#fff !important;
    border:1px solid #e1e7ef !important;
    border-radius:8px !important;
    color:#5f6d80 !important;
    font-size:10px !important;
    font-weight:650 !important;
    cursor:pointer !important;
}

.property-search-page .amenity-checkbox:hover,
.property-search-page .amenity-item:hover{
    background:#eff6ff !important;
    border-color:#bfdbfe !important;
    color:#2563eb !important;
}

.property-search-page .amenity-checkbox input,
.property-search-page .amenity-item input{
    width:14px !important;
    height:14px !important;
    margin:0 !important;
    accent-color:#2563eb !important;
}

/* Results */
.property-search-page .property-results-section{
    margin-top:31px !important;
    padding-top:27px !important;
    border-top:1px solid #e9eef4 !important;
}

.property-search-page .property-listing,
.property-search-page #propertyListing{
    row-gap:19px !important;
}

.property-search-page .property-card{
    overflow:hidden !important;
    height:100% !important;
    background:#fff !important;
    border:1px solid #e4e9f0 !important;
    border-radius:13px !important;
    box-shadow:0 7px 25px rgba(15,23,42,.05) !important;
    transition:.22s ease !important;
}

.property-search-page .property-card:hover{
    transform:translateY(-4px) !important;
    box-shadow:0 16px 35px rgba(15,23,42,.10) !important;
}

.property-search-page .property-card-image,
.property-search-page .property-image-wrapper{
    position:relative !important;
    overflow:hidden !important;
    height:205px !important;
    background:#eef2f7 !important;
}

.property-search-page .property-card-image img,
.property-search-page .property-image-wrapper img,
.property-search-page .property-image{
    width:100% !important;
    height:100% !important;
    object-fit:cover !important;
    display:block !important;
}

.property-search-page .property-card-body{
    padding:16px !important;
}

.property-search-page .property-category{
    color:#2563eb !important;
    font-size:9px !important;
    font-weight:800 !important;
}

.property-search-page .property-title{
    margin:7px 0 !important;
    color:#172033 !important;
    font-size:14px !important;
    font-weight:800 !important;
    line-height:1.4 !important;
}

.property-search-page .property-location{
    color:#8490a2 !important;
    font-size:9px !important;
}

.property-search-page .property-price{
    margin-top:12px !important;
    color:#172033 !important;
    font-size:17px !important;
    font-weight:850 !important;
}

.property-search-page .property-meta{
    display:flex !important;
    flex-wrap:wrap !important;
    gap:7px !important;
    margin-top:12px !important;
}

.property-search-page .property-meta span{
    padding:5px 8px !important;
    border-radius:5px !important;
    background:#f5f7fa !important;
    color:#626978 !important;
    font-size:9px !important;
}

/* Loading / empty */
.property-search-page .property-loading{
    display:flex;
    align-items:center;
    justify-content:center;
    gap:9px;
    padding:35px;
    color:#7b8798;
    font-size:10px;
}

.property-search-page .no-properties{
    padding:45px 20px !important;
    text-align:center !important;
    background:#fafcff !important;
    border:1px dashed #dce4ed !important;
    border-radius:12px !important;
}

.property-search-page .no-property-icon{
    display:flex !important;
    align-items:center !important;
    justify-content:center !important;
    width:50px !important;
    height:50px !important;
    margin:0 auto 12px !important;
    background:#eff6ff !important;
    border:1px solid #dbeafe !important;
    border-radius:50% !important;
    color:#2563eb !important;
}

.property-search-page .no-properties h3{
    margin:0 0 6px !important;
    color:#334155 !important;
    font-size:14px !important;
    font-weight:800 !important;
}

.property-search-page .no-properties p{
    margin:0 !important;
    color:#94a3b8 !important;
    font-size:10px !important;
}

.property-search-page .clear-filter-btn{
    display:inline-flex !important;
    align-items:center !important;
    gap:7px !important;
    margin-top:15px !important;
    padding:9px 13px !important;
    background:#2563eb !important;
    border:0 !important;
    border-radius:7px !important;
    color:#fff !important;
    font-size:9px !important;
    font-weight:700 !important;
}

/* Pagination */
.property-search-page .property-pagination{
    margin-top:22px !important;
}

.property-search-page .property-pagination button,
.property-search-page .property-pagination a{
    display:inline-flex !important;
    align-items:center !important;
    justify-content:center !important;
    min-width:34px !important;
    height:34px !important;
    margin:0 3px !important;
    padding:0 9px !important;
    background:#fff !important;
    border:1px solid #e1e7ef !important;
    border-radius:7px !important;
    color:#64748b !important;
    font-size:9px !important;
}

.property-search-page .property-pagination .active,
.property-search-page .property-pagination button:hover,
.property-search-page .property-pagination a:hover{
    background:#2563eb !important;
    border-color:#2563eb !important;
    color:#fff !important;
}

/* Responsive */
@media(max-width:991px){
    .property-search-page .property-page-header{
        align-items:flex-start !important;
        flex-direction:column !important;
    }
    .property-search-page .property-breadcrumb{width:100%}
}

@media(max-width:767px){
    .property-search-page{
        padding:16px 12px 35px !important;
    }
    .property-search-page .property-page-title h1{
        font-size:23px !important;
    }
    .property-search-page .property-search-header{
        align-items:flex-start !important;
        flex-direction:column !important;
        padding:20px !important;
    }
    .property-search-page .property-clear-btn{
        width:100% !important;
    }
    .property-search-page .property-search-body{
        padding:20px 16px 22px !important;
    }
    .property-search-page .category-filter-header{
        align-items:flex-start !important;
        flex-direction:column !important;
    }
}

@media(max-width:575px){
    .property-search-page .property-card-image,
    .property-search-page .property-image-wrapper{
        height:190px !important;
    }
}
</style>



<style id="category-wise-filter-final">
.category-wise-filters {
    margin-top: 24px;
}

.category-wise-panel {
    animation: categoryFilterIn .22s ease;
}

@keyframes categoryFilterIn {
    from {
        opacity: 0;
        transform: translateY(5px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.category-wise-panel .property-filter-field {
    height: 100%;
}

.category-wise-panel .property-filter-field label {
    min-height: 15px;
}

.category-wise-panel .property-filter-field select:disabled,
.category-wise-panel .property-filter-field input:disabled {
    cursor: not-allowed;
}

@media (max-width: 767px) {
    .category-wise-filters {
        margin-top: 18px;
    }
}
</style>


<style id="category-data-filter-style">
.category-wise-filters,
#additionalCategoryFilters{
    margin-top:24px;
}

.category-wise-panel{
    animation:categoryFilterIn .22s ease;
}

@keyframes categoryFilterIn{
    from{opacity:0;transform:translateY(5px)}
    to{opacity:1;transform:translateY(0)}
}

.category-wise-panel .property-filter-field{
    height:100%;
}

.category-wise-panel .property-filter-field input,
.category-wise-panel .property-filter-field select{
    width:100%;
}
</style>
<style>
.property-search-page {
    width: 100%;
    min-height: 100vh;
    padding: 28px;
    background:
        radial-gradient(circle at 85% 10%, rgba(99, 82, 230, .08), transparent 28%),
        #f7f8fc;
    font-family: "Inter", "Poppins", sans-serif;
    color: #121936;
}
.property-page-header {
    position: relative;
    overflow: hidden;

    display: flex;
    align-items: center;
    justify-content: space-between;

    min-height: 220px;
    padding: 25px 28px;
    margin-bottom: 24px;

    border: 1px solid #ececf7;
    border-radius: 22px;

    background:
        linear-gradient(100deg, #ffffff 0%, #ffffff 55%, #f3f2ff 100%);

    box-shadow: 0 12px 40px rgba(36, 39, 85, .06);
}

.property-page-header::after {
    content: "";
    position: absolute;
    right: 0;
    bottom: -50px;

    width: 55%;
    height: 230px;

    background:
        linear-gradient(
            180deg,
            rgba(111, 91, 235, .02),
            rgba(111, 91, 235, .13)
        );

    clip-path: polygon(
        0 100%,
        5% 70%,
        10% 80%,
        16% 45%,
        22% 65%,
        28% 30%,
        34% 60%,
        40% 20%,
        46% 50%,
        53% 12%,
        59% 45%,
        66% 25%,
        73% 55%,
        80% 32%,
        87% 60%,
        94% 40%,
        100% 55%,
        100% 100%
    );

    pointer-events: none;
}

.property-header-left {
    position: relative;
    z-index: 2;
    width: 100%;
}

.property-breadcrumb {
    display: flex;
    align-items: center;
    gap: 12px;

    margin-bottom: 30px;

    font-size: 13px;
    color: #737b98;
}

.property-breadcrumb a {
    color: #66708e;
    text-decoration: none;
}

.property-breadcrumb a:hover {
    color: #4d46d9;
}

.property-breadcrumb i {
    color: #4d46d9;
}
.property-heading-content {
    display: flex;
    align-items: center;
    gap: 28px;
}

.property-heading-icon {
    width: 125px;
    height: 125px;

    display: flex;
    align-items: center;
    justify-content: center;

    flex-shrink: 0;

    border-radius: 27px;

    background:
        linear-gradient(
            145deg,
            #6255e8,
            #3026b9
        );

    color: #fff;

    font-size: 52px;

    box-shadow:
        0 18px 35px rgba(74, 65, 218, .25);
}

.property-header-small {
    display: block;

    margin-bottom: 8px;

    color: #5045e8;

    font-size: 14px;
    font-weight: 800;

    letter-spacing: .5px;
}

.property-heading-content h1 {
    margin: 0;

    color: #111936;

    font-size: 48px;
    line-height: 1.1;

    font-weight: 800;
}

.property-heading-content p {
    margin: 12px 0 0;

    color: #68718f;

    font-size: 17px;
}
.property-header-right {
    position: relative;
    z-index: 3;

    min-width: 315px;
}

.property-header-badge {
    display: flex;
    align-items: center;
    gap: 16px;

    padding: 20px 24px;

    border: 1px solid #ededf6;
    border-radius: 15px;

    background: rgba(255,255,255,.96);

    color: #18203d;

    font-size: 14px;
    font-weight: 700;

    box-shadow:
        0 10px 30px rgba(39, 42, 92, .08);
}

.property-header-badge::before {
    content: "\F3F5";

    width: 46px;
    height: 46px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 12px;

    background: #eeecff;

    color: #4f45df;

    font-family: "bootstrap-icons";
    font-size: 23px;
}

.badge-text {
    display: flex;
    flex-direction: column;
    gap: 4px;
}

.badge-title {
    font-size: 15px;
    font-weight: 800;
}

.badge-subtitle {
    color: #7b829d;
    font-size: 12px;
    font-weight: 500;
}

.badge-live {
    margin-left: auto;
    color: #22a76a;
    font-size: 12px;
    font-weight: 700;
}

.badge-dot {
    width: 7px;
    height: 7px;

    display: inline-block;

    margin-right: 4px;

    border-radius: 50%;

    background: #25b574;
}
.property-search-card {
    overflow: hidden;

    background: #fff;

    border: 1px solid #e8e9f3;
    border-radius: 22px;

    box-shadow:
        0 15px 45px rgba(31, 34, 79, .07);
}

.search-card-header {
    padding: 28px 32px 23px;

    border-bottom: 1px solid #e9eaf2;
}

.search-card-title {
    display: flex;
    align-items: center;
    gap: 18px;
}

.search-card-icon {
    width: 54px;
    height: 54px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 15px;

    background: #eeedff;

    color: #5146df;

    font-size: 23px;
}

.search-card-title h2 {
    margin: 0;

    color: #151d3a;

    font-size: 21px;
    font-weight: 800;
}

.search-card-title p {
    margin: 5px 0 0;

    color: #737b98;

    font-size: 13px;
}

/* Purple line under header */

.search-card-header::after {
    content: "";

    display: block;

    width: 140px;
    height: 3px;

    margin-top: 23px;

    border-radius: 10px;

    background: #5045e5;
}

.search-card-body {
    padding: 30px 32px 28px;
}
.filter-main-label,
.filter-group > label {
    display: block;

    margin-bottom: 10px;

    color: #151d3a;

    font-size: 13px;
    font-weight: 800;

    text-transform: uppercase;
    letter-spacing: .3px;
}

.required-star {
    color: #ef4444;
}

.purpose-tabs {
    display: grid;
    grid-template-columns: repeat(2, 1fr);

    gap: 18px;

    width: 100%;
}

.purpose-tab {
    position: relative;

    margin: 0;

    cursor: pointer;
}

.purpose-tab input {
    position: absolute;
    opacity: 0;
}

.purpose-tab span {
    min-height: 82px;

    display: flex;
    align-items: center;

    gap: 16px;

    padding: 15px 22px;

    border: 1px solid #e2e4ee;
    border-radius: 13px;

    background: #fff;

    color: #17203d;

    transition: all .2s ease;
}

.purpose-tab span::after {
    content: "";

    width: 23px;
    height: 23px;

    margin-left: auto;

    border: 2px solid #d4d7e4;
    border-radius: 50%;

    transition: all .2s ease;
}

.purpose-tab span i {
    width: 42px;
    height: 42px;

    display: flex;
    align-items: center;
    justify-content: center;

    flex-shrink: 0;

    border-radius: 11px;

    background: #f0efff;

    color: #5146df;

    font-size: 20px;
}

.purpose-tab span strong {
    display: block;

    font-size: 16px;
    font-weight: 800;
}

.purpose-tab span small {
    display: block;

    margin-top: 4px;

    color: #747c99;

    font-size: 12px;
}

.purpose-tab:hover span {
    border-color: #a9a4f8;
}

.purpose-tab input:checked + span {
    border-color: #564ae8;

    background:
        linear-gradient(
            100deg,
            #f6f5ff,
            #ffffff
        );

    box-shadow:
        0 5px 18px rgba(80, 69, 229, .08);
}

.purpose-tab input:checked + span::after {
    border: 6px solid #564ae8;
    box-shadow: 0 0 0 1px #564ae8;
}

.filter-group {
    width: 100%;
}

.filter-row-title {
    margin: 28px 0 14px;

    color: #151d3a;

    font-size: 13px;
    font-weight: 800;

    text-transform: uppercase;
    letter-spacing: .3px;
}

.select-wrapper {
    position: relative;
}

.select-left-icon {
    position: absolute;

    left: 17px;
    top: 50%;

    z-index: 3;

    transform: translateY(-50%);

    color: #70799a;

    font-size: 17px;

    pointer-events: none;
}

.filter-control {
    width: 100%;
    height: 62px;

    padding: 14px 28px 14px 49px !important;

    border: 1px solid #e1e4ee !important;
    border-radius: 11px !important;

    background: #fff !important;

    color: #17203d !important;

    font-size: 13px !important;
    font-weight: 600;

    box-shadow: none !important;

    transition: all .2s ease;
}

.filter-control:hover {
    border-color: #b9bdf0 !important;
}

.filter-control:focus {
    border-color: #5a4ee8 !important;

    box-shadow:
        0 0 0 4px rgba(86, 74, 232, .08) !important;
}

.select-wrapper::after {
    content: "";

    position: absolute;

    left: 49px;
    right: 45px;
    top: 25px;

    height: 1px;

    background: transparent;

    pointer-events: none;
}

.select-arrow {
    position: absolute;

    right: 17px;
    top: 50%;

    z-index: 3;

    transform: translateY(-50%);

    color: #68718d;

    font-size: 12px;

    pointer-events: none;
}

.filter-group > label {
    margin-bottom: 9px;
}

.amenities-box {
    width: 100%;
    min-height: 62px;

    display: flex;
    align-items: center;
    flex-wrap: wrap;

    gap: 8px;

    padding: 10px 14px;

    border: 1px solid #e1e4ee;
    border-radius: 11px;

    background: #fff;

    transition: border-color .2s ease;
}

.amenities-box:focus-within {
    border-color: #5a4ee8;
    box-shadow: 0 0 0 4px rgba(86, 74, 232, .08);
}

.amenity-checkbox {
    margin: 0;
    cursor: pointer;
}

.amenity-checkbox input {
    display: none;
}

.amenity-checkbox span {
    min-height: 34px;

    display: inline-flex;
    align-items: center;

    padding: 7px 13px;

    border: 1px solid #e0e2ec;
    border-radius: 30px;

    background: #fafaff;

    color: #68718e;

    font-size: 11px;
    font-weight: 600;

    transition: all .2s ease;
}

.amenity-checkbox input:checked + span {
    border-color: #564ae8;

    background: #564ae8;

    color: #fff;
}

.amenity-checkbox input:checked + span::before {
    content: "\F26A";

    margin-right: 5px;

    font-family: "bootstrap-icons";
}

.amenity-loading {
    display: flex;
    align-items: center;
    gap: 9px;

    color: #8a91a9;

    font-size: 12px;
}

.mini-loader {
    width: 15px;
    height: 15px;

    border: 2px solid #e4e5ee;
    border-top-color: #564ae8;

    border-radius: 50%;

    animation: miniLoader .7s linear infinite;
}

@keyframes miniLoader {
    to {
        transform: rotate(360deg);
    }
}

.empty-amenities {
    color: #9298ad;
    font-size: 12px;
}

.search-actions {
    display: flex;
    align-items: center;
    justify-content: space-between;

    gap: 15px;

    margin-top: 28px;
    padding-top: 24px;

    border-top: 1px solid #eceef5;
}

.clear-filter-btn,
.search-property-btn {
    min-height: 52px;

    display: inline-flex;
    align-items: center;
    justify-content: center;

    gap: 9px;

    padding: 0 22px;

    border-radius: 11px;

    font-size: 13px;
    font-weight: 700;

    cursor: pointer;

    transition: all .2s ease;
}

.clear-filter-btn {
    border: 1px solid #e0e3ed;

    background: #fff;

    color: #4f5876;
}

.clear-filter-btn:hover {
    border-color: #c9cce0;

    background: #f8f8fc;

    color: #242b49;
}

.search-property-btn {
    min-width: 230px;

    border: 0;

    background:
        linear-gradient(
            135deg,
            #6558ed,
            #4235cf
        );

    color: #fff;

    box-shadow:
        0 10px 22px rgba(80, 69, 229, .25);
}

.search-property-btn:hover {
    transform: translateY(-2px);

    box-shadow:
        0 14px 28px rgba(80, 69, 229, .32);
}

.search-property-btn i {
    font-size: 17px;
}
.property-result-section {
    margin-top: 35px;
}

.property-result-header {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;

    margin-bottom: 20px;
}

.result-small-label {
    display: block;

    margin-bottom: 5px;

    color: #564ae8;

    font-size: 11px;
    font-weight: 800;

    letter-spacing: 1px;
}

.property-result-header h2 {
    margin: 0;

    color: #151d3a;

    font-size: 25px;
    font-weight: 800;
}

.property-result-header p {
    margin: 5px 0 0;

    color: #7c849e;

    font-size: 12px;
}

.result-status {
    display: flex;
    align-items: center;
    gap: 8px;

    padding: 10px 16px;

    border: 1px solid #e5e7f0;
    border-radius: 30px;

    background: #fff;

    color: #68718c;

    font-size: 11px;
    font-weight: 700;
}

.result-status-dot {
    width: 7px;
    height: 7px;

    border-radius: 50%;

    background: #26af72;
}
.property-card {
    height: 100%;

    overflow: hidden;

    background: #fff;

    border: 1px solid #e7e8f0;
    border-radius: 17px;

    box-shadow:
        0 8px 25px rgba(36, 39, 82, .055);

    transition: all .25s ease;
}

.property-card:hover {
    transform: translateY(-5px);

    border-color: #d3d0fa;

    box-shadow:
        0 18px 35px rgba(36, 39, 82, .12);
}

.property-card-image {
    position: relative;

    height: 230px;

    overflow: hidden;

    background: #eff0f5;
}

.property-card-image img {
    width: 100%;
    height: 100%;

    object-fit: cover;

    transition: transform .4s ease;
}

.property-card:hover .property-card-image img {
    transform: scale(1.05);
}

.property-card-overlay {
    position: absolute;
    inset: 0;

    background:
        linear-gradient(
            to bottom,
            rgba(20, 23, 50, .08),
            transparent 45%,
            rgba(20, 23, 50, .25)
        );
}

.property-purpose-badge {
    position: absolute;

    top: 15px;
    left: 15px;

    padding: 7px 12px;

    border-radius: 20px;

    background: #fff;

    color: #4238c9;

    font-size: 10px;
    font-weight: 800;

    box-shadow: 0 5px 15px rgba(0,0,0,.12);
}

.property-favorite {
    position: absolute;

    top: 13px;
    right: 13px;

    width: 38px;
    height: 38px;

    display: flex;
    align-items: center;
    justify-content: center;

    border: 0;
    border-radius: 50%;

    background: rgba(255,255,255,.95);

    color: #59617d;

    cursor: pointer;

    box-shadow: 0 5px 14px rgba(0,0,0,.12);
}

.property-favorite:hover {
    color: #ef476f;
}
.property-card-content {
    padding: 19px;
}

.property-card-top {
    display: flex;
    align-items: center;
    justify-content: space-between;

    gap: 10px;

    margin-bottom: 8px;
}

.property-category {
    padding: 6px 9px;

    border-radius: 6px;

    background: #f0efff;

    color: #5549df;

    font-size: 9px;
    font-weight: 800;
}

.property-approved {
    display: inline-flex;
    align-items: center;
    gap: 4px;

    color: #209c65;

    font-size: 10px;
    font-weight: 700;
}

.property-title {
    margin: 0 0 9px;

    color: #1b2341;

    font-size: 18px;
    line-height: 1.35;

    font-weight: 800;

    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;

    overflow: hidden;
}

.property-location {
    display: flex;
    align-items: flex-start;

    gap: 7px;

    margin-bottom: 14px;

    color: #7b839c;

    font-size: 11px;
}

.property-location i {
    color: #5c50df;
}

.property-price {
    display: flex;
    align-items: baseline;

    gap: 5px;

    margin-bottom: 15px;

    color: #202846;
}

.property-price strong {
    font-size: 21px;
    font-weight: 800;
}

.property-price span {
    color: #858da6;
    font-size: 11px;
}

.property-amenities {
    display: flex;
    flex-wrap: wrap;

    gap: 6px;

    margin-bottom: 16px;
}

.property-amenities span {
    display: inline-flex;
    align-items: center;

    gap: 4px;

    padding: 6px 8px;

    border-radius: 6px;

    background: #f7f7fb;

    color: #68718c;

    font-size: 9px;
    font-weight: 600;
}

.property-card-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;

    padding-top: 14px;

    border-top: 1px solid #eceef4;
}

.property-code {
    display: flex;
    flex-direction: column;
    gap: 2px;
}

.property-code span {
    color: #9aa1b5;

    font-size: 8px;
    text-transform: uppercase;
    letter-spacing: .5px;
}

.property-code strong {
    color: #59627d;

    font-size: 10px;
}

.view-property-btn {
    display: inline-flex;
    align-items: center;

    gap: 5px;

    color: #4d42d5;

    font-size: 11px;
    font-weight: 800;

    text-decoration: none;
}

.view-property-btn:hover {
    color: #3026b9;
}

.view-property-btn i {
    transition: transform .2s ease;
}

.view-property-btn:hover i {
    transform: translateX(4px);
}
.property-loading,
.no-properties,
.ajax-error {
    min-height: 250px;

    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;

    padding: 50px 20px;

    border: 1px solid #e7e8f0;
    border-radius: 17px;

    background: #fff;
}

.property-loader {
    width: 36px;
    height: 36px;

    border: 3px solid #e5e6ef;
    border-top-color: #564ae8;

    border-radius: 50%;

    animation: propertyLoader .7s linear infinite;
}

@keyframes propertyLoader {
    to {
        transform: rotate(360deg);
    }
}

.property-loading p,
.no-properties p,
.ajax-error p {
    color: #8088a1;
    font-size: 12px;
}

.no-property-icon,
.ajax-error-icon {
    width: 62px;
    height: 62px;

    display: flex;
    align-items: center;
    justify-content: center;

    margin-bottom: 15px;

    border-radius: 50%;

    background: #f0efff;

    color: #564ae8;

    font-size: 25px;
}

.no-properties h3,
.ajax-error h3 {
    margin: 0 0 5px;

    color: #252d4b;

    font-size: 18px;
}

.property-pagination {
    display: flex;
    align-items: center;
    justify-content: center;

    gap: 7px;

    margin-top: 25px;
}

.pagination-btn {
    width: 40px;
    height: 40px;

    display: inline-flex;
    align-items: center;
    justify-content: center;

    border: 1px solid #e0e2eb;
    border-radius: 8px;

    background: #fff;

    color: #626b86;

    font-size: 11px;
    font-weight: 700;

    cursor: pointer;

    transition: all .2s ease;
}

.pagination-btn:hover {
    border-color: #aaa5f4;
    color: #4d42d5;
}

.pagination-btn.active {
    border-color: #564ae8;

    background: #564ae8;

    color: #fff;
}

@media (max-width: 1100px) {

    .property-page-header {
        min-height: 190px;
    }

    .property-heading-icon {
        width: 90px;
        height: 90px;

        font-size: 38px;
    }

    .property-heading-content h1 {
        font-size: 38px;
    }

    .property-header-right {
        min-width: 260px;
    }
}

@media (max-width: 991px) {

    .property-search-page {
        padding: 20px;
    }

    .property-page-header {
        align-items: flex-start;
    }

    .property-header-right {
        display: none;
    }

    .property-heading-content h1 {
        font-size: 34px;
    }

    .purpose-tabs {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 767px) {

    .property-search-page {
        padding: 12px;
    }

    .property-page-header {
        padding: 20px;

        min-height: auto;
    }

    .property-breadcrumb {
        margin-bottom: 20px;
    }

    .property-heading-content {
        gap: 15px;
    }

    .property-heading-icon {
        width: 65px;
        height: 65px;

        border-radius: 17px;

        font-size: 28px;
    }

    .property-heading-content h1 {
        font-size: 27px;
    }

    .property-heading-content p {
        font-size: 12px;
    }

    .search-card-header,
    .search-card-body {
        padding: 20px;
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
        flex-direction: column;
        align-items: flex-start;
        gap: 14px;
    }
}

@media (max-width: 480px) {

    .property-heading-icon {
        display: none;
    }

    .property-heading-content h1 {
        font-size: 23px;
    }

    .property-breadcrumb {
        font-size: 11px;
    }

    .purpose-tab span {
        min-height: 70px;
    }

    .property-card-image {
        height: 210px;
    }
}
.property-search-page .select2-container {
    width: 100% !important;
}

.property-search-page .select2-container .select2-selection--single {
    height: 62px !important;
    border: 1px solid #e1e4ee !important;
    border-radius: 11px !important;
    background: #fff !important;
}

.property-search-page .select2-container .select2-selection--single
.select2-selection__rendered {
    line-height: 60px !important;
    padding-left: 49px !important;
    padding-right: 40px !important;
    color: #17203d !important;
    font-size: 13px !important;
    font-weight: 600 !important;
}

.property-search-page .select2-container .select2-selection--single
.select2-selection__arrow {
    height: 60px !important;
    right: 12px !important;
}

.property-search-page .select2-container--open
.select2-selection--single {
    border-color: #5a4ee8 !important;
    box-shadow: 0 0 0 4px rgba(86, 74, 232, .08) !important;
}

.property-search-page .select2-dropdown {
    border: 1px solid #e1e4ee !important;
    border-radius: 10px !important;
    overflow: hidden;
}

.property-search-page .select2-search__field {
    height: 42px !important;
    border: 1px solid #e1e4ee !important;
    border-radius: 7px !important;
    padding: 8px 12px !important;
    font-size: 13px !important;
}

.property-search-page .select2-results__option {
    padding: 10px 12px !important;
    font-size: 13px !important;
}

.property-search-page .select2-results__option--highlighted {
    background: #564ae8 !important;
    color: #fff !important;
}
</style>
<section class="property-search-page"> 
    <div class="property-page-header">
        <div class="property-header-left">
            <div class="property-heading-content">
                <div class="property-heading-icon">
                    <i data-feather="search"></i>
                </div>
                <div>
                    <span class="property-header-small"> PROPERTY SEARCH </span>
                    <h1> Search Properties </h1>
                    <p> Find your perfect property with advanced filters </p>
                </div>
            </div>
        </div>
    </div>
    <div class="property-search-card">
        <div class="search-card-header">
            <div class="search-card-title">
                <div class="search-card-icon">
                    <i data-feather="sliders"></i>
                </div>
                <div>
                    <h2>Search & Filter Properties</h2>
                    <p> Use the filters below to find exactly what you're looking for</p>
                </div>
            </div>
        </div>
        <div class="search-card-body">
            <form id="propertySearchForm"  autocomplete="off" >             
                <div class="row mb-4">
                    <div class="col-12">
                        <label class="filter-main-label"> Purpose </label>
                        <div class="purpose-tabs">                          
                            <label class="purpose-tab">
                                <input type="radio" name="purpose"  value="purchase" >
                                <span>
                                    <i data-feather="home"></i>
                                    <div>
                                        <strong> For Sale  </strong>
                                        <small>  Buy properties</small>
                                    </div>
                                </span>
                            </label>
                            <label class="purpose-tab">
                                <input  type="radio" name="purpose" value="rent" checked >
                                <span>
                                    <i data-feather="key"></i>
                                    <div>
                                        <strong> For Rent</strong>
                                        <small> Rent properties</small>
                                    </div>
                                </span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="filter-row-title">
                    Location
                </div>
                <div class="row g-3">   
                    <div class="col-xl-3">
                        <div class="filter-group">   
                            <div class="select-wrapper">
                                <i  data-feather="globe" class="select-left-icon"></i>
                                <select name="country_id" id="country_id" class="form-select filter-control searchable-location">
                                    <option value="">
                                        Select country
                                    </option>
                                </select>                                 
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="filter-group">                          
                            <div class="select-wrapper">
                                <i data-feather="map-pin" class="select-left-icon"></i>
                                <select  name="state_id" id="state_id" class="form-select filter-control" >
                                    <option value="">
                                        Select state
                                    </option>
                                </select>                                
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="filter-group">                            
                            <div class="select-wrapper">
                                <i data-feather="home" class="select-left-icon"></i>

                                <select name="city_id" id="city_id" class="form-select filter-control" >
                                    <option value="">Select city </option>
                                </select>                               
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="filter-group">                          
                            <div class="select-wrapper">
                                <i data-feather="crosshair" class="select-left-icon"></i>
                                <select  name="area_id" id="area_id"  class="form-select filter-control" >
                                    <option value=""> Select area</option>
                                </select>                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="filter-row-title">
                    Property Details
                </div>
                <div class="row g-3">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                        <div class="filter-group">                            
                            <div class="select-wrapper">
                                <i data-feather="home" class="select-left-icon" ></i>
                                <select name="property_category_id" id="property_category_id" class="form-select filter-control" >
                                    <option value="">
                                        Select property type
                                    </option>
                                </select>                             
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="filter-group">                                              
                                 <div id="categoryWiseFilters" class="category-wise-filters">
                                    <div id="residentialFilters"  class="category-filter-section category-wise-panel"  data-category-type="residential" style="display:none;">
                                        <div class="category-filter-header">
                                            <div class="category-filter-header-left">
                                                <div class="category-filter-icon">
                                                    <i data-feather="home"></i>
                                                </div>
                                                <div>
                                                    <h5>Residential Property Filters</h5>
                                                    <p>Use residential-specific details to refine results.</p>
                                                </div>
                                            </div>
                                            <span class="category-filter-badge">Residential</span>
                                        </div>
                                        <div class="row property-filter-grid">
                                            <div class="col-xl-3 col-lg-4 col-md-6">
                                                <div class="property-filter-field">

                                                    <label for="residential_type">
                                                        Residential Type
                                                    </label>

                                                    <div class="property-input-wrapper">

                                                        <select
                                                            id="residential_type"
                                                            name="residential_type"
                                                            class="form-control category-data-filter">

                                                            <option value="">
                                                                Any Residential Type
                                                            </option>

                                                            <option value="Apartment / Flat">
                                                                Apartment / Flat
                                                            </option>

                                                            <option value="Villa">
                                                                Villa
                                                            </option>

                                                            <option value="Bungalow">
                                                                Bungalow
                                                            </option>

                                                            <option value="Independent House">
                                                                Independent House
                                                            </option>

                                                            <option value="Builder Floor">
                                                                Builder Floor
                                                            </option>

                                                            <option value="Studio Apartment">
                                                                Studio Apartment
                                                            </option>

                                                            <option value="Penthouse">
                                                                Penthouse
                                                            </option>

                                                            <option value="Row House">
                                                                Row House
                                                            </option>

                                                        </select>

                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-6">
                                                <div class="property-filter-field">
                                                    <label for="bhk">BHK</label>
                                                    <div class="property-input-wrapper">                                                       
                                                        <select id="bhk" name="bhk" class="form-control category-data-filter">
                                                            <option value="">Any BHK</option>
                                                            <option value="1">1 BHK</option>
                                                            <option value="2">2 BHK</option>
                                                            <option value="3">3 BHK</option>
                                                            <option value="4">4 BHK</option>
                                                            <option value="5">5 BHK</option>
                                                            <option value="6">6+ BHK</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-6">
                                                <div class="property-filter-field">
                                                    <label for="bedrooms">Bedrooms</label>
                                                    <div class="property-input-wrapper">                                                       
                                                        <select id="bedrooms" name="bedrooms" class="form-control category-data-filter">
                                                            <option value="">Any Bedrooms</option>
                                                            <option value="1">1+</option>
                                                            <option value="2">2+</option>
                                                            <option value="3">3+</option>
                                                            <option value="4">4+</option>
                                                            <option value="5">5+</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-6">
                                                <div class="property-filter-field">
                                                    <label for="bathrooms">Bathrooms</label>
                                                    <div class="property-input-wrapper">                                                        
                                                        <select id="bathrooms" name="bathrooms" class="form-control category-data-filter">
                                                            <option value="">Any Bathrooms</option>
                                                            <option value="1">1+</option>
                                                            <option value="2">2+</option>
                                                            <option value="3">3+</option>
                                                            <option value="4">4+</option>
                                                            <option value="5">5+</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-6">
                                                <div class="property-filter-field">
                                                    <label for="balconies">Balconies</label>
                                                    <div class="property-input-wrapper">                                                       
                                                        <select id="balconies" name="balconies" class="form-control category-data-filter">
                                                            <option value="">Any Balconies</option>
                                                            <option value="1">1+</option>
                                                            <option value="2">2+</option>
                                                            <option value="3">3+</option>
                                                            <option value="4">4+</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-6">
                                                <div class="property-filter-field">
                                                    <label for="facing">Facing</label>
                                                    <div class="property-input-wrapper">                                                       
                                                        <select id="facing" name="facing" class="form-control category-data-filter">
                                                            <option value="">Any Facing</option>
                                                            <option value="North">North</option>
                                                            <option value="South">South</option>
                                                            <option value="East">East</option>
                                                            <option value="West">West</option>
                                                            <option value="North-East">North-East</option>
                                                            <option value="North-West">North-West</option>
                                                            <option value="South-East">South-East</option>
                                                            <option value="South-West">South-West</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-6">
                                                <div class="property-filter-field">
                                                    <label for="floor_number">Floor Number</label>
                                                    <input type="number" id="floor_number" name="floor_number" class="form-control category-data-filter" min="0" placeholder="Floor number">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-6">
                                                <div class="property-filter-field">
                                                    <label for="total_floors">Total Floors</label>
                                                    <input type="number" id="total_floors" name="total_floors" class="form-control category-data-filter" min="0"  placeholder="Total floors">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-6">
                                                <div class="property-filter-field">
                                                    <label for="furnishing">Furnishing</label>
                                                    <div class="property-input-wrapper">                                                       
                                                        <select id="furnishing" name="furnishing" class="form-control category-data-filter">
                                                            <option value="">Any Furnishing</option>
                                                            <option value="Unfurnished">Unfurnished</option>
                                                            <option value="Semi Furnished">Semi Furnished</option>
                                                            <option value="Fully Furnished">Fully Furnished</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-6">
                                                <div class="property-filter-field">
                                                    <label for="construction_year">Construction Year</label>
                                                    <input type="number" id="construction_year" name="construction_year" class="form-control category-data-filter" min="1900" max="{{ date('Y') }}" placeholder="YYYY">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-6">
                                                <div class="property-filter-field">
                                                    <label for="ownership">Ownership</label>
                                                    <input type="text" id="ownership" name="ownership" class="form-control category-data-filter"  placeholder="Ownership">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-6">
                                                <div class="property-filter-field">
                                                    <label for="monthly_rent">Monthly Rent</label>
                                                    <input type="number" id="monthly_rent" name="monthly_rent" class="form-control category-data-filter" min="0"  placeholder="Maximum monthly rent">
                                                </div>
                                            </div>

                                            <div class="col-xl-3 col-lg-4 col-md-6">
                                                <div class="property-filter-field">
                                                    <label for="parking">Parking</label>
                                                    <input type="number" id="parking" name="parking" class="form-control category-data-filter" min="0" placeholder="Parking spaces">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="commercialFilters" class="category-filter-section category-wise-panel" data-category-type="commercial"  style="display:none;">
                                        <div class="category-filter-header">
                                            <div class="category-filter-header-left">
                                                <div class="category-filter-icon">
                                                    <i data-feather="briefcase"></i>
                                                </div>
                                                <div>
                                                    <h5>Commercial Property Filters</h5>
                                                    <p>Use commercial-specific details to refine results.</p>
                                                </div>
                                            </div>
                                            <span class="category-filter-badge">Commercial</span>
                                        </div>
                                        <div class="row property-filter-grid">
                                            <div class="col-xl-3 col-lg-4 col-md-6">
                                                <div class="property-filter-field">
                                                    <label for="commercial_type">
                                                        Commercial Type
                                                    </label>
                                                    <div class="property-input-wrapper">
                                                        <select id="commercial_type" name="commercial_type" class="form-control category-data-filter">
                                                            <option value="">
                                                                All Commercial Types
                                                            </option>
                                                            <option value="Office Spaces">
                                                                Office Spaces
                                                            </option>
                                                            <option value="Shops">
                                                                Shops
                                                            </option>
                                                            <option value="Showrooms">
                                                                Showrooms
                                                            </option>
                                                            <option value="Retail Spaces">
                                                                Retail Spaces
                                                            </option>
                                                            <option value="Commercial Buildings">
                                                                Commercial Buildings
                                                            </option>
                                                            <option value="Business Spaces">
                                                                Business Spaces
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>                                      
                                            <div class="col-xl-3 col-lg-4 col-md-6">
                                                <div class="property-filter-field">
                                                    <label for="business_type">Business Type</label>
                                                    <input type="text" id="business_type" name="business_type"  class="form-control category-data-filter" placeholder="Business type">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-6">
                                                <div class="property-filter-field">
                                                    <label for="washrooms">Washrooms</label>
                                                    <input type="number" id="washrooms" name="washrooms" class="form-control category-data-filter" min="0" placeholder="Minimum washrooms">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-6">
                                                <div class="property-filter-field">
                                                    <label for="commercial_floor_number">Floor Number</label>
                                                    <input type="number" id="commercial_floor_number"  class="form-control category-data-alias"  data-search-name="floor_number" min="0" placeholder="Floor number">
                                                </div>
                                            </div>

                                            <div class="col-xl-3 col-lg-4 col-md-6">
                                                <div class="property-filter-field">
                                                    <label for="commercial_total_floors">Total Floors</label>
                                                    <input type="number" id="commercial_total_floors" class="form-control category-data-alias"  data-search-name="total_floors"  min="0" placeholder="Total floors">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-6">
                                                <div class="property-filter-field">
                                                    <label for="commercial_furnishing">Furnishing</label>
                                                    <div class="property-input-wrapper">                                                         
                                                        <select id="commercial_furnishing" class="form-control category-data-alias" data-search-name="furnishing">
                                                            <option value="">Any Furnishing</option>
                                                            <option value="Unfurnished">Unfurnished</option>
                                                            <option value="Semi Furnished">Semi Furnished</option>
                                                            <option value="Fully Furnished">Fully Furnished</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-6">
                                                <div class="property-filter-field">
                                                    <label for="commercial_parking">Parking</label>
                                                    <input type="number" id="commercial_parking" class="form-control category-data-alias" data-search-name="parking" min="0" placeholder="Parking spaces">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-6">
                                                <div class="property-filter-field">
                                                    <label for="commercial_construction_year">Construction Year</label>
                                                    <input type="number" id="commercial_construction_year" class="form-control category-data-alias" data-search-name="construction_year"  min="1900" max="{{ date('Y') }}" placeholder="YYYY">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="landFilters" class="category-filter-section category-wise-panel" data-category-type="land"  style="display:none;">
                                        <div class="category-filter-header">
                                            <div class="category-filter-header-left">
                                                <div class="category-filter-icon">
                                                    <i data-feather="map"></i>
                                                </div>
                                                <div>
                                                    <h5>Land / Plot Filters</h5>
                                                    <p>Use land-specific details to refine results.</p>
                                                </div>
                                            </div>
                                            <span class="category-filter-badge">Land / Plot</span>
                                        </div>
                                        <div class="row property-filter-grid">
                                            <div class="col-xl-3 col-lg-4 col-md-6">
                                                <div class="property-filter-field">
                                                    <label for="plot_area">Plot Area</label>
                                                    <input type="number" id="plot_area" name="plot_area" class="form-control category-data-filter"  min="0" step="0.01" placeholder="Plot area">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-6">
                                                <div class="property-filter-field">
                                                    <label for="road_width">Road Width</label>
                                                    <input type="number" id="road_width" name="road_width" class="form-control category-data-filter"  min="0" step="0.01" placeholder="Road width">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-6">
                                                <div class="property-filter-field">
                                                    <label for="road_width_unit">Road Width Unit</label>
                                                    <select id="road_width_unit" name="road_width_unit" class="form-control category-data-filter">
                                                        <option value="">Any Unit</option>
                                                        <option value="ft">Feet</option>
                                                        <option value="m">Meter</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-6">
                                                <div class="property-filter-field">
                                                    <label for="boundary_wall">Boundary Wall</label>
                                                    <select id="boundary_wall" name="boundary_wall" class="form-control category-data-filter">
                                                        <option value="">Any</option>
                                                        <option value="1">Yes</option>
                                                        <option value="0">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-6">
                                                <div class="property-filter-field">
                                                    <label for="land_type">
                                                        Land Type
                                                    </label>
                                                    <select  id="land_type" name="land_type" class="form-control category-data-filter">
                                                        <option value=""> Any Land Type </option>
                                                        <option value="Residential Plot">Residential Plot</option>
                                                        <option value="Open Plot">Open Plot</option>
                                                        <option value="Commercial Land">Commercial Land</option>
                                                        <option value="Industrial Land">Industrial Land</option>
                                                        <option value="Agricultural Land">Agricultural Land</option>
                                                        <option value="Farm Land">Farm Land</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-6">
                                                <div class="property-filter-field">
                                                    <label for="land_facing">Facing</label>
                                                    <select id="land_facing" name="facing"  class="form-control category-data-alias">
                                                        <option value="">Any Facing</option>
                                                        <option value="North">North</option>
                                                        <option value="South">South</option>
                                                        <option value="East">East</option>
                                                        <option value="West">West</option>
                                                        <option value="North-East">North-East</option>
                                                        <option value="North-West">North-West</option>
                                                        <option value="South-East">South-East</option>
                                                        <option value="South-West">South-West</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-xl-3 col-lg-4 col-md-6">
                                                <div class="property-filter-field">
                                                    <label for="land_parking">Parking</label>
                                                    <input type="number" id="land_parking" class="form-control category-data-alias"  data-search-name="parking"  min="0" placeholder="Parking spaces">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="additionalCategoryFilters">
                                    <div id="rentalFilters" class="category-filter-section category-wise-panel" data-category-type="rental" style="display:none;">
                                        <div class="category-filter-header">
                                            <div class="category-filter-header-left">
                                                <div class="category-filter-icon">
                                                    <i data-feather="key"></i>
                                                </div>
                                                <div>
                                                    <h5>Rental Filters</h5>
                                                    <p>Filter rental-specific availability and lease details.</p>
                                                </div>
                                            </div>
                                            <span class="category-filter-badge">Rental</span>
                                        </div>
                                        <div class="row property-filter-grid">
                                            <div class="col-xl-3 col-lg-4 col-md-6">
                                                <div class="property-filter-field">
                                                    <label for="rental_monthly_rent">Monthly Rent</label>
                                                    <input type="number" id="rental_monthly_rent"  class="form-control category-data-alias" data-search-name="monthly_rent"  min="0" placeholder="Maximum monthly rent">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-6">
                                                <div class="property-filter-field">
                                                    <label for="security_deposit">Security Deposit</label>
                                                    <input type="number" id="security_deposit" name="security_deposit" class="form-control category-data-filter" min="0" placeholder="Maximum deposit">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-6">
                                                <div class="property-filter-field">
                                                    <label for="available_from">Available From</label>
                                                    <input type="date" id="available_from" name="available_from" class="form-control category-data-filter">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-6">
                                                <div class="property-filter-field">
                                                    <label for="lease_period">Lease Period</label>
                                                    <input type="number" id="lease_period"  name="lease_period" class="form-control category-data-filter" min="0" placeholder="Lease period">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-6">
                                                <div class="property-filter-field">
                                                    <label for="lease_period_unit">Lease Period Unit</label>
                                                    <select id="lease_period_unit" name="lease_period_unit" class="form-control category-data-filter">
                                                        <option value="">Any Unit</option>
                                                        <option value="month">Month</option>
                                                        <option value="year">Year</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="resaleFilters" class="category-filter-section category-wise-panel" data-category-type="resale" style="display:none;">
                                        <div class="category-filter-header">
                                            <div class="category-filter-header-left">
                                                <div class="category-filter-icon">
                                                    <i data-feather="refresh-cw"></i>
                                                </div>
                                                <div>
                                                    <h5>Resale Filters</h5>
                                                    <p>Filter resale properties by purchase year and age.</p>
                                                </div>
                                            </div>
                                            <span class="category-filter-badge">Resale</span>
                                        </div>
                                        <div class="row property-filter-grid">
                                            {{-- Resale Type --}}
                                            <div class="col-xl-3 col-lg-4 col-md-6">
                                                <div class="property-filter-field">

                                                    <label for="resale_type">
                                                        Resale Type
                                                    </label>

                                                    <select
                                                        id="resale_type"
                                                        name="resale_type"
                                                        class="form-control category-data-filter">

                                                        <option value="">
                                                            Any Resale Type
                                                        </option>

                                                        <option value="Resale Flats">
                                                            Resale Flats
                                                        </option>

                                                        <option value="Resale Apartments">
                                                            Resale Apartments
                                                        </option>

                                                        <option value="Resale Houses">
                                                            Resale Houses
                                                        </option>

                                                        <option value="Resale Villas">
                                                            Resale Villas
                                                        </option>

                                                        <option value="Resale Office Spaces">
                                                            Resale Office Spaces
                                                        </option>

                                                        <option value="Resale Shops">
                                                            Resale Shops
                                                        </option>

                                                        <option value="Other Resale Properties">
                                                            Other Resale Properties
                                                        </option>

                                                    </select>

                                                </div>
                                            </div>


                                            {{-- BHK --}}
                                            <div class="col-xl-3 col-lg-4 col-md-6">
                                                <div class="property-filter-field">

                                                    <label for="bhk">
                                                        BHK
                                                    </label>

                                                    <select
                                                        id="bhk"
                                                        name="bhk"
                                                        class="form-control category-data-filter">

                                                        <option value="">
                                                            Any BHK
                                                        </option>

                                                        <option value="1">
                                                            1 BHK
                                                        </option>

                                                        <option value="2">
                                                            2 BHK
                                                        </option>

                                                        <option value="3">
                                                            3 BHK
                                                        </option>

                                                        <option value="4">
                                                            4 BHK
                                                        </option>

                                                        <option value="5">
                                                            5 BHK
                                                        </option>

                                                        <option value="6">
                                                            6+ BHK
                                                        </option>

                                                    </select>

                                                </div>
                                            </div>


                                            {{-- Bedrooms --}}
                                            <div class="col-xl-3 col-lg-4 col-md-6">
                                                <div class="property-filter-field">

                                                    <label for="bedrooms">
                                                        Bedrooms
                                                    </label>

                                                    <input
                                                        type="number"
                                                        id="bedrooms"
                                                        name="bedrooms"
                                                        class="form-control category-data-filter"
                                                        min="0"
                                                        placeholder="Minimum bedrooms">

                                                </div>
                                            </div>


                                            {{-- Bathrooms --}}
                                            <div class="col-xl-3 col-lg-4 col-md-6">
                                                <div class="property-filter-field">

                                                    <label for="bathrooms">
                                                        Bathrooms
                                                    </label>

                                                    <input
                                                        type="number"
                                                        id="bathrooms"
                                                        name="bathrooms"
                                                        class="form-control category-data-filter"
                                                        min="0"
                                                        placeholder="Minimum bathrooms">

                                                </div>
                                            </div>


                                            {{-- Balconies --}}
                                            <div class="col-xl-3 col-lg-4 col-md-6">
                                                <div class="property-filter-field">

                                                    <label for="balconies">
                                                        Balconies
                                                    </label>

                                                    <input
                                                        type="number"
                                                        id="balconies"
                                                        name="balconies"
                                                        class="form-control category-data-filter"
                                                        min="0"
                                                        placeholder="Minimum balconies">

                                                </div>
                                            </div>


                                            {{-- Facing --}}
                                            <div class="col-xl-3 col-lg-4 col-md-6">
                                                <div class="property-filter-field">

                                                    <label for="facing">
                                                        Facing
                                                    </label>

                                                    <select
                                                        id="facing"
                                                        name="facing"
                                                        class="form-control category-data-filter">

                                                        <option value="">
                                                            Any Facing
                                                        </option>

                                                        <option value="North">
                                                            North
                                                        </option>

                                                        <option value="South">
                                                            South
                                                        </option>

                                                        <option value="East">
                                                            East
                                                        </option>

                                                        <option value="West">
                                                            West
                                                        </option>

                                                        <option value="North-East">
                                                            North-East
                                                        </option>

                                                        <option value="North-West">
                                                            North-West
                                                        </option>

                                                        <option value="South-East">
                                                            South-East
                                                        </option>

                                                        <option value="South-West">
                                                            South-West
                                                        </option>

                                                    </select>

                                                </div>
                                            </div>


                                            {{-- Floor Number --}}
                                            <div class="col-xl-3 col-lg-4 col-md-6">
                                                <div class="property-filter-field">

                                                    <label for="floor_number">
                                                        Floor Number
                                                    </label>

                                                    <input
                                                        type="number"
                                                        id="floor_number"
                                                        name="floor_number"
                                                        class="form-control category-data-filter"
                                                        min="0"
                                                        placeholder="Floor number">

                                                </div>
                                            </div>


                                            {{-- Total Floors --}}
                                            <div class="col-xl-3 col-lg-4 col-md-6">
                                                <div class="property-filter-field">

                                                    <label for="total_floors">
                                                        Total Floors
                                                    </label>

                                                    <input
                                                        type="number"
                                                        id="total_floors"
                                                        name="total_floors"
                                                        class="form-control category-data-filter"
                                                        min="0"
                                                        placeholder="Total floors">

                                                </div>
                                            </div>


                                            {{-- Furnishing --}}
                                            <div class="col-xl-3 col-lg-4 col-md-6">
                                                <div class="property-filter-field">

                                                    <label for="furnishing">
                                                        Furnishing
                                                    </label>

                                                    <select
                                                        id="furnishing"
                                                        name="furnishing"
                                                        class="form-control category-data-filter">

                                                        <option value="">
                                                            Any Furnishing
                                                        </option>

                                                        <option value="Unfurnished">
                                                            Unfurnished
                                                        </option>

                                                        <option value="Semi Furnished">
                                                            Semi Furnished
                                                        </option>

                                                        <option value="Fully Furnished">
                                                            Fully Furnished
                                                        </option>

                                                    </select>

                                                </div>
                                            </div>


                                            {{-- Purchase Year --}}
                                            <div class="col-xl-3 col-lg-4 col-md-6">
                                                <div class="property-filter-field">

                                                    <label for="purchase_year">
                                                        Purchase Year
                                                    </label>

                                                    <input
                                                        type="number"
                                                        id="purchase_year"
                                                        name="purchase_year"
                                                        class="form-control category-data-filter"
                                                        min="1900"
                                                        max="{{ date('Y') }}"
                                                        placeholder="YYYY">

                                                </div>
                                            </div>


                                            {{-- Property Age --}}
                                            <div class="col-xl-3 col-lg-4 col-md-6">
                                                <div class="property-filter-field">

                                                    <label for="property_age">
                                                        Property Age
                                                    </label>

                                                    <input
                                                        type="number"
                                                        id="property_age"
                                                        name="property_age"
                                                        class="form-control category-data-filter"
                                                        min="0"
                                                        placeholder="Maximum age">

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div id="newProjectFilters" class="category-filter-section category-wise-panel" data-category-type="project" style="display:none;">
                                        <div class="category-filter-header">
                                            <div class="category-filter-header-left">
                                                <div class="category-filter-icon">
                                                    <i data-feather="layers"></i>
                                                </div>
                                                <div>
                                                    <h5>New Project Filters</h5>
                                                    <p>Filter projects using developer and possession details.</p>
                                                </div>
                                            </div>
                                            <span class="category-filter-badge">New Project</span>
                                        </div>
                                        <div class="row property-filter-grid">
                                            <div class="col-xl-3 col-lg-4 col-md-6">
                                                <div class="property-filter-field">
                                                    <label for="project_name">Project Name</label>
                                                    <input type="text" id="project_name" name="project_name" class="form-control category-data-filter"  placeholder="Project name">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-6">
                                                <div class="property-filter-field">
                                                    <label for="developer_name">Developer Name</label>
                                                    <input type="text" id="developer_name" name="developer_name"  class="form-control category-data-filter"   placeholder="Developer name">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-6">
                                                <div class="property-filter-field">
                                                    <label for="project_status">Project Status</label>
                                                    <select id="project_status" name="project_status" class="form-control category-data-filter">
                                                        <option value="">Any Status</option>
                                                        <option value="Upcoming">Upcoming</option>
                                                        <option value="Under Construction">Under Construction</option>
                                                        <option value="Ready to Move">Ready to Move</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-6">
                                                <div class="property-filter-field">
                                                    <label for="launch_date">Launch Date</label>
                                                    <input type="date" id="launch_date"  name="launch_date" class="form-control category-data-filter">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-6">
                                                <div class="property-filter-field">
                                                    <label for="possession_date">Possession Date</label>
                                                    <input type="date" id="possession_date"  name="possession_date" class="form-control category-data-filter">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-6">
                                                <div class="property-filter-field">
                                                    <label for="total_units">Total Units</label>
                                                    <input type="number" id="total_units" name="total_units"  class="form-control category-data-filter" min="0" placeholder="Minimum units">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-6">
                                                <div class="property-filter-field">
                                                    <label for="available_units">Available Units</label>
                                                    <input type="number" id="available_units" name="available_units" class="form-control category-data-filter"  min="0" placeholder="Minimum available">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-6">
                                                <div class="property-filter-field">
                                                    <label for="rera_number">RERA Number</label>
                                                    <input type="text" id="rera_number"  name="rera_number" class="form-control category-data-filter"  placeholder="RERA number">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <div class="filter-row-title">
                                    Amenities
                                </div>
                                 <label>
                                    Select Amenities
                                </label>    
                                <div  class="amenities-box" id="amenitiesList">
                                    <div class="amenity-loading">
                                        <span class="mini-loader"></span>
                                        Loading amenities...
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="search-actions">
                        <button type="button" id="clearFilters" class="clear-filter-btn">
                            <i data-feather="rotate-ccw"></i>
                            <span>
                                Reset Filters
                            </span>
                        </button>
                        <button type="submit" id="searchPropertyBtn" class="search-property-btn" >
                            <span>
                                Search Properties
                            </span>
                            <i data-feather="search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="property-result-section">
            <div class="property-result-header">
                <div>
                    <span class="result-small-label">
                        PROPERTY RESULTS
                    </span>
                    <h2> Available Properties</h2>
                    <p id="propertyCount">
                        Loading properties...
                    </p>
                </div>
                <div class="result-status">
                    <span class="result-status-dot"></span>
                    Approved Listings
                </div>
            </div>       
            <div id="propertyLoading" class="property-loading">
                <div class="property-loader"></div>
                    <p>Finding properties... </p>
                </div>
                <div id="propertyListing" class="row g-4" ></div>
                <div id="noProperties" class="no-properties" style="display:none;"  >
                    <div class="no-property-icon">
                        <i data-feather="home"></i>
                    </div>
                    <h3> No Properties Found</h3>
                    <p> We couldn't find any properties matching your filters. </p>
                    <button type="button"  id="clearFiltersEmpty" class="clear-filter-btn" >
                        <i data-feather="rotate-ccw"></i>
                        <span>
                            Reset Filters
                        </span>
                    </button>
                </div>
                <div id="propertyPagination" class="property-pagination" ></div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const searchForm = document.getElementById('propertySearchForm');
    const propertyListing = document.getElementById('propertyListing');
    const propertyLoading = document.getElementById('propertyLoading');
    const propertyCount = document.getElementById('propertyCount');
    const propertyPagination = document.getElementById('propertyPagination');
    const noProperties = document.getElementById('noProperties');
    const propertyCategorySelect =  document.getElementById('property_category_id');
    const countrySelect = document.getElementById('country_id');
    const stateSelect =  document.getElementById('state_id');
    const citySelect = document.getElementById('city_id');
    const areaSelect = document.getElementById('area_id');
    const amenitiesList =  document.getElementById('amenitiesList');

    function getPurpose()
    {
        const checked = document.querySelector('input[name="purpose"]:checked');
        return checked ? checked.value : '';
    }
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
    function loadFilters(filters)
    {
         

        propertyCategorySelect.innerHTML =
            '<option value="">All Property Types</option>';

        filters.property_categories.forEach(function (category) {
            propertyCategorySelect.innerHTML += `
                <option value="${category.id}">
                    ${escapeHtml(category.name)}
                </option>
            `;
        });         

        if ($('#country_id').hasClass('select2-hidden-accessible')) {
            $('#country_id').select2('destroy');
        }

        countrySelect.innerHTML =
            '<option value="">Select country</option>';

        filters.countries.forEach(function (country) {
            countrySelect.innerHTML += `
                <option value="${country.id}">
                    ${escapeHtml(country.name)}
                </option>
            `;
        });

        $('#country_id').select2({
            placeholder: 'Select country',
            allowClear: true,
            width: '100%'
        });

        if ($('#state_id').hasClass('select2-hidden-accessible')) {
            $('#state_id').select2('destroy');
        }

        stateSelect.innerHTML =
            '<option value="">Select state</option>';

        $('#state_id').select2({
            placeholder: 'Select state',
            allowClear: true,
            width: '100%'
        });


        // =====================================================
        

        if ($('#city_id').hasClass('select2-hidden-accessible')) {
            $('#city_id').select2('destroy');
        }

        citySelect.innerHTML =
            '<option value="">Select city</option>';

        $('#city_id').select2({
            placeholder: 'Select city',
            allowClear: true,
            width: '100%'
        });

        if ($('#area_id').hasClass('select2-hidden-accessible')) {
            $('#area_id').select2('destroy');
        }

        areaSelect.innerHTML =
            '<option value="">Select area</option>';

        $('#area_id').select2({
            placeholder: 'Select area',
            allowClear: true,
            width: '100%'
        });       

        $('#country_id')
            .off('change.locationFilter')
            .on('change.locationFilter', function () {
                const countryId = $(this).val();       
                if ($('#state_id').hasClass('select2-hidden-accessible')) {
                    $('#state_id').select2('destroy');
                }
                stateSelect.innerHTML =
                    '<option value="">Select state</option>';
                if ($('#city_id').hasClass('select2-hidden-accessible')) {
                    $('#city_id').select2('destroy');
                }

                citySelect.innerHTML =
                    '<option value="">Select city</option>';

                if (countryId) {
                    filters.states
                        .filter(function (state) {
                            return String(state.country_id) ===
                                String(countryId);
                        })
                        .forEach(function (state) {
                            stateSelect.innerHTML += `
                                <option value="${state.id}">
                                    ${escapeHtml(state.name)}
                                </option>
                            `;
                        });
                }
                $('#state_id').select2({
                    placeholder: 'Select state',
                    allowClear: true,
                    width: '100%'
                });
                $('#city_id').select2({
                    placeholder: 'Select city',
                    allowClear: true,
                    width: '100%'
                });
                $('#area_id').select2({
                    placeholder: 'Select area',
                    allowClear: true,
                    width: '100%'
                });

            });
        $('#state_id')
            .off('change.locationFilter')
            .on('change.locationFilter', function () {
                const stateId = $(this).val();             

                if ($('#city_id').hasClass('select2-hidden-accessible')) {
                    $('#city_id').select2('destroy');
                }

                citySelect.innerHTML =
                    '<option value="">Select city</option>';              

                if ($('#area_id').hasClass('select2-hidden-accessible')) {
                    $('#area_id').select2('destroy');                }

                areaSelect.innerHTML =
                    '<option value="">Select area</option>';

                if (stateId) {

                    filters.cities
                        .filter(function (city) {

                            return String(city.state_id) ===
                                String(stateId);

                        })
                        .forEach(function (city) {

                            citySelect.innerHTML += `
                                <option value="${city.id}">
                                    ${escapeHtml(city.name)}
                                </option>
                            `;

                        });
                }

                $('#city_id').select2({
                    placeholder: 'Select city',
                    allowClear: true,
                    width: '100%'
                });

                $('#area_id').select2({
                    placeholder: 'Select area',
                    allowClear: true,
                    width: '100%'
                });

            });

        $('#city_id')
            .off('change.locationFilter')
            .on('change.locationFilter', function () {

                const cityId = $(this).val();
                
                if ($('#area_id').hasClass('select2-hidden-accessible')) {
                    $('#area_id').select2('destroy');
                }

                areaSelect.innerHTML =
                    '<option value="">Select area</option>';              

                if (cityId) {

                    filters.areas
                        .filter(function (area) {

                            return String(area.city_id) ===
                                String(cityId);

                        })
                        .forEach(function (area) {

                            areaSelect.innerHTML += `
                                <option value="${area.id}">
                                    ${escapeHtml(area.name)}
                                </option>
                            `;

                        });
                }

                $('#area_id').select2({
                    placeholder: 'Select area',
                    allowClear: true,
                    width: '100%'
                });

            });

        amenitiesList.innerHTML = '';

        if (!filters.amenities || filters.amenities.length === 0) {

            amenitiesList.innerHTML = `
                <span class="empty-amenities">
                    No amenities available
                </span>
            `;

            return;
        }

        filters.amenities.forEach(function (amenity) {

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

        });
    }
    function loadProperties(page = 1)
    {
        propertyLoading.style.display = 'flex';
        propertyListing.innerHTML = '';
        noProperties.style.display = 'none';
        propertyPagination.innerHTML = '';
        const params = new URLSearchParams();
        const purpose =  getPurpose();
        if (purpose) {
            params.append('purpose',purpose);
        }
        if (propertyCategorySelect.value) {
            params.append('property_category_id', propertyCategorySelect.value);
        }
        if (countrySelect.value) {
            params.append('country_id',countrySelect.value);
        }
        if (stateSelect.value) {
            params.append('state_id',stateSelect.value);
        }
        if (citySelect.value) {
            params.append('city_id',citySelect.value);
        }
        if (areaSelect.value) {
            params.append('area_id',areaSelect.value);
        }
        getSelectedAmenities().forEach(function (amenity) {
                params.append('amenities[]',
                    amenity
                );
            }
        );
        document
            .querySelectorAll(
                '.category-wise-panel:not([style*="display: none"]) .category-data-filter'
            )
            .forEach(function (field) {
                if (
                    !field.disabled &&
                    field.name &&
                    field.value !== ''
                ) {
                    params.append(
                        field.name,
                        field.value
                    );
                }
            });
        document
            .querySelectorAll(
                '.category-wise-panel:not([style*="display: none"]) .category-data-alias'
            )
            .forEach(function (field) {
                const searchName =
                    field.dataset.searchName;
                if (
                    !field.disabled &&
                    searchName &&
                    field.value !== ''
                ) {
                    params.append(
                        searchName,
                        field.value
                    );
                }
            });
        [
            'security_deposit',
            'available_from',
            'lease_period',
            'lease_period_unit',
            'purchase_year',
            'property_age',
            'project_name',
            'developer_name',
            'project_status',
            'launch_date',
            'possession_date',
            'total_units',
            'available_units',
            'rera_number'
        ].forEach(function (fieldName) {
            const field =
                document.querySelector(
                    '.category-wise-filter-input[name="' +
                    fieldName +
                    '"]'
                );
            if (
                field &&
                !field.disabled &&
                field.value !== ''
            ) {
                params.append(
                    fieldName,
                    field.value
                );
            }
        });
        params.append(
            'page',
            page
        );
        fetch(
            `{{ route('properties.search') }}?${params.toString()}`,
            {
                method: 'GET',
                headers: {
                    'X-Requested-With':'XMLHttpRequest',
                    'Accept': 'application/json'
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
            if (data.filters) {
                if (
                    propertyCategorySelect.options.length <= 1
                ) {
                    loadFilters(
                        data.filters
                    );
                }
            }
            propertyLoading.style.display = 'none';
            propertyCount.innerText = `${data.pagination.total} properties found`;

            if (!data.properties || data.properties.length === 0 ) {
                noProperties.style.display ='block';
                return;
            }
            propertyListing.innerHTML =
                data.properties
                    .map(function (property) {
                        return renderProperty(
                            property
                        );
                    })
                    .join('');
            renderPagination(
                data.pagination
            );
        })
        .catch(function (error) {
            propertyLoading.style.display = 'none';
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
    function renderProperty(property)
    {
        let imageHtml = '';
        if (
            property.images &&
            property.images.length > 0
        ) {
            const image = property.images[0];
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
        const purpose =
            property.purpose
                ? capitalize(property.purpose)
                : 'Property';
        let categoryName =
            'Property';
        if (
            property.property_category
        ) {
            categoryName =
                property.property_category.name;
        }
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
        const location = locationParts.join(', ');
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
        return `
            <div class="col-xl-4 col-lg-6 col-md-6 col-12">
                <div class="property-card">    
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
    function renderPagination(pagination)
    {
        if (
            pagination.last_page <= 1
        ) {
            return;
        }
        let html = '';
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


        /*
        |--------------------------------------------------------------------------
        | Clear Category-Wise Filters
        |--------------------------------------------------------------------------
        */

        document
            .querySelectorAll(
                '.category-wise-panel input, .category-wise-panel select, .category-wise-panel textarea'
            )
            .forEach(function (field) {

                if (field.type === 'checkbox' || field.type === 'radio') {

                    field.checked = false;

                } else {

                    field.value = '';

                }

            });

        document
            .querySelectorAll(
                '.category-wise-panel'
            )
            .forEach(function (panel) {

                panel.style.display = 'none';

                panel
                    .querySelectorAll(
                        'input, select, textarea'
                    )
                    .forEach(function (field) {

                        field.disabled = true;

                    });

            });


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
    | Category-Wise Filter Change
    |--------------------------------------------------------------------------
    */

    document.addEventListener(
        'change',
        function (event) {

            if (
                event.target.matches(
                    '.category-wise-panel input, .category-wise-panel select, .category-wise-panel textarea'
                )
            ) {

                loadProperties(1);

            }

        }
    );


    /*
    |--------------------------------------------------------------------------
    | Category-Wise Text Input
    |--------------------------------------------------------------------------
    | Debounce text/number entry so typing does not create a request
    | for every single character.
    |--------------------------------------------------------------------------
    */

    let categoryFilterTimer = null;

    document.addEventListener(
        'input',
        function (event) {

            if (
                !event.target.matches(
                    '.category-wise-panel input[type="text"], .category-wise-panel input[type="number"]'
                )
            ) {

                return;

            }

            clearTimeout(
                categoryFilterTimer
            );

            categoryFilterTimer =
                setTimeout(
                    function () {

                        loadProperties(1);

                    },
                    450
                );

        }
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



<script>
document.addEventListener('DOMContentLoaded', function () {

    const categorySelect =
        document.getElementById('property_category_id');

    const panels = {
        residential:
            document.getElementById('residentialFilters'),

        commercial:
            document.getElementById('commercialFilters'),

        land:
            document.getElementById('landFilters'),

        rental:
            document.getElementById('rentalFilters'),

        resale:
            document.getElementById('resaleFilters'),

        project:
            document.getElementById('newProjectFilters')
    };

    function normalizeCategory(value) {

        return String(value || '')
            .toLowerCase()
            .trim()
            .replace(/[_-]+/g, ' ')
            .replace(/\s+/g, ' ');
    }

    function hidePanels() {

        Object.values(panels)
            .forEach(function (panel) {

                if (!panel) {
                    return;
                }

                panel.style.display =
                    'none';

                panel
                    .querySelectorAll(
                        'input, select, textarea'
                    )
                    .forEach(function (field) {

                        field.disabled =
                            true;

                    });

            });
    }

    function showCategoryPanel() {

        hidePanels();

        if (!categorySelect) {
            return;
        }

        const option =
            categorySelect.options[
                categorySelect.selectedIndex
            ];

        if (
            !option ||
            !option.value
        ) {
            return;
        }

        const category =
            normalizeCategory(
                option.textContent
            );

        let panel = null;

        if (
            category.includes('residential') ||
            category.includes('resident') ||
            category.includes('apartment') ||
            category.includes('villa') ||
            category.includes('house')
        ) {

            panel =
                panels.residential;

        } else if (
            category.includes('commercial') ||
            category.includes('office') ||
            category.includes('shop') ||
            category.includes('warehouse') ||
            category.includes('showroom')
        ) {

            panel =
                panels.commercial;

        } else if (
            category.includes('land') ||
            category.includes('plot') ||
            category.includes('agricultural')
        ) {

            panel =
                panels.land;

        } else if (
            category.includes('rental') ||
            category.includes('rent')
        ) {

            panel =
                panels.rental;

        } else if (
            category.includes('resale')
        ) {

            panel =
                panels.resale;

        } else if (
            category.includes('new project') ||
            category.includes('project')
        ) {

            panel =
                panels.project;

        }

        if (!panel) {
            return;
        }

        panel.style.display =
            'block';

        panel
            .querySelectorAll(
                'input, select, textarea'
            )
            .forEach(function (field) {

                field.disabled =
                    false;

            });

        if (
            typeof feather !== 'undefined'
        ) {

            feather.replace();

        }
    }

    if (categorySelect) {

        categorySelect.addEventListener(
            'change',
            showCategoryPanel
        );

        showCategoryPanel();

    }

});
</script>

@endsection

<script>
document.addEventListener('change', function (event) {
    if (!event.target.classList.contains('amenity-checkbox')) {
        return;
    }

    /*
     * The original AJAX script handles filtering.
     * This delegated listener intentionally does not make a second request.
     * It only refreshes Feather icons when the dynamic amenity markup changes.
     */
    if (typeof feather !== 'undefined') {
        feather.replace();
    }
});
</script>
