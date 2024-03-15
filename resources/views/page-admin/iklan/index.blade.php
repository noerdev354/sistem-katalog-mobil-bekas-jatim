@extends('layouts.app-page-admin')
@section('content')
@include('sweetalert::alert')
<style>
    .holder {
        height: 300px;
        width: 100%;
        border: 0.5px solid black;
    }
    .img {
        max-width: 100%;
        max-height: 300px;
        min-width: 100%;
        min-height: 300px;
    }
</style>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Iklan</h1>
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
                            <h3 class="card-title">Data Iklan</h3>
                        </div>
                        <div class="card-body">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalInput" id="tambahData" data-gambar="{{ asset('assets/page-admin/dist/img/default-150x150.png') }}">
                                <i class="fa fa-plus"></i> Tambah
                            </button>
                            <table id="dataTables" class="table table-bordered table-striped table-responsive">
                                <thead>
                                    <tr class="text-center">
                                        <th style="width: 5%;">No</th>
                                        <th>Gambar</th>
                                        <th>Judul</th>
                                        <th>Keterangan</th>
                                        <th style="width: 10%;">di Buat</th>
                                        <th style="width: 10%;">di Perbarui</th>
                                        <th style="width: 15%;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datas as $index => $data)
                                        <tr>
                                            <td class="text-center">{{ ++$index }}</td>
                                            <td><img height="50px" src="{{ asset('assets/data-katalog/image/iklan/'.$data->gambar) }}" alt="Gambar Iklan"/></td>
                                            <td>{{ $data->judul }}</td>
                                            <td>{{ $data->keterangan }}</td>
                                            <td class="text-center">{{ date('d-m-Y', strtotime($data->created_at)) }}</td>
                                            <td class="text-center">{{ date('d-m-Y', strtotime($data->updated_at)) }}</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-warning btn-sm editData" title="Edit"
                                                    data-toggle="modal" data-target="#modalInput"
                                                    data-id_iklan="{{ $data->id_iklan }}"
                                                    data-judul="{{ $data->judul }}"
                                                    data-keterangan="{{ $data->keterangan }}"
                                                    data-gambar="{{ asset('assets/data-katalog/image/iklan/'.$data->gambar) }}">
                                                    <i class="far fa-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger btn-sm" title="Hapus" onclick="if(confirm('Apakah yakin ingin hapus Iklan {{ $data->judul }} ?')){
                                                        event.preventDefault(); document.getElementById('delete-form-{{ $data->id_iklan }}').submit();
                                                    } else {
                                                        event.preventDefault();
                                                    }">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                                <form id="delete-form-{{ $data->id_iklan }}"
                                                    style="display: none;" action="{{ route('iklan.delete', $data->id_iklan) }}"
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
                    <h4 class="modal-title"><span class="title"></span>Data Iklan</h4>
                    <button type="button" class="close cancel" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form method="POST" action="{{ route('iklan.create')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="idIklan" name="id_iklan">
                        <div class="form-group">
                            <label>Gambar</label>
                            <div class="text-center col-12 border">
                                <img id="imgPreview" width="200px" src="{{ asset('assets/page-admin/dist/img/default-150x150.png') }}" alt="Gambar Iklan"/>
                            </div>
                            <div class="input-group mt-2">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="gambar" id="gambar">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" class="form-control" placeholder="Input judul iklan" id="judul" name="judul" required
                                oninvalid="this.setCustomValidity('Harap input judul iklan')"
                                oninput="setCustomValidity('')">
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea class="form-control" name="keterangan" id="keterangan" cols="30" rows="10" placeholder="Input keterangan"></textarea>
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
<script src="{{ asset('assets/page-admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script>
    $(function () {
        bsCustomFileInput.init();
    });
    $("#gambar").change(function () {
        const file = this.files[0];

        if (file) {
            let reader = new FileReader();
            reader.onload = function (event) {
                $("#imgPreview").attr("src", event.target.result);
            };
            reader.readAsDataURL(file);
        }
    });

    $("#tambahData").on("click", function () {
        $('.title').text('Tambah ')
        $('.btnSubmit').html('Tambah');

        $('#idIklan').val('');
        $('#judul').val('');
        $('#keterangan').val('');

        const gambar = $(this).data('gambar');

        if (gambar) {
            $("#imgPreview").attr("src", gambar);
        }
    });

    $(".editData").on("click", function () {
        $('.title').text('Update ')
        $('.btnSubmit').html('Update');

        const idIklan = $(this).data('id_iklan');
        const judul = $(this).data('judul');
        const keterangan = $(this).data('keterangan');
        const gambar = $(this).data('gambar');

        $('#idIklan').val(idIklan);
        $('#judul').val(judul);
        $('#keterangan').val(keterangan);

        if (gambar) {
            $("#imgPreview").attr("src", gambar);
        }
    });
</script>
@endsection
