@extends('layouts.master')

@section('content')

    <h1>Phonebook <a href="{{ url('phonebook/create') }}" class="btn btn-primary pull-right btn-sm">Add New Phonebook</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th>Name</th><th>Phone Number</th><th>Address</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($phonebook as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('phonebook', $item->id) }}">{{ $item->name }}</a></td><td>{{ $item->phone_number }}</td><td>{{ $item->address }}</td>
                    <td>
                        <a href="{{ url('phonebook/' . $item->id . '/edit') }}">
                            <button type="submit" class="btn btn-primary btn-xs">Update</button>
                        </a> /
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['phonebook', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $phonebook->render() !!} </div>
    </div>

@endsection
