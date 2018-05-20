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
                            <td>{{$model->person->first_name}} {{$model->person->last_name}}</td>
                        </tr>
                        <tr>
                            <td>Дата</td>
                            <td>{{$model->date}}</td>
                        </tr>
                        <tr>
                            <td>Замечания</td>
                            <td>{{$model->record_text}}</td>
                        </tr>
                      </tbody>
                    </table>
                    

                    <a href="{{route('record.edit', $model)}}"><button type="button" class="btn btn-primary">Редактировать</button></a>
                    <a href="{{route('record.index')}}" class="btn btn-primary">К списку</a>
                    <form action="{{ route('record.destroy', $model) }}" method="POST" style="display: inline;">{{ csrf_field() }} {{ method_field('delete') }}
                        <a href="javascript:;" onclick="confirm('Вы уверены?') ? parentNode.submit() : false;"><button type="button" class="btn btn-danger">Удалить</button></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
