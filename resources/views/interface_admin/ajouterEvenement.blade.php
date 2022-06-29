@extends('master')

@section('title')
    Kara-Event| Dashboard
@endsection

@section('content')


    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Créer les évènement</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Tableau de bord</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Créer les évènement</li>
                    </ol>
                  </nav>

                    @if(Session::has('status_event'))
                            <div class="alert alert-success">
                                    {{Session::get('status_event')}}
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

                <form  method="POST" action="{{route('admin.store_evenement')}}" enctype="multipart/form-data">

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
                        <label for="exampleInputName1"> Libelle evenement</label>
                        <input type="text" class="form-control p_input @error('libelle_event') is-invalid @enderror" name="libelle_event" value="{{ old('libelle_event') }}" required autocomplete="libelle_event" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="type_evenement_id">Type évènement</label>
                        <select class="form-control p_input @error('type_evenement_id') is-invalid @enderror" name="type_evenement_id" value="{{ old('type_evenement_id') }}" required autocomplete="type_evenement_id" autofocus>
                            <option selected>selectionnez le type évènement</option>
                            @foreach ($typeevenements  as $typeevenement)
                            <option value="{{$typeevenement->id}}">{{$typeevenement->nom_type_event}}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1"> Date début evenement</label>
                        <input type="date" class="form-control p_input @error('date_debut_event') is-invalid @enderror" name="date_debut_event" value="{{ old('date_debut_event') }}" required autocomplete="date_debut_event" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="exampleTextarea1">Description evenement</label>
                        <textarea class="form-control  p_input @error('description_event') is-invalid @enderror" name="description_event" value="{{ old('description_event') }}" required autocomplete="description_event" autofocus " id="exampleTextarea1" rows="4"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1"> Date fin evenement</label>
                        <input type="date" class="form-control p_input @error('date_fin_event') is-invalid @enderror" name="date_fin_event" value="{{ old('date_fin_event') }}" required autocomplete="date_fin_event" autofocus>
                    </div>

                    <div class="form-group">
                        <div class='col-md-6'>
                            <label for="">Photo evenement</label>
                            <div>
                                <input type="file" name="photo_event" id="image" required autocomplete="photo_event" autofocus " class="form-control p_input @error('photo_event') is-invalid @enderror" name="photo_event" value="{{ old('photo_event') }}" required autocomplete="photo_event" autofocus " rows="6">
                            </div>
                        </div>
                    </div>
                      <button type="submit" class ="btn btn-primary">Ajouter</button>
                </form>
             </div>
        </div>
    </div>

 @endsection










