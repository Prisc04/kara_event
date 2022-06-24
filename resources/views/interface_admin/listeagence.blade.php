@extends('master')

@section('title')
    Kara-Event| Dashboard
@endsection



@section('content')


    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tableau agence</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.creer_agence')}}">Créer les agences</a></li>
                    <li class="breadcrumb-item active" aria-current="page">liste des agences</li>
                    </ol>
                </nav>
                <div class="table-responsive">
                    <table class="table table-striped">

                        <thead>
                            <th>Order #</th>
                            <th>Nom agence</th>
                            <th>Photo agence</th>
                            <th>Localisation agence</th>
                            <th>Description agence</th>
                            <th>Status agence</th>
                            <th>Actions</th>
                        </thead>

                        <tbody>

                            @foreach ($agents  as $key=> $agent)
                            <tr>
                                <td>{{$key +1}}</td>

                                <td> {{$agent->nom_agence}}</td>

                                <td class="py-1">
                                    <img src="/storage/files/{{$agent->photo_agence}}" />
                                </td>

                                <td> {{$agent-> localisation_agence}} </td>

                                <td> {{$agent-> description_agence}} </td>


                                <td>
                                    @if($agent->status_agence == 1)

                                    <label class="badge badge-success">Activé</label>

                                    @else

                                    <label class="badge badge-danger">Desactivé</label>

                                    @endif

                                </td>

                                <td>

                                    <button class="btn btn-outline-primary"> <a href="{{route('admin.agenceOne',$agent->id)}}">Modifier</a></button>
                                    <button class="btn btn-outline-danger"><a href="{{route('admin.supprimer_agence',$agent->id)}}" id="delete">Supprimer</a></button>

                                    @if($agent->status_agence == 1)

                                    <button class="btn btn-outline-warning" onclick="window.location"> <a href="{{route('admin.desactiver_agence',$agent->id)}}">Désactiver</a></button>

                                    @else

                                    <button class="btn btn-outline-success" onclick="window.location"> <a href="{{route('admin.activer_agence',$agent->id)}}">Activer</a></button>

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
