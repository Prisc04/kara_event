@extends('master')

@section('title')
    Kara-Event| Dashboard
@endsection


@section('content')


    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tableau type publicite</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.creer_typepublicite')}}">Créer les types de publicite</a></li>
                    <li class="breadcrumb-item active" aria-current="page">liste des types publicite</li>
                    </ol>
                </nav>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <th>Order #</th>
                            <th>Nom type publicite</th>
                            <th>Status type publicite</th>
                            <th>Actions</th>
                        </thead>

                        <tbody>

                            @foreach ($type_publicites  as $key=> $type_publicite)
                            <tr>
                                <td>{{$key +1}}</td>

                                <td> {{$type_publicite->nom_type_publicite }} </td>

                                <td>
                                    @if($type_publicite->status_type_publicite== 1)

                                    <label class="badge badge-success">Activé</label>

                                    @else

                                    <label class="badge badge-danger">Desactivé</label>

                                    @endif

                                </td>

                                <td>

                                    <button class="btn btn-outline-primary"> <a href="{{route('admin.typepubliciteOne',$type_publicite->id)}}">Modifier</a></button>
                                    <button class="btn btn-outline-danger"> <a href="{{route('admin.supprimer_typepublicite',$type_publicite->id)}}" id="delete">Supprimer</a></button>

                                    @if($type_publicite->status_type_publicite == 1)

                                    <button class="btn btn-outline-warning" onclick="window.location"> <a href="{{route('admin.desactiver_typepublicite',$type_publicite->id)}}">Désactiver</a></button>

                                    @else

                                    <button class="btn btn-outline-success" onclick="window.location"> <a href="{{route('admin.activer_typepublicite',$type_publicite->id)}}">Activer</a></button>

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
