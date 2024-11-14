<html class="no-js k-webkit k-webkit107 " style="zoom: 1;">

<head>
    <style type="text/css">

    </style>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="description">
    <meta content="" name="author">
    <link rel="stylesheet" href="{{ asset('assets/plugins/icomoon/style.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/index-optimized.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/Custom-Icons/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/kendo/styles/kendo.common.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/kendo/styles/kendo.default.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/kendo/styles/kendo.dataviz.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/kendo/styles/kendo.dataviz.default.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/kendo/styles/kendo.default.mobile.min.css')}}">

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="icon" href="{{asset('favicon.ico')}}">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css">

	<script>
    window.isAdmin = @json(auth()->user()->is_admin);
		console.log("Base Page : "+window.isAdmin)
	</script>


    <style type="text/css">
        .modal-content {
            position: relative;
            background-color: #fff;
            -webkit-background-clip: padding-box;
            background-clip: padding-box;
            border: 1px solid #999;
            border: 1px solid rgb(0 0 0 / 0%);
            border-radius: 6px;
            outline: 0;
            -webkit-box-shadow: 0 3px 9px rgb(0 0 0 / 0%);
            box-shadow: 0 3px 9px rgb(0 0 0 / 0%);
        }

        .left-container .left-nav-panel>ul>li>ul>li.active {
            background: #D2ECFF !important;
            border-radius: 5px !important;
            color: #1B9CFB !important;
        }

        #openModal:hover {
            opacity: 0.9;
        }

        #openModal:focus {
            background-color: #0063cc;
        }

        /* Modal Dialog */
        dialog::backdrop {
            background-color: rgb(0 0 0 /0.5);
        }

        .pdh-header i {
            z-index: 999;
        }

        dialog {
            border: 0;
            border-radius: 0.7rem;
            box-shadow: 0 0 1em rgb(0 0 0 /0.2);
            /* width: 50%; */
            overflow: initial;
        }

        .form-group select {
            display: block;
            float: left;
            width: 100%;
            background: #fff;
            height: 32px;
            border: 1px solid #E4E6E6;
            border-radius: 3px;
            padding: 0 30px 0 12px;
            transition: .3s border, .3s background, .3s padding, .3s color;
            font: 13px Roboto, sans-serif;
            color: #999;
            position: relative;
            cursor: pointer;
        }

        .form-group label {
            font: 14px/20px Roboto, sans-serif;
            min-height: 20px;
            float: left;
            margin: 0 0 4px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            transition: .3s color, .3s margin;
        }

        .left-container .left-nav-panel>ul>li .active-super {
            border-radius: 5px;
            background: linear-gradient(to right, #1478fa, #22c5fc);
            color: #fff;
        }

        .left-container .left-nav-panel>ul>li>ul>li .active-child {
            color: #1B9CFB;
            font-weight: 700;

        }

        .left-container .left-nav-panel>ul>li>ul>li>ul .active-sub-child {
            background: #D2ECFF;
            border-radius: 5px;
            font-weight: 700;
        }

        .left-container .left-nav-panel>ul>li>ul>li>ul .active-sub-child a {
            color: #1B9CFB !important;

        }

        .show-calendar {
            top: 137px !important;
            right: 630.025px !important;
            left: auto !important;
        }

        .logout {
            min-width: 130px;
            padding: 0 16px;
            display: block;
            float: left;
            margin: 0 6px;
            transition: .3s background, .3s color, .3s border;
            border: 1px solid #c9302c;
            border-radius: 3px;
            background: #c9302c;
            height: 34px;
            text-transform: capitalize;
            color: #fff;
            font: 500 14px/34px Roboto, sans-serif;
            cursor: pointer;
        }


        .action-toolbar-row .left-actions,
        .bc-dashboard-widget .widget-header .icon-container {
            display: none;
        }
    </style>

</head>

<body class="agp">
    <button class="scrollToTop"><i class="fa fa-angle-up"></i></button>
    <div class="wrapper close-left-container wrapper-show">
        <div class="left-container">
            <div class="left-nav-panel">
                <div class="logo-block">
                    <div class="nav-toggle-btn">
                        <span></span>
                    </div>
                </div>
                <ul id="menubar1">


                    <a class="  active-super" id="parent_menu" href="{{route('home')}}">
                    </a>
                    <li class=" parent has-not-sub-menu"><a class=" one active-super" id="parent_menu" href="{{route('home')}}">

                            <i class="ico-dashboard"></i>
                            <span title="{{__('dashboard')}}">{{__('dashboard')}}</span>
                        </a>
                        <div>
                            <ul class="title">
                                <a href="{{route('home')}}"></a>
                                <li><a href="{{route('home')}}">

                                        <span title="{{__('dashboard')}}">{{__('dashboard')}}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @if(auth()->user()->is_admin)
                    <li class=" parent has-not-sub-menu">
                        <a class="one" id="parent_menu" href="{{route('users.index')}}">

                            <i class="fa fa-user"></i>
                            <span title="{{__('user_management')}}">{{__('user_management')}}</span>
                        </a>
                        <div>
                            <ul class="title">

                                <li><a href="{{route('users.index')}}">

                                        <span title="{{__('user_management')}}">{{__('user_management')}}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class=" parent has-not-sub-menu">
                        <a class="one" id="parent_menu" href="{{ route('limit.index') }}">

                            <i class="fa fa-percent"></i>
                            <span title="Percentage">{{__('percentage')}}</span>
                        </a>
                        <div>
                            <ul class="title">

                                <li><a href="{{ route('limit.index') }}">

                                        <span title="Percentage">{{__('percentage')}}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endif
                    <li class="parent">
                        <a class="one menu-top-items " id="parent_menu">
                            <i class="ico-reports"></i>
                            <span title="{{__('report')}}">{{__('report')}}</span>
                        </a>
                        <ul class="content">
                            <li class="">
                                <a href="{{route('sport-book')}}">
                                    <i></i>
                                    <span>SportsBook Bet Report</span>
                                </a>
                            </li>
							@if(auth()->user()->is_admin)

                            <li class=" has-not-sub-menu">
                                <a href="{{route('casino')}}">
                                    <i></i>
                                    <span data-i18n="_PlayersReport_">Casino Bet Report</span>
                                </a>
                            </li>
							@endif
                            <li class=" has-not-sub-menu">
                                <a href="{{route('taxable-bet')}}">
                                    <i></i>
                                    <span data-i18n="_PlayersReport_">SportsBook Taxable Bet Report</span>
                                </a>
                            </li>
							
							@if(auth()->user()->is_admin)
							
						
							
                            <li class=" has-not-sub-menu">
                                <a href="#">
                                    <i></i>
                                    <span data-i18n="_PlayersReport_">{{__('gross_revenue')}}</span>
                                </a>
                            </li>
                            <li class=" has-not-sub-menu">
                                <a href="{{route('tax-report')}}">
                                    <i></i>
                                    <span data-i18n="_PlayersReport_">{{__('tax_report')}}</span>
                                </a>
                            </li>
                            <li class=" has-not-sub-menu">
                                <a href="{{route('statistics-report')}}">
                                    <i></i>
                                    <span data-i18n="_PlayersReport_">{{__('statistics_report')}}</span>
                                </a>
                            </li>
                            @endif
                        </ul>
                        <div>
                            <ul class="title">
                                <li>
                                    <a>
                                        <span title="{{__('report')}}">{{__('report')}}</span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="content">
                                <li class="">
                                    <a href="{{route('sport-book')}}">
                                        <i></i>
                                        <span>SportsBook Bet Report</span>
                                    </a>
                                </li>
								@if(auth()->user()->is_admin)
                                <li class=" has-not-sub-menu">
                                    <a href="{{route('casino')}}">
                                        <i></i>
                                        <span data-i18n="_PlayersReport_">Casino Bet Report</span>
                                    </a>
                                </li>
								@endif
                                <li class=" has-not-sub-menu">
                                    <a href="{{route('taxable-bet')}}">
                                        <i></i>
                                        <span data-i18n="_PlayersReport_">SportsBook Taxable Bet Report</span>
                                    </a>
                                </li>
								
								
								<li class=" has-not-sub-menu">
									<a href="{{route('casino-taxable-bet')}}">
										<i></i>
										<span data-i18n="_PlayersReport_">Casino Taxable Bet Report</span>
									</a>
								</li>
								
								 @if(auth()->user()->is_admin)
								
                                <li class=" has-not-sub-menu">
                                    <a href="#">
                                        <i></i>
                                        <span data-i18n="_PlayersReport_">{{__('gross_revenue')}}</span>
                                    </a>
                                </li>
                                <li class=" has-not-sub-menu">
                                    <a href="{{route('tax-report')}}">
                                        <i></i>
                                        <span data-i18n="_PlayersReport_">{{__('tax_report')}}</span>
                                    </a>
                                </li>
                                <li class=" has-not-sub-menu">
                                    <a href="{{route('statistics-report')}}">
                                        <i></i>
                                        <span data-i18n="_PlayersReport_">{{__('statistics_report')}}</span>
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </li>
                    @if(auth()->user()->is_admin)
                    <li class=" parent">
                        <a class="one menu-top-items" id="parent_menu">
                            <i class="ico-dashboard"></i>
                            <span title="alert">{{__('alert')}}</span>
                        </a>
                        <div>
                            <ul class="title">
                                <li>
                                    <a>
                                        <span title="alert">{{__('alert')}}</span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="content">
                            </ul>
                        </div>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
        @php
        $selected = 'en';
        $unselected = 'pt';
        $lbl = 'Br';
        $locale = 'es';
        if(auth()->user()->language == 'es'){
        $selected = 'pt';
        $locale = $unselected = 'en';
        $lbl = 'En';
        }
        $timezones = [

        'Central Europe Standard Time' => '+01:00',

        ];
        @endphp
        <div class="right-container normal-view-mode">
            <div>
                <div class="top-nav-panel">
                    <div class="left-nav-panel-fake-btn nav-toggle-btn"></div>

                    <div class="leng-field ">
                        <p class="bc-clearfix selected-{{$selected}}">
                            <i></i>
                            <i class="fa fa-angle-down"></i>
                        </p>
                        <ul>
                            <li class=" selected-{{$unselected}}">
                                <a href="#" onclick="changeLocale('{{ $locale }}')">
                                    <i></i>
                                    <span data-i18n="{{$lbl}}">{{$lbl}}</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="username-field">
                        <p class="ng-binding">
                            <i></i>
                            {{auth()->user()->name}}
                            <i class="fa fa-angle-down"></i>
                        </p>
                        <ul>
                            @if(auth()->user()->is_admin)
                            <li class=""><a id="openModal"> <i class="fa fa-cog"></i>
                                    <span data-i18n="_Settings_">{{__('setting')}}</span></a>
                            </li>
                            @endif
                            <li class=""><a id="changePassword"> <i class="fa fa-lock"></i>
                                    <span data-i18n="_ChangePasswordBtn_">{{__('Change Password')}}</span></a>
                            </li>
                            <li class="">
                                <form method="post" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="logout"> <i class="fa fa-sign-out"></i> <i class="bx bx-power-off me-2"></i>
                                        <span data-i18n="_Logoff_">{{__('logout')}}</span></button>

                                </form>
                            </li>


                        </ul>
                    </div>
                    <div class="sub-nav-panel-fake-btn"></div>
                    <div class="time-field ">
                        <i class="fa fa-clock-o"></i>
                        <p id="clockContainer"></p>
                    </div>
                    <div class="time-field " style="float:left;margin:0px;">
                        <img src="{{url('assets/images/Logotipo.png')}}" width="100px">
                    </div>

                    <style>
                        #ng-pristine .dropdown {
                            position: relative;
                            display: inline-block;
                        }

                        #ng-pristine .dropdown .dropdown-content {
                            display: none;
                            position: absolute;
                            z-index: 99;
                        }

                        #ng-pristine .dropdown:hover .dropdown-content {
                            display: block;
                        }
                    </style>


                </div>
                <div class="top-nav-sub-panel">
                    <div class="help-desk-field ">
                        <a target="_blank" href="#"></a>
                    </div>
                    <div class="leng-field ">
                        <p class="bc-clearfix selected-en">
                            <i></i>
                            <i class="fa fa-angle-down"></i>
                        </p>
                        <ul>
                            <li class=" selected-pt">
                                <a>
                                    <i></i>
                                    <span data-i18n="Br">Br</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="username-field">
                        <p class="ng-binding">
                            <i></i>
                            Sam
                            <i class="fa fa-angle-down"></i>
                        </p>
                        <ul>
                            <li class=""><a id="openModal"> <i class="fa fa-cog"></i>
                                    <span data-i18n="_Settings_">Settings</span></a>
                            </li>
                            <li class=""><a> <i class="fa fa-lock"></i>
                                    <span data-i18n="_ResetPassword_">Reset Password</span></a>
                            </li>
                            <li class=""><a> <i class="fa fa-sign-out"></i>
                                    <span data-i18n="_Logoff_">Log off</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            @yield('content')
            <div class=" notifications-container hide-notification-container">
            </div>
        </div>
    </div>


    @if(auth()->user()->is_admin)
    @php
    $setting = \App\Models\Setting::find(1);
    @endphp
    <dialog id="setting_dailog">
        <div class="modal-content" ng-transclude="">
            <div class="pdh-header ">
                <i class="fa fa-close cross"></i>
                <span data-i18n="_Settings_">{{__('setting')}}</span>
            </div>
            <form id="settingForm">
                <div class="pdh-content">
                    <div class="filters-grid settings-grid">
                        <ul>

                            <li>
                                <div class="form-group">
                                    <label for="timezone">{{__('timezone')}}</label>
                                    <select class="form-control" id="timezone" name="timezone">
                                        @foreach($timezones as $time => $offset)
                                        <option value="{{$time}}" {{auth()->user()->timezone == $time ? 'selected' :
                                            ''}}>UTC{{$offset}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </li>

                            <li>
                                <div class="form-group">
                                    <label for="currency_for_report">{{__('currency')}}</label>
                                    <select class="form-control" id="currency_for_report" name="currency">
                                        <option value="aoa" {{auth()->user()->currency == 'aoa' ? 'selected' :
                                            ''}}>Angolan Kwanza(AOA)</option>
                                        <option value="usd" {{auth()->user()->currency == 'usd' ? 'selected' :
                                            ''}}>United State Dollar(USD)</option>
                                    </select>
                                </div>
                            </li>

                            <li>
                                <div class="form-group">
                                    <label>{{__('notification_subscription')}}</label>
                                    <select class="selectpicker" id="selectpicker" multiple aria-label="Default select example" data-live-search="true">
                                        <option>New Client</option>
                                        <option>Client Deposit Request</option>
                                        <option>Client Withdrawal Request</option>
                                        <option>Super Bets</option>
                                        <option>Document Upload</option>
                                        <option>New Message</option>
                                    </select>

                                </div>
                            </li>


                        </ul>

                    </div>
                </div>
                <div class="pdh-buttons-holder">
                    <div>
                        <button data-i18n="_Save_">{{__('save')}}</button>
                        <button type="button" class="cross">{{__('cancel')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </dialog>
    @endif
    <dialog id="changePasswordModal">
        <div class="modal-content" ng-transclude="">
            <div class="pdh-header ">
                <i class="fa fa-close cross"></i>
                <span data-i18n="_Settings_">{{__('Change Password')}}</span>
            </div>
            <form id="passwordForm">
                <div class="pdh-content">
                    <div class="filters-list settings-list">
                        <ul>

                            <li>
                                <div class="form-group">
                                    <label for="timezone">{{__('Old Password')}}</label>
                                    <input type="text" class="form-control" name="old_password">
                                </div>
                            </li>

                            <li>
                                <div class="form-group">
                                    <label for="currency_for_report">{{__('New Password')}}</label>
                                    <input type="text" class="form-control" name="new_password">
                                </div>
                            </li>

                            <li>
                                <div class="form-group">
                                    <label>{{__('Confirm Password')}}</label>
                                    <input type="text" class="form-control" name="confirm_password">
                                </div>
                            </li>
                        </ul>

                    </div>
                </div>
                <div class="pdh-buttons-holder">
                    <div>
                        <button data-i18n="_Save_">{{__('save')}}</button>
                        <button type="button" class="cross">{{__('cancel')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </dialog>

    <div class="bc-alert-container">
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/scripts.min.js')}}"></script>
    <script type=" text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.js"></script>

    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.js"></script>
    <script>
        const csrf_token = '{{csrf_token()}}';
    </script>
    <script type="text/javascript" src="{{ asset('assets/app.js?1')}}"></script>


    @yield('extra')


</body>

</html>