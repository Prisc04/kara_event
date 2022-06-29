@extends('master')

@section('title')
    Kara-Event| Dashboard
@endsection



@section('content')


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tableau pharmacie</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('admin.creer_Pharmacie')}}">Créer les pharmacie</a></li>
              <li class="breadcrumb-item active" aria-current="page">liste des hotels</li>
            </ol>
          </nav>
        <div class="table-responsive">
          <table class="table table-striped" id="table_id">
            <thead>
                <th>Order #</th>
                <th>Photo pharmacie </th>
                <th>Nom pharmacie</th>
                <th>Adresse pharmacie</th>
                <th>Contact pharmacie</th>
                <th>Localisation pharmacie</th>
                <th>Status pharmacie</th>
                <th>Actions</th>
            </thead>

            <tbody>

                @foreach ($pharmacies  as $key=> $pharmacie)
                <tr>
                    <td>{{$key +1}}</td>

                        <td class="py-1">
                            <img src="/upload/pharmacie/{{$pharmacie->photo_pharmacie}}" />
                        </td>
                    <td> {{$pharmacie->nom_pharmacie}}</td>
                    <td> {{$pharmacie->adresse_pharmacie}}</td>
                    <td> {{$pharmacie->contact_pharmacie}}</td>
                    <td> {{$pharmacie->localisation_pharmacie }} </td>
                    <td>
                        @if($pharmacie->status_pharmacie == 1)

                        <label class="badge badge-success">Activé</label>

                        @else

                        <label class="badge badge-danger">Desactivé</label>

                        @endif

                    </td>

                    <td>

                        <button class="btn btn-outline-primary"> <a href="{{route('admin.PharmacieOne',$pharmacie->id)}}">Modifier</a></button>
                        <button class="btn btn-outline-danger"><a href="{{route('admin.supprimer_Pharmacie',$pharmacie->id)}}" id="delete">Supprimer</a></button>

                        @if($pharmacie->status_pharmacie == 1)

                        <button class="btn btn-outline-warning" onclick="window.location"> <a href="{{route('admin.desactiver_Pharmacie',$pharmacie->id)}}">Désactiver</a></button>

                        @else

                        <button class="btn btn-outline-success" onclick="window.location"> <a href="{{route('admin.activer_Pharmacie',$pharmacie->id)}}">Activer</a></button>

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
