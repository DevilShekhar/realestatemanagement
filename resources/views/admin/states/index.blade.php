@can('view states')
    @extends('admin.layouts.app')
    @section('content')
        <section class="section">
            <div class="section-header">
                <h1>States</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">
                            Dashboard
                        </a>
                    </div>
                    <div class="breadcrumb-item active">
                        States
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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>State Management</h4>
                                <div class="card-header-action">
                                    <a href="{{ route('states.create') }}"
                                    class="btn btn-primary">
                                        <i class="fas fa-plus"></i>
                                        Create State
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th width="70"> #</th>
                                                <th>State Name</th>
                                                <th>Country </th>
                                                <th width="120">Status</th>
                                                <th>Created By</th>
                                                <th>Created At </th>
                                                <th>Updated By</th>
                                                <th>Updated At</th>
                                                <th width="180">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($states as $key => $state)
                                                <tr>
                                                    <td>{{ $states->firstItem() + $key }}</td>
                                                    <td>
                                                        <strong>
                                                            {{ $state->name }}
                                                        </strong>
                                                    </td>
                                                    <td>{{ $state->country?->name ?? 'N/A' }}</td>
                                                    <td>
                                                        @if($state->status)
                                                            <span class="badge badge-success">
                                                                Active
                                                            </span>
                                                        @else
                                                            <span class="badge badge-danger">
                                                                Inactive
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $state->creator?->name ?? 'N/A' }}</td>
                                                    <td>{{ $state->created_at?->format('d M Y, h:i A') }}</td>
                                                    <td>{{ $state->updater?->name ?? 'N/A' }}</td>
                                                    <td>{{ $state->updated_at?->format('d M Y, h:i A') }}</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action</button>
                                                            <div class="dropdown-menu">
                                                                <a href="{{ route('states.edit', $state->id) }}"  class="dropdown-item"><i class="fas fa-edit"></i>Edit</a>
                                                                <form action="{{ route('states.destroy', $state->id) }}" method="POST"  class="delete-state-form">
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
                                            @empty
                                                <tr>
                                                    <td colspan="9" class="text-center py-4">
                                                        <div class="empty-state">
                                                            <div class="empty-state-icon">
                                                            <i class="fas fa-map-marker-alt"></i>
                                                            </div>
                                                            <h2>No States Found</h2>
                                                            <p class="lead">No states have been created yet.</p>
                                                            <a href="{{ route('states.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>Create First State</a>
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
                // DataTable
                $('#table-1').DataTable({
                    pageLength: 10,
                    ordering: true,
                    searching: true,
                    lengthChange: true
                });
                // Delete State Confirmation
                $('.delete-state-form').on('submit', function (e) {
                    e.preventDefault();
                    let form = this;
                    let stateName = $(this)
                        .closest('tr')
                        .find('td:nth-child(2)')
                        .text()
                        .trim();
                    Swal.fire({
                        title: 'Are you sure?',
                        html: 'You want to deactivate <strong>' + stateName + '</strong>?',
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
                // Success Alert
                @if(session('success'))
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: @json(session('success')),
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    });
                @endif

                // Error Alert
                @if(session('error'))
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: @json(session('error')),
                        confirmButtonColor: '#d33',
                        confirmButtonText: 'OK'
                    });
                @endif

            });
        </script>
    @endpush
@else
    @php
        abort(403);
    @endphp
@endcan