@extends('layouts.app')

@section('content')
    @if(isset($success))
        <div class="w-full px-5 py-2 text-light bg-success mb-3 b-r" >
            <p>{{$success}}</p>
        </div>
    @endif
    <x-head-lab type="Редактировать" name="лабораторную работу" />

    @foreach($labs as $key=>$lab)
    {!! Form::open(array('action' => 'App\Http\Controllers\TextbookController@labUpdate','method'=>'PUT')) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::text('id', $lab->id, array('class' => 'form-control','hidden')) !!}
                <strong>Глава:</strong>
                {!! Form::select('header', $headers, $lab->header->id,array('class' => 'form-select')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Порядок лабораторной работы:</strong>
                {!! Form::number('queue', $lab->queue,array('class' => 'form-control','min'=>'1')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Текст лабораторной работы:</strong>
                {!! Form::textarea('name', $lab->name,  ['placeholder' => 'Текст лабораторной работы','class' => 'form-control']) !!}
            </div>
        </div>
        <div class="mt-2 col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Отправить</button>
        </div>
    </div>
    {!! Form::close() !!}
    {!! Form::open(array('action' => 'App\Http\Controllers\TextbookController@labDelete','method'=>'DELETE')) !!}
    {!! Form::text('id', $lab->id, array('class' => 'form-control','hidden')) !!}
    <div class="mt-2 col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-danger">Удалить</button>
    </div>
    {!! Form::close() !!}
    @endforeach
@endsection
