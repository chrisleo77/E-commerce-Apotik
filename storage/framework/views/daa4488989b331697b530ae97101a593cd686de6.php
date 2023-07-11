
<?php $__env->startSection('title'); ?>
Dashboard
<?php $__env->stopSection(); ?>
<?php $__env->startSection('user'); ?>
<p class="pl-2">Hi, Andi</p>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('container'); ?>
<!-- Content -->
<div>
    <!-- Summary Data -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                  <h6 class="card-title">Total Obat</h6>
                  <hr>
                  <h3><?php echo e($TotalMedicines); ?></h3>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                  <h6 class="card-title">Total Kategori Obat</h6>
                  <hr>
                  <h3><?php echo e($TotalCategories); ?></h3>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                  <h6 class="card-title">Total Transaksi</h6>
                  <hr>
                  <h3>0</h3>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card" style="z-index: -1;">
                <div class="card-body">
                  <h6 class="card-title">Total User</h6>
                  <hr>
                  <h3><?php echo e($TotalUsers[0]->TotalUsers); ?></h3>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Summary Data -->
    <br>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Sukses menambah data.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Gagal menambah data.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Launch demo modal
    </button>
</div>
<!-- End of Content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('modal'); ?>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
    <div class="modal-dialog" role="document">
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
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\ProgramFiles\ProgramSSD\xampp\htdocs\WFP\UASWFP_GENAP2122_ApotekU\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>