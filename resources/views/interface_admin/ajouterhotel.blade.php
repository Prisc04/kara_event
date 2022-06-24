@extends('master')

@section('title')
    Kara-Event| Dashboard
@endsection

@section('content')


    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Créer les hotels</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Tableau de bord</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Créer les hotels</li>
                    </ol>
                  </nav>

                    @if(Session::has('status_hotel'))
                            <div class="alert alert-success">
                                    {{Session::get('status_hotel')}}
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

                <form  method="POST" action="{{route('admin.store_hotel')}}" enctype="multipart/form-data">

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
                        <label for="exampleInputName1"> Nom hotel </label>
                        <input type="text" class="form-control p_input @error('nom_hotel') is-invalid @enderror" name="nom_hotel" value="{{ old('nom_hotel') }}" required autocomplete="nom_hotel" autofocus>
                    </div>

                    <div class="form-group">
                        <div class='col-md-6'>
                            <label for="">Photo hotel </label>
                            <div>
                                <input type="file" name="photo_hotel" id="image" required autocomplete="photo_hotel" autofocus " class="form-control p_input @error('photo_hotel') is-invalid @enderror" name="photo_hotel" value="{{ old('photo_hotel') }}" required autocomplete="photo_hotel" autofocus " rows="6">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1"> Adresse hotel </label>
                        <input type="text" class="form-control p_input @error('adresse_hotel') is-invalid @enderror" name="adresse_hotel" value="{{ old('adresse_hotel') }}" required autocomplete="adresse_hotel" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1">Localisation hotel </label>
                        <input type="text" class="form-control p_input @error('localisation_hotel') is-invalid @enderror" name="localisation_hotel" value="{{ old('localisation_hotel') }}" required autocomplete="localisation_hotel" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="exampleTextarea1">Description hotel</label>
                        <textarea class="form-control  p_input @error('description_hotel') is-invalid @enderror" name="description_hotel" value="{{ old('description_hotel') }}" required autocomplete="description_hotel" autofocus " id="exampleTextarea1" rows="4"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Contact hotel</label>
                        <input  type="text" class="form-control p_input @error('contact_hotel') is-invalid @enderror" name="contact_hotel" value="{{ old('contact_hotel') }}" required autocomplete="contact_hotel" autofocus>
                    </div>

                    <div class="form-group">
                        <label>Email hotel</label>
                        <input  type="text" class="form-control @error('email_hotel') is-invalid @enderror" name="email_hotel" value="{{ old('email_hotel') }}" required autocomplete="email_hotel">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1"> whatsapp hotel </label>
                        <input type="text" class="form-control p_input @error('whatsapp_hotel') is-invalid @enderror" name="whatsapp_hotel" value="{{ old('whatsapp_hotel') }}" required autocomplete="whatsapp_hotel" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1"> site hotel </label>
                        <input type="text" class="form-control p_input @error('site_hotel') is-invalid @enderror" name="site_hotel" value="{{ old('site_hotel') }}" required autocomplete="site_hotel" autofocus>
                    </div>

                      <button type="submit" class ="btn btn-primary">Ajouter</button>
                </form>
             </div>
        </div>
    </div>

 @endsection










