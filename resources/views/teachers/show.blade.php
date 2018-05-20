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
                            <td>Ф.И.О.</td>
                            <td>{{$model->first_name}} {{$model->last_name}}</td>
                        </tr>
                        <tr>
                            <td>Телефон</td>
                            <td>{{$model->contacts}}</td>
                        </tr>
                        <tr>
                            <td>Категория</td>
                            <td>{{$model->category}}</td>
                        </tr>
                        <tr>
                            <td>Машина</td>
                            <td>{{$model->car}}</td>
                        </tr>
                        <tr>
                            <td>Рабочее время</td>
                            <td>{{$model->work_time}}</td>
                        </tr>
                      </tbody>
                    </table>
                    

                    <a href="{{route('teacher.edit', $model)}}"><button type="button" class="btn btn-primary">Редактировать</button></a>
                    <a href="{{route('teacher.index')}}" class="btn btn-primary">К списку</a>
                    <form action="{{ route('teacher.destroy', $model) }}" method="POST" style="display: inline;">{{ csrf_field() }} {{ method_field('delete') }}
                        <a href="javascript:;" onclick="confirm('Вы уверены?') ? parentNode.submit() : false;"><button type="button" class="btn btn-danger">Удалить</button></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
