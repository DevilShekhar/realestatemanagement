@can('property enquiries listing')
@extends('admin.layouts.app')
@section('title', 'Property Enquiries')
@section('content')
<div class="section">
    <div class="section-header">
        <h1>
            Property Enquiries
        </h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">
                    Dashboard
                </a>
            </div>
            <div class="breadcrumb-item active">
                Property Enquiries
            </div>
        </div>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>
                    Property Enquiries
                </h4>
                <div class="ml-auto">
                    <span class="badge badge-primary p-2">
                        {{ $enquiries->count() }} Enquiries
                    </span>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover"  id="table-1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Property </th>
                                <th>Name</th>
                                <th>Contact Info</th>
                                <th>Available</th>
                                <th>Enquiry</th>
                                <th>Follow-up </th>
                                <th>Note</th> 
                                <th>Submitted </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($enquiries as $key => $enquiry)
                                <tr>                                    
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        @if($enquiry->property)
                                            <a href="{{ route('properties.show', $enquiry->property->id) }}" class="text-black">
                                                <strong>
                                                    {{ $enquiry->property->title }}
                                                </strong>
                                            </a>
                                            @if($enquiry->property->property_code)
                                                <div class="text-muted small">
                                                    Code:
                                                    {{ $enquiry->property->property_code }}
                                                </div>
                                            @endif
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>
                                        <strong>
                                            {{ $enquiry->buyer?->name ?? 'N/A' }}
                                        </strong>
                                    </td>
                                    <td>
                                        <div>
                                            <i class="fas fa-phone mr-1"></i>
                                            {{ $enquiry->buyer?->mobile ?? 'N/A' }}
                                        </div>
                                        <div class="mt-1">
                                            <i class="fas fa-envelope mr-1"></i>
                                            {{ $enquiry->buyer?->email ?? 'N/A' }}
                                        </div>
                                    </td>
                                    <td>
                                        @if($enquiry->property_available === 'yes')
                                            <span class="badge badge-success">
                                                <i class="fas fa-check mr-1"></i>
                                                Yes
                                            </span>
                                        @elseif($enquiry->property_available === 'no')
                                            <span class="badge badge-danger">
                                                <i class="fas fa-times mr-1"></i>
                                                No
                                            </span>
                                        @else
                                            <span class="badge badge-warning">
                                                <i class="fas fa-question mr-1"></i>
                                                Maybe
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($enquiry->enquiry_type)
                                            {{ ucwords(
                                                str_replace(
                                                    '_',
                                                    ' ',
                                                    $enquiry->enquiry_type
                                                )
                                            ) }}
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>
                                        @if($enquiry->follow_up_required === 'yes')
                                            <span class="badge badge-info">
                                                <i class="fas fa-bell mr-1"></i>
                                                Required
                                            </span>
                                        @else
                                            <span class="badge badge-secondary">
                                                Not Required
                                            </span>
                                        @endif
                                    </td>
                                    <td style="min-width: 220px;">
                                        {{ $enquiry->note ?? 'N/A' }}
                                    </td>
                                    <td style="white-space: nowrap;">
                                        <i class="fas fa-calendar-alt mr-1"></i>
                                        {{ $enquiry->created_at
                                            ? $enquiry->created_at->format('d M Y, h:i A')
                                            : 'N/A'
                                        }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="text-center py-5">
                                        <i
                                            data-feather="message-circle"
                                            style="width:45px;height:45px;"
                                        ></i>
                                        <h5 class="mt-3">
                                            No Property Enquiries
                                        </h5>
                                        <p class="text-muted mb-0">
                                            No buyer enquiries have been submitted yet.
                                        </p>
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
@endsection
@push('scripts')
<script>
$(document).ready(function () {

    $('#table-1').DataTable({
        pageLength: 10,
        lengthChange: true,
        searching: true,
        ordering: true,
        paging: true,
        info: true
    });

});
</script>
@endpush
@else
    @php
        abort(403);
    @endphp
@endcan