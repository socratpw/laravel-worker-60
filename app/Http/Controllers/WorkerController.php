<?php

namespace App\Http\Controllers;

use App\Http\Filters\Var1\WorkerFilter;
use App\Http\Requests\Worker\IndexRequest;
use App\Http\Requests\Worker\StoreRequest;
use App\Http\Requests\Worker\UpdateRequest;
use http\QueryString;
use Illuminate\Http\Request;
use App\Models\Worker;

class WorkerController extends Controller
{

    public function index(IndexRequest $request)
    {
        $data = $request->validated(); // Данные запроса отвалидированные

        $workerQuery = Worker::query(); // Создал билдер
        $filter = new WorkerFilter($data);  // Это параметры фильтра
        $filter->applyFilter($workerQuery); // Создаю фильтр и закидываю туда Билдер
//        dd($bill->get()->toArray()); // Модифицированный запрос, но мы тут используем пагинатор.
        $workers = $workerQuery->paginate(4);




        return view('worker.index', compact('workers'));

    }

    public function show(Worker $worker)
    {

        return view('worker.show', compact('worker'));


    }

    public function create()
    {
        return view('worker.create');

    }

    public function store(StoreRequest $request)
    {
        $this->authorize('create', Worker::class);

        $data = $request->validated();
        $data['is_married'] = isset($data['is_married']);
        $data['position_id'] = 1;

        Worker::create($data);

        return redirect()->route('workers.index');

    }


    public function edit(Worker $worker)
    {
        $this->authorize('update', $worker);

        return view('worker.edit', compact('worker'));

    }

    public function update(UpdateRequest $request, Worker $worker)
    {

        $this->authorize('update', $worker);

        $data = $request->validated();
        $data['is_married'] = isset($data['is_married']);
        $data['position_id'] = 1;

        $worker->update($data);


       return redirect()->route('workers.show', $worker->id);


    }

    public function destroy(Worker $worker)
    {
        $this->authorize('update', $worker);

        $worker->delete();

        return redirect()->route('workers.index');
    }




}
