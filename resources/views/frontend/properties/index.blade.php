@extends('layouts.app')
@section('title', 'Properties')
@section('content')
<style>
    .property-page {
        background: #f7f8fa;
        min-height: 100vh;
        padding: 50px 0 70px;
    }
    .property-page-header {
        margin-bottom: 30px;
    }
    .property-page-header h1 {
        color: #1f2937;
        font-size: 34px;
        font-weight: 700;
        margin-bottom: 8px;
    }
    .property-page-header p {
        color: #6b7280;
        font-size: 15px;
        margin-bottom: 0;
    }
    .property-filter {
        background: #ffffff;
        border: 1px solid #eeeeee;
        border-radius: 14px;
        padding: 25px;
        position: sticky;
        top: 20px;
        box-shadow: 0 5px 25px rgba(0, 0, 0, 0.05);
    }
    .filter-header {
        display: flex;
        align-items: center;
        gap: 10px;
        padding-bottom: 18px;
        margin-bottom: 20px;
        border-bottom: 1px solid #eeeeee;
    }
    .filter-header i {
        color: #dc2626;
        font-size: 20px;
    }
    .filter-header h3 {
        color: #1f2937;
        font-size: 20px;
        font-weight: 700;
        margin: 0;
    }
    .filter-group {
        margin-bottom: 20px;
    }
    .filter-group label {
        display: block;
        color: #374151;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 8px;
    }
    .filter-group .form-select,
    .filter-group .form-control {
        width: 100%;
        height: 46px;
        border: 1px solid #e1e5ea;
        border-radius: 8px;
        color: #374151;
        background-color: #ffffff;
        font-size: 14px;
        box-shadow: none;
    }
    .filter-group .form-select:focus,
    .filter-group .form-control:focus {
        border-color: #dc2626;
        box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.08);
    }
    .price-inputs {
        display: flex;
        gap: 10px;
    }
    .price-inputs .form-control {
        width: 50%;
    }
    .price-help {
        display: block;
        color: #9ca3af;
        font-size: 12px;
        margin-top: 7px;
    }
    .filter-buttons {
        display: flex;
        gap: 10px;
        margin-top: 25px;
    }
    .filter-btn,
    .reset-btn {
        width: 50%;
        height: 46px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s ease;
    }
    .filter-btn {
        border: 1px solid #dc2626;
        background: #dc2626;
        color: #ffffff;
    }
    .filter-btn:hover {
        background: #b91c1c;
        border-color: #b91c1c;
    }
    .reset-btn {
        border: 1px solid #e1e5ea;
        background: #ffffff;
        color: #374151;
    }
    .reset-btn:hover {
        border-color: #dc2626;
        color: #dc2626;
    }
    .property-result-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: #ffffff;
        border: 1px solid #eeeeee;
        border-radius: 12px;
        padding: 15px 20px;
        margin-bottom: 20px;
    }
    .property-result-header h3 {
        color: #1f2937;
        font-size: 20px;
        font-weight: 700;
        margin: 0;
    }
    .property-count {
        color: #6b7280;
        font-size: 14px;
    }
    .property-card {
        height: 100%;
        overflow: hidden;
        background: #ffffff;
        border: 1px solid #eeeeee;
        border-radius: 14px;
        transition: all 0.3s ease;
    }
    .property-card:hover {
        transform: translateY(-4px);
        border-color: #e5e7eb;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.09);
    }
    .property-card-image {
        height: 235px;
        overflow: hidden;
        position: relative;
        background: #f3f4f6;
    }
    .property-card-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform 0.4s ease;
    }
    .property-card:hover .property-card-image img {
        transform: scale(1.05);
    }
    .property-image-placeholder {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        color: #9ca3af;
        background: #f3f4f6;
    }
    .property-image-placeholder i {
        font-size: 40px;
        margin-bottom: 5px;
    }
    .property-category {
        position: absolute;
        top: 15px;
        left: 15px;
        padding: 6px 13px;
        background: #dc2626;
        color: #ffffff;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        z-index: 2;
    }
    .property-card-body {
        padding: 20px;
    }
    .property-price {
        color: #dc2626;
        font-size: 22px;
        font-weight: 700;
        line-height: 1.2;
        margin-bottom: 8px;
    }
    .property-price-rent {
        color: #6b7280;
        font-size: 13px;
        font-weight: 500;
    }
    .property-title {
        color: #1f2937;
        font-size: 19px;
        font-weight: 700;
        line-height: 1.4;
        margin: 0 0 8px;
    }
    .property-location {
        min-height: 38px;
        color: #6b7280;
        font-size: 13px;
        line-height: 1.5;
        margin-bottom: 17px;
    }
    .property-location i {
        color: #dc2626;
        margin-right: 4px;
    }
    .property-features {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 10px 15px;
        padding: 14px 0;
        margin-bottom: 16px;
        border-top: 1px solid #eeeeee;
        border-bottom: 1px solid #eeeeee;
    }
    .property-feature {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        color: #6b7280;
        font-size: 12px;
        white-space: nowrap;
    }
    .property-feature i {
        color: #dc2626;
        font-size: 14px;
    }
    .property-card-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 10px;
    }
    .property-code {
        max-width: 100px;
        overflow: hidden;
        color: #9ca3af;
        font-size: 11px;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    .property-view-btn {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        color: #dc2626;
        font-size: 13px;
        font-weight: 700;
        text-decoration: none;
        transition: all 0.2s ease;
    }
    .property-view-btn:hover {
        color: #991b1b;
    }
    .property-view-btn i {
        transition: transform 0.2s ease;
    }
    .property-view-btn:hover i {
        transform: translateX(3px);
    }
    #propertyLoader {
        display: none;
        text-align: center;
        padding: 50px 20px;
    }
    #propertyLoader .spinner-border {
        width: 35px;
        height: 35px;
    }
    #propertyLoader p {
        color: #6b7280;
        margin-top: 10px;
        margin-bottom: 0;
        font-size: 14px;
    }
    .no-property {
        width: 100%;
        background: #ffffff;
        border: 1px solid #eeeeee;
        border-radius: 14px;
        padding: 70px 20px;
        text-align: center;
    }
    .no-property i {
        display: block;
        color: #d1d5db;
        font-size: 55px;
        margin-bottom: 15px;
    }
    .no-property h4 {
        color: #1f2937;
        font-size: 20px;
        font-weight: 700;
        margin-bottom: 8px;
    }
    .no-property p {
        color: #6b7280;
        font-size: 14px;
        margin: 0;
    }
    @media (max-width: 991px) {
        .property-filter {
            position: relative;
            top: 0;
        }
    }
    @media (max-width: 575px) {
        .property-page {
            padding: 30px 0 50px;
        }
        .property-page-header h1 {
            font-size: 28px;
        }
        .property-result-header {
            padding: 14px;
        }
        .property-result-header h3 {
            font-size: 17px;
        }
        .property-count {
            font-size: 12px;
        }
        .price-inputs {
            flex-direction: column;
        }
        .price-inputs .form-control {
            width: 100%;
        }
    }
