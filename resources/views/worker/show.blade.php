@extends('layout.main')
@section('content')

Index
<div>
    <hr>
        <div>
            <div>{{$worker->name}}</div>
            <div>{{$worker->surname}}</div>
            <div>{{$worker->email}}</div>
            <div>{{$worker->age}}</div>
            <div>{{$worker->description}}</div>
            <div>{{$worker->is_married}}</div>
        </div>
        <div>
            <a href="{{route('workers.index')}}">НАЗАД</a>
        </div>
            <hr>
</div>


@endsection
