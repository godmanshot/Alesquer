
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{isset($model) ? route('course.update', $model) : route('course.store')}}">
    @csrf
    {{method_field(isset($model) ? 'PUT' : 'POST')}}
    <div class="form-group">
        <label for="name">Название</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Название" value="{{isset($model) ? $model->name : ''}}" required>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="time_count">Количество часов</label>
            <input type="number" class="form-control" id="time_count" name="time_count" placeholder="Количество часов" value="{{isset($model) ? $model->time_count : ''}}" required>
        </div>
        <div class="form-group col-md-6">
            <label for="price">Цена</label>
            <input type="number" class="form-control" id="price" name="price" placeholder="Цена" value="{{isset($model) ? $model->price : ''}}" required>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Сохранить</button>
    <a href="{{url()->previous()}}" class="btn btn-primary">Отмена</a>
</form>