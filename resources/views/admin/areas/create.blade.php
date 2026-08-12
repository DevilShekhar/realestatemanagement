@extends('admin.layouts.app')
@section('content') 
<section class="section">
     <div class="section-header">
        <h1>Create Area</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">
                    Dashboard
                </a>
            </div>
            <div class="breadcrumb-item">
                <a href="{{ route('areas.index') }}">
                    Areas
                </a>
            </div>
            <div class="breadcrumb-item active">
                Create Area
            </div>
        </div>
    </div>
    <div class="section-body">
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Area Information</h4>
                    </div>
                    <form action="{{ route('areas.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">
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
                                                    data-country="{{ $state->country_id }}"
                                                    {{ old('state_id') == $state->id ? 'selected' : '' }}>
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
                                                    data-state="{{ $city->state_id }}"
                                                    {{ old('city_id') == $city->id ? 'selected' : '' }}>
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">
                                            Area Name
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input
                                            type="text"
                                            name="name"
                                            id="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            value="{{ old('name') }}"
                                            placeholder="Enter area name">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <a href="{{ route('areas.index') }}"
                               class="btn btn-light">
                                <i class="fas fa-arrow-left"></i>
                                Cancel
                            </a>
                            <button type="submit"
                                    class="btn btn-primary">
                                <i class="fas fa-save"></i>
                                Save Area
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
<script>
    $(document).ready(function () {
        // Store original options
        let stateOptions = $('#state_id option').clone();
        let cityOptions = $('#city_id option').clone();
        function loadStates(countryId, selectedState = '') {
            $('#state_id').html(
                '<option value="">Select State</option>'
            );
            $('#city_id').html(
               '<option value="">Select State First</option>'
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
                    if (option.val() == selectedState) {
                        option.prop('selected', true);
                    }
                    $('#state_id').append(option);
                }
            });
        }
        function loadCities(stateId, countryId, selectedCity = '') {
            $('#city_id').html(
                '<option value="">Select City</option>'
            );
            if (!stateId || !countryId) {
                $('#city_id').html(
                    '<option value="">Select State First</option>'
                );
                return;
            }
            cityOptions.each(function () {
                let cityCountryId = $(this).data('country');
                let cityStateId = $(this).data('state');
                if (
                    cityCountryId == countryId &&
                    cityStateId == stateId &&
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
        // Country change
        $('#country_id').on('change', function () {
            let countryId = $(this).val();
            loadStates(countryId);
        });
        // State change
        $('#state_id').on('change', function () {
            let stateId = $(this).val();
            let countryId = $('#country_id').val();
            loadCities(stateId, countryId);
        });
        // Restore old values after validation error
        let oldCountry = "{{ old('country_id') }}";
        let oldState = "{{ old('state_id') }}";
        let oldCity = "{{ old('city_id') }}";
        if (oldCountry) {
            $('#country_id').val(oldCountry);
            loadStates(oldCountry, oldState);
            if (oldState) {
                loadCities(
                    oldState,
                    oldCountry,
                    oldCity
                );
            }
        }
    });
</script>
@endpush