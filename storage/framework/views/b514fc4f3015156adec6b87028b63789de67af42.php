<?php $__env->startSection('title', 'Modifier une variante de fichier'); ?>

<?php $__env->startSection('content'); ?>
<div class="w-25 m-auto">
    <?php echo $__env->make('alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="text-end py-3">
        <a class="btn btn-warning" href="<?php echo e(route('home')); ?>">Retour</a>
    </div>
   
    <form action="<?php echo e(route("editFileVariantPOST", ["id" => $file_variant->id])); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div class="form-group mb-3">
            <label for="code">Code</label>
            <input type="text" class="form-control" name="code" id="code" placeholder="Code" value="<?php echo e($file_variant->code); ?>">
        </div>
        <div class="form-group mb-3">
            <label for="label">Libelle</label>
            <input type="text" class="form-control" name="label" id="label" placeholder="Libelle" value="<?php echo e($file_variant->label); ?>">
        </div>
        <div class="form-group mb-3">
            <label for="type">Type de fichier</label>
            <?php
                $type = $file_variant->type;
            ?>
            <select class="form-control" name="type" id="type">
                <option value="1" <?php if($type == 1): ?> selected <?php endif; ?>>Fichier de personnel</option>
                <option value="2" <?php if($type == 2): ?> selected <?php endif; ?>>Fichier de paie</option>
                <option value="3" <?php if($type == 3): ?> selected <?php endif; ?>>Fichier de plan de paie</option>
            </select>
        </div>
        <div class="text-end">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/soltana/Bureau/Bookone/resources/views/FileVariant/edit.blade.php ENDPATH**/ ?>