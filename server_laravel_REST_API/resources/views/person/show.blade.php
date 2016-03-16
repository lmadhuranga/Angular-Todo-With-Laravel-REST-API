@extends('layouts.master')

@section('content')

    <h1>Person</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Name</th><th>Email</th><th>Age</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $person->id }}</td> <td> {{ $person->name }} </td><td> {{ $person->email }} </td><td> {{ $person->age }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection