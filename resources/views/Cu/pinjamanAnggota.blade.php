@extends('_layouts.layoutAnggota')

@section('css')

@stop

@section('content')

<!-- pengumuman -->
@include('_components.pengumumanCU')

@php $subdomain = Route::input('cu') @endphp 

<!-- Content
============================================= -->
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <h3 class="center">Simulasi Pinjaman</h3>
            <div class="card border-0 shadow-lg rounded-lg" style="background-color: #062639;">
                <!-- <img class="card-img-top" src="https://source.unsplash.com/fAcloeaPA_c/1600x600/" alt="Image"> -->

                <div class="card-body dark" style="padding: 60px">
                    <div class="form-widget" data-alert-type="inline">
                        <div class="form-result"></div>

                        <form id="createPinjamanAnggotaForm" name="createPinjamanAnggotaForm" class="mb-0" action="/createPinjaman" method="POST">
                        {{ csrf_field() }}
                            <div class="form-process"></div>

                            <!-- <div class="col-12 bottommargin">
                                <div id="tab-reservation" class="list-group list-group-horizontal d-flex justify-content-center" role="tablist">
                                    <a class="list-group-item list-group-item-action w-auto mx-0 mx-sm-3 active" data-toggle="list" href="#tab-reservation-select-dates" role="tab">1. Select Dates</a>
                                    <a class="list-group-item list-group-item-action w-auto mx-0 mx-sm-3" data-toggle="list" href="#tab-reservation-select-room" role="tab">2. Select Room</a>
                                    <a class="list-group-item list-group-item-action w-auto mx-0 mx-sm-3" data-toggle="list" href="#tab-reservation-contact" role="tab">3. Contact Details</a>
                                    <a class="list-group-item list-group-item-action w-auto mx-0 mx-sm-3" data-toggle="list" href="#tab-reservation-payment" role="tab">4. Make Payment</a>
                                </div>
                            </div> -->

                            <div class="col-lg-9 mt-4 mt-lg-0">
                                <div class="tab-content" id="nav-tabContent">
                                    
                                    <div class="tab-pane fade show active" id="tab-reservation-select-dates" role="tabpanel" aria-labelledby="tab-reservation-select-dates">
                                        <div class="row">
                                            <div class="input-daterange travel-date-group col-12 bottommargin-sm">
                                                <div class="row">
                                                    <div class="col-md-6 col-2">
                                                        <label for="jumlahPinjaman">Jumlah Pinjaman:</label>
                                                        <input type="number" value="" class="sm-form-control required border-form-control text-left" id="jumlahPinjaman" name="jumlahPinjaman" placeholder="Masukkan Jumlah Pinjaman">
                                                    </div>
                                                    <div class="col-md-6 col-2">
                                                        <label for="bungaPinjaman">Bunga Pinjaman:</label>
                                                        <input type="number" value="" class="sm-form-control required border-form-control text-left" id="bungaPinjaman" name="bungaPinjaman" placeholder="Masukkan Bunga Pinjaman">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="mb-4">
                                                    <label>Lama Pinjaman</label>
                                                    <input type="number" value="" class="sm-form-control required border-form-control text-left" id="lamaPinjaman" name="lamaPinjaman" placeholder="Masukkan Jumlah Tahun">
                                                    <!-- <select class="sm-form-control border-form-control required" name="lamaPinjaman" id="lamaPinjaman">
                                                        <option value="1" selected="selected">1 Tahun</option>
                                                        <option value="2">2 Tahun</option>
                                                        <option value="3">3 Tahun</option>
                                                    </select> -->
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <button class="button button-3d button-black m-0" id="createPinjamanAnggotaForm-submit" name="createPinjamanAnggotaForm-submit" value="tambah">BUAT PINJAMAN</button>
                                                <!-- <a href="#" class="button button-rounded button-light bg-white tab-action-btn-next text-dark float-right">BUAT PINJAMAN</a> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <br>
                        <br>
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif
                        <div class="table-responsive">
                            <table id="datatable1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Jumlah Pinjaman</th>
                                        <th>Lama Pinjaman</th>
                                        <th>Bunga Pinjaman</th>
                                        <th>Angsuran Per Bulan</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ( $pinjamanAnggotas as $pa )
                                    <tr>
                                        <td>Rp {{ $pa->jumlah_pinjaman }}</td>
                                        <td>{{ $pa->lama_pinjaman}} Bulan</td>
                                        <td>{{ $pa->bunga_pinjaman }}%</td>
                                        <td>Rp {{ $pa->angsuran_pinjaman }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section><!-- #content end -->

@stop

@section('js')

@stop