<?php

namespace App\Http\Controllers;

use App\Http\Filter\WorkerFilter;
use App\Http\Requests\Worker\IndexRequest;
use App\Http\Requests\Worker\StoreRequest;
use App\Http\Requests\Worker\UpdateRequest;
use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    function index(IndexRequest $request)
    {
        $data = $request->validated();

        $filter = app()->make(WorkerFilter::class, ['params' => $data]);
        $workerQuery = Worker::filter($filter);

        $workers = $workerQuery->paginate(4);
        return view('worker.index', compact('workers'));

    }

    function show(Worker $worker)
    {
        return view('worker.show', compact('worker'));
    }

    function create()
    {
        $this->authorize('create', Worker::class);
        return view('worker.create');
    }

    function store(StoreRequest $request)
    {

        $this->authorize('create', Worker::class);
        $data = $request->validated();

        $data['is_married'] = isset( $data['is_married']);

        Worker::create($data);

        return redirect()->route('workers.index');
    }

    function edit(Worker $worker)
    {
        $this->authorize('update', $worker);
        return view('worker.edit', compact('worker'));
    }


    function update(UpdateRequest $request, Worker $worker)
    {
        $this->authorize('update', $worker);
        $data = $request->validated();

        $data['is_married'] = isset( $data['is_married']);

        $worker->update($data);

        return redirect()->route('workers.show', $worker->id);
    }

    function destroy(Worker $worker)
    {
        $this->authorize('delete', $worker);
        $worker->delete();

        return redirect()->route('workers.index');

    }


}
