
<?php $__env->startSection('container'); ?>
<h5 class="mt-3">Semua Produk</h5>
<div class="container">
    <div class="row mt-3">
        <?php $__currentLoopData = $listMedicines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $li): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-xs-18 col-sm-6 col-md-3 text-center">
            <div class="thumbnail">
                <a href="<?php echo e(url('obat/'.$li->id)); ?>" class="text-dark text-decoration-none">
                    <img src="<?php echo e(asset('images/'.$li->image)); ?>" alt="" style="width:100%; height: 230px; border-radius: 10px;">
                    <div class="caption p-3">
                        <h5><?php echo e($li->generic_name); ?></h5>
                        <p>Rp. <?php echo e(number_format($li->price,2,",",".")); ?></p>
                    </div>
                </a>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Data Kuliah\Semester 6\Web Framework Programming\UAS\New folder\New folder\UASWFP_GENAP2122_ApotekU\resources\views/index.blade.php ENDPATH**/ ?>