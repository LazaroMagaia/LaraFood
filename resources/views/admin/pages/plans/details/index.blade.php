
@extends('adminlte::page')

@section('title',"Detalhes do plano {$plan->name}")
    
@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Painel de controle</a></li>
    <li class="breadcrumb-item "><a href="{{route('plans.index')}}">Planos</a></li>
    <li class="breadcrumb-item"><a href="{{route('plans.show',$plan->url)}}">{{$plan->name}}</a></li>
    <li class="breadcrumb-item active"><a href="{{route('plan.details.index',$plan->url)}}">
    Detalhes</a></li>
</ol>
    <h1>Detalhes do {{$plan->name}} <a href="{{route('plan.details.create',$plan->url)}}"
         class="btn btn-dark">ADD
    <i class="fas fa-plus-square"></i></a></h1>
    
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            @include('admin.includes.alerts')
            <form action="{{route('plans.search')}}" method="POST">
                @csrf
                <input type="text" name="filter" placeholder="Precuro por ..." 
                class="form-control" value="{{$filters['filter'] ?? ''}}">
                <button type="submit" class="btn btn-primary my-1">Procurar</button>
            </form>

        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th style="width: 200px;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($details as $detail)
                        <tr>
                            <td>
                                {{$detail->name}}
                            </td>
                            <td style="width:10px;">
                                <a href="{{route('plan.details.edit',[$plan->url,$detail->id])}}" class="btn btn-info">
                                    Editar</a>
                                <a href="{{route('plan.details.show',[$plan->url,$detail->id])}}" 
                                    class="btn btn-warning">
                                Ver</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $details->appends($filters)->links() !!}
                @else
                {!! $details->links() !!}
            @endif
            
        </div>
    </div>
@endsection