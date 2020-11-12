@extends('layouts.master')

@section('title', 'List of Customers')

@section('content')

<div class="album py-5 bg-light">
    <div class="container">
          <div class="row justify-content-md-center">
            <div class="col-md-8">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col" colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customers as $customer)
                            @include ('customers.customer')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@stop