<?php $__env->startSection('main'); ?>
    <div><?php if(session()->get('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session()->get('success')); ?>

            </div>
        <?php endif; ?>
    </div>
    <div class="row justify-content-between align-content-center">
        <div class="col-sm-12">

            <div class="list-group">
                <a href="#"
                   class="list-group-item list-group-item-action flex-column align-items-start list-group-item-dark">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1"></h5>
                        <span class="badge badge-pill badge-secondary">
                                <small class="h6">Categorie: <?php echo e($article->category); ?></small>
                                </span>
                    </div>
                    <p class="mb-1 h4 font-weight-bold">
                        <?php echo e($article->content); ?>

                    </p>
                    <br>
                    <span class="badge badge-pill badge-secondary">
                                <small class="h6"><?php echo e($article->company->name); ?></small>
                            </span>

                </a>

            </div>
            <br>
            <br>

        </div>
    </div>




    <div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Alexandra\LicentaStefi\kidlearn\resources\views/articles/show.blade.php ENDPATH**/ ?>