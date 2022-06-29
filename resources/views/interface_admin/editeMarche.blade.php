
@extends('master')

@section('title')

    Kara-Event| Dashboard

@endsection

@section('content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Modifier marché</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('admin.listeMarche')}}">Liste des marchés</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Modifier les marchés</li>
                </ol>
              </nav>

            <form  method="POST" action="{{route('admin.updateMarche', $marche->id)}}" enctype="multipart/form-data">

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
                    <label for="exampleInputName1"> Nom du marché</label>
                    <input type="text" class="form-control p_input @error('nom_marche') is-invalid @enderror" name="nom_marche" value="{{$marche->nom_marche}}" required autocomplete="nom_marche" autofocus>
                </div>

                <div class="form-group">
                    <div class='col-md-6'>
                        <label for="">Photo du marché</label>
                        <div>
                            <input type="file" name="photo_marche" id="image" required autocomplete="photo_marche" autofocus " class="form-control p_input @error('photo_marche') is-invalid @enderror" name="photo_marche" value="{{ old('photo_marche') }}" required autocomplete="photo_marche" autofocus " rows="6">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputName1"> Adresse du marche</label>
                    <input type="text" class="form-control p_input @error('adresse_marche') is-invalid @enderror" name="adresse_marche" value="{{$marche->adresse_marche}}" required autocomplete="adresse_marche" autofocus>
                </div>

                <div class="form-group">
                    <label for="exampleInputName1"> Localisation du marché</label>
                    <input type="text" class="form-control p_input @error('localisation_marche') is-invalid @enderror" name="localisation_marche" value="{{$marche->localisation_marche}}" required autocomplete="localisation_marche" autofocus>
                </div>



                <button type="submit" class ="btn btn-primary">Modifier</button>
            </form>
         </div>
    </div>
</div>


@endsection





