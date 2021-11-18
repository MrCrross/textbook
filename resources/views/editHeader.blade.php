@extends('layouts.app')

@section('content')
    @if(isset($success))
        <div class="w-full px-5 py-2 text-light bg-success mb-3 b-r" >
            <p>{{$success}}</p>
        </div>
    @endif
    <x-head name="главу" type="Редактировать"/>

    @foreach($headers as $key=> $header)
        {!! Form::open(array('action' => 'App\Http\Controllers\TextbookController@headerUpdate','method'=>'PUT')) !!}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::text('id', $header->id, array('class' => 'form-control','hidden')) !!}
                    <strong>Глава {{++$key}}:</strong>
                    {!! Form::text('name', $header->name, array('placeholder' => 'Название','class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <strong>Место главы в учебнике:</strong>
                    {!! Form::number('queue', $header->queue, array('placeholder' => 'Место главы в учебнике','class' => 'form-control','min'=>'1')) !!}
                </div>
            </div>
            <div class="mt-2 col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </div>
        {!! Form::close() !!}
        {!! Form::open(array('action' => 'App\Http\Controllers\TextbookController@headerDelete','method'=>'DELETE')) !!}
            {!! Form::text('id', $header->id, array('class' => 'form-control','hidden')) !!}
            <div class="mt-2 col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-danger">Удалить</button>
            </div>
        {!! Form::close() !!}
    @endforeach
@endsection
