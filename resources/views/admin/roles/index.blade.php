@can('view roles')
@extends('admin.layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Roles</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">
                        Dashboard
                    </a>
                </div>
                <div class="breadcrumb-item active">
                    Roles
                </div>
            </div>
        </div>
        <div class="section-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button  type="button" class="close" data-dismiss="alert" >
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
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Role Management</h4>                            
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th width="70"> # </th>
                                            <th>  Role Name</th>
                                            <th width="180">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($roles as $key => $role)
                                            <tr>
                                                <td>
                                                    {{ $roles->firstItem() + $key }}
                                                </td>
                                                <td>
                                                    <strong>
                                                        {{ $role->name }}
                                                    </strong>
                                                </td>
                                                <td>
                                                    <a href="{{ route('roles.permissions', $role->id) }}" class="btn btn-primary ml-2">
                                                        <i class="fas fa-key"></i>
                                                        Assign Permission
                                                    </a>                                                      
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center py-4" >
                                                    <div class="empty-state">
                                                        <div class="empty-state-icon">
                                                            <i class="fas fa-user-shield"></i>
                                                        </div>
                                                        <h2>No Roles Found</h2>
                                                        <p class="lead">
                                                            No roles have been created yet.
                                                        </p>
                                                        <a  href="{{ route('roles.create') }}"  class="btn btn-primary">
                                                            <i class="fas fa-plus"></i>
                                                            Create First Role
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            $('#table-1').DataTable({
                pageLength: 10,
                ordering: true,
                searching: true,
                lengthChange: true
            });
        });
    </script>
@endpush
@else
    @php
        abort(403);
    @endphp
@endcan
