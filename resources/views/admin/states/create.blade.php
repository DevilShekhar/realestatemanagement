@can('create states')
@extends('admin.layouts.app')
@section('content')
<section class="section">
     <div class="section-header">
        <h1>Create State</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">
                    Dashboard
                </a>
            </div>
            <div class="breadcrumb-item">
                <a href="{{ route('states.index') }}">
                    States
                </a>
            </div>
            <div class="breadcrumb-item active">
                Create State
            </div>
        </div>
    </div>
    <div class="section-body">
        <div class="card">
             <div class="card-header">
                <h4>
                    <i class="fas fa-map-marker-alt mr-2"></i>
                    State Information
                </h4>
            </div>
             <form action="{{ route('states.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row">
                         <div class="col-md-6">
                            <div class="form-group">
                                <label for="country_id">
                                    Country
                                    <span class="text-danger">*</span>
                                </label>
                                <select name="country_id"  id="country_id" class="form-control @error('country_id') is-invalid @enderror">
                                    <option value="">
                                        Select Country
                                    </option>
                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}"
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
                                <label for="name">
                                    State Name
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Enter state name">
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
                     <a href="{{ route('states.index') }}"  class="btn btn-light">
                        <i class="fas fa-arrow-left mr-1"></i>
                        Cancel
                    </a>
                     <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save mr-1"></i>
                        Save State
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
@else
    @php
        abort(403);
    @endphp
@endcan
