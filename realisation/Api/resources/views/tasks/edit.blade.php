@extends('master')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{(__('message.title'))}}</h1>
          </div>
          {{-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Tasks</a></li>

            </ol>
          </div> --}}
        </div>
      </div>
    </section>
<body>
    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row container d-flex justify-content-center">
    <div class="col-md-6 col-lg-6">
                <form class="card" action="{{ route('task.update',$edit->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                  <h5 class="card-title d-flex justify-content-center fw-400">{{__('message.edit_task')}}</h5>
                        <div class="card-body">
                            <div class="form-group">
                                <label class="text-muted" for="">{{__('message.name')}}</label>
                                <input class="form-control rounded" type="text" value="{{$edit->Nom_tache}}" placeholder="" name="Nom_tache">
                                @error('Nom_tache')
                                <label style="color: red;">{{$message}}</label>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="text-muted" for="">{{__('message.description')}}</label>
                                <input class="form-control rounded" type="text" value="{{$edit->Description}}" placeholder="" name="Description">
                            </div>
                            <div class="form-group">
                                <label class="text-muted" for="">{{__('message.duration')}}</label>
                                <input class="form-control rounded" value="{{$edit->Duree}}" type="text" placeholder="duree" name="Duree">
                                @error('Duree')
                                <label style="color: red;">{{$message}}</label>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="text-muted" for="">{{__('message.brief')}}</label>
                                <select class="btn form-control rounded btn-secondary dropdown-toggle ml-2" name="Preparation_brief_id" id="Preparation_brief_id">
                                    <option value="{{$edit->Preparation_brief_id}}">{{$edit->Preparation_brief_id}}</option>
                                    @foreach ($brief as $value)
                                    <option value="{{$value->id}}">{{$value->Nom_du_brief}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="d-flex justify-content-between">
                                <button class="btn  btn-primary">{{__('message.save')}}</button>
                                <a class="btn  btn-secondary" href="{{ route('task.index') }}">{{__('message.cancel')}}</a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

@endsection
