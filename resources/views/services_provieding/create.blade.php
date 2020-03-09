
@extends('layouts.master')

@section('content')

<div class="containar">
    <h3>Adding New Service</h3>
    <form class="form-inline" action="/serviceName" mathod="post">
        <div class="form-group mb-2">
            <input type="text" class="form-control"  placeholder="New Service">
            <button type="submit" class="btn btn-success" aria-pressed="true">Adding Service</button>
        </div>
    </form>

</div>

@stop