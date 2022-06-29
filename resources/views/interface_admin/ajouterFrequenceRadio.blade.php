@extends('master')

@section('title')
    Kara-Event| Dashboard
@endsection

@section('content')


    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Créer les fréquences radio</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Tableau de bord</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Créer les fréquences radio</li>
                    </ol>
                  </nav>

                    @if(Session::has('status_radio'))
                            <div class="alert alert-success">
                                    {{Session::get('status_radio')}}
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

                <form  method="POST" action="{{route('admin.store_FrequenceRadio')}}" enctype="multipart/form-data">

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
                        <label for="exampleInputName1"> Nom radio</label>
                        <input type="text" class="form-control p_input @error('nom_radio') is-invalid @enderror" name="nom_radio" value="{{ old('nom_radio') }}" required autocomplete="nom_radio" autofocus>
                    </div>

                    <div class="form-group">
                        <div class='col-md-6'>
                            <label for="">Photo radio</label>
                            <div>
                                <input type="file" name="photo_radio" id="image" required autocomplete="photo_radio" autofocus " class=photo_radio" autofocus " class="form-control p_input @error('photo_radio') is-invalid @enderror" name="photo_radio" value="{{ old('photo_radio') }}" required autocomplete="photo_radio" autofocus " rows="6">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Adresse radio</label>
                        <input  type="text" class="form-control p_input @error('adresse_radio') is-invalid @enderror" name="adresse_radio" value="{{ old('adresse_radio') }}" required autocomplete="adresse_radio" autofocus>
                    </div>

                    <div class="form-group">
                        <label>contact radio</label>
                        <input  type="text" class="form-control p_input @error('contact_radio') is-invalid @enderror" name="contact_radio" value="{{ old('contact_radio') }}" required autocomplete="contact_radio" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1">Localisation radio</label>
                        <input type="text" class="form-control p_input @error('localisation_radio') is-invalid @enderror" name="localisation_radio" value="{{ old('localisation_radio') }}" required autocomplete="localisation_radio" autofocus>
                    </div>

                    <button type="submit" class ="btn btn-primary">Ajouter</button>
                </form>
             </div>
        </div>
    </div>

 @endsection










