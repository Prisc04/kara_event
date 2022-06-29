@extends('master')

@section('title')
    Kara-Event| Dashboard
@endsection

@section('content')


    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Créer les marchés</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Tableau de bord</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Créer les marchés</li>
                    </ol>
                  </nav>

                    @if(Session::has('status_marche'))
                            <div class="alert alert-success">
                                    {{Session::get('status_marche')}}
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

                <form  method="POST" action="{{route('admin.store_Marche')}}" enctype="multipart/form-data">

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
                        <label for="exampleInputName1"> Nom du marché</label>
                        <input type="text" class="form-control p_input @error('nom_marche') is-invalid @enderror" name="nom_marche" value="{{ old('nom_marche') }}" required autocomplete="nom_marche" autofocus>
                    </div>

                    <div class="form-group">
                        <div class='col-md-6'>
                            <label for="">Photo du marché</label>
                            <div>
                                <input type="file" name="photo_marche" id="image" required autocomplete="photo_marche" autofocus " class=photo_marche" autofocus " class="form-control p_input @error('photo_marche') is-invalid @enderror" name="photo_marche" value="{{ old('photo_marche') }}" required autocomplete="photo_marche" autofocus " rows="6">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1"> Adresse du marché</label>
                        <input type="text" class="form-control p_input @error('adresse_marche') is-invalid @enderror" name="adresse_marche" value="{{ old('adresse_marche') }}" required autocomplete="adresse_marche" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1">Localisation du marché</label>
                        <input type="text" class="form-control p_input @error('localisation_marche') is-invalid @enderror" name="localisation_marche" value="{{ old('localisation_marche') }}" required autocomplete="localisation_marche" autofocus>
                    </div>

                      <button type="submit" class ="btn btn-primary">Ajouter</button>
                </form>
             </div>
        </div>
    </div>

 @endsection