</style>
<section class="property-page">
    <div class="container">
        <div class="property-page-header">
            <h1>
                Explore Properties
            </h1>
            <p>
                Find the perfect property that matches your requirements.
            </p>
        </div>
        <div class="row g-4">
            <div class="col-lg-3">
                <div class="property-filter">
                    <div class="filter-header">
                        <i class="bi bi-funnel-fill"></i>
                        <h3>
                            Filter Properties
                        </h3>
                    </div>
                    <div class="filter-group">
                        <label for="categoryFilter">
                            Property Category
                        </label>
                        <select id="categoryFilter"  class="form-select">
                            <option value="">
                                All Categories
                            </option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="filter-group">
                        <label for="stateFilter">
                            State
                        </label>
                        <select id="stateFilter" class="form-select">
                            <option value="">
                                All States
                            </option>
                            @foreach($states as $state)
                                <option value="{{ $state->id }}">
                                    {{ $state->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="filter-group">
                        <label for="cityFilter">
                            City
                        </label>
                        <select  id="cityFilter"  class="form-select" >
                            <option value="">
                                All Cities
                            </option>
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}">
                                    {{ $city->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="filter-group">
                        <label for="areaFilter">
                            Area
                        </label>
                        <select  id="areaFilter" class="form-select" >
                            <option value="">
                                All Areas
                            </option>
                            @foreach($areas as $area)
                                <option value="{{ $area->id }}">
                                    {{ $area->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="filter-group">
                        <label>
                            Price Range
                        </label>
                        <div class="price-inputs">
                            <input  type="number"  id="minPrice" class="form-control" placeholder="Min Amount"   min="0">
                            <input type="number" id="maxPrice" class="form-control"  placeholder="Max Amount" min="0" >
                        </div>
                        <small class="price-help">
                            Enter minimum and maximum amount.
                        </small>
                    </div>
                    <div class="filter-buttons">
                        <button  type="button" id="applyFilter"  class="filter-btn" >
                            <i class="bi bi-search me-1"></i>
                            Apply
                        </button>
                        <button type="button" id="resetFilter" class="reset-btn">
                            Reset
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="property-result-header">
                    <h3>
                        Available Properties
                    </h3>
                    <span  id="propertyCount" class="property-count">
                        {{ $properties->count() }} Properties
                    </span>
                </div>
                <div id="propertyLoader">
                    <div class="spinner-border text-danger" role="status"></div>
                    <p>
                        Finding properties...
                    </p>
                </div>
                <div id="propertyList" class="row g-4">
                    @forelse($properties as $property)
                        <div class="col-xl-6 col-lg-6 col-md-6">
                            <div class="property-card">
                                <div class="property-card-image">
                                    @if($property->images->count() > 0)
                                        <img src="{{ asset('storage/' . $property->images->first()->image) }}"  alt="{{ $property->title }}">
                                    @else
                                        <div class="property-image-placeholder">
                                            <i class="bi bi-house"></i>
                                            <span>
                                                No Image
                                            </span>
                                        </div>
                                    @endif
                                    @if($property->propertyCategory)
                                        <span class="property-category">
                                            {{ $property->propertyCategory->name }}
                                        </span>
                                    @endif
                                </div>
                                <div class="property-card-body">
                                    @if($property->price)
                                        <div class="property-price">
                                            ₹{{ number_format($property->price) }}
                                        </div>
                                    @elseif($property->monthly_rent)
                                        <div class="property-price">
                                            ₹{{ number_format($property->monthly_rent) }}
                                            <span class="property-price-rent">
                                                / Month
                                            </span>
                                        </div>
                                    @endif
                                    <h4 class="property-title">
                                        {{ $property->title }}
                                    </h4>
                                    <p class="property-location">
                                        <i class="bi bi-geo-alt-fill"></i>
                                        @if($property->propertyArea)
                                            {{ $property->propertyArea->name }}
                                        @endif
                                        @if($property->city)
                                            @if($property->propertyArea)
                                               ,
                                            @endif
                                            {{ $property->city->name }}
                                        @endif
                                        @if($property->state)
                                            @if($property->city)
                                                ,
                                            @endif
                                            {{ $property->state->name }}
                                        @endif
                                    </p>
                                    <div class="property-features">
                                        <span class="property-feature">
                                            <i class="bi bi-rulers"></i>
                                            {{ $property->area ?? '-' }}
                                            {{ $property->area_unit ?? 'sq.ft' }}
                                        </span>
                                        <span class="property-feature">
                                            <i class="bi bi-door-open"></i>
                                            {{ $property->bedrooms ?? '-' }}
                                            Beds
                                        </span>
                                        <span class="property-feature">
                                            <i class="bi bi-droplet-fill"></i>
                                            {{ $property->bathrooms ?? '-' }}
                                            Baths
                                        </span>
                                        @if($property->parking ||  $property->car_parking)
                                            <span class="property-feature">
                                                <i class="bi bi-car-front-fill"></i>
                                                Parking
                                            </span>
                                        @endif
                                    </div>
                                    <div class="property-card-footer">
                                        <span class="property-code">
                                            {{ $property->property_code ?? 'Property' }}
                                        </span>
                                        @auth
                                            <a href="{{ route('properties.show', $property->id) }}"  class="property-view-btn" >
                                                View Details
                                                <i class="bi bi-arrow-right"></i>
                                            </a>
                                        @else
                                            <a  href="{{ route('buyer.login') }}" class="property-view-btn">
                                                View Details
                                                <i class="bi bi-arrow-right"></i>
                                            </a>
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="no-property">
                                <i class="bi bi-house-x"></i>
                                <h4>
                                    No Properties Found
                                </h4>
                                <p>
                                    Try changing your filters.
                                </p>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const categoryFilter = document.getElementById('categoryFilter');
    const stateFilter = document.getElementById('stateFilter');
    const cityFilter = document.getElementById('cityFilter');
    const areaFilter = document.getElementById('areaFilter');
    const minPrice = document.getElementById('minPrice');
    const maxPrice = document.getElementById('maxPrice');
    const applyFilter = document.getElementById('applyFilter');
    const resetFilter = document.getElementById('resetFilter');
    const propertyList = document.getElementById('propertyList');
    const propertyLoader = document.getElementById('propertyLoader');
    const propertyCount = document.getElementById('propertyCount');
    function loadProperties() {
        if (minPrice.value !== '' && maxPrice.value !== '' && Number(minPrice.value) > Number(maxPrice.value)) {
            alert(
                'Minimum price cannot be greater than maximum price.'
            );
            return;
        }
        const params = new URLSearchParams();
        if (categoryFilter.value) {
            params.append(
                'category_id',
                categoryFilter.value
            );
        }
        if (stateFilter.value) {
            params.append(
                'state_id',
                stateFilter.value
            );
        }
        if (cityFilter.value) {
            params.append(
                'city_id',
                cityFilter.value
            );
        }
        if (areaFilter.value) {
            params.append(
                'area_id',
                areaFilter.value
            );
        }
        if (minPrice.value !== '') {
            params.append(
                'min_price',
                minPrice.value
            );
        }
        if (maxPrice.value !== '') {
            params.append(
                'max_price',
                maxPrice.value
            );
        }
        if (params.toString() === '') {
            window.location.href =
                "{{ route('frontend.properties') }}";

            return;
        }
        propertyLoader.style.display = 'block';
        propertyList.style.opacity = '0.4';
        const url =
            "{{ route('frontend.properties') }}" +
            '?' +
            params.toString();
        fetch(url, {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }

        })
        .then(response => {
            if (!response.ok) {
                throw new Error(
                    'Unable to load properties.'
                );
            }
            return response.json();
        })
        .then(data => {
            propertyList.innerHTML = data.html;
            propertyCount.innerText = data.count + ' Properties';
        })
        .catch(error => {
            console.error(error);
            propertyList.innerHTML = `
                <div class="col-12">
                    <div class="alert alert-danger">
                       Unable to load properties. Please try again.
                    </div>
                </div>
            `;
        })
        .finally(() => {
            propertyLoader.style.display = 'none';
            propertyList.style.opacity ='1';
        });
    }
    applyFilter.addEventListener(
        'click',
        function () {
            loadProperties();

        }
    );
    categoryFilter.addEventListener(
        'change',
        function () {
            loadProperties();

        }
    );
    stateFilter.addEventListener(
        'change',
        function () {
            loadProperties();

        }
    );
    cityFilter.addEventListener(
        'change',
        function () {

            loadProperties();

        }
    );
    areaFilter.addEventListener(
        'change',
        function () {
            loadProperties();

        }
    );
    resetFilter.addEventListener(
        'click',
        function () {
            categoryFilter.value = '';
            stateFilter.value = '';
            cityFilter.value = '';
            areaFilter.value = '';
            minPrice.value = '';
            maxPrice.value = '';
            window.location.href ="{{ route('frontend.properties') }}";
        }
    );
});
</script>
@endsection