@extends('master')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{(__('message.titleBrief'))}}</h1>
          </div>
        </div>
      </div>
    </section>

    <body>
    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row container d-flex justify-content-center">
    <div class="col-md-6 col-lg-6">
                <form class="card" action="{{ route('brief.store') }}" method="POST">
                    @csrf
                  <h5 class="card-title d-flex justify-content-center fw-400">{{__('message.add_brief')}}</h5>
              <div class="card-body">
                            <div class="form-group">
                                <label class="text-muted" for="">{{__('message.name')}}</label>
                                <input class="form-control rounded" type="text" placeholder="" value="{{old('Nom_du_brief')}}" name="Nom_du_brief">
                                @error('Nom_du_brief')
                                    <label style="color: red;">{{$message}}</label>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="text-muted" for="">{{(__('message.description'))}}</label>
                                <input class="form-control rounded" type="text" placeholder="" name="Description">
                            </div>
                            <div class="form-group">
                                <label class="text-muted" for="">{{ __('message.duration')}}</label>
                                <input class="form-control rounded" type="text" value="{{old('Duree')}}" placeholder="duree" name="Duree">
                                @error('Duree')
                                    <label style="color: red;">{{$message}}</label>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="text-muted" for="">{{ __('message.profList')}}</label>
                                <select class="btn form-control rounded btn-secondary dropdown-toggle ml-2" name="Preparation_brief_id" id="Preparation_brief_id">
                                    <option value="">{{ __('message.allProfs')}}</option>
                                    @foreach ($formateurs as $value)
                                    <option value="{{$value->id}}">{{$value->Nom_formateur}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="d-flex justify-content-between">
                                <button class="btn  btn-primary">{{__('message.add')}}</button>
                                <a class="btn  btn-secondary" href="{{ route('brief.index') }}">{{__('message.cancel')}}</a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>



@endsection
