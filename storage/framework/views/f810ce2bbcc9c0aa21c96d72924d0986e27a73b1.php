<?php $__env->startSection('main'); ?>
    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-3">Raport semestrial</h1>
            <br> <br>
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>An</td>
                    <td>Serie</td>
                    <td>Nume</td>
                    <td>Medie sem. 1</td>
                    <td>Medie sem. 2</td>


                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>

                        <td><?php echo e($report['year']); ?> </td>
                        <td><?php echo e($report['label']); ?></td>
                        <td><?php echo e($report['name']); ?></td>
                        <td><?php echo e($report['avg1']); ?></td>
                        <td><?php echo e($report['avg2']); ?></td>

                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\TestLaravel\kidlearn\resources\views/studentClasses/semiAnnualReport.blade.php ENDPATH**/ ?>