<form method="POST" action="<?php echo e(route('obat.update', $dataMedicine->id)); ?>">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Medicine</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="form-group">
            <label for="InputGenericName">Generic Name</label>
            <input type="text" class="form-control" id="eGenericName" value="<?php echo e($dataMedicine->generic_name); ?>"
                name="generic_name" placeholder="Enter Generic Name">
        </div>
        <div class="form-group">
            <label for="InputForm">Form</label>
            <input type="text" class="form-control" id="eForm" value="<?php echo e($dataMedicine->form); ?>" name="form"
                placeholder="Enter Form">
        </div>
        <div class="form-group">
            <label for="InputRestricitonFormula">Restriction Formula</label>
            <input type="text" class="form-control" id="eResForm" value="<?php echo e($dataMedicine->restriction_formula); ?>"
                name="restricition_formula" placeholder="Enter Restriction Formula">
        </div>
        <div class="form-group">
            <label for="InputPrice">Price</label>
            <input type="text" class="form-control" id="ePrice" value="<?php echo e($dataMedicine->price); ?>" name="price"
                placeholder="Enter Price">
        </div>
        <div class="form-group">
            <label for="InputDescription">Description</label>
            <textarea class="form-control" id="eDesc" value="<?php echo e($dataMedicine->description); ?>" name="description" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="InputFaskesTK1">Faskes TK1</label>
            <select name="faskes1" id="eF1" class="form-control">
                <option value="0" <?php echo e($dataMedicine->faskes_tk1 == 0 ? 'selected' : ''); ?>>Tidak</option>
                <option value="1" <?php echo e($dataMedicine->faskes_tk1 == 1 ? 'selected' : ''); ?>>Ya</option>
            </select>
        </div>
        <div class="form-group">
            <label for="InputFaskesTK2">Faskes TK2</label>
            <select name="faskes2" id="eF2" class="form-control">
                <?php if($dataMedicine->faskes_tk2 == 0): ?>
                    <option value="0" selected>Tidak</option>
                    <option value="1">Ya</option>
                <?php else: ?>
                    <option value="0">Tidak</option>
                    <option value="1" selected>Ya</option>
                <?php endif; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="InputFaskesTK3">Faskes TK3</label>
            <select name="faskes3" id="eF3" class="form-control">
                <?php if($dataMedicine->faskes_tk3 == 0): ?>
                    <option value="0" selected>Tidak</option>
                    <option value="1">Ya</option>
                <?php else: ?>
                    <option value="0">Tidak</option>
                    <option value="1" selected>Ya</option>
                <?php endif; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="InputCategory">Category</label>
            <select name="category" id="eCategory" class="form-control">
                <option>Select Category</option>
                <?php $__currentLoopData = $listCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($dataMedicine->category_id == $c->id): ?>
                        <option value="<?php echo e($c->id); ?>" selected><?php echo e($c->name); ?></option>
                    <?php else: ?>
                        <option value="<?php echo e($c->id); ?>"><?php echo e($c->name); ?></option>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" onclick="saveDataUpdateTD(<?php echo e($dataMedicine->id); ?>)" data-dismiss="modal"
            class="btn btn-dark">Edit</button>
        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancel</button>
    </div>
</form>
<?php /**PATH D:\Data Kuliah\Semester 6\Web Framework Programming\UAS\UASWFP_GENAP2122_ApotekU\resources\views/admin/obat/getEditForm.blade.php ENDPATH**/ ?>