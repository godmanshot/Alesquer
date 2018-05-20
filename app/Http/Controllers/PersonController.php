<?php

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function __construct()
    {
        $this->repository = new Person();
        $this->view_path = 'persons';
        $this->route = 'person';
        $this->rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'identity' => 'required',
            'contacts' => 'required',
            'date_birth' => 'required',
            'adress' => 'required',
        ];
    }

    public function index()
    {
        $models = $this->repository->all();

        return view($this->view_path.'.index', compact('models'));
    }

    public function create()
    {
        return view($this->view_path.'.create');
    }

    public function store(Request $request)
    {
        $request->validate($this->rules);

        $model = $this->repository->create($request->all());

        return redirect()->route($this->route.'.show', $model);
    }

    public function show(Person $person)
    {
        $model = $person;

        return view($this->view_path.'.show', compact('model'));
    }

    public function edit(Person $person)
    {
        $model = $person;

        return view($this->view_path.'.edit', compact('model'));
    }

    public function update(Request $request, Person $person)
    {
        $model = $person;

        $request->validate($this->rules);

        $model->fill($request->all());

        $model->save();

        return redirect()->route($this->route.'.show', $model);
    }

    public function destroy(Person $person)
    {
        $model = $person;

        $model->delete();
        
        return redirect()->route($this->route.'.index');
    }
}
