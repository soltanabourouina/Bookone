<!DOCTYPE html>

<html>

<head>

	

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <link href="/css/treeview.css" rel="stylesheet">

</head>

<body>

	<div class="container">     

		<div class="panel panel-primary">

			<div class="panel-heading">Organismes</div>

	  		<div class="panel-body">

	  			<div class="row">

	  				<div class="col-md-6">

	  					<h3>Liste des organismes</h3>

				        <ul id="tree1">

				            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

				                <li>

				                    <?php echo e($category->name); ?>


				                    <?php if(count($category->childs)): ?>

				                        <?php echo $__env->make('manageChild',['childs' => $category->childs], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

				                    <?php endif; ?>

				                </li>

				            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

				        </ul>

	  				</div>

	  				<div class="col-md-6">

	  					<h3>Ajouter un organisme</h3>


				  			<?php echo Form::open(['route'=>'add.category']); ?>



				  				<?php if($message = Session::get('success')): ?>

									<div class="alert alert-success alert-block">

										<button type="button" class="close" data-dismiss="alert">×</button>	

									        <strong><?php echo e($message); ?></strong>

									</div>

								<?php endif; ?>


				  				<div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">

									<?php echo Form::label('Orga:'); ?>


									<?php echo Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=>'organisme']); ?>


									<span class="text-danger"><?php echo e($errors->first('name')); ?></span>

								</div>


								<div class="form-group <?php echo e($errors->has('parent_id') ? 'has-error' : ''); ?>">

									<?php echo Form::label('catégorie de l\'organisme:'); ?>


									<?php echo Form::select('parent_id',$allCategories, old('parent_id'), ['class'=>'form-control', 'placeholder'=>'Selectionnez une catégorie']); ?>


									<span class="text-danger"><?php echo e($errors->first('parent_id')); ?></span>

								</div>


								<div class="form-group">

									<button class="btn btn-success">Add New</button>

								</div>


				  			<?php echo Form::close(); ?>



	  				</div>

	  			</div>


	  			

	  		</div>

        </div>

    </div>

    <script src="/js/treeview.js"></script>

</body>

</html><?php /**PATH /home/soltana/Bureau/Bookone/resources/views/categoryTreeview.blade.php ENDPATH**/ ?>