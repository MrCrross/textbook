@extends('layouts.app')

@section('content')
    <div class="d-inline-flex w-100 ">
        <div class="col-3" style="margin-right: 15px">
            <div class="accordion">
                @foreach($headers as $head)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading{{$head->id}}">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$head->id}}" aria-expanded="false" aria-controls="collapse{{$head->id}}">
                                {{$head->name}}
                            </button>
                        </h2>
                        <div id="collapse{{$head->id}}" class="accordion-collapse collapse" aria-labelledby="heading{{$head->id}}">
                            <div class="accordion-body">
                                <div class="list-group">
                                    <a class="list-group-item" href="/headers/{{$head->id}}">{{$head->name}}</a>
                                    @foreach($head->themes as $theme)
                                        <a class="list-group-item" href="/themes/{{$theme->id}}">
                                            {{$theme->name}}
                                        </a>
                                    @endforeach
                                    @foreach($head->labs as $lab)
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
            @foreach($header as $h)
                <h5>{{$h->name}}</h5>
                @foreach($h->themes as $theme)
                    <strong>{{$theme->name}}</strong>
                    <p>{{$theme->content}}</p>
                @endforeach
            @endforeach
        </div>
    </div>
@endsection
