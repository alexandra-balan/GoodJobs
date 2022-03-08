<?php $__env->startSection('main'); ?>

    <div><?php if(session()->get('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session()->get('success')); ?>

            </div>
        <?php endif; ?>
    </div>
    <div class="row">
        <div class="col-sm-12">

            <h1 class="display-3">Joburi</h1>

            <br>
            <br>

            <div class="container">
                <form method="GET" action="<?php echo e(route('jobs.index')); ?>">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group form-row justify-content-lg-start">
                        <span style="margin-left: 1em;"></span>
                        <select class="form-control col-sm-3" name="filter">
                            <option value="">--Filtrează--</option>
                            <option value="Achizitii">Achizitii-logistica</option>
                            <option value="Politica">Stiinte politice</option>
                            <option value="Design">Arhitectura-design</option>
                            <option value="Banci">Banci</option>
                            <option value="Contabilitate">Contabilitate-finante</option>
                            <option value="ClientService">Client service</option>
                            <option value="IT">IT</option>
                            <option value="Juridic">Juridic</option>
                            <option value="Telecom">Telecomunicatii</option>
                            <option value="HR">Resurse umane</option>

                        </select>
                        <span style="margin-left: 3em;"></span>
                        
                        
                        
                        
                        
                        <span style="margin-left: 2em;"></span>
                        <button type="submit" class="btn btn-primary">Filtreaza</button>

                    </div>
                </form>
                <br>
                <div class="row">
                    <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-sm-4">
                            <div class="card-deck">
                                <div class="card border-black mb-3 bg-info text-white" style="max-width: 20rem;">
                                    <div class="card-header">
                                        <?php echo e($job->name); ?>

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
                                            <b><?php echo e($job->description); ?></b>
                                        </p>
                                    </div>


                                    <div class="card-footer text-muted ">
                                        <a href="<?php echo e(route('jobs.show', $job->id)); ?>" class="card-link">Citește
                                            mai mult</a>

                                        <span class="badge badge-pill badge-secondary">
                                             <?php echo e($job->company->name); ?>

                                        </span>

                                        <span class="badge badge-pill badge-secondary">
                                             <?php echo e($job->category); ?>

                                        </span>

                                        <span class="badge badge-pill badge-secondary">
                                           <?php echo e($job->job_level); ?>

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
    <?php echo $jobs->appends(['sorter' => $sorter, 'filter' => $filter])->render(); ?>

    <br>
    <?php if(Auth::user()->role == 'Companie'): ?>
        <td>
            <a href="<?php echo e(route('jobs.create')); ?>" class="btn btn-primary">Adaugă un job</a>
        </td>
    <?php endif; ?>
    <div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Alexandra\LicentaStefi\kidlearn\resources\views/jobs/index.blade.php ENDPATH**/ ?>