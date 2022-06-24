<!DOCTYPE html>
<html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Kara-Event</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- End layout styles -->

  </head>

  <body>

    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Création de compte</h3>

        <form  method="POST" action="{{route("admin.create")}}">
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
                  <p class="terms">By creating an account you are accepting our<a href="#"> Terms & Conditions</a></p>
            </form>

              </div>

            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <!-- endinject -->
  </body>
</html>
