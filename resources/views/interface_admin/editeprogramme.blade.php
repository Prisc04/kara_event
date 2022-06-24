
@extends('master')

@section('title')

    Kara-Event| Dashboard

@endsection

@section('content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Modifier le programme</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('admin.listeprogramme')}}">Liste programme évènement</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Modifier le programme dévènement</li>
                </ol>
              </nav>

            <form  method="POST" action="{{route('admin.updateprogramme', $programme_evenement->id)}}" enctype="multipart/form-data">

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
                    <label for="exampleTextarea1">jour du programme</label>
                    <input type="text" class="form-control  p_input @error('jour_programme') is-invalid @enderror" name="jour_programme" value="{{ $programme_evenement->jour_programme }}" required autocomplete="jour_programme" autofocus ">
                </div>

                <div class="form-group">
                    <label for="exampleInputName1"> Date du programme</label>
                    <input type="date" class="form-control p_input @error('date_programme') is-invalid @enderror" name="date_programme" value="{{$programme_evenement->date_programme}}" required autocomplete="date_programme" autofocus>
                </div>

                <div class="form-group">
                    <label for="exampleTextarea1">Heure du programme</label>
                    <input type="text" class="form-control  p_input @error('heure_programme') is-invalid @enderror" name="heure_programme" value="{{ $programme_evenement->heure_programme }}" required autocomplete="heure_programme" autofocus ">
                </div>

                <div class="form-group">
                    <label for="exampleInputName1"> Macth du programme</label>
                    <input type="text" class="form-control p_input @error('match_programme') is-invalid @enderror" name="match_programme" value="{{$programme_evenement->match_programme}}" required autocomplete="match_programme" autofocus>
                </div>

                <div class="form-group">
                    <label for="exampleInputName1"> Lieu du programme</label>
                    <input type="text" class="form-control p_input @error('lieu_programme') is-invalid @enderror" name="lieu_programme" value="{{$programme_evenement->lieu_programme}}" required autocomplete="lieu_programme" autofocus>
                </div>


                  <button type="submit" class ="btn btn-primary">Modifier</button>
            </form>
         </div>
    </div>
</div>


@endsection





