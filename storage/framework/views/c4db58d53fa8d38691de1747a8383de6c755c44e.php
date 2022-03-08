<?php $__env->startSection('main'); ?>
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Adauga un articol</h1>
            <div>
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div><br/>
                <?php endif; ?>
                <form method="post" action="<?php echo e(route('articles.store')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">

                        <p class="text-secondary h4">Articol :</p>
                        <textarea class="form-control" name="content" rows="6"><?php echo e(old('content')); ?></textarea>

                        <label for="category">Categorie :</label>
                        <select class="form-control" name="category">
                            <option value="" selected disabled hidden>Alege aici</option>
                            <option value="Tech">Tech</option>
                            <option value="HR">HR</option>
                            <option value="News">Noutati</option>
                        </select>

                    </div>


                    <button type="submit" class="btn btn-primary">Salvează datele</button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Alexandra\LicentaStefi\kidlearn\resources\views/articles/create.blade.php ENDPATH**/ ?>