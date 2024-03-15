<div class="row our-product-sec">
    @foreach ($dataKatalogs as $index => $dataKatalog)
        <button type="button" class="btn btn-product col-6 col-lg-3" data-toggle="modal" data-target="#modalCars{{ $index }}">
            <div class="card rounded" style="height: 300px;">
                <div class="crop mb-3">
                    <img src="{{ asset('assets/data-katalog/image/katalog/'.$dataKatalog->foto) }}" width="100%" alt="Gambar Katalog">
                </div>
                <div class="mx-2">
                    <h6><b>{{ $dataKatalog->getMerk->nama_merk }}&nbsp;{{ $dataKatalog->nama }}</b></h6>
                    <p class="product-card-detail">
                        {{ currency_IDR($dataKatalog->harga) }}
                        <span class="d-block">TDP : {{ currency_IDR($dataKatalog->dp) }}</span>
                    </p>
                </div>
            </div>
        </button>
        <div class="modal fade" id="modalCars{{ $index }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="close text-right" style="margin: -5px 0 0 0;" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="row mb-2">
                        <div class="col-12 col-md-6">
                            <div class="crop-modal px-1">
                                <img src="{{ asset('assets/data-katalog/image/katalog/'.$dataKatalog->foto) }}" width="100%" class="rounded" alt="Gambar Katalog">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 px-4">
                            <h4><b>{{ $dataKatalog->getMerk->nama_merk }}&nbsp;{{ $dataKatalog->nama }}</b></h4>
                            <p class="m-0">
                                DP : {{ currency_IDR($dataKatalog->dp) }}
                            </p>
                            <p class="m-0">
                                Tipe : {{ $dataKatalog->getTipe->nama_tipe }}
                            </p>
                            <p class="m-0">
                                Pajak 5 Tahunan : {{ date('d-m-Y', strtotime($dataKatalog->pajak_lima_tahunan)) }}
                            </p>
                            <p class="m-0">
                                Pajak Tahunan : {{ date('d-m-Y', strtotime($dataKatalog->pajak_tahunan)) }}
                            </p>
                            <div class="shadow-sm px-2 pl-3 my-2 mt-4 rounded" style="background: #3C82F4; border-color: #3C82F4; color: #ffffff;">
                                <p class="" style="font-size: 16px;">
                                    <b>Harga</b><span class="d-block"></span>{{ currency_IDR($dataKatalog->harga) }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
<div class="mt-3">
    {{ $dataKatalogs->onEachSide(2)->links('page-user.katalog.pagination') }}
</div>
