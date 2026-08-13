@can('create cities')
@extends('admin.layouts.app')

@section('content') <section class="section">


    {{-- Page Header --}}
    <div class="section-header">
        <h1>Create City</h1>

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
                Create City
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

                <button type="button" class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>

            </div>
        @endif

        <div class="row">
            <div class="col-12">

                <div class="card">

                    {{-- Card Header --}}
                    <div class="card-header">
                        <h4>City Information</h4>
                    </div>

                    <form action="{{ route('cities.store') }}" method="POST">

                        @csrf

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

                                {{-- City --}}
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
                                            value="{{ old('name') }}"
                                            placeholder="Enter city name">

                                        @error('name')
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

                            <a href="{{ route('cities.index') }}"
                               class="btn btn-light">

                                <i class="fas fa-arrow-left"></i>
                                Cancel

                            </a>

                            <button type="submit"
                                    class="btn btn-primary">

                                <i class="fas fa-save"></i>
                                Save City

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

        function filterStates() {

            let countryId = $('#country_id').val();
            let selectedState = "{{ old('state_id') }}";

            $('#state_id').html(
                '<option value="">Select State</option>'
            );

            if (countryId) {

                $('#state_id option').each(function () {

                    let stateCountryId = $(this).data('country');

                    if (stateCountryId == countryId) {

                        let option = $(this).clone();

                        if (option.val() == selectedState) {
                            option.prop('selected', true);
                        }

                        $('#state_id').append(option);
                    }

                });

            } else {

                $('#state_id').html(
                    '<option value="">Select Country First</option>'
                );
            }
        }

        // Store original state options
        let stateOptions = $('#state_id option').clone();

        $('#country_id').on('change', function () {

            let countryId = $(this).val();

            $('#state_id').html(
                '<option value="">Select State</option>'
            );

            if (countryId) {

                stateOptions.each(function () {

                    let stateCountryId = $(this).data('country');

                    if (stateCountryId == countryId) {
                        $('#state_id').append($(this).clone());
                    }

                });

            } else {

                $('#state_id').html(
                    '<option value="">Select Country First</option>'
                );
            }
        });

        // Load states when validation fails
        if ($('#country_id').val()) {
            $('#country_id').trigger('change');

            let oldState = "{{ old('state_id') }}";

            if (oldState) {
                $('#state_id').val(oldState);
            }
        }

    });
</script>

@endpush
@else
    @php
        abort(403);
    @endphp
@endcan
