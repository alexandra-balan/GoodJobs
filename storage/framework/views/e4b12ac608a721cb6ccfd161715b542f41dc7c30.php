<?php $__env->startSection('main'); ?>

    <div class="row">

        <div class="col-sm-12">
            <h2 class="display-3">CV - <?php echo e($name); ?></h2>


            <span class="badge  badge-secondary ">
                <h5> Numar de telefon
                </h5>
            </span>
            <p class="mb-2 h4 font-weight-bold"> <?php echo e($candidate->phone_number); ?>

            </p>
            <span class="badge badge-secondary ">
                <h5>
                    Oras
                </h5>
            </span>
            <p class="mb-2 h4 font-weight-bold"> <?php echo e($candidate->city); ?>

            </p>
            <span class="badge badge-secondary ">
                <h5>
                    Email
                </h5>
            </span>
            <p class="mb-2 h4 font-weight-bold"> <?php echo e($candidate->email); ?>

            </p>
            <span class="badge badge-secondary">
                <h5>
                    Educatie
                </h5>
            </span>
            <p class="mb-1 h4 font-weight-bold" style="white-space: pre-line"> <?php echo e($candidate->education); ?>

            </p>
            <span class="badge badge-secondary ">
                <h5>
                    Experienta
                </h5>
            </span>
            <p class="mb-1 h4 font-weight-bold" style="white-space: pre-line"> <?php echo e($candidate->last_job); ?>

            </p>
            <span class="badge badge-secondary ">
                <h5>
                    Limbi straine
                </h5>
            </span>
            <p class="mb-1 h4 font-weight-bold" style="white-space: pre-line"> <?php echo e($candidate->spoken_languages); ?>

            </p>

            <span class="badge badge-secondary ">
                <h5>
                    Competente
                </h5>
            </span>
            <p class="mb-1 h4 font-weight-bold" style="white-space: pre-line""> <?php echo e($candidate->skills); ?>

            </p>

            <span class="badge badge-secondary ">
                <h5>
                    Despre mine
                </h5>
            </span>
            <p class="mb-1 h4 font-weight-bold" style="white-space: pre-line"> <?php echo e($candidate->details); ?>

            </p>


            <br> <br>
            <?php if(Auth::user()->role == 'Candidat'): ?>
                <form method="get" action="<?php echo e(route('candidates.edit', $candidate->id)); ?>">
                    <a href="<?php echo e(route('candidates.edit',$candidate->id)); ?>" class="btn btn-primary">Modifică datele
                    </a>
                </form>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Alexandra\LicentaStefi\kidlearn\resources\views/candidates/show.blade.php ENDPATH**/ ?>