@extends('layouts.adminapp') 
@section('content') 
<div id="page-wrapper">
	<div id="page-inner">
		<form  method="post" action="{{url('/user/store')}}" class="col-md-10"> 
		@csrf 
		<div class="row">
            <h3>Masukkan data user</h3>
		</div>
            <div class="form-group col-md-6">
				<label for="nama_barang">Nama</label>
				<input type="text" class="form-control" id="nama_barang" name="name" required>
			</div>
            <div class="form-group col-md-6">
                <label for="pembeli">Status</label>
                <select class="form-control" id="pembeli" name="id_level" required>
                    @foreach($data as $level)
                    <option value="{{ $level->id_level }}">{{ $level->level_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-6">
				<label for="saldo">Saldo</label>
				<input type="number" class="form-control" id="saldo" name="nominal" required>
			</div>
            @if(Auth::User()->id_level == 1)
                <div class="form-group col-md-6">
                    <label for="mail">email</label>
                    <input type="email" class="form-control" id="mail" name="email" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="pw">Password</label>
                    <input type="text" class="form-control" id="pw" name="password" required>
                </div>
            @else
                <input type="hidden" name="email" value="santri@subulana.com">
                <input type="hidden" name="password" value="adminsantrisubulana">
            @endif
            <div class="form-group col-md-12">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
		</form>
	</div>
</div> 
@endsection