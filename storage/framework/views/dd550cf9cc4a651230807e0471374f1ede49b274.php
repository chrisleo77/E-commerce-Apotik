
<?php $__env->startSection('title'); ?>
    Data Pembeli
<?php $__env->stopSection(); ?>
<?php $__env->startSection('container'); ?>
    <div class="alert alert-success" id="pesan" style="display:none;">
    </div>
    <!-- content -->
    <div>
        <div class="table-responsive">
            <table class="table table-hover mt-3" style="font-size: 12px;">
                <thead class="thead-color">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Riwayat pembelian</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $listpembeli; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $li): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr id="tr_<?php echo e($li->id); ?>">
                        <td><?php echo e($li->id); ?></td>
                        <td id="td-name-<?php echo e($li->id); ?>"><?php echo e($li->name); ?></td>
                        <td id="td-address-<?php echo e($li->id); ?>"><?php echo e($li->address); ?></td>
                        <td><?php echo e($li->email); ?></td>
                        <td>
                            <a href="#modalEdit" data-target="#modalEdit" data-toggle='modal' class="btn btn-success" onclick="getEditForm(<?php echo e($li->id); ?>)"><i class="fa fa-edit"></i> Ubah</a>
                            <a class="btn btn-info" href="<?php echo e(url('admin/riwayattransaksi/'.$li->id)); ?>">Lihat Riwayat Pembelian</a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- End of content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('modal'); ?>
<!-- Modal Edit -->
    <div class="modal fade" id="modalEdit" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="modalContent">
                <div style="padding: 10px; text-align: center;">
                    <div class="spinner-border text-secondary" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- End of modal -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        function getEditForm(id) {
            $.ajax({
                type: 'POST',
                url: "<?php echo e(route('user.getEditForm')); ?>",
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': id
                },
                success: function(data) {
                    $('#modalContent').html(data.msg);
                }
            });
        }

        function saveDataUpdateTD(id) {
            var eName = $('#eName').val();
            var eAddress = $('#eAddress').val();
            
            $.ajax({
                type: 'POST',
                url: "<?php echo e(route('user.saveData')); ?>",
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': id,
                    'name': eName,
                    'address': eAddress
                },
                success: function(data) {
                    if (data.status == "oke") {
                        $('#td-name-' + id).html(eName);
                        $('#td-address-' + id).html(eAddress);
                        alert(data.msg);
                        $('#pesan').show();
                        $('#pesan').html(data.msg);

                        setTimeout(function() {
                            $('#pesan').delay(1000).hide('500');
                        }, 2000);
                    }
                }
            });
        }
        
        
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Data Kuliah\Semester 6\Web Framework Programming\UAS\New folder\New folder\UASWFP_GENAP2122_ApotekU\resources\views/admin/datapembeli/index.blade.php ENDPATH**/ ?>