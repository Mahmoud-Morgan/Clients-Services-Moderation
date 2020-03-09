@extends('layouts.master')

@section('content')

<div class="containar" style="margin: 50px;" >
    <h3>Edit Service</h3>
    <form class="form-inline" action="{{ route('servicename.update',$service->id) }}" method="POST">
    {{ csrf_field() }}
    @method('PATCH')
        <div class="form-group mb-2">
        <input type="text"  style="width:300px;" value="{{$service->service_name}}" name="service_name" class="form-control"  placeholder="edit Service">
            <button type="submit" class="btn btn-success" aria-pressed="true">Submit edit</button>
        </div>
    </form>

</div>

@endsection