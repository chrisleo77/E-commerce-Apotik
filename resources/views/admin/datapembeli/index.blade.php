@extends('layouts.admin')
@section('title')
    Data Pembeli
@endsection
@section('container')
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
                    @foreach($listpembeli as $li)
                    <tr id="tr_{{ $li->id }}">
                        <td>{{ $li->id }}</td>
                        <td id="td-name-{{ $li->id }}">{{ $li->name }}</td>
                        <td id="td-address-{{ $li->id }}">{{ $li->address }}</td>
                        <td>{{ $li->email }}</td>
                        <td>
                            <a href="#modalEdit" data-target="#modalEdit" data-toggle='modal' class="btn btn-success" onclick="getEditForm({{ $li->id }})"><i class="fa fa-edit"></i> Ubah</a>
                            <a class="btn btn-info" href="{{ url('admin/riwayattransaksi/'.$li->id) }}">Lihat Riwayat Pembelian</a>
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
@endsection

@section('scripts')
    <script>
        function getEditForm(id) {
            $.ajax({
                type: 'POST',
                url: "{{ route('user.getEditForm') }}",
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
                url: "{{ route('user.saveData') }}",
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
@endsection