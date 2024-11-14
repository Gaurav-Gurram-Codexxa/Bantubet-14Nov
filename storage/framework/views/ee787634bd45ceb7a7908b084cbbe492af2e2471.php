<?php $__env->startSection('title', 'Users'); ?>
<?php $__env->startSection('content'); ?>
<?php

?>
<script>
    let url = '<?php echo e(route("user-list")); ?>';
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
	.table>thead>tr th{
	text-align:center;
	}
	div.dataTables_wrapper div.dataTables_filter label{
	display:none;
	}
	.action-toolbar-row .right-actions{
	    margin: 13px 10px 0 0;
	}
</style>
<div class="main-view-panel">

    <div class="view-block bc-gs-container ng-scope">
        <div class="bo-dashboard-page col-xs-12 ng-scope">
            <style>
                .accordion-item-header {
                    display: none;
                }

                .accordion-item {

                    box-shadow: 0 0 10px 3px rgb(119 119 119 / 0%);
                }

                div.dataTables_paginate {
                    float: none;
                }
            </style>


            <div class=" col-xs-12 col-md-12 col-lg-12 ng-scope ng-isolate-scope">
                <div class="bc-dashboard-widget ng-isolate-scope bc-separate-loading-element">
                    <div class="widget-header">
                        <span class="widget-title">
                            <span class="ng-binding ng-scope"><?php echo e(__('users')); ?></span>
                        </span>
                        <span class="icon-container"><i class="fa fa-pie-chart ng-hide" aria-hidden="true" title=""></i> <i class="fa fa-map-marker ng-hide" aria-hidden="true" title=""></i> <i class="fa fa-list-ul active" aria-hidden="true" title="Casino Overview"></i></span>
                    </div>
                    <div class="action-toolbar-row">
                        <div class="left-actions">
                            <icon title="Settings" class="fa fa-cog" ng-click="openSettings()"></icon>
                        </div>
                        <div class="right-actions"><button class="button-type-hero" onclick="createNewUser()" data-i18n="_AddPlayer_"><?php echo e(__('add_user')); ?></button></div>
                    </div>
                    <div class="widget-body">

                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead style="background-color: #f0f5f8;">
                                <tr style="text-align:center;">
                                    <th><?php echo e(__('name')); ?></th>
                                    <th><?php echo e(__('email')); ?></th>
                                    <th><?php echo e(__('user_type')); ?></th>
                                    <th><?php echo e(__('action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>

                    </div>
                    <div class="bc-separate-loader-container"><img class="bc-separate-loader" style="width: 90px; height: 90px" src="<?php echo e(asset('assets/img/loader.gif')); ?>" alt="loader"></div>
                </div>
            </div>

        </div>
    </div>
</div>

<dialog id="user">
    <div class="modal-content" ng-transclude="">
        <div class="pdh-header ">
            <i class="fa fa-close cross"></i>
            <span data-i18n="_Settings_"><?php echo e(__('user')); ?></span>
        </div>
        <form name="settingForm" id="user-form">
            <div class="pdh-content">
                <div class="filters-grid settings-grid">
                    <input type="hidden" name="id">
                    <ul>
                        <li>
                            <div class="form-group">
                                <label for="currency_for_report"><?php echo e(__('name')); ?></label>
                                <input type="text" name="name" class=" form-control bcInputClass" required>
                            </div>
                        </li>

                        <li>
                            <div class="form-group">
                                <label for="currency_for_report"><?php echo e(__('email')); ?></label>
                                <div class="form-group">
                                    <input type="text" name="email" class=" form-control bcInputClass" required>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="form-group">
                                <label for="currency_for_report"><?php echo e(__('password')); ?></label>
                                <div class="form-group">
                                    <input type="password" max="100" name="password" class="form-control bcInputClass">
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="form-group">
                                <label for="is_admin"><input type="checkbox" name="is_admin" value="1" id="is_admin" class="bcInputClass"><?php echo e(__('is_admin')); ?></label>
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
				<span data-i18n="_Settings_"><?php echo e(__('are_you_sure')); ?></span>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra'); ?>
<script>
    var modal = document.getElementById("user")

    function createNewUser() {
        modal.showModal();
    }

    $('#cross').on('click', () => {
        modal.close();
    });
    $("#dailog_btn").click(function() {
        modal.close();
        // alert("close");
    });

    $('#user-form').on('submit', (e) => {
        e.preventDefault();
		let msg = 'user created succesfully';
        const data = new FormData(e.target)
        const formJSON = Object.fromEntries(data.entries());
        formJSON['_token'] = '<?php echo e(csrf_token()); ?>'

        var append = formJSON['id'].length ? `/${formJSON['id']}` : '';

        if (formJSON['id'].length) {
			formJSON['_method'] = 'patch'
			 msg = 'user updated succesfully';
		}
            

        $.post(`<?php echo e(url('users')); ?>${append}`, formJSON, (res, status) => {
            modal.close()
            table.ajax.reload();
			
			   toastAlert(msg)
			   
        });
        $('#user-form').trigger('reset')
        $('[name=id]').val('')
    });

    function editUser(data) {

        populate($('#user-form'), data);
        modal.showModal()
    }
    var deleteId = 0;
    var deleteModal = document.getElementById("confirm");

    function deleteUser(id) {
        deleteId = id;
        deleteModal.show();
    }

    $('#delete-form').submit((e) => {
        e.preventDefault();
        $.post(`<?php echo e(url('users')); ?>/${deleteId}`, {
            '_method': 'delete',
            '_token': '<?php echo e(csrf_token()); ?>'
        }, (res, status) => {
            deleteModal.close()
            table.ajax.reload();
			toastAlert('user deleted succesfully');
        });
    });
	
	var deleteId = 0;
    var deleteModal = document.getElementById("confirm");

    function deleteUser(id) {
        deleteId = id;
        deleteModal.show();
    }

    $('#delete-form').submit((e) => {
        e.preventDefault();
        $.post(`<?php echo e(url('user')); ?>/${deleteId}`, {
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
    });
    $(document).ready(function() {
        $('#menubar1 li:nth-child(3) #parent_menu').addClass("active-super");
        $('#menubar1 li:nth-child(2) a').removeClass("active-super");
        $('#menubar1 li:nth-child(4) a').removeClass("active-super");
        $('#menubar1 li:nth-child(5) a').removeClass("active-super");
		
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\inetpub\vhosts\backoffice.bantubet.com\backoffice-ao.bantubet.com\resources\views/user.blade.php ENDPATH**/ ?>