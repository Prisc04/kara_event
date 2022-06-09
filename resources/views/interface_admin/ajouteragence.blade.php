@extends('master')

@section('title')
    Kara-Event| Dashboard
@endsection

@section('content')


    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Créer les agences</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Tableau de bord</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Créer les agences</li>
                    </ol>
                  </nav>

                    @if(Session::has('status_agence'))
                            <div class="alert alert-success">
                                    {{Session::get('status_agence')}}
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

                <form  method="POST" action="{{route('admin.store_agence')}}" enctype="multipart/form-data">

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
                        <label for="exampleInputName1">Nom agence</label>
                        <input type="text" class="form-control p_input @error('nom_agence') is-invalid @enderror" name="nom_agence" value="{{ old('nom_agence') }}" required autocomplete="nom_agence" autofocus>
                    </div>

                    <div class="form-group">
                        <div class='col-md-6'>
                            <label for="">Photo agence </label>
                            <div>
                                <input type="file" name="photo_agence" id="image" required autocomplete="photo_agence" autofocus " class="form-control p_input @error('photo_agence') is-invalid @enderror" name="photo_agence" value="{{ old('photo_agence') }}" required autocomplete="photo_agence" autofocus " rows="6">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1">Localisation agence</label>
                        <input type="text" class="form-control p_input @error('localisation_agence') is-invalid @enderror" name="localisation_agence" value="{{ old('localisation_agence') }}" required autocomplete="localisation_agence" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="exampleTextarea1">Description agence</label>
                        <textarea class="form-control  p_input @error('description_agence') is-invalid @enderror" name="description_agence" value="{{ old('description_agence') }}" required autocomplete="description_agence" autofocus " id="exampleTextarea1" rows="4"></textarea>
                    </div>



                      <button type="submit" class ="btn btn-primary">Ajouter</button>
                </form>
             </div>
        </div>
    </div>

 @endsection










