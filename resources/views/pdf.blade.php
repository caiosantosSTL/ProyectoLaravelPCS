<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body class="pdfBlade">
    <table class="table table-bordered " id="tablaReporte">
      <thead>
        <tr>
          <th scope="col">Personal</th>
          <th scope="col">Antivirus</th>
          <th scope="col">IP</th>
          <th scope="col">Mac</th>
          <th scope="col">Marca</th>
          <th scope="col">SO</th>
        </tr>
      </thead>
      <tbody>
        @if(isset($query))
           @foreach($query as $row)
             <tr>
               <th scope="row">{{$row->NomPers}}</th>
               <td>{{$row->NomAnt}}</td>
               <td>{{$row->ip}}</td>
               <td>{{$row->mac}}</td>
               <td>{{$row->NomMarc}}</td>
               <td>{{$row->NomSO}}</td>
             </tr>
           @endforeach
        @endif

      </tbody>
    </table>
  </body>
</html>