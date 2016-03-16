@extends('layouts.master')

@section('content')

    <h1>Phonebook</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Name</th><th>Phone Number</th><th>Address</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $phonebook->id }}</td> <td> {{ $phonebook->name }} </td><td> {{ $phonebook->phone_number }} </td><td> {{ $phonebook->address }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection