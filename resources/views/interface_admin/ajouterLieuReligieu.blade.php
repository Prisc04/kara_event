@extends('master')

@section('title')
    Kara-Event| Dashboard
@endsection

@section('content')


    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Créer les lieux réligieux</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Tableau de bord</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Créer les lieux réligieux</li>
                    </ol>
                  </nav>

                    @if(Session::has('status_lieu_religieux'))
                            <div class="alert alert-success">
                                    {{Session::get('status_lieu_religieux')}}
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

                <form  method="POST" action="{{route('admin.store_LieuReligieu')}}" enctype="multipart/form-data">

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
                        <label for="exampleInputName1"> Nom lieu réligieux</label>
                        <input type="text" class="form-control p_input @error('nom_lieu_religieux') is-invalid @enderror" name="nom_lieu_religieux" value="{{ old('nom_lieu_religieux') }}" required autocomplete="nom_lieu_religieux" autofocus>
                    </div>

                    <div class="form-group">
                        <div class='col-md-6'>
                            <label for="">Photo lieu réligieux</label>
                            <div>
                                <input type="file" name="photo_lieu_religieux" id="image" required autocomplete="photo_lieu_religieux" autofocus " class=photo_lieu_religieux" autofocus " class="form-control p_input @error('photo_lieu_religieux') is-invalid @enderror" name="photo_lieu_religieux" value="{{ old('photo_lieu_religieux') }}" required autocomplete="photo_lieu_religieux" autofocus " rows="6">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1"> Adresse lieu religieux</label>
                        <input type="text" class="form-control p_input @error('adresse_lieu_religieux') is-invalid @enderror" name="adresse_lieu_religieux" value="{{ old('adresse_lieu_religieux') }}" required autocomplete="adresse_lieu_religieux" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1">Localisation lieu religieux</label>
                        <input type="text" class="form-control p_input @error('localisation_lieu_religieux') is-invalid @enderror" name="localisation_lieu_religieux" value="{{ old('localisation_lieu_religieux') }}" required autocomplete="localisation_lieu_religieux" autofocus>
                    </div>




                      <button type="submit" class ="btn btn-primary">Ajouter</button>
                </form>
             </div>
        </div>
    </div>

 @endsection










