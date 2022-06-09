@extends('master')

@section('title')
    Kara-Event| Dashboard
@endsection

@section('content')


    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Créer les publicites</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Tableau de bord</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Créer les publicites</li>
                    </ol>
                </nav>

                @if(Session::has('status_publicite'))
                  <div class="alert alert-success">
                        {{Session::get('status_publicite')}}
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

                <form  method="POST" action="{{route('admin.store_publicite')}}" enctype="multipart/form-data">

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
                        <label for="exampleInputName1"> Nom societe</label>
                        <input type="text" class="form-control p_input @error('nom_societe') is-invalid @enderror" name="nom_societe" value="{{ old('nom_societe') }}" required autocomplete="nom_societe" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="type_societe_id">Type publicite</label>
                        <select class="form-control p_input @error('type_publicite_id') is-invalid @enderror" name="type_publicite_id" value="{{ old('type_publicite_id') }}" required autocomplete="type_publicite_id" autofocus>
                            @foreach ($typepublicites  as $typepublicite)
                            <option value="{{$typepublicite->id}}">{{$typepublicite->nom_type_publicite}}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="form-group">
                        <label for="exampleTextarea1">Description publicite</label>
                        <textarea class="form-control  p_input @error('description_publicite') is-invalid @enderror" name="description_publicite" value="{{ old('description_publicite') }}" required autocomplete="description_publicite" autofocus " id="exampleTextarea1" rows="4"></textarea>
                    </div>

                    <div class="form-group">
                        <div class='col-md-6'>
                            <label for="">Photo publicite </label>
                            <div>
                                <input type="file" name="photo_publicite" id="image" required autocomplete="photo_publicite" autofocus " class="form-control p_input @error('photo_publicite') is-invalid @enderror" name="photo_publicite" value="{{ old('photo_publicite') }}" required autocomplete="photo_publicite" autofocus " rows="6">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1"> Date debut publicite</label>
                        <input type="date" class="form-control p_input @error('date_debut_publicite') is-invalid @enderror" name="date_debut_publicite" value="{{ old('date_debut_publicite') }}" required autocomplete="date_debut_publicite" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1"> Date fin publicite</label>
                        <input type="date" class="form-control p_input @error('date_fin_publicite') is-invalid @enderror" name="date_fin_publicite" value="{{ old('date_fin_publicite') }}" required autocomplete="date_fin_publicite" autofocus>
                    </div>



                      <button type="submit" class ="btn btn-primary">Ajouter</button>
                </form>
             </div>
        </div>
    </div>

 @endsection










