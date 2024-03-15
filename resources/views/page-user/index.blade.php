<!DOCTYPE html>
<html lang="en">
<head>
    @include('page-user.componets.meta')
    @include('page-user.componets.style')
    <style>
        input[type="number"] {
          -moz-appearance: textfield;
        }
        input[type="number"]:hover,
        input[type="number"]:focus {
          -moz-appearance: number-input;
        }
    </style>
    <style>
        .crop {
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .crop-modal {
            width: 100%;
            height: 100%;
            overflow: hidden;
        }
    </style>
</head>
@include('sweetalert::alert')
<body data-spy="scroll" data-target=".navbar" data-offset="90">
    <!-- PRELOADER -->
    <div class="loader" id="loader-fade">
        <div class="load">
            <img class="" src="{{ asset('assets/page-user/assets/img/logo/logo.png') }}" alt="Mobil88Logo" height="60" width="60">
        </div>
    </div>
    <!-- PRELOADER -->
    <!-- START HEADER -->
    <header class="site-header" id="home">
        <nav class="navbar navbar-expand-lg nav-bottom-line center-brand static-nav">
            <div class="container mt-3">
                <a class="navbar-brand scroll" href="#slider-area">
                    <img src="{{ asset('assets/page-user/assets/img/logo/logo.png') }}" alt="logo">
                </a>
                <button class="navbar-toggler navbar-toggler-right d-none collapsed" type="button"
                    data-toggle="collapse" data-target="#xenav">
                    <span> </span>
                    <span> </span>
                    <span> </span>
                </button>
                <div class="collapse navbar-collapse" id="xenav">
                    <ul class="navbar-nav" id="container"></ul>
                    <ul class="navbar-nav ml-auto mr-0 mr-lg-4">
                        <li class="nav-item">
                            <a class="nav-link scroll" href="#home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link scroll" href="#sales">Sales</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link scroll" href="#cars">Cars</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link scroll" href="#contactUs">Contact Us</a>
                        </li>
                    </ul>
                </div>
                <div class="mt-2 sidemenu">
                    <!--side menu open button-->
                    <a href="javascript:void(0)" class="sidemenu_btn" id="sidemenu_toggle">
                        <span></span>
                        <span></span>
                        <span></span>
                    </a>
                </div>
            </div>
        </nav>
        <!--Side Nav-->
        <div class="side-menu hidden">
            <div class="inner-wrapper">
                <span class="btn-close" id="btn_sideNavClose"><i></i><i></i></span>
                <nav class="side-nav w-100">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link scroll" href="#home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link scroll" href="#sales">Sales</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link scroll" href="#cars">Cars</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link scroll" href="#contactUs">Contact Us</a>
                        </li>
                    </ul>
                </nav>
                <div class="side-footer text-white w-100">
                    <ul class="social-icons-simple">
                        <li><a class="facebook-bg-hvr" href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a>
                        </li>
                        <li><a class="twitter-bg-hvr" href="javascript:void(0)"><i class="fab fa-twitter"></i></a></li>
                        <li><a class="linkedin-bg-hvr" href="javascript:void(0)"><i class="fab fa-linkedin-in"></i></a>
                        </li>
                        <li><a class="instagram-bg-hvr" href="javascript:void(0)"><i class="fab fa-instagram"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <a id="close_side_menu" href="javascript:void(0);"></a>
        <!-- End side menu -->
    </header>
    <!-- START HEADER -->
    <!-- START BANNER -->
    <section class="banner-sec" id="home-banner" style="padding: 7.5rem 0 2.5rem 0;">
        <div class="slider-area" id="slider-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-6 col-md-6 banner-head">
                        <h3 class="font-weight-bold">Premium Car <span class="text-blue">Second</span><span class="d-block">In Surabaya</span></h3>
                        <p class="mt-4 mb-3">Beli mobil bekas premium<span class="d-block"></span>dengan Garansi standar Astra, Pesen sekarang juga.</p>
                        <a href="#cars" class="btn btn-medium btn-rounded btn-blue text-capitalize mt-3 mb-5 mb-md-0">Explore Cars</a>
                    </div>
                    <div class="col-12 col-lg-6 col-md-6">
                        <div class="banner-image" data-depth="0.07">
                            <img src="{{ asset('assets/page-user/assets/img/banner/hero.png') }}" alt="Banner-Product">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END BANNER -->
    <!-- START PROMO -->
    <section class="slide2 all-promo" style="padding: 2.5rem 0;">
        <div class="container position-relative">
            <div class="row">
                <div class="col-12 main-heading text-center">
                    <h4 class="main-font">Promo</h4>
                </div>
            </div>
            <div class="row row-padding">
                <div id="owl-promo" class="owl-promo owl-carousel owl-theme">
                    @foreach ($dataIklans as $data)
                        <div class="team-box item">
                            <div class="team-image">
                                <img src="{{ asset('assets/data-katalog/image/iklan/'.$data->gambar) }}" alt="gambar promo">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <a class="circle" id="team-circle-left"><i class="lni lni-chevron-left"></i></a>
            <a class="circle" id="team-circle-right"><i class="lni lni-chevron-right"></i></a>
        </div>
    </section>
    <!-- END PROMO -->
    <!-- START SALES -->
    <section class="section sales" id="sales" style="padding: 2.5rem 0;">
        <div class="container expand-container">
            <div class="row">
                <div class="col-12 text-center pb-3">
                    <span class="alt-font text-black">Dapatkan Discount dan Penawaran Special dari Staff Professional
                        Kami.</span>
                </div>
            </div>
            <!-- Sales Slider -->
            <div id="sales-carousal" class="owl-carousel text-center row-padding">
                @foreach ($dataSales as $data)
                    <button type="button" class="btn btn-sales btn-link-wa" data-no_telp="{{ $data->no_telp }}">
                        <div class="item">
                            <div class="sales-img mt-2">
                                <img src="{{ asset('assets/data-katalog/image/sales/'.$data->foto) }}" wh alt="foto sales">
                            </div>
                            <div class="sales-name mt-3 mb-3">
                                <h3 class="mb-0 text-black"><span>{{ $data->nama }}</span></h3>
                            </div>
                        </div>
                    </button>
                @endforeach
            </div>
        </div>
    </section>
    <!-- END SALES -->
    <!-- START PRODUCT -->
    <section id="cars" class="product-sec" style="padding: 2.5rem 0;">
        <div class="container position-relative">
            <div class="row align-items-center">
                <div class="col-12 col-md-12 text-center pb-3">
                    <span class="alt-font text-black">Mari Kita Temukan Mobil Kesayangan Anda</span>
                    <div class="row align-items-center">
                        <div class="col-12 col-md-4"></div>
                        <div class="col-12 col-md-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                                </div>
                                <input type="text" class="form-control" id="inputSearch" placeholder="Search" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-12 col-md-4"></div>
                    </div>
                </div>
                <div class="col-12 col-md-12">
                    <div class="row align-items-center">
                        <div class="col-6 col-md-6">
                            <div class="product-content">
                                <h4 class="mt-3 mb-2">Cars Catalog</h4>
                                <p class="alt-font">Cari mobil kamu untuk masa depan mu</p>
                            </div>
                        </div>
                        <div class="col-6 col-md-6 mt-5">
                            <div class="row align-items-center">
                                <div class="col-md-3"></div>
                                <div class="col-md-3"></div>
                                <div class="col-6 col-md-3">
                                    <select class="form-select" id="selectHarga" style="background-color: #ffffff !important;">
                                        <option value="">Harga</option>
                                        <option value="ASC">Low to High</option>
                                        <option value="DESC">High to Low</option>
                                    </select>
                                </div>
                                <div class="col-6 col-md-3">
                                    <select class="form-select" id="selectMerk" style="background-color: #ffffff !important;">
                                        <option value="">Merk</option>
                                        @foreach ($dataMerks as $data)
                                            <option value="{{ $data->id_merk }}">{{ $data->nama_merk }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-3">
            <div id="dataKatalogs">
                @include('page-user.katalog.list')
            </div>
        </div>
    </section>
    <!-- END PRODUCT -->
    <!-- START CONTACT -->
    <section class="section contact-sec" id="contactUs" style="padding: 2.5rem 0;">
        <div class="container expand-container">
            <div class="row">
                <div class="col-12 col-lg-4 main-heading"></div>
                <div class="col-12 col-lg-8 main-heading">
                    <h4 class="main-font">Contact Us<span class="d-block text-blue">Please fill in the form below</span>
                    </h4>
                    <form method="POST" action="{{ route('pesan.create')}}" class="row contact-form row-padding">
                        @csrf
                        <div class="col-12 col-lg-8" id="result"></div>
                        <div class="col-12 col-lg-8">
                            <input type="text" name="nama" placeholder="Nama Lengkap" class="form-control" required>
                            <input type="number" name="no_telp" placeholder="Nomor Telp" class="form-control" required>
                            <input type="email" name="email" placeholder="Email" class="form-control" required>
                            <textarea class="form-control" name="pesan" rows="6" placeholder="Pesan" required></textarea>
                            <button type="submit" class="btn btn-small btn-rounded btn-blue rounded-pill w-100 main-font">Kirim</button>
                        </div>
                    </form>
                </div>
                <div class="col-12 col-lg-4 main-heading"></div>
            </div>
        </div>
    </section>
    <!-- END CONTACT -->
    @include('page-user.componets.javascript')
    <script>
        $(".btn-link-wa").click(function() {
            let noTelp  = $(this).data("no_telp")

            if(noTelp.substr(0, 1) == 0) {
                location.assign("http://wa.me/62"+noTelp.substr(1));
            } else {
                location.assign("http://wa.me/62"+noTelp.substr(2))
            }
        });

        let search  = null;
        let harga   = null;
        let merk    = null;
        let url     = $(this).attr('href');

        function updatePaginationLinks(newPaginationHtml) {
            // Gantilah HTML tautan paginasi dengan yang baru
            $('.pagination').html(newPaginationHtml);

            // Dapatkan jumlah tautan paginasi yang baru
            var numberOfLinks = $('.pagination').find('li.page-item').length;
        }

        // Pada saat halaman dimuat, inisialisasikan tautan paginasi
        updatePaginationLinks($('.pagination').html());

        function getItems(url, search, harga, merk) {
            $.ajax({
                type: 'GET',
                url : url,
                data: {
                    nama    : search,
                    order_by: harga,
                    id_merk : merk
                },
                success: function (data) {
                    $('#dataKatalogs').html(data.view);

                    // Setelah pembaruan, perbarui jumlah tautan paginasi
                    updatePaginationLinks(data.pagination);
                }
            });
        }

        $(document).ready(function () {
            $('#dataKatalogs').on('click', '.pagination a', function (e) {
                e.preventDefault();
                let url = $(this).attr('href');
                getItems(url, search, harga, merk);
            });
        });

        $('#inputSearch').on('input',function(e){
            e.preventDefault();
            search = $(this).val();
            getItems(url, search, harga, merk);
        });

        $("#selectHarga").change(function (e) {
            e.preventDefault();
            harga = $(this).val();
            getItems(url, search, harga, merk);
        })

        $("#selectMerk").change(function (e) {
            e.preventDefault();
            merk = $(this).val();
            getItems(url, search, harga, merk);
        })
    </script>
</body>
</html>
