@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Lista de Notas para {{auth()->user()->name}}</span>
                    <a href="/notas/create" class="btn btn-primary btn-sm">Nueva Nota</a>
                </div>

                <div class="card-body">
                @if ( session('mensaje') )
                    <div class="alert alert-danger">{{ session('mensaje') }}</div>
                  @endif      
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($notas as $nota)
                            <tr>
                                <th scope="row">{{ $nota->id }}</th>
                                <td>{{ $nota->nombre }}</td>
                                <td>{{ $nota->descripcion }}</td>
                                <td>
                                	<form class="d-inline" action="{{ route('notas.destroy' , $nota->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                    </form>
                                	<a href="/notas/{{ $nota->id }}/edit" class="btn btn-sm btn-warning">Actualizar</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$notas->links()}}
                {{-- fin card body --}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection