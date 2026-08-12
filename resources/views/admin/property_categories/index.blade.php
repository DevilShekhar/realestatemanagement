@extends('admin.layouts.app')

@section('content')
    <section class="section">

        {{-- Page Header --}}
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

            {{-- Success Message --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}

                    <button type="button" class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                </div>
            @endif

            {{-- Error Message --}}
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

                        {{-- Card Header --}}
                        <div class="card-header">
                            <h4>Property Category Management</h4>

                            <div class="card-header-action">
                                <a href="{{ route('property-categories.create') }}"
                                   class="btn btn-primary">

                                    <i class="fas fa-plus"></i>
                                    Create Property Category

                                </a>
                            </div>
                        </div>

                        <div class="card-body">

                            <div class="table-responsive">

                                <table class="table table-striped" id="table-1">

                                    <thead>
                                        <tr>
                                            <th width="70">
                                                #
                                            </th>

                                            <th>
                                                Category Name
                                            </th>

                                            <th width="120">
                                                Status
                                            </th>

                                            <th>
                                                Created By
                                            </th>

                                            <th>
                                                Created At
                                            </th>

                                            <th>
                                                Updated By
                                            </th>

                                            <th>
                                                Updated At
                                            </th>

                                            <th width="180">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        @forelse($categories as $key => $category)

                                            <tr>

                                                {{-- Serial Number --}}
                                                <td>
                                                    {{ $categories->firstItem() + $key }}
                                                </td>

                                                {{-- Category Name --}}
                                                <td>
                                                    <strong>
                                                        {{ $category->name }}
                                                    </strong>
                                                </td>

                                                {{-- Status --}}
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

                                                {{-- Created By --}}
                                                <td>
                                                    {{ $category->createdBy?->name ?? 'N/A' }}
                                                </td>

                                                {{-- Created At --}}
                                                <td>
                                                    {{ $category->created_at?->format('d M Y, h:i A') }}
                                                </td>

                                                {{-- Updated By --}}
                                                <td>
                                                    {{ $category->updatedBy?->name ?? 'N/A' }}
                                                </td>

                                                {{-- Updated At --}}
                                                <td>
                                                    {{ $category->updated_at?->format('d M Y, h:i A') }}
                                                </td>

                                                {{-- Action --}}
                                                <td>

                                                    <div class="dropdown">

                                                        <button
                                                            class="btn btn-primary dropdown-toggle"
                                                            type="button"
                                                            data-toggle="dropdown">

                                                            Action

                                                        </button>

                                                        <div class="dropdown-menu">

                                                            {{-- Edit --}}
                                                            <a href="{{ route('property-categories.edit', $category->id) }}"
                                                               class="dropdown-item">

                                                                <i class="fas fa-edit"></i>
                                                                Edit

                                                            </a>

                                                            {{-- Delete --}}
                                                            <form
                                                                action="{{ route('property-categories.destroy', $category->id) }}"
                                                                method="POST"
                                                                onsubmit="return confirm('Are you sure you want to delete this property category?')">

                                                                @csrf
                                                                @method('DELETE')

                                                                <button
                                                                    type="submit"
                                                                    class="dropdown-item text-danger">

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

                                                <td colspan="8" class="text-center py-4">

                                                    <div class="empty-state">

                                                        <div class="empty-state-icon">
                                                            <i class="fas fa-building"></i>
                                                        </div>

                                                        <h2>
                                                            No Property Categories Found
                                                        </h2>

                                                        <p class="lead">
                                                            No property categories have been created yet.
                                                        </p>

                                                        <a
                                                            href="{{ route('property-categories.create') }}"
                                                            class="btn btn-primary">

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

        $('#table-1').DataTable({
            pageLength: 10,
            ordering: true,
            searching: true,
            lengthChange: true
        });

    });
</script>

@endpush