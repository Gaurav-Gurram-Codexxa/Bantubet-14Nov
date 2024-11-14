@extends('layout.base')
@section('title', 'Statistics Report')
@section('content')
<script>
    let url = '{{route("statistic-list")}}';
</script>
<style>
	.daterangepicker{
	top: 127px!important;
	}
	.filters-grid .ng-scope li:nth-child(3) .label-holder input-wrapper input-holder #dt-picker1, .filters-grid .ng-scope li:nth-child(3) .label-holder input-wrapper input-holder{
	width:287px;
	}
	.pagination, #example_filter label{
	display:none;
	}
</style>
<div class="main-view-panel">

    <div class="view-block bc-gs-container ng-scope">
        
        <bc-bet-report class="ng-scope ng-isolate-scope">
            <div class="bc-gs-row">
                <div class="bc-col-12"> 
                    <!-- filter -->
                    <div class="col-xs-12 col-md-12 col-lg-12 ng-scope ng-isolate-scope suhas">
                        <div class="bc-dashboard-widget ng-isolate-scope bc-separate-loading-element">
                            <div class="widget-header">
                                <span class="widget-title">
                                    <span class="ng-binding ng-scope">{{__('filters')}}</span>
                                </span>
                                <span class="icon-container"><i class="fa fa-list-ul active" aria-hidden="true"
                                    title="Sportsbook Overview"></i></span>
                            </div>
                            <div class="widget-body">
                                <div class=" ">
                                    <div class=" ">
                                        <div class=" ">
                                             
                                        </div><!-- /.accordion-item-header -->
                                        <div class="accordion-item-body">
                                            <div class="accordion-item-body-content">
                                                <form id="form" name="playerFilter.form" class="ng-valid ng-valid-phone ng-valid-required ng-dirty ng-valid-bc-custom-error">
                                                        <input type="hidden" name="start_date">
                                                        <input type="hidden" name="end_date">
                                                    <div class="bc-dropdown-container-body clear-padding">
                                                        <div class="filters-grid">
                                                            <!-- ngIf: filterIsReady -->
                                                            <ul ng-if="filterIsReady" class="ng-scope">
                                                                <style>
            
                                                                </style>
                                                                <li>
                                                                    <label class="label-holder">
                                                                        <p data-i18n="_PlayerId_">{{__('report_as_per_game_type')}}</p>
                                                                        <input-wrapper
                                                                            class="ng-pristine ng-untouched ng-valid ng-isolate-scope">
                                                                            <input-holder>
                                                                                <select class="custom-select" name="type"
                                                                                    style="font-weight:500;width: 100%;">
                                                                                    <option value="stake">{{__('stakes')}}</option>
                                                                                    <option value="winning">{{__('winning')}}</option>
                                                                                </select>
                                                                            </input-holder>
                                                                        </input-wrapper>
                                                                    </label>
                                                                </li>
                                                               
            
                                                                <li>
                                                                    <label class="label-holder">
                                                                        <p data-i18n="_PlayerId_">{{__('date_picker')}}</p>
                                                                        <input-wrapper
                                                                            class="ng-pristine ng-untouched ng-valid ng-isolate-scope">
                                                                            <input-holder>
                                                                                <div>
                                                                                    <input type="text" name="dateranger"
                                                                                        >
                                                                                    <small title="Datepicker"
                                                                                        class="fa fa-calendar input-right-label"></small>
                                                                                </div>
                                                                            </input-holder>
                                                                        </input-wrapper>
                                                                    </label>
                                                                </li>
                                                            </ul>
            
                                                            <ul class="filter-action-buttons">
                                                                <li><button id="submit" bc-auto-focus="true">{{__('apply')}}</button>
                                                                    <button data-i18n="_Reset_" ng-click="resetFilter()"
                                                                        type="button">{{__('reset')}}</button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <!-- filter -->
                    <div class="bc-dropdown-container">
                        <div class="bc-dropdown-container-body">
                            <div class="bc-data-table-module-j">
                                <div class="bc-data-table-scroll-j">
                                    <div class="adv-table-translate">
                                        <div class="adv-table-scroll" id="betTableCnt">
                                            <div class="adv-table-scroll-overflow">
                                                <!-- table -->
                                                <div class="col-xs-12 col-md-12 col-lg-12 ng-scope ng-isolate-scope">
                                                    <div class="bc-dashboard-widget ng-isolate-scope bc-separate-loading-element">
                                                        <div class="widget-header">
                                                            <span class="widget-title">
                                                                <span class="ng-binding ng-scope">{{__('report_statistic')}}</span>
                                                            </span>
                                                            <span class="icon-container"><i class="fa fa-pie-chart ng-hide" aria-hidden="true" title=""></i>
                                                                <i class="fa fa-map-marker ng-hide" aria-hidden="true" title=""></i> <i
                                                                    class="fa fa-list-ul active" aria-hidden="true" title="Casino Overview"></i></span>
                                                        </div>
                                                        <div class="widget-body">
                                                            <table id="example" class="table table-striped table-bordered display nowrap" cellspacing="0"
                                                                width="100%">
                                                                <thead>
                                                                    <tr>
                                                                        <td rowspan="3" colspan="1">Dias</td>
                                                                        <td colspan="6" rowspan="1" class="report-header">{{__('different_game_type')}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2" rowspan="1">{{__('CASINO')}} ({{__('casino')}} + {{__('live_casino')}})</td>
                                                                        <td colspan="2" rowspan="1">{{__('SPORTSBOOK')}} {{__('on_line')}}</td>
                                                                        <td colspan="2" rowspan="1">{{__('SPORTSBOOK')}} {{__('retail')}}</td>
                                                                    </tr>
                                                                    <tr r>
                                                                        <th rowspan="1" colspan="1" class="cell-title">{{__('bet_count')}}</th>
                                                                        <th rowspan="1" colspan="1">{{__('amount_of_akz')}}</th>
                                                                        <th rowspan="1" colspan="1" class="cell-title">{{__('bet_count')}}</th>
                                                                        <th rowspan="1" colspan="1">{{__('amount_of_akz')}}</th>
                                                                        <th rowspan="1" colspan="1" class="cell-title">{{__('winning_count')}}</th>
                                                                        <th rowspan="1" colspan="1">{{__('amount_of_akz')}}</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="bc-separate-loader-container"><img class="bc-separate-loader"
                                                                style="width: 90px; height: 90px" src="assets/img/loader.gif" alt="loader"></div>
                                                    </div>
                                                </div>
                                                <!-- table -->
                                            </div>
                                            <!--<div class="bc-separate-loader-container">
                                             <img class="bc-separate-loader" style="width: 90px; height: 90px" src="{{ asset('assets/img/loader.gif')}}" alt="loader">
                                          </div>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </bc-bet-report>
    </div>
</div>
@stop
@section('extra')
<script>
    $(document).ready(function() {
		
        $('#submit').on('click', e => {
            e.preventDefault();
            table.ajax.url(`${url}?` + $('#form').serialize()).load();
			$('.report-header').html(($('option:selected').html()));
			
			
        });
		$('input[name="dateranger"]').daterangepicker({
			    maxDate: new Date(),
			locale:
			{
				format: 'DD/MM/YYYY'
			},
			ranges:
			{
				'Today': [moment(), moment().add(1, 'days')],
				'Yesterday': [moment().subtract(1, 'days'), moment()],
				'Last 7 Days': [moment().subtract(6, 'days'), moment().add(1, 'days')],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
			}
		}, function (start, end, label) {

			$('[name=start_date]').val(start.format('YYYY-MM-DD'));
			$('[name=end_date]').val(end.format('YYYY-MM-DD'));
		});
    });
	//menu active inactive script
	$(document).ready(function(){ 
		$('#menubar1 li:nth-child(2) #parent_menu').removeClass("active-super");
		$('#menubar1 li:nth-child(5) #parent_menu').addClass("active-super");
		$('#menubar1 li:nth-child(5) .content li:nth-child(5)').addClass("active-super");
		$('#menubar1 li:nth-child(5) .content li:nth-child(5) a').css("color", "#fff");
	});
</script>
 

@stop