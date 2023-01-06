@extends('master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{__('message.titleBrief')}}</h1>
          </div>
        </div>
      </div>
    </section>
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h2>{{__('message.brief')}}</h2>
                    </div>

                </div>
                <div class="col-sm-12 d-flex justify-content-between p-3">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('brief.create') }}" class="btn btn-primary">{{__('message.add_brief')}}</a>
                    </div>

                    <div class="search-box">
                        <i class="material-icons">&#xE8B6;</i>
                        <input type="text" class="form-control" id="search" placeholder="Search&hellip;">
                    </div>

                </div>
            </div>

    <table class="table table-striped table-hover table-bordered">
      <thead>
          <tr>
              <th>{{__('message.name')}}</th>
              <th>Description</th>
              <th>{{__('message.duration')}}</th>
              <th>{{__('message.actions')}}</th>
          </tr>
      </thead>
      <tbody  class="table1" id="table1">
          @foreach ($briefs_page as $value )
          <tr>
              <td>{{ $value->Nom_du_brief }}</td>
              <td>{{ $value->Description }}</td>
              <td>{{ $value->Duree }}</td>
              <td>
                  <a  href="{{ route('brief.edit', $value->id)}}" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                  <form action="{{ route('brief.destroy', $value->id)}}" method="post">
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



        <div class="d-flex justify-content-between">
            <div class="d-flex justify-content-start">
                {!! $briefs_page->links() !!}
        </div>
      <div>
          <a href="{{route('generate')}}" class="btn btn-outline-secondary" >{{__('message.export_pdf')}}</a>
          <a href="/exportexcel" class="btn btn-outline-secondary" >{{__('message.export_excel')}}</a>
          <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#exampleModal">
            {{__('message.import_excel')}}
            </button>
       </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('message.modal_title')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="/importexcel" method="POST" enctype="multipart/form-data">
              @csrf

              <div class="modal-body">
                      <div class="form-group">
                          <input type="file" name="file" required>
                      </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('message.close_btn')}}</button>
                <button type="submit" class="btn btn-primary">{{__('message.save')}}</button>
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

    $('#search').on('keyup',function(){
        $value=$(this).val();
        $.ajax({
            type:'get',
            url:'{{route("searchbriefs")}}',
            data:{'searchbrief':$value},
            success:function(data){
                console.log(data);
                var brief=data.search;
                var html='';
                if(brief.length>0){
                    for(let i=0;i<brief.length;i++){
                        html+=`<tr>
                                    <td>${brief[i]['Nom_du_brief']}</td>
                                    <td>${brief[i]['Description']}</td>
                                    <td>${brief[i]['Duree']}</td>
                                    <td><a  href="/brief/${brief[i]['id']}/edit" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                    <form method="post" action="/brief/${brief[i]['id']}">
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
                    <td>no brief</td>\
                    </tr>';
                }
                $('#table1').html(html);
            }
        })
    })

    // $('#filter').on('change',function(){
    //       $value=$(this).val();
    //       $.ajax({
    //           type:'get',
    //           url:'{{route("filter_bief")}}',
    //           data:{'filter':$value},
    //           success:function(data){
    //               console.log(data);
    //               var task=data.dataTask;
    //               var html='';
    //               if(task.length>0){
    //                   for(let i=0;i<task.length;i++){
    //                       html+=`<tr>
    //                                   <td>${task[i]['Nom_tache']}</td>
    //                                   <td>${task[i]['Duree']}</td>
    //                                   <td><a  href="/task/${task[i]['id']}/edit" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
    //                                   <form method="post" action="/task/${task[i]['id']}">
    //                                       <input type="hidden" name="_method" value="Delete">\
    //                                       <input type="hidden" name="_token" value='{{ csrf_token() }}'>
    //                                       <button id="trash-icon" type='submit'>
    //                                   <a  class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
    //                               </button></td>
    //                               </tr>`;
    //                   }
    //               }
    //               else{
    //                   html+=`<tr>\
    //                   <td>no tache</td>\
    //                   </tr>`;
    //               }
    //               $('#table1').html(html);
    //           }
    //       });
    //   })

    </script>
@endsection
