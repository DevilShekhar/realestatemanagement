@can('view users')
@extends('admin.layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Users</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}"> Dashboard </a>
                </div>
                <div class="breadcrumb-item active">Users</div>
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
            @endif @if(session('error'))
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
                            <h4>User Management</h4>
                            <div class="card-header-action">
                                <a href="{{ route('users.create') }}" class="btn btn-primary" >
                                    <i class="fas fa-plus"></i>
                                    Create User
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                    <tr>
                                        <th width="70">#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th width="180">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $key => $user)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>
                                                    <strong> {{ $user->name }} </strong>
                                                </td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->mobile ?? '-' }}</td>
                                                <td>
                                                    @if($user->roles->count())
                                                    @foreach($user->roles as $role)
                                                    <span class="badge badge-info">
                                                        {{ $role->name }}
                                                    </span>
                                                    @endforeach @else
                                                    <span class="text-muted"> No Role </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($user->status)
                                                    <span class="badge badge-success">
                                                        Active
                                                    </span>
                                                    @else
                                                    <span class="badge badge-danger">
                                                        Inactive
                                                    </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button  class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"> Action</button>
                                                        <div class="dropdown-menu">
                                                            <a href="{{ route('users.show', $user->id) }}" class="dropdown-item">
                                                                <i class="fas fa-eye"></i>
                                                                View
                                                            </a>
                                                            <a href="{{ route('users.edit', $user->id) }}" class="dropdown-item" >
                                                                <i class="fas fa-edit"></i>
                                                                Edit
                                                            </a>
                                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="delete-user-form">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="dropdown-item text-danger">
                                                                    <i class="fas fa-trash"></i>
                                                                    Delete
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
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
                // DataTable
                $('#table-1').DataTable({
                    pageLength: 10,
                    ordering: true,
                    searching: true,
                    lengthChange: true
                });
                // Delete Confirmation
                $('.delete-user-form').on('submit', function (e) {
                    e.preventDefault();
                    let form = this;
                    let userName = $(this)
                        .closest('tr')
                        .find('td:nth-child(2)')
                        .text()
                        .trim();
                    Swal.fire({
                        title: 'Are you sure?',
                        html: 'You want to deactivate <strong>' + userName + '</strong>?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: '<i class="fas fa-trash"></i> Yes, deactivate',
                        cancelButtonText: 'Cancel',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        </script>      
        @if(session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'User Deactivated!',
                    text: '{{ session('success') }}',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                });
            </script>
        @endif
        @if(session('error'))
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Action Failed',
                    text: '{{ session('error') }}',
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'OK'
                });
            </script>
        @endif
    @endpush
@else
    @php
        abort(403);
    @endphp
@endcan
