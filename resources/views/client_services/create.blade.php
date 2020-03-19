
@extends('layouts.master')

@section('content')


	<div class="containar" style="margin: 50px;" >
	<h1>Adding New Client Service</h1>
	<h3> <strong>Client Titel :</strong>{{$client->titel}}</h3>
    <form action="{{ route('clientservises.store')}}" method="POST">
    {{ csrf_field() }}
    
		<div class="form-group">
            <strong>Select Service</strong>
            <select class="form-control" name="service_name_id">
				@foreach($services as $service)
				<option value="{{$service->id}}" >{{$service->service_name}}</option>
			    @endforeach
            <span class="text-danger">{{ $errors->first('servics') }}</span>
        </div>
		
		<input type="hidden"  name="client_id" value="{{$client->id}}">

        <div class="form-group">
            <strong>Type</strong>
            <input type="text" class="form-control"  name="type" placeholder="Enter Type">
            <span class="text-danger">{{ $errors->first('type') }}</span>
        </div>

        <div class="form-group">
            <strong>Link</strong>
            <input type="text" class="form-control"  name="link" placeholder="Enter Link">
            <span class="text-danger">{{ $errors->first('link') }}</span>
        </div>

        <div class="form-group">
            <strong>Description</strong>
            <textarea class="form-control" col="4"  name="description" placeholder="Enter Description"></textarea>
            <span class="text-danger">{{ $errors->first('description') }}</span>
        </div>
         
      <button type="submit"  class="btn btn-success" aria-pressed="true">Add Service</button>
    </form>
    </div>
@stop