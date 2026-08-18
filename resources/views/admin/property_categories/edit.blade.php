@can('edit categories')
    @extends('admin.layouts.app')
    @section('content')
        <section class="section">
            <div class="section-header">
                <h1>Edit Property Category</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">
                            Dashboard
                        </a>
                    </div>
                    <div class="breadcrumb-item">
                        <a href="{{ route('property-categories.index') }}">
                            Property Categories
                        </a>
                    </div>
                    <div class="breadcrumb-item active">
                        Edit
                    </div>
                </div>
            </div>
            <div class="section-body">
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
                            <div class="card-header">
                                <h4>
                                    <i class="fas fa-building"></i>
                                    Property Category Details
                                </h4>
                            </div>
                            <form action="{{ route('property-categories.update', $propertyCategory->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-8">
                                            <label for="name">Category Name <span class="text-danger">*</span></label>
                                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $propertyCategory->name) }}" placeholder="Enter property category name" required autofocus>
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="status">Status <span class="text-danger">*</span> </label>
                                            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                                <option value="1" {{ old('status', $propertyCategory->status) == 1 ? 'selected' : '' }}> Active </option>
                                                <option value="0" {{ old('status', $propertyCategory->status) == 0 ? 'selected' : '' }}> Inactive </option>
                                            </select>
                                            @error('status')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <a href="{{ route('property-categories.index') }}" class="btn btn-secondary"> <i class="fas fa-times"></i> Cancel</a>
                                    <button type="submit"  class="btn btn-primary"><i class="fas fa-save"></i> Update Property Category</button>
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