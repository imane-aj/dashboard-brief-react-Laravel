@extends('layouts.master')
@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Apprenants Table</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <a href="{{ route('apprenant.create') }}">Ajouter apprenent</a>
                <select name="filter" id="filter">
                    <option value="">select group</option>
                    @foreach ($groupes as $value)
                    <option value="{{$value->id}}">{{$value->Nom_groupe}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <div class="search-box">
                    <input type="text" class="form-control" id="search" placeholder="Search&hellip;">
                </div>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Image </th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Actions</th>
                {{-- <th style="width: 40px">Label</th> --}}
            </tr>
            </thead>
            <tbody>
                @foreach ($apprenant as $value )
                <tr>
                    <td><img src="{{asset('./imageapprent/'.$value->Image)}}" alt="" width="80" height="80"></td>
                    <td>{{ $value->Nom }}</td>
                    <td>{{ $value->Prenom }}</td>
                    <td>
                        <a  href="{{ route('apprenant.edit', $value->id)}}" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                        <form action="{{ route('apprenant.destroy', $value->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button id="trash-icon">
                                <a  class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
    <div class="d-flex justify-content-center">
        <div>
            {!! $apprenant->links() !!}
        </div>
    </div>

    <div>
        <a href="{{route('generatepdfapprenant')}}" class="btn btn-outline-secondary" >Exporter PDF</a>
        <a href="/exportexcelapprenant" class="btn btn-outline-secondary" >Exporter excel</a>
        <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#exampleModal">
            Impoter data
        </button>
    </div>
</div>

</div>
{{-- <div
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/importexcelapprenant" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="modal-body">
                <div class="form-group">
                    <input type="file" name="file" required>
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </form>
    </div>
  </div>
</div>
</div>
</div>
</div>
<script type="text/javascript">
$('#filter').on('change',function(){
$value=$(this).val();
$.ajax({
type:'get',
url:'{{route("filter_group")}}',
data:{'filter':$value},
success:function(data){
console.log(data);
var apprenants=data.dataapprenants;
var html='';
if(apprenants.length>0){
    for(let i=0;i<apprenants.length;i++){
        html+=`<tr>
                    <td> <img src="{{asset('./imageapprent')}}/${apprenants[i]['Image']}" alt="" width="80" height="80"></td>
                    <td>${apprenants[i]['Nom']}</td>
                    <td>${apprenants[i]['Prenom']}</td>
                    <td><a  href="/apprenant/${apprenants[i]['id']}/edit" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                    <form method="post" action="/apprenant/${apprenants[i]['id']}">
                        <input type="hidden" name="_method" value="Delete">\
                        <input type="hidden" name="_token" value='{{ csrf_token() }}'>
                        <button id="trash-icon" type='submit'>
                    <a  class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                </button></td>
                </tr>`;
    }
}
else{
    html+=`<tr>
    <td>no apprenant</td>
    </tr>`;
}
$('#table1').html(html);
}
});
})
$('#search').on('keyup',function(){
$value=$(this).val();
$.ajax({
type:'get',
url:'{{route("searchapprenant")}}',
data:{'searchapprenant':$value},
success:function(data){
    console.log(data);
    var apprenants=data.searchapprenat;
    var html='';
if(apprenants.length>0){
    for(let i=0;i<apprenants.length;i++){
        html+=`<tr>
                    <td> <img src="{{asset('./imageapprent')}}/${apprenants[i]['Image']}" alt="" width="80" height="80"></td>
                    <td>${apprenants[i]['Nom']}</td>
                    <td>${apprenants[i]['Prenom']}</td>
                    <td><a  href="/apprenant/${apprenants[i]['id']}/edit" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                    <form method="post" action="/apprenant/${apprenants[i]['id']}">
                        <input type="hidden" name="_method" value="Delete">\
                        <input type="hidden" name="_token" value='{{ csrf_token() }}'>
                        <button id="trash-icon" type='submit'>
                    <a  class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                </button></td>
                </tr>`;
    }
}
else{
    html+='<tr>\
    <td>no apprenant</td>\
    </tr>';
}
$('#table1').html(html);
}
});
})
</script>   --}}
@endsection
                          

