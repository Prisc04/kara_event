@extends('master')

@section('title')
    Kara-Event| Dashboard
@endsection



@section('content')


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tableau marché</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('admin.creer_Marche')}}">Créer les marchés</a></li>
              <li class="breadcrumb-item active" aria-current="page">liste des marchés</li>
            </ol>
          </nav>
        <div class="table-responsive">
          <table class="table table-striped" id="table_id">
            <thead>
                <th>Order #</th>
                <th>Photo marché</th>
                <th>Nom marché</th>
                <th>Adresse marche</th>
                <th>Localisation marché</th>
                <th>Status marché</th>
                <th>Actions</th>
            </thead>

            <tbody>

                @foreach ($marches  as $key=> $marche)
                <tr>
                    <td>{{$key +1}}</td>

                        <td class="py-1">
                            <img src="/upload/marche/{{$marche->photo_marche}}" />
                        </td>
                    <td> {{$marche->nom_marche}}</td>
                    <td> {{$marche->adresse_marche}}</td>
                    <td> {{$marche->localisation_marche}} </td>
                    <td>
                        @if($marche->status_marche == 1)

                        <label class="badge badge-success">Activé</label>

                        @else

                        <label class="badge badge-danger">Desactivé</label>

                        @endif

                    </td>

                    <td>

                        <button class="btn btn-outline-primary"> <a href="{{route('admin.MarcheOne',$marche->id)}}">Modifier</a></button>
                        <button class="btn btn-outline-danger"><a href="{{route('admin.supprimer_Marche',$marche->id)}}" id="delete">Supprimer</a></button>

                        @if($marche->status_marche == 1)

                        <button class="btn btn-outline-warning" onclick="window.location"> <a href="{{route('admin.desactiver_Marche',$marche->id)}}">Désactiver</a></button>

                        @else

                        <button class="btn btn-outline-success" onclick="window.location"> <a href="{{route('admin.activer_Marche',$marche->id)}}">Activer</a></button>

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
