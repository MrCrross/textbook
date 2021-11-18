@extends('layouts.app')

@section('content')
    @if(isset($success))
        <div class="w-full px-5 py-2 text-light bg-success mb-3 b-r" >
            <p>{{$success}}</p>
        </div>
    @endif

    <x-head name="лекцию" />
    <x-h>
        <a class="btn btn-outline-primary" href="{{route('edit.theme')}}">Изменить лекции</a>
    </x-h>

    {!! Form::open(array('action' => 'App\Http\Controllers\TextbookController@themeCreate','method'=>'POST')) !!}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Глава:</strong>
                    {!! Form::select('header', $headers, '1',array('class' => 'form-select')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Название лекции:</strong>
                    {!! Form::text('name', null, array('placeholder' => 'Название','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Содержание лекции:</strong>
                    {!! Form::textarea('cont',null, array('placeholder' => 'Содержание лекции','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="mt-2 col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Сохранить лекцию</button>
            </div>
        </div>
    {!! Form::close() !!}
@endsection
