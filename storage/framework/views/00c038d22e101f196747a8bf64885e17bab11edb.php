<?php $__env->startSection('main'); ?>
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Adauga un job</h1>
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
                <form method="post" action="<?php echo e(route('jobs.store')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">

                        <label for="name">Nume</label>
                        <input type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>"/>

                        <label for="category">Categorie :</label>
                        <select class="form-control" name="category">
                            <option value="" selected disabled hidden>Alege aici</option>
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

                        <label for="description">Descriere</label>
                        <textarea class="form-control" name="description" rows="6"><?php echo e(old('description')); ?></textarea>

                        <label for="requirements">Cerinte</label>
                        <textarea class="form-control" name="requirements" rows="6"><?php echo e(old('requirements')); ?></textarea>

                        <label for="responsibilities">Responsabilitati</label>
                        <textarea class="form-control" name="responsibilities" rows="6"><?php echo e(old('responsibilities')); ?></textarea>

                        <label for="job_city">Oras</label>
                        <input type="text" class="form-control" name="job_city" value="<?php echo e(old('job_city')); ?>"/>

                        <label for="expiration_date">Data </label>
                        <input type="date" class="form-control" name="expiration_date" value="<?php echo e(old('expiration_date')); ?>"/>

                        <label for="job_level">Nivel :</label>
                        <select class="form-control" name="job_level">
                        <option value="" selected disabled hidden>Alege aici</option>
                        <option value="Junior">Junior</option>
                        <option value="Middle">Middle</option>
                        <option value="Senior">Senior</option>
                        </select>
                    </div>

                    <label for="details">Alte detalii</label>
                    <textarea class="form-control" name="details" rows="6"><?php echo e(old('details')); ?></textarea>



                    <button type="submit" class="btn btn-primary">Salvează datele</button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Alexandra\LicentaStefi\kidlearn\resources\views/jobs/create.blade.php ENDPATH**/ ?>