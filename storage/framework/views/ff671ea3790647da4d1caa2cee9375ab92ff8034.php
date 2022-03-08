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
                   class="list-group-item list-group-item-action flex-column align-items-center list-group-item-dark">
                    <div class="w-100 justify-content-between">
                        <h4 class="mb-2"></h4>
                        <span class="badge badge-pill badge-secondary">
                                <small class="h4"><?php echo e($job->name ?? 'N/A'); ?></small>
                                </span>
                        <span class="badge badge-pill badge-secondary">
                                <small class="h4">Categorie: <?php echo e($job->category ?? 'N/A'); ?></small>
                                </span>
                        <span class="badge badge-pill badge-secondary">
                                <small class="h4">Nivel: <?php echo e($job->job_level ?? 'N/A'); ?></small>
                                </span>
                        <span class="badge badge-pill badge-secondary">
                                <small class="h4">Oras: <?php echo e($job->city ?? 'N/A'); ?></small>
                                </span>
                    </div>
                    <blockquote>
                        <br> <br>

                        <h3>Descriere: </h3>
                        <p class="mb-1 h4 font-weight-bold" style="white-space: pre-line">
                            <?php echo e($job->description); ?>

                        </p>
                        <br> <br>
                        <h3>Cerinte: </h3>
                        <p class=" h4 font-weight-bold" style="white-space: pre-line">
                            <?php echo e($job->requirements); ?>

                        </p>
                        <br> <br>

                        <h3> Responsabilitati</h3>
                        <p class="mb-1 h4 font-weight-bold" style="white-space: pre-line">
                            <?php echo e($job->responsibilities); ?>

                        </p>
                        <br> <br>

                        <h3> Alte detalii</h3>
                        <p class="mb-1 h4 font-weight-bold" style="white-space: pre-line">
                            <?php echo e($job->details); ?>

                        </p>

                    </blockquote>

                    <br>
                    <span class="badge badge-pill badge-secondary">
                                <small class="h4"><?php echo e($job->company->name); ?></small>
                            </span>
                    <span class="badge badge-pill badge-secondary">
                                <small class="h4">Valabil pana la: <?php echo e($job->expiration_date); ?></small>
                            </span>

                </a>

            </div>
            <br>
            <br>

        </div>
    </div>


    <?php if(Auth::user()->role == 'Candidat'): ?>
        <a href="<?php echo e(route('createCandidateJob', $job->id)); ?>" class="btn btn-primary"><h3>Aplica</h3></a>
    <?php endif; ?>
    <?php if(Auth::user()->role == 'Companie'): ?>
        <a href="<?php echo e(route('showCandidates', $job->id)); ?>" class="btn btn-primary"><h5>Vezi aplicantii</h5></a>
    <?php endif; ?>


    <div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Alexandra\LicentaStefi\kidlearn\resources\views/jobs/show.blade.php ENDPATH**/ ?>