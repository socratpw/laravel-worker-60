@extends('layout.main')
@section('content')




Index
<div>
    <div style="margin: 15px;">
        <a href="{{route('worker.create')}}" class="btn btn-sm btn-primary">Добавить</a>

        <hr>
    </div>
    <div>
        <form action="{{ route('worker.index') }}" class="worker-form">
            <input type="text" name="name" placeholder="name" value="{{ request()->get('name') }}">
            <input type="text" name="surname" placeholder="surname" value="{{ request()->get('surname') }}">
            <input type="text" name="email" placeholder="email" value="{{ request()->get('email') }}">
            <input type="number" name="from" placeholder="from" value="{{ request()->get('from') }}">
            <input type="number" name="to" placeholder="to" value="{{ request()->get('to') }}">
            <input type="text" name="description" placeholder="description">
            <input id="married" type="checkbox" name="is_married">
            <label for="married">Is married</label
            {{ request()->get('is_married') == 'on' ? 'checked' : '' }}
            >

            <input type="submit" value="Найти">
            <a href='{{ route('worker.index') }}' class="btn btn-sm btn-primary">Сбросить</a>

        </form>

    </div>
    <hr>
    @foreach($workers as $worker)
        <div class="border rounded p-3 mb-2 bg-light d-flex justify-content-between align-items-center">
            Имя: {{$worker->name}} <br>
            Фамилия: {{$worker->surname}} <br>
            Почта: {{$worker->email}} <br>
            Возраст: {{$worker->age}} <br>
            Характер: {{$worker->description}} <br>
            Семейное положение: {{$worker->is_married}} <br>
        </div>
        <div class="border rounded p-3 mb-2 bg-light">
            <a href="{{route('worker.show', $worker->id )}}" class="btn btn-sm btn-primary">Просмотреть</a>
            <a href="{{route('worker.edit', $worker->id )}}"  class="btn btn-sm btn-warning">Редактировать</a>
            <form action=" {{route('worker.delete', $worker->id)}} " method="post" class="d-inline">
                @csrf
                @method('DELETE')
                <input type="submit" value="Удалить" class="d-inline-block align-middle" >

            </form>
        </div>
            <hr>
  @endforeach
</div>
<div class="nav">
    {{ $workers->withQueryString()->links('pagination::bootstrap-5') }}
</div>



    @endsection
