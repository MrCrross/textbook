@props(['name'=>'главу','type'=>'Добавить'])
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="float-start">
            <h2>{{$type}} {{$name}}</h2>
        </div>
        <div class="float-end">
            <a class="btn btn-outline-primary" href="{{route('create.theme')}}">Добавить лекцию</a>
        </div>
    </div>
</div>
