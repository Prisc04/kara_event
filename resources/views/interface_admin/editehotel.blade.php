
@extends('master')

@section('title')

    Kara-Event| Dashboard

@endsection

@section('content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Modifier hôtel</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('admin.listehotel')}}">Liste hotel</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Modifier les hotels</li>
                </ol>
              </nav>

            <form  method="POST" action="{{route('admin.updatehotel', $hotel->id)}}" enctype="multipart/form-data">

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
                    <label for="exampleInputName1"> Nom hotel</label>
                    <input type="text" class="form-control p_input @error('nom_hotel') is-invalid @enderror" name="nom_hotel" value="{{$hotel->nom_hotel}}" required autocomplete="nom_hotel" autofocus>
                </div>

                <div class="form-group">
                    <div class='col-md-6'>
                        <label for="">Photo hotel</label>
                        <div>
                            <input type="file" name="photo_hotel" id="image" required autocomplete="photo_hotel" autofocus " class="form-control p_input @error('photo_hotel') is-invalid @enderror" name="photo_hotel" value="{{ old('photo_hotel') }}" required autocomplete="photo_hotel" autofocus " rows="6">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputName1"> Adresse hotel</label>
                    <input type="text" class="form-control p_input @error('adresse_hotel') is-invalid @enderror" name="adresse_hotel" value="{{$hotel->adresse_hotel}}" required autocomplete="adresse_hotel" autofocus>
                </div>

                <div class="form-group">
                    <label for="exampleInputName1"> Localisation hotel</label>
                    <input type="text" class="form-control p_input @error('localisation_hotel') is-invalid @enderror" name="localisation_hotel" value="{{$hotel->localisation_hotel}}" required autocomplete="localisation_hotel" autofocus>
                </div>

                <div class="form-group">
                    <label for="exampleInputName1">Description hotel</label>
                    <input type="text" class="form-control p_input @error('description_hotel') is-invalid @enderror" name="description_hotel" value="{{$hotel->description_hotel}}" required autocomplete="description_hotel" autofocus>
                </div>

                <div class="form-group">
                    <label for="exampleInputName1"> Contact hotel</label>
                    <input type="text" class="form-control p_input @error('contact_hotel') is-invalid @enderror" name="contact_hotel" value="{{$hotel->contact_hotel}}" required autocomplete="contact_hotel" autofocus>
                </div>

                <div class="form-group">
                    <label for="exampleTextarea1">Email hotel</label>
                    <input class="form-control  p_input @error('email_hotel') is-invalid @enderror" name="email_hotel" value="{{ $hotel->email_hotel }}" required autocomplete="email_hotel" autofocus " id="exampleTextarea1" rows="4">
                </div>

                <div class="form-group">
                    <label for="exampleInputName1"> whatsapp hotel</label>
                    <input type="text" class="form-control p_input @error('whatsapp_hotel') is-invalid @enderror" name="whatsapp_hotel" value="{{$hotel->whatsapp_hotel}}" required autocomplete="whatsapp_hotel" autofocus>
                </div>

                <div class="form-group">
                    <label for="exampleInputName1"> site hotel</label>
                    <input type="text" class="form-control p_input @error('site_hotel') is-invalid @enderror" name="site_hotel" value="{{$hotel->site_hotel}}" required autocomplete="site_hotel" autofocus>
                </div>


                  <button type="submit" class ="btn btn-primary">Modifier</button>
            </form>
         </div>
    </div>
</div>


@endsection





