@extends('master')

@section('title')
    Kara-Event| Dashboard
@endsection



@section('content')


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tableau lutteur</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('admin.creer_lutteur')}}">créer les lutteur lutte</a></li>
              <li class="breadcrumb-item active" aria-current="page">liste lutteur</li>
            </ol>
          </nav>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
                <th>Order #</th>
                <th>Photo lutteur</th>
                <th>Nom lutteur</th>
                <th>Prenom lutteur</th>
                <th>Status lutteur</th>
                <th>Actions</th>
            </thead>

            <tbody>

                @foreach ($lutteurs  as $key=> $lutteur)
                <tr>
                    <td>{{$key +1}}</td>

                        <td class="py-1">
                            <img src="/storage/file/{{$lutteur->photo_lutteur}}" alt="image" />
                        </td>
                    <td> {{$lutteur->nom_lutteur}}</td>
                    <td> {{$lutteur->prenom_lutteur}} </td>

                    <td>
                        @if($lutteur->status_lutteur == 1)

                        <label class="badge badge-success">Activé</label>

                        @else

                        <label class="badge badge-danger">Desactivé</label>

                        @endif

                    </td>

                    <td>


                    <button class="btn btn-outline-primary"><a href="{{route('admin.lutteurOne',$lutteur->id)}}">Modifier</a></button>
                    <button class="btn btn-outline-danger"><a href="{{route('admin.supprimer_lutteur',$lutteur->id)}}" id="delete">Supprimer</a></button>

                       @if($lutteur->status_lutteur == 1)

                       <button class="btn btn-outline-warning" onclick="window.location"> <a href="{{route('admin.desactiver_lutteur',$lutteur->id)}}">Désactiver</a></button>

                       @else

                       <button class="btn btn-outline-success" onclick="window.location"> <a href="{{route('admin.activer_lutteur',$lutteur->id)}}">Activer</a></button>

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
