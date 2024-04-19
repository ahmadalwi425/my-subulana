@extends('layouts.adminapp') 
@section('content') 
<div id="page-wrapper">
	<div id="page-inner">
		
		
		<form  method="post" action="{{url('/barang/store')}}" class="col-md-10"> 
		@csrf 
		<div class="row">
            <h3>Tambah Barang Baru</h3>
		</div>
			<div class="form-group">
					<label for="barcode">Barcode</label>
					<input type="text" class="form-control" id="barcode" name="barcode" required>
				</div>	
			<div class="form-group">
				<label for="nama_barang">Nama Barang</label>
				<input type="text" class="form-control" id="nama_barang" name="nama_barang" required>
			</div>
			<div class="form-group">
				<label for="deskripsi">Deskripsi</label>
				<input type="text" class="form-control" id="deskripsi" name="deskripsi">
			</div>
			
			<div class="form-group">
				<label for="harga_pokok">Harga Pokok</label>
				<input type="number" class="form-control" id="harga_pokok" name="harga_pokok" value="0" required>
			</div>
			<div class="form-group">
				<label for="harga_jual">Harga Jual</label>
				<input type="number" class="form-control" id="harga_jual" name="harga_jual" value="0" required>
			</div>
			<div class="form-group">
				<label for="stok">Stok</label>
				<input type="number" class="form-control" id="stok" name="stok" value="0" required>
			</div>
			<button type="submit" class="btn btn-primary">Simpan</button>
		</form>
	</div>
</div> 
@endsection