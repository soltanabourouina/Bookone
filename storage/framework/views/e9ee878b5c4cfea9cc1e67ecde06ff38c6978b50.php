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
            
                <div class="row">
                    <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Nom de l'entreprise: <?php echo e($contact->nom_entreprise); ?></h5>
                        </div>
                        <div class="card-body">
                          
                          <h6 class="card-text"><label>Nom - Prenom:</label>    <?php echo e($contact->nom.' '.$contact->prenom); ?></h6>
                          <h6 class="card-title"><label>Télephone: </label>     <?php echo e($contact->tel); ?></h6>
                          <h6 class="card-title"><label>Email: </label>          <?php echo e($contact->email); ?></h6>
                          <h6 class="card-title"><label>Titre: </label>       <?php echo e($contact->titre); ?></h6>
                          <h6 class="card-title"><label>Linkedin: </label>      <?php echo e($contact->linkedin); ?></h6>


                       
                          <a class="btn btn-primary btn-sm" href="<?php echo e(route('contacts.index')); ?>">Retour</a>
                        </div>
                      </div>
                    </div>
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
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/soltana/Bureau/Bookone/resources/views/contacts/show.blade.php ENDPATH**/ ?>