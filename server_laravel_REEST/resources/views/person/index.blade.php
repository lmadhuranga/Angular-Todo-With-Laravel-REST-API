@extends('layouts.master')

@section('content')

    <h1>Person <a href="{{ url('person/create') }}" class="btn btn-primary pull-right btn-sm">Add New Person</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th>Name</th><th>Email</th><th>Age</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($person as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('person', $item->id) }}">{{ $item->name }}</a></td><td>{{ $item->email }}</td><td>{{ $item->age }}</td>
                    <td>
                        <a href="{{ url('person/' . $item->id . '/edit') }}">
                            <button type="submit" class="btn btn-primary btn-xs">Update</button>
                        </a> /
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['person', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $person->render() !!} </div>
    </div>

@endsection
