
@extends('master')

@section('title')

    Kara-Event| Dashboard

@endsection

@section('content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Modifier agence</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('admin.listeagence')}}">Liste des agences</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Modifier les agences</li>
                </ol>
              </nav>

            <form  method="POST" action="{{route('admin.updateagence', $agence->id)}}" enctype="multipart/form-data">

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
                    <label for="exampleInputName1"> Nom agence</label>
                    <input type="text" class="form-control p_input @error('nom_agence') is-invalid @enderror" name="nom_agence" value="{{$agence->nom_agence}}" required autocomplete="nom_agence" autofocus>
                </div>

                <div class="form-group">
                    <div class='col-md-6'>
                        <label for="">Photo agence </label>
                        <div>
                            <input type="file" name="photo_agence" id="image" required autocomplete="photo_agence" autofocus " class="form-control p_input @error('photo_agence') is-invalid @enderror" name="photo_agence" value="{{ old('photo_agence') }}" required autocomplete="photo_agence" autofocus " rows="6">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleTextarea1">Localisation agence</label>
                    <input class="form-control  p_input @error('localisation_agence') is-invalid @enderror" name="localisation_agence" value="{{ $agence->localisation_agence }}" required autocomplete="localisation_agence" autofocus " id="exampleTextarea1" rows="4">
                </div>

                <div class="form-group">
                    <label for="exampleTextarea1">Description agence</label>
                    <input class="form-control  p_input @error('description_agence') is-invalid @enderror" name="description_agence" value="{{ $agence->description_agence }}" required autocomplete="description_agence" autofocus " id="exampleTextarea1" rows="4">
                </div>


                  <button type="submit" class ="btn btn-primary">Modifier</button>
            </form>
         </div>
    </div>
</div>


@endsection





