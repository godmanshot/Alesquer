
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{isset($model) ? route('record.update', $model) : route('record.store')}}">
    @csrf
    {{method_field(isset($model) ? 'PUT' : 'POST')}}
    <div class="form-group">
        <label for="person_id">Клиент</label>

        <select class="form-control" name="person_id" required>
            <option value="" selected>Выберите клиента</option>
            @foreach($persons as $person)
                <option value="{{$person->id}}" {{isset($model) && $model->person_id == $person->id ? 'selected' : ''}}>{{$person->first_name}} {{$person->last_name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="record_text">Замечания</label>
        <input type="text" class="form-control" id="record_text" name="record_text" placeholder="Замечания" value="{{isset($model) ? $model->record_text : ''}}" required>
    </div>
    <div class="form-group">
        <label for="date">Дата</label>
        <input type="date" class="form-control" id="date" name="date" value="{{isset($model) ? $model->date : ''}}" required>
    </div>

    <button type="submit" class="btn btn-primary">Сохранить</button>
    <a href="{{url()->previous()}}" class="btn btn-primary">Отмена</a>
</form>