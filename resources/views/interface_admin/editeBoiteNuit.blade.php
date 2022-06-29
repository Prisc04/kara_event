
@extends('master')

@section('title')

    Kara-Event| Dashboard

@endsection

@section('content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Modifier boite nuit</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('admin.listeBoiteNuit')}}">Liste des boites nuits</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Modifier les boites nuits</li>
                </ol>
              </nav>

            <form  method="POST" action="{{route('admin.updateBoiteNuit', $boite_nuit->id)}}" enctype="multipart/form-data">

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
                    <label for="exampleInputName1"> Nom boite nuit</label>
                    <input type="text" class="form-control p_input @error('nom_boite_nuit') is-invalid @enderror" name="nom_boite_nuit" value="{{$boite_nuit->nom_boite_nuit}}" required autocomplete="nom_boite_nuit" autofocus>
                </div>

                <div class="form-group">
                    <div class='col-md-6'>
                        <label for="">Photo boite nuit</label>
                        <div>
                            <input type="file" name="photo_boite_nuit" id="image" required autocomplete="photo_boite_nuit" autofocus " class="form-control p_input @error('photo_boite_nuit') is-invalid @enderror" name="photo_boite_nuit" value="{{ old('photo_boite_nuit') }}" required autocomplete="photo_boite_nuit" autofocus " rows="6">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleTextarea1">Localisation boite nuit</label>
                    <input class="form-control  p_input @error('localisation_boite_nuit') is-invalid @enderror" name="localisation_boite_nuit" value="{{ $boite_nuit->localisation_boite_nuit}}" required autocomplete="localisation_boite_nuit" autofocus " id="exampleTextarea1" rows="4">
                </div>

                <div class="form-group">
                    <label for="exampleTextarea1">Adresse boite nuit</label>
                    <input class="form-control  p_input @error('adresse_boite_nuit') is-invalid @enderror" name="adresse_boite_nuit" value="{{ $boite_nuit->adresse_boite_nuit}}" required autocomplete="adresse_boite_nuit" autofocus " id="exampleTextarea1" rows="4">
                </div>


                  <button type="submit" class ="btn btn-primary">Modifier</button>
            </form>
         </div>
    </div>
</div>


@endsection

