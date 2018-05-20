
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{isset($model) ? route('person.update', $model) : route('person.store')}}">
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
    <div class="form-group">
        <label for="identity">ИИН</label>
        <input type="number" class="form-control" id="identity" name="identity" placeholder="ИИН" value="{{isset($model) ? $model->identity : ''}}" required>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="contacts">Телефон</label>
            <input type="text" class="form-control" id="contacts" name="contacts" placeholder="Телефон" value="{{isset($model) ? $model->contacts : ''}}" required>
        </div>
        <div class="form-group col-md-6">
            <label for="date_birth">Дата рождения</label>
            <input type="date" class="form-control" id="date_birth" name="date_birth" value="{{isset($model) ? $model->date_birth : ''}}" required>
        </div>
    </div>
    <div class="form-group">
        <label for="adress">Адрес</label>
        <input type="text" class="form-control" id="adress" name="adress" placeholder="Адрес" value="{{isset($model) ? $model->adress : ''}}" required>
    </div>

    <button type="submit" class="btn btn-primary">Сохранить</button>
    <a href="{{url()->previous()}}" class="btn btn-primary">Отмена</a>
</form>