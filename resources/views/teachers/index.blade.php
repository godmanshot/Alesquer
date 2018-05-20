@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Учителя</div>

                <div class="card-body">

                    <a href="{{route('teacher.create')}}"><button type="button" class="btn btn-primary" style="margin-bottom: 20px;">Создать</button></a>

                    @if(count($models))

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Ф.И.О.</th>
                                    <th scope="col">Телефон</th>
                                    <th scope="col">Категория</th>
                                    <th scope="col">Машина</th>
                                    <th scope="col">Раб. время</th>
                                    <th scope="col">Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($models as $model)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>{{$model->first_name}} {{$model->last_name}}</td>
                                        <td>{{$model->contacts}}</td>
                                        <td>{{$model->category}}</td>
                                        <td>{{$model->car}}</td>
                                        <td>{{$model->work_time}}</td>
                                        <td>

                                            <a href="{{route('teacher.show', $model)}}">Посмотреть</a>
                                            <br>
                                            <a href="{{route('teacher.edit', $model)}}">Редактировать</a>
                                            <br>
                                            <form action="{{ route('teacher.destroy', $model) }}" method="POST" style="display: inline;">{{ csrf_field() }} {{ method_field('delete') }}
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
