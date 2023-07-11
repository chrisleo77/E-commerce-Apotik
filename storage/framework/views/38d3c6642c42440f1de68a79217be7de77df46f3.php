
<?php $__env->startSection('title'); ?>
Dashboard
<?php $__env->stopSection(); ?>
<?php $__env->startSection('user'); ?>
<p class="pl-2">Hi, Andi</p>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('container'); ?>
<!-- Content -->
<div>
    <!-- Summary Data -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                  <h6 class="card-title">Total Obat</h6>
                  <hr>
                  <h3><?php echo e($TotalMedicines); ?></h3>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                  <h6 class="card-title">Total Kategori Obat</h6>
                  <hr>
                  <h3><?php echo e($TotalCategories); ?></h3>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                  <h6 class="card-title">Total Transaksi</h6>
                  <hr>
                  <h3><?php echo e($TotalTransactions); ?></h3>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card" style="z-index: -1;">
                <div class="card-body">
                  <h6 class="card-title">Total User</h6>
                  <hr>
                  <h3><?php echo e($TotalUsers[0]->TotalUsers); ?></h3>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Summary Data -->
    <br>
</div>
<!-- End of Content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Data Kuliah\Semester 6\Web Framework Programming\UAS\New folder\New folder\UASWFP_GENAP2122_ApotekU\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>