@extends('layouts.app-page-admin')
@section('content')
@include('sweetalert::alert')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Katalog</h1>
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
                            <h3 class="card-title">Data Katalog</h3>
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
                                        <th>Merk</th>
                                        <th>Tipe</th>
                                        <th>Pajak 5 Tahunan</th>
                                        <th>Pajak Tahunan</th>
                                        <th>Harga</th>
                                        <th>DP</th>
                                        <th style="width: 15%;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($datas as $index => $data)
                                    <tr>
                                        <td class="text-center">{{ ++$index }}</td>
                                        <td><img height="50px"
                                                src="{{ asset('assets/data-katalog/image/katalog/'.$data->foto) }}"
                                                alt="Foto Sales" /></td>
                                        <td>{{ $data->nama }}</td>
                                        <td>{{ $data->getMerk->nama_merk }}</td>
                                        <td>{{ $data->getTipe->nama_tipe }}</td>
                                        <td>{{ date('d-m-Y', strtotime($data->pajak_lima_tahunan)) }}</td>
                                        <td>{{ date('d-m-Y', strtotime($data->pajak_tahunan)) }}</td>
                                        <td>{{ currency_IDR($data->harga) }}</td>
                                        <td>{{ currency_IDR($data->dp) }}</td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-warning btn-sm editData" title="Edit"
                                                data-toggle="modal" data-target="#modalInput"
                                                data-id_katalog="{{ $data->id_katalog }}"
                                                data-nama="{{ $data->nama }}"
                                                data-pajak_lima_tahunan="{{ $data->pajak_lima_tahunan }}"
                                                data-pajak_tahunan="{{ $data->pajak_tahunan }}"
                                                data-id_merk="{{ $data->id_merk }}" data-id_tipe="{{ $data->id_tipe }}"
                                                data-harga="{{ $data->harga }}" data-dp="{{ $data->dp }}"
                                                data-keterangan="{{ $data->keterangan }}"
                                                data-foto="{{ asset('assets/data-katalog/image/katalog/'.$data->foto) }}">
                                                <i class="far fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm" title="Hapus" onclick="if(confirm('Apakah yakin ingin hapus katalog {{ $data->nama }} ?')){
                                                        event.preventDefault(); document.getElementById('delete-form-{{ $data->id_katalog }}').submit();
                                                    } else {
                                                        event.preventDefault();
                                                    }">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                            <form id="delete-form-{{ $data->id_katalog }}" style="display: none;"
                                                action="{{ route('katalog.delete', $data->id_katalog) }}" method="POST">
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
                    <h4 class="modal-title"><span class="title"></span>Data Katalog</h4>
                    <button type="button" class="close cancel" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form method="POST" action="{{ route('katalog.create')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="idKatalog" name="id_katalog">
                        <div class="form-group">
                            <label>Foto</label>
                            <div class="text-center col-12 border">
                                <img id="imgPreview" width="200px"
                                    src="{{ asset('assets/page-admin/dist/img/default-150x150.png') }}"
                                    alt="Foto Iklan" />
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
                            <input type="text" class="form-control" placeholder="Input nama" id="nama" name="nama"
                                required oninvalid="this.setCustomValidity('Harap input nama')"
                                oninput="setCustomValidity('')">
                        </div>
                        <div class="form-group {{ $errors->has('id_merk') ? ' has-error' : '' }}">
                            <label>Merk</label>
                            <select class="form-control" id="idMerk" name="id_merk" required="">
                                <option name="id_merk" value="">-- Pilih Merk --</option>
                                @foreach ($dataMerks as $dataMerk)
                                    <option value="{{ $dataMerk->id_merk}}">{{ $dataMerk->nama_merk }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group {{ $errors->has('id_tipe') ? ' has-error' : '' }}">
                            <label>Tipe</label>
                            <select class="form-control" id="idTipe" name="id_tipe" required="">
                                <option value="">-- Pilih Tipe --</option>
                                @foreach ($dataTipes as $dataTipe)
                                    <option value="{{ $dataTipe->id_tipe}}">{{ $dataTipe->nama_tipe }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Pajak 5 Tahunan</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="date" class="form-control" id="pajakLimaTahunan" name="pajak_lima_tahun">
                            </div>

                        </div>
                        <div class="form-group">
                            <label>Pajak Tahunan</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="date" class="form-control" id="pajakTahunan" name="pajak_tahunan">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                            <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                            <path
                                                d="M0 64C0 46.3 14.3 32 32 32h80c79.5 0 144 64.5 144 144c0 58.8-35.2 109.3-85.7 131.7l51.4 128.4c6.6 16.4-1.4 35-17.8 41.6s-35-1.4-41.6-17.8L106.3 320H64V448c0 17.7-14.3 32-32 32s-32-14.3-32-32V288 64zM64 256h48c44.2 0 80-35.8 80-80s-35.8-80-80-80H64V256zm256-96h80c61.9 0 112 50.1 112 112s-50.1 112-112 112H352v96c0 17.7-14.3 32-32 32s-32-14.3-32-32V352 192c0-17.7 14.3-32 32-32zm80 160c26.5 0 48-21.5 48-48s-21.5-48-48-48H352v96h48z" />
                                            </svg>
                                    </span>
                                </div>
                                <input type="number" class="form-control" placeholder="Input harga" id="harga"
                                    name="harga" required oninvalid="this.setCustomValidity('Harap input harga')"
                                    oninput="setCustomValidity('')">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>DP</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                            <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                            <path
                                                d="M0 64C0 46.3 14.3 32 32 32h80c79.5 0 144 64.5 144 144c0 58.8-35.2 109.3-85.7 131.7l51.4 128.4c6.6 16.4-1.4 35-17.8 41.6s-35-1.4-41.6-17.8L106.3 320H64V448c0 17.7-14.3 32-32 32s-32-14.3-32-32V288 64zM64 256h48c44.2 0 80-35.8 80-80s-35.8-80-80-80H64V256zm256-96h80c61.9 0 112 50.1 112 112s-50.1 112-112 112H352v96c0 17.7-14.3 32-32 32s-32-14.3-32-32V352 192c0-17.7 14.3-32 32-32zm80 160c26.5 0 48-21.5 48-48s-21.5-48-48-48H352v96h48z" />
                                            </svg>
                                    </span>
                                </div>
                                <input type="number" class="form-control" placeholder="Input DP" id="dp" name="dp"
                                    required oninvalid="this.setCustomValidity('Harap input DP')"
                                    oninput="setCustomValidity('')">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea class="form-control" name="keterangan" id="keterangan" cols="30" rows="10"
                                placeholder="Input keterangan"></textarea>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger mb-2 mr-sm-2 cancel"
                                data-dismiss="modal">Batal</button>
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

        $('#idKatalog').val('');
        $('#nama').val('');
        $('#idMerk').val('');
        $('#idTipe').val('');
        $('#pajakLimaTahunan').val('');
        $('#pajakTahunan').val('');
        $('#harga').val('');
        $('#dp').val('');
        $('#keterangan').val('');

        const foto = $(this).data('foto');

        if (foto) {
            $("#imgPreview").attr("src", foto);
        }
    });

    $(".editData").on("click", function () {
        console.log("okay");
        $('.title').text('Update ')
        $('.btnSubmit').html('Update');

        const idKatalog = $(this).data('id_katalog');
        const nama = $(this).data('nama');
        const idMerk = $(this).data('id_merk');
        const idTipe = $(this).data('id_tipe');
        const pajakLimaTahunan = $(this).data('pajak_lima_tahunan');
        const pajakTahunan = $(this).data('pajak_tahunan');
        const harga = $(this).data('harga');
        const dp = $(this).data('dp');
        const keterangan = $(this).data('keterangan');
        const foto = $(this).data('foto');

        $('#idKatalog').val(idKatalog);
        $('#nama').val(nama);
        $('#idMerk').val(idMerk);
        $('#idTipe').val(idTipe);
        $('#pajakLimaTahunan').val(pajakLimaTahunan);
        $('#pajakTahunan').val(pajakTahunan);
        $('#harga').val(harga);
        $('#dp').val(dp);
        $('#keterangan').val(keterangan);

        if (foto) {
            $("#imgPreview").attr("src", foto);
        }
    });

</script>
@endsection
