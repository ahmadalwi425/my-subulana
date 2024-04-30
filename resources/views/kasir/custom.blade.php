@extends('layouts.adminapp') 
@section('content') 

<div id="page-wrapper">
    <div id="page-inner">
        <form method="post" action="{{ url('/kasir/custom/store') }}" class="col-md-12">
            @csrf
            <div class="row">
                <h3>Sumary</h3>
            </div>
            <div class="form-group col-md-6">
                <label for="pembeli">Pembeli</label>
                <select class="form-control" id="pembeli" name="pembeli" required>
                    @foreach($user as $users)
                    <option value="{{ $users->id }}">{{ $users->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="total">Total</label>
                <input type="number" name="total" class="form-control" required>
                <!-- <input type="hidden" class="form-control" id="total" name="total" value="-"> -->
            </div>
            <div class="form-group col-md-6">
                <label for="cash">Cash</label>
                <input type="number" class="form-control" id="cash" name="cash" value="0" required>
            </div>
            <div class="form-group col-md-6">
                <label for="transfer">Transfer</label>
                <input type="number" class="form-control" id="transfer" name="transfer" value="0" required>
            </div>
            <div class="form-group col-md-12">
                <label for="transfer">Keterangan</label>
                <textarea class="form-control" id="note" name="note" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Lanjutkan ke Pembayaran</button>
        </form>
    </div>
</div> 
@endsection
