@extends('master')

@section('title')
    Kara-Event| Dashboard
@endsection



@section('content')


    <div class="card">
        <div class="card-body">
        <h4 class="card-title">Tableau des utilisateurs</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('admin.register')}}">Créer utilisateur</a></li>
              <li class="breadcrumb-item active" aria-current="page">Liste utilisateur</li>
            </ol>
          </nav>
        <div class="row">
            <div class="col-12">
            <div class="table-responsive">
                <table id="order-listing" class="table">
                <thead>
                    <tr>
                        <th>Order #</th>
                        <th>Nom utilisateur</th>
                        <th>Prenom utilisateur</th>
                        <th>Téléphone</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admins as $key=> $admin)

                    <tr>
                        <td>{{$key +1}}</td>
                        <td>{{$admin->admin_nom}}</td>
                        <td>{{$admin->admin_prenom}}</td>
                        <td>{{$admin->admin_telephone}}</td>
                        <td>{{$admin->email}}</td>
                        <td>{{$admin->admin_role}}</td>
                        <td>{{$admin->admin_status}}</td>

                        <td>
                            @if($admin->admin_status == 1)

                            <label class="badge badge-success">Activé</label>

                            @else

                            <label class="badge badge-danger">Desactivé</label>

                            @endif

                        </td>

                        <td>



                            <button class="btn btn-outline-danger"><a href="{{route('admin.supprimer_admin',$admin->id)}}" id="delete">Supprimer</a></button>

                              @if($admin->admin_status == 1)

                              <button class="btn btn-outline-warning" onclick="window.location"> <a href="{{route('admin.desactiver_admin',$admin->id)}}">Désactiver</a></button>

                              @else

                              <button class="btn btn-outline-success" onclick="window.location"> <a href="{{route('admin.activer_admin',$admin->id)}}">Activer</a></button>

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
    </div>

@endsection
