@extends('layouts.app' , ['title' => 'Add New Donnor'])

@section('content')
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="kt-portlet kt-portlet--mobile">
            <form class="form" id="add_new_donnor_form" method="POST" action="{{ route('panel.storeDonnor') }}" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-6 mb-2">
                                    <div class="row">
                                        <label class="col-md-12">Full Name: <span class="text-danger">*</span></label>
                                        <div class="col-md-12">
                                            <input type="text" name="donnor_name" id="donnor_name" class="form-control" placeholder="Enter Donor Name" autocomplete="false"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="row">
                                        <label class="col-md-12">Email:</label>
                                        <div class="col-md-12">
                                            <input type="email" name="donnor_email" id="donnor_email" class="form-control" placeholder="Enter Donor Email" autocomplete="false"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="row">
                                        <label class="col-md-12">DOB: <span class="text-danger">*</span></label>
                                        <div class="col-md-12">
                                            <input type="text" name="donnor_dob" id="donnor_dob" class="form-control kt-datepicker" placeholder="Select DOB" autocomplete="false"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="row">
                                        <label class="col-md-12">Gender: <span class="text-danger">*</span></label>
                                        <div class="col-md-12">
                                            <select class="form-control kt-select2" id="donnor_gender" name="donnor_gender">
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Transgender">Transgender</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 text-center kt-padding-t-10">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="kt-avatar" id="kt_user_avatar_2">
                                        <div class="kt-avatar__holder" style="background-image: url(../panel/media/users/default.jpg)"></div>
                                        <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
                                            <i class="fa fa-pen"></i>
                                            <input type="file" name="donnor_avatar" accept=".png, .jpg, .jpeg">
                                        </label>
                                        <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                                            <i class="fa fa-times"></i>
                                        </span>
                                    </div>
                                    <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-4 mb-2">
                            <div class="row">
                                <label class="col-md-12">Phone Number: <span class="text-danger">*</span></label>
                                <div class="col-md-12">
                                    <input type="text" name="donnor_phone" class="form-control" placeholder="Enter Phone Number" autocomplete="false"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 mb-2">
                            <div class="row">
                                <label class="col-md-12">Address: <span class="text-danger">*</span></label>
                                <div class="col-md-12">
                                    <input type="text" name="donnor_address" id="donnor_address" class="form-control" placeholder="Donnor Address" autocomplete="false"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="row">
                                <label class="col-md-12">Blood Group: <span class="text-danger">*</span></label>
                                <div class="col-md-12">
                                    <select class="form-control kt-select2" id="donnor_blood_group" name="donnor_blood_group">
                                        @foreach($data['bloodGroups'] as $bloodGroup)
                                            <option value="{{ $bloodGroup->blood_group_id }}">{{ $bloodGroup->blood_group_code }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="row">
                                <label class="col-md-12">Age of Donor: <span class="text-danger">*</span></label>
                                <div class="input-group col-md-12">
                                    <div class="input-group-append"><span class="input-group-text"><i class="la la-sort-numeric-asc"></i></span></div>
                                    <input type="text" name="donnor_age" id="donnor_age" class="form-control validNumber" autocomplete="false"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="row">
                                <label class="col-md-12">Last Donation: <span class="text-danger">*</span></label>
                                <div class="input-group col-md-12">
                                    <div class="input-group-append"><span class="input-group-text"><i class="la la-calendar"></i></span></div>
                                    <input type="text" name="last_donation" id="last_donation" class="form-control kt-datepicker" autocomplete="false"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row text-right">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-8">
                            <button type="submit" class="btn btn-primary mr-2">Add Donor</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('customJS')
    <script src="{{ asset('panel/js/pages/crud/file-upload/ktavatar.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/donnors/add-donnor.js') }}" type="text/javascript"></script>
@endpush