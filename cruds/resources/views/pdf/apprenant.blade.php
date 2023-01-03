<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users </title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <h1>List des données</h1>
        
        <table id="customers">
          <tr>
            {{-- <th>Image</th> --}}
            <th>Nom</th>
            <th>Prenom</th>
          </tr>
          <tbody  class="table1" id="table1">
            @foreach ($apprenant as $value )
            <tr>
                {{-- <td><img src="{{asset('./imageapprent/'.$value->Image)}}" alt="" width="80" height="80"></td> --}}
                <td>{{ $value->Nom }}</td>
                <td>{{ $value->Prenom }}</td>
            </tr>
            @endforeach

        </tbody>
        </table>
</body>
</html>