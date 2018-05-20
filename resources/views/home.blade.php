@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Главная</div>

                <div class="card-body">
                    <h3>Список записей на курсы</h3>

                    @if(count($records))

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
                                @foreach($records as $record)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>{{$record->person->first_name}} {{$record->person->last_name}}</td>
                                        <td>{{$record->person->contacts}}</td>
                                        <td>{{$record->record_text}}</td>
                                        <td>{{$record->date}}</td>
                                        <td>

                                            <a href="{{route('application.record', $record)}}">Принять</a>

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

                    <h3>Последние записанные клиенты</h3>

                    @if(count($applications))

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Клиента</th>
                                    <th scope="col">Телефон клиента</th>
                                    <th scope="col">Курс</th>
                                    <th scope="col">Учитель</th>
                                    <th scope="col">Дата</th>
                                    <th scope="col">Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($applications as $application)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>{{$application->person->first_name}} {{$application->person->last_name}}</td>
                                        <td>{{$application->person->contacts}}</td>
                                        <td>{{$application->course->name}}</td>
                                        <td>{{$application->teacher->first_name}} {{$application->teacher->last_name}}</td>
                                        <td>{{$application->created_at->diffForHumans()}}</td>
                                        <td>
                                            <form action="{{ route('application.destroy', $application) }}" method="POST" style="display: inline;">{{ csrf_field() }} {{ method_field('delete') }}
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
