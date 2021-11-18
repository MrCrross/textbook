@extends('layouts.app')

@section('content')
    @if(isset($success))
        <div class="w-full px-5 py-2 text-light bg-success mb-3 b-r" >
            <p>{{$success}}</p>
        </div>
    @endif
    @if(isset($error))
        <div class="w-full px-5 py-2 text-light bg-danger mb-3 b-r" >
            <p>{{$error}}</p>
        </div>
    @endif
    <x-head name="главу"/>

    <x-h>
        <a class="btn btn-outline-primary" href="{{route('edit.header')}}">Изменить главы</a>
    </x-h>

    {!! Form::open(array('action' => 'App\Http\Controllers\TextbookController@headerCreate','method'=>'POST')) !!}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Название главы:</strong>
                    {!! Form::text('name', null, array('placeholder' => 'Название','class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <strong>Место главы в учебнике:</strong>
                    {!! Form::number('queue', 1, array('placeholder' => 'Место главы в учебнике','class' => 'form-control','min'=>'1')) !!}
                </div>
            </div>
            <div class="mt-2 col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </div>
    {!! Form::close() !!}
@endsection
