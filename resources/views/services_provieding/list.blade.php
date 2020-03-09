@extends('layouts.master')

@section('content')

  <br><br><br>
   <div class="row">
        <div class="col-12">
          
          <table class="table table-bordered" >
           <thead>
              <tr>
                 <th>Services</th>
                 <th colspan="2">Actions</th>
              </tr>
           </thead>
           <tbody>
              @foreach($services as $service)
              <tr>
                 <td>{{ $service->service_name }}</td>
                 <td><a href="{{ route('servicename.edit',$service->id)}}" class="btn btn-primary">Edit</a></td>
                 <td>
                 <form action="{{ route('servicename.destroy', $service->id)}}" method="post">
                  {{ csrf_field() }}
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
                </td>
              </tr>
              @endforeach
           </tbody>
          </table>
          <a href="{{ route('servicename.create') }}" class="btn btn-success mb-2">Add New Service</a> 
          
       </div> 
   </div>
 @endsection  