@extends('layouts.app-page-admin')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>{{ $data['jumlahKatalog'] }}</h3>
                            <p>Katalog</p>
                        </div>
                        <div class="icon">
                            <i class="ion-ios-book"></i>
                        </div>
                        <a href="{{ route('katalog.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>{{ $data['jumlahSales'] }}</h3>
                            <p>Sales</p>
                        </div>
                        <div class="icon">
                            <i class="ion-ios-people"></i>
                        </div>
                        <a href="{{ route('sales.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>{{ $data['jumlahIklan'] }}</h3>
                            <p>Promo</p>
                        </div>
                        <div class="icon">
                            <i class="ion-image"></i>
                        </div>
                        <a href="{{ route('iklan.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>{{ $data['jumlahPesan'] }}</h3>
                            <p>Pesan</p>
                        </div>
                        <div class="icon">
                            <i class="ion-android-chat"></i>
                        </div>
                        <a href="{{ route('pesan.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
    </section>
</div>
@endsection
