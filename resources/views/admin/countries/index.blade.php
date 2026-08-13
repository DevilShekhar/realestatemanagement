@can('view countries')
@extends('admin.layouts.app')

@section('content')
    <section class="section">

        {{-- Page Header --}}
        <div class="section-header">
            <h1>Countries</h1>

            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">
                        Dashboard
                    </a>
                </div>

                <div class="breadcrumb-item active">
                    Countries
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
                            <h4>Country Management</h4>

                            <div class="card-header-action">
                                <a href="{{ route('countries.create') }}"
                                   class="btn btn-primary">

                                    <i class="fas fa-plus"></i>
                                    Create Country

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
                                                Country Name
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

                                            @can('edit countries')
                                            <th width="180">
                                                Action
                                            </th>
                                            @endcan

                                        </tr>
                                    </thead>

                                    <tbody>

                                        @forelse($countries as $key => $country)

                                            <tr>

                                                {{-- Serial Number --}}
                                                <td>
                                                    {{ $countries->firstItem() + $key }}
                                                </td>

                                                {{-- Country Name --}}
                                                <td>
                                                    <strong>
                                                        {{ $country->name }}
                                                    </strong>
                                                </td>

                                                {{-- Status --}}
                                                <td>

                                                    @if($country->status)

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
                                                    {{ $country->creator?->name ?? 'N/A' }}
                                                </td>

                                                {{-- Created At --}}
                                                <td>
                                                    {{ $country->created_at?->format('d M Y, h:i A') }}
                                                </td>

                                                {{-- Updated By --}}
                                                <td>
                                                    {{ $country->updater?->name ?? 'N/A' }}
                                                </td>

                                                {{-- Updated At --}}
                                                <td>
                                                    {{ $country->updated_at?->format('d M Y, h:i A') }}
                                                </td>

                                                {{-- Action --}}
                                                @can('edit countries')
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
                                                            <a
                                                                href="{{ route('countries.edit', $country->id) }}"
                                                                class="dropdown-item">

                                                                <i class="fas fa-edit"></i>
                                                                Edit

                                                            </a>

                                                            {{-- Delete --}}
                                                            <form
                                                                action="{{ route('countries.destroy', $country->id) }}"
                                                                method="POST"
                                                                onsubmit="return confirm('Are you sure you want to delete this country?')">

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
                                                @endcan

                                            </tr>

                                        @empty

                                            <tr>

                                                <td colspan="8" class="text-center py-4">

                                                    <div class="empty-state">

                                                        <div class="empty-state-icon">
                                                            <i class="fas fa-globe"></i>
                                                        </div>

                                                        <h2>
                                                            No Countries Found
                                                        </h2>

                                                        <p class="lead">
                                                            No countries have been created yet.
                                                        </p>

                                                        <a
                                                            href="{{ route('countries.create') }}"
                                                            class="btn btn-primary">

                                                            <i class="fas fa-plus"></i>
                                                            Create First Country

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
