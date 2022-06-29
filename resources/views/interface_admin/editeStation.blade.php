
@extends('master')

@section('title')

    Kara-Event| Dashboard

@endsection

@section('content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Modifier station</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('admin.listeStation')}}">Liste station</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Modifier les stations</li>
                </ol>
              </nav>

            <form  method="POST" action="{{route('admin.updateStation', $station->id)}}" enctype="multipart/form-data">

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
                    <label for="exampleInputName1"> Nom station</label>
                    <input type="text" class="form-control p_input @error('nom_station') is-invalid @enderror" name="nom_station" value="{{$station->nom_station}}" required autocomplete="nom_station" autofocus>
                </div>

                <div class="form-group">
                    <div class='col-md-6'>
                        <label for="">Photo station</label>
                        <div>
                            <input type="file" name="photo_station" id="image" required autocomplete="photo_station" autofocus " class="form-control p_input @error('photo_station') is-invalid @enderror" name="photo_station" value="{{ old('photo_station') }}" required autocomplete="photo_station" autofocus " rows="6">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputName1"> Contact station</label>
                    <input type="text" class="form-control p_input @error('contact_station') is-invalid @enderror" name="contact_station" value="{{$station->contact_station}}" required autocomplete="contact_station" autofocus>
                </div>

                <div class="form-group">
                    <label for="exampleInputName1"> Adresse station</label>
                    <input type="text" class="form-control p_input @error('adresse_station') is-invalid @enderror" name="adresse_station" value="{{$station->adresse_station}}" required autocomplete="adresse_station" autofocus>
                </div>

                <div class="form-group">
                    <label for="exampleInputName1"> Localisation station</label>
                    <input type="text" class="form-control p_input @error('localisation_station') is-invalid @enderror" name="localisation_station" value="{{$station->localisation_station}}" required autocomplete="localisation_station" autofocus>
                </div>



                <button type="submit" class ="btn btn-primary">Modifier</button>
            </form>
         </div>
    </div>
</div>


@endsection





