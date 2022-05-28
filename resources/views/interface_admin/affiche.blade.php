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
                    @foreach ($admins as $admin)

                    <tr>

                        <td>{{$admin->id}}</td>
                        <td>{{$admin->admin_nom}}</td>
                        <td>{{$admin->admin_prenom}}</td>
                        <td>{{$admin->admin_telephone}}</td>
                        <td>{{$admin->email}}</td>
                        <td>{{$admin->admin_role}}</td>
                        <td>{{$admin->admin_status}}</td>



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
