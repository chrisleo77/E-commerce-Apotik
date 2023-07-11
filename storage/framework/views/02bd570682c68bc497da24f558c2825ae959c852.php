<form method="POST" action="<?php echo e(route('user.update', $dataUser->id)); ?>">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="form-group">
            <label for="InputGenericName">Name</label>
            <input type="text"  class="form-control"  id="eName" name="name" placeholder="Enter Name" value="<?php echo e($dataUser->name); ?>">
        </div>
        <div class="form-group">
            <label for="InputGenericName">Address</label>
            <input type="text"  class="form-control"  id="eAddress" name="address" placeholder="Enter Address" value="<?php echo e($dataUser->address); ?>">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" onclick="saveDataUpdateTD(<?php echo e($dataUser->id); ?>)" data-dismiss="modal" class="btn btn-dark">Edit</button>
        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancel</button>
    </div>
</form><?php /**PATH D:\Data Kuliah\Semester 6\Web Framework Programming\UAS\New folder\New folder\UASWFP_GENAP2122_ApotekU\resources\views/admin/datapembeli/getEditForm.blade.php ENDPATH**/ ?>