
<?php $__env->startSection('title'); ?>
Data Kategori Obat
<?php $__env->stopSection(); ?>
<?php $__env->startSection('user'); ?>
<p class="pl-2">Hi, Andi</p>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('container'); ?>
    <!-- content -->
    <div class="table-responsive">
        <div>
            <button type="button" class="btn btn-success btn-tambah" data-toggle="modal" data-target="#exampleModal">
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
                    <tr>
                        <td><?php echo e($li->id); ?></td>
                        <td><?php echo e($li->name); ?></td>
                        <td><?php echo e($li->description); ?></td>
                        <td>
                            <a class="btn btn-success" href=""><i class="fa fa-edit"></i> Ubah</a>
                            <a class="btn btn-danger" href=""><i class="fa fa-trash"></i> Hapus</a>
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
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog " role="document">
            <!-- modal-lg -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="Enter email">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark">Submit</button>
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End of modal -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Data Kuliah\Semester 6\Web Framework Programming\UAS\UASWFP_GENAP2122_ApotekU\resources\views/admin/kategoriobat/index.blade.php ENDPATH**/ ?>