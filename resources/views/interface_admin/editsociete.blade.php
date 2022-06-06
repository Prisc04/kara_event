@extends('master')

@section('title')
    Kara-Event| Dashboard
@endsection

@section('content')


    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Modifier les societes</h4><nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{route('admin.listesociete')}}">liste les sociétés</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Modifier les sociétés</li>
                    </ol>
                  </nav>

                <form  method="POST" action="{{route('admin.updateSociete',$societe->id)}}" enctype="multipart/form-data">

                    @csrf
                    @method("PUT")
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
                        <input type="text" class="form-control p_input @error('raison_social') is-invalid @enderror" name="raison_social" value="{{$societe->raison_social}}"  required autocomplete="raison_social" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1"> Adresse societe</label>
                        <input type="text" class="form-control p_input @error('adresse_societe') is-invalid @enderror" name="adresse_societe" value="{{$societe->adresse_societe}}" required autocomplete="adresse_societe" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1">Téléphone societe</label>
                        <input type="text" class="form-control p_input @error('numero_societe') is-invalid @enderror" name="numero_societe" value="{{$societe->numero_societe}}" required autocomplete="numero_societe" autofocus>
                    </div>

                    <div class="form-group">
                        <label> Email societe </label>
                        <input id="email" type="email" class="form-control @error('email_societe') is-invalid @enderror" name="email_societe" value="{{$societe->email_societe}}" required autocomplete="email_societe" autofocus>
                                     @error('email_societe')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                    </div>


                    <div class="form-group">
                        <label for="type_societe_id">Type societe</label>
                        <select class="form-control p_input @error('type_societe_id') is-invalid @enderror" name="type_societe_id" value="" required autocomplete="type_societe_id" autofocus>
                            @foreach ($typesocietes  as $typesociete)
                            <option value="{{$typesociete->id}}">{{$typesociete->nom_type_societe}}</option>
                            @endforeach
                        </select>

                    </div>


                    <div class="form-group">
                        <label for="exampleInputName1">NIF societe</label>
                        <input type="text" class="form-control p_input @error('nif_societe') is-invalid @enderror" name="nif_societe" value="{{$societe->nif_societe}}" required autocomplete="nif_societe" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="exampleTextarea1">RCCM societe</label>
                        <input type="text" class="form-control  p_input @error('rccm_societe') is-invalid @enderror" name="rccm_societe" value="{{$societe->rccm_societe}}"  required autocomplete="rccm_societe" autofocus ">
                    </div>

                    <div class="form-group">
                        <div class='col-md-6'>
                            <label for="">logo societe</label>
                            <div>
                                <input type="file" name="logo_societe" id="image" required autocomplete="logo_societe" autofocus " class="form-control p_input @error('logo_societe') is-invalid @enderror" name="logo_societe" value="{{$societe->logo_societe}}" required autocomplete="logo_societe" autofocus " rows="6">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class='col-md-6'>
                            <label for="">Photo societe</label>
                            <div>
                                <input type="file" name="photo_societe" id="image" required autocomplete="photo_societe" autofocus " class="form-control p_input @error('photo_societe') is-invalid @enderror" name="photo_societe" value="{{$societe->photo_societe}}" required autocomplete="photo_societe" autofocus " rows="6">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleTextarea1">Note societe</label>
                        <input type="text" class="form-control  p_input @error('note_societe') is-invalid @enderror" name="note_societe" value="{{$societe->note_societe}}" required autocomplete="note_societe" autofocus ">
                    </div>

                      <button type="submit" class ="btn btn-primary">Modifier</button>
                </form>
             </div>
        </div>
    </div>

 @endsection










