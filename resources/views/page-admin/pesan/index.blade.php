@extends('layouts.app-page-admin')
@section('content')
@include('sweetalert::alert')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Pesan</h1>
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
                            <h3 class="card-title">Data Pesan</h3>
                        </div>
                        <div class="card-body">
                            <table id="dataTablesPesan" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th style="width: 5%;">No</th>
                                        <th>Nama</th>
                                        <th>No Telp</th>
                                        <th>Email</th>
                                        <th>Pesan</th>
                                        <th style="width: 10%;">di Kirim</th>
                                        <th style="width: 10%;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datas as $index => $data)
                                        <tr>
                                            <td class="text-center">{{ ++$index }}</td>
                                            <td>{{ $data->nama }}</td>
                                            <td>{{ $data->no_telp }}</td>
                                            <td>{{ $data->email }}</td>
                                            <td>{{ $data->pesan }}</td>
                                            <td class="text-center">{{ date('d-m-Y', strtotime($data->created_at)) }}</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-danger btn-sm" title="Hapus" onclick="if(confirm('Apakah yakin ingin hapus Pesan dari {{ $data->nama }} ?')){
                                                            event.preventDefault(); document.getElementById('delete-form-{{ $data->id_pesan }}').submit();
                                                        } else {
                                                            event.preventDefault();
                                                        }">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                                <form id="delete-form-{{ $data->id_pesan }}"
                                                    style="display: none;" action="{{ route('pesan.delete', $data->id_pesan) }}"
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
</div>
@endsection
