<?php $__env->startSection('main'); ?>
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Modifica CV</h1>
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
                <form method="post" action="<?php echo e(route('candidates.update', $user->id)); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PATCH'); ?>
                    <div class="form-group">
                        <label for="name">Nume :</label>
                        <input type="text" class="form-control" name="name" value="<?php echo e($user->name); ?>"/>

                        <label for="education" class="col-form-label col-form-label-lg">Educatie :</label>
                        <textarea class="form-control" rows="3"
                                  style="margin-top: 0px; margin-bottom: 0px; height: 86px;"
                                  name="education"> <?php echo e($user->education); ?>

                        </textarea>

                        <label for="city">Oras :</label>
                        <input type="text" class="form-control" name="city" value="<?php echo e($user->city); ?>"/>

                        <label for="email">Email :</label>
                        <input type="email" class="form-control" name="email" value="<?php echo e($user->email); ?>"/>

                        <label for="phone_number">Numar de telefon :</label>
                        <input type="text" class="form-control" name="phone_number" value="<?php echo e($user->phone_number); ?>"/>


                        <label for="last_job" class="col-form-label col-form-label-lg">Experienta :</label>
                        <textarea class="form-control" rows="3"
                                  style="margin-top: 0px; margin-bottom: 0px; height: 86px;"
                                  name="last_job"> <?php echo e($user->last_job); ?>

                        </textarea>


                        <label for="spoken_languages">Limbi straine:</label>
                        <input type="text" class="form-control" name="spoken_languages" value="<?php echo e($user->spoken_languages); ?>"/>


                        <label for="skills" class="col-form-label col-form-label-lg">Competente :</label>
                        <textarea class="form-control" rows="3"
                                  style="margin-top: 0px; margin-bottom: 0px; height: 86px;"
                                  name="skills"> <?php echo e($user->skills); ?>

                        </textarea>


                        <label for="details" class="col-form-label col-form-label-lg">Despre mine :</label>
                        <textarea class="form-control" rows="3"
                                  style="margin-top: 0px; margin-bottom: 0px; height: 86px;"
                                  name="details"> <?php echo e($user->details); ?>

                        </textarea>

                    </div>


                    <button type="submit" class="btn btn-primary">Salvează modificările</button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Alexandra\LicentaStefi\kidlearn\resources\views/candidates/edit.blade.php ENDPATH**/ ?>