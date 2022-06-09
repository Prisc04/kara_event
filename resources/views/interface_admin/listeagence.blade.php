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

                            @foreach ($agences  as $key=> $agence)
                            <tr>
                                <td>{{$key +1}}</td>

                                <td> {{$agence->nom_agence}}</td>

                                <td class="py-1">
                                    <img src="/storage/files/{{$agence->photo_agence}}" />
                                </td>

                                <td> {{$agence-> localisation_agence}} </td>

                                <td> {{$agence-> description_agence}} </td>


                                <td>
                                    @if($agence->status_agence == 1)

                                    <label class="badge badge-success">Activé</label>

                                    @else

                                    <label class="badge badge-danger">Desactivé</label>

                                    @endif

                                </td>

                                <td>

                                    <button class="btn btn-outline-primary"> <a href="{{route('admin.agenceOne',$agence->id)}}">Modifier</a></button>
                                    <button class="btn btn-outline-danger"><a href="{{route('admin.supprimer_agence',$agence->id)}}" id="delete">Supprimer</a></button>

                                    @if($agence->status_agence == 1)

                                    <button class="btn btn-outline-warning" onclick="window.location"> <a href="{{route('admin.desactiver_agence',$agence->id)}}">Désactiver</a></button>

                                    @else

                                    <button class="btn btn-outline-success" onclick="window.location"> <a href="{{route('admin.activer_agence',$agence->id)}}">Activer</a></button>

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
