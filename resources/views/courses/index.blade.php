@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Курсы</div>

                <div class="card-body">

                    <a href="{{route('course.create')}}"><button type="button" class="btn btn-primary" style="margin-bottom: 20px;">Создать</button></a>

                    @if(count($models))

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Название</th>
                                    <th scope="col">Цена</th>
                                    <th scope="col">Кол. часов</th>
                                    <th scope="col">Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($models as $model)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>{{$model->name}}</td>
                                        <td>{{$model->price}}</td>
                                        <td>{{$model->time_count}}</td>
                                        <td>

                                            <a href="{{route('course.show', $model)}}">Посмотреть</a>
                                            <br>
                                            <a href="{{route('course.edit', $model)}}">Редактировать</a>
                                            <br>
                                            <form action="{{ route('course.destroy', $model) }}" method="POST" style="display: inline;">{{ csrf_field() }} {{ method_field('delete') }}
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
