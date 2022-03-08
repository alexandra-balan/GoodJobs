<?php $__env->startSection('main'); ?>
    <div><?php if(session()->get('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session()->get('success')); ?>

            </div>
        <?php endif; ?></div>
    <div class="row">
        <div class="col-sm-12">

            <h1 class="display-3">Candidati</h1>

            <form method="GET" action="<?php echo e(route('candidates.index')); ?>" class="row">
                <?php echo e(csrf_field()); ?>

                <div class="form-group col-sm-3">

                    <select class="form-control" name="filter">
                        <option value="" selected disabled hidden>Alege aici</option>
                        <option value="AscendentNume">A-Z</option>
                        <option value="DescendentNume">Z-A</option>
                    </select>
                </div>
                <button type="submit" onsubmit="sorting()" class="btn btn-primary">Sortează</button>
            </form>
            <br>
            <table class="table table-hover">
                <thead>
                <tr class="table-primary">
                    <td>Nume</td>
                    <td colspan=4></td>
                </tr>
                </thead>
                <tbody>
                <div class="container">


                    <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(Auth::user()->role == 'Candidat'): ?>
                            <tr class="table-active">
                                <td><?php echo e($student->name); ?> </td>

                                <?php if(Auth::user()->id == $student->user_id): ?>
                                    <td>
                                        <a href="<?php echo e(route('showCandidate')); ?>" class="btn btn-primary">Vezi CV</a>
                                    </td>
                                <?php else: ?>
                                    <td></td>
                                <?php endif; ?>
                            </tr>
                        <?php endif; ?>
                        <?php if(Auth::user()->role == 'Companie' || Auth::user()->role == 'Administrator'): ?>
                            <tr class="table-active">
                                <td><?php echo e($student->name); ?> </td>

                                <td>
                                    <?php if(isset($jobId)): ?>
                                        <a href="<?php echo e(route('cvCandidate2',['id' => $student->id,'jobId' => $jobId])); ?>" class="btn btn-primary">Vezi
                                            CV</a>
                                    <?php else: ?>
                                    <a href="<?php echo e(route('cvCandidate',$student->id)); ?>" class="btn btn-primary">Vezi
                                        CV</a>
                                    <?php endif; ?>
                                </td>
                            </tr>

                        <?php endif; ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                </tbody>
            </table>

            <?php echo $students->appends(['filter' => $filter])->render(); ?>

            <div>
            </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Alexandra\LicentaStefi\kidlearn\resources\views/candidates/index.blade.php ENDPATH**/ ?>