<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->repository = new Course();
        $this->view_path = 'courses';
        $this->route = 'course';
        $this->rules = [
            'name' => 'required',
            'price' => 'required',
            'time_count' => 'required',
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

    public function show(Course $course)
    {
        $model = $course;

        return view($this->view_path.'.show', compact('model'));
    }

    public function edit(Course $course)
    {
        $model = $course;

        return view($this->view_path.'.edit', compact('model'));
    }

    public function update(Request $request, Course $course)
    {
        $model = $course;

        $request->validate($this->rules);

        $model->fill($request->all());

        $model->save();

        return redirect()->route($this->route.'.show', $model);
    }

    public function destroy(Course $course)
    {
        $model = $course;

        $model->delete();
        
        return redirect()->route($this->route.'.index');
    }
}
