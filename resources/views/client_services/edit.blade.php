@extends('layouts.master')

@section('content')

	<div class="containar" style="margin: 50px;" >
    <h3>Edit Client Data</h3>
    <form action="{{ route('clientservises2.update',[$client_service->client_id,$client_service->service_name_id]) }}" method="POST">
    {{ csrf_field() }}
    @method('PATCH')
		<div class="form-group">
            <strong>Type</strong>
            <input type="text" class="form-control" value="{{$client_service->type}}" name="type" placeholder="Enter Type">
            <span class="text-danger">{{ $errors->first('type') }}</span>
        </div>


        <div class="form-group">
            <strong>Link</strong>
            <input type="text" class="form-control" value="{{$client_service->link}}" name="link" placeholder="Enter Link">
            <span class="text-danger">{{ $errors->first('link') }}</span>
        </div>

        <div class="form-group">
            <strong>Description</strong>
            <textarea class="form-control" col="4"  name="description" placeholder="Enter Description">{{$client_service->description}}</textarea>
            <span class="text-danger">{{ $errors->first('description') }}</span>
        </div>
         <a href="{{ route('client.index')}}" style="margin-right:100px;" class="btn btn-primary"> Cancel edit</a></td>

      <button type="submit"  class="btn btn-success" aria-pressed="true">Submit edit</button>
    </form>
   </div>
@stop