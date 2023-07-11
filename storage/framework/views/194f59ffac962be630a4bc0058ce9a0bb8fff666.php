
<?php $__env->startSection('container'); ?>
    <div class="mt-3">
        <h3>Riwayat Transaksi</h3>
        <?php if($count[0]->count > 0): ?>
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
                                <td data-th="Total">Rp. <?php echo e(number_format($t->total, 2, ',', '.')); ?></td>
                                <td class="actions">
                                    <a class="btn btn-info" href="<?php echo e(route('transaksi.show', $t->id)); ?>">View</a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div>
                <p>Anda belum pernah melakukan transaksi apapun</p>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Data Kuliah\Semester 6\Web Framework Programming\UAS\New folder\New folder\UASWFP_GENAP2122_ApotekU\resources\views/riwayattransaksi.blade.php ENDPATH**/ ?>