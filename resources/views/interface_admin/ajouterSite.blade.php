@extends('master')

@section('title')
    Kara-Event| Dashboard
@endsection

@section('content')


    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Créer les sites</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Tableau de bord</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Créer les sites</li>
                    </ol>
                  </nav>

                    @if(Session::has('status_site'))
                            <div class="alert alert-success">
                                    {{Session::get('status_site')}}
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

                <form  method="POST" action="{{route('admin.store_Site')}}" enctype="multipart/form-data">

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
                            <label for="">Photo site</label>
                            <div>
                                <input type="file" name="photo_site" id="image" required autocomplete="photo_site" autofocus " class="form-control p_input @error('photo_site') is-invalid @enderror" name="photo_site" value="{{ old('photo_site') }}" required autocomplete="photo_site" autofocus " rows="6">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1"> Nom site </label>
                        <input type="text" class="form-control p_input @error('nom_site') is-invalid @enderror" name="nom_site" value="{{ old('nom_site') }}" required autocomplete="nom_site" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="exampleTextarea1">Description site</label>
                        <textarea class="form-control  p_input @error('description_site') is-invalid @enderror" name="description_site" value="{{ old('description_site') }}" required autocomplete="description_site" autofocus " id="exampleTextarea1" rows="4"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1"> Localisation site </label>
                        <input type="text" class="form-control p_input @error('localisation_site') is-invalid @enderror" name="localisation_site" value="{{ old('localisation_site') }}" required autocomplete="localisation_site" autofocus>
                    </div>


                      <button type="submit" class ="btn btn-primary">Ajouter</button>
                </form>
             </div>
        </div>
    </div>

 @endsection










