@extends('master')

@section('title')
    Kara-Event| Dashboard
@endsection

@section('content')


    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Créer les centres de sante </h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Tableau de bord</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Créer les centres de santé</li>
                    </ol>
                  </nav>

                    @if(Session::has('status_centre_sante '))
                            <div class="alert alert-success">
                                    {{Session::get('status_centre_sante ')}}
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

                <form  method="POST" action="{{route('admin.store_CentreSante')}}" enctype="multipart/form-data">

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
                        <label for="exampleInputName1"> Nom centre sante </label>
                        <input type="text" class="form-control p_input @error('nom_centre_sante') is-invalid @enderror" name="nom_centre_sante" value="{{ old('nom_centre_sante') }}" required autocomplete="nom_centre_sante" autofocus>
                    </div>

                    <div class="form-group">
                        <div class='col-md-6'>
                            <label for="">Photo centre sante</label>
                            <div>
                                <input type="file" name="photo_centre_sante" id="image" required autocomplete="photo_centre_sante" autofocus " class=photo_centre_sante" autofocus " class="form-control p_input @error('photo_centre_sante') is-invalid @enderror" name="photo_centre_sante" value="{{ old('photo_centre_sante') }}" required autocomplete="photo_centre_sante" autofocus " rows="6">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1"> Adresse centre sante</label>
                        <input type="text" class="form-control p_input @error('adresse_centre_sante') is-invalid @enderror" name="adresse_centre_sante" value="{{ old('adresse_centre_sante') }}" required autocomplete="adresse_centre_sante" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1">Localisation centre sante </label>
                        <input type="text" class="form-control p_input @error('localisation_centre_sante') is-invalid @enderror" name="localisation_centre_sante" value="{{ old('localisation_centre_sante') }}" required autocomplete="localisation_centre_sante" autofocus>
                    </div>

                    <div class="form-group">
                        <label>Contact centre sante</label>
                        <input  type="text" class="form-control p_input @error('contact_centre_sante') is-invalid @enderror" name="contact_centre_sante" value="{{ old('contact_centre_sante') }}" required autocomplete="contact_centre_sante" autofocus>
                    </div>


                      <button type="submit" class ="btn btn-primary">Ajouter</button>
                </form>
             </div>
        </div>
    </div>

 @endsection










