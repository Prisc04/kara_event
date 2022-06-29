@extends('master')

@section('title')
    Kara-Event| Dashboard
@endsection



@section('content')


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tableau hotel</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('admin.creer_CentreSante')}}">Créer les centres de sante</a></li>
              <li class="breadcrumb-item active" aria-current="page">liste des centres de sante</li>
            </ol>
          </nav>
        <div class="table-responsive">
          <table class="table table-striped" id="table_id">
            <thead>
                <th>Order #</th>
                <th>Photo hopital</th>
                <th>Nom hopital </th>
                <th>Adresse hopital</th>
                <th>Contact hopital</th>
                <th>Localisation hopital</th>
                <th>Status hopital</th>
                <th>Actions</th>
            </thead>

            <tbody>

                @foreach ($centre_santes  as $key=> $centre_sante)
                <tr>
                    <td>{{$key +1}}</td>

                        <td class="py-1">
                            <img src="/upload/centre_sante/{{$centre_sante->photo_centre_sante}}" />
                        </td>
                    <td> {{$centre_sante->nom_centre_sante}}</td>
                    <td> {{$centre_sante->adresse_centre_sante}}</td>
                    <td> {{$centre_sante->contact_centre_sante}}</td>
                    <td> {{$centre_sante->localisation_centre_sante }} </td>
                    <td>
                        @if($centre_sante->status_centre_sante == 1)

                        <label class="badge badge-success">Activé</label>

                        @else

                        <label class="badge badge-danger">Desactivé</label>

                        @endif

                    </td>

                    <td>

                        <button class="btn btn-outline-primary"> <a href="{{route('admin.CentreSanteOne',$centre_sante->id)}}">Modifier</a></button>
                        <button class="btn btn-outline-danger"><a href="{{route('admin.supprimer_CentreSante',$centre_sante->id)}}" id="delete">Supprimer</a></button>

                        @if($centre_sante->status_centre_sante == 1)

                        <button class="btn btn-outline-warning" onclick="window.location"> <a href="{{route('admin.desactiver_CentreSante',$centre_sante->id)}}">Désactiver</a></button>

                        @else

                        <button class="btn btn-outline-success" onclick="window.location"> <a href="{{route('admin.activer_CentreSante',$centre_sante->id)}}">Activer</a></button>

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
