<?php $__env->startSection('css'); ?>
    <!--Internal   Notify -->
    <link href="<?php echo e(URL::asset('assets/plugins/notify/css/notifIt.css')); ?>" rel="stylesheet" />
<?php $__env->startSection('title'); ?>
$employees
<?php $__env->stopSection(); ?>
<!-- Internal Data table css -->

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
            <h4 class="content-title mb-0 my-auto">Les Employés</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> /
                Liste des employés</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


<?php if(session()->has('show')): ?>
    <script>
        window.onload = function() {
            notif({
                msg: " visualisation des informations de l'employé",
                type: "success"
            });
        }

    </script>
<?php endif; ?>



<!-- row -->
<div class="row row-sm">
    <div class="col-xl-12">
        <div class="card">
           
           <!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="showplus" tabindex="-1" role="dialog" aria-labelledby="showplusTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Carte employé</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="employees/show" method="get">
                <?php echo e(method_field('show')); ?>

                <?php echo e(csrf_field()); ?>

                <div class="modal-body">
                   
                    <input type="hidden" name="pro_id" id="pro_id" value="">
                   
                    <ul class="list-group list-group-flush">



                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Matricule: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                      
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">prenom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">sexe: </label>
                            <input class="form-control col-sm-10" name="sexe" id="sexe" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-6 col-form-label">Date_de_naissance: </label>
                            <input class="form-control col-sm-6" name="date_nais" id="date_nais" type="date" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-6 col-form-label">Nom: </label>
                            <input class="form-control col-sm-6" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>

                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>









                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>











                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                      
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>

                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nom: </label>
                            <input class="form-control col-sm-10" name="emp_nom" id="emp_nom" type="text" readonly>
                            </div>
                        </li>



                      </ul>
                </div>
              
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
          </div>
      </div>
    </div>
  </div>

            <div class="card-body">
                <div class="table-responsive">
					<table class="table table-hover" id="$employees" data-page-length='50' style=" text-align: center;">
						<thead>
                        <thead>
                            <tr>
                              
                                <th>#</th>
                                <th>Matricule </th>
								<th>Nom </th>
                                <th>prenom </th>
                                <th>Genre </th>
                                <th>Date de naissance </th>
                                <th>Date d'ancienneté'</th>
                                <th>Voir plus</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                            <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <tr>
                                    <td><?php echo e(++$i); ?></td>
                                    <td><?php echo e($employee->matricule); ?></td>
                                    <td><?php echo e($employee->nom); ?></td>
                                    
                                    <td><?php echo e($employee->prenom); ?></td>
                                    <td><?php echo e($employee->sexe); ?></td>
                                    <td><?php echo e($employee->date_de_naissance); ?></td>
                                    <td><?php echo e($employee->date_anciennete); ?></td>
                                    <td>
                                 
<button type="button" class="btn btn-secondary" 
data-pro_id="<?php echo e($employee->id); ?>" data-emp_nom="<?php echo e($employee->nom); ?>" 
data-emp_prenom="<?php echo e($employee->prenom); ?>" data-sexe="<?php echo e($employee->sexe); ?>"
data-date_nais="<?php echo e($employee->date_de_naissance); ?>" data-date_anc="<?php echo e($employee->date_anciennete); ?>" 
data-nat_cont="<?php echo e($employee->nature_contrat); ?>" data-type_cont="<?php echo e($employee->type_contrat); ?>"

data-v_niv="<?php echo e($employee->v_niveau_classification); ?>" data-coef="<?php echo e($employee->coef); ?>" 
data-sal_cont_pro="<?php echo e($employee->salaire_contractuel_prorate); ?>" data-sal_cont_etp="<?php echo e($employee->salaire_contractuel_etp); ?>"
data-sal_cont_an_etp="<?php echo e($employee->salaire_contractuel_annuel_etp); ?>" data-coef_h="<?php echo e($employee->coef_horaire); ?>" 
data-nbr_m_sal="<?php echo e($employee->nbr_mois_salaire_de_base); ?>"data-sal_an_base="<?php echo e($employee->salaire_annuel_de_base); ?>"
                                         
   
data-mod_moi="<?php echo e($employee->mod_moi); ?>" data-niv_job="<?php echo e($employee->niv_job); ?>" 
data-status="<?php echo e($employee->status); ?>" data-c_actionnaire="<?php echo e($employee->c_actionnaire); ?>"
data-c_co-actionnaire="<?php echo e($employee->c_co_actionnaire); ?>" data-c_groupe="<?php echo e($employee->c_groupe); ?>"
data-c_branche="<?php echo e($employee->c_branche); ?>"data-c_division="<?php echo e($employee->c_division); ?>" 
                                     

 data-c_business_unit="<?php echo e($employee->c_business_unit); ?>" data-c_activite="<?php echo e($employee->c_activite); ?>"
 data-c_sous-activite="<?php echo e($employee->c_sous_activite); ?>" data-c_filiere_metier="<?php echo e($employee->c_sous_filiere_metier); ?>" 
 data-c_zone="<?php echo e($employee->c_zone); ?>" data-c_pays="<?php echo e($employee->c_pays); ?>"
  data-c_societe_Entite_legale="<?php echo e($employee->c_societe_Entite_legale); ?>" 
      
  data-c_region="<?php echo e($employee->c_region); ?>" data-c_departement="<?php echo e($employee->c_departement); ?>" 
  data-c_etab="<?php echo e($employee->c_etab); ?>" data-c_direction="<?php echo e($employee->c_direction); ?>"
 data-c_service="<?php echo e($employee->c_service); ?>" data-c_unite="<?php echo e($employee->c_unite); ?>"
  data-c_atelier="<?php echo e($employee->c_atelier); ?>"
  data-pcs_ese="<?php echo e($employee->pcs_ese); ?>" 
  
  data-invalide="<?php echo e($employee->invalide); ?>" data-rqth="<?php echo e($employee->rqth); ?>"
   data-idcc="<?php echo e($employee->idcc); ?>" data-temps_travail="<?php echo e($employee->temps_travail); ?>"
 data-reference_horaire="<?php echo e($employee->reference_horaire); ?>" data-cat_pro="<?php echo e($employee->cat_pro); ?>" 
 data-c_categorie_prof_resolue="<?php echo e($employee->c_categorie_prof_resolue); ?>"
  data-c_classification="<?php echo e($employee->c_classification); ?>"                                   
                                          
  data-c_metier_resolu="<?php echo e($employee->c_metier_resolu); ?>" data-c_emploi="<?php echo e($employee->c_emploi); ?>"   
                                         
                                       
                                         data-toggle="modal" 
                                         data-target="#showplus">
                                           Plus <?php echo e($employee->id); ?>

                                        </button>

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
<!-- Internal Data tables -->
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
<!--Internal  Notify js -->
<script src="<?php echo e(URL::asset('assets/plugins/notify/js/notifIt.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/plugins/notify/js/notifit-custom.js')); ?>"></script>
<!-- Internal Modal js-->


<script>
       $('#showplus').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var pro_id = button.data('pro_id')
        var emp_nom = button.data('emp_nom')
        var sexe = button.data('sexe')
        var date_nais = button.data('date_nais')
        var modal = $(this)

        modal.find('.modal-body #pro_id').val(pro_id);
        modal.find('.modal-body #emp_nom').val(emp_nom);
        modal.find('.modal-body #sexe').val(sexe);
        modal.find('.modal-body #date_nais').val(date_nais);
    })

 


</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/soltana/Bureau/Bookone/resources/views/employees/index.blade.php ENDPATH**/ ?>