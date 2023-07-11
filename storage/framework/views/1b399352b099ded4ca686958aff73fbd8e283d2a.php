
<?php $__env->startSection('container'); ?>
<br>
    <a href="<?php echo e(url('/')); ?>" class="btn"><i class="fa fa-angle-left"></i> back to home</a>
    <?php if(session('status')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo e(session('status')); ?>

            <button type="button" id="btnclose" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <script>
                setTimeout(function() {
                    document.querySelector("#btnclose").click();
                }, 2000);
            </script>
        </div>
    <?php endif; ?>
    <div class="container mt-3">
        <div class="row">
            <div class="col-3">
                <img src="<?php echo e(asset('images/' . $medicine->image)); ?>" alt=""
                    style="width:100%; height: 250px; border-radius: 10px;">
            </div>
            <div class="col-9 p-3">
                <h3><?php echo e($medicine->generic_name); ?></h3>
                <h6>Rp. <?php echo e(number_format($medicine->price, 2, ',', '.')); ?></h6>
                <p class="btn-holder"><a href="<?php echo e(url('add-to-cart/' . $medicine->id)); ?>" class="btn btn-dark mt-3 mb-3"
                        role="button"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Tambah ke keranjang</a> </p>
                <p><?php echo e($medicine->description); ?></p>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Data Kuliah\Semester 6\Web Framework Programming\UAS\New folder\New folder\UASWFP_GENAP2122_ApotekU\resources\views/detail.blade.php ENDPATH**/ ?>