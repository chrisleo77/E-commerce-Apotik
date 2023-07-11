
<?php $__env->startSection('title'); ?>
Data Kategori Obat
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
<div class="alert alert-success" id="pesan" style="display:none;">
</div>
<!-- content -->
<div class="table-responsive">
    <div>
        <button type="button" class="btn btn-success btn-tambah" data-toggle="modal" data-target="#AddCategoryModal">
            <i class="fa fa-plus"></i> Tambah Kategori Obat
        </button>
        <table class="table table-hover mt-3">
            <thead class="thead-color">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $listCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $li): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr id="tr_<?php echo e($li->id); ?>">
                    <td><?php echo e($li->id); ?></td>
                    <td id="td-name-<?php echo e($li->id); ?>"><?php echo e($li->name); ?></td>
                    <td id="td-description-<?php echo e($li->id); ?>"><?php echo e($li->description); ?></td>
                    <td>
                        <a href="#modalEdit" data-target="#modalEdit" data-toggle='modal' class="btn btn-success" onclick="getEditForm(<?php echo e($li->id); ?>)"><i class="fa fa-edit"></i> Ubah</a>
                        
                        <a class="btn btn-danger" onclick="if(confirm('Are you sure to delete this record?')) deleteDataRemoveTR(<?php echo e($li->id); ?>)"><i class="fa fa-trash"></i> Delete</a>
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
<!-- Modal -->
<!-- modal insert -->
<div class="modal fade" id="AddCategoryModal" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="<?php echo e(route('kategoriobat.store')); ?>">
                <div class="modal-body">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="InputGenericName">Category Name</label>
                        <input type="text" class="form-control" name="namaCategory" placeholder="Enter Category Name">
                    </div>
                    <div class="form-group">
                        <label for="InputForm">Description</label>
                        <textarea class="form-control" id="InputDescription" name="deskripsiCategory" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark">Submit</button>
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- modal edit -->
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
                url: "<?php echo e(route('kategoriobat.getEditForm')); ?>",
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
            var eDescription = $('#eDescription').val();
            
            $.ajax({
                type: 'POST',
                url: "<?php echo e(route('kategoriobat.saveData')); ?>",
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': id,
                    'name': eName,
                    'description': eDescription
                },
                success: function(data) {
                    if (data.status == "oke") {

                        $('#td-name-' + id).html(eName);
                        $('#td-description-' + id).html(eDescription);
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

        function deleteDataRemoveTR(id) {
            $.ajax({
                type: 'POST',
                url: "<?php echo e(route('kategoriobat.deleteData')); ?>",
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': id
                },
                success: function(data) {
                    if (data.status == "oke") {
                        alert(data.msg);
                        $('#tr_' + id).remove();
                    } else {
                        alert(data.msg);
                    }
                }
            });
        }

        
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Data Kuliah\Semester 6\Web Framework Programming\UAS\New folder\New folder\UASWFP_GENAP2122_ApotekU\resources\views/admin/kategoriobat/index.blade.php ENDPATH**/ ?>