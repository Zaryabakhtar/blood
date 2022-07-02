@extends('layouts.app' , ['title' => 'Donnors Report'])

@push('customCSS')
    <link href="{{ asset('panel/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        Donnor's Report
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body kt-portlet__body--fit">

                <!--begin: Datatable -->
                <div class="container mt-4 mb-4">
                <form class="kt-form kt-form--fit kt-margin-b-20">
                    <div class="row kt-margin-b-20">
                        <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
                            <label>Name:</label>
                            <input type="text" class="form-control kt-input" name="searchName" value="{{ $data['searchName'] ?? '' }}" placeholder="Search By Name" data-col-index="0">
                        </div>
                        <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
                            <label>Phone No:</label>
                            <input type="text" class="form-control kt-input" name="searchPhoneNo" value="{{ $data['searchPhoneNo'] ?? '' }}" placeholder="Search By Phone" data-col-index="1">
                        </div>
                        <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
                            <label>Blood Group:</label>
                            <select class="form-control kt-select2" name="searchBloodGroup" data-col-index="2">
                                <option value="">Select</option>
                                @foreach($data['blood_group'] as $group)
                                    <option value="{{ $group->blood_group_id }}">{{ $group->blood_group_code }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
                            <label>Gender:</label>
                            <select class="form-control kt-select2" data-col-index="6" name="searchGender">
                                <option value="">Select</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Transgender">Transgender</option>
                            </select>
                        </div>
                    </div>
                    <div class="row kt-margin-b-20">
                        <div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
                            <label>Donation Date:</label>
                            <div class="input-daterange input-group" id="kt_datepicker">
                                <input type="text" class="form-control kt-datepicker" name="searchStartDate" value="{{ $data['searchStartDate'] ?? '' }}" placeholder="From" data-col-index="5" />
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="la la-ellipsis-h"></i></span>
                                </div>
                                <input type="text" class="form-control kt-datepicker" name="searchEndDate" value="{{ $data['searchEndDate'] ?? '' }}" placeholder="To" data-col-index="5" />
                            </div>
                        </div>
                        <div class="col-lg-5 kt-margin-b-10-tablet-and-mobile">
                            <label>Address:</label>
                            <input type="text" class="form-control kt-input" name="searchAddress" value="{{ $data['searchAddress'] ?? '' }}" placeholder="Search By Address" data-col-index="4">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <button class="btn btn-primary btn-brand--icon" id="kt_data_search">
                                <span>
                                    <i class="la la-search"></i>
                                    <span>Search</span>
                                </span>
                            </button>
                            <a href="{{ route('panel.reportList') }}" class="btn btn-secondary btn-brand--icon">
                                <span>
                                    <i class="la la-close"></i>
                                    <span>Reset</span>
                                </span>
                            </a>
                        </div>
                    </div>
                </form>
                <!--begin: Datatable -->
                <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
                <table id="example" class="table table-striped- table-bordered table-hover" width="100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone No.</th>
                            <th>Blood Group</th>
                            <th>Gender</th>
                            <th>Donation</th>
                            <th>Donation (Days)</th>
                            <th>Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($data['current']) && count($data['current']) > 0)
                            @foreach($data['current'] as $row)
                                <tr>
                                    <td>{{ $row->donnor_name }}</td>
                                    <td>{{ $row->donnor_phone }}</td>
                                    <td>{{ $row->blood_group_code }}</td>
                                    <td>{{ $row->donnor_gender }}</td>
                                    <td>{{ $row->last_blood_donation }}</td>
                                    <td>{{ $row->visit_ago }}</td>
                                    <td>{{ $row->donnor_address }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7">No Data Found...</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                </div>
                <!--end: Datatable -->
            </div>
        </div>
    </div>
@endsection

@push('customJS')
    <script src="{{ asset('panel/plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var table = $("#example").DataTable({
                orderCellsTop: true,
                dom: 'Brtip',
                buttons: [
                    'copy', 'csv', 'excel', 'print'
                ],
                initComplete: function() {
                    var table = this.api();
                    // Add filtering
                    table.columns().every(function() {
                        var column = this;
                        var input = $('<input type="text" />')
                            .appendTo($("thead tr:eq(1) td").eq(this.index()))
                            .on("keyup", function() {
                            column.search($(this).val()).draw();
                        });
                    });
                }
            });
        });
    </script>
@endpush