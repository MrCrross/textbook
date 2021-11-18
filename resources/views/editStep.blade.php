@extends('layouts.app')

@section('content')
    @if(isset($success))
        <div class="w-full px-5 py-2 text-light bg-success mb-3 b-r" >
            <p>{{$success}}</p>
        </div>
    @endif
    <x-head-lab type="Редактировать" name="этапы" />

    @foreach($steps as $key => $step)
    {!! Form::open(array('action' => 'App\Http\Controllers\TextbookController@stepUpdate','method'=>'POST')) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::text('id', $step->id, array('class' => 'form-control','hidden')) !!}
                <strong>Задание:</strong>
                {!! Form::select('mission', $missions, $step->lab_mission_id,array('class' => 'form-select')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Порядок этапа в задании:</strong>
                {!! Form::number('queue', $step->queue,array('class' => 'form-control','min'=>'1')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Текст этапа:</strong>
                {!! Form::textarea('name', $step->name,  ['placeholder' => 'Текст задания','class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                @if($step->img !== null)
                    <img class="d-block" src="{{asset('storage/'.$step->img)}}" alt="">
                @endif
                <strong>Изображение (если нужно):</strong>
                {!! Form::file('image',  ['class' => 'form-control','accept'=>'image/png, image/jpeg']) !!}
            </div>
        </div>
        <div class="mt-2 col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </div>
    </div>
    {!! Form::close() !!}
    {!! Form::open(array('action' => 'App\Http\Controllers\TextbookController@stepDelete','method'=>'DELETE')) !!}
    {!! Form::text('id', $step->id, array('class' => 'form-control','hidden')) !!}
        <div class="mt-2 col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-danger">Удалить</button>
        </div>
    {!! Form::close() !!}
    @endforeach
@endsection
