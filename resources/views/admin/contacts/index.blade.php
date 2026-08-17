@extends('admin.layouts.app')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Contact Submissions</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">
                    Dashboard
                </a>
            </div>
            <div class="breadcrumb-item active">
                Contact Submissions
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
                        <h4>
                            Contact Submissions
                        </h4>
                        <div class="card-header-action">
                            <span class="badge badge-primary">
                                {{ $contacts->total() }} Total
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th width="70">  #</th>
                                        <th> Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th>Submitted At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($contacts as $key => $contact)
                                        <tr>
                                            <td>
                                                {{ $contacts->firstItem() + $key }}
                                            </td>
                                            <td>
                                                <strong>
                                                    {{ $contact->name }}
                                                </strong>
                                            </td>
                                            <td>
                                                <a href="mailto:{{ $contact->email }}">
                                                    {{ $contact->email }}
                                                </a>
                                            </td>
                                            <td>
                                                @if($contact->phone)
                                                    <a href="tel:{{ $contact->phone }}">
                                                        {{ $contact->phone }}
                                                    </a>
                                                @else
                                                    <span class="text-muted">
                                                        N/A
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                <strong>
                                                    {{ $contact->subject }}
                                                </strong>
                                            </td>
                                            <td>
                                                <span title="{{ $contact->message }}">
                                                    {{ \Illuminate\Support\Str::limit($contact->message, 70) }}
                                                </span>
                                            </td>
                                            <td>
                                                {{ $contact->created_at
                                                    ? $contact->created_at->format('d M Y, h:i A')
                                                    : 'N/A'
                                                }}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center py-4">
                                                <div class="empty-state">
                                                    <div class="empty-state-icon">
                                                        <i class="fas fa-envelope-open-text"></i>
                                                    </div>
                                                    <h2>
                                                        No Contact Submissions Found
                                                    </h2>
                                                    <p class="lead">
                                                        No contact messages have
                                                        been submitted yet.
                                                    </p>
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
            lengthChange: true,
            columnDefs: [
                {
                    orderable: false,
                    targets: [0]
                }
            ]
        });
    });
</script>
@endpush