@extends('master')

@section('title')
    Kara-Event| Dashboard
@endsection



@section('content')


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tableau score</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('admin.creer_Score')}}">Créer les scores </a></li>
              <li class="breadcrumb-item active" aria-current="page">liste des scores</li>
            </ol>
          </nav>
        <div class="table-responsive">
          <table class="table table-striped" id="table_id">
            <thead>
                <th>Order #</th>
                <th>Nom canton 1</th>
                <th>point score 1</th>
                <th>Nom canton 2</th>
                <th>point score 2</th>
                <th>Status score 2</th>
                <th>Actions</th>
            </thead>

            <tbody>

                @foreach ($scores  as $key=> $score)
                <tr>
                    <td>{{$key +1}}</td>
                    <td> {{$score->nom_canton1}}</td>
                    <td> {{$score->point_score1}}</td>
                    <td> {{$score->nom_canton2}}</td>
                    <td> {{$score->point_score2}}</td>
                    <td>
                        @if($score->status_score == 1)

                        <label class="badge badge-success">Activé</label>

                        @else

                        <label class="badge badge-danger">Desactivé</label>

                        @endif

                    </td>

                    <td>

                        <button class="btn btn-outline-primary"> <a href="{{route('admin.ScoreOne',$score->id)}}">Modifier</a></button>
                        <button class="btn btn-outline-danger"><a href="{{route('admin.supprimer_Score',$score->id)}}" id="delete">Supprimer</a></button>

                        @if($score->status_score == 1)

                        <button class="btn btn-outline-warning" onclick="window.location"> <a href="{{route('admin.desactiver_Score',$score->id)}}">Désactiver</a></button>

                        @else

                        <button class="btn btn-outline-success" onclick="window.location"> <a href="{{route('admin.activer_Score',$score->id)}}">Activer</a></button>

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
