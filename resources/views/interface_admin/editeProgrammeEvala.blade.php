
@extends('master')

@section('title')

    Kara-Event| Dashboard

@endsection

@section('content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Modifier le programme évala</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('admin.listerProgrammeEvala')}}">Liste programme évala</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Modifier le programme évala</li>
                </ol>
              </nav>

            <form  method="POST" action="{{route('admin.updateProgrammeEvela', $programme_evala->id)}}" enctype="multipart/form-data">

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
                    <label for="exampleTextarea1">jour du programme evala</label>
                    <input type="text" class="form-control  p_input @error('jour_programme_evala') is-invalid @enderror" name="jour_programme_evala" value="{{ $programme_evala->jour_programme_evala }}" required autocomplete="jour_programme_evala" autofocus ">
                </div>

                <div class="form-group">
                    <label for="exampleInputName1"> Date du programme evala</label>
                    <input type="date" class="form-control p_input @error('date_programme_evala') is-invalid @enderror" name="date_programme_evala" value="{{$programme_evala->date_programme_evala}}" required autocomplete="date_programme_evala" autofocus>
                </div>

                <div class="form-group">
                    <label for="exampleTextarea1">rencontre programme evala</label>
                    <input type="text" class="form-control  p_input @error('rencontre_programme_evala') is-invalid @enderror" name="rencontre_programme_evala" value="{{ $programme_evala->rencontre_programme_evala }}" required autocomplete="rencontre_programme_evala" autofocus ">
                </div>

                <div class="form-group">
                    <label for="exampleInputName1"> Lieu du programme</label>
                    <input type="text" class="form-control p_input @error('lieu_programme_evala') is-invalid @enderror" name="lieu_programme_evala" value="{{$programme_evala->lieu_programme_evala}}" required autocomplete="lieu_programme_evala" autofocus>
                </div>

                <div class="form-group">
                    <label for="exampleTextarea1">Heure du programme</label>
                    <input type="text" class="form-control  p_input @error('heure_programme_evala') is-invalid @enderror" name="heure_programme_evala" value="{{ $programme_evala->heure_programme_evala }}" required autocomplete="heure_programme_evala" autofocus ">
                </div>

                <div class="form-group">
                    <label for="exampleInputName1"> observation programme evala</label>
                    <input type="text" class="form-control p_input @error('observation_programme_evala') is-invalid @enderror" name="observation_programme_evala" value="{{$programme_evala->observation_programme_evala}}" required autocomplete="observation_programme_evala" autofocus>
                </div>

                  <button type="submit" class ="btn btn-primary">Modifier</button>
            </form>
         </div>
    </div>
</div>


@endsection





