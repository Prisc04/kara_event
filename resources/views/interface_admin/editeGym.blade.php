
@extends('master')

@section('title')

    Kara-Event| Dashboard

@endsection

@section('content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Modifier gym</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('admin.listeGym')}}">Liste des gyms</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Modifier les gyms</li>
                </ol>
              </nav>

            <form  method="POST" action="{{route('admin.updateGym', $gym->id)}}" enctype="multipart/form-data">

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
                    <label for="exampleInputName1"> Nom gym</label>
                    <input type="text" class="form-control p_input @error('nom_gym') is-invalid @enderror" name="nom_gym" value="{{$gym->nom_gym}}" required autocomplete="nom_gym" autofocus>
                </div>

                <div class="form-group">
                    <div class='col-md-6'>
                        <label for="">Photo gym</label>
                        <div>
                            <input type="file" name="photo_gym" id="image" required autocomplete="photo_gym" autofocus " class="form-control p_input @error('photo_gym') is-invalid @enderror" name="photo_gym" value="{{ old('photo_gym') }}" required autocomplete="photo_gym" autofocus " rows="6">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleTextarea1">Localisation gym</label>
                    <input class="form-control  p_input @error('localisation_gym') is-invalid @enderror" name="localisation_gym" value="{{ $gym->localisation_gym}}" required autocomplete="localisation_gym" autofocus " id="exampleTextarea1" rows="4">
                </div>

                <div class="form-group">
                    <label for="exampleTextarea1">Adresse gym</label>
                    <input class="form-control  p_input @error('adresse_gym') is-invalid @enderror" name="adresse_gym" value="{{ $gym->adresse_gym}}" required autocomplete="adresse_gym" autofocus " id="exampleTextarea1" rows="4">
                </div>


                  <button type="submit" class ="btn btn-primary">Modifier</button>
            </form>
         </div>
    </div>
</div>


@endsection





