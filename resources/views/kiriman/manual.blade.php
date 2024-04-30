@extends('layouts.adminapp') 
@section('content') 
<div id="page-wrapper">
	<div id="page-inner">
		
		
		<form  method="post" action="{{url('/konfirmasi/manual/store')}}" class="col-md-10"> 
		@csrf 
		<div class="row">
            <h3>Saldo santri</h3>
		</div>
            <div class="form-group col-md-6">
                <label for="pembeli">Nama Santri</label>
                <select class="form-control" id="pembeli" name="id_santri" required>
                    @foreach($data as $users)
                    <option value="{{ $users->id }}">{{ $users->name }}</option>
                    @endforeach
                </select>
            </div>
			<div class="form-group col-md-6">
				<label for="nama_barang">Nominal</label>
				<input type="number" class="form-control" id="nama_barang" name="nominal" required>
			</div>
			<div class="form-group col-md-12">
				<label for="deskripsi">Catatan</label>
				<textarea class="form-control" id="deskripsi" name="catatan"></textarea>
			</div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
		</form>
	</div>
</div> 
@endsection