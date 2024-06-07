@extends('Admin.layout.dashboard')
@section('content')
<div class="app-content-header">
    <div class="container-fluid">
            <a href="{{ route('perm.create')}}"class="btn btn-success">Crear permiso</a>
            <table class="table table-striped" id="example">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Titulo</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Titulo</th>
                    </tr>
                </tfoot>
                    <tbody>
                        @foreach ($permission as $p)
                        <tr>
                            <td>{{ $p->id }}</td>
                            <td>{{ $p->name }}</td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
    </div>
@endsection
