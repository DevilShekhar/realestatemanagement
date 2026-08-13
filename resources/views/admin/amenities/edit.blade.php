@can('edit amenities')
    @extends('admin.layouts.app')

    @section('content')
        <section class="section">

            {{-- Page Header --}}
            <div class="section-header">
                <h1>Edit Amenity</h1>

                <div class="section-header-breadcrumb">

                    <div class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">
                            Dashboard
                        </a>
                    </div>

                    <div class="breadcrumb-item">
                        <a href="{{ route('amenities.index') }}">
                            Amenities
                        </a>
                    </div>

                    <div class="breadcrumb-item active">
                        Edit
                    </div>

                </div>
            </div>

            <div class="section-body">

                {{-- Validation Errors --}}
                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show">

                        <h6>
                            <i class="fas fa-exclamation-triangle"></i>
                            Please fix the following errors:
                        </h6>

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
                                <h4>
                                    <i class="fas fa-list"></i>
                                    Amenity Details
                                </h4>
                            </div>

                            {{-- Form --}}
                            <form action="{{ route('amenities.update', $amenity->id) }}" method="POST">

                                @csrf
                                @method('PUT')

                                <div class="card-body">

                                    <div class="row">

                                        {{-- Amenity Name --}}
                                        <div class="form-group col-md-8">

                                            <label for="name">
                                                Amenity Name
                                                <span class="text-danger">*</span>
                                            </label>

                                            <input type="text" name="name" id="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                value="{{ old('name', $amenity->name) }}" placeholder="Enter amenity name"
                                                required autofocus>

                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>

                                        {{-- Status --}}
                                        <div class="form-group col-md-4">

                                            <label for="status">
                                                Status
                                                <span class="text-danger">*</span>
                                            </label>

                                            <select name="status" id="status"
                                                class="form-control @error('status') is-invalid @enderror" required>

                                                <option value="1" {{ old('status', $amenity->status) == 1 ? 'selected' : '' }}>
                                                    Active
                                                </option>

                                                <option value="0" {{ old('status', $amenity->status) == 0 ? 'selected' : '' }}>
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

                                {{-- Footer --}}
                                <div class="card-footer text-right">

                                    <a href="{{ route('amenities.index') }}" class="btn btn-secondary">

                                        <i class="fas fa-times"></i>
                                        Cancel

                                    </a>

                                    <button type="submit" class="btn btn-primary">

                                        <i class="fas fa-save"></i>
                                        Update Amenity

                                    </button>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </section>
    @endsection
@else
    @php
        abort(403);
    @endphp
@endcan
