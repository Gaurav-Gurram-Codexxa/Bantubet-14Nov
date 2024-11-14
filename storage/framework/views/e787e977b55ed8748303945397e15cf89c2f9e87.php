<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('content'); ?>
<style>
   .daterangepicker {
      top: 47px !important;
      right: 90.6px !important;
      left: 0px;
   }

   .widget-table .widget-table-row .widget-table-cell+.widget-table-cell {
      text-align: center;
   }
</style>
<div class="main-view-panel">
	
   <div class="view-block bc-gs-container ">
      <div class="bo-dashboard-page col-xs-12 ">
         <div class="action-toolbar-row col-xs-12">
            <div class="row">
               <div class="date-periods-container">

                  <button class="button-type-outline day" data-id="today" onclick="onDateSelect(this)">
                     <span><?php echo e(__('today')); ?></span>
                  </button>
                  <button class="button-type-outline day   active" data-id="yesterday" onclick="onDateSelect(this)">
                     <span><?php echo e(__('yesterday')); ?></span>
                  </button>

                  <button class="button-type-outline day" onclick="onDateSelect(this)" data-id="month">
                     <span><?php echo e(__('this_month')); ?></span>
                  </button>
                  <input-holder>
                     <input type="text" id="dt-picker">
                     <small title="Datepicker" class="fa fa-calendar input-right-label"></small>
                     <div class="daterangepicker ltr opensright">
                        <div class="ranges" style="display: none;">
                        </div>
                     </div>
                  </input-holder>
               </div>
            </div>

            <div class="col-xs-12 col-md-12 col-lg-12  ng-isolate-scope">
               <div class="bc-dashboard-widget ng-isolate-scope bc-separate-loading-element">
                  <div class="widget-header">
                     <span class="widget-title">
                        <span class=""><?php echo e(__('sportbook_overview')); ?></span>
                     </span>
                     <span class="icon-container">

                        <i class="fa fa-list-ul active" aria-hidden="true" title="Sportsbook Overview"></i></span>
                  </div>
                  <div class="widget-body">

                     <div class="">
                        <div class="ng-isolate-scope">
                           <div class="widget-table">

                              <div class="widget-table-row widget-header-row clearfix">
                                 <div class="widget-table-cell widget-title-col" style="font-size: 1em;">&nbsp;
                                 </div>

                                 <div class="widget-table-cell widget-header-cell " style="font-size: 1em;">
                                    <span class=""><?php echo e(__('online')); ?></span>
                                 </div>

                                 <div class="widget-table-cell widget-header-cell " style="font-size: 1em;"><span class=""><?php echo e(__('retail')); ?></span></div>

                                 <div class="widget-table-cell widget-header-cell " style="font-size: 1em;"><span class=""><?php echo e(__('total')); ?></span></div>

                              </div>
                              <div class="widget-table-row widget-body-row clearfix ">
                                 <div class="widget-table-cell widget-title-col" style="font-size: 1em;"><span class=""><?php echo e(__('revenue')); ?></span></div>

                                 <div class="widget-table-cell widget-data-cell " style="font-size: 1em;">
                                    <span class="widget-table-cell-text">
                                       <span class="trnvr-pr">0.00<span class="currency">Kz</span></span>
                                    </span>
                                 </div>

                                 <div class="widget-table-cell widget-data-cell " style="font-size: 1em;">
                                    <span class="widget-table-cell-text">
                                       <span class="trnvr-lv">0.00<span class="currency">Kz</span></span>
                                    </span>
                                 </div>

                                 <div class="widget-table-cell widget-data-cell " style="font-size: 1em;">
                                    <span class="widget-table-cell-text">
                                       <span class="trnvr-t">0.00<span class="currency">Kz</span></span>
                                    </span>
                                 </div>
                              </div>

                              <div class="widget-table-row widget-body-row clearfix ">
                                 <div class="widget-table-cell widget-title-col" style="font-size: 1em;"><span class=""><?php echo e(__('winning')); ?></span></div>

                                 <div class="widget-table-cell widget-data-cell " style="font-size: 1em;">
                                    <span class="widget-table-cell-text">
                                       <span class="wng-pr">0.00<span class="currency">Kz</span></span>
                                    </span>
                                 </div>

                                 <div class="widget-table-cell widget-data-cell " style="font-size: 1em;">
                                    <span class="widget-table-cell-text">
                                       <span class="wng-lv">0.00<span class="currency">Kz</span></span>
                                    </span>
                                 </div>

                                 <div class="widget-table-cell widget-data-cell " style="font-size: 1em;">
                                    <span class="widget-table-cell-text">
                                       <span class="wng-t">0.00<span class="currency">Kz</span></span>
                                    </span>
                                 </div>

                              </div>

                              <div class="widget-table-row widget-body-row clearfix ">
                                 <div class="widget-table-cell widget-title-col" style="font-size: 1em;"><span class=""><?php echo e(__('ggr')); ?></span></div>

                                 <div class="widget-table-cell widget-data-cell " style="font-size: 1em;">
                                    <span class="widget-table-cell-text">
                                       <span class="ggr-pr">0.00<span class="currency">Kz</span></span>
                                    </span>
                                 </div>

                                 <div class="widget-table-cell widget-data-cell " style="font-size: 1em;">
                                    <span class="widget-table-cell-text">
                                       <span class="ggr-lv">0.00<span class="currency">Kz</span></span>
                                    </span>
                                 </div>

                                 <div class="widget-table-cell widget-data-cell " style="font-size: 1em;">
                                    <span class="widget-table-cell-text">
                                       <span class="ggr-t">0.00<span class="currency">Kz</span></span>
                                    </span>
                                 </div>

                              </div>

                              <div class="widget-table-row widget-body-row clearfix ">
                                 <div class="widget-table-cell widget-title-col" style="font-size: 1em;"><span class=""><?php echo e(__('ggr_tax')); ?></span></div>

                                 <div class="widget-table-cell widget-data-cell " style="font-size: 1em;">
                                    <span class="widget-table-cell-text">
                                       <span class="tx-pr">0.00<span class="currency">Kz</span></span>
                                    </span>
                                 </div>

                                 <div class="widget-table-cell widget-data-cell " style="font-size: 1em;">
                                    <span class="widget-table-cell-text">
                                       <span class="tx-lv">0.00<span class="currency">Kz</span></span>
                                    </span>
                                 </div>

                                 <div class="widget-table-cell widget-data-cell " style="font-size: 1em;">
                                    <span class="widget-table-cell-text">
                                       <span class="tx-t">0.00<span class="currency">Kz</span></span>
                                    </span>
                                 </div>

                              </div>
							   
                              <div class="widget-table-row widget-body-row clearfix ">
                                 <div class="widget-table-cell widget-title-col" style="font-size: 1em;"><span class=""><?php echo e(__('taxable_winning_bets')); ?></span></div>

                                 <div class="widget-table-cell widget-data-cell " style="font-size: 1em;">
                                    <span class="widget-table-cell-text">
                                       <span class="txwc-pr">0.00<span>%</span></span>
                                    </span>
                                 </div>

                                 <div class="widget-table-cell widget-data-cell " style="font-size: 1em;">
                                    <span class="widget-table-cell-text">
                                       <span class="txwc-lv">0.00<span>%</span></span>
                                    </span>
                                 </div>

                                 <div class="widget-table-cell widget-data-cell " style="font-size: 1em;">
                                    <span class="widget-table-cell-text">
                                       <span class="txwc-t">0.00<span>%</span></span>
                                    </span>
                                 </div>

                              </div>
							   
							   

                              <div class="widget-table-row widget-body-row clearfix ">
                                 <div class="widget-table-cell widget-title-col" style="font-size: 1em;"><span class=""><?php echo e(__('winning_tax')); ?></span></div>

                                 <div class="widget-table-cell widget-data-cell " style="font-size: 1em;">
                                    <span class="widget-table-cell-text">
                                       <span class="txwa-pr">0.00<span>%</span></span>
                                    </span>
                                 </div>

                                 <div class="widget-table-cell widget-data-cell " style="font-size: 1em;">
                                    <span class="widget-table-cell-text">
                                       <span class="txwa-lv">0.00<span>%</span></span>
                                    </span>
                                 </div>

                                 <div class="widget-table-cell widget-data-cell " style="font-size: 1em;">
                                    <span class="widget-table-cell-text">
                                       <span class="txwa-t">0.00<span>%</span></span>
                                    </span>
                                 </div>

                              </div>
                              
							  
                              <div class="widget-table-row widget-body-row clearfix ">
                                 <div class="widget-table-cell widget-title-col" style="font-size: 1em;"><span class=""><?php echo e(__('number_bets')); ?></span></div>

                                 <div class="widget-table-cell widget-data-cell " style="font-size: 1em;">
                                    <span class="widget-table-cell-text">
                                       <span class="bt-pr">0</span>
                                    </span>
                                 </div>

                                 <div class="widget-table-cell widget-data-cell " style="font-size: 1em;">
                                    <span class="widget-table-cell-text">
                                       <span class="bt-lv">0</span>
                                    </span>
                                 </div>

                                 <div class="widget-table-cell widget-data-cell " style="font-size: 1em;">
                                    <span class="widget-table-cell-text">
                                       <span class="bt-t">0</span>
                                    </span>
                                 </div>

                              </div>

                              <div class="widget-table-row widget-body-row clearfix ">
                                 <div class="widget-table-cell widget-title-col" style="font-size: 1em;"><span class=""><?php echo e(__('number_winning')); ?></span></div>

                                 <div class="widget-table-cell widget-data-cell " style="font-size: 1em;">
                                    <span class="widget-table-cell-text">
                                       <span class="nw-pr">0.00</span>
                                    </span>
                                 </div>

                                 <div class="widget-table-cell widget-data-cell " style="font-size: 1em;">
                                    <span class="widget-table-cell-text">
                                       <span class="nw-lv">0.00</span>
                                    </span>
                                 </div>

                                 <div class="widget-table-cell widget-data-cell " style="font-size: 1em;">
                                    <span class="widget-table-cell-text">
                                       <span class="nw-t">0.00</span>
                                    </span>
                                 </div>

                              </div>

                              <div class="widget-footer-row widget-table-row ">
                                 <div class="widget-footer-cell " style="font-size: 1em;"><?php echo e(__('single')); ?>: <span class="c-sngl">N/A</span></div>
                                 <div class="widget-footer-cell " style="font-size: 1em;"><?php echo e(__('multiple')); ?>: <span class="c-mltpl">N/A</span></div>
                                 <div class="widget-footer-cell " style="font-size: 1em;"><?php echo e(__('system')); ?>: <span class="c-systm">N/A</span></div>
                                 <div class="widget-footer-cell " style="font-size: 1em;"><?php echo e(__('chain')); ?>: <span class="c-chn">N/A</span></div>

                              </div>

                           </div>
                        </div>
                     </div>

                  </div>
                  <div class="bc-separate-loader-container"><img class="bc-separate-loader" style="width: 90px; height: 90px" src="assets/img/loader.gif" alt="loader"></div>
               </div>
            </div>
            <!-- sportsbook overview -->


            <!-- casino overview -->
            <div class="col-xs-12 col-md-12 col-lg-12  ng-isolate-scope">
               <div class="bc-dashboard-widget ng-isolate-scope bc-separate-loading-element">
                  <div class="widget-header">
                     <span class="widget-title">
                        <span class=""><?php echo e(__('casino_overview')); ?></span>
                     </span>
                     <span class="icon-container"><i class="fa fa-pie-chart ng-hide" aria-hidden="true" title=""></i> <i class="fa fa-map-marker ng-hide" aria-hidden="true" title=""></i> <i class="fa fa-list-ul active" aria-hidden="true" title="Casino Overview"></i></span>
                  </div>
                  <div class="widget-body">

                     <div class="">
                        <div class="ng-isolate-scope">
                           <div class="widget-table">

                              <div class="widget-table-row widget-header-row clearfix">
                                 <div class="widget-table-cell widget-title-col" style="font-size: 1em;">&nbsp;
                                 </div>

                                 <div class="widget-table-cell widget-header-cell " style="font-size: 1em;"><span class=""><?php echo e(__('live_casino')); ?></span></div>

                                 <div class="widget-table-cell widget-header-cell " style="font-size: 1em;"><span class=""><?php echo e(__('Slots')); ?></span></div>

                                 <div class="widget-table-cell widget-header-cell " style="font-size: 1em;"><span class=""><?php echo e(__('total')); ?></span></div>

                              </div>
                              <div class="widget-table-row widget-body-row clearfix ">
                                 <div class="widget-table-cell widget-title-col" style="font-size: 1em;"><span class=""><?php echo e(__('revenue')); ?></span></div>

                                 <div class="widget-table-cell widget-data-cell " style="font-size: 1em;">
                                    <span class="widget-table-cell-text">
                                       <span class="c-live-revenue">0.00<span class="currency">Kz</span></span>
                                    </span>
                                 </div>

                                 <div class="widget-table-cell widget-data-cell " style="font-size: 1em;">
                                    <span class="widget-table-cell-text">
                                       <span class="c-slot-revenue">0.00<span class="currency">Kz</span></span>
                                    </span>
                                 </div>

                                 <div class="widget-table-cell widget-data-cell " style="font-size: 1em;">
                                    <span class="widget-table-cell-text">
                                       <span class="c-total-revenue">0.00<span class="currency">Kz</span></span>
                                    </span>
                                 </div>

                              </div>

                              <div class="widget-table-row widget-body-row clearfix ">
                                 <div class="widget-table-cell widget-title-col" style="font-size: 1em;"><span class=""><?php echo e(__('winning')); ?></span></div>

                                 <div class="widget-table-cell widget-data-cell " style="font-size: 1em;">
                                    <span class="widget-table-cell-text">
                                       <span class="c-live-winning">0.00<span class="currency">Kz</span></span>
                                    </span>
                                 </div>

                                 <div class="widget-table-cell widget-data-cell " style="font-size: 1em;">
                                    <span class="widget-table-cell-text">
                                       <span class="c-slot-winning">0.00<span class="currency">Kz</span></span>
                                    </span>
                                 </div>

                                 <div class="widget-table-cell widget-data-cell " style="font-size: 1em;">
                                    <span class="widget-table-cell-text">
                                       <span class="c-total-winning">0.00<span class="currency">Kz</span></span>
                                    </span>
                                 </div>

                              </div>

                              <div class="widget-table-row widget-body-row clearfix ">
                                 <div class="widget-table-cell widget-title-col" style="font-size: 1em;"><span class=""><?php echo e(__('ggr')); ?></span></div>

                                 <div class="widget-table-cell widget-data-cell " style="font-size: 1em;">
                                    <span class="widget-table-cell-text">
                                       <span class="c-live-ggr">0.00<span class="currency">Kz</span></span>
                                    </span>
                                 </div>

                                 <div class="widget-table-cell widget-data-cell " style="font-size: 1em;">
                                    <span class="widget-table-cell-text">
                                       <span class="c-slot-ggr">0.00<span class="currency">Kz</span></span>
                                    </span>
                                 </div>

                                 <div class="widget-table-cell widget-data-cell " style="font-size: 1em;">
                                    <span class="widget-table-cell-text">
                                       <span class="c-total-ggr">0.00<span class="currency">Kz</span></span>
                                    </span>
                                 </div>

                              </div>

                              <div class="widget-table-row widget-body-row clearfix ">
                                 <div class="widget-table-cell widget-title-col" style="font-size: 1em;"><span class=""><?php echo e(__('ggr_tax')); ?>

                                    </span></div>

                                 <div class="widget-table-cell widget-data-cell " style="font-size: 1em;">
                                    <span class="widget-table-cell-text">
                                       <span class="c-live-ggr-tax">0.00<span>%</span></span>
                                    </span>
                                 </div>

                                 <div class="widget-table-cell widget-data-cell " style="font-size: 1em;">
                                    <span class="widget-table-cell-text">
                                       <span class="c-slot-ggr-tax">0.00<span>%</span></span>
                                    </span>
                                 </div>

                                 <div class="widget-table-cell widget-data-cell " style="font-size: 1em;">
                                    <span class="widget-table-cell-text">
                                       <span class="c-total-ggr-tax">0.00<span>%</span></span>
                                    </span>
                                 </div>

                              </div>
							   
                              <div class="widget-table-row widget-body-row clearfix ">
                                 <div class="widget-table-cell widget-title-col" style="font-size: 1em;"><span class=""><?php echo e(__('taxable_winning_bets')); ?></span></div>

                                 <div class="widget-table-cell widget-data-cell " style="font-size: 1em;">
                                    <span class="widget-table-cell-text">
                                       <span class="c-txwc-pr">0.00<span>%</span></span>
                                    </span>
                                 </div>

                                 <div class="widget-table-cell widget-data-cell " style="font-size: 1em;">
                                    <span class="widget-table-cell-text">
                                       <span class="c-txwc-lv">0.00<span>%</span></span>
                                    </span>
                                 </div>

                                 <div class="widget-table-cell widget-data-cell " style="font-size: 1em;">
                                    <span class="widget-table-cell-text">
                                       <span class="c-txwc-t">0.00<span>%</span></span>
                                    </span>
                                 </div>

                              </div>

                              <div class="widget-table-row widget-body-row clearfix ">
                                 <div class="widget-table-cell widget-title-col" style="font-size: 1em;"><span class=""><?php echo e(__('winning_tax')); ?></span></div>

                                 <div class="widget-table-cell widget-data-cell " style="font-size: 1em;">
                                    <span class="widget-table-cell-text">
                                       <span class="c-txwa-pr">0.00<span>%</span></span>
                                    </span>
                                 </div>

                                 <div class="widget-table-cell widget-data-cell " style="font-size: 1em;">
                                    <span class="widget-table-cell-text">
                                       <span class="c-txwa-lv">0.00<span>%</span></span>
                                    </span>
                                 </div>

                                 <div class="widget-table-cell widget-data-cell " style="font-size: 1em;">
                                    <span class="widget-table-cell-text">
                                       <span class="c-txwa-t">0.00<span>%</span></span>
                                    </span>
                                 </div>

                              </div>
                              




                              <div class="widget-table-row widget-body-row clearfix ">
                                 <div class="widget-table-cell widget-title-col" style="font-size: 1em;"><span class=""><?php echo e(__('number_bets')); ?></span></div>

                                 <div class="widget-table-cell widget-data-cell " style="font-size: 1em;">
                                    <span class="widget-table-cell-text">
                                       <span class="c-live-bet">0</span>
                                    </span>
                                 </div>

                                 <div class="widget-table-cell widget-data-cell " style="font-size: 1em;">
                                    <span class="widget-table-cell-text">
                                       <span class="c-slot-bet">0</span>
                                    </span>
                                 </div>

                                 <div class="widget-table-cell widget-data-cell " style="font-size: 1em;">
                                    <span class="widget-table-cell-text">
                                       <span class="c-total-bet">0</span>
                                    </span>
                                 </div>

                              </div>

                              <div class="widget-table-row widget-body-row clearfix ">
                                 <div class="widget-table-cell widget-title-col" style="font-size: 1em;"><span class=""><?php echo e(__('number_winning')); ?></span></div>

                                 <div class="widget-table-cell widget-data-cell " style="font-size: 1em;">
                                    <span class="widget-table-cell-text">
                                       <span class="c-live-win">0</span>
                                    </span>
                                 </div>

                                 <div class="widget-table-cell widget-data-cell " style="font-size: 1em;">
                                    <span class="widget-table-cell-text">
                                       <span class="c-slot-win">0</span>
                                    </span>
                                 </div>

                                 <div class="widget-table-cell widget-data-cell " style="font-size: 1em;">
                                    <span class="widget-table-cell-text">
                                       <span class="c-total-win">0</span>
                                    </span>
                                 </div>

                              </div>

                           </div>
                        </div>
                     </div>

                  </div>
                  <div class="bc-separate-loader-container"><img class="bc-separate-loader" style="width: 90px; height: 90px" src="assets/img/loader.gif" alt="loader"></div>
               </div>
            </div>
            <!-- casino overview -->
         </div>
      </div>
   </div>
   <div class="notifications-container hide-notification-container">
   </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra'); ?>
