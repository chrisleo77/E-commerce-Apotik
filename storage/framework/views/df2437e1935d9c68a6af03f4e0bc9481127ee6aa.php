
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
<div class="container mt-3">
    <div class="row">
        <div class="col-3">
            <img src="<?php echo e(asset('images/'.$medicine->image)); ?>" alt=""
                style="width:100%; height: 250px; border-radius: 10px;">
        </div>
        <div class="col-9 p-3">
            <h3><?php echo e($medicine->generic_name); ?></h3>
            <h6>Rp. <?php echo e(number_format($medicine->price,2,",",".")); ?></h6>
            <button class="btn btn-dark mt-3 mb-3"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Tambah ke
                keranjang</button>
            <p><?php echo e($medicine->description); ?>

            </p>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Data Kuliah\Semester 6\Web Framework Programming\UAS\UASWFP_GENAP2122_ApotekU\resources\views/detail.blade.php ENDPATH**/ ?>