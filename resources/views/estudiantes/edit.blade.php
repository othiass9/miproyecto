
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Estudiante</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
@inject('clases', 'App\Services\ListClases')
<body>
            <h2>Editar Estudiante</h2>
            
            <form action="{{ url('/estudiantes/'. $estudiantes->id)}}" method="POST" >
                {{ csrf_field() }}
                {{ method_field('PATCH')}}
              
              <div class="form-group col-4">
                <label for="Nombre">{{'Nombre'}}</label>
                <input type="text" class="form-control" name="nombre_estudiante" id="nombre_estudiante" value="{{$estudiantes->nombre_estudiante}}" required>
              </div>
              <div class="form-group col-4">
                <label for="clase">{{'Clase'}}</label>
                <select v-model="selected_clase"  class="form-control" id="clases" data-old="{{ old('id') }}"name="clases" class="form-control{{ $errors->has('id') ? ' is-invalid' : '' }} " required>
                    @foreach($clases->get() as $index => $clase)
                    
                        <option value="{{ $index }}" @if($estudiantes->clases=== $index) selected='selected' @endif>{{ $clase }}
                        </option>
                    @endforeach
            </select>
              </div>
              <div class="form-group col-4">
                <label for="Fecha">{{'Fecha Nacimiento'}}</label>
                <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" value="{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $estudiantes->fecha_nacimiento)->format('Y-m-d')}}" required>    
              </div>
              <div class="form-group col-4" >
                <input type="submit" class="btn btn-primary" value="Editar">
              </div>
              </form>
              <form class="col-4"action="{{url ('estudiantes')}}">
                <input class="btn btn-secondary" type="submit" value="Volver" />
              </form>

              
    </body>
 

</html>
