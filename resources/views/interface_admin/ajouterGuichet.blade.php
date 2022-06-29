@extends('master')

@section('title')
    Kara-Event| Dashboard
@endsection

@section('content')


    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Créer les guichets automatiques </h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Tableau de bord</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Créer les guichets</li>
                    </ol>
                  </nav>

                    @if(Session::has('status_guichet'))
                            <div class="alert alert-success">
                                    {{Session::get('status_guichet')}}
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

                <form  method="POST" action="{{route('admin.store_Guichet')}}" enctype="multipart/form-data">

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
                        <label for="exampleInputName1"> Nom guichet</label>
                        <input type="text" class="form-control p_input @error('nom_guichet') is-invalid @enderror" name="nom_guichet" value="{{ old('nom_guichet') }}" required autocomplete="nom_guichet" autofocus>
                    </div>

                    <div class="form-group">
                        <div class='col-md-6'>
                            <label for="">Photo guichet</label>
                            <div>
                                <input type="file" name="photo_guichet" id="image" required autocomplete="photo_guichet" autofocus " class=photo_guichet" autofocus " class="form-control p_input @error('photo_guichet') is-invalid @enderror" name="photo_guichet" value="{{ old('photo_guichet') }}" required autocomplete="photo_guichet" autofocus " rows="6">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Description guichet</label>
                        <input  type="text" class="form-control p_input @error('description_guichet') is-invalid @enderror" name="description_guichet" value="{{ old('description_guichet') }}" required autocomplete="description_guichet" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1">Localisation guichet</label>
                        <input type="text" class="form-control p_input @error('localisation_guichet') is-invalid @enderror" name="localisation_guichet" value="{{ old('localisation_guichet') }}" required autocomplete="localisation_guichet" autofocus>
                    </div>

                    <button type="submit" class ="btn btn-primary">Ajouter</button>
                </form>
             </div>
        </div>
    </div>

 @endsection










