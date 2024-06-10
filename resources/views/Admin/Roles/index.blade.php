@extends('Admin.layout.dashboard')

@section('content')

<div class="app-content-header">
    <div class="container-fluid">
        <a href="{{ route('roles.create')}}"class="btn btn-success">Crear Rol</a>
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
                    @foreach ($role as $r)
                    <tr>
                        <td>{{ $r->id }}</td>
                        <td>{{ $r->name }}</td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
    </div>

</div>
@endsection
