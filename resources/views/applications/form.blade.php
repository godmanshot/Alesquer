
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{isset($model) ? route('application.update', $model) : route('application.store')}}">
    @csrf
    {{method_field(isset($model) ? 'PUT' : 'POST')}}
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Клиент</label>
        <label for="staticEmail" class="col-sm-2 col-form-label">{{$record->person->first_name}} {{$record->person->last_name}}</label>
    </div>
    <div class="form-group">
        <label for="course_id">Курс</label>
        <select class="form-control" name="course_id" required>
            <option value="" selected>Выберите курс</option>
            @foreach($courses as $course)
                <option value="{{$course->id}}" {{isset($model) && $model->course_id == $course->id ? 'selected' : ''}}>{{$course->name}}</option>
            @endforeach
        </select>
    </div>
    <input type="hidden" name="record_id" value="{{$record->id}}">
    <input type="hidden" name="person_id" value="{{$record->person->id}}">

    <button type="submit" class="btn btn-primary">Сохранить</button>
    <a href="{{url()->previous()}}" class="btn btn-primary">Отмена</a>
</form>