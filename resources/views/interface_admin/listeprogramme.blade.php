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
              <li class="breadcrumb-item"><a href="{{route('admin.creer_programme')}}">Créer les programmes </a></li>
              <li class="breadcrumb-item active" aria-current="page">liste des programmes</li>
            </ol>
          </nav>
        <div class="table-responsive">
          <table class="table table-striped" id="table_id">
            <thead>
                <th>Order #</th>
                <th>jour du programme</th>
                <th>Date du programme</th>
                <th>Heure du programme</th>
                <th>Match du programme</th>
                <th>lieu du programme</th>
                <th>Status programme</th>
                <th>Actions</th>
            </thead>

            <tbody>

                @foreach ($programme_evenements  as $key=> $programme_evenement)
                <tr>
                    <td>{{$key +1}}</td>
                    <td> {{$programme_evenement->jour_programme}}</td>
                    <td> {{$programme_evenement->date_programme}}</td>
                    <td> {{$programme_evenement->heure_programme}} </td>
                    <td> {{$programme_evenement->match_programme}} </td>
                    <td> {{$programme_evenement->lieu_programme}} </td>

                    <td>
                        @if($programme_evenement->status_programme == 1)

                        <label class="badge badge-success">Activé</label>

                        @else

                        <label class="badge badge-danger">Desactivé</label>

                        @endif

                    </td>

                    <td>

                        <button class="btn btn-outline-primary"> <a href="{{route('admin.programmeOne',$programme_evenement->id)}}">Modifier</a></button>
                        <button class="btn btn-outline-danger"><a href="{{route('admin.supprimer_programme',$programme_evenement->id)}}" id="delete">Supprimer</a></button>

                        @if($programme_evenement->status_programme == 1)

                        <button class="btn btn-outline-warning" onclick="window.location"> <a href="{{route('admin.desactiver_programme',$programme_evenement->id)}}">Désactiver</a></button>

                        @else

                        <button class="btn btn-outline-success" onclick="window.location"> <a href="{{route('admin.activer_programme',$programme_evenement->id)}}">Activer</a></button>

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
