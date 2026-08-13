@can('edit cities')
@extends('admin.layouts.app')

@section('content') <section class="section">


    {{-- Page Header --}}
    <div class="section-header">
        <h1>Edit City</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">
                    Dashboard
                </a>
            </div>

            <div class="breadcrumb-item">
                <a href="{{ route('cities.index') }}">
                    Cities
                </a>
            </div>

            <div class="breadcrumb-item active">
                Edit City
            </div>
        </div>
    </div>

    <div class="section-body">

        {{-- Success Message --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}

                <button type="button" class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
            </div>
        @endif

        {{-- Error Message --}}
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                {{ session('error') }}

                <button type="button" class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
            </div>
        @endif

        {{-- Validation Errors --}}
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <div class="col-12">

                <div class="card">

                    {{-- Card Header --}}
                    <div class="card-header">
                        <h4>Edit City</h4>
                    </div>

                    {{-- Form --}}
                    <form action="{{ route('cities.update', $city->id) }}"
                          method="POST">

                        @csrf
                        @method('PUT')

                        <div class="card-body">

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
                                                    {{ old('country_id', $city->country_id) == $country->id ? 'selected' : '' }}>

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
                                                Select State
                                            </option>

                                            @foreach($states as $state)

                                                <option
                                                    value="{{ $state->id }}"
                                                    data-country="{{ $state->country_id }}"
                                                    {{ old('state_id', $city->state_id) == $state->id ? 'selected' : '' }}>

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

                                {{-- City Name --}}
                                <div class="col-md-6">
                                    <div class="form-group">

                                        <label for="name">
                                            City Name
                                            <span class="text-danger">*</span>
                                        </label>

                                        <input
                                            type="text"
                                            name="name"
                                            id="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            value="{{ old('name', $city->name) }}"
                                            placeholder="Enter city name">

                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                    </div>
                                </div>

                                {{-- Status --}}
                                <div class="col-md-6">
                                    <div class="form-group">

                                        <label for="status">
                                            Status
                                            <span class="text-danger">*</span>
                                        </label>

                                        <select
                                            name="status"
                                            id="status"
                                            class="form-control @error('status') is-invalid @enderror">

                                            <option value="1"
                                                {{ old('status', $city->status) == 1 ? 'selected' : '' }}>
                                                Active
                                            </option>

                                            <option value="0"
                                                {{ old('status', $city->status) == 0 ? 'selected' : '' }}>
                                                Inactive
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

                        {{-- Card Footer --}}
                        <div class="card-footer d-flex justify-content-between">

                            {{-- Cancel --}}
                            <a href="{{ route('cities.index') }}"
                               class="btn btn-light">

                                <i class="fas fa-arrow-left"></i>
                                Cancel

                            </a>

                            {{-- Update --}}
                            <button type="submit"
                                    class="btn btn-primary">

                                <i class="fas fa-save"></i>
                                Update City

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

        let stateOptions = $('#state_id option').clone();

        function loadStates(countryId, selectedStateId = '') {

            $('#state_id').html(
                '<option value="">Select State</option>'
            );

            if (!countryId) {
                $('#state_id').html(
                    '<option value="">Select Country First</option>'
                );

                return;
            }

            stateOptions.each(function () {

                let stateCountryId = $(this).data('country');

                if (stateCountryId == countryId && $(this).val() !== '') {

                    let option = $(this).clone();

                    if (option.val() == selectedStateId) {
                        option.prop('selected', true);
                    }

                    $('#state_id').append(option);
                }
            });
        }

        $('#country_id').on('change', function () {

            loadStates($(this).val(), '');

        });

        // Load existing state on page load
        let selectedCountry = $('#country_id').val();
        let selectedState = "{{ old('state_id', $city->state_id) }}";

        if (selectedCountry) {
            loadStates(selectedCountry, selectedState);
        }

    });
</script>

@endpush
@else
    @php
        abort(403);
    @endphp
@endcan
