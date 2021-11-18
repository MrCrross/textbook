@extends('layouts.app')

@section('content')
    @if(isset($success))
        <div class="w-full px-5 py-2 text-light bg-success mb-3 b-r" >
            <p>{{$success}}</p>
        </div>
    @endif
    <x-head-lab name="задание"/>
    <x-h>
        <a class="btn btn-outline-primary" href="{{route('edit.mission')}}">Изменить задания</a>
    </x-h>
    {!! Form::open(array('action' => 'App\Http\Controllers\TextbookController@missionCreate','method'=>'POST')) !!}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Лабораторная работа:</strong>
                    {!! Form::select('lab', $labs, null,array('class' => 'form-select')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Порядок задания в лабораторной работе:</strong>
                    {!! Form::number('queue', 1,array('class' => 'form-control','min'=>'1')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Текст задания:</strong>
                    {!! Form::textarea('name', null,  ['placeholder' => 'Текст задания','class' => 'form-control']) !!}
                </div>
            </div>
            <div class="mt-2 col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </div>
    {!! Form::close() !!}
@endsection
