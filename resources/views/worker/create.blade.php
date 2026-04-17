@extends('layout.main')
@section('content')


Create page
<hr>
<div>
    <form action="{{route('worker.store')}}" method="post"> <style>input, textarea {border: 2px #000 solid; margin-bottom: 10px;}</style>
       @csrf
        <input type="text" name="name" placeholder="name" value="{{old('name')}}">
        @error('name')
            {{$message}}
        @enderror
        <br>
        <input type="text" name="surname" placeholder="surname" value="{{old('surname')}}">
        @error('surname')
            {{$message}}
        @enderror
        <br>
        <input type="email" name="email" placeholder="email" value="{{old('email')}}">
        @error('email')
            {{$message}}
        @enderror
        <br>
        <input type="number" name="age" placeholder="age" value="{{old('age')}}">
        @error('age')
            {{$message}}
        @enderror
        <br>
        <textarea name="description">{{old('description')}}</textarea>
        @error('description')
            {{$message}}
        @enderror
        <br>
        <input
            {{old('is_married') == 'on' ? 'checked' : ''}}
            id="married" type="checkbox" name="is_married">

        <label for="married" >is_married </label>
            @error('is_married')
        {{$message}}
        @enderror
        <br>
        <input type="submit" value="Добавить">
    </form>

    <hr>
    <div>
        <a href="{{route('worker.index')}}">Назад</a>
    </div>

</div>

@endsection
