<form method="POST" action="<?php echo e(route('kategoriobat.update', $dataCategory->id)); ?>">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="form-group">
            <label for="InputGenericName">Category Name</label>
            <input type="text"  class="form-control"  id="eName" name="namaCategory" placeholder="Enter Category Name" value="<?php echo e($dataCategory->name); ?>">
        </div>
        <div class="form-group">
            <label for="InputForm">Description</label>
            <textarea class="form-control" id="eDescription" name="deskripsiCategory" rows="3"><?php echo e($dataCategory->description); ?></textarea>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" onclick="saveDataUpdateTD(<?php echo e($dataCategory->id); ?>)" data-dismiss="modal" class="btn btn-dark">Edit</button>
        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancel</button>
    </div>
</form><?php /**PATH D:\Data Kuliah\Semester 6\Web Framework Programming\UAS\New folder\New folder\UASWFP_GENAP2122_ApotekU\resources\views/admin/kategoriobat/getEditForm.blade.php ENDPATH**/ ?>