@extends('master')

@section('title')
    Kara-Event| Dashboard
@endsection

@section('content')


    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Créer les cantons</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Tableau de bord</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Créer les canton</li>
                    </ol>
                  </nav>

                    @if(Session::has('status_canton'))
                            <div class="alert alert-success">
                                    {{Session::get('status_canton')}}
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

                <form  method="POST" action="{{route('admin.store_canton')}}" enctype="multipart/form-data">

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
                        <label for="exampleInputName1"> Nom canton</label>
                        <input type="text" class="form-control p_input @error('nom_canton') is-invalid @enderror" name="nom_canton" value="{{ old('nom_canton') }}" required autocomplete="nom_canton" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="exampleTextarea1">Description canton</label>
                        <textarea class="form-control  p_input @error('description_canton') is-invalid @enderror" name="description_canton" value="{{ old('description_canton') }}" required autocomplete="description_canton" autofocus " id="exampleTextarea1" rows="4"></textarea>
                    </div>

                    <div class="form-group">
                        <div class='col-md-6'>
                            <label for="">Photo </label>
                            <div>
                                <input type="file" name="image_canton" id="image" required autocomplete="image_canton" autofocus " class="form-control p_input @error('image_canton') is-invalid @enderror" name="image_canton" value="{{ old('image_canton') }}" required autocomplete="image_canton" autofocus " rows="6">
                            </div>
                        </div>
                    </div>
                      <button type="submit" class ="btn btn-primary">Ajouter</button>
                </form>
             </div>
        </div>
    </div>

 @endsection










