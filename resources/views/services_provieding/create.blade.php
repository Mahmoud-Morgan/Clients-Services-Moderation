
@extends('layouts.master')

@section('content')

<div class="containar" style="margin: 50px;" >
    <h3>Adding New Service</h3>
    <form class="form-inline" action="{{ route('servicename.store') }}" method="POST">
    {{ csrf_field() }}
        <div class="form-group mb-2">
            <input type="text"  style="width:300px;" name="service_name" class="form-control"  placeholder="New Service Name">
            <span class="text-danger">{{ $errors->first('service_name') }}</span>
            <button type="submit" class="btn btn-success" aria-pressed="true">Adding Service</button>
        </div>
    </form>

</div>

@endsection