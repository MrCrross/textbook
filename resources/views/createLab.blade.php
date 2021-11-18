@extends('layouts.app')

@section('content')
    @if(isset($success))
        <div class="w-full px-5 py-2 text-light bg-success mb-3 b-r" >
            <p>{{$success}}</p>
        </div>
    @endif
    <x-head-lab name="лабораторную работу" />

    <x-h>
        <a class="btn btn-outline-primary" href="{{route('edit.lab')}}">Изменить лабораторные работы</a>
    </x-h>

    {!! Form::open(array('action' => 'App\Http\Controllers\TextbookController@labCreate','method'=>'POST')) !!}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Глава:</strong>
                    {!! Form::select('header', $headers, null,array('class' => 'form-select')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Порядок лабораторной работы:</strong>
                    {!! Form::number('queue', 1,array('class' => 'form-control','min'=>'1')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Текст лабораторной работы:</strong>
                    {!! Form::textarea('name', null,  ['placeholder' => 'Текст лабораторной работы','class' => 'form-control']) !!}
                </div>
            </div>
            <div class="mt-2 col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Отправить</button>
            </div>
        </div>
    {!! Form::close() !!}
@endsection
