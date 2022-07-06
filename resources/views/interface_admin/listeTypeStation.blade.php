@extends('master')

@section('title')
    Kara-Event| Dashboard
@endsection


@section('content')


    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tableau type station</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.creerTypeStation')}}">Créer les types stations</a></li>
                    <li class="breadcrumb-item active" aria-current="page">liste des types stations</li>
                    </ol>
                </nav>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <th>Order #</th>
                            <th>Libelle</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </thead>

                        <tbody>

                            @foreach ($type_stations  as $key=> $type_station)
                            <tr>
                                <td>{{$key +1}}</td>

                                <td> {{$type_station->libelle}}</td>

                                <td>
                                    @if($type_station->status == 1)

                                    <label class="badge badge-success">Activé</label>

                                    @else

                                    <label class="badge badge-danger">Desactivé</label>

                                    @endif

                                </td>

                                <td>

                                    <button class="btn btn-outline-primary"> <a href="{{route('admin.TypeStationOne',$type_station->id)}}">Modifier</a></button>
                                    <button class="btn btn-outline-danger"><a href="{{route('admin.supprimerTypeStation',$type_station->id)}}" id="delete">Supprimer</a></button>

                                    @if($type_station->status == 1)

                                    <button class="btn btn-outline-warning" onclick="window.location"> <a href="{{route('admin.desactiverTypeStation',$type_station->id)}}">Désactiver</a></button>

                                    @else

                                    <button class="btn btn-outline-success" onclick="window.location"> <a href="{{route('admin.activerTypeStation',$type_station->id)}}">Activer</a></button>

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
