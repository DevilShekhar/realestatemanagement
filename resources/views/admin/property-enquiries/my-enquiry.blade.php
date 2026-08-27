@can('my enquiry')
@extends('admin.layouts.app')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>My Enquiries</h1>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>My Property Enquiries</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover"  id="table-1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Property</th>
                                <th>Enquiry Type</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($enquiries as $enquiry)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        @if($enquiry->property)
                                            <strong>
                                                {{ $enquiry->property->title }}
                                            </strong>

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
                                        {{ $enquiry->enquiry_type ?? 'N/A' }}
                                    </td>
                                    <td>
                                        {{ $enquiry->status ?? 'N/A' }}
                                    </td>
                                    <td>
                                        {{ $enquiry->created_at?->format('d-m-Y') }}
                                    </td>
                                    <td>
                                        @if($enquiry->property)
                                            <a href="{{ route('properties.show', $enquiry->property->id) }}"
                                               class="btn btn-outline-primary btn-sm">
                                                <i class="fas fa-eye"></i>
                                                View Property
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4">
                                        No enquiries found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
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
@endsection
@else
    @php
        abort(403);
    @endphp
@endcan