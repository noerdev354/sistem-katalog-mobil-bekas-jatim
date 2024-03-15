@extends('layouts.app-page-admin')
@section('content')
@include('sweetalert::alert')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Sales</h1>
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
                            <h3 class="card-title">Data Sales</h3>
                        </div>
                        <div class="card-body">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#modalInput" id="tambahData" data-foto="{{ asset('assets/page-admin/dist/img/default-150x150.png') }}">
                                <i class="fa fa-plus"></i> Tambah
                            </button>
                            <table id="dataTables" class="table table-bordered table-striped table-responsive">
                                <thead>
                                    <tr class="text-center">
                                        <th style="width: 5%;">No</th>
                                        <th>Foto</th>
                                        <th>Nama</th>
                                        <th>No Telp</th>
                                        <th style="width: 10%;">di Buat</th>
                                        <th style="width: 10%;">di Perbarui</th>
                                        <th style="width: 15%;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datas as $index => $data)
                                        <tr>
                                            <td class="text-center">{{ ++$index }}</td>
                                            <td><img height="50px" src="{{ asset('assets/data-katalog/image/sales/'.$data->foto) }}" alt="Foto Sales"/></td>
                                            <td>{{ $data->nama }}</td>
                                            <td>{{ $data->no_telp }}</td>
                                            <td class="text-center">{{ date('d-m-Y', strtotime($data->created_at)) }}</td>
                                            <td class="text-center">{{ date('d-m-Y', strtotime($data->updated_at)) }}</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-warning btn-sm editData" title="Edit"
                                                    data-toggle="modal" data-target="#modalInput"
                                                    data-id_sales="{{ $data->id_sales }}"
                                                    data-nama="{{ $data->nama }}"
                                                    data-no_telp="{{ $data->no_telp }}"
                                                    data-foto="{{ asset('assets/data-katalog/image/sales/'.$data->foto) }}">
                                                    <i class="far fa-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger btn-sm" title="Hapus" onclick="if(confirm('Apakah yakin ingin hapus Sales {{ $data->nama }} ?')){
                                                        event.preventDefault(); document.getElementById('delete-form-{{ $data->id_sales }}').submit();
                                                    } else {
                                                        event.preventDefault();
                                                    }">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                                <form id="delete-form-{{ $data->id_sales }}"
                                                    style="display: none;" action="{{ route('sales.delete', $data->id_sales) }}"
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
                    <h4 class="modal-title"><span class="title"></span>Data Sales</h4>
                    <button type="button" class="close cancel" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form method="POST" action="{{ route('sales.create')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="idSales" name="id_sales">
                        <div class="form-group">
                            <label>Foto</label>
                            <div class="text-center col-12 border">
                                <img id="imgPreview" width="200px" src="{{ asset('assets/page-admin/dist/img/default-150x150.png') }}" alt="Foto Iklan"/>
                            </div>
                            <div class="input-group mt-2">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="foto" id="foto">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" placeholder="Input nama sales" id="nama" name="nama" required
                                oninvalid="this.setCustomValidity('Harap input nama sales')"
                                oninput="setCustomValidity('')">
                        </div>
                        <div class="form-group">
                            <label>No Telp</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="number" class="form-control" placeholder="Input nomer telp" id="noTelp" name="no_telp" required
                                    oninvalid="this.setCustomValidity('Harap input nomer telp')"
                                    oninput="setCustomValidity('')">
                            </div>
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

    $("#foto").change(function () {
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

        const foto = $(this).data('foto');

        $('#idSales').val('');
        $('#nama').val('');
        $('#noTelp').val('');

        if (foto) {
            $("#imgPreview").attr("src", foto);
        }
    });

    $(".editData").on("click", function () {
        $('.title').text('Update ')
        $('.btnSubmit').html('Update');

        const idSales = $(this).data('id_sales');
        const nama = $(this).data('nama');
        const noTelp = $(this).data('no_telp');
        const foto = $(this).data('foto');

        $('#idSales').val(idSales);
        $('#nama').val(nama);
        $('#noTelp').val(noTelp);

        if (foto) {
            $("#imgPreview").attr("src", foto);
        }
    });
</script>
@endsection
