@extends('layouts.master')

@section('content')

  <br><br><br>
  <h2>Clients</h2>
  <br>
  <div class="row">
    <div class="col-12">
          
      <table class="table table-bordered" >
       <thead>
          <tr>
             <th>Titel</th>
             <th>Status</th>                 
             <th colspan="3"><center>Actions</center></th>
          </tr>
       </thead>
       <tbody>
          @foreach($clients as $client)
          <tr>
             <td>{{ $client->titel }}</td>
             <td>{{ $client->status }}</td>
             <td><center><a href="{{ route('client.show',$client->id)}}" class="btn btn-primary">Info Details</a></center></td>
             <td><center><a href="{{ route('clientservises.show',$client->id)}}" class="btn btn-primary">Services</a></center></td>
             <td><center>
             <form action="{{ route('client.destroy', $client->id)}}" method="post">
              {{ csrf_field() }}
              @method('DELETE')
              <button class="btn btn-danger" type="submit">Delete</button>
            </form></center>
            </td>
          </tr>
          @endforeach
       </tbody>
      </table>
          <a href="{{ route('client.create') }}" class="btn btn-success mb-2">Add New Client</a> 
          
    </div> 
  </div>

@stop