@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">ID записи: {{$model->id}}</div>

                <div class="card-body">
                    
                    <table class="table table-bordered">
                      <tbody>
                        <tr>
                            <td>Название</td>
                            <td>{{$model->name}}</td>
                        </tr>
                        <tr>
                            <td>Цена</td>
                            <td>{{$model->price}}</td>
                        </tr>
                        <tr>
                            <td>Количество часов</td>
                            <td>{{$model->time_count}}</td>
                        </tr>
                      </tbody>
                    </table>
                    

                    <a href="{{route('course.edit', $model)}}"><button type="button" class="btn btn-primary">Редактировать</button></a>
                    <a href="{{route('course.index')}}" class="btn btn-primary">К списку</a>
                    <form action="{{ route('course.destroy', $model) }}" method="POST" style="display: inline;">{{ csrf_field() }} {{ method_field('delete') }}
                        <a href="javascript:;" onclick="confirm('Вы уверены?') ? parentNode.submit() : false;"><button type="button" class="btn btn-danger">Удалить</button></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
