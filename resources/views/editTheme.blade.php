@extends('layouts.app')

@section('content')
    @if(isset($success))
        <div class="w-full px-5 py-2 text-light bg-success mb-3 b-r" >
            <p>{{$success}}</p>
        </div>
    @endif
    <x-head name="лекцию" type="Редактировать"/>

    @foreach($themes as $key=> $theme)
        {!! Form::open(array('action' => 'App\Http\Controllers\TextbookController@themeUpdate','method'=>'PUT')) !!}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::text('id', $theme->id, array('class' => 'form-control','hidden')) !!}
                    <strong>Глава :</strong>
                    {!! Form::select('header', $headers, $theme->header->id,array('class' => 'form-select')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Название лекции:</strong>
                    {!! Form::text('name', $theme->name, array('placeholder' => 'Название','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Содержание лекции:</strong>
                    {!! Form::textarea('cont',$theme->content, array('placeholder' => 'Содержание лекции','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="mt-2 col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Сохранить</button>

            </div>
        </div>
        {!! Form::close() !!}
        {!! Form::open(array('action' => 'App\Http\Controllers\TextbookController@themeDelete','method'=>'DELETE')) !!}
        {!! Form::text('id', $theme->id, array('class' => 'form-control','hidden')) !!}
        <div class="mt-2 col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-danger">Удалить</button>
        </div>
        {!! Form::close() !!}
    @endforeach
@endsection
