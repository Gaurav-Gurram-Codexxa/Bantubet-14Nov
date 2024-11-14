@extends('layout.base')
@section('title', 'Casino')
@section('content')
<script>
    let url = '{{route("casino-list")}}';
</script>

<?php
$css = auth()->user()->is_admin ? '' : '.dt-buttons { display: none; }';
?>

<style>
     <?php echo $css; ?>
</style>


<style>
    .daterangepicker {
        top: 164px !important;
    }

    .filters-grid .ng-scope li:nth-child(2) .label-holder input-wrapper input-holder #dt-picker1,
    .filters-grid .ng-scope li:nth-child(2) .label-holder input-wrapper input-holder {
        width: 287px;
    }

    #example_wrapper {
        overflow: auto;
    }

    #example_filter label {
        display: none;
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
                                <span class="icon-container">
        
                                    <i class="fa fa-list-ul active" aria-hidden="true" title="Sportsbook Overview"></i></span>
                            </div>
                            <div class="widget-body">
                                <div class=" ">
                                    <div class=" ">
                                        <div class=" ">
        
                                        </div>
                                        <div class="accordion-item-body" style="max-height: 164px;">
                                            <div class="accordion-item-body-content">
                                                <form id="form" name="playerFilter.form"
                                                    class="ng-valid ng-valid-phone ng-valid-required ng-dirty ng-valid-bc-custom-error">
                                                    <input type="hidden" name="start_date">
                                                    <input type="hidden" name="end_date">
                                                    <div class="bc-dropdown-container-body clear-padding">
                                                        <div class="filters-grid">
        
                                                            <ul ng-if="filterIsReady" class="ng-scope">
        
                                                                <li>
                                                                    <label class="label-holder">
                                                                        <p data-i18n="_PlayerId_">{{__('related_bet_id')}}</p>
                                                                        <input-wrapper
                                                                            class="ng-pristine ng-untouched ng-valid ng-isolate-scope">
                                                                            <input-holder>
                                                                                <div>
                                                                                    <input name="bet_id"
                                                                                        class="ng-pristine ng-untouched ng-valid ng-scope ng-isolate-scope ng-valid-required ng-valid-bc-custom-error">
                                                                                </div>
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
                                                                                    <input type="text" id="suhas"
                                                                                        name="dateranger">
                                                                                    <small title="Datepicker"
                                                                                        class="fa fa-calendar input-right-label"></small>
                                                                                </div>
                                                                            </input-holder>
                                                                        </input-wrapper>
                                                                    </label>
                                                                </li>
                                                            </ul>
        
                                                            <ul class="filter-action-buttons">
                                                                <li><button id="submit" data-i18n="_Apply_"
                                                                        bc-auto-focus="true">{{__('apply')}}</button>
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
                                                <div class=" col-xs-12 col-md-12 col-lg-12 ng-scope ng-isolate-scope">
                                                    <div class="bc-dashboard-widget ng-isolate-scope bc-separate-loading-element">
                                                        <div class="widget-header">
                                                            <span class="widget-title">
                                                                <span class="ng-binding ng-scope">{{__('report_casino')}}</span>
                                                            </span>
                                                            <span class="icon-container"><i class="fa fa-pie-chart ng-hide" aria-hidden="true" title=""></i>
                                                                <i class="fa fa-map-marker ng-hide" aria-hidden="true" title=""></i> <i
                                                                    class="fa fa-list-ul active" aria-hidden="true" title="Casino Overview"></i></span>
                                                        </div>
                                                        <div class="widget-body">
                                    

                                                            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                                <thead style="background-color: #f0f5f8;">
                                                                    <tr>
                                                                        <th>{{__('date')}}</th>
                                                                        <th>{{__('player_id')}}</th>
                                                                        <th>{{__('game')}}</th>
                                                                        <th>{{__('bet_amount')}}</th>
                                                                        <th>{{__('win_amount')}}</th>
                                                                        <th>{{__('transaction_type')}}</th>
                                                                        <th>{{__('transaction_id')}}</th>
                                                                        <th>{{__('related_bet_id')}}</th>
                                                                        <th>{{__('status')}}</th>
                                                                        <th>{{__('ggr')}}</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                    
                                                                </tbody>
                                                            </table>
													
														
                                    
                                                        </div>
                                                        <div class="bc-separate-loader-container"><img class="bc-separate-loader"
                                                                style="width: 90px; height: 90px" src="{{ asset('assets/img/loader.gif')}}" alt="loader">
                                                        </div>
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

    //menu active inactive script
    $(document).ready(function () {
        $('#menubar1 li:nth-child(2) #parent_menu').removeClass("active-super");
        $('#menubar1 li:nth-child(5) #parent_menu').addClass("active-super");
        $('#menubar1 li:nth-child(5) .content li:nth-child(2)').addClass("active-super");
        $('#menubar1 li:nth-child(5) .content li:nth-child(2) a').css("color", "#fff");
    });
    $(document).ready(function () {
        $('#submit').on('click', e => {
            e.preventDefault();
            table.ajax.url(`${url}?` + $('#form').serialize()).load();
        });


        $('input[name="dateranger"]').daterangepicker({
  
            maxDate: new Date(),
            locale:
            {
                format: 'DD/MM/YYYY'
            },
            ranges:
            {
                '{{__("today")}}': [moment(), moment().add(1, 'days')],
                '{{__("yesterday")}}': [moment().subtract(1, 'days'), moment()],
                '{{__("last_7_days")}}': [moment().subtract(6, 'days'), moment().add(1, 'days')],
                '{{__("last_30_days")}}': [moment().subtract(29, 'days'), moment()],
                '{{__("this_month")}}': [moment().startOf('month'), moment().endOf('month')],
                '{{__("last_month")}}': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, function (start, end, label) {

            $('[name=start_date]').val(start.format('YYYY-MM-DD HH:mm'));
            $('[name=end_date]').val(end.format('YYYY-MM-DD HH:mm'));
        });
    });
</script>
@stop