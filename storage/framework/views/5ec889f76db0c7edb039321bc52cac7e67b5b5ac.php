
<?php $__env->startSection('cart'); ?>
<div class="row total-header-section">
    <div class="col-lg-6 col-sm-6 col-6">
        <i class="fa fa-shopping-cart" aria-hidden="true"></i><span
            class="badge badge-pill badge-danger"></span>
    </div>
    <div class="col-lg-6 col-sm-6 col-6 total-section text-right">

        <p>Total: <span class="text-info">1</span></p>
    </div>
</div>
<div class="row cart-detail">
    <div class="col-lg-3 col-sm-3 col-3 cart-detail-img">
        <img src="https://picsum.photos/50/70" width="60" height="60">
    </div>
    <div class="col-lg-9 col-sm-9 col-9 cart-detail-product">
        <p>Name</p>
        <span class="price text-info">Rp. 10.000</span><span class="count"
            style="float:right;">10x</span>
    </div>
</div>
<hr>
<div class="row cart-detail">
    <div class="col-lg-3 col-sm-3 col-3 cart-detail-img">
        <img src="https://picsum.photos/50/70" width="60" height="60">
    </div>
    <div class="col-lg-9 col-sm-9 col-9 cart-detail-product">
        <p>Name</p>
        <span class="price text-info">Rp. 10.000</span><span class="count"
            style="float:right;">10x</span>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
        <a href="" class="btn btn-primary btn-block">Lihat Semuanya</a>
    </div>
</div>
<?php $__env->stopSection(); ?>
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
<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Data Kuliah\Semester 6\Web Framework Programming\UAS\UASWFP_GENAP2122_ApotekU\resources\views/index.blade.php ENDPATH**/ ?>