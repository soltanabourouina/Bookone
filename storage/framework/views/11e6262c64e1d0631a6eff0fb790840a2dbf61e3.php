<?php $__env->startSection('css'); ?>
    <!--Internal   Notify -->
    <link href="<?php echo e(URL::asset('assets/plugins/notify/css/notifIt.css')); ?>" rel="stylesheet" />
<?php $__env->startSection('title'); ?>
Etablissements
<?php $__env->stopSection(); ?>
<link href="<?php echo e(URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet" />
<link href="<?php echo e(URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')); ?>" rel="stylesheet" />
<link href="<?php echo e(URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')); ?>" rel="stylesheet">
<!--Internal   Notify -->
<link href="<?php echo e(URL::asset('assets/plugins/notify/css/notifIt.css')); ?>" rel="stylesheet" />


<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Etablissements</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> /
                Liste des Etablissements</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


<?php if(session()->has('Add')): ?>
    <script>
        window.onload = function() {
            notif({
                msg: " la Ajout a été  effectuée avec succès",
                type: "success"
            });
        }

    </script>
<?php endif; ?>

<?php if(session()->has('edit')): ?>
    <script>
        window.onload = function() {
            notif({
                msg: " la Modification a été  effectuée avec succès",
                type: "success"
            });
        }

    </script>
<?php endif; ?>

<?php if(session()->has('delete')): ?>
    <script>
        window.onload = function() {
            notif({
                msg: " la Suppression a été  effectuée avec succès",
                type: "error"
            });
        }

    </script>
<?php endif; ?>

<!-- row -->
<div class="row row-sm">
    <div class="col-xl-12">
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"> Ajouter un  etablissement</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="<?php echo e(route('etablissements.store')); ?>" method="post">
            <?php echo e(csrf_field()); ?>

            <div class="modal-body">
               
                <div class="form-group">
                    <label for="nom"> Nom de l'etablissement *</label>
                    <input type="text" class="form-control" id="nom" name="nom" required>
                </div>
                <div class="form-group">
                    <label for="code"> Code*</label>
                    <input type="text" class="form-control" id="code" name="code" required>
                </div>
                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Departement</label>
                <select name="departement_id" id="departement_id" class="form-control" required>
                    <option value="" selected disabled> --indiquer le département--</option>
                    <?php $__currentLoopData = $departements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $departement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($departement->id); ?>"><?php echo e($departement->nom); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
               
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Valider</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            </div>
        </form>
    </div>
</div>
</div>
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            
							<div class="d-flex justify-content-between">
								<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('utilisateurs')): ?>
									<a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale"
										data-toggle="modal" href="#exampleModal"> Ajouter un établissement</a>
								<?php endif; ?>
							</div>
                        </div>
                    </div>
                    <br>
                </div>

            </div>
            <div class="card-body">
                <div class="table-responsive">
					<table class="table table-hover" id="etablissements" data-page-length='50' style=" text-align: center;">
						<thead>
                        <thead>
                            <tr>
                              
                                
								<th>Nom de l'etablissement </th>
                                <th>code </th>
                                <th>Departement </th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $etablissements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $etablissement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                   
                                
									<td><?php echo e($etablissement->nom); ?></td>
                                    <td><?php echo e($etablissement->code); ?></td>
                                    <td><?php echo e($etablissement->departement->nom); ?></td>
                                    <td>
                                 
                               
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('afficher permissions')): ?>
                                        <a class="btn btn-success btn-sm">Afficher</a>
                                    <?php endif; ?>
                                    
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('modifier permissions')): ?>
                                        <a class="btn btn-primary btn-sm">Modifier</a>
                                    <?php endif; ?>

                                    
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--/div-->
</div>
<!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script src="<?php echo e(URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')); ?>"></script>
<!--Internal  Datatable js -->
<script src="<?php echo e(URL::asset('assets/js/table-data.js')); ?>"></script>

<script src="<?php echo e(URL::asset('assets/js/modal.js')); ?>"></script>
<!--Internal  Notify js -->
<script src="<?php echo e(URL::asset('assets/plugins/notify/js/notifIt.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/plugins/notify/js/notifit-custom.js')); ?>"></script>
<script>
	$(document).ready(function() {
    $('#etablissements').DataTable();
} );

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/soltana/Bureau/Bookone/resources/views/etablissements/index.blade.php ENDPATH**/ ?>