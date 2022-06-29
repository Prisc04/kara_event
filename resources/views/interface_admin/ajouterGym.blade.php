@extends('master')

@section('title')
    Kara-Event| Dashboard
@endsection

@section('content')


    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Créer les gyms</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Tableau de bord</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Créer les gyms</li>
                    </ol>
                  </nav>

                    @if(Session::has('status_gym'))
                            <div class="alert alert-success">
                                    {{Session::get('status_gym')}}
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

                <form  method="POST" action="{{route('admin.store_Gym')}}" enctype="multipart/form-data">

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
                        <label for="exampleInputName1">Nom gym</label>
                        <input type="text" class="form-control p_input @error('nom_gym') is-invalid @enderror" name="nom_gym" value="{{ old('nom_gym') }}" required autocomplete="nom_gym" autofocus>
                    </div>

                    <div class="form-group">
                        <div class='col-md-6'>
                            <label for="">Photo gym</label>
                            <div>
                                <input type="file" name="photo_gym" id="image" required autocomplete="photo_gym" autofocus " class="form-control p_input @error('photo_gym') is-invalid @enderror" name="photo_gym" value="{{ old('photo_gym') }}" required autocomplete="photo_gym" autofocus " rows="6">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleTextarea1">Adrese gym</label>
                        <input type="text" class="form-control p_input @error('adresse_gym') is-invalid @enderror" name="adresse_gym" value="{{ old('adresse_gym') }}" required autocomplete="adresse_gym" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1">Localisation gym</label>
                        <input type="text" class="form-control p_input @error('localisation_gym') is-invalid @enderror" name="localisation_gym" value="{{ old('localisation_gym') }}" required autocomplete="localisation_gym" autofocus>
                    </div>


                      <button type="submit" class ="btn btn-primary">Ajouter</button>
                </form>
             </div>
        </div>
    </div>

 @endsection










