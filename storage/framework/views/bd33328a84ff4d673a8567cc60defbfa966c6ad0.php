<?php $__env->startSection('main'); ?>
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Modifica datele</h1>
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
                <form method="post" action="<?php echo e(route('companies.update', $user->id)); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PATCH'); ?>
                    <div class="form-group">
                        <label for="name">Nume :</label>
                        <input type="text" class="form-control" name="name" value="<?php echo e($user->name); ?>"/>

                        <label for="description" class="col-form-label col-form-label-lg">Descriere :</label>
                        <textarea class="form-control" rows="3"
                                  style="margin-top: 0px; margin-bottom: 0px; height: 86px;"
                                  name="description"> <?php echo e($user->description); ?>

                        </textarea>

                        <label for="company_city">Oras :</label>
                        <input type="text" class="form-control" name="company_city" value="<?php echo e($user->company_city); ?>"/>

                        <label for="email">Email :</label>
                        <input type="email" class="form-control" name="email" value="<?php echo e($user->email); ?>"/>


                    </div>


                    <button type="submit" class="btn btn-primary">Salvează modificările</button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Alexandra\LicentaStefi\kidlearn\resources\views/companies/edit.blade.php ENDPATH**/ ?>