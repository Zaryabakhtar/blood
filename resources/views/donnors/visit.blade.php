@extends('layouts.app' , ['title' => 'Add New Visit'])

@section('content')
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="kt-portlet kt-portlet--mobile">
            <form class="form" id="add_new_donnor_visit" method="POST" action="{{ route('panel.storeVisit') }}">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-12 mb-2">
                                    <div class="row">
                                        <label class="col-md-12">Visit Date: <span class="text-danger">*</span></label>
                                        <div class="input-group col-md-12">
                                            <div class="input-group-append"><span class="input-group-text"><i class="la la-calendar"></i></span></div>
                                            <input type="text" name="donnor_visit" id="donnor_visit" class="form-control kt-datepicker" value="{{ date('Y-m-d') }}" autocomplete="false"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-12 mb-2">
                                    <div class="row">
                                        <label class="col-md-12">Donor's: <span class="text-danger">*</span></label>
                                        <div class="col-md-12">
                                            <select class="form-control kt-select2" id="visit_donnors" name="visit_donnors[]" multiple>
                                                @foreach($data['donnors'] as $donnor)
                                                    <option value="{{ $donnor->donnor_id }}">{{ $donnor->donnor_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row text-right">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-8">
                            <button type="submit" class="btn btn-primary mr-2">Add Visit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('customJS')
    <script src="{{ asset('js/donnors/add-visit.js') }}" type="text/javascript"></script>
@endpush