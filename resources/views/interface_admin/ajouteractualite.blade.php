@extends('master')

@section('title')
    Kara-Event| Dashboard
@endsection

@section('content')


    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Créer les actualites</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Tableau de bord</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Créer les actualités</li>
                    </ol>
                  </nav>

                  @if(Session::has('status_actualite'))
                  <div class="alert alert-success">
                          {{Session::get('status_actualite')}}
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

                <form  method="POST" action="{{route('admin.store_actualite')}}" enctype="multipart/form-data">

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
                        <div class='col-md-6'>
                            <label for="">Photo actualité </label>
                            <div>
                                <input type="file" name="photo_actualite" id="image" required autocomplete="photo_actualite" autofocus " class="form-control p_input @error('photo_actualite') is-invalid @enderror" name="photo_actualite" value="{{ old('photo_actualite') }}" required autocomplete="photo_actualite" autofocus " rows="6">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1"> Nom acteur</label>
                        <input type="text" class="form-control p_input @error('nom_acteur') is-invalid @enderror" name="nom_acteur" value="{{ old('nom_acteur') }}" required autocomplete="nom_acteur" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1"> Prenom acteur</label>
                        <input type="text" class="form-control p_input @error('prenom_acteur') is-invalid @enderror" name="prenom_acteur" value="{{ old('prenom_acteur') }}" required autocomplete="prenom_acteur" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1"> Titre actualiter</label>
                        <input type="text" class="form-control p_input @error('titre_actualite') is-invalid @enderror" name="titre_actualite" value="{{ old('titre_actualite') }}" required autocomplete="titre_actualite" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="exampleTextarea1">Description actualite</label>
                        <textarea class="form-control  p_input @error('description_actualite') is-invalid @enderror" name="description_actualite" value="{{ old('description_actualite') }}" required autocomplete="description_actualite" autofocus " id="exampleTextarea1" rows="4"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1"> Date actualite</label>
                        <input type="date" class="form-control p_input @error('date_actualite') is-invalid @enderror" name="date_actualite" value="{{ old('date_actualite') }}" required autocomplete="date_actualite" autofocus>
                    </div>



                      <button type="submit" class ="btn btn-primary">Ajouter</button>
                </form>
             </div>
        </div>
    </div>

 @endsection










