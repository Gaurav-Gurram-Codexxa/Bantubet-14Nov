<?php $__env->startSection('title', 'Percent'); ?>
<?php $__env->startSection('content'); ?>
<script>
    let url = '<?php echo e(route("limit-list")); ?>';
</script>
<style>
    .modal-content {
        position: relative;
        background-color: #fff0;
        -webkit-background-clip: padding-box;
        background-clip: padding-box;
        border: 1px solid #9990;
        outline: 0;
        -webkit-box-shadow: 0 3px 9px rgb(0 0 0 / 50%);
        box-shadow: 0 3px 9px rgb(0 0 0 / 0%);
    }

    .action-toolbar-row .right-actions {
        margin: 13px 10px 0 0;
    }
</style>
<style>
    .accordion-item-header {
        display: none;
    }

    .accordion-item {

        box-shadow: 0 0 10px 3px rgb(119 119 119 / 0%);
    }
</style>
<div class="main-view-panel">

    <div class="view-block bc-gs-container ng-scope">
        <bc-bet-report class="ng-scope ng-isolate-scope">
            <div class="bc-gs-row">
                <div class="bc-col-12">
                    <!-- filter -->

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

                                                        <div class="action-toolbar-row">
                                                            <div class="left-actions">
                                                                <icon title="Settings" class="fa fa-cog" ng-click="openSettings()"></icon>
                                                            </div>
                                                            <div class="right-actions">
                                                                <button type="button" class="button-type-hero stake-limit"><?php echo e(__('set_amount')); ?></button>
                                                                <button class="button-type-hero" onclick="createNewLimit()" data-i18n="_AddPlayer_"><?php echo e(__('add_limit')); ?></button>
                                                            </div>
                                                        </div>
                                                        <div class="widget-body">

                                                            <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                                <thead style="background-color: #f0f5f8;">
                                                                    <tr>
                                                                        <th><?php echo e(__('limit_for')); ?></th>
                                                                        <th><?php echo e(__('start_from')); ?></th>
                                                                        <th><?php echo e(__('end_to')); ?></th>
                                                                        <th><?php echo e(__('revenue')); ?></th>
                                                                        <th><?php echo e(__('winning')); ?></th>
                                                                        <th><?php echo e(__('ggr')); ?></th>
                                                                        <th><?php echo e(__('ggr_tax')); ?></th>
                                                                        <th><?php echo e(__('winning_tax')); ?></th>
                                                                        <th><?php echo e(__('single')); ?></th>
                                                                        <th><?php echo e(__('multiple')); ?></th>
                                                                        <th><?php echo e(__('system')); ?></th>
                                                                        <th><?php echo e(__('chain')); ?></th>
                                                                        <th><?php echo e(__('action')); ?></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                </tbody>
                                                            </table>

                                                        </div>
                                                        <div class="bc-separate-loader-container"><img class="bc-separate-loader" style="width: 90px; height: 90px" src="<?php echo e(asset('assets/img/loader.gif')); ?>" alt="loader">
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
<dialog id="limit">
    <div class="modal-content" ng-transclude="">
        <div style="text-align:center;display:none" id="loader"><img  class="bc-separate-loader" style="width: 90px; height: 90px" src="<?php echo e(asset('assets/img/loader.gif')); ?>" alt="loader"></div>
        <div class="pdh-header ">
            <i class="fa fa-close cross"></i>
            <span data-i18n="_Settings_"><?php echo e(__('limit')); ?></span>

        </div>
        <form name="settingForm" id="limit-form">
            <input type="hidden" name="id">
            <div class="pdh-content">
                <div class="filters-grid settings-grid">

                    <ul>
                        <li>
                            <div class="form-group">
                                <label>For</label>
                                <select class="form-control" name="limit_for">
                                    <option value="online_sport"><?php echo e(__('online_sportbook')); ?></option>
                                    <option value="retail_sport"><?php echo e(__('retail_sportbook')); ?></option>
                                    <option value="casino"><?php echo e(__('casino')); ?></option>
                                </select>
                            </div>
                        </li>
                        <li>
                            <div class="form-group">
                                <label for="currency_for_report"><?php echo e(__('start_from')); ?></label>
                                <input type="date" name="start_from" class=" form-control bcInputClass" required>
                            </div>
                        </li>

                        <li>
                            <div class="form-group">
                                <label for="currency_for_report"><?php echo e(__('end_to')); ?></label>
                                <div class="form-group">
                                    <input type="date" name="end_to" class="form-control bcInputClass">
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="form-group">
                                <label for="currency_for_report"><?php echo e(__('revenue')); ?></label>
                                <div class="form-group">
                                    <input type="number" step="any" name="turnover" placeholder="Set % for Turnover" class="form-control bcInputClass" required>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="form-group">
                                <label for="currency_for_report"><?php echo e(__('winning')); ?></label>
                                <div class="form-group">
                                    <input type="number" step="any" name="winning" placeholder="Set % for Winning" class="form-control bcInputClass" required>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="form-group " style="display: none">
                                <label for="currency_for_report"><?php echo e(__('ggr')); ?></label>
                                <div class="form-group">
                                    <input type="number" step="any" name="ggr" placeholder="Set % for GGR" class="form-control bcInputClass">
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="form-group">
                                <label for="currency_for_report"><?php echo e(__('ggr_tax')); ?></label>
                                <div class="form-group">
                                    <input type="number" step="any" name="tax_ggr" placeholder="Set % for GGR Tax" class="form-control bcInputClass" required>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="form-group">
                                <label for="currency_for_report"><?php echo e(__('win_tax')); ?></label>
                                <div class="form-group">
                                    <input type="number" step="any" name="tax_winning" placeholder="Set % for Winning Tax" class="form-control bcInputClass" required>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="form-group">
                                <label for="currency_for_report"><?php echo e(__('number_bets')); ?></label>
                                <div class="form-group">
                                    <input type="number" step="any" name="bet_no" placeholder="Set % for Number of Bet" class="form-control bcInputClass" required>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="form-group">
                                <label for="currency_for_report"><?php echo e(__('number_winning')); ?></label>
                                <div class="form-group">
                                    <input type="number" step="any" name="winning_no" placeholder="Set % for Number of Winning" class="form-control bcInputClass" required>
                                </div>
                            </div>
                        </li>
                        <li class="remove-casino">
                            <div class="form-group">
                                <label for="currency_for_report"><?php echo e(__('single_bet')); ?></label>
                                <div class="form-group">
                                    <input type="number" step="any" name="single" placeholder="Set % for Single Bet" class="form-control bcInputClass">
                                </div>
                            </div>
                        </li>
                        <li class="remove-casino">
                            <div class="form-group">
                                <label for="currency_for_report"><?php echo e(__('multiple_bet')); ?></label>
                                <div class="form-group">
                                    <input type="number" step="any" name="multiple" placeholder="Set % for Multiple Bet" class="form-control bcInputClass">
                                </div>
                            </div>
                        </li>
                        <li class="remove-casino">
                            <div class="form-group">
                                <label for="currency_for_report"><?php echo e(__('system_bet')); ?></label>
                                <div class="form-group">
                                    <input type="number" step="any" name="system" placeholder="Set % for System Bet" class="form-control bcInputClass">
                                </div>
                            </div>
                        </li>
                        <li class="remove-casino">
                            <div class="form-group">
                                <label for="currency_for_report"><?php echo e(__('chain_bet')); ?></label>
                                <div class="form-group">
                                    <input type="number" step="any" name="chain" placeholder="Set % for Chain Bet" class="form-control bcInputClass">
                                </div>
                            </div>
                        <li class="remove-casino">
                            <div class="form-group">
                                <label for="currency_for_report"><?php echo e(__('chain_bet')); ?></label>
                                <div class="form-group">
                                    <input type="number" step="any" name="chain" placeholder="Set % for Chain Bet" class="form-control bcInputClass">
                                </div>
                            </div>

                        </li>
                        <li>
                            <div class="form-group">
                                <label for="currency_for_report"><?php echo e(__('eligible_amount_min')); ?></label>
                                <div class="form-group">
                                    <input type="number" step="any" name="eligible_amount_min" placeholder="Set % for Chain Bet" class="form-control bcInputClass">
                                </div>
                            </div>

                        </li>
                        <li>
                            <div class="form-group">
                                <label for="currency_for_report"><?php echo e(__('eligible_amount_max')); ?></label>
                                <div class="form-group">
                                    <input type="number" step="any" name="eligible_amount_max" placeholder="Set % for Chain Bet" class="form-control bcInputClass">
                                </div>
                            </div>

                        </li>
                        <li>
                            <div class="form-group">
                                <label for="currency_for_report"><?php echo e(__('eligible_bet_display_percent')); ?></label>
                                <div class="form-group">
                                    <input type="number" step="any" name="eligible_bet_display_percent" placeholder="Set % for Chain Bet" class="form-control bcInputClass">
                                </div>
                            </div>

                        </li>
                    </ul>

                </div>
            </div>
            <div class="pdh-buttons-holder">
                <div>
                    <button data-i18n="_Save_"><?php echo e(__('save')); ?></button>
                    <button type="button" class="cross"><?php echo e(__('cancel')); ?></button>
                </div>
            </div>
        </form>
    </div>
