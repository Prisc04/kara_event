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
                    <li class="breadcrumb-item"><a href="{{route('admin.creer_BarResto')}}">Création de  bar & resto</a></li>
                    <li class="breadcrumb-item active" aria-current="page">liste des bars & resto</li>
                    </ol>
                </nav>
                <div class="table-responsive">
                <table class="table table-striped" id="table_id">
                    <thead>
                        <th>Order #</th>
                        <th>Photo bar & resto</th>
                        <th>Nom bar & resto</th>
                        <th>Adresse bar & resto</th>
                        <th>Contact bar & resto</th>
                        <th>Description bar & resto</th>
                        <th>Email bar & resto</th>
                        <th>Whatsapp bar & resto</th>
                        <th>Localisation bar & resto</th>
                        <th>Site bar & resto</th>
                        <th>Status bar & resto</th>
                        <th>Actions</th>
                    </thead>

                    <tbody>

                        @foreach ($bar_restos  as $key=> $bar_resto)
                        <tr>
                            <td>{{$key +1}}</td>

                                <td class="py-1">
                                    <img src="/upload/barResto/{{$bar_resto->photo_bar_resto}}" />
                                </td>
                            <td> {{$bar_resto->nom_bar_resto}}</td>
                            <td> {{$bar_resto->adresse_bar_resto}}</td>
                            <td> {{$bar_resto->contact_bar_resto}}</td>
                            <td>  {{substr($bar_resto->description_bar_resto, 0, 15)}}...</td>
                            <td> {{$bar_resto->email_bar_resto}}</td>
                            <td> {{$bar_resto->whatsapp_bar_resto}}</td>
                            <td> {{$bar_resto->localisation_bar_resto }} </td>
                            <td> {{$bar_resto->site_bar_resto }} </td>

                            <td>
                                @if($bar_resto->status_bar_resto == 1)

                                <label class="badge badge-success">Activé</label>

                                @else

                                <label class="badge badge-danger">Desactivé</label>

                                @endif

                            </td>

                            <td>

                                <button class="btn btn-outline-primary"> <a href="{{route('admin.BarRestoOne',$bar_resto->id)}}">Modifier</a></button>
                                <button class="btn btn-outline-danger"><a href="{{route('admin.supprimer_BarResto',$bar_resto->id)}}" id="delete">Supprimer</a></button>

                                @if($bar_resto->status_bar_resto == 1)

                                <button class="btn btn-outline-warning" onclick="window.location"> <a href="{{route('admin.desactiver_BarResto',$bar_resto->id)}}">Désactiver</a></button>

                                @else

                                <button class="btn btn-outline-success" onclick="window.location"> <a href="{{route('admin.activer_BarResto',$bar_resto->id)}}">Activer</a></button>

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
