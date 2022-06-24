@extends('master')

@section('title')
    Kara-Event| Dashboard
@endsection

@section('content')


    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Créer les pharmacies</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Tableau de bord</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Créer les pharmacies</li>
                    </ol>
                  </nav>

                    @if(Session::has('status_pharmacie'))
                            <div class="alert alert-success">
                                    {{Session::get('status_pharmacie')}}
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

                <form  method="POST" action="{{route('admin.store_Pharmacie')}}" enctype="multipart/form-data">

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
                        <label for="exampleInputName1"> Nom pharmacie </label>
                        <input type="text" class="form-control p_input @error('nom_pharmacie') is-invalid @enderror" name="nom_pharmacie" value="{{ old('nom_pharmacie') }}" required autocomplete="nom_pharmacie" autofocus>
                    </div>

                    <div class="form-group">
                        <div class='col-md-6'>
                            <label for="">Photo pharmacie</label>
                            <div>
                                <input type="file" name="photo_pharmacie" id="image" required autocomplete="photo_pharmacie" autofocus " class=photo_pharmacie" autofocus " class="form-control p_input @error('photo_pharmacie') is-invalid @enderror" name="photo_pharmacie" value="{{ old('photo_pharmacie') }}" required autocomplete="photo_pharmacie" autofocus " rows="6">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1"> Adresse pharmacie</label>
                        <input type="text" class="form-control p_input @error('adresse_pharmacie') is-invalid @enderror" name="adresse_pharmacie" value="{{ old('adresse_pharmacie') }}" required autocomplete="adresse_pharmacie" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1">Localisation pharmacie </label>
                        <input type="text" class="form-control p_input @error('localisation_pharmacie') is-invalid @enderror" name="localisation_pharmacie" value="{{ old('localisation_pharmacie') }}" required autocomplete="localisation_pharmacie" autofocus>
                    </div>

                    <div class="form-group">
                        <label>Contact pharmacie</label>
                        <input  type="text" class="form-control p_input @error('contact_pharmacie') is-invalid @enderror" name="contact_pharmacie" value="{{ old('contact_pharmacie') }}" required autocomplete="contact_pharmacie" autofocus>
                    </div>


                      <button type="submit" class ="btn btn-primary">Ajouter</button>
                </form>
             </div>
        </div>
    </div>

 @endsection










