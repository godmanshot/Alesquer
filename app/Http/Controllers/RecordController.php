<?php

namespace App\Http\Controllers;

use App\Person;
use App\Record;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function __construct()
    {
        $this->repository = new Record();
        $this->view_path = 'records';
        $this->route = 'record';
        $this->rules = [
            'person_id' => 'required',
            'record_text' => 'required',
            'date' => 'required',
        ];
    }

    public function index()
    {
        $models = $this->repository->all();

        return view($this->view_path.'.index', compact('models'));
    }

    public function create()
    {
        $persons = Person::all();
        return view($this->view_path.'.create', compact('persons'));
    }

    public function store(Request $request)
    {
        $request->validate($this->rules);

        $model = $this->repository->create($request->all());

        return redirect()->route($this->route.'.show', $model);
    }

    public function show(Record $record)
    {
        $model = $record;

        return view($this->view_path.'.show', compact('model'));
    }

    public function edit(Record $record)
    {
        $model = $record;
        $persons = Person::all();

        return view($this->view_path.'.edit', compact('model', 'persons'));
    }

    public function update(Request $request, Record $record)
    {
        $model = $record;

        $request->validate($this->rules);

        $model->fill($request->all());

        $model->save();

        return redirect()->route($this->route.'.show', $model);
    }

    public function destroy(Record $record)
    {
        $model = $record;

        $model->delete();

        return redirect()->route($this->route.'.index');
    }
}
