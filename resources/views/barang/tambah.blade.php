@extends('layouts.adminapp') 
@section('content') 
<div id="page-wrapper">
	<div id="page-inner">
        <form method="POST" action="{{ url('barang/tambah/proses') }}">
            @csrf

            <div class="form-group">
                <label for="id_barang">Barang: {{$data->nama_barang}}</label>
                <input type="hidden" value="{{$data->id_barang}}" class="form-control" id="id_barang" name="id_barang" required>
            </div>

            <div class="form-group">
                <label for="jumlah_tambah">Jumlah Stok yang Ditambahkan</label>
                <input type="number" class="form-control" id="jumlah_tambah" name="jumlah_tambah" value="0" required>
            </div>

            <button type="submit" class="btn btn-primary">Tambah Stok</button>
        </form>
	</div>
</div> 
@endsection