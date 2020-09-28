<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Estudiantes</title>
<link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<br>
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <form  action="{{url ('estudiantes/create')}}">
          <input type="submit" class="btn btn-info" value="Agregar Estudiante" />
      </form>
      </div>
      <div class="col-sm-6">
        <form  action="{{url ('clases/')}}">
          <input type="submit" class="btn btn-info" value="Agregar Clase" />
      </form>
      </div>
    </div>
  </div>

  
  <br>

   <div > 

  <br>
   </div>
   <div  role="alert">
        @include('flash-message')
   </div>
   
    <table class="table" >
      <thead class="thead-light">  
        <tr>
            <th scope="col">Nombre estudiante</th>
            <th>clase</th>
            <th>Fecha nacimiento</th>
            <th></th>
        </tr>
      </thead>  
      <tbody>
          @foreach($datos as $estudiantes)
          <tr>
          
              <td scope="row">{{ $estudiantes->nombre_estudiante}}</td>
              <td scope="row">{{ $estudiantes->clase}}</td>
              <td scope="row">{{\Carbon\Carbon::parse($estudiantes->fecha_nacimiento)->format('d/m/Y') }}</td>
              

              <div class="d-flex flex-row">
              <td scope="row"  style="text-align: center;">
                <form action="{{url ('estudiantes')}}">
                  <a class="btn btn-success" href="{{ url('/estudiantes/'.$estudiantes->id.'/edit')}}">Editar</a>
              </form>
                <form method="post" action="{{ url('/estudiantes/'.$estudiantes->id) }} ">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-danger" onclick="return confirm('desea eliminar al estudiante?')">Borrar</button>
                </form>
              </td>
            </div>
          </tr>
          @endforeach
      </tbody>
    </table>
  
</body>
</html>