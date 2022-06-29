@extends('master')

@section('title')
    Kara-Event| Dashboard
@endsection

@section('content')


    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Créer les boites nuits</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Tableau de bord</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Créer les boites nuits</li>
                    </ol>
                  </nav>

                    @if(Session::has('status_boite_nuit'))
                            <div class="alert alert-success">
                                    {{Session::get('status_boite_nuit')}}
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

                <form  method="POST" action="{{route('admin.store_BoiteNuit')}}" enctype="multipart/form-data">

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
                        <label for="exampleInputName1">Nom boite nuit</label>
                        <input type="text" class="form-control p_input @error('nom_boite_nuit') is-invalid @enderror" name="nom_boite_nuit" value="{{ old('nom_boite_nuit') }}" required autocomplete="nom_boite_nuit" autofocus>
                    </div>

                    <div class="form-group">
                        <div class='col-md-6'>
                            <label for="">Photo boite nuit </label>
                            <div>
                                <input type="file" name="photo_boite_nuit" id="image" required autocomplete="photo_boite_nuit" autofocus " class="form-control p_input @error('photo_boite_nuit') is-invalid @enderror" name="photo_boite_nuit" value="{{ old('photo_boite_nuit') }}" required autocomplete="photo_boite_nuit" autofocus " rows="6">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleTextarea1">Adrese boite nuit</label>
                        <input type="text" class="form-control p_input @error('adresse_boite_nuit') is-invalid @enderror" name="adresse_boite_nuit" value="{{ old('adresse_boite_nuit') }}" required autocomplete="adresse_boite_nuit" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1">Localisation boite nuit</label>
                        <input type="text" class="form-control p_input @error('localisation_boite_nuit') is-invalid @enderror" name="localisation_boite_nuit" value="{{ old('localisation_boite_nuit') }}" required autocomplete="localisation_boite_nuit" autofocus>
                    </div>


                      <button type="submit" class ="btn btn-primary">Ajouter</button>
                </form>
             </div>
        </div>
    </div>

 @endsection










