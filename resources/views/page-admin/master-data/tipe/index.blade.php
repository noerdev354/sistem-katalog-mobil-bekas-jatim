@extends('layouts.app-page-admin')
@section('content')
@include('sweetalert::alert')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Tipe</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Tipe</h3>
                        </div>
                        <div class="card-body">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalInput" id="tambahData">
                                <i class="fa fa-plus"></i> Tambah
                            </button>
                            <table id="dataTables" class="table table-bordered table-striped table-responsive">
                                <thead>
                                    <tr class="text-center">
                                        <th style="width: 5%;">No</th>
                                        <th>Tipe</th>
                                        <th style="width: 10%;">di Buat</th>
                                        <th style="width: 10%;">di Perbarui</th>
                                        <th style="width: 15%;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datas as $index => $data)
                                        <tr>
                                            <td class="text-center">{{ ++$index }}</td>
                                            <td>{{ $data->nama_tipe }}</td>
                                            <td class="text-center">{{ date('d-m-Y', strtotime($data->created_at)) }}</td>
                                            <td class="text-center">{{ date('d-m-Y', strtotime($data->updated_at)) }}</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-warning btn-sm editData" title="Edit"
                                                    data-toggle="modal" data-target="#modalInput"
                                                    data-id_tipe="{{ $data->id_tipe }}"
                                                    data-nama_tipe="{{ $data->nama_tipe }}">
                                                    <i class="far fa-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger btn-sm" title="Hapus" onclick="if(confirm('Apakah yakin ingin hapus Tipe {{ $data->nama_tipe }} ?')){
                                                        event.preventDefault(); document.getElementById('delete-form-{{ $data->id_tipe }}').submit();
                                                    } else {
                                                        event.preventDefault();
                                                    }">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                                <form id="delete-form-{{ $data->id_tipe }}"
                                                    style="display: none;" action="{{ route('master_data.tipe.delete', $data->id_tipe) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal hide fade in" data-keyboard="false" data-backdrop="static" id="modalInput">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title"><span class="title"></span>Data</h4>
                    <button type="button" class="close cancel" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form method="POST" action="{{ route('master_data.tipe.create')}}">
                        @csrf
                        <input type="hidden" id="idTipe" name="id_tipe">
                        <div class="form-group">
                            <label>Tipe Mobil</label>
                            <input type="text" class="form-control" placeholder="Input nama tipe"
                                id="namaTipe" name="nama_tipe" required
                                oninvalid="this.setCustomValidity('Harap input nama tipe')"
                                oninput="setCustomValidity('')">
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger mb-2 mr-sm-2" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary mb-2 mr-sm-2 btnSubmit"></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')
<script>
    $("#tambahData").on("click", function () {
        $('.title').text('Tambah ')
        $('.btnSubmit').html('Tambah');

        $('#idTipe').val('');
        $('#namaTipe').val('');
    });

    $(".editData").on("click", function () {
        $('.title').text('Update ')
        $('.btnSubmit').html('Update');

        const idTipe = $(this).data('id_tipe');
        const namaTipe = $(this).data('nama_tipe');

        $('#idTipe').val(idTipe);
        $('#namaTipe').val(namaTipe);
    });
</script>
@stop
