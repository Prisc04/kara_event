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
              <li class="breadcrumb-item"><a href="{{route('admin.creer_Guichet')}}">Créer les guichets</a></li>
              <li class="breadcrumb-item active" aria-current="page">liste des guichets</li>
            </ol>
          </nav>
        <div class="table-responsive">
          <table class="table table-striped" id="table_id">
            <thead>
                <th>Order #</th>
                <th>Photo guichet</th>
                <th>Nom guichet</th>
                <th>Description guichet</th>
                <th>Localisation guichet</th>
                <th>Status guichet</th>
                <th>Actions</th>
            </thead>

            <tbody>

                @foreach ($guichet_automatiques  as $key=> $guichet_automatique)
                <tr>
                    <td>{{$key +1}}</td>

                        <td class="py-1">
                            <img src="/upload/guichet/{{$guichet_automatique->photo_guichet}}" />
                        </td>
                    <td> {{$guichet_automatique->nom_guichet}}</td>
                    <td> {{$guichet_automatique->description_guichet}}</td>
                    <td> {{$guichet_automatique->localisation_guichet}} </td>
                    <td>
                        @if($guichet_automatique->status_guichet == 1)

                        <label class="badge badge-success">Activé</label>

                        @else

                        <label class="badge badge-danger">Desactivé</label>

                        @endif

                    </td>

                    <td>

                        <button class="btn btn-outline-primary"> <a href="{{route('admin.GuichetOne',$guichet_automatique->id)}}">Modifier</a></button>
                        <button class="btn btn-outline-danger"><a href="{{route('admin.supprimer_Guichet',$guichet_automatique->id)}}" id="delete">Supprimer</a></button>

                        @if($guichet_automatique->status_guichet == 1)

                        <button class="btn btn-outline-warning" onclick="window.location"> <a href="{{route('admin.desactiver_Guichet',$guichet_automatique->id)}}">Désactiver</a></button>

                        @else

                        <button class="btn btn-outline-success" onclick="window.location"> <a href="{{route('admin.activer_Guichet',$guichet_automatique->id)}}">Activer</a></button>

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
