<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajouter tache</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row container d-flex justify-content-center">
    <div class="col-md-6 col-lg-6">
                <form class="card" action="{{ route('apprenant.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                  <h5 class="card-title d-flex justify-content-center fw-400">Ajouter une tache</h5>
              <div class="card-body">
                            <div class="form-group">
                                <label class="text-muted" for="">Nom</label>
                                <input class="form-control rounded" type="text" placeholder="" value="{{old('Nom')}}" name="Nom">
                                @error('Nom')
                                    <label style="color: red;">{{$message}}</label>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="text-muted" for="">Prenom</label>
                                <input class="form-control rounded" type="text" placeholder="" name="Prenom">
                            </div>

                            <div class="form-group">
                                <label class="text-muted" for="">Email</label>
                                <input class="form-control rounded" type="text" placeholder="" name="Email">
                            </div>

                            <div class="form-group">
                                <label class="text-muted" for="">Phone</label>
                                <input class="form-control rounded" type="text" placeholder="" name="Phone">
                            </div>

                            <div class="form-group">
                                <label class="text-muted" for="">Adress</label>
                                <input class="form-control rounded" type="text" placeholder="" name="Adress">
                            </div>

                            <div class="form-group">
                                <label class="text-muted" for="">CIN</label>
                                <input class="form-control rounded" type="text" value="{{old('CIN')}}" placeholder="CIN" name="CIN">
                                @error('Duree')
                                    <label style="color: red;">{{$message}}</label>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="text-muted" for="">Date_naissance</label>
                                <input class="form-control rounded" type="text" placeholder="" name="Date_naissance">
                            </div>
                            
                            <div class="form-group">
                                <label class="text-muted" for="">Image</label>
                                <input type="file" name="Image" id="Image">
                            </div>
                            <div class="form-group">
                                <label class="text-muted" for="">Group</label>
                                <select class="btn form-control rounded btn-secondary dropdown-toggle ml-2" name="Preparation_brief_id" id="Preparation_brief_id">
                                    <option value="">select group</option>
                                    @foreach ($groupes as $value)
                                    <option value="{{$value->id}}">{{$value->Nom_groupe}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="d-flex justify-content-between">
                                <button class="btn  btn-primary" type="submit">Ajouter</button>
                                <a class="btn  btn-secondary" href="{{ route('apprenant.index') }}">Annuler</a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>