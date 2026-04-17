@extends('layout.main')
@section('content')

Create page
<hr>
<div>
    <form action="{{route('worker.update', $worker->id)}}" method="post"> <style>input, textarea {border: 2px #000 solid; margin-bottom: 10px;}</style>
       @csrf
        @method('Patch')
        <input type="text" name="name" placeholder="name" value="{{old('name') ?? $worker->name}}">
        @error('name')
            {{$message }}
        @enderror
        <br>
        <input type="text" name="surname" placeholder="surname" value="{{old('surname') ?? $worker->surname}}">
        @error('surname')
             {{$message }}
        @enderror
        <br>
        <input type="email" name="email" placeholder="email" value="{{old('email') ?? $worker->email}}">
        @error('email')
            {{$message }}
        @enderror
        <br>
        <input type="number" name="age" placeholder="age" value="{{old('age') ?? $worker->age}}">
        @error('age')
            {{$message }}
        @enderror
        <br>
        <textarea name="description"> {{ old('description') ?? $worker->description }} </textarea>
        @error('description')
            {{$message }}
        @enderror
        <br>
        <input id="married" type="checkbox" name="is_married"
            {{ $worker->is_married ? 'checked' : '' }}
        >
        <label for="married">is_married</label>
        <br>
        <input type="submit" value="Сохранить">
    </form>
    <hr>
    <div>
        <a href="{{route('worker.index')}}">Назад</a>
    </div>

</div>


@endsection
