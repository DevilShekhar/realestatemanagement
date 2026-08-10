@extends('admin.layouts.app')
@section('content')
    <section class="section">        
        <div class="section-header">
            <h1>Create Role</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">
                        Dashboard
                    </a>
                </div>
                <div class="breadcrumb-item">
                    <a href="{{ route('roles.index') }}">
                        Roles
                    </a>
                </div>
                <div class="breadcrumb-item active">
                    Create Role
                </div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Role</h4>
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

                            <form action="{{ route('roles.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Role Name<span class="text-danger">*</span></label>
                                        <input type="text" name="name"  class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Enter role name" required>
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>                                                           
                                </div>
                                <div class="form-group mb-0 mt-4">
                                    <a href="{{ route('roles.index') }}" class="btn btn-secondary">
                                        <i class="fas fa-arrow-left"></i>
                                        Cancel
                                    </a>
                                    <button type="submit" class="btn btn-primary ml-2">
                                        <i class="fas fa-save"></i>
                                        Save Role
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

