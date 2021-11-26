
@extends('adminlte::page')

@section('title','plans')
    
@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Painel de controle</a></li>
    <li class="breadcrumb-item active"><a href="{{route('plans.index')}}">Planos</a></li>
</ol>
    <h1>Planos <a href="{{route('plans.create')}}" class="btn btn-dark">ADD
    <i class="fas fa-plus-square"></i></a></h1>
    
@stop

@section('content')
    <div class="card">
        <div class="card-header">
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
                        <th>Preço</th>
                        <th style="width: 250px">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($plans as $plan)
                        <tr>
                            <td>
                                {{$plan->name}}
                            </td>
                            <td>
                                MZN {{number_format($plan->price,2,',','.')}}
                            </td>
                            <td style="width:10px;">
                                <a href="{{route('plans.edit',$plan->url)}}" class="btn btn-info">
                                    Editar</a>
                                <a href="{{route('plans.show',$plan->url)}}" class="btn btn-warning">
                                Ver</a>
                                <a href="{{route('plan.details.index',$plan->url)}}" class="btn btn-primary">
                                Detalhes</a>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $plans->appends($filters)->links() !!}
                @else
                {!! $plans->links() !!}
            @endif
            
        </div>
    </div>
@endsection