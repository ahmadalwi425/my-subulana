@extends('layouts.adminapp') 
@section('content') 
<div id="page-wrapper">
	<div id="page-inner">
		<form  method="post" action="{{url('/user/update/'.$user->id)}}" class="col-md-10"> 
		@csrf 
		<div class="row">
            <h3>Edit data {{$user->name}}</h3>
		</div>
            @if(Auth::User()->id_level == 1)
            <div class="form-group col-md-6">
				<label for="nama_barang">Nama</label>
				<input type="text" class="form-control" id="nama_barang" name="name" value="{{$user->name}}" required>
			</div>
            <div class="form-group col-md-6">
                <label for="pembeli">Status</label>
                <select class="form-control" id="pembeli" name="id_level" required>
                    @foreach($data as $level)
                    @if($level->id_level == $user->id_level)
                    <option value="{{ $level->id_level }}" selected>{{ $level->level_name }}</option>
                    @else
                    <option value="{{ $level->id_level }}">{{ $level->level_name }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-6">
				<label for="saldo">Saldo</label>
				<input type="number" class="form-control" id="saldo" name="nominal" value="{{$user->saldo}}" required>
			</div>
            
                <div class="form-group col-md-6">
                    <label for="mail">email</label>
                    <input type="email" class="form-control" id="mail" name="email" value="{{$user->email}}">
                </div>
                <div class="form-group col-md-6">
                    <label for="pw">Password</label>
                    <input type="text" class="form-control" id="pw" name="password">
                </div>
            @else
            <div class="form-group col-md-6">
				<label for="saldo">Saldo</label>
				<input type="number" class="form-control" id="saldo" name="nominal" value="{{$user->saldo}}" required>
			</div>
            @endif
            <div class="form-group col-md-12">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
		</form>
	</div>
</div> 
@endsection