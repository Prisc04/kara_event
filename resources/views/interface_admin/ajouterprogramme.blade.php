@extends('master')

@section('title')
    Kara-Event| Dashboard
@endsection

@section('content')


    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Créer les programmes d'évènement</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Tableau de bord</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Créer les programmes d'évènement</li>
                    </ol>
                  </nav>

                    @if(Session::has('status_programme'))
                            <div class="alert alert-success">
                                    {{Session::get('status_programme')}}
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

                <form  method="POST" action="{{route('admin.store_programme')}}" enctype="multipart/form-data">

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
                        <label for="exampleTextarea1">Jour du programme</label>
                        <input type="text" class="form-control p_input @error('jour_programme') is-invalid @enderror" name="jour_programme" value="{{ old('jour_programme') }}" required autocomplete="jour_programme" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1"> Date du programme</label>
                        <input type="date" class="form-control p_input @error('date_programme') is-invalid @enderror" name="date_programme" value="{{ old('date_programme') }}" required autocomplete="date_programme" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="exampleTextarea1">Heure du programme</label>
                        <input type="text" class="form-control p_input @error('heure_programme') is-invalid @enderror" name="heure_programme" value="{{ old('heure_programme') }}" required autocomplete="heure_programme" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="exampleTextarea1">Match du programme</label>
                        <input type="text" class="form-control p_input @error('match_programme') is-invalid @enderror" name="match_programme" value="{{ old('match_programme') }}" required autocomplete="match_programme" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="exampleTextarea1">Lieu du programme</label>
                        <input type="text" class="form-control p_input @error('lieu_programme') is-invalid @enderror" name="lieu_programme" value="{{ old('lieu_programme') }}" required autocomplete="lieu_programme" autofocus>
                    </div>


                      <button type="submit" class ="btn btn-primary">Ajouter</button>
                </form>
             </div>
        </div>
    </div>

 @endsection










