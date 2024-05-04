@extends('layouts.adminapp') 
@section('content') 
<div id="page-wrapper">
	<div id="page-inner">
		<form  method="post" action="{{url('/barang/update/'.$data->id_barang)}}" class="col-md-10"> 
		@csrf 
		<div class="row">
            <h3>Edit data {{$data->name}}</h3>
		</div>
            <div class="form-group col-md-6">
				<label for="nama_barang">Nama</label>
				<input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{$data->nama_barang}}" required>
			</div>
            <div class="form-group col-md-6">
				<label for="saldo">Harga Pokok</label>
				<input type="number" class="form-control" id="saldo" name="harga_pokok" value="{{$data->harga_pokok}}" required>
			</div>
            <div class="form-group col-md-6">
				<label for="jual">Harga Jual</label>
				<input type="number" class="form-control" id="jual" name="harga_jual" value="{{$data->harga_jual}}" required>
			</div>
            <div class="form-group col-md-12">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
		</form>
	</div>
</div> 
@endsection