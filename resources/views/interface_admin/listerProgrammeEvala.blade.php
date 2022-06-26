@extends('master')

@section('title')
    Kara-Event| Dashboard
@endsection



@section('content')


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tableau programme</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('admin.creer_ProgrammeEvela')}}">Créer les programmes </a></li>
              <li class="breadcrumb-item active" aria-current="page">liste des programmes</li>
            </ol>
          </nav>
        <div class="table-responsive">
          <table class="table table-striped" id="table_id">
            <thead>
                <th>Order #</th>
                <th>jour du programme</th>
                <th>Date du programme</th>
                <th>Rencontre du programme</th>
                <th>lieu du programme</th>
                <th>localisation programme</th>
                <th>Heure du programme</th>
                <th>Observation du programme</th>
                <th>Status programme</th>
                <th>Actions</th>
            </thead>

            <tbody>

                @foreach ($programme_evalas  as $key=> $programme_evala)
                <tr>
                    <td>{{$key +1}}</td>
                    <td> {{$programme_evala->jour_programme_evala }}</td>
                    <td> {{$programme_evala->date_programme_evala }}</td>
                    <td> {{$programme_evala->rencontre_programme_evala}}</td>
                    <td> {{$programme_evala->lieu_programme_evala}} </td>
                    <td>{{$programme_evala->localisation_programme_evala}}</td>
                    <td> {{$programme_evala->heure_programme_evala 	}} </td>
                    <td> {{$programme_evala->observation_programme_evala}} </td>
                    <td>
                        @if($programme_evala->status_programme_evala == 1)

                        <label class="badge badge-success">Activé</label>

                        @else

                        <label class="badge badge-danger">Desactivé</label>

                        @endif

                    </td>

                    <td>

                        <button class="btn btn-outline-primary"> <a href="{{route('admin.ProgrammeEvelaOne',$programme_evala->id)}}">Modifier</a></button>
                        <button class="btn btn-outline-danger"><a href="{{route('admin.supprimer_ProgrammeEvela',$programme_evala->id)}}" id="delete">Supprimer</a></button>

                        @if($programme_evala->status_programme_evala == 1)

                        <button class="btn btn-outline-warning" onclick="window.location"> <a href="{{route('admin.desactiver_ProgrammeEvala',$programme_evala->id)}}">Désactiver</a></button>

                        @else

                        <button class="btn btn-outline-success" onclick="window.location"> <a href="{{route('admin.activer_ProgrammeEvala',$programme_evala->id)}}">Activer</a></button>

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
