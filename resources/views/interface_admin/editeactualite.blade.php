
@extends('master')

@section('title')

    Kara-Event| Dashboard

@endsection

@section('content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Modifier actualite</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('admin.listeactualite')}}">Liste actualite</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Modifier les actualités</li>
                </ol>
              </nav>

            <form  method="POST" action="{{route('admin.updateActualite', $actualite->id)}}" enctype="multipart/form-data">

                @csrf
                @method('PUT')
                @if (Session::get('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>
                @endif

                @if (Session::get('fail'))
                    <div class="alert alert-danger">
                        {{Session::get('fail')}}
                    </div>
                @endif

                <div class="form-group">
                    <label for="exampleInputName1"> Nom acteur</label>
                    <input type="text" class="form-control p_input @error('nom_acteur') is-invalid @enderror" name="nom_acteur" value="{{$actualite->nom_acteur}}" required autocomplete="nom_acteur" autofocus>
                </div>

                <div class="form-group">
                    <label for="exampleInputName1"> Prenom acteur</label>
                    <input type="text" class="form-control p_input @error('prenom_acteur') is-invalid @enderror" name="prenom_acteur" value="{{$actualite->prenom_acteur}}" required autocomplete="prenom_acteur" autofocus>
                </div>

                <div class="form-group">
                    <label for="exampleInputName1"> Titre actualite</label>
                    <input type="text" class="form-control p_input @error('titre_actualite') is-invalid @enderror" name="titre_actualite" value="{{$actualite->titre_actualite}}" required autocomplete="titre_actualite" autofocus>
                </div>

                <div class="form-group">
                    <label for="exampleTextarea1">Description actualite</label>
                    <input class="form-control  p_input @error('description_actualite') is-invalid @enderror" name="description_actualite" value="{{ $actualite->description_actualite }}" required autocomplete="description_actualite" autofocus " id="exampleTextarea1" rows="4">
                </div>

                <div class="form-group">
                    <label for="exampleInputName1">Date actualite</label>
                    <input type="date" class="form-control p_input @error('date_actualite') is-invalid @enderror" name="date_actualite" value="{{$actualite->date_actualite}}" required autocomplete="date_actualiter" autofocus>
                </div>

                <div class="form-group">
                    <div class='col-md-6'>
                        <label for="">Photo actualite</label>
                        <div>
                            <input type="file" name="photo_actualite" id="image" required autocomplete="photo_actualite" autofocus " class="form-control p_input @error('photo_actualite') is-invalid @enderror" name="photo_actualite" value="{{ old('photo_actualite') }}" required autocomplete="photo_actualite" autofocus " rows="6">
                        </div>
                    </div>
                </div>
                  <button type="submit" class ="btn btn-primary">Modifier</button>
            </form>
         </div>
    </div>
</div>


@endsection





