<?php $__env->startSection('main'); ?>

    <div><?php if(session()->get('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session()->get('success')); ?>

            </div>
        <?php endif; ?>
    </div>
    <div class="row">
        <div class="col-sm-12">

            <h1 class="display-3">Aplicarile mele</h1>

            <br>
            <br>

            <div class="container">
                <form method="GET" action="<?php echo e(route('jobs.index')); ?>">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group form-row justify-content-lg-start">
                        <span style="margin-left: 1em;"></span>
                        <select class="form-control col-sm-3" name="filter">
                            <option value="">--Filtrează--</option>

                            <option value="Categorie1">Categorie1</option>
                            <option value="Categorie2">Categorie1</option>

                        </select>
                        <span style="margin-left: 3em;"></span>
                        
                        
                        
                        
                        
                        <span style="margin-left: 2em;"></span>
                        <button type="submit" class="btn btn-primary">Filtreaza</button>

                    </div>
                </form>
                <br>
                <div class="row">
                    <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jobCandidate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div class="col-sm-4">
                            <div class="card-deck">
                                <div class="card border-black mb-3 bg-info text-white" style="max-width: 20rem;">
                                    <div class="card-header">
                                        <?php echo e($jobCandidate->job->name); ?>

                                    </div>

                                    <div class="card-body" style="height: 7rem;">

                                        <p class="card-text"
                                           style="
                                           display: -webkit-box;
                                            -webkit-line-clamp: 3;
                                            -webkit-box-orient: vertical;
                                            overflow:hidden;
                                            text-overflow: ellipsis;
                                          ">
                                            <b><?php echo e($jobCandidate->job->description); ?></b>
                                        </p>
                                    </div>


                                    <div class="card-footer text-muted ">
                                        <span class="badge badge-pill badge-secondary">
                                             <?php echo e($jobCandidate->job->company->name); ?>

                                        </span>
                                        <span class="badge badge-pill badge-secondary">
                                           <?php echo e($jobCandidate->seen ? 'Vizualizat' : 'Nevizualizat'); ?>

                                        </span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
    <br> <br>

    <br>
    <div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Alexandra\LicentaStefi\kidlearn\resources\views/candidateJobs/index.blade.php ENDPATH**/ ?>