@extends('layouts.app')

@section('content')
    @if(isset($success))
        <div class="w-full px-5 py-2 text-light bg-success mb-3 b-r" >
            <p>{{$success}}</p>
        </div>
    @endif
    <x-head-lab type="Редактировать" name="задание" />

    @foreach($missions as $key =>$mission)
    {!! Form::open(array('action' => 'App\Http\Controllers\TextbookController@missionUpdate','method'=>'PUT')) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::text('id', $mission->id, array('class' => 'form-control','hidden')) !!}
                <strong>Лабораторная работа:</strong>
                {!! Form::select('lab', $labs, $mission->lab->id,array('class' => 'form-select')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Порядок задания в лабораторной работе:</strong>
                {!! Form::number('queue', $mission->queue,array('class' => 'form-control','min'=>'1')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Текст задания:</strong>
                {!! Form::textarea('name', $mission->name,  ['placeholder' => 'Текст задания','class' => 'form-control']) !!}
            </div>
        </div>
        <div class="mt-2 col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </div>
    </div>
    {!! Form::close() !!}

    {!! Form::open(array('action' => 'App\Http\Controllers\TextbookController@missionDelete','method'=>'DELETE')) !!}
    {!! Form::text('id', $mission->id, array('class' => 'form-control','hidden')) !!}
    <div class="mt-2 col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-danger">Удалить</button>
    </div>
    {!! Form::close() !!}
    @endforeach
@endsection
