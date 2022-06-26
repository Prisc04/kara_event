@extends('master')

@section('title')
    Kara-Event| Dashboard
@endsection



@section('content')


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tableau canton</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('admin.creercanton')}}">Créer les canton</a></li>
              <li class="breadcrumb-item active" aria-current="page">liste des cantons</li>
            </ol>
          </nav>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
                <th>Order #</th>
                <th>Photo canton</th>
                <th>Nom canton</th>
                <th>Description canton</th>
                <th>Status canton</th>
                <th>Actions</th>
            </thead>

            <tbody>

                @foreach ($cantons  as $key=> $canton)
                <tr>
                    <td>{{$key +1}}</td>

                        <td class="py-1">
                            <img src="/upload/canton/{{$canton->photo_canton}}" />
                        </td>
                    <td> {{$canton->nom_canton}}</td>
                    <td> {{$canton->description_canton }} </td>

                    <td>
                        @if($canton->status_canton == 1)

                        <label class="badge badge-success">Activé</label>

                        @else

                        <label class="badge badge-danger">Desactivé</label>

                        @endif

                    </td>

                    <td>

                        <button class="btn btn-outline-primary"> <a href="{{route('admin.cantonOne',$canton->id)}}">Modifier</a></button>
                        <button class="btn btn-outline-danger"><a href="{{route('admin.supprimer_canton',$canton->id)}}" id="delete">Supprimer</a></button>

                        @if($canton->status_canton == 1)

                        <button class="btn btn-outline-warning" onclick="window.location"> <a href="{{route('admin.desactiver_canton',$canton->id)}}">Désactiver</a></button>

                        @else

                        <button class="btn btn-outline-success" onclick="window.location"> <a href="{{route('admin.activer_canton',$canton->id)}}">Activer</a></button>

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
