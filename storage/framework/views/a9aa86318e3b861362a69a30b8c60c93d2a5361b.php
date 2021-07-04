
<?php $__env->startSection('css'); ?>
<!--Internal  Font Awesome -->
<link href="<?php echo e(URL::asset('assets/plugins/fontawesome-free/css/all.min.css')); ?>" rel="stylesheet">
<!--Internal  treeview -->
<link href="<?php echo e(URL::asset('assets/plugins/treeview/treeview-rtl.css')); ?>" rel="stylesheet" type="text/css" />



<?php $__env->startSection('title'); ?>
Affichage des permissions
<?php $__env->stopSection(); ?>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Permissions</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Affichage des permissions</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->


<!-- row -->
<div class="row">
    <div class="col-md-12">
        <div class="card mg-b-20">
            <div class="card-body">
                <div class="main-content-label mg-b-5">
                    <div class="pull-right">
                        <a class="btn btn-primary btn-sm" href="<?php echo e(route('roles.index')); ?>">Retour</a>
                    </div>
                </div>
                <div class="row">
                    <!-- col -->
                    <div class="col-lg-4">
                        <ul id="treeview1">
                            <li><a href="#"><?php echo e($role->name); ?></a>
                                <ul>
                                    <?php if(!empty($rolePermissions)): ?>
                                    <?php $__currentLoopData = $rolePermissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($v->name); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /col -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script src="<?php echo e(URL::asset('assets/plugins/treeview/treeview.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/soltana/Bureau/Bookone/resources/views/roles/show.blade.php ENDPATH**/ ?>