<?php $__env->startSection('title', 'Sport Book'); ?>
<?php $__env->startSection('content'); ?>
<script>
    let url = '<?php echo e(route("bet-list")); ?>';
	let timePicker = 'defined';
</script>

<?php
$css = auth()->user()->is_admin ? '' : '.dt-buttons { display: none; }';
?>

<style>
     <?php echo $css; ?>
</style>

<style>
	#example_wrapper{
	overflow:auto;
	
	}
	.bc-dropdown-container {
    background-color: #fff0;
    margin: 6px 6px 12px;
    border-radius: 10px;
    box-shadow: 0 0 10px 3px rgb(119 119 119 / 0%);
}
	.adv-table-translate:before{
		box-shadow: 0 0 0 2px #fff0;
	}
	.suhas{
	padding:0 32px;
	}
	.accordion-item {
    margin-top: 0;
    border-radius: 5px;
    background-color: #fff;
    box-shadow: 0 0 10px 3px rgb(119 119 119 / 0%);
}
	.accordion-item-body-content {
    padding: 0;
    line-height: 0;
    border-top: 0px solid;
    border-image: linear-gradient(to right, transparent, #34495e00, transparent) 1;
}
	.accordion-item-header {
    padding: 1rem 3rem 1rem 1rem;
    min-height: 0;
    line-height: 1.25rem;
    font-weight: 700;
    font-size: 14px;
    display: flex;
    align-items: center;
    position: relative;
    cursor: pointer;
    color: #76889900;
}
	.daterangepicker{
	top: 164px!important;
	}
	.filters-grid .ng-scope li:nth-child(2) .label-holder input-wrapper input-holder #dt-picker1, .filters-grid .ng-scope li:nth-child(2) .label-holder input-wrapper input-holder{
	width:287px;
	}
	.pagination, #example_filter label{
	
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
                                       <span class="ng-binding ng-scope"><?php echo e(__('filters')); ?></span>
                                   </span>
                                   <span class="icon-container"><i class="fa fa-list-ul active" aria-hidden="true" title="Sportsbook Overview"></i></span>
                               </div>
                               <div class="widget-body">
                                   <div class="accordion">
                                       <div class="accordion-item">
                                           <div class="accordion-item-header">
                                           </div>
                                           <div class="accordion-item-body" style="max-height: 164px;">
                                               <div class="accordion-item-body-content">
                                                   <form id="form" name="playerFilter.form" class="ng-valid ng-valid-phone ng-valid-required ng-dirty ng-valid-bc-custom-error">
                                                       <input type="hidden" name="start_date">
                                                       <input type="hidden" name="end_date">
                                                       <div class="bc-dropdown-container-body clear-padding">
                                                           <div class="filters-grid">
                                                               <ul ng-if="filterIsReady" class="ng-scope">
                                                                   <li>
                                                                       <label class="label-holder">
                                                                           <p data-i18n="_PlayerId_"><?php echo e(__('bet_id')); ?></p>
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
                                                                           <p data-i18n="_PlayerId_"><?php echo e(__('date_picker')); ?></p>
                                                                            <input-wrapper
                                                                               class="ng-pristine ng-untouched ng-valid ng-isolate-scope">
                                                                                
																				 <input-holder>
                     <input type="text" id="dt-picker1" name="daterangepicker">
                     <small title="Datepicker" class="fa fa-calendar input-right-label"></small>
                     <div class="daterangepicker ltr opensright">
                        <div class="ranges" style="display: none;">
                        </div>
                     </div>
                  </input-holder>
                                                                           </input-wrapper> 
																		    
                                                                       </label>
                                                                   </li>
                                                               </ul>
                                                               <ul class="filter-action-buttons">
                                                                   <li><button id="submit" data-i18n="_Apply_"
                                                                           bc-auto-focus="true"><?php echo e(__('apply')); ?></button>
                                                                       <button data-i18n="_Reset_" ng-click="resetFilter()"
                                                                           type="button"><?php echo e(__('reset')); ?></button>
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
                                                            <span class="ng-binding ng-scope"><?php echo e(__('report_sport_book')); ?></span>
                                                        </span>
                                                        <span class="icon-container"><i class="fa fa-pie-chart ng-hide" aria-hidden="true" title=""></i>
                                                            <i class="fa fa-map-marker ng-hide" aria-hidden="true" title=""></i> 
                                                            <i class="fa fa-list-ul active" aria-hidden="true" title="Casino Overview"></i>
                                                        </span>
                                                    </div>
													<?php
													$currency = strtoupper(auth()->user()->currency);
													?>
                                                    <div class="widget-body">
														
                                                        <table id="example" class="table table-striped table-bordered display nowrap" cellspacing="0" width="100%">
                                                            <thead style="background-color: #f0f5f8;">
                                                                <tr>
                                                                    <th><?php echo e(__('bet_id')); ?></th>
                                                                    <th><?php echo e(__('player_id')); ?></th>
                                                                    <th><?php echo e(__('stake')); ?> (<?php echo e($currency); ?>)</th>
                                                                    <th><?php echo e(__('possible_winning')); ?></th>
                                                                    <th><?php echo e(__('selection_count')); ?></th>
                                                                    <th><?php echo e(__('odds')); ?></th>
                                                                    <th><?php echo e(__('winning')); ?> (<?php echo e($currency); ?>)</th>
                                                                    <th><?php echo e(__('type')); ?></th>
                                                                    <th><?php echo e(__('ggr')); ?> (<?php echo e($currency); ?>)</th>
                                                                    <th><?php echo e(__('state')); ?></th>
                                                                    <th><?php echo e(__('created')); ?></th>
                                                                    <th><?php echo e(__('calculation_date')); ?></th>
                                                                    <th><?php echo e(__('bonus')); ?></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                        </table>
										
                                                    </div>
                                                    <div class="bc-separate-loader-container">
                                                        <img class="bc-separate-loader" style="width: 90px; height: 90px" src="<?php echo e(asset('assets/img/loader.gif')); ?>" alt="loader">
                                                    </div>
                                                </div>
                                            </div>
                                              <!-- table -->
                                          </div>
                                          <!--<div class="bc-separate-loader-container">
                                             <img class="bc-separate-loader" style="width: 90px; height: 90px" src="<?php echo e(asset('assets/img/loader.gif')); ?>" alt="loader">
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

<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra'); ?>
<script>
	 

 
	$(document).ready(function () {
	 
		$('#submit').on('click', e => {
			e.preventDefault();
			table.ajax.url(`${url}?` + $('#form').serialize()).load();
		});
		
		table.on('preDraw.dt', () => {
		$('.bc-separate-loader-container').show();
		})
		
		table.on('draw.dt', () => {
		$('.bc-separate-loader-container').hide();
		})
	});
	//menu active inactive script
	$(document).ready(function () {
		$('#menubar1 li:nth-child(2) #parent_menu').removeClass("active-super");
		$('#menubar1 li:nth-child(5) #parent_menu').addClass("active-super");
		$('#menubar1 li:nth-child(5) .content li:nth-child(1)').addClass("active-super");
		$('#menubar1 li:nth-child(5) .content li:nth-child(1) a').css("color", "#fff");


		$('input[name="daterangepicker"]').daterangepicker({
			timePicker24Hour: true,
			timePicker: true,
			    maxDate: new Date(),
			locale:
			{
				format: 'DD/MM/YYYY HH:mm'
			},
			ranges:
			{
				"<?php echo e(__('today')); ?>": [moment().hour(0).minute(0), moment().add(1, 'days').hour(0).minute(0)],
				"<?php echo e(__('yesterday')); ?>": [moment().subtract(1, 'days').hour(0).minute(0), moment().hour(0).minute(0)],
				"<?php echo e(__('last_7_days')); ?>": [moment().subtract(6, 'days').hour(0).minute(0), moment().add(1, 'days').hour(0).minute(0)],
				"<?php echo e(__('last_30_days')); ?>": [moment().subtract(29, 'days').hour(0).minute(0), moment().hour(0).minute(0)],
				"<?php echo e(__('this_month')); ?>": [moment().startOf('month').hour(0).minute(0), moment().endOf('month').hour(0).minute(0)],
				"<?php echo e(__('last_month')); ?>": [moment().subtract(1, 'month').startOf('month').hour(0).minute(0), moment().subtract(1, 'month').endOf('month').hour(0).minute(0)]
			}
		}, function (start, end, label) {

			$('[name=start_date]').val(start.format('YYYY-MM-DD HH:mm'));
			$('[name=end_date]').val(end.format('YYYY-MM-DD HH:mm'));
		});
		
		 $('input:nth-child(2)').daterangepicker({

})
	});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\inetpub\vhosts\backoffice.bantubet.com\backoffice-ao.bantubet.com\resources\views/sport-book.blade.php ENDPATH**/ ?>