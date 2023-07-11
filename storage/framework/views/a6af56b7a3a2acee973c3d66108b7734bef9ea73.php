
<?php $__env->startSection('container'); ?>
<div class="mt-3">
    <h3>Keranjang</h3>
    <div>
        <table id="cart" class="table table-hover table-condensed">
            <thead>
            <tr>
                <th style="width:45%">Product</th>
                <th style="width:15%">Price</th>
                <th style="width:5%">Quantity</th>
                <th style="width:20%" class="text-center">Subtotal</th>
                <th style="width:15%"></th>
            </tr>
            </thead>
            <tbody>
            <?php $total = 0 ?>
            <?php if(session('cart')): ?>
                <?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $total += $details['price'] * $details['quantity'] ?>
                    <tr>
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-3 hidden-xs"><img src="<?php echo e(asset('images/'.$details['photo'])); ?>" alt="..." class="img-responsive" width="100" height="100"/></div>
                                <div class="col-sm-9">
                                    <p class="nomargin"><?php echo e($details['name']); ?></p>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">Rp. <?php echo e(number_format($details['price'], 2, ',', '.')); ?></td>
                        <td data-th="Quantity">
                            <?php echo e($details['quantity']); ?>

                            
                        </td>
                        <td data-th="Subtotal" class="text-center">Rp. <?php echo e(number_format($details['price'] * $details['quantity'], 2, ',', '.')); ?></td>
                        <td class="actions" data-th="">
                            <a href="<?php echo e(url('remove-cart-item/'.$id)); ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            </tbody>
            <tfoot>
            <tr class="visible-xs">
                <td class="text-center"><strong>Total Rp.<?php echo e(number_format($total, 2, ',', '.')); ?></strong></td>
            </tr>
            <tr>
                <td><a href="<?php echo e(url('/')); ?>" class="btn btn-dark"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                <td colspan="2" class="hidden-xs"></td>
                <td class="hidden-xs text-center"><strong>Total Rp. <?php echo e(number_format($total, 2, ',', '.')); ?></strong></td>
                <td><a href="<?php echo e(url('/checkout')); ?>" class="btn btn-dark">Checkout <i class="fa fa-angle-right"></i></a></td>
            </tr>
            </tfoot>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Data Kuliah\Semester 6\Web Framework Programming\UAS\New folder\New folder\UASWFP_GENAP2122_ApotekU\resources\views/cart/cart.blade.php ENDPATH**/ ?>