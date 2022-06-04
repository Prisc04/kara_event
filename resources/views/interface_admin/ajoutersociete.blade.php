@extends('master')

@section('title')
    Kara-Event| Dashboard
@endsection

@section('content')


    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Créer les societes</h4><nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Tableau de bord</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Créer les sociétés</li>
                    </ol>
                  </nav>

                  @if(Session::has('status_societe'))
                  <div class="alert alert-success">
                          {{Session::get('status_societe')}}
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

                <form  method="POST" action="{{route('admin.store_societe')}}" enctype="multipart/form-data">

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
                        <label for="exampleInputName1"> Raison sociale</label>
                        <input type="text" class="form-control p_input @error('raison_social') is-invalid @enderror" name="raison_social" value="{{ old('raison_social') }}" required autocomplete="raison_social" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1"> Adresse societe</label>
                        <input type="text" class="form-control p_input @error('adresse_societe') is-invalid @enderror" name="adresse_societe" value="{{ old('adresse_societe') }}" required autocomplete="adresse_societe" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1">Téléphone societe</label>
                        <input type="text" class="form-control p_input @error('numero_societe') is-invalid @enderror" name="numero_societe" value="{{ old('numero_societe') }}" required autocomplete="numero_societe" autofocus>
                    </div>

                    <div class="form-group">
                        <label> Email societe </label>
                        <input id="email" type="email" class="form-control @error('email_societe') is-invalid @enderror" name="email_societe" value="{{ old('email_societe') }}" required autocomplete="email_societe" autofocus>
                                     @error('email_societe')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                    </div>


                    <div class="form-group">
                        <label for="exampleInputName1">NIF societe</label>
                        <input type="text" class="form-control p_input @error('nif_societe') is-invalid @enderror" name="nif_societe" value="{{ old('nif_societe') }}" required autocomplete="nif_societe" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="exampleTextarea1">RCCM societe</label>
                        <input type="text" class="form-control  p_input @error('rccm_societe') is-invalid @enderror" name="rccm_societe" value="{{ old('rccm_societe') }}" required autocomplete="rccm_societe" autofocus ">
                    </div>

                    <div class="form-group">
                        <div class='col-md-6'>
                            <label for="">logo societe</label>
                            <div>
                                <input type="file"  id="image" required autocomplete="logo_societe" autofocus " class="form-control p_input @error('logo_societe') is-invalid @enderror" name="logo_societe" value="{{ old('logo_societe') }}" required autocomplete="logo_societe" autofocus " rows="6">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class='col-md-6'>
                            <label for="">Photo societe</label>
                            <div>
                                <input type="file"  id="image" required autocomplete="photo_societe" autofocus " class="form-control p_input @error('photo_societe') is-invalid @enderror" name="photo_societe" value="{{ old('photo_societe') }}" required autocomplete="photo_societe" autofocus " rows="6">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleTextarea1">Note societe</label>
                        <input type="text" class="form-control  p_input @error('note_societe') is-invalid @enderror" name="note_societe" value="{{ old('note_societe') }}" required autocomplete="note_societe" autofocus ">
                    </div>

                      <button type="submit" class ="btn btn-primary">Ajouter</button>
                </form>
             </div>
        </div>
    </div>

 @endsection










