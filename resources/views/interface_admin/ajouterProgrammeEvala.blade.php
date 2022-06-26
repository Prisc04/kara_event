@extends('master')

@section('title')
    Kara-Event| Dashboard
@endsection

@section('content')


    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Créer les programmes evala</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Tableau de bord</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Créer les programmes évala</li>
                    </ol>
                  </nav>

                    @if(Session::has('status_programme_evala'))
                            <div class="alert alert-success">
                                    {{Session::get('status_programme_evala')}}
                            </div>
                    @endif

                        @if(count($errors)> 0)

                           <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)

                                    <li>{{$error}}</li>

                                    @endforeach
                                </ul>
                           </div>


                        @endif

                <form  method="POST" action="{{route('admin.store_ProgrammeEvela')}}" enctype="multipart/form-data">

                    @csrf

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
                        <label for="exampleTextarea1">Jour du programme </label>
                        <input type="text" class="form-control p_input @error('jour_programme_evala') is-invalid @enderror" name="jour_programme_evala" value="{{ old('jour_programme_evala') }}" required autocomplete="jour_programme_evala" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1"> Date du programme</label>
                        <input type="date" class="form-control p_input @error('date_programme_evala') is-invalid @enderror" name="date_programme_evala" value="{{ old('date_programme_evala') }}" required autocomplete="date_programme_evala" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="exampleTextarea1">rencontre programme evala</label>
                        <textarea class="form-control  p_input @error('rencontre_programme_evala') is-invalid @enderror" name="rencontre_programme_evala" value="{{ old('rencontre_programme_evala') }}" required autocomplete="rencontre_programme_evala" autofocus " id="exampleTextarea1" rows="4"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleTextarea1">Lieu du programme</label>
                        <input type="text" class="form-control p_input @error('lieu_programme_evala') is-invalid @enderror" name="lieu_programme_evala" value="{{ old('lieu_programme_evala') }}" required autocomplete="lieu_programme_evala" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="exampleTextarea1">localisation programme evala</label>
                        <input type="text" class="form-control p_input @error('localisation_programme_evala') is-invalid @enderror" name="localisation_programme_evala" value="{{ old('localisation_programme_evala') }}" required autocomplete="localisation_programme_evala" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="exampleTextarea1">Heure du programme</label>
                        <input type="text" class="form-control p_input @error('heure_programme_evala') is-invalid @enderror" name="heure_programme_evala" value="{{ old('heure_programme_evala') }}" required autocomplete="heure_programme_evala" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="exampleTextarea1">observation programme evala</label>
                        <input type="text" class="form-control p_input @error('observation_programme_evala') is-invalid @enderror" name="observation_programme_evala" value="{{ old('observation_programme_evala') }}" required autocomplete="observation_programme_evala" autofocus>
                    </div>

                      <button type="submit" class ="btn btn-primary">Ajouter</button>
                </form>
             </div>
        </div>
    </div>

 @endsection










