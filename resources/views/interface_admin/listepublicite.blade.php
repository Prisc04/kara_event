@extends('master')

@section('title')
    Kara-Event| Dashboard
@endsection



@section('content')


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tableau publicite</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('admin.creer_publicite')}}">créer une publicitée</a></li>
              <li class="breadcrumb-item active" aria-current="page">liste des publictes</li>
            </ol>
          </nav>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
                <th>Order #</th>
                <th>Nom societe</th>
                <th>Photo publicite</th>
                <th>Type publicite</th>
                <th>Description publicite</th>
                <th>Date publicite</th>
                <th>Status publicite</th>
                <th>Actions</th>
            </thead>

            <tbody>

                @foreach ($pubs  as $key=> $pub)
                <tr>
                    <td>{{$key +1}}</td>

                    <td> {{$pub->nom_societe}}</td>

                    <td class="py-1">
                        <img src="/storage/file/{{$pub->photo_publicite}}" alt="image" />
                    </td>

                    <td> {{$pub->type_publicite->nom_type_publicite}}</td>

                    <td> {{$pub->description_publicite}}</td>

                    <td> {{$pub->date_debut_publicite}}</td>

                    <td> {{$pub->date_fin_publicite}}</td>

                    <td>
                        @if($pub->status_publicite == 1)

                        <label class="badge badge-success">Activé</label>

                        @else

                        <label class="badge badge-danger">Desactivé</label>

                        @endif

                    </td>

                    <td>
                        <button class="btn btn-outline-primary"><a href="{{route('admin.publiciteOne',$pub->id)}}">Modifier</a></button>
                        <button class="btn btn-outline-danger"><a href="{{route('admin.supprimer_publicite',$pub->id)}}" id="delete">Supprimer</a></button>

                        @if($pub->status_publicite == 1)

                            <button class="btn btn-outline-warning" onclick="window.location"> <a href="{{route('admin.desactiver_publicite',$pub->id)}}">Désactiver</a></button>

                        @else

                            <button class="btn btn-outline-success" onclick="window.location"> <a href="{{route('admin.activer_publicite',$pub->id)}}">Activer</a></button>
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
