@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Записи</div>

                <div class="card-body">

                    <a href="{{route('record.create')}}"><button type="button" class="btn btn-primary" style="margin-bottom: 20px;">Создать</button></a>

                    @if(count($models))

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Ф.И.О. клиента</th>
                                    <th scope="col">Телефон клиента</th>
                                    <th scope="col">Замечания</th>
                                    <th scope="col">Дата</th>
                                    <th scope="col">Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($models as $model)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>{{$model->person->first_name}} {{$model->person->last_name}}</td>
                                        <td>{{$model->person->contacts}}</td>
                                        <td>{{$model->record_text}}</td>
                                        <td>{{$model->date}}</td>
                                        <td>

                                            <a href="{{route('record.show', $model)}}">Посмотреть</a>
                                            <br>
                                            <a href="{{route('record.edit', $model)}}">Редактировать</a>
                                            <br>
                                            <form action="{{ route('record.destroy', $model) }}" method="POST" style="display: inline;">{{ csrf_field() }} {{ method_field('delete') }}
                                                <a href="javascript:;" onclick="confirm('Вы уверены?') ? parentNode.submit() : false;"> Удалить </a>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    @else

                        <div class="alert alert-info" role="alert">
                            <h5>Пусто!</h5>
                        </div>

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
