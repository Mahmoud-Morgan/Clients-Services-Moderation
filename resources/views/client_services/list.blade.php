@extends('layouts.master')

@section('content')
<br>
<h1>Client Services</h1>
<h3> <strong>Client Titel :</strong>{{$client->titel}}</h3>
<br>
@foreach($client_services as $service)
	 <div class="jumbotron">
    <h4>{{$service->service_name}}</h4>
    <br>
   <div class="row">

    <div class="col-md-12">
      <div class="form-group">
       <p><strong>Type :</strong>{{$service->type}}</p> 
      </div>
    </div>

    <div class="col-md-12">
      <div class="form-group">
       <p><strong>Link :</strong>{{$service->link}}</p> 
      </div>
    </div>
 

    <div class="col-md-12">
      <div class="form-group">
        <p><strong>Description :</strong>{{$service->description}}</p> 
      </div>
    </div>

    <table>  
      <tr>
         <td style="width:150px" ><a href="{{ route('clientservises2.edit',[$client->id,$service->id])}}" class="btn btn-primary"> Edit Service</a></td>
      
         <td style="width:100px"><center>
         <form action="{{route('clientservises2.destroy',[$client->id,$service->id])}}" method="post">
          {{ csrf_field() }}
          @method('DELETE')
          <button class="btn btn-danger" type="submit">Delete</button>
        </form></center>
        </td>
      </tr>  
    </table>

  </div>
  </div>
<br>
@endforeach
<a  style="margin-right: 50px;" href="{{ route('client.show',$client->id)}}" class="btn btn-primary">Back to Client Info </a>
<a href="{{ route('clientservises2.create',$client->id)}}" class="btn btn-success">Add new Client Service </a>
@stop