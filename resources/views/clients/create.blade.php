
@extends('layouts.master')

@section('content')
<div class="container-fluid" >
<h2 style="margin-top: 12px;" class="text-center">Add New Client</h2>
<br>
 
<form action="{{ route('client.store') }}" method="POST" name="add_product">
{{ csrf_field() }}
 
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <strong>Titel</strong>
            <input type="text" name="titel" class="form-control" placeholder="Enter Titel">
            <span class="text-danger">{{ $errors->first('titel') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <strong>Status</strong>
            <input type="text" name="status" class="form-control" placeholder="Enter Status">
            <span class="text-danger">{{ $errors->first('status') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <strong>Contact Phone</strong>
            <input type="text" name="contact_phone" class="form-control" placeholder="Enter Contact Phone">
            <span class="text-danger">{{ $errors->first('contact_phone') }}</span>
        </div>
    </div> 
    <div class="col-md-12">
        <div class="form-group">
            <strong>Start Contract Date</strong>
            <input type="Date" name="start_contract_date" class="form-control" placeholder="Enter Start Contract Date">
            <span class="text-danger">{{ $errors->first('start_contract_date') }}</span>
        </div>
    </div> 
    <div class="col-md-12">
        <div class="form-group">
            <strong>End Contract Date</strong>
            <input type="Date" name="end_contract_date" class="form-control" placeholder="Enter End Contract Date">
            <span class="text-danger">{{ $errors->first('end_contract_date') }}</span>
        </div>         
    <div class="col-md-12">
        <div class="form-group">
            <strong>Description</strong>
            <textarea class="form-control" col="4" name="description" placeholder="Enter Description"></textarea>
            <span class="text-danger">{{ $errors->first('description') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
 
</form>
<br><br><br>
</div>
@endsection