@extends('master')

@section('title')
    Kara-Event| Dashboard
@endsection



@section('content')


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tableau évènement</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('admin.creer_evenement')}}">Créer les évènements</a></li>
              <li class="breadcrumb-item active" aria-current="page">liste des évènements</li>
            </ol>
          </nav>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
                <th>Order #</th>
                <th>Libelle évènement</th>
                <th>date début évènement</th>
                <th>type évènement</th>
                <th>description évènement</th>
                <th>date fin évènement</th>
                <th>Photo évènement</th>
                <th>Status</th>
                <th>Actions</th>
            </thead>

            <tbody>

                @foreach ($evenements  as $key=> $evenement)
                <tr>
                    <td>{{$key +1}}</td>

                    <td class="py-1">
                        <img src="/storage/file/{{$evenement->photo_event}}" alt="image" />
                    </td>
                    <td> {{$evenement->libelle_event}}</td>
                    <td> {{$evenement->date_debut_event}}</td>
                    <td> {{$evenement->type_evenement->nom_type_event}}</td>
                    <td> {{$evenement->date_fin_event}}</td>
                    <td> {{$evenement->description_event }} </td>

                    <td>
                        @if($evenement->status_event == 1)

                        <label class="badge badge-success">Activé</label>

                        @else

                        <label class="badge badge-danger">Desactivé</label>

                        @endif

                    </td>

                    <td>

                        <button class="btn btn-outline-primary"> <a href="{{route('admin.evenementOne',$evenement->id)}}">Modifier</a></button>
                        <button class="btn btn-outline-danger"><a href="{{route('admin.supprimer_evenement',$evenement->id)}}" id="delete">Supprimer</a></button>

                        @if($evenement->status_event == 1)

                        <button class="btn btn-outline-warning" onclick="window.location"> <a href="{{route('admin.desactiver_evenement',$evenement->id)}}">Désactiver</a></button>

                        @else

                        <button class="btn btn-outline-success" onclick="window.location"> <a href="{{route('admin.activer_evenement',$evenement->id)}}">Activer</a></button>

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
