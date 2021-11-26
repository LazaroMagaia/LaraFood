
@extends('adminlte::page')

@section('title',"Detalhes do plano {$plan->name}")
    
@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Painel de controle</a></li>
    <li class="breadcrumb-item "><a href="{{route('plans.index')}}">Planos</a></li>
    <li class="breadcrumb-item"><a href="{{route('plans.show',$plan->url)}}">{{$plan->name}}</a></li>
    <li class="breadcrumb-item active"><a href="{{route('plan.details.show',
    [$plan->url,$detail->id])}}">
    Detalhes do {{$plan->name}}</a></li>
</ol>
    <h1>Detalhes do {{$plan->name}} <a href="{{route('plan.details.create',$plan->url)}}"
         class="btn btn-dark">ADD
    <i class="fas fa-plus-square"></i></a></h1>
    
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong>{{$detail->name}}
                </li>
            </ul>
        </div><!--card-body-->
        <div class="card-footer">
            <form action="{{ route('plan.details.destroy',[$plan->url,$detail->id])}}" method="POST">
                @csrf
                @method("DELETE")
                <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i>
                    Remover </button>
            </form>
        </div><!--card-footer-->
    </div><!--card-->
@endsection