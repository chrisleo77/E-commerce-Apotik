
<?php $__env->startSection('container'); ?>
<div class="mt-3">
    <a href="<?php echo e(url()->previous()); ?>" class="btn"><i class="fa fa-angle-left"></i> back</a>
    <h3 class="mt-3">Pemesanan dari transaksi kode: <?php echo e($transactiondata->id); ?></h3>
    <h5>Tanggal Pemesanan: <?php echo e($transactiondata->transaction_date); ?></h5>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Data Kuliah\Semester 6\Web Framework Programming\UAS\New folder\New folder\UASWFP_GENAP2122_ApotekU\resources\views/transaksi/detailtransaksi.blade.php ENDPATH**/ ?>