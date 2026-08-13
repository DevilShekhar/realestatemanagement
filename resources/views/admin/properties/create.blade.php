@can('create properties')
@extends('admin.layouts.app')

@section('content')
<section class="section">

     <div class="section-header">
        <h1>Create Property</h1>
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
                Create Property
            </div>
        </div>
    </div>
    <div class="section-body">

        {{-- Validation Errors --}}
        @if($errors->any())

            <div class="alert alert-danger alert-dismissible fade show">

                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

                <button type="button"
                        class="close"
                        data-dismiss="alert">
                    <span>&times;</span>
                </button>

            </div>

        @endif


        <div class="row">
            <div class="col-12">

                <div class="card">

                    <div class="card-header">
                        <h4>Property Information</h4>
                    </div>


                    <form action="{{ route('properties.store') }}"
                          method="POST">

                        @csrf

                        <div class="card-body">

                            {{-- =====================================================
                                BASIC INFORMATION
                            ====================================================== --}}

                            <div class="row">

                                {{-- Property Category --}}
                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label for="property_category_id">
                                            Property Category
                                            <span class="text-danger">*</span>
                                        </label>

                                        <select
                                            name="property_category_id"
                                            id="property_category_id"
                                            class="form-control @error('property_category_id') is-invalid @enderror">

                                            <option value="">
                                                Select Property Category
                                            </option>

                                            @foreach($categories as $category)

                                                <option
                                                    value="{{ $category->id }}"
                                                    data-category="{{ strtolower($category->name) }}"
                                                    {{ old('property_category_id') == $category->id ? 'selected' : '' }}>

                                                    {{ $category->name }}

                                                </option>

                                            @endforeach

                                        </select>

                                        @error('property_category_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                    </div>

                                </div>


                                {{-- Purpose --}}
                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label for="purpose">
                                            Purpose
                                        </label>

                                        <select
                                            name="purpose"
                                            id="purpose"
                                            class="form-control @error('purpose') is-invalid @enderror">

                                            <option value="">
                                                Select Purpose
                                            </option>

                                            <option value="sale"
                                                {{ old('purpose') == 'sale' ? 'selected' : '' }}>
                                                Sale
                                            </option>

                                            <option value="rent"
                                                {{ old('purpose') == 'rent' ? 'selected' : '' }}>
                                                Rent
                                            </option>

                                        </select>

                                        @error('purpose')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                    </div>

                                </div>


                                {{-- Property Title --}}
                                <div class="col-md-12">

                                    <div class="form-group">

                                        <label for="title">
                                            Property Title
                                            <span class="text-danger">*</span>
                                        </label>

                                        <input
                                            type="text"
                                            name="title"
                                            id="title"
                                            class="form-control @error('title') is-invalid @enderror"
                                            value="{{ old('title') }}"
                                            placeholder="Enter property title">

                                        @error('title')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                    </div>

                                </div>

                            </div>


                            {{-- =====================================================
                                LOCATION
                            ====================================================== --}}

                            <div class="section-title">
                                Property Location
                            </div>

                            <div class="row">

                                {{-- Country --}}
                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label for="country_id">
                                            Country
                                            <span class="text-danger">*</span>
                                        </label>

                                        <select
                                            name="country_id"
                                            id="country_id"
                                            class="form-control @error('country_id') is-invalid @enderror">

                                            <option value="">
                                                Select Country
                                            </option>

                                            @foreach($countries as $country)

                                                <option
                                                    value="{{ $country->id }}"
                                                    {{ old('country_id') == $country->id ? 'selected' : '' }}>

                                                    {{ $country->name }}

                                                </option>

                                            @endforeach

                                        </select>

                                        @error('country_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                    </div>

                                </div>


                                {{-- State --}}
                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label for="state_id">
                                            State
                                            <span class="text-danger">*</span>
                                        </label>

                                        <select
                                            name="state_id"
                                            id="state_id"
                                            class="form-control @error('state_id') is-invalid @enderror">

                                            <option value="">
                                                Select Country First
                                            </option>

                                            @foreach($states as $state)

                                                <option
                                                    value="{{ $state->id }}"
                                                    data-country="{{ $state->country_id }}">

                                                    {{ $state->name }}

                                                </option>

                                            @endforeach

                                        </select>

                                        @error('state_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                    </div>

                                </div>


                                {{-- City --}}
                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label for="city_id">
                                            City
                                            <span class="text-danger">*</span>
                                        </label>

                                        <select
                                            name="city_id"
                                            id="city_id"
                                            class="form-control @error('city_id') is-invalid @enderror">

                                            <option value="">
                                                Select State First
                                            </option>

                                            @foreach($cities as $city)

                                                <option
                                                    value="{{ $city->id }}"
                                                    data-country="{{ $city->country_id }}"
                                                    data-state="{{ $city->state_id }}">

                                                    {{ $city->name }}

                                                </option>

                                            @endforeach

                                        </select>

                                        @error('city_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                    </div>

                                </div>


                                {{-- Area --}}
                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label for="area_id">
                                            Area
                                            <span class="text-danger">*</span>
                                        </label>

                                        <select
                                            name="area_id"
                                            id="area_id"
                                            class="form-control @error('area_id') is-invalid @enderror">

                                            <option value="">
                                                Select City First
                                            </option>

                                            @foreach($areas as $area)

                                                <option
                                                    value="{{ $area->id }}"
                                                    data-country="{{ $area->country_id }}"
                                                    data-state="{{ $area->state_id }}"
                                                    data-city="{{ $area->city_id }}">

                                                    {{ $area->name }}

                                                </option>

                                            @endforeach

                                        </select>

                                        @error('area_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                    </div>

                                </div>


                                {{-- Address --}}
                                <div class="col-md-12">

                                    <div class="form-group">

                                        <label for="address">
                                            Address
                                        </label>

                                        <textarea
                                            name="address"
                                            id="address"
                                            rows="3"
                                            class="form-control"
                                            placeholder="Enter complete property address">{{ old('address') }}</textarea>

                                    </div>

                                </div>


                                {{-- Landmark --}}
                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label for="landmark">
                                            Landmark
                                        </label>

                                        <input
                                            type="text"
                                            name="landmark"
                                            id="landmark"
                                            class="form-control"
                                            value="{{ old('landmark') }}"
                                            placeholder="Enter landmark">

                                    </div>

                                </div>


                                {{-- Pincode --}}
                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label for="pincode">
                                            Pincode
                                        </label>

                                        <input
                                            type="text"
                                            name="pincode"
                                            id="pincode"
                                            class="form-control"
                                            value="{{ old('pincode') }}"
                                            placeholder="Enter pincode">

                                    </div>

                                </div>

                            </div>


                            {{-- =====================================================
                                COMMON PROPERTY INFORMATION
                            ====================================================== --}}

                            <div class="section-title">
                                Property Details
                            </div>

                            <div class="row">

                                {{-- Price --}}
                                <div class="col-md-4">

                                    <div class="form-group">

                                        <label for="price">
                                            Price
                                        </label>

                                        <input
                                            type="number"
                                            name="price"
                                            id="price"
                                            step="0.01"
                                            min="0"
                                            class="form-control"
                                            value="{{ old('price') }}"
                                            placeholder="Enter price">

                                    </div>

                                </div>


                                {{-- Property Area --}}
                                <div class="col-md-4">

                                    <div class="form-group">

                                        <label for="area">
                                            Property Area
                                        </label>

                                        <input
                                            type="number"
                                            name="area"
                                            id="area"
                                            step="0.01"
                                            min="0"
                                            class="form-control"
                                            value="{{ old('area') }}"
                                            placeholder="Enter area">

                                    </div>

                                </div>


                                {{-- Area Unit --}}
                                <div class="col-md-4">

                                    <div class="form-group">

                                        <label for="area_unit">
                                            Area Unit
                                        </label>

                                        <select
                                            name="area_unit"
                                            id="area_unit"
                                            class="form-control">

                                            <option value="">
                                                Select Unit
                                            </option>

                                            <option value="sq.ft"
                                                {{ old('area_unit') == 'sq.ft' ? 'selected' : '' }}>
                                                Sq. Ft.
                                            </option>

                                            <option value="sq.m"
                                                {{ old('area_unit') == 'sq.m' ? 'selected' : '' }}>
                                                Sq. Meter
                                            </option>

                                            <option value="sq.yd"
                                                {{ old('area_unit') == 'sq.yd' ? 'selected' : '' }}>
                                                Sq. Yard
                                            </option>

                                            <option value="acre"
                                                {{ old('area_unit') == 'acre' ? 'selected' : '' }}>
                                                Acre
                                            </option>

                                            <option value="hectare"
                                                {{ old('area_unit') == 'hectare' ? 'selected' : '' }}>
                                                Hectare
                                            </option>

                                        </select>

                                    </div>

                                </div>


                                {{-- Built Up Area --}}
                                <div class="col-md-4">

                                    <div class="form-group">

                                        <label for="built_up_area">
                                            Built-up Area
                                        </label>

                                        <input
                                            type="number"
                                            name="built_up_area"
                                            id="built_up_area"
                                            step="0.01"
                                            min="0"
                                            class="form-control"
                                            value="{{ old('built_up_area') }}"
                                            placeholder="Enter built-up area">

                                    </div>

                                </div>


                                {{-- Carpet Area --}}
                                <div class="col-md-4">

                                    <div class="form-group">

                                        <label for="carpet_area">
                                            Carpet Area
                                        </label>

                                        <input
                                            type="number"
                                            name="carpet_area"
                                            id="carpet_area"
                                            step="0.01"
                                            min="0"
                                            class="form-control"
                                            value="{{ old('carpet_area') }}"
                                            placeholder="Enter carpet area">

                                    </div>

                                </div>


                                {{-- Parking --}}
                                <div class="col-md-4">

                                    <div class="form-group">

                                        <label for="parking">
                                            Parking
                                        </label>

                                        <input
                                            type="number"
                                            name="parking"
                                            id="parking"
                                            min="0"
                                            class="form-control"
                                            value="{{ old('parking') }}"
                                            placeholder="Number of parking spaces">

                                    </div>

                                </div>

                            </div>


                            {{-- =====================================================
                                RESIDENTIAL FIELDS
                            ====================================================== --}}

                            <div id="residential-fields"
                                 class="category-fields">

                                <div class="section-title">
                                    Residential Details
                                </div>

                                <div class="row">

                                    {{-- BHK --}}
                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label for="bhk">
                                                BHK
                                            </label>

                                            <input
                                                type="number"
                                                name="bhk"
                                                id="bhk"
                                                min="0"
                                                class="form-control"
                                                value="{{ old('bhk') }}"
                                                placeholder="Example: 2">

                                        </div>

                                    </div>
                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label for="monthly_rent">
                                                Monthly Rent
                                            </label>

                                            <input
                                                type="number"
                                                name="monthly_rent"
                                                id="monthly_rent"
                                                min="0"
                                                class="form-control"
                                                value="{{ old('monthly_rent') }}"
                                                placeholder="Example: 2000">

                                        </div>

                                    </div>


                                    {{-- Bedrooms --}}
                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label for="bedrooms">
                                                Bedrooms
                                            </label>

                                            <input
                                                type="number"
                                                name="bedrooms"
                                                id="bedrooms"
                                                min="0"
                                                class="form-control"
                                                value="{{ old('bedrooms') }}"
                                                placeholder="Number of bedrooms">

                                        </div>

                                    </div>


                                    {{-- Bathrooms --}}
                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label for="bathrooms">
                                                Bathrooms
                                            </label>

                                            <input
                                                type="number"
                                                name="bathrooms"
                                                id="bathrooms"
                                                min="0"
                                                class="form-control"
                                                value="{{ old('bathrooms') }}"
                                                placeholder="Number of bathrooms">

                                        </div>

                                    </div>


                                    {{-- Balconies --}}
                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label for="balconies">
                                                Balconies
                                            </label>

                                            <input
                                                type="number"
                                                name="balconies"
                                                id="balconies"
                                                min="0"
                                                class="form-control"
                                                value="{{ old('balconies') }}"
                                                placeholder="Number of balconies">

                                        </div>

                                    </div>


                                    {{-- Facing --}}
                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label for="facing">
                                                Facing
                                            </label>

                                            <select
                                                name="facing"
                                                id="facing"
                                                class="form-control">

                                                <option value="">
                                                    Select Facing
                                                </option>

                                                @foreach([
                                                    'North',
                                                    'South',
                                                    'East',
                                                    'West',
                                                    'North-East',
                                                    'North-West',
                                                    'South-East',
                                                    'South-West'
                                                ] as $direction)

                                                    <option
                                                        value="{{ $direction }}"
                                                        {{ old('facing') == $direction ? 'selected' : '' }}>

                                                        {{ $direction }}

                                                    </option>

                                                @endforeach

                                            </select>

                                        </div>

                                    </div>


                                    {{-- Floor --}}
                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label for="floor_number">
                                                Floor Number
                                            </label>

                                            <input
                                                type="number"
                                                name="floor_number"
                                                id="floor_number"
                                                min="0"
                                                class="form-control"
                                                value="{{ old('floor_number') }}"
                                                placeholder="Floor number">

                                        </div>

                                    </div>


                                    {{-- Total Floors --}}
                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label for="total_floors">
                                                Total Floors
                                            </label>

                                            <input
                                                type="number"
                                                name="total_floors"
                                                id="total_floors"
                                                min="0"
                                                class="form-control"
                                                value="{{ old('total_floors') }}"
                                                placeholder="Total floors">

                                        </div>

                                    </div>


                                    {{-- Furnishing --}}
                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label for="furnishing">
                                                Furnishing
                                            </label>

                                            <select
                                                name="furnishing"
                                                id="furnishing"
                                                class="form-control">

                                                <option value="">
                                                    Select Furnishing
                                                </option>

                                                <option value="Unfurnished"
                                                    {{ old('furnishing') == 'Unfurnished' ? 'selected' : '' }}>
                                                    Unfurnished
                                                </option>

                                                <option value="Semi Furnished"
                                                    {{ old('furnishing') == 'Semi Furnished' ? 'selected' : '' }}>
                                                    Semi Furnished
                                                </option>

                                                <option value="Fully Furnished"
                                                    {{ old('furnishing') == 'Fully Furnished' ? 'selected' : '' }}>
                                                    Fully Furnished
                                                </option>

                                            </select>

                                        </div>

                                    </div>


                                    {{-- Construction Year --}}
                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label for="construction_year">
                                                Construction Year
                                            </label>

                                            <input
                                                type="number"
                                                name="construction_year"
                                                id="construction_year"
                                                min="1900"
                                                max="{{ date('Y') }}"
                                                class="form-control"
                                                value="{{ old('construction_year') }}"
                                                placeholder="YYYY">

                                        </div>

                                    </div>


                                    {{-- Ownership --}}
                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label for="ownership">
                                                Ownership
                                            </label>

                                            <input
                                                type="text"
                                                name="ownership"
                                                id="ownership"
                                                class="form-control"
                                                value="{{ old('ownership') }}"
                                                placeholder="Ownership">

                                        </div>

                                    </div>

                                </div>

                            </div>


                            {{-- =====================================================
                                COMMERCIAL FIELDS
                            ====================================================== --}}

                            <div id="commercial-fields"
                                 class="category-fields">

                                <div class="section-title">
                                    Commercial Details
                                </div>

                                <div class="row">

                                    {{-- Commercial Type --}}
                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label for="commercial_type">
                                                Commercial Type
                                            </label>

                                            <select
                                                name="commercial_type"
                                                id="commercial_type"
                                                class="form-control">

                                                <option value="">
                                                    Select Type
                                                </option>

                                                <option value="Office"
                                                    {{ old('commercial_type') == 'Office' ? 'selected' : '' }}>
                                                    Office
                                                </option>

                                                <option value="Shop"
                                                    {{ old('commercial_type') == 'Shop' ? 'selected' : '' }}>
                                                    Shop
                                                </option>

                                                <option value="Warehouse"
                                                    {{ old('commercial_type') == 'Warehouse' ? 'selected' : '' }}>
                                                    Warehouse
                                                </option>

                                                <option value="Showroom"
                                                    {{ old('commercial_type') == 'Showroom' ? 'selected' : '' }}>
                                                    Showroom
                                                </option>

                                            </select>

                                        </div>

                                    </div>


                                    {{-- Business Type --}}
                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label for="business_type">
                                                Business Type
                                            </label>

                                            <input
                                                type="text"
                                                name="business_type"
                                                id="business_type"
                                                class="form-control"
                                                value="{{ old('business_type') }}"
                                                placeholder="Business type">

                                        </div>

                                    </div>


                                    {{-- Washrooms --}}
                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label for="washrooms">
                                                Washrooms
                                            </label>

                                            <input
                                                type="number"
                                                name="washrooms"
                                                id="washrooms"
                                                min="0"
                                                class="form-control"
                                                value="{{ old('washrooms') }}"
                                                placeholder="Number of washrooms">

                                        </div>

                                    </div>


                                    {{-- Floor --}}
                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label>
                                                Floor Number
                                            </label>

                                            <input
                                                type="number"
                                                name="floor_number"
                                                min="0"
                                                class="form-control"
                                                value="{{ old('floor_number') }}"
                                                placeholder="Floor number">

                                        </div>

                                    </div>


                                    {{-- Total Floors --}}
                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label>
                                                Total Floors
                                            </label>

                                            <input
                                                type="number"
                                                name="total_floors"
                                                min="0"
                                                class="form-control"
                                                value="{{ old('total_floors') }}"
                                                placeholder="Total floors">

                                        </div>

                                    </div>


                                    {{-- Furnishing --}}
                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label>
                                                Furnishing
                                            </label>

                                            <select
                                                name="furnishing"
                                                class="form-control">

                                                <option value="">
                                                    Select Furnishing
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

                                </div>

                            </div>


                            {{-- =====================================================
                                LAND / PLOT FIELDS
                            ====================================================== --}}

                            <div id="land-fields"
                                 class="category-fields">

                                <div class="section-title">
                                    Land / Plot Details
                                </div>

                                <div class="row">

                                    {{-- Plot Area --}}
                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label for="plot_area">
                                                Plot Area
                                            </label>

                                            <input
                                                type="number"
                                                name="plot_area"
                                                id="plot_area"
                                                step="0.01"
                                                min="0"
                                                class="form-control"
                                                value="{{ old('plot_area') }}"
                                                placeholder="Plot area">

                                        </div>

                                    </div>


                                    {{-- Road Width --}}
                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label for="road_width">
                                                Road Width
                                            </label>

                                            <input
                                                type="number"
                                                name="road_width"
                                                id="road_width"
                                                step="0.01"
                                                min="0"
                                                class="form-control"
                                                value="{{ old('road_width') }}"
                                                placeholder="Road width">

                                        </div>

                                    </div>


                                    {{-- Road Width Unit --}}
                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label for="road_width_unit">
                                                Road Width Unit
                                            </label>

                                            <select
                                                name="road_width_unit"
                                                id="road_width_unit"
                                                class="form-control">

                                                <option value="">
                                                    Select Unit
                                                </option>

                                                <option value="ft">
                                                    Feet
                                                </option>

                                                <option value="m">
                                                    Meter
                                                </option>

                                            </select>

                                        </div>

                                    </div>


                                    {{-- Boundary Wall --}}
                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label for="boundary_wall">
                                                Boundary Wall
                                            </label>

                                            <select
                                                name="boundary_wall"
                                                id="boundary_wall"
                                                class="form-control">

                                                <option value="">
                                                    Select
                                                </option>

                                                <option value="1">
                                                    Yes
                                                </option>

                                                <option value="0">
                                                    No
                                                </option>

                                            </select>

                                        </div>

                                    </div>


                                    {{-- Land Type --}}
                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label for="land_type">
                                                Land Type
                                            </label>

                                            <input
                                                type="text"
                                                name="land_type"
                                                id="land_type"
                                                class="form-control"
                                                value="{{ old('land_type') }}"
                                                placeholder="Land type">

                                        </div>

                                    </div>


                                    {{-- Facing --}}
                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label>
                                                Facing
                                            </label>

                                            <select
                                                name="facing"
                                                class="form-control">

                                                <option value="">
                                                    Select Facing
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

                                </div>

                            </div>


                            {{-- =====================================================
                                RENTAL FIELDS
                            ====================================================== --}}

                            <div id="rental-fields"
                                 class="category-fields">

                                <div class="section-title">
                                    Rental Details
                                </div>

                                <div class="row">

                                    {{-- Monthly Rent --}}
                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label for="monthly_rent">
                                                Monthly Rent
                                            </label>

                                            <input
                                                type="number"
                                                name="monthly_rent"
                                                id="monthly_rent"
                                                step="0.01"
                                                min="0"
                                                class="form-control"
                                                value="{{ old('monthly_rent') }}"
                                                placeholder="Monthly rent">

                                        </div>

                                    </div>


                                    {{-- Security Deposit --}}
                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label for="security_deposit">
                                                Security Deposit
                                            </label>

                                            <input
                                                type="number"
                                                name="security_deposit"
                                                id="security_deposit"
                                                step="0.01"
                                                min="0"
                                                class="form-control"
                                                value="{{ old('security_deposit') }}"
                                                placeholder="Security deposit">

                                        </div>

                                    </div>


                                    {{-- Available From --}}
                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label for="available_from">
                                                Available From
                                            </label>

                                            <input
                                                type="date"
                                                name="available_from"
                                                id="available_from"
                                                class="form-control"
                                                value="{{ old('available_from') }}">

                                        </div>

                                    </div>


                                    {{-- Lease Period --}}
                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label for="lease_period">
                                                Lease Period
                                            </label>

                                            <input
                                                type="number"
                                                name="lease_period"
                                                id="lease_period"
                                                min="0"
                                                class="form-control"
                                                value="{{ old('lease_period') }}"
                                                placeholder="Lease period">

                                        </div>

                                    </div>


                                    {{-- Lease Period Unit --}}
                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label for="lease_period_unit">
                                                Lease Period Unit
                                            </label>

                                            <select
                                                name="lease_period_unit"
                                                id="lease_period_unit"
                                                class="form-control">

                                                <option value="">
                                                    Select Unit
                                                </option>

                                                <option value="month">
                                                    Month
                                                </option>

                                                <option value="year">
                                                    Year
                                                </option>

                                            </select>

                                        </div>

                                    </div>

                                </div>

                            </div>


                            {{-- =====================================================
                                RESALE FIELDS
                            ====================================================== --}}

                            <div id="resale-fields"
                                 class="category-fields">

                                <div class="section-title">
                                    Resale Details
                                </div>

                                <div class="row">

                                    {{-- Purchase Year --}}
                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label for="purchase_year">
                                                Purchase Year
                                            </label>

                                            <input
                                                type="number"
                                                name="purchase_year"
                                                id="purchase_year"
                                                min="1900"
                                                max="{{ date('Y') }}"
                                                class="form-control"
                                                value="{{ old('purchase_year') }}"
                                                placeholder="YYYY">

                                        </div>

                                    </div>


                                    {{-- Property Age --}}
                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label for="property_age">
                                                Property Age
                                            </label>

                                            <input
                                                type="number"
                                                name="property_age"
                                                id="property_age"
                                                min="0"
                                                class="form-control"
                                                value="{{ old('property_age') }}"
                                                placeholder="Property age">

                                        </div>

                                    </div>

                                </div>

                            </div>


                            {{-- =====================================================
                                NEW PROJECT FIELDS
                            ====================================================== --}}

                            <div id="new-project-fields"
                                 class="category-fields">

                                <div class="section-title">
                                    New Project Details
                                </div>

                                <div class="row">

                                    {{-- Project Name --}}
                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <label for="project_name">
                                                Project Name
                                            </label>

                                            <input
                                                type="text"
                                                name="project_name"
                                                id="project_name"
                                                class="form-control"
                                                value="{{ old('project_name') }}"
                                                placeholder="Project name">

                                        </div>

                                    </div>


                                    {{-- Developer --}}
                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <label for="developer_name">
                                                Developer Name
                                            </label>

                                            <input
                                                type="text"
                                                name="developer_name"
                                                id="developer_name"
                                                class="form-control"
                                                value="{{ old('developer_name') }}"
                                                placeholder="Developer name">

                                        </div>

                                    </div>


                                    {{-- Project Status --}}
                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label for="project_status">
                                                Project Status
                                            </label>

                                            <select
                                                name="project_status"
                                                id="project_status"
                                                class="form-control">

                                                <option value="">
                                                    Select Status
                                                </option>

                                                <option value="Upcoming">
                                                    Upcoming
                                                </option>

                                                <option value="Under Construction">
                                                    Under Construction
                                                </option>

                                                <option value="Ready to Move">
                                                    Ready to Move
                                                </option>

                                            </select>

                                        </div>

                                    </div>


                                    {{-- Launch Date --}}
                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label for="launch_date">
                                                Launch Date
                                            </label>

                                            <input
                                                type="date"
                                                name="launch_date"
                                                id="launch_date"
                                                class="form-control"
                                                value="{{ old('launch_date') }}">

                                        </div>

                                    </div>


                                    {{-- Possession Date --}}
                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label for="possession_date">
                                                Possession Date
                                            </label>

                                            <input
                                                type="date"
                                                name="possession_date"
                                                id="possession_date"
                                                class="form-control"
                                                value="{{ old('possession_date') }}">

                                        </div>

                                    </div>


                                    {{-- Total Units --}}
                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label for="total_units">
                                                Total Units
                                            </label>

                                            <input
                                                type="number"
                                                name="total_units"
                                                id="total_units"
                                                min="0"
                                                class="form-control"
                                                value="{{ old('total_units') }}"
                                                placeholder="Total units">

                                        </div>

                                    </div>


                                    {{-- Available Units --}}
                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label for="available_units">
                                                Available Units
                                            </label>

                                            <input
                                                type="number"
                                                name="available_units"
                                                id="available_units"
                                                min="0"
                                                class="form-control"
                                                value="{{ old('available_units') }}"
                                                placeholder="Available units">

                                        </div>

                                    </div>


                                    {{-- RERA --}}
                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label for="rera_number">
                                                RERA Number
                                            </label>

                                            <input
                                                type="text"
                                                name="rera_number"
                                                id="rera_number"
                                                class="form-control"
                                                value="{{ old('rera_number') }}"
                                                placeholder="RERA number">

                                        </div>

                                    </div>

                                </div>

                            </div>


                            {{-- =====================================================
                                DESCRIPTION
                            ====================================================== --}}

                            <div class="section-title">
                                Description
                            </div>

                            <div class="row">

                                <div class="col-md-12">

                                    <div class="form-group">

                                        <textarea
                                            name="description"
                                            id="description"
                                            rows="5"
                                            class="form-control"
                                            placeholder="Enter property description">{{ old('description') }}</textarea>

                                    </div>

                                </div>

                            </div>


                            {{-- =====================================================
                                MAP LOCATION
                            ====================================================== --}}

                            <div class="section-title">
                                Map Location
                            </div>

                            <div class="row">

                                {{-- Latitude --}}
                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label for="latitude">
                                            Latitude
                                        </label>

                                        <input
                                            type="text"
                                            name="latitude"
                                            id="latitude"
                                            class="form-control"
                                            value="{{ old('latitude') }}"
                                            placeholder="Example: 18.5204">

                                    </div>

                                </div>


                                {{-- Longitude --}}
                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label for="longitude">
                                            Longitude
                                        </label>

                                        <input
                                            type="text"
                                            name="longitude"
                                            id="longitude"
                                            class="form-control"
                                            value="{{ old('longitude') }}"
                                            placeholder="Example: 73.8567">

                                    </div>

                                </div>

                            </div>

                        </div>


                        {{-- Card Footer --}}
                        <div class="card-footer d-flex justify-content-between">

                            <a href="{{ route('properties.index') }}"
                               class="btn btn-light">

                                <i class="fas fa-arrow-left"></i>
                                Cancel

                            </a>

                            <button type="submit"
                                    class="btn btn-primary">

                                <i class="fas fa-save"></i>
                                Save Property

                            </button>

                        </div>

                    </form>

                </div>

            </div>
        </div>

    </div>

</section>
@endsection


@push('styles')
<style>
    .category-fields {
        display: none;
        padding: 10px 0;
    }

    .section-title {
        font-size: 16px;
        font-weight: 600;
        margin: 20px 0 15px;
        padding-bottom: 10px;
        border-bottom: 1px solid #e4e6fc;
    }
</style>
@endpush


@push('scripts')

<script>
$(document).ready(function () {

    /*
    |--------------------------------------------------------------------------
    | Store Original Options
    |--------------------------------------------------------------------------
    */

    let stateOptions = $('#state_id option').clone();
    let cityOptions  = $('#city_id option').clone();
    let areaOptions  = $('#area_id option').clone();


    /*
    |--------------------------------------------------------------------------
    | Category Fields
    |--------------------------------------------------------------------------
    */

    function showCategoryFields() {

        let category = $('#property_category_id option:selected')
            .data('category');

        $('.category-fields').hide();

        if (!category) {
            return;
        }

        category = category.toString().toLowerCase();

        /*
        | Residential
        */

        if (
            category.includes('residential') ||
            category.includes('apartment') ||
            category.includes('villa') ||
            category.includes('house')
        ) {
            $('#residential-fields').show();
        }

        /*
        | Commercial
        */

        if (
            category.includes('commercial') ||
            category.includes('office') ||
            category.includes('shop') ||
            category.includes('warehouse') ||
            category.includes('showroom')
        ) {
            $('#commercial-fields').show();
        }

        /*
        | Land / Plot
        */

        if (
            category.includes('land') ||
            category.includes('plot')
        ) {
            $('#land-fields').show();
        }

        /*
        | Rental
        */

        if (
            category.includes('rental') ||
            category.includes('rent')
        ) {
            $('#rental-fields').show();
        }

        /*
        | Resale
        */

        if (
            category.includes('resale')
        ) {
            $('#resale-fields').show();
        }

        /*
        | New Project
        */

        if (
            category.includes('new project') ||
            category.includes('project')
        ) {
            $('#new-project-fields').show();
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Country → State
    |--------------------------------------------------------------------------
    */

    function loadStates(countryId, selectedState = '') {

        $('#state_id').html(
            '<option value="">Select State</option>'
        );

        $('#city_id').html(
            '<option value="">Select State First</option>'
        );

        $('#area_id').html(
            '<option value="">Select City First</option>'
        );

        if (!countryId) {

            $('#state_id').html(
                '<option value="">Select Country First</option>'
            );

            return;
        }

        stateOptions.each(function () {

            let optionCountry = $(this).data('country');

            if (
                optionCountry == countryId &&
                $(this).val() !== ''
            ) {

                let option = $(this).clone();

                if (option.val() == selectedState) {
                    option.prop('selected', true);
                }

                $('#state_id').append(option);
            }
        });
    }


    /*
    |--------------------------------------------------------------------------
    | State → City
    |--------------------------------------------------------------------------
    */

    function loadCities(
        countryId,
        stateId,
        selectedCity = ''
    ) {

        $('#city_id').html(
            '<option value="">Select City</option>'
        );

        $('#area_id').html(
            '<option value="">Select City First</option>'
        );

        if (!countryId || !stateId) {

            $('#city_id').html(
                '<option value="">Select State First</option>'
            );

            return;
        }

        cityOptions.each(function () {

            let optionCountry = $(this).data('country');
            let optionState   = $(this).data('state');

            if (
                optionCountry == countryId &&
                optionState == stateId &&
                $(this).val() !== ''
            ) {

                let option = $(this).clone();

                if (option.val() == selectedCity) {
                    option.prop('selected', true);
                }

                $('#city_id').append(option);
            }
        });
    }


    /*
    |--------------------------------------------------------------------------
    | City → Area
    |--------------------------------------------------------------------------
    */

    function loadAreas(
        countryId,
        stateId,
        cityId,
        selectedArea = ''
    ) {

        $('#area_id').html(
            '<option value="">Select Area</option>'
        );

        if (
            !countryId ||
            !stateId ||
            !cityId
        ) {

            $('#area_id').html(
                '<option value="">Select City First</option>'
            );

            return;
        }

        areaOptions.each(function () {

            let optionCountry = $(this).data('country');
            let optionState   = $(this).data('state');
            let optionCity    = $(this).data('city');

            if (
                optionCountry == countryId &&
                optionState == stateId &&
                optionCity == cityId &&
                $(this).val() !== ''
            ) {

                let option = $(this).clone();

                if (option.val() == selectedArea) {
                    option.prop('selected', true);
                }

                $('#area_id').append(option);
            }
        });
    }


    /*
    |--------------------------------------------------------------------------
    | Category Change
    |--------------------------------------------------------------------------
    */

    $('#property_category_id').on('change', function () {

        showCategoryFields();

    });


    /*
    |--------------------------------------------------------------------------
    | Country Change
    |--------------------------------------------------------------------------
    */

    $('#country_id').on('change', function () {

        loadStates($(this).val());

    });


    /*
    |--------------------------------------------------------------------------
    | State Change
    |--------------------------------------------------------------------------
    */

    $('#state_id').on('change', function () {

        let countryId = $('#country_id').val();
        let stateId   = $(this).val();

        loadCities(
            countryId,
            stateId
        );

    });


    /*
    |--------------------------------------------------------------------------
    | City Change
    |--------------------------------------------------------------------------
    */

    $('#city_id').on('change', function () {

        let countryId = $('#country_id').val();
        let stateId   = $('#state_id').val();
        let cityId    = $(this).val();

        loadAreas(
            countryId,
            stateId,
            cityId
        );

    });


    /*
    |--------------------------------------------------------------------------
    | Restore Old Values
    |--------------------------------------------------------------------------
    */

    let oldCountry = "{{ old('country_id') }}";
    let oldState   = "{{ old('state_id') }}";
    let oldCity    = "{{ old('city_id') }}";
    let oldArea    = "{{ old('area_id') }}";


    if (oldCountry) {

        $('#country_id').val(oldCountry);

        loadStates(
            oldCountry,
            oldState
        );

        if (oldState) {

            loadCities(
                oldCountry,
                oldState,
                oldCity
            );

            if (oldCity) {

                loadAreas(
                    oldCountry,
                    oldState,
                    oldCity,
                    oldArea
                );
            }
        }
    }


    showCategoryFields();

});
</script>

@endpush
@else
    @php
        abort(403);
    @endphp
@endcan