</dialog>
<dialog id="confirm">
    <div class="modal-content" ng-transclude="">
        <div class="pdh-header ">
            <i class="fa fa-close cross"></i>

        </div>
        <form id="delete-form" method="post">
            <div class="pdh-content">
                <div class="filters-grid settings-grid">
                    <span data-i18n="_Settings_" style="padding-left: 4%;
    font-size: 18px;"><?php echo e(__('are_you_sure')); ?></span>
                </div>
            </div>
            <div class="pdh-buttons-holder">
                <div>
                    <button data-i18n="_Save_"><?php echo e(__('yes')); ?></button>
                    <button type="button" class="cross"><?php echo e(__('no')); ?></button>
                </div>
            </div>
        </form>
    </div>
</dialog>
<?php if(auth()->user()->is_admin): ?>

<dialog id="stake_limit">
    <div class="modal-content" ng-transclude="">
        <div class="pdh-header ">
            <i class="fa fa-close cross"></i>
            <span data-i18n="_Settings_"><?php echo e(__('stake_limit')); ?></span>
        </div>
        <form id="stakeLimitForm">
            <div class="pdh-content">
                <div class="filters-grid settings-grid">
                    <ul>
                        <li>
                            <div class="form-group">
                                <label for="manage_limit"><?php echo e(__('max_book_amount')); ?></label>
                                <input type="number" class="form-control" name="sport_stake_amount" value="<?php echo e($sport->stake_amount); ?>">
                            </div>
                        </li>

                        <li>
                            <div class="form-group">
                                <label for="manage_limit"><?php echo e(__('max_book_win_amount')); ?></label>
                                <input type="number" class="form-control" name="sport_winning_amount" value="<?php echo e($sport->winning_amount); ?>">
                            </div>
                        </li>
                        <li>
                            <div class="form-group">
                                <label for="manage_limit"><?php echo e(__('max_casino_stake_amount')); ?></label>
                                <input type="number" class="form-control" name="casino_stake_amount" value="<?php echo e($casino->stake_amount); ?>">
                            </div>
                        </li>

                        <li>
                            <div class="form-group">
                                <label for="manage_limit"><?php echo e(__('max_casino_win_amount')); ?></label>
                                <input type="number" class="form-control" name="casino_winning_amount" value="<?php echo e($casino->winning_amount); ?>">
                            </div>
                        </li>

                    </ul>

                </div>
            </div>
            <div class="pdh-buttons-holder">
                <div>
                    <button data-i18n="_Save_"><?php echo e(__('save')); ?></button>
                    <button type="button" class="cross"><?php echo e(__('cancel')); ?></button>
                </div>
            </div>
        </form>
    </div>
