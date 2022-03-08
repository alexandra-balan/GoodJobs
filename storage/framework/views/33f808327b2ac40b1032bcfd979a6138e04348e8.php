<?php $__env->startSection('main'); ?>

    <div class="row">

        <div class="col-sm-12">
            <h2 class="display-3">Detalii</h2>

            <h1 class="display-6"><?php echo e($name); ?></h1>

            <span class="badge badge-secondary ">
                <h5>
                    Oras
                </h5>
            </span>
            <p class="lead"> <?php echo e($company->company_city); ?>

            </p>
            <span class="badge badge-secondary ">
                <h5>
                    Email
                </h5>
            </span>
            <p class="lead"> <?php echo e($company->email); ?>

            </p>
            <span class="badge badge-secondary ">
                <h5>
                    Descriere
                </h5>
            </span>
            <p class="lead"> <?php echo e($company->description); ?>

            </p>



            <br> <br>
            <?php if(Auth::user()->role == 'Companie'): ?>

                <form method="get" action="<?php echo e(route('companies.edit', $company->id)); ?>">
                    <a href="<?php echo e(route('companies.edit',$company->id)); ?>" class="btn btn-primary">Modifică datele
                    </a>
                </form>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Alexandra\LicentaStefi\kidlearn\resources\views/companies/show.blade.php ENDPATH**/ ?>