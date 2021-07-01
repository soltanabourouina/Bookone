<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    Contacts
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Contacts</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/Liste de contacts</span>
						</div>
					</div>
					
				</div>
				<!-- breadcrumb -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php if(session()->has('Add')): ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong><?php echo e(session()->get('Add')); ?></strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php endif; ?>


<?php if(session()->has('Edit')): ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong><?php echo e(session()->get('Edit')); ?></strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php endif; ?>


<?php if(session()->has('delete')): ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong><?php echo e(session()->get('delete')); ?></strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php endif; ?>

<?php if(session()->has('Error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong><?php echo e(session()->get('Error')); ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
				<!-- row -->
				<div class="row row-sm">
					<div class="col-sm-12 col-lg-5 col-xl-4">
						<div class="card custom-card">
							<div class="">
								<div class="main-content-app main-content-contacts pt-0">
									<div class="main-content-left main-content-left-contacts">
                                        <div class="d-flex justify-content-between">
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('utilisateurs')): ?>
                                                <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale"
                                                    data-toggle="modal" href="#exampleModal"> Ajouter un contact</a>
                                            <?php endif; ?>
                                        </div>
										<nav class="nav main-nav-line main-nav-line-chat  pl-3">
											<a class="nav-link active" data-toggle="tab" href="">All Contacts</a>
										</nav>

										<div class="main-contacts-list" id="mainContactList">
                                            <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<div class="main-contact-item ">
										
												<div class="main-contact-body">
													<h5><?php echo e($contact->nom_entreprise); ?></h5>
													<h6><?php echo e($contact->nom  . ' ' .$contact->prenom); ?></h6><span class="phone"><?php echo e($contact->tel); ?></span>
												</div>
												<a class="main-contact-star" href="">
													<i class="fe fe-star mr-1 text-warning"></i>
													
												</a>
											</div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
                   



                     <!-- add -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Ajouter un contact</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo e(route('contacts.store')); ?>" method="post">
                    <?php echo e(csrf_field()); ?>

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nom_entreprise"> Nom de l'entreprise*</label>
                            <input type="text" class="form-control" id="nom_entreprise" name="nom_entreprise" required>
                        </div>
                        <div class="form-group">
                            <label for="nom"> Nom *</label>
                            <input type="text" class="form-control" id="nom" name="nom" required>
                        </div>
                        <div class="form-group">
                            <label for="prenom"> Prénom*</label>
                            <input type="text" class="form-control" id="prenom" name="prenom" required>
                        </div>
                        <div class="form-group">
                            <label for="tel"> Tel*</label>
                            <input type="tel" class="phone form-control" id="tel" name="tel" required>
                        </div>
                        <div class="form-group">
                            <label for="titre"> Titre *</label>
                            <input type="text" class="form-control" id="titre" name="titre" required>
                        </div>
                        <div class="form-group">
                            <label for="email"> Email*</label>
                            <input type="text" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="linkedin"> Linkedin*</label>
                            <input type="text" class="form-control" id="linkedin" name="linkedin" required>
                        </div>
                      


                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Valider</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

					<div class="col-sm-12 col-lg-7 col-xl-8">
						<div class="">
							<a class="main-header-arrow" href="" id="ChatBodyHide"><i class="icon ion-md-arrow-back"></i></a>
							<div class="main-content-body main-content-body-contacts card custom-card">
								<div class="main-contact-info-header pt-3">
									<div class="media">
										<div class="main-img-user">
											<img alt="avatar" src="<?php echo e(URL::asset('assets/img/faces/6.jpg')); ?>"> <a href=""><i class="fe fe-camera"></i></a>
										</div>
										<div class="media-body">
											<h5>Petey Cruiser</h5>
											<p>Web Designer</p>
											<nav class="contact-info">
											<a href="#" class="contact-icon border tx-inverse" data-toggle="tooltip" title="message"><i class="fe fe-message-square"></i></a>
												</nav>
										</div>
									</div>
									<div class="main-contact-action btn-list pt-3 pr-3">
										<a href="#" class="btn ripple btn-primary text-white btn-icon" data-placement="top" data-toggle="tooltip" title="Edit Profile"><i class="fe fe-edit"></i></a>
										<a href="#" class="btn ripple btn-secondary text-white btn-icon" data-placement="top" data-toggle="tooltip" title="Delete Profile"><i class="fe fe-trash-2"></i></a>
									</div>
								</div>
								<div class="main-contact-info-body p-4">
									<div>
										<h6>Biography</h6>
										<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
										<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
									</div>
									<div class="media-list pb-0">
										<div class="media">
											<div class="media-body">
												<div>
													<label>Work</label> <span class="tx-medium">+1 (234) 567 8901</span>
												</div>
												<div>
													<label>Personal</label> <span class="tx-medium">+1 (498) 021 0090</span>
												</div>
											</div>
										</div>
										<div class="media">
											<div class="media-body">
												<div>
													<label>Gmail Account</label> <span class="tx-medium">sonia.taylor@gmail.com</span>
												</div>
												<div>
													<label>Other Account</label> <span class="tx-medium">me@bootstrapdash.me</span>
												</div>
											</div>
										</div>
										<div class="media">
											<div class="media-body">
												<div>
													<label>Current Address</label> <span class="tx-medium">012 Dashboard Apartments, San Francisco, California 13245</span>
												</div>
											</div>
										</div>
										<div class="media mb-0">
											<div class="media-body">
												<div>
													<label>Call History</label> <span class="tx-medium">Duration of last call: 2m 32sec</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End Row -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<!--Internal  Contact js -->
<script src="<?php echo e(URL::asset('assets/js/contact.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/soltana/Bureau/Bookone/resources/views/contacts/index.blade.php ENDPATH**/ ?>