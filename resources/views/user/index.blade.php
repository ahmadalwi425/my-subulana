@extends('layouts.adminapp')
@section('content')

<div id="page-wrapper">   
    <div id="page-inner">
    <div class="row">
        <div class="col-md-6">
            <h3>Data User </h3>   
        </div>
        <div class="col-md-6">
            <a href="{{url('user/create')}}" class="btn btn-success">Tambah User</a>   
        </div>
    </div>  
        <div class="table-responsive">
            <table  data-toggle="table" data-pagination="true" data-search="true" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>email</th>
                        <th>Saldo</th>
                        <th>Role</th>
                        @if(Auth::user()->id_level != 3)
                        <th>Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ 'Rp ' . number_format($user->saldo, 0, ',', '.') }}</td>
                        <td>{{ $user->level->level_name }}</td>
                        <td>
                        @if(Auth::user()->id_level == 1)
                            <a class="btn btn-warning" href="{{ url('user/edit/' . $user->id) }}">Edit</a> 
                        @else
                            <a class="btn btn-warning" href="{{ url('user/edit/' . $user->id) }}">Edit Nominal</a> 
                        @endif
                            <a class="btn btn-danger" href="{{ url('user/disable/' . $user->id) }}">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
