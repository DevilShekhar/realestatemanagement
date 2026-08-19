@can('edit properties')
@extends('admin.layouts.app')

@section('content')

<section class="section">


    <div class="section-header">

        <h1>Edit Property</h1>

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
                Edit Property
            </div>

        </div>

    </div>


    <div class="section-body">


        @if($errors->any())

            <div class="alert alert-danger alert-dismissible fade show">

                <strong>Please fix the following errors:</strong>

                <ul class="mb-0 mt-2">

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



        @if(session('success'))

            <div class="alert alert-success alert-dismissible fade show">

                {{ session('success') }}

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

                        <h4>
                            Edit Property
                        </h4>

                    </div>


                    <form
                        action="{{ route('properties.update', $property->id) }}"
                        method="POST">

                        @csrf

                        @method('PUT')


                        <div class="card-body">



                            <div class="form-section-title">
                                Basic Information
                            </div>


                            <div class="row">

                                {{-- Property Category --}}
                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label for="property_category_id">

                                            Property Category

                                            <span class="text-danger">
                                                *
                                            </span>

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
                                                    {{ old('property_category_id', $property->property_category_id) == $category->id ? 'selected' : '' }}>

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

                                            <option
                                                value="sale"
                                                {{ old('purpose', $property->purpose) == 'sale' ? 'selected' : '' }}>

                                                Sale

                                            </option>

                                            <option
                                                value="rent"
                                                {{ old('purpose', $property->purpose) == 'rent' ? 'selected' : '' }}>

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

                                            <span class="text-danger">
                                                *
                                            </span>

                                        </label>


                                        <input
                                            type="text"
                                            name="title"
                                            id="title"
                                            class="form-control @error('title') is-invalid @enderror"
                                            value="{{ old('title', $property->title) }}"
                                            placeholder="Enter property title">


                                        @error('title')

                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>

                                        @enderror

                                    </div>

                                </div>

                            </div>


                            {{-- =================================================
                                LOCATION
                            ================================================== --}}
                            <div class="form-section-title">
                                Property Location
                            </div>


                            <div class="row">

                                {{-- Country --}}
                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label for="country_id">

                                            Country

                                            <span class="text-danger">
                                                *
                                            </span>

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
                                                    {{ old('country_id', $property->country_id) == $country->id ? 'selected' : '' }}>

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

                                            <span class="text-danger">
                                                *
                                            </span>

                                        </label>


                                        <select
                                            name="state_id"
                                            id="state_id"
                                            class="form-control @error('state_id') is-invalid @enderror">

                                            <option value="">
                                                Select State
                                            </option>


                                            @foreach($states as $state)

                                                <option
                                                    value="{{ $state->id }}"
                                                    data-country="{{ $state->country_id }}"
                                                    {{ old('state_id', $property->state_id) == $state->id ? 'selected' : '' }}>

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

                                            <span class="text-danger">
                                                *
                                            </span>

                                        </label>


                                        <select
                                            name="city_id"
                                            id="city_id"
                                            class="form-control @error('city_id') is-invalid @enderror">

                                            <option value="">
                                                Select City
                                            </option>


                                            @foreach($cities as $city)

                                                <option
                                                    value="{{ $city->id }}"
                                                    data-state="{{ $city->state_id }}"
                                                    {{ old('city_id', $property->city_id) == $city->id ? 'selected' : '' }}>

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

                                            <span class="text-danger">
                                                *
                                            </span>

                                        </label>


                                        <select
                                            name="area_id"
                                            id="area_id"
                                            class="form-control @error('area_id') is-invalid @enderror">

                                            <option value="">
                                                Select Area
                                            </option>


                                            @foreach($areas as $area)

                                                <option
                                                    value="{{ $area->id }}"
                                                    data-city="{{ $area->city_id }}"
                                                    {{ old('area_id', $property->area_id) == $area->id ? 'selected' : '' }}>

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
                                            class="form-control @error('address') is-invalid @enderror"
                                            placeholder="Enter complete property address">{{ old('address', $property->address) }}</textarea>


                                        @error('address')

                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>

                                        @enderror

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
                                            value="{{ old('landmark', $property->landmark) }}"
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
                                            value="{{ old('pincode', $property->pincode) }}"
                                            placeholder="Enter pincode">

                                    </div>

                                </div>

                            </div>


                            {{-- =================================================
                                COMMON PROPERTY DETAILS
                            ================================================== --}}
                            <div class="form-section-title">
                                Property Details
                            </div>


                            <div class="row">

                               


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
                                            value="{{ old('area', $property->area) }}"
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

                                            <option
                                                value="sq.ft"
                                                {{ old('area_unit', $property->area_unit) == 'sq.ft' ? 'selected' : '' }}>

                                                Sq. Ft.

                                            </option>

                                            <option
                                                value="sq.m"
                                                {{ old('area_unit', $property->area_unit) == 'sq.m' ? 'selected' : '' }}>

                                                Sq. Meter

                                            </option>

                                            <option
                                                value="sq.yd"
                                                {{ old('area_unit', $property->area_unit) == 'sq.yd' ? 'selected' : '' }}>

                                                Sq. Yard

                                            </option>

                                            <option
                                                value="acre"
                                                {{ old('area_unit', $property->area_unit) == 'acre' ? 'selected' : '' }}>

                                                Acre

                                            </option>

                                            <option
                                                value="hectare"
                                                {{ old('area_unit', $property->area_unit) == 'hectare' ? 'selected' : '' }}>

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
                                            value="{{ old('built_up_area', $property->built_up_area) }}"
                                            placeholder="Built-up area">

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
                                            value="{{ old('carpet_area', $property->carpet_area) }}"
                                            placeholder="Carpet area">

                                    </div>

                                </div>


                                {{-- Car Parking --}}
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="car_parking">Car Parking</label>

                                        <input
                                            type="number"
                                            name="car_parking"
                                            id="car_parking"
                                            class="form-control"
                                            min="0"
                                            value="{{ old('car_parking', $property->car_parking ?? '') }}"
                                            placeholder="Enter car parking"
                                        >

                                        @error('car_parking')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="bike_parking">Bike Parking</label>

                                        <input
                                            type="number"
                                            name="bike_parking"
                                            id="bike_parking"
                                            class="form-control"
                                            min="0"
                                            value="{{ old('bike_parking', $property->bike_parking ?? '') }}"
                                            placeholder="Enter bike parking"
                                        >

                                        @error('bike_parking')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>


                            {{-- =================================================
                                RESIDENTIAL FIELDS
                            ================================================== --}}
                            <div
                                id="residential-fields"
                                class="category-fields">

                                <div class="form-section-title">
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
                                                value="{{ old('bhk', $property->bhk) }}"
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
                                                value="{{ old('monthly_rent', $property->monthly_rent) }}"
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
                                                value="{{ old('bedrooms', $property->bedrooms) }}"
                                                placeholder="Bedrooms">

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
                                                value="{{ old('bathrooms', $property->bathrooms) }}"
                                                placeholder="Bathrooms">

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
                                                value="{{ old('balconies', $property->balconies) }}"
                                                placeholder="Balconies">

                                        </div>

                                    </div>


                                    {{-- Facing --}}
                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label for="residential_facing">
                                                Facing
                                            </label>


                                            <select
                                                name="facing"
                                                id="residential_facing"
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
                                                        {{ old('facing', $property->facing) == $direction ? 'selected' : '' }}>

                                                        {{ $direction }}

                                                    </option>

                                                @endforeach

                                            </select>

                                        </div>

                                    </div>


                                    {{-- Floor --}}
                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label for="residential_floor">
                                                Floor Number
                                            </label>


                                            <input
                                                type="number"
                                                name="floor_number"
                                                id="residential_floor"
                                                min="0"
                                                class="form-control"
                                                value="{{ old('floor_number', $property->floor_number) }}"
                                                placeholder="Floor number">

                                        </div>

                                    </div>


                                    {{-- Total Floors --}}
                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label for="residential_total_floors">
                                                Total Floors
                                            </label>


                                            <input
                                                type="number"
                                                name="total_floors"
                                                id="residential_total_floors"
                                                min="0"
                                                class="form-control"
                                                value="{{ old('total_floors', $property->total_floors) }}"
                                                placeholder="Total floors">

                                        </div>

                                    </div>


                                    {{-- Furnishing --}}
                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label for="residential_furnishing">
                                                Furnishing
                                            </label>


                                            <select
                                                name="furnishing"
                                                id="residential_furnishing"
                                                class="form-control">

                                                <option value="">
                                                    Select Furnishing
                                                </option>

                                                <option
                                                    value="Unfurnished"
                                                    {{ old('furnishing', $property->furnishing) == 'Unfurnished' ? 'selected' : '' }}>

                                                    Unfurnished

                                                </option>

                                                <option
                                                    value="Semi Furnished"
                                                    {{ old('furnishing', $property->furnishing) == 'Semi Furnished' ? 'selected' : '' }}>

                                                    Semi Furnished

                                                </option>

                                                <option
                                                    value="Fully Furnished"
                                                    {{ old('furnishing', $property->furnishing) == 'Fully Furnished' ? 'selected' : '' }}>

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
                                                value="{{ old('construction_year', $property->construction_year) }}"
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
                                                value="{{ old('ownership', $property->ownership) }}"
                                                placeholder="Ownership">

                                        </div>

                                    </div>

                                </div>

                            </div>


                            {{-- =================================================
                                COMMERCIAL FIELDS
                            ================================================== --}}
                            <div
                                id="commercial-fields"
                                class="category-fields">

                                <div class="form-section-title">
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

                                                <option
                                                    value="Office"
                                                    {{ old('commercial_type', $property->commercial_type) == 'Office' ? 'selected' : '' }}>

                                                    Office

                                                </option>

                                                <option
                                                    value="Shop"
                                                    {{ old('commercial_type', $property->commercial_type) == 'Shop' ? 'selected' : '' }}>

                                                    Shop

                                                </option>

                                                <option
                                                    value="Warehouse"
                                                    {{ old('commercial_type', $property->commercial_type) == 'Warehouse' ? 'selected' : '' }}>

                                                    Warehouse

                                                </option>

                                                <option
                                                    value="Showroom"
                                                    {{ old('commercial_type', $property->commercial_type) == 'Showroom' ? 'selected' : '' }}>

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
                                                value="{{ old('business_type', $property->business_type) }}"
                                                placeholder="Business type">

                                        </div>

                                    </div>
                                    {{-- Commercial Budget --}}
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="commercial_budget">
                                                Commercial Budget
                                            </label>

                                            <input
                                                type="number"
                                                name="commercial_budget"
                                                id="commercial_budget"
                                                min="0"
                                                step="0.01"
                                                class="form-control"
                                                value="{{ old('commercial_budget', $property->commercial_budget ?? '') }}"
                                                placeholder="Enter commercial budget"
                                            >

                                            @error('commercial_budget')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
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
                                                value="{{ old('washrooms', $property->washrooms) }}"
                                                placeholder="Washrooms">

                                        </div>

                                    </div>


                                    {{-- Commercial Floor --}}
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
                                                value="{{ old('floor_number', $property->floor_number) }}"
                                                placeholder="Floor number">

                                        </div>

                                    </div>


                                    {{-- Commercial Total Floors --}}
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
                                                value="{{ old('total_floors', $property->total_floors) }}"
                                                placeholder="Total floors">

                                        </div>

                                    </div>
                                    {{-- Car Parking --}}
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="car_parking">Car Parking</label>

                                                <input
                                                    type="number"
                                                    name="car_parking"
                                                    id="car_parking"
                                                    class="form-control"
                                                    min="0"
                                                    value="{{ old('car_parking', $property->car_parking ?? '') }}"
                                                    placeholder="Enter car parking"
                                                >

                                                @error('car_parking')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- Bike / Two-Wheeler Parking --}}
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="bike_parking">Bike / Two-Wheeler Parking</label>

                                                <input
                                                    type="number"
                                                    name="bike_parking"
                                                    id="bike_parking"
                                                    class="form-control"
                                                    min="0"
                                                    value="{{ old('bike_parking', $property->bike_parking ?? '') }}"
                                                    placeholder="Enter bike parking"
                                                >

                                                @error('bike_parking')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>


                                    
                                    

                                </div>

                            </div>


                            {{-- =================================================
                                LAND / PLOT
                            ================================================== --}}
                            <div
                                id="land-fields"
                                class="category-fields">

                                <div class="form-section-title">
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
                                                value="{{ old('plot_area', $property->plot_area) }}"
                                                placeholder="Plot area">

                                        </div>

                                    </div>
                                     {{-- Price --}}
                                <div class="col-md-4">

                                    <div class="form-group">

                                        <label for="price">
                                            Amount
                                        </label>


                                        <input
                                            type="number"
                                            name="price"
                                            id="price"
                                            step="0.01"
                                            min="0"
                                            class="form-control"
                                            value="{{ old('price', $property->price) }}"
                                            placeholder="Enter price">

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
                                                value="{{ old('road_width', $property->road_width) }}"
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

                                                <option
                                                    value="ft"
                                                    {{ old('road_width_unit', $property->road_width_unit) == 'ft' ? 'selected' : '' }}>

                                                    Feet

                                                </option>

                                                <option
                                                    value="m"
                                                    {{ old('road_width_unit', $property->road_width_unit) == 'm' ? 'selected' : '' }}>

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

                                                <option
                                                    value="1"
                                                    {{ old('boundary_wall', $property->boundary_wall) == 1 ? 'selected' : '' }}>

                                                    Yes

                                                </option>

                                                <option
                                                    value="0"
                                                    {{ old('boundary_wall', $property->boundary_wall) == 0 && $property->boundary_wall !== null ? 'selected' : '' }}>

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
                                                value="{{ old('land_type', $property->land_type) }}"
                                                placeholder="Land type">

                                        </div>

                                    </div>


                                    {{-- Land Facing --}}
                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label for="land_facing">
                                                Facing
                                            </label>


                                            <select
                                                name="facing"
                                                id="land_facing"
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
                                                        {{ old('facing', $property->facing) == $direction ? 'selected' : '' }}>

                                                        {{ $direction }}

                                                    </option>

                                                @endforeach

                                            </select>

                                        </div>

                                    </div>

                                </div>

                            </div>


                            {{-- =================================================
                                RENTAL
                            ================================================== --}}
                            <div
                                id="rental-fields"
                                class="category-fields">

                                <div class="form-section-title">
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
                                                value="{{ old('monthly_rent', $property->monthly_rent) }}"
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
                                                value="{{ old('security_deposit', $property->security_deposit) }}"
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
                                                value="{{ old('available_from', $property->available_from ? \Carbon\Carbon::parse($property->available_from)->format('Y-m-d') : '') }}">

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
                                                value="{{ old('lease_period', $property->lease_period) }}"
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

                                                <option
                                                    value="month"
                                                    {{ old('lease_period_unit', $property->lease_period_unit) == 'month' ? 'selected' : '' }}>

                                                    Month

                                                </option>

                                                <option
                                                    value="year"
                                                    {{ old('lease_period_unit', $property->lease_period_unit) == 'year' ? 'selected' : '' }}>

                                                    Year

                                                </option>

                                            </select>

                                        </div>

                                    </div>

                                </div>

                            </div>


                            {{-- =================================================
                                RESALE
                            ================================================== --}}
                            <div
                                id="resale-fields"
                                class="category-fields">

                                <div class="form-section-title">
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
                                                value="{{ old('purchase_year', $property->purchase_year) }}"
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
                                                value="{{ old('property_age', $property->property_age) }}"
                                                placeholder="Property age">

                                        </div>

                                    </div>

                                </div>

                            </div>


                            {{-- =================================================
                                NEW PROJECT
                            ================================================== --}}
                            <div
                                id="new-project-fields"
                                class="category-fields">

                                <div class="form-section-title">
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
                                                value="{{ old('project_name', $property->project_name) }}"
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
                                                value="{{ old('developer_name', $property->developer_name) }}"
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

                                                <option
                                                    value="Upcoming"
                                                    {{ old('project_status', $property->project_status) == 'Upcoming' ? 'selected' : '' }}>

                                                    Upcoming

                                                </option>

                                                <option
                                                    value="Under Construction"
                                                    {{ old('project_status', $property->project_status) == 'Under Construction' ? 'selected' : '' }}>

                                                    Under Construction

                                                </option>

                                                <option
                                                    value="Ready to Move"
                                                    {{ old('project_status', $property->project_status) == 'Ready to Move' ? 'selected' : '' }}>

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
                                                value="{{ old('launch_date', $property->launch_date ? \Carbon\Carbon::parse($property->launch_date)->format('Y-m-d') : '') }}">

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
                                                value="{{ old('possession_date', $property->possession_date ? \Carbon\Carbon::parse($property->possession_date)->format('Y-m-d') : '') }}">

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
                                                value="{{ old('total_units', $property->total_units) }}"
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
                                                value="{{ old('available_units', $property->available_units) }}"
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
                                                value="{{ old('rera_number', $property->rera_number) }}"
                                                placeholder="RERA number">

                                        </div>

                                    </div>

                                </div>

                            </div>


                            {{-- =================================================
                                DESCRIPTION
                            ================================================== --}}
                            <div class="form-section-title">
                                Description
                            </div>


                            <div class="form-group">

                                <label for="description">
                                    Property Description
                                </label>


                                <textarea
                                    name="description"
                                    id="description"
                                    rows="5"
                                    class="form-control @error('description') is-invalid @enderror"
                                    placeholder="Enter property description">{{ old('description', $property->description) }}</textarea>


                                @error('description')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>
                             @can('property map location')
                            <div class="form-section-title">
                                Map Location
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="latitude">
                                            Latitude
                                        </label>
                                        <input  type="text" name="latitude" id="latitude" class="form-control"  value="{{ old('latitude', $property->latitude) }}" placeholder="Example: 18.5204">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="longitude">
                                            Longitude
                                        </label>
                                        <input type="text" name="longitude"  id="longitude" class="form-control" value="{{ old('longitude', $property->longitude) }}" placeholder="Example: 73.8567">
                                    </div>
                                </div>
                            </div>
                            @endcan
                            <div class="form-section-title">
                                Status
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status">
                                            Status
                                            <span class="text-danger">*</span>
                                        </label>
                                        <select  name="status" id="status"  class="form-control @error('status') is-invalid @enderror">
                                            <option  value="1" {{ old('status', $property->status) == 1 ? 'selected' : '' }}>
                                                Active
                                            </option>
                                            <option value="0" {{ old('status', $property->status) == 0 ? 'selected' : '' }}>
                                                Inactive
                                            </option>
                                             <option value="2"
                                                {{ old('status', $property->status) == 2 ? 'selected' : '' }}>
                                                Sold
                                            </option>
                                        </select>
                                        @error('status')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>                       
                        <div class="card-footer d-flex justify-content-between">
                            <a href="{{ route('properties.index') }}" class="btn btn-light"><i class="fas fa-arrow-left"></i> Cancel </a>
                            <button  type="submit" class="btn btn-primary"> <i class="fas fa-save"></i> Update Property</button>
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
        padding-top: 5px;
    }

    .form-section-title {
        font-size: 16px;
        font-weight: 600;
        margin-top: 25px;
        margin-bottom: 18px;
        padding-bottom: 10px;
        border-bottom: 1px solid #e4e6fc;
    }

</style>

@endpush


{{-- =============================================================
    JAVASCRIPT
============================================================= --}}
@push('scripts')

<script>

$(document).ready(function () {


    /* =========================================================
       STORE ORIGINAL DROPDOWN OPTIONS
    ========================================================= */

    let stateOptions = $('#state_id option').clone();

    let cityOptions = $('#city_id option').clone();

    let areaOptions = $('#area_id option').clone();


    /* =========================================================
       CATEGORY WISE FIELDS
    ========================================================= */

    function showCategoryFields() {

        let category = $('#property_category_id option:selected')
            .data('category');


        // Hide everything first

        $('.category-fields').hide();


        if (!category) {
            return;
        }


        category = category.toString().toLowerCase();


        /*
        |--------------------------------------------------------------------------
        | Residential
        |--------------------------------------------------------------------------
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
        |--------------------------------------------------------------------------
        | Commercial
        |--------------------------------------------------------------------------
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
        |--------------------------------------------------------------------------
        | Plot / Land
        |--------------------------------------------------------------------------
        */

        if (
            category.includes('plot') ||
            category.includes('land')
        ) {

            $('#land-fields').show();

        }


        /*
        |--------------------------------------------------------------------------
        | Rental
        |--------------------------------------------------------------------------
        */

        if (
            category.includes('rental') ||
            category.includes('rent')
        ) {

            $('#rental-fields').show();

        }


        /*
        |--------------------------------------------------------------------------
        | Resale
        |--------------------------------------------------------------------------
        */

        if (
            category.includes('resale')
        ) {

            $('#resale-fields').show();

        }


        /*
        |--------------------------------------------------------------------------
        | New Project
        |--------------------------------------------------------------------------
        */

        if (
            category.includes('new project') ||
            category.includes('project')
        ) {

            $('#new-project-fields').show();

        }

    }


    /* =========================================================
       COUNTRY → STATE
    ========================================================= */

    function loadStates(
        countryId,
        selectedState = ''
    ) {

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

            let stateCountryId = $(this).data('country');


            if (
                stateCountryId == countryId &&
                $(this).val() !== ''
            ) {

                let option = $(this).clone();


                if (
                    option.val() == selectedState
                ) {

                    option.prop(
                        'selected',
                        true
                    );

                }


                $('#state_id').append(option);

            }

        });

    }


    /* =========================================================
       STATE → CITY
    ========================================================= */

    function loadCities(
        stateId,
        selectedCity = ''
    ) {

        $('#city_id').html(
            '<option value="">Select City</option>'
        );


        $('#area_id').html(
            '<option value="">Select City First</option>'
        );


        if (!stateId) {

            $('#city_id').html(
                '<option value="">Select State First</option>'
            );

            return;

        }


        cityOptions.each(function () {

            let cityStateId = $(this).data('state');


            if (
                cityStateId == stateId &&
                $(this).val() !== ''
            ) {

                let option = $(this).clone();


                if (
                    option.val() == selectedCity
                ) {

                    option.prop(
                        'selected',
                        true
                    );

                }


                $('#city_id').append(option);

            }

        });

    }


    /* =========================================================
       CITY → AREA
    ========================================================= */

    function loadAreas(
        cityId,
        selectedArea = ''
    ) {

        $('#area_id').html(
            '<option value="">Select Area</option>'
        );


        if (!cityId) {

            $('#area_id').html(
                '<option value="">Select City First</option>'
            );

            return;

        }


        areaOptions.each(function () {

            let areaCityId = $(this).data('city');


            if (
                areaCityId == cityId &&
                $(this).val() !== ''
            ) {

                let option = $(this).clone();


                if (
                    option.val() == selectedArea
                ) {

                    option.prop(
                        'selected',
                        true
                    );

                }


                $('#area_id').append(option);

            }

        });

    }


    /* =========================================================
       COUNTRY CHANGE
    ========================================================= */

    $('#country_id').on(
        'change',
        function () {

            let countryId = $(this).val();


            loadStates(
                countryId
            );

        }
    );


    /* =========================================================
       STATE CHANGE
    ========================================================= */

    $('#state_id').on(
        'change',
        function () {

            let stateId = $(this).val();


            loadCities(
                stateId
            );

        }
    );


    /* =========================================================
       CITY CHANGE
    ========================================================= */

    $('#city_id').on(
        'change',
        function () {

            let cityId = $(this).val();


            loadAreas(
                cityId
            );

        }
    );


    /* =========================================================
       PROPERTY CATEGORY CHANGE
    ========================================================= */

    $('#property_category_id').on(
        'change',
        function () {

            showCategoryFields();

        }
    );


    /* =========================================================
       EXISTING PROPERTY VALUES
    ========================================================= */

    let selectedCountry =
        "{{ old('country_id', $property->country_id) }}";


    let selectedState =
        "{{ old('state_id', $property->state_id) }}";


    let selectedCity =
        "{{ old('city_id', $property->city_id) }}";


    let selectedArea =
        "{{ old('area_id', $property->area_id) }}";


    /* =========================================================
       LOAD EXISTING LOCATION
    ========================================================= */

    if (selectedCountry) {

        $('#country_id').val(
            selectedCountry
        );


        loadStates(
            selectedCountry,
            selectedState
        );


        if (selectedState) {

            loadCities(
                selectedState,
                selectedCity
            );


            if (selectedCity) {

                loadAreas(
                    selectedCity,
                    selectedArea
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
