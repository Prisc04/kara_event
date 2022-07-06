@extends('master')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title"> Créer les utilisateurs </h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Tableau de bord</a></li>
            <li class="breadcrumb-item active" aria-current="page">Utilisateur</li>
          </ol>
        </nav>
      </div>
      <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title"></h4>
              <p class="card-description"> </p>
              <form method="POST" action="{{route("admin.create")}}">

                @csrf

                @if (Session::get('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>
                @endif

                @if (Session::get('fail'))
                <div class="alert alert-danger">
                    {{Session::get('fail')}}
                </div>
                @endif


                <div class="form-group">
                    <label>Nom utilisateur</label>
                    <input id="nom_utilisateur" type="text" class="form-control p_input @error('nom_utilisateur') is-invalid @enderror" name="nom_utilisateur" value="{{ old('nom_utilisateur') }}" required autocomplete="nom_utilisateur" autofocus>
                    @error('nom_utilisateur')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
              </div>

            <div class="form-group">
                <label>Prenom utilisateur</label>
                <input id="prenom_utilisateur" type="text" class="form-control p_input @error('prenom_utilisateur') is-invalid @enderror" name="prenom_utilisateur" value="{{ old('prenom_utilisateur') }}" required autocomplete="prenom_utilisateur" autofocus>
                @error('prenom_utilisateur')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
          </div>

          <div class="form-group">
            <label>Téléphone</label>
            <input id="telephone" type="telephone" class="form-control p_input @error('telephone') is-invalid @enderror" name="telephone" value="{{ old('telephone') }}" required autocomplete="telephone" autofocus>
            @error('telephone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="form-group">
                <label>Email</label>
                <input  id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                 @enderror
          </div>

          <div class="form-group">
                <label>Role</label>
                <select class="form-control" id="exampleSelectGender" name="role" >
                    <option selected>selectionnez le role</option>
                    <option value="super_admin">Super admin</option>
                    <option value="admin">Admin</option>
                    <option value="root">Root</option>
                    <option value="utilisateur">Utilisateur</option>
                </select>
                @error('telephone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
          </div>


         <div class="form-group">
                <label>Mot de passe</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                 @enderror
         </div>

            <div class="form-group">
                <label>Confirmation du mot de passe</label>
                <input  id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                 @enderror

            </div>

            {{-- <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                </div>
            </div> --}}



              <div class="text-center">
                <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
              </div>


              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
</div



@endsection