<script>
   function cb(start, end, label) {
      $('#dt-picker').data('daterangepicker').setStartDate(start);
      $('#dt-picker').data('daterangepicker').setEndDate(end);
      $('.bc-separate-loader-container').css('display', 'block');

      $.post('<?php echo e(url("dashboard")); ?>', {
         _token: '<?php echo e(csrf_token()); ?>',
         start: start.format('YYYY-MM-DD'),
         end: end.format('YYYY-MM-DD')
      }, (data, status) => {

         for (const [key, value] of Object.entries(data.stat)) {

            if ($(`.${key}`).length)
               $(`.${key}`).html(value)

            /*  if (key.includes('ggr')) {
                $(`.${key}`).parent().closest('div').addClass(value.includes('(') ? 'widget-bad-result' : 'widget-good-result')
             } */

         }
         for (const [key, value] of Object.entries(data.cnt)) {

            if ($(`.c-${key}`).length)
               $(`.c-${key}`).html(value)
         }
         for (const [key, value] of Object.entries(data.casino)) {

            if ($(`.${key}`).length)
               $(`.${key}`).html(value)
         }
         $('.bc-separate-loader-container').css('display', 'none');
      });
   }


   $(document).ready(() => {
      $('#dt-picker').daterangepicker({
         maxDate: new Date()
      }, cb);
      cb(moment().subtract(1, 'days'), moment().subtract(1, 'days'));

   });

   function onDateSelect(e) {
      $('.day').removeClass('active');
      $(e).addClass('active');
      let start = '';
      let end = '';

      switch ($(e).data('id')) {
         case 'today':
            start = moment();
            end = moment();
            break;
         case 'yesterday':
            start = moment().subtract(1, 'days');
            end = moment().subtract(1, 'days');
            break;
         case 'month':
            start = moment().startOf('month');
            end = moment().endOf('month');
            break;

         default:
            break;
      }
      cb(start, end);

   }
   //menu active inactive script
   $(document).ready(function() {
      $('#menubar1 li:nth-child(2) #parent_menu').addClass("active-super");
      $('#menubar1 li:nth-child(3) a').removeClass("active-super");
      $('#menubar1 li:nth-child(4) a').removeClass("active-super");
      $('#menubar1 li:nth-child(5) a').removeClass("active-super");

      //daterangepicker future date disable

   });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\inetpub\vhosts\backoffice.bantubet.com\backoffice-ao.bantubet.com\resources\views/home.blade.php ENDPATH**/ ?>