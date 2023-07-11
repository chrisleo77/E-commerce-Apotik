@extends('layouts.admin')
@section('title')
    Data Obat
@endsection
@section('container')
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="z-index:-1;">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="alert alert-success" id="pesan" style="display:none;">
    </div>
    <!-- content -->
    <div>
        <button type="button" class="btn btn-success btn-tambah" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-plus"></i> Tambah Obat
        </button>
        <div class="table-responsive">
            <table class="table table-hover mt-3" style="font-size: 12px;">
                <thead class="thead-color">
                    <tr>
                        <th>ID</th>
                        <th>Generic Name</th>
                        <th>Form</th>
                        <th>Restriction Formula</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Faskes tk1</th>
                        <th>Faskes tk2</th>
                        <th>Faskes tk3</th>
                        <th>Category ID</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listMedicines as $li)
                        <tr id="tr_{{ $li->id }}">
                            <td>{{ $li->id }}</td>
                            <td id="td-generic_name-{{ $li->id }}">{{ $li->generic_name }}</td>
                            <td id="td-form-{{ $li->id }}">{{ $li->form }}</td>
                            <td id="td-restriction_formula-{{ $li->id }}">{{ $li->restriction_formula }}</td>
                            <td id="td-price-{{ $li->id }}">{{ $li->price }}</td>
                            <td id="td-description-{{ $li->id }}">{{ $li->description }}</td>
                            <td><img src="{{ asset('images/' . $li->image) }}" alt="" height='200'></td>
                            <td id="td-faskes_tk1-{{ $li->id }}">{{ $li->faskes_tk1 }}</td>
                            <td id="td-faskes_tk2-{{ $li->id }}">{{ $li->faskes_tk2 }}</td>
                            <td id="td-faskes_tk3-{{ $li->id }}">{{ $li->faskes_tk3 }}</td>
                            <td id="td_category_{{ $li->id }}">{{ $li->category_id }}</td>

                            {{-- <td>{{ $li->id }}</th>
                            <td>{{ $li->generic_name }}</td>
                            <td>{{ $li->form }}</td>
                            <td>{{ $li->restriction_formula }}</td>
                            <td>{{ $li->price }}</td>
                            <td>{{ $li->description }}</td>
                            <td><img src="{{ asset('images/' . $li->image) }}" alt="" height='200'></td>
                            <td>{{ $li->faskes_tk1 }}</td>
                            <td>{{ $li->faskes_tk2 }}</td>
                            <td>{{ $li->faskes_tk3 }}</td>
                            <td>{{ $li->category_id }}</td> --}}
                            <td>
                                <a href="#modalEdit" data-target="#modalEdit" data-toggle='modal' class="btn btn-success"
                                    onclick="getEditForm({{ $li->id }})"><i class="fa fa-edit"></i> Ubah</a>
                                {{-- <a class="btn btn-danger" href=""><i class="fa fa-trash"></i> Hapus</a> --}}
                                <a class="btn btn-danger"
                                onclick="if(confirm('Are you sure to delete this record?')) deleteDataRemoveTR({{ $li->id }})"><i class="fa fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- End of content -->
@endsection
@section('modal')
    {{-- Modal Form --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Medicine</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form enctype="multipart/form-data" method="POST" action="{{ route('obat.store') }}">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="InputGenericName">Generic Name</label>
                            <input type="text" class="form-control" id="InputGenericName" name="generic_name"
                                placeholder="Enter Generic Name">
                        </div>
                        <div class="form-group">
                            <label for="InputForm">Form</label>
                            <input type="text" class="form-control" id="InputForm" name="form" placeholder="Enter Form">
                        </div>
                        <div class="form-group">
                            <label for="InputRestricitonFormula">Restriction Formula</label>
                            <input type="text" class="form-control" id="InputRestricitonFormula"
                                name="restricition_formula" placeholder="Enter Restriction Formula">
                        </div>
                        <div class="form-group">
                            <label for="InputPrice">Price</label>
                            <input type="text" class="form-control" id="InputPrice" name="price"
                                placeholder="Enter Price">
                        </div>
                        <div class="form-group">
                            <label for="InputDescription">Description</label>
                            <textarea class="form-control" id="InputDescription" name="description" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                        <div class="form-group">
                            <label for="InputFaskesTK1">Faskes TK1</label>
                            <select name="faskes1" class="form-control">
                                <option value="0">Tidak</option>
                                <option value="1">Ya</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="InputFaskesTK2">Faskes TK2</label>
                            <select name="faskes2" class="form-control">
                                <option value="0">Tidak</option>
                                <option value="1">Ya</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="InputFaskesTK3">Faskes TK3</label>
                            <select name="faskes3" class="form-control">
                                <option value="0">Tidak</option>
                                <option value="1">Ya</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="InputCategory">Category</label>
                            <select name="category" class="form-control">
                                <option>Select Category</option>
                                @foreach ($listCategories as $c)
                                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                                @endforeach
                            </select>
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
    {{-- Modal Edit --}}
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
@endsection
@section('scripts')
    <script>
        function getEditForm(id) {
            $.ajax({
                type: 'POST',
                url: "{{ route('obat.getEditForm') }}",
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
            var eGenericName = $('#eGenericName').val();
            var eForm = $('#eForm').val();
            var eResForm = $('#eResForm').val();
            var ePrice = $('#ePrice').val();
            var eDesc = $('#eDesc').val();
            var eF1 = $('#eF1').val();
            var eF2 = $('#eF2').val();
            var eF3 = $('#eF3').val();
            var eCategory = $('#eCategory').val();


            $.ajax({
                type: 'POST',
                url: "{{ route('obat.saveData') }}",
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': id,
                    'generic_name': eGenericName,
                    'form': eForm,
                    'restricition_formula': eResForm,
                    'price': ePrice,
                    'description': eDesc,
                    'faskes1': eF1,
                    'faskes2': eF2,
                    'faskes3': eF3,
                    'category': eCategory
                },
                success: function(data) {
                    if (data.status == "oke") {

                        $('#td-generic_name-' + id).html(eGenericName);
                        $('#td-form-' + id).html(eForm);
                        $('#td-restriction_formula-' + id).html(eResForm);
                        $('#td-price-' + id).html(ePrice);
                        $('#td-description-' + id).html(eDesc);
                        $('#td-faskes_tk1-' + id).html(eF1);
                        $('#td-faskes_tk2-' + id).html(eF2);
                        $('#td-faskes_tk3-' + id).html(eF3);
                        $('#td-category-' + id).html(eCategory);

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
                url: "{{ route('obat.deleteData') }}",
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
@endsection
