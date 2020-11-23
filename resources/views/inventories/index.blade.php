@extends('layouts.master')

@section('title', 'List of Ingredients')

@section('content')

<div class="album py-5 bg-light">
    <div class="container">
        <a class="btn btn-primary" href="{{ URL::to('ingredients/create') }}" role="button">Add New</a>
        <hr/>
          <div class="row">
            @foreach($inventories as $inventory)
                @include ('inventories.inventory')
            @endforeach
        </div>
    </div>
</div>

@stop