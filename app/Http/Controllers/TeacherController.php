<?php

namespace App\Http\Controllers;

use App\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function __construct()
    {
        $this->repository = new Teacher();
        $this->view_path = 'teachers';
        $this->route = 'teacher';
        $this->rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'contacts' => 'required',
            'category' => 'required',
            'car' => 'required',
            'work_time' => 'required',
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

    public function show(Teacher $teacher)
    {
        $model = $teacher;

        return view($this->view_path.'.show', compact('model'));
    }

    public function edit(Teacher $teacher)
    {
        $model = $teacher;

        return view($this->view_path.'.edit', compact('model'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $model = $teacher;

        $request->validate($this->rules);

        $model->fill($request->all());

        $model->save();

        return redirect()->route($this->route.'.show', $model);
    }

    public function destroy(Teacher $teacher)
    {
        $model = $teacher;

        $model->delete();

        return redirect()->route($this->route.'.index');
    }
}
