<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Crear Estudiante</title>
</head>

    @inject('clases', 'App\Services\ListClases')
<body>

    <h2>Ingresar Estudiante</h2> 
     
    <form action="{{ url('estudiantes')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
          
          <div class="form-group col-4">
            <label for="Nombre">{{'Nombre'}}</label>
            <input type="text" class="form-control" name="nombre_estudiante" id="nombre_estudiante" value="" required>
          </div>
          <div class="form-group col-4">
                <label for="clase">{{'Clase'}}</label>
                <!-- lleno el select con las clases -->
                <select class="form-control" v-model="selected_clase"  id="clases" data-old="{{ old('id') }}"name="clases" class="form-control{{ $errors->has('id') ? ' is-invalid' : '' }}" required>
                    @foreach($clases->get() as $index => $clase)
                        <option value="{{ $index }}">
                            {{ $clase }}
                        </option>
                    @endforeach
                </select> 
          </div>
          <div class="form-group col-4">
            <label for="Fecha">{{'Fecha Nacimiento'}}</label>
            <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" value="" required>
          </div>
          <div class="form-group col-4" >
            <input type="submit" class="btn btn-primary" value="agregar">
          </div>
          </form>
          <form class="col-4"action="{{url ('estudiantes')}}">
            <input class="btn btn-secondary" type="submit" value="Volver" />
          </form>
    
</body>
</html>
