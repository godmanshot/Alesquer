
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{isset($model) ? route('teacher.update', $model) : route('teacher.store')}}">
    @csrf
    {{method_field(isset($model) ? 'PUT' : 'POST')}}
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="first_name">Фамилия</label>
            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Фамилия" value="{{isset($model) ? $model->first_name : ''}}" required>
        </div>
        <div class="form-group col-md-6">
            <label for="last_name">Имя</label>
            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Имя" value="{{isset($model) ? $model->last_name : ''}}" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="contacts">Телефон</label>
            <input type="text" class="form-control" id="contacts" name="contacts" placeholder="Телефон" value="{{isset($model) ? $model->contacts : ''}}" required>
        </div>
        <div class="form-group col-md-6">
            <label for="category">Категория</label>
            <input type="number" class="form-control" id="category" name="category" placeholder="Категория" value="{{isset($model) ? $model->category : ''}}" required>
        </div>
    </div>
    <div class="form-group">
        <label for="car">Машина</label>
        <input type="text" class="form-control" id="car" name="car" placeholder="Машина" value="{{isset($model) ? $model->car : ''}}" required>
    </div>
    <div class="form-group">
        <label for="work_time">Рабочее время</label>
        <input type="text" class="form-control" id="work_time" name="work_time" placeholder="Рабочее время" value="{{isset($model) ? $model->work_time : ''}}" required>
    </div>

    <button type="submit" class="btn btn-primary">Сохранить</button>
    <a href="{{url()->previous()}}" class="btn btn-primary">Отмена</a>
</form>