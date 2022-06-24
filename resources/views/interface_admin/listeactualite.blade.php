@extends('master')

@section('title')
    Kara-Event| Dashboard
@endsection



@section('content')


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tableau actualité</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('admin.creer_actualite')}}">créer les actualités</a></li>
              <li class="breadcrumb-item active" aria-current="page">liste actualité</li>
            </ol>
          </nav>
        <div class="table-responsive">
          <table class="table table-striped" id="table_id">
            <thead>
                <th>Order #</th>
                <th>Photo actualité</th>
                <th>Nom acteur</th>
                <th>Prenom acteur</th>
                <th>Titre actualiter</th>
                <th>Description actualite</th>
                <th>Date actualite</th>
                <th>Status actualite</th>
                <th>Actions</th>
            </thead>

            <tbody>

                @foreach ($actualites  as $key=> $actualite)
                <tr>
                    <td>{{$key +1}}</td>

                        <td class="py-1">
                            <img src="/storage/files/{{$actualite->photo_actualite}}" alt="image" />
                        </td>
                    <td> {{$actualite->nom_acteur}}</td>
                    <td> {{$actualite->prenom_acteur}} </td>
                    <td>{{$actualite->titre_actualite}}</td>

                    <td> {{substr($actualite->description_actualite, 0, 30)}}... </td>

                    <td> {{$actualite->date_actualite}} </td>

                    <td>
                        @if($actualite->status_actualite == 1)

                        <label class="badge badge-success">Activé</label>

                        @else

                        <label class="badge badge-danger">Desactivé</label>

                        @endif

                    </td>

                    <td>


                    <button class="btn btn-outline-primary"><a href="{{route('admin.actualiteOne',$actualite->id)}}">Modifier</a></button>
                    <button class="btn btn-outline-danger"><a href="{{route('admin.supprimer_actualite',$actualite->id)}}" id="delete">Supprimer</a></button>

                       @if($actualite->status_actualite == 1)

                       <button class="btn btn-outline-warning" onclick="window.location"> <a href="{{route('admin.desactiver_actualite',$actualite->id)}}">Désactiver</a></button>

                       @else

                       <button class="btn btn-outline-success" onclick="window.location"> <a href="{{route('admin.activer_actualite',$actualite->id)}}">Activer</a></button>

                       @endif
                   </td>

                </tr>

                  @endforeach

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

@endsection
