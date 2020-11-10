@extends('_layouts.layoutAnggota')
@section('css')

@stop

@section('content')

<!-- pengumuman -->
@include('_components.pengumumanCU')

@php $subdomain = Route::input('cu') @endphp 
<!-- page title -->
<section id="page-title">
  <div class="container clearfix">
    <h1>Data Keuangan Anggota</h1>
    <span></span>
    <!-- <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('home.cu',$subdomain) }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page"><a href="/logout">Logout</a></li>
    </ol> -->
  </div>
</section>

<section id="content">
  <div class="content-wrap">
    <div class="fancy-title title-border title-center">
			<h2>Simpanan</h2>
		</div>

    <div class="fancy-title title-border title-center">
			<h2>Pinjaman</h2>
		</div>

  </div>
</section><!-- #content end -->
@stop

@section('js')

@stop