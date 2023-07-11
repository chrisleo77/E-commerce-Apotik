
<?php $__env->startSection('title'); ?>
    Data Pembeli
<?php $__env->stopSection(); ?>
<?php $__env->startSection('container'); ?>
    <?php if(session('status')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="z-index:-1;">
            <?php echo e(session('status')); ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <!-- content -->
    <div>
        <h3>Riwayat Transaksi</h3>
        <p>Kode User: <?php echo e($user[0]->id); ?> | Nama User: <?php echo e($user[0]->name); ?></p>
        <a href="<?php echo e(url()->previous()); ?>" class="btn btn-dark"><i class="fa fa-angle-left"></i> back</a>
        <div class="table-responsive mt-3">
            <div>
                <table id="cart" class="table table-hover table-condensed mt-3">
                    <thead>
                    <tr>
                        <th style="width:45%">Obat</th>
                        <th style="width:15%">Harga</th>
                        <th style="width:8%">Jumlah</th>
                        <th style="width:22%">Subtotal</th>
                        <th style="width:10%"></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $ts = $transactiondata->medicines; ?>
                        <?php $__currentLoopData = $ts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td data-th="Obat">
                                    <div class="row">
                                        <div class="col-sm-3 hidden-xs">
                                            <img src="<?php echo e(asset('images/'.$t->image)); ?>" alt="" width="100" height="100">
                                        </div>
                                        <div class="col-sm-9">
                                            <h5 class="nomargin"> <?php echo e($t->generic_name); ?></h5>
                                        </div>
                                    </div>
                                </td>
                                <td data-th="Harga">Rp. <?php echo e(number_format($t->price,2,",",".")); ?></td>
                                <td data-th="Jumlah"><?php echo e($t->pivot->quantity); ?></td>
                                <td data-th="Subtotal">Rp. <?php echo e(number_format($t->pivot->subtotal,2,",",".")); ?></td>
                                <td class="actions"></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- End of content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Data Kuliah\Semester 6\Web Framework Programming\UAS\New folder\New folder\UASWFP_GENAP2122_ApotekU\resources\views/admin/datapembeli/detailtransaksi.blade.php ENDPATH**/ ?>