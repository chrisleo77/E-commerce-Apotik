
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
        <a href="<?php echo e(url('admin/datapembeli')); ?>" class="btn btn-dark"><i class="fa fa-angle-left"></i> back</a>
        <?php if($count[0]->count > 0): ?>
        <div class="table-responsive mt-3">
            <div>
                <table id="cart" class="table table-hover table-condensed">
                    <thead>
                    <tr>
                        <th style="width:10%">Kode</th>
                        <th style="width:50%">Waktu Transaksi</th>
                        <th style="width:30%">Total</th>
                        <th style="width:10%"></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $listtransactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td data-th="Kode"><?php echo e($t->id); ?></td>
                                <td data-th="Waktu"><?php echo e($t->transaction_date); ?></td>
                                <td data-th="Total">Rp. <?php echo e(number_format($t->total,2,",",".")); ?></td>
                                <td class="actions">
                                    <a class="btn btn-info" href="<?php echo e(url('admin/riwayattransaksi/detail',$t->id)); ?>">View</a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <?php else: ?> 
            <div class="mt-3">
                <p>User belum pernah melakukan transaksi apapun</p>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <!-- End of content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Data Kuliah\Semester 6\Web Framework Programming\UAS\New folder\New folder\UASWFP_GENAP2122_ApotekU\resources\views/admin/datapembeli/riwayattransaksi.blade.php ENDPATH**/ ?>