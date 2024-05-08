<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('includes.NavBar')
</head>
<body>
    <div class="container">
        <form action="{{route('servicios.store')}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <h4>Crear nuevo servicio</h4>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Servicio" name="NOMSERV" id="NOMSERV" aria-label="Servicio" aria-describedby="basic-addon1">
            </div>
            <input type="submit" class="btn btn-success" value="Crear">
        </form>
    </div>
</body>
</html>
