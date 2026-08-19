@extends('admin.layouts.app')
@section('content')
<section class="section">   
  <div class="row">
    @if(in_array($role, ['super-admin', 'admin', 'agent','buyer']))
        <div class="col-lg-4">
            <div class="card">
                <div class="card-statistic-4">
                    <div class="align-items-center justify-content-between">
                        <div class="row">
                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 pr-0 pt-3">
                                <div class="card-content">
                                    <h5 class="font-15">Find Property</h5>

                                    <h2 class="mb-3 font-18">
                                        Properties
                                    </h2>

                                    <p class="mb-0">
                                        <a href="{{ url('get-properties') }}" class="btn btn-primary btn-sm">
                                            <i class="fas fa-search"></i>
                                            Find Property
                                        </a>
                                    </p>
                                </div>
                            </div>

                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 pl-0">
                                <div class="banner-img">
                                    <img src="{{ asset('assets/img/banner/1.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
     @if(in_array($role, ['super-admin', 'admin', 'agent','seller']))
    <div class="col-lg-4">
        <div class="card">
            <div class="card-statistic-4">
                <div class="align-items-center justify-content-between">
                    <div class="row">
                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 pr-0 pt-3">
                            <div class="card-content">
                                <h5 class="font-15">Create Property</h5>

                                <h2 class="mb-3 font-18">
                                    Property
                                </h2>

                                <p class="mb-0">
                                    <a href="{{ route('property.create') }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-plus"></i>
                                        Add Property
                                    </a>
                                </p>
                            </div>
                        </div>

                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 pl-0">
                            <div class="banner-img">
                                <img src="{{ asset('assets/img/banner/1.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
    @if(in_array($role, ['super-admin', 'admin', 'agent']))
      <div class="col-lg-4">
        <div class="card">
          <div class="card-statistic-4">
            <div class="align-items-center justify-content-between">
              <div class="row">
                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 pr-0 pt-3">
                  <div class="card-content">
                    <h5 class="font-15">Total Users</h5>
                    <h2 class="mb-3 font-18">{{ $totalUsers }}</h2>
                    <p class="mb-0">
                      <span class="col-green">
                        <i class="fas fa-users"></i>
                      </span>
                      All Users
                    </p>
                  </div>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 pl-0">
                  <div class="banner-img">
                    <img src="{{ asset('assets/img/banner/1.png') }}" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card">
          <div class="card-statistic-4">
            <div class="align-items-center justify-content-between">
              <div class="row">
                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 pr-0 pt-3">
                  <div class="card-content">
                    <h5 class="font-15">Enquiries</h5>
                    <h2 class="mb-3 font-18">{{ $totalPropertyEnquiries }} </h2>
                    <p class="mb-0">
                      <span class="col-orange">
                        <i class="fas fa-envelope"></i>
                      </span>
                      Property Enquiries
                    </p>
                  </div>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 pl-0">
                  <div class="banner-img">
                    <img src="{{ asset('assets/img/banner/4.png') }}" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card">
          <div class="card-statistic-4">
            <div class="align-items-center justify-content-between">
              <div class="row">
                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 pr-0 pt-3">
                  <div class="card-content">
                    <h5 class="font-15"> Properties</h5>
                    <h2 class="mb-3 font-18">{{ $totalProperties }} </h2>
                    <p class="mb-0">
                      <span class="col-green">
                        <i class="fas fa-building"></i>
                      </span>
                      Total Properties
                    </p>
                  </div>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 pl-0">
                  <div class="banner-img">
                    <img src="{{ asset('assets/img/banner/2.png') }}" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endif
    <div class="col-lg-4">
      <div class="card">
        <div class="card-statistic-4">
          <div class="align-items-center justify-content-between">
            <div class="row">
              <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 pr-0 pt-3">
                <div class="card-content">
                  <h5 class="font-15">Active Properties</h5>
                  <h2 class="mb-3 font-18"> {{ $activeProperties }}</h2>
                  <p class="mb-0">
                    <span class="col-green">
                        <i class="fas fa-check-circle"></i>
                    </span>
                    Active
                  </p>
                </div>
              </div>
              <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 pl-0">
                <div class="banner-img">
                  <img src="{{ asset('assets/img/banner/3.png') }}" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>      
    @if(in_array($role, ['super-admin', 'admin', 'agent']))
      <div class="col-lg-4">
        <div class="card">
          <div class="card-header">
            <h4>Inactive Properties</h4>
          </div>
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div class="mr-3">
                <i class="fas fa-times-circle fa-3x text-danger"></i>
              </div>
              <div>
                <h3 class="mb-0">{{ $inactiveProperties }} </h3>
                <p class="text-muted mb-0"> Currently Inactive</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card">
          <div class="card-header">
            <h4>Sold Out</h4>
          </div>
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div class="mr-3">
                <i class="fas fa-home fa-3x text-warning"></i>
              </div>
              <div>
                <h3 class="mb-0"> {{ $soldProperties }} </h3>
                <p class="text-muted mb-0"> Sold Properties</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endif
  </div>   
  <div class="row">
    @if(in_array($role, ['super-admin', 'admin', 'agent']))
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="fas fa-list"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Categories</h4>
            </div>
            <div class="card-body">
              {{ $totalCategories }}
            </div>
          </div>
        </div>
      </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-statistic-1">
                  <div class="card-icon bg-success">
                      <i class="fas fa-star"></i>
                  </div>
                  <div class="card-wrap">
                      <div class="card-header">
                          <h4>Amenities</h4>
                      </div>
                      <div class="card-body">
                          {{ $totalAmenities }}
                      </div>
                  </div>
              </div>
          </div>
        @endif
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-statistic-1">
                <div class="card-icon bg-info">
                    <i class="fas fa-city"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Cities</h4>
                    </div>
                    <div class="card-body">
                        {{ $totalCities }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Areas</h4>
                    </div>
                    <div class="card-body">
                        {{ $totalAreas }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="mr-3">
                            <i class="fas fa-globe fa-2x text-primary"></i>
                        </div>
                        <div>
                            <h6 class="text-muted mb-1">
                                Countries
                            </h6>
                            <h3 class="mb-0">
                                {{ $totalCountries }}
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="mr-3">
                            <i class="fas fa-map fa-2x text-success"></i>
                        </div>
                        <div>
                            <h6 class="text-muted mb-1">
                                States
                            </h6>
                            <h3 class="mb-0">
                                {{ $totalStates }}
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(in_array($role, ['super-admin', 'admin', 'agent']))
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Recent Properties
                    </h4>
                    <div class="card-header-action">
                        <a href="{{ route('properties.index') }}" class="btn btn-primary"> View All</a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Property</th>
                                    <th>Status</th>
                                    <th>Created</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentProperties as $property)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            {{ $property->title ?? $property->name ?? 'N/A' }}
                                        </td>
                                            <td>
                                                @if($property->status == 2)
                                                    <span class="badge badge-warning">
                                                        Sold Out
                                                    </span>
                                                @elseif($property->status == 1)
                                                    <span class="badge badge-success">
                                                        Active
                                                    </span>
                                                @elseif($property->status == 0)
                                                    <span class="badge badge-danger">
                                                        Inactive
                                                    </span>
                                                @else
                                                    <span class="badge badge-secondary">
                                                        Unknown
                                                    </span>
                                                @endif
                                            </td>                                      
                                        <td>
                                            {{ $property->created_at?->format('d-m-Y') }}
                                        </td>
                                        <td>
                                            <a href="{{ route('properties.show', $property->id) }}" class="btn btn-outline-primary btn-sm">View</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            No properties found.
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
    <div class="row">
       <div class="col-12 col-lg-12">
          <div class="card">
              <div class="card-header">
                  <h4>
                      Recent Property Enquiries
                  </h4>
                  <div class="card-header-action">
                      <a href="{{ route('property-enquiries.index') }}" class="btn btn-primary" >View All</a>
                  </div>
              </div>
              <div class="card-body p-0">
                  <div class="table-responsive">
                      <table class="table table-hover">
                          <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Property</th>
                                  <th>Name</th>
                                  <th>Contact</th>
                                  <th>Date</th>
                              </tr>
                          </thead>
                          <tbody>
                              @forelse($recentEnquiries as $enquiry)
                                  <tr>
                                      <td>
                                          {{ $loop->iteration }}
                                      </td>
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
                                        <td colspan="5" class="text-center py-4" >
                                          <i data-feather="message-circle"  style="width:40px;height:40px;" ></i>
                                          <h6 class="mt-3"> No Property Enquiries </h6>
                                      </td>
                                  </tr>
                              @endforelse
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Recent Contacts
                    </h4>
                    <div class="card-header-action">
                        <a href="{{ route('contacts.index-list') }}" class="btn btn-primary" >
                            View All
                        </a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentContacts as $contact)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            {{ $contact->name ?? 'N/A' }}
                                        </td>
                                        <td>
                                            {{ $contact->email ?? 'N/A' }}
                                        </td>
                                        <td>
                                            {{ $contact->created_at?->format('d-m-Y') }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">
                                            No contacts found.
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
 @endif   
    <div class="settingSidebar">
        <a href="javascript:void(0)" class="settingPanelToggle" >
            <i class="fa fa-spin fa-cog"></i>
        </a>
        <div class="settingSidebar-body ps-container ps-theme-default">
            <div class="fade show active">
                <div class="setting-panel-header">
                    Setting Panel
                </div>
                <div class="p-15 border-bottom">
                    <h6 class="font-medium m-b-10">
                        Select Layout
                    </h6>
                    <div class="selectgroup layout-color w-50">
                        <label class="selectgroup-item">
                            <input  type="radio"  name="value" value="1"  class="selectgroup-input-radio select-layout"  checked >
                            <span class="selectgroup-button">
                                Light
                            </span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio"  name="value" value="2" class="selectgroup-input-radio select-layout" >
                            <span class="selectgroup-button">
                                Dark
                            </span>
                        </label>
                    </div>
                </div>   
            </div>
        </div>
    </div>
</section>
@endsection