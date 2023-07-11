<form method="POST" action="{{ route('obat.update', $dataMedicine->id) }}">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Medicine</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="InputGenericName">Generic Name</label>
            <input type="text" class="form-control" id="eGenericName" value="{{ $dataMedicine->generic_name }}"
                name="generic_name" placeholder="Enter Generic Name">
        </div>
        <div class="form-group">
            <label for="InputForm">Form</label>
            <input type="text" class="form-control" id="eForm" value="{{ $dataMedicine->form }}" name="form"
                placeholder="Enter Form">
        </div>
        <div class="form-group">
            <label for="InputRestricitonFormula">Restriction Formula</label>
            <input type="text" class="form-control" id="eResForm" value="{{ $dataMedicine->restriction_formula }}"
                name="restricition_formula" placeholder="Enter Restriction Formula">
        </div>
        <div class="form-group">
            <label for="InputPrice">Price</label>
            <input type="text" class="form-control" id="ePrice" value="{{ $dataMedicine->price }}" name="price"
                placeholder="Enter Price">
        </div>
        <div class="form-group">
            <label for="InputDescription">Description</label>
            <textarea class="form-control" id="eDesc" name="description" rows="3">{{ $dataMedicine->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="InputFaskesTK1">Faskes TK1</label>
            <select name="faskes1" id="eF1" class="form-control">
                <option value="0" {{ $dataMedicine->faskes_tk1 == 0 ? 'selected' : '' }}>Tidak</option>
                <option value="1" {{ $dataMedicine->faskes_tk1 == 1 ? 'selected' : '' }}>Ya</option>
            </select>
        </div>
        <div class="form-group">
            <label for="InputFaskesTK2">Faskes TK2</label>
            <select name="faskes2" id="eF2" class="form-control">
                @if ($dataMedicine->faskes_tk2 == 0)
                    <option value="0" selected>Tidak</option>
                    <option value="1">Ya</option>
                @else
                    <option value="0">Tidak</option>
                    <option value="1" selected>Ya</option>
                @endif
            </select>
        </div>
        <div class="form-group">
            <label for="InputFaskesTK3">Faskes TK3</label>
            <select name="faskes3" id="eF3" class="form-control">
                @if ($dataMedicine->faskes_tk3 == 0)
                    <option value="0" selected>Tidak</option>
                    <option value="1">Ya</option>
                @else
                    <option value="0">Tidak</option>
                    <option value="1" selected>Ya</option>
                @endif
            </select>
        </div>
        <div class="form-group">
            <label for="InputCategory">Category</label>
            <select name="category" id="eCategory" class="form-control">
                <option>Select Category</option>
                @foreach ($listCategories as $c)
                    @if ($dataMedicine->category_id == $c->id)
                        <option value="{{ $c->id }}" selected>{{ $c->name }}</option>
                    @else
                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" onclick="saveDataUpdateTD({{ $dataMedicine->id }})" data-dismiss="modal"
            class="btn btn-dark">Edit</button>
        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancel</button>
    </div>
</form>
