@extends('layouts.master')

@section('content')

  <br><br><br>
  <div class="jumbotron">
    <h2>Client Details</h2>
    <br>
   <div class="row">

    <div class="col-md-12">
      <div class="form-group">
       <p><strong>Titel :</strong>{{$client->titel}}</p> 
      </div>
    </div>

    <div class="col-md-12">
      <div class="form-group">
       <p><strong>Status :</strong>{{$client->status}}</p> 
      </div>
    </div>

    <div class="col-md-12">
      <div class="form-group">
        <p><strong>Contact Phone :</strong>{{$client->contact_phone}}</p>
      </div>  
    </div>

    <div class="col-md-12">
      <div class="form-group">
        <p><strong>Start Contract Date :</strong>{{$client->start_contract_date}}</p>
      </div>
    </div> 

    <div class="col-md-12">
      <div class="form-group">
        <p><strong>End Contract Date :</strong>{{$client->end_contract_date}}</p>
      </div>   
    </div>    

    <div class="col-md-12">
      <div class="form-group">
        <p><strong>Description</strong>{{$client->description}}</p> 
      </div>
    </div>

  </div>

      
    <table>  
      <tr>
         <td style="width:100px" ><a href="{{ route('client.show',$client->id)}}" class="btn btn-primary"> Services</a></td>
         <td style="width:100px"><center><a href="{{ route('client.edit',$client->id)}}" class="btn btn-primary">Edit</a></center></td>
         <td style="width:100px"><center>
         <form action="{{ route('client.destroy', $client->id)}}" method="post">
          {{ csrf_field() }}
          @method('DELETE')
          <button class="btn btn-danger" type="submit">Delete</button>
        </form></center>
        </td>
      </tr>  
    </table>
    <br><br>
   <a href="{{ route('client.index')}}" class="btn btn-primary"> Back to Clients List</a></td>
</div>

@stop