@extends('layouts.adminapp')
@section('content')
<div id="page-wrapper">
    <div id="page-inner">
        <!-- /. ROW  -->
        <hr />
        <!-- /. ROW  -->
        <div class="row text-center pad-top">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                <div class="div-square">
                    <a href="{{url('kasir')}}">
                        <i class="fa fa-shopping-cart fa-5x"></i>
                        <h4>Kasir</h4>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                <div class="div-square">
                    <a href="{{url('barang')}}">
                        <i class="fa fa-archive fa-5x"></i>
                        <h4>Barang</h4>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                <div class="div-square">
                    <a href="blank.html">
                        <i class="fa fa-money fa-5x"></i>
                        <h4>Tabungan Santri</h4>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                <div class="div-square">
                    <a href="{{url('konfirmasi')}}">
                        <i class="fa fa-check-square-o fa-5x"></i>
                        <h4>Verifikasi Kiriman</h4>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                <div class="div-square">
                    <a href="blank.html">
                        <i class="fa fa-key fa-5x"></i>
                        <h4>Admin </h4>
                    </a>
                </div>
            </div>
        </div>
        <!-- /. ROW  -->
    </div>
    <!-- /. PAGE INNER  -->
</div>
@endsection