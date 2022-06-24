@extends('master')

@section('title')
    Kara-Event| Dashboard
@endsection

@section('content')


    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Modifier les évènements</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{route('admin.listeEvenement')}}">Liste des évènements</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Modifier l'évènement</li>
                    </ol>
                  </nav>

                <form  method="POST" action="{{route('admin.updateEvenement', $evenement->id)}}, $evenement->id)}}" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')
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
                        <label for="exampleInputName1"> libelle evenement</label>
                        <input type="text" class="form-control p_input @error('libelle_event') is-invalid @enderror" name="libelle_event" value="{{$evenement->libelle_event}}" placeholder="" required autocomplete="libelle_event" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="type_societe_id">Type évènement</label>
                        <select class="form-control p_input @error('type_evenement_id') is-invalid @enderror" name="type_evenement_id" value="{{ old('type_evenement_id') }}" required autocomplete="type_evenement_id" autofocus>
                            @foreach ($typeevenements  as $typeevenement)
                            <option value="{{$typeevenement->id}}">{{$typeevenement->nom_type_event}}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="form-group">
                        <label for="exampleTextarea1">Description évènement</label>
                        <input class="form-control  p_input @error('description_event') is-invalid @enderror" name="description_event" value="{{ $evenement->description_event}}" required autocomplete="description_event" autofocus " id="exampleTextarea1" rows="4">
                    </div>

                    <div class="form-group">
                        <div class='col-md-6'>
                            <label for="">Photo evenement </label>
                            <div>
                                <input type="file" name="photo_event" id="image" required autocomplete="photo_event" autofocus " class="form-control p_input @error('photo_event') is-invalid @enderror" name="photo_event" value="{{$evenement->photo_event}}" required autocomplete="photo_event" autofocus " rows="6">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1"> Date debut évènement</label>
                        <input type="text" class="form-control p_input @error('date_debut_event') is-invalid @enderror" name="date_debut_event" value="{{$evenement->date_debut_event}}" required autocomplete="date_debut_event" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1"> Date fin evenement</label>
                        <input type="text" class="form-control p_input @error('date_fin_event') is-invalid @enderror" name="date_fin_event" value="{{$evenement->date_fin_event}}" required autocomplete="date_fin_event" autofocus>
                    </div>





                      <button type="submit" class ="btn btn-primary">Modifier</button>
                </form>
             </div>
        </div>
    </div>

 @endsection










