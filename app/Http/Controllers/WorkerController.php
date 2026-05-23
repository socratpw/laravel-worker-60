<?php

namespace App\Http\Controllers;

use App\Http\Filters\Var1\WorkerFilter;
use App\Http\Filters\Var2\Worker\AgeFrom;
use App\Http\Filters\Var2\Worker\AgeTo;
use App\Http\Filters\Var2\Worker\Name;
use App\Http\Requests\Worker\IndexRequest;
use App\Http\Requests\Worker\StoreRequest;
use App\Http\Requests\Worker\UpdateRequest;
use http\QueryString;
use Illuminate\Http\Request;
use App\Models\Worker;
use Illuminate\Pipeline\Pipeline;

class WorkerController extends Controller
{

    public function index(IndexRequest $request)
    {
//        $data = $request->validated(); // Данные запроса отвалидированные
////      $filter = new WorkerFilter($data);  // Это параметры фильтра


        $workers = app()->make(Pipeline::class)
            ->send(Worker::query())
            ->through([
                AgeFrom::class,
                AgeTo::class,
                Name::class,
            ]) // Означает - пройди по след. фильтрам
            ->thenReturn();


//        $filter = app()->make(WorkerFilter::class, ['params' => $data]);
//        $workerQuery = Worker::filter($filter);


        $workers = $workers->paginate(4);




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
