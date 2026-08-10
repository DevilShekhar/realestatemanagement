@extends('admin.layouts.app')
@section('content') 
    <section class="section">
         <div class="section-header">
            <h1>Create Permission</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">
                        Dashboard
                    </a>
                </div>
                <div class="breadcrumb-item">
                    <a href="{{ route('permissions.index') }}">
                        Permissions
                    </a>
                </div>
                <div class="breadcrumb-item active">
                    Create Permission
                </div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                Create Permission
                            </h4>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>
                                                {{ $error }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form action="{{ route('permissions.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>
                                            Permission Name
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text"name="name"  class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Enter permission name" required>
                                        @error('name')
                                            <div class="invalid-feedback"></div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>
                                            Guard Name
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="guard_name" class="form-control @error('guard_name') is-invalid @enderror" value="{{ old('guard_name', 'web') }}" placeholder="Enter guard name" required>
                                        @error('guard_name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mb-0 mt-4">
                                    <a href="{{ route('permissions.index') }}" class="btn btn-secondary">
                                        <i class="fas fa-arrow-left"></i>
                                        Cancel
                                    </a>
                                    <button type="submit" class="btn btn-primary ml-2">
                                        <i class="fas fa-save"></i>
                                        Save Permission
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection