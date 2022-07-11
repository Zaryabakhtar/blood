@extends('layouts.app' , ['title' => 'Donor Profile'])

@section('content')
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">

            <!--Begin:: App Aside Mobile Toggle-->
            <button class="kt-app__aside-close" id="kt_user_profile_aside_close">
                <i class="la la-close"></i>
            </button>

            <!--End:: App Aside Mobile Toggle-->

            <!--Begin:: App Aside-->
            <div class="kt-grid__item" id="kt_user_profile_aside">

                <!--begin:: Widgets/Applications/User/Profile1-->
                <div class="kt-portlet kt-portlet--height-fluid-">
                    <div class="kt-portlet__head  kt-portlet__head--noborder">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body kt-portlet__body--fit-y">
                        <!--begin::Widget -->
                        <div class="kt-widget kt-widget--user-profile-1">
                            <div class="kt-widget__head">
                                <div class="kt-widget__media">
                                    <img src="{{ asset('uploads/donnors-profile') }}/{{ $data['donnor']->donnor_picture }}" alt="Image">
                                </div>
                                <div class="kt-widget__content">
                                    <div class="kt-widget__section">
                                        <a href="#" class="kt-widget__username">
                                            {{ $data['donnor']->donnor_name }}
                                            <i class="flaticon2-correct kt-font-success"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-widget__body">
                                <div class="kt-widget__content">
                                    <div class="kt-widget__info">
                                        <span class="kt-widget__label">Email:</span>
                                        <a href="#" class="kt-widget__data">{{ $data['donnor']->donnor_email ?? '-' }}</a>
                                    </div>
                                    <div class="kt-widget__info">
                                        <span class="kt-widget__label">Phone:</span>
                                        <a href="#" class="kt-widget__data">{{ $data['donnor']->donnor_phone ?? '-' }}</a>
                                    </div>
                                    <div class="kt-widget__info">
                                        <span class="kt-widget__label">Address:</span>
                                        <span class="kt-widget__data">{{ $data['donnor']->donnor_address ?? '-' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--end::Widget -->
                    </div>
                </div>

                <!--end:: Widgets/Applications/User/Profile1-->
            </div>

            <!--End:: App Aside-->

            <!--Begin:: App Content-->
            <div class="kt-grid__item kt-grid__item--fluid kt-app__content">
                <div class="row">
                    <div class="col-xl-6">
                        <!--begin:: Widgets/Tasks -->
                        <div class="kt-portlet kt-portlet--tabs kt-portlet--height-fluid">
                            <div class="kt-portlet__head">
                                <div class="kt-portlet__head-label">
                                    <h3 class="kt-portlet__head-title">
                                        Donation History
                                    </h3>
                                </div>
                            </div>
                            <div class="kt-portlet__body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="kt_widget2_tab1_content">
                                        @if(isset($data['donnor']->visits))
                                            @foreach($data['donnor']->visits as $visit)
                                                <div class="kt-widget2">
                                                    <div class="kt-widget2__item kt-widget2__item--primary pl-5">
                                                        <div class="kt-widget2__info">
                                                            <a href="javascript:void(0);" class="kt-widget2__title">
                                                                {{ $visit->visit_date }} ({{ App\Http\Controllers\Controller::timeAgo(strtotime($visit->created_at)) }})
                                                            </a>
                                                            <a href="javascript:void(0);" class="kt-widget2__username">
                                                                {{ $visit->visit_note }}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="tab-pane" id="kt_widget2_tab2_content">
                                        <div class="kt-widget2">
                                            <div class="kt-widget2__item kt-widget2__item--success">
                                                <div class="kt-widget2__checkbox">
                                                    <label class="kt-checkbox kt-checkbox--solid kt-checkbox--single">
                                                        <input type="checkbox">
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="kt-widget2__info">
                                                    <a href="#" class="kt-widget2__title">
                                                        Make Metronic Development.Lorem Ipsum
                                                    </a>
                                                    <a class="kt-widget2__username">
                                                        By James
                                                    </a>
                                                </div>
                                                <div class="kt-widget2__actions">
                                                    <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown">
                                                        <i class="flaticon-more-1"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                                                        <ul class="kt-nav">
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-line-chart"></i>
                                                                    <span class="kt-nav__link-text">Reports</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-send"></i>
                                                                    <span class="kt-nav__link-text">Messages</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-pie-chart-1"></i>
                                                                    <span class="kt-nav__link-text">Charts</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-avatar"></i>
                                                                    <span class="kt-nav__link-text">Members</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-settings"></i>
                                                                    <span class="kt-nav__link-text">Settings</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="kt-widget2__item kt-widget2__item--warning">
                                                <div class="kt-widget2__checkbox">
                                                    <label class="kt-checkbox kt-checkbox--solid kt-checkbox--single">
                                                        <input type="checkbox">
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="kt-widget2__info">
                                                    <a href="#" class="kt-widget2__title">
                                                        Prepare Docs For Metting On Monday
                                                    </a>
                                                    <a href="#" class="kt-widget2__username">
                                                        By Sean
                                                    </a>
                                                </div>
                                                <div class="kt-widget2__actions">
                                                    <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown">
                                                        <i class="flaticon-more-1"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                                                        <ul class="kt-nav">
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-line-chart"></i>
                                                                    <span class="kt-nav__link-text">Reports</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-send"></i>
                                                                    <span class="kt-nav__link-text">Messages</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-pie-chart-1"></i>
                                                                    <span class="kt-nav__link-text">Charts</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-avatar"></i>
                                                                    <span class="kt-nav__link-text">Members</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-settings"></i>
                                                                    <span class="kt-nav__link-text">Settings</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="kt-widget2__item kt-widget2__item--danger">
                                                <div class="kt-widget2__checkbox">
                                                    <label class="kt-checkbox kt-checkbox--solid kt-checkbox--single">
                                                        <input type="checkbox">
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="kt-widget2__info">
                                                    <a href="#" class="kt-widget2__title">
                                                        Completa Financial Report For Emirates Airlines
                                                    </a>
                                                    <a href="#" class="kt-widget2__username">
                                                        By Bob
                                                    </a>
                                                </div>
                                                <div class="kt-widget2__actions">
                                                    <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown">
                                                        <i class="flaticon-more-1"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                                                        <ul class="kt-nav">
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-line-chart"></i>
                                                                    <span class="kt-nav__link-text">Reports</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-send"></i>
                                                                    <span class="kt-nav__link-text">Messages</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-pie-chart-1"></i>
                                                                    <span class="kt-nav__link-text">Charts</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-avatar"></i>
                                                                    <span class="kt-nav__link-text">Members</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-settings"></i>
                                                                    <span class="kt-nav__link-text">Settings</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="kt-widget2__item kt-widget2__item--primary">
                                                <div class="kt-widget2__checkbox">
                                                    <label class="kt-checkbox kt-checkbox--solid kt-checkbox--single">
                                                        <input type="checkbox">
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="kt-widget2__info">
                                                    <a href="#" class="kt-widget2__title">
                                                        Make Metronic Great Again.Lorem Ipsum Amet
                                                    </a>
                                                    <a href="#" class="kt-widget2__username">
                                                        By Bob
                                                    </a>
                                                </div>
                                                <div class="kt-widget2__actions">
                                                    <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown">
                                                        <i class="flaticon-more-1"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                                                        <ul class="kt-nav">
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-line-chart"></i>
                                                                    <span class="kt-nav__link-text">Reports</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-send"></i>
                                                                    <span class="kt-nav__link-text">Messages</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-pie-chart-1"></i>
                                                                    <span class="kt-nav__link-text">Charts</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-avatar"></i>
                                                                    <span class="kt-nav__link-text">Members</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-settings"></i>
                                                                    <span class="kt-nav__link-text">Settings</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="kt-widget2__item kt-widget2__item--info">
                                                <div class="kt-widget2__checkbox">
                                                    <label class="kt-checkbox kt-checkbox--solid kt-checkbox--single">
                                                        <input type="checkbox">
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="kt-widget2__info">
                                                    <a href="#" class="kt-widget2__title">
                                                        Completa Financial Report For Emirates Airlines
                                                    </a>
                                                    <a href="#" class="kt-widget2__username">
                                                        By Sean
                                                    </a>
                                                </div>
                                                <div class="kt-widget2__actions">
                                                    <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown">
                                                        <i class="flaticon-more-1"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                                                        <ul class="kt-nav">
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-line-chart"></i>
                                                                    <span class="kt-nav__link-text">Reports</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-send"></i>
                                                                    <span class="kt-nav__link-text">Messages</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-pie-chart-1"></i>
                                                                    <span class="kt-nav__link-text">Charts</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-avatar"></i>
                                                                    <span class="kt-nav__link-text">Members</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-settings"></i>
                                                                    <span class="kt-nav__link-text">Settings</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="kt-widget2__item kt-widget2__item--brand">
                                                <div class="kt-widget2__checkbox">
                                                    <label class="kt-checkbox kt-checkbox--solid kt-checkbox--single">
                                                        <input type="checkbox">
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="kt-widget2__info">
                                                    <a href="#" class="kt-widget2__title">
                                                        Make Widgets Development.Estudiat Communy Elit
                                                    </a>
                                                    <a href="#" class="kt-widget2__username">
                                                        By Aziko
                                                    </a>
                                                </div>
                                                <div class="kt-widget2__actions">
                                                    <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown">
                                                        <i class="flaticon-more-1"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                                                        <ul class="kt-nav">
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-line-chart"></i>
                                                                    <span class="kt-nav__link-text">Reports</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-send"></i>
                                                                    <span class="kt-nav__link-text">Messages</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-pie-chart-1"></i>
                                                                    <span class="kt-nav__link-text">Charts</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-avatar"></i>
                                                                    <span class="kt-nav__link-text">Members</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-settings"></i>
                                                                    <span class="kt-nav__link-text">Settings</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="kt_widget2_tab3_content">
                                        <div class="kt-widget2">
                                            <div class="kt-widget2__item kt-widget2__item--warning">
                                                <div class="kt-widget2__checkbox">
                                                    <label class="kt-checkbox kt-checkbox--solid kt-checkbox--single">
                                                        <input type="checkbox">
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="kt-widget2__info">
                                                    <a href="#" class="kt-widget2__title">
                                                        Make Metronic Development. Lorem Ipsum
                                                    </a>
                                                    <a class="kt-widget2__username">
                                                        By James
                                                    </a>
                                                </div>
                                                <div class="kt-widget2__actions">
                                                    <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown">
                                                        <i class="flaticon-more-1"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                                                        <ul class="kt-nav">
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-line-chart"></i>
                                                                    <span class="kt-nav__link-text">Reports</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-send"></i>
                                                                    <span class="kt-nav__link-text">Messages</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-pie-chart-1"></i>
                                                                    <span class="kt-nav__link-text">Charts</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-avatar"></i>
                                                                    <span class="kt-nav__link-text">Members</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-settings"></i>
                                                                    <span class="kt-nav__link-text">Settings</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="kt-widget2__item kt-widget2__item--danger">
                                                <div class="kt-widget2__checkbox">
                                                    <label class="kt-checkbox kt-checkbox--solid kt-checkbox--single">
                                                        <input type="checkbox">
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="kt-widget2__info">
                                                    <a href="#" class="kt-widget2__title">
                                                        Completa Financial Report For Emirates Airlines
                                                    </a>
                                                    <a href="#" class="kt-widget2__username">
                                                        By Bob
                                                    </a>
                                                </div>
                                                <div class="kt-widget2__actions">
                                                    <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown">
                                                        <i class="flaticon-more-1"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                                                        <ul class="kt-nav">
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-line-chart"></i>
                                                                    <span class="kt-nav__link-text">Reports</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-send"></i>
                                                                    <span class="kt-nav__link-text">Messages</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-pie-chart-1"></i>
                                                                    <span class="kt-nav__link-text">Charts</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-avatar"></i>
                                                                    <span class="kt-nav__link-text">Members</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-settings"></i>
                                                                    <span class="kt-nav__link-text">Settings</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="kt-widget2__item kt-widget2__item--brand">
                                                <div class="kt-widget2__checkbox">
                                                    <label class="kt-checkbox kt-checkbox--solid kt-checkbox--single">
                                                        <input type="checkbox">
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="kt-widget2__info">
                                                    <a href="#" class="kt-widget2__title">
                                                        Make Widgets Development.Estudiat Communy Elit
                                                    </a>
                                                    <a href="#" class="kt-widget2__username">
                                                        By Aziko
                                                    </a>
                                                </div>
                                                <div class="kt-widget2__actions">
                                                    <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown">
                                                        <i class="flaticon-more-1"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                                                        <ul class="kt-nav">
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-line-chart"></i>
                                                                    <span class="kt-nav__link-text">Reports</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-send"></i>
                                                                    <span class="kt-nav__link-text">Messages</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-pie-chart-1"></i>
                                                                    <span class="kt-nav__link-text">Charts</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-avatar"></i>
                                                                    <span class="kt-nav__link-text">Members</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-settings"></i>
                                                                    <span class="kt-nav__link-text">Settings</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="kt-widget2__item kt-widget2__item--info">
                                                <div class="kt-widget2__checkbox">
                                                    <label class="kt-checkbox kt-checkbox--solid kt-checkbox--single">
                                                        <input type="checkbox">
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="kt-widget2__info">
                                                    <a href="#" class="kt-widget2__title">
                                                        Completa Financial Report For Emirates Airlines
                                                    </a>
                                                    <a href="#" class="kt-widget2__username">
                                                        By Sean
                                                    </a>
                                                </div>
                                                <div class="kt-widget2__actions">
                                                    <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown">
                                                        <i class="flaticon-more-1"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                                                        <ul class="kt-nav">
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-line-chart"></i>
                                                                    <span class="kt-nav__link-text">Reports</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-send"></i>
                                                                    <span class="kt-nav__link-text">Messages</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-pie-chart-1"></i>
                                                                    <span class="kt-nav__link-text">Charts</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-avatar"></i>
                                                                    <span class="kt-nav__link-text">Members</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-settings"></i>
                                                                    <span class="kt-nav__link-text">Settings</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="kt-widget2__item kt-widget2__item--success">
                                                <div class="kt-widget2__checkbox">
                                                    <label class="kt-checkbox kt-checkbox--solid kt-checkbox--single">
                                                        <input type="checkbox">
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="kt-widget2__info">
                                                    <a href="#" class="kt-widget2__title">
                                                        Completa Financial Report For Emirates Airlines
                                                    </a>
                                                    <a href="#" class="kt-widget2__username">
                                                        By Bob
                                                    </a>
                                                </div>
                                                <div class="kt-widget2__actions">
                                                    <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown">
                                                        <i class="flaticon-more-1"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                                                        <ul class="kt-nav">
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-line-chart"></i>
                                                                    <span class="kt-nav__link-text">Reports</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-send"></i>
                                                                    <span class="kt-nav__link-text">Messages</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-pie-chart-1"></i>
                                                                    <span class="kt-nav__link-text">Charts</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-avatar"></i>
                                                                    <span class="kt-nav__link-text">Members</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-settings"></i>
                                                                    <span class="kt-nav__link-text">Settings</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="kt-widget2__item kt-widget2__item--primary">
                                                <div class="kt-widget2__checkbox">
                                                    <label class="kt-checkbox kt-checkbox--solid kt-checkbox--single">
                                                        <input type="checkbox">
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="kt-widget2__info">
                                                    <a href="#" class="kt-widget2__title">
                                                        Make Metronic Great Again.Lorem Ipsum Amet
                                                    </a>
                                                    <a href="#" class="kt-widget2__username">
                                                        By Bob
                                                    </a>
                                                </div>
                                                <div class="kt-widget2__actions">
                                                    <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown">
                                                        <i class="flaticon-more-1"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                                                        <ul class="kt-nav">
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-line-chart"></i>
                                                                    <span class="kt-nav__link-text">Reports</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-send"></i>
                                                                    <span class="kt-nav__link-text">Messages</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-pie-chart-1"></i>
                                                                    <span class="kt-nav__link-text">Charts</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-avatar"></i>
                                                                    <span class="kt-nav__link-text">Members</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="#" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-settings"></i>
                                                                    <span class="kt-nav__link-text">Settings</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end:: Widgets/Tasks -->
                    </div>
                </div>
            </div>
        <!--End:: App Content-->
        </div>
    </div>
@endsection

@push('customJS')
    <script src="{{ asset('panel/js/pages/crud/file-upload/ktavatar.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/donnors/add-donnor.js') }}" type="text/javascript"></script>
@endpush