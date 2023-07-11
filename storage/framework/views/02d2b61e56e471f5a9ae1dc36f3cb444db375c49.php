
<?php $__env->startSection('title'); ?>
    Report
<?php $__env->stopSection(); ?>
<?php $__env->startSection('container'); ?>
    <h5>5 data Obat terlaris dari data-data transaksi Anda</h5>
    <!-- content -->
    <div>
        <?php if(!empty($rTop5Medicine)): ?>
            <div class="table-responsive">
                <table class="table table-hover mt-3" style="font-size: 12px;">
                    <thead class="thead-color">
                        <tr>
                            <th>ID</th>
                            <th>Nama Obat</th>
                            <th>Harga</th>
                            <th>Jumlah Terjual</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $__currentLoopData = $rTop5Medicine; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($r->id); ?></td>
                                <td><?php echo e($r->generic_name); ?></td>
                                <td><?php echo e($r->price); ?></td>
                                <td><?php echo e($r->jumlahterjual); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <h5 class="mt-3"> - Belum ada data</h5>
        <?php endif; ?>
    </div>
    <br>
    <h5>3 data Customer yang paling banyak berbelanja dari sisi nominal pembelian</h5>
    <!-- content -->
    <div>
        <?php if(!empty($rTop3BuyerCustomer)): ?>
            <div class="table-responsive">
                <table class="table table-hover mt-3" style="font-size: 12px;">
                    <thead class="thead-color">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Nominal pembelian</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $rTop3BuyerCustomer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($r->id); ?></td>
                                <td><?php echo e($r->name); ?></td>
                                <td><?php echo e($r->address); ?></td>
                                <td><?php echo e($r->email); ?></td>
                                <td>Rp. <?php echo e(number_format($r->nominalpembelian, 2, ',', '.')); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <h5 class="mt-3">- Belum ada data</h5>
        <?php endif; ?>
    </div>
    <!-- End of content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Data Kuliah\Semester 6\Web Framework Programming\UAS\New folder\New folder\UASWFP_GENAP2122_ApotekU\resources\views/admin/report/index.blade.php ENDPATH**/ ?>