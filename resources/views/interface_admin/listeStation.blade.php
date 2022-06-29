@extends('master')

@section('title')
    Kara-Event| Dashboard
@endsection



@section('content')


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tableau station</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('admin.creer_Station')}}">Créer les stations</a></li>
              <li class="breadcrumb-item active" aria-current="page">liste des stations</li>
            </ol>
          </nav>
        <div class="table-responsive">
          <table class="table table-striped" id="table_id">
            <thead>
                <th>Order #</th>
                <th>Photo station </th>
                <th>Nom station</th>
                <th>Adresse station</th>
                <th>Contact station</th>
                <th>Localisation station</th>
                <th>Status station</th>
                <th>Actions</th>
            </thead>

            <tbody>

                @foreach ($stations  as $key=> $station)
                <tr>
                    <td>{{$key +1}}</td>

                        <td class="py-1">
                            <img src="/upload/station/{{$station->photo_station}}" />
                        </td>
                    <td> {{$station->nom_station}}</td>
                    <td> {{$station->adresse_station}}</td>
                    <td> {{$station->contact_station}}</td>
                    <td> {{$station->localisation_station }} </td>
                    <td>
                        @if($station->status_station == 1)

                        <label class="badge badge-success">Activé</label>

                        @else

                        <label class="badge badge-danger">Desactivé</label>

                        @endif

                    </td>

                    <td>

                        <button class="btn btn-outline-primary"> <a href="{{route('admin.StationOne',$station->id)}}">Modifier</a></button>
                        <button class="btn btn-outline-danger"><a href="{{route('admin.supprimer_Station',$station->id)}}" id="delete">Supprimer</a></button>

                        @if($station->status_station == 1)

                        <button class="btn btn-outline-warning" onclick="window.location"> <a href="{{route('admin.desactiver_Station',$station->id)}}">Désactiver</a></button>

                        @else

                        <button class="btn btn-outline-success" onclick="window.location"> <a href="{{route('admin.activer_Station',$station->id)}}">Activer</a></button>

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
