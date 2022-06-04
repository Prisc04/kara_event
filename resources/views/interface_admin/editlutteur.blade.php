@extends('master')

@section('title')
    Kara-Event| Dashboard
@endsection

@section('content')


    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Modifier les lutteurs</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{route('admin.listelutteur')}}">Liste lutteur</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Modifier lutteur</li>
                    </ol>
                  </nav>

                <form  method="POST" action="{{route('admin.updateLutteur', $lutteur->id)}}, $lutteur->id)}}" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')
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
                        <input type="text" class="form-control p_input @error('nom_lutteur') is-invalid @enderror" name="nom_lutteur" value="{{$lutteur->nom_lutteur}}" placeholder="" required autocomplete="nom_lutteur" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1"> Prenom lutteur</label>
                        <input type="text" class="form-control p_input @error('prenom_lutteur') is-invalid @enderror" name="prenom_lutteur" value="{{$lutteur->prenom_lutteur}}" required autocomplete="prenom_lutteur" autofocus>
                    </div>


                    <div class="form-group">
                        <div class='col-md-6'>
                            <label for="">Photo </label>
                            <div>
                                <input type="file" name="photo_lutteur" id="image" required autocomplete="photo_lutteur" autofocus " class="form-control p_input @error('photo_lutteur') is-invalid @enderror" name="photo_lutteur" value="{{$lutteur->photo_lutteur}}" required autocomplete="photo_lutteur" autofocus " rows="6">
                            </div>
                        </div>
                    </div>
                      <button type="submit" class ="btn btn-primary">Modifier</button>
                </form>
             </div>
        </div>
    </div>

 @endsection










