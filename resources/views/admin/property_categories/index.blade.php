@can('view categories')
    @extends('admin.layouts.app')
    @section('content')
        <section class="section">
            <div class="section-header">
                <h1>Property Categories</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">
                            Dashboard
                        </a>
                    </div>
                    <div class="breadcrumb-item active">
                        Property Categories
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
                                <h4>Property Category Management</h4>                                
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th width="70"> #</th>
                                                <th> Category Name</th>
                                                <th width="120"> Status</th>
                                                <th> Created By</th>
                                                <th>Created At</th>                                                                                          
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($categories as $key => $category)
                                                <tr>                                                
                                                    <td>{{ $key + 1 }}</td>
                                                    <td><strong>{{ $category->name }}</strong> </td>
                                                    <td>
                                                        @if($category->status)
                                                            <span class="badge badge-success">
                                                                Active
                                                            </span>
                                                        @else
                                                            <span class="badge badge-danger">
                                                                Inactive
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td> {{ $category->createdBy?->name ?? 'N/A' }}</td>
                                                    <td>{{ $category->created_at?->format('d M Y, h:i A') }} </td>                                                   
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="8" class="text-center py-4">
                                                        <div class="empty-state">
                                                            <div class="empty-state-icon">
                                                                <i class="fas fa-building"></i>
                                                            </div>
                                                            <h2>  No Property Categories Found </h2>
                                                            <p class="lead"> No property categories have been created yet.</p>
                                                            <a href="{{ route('property-categories.create') }}" class="btn btn-primary">
                                                                <i class="fas fa-plus"></i>
                                                                Create First Property Category
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
                // DataTable
                $('#table-1').DataTable({
                    pageLength: 10,
                    ordering: true,
                    searching: true,
                    lengthChange: true
                });
                // Delete Confirmation
                $('.delete-category-form').on('submit', function (e) {
                    e.preventDefault();
                    let form = this;
                    let categoryName = $(this)
                        .closest('tr')
                        .find('td:nth-child(2)')
                        .text()
                        .trim();
                    Swal.fire({
                        title: 'Are you sure?',
                        html: 'You want to delete <strong>' + categoryName + '</strong>?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: '<i class="fas fa-trash"></i> Yes, delete it!',
                        cancelButtonText: 'Cancel',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }

                    });
                });
                @if(session('success'))
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: @json(session('success')),
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    });
                @endif
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