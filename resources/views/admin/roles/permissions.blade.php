@can('view permissions')
@extends('admin.layouts.app')

@section('content')

<section class="section">

    <div class="section-header">
        <h1>Assign Permissions</h1>

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
                Assign Permissions
            </div>

        </div>
    </div>

    <div class="section-body">

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}

                <button type="button" class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                {{ session('error') }}

                <button type="button" class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">

            <div class="col-12">

                <div class="card">

                    <div class="card-header">
                        <h4>
                            Assign Permissions
                        </h4>
                    </div>

                    <div class="card-body">

                        <div class="mb-4">
                            <strong>
                                Role:
                            </strong>

                            <span class="badge badge-primary">
                                {{ $role->name }}
                            </span>
                        </div>

                        <form
                            action="{{ route('roles.permissions.update', $role->id) }}"
                            method="POST"
                        >

                            @csrf
                            @method('PUT')

                            <div class="row">

                                @forelse($permissions as $permission)

                                    <div class="col-md-4 mb-3">

                                        <div class="custom-control custom-checkbox">

                                            <input
                                                type="checkbox"
                                                name="permissions[]"
                                                value="{{ $permission->id }}"
                                                class="custom-control-input"
                                                id="permission_{{ $permission->id }}"
                                                {{ $role->permissions->contains('id', $permission->id) ? 'checked' : '' }}
                                            >

                                            <label
                                                class="custom-control-label"
                                                for="permission_{{ $permission->id }}"
                                            >
                                                {{ $permission->name }}
                                            </label>

                                        </div>

                                    </div>

                                @empty

                                    <div class="col-12">

                                        <div class="empty-state">

                                            <div class="empty-state-icon">
                                                <i class="fas fa-key"></i>
                                            </div>

                                            <h2>
                                                No Permissions Found
                                            </h2>

                                            <p class="lead">
                                                No permissions have been created yet.
                                            </p>

                                            <a
                                                href="{{ route('permissions.create') }}"
                                                class="btn btn-primary"
                                            >
                                                <i class="fas fa-plus"></i>
                                                Create Permission
                                            </a>

                                        </div>

                                    </div>

                                @endforelse

                            </div>

                            @if($permissions->count())

                                <div class="form-group mb-0 mt-4">

                                    <a
                                        href="{{ route('roles.index') }}"
                                        class="btn btn-secondary"
                                    >
                                        <i class="fas fa-arrow-left"></i>
                                        Cancel
                                    </a>

                                    <button
                                        type="submit"
                                        class="btn btn-primary ml-2"
                                    >
                                        <i class="fas fa-save"></i>
                                        Save Permissions
                                    </button>

                                </div>

                            @endif

                        </form>

                    </div>

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