</dialog>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra'); ?>
<script>
    $(document).ready(() => {
        table = $('#example1').DataTable({
            serverSide: true,
            ajax: url,
            buttons: [
                'colvis',
                'copyHtml5',
                'csvHtml5',
                'excelHtml5',
                'pdfHtml5',
                'print'
            ]
        });
        table.on('preDraw.dt', () => {
            $('.bc-separate-loader-container').show();
        })

        table.on('draw.dt', () => {
            $('.bc-separate-loader-container').hide();
        })
    });

    var modal = document.getElementById("limit")
    var stakeModal = document.getElementById("stake_limit")

    function createNewLimit() {
        modal.showModal();
    }

    function stakeAmount() {
        stakeModal.showModal();
    }

    $('.stake-limit').click(stakeAmount)


    $('[name=limit_for]').change((e) => {
        let fr = e.target.value.trim();
        if (fr.toLowerCase().includes('online_sport')) {
            $('.remove-casino').show();
        } else {
            $('.remove-casino').hide();
        }
    });

    $('#stakeLimitForm').submit(e => {
        e.preventDefault();
        $.get("<?php echo e(route('set-limit')); ?>?" + $('#stakeLimitForm').serialize(), (data) => {
            location.reload();
        })
    });

    $("#dailog_btn").click(function() {
        modal.close();
    });

    $('#limit-form').on('submit', (e) => {
        e.preventDefault();
        const data = new FormData(e.target)
        const formJSON = Object.fromEntries(data.entries());
        formJSON['_token'] = '<?php echo e(csrf_token()); ?>'
        var append = formJSON['id'].length ? `/${formJSON['id']}` : '';

        if (formJSON['id'].length)
            formJSON['_method'] = 'patch'

        $('#loader').show()
        $.post(`<?php echo e(url('limit')); ?>${append}`, formJSON, (res, status) => {
            $('#loader').hide()
            modal.close()
            table.ajax.reload();
        });
        $('#limit-form').trigger('reset')
        $('[name=id]').val('')
    });

    function editLimit(data) {
        populate($('#limit-form'), data);
        $('[name=limit_for]').trigger('change')
        modal.showModal()
    }
    var deleteId = 0;
    var deleteModal = document.getElementById("confirm");

    function deleteLimit(id) {
        deleteId = id;
        deleteModal.show();
    }

    $('#delete-form').submit((e) => {
        e.preventDefault();
        $.post(`<?php echo e(url('limit')); ?>/${deleteId}`, {
            '_method': 'delete',
            '_token': '<?php echo e(csrf_token()); ?>'
        }, (res, status) => {
            deleteModal.close()
            table.ajax.reload();
        });
    });

    $('.cross').on('click', () => {
        modal.close();
        deleteModal.close()
        stakeModal.close();
    });
    //menu active inactive script
    $(document).ready(function() {
        $('#menubar1 li:nth-child(2) #parent_menu').removeClass("active-super");
        $('#menubar1 li:nth-child(4) #parent_menu').addClass("active-super");

    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\inetpub\vhosts\backoffice.bantubet.com\backoffice-ao.bantubet.com\resources\views/limit.blade.php ENDPATH**/ ?>