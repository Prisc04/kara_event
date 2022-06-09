@extends('master')

@section('title')
    Kara-Event| Dashboard
@endsection

@section('content')


    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Créer les lutteurs</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Tableau de bord</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Créer les lutteurs</li>
                    </ol>
                  </nav>

                  @if(Session::has('status_lutteur'))
                  <div class="alert alert-success">
                          {{Session::get('status_lutteur')}}
                  </div>
          @endif

               @if(count($errors)> 0)

                 <div class="alert alert-danger">
                      <ul>
                          @foreach($errors->all() as $error)

                          <li>{{$error}}</li>

                          @endforeach
                      </ul>
                 </div>


              @endif

                <form  method="POST" action="{{route('admin.store_lutteur')}}" enctype="multipart/form-data">

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
                        <label for="exampleInputName1"> Nom lutteur</label>
                        <input type="text" class="form-control p_input @error('nom_lutteur') is-invalid @enderror" name="nom_lutteur" value="{{ old('nom_lutteur') }}" required autocomplete="nom_lutteur" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1"> Prenom lutteur</label>
                        <input type="text" class="form-control p_input @error('prenom_lutteur') is-invalid @enderror" name="prenom_lutteur" value="{{ old('prenom_lutteur') }}" required autocomplete="prenom_lutteur" autofocus>
                    </div>


                    <div class="form-group">
                        <div class='col-md-6'>
                            <label for="">Photo </label>
                            <div>
                                <input type="file" name="photo_lutteur" id="image" required autocomplete="photo_lutteur" autofocus " class="form-control p_input @error('photo_lutteur') is-invalid @enderror" name="photo_lutteur" value="{{ old('photo_lutteur') }}" required autocomplete="photo_lutteur" autofocus " rows="6">
                            </div>
                        </div>
                    </div>
                      <button type="submit" class ="btn btn-primary">Ajouter</button>
                </form>
             </div>
        </div>
    </div>

 @endsection










