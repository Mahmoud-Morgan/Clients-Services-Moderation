@extends('layouts.master')

@section('content')

<div class="containar" style="margin: 50px;" >
    <h3>Edit Client Data</h3>
    <form action="{{ route('client.update',$client->id) }}" method="POST">
    {{ csrf_field() }}
    @method('PATCH')
    <div class="row">
    	<div class="col-md-12">
         <div class="form-group">
           <strong>Titel</strong>
           <input type="text" value="{{$client->titel}}" name="titel" class="form-control"  placeholder="edit Titel">
           <span class="text-danger">{{ $errors->first('titel') }}</span>
         </div>
        </div>

        <div class="col-md-12">
	        <div class="form-group">
	            <strong>Status</strong>
	            <input type="text" value="{{$client->status}}" name="status" class="form-control" placeholder="Eidt Status">
	            <span class="text-danger">{{ $errors->first('status') }}</span>
	        </div>
        </div>

	    <div class="col-md-12">
	        <div class="form-group">
	            <strong>Contact Phone</strong>
	            <input type="text" value="{{$client->contact_phone}}" name="contact_phone" class="form-control" placeholder="Enter Contact Phone">
	            <span class="text-danger">{{ $errors->first('contact_phone') }}</span>
	        </div>
	    </div>



		<div class="col-md-12">
		    <div class="form-group">
		        <strong>Start Contract Date</strong>
		        <input type="Date" value="{{$client->start_contract_date}}"  name="start_contract_date" class="form-control" placeholder="Enter Start Contract Date">
		        <span class="text-danger">{{ $errors->first('start_contract_date') }}</span>
		    </div>
		</div> 


	    <div class="col-md-12">
	        <div class="form-group">
	            <strong>End Contract Date</strong>
	            <input type="Date" value="{{$client->end_contract_date}}" name="end_contract_date" class="form-control" placeholder="Enter End Contract Date">
	            <span class="text-danger">{{ $errors->first('end_contract_date') }}</span>
	        </div>   
	    </div>    



	    <div class="col-md-12">
	        <div class="form-group">
	            <strong>Description</strong>
	            <textarea class="form-control" col="4" name="description" placeholder="Enter Description">{{$client->description}}</textarea>
	            <span class="text-danger">{{ $errors->first('description') }}</span>
	        </div>
	    </div>
	    	
        </div>
      <a href="{{ route('client.show',$client->id)}}" style="margin-right:100px;" class="btn btn-primary"> Cancel edit</a></td>

      <button type="submit"  class="btn btn-success" aria-pressed="true">Submit edit</button>
    </div>
    </form>

</div>

@stop