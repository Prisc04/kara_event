
@extends('master')

@section('title')

    Kara-Event| Dashboard

@endsection

@section('content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Modifier fréquence radio</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('admin.listeFrequenceRadio')}}">Liste des fréquences</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Modifier les fréquences</li>
                </ol>
              </nav>

            <form  method="POST" action="{{route('admin.updateFrequenceRadio', $frequence_radio->id)}}" enctype="multipart/form-data">

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
                    <label for="exampleInputName1"> Nom radio</label>
                    <input type="text" class="form-control p_input @error('nom_radio') is-invalid @enderror" name="nom_radio" value="{{$frequence_radio->nom_radio}}" required autocomplete="nom_radio" autofocus>
                </div>

                <div class="form-group">
                    <div class='col-md-6'>
                        <label for="">Photo radio</label>
                        <div>
                            <input type="file" name="photo_radio" id="image" required autocomplete="photo_radio" autofocus " class="form-control p_input @error('photo_radio') is-invalid @enderror" name="photo_radio" value="{{ old('photo_radio') }}" required autocomplete="photo_radio" autofocus " rows="6">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleTextarea1">Localisation radio</label>
                    <input class="form-control  p_input @error('localisation_radio') is-invalid @enderror" name="localisation_radio" value="{{ $frequence_radio->localisation_radio}}" required autocomplete="localisation_radio" autofocus " id="exampleTextarea1" rows="4">
                </div>

                <div class="form-group">
                    <label for="exampleTextarea1">Adresse radio</label>
                    <input class="form-control  p_input @error('adresse_radio') is-invalid @enderror" name="adresse_radio" value="{{ $frequence_radio->adresse_radio}}" required autocomplete="adresse_radio" autofocus " id="exampleTextarea1" rows="4">
                </div>

                <div class="form-group">
                    <label for="exampleTextarea1">contact radio</label>
                    <input class="form-control  p_input @error('contact_radio') is-invalid @enderror" name="contact_radio" value="{{ $frequence_radio->contact_radio}}" required autocomplete="contact_radio" autofocus " id="exampleTextarea1" rows="4">
                </div>


                  <button type="submit" class ="btn btn-primary">Modifier</button>
            </form>
         </div>
    </div>
</div>


@endsection





