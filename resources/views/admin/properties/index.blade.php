@can('view properties')
@extends('admin.layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Properties</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">
                        Dashboard
                    </a>
                </div>
                <div class="breadcrumb-item active">
                    Properties
                </div>
            </div>
        </div>
        <div class="section-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="close"  data-dismiss="alert">
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
                            <h4>Property Management</h4>
                            <div class="card-header-action">
                                <a href="{{ route('properties.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i>
                                    Create Property
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped"  id="table-1">
                                    <thead>
                                        <tr>
                                            <th width="60">
                                                #
                                            </th>
                                            <th>
                                                Property
                                            </th>
                                            <th>
                                                Category
                                            </th>
                                            <th>
                                                Country
                                            </th>
                                            <th>
                                                State
                                            </th>
                                            <th>
                                                City
                                            </th>
                                            <th>
                                                Area
                                            </th>
                                            <th>
                                                Price
                                            </th>
                                            <th>
                                                Bedrooms
                                            </th>
                                            <th>
                                                Bathrooms
                                            </th>
                                            <th>
                                                Property Area
                                            </th>
                                            <th>
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
                                        @forelse($properties as $key => $property)
                                            <tr>
                                                <td>
                                                    {{ $properties->firstItem() + $key }}
                                                </td>
                                                <td>
                                                    <strong>
                                                        {{ $property->title }}
                                                    </strong>
                                                    @if($property->address)
                                                        <br>
                                                        <small class="text-muted">
                                                            {{ $property->address }}
                                                        </small>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $property->propertyCategory?->name ?? 'N/A' }}
                                                </td>
                                                <td>
                                                    {{ $property->country?->name ?? 'N/A' }}
                                                </td>
                                                <td>
                                                    {{ $property->state?->name ?? 'N/A' }}
                                                </td>
                                                <td>
                                                    {{ $property->city?->name ?? 'N/A' }}
                                                </td>
                                                <td>
                                                    {{ $property->area?->name ?? 'N/A' }}
                                                </td>
                                                <td>
                                                    @if($property->price !== null)
                                                        ₹{{ number_format($property->price, 2) }}
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $property->bedrooms ?? 'N/A' }}
                                                </td>
                                                <td>
                                                    {{ $property->bathrooms ?? 'N/A' }}
                                                </td>
                                                <td>
                                                    @if($property->area !== null)
                                                        {{ $property->area }}
                                                        {{ $property->area_unit ?? '' }}
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($property->status)
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
                                                    {{ $property->creator?->name ?? 'N/A' }}
                                                </td>
                                                <td>
                                                    {{ $property->created_at?->format('d M Y, h:i A') }}
                                                </td>
                                                <td>
                                                    {{ $property->updater?->name ?? 'N/A' }}
                                                </td>
                                                <td>
                                                    {{ $property->updated_at?->format('d M Y, h:i A') }}
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-primary dropdown-toggle"  type="button" data-toggle="dropdown"> Action </button>
                                                        <div class="dropdown-menu">

                                                            <a href="{{ route('properties.show', $property->id) }}"class="dropdown-item">
                                                                <i class="fas fa-eye"></i>
                                                                View
                                                            </a>
                                                            <a href="{{ route('properties.edit', $property->id) }}" class="dropdown-item">
                                                                <i class="fas fa-edit"></i>
                                                                Edit
                                                            </a>
                                                            <form action="{{ route('properties.destroy', $property->id) }}" method="POST"  onsubmit="return confirm('Are you sure you want to delete this property?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button  type="submit"  class="dropdown-item text-danger">
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
                                                <td colspan="17" class="text-center py-4">
                                                    <div class="empty-state">
                                                        <div class="empty-state-icon">
                                                            <i class="fas fa-building"></i>
                                                        </div>
                                                        <h2>
                                                            No Properties Found
                                                        </h2>
                                                        <p class="lead">
                                                            No properties have been created yet.
                                                        </p>
                                                        <a href="{{ route('properties.create') }}" class="btn btn-primary">
                                                            <i class="fas fa-plus"></i>
                                                            Create First Property
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
