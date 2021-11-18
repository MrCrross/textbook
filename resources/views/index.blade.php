@extends('layouts.app')

@section('content')
    <div class="d-inline-flex w-100 ">
        <div class="col-3" style="margin-right: 15px">
            <div class="accordion">
                @foreach($headers as $header)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading{{$header->id}}">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$header->id}}" aria-expanded="false" aria-controls="collapse{{$header->id}}">
                                {{$header->name}}
                            </button>
                        </h2>
                        <div id="collapse{{$header->id}}" class="accordion-collapse collapse" aria-labelledby="heading{{$header->id}}">
                            <div class="accordion-body">
                                <div class="list-group">
                                    <a class="list-group-item" href="/headers/{{$header->id}}">{{$header->name}}</a>
                                    @foreach($header->themes as $theme)
                                        <a class="list-group-item" href="/themes/{{$theme->id}}">
                                            {{$theme->name}}
                                        </a>
                                    @endforeach
                                    @foreach($header->labs as $lab)
                                        <a class="list-group-item" href="/labs/{{$lab->id}}">
                                            {{$lab->name}}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-9">
            @foreach($headers as $header)
                <h5>{{$header->name}}</h5>
                @foreach($header->themes as $theme)
                    <strong>{{$theme->name}}</strong>
                    <p>{{$theme->content}}</p>
                @endforeach
                @foreach($header->labs as $lab)
                    <strong class="d-block">{{$lab->name}}</strong>
                    @foreach($lab->missions as $mission)
                        <strong class="d-block">{{$mission->name}}</strong>
                        @foreach($mission->steps as $keyStep=>$step)
                            <strong>{{++$keyStep."."}}</strong>
                            <span>{{$step->name}}</span>
                            @if($step->img)
                                <img class="d-block" src="{{asset('/storage/'.$step->img)}}" alt="">
                            @endif
                        @endforeach
                    @endforeach
                @endforeach
            @endforeach
        </div>
    </div>
@endsection
