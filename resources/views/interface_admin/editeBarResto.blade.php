
@extends('master')

@section('title')

    Kara-Event| Dashboard

@endsection

@section('content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Modifier bar & resto</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('admin.listeBarResto')}}">Liste bar & resto</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Modifier les bar & resto</li>
                </ol>
              </nav>

            <form  method="POST" action="{{route('admin.updateBarResto', $bar_resto->id)}}" enctype="multipart/form-data">

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
                    <label for="exampleInputName1"> Nom bar & resto</label>
                    <input type="text" class="form-control p_input @error('nom_bar_resto') is-invalid @enderror" name="nom_bar_resto" value="{{$bar_resto->nom_bar_resto}}" required autocomplete="nom_bar_resto" autofocus>
                </div>

                <div class="form-group">
                    <div class='col-md-6'>
                        <label for="">Photo bar & resto</label>
                        <div>
                            <input type="file" name="photo_bar_resto" id="image" required autocomplete="photo_bar_resto" autofocus " class="form-control p_input @error('photo_bar_resto') is-invalid @enderror" name="photo_bar_resto" value="{{ old('photo_bar_resto') }}" required autocomplete="photo_bar_resto" autofocus " rows="6">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputName1"> Adresse bar & resto</label>
                    <input type="text" class="form-control p_input @error('adresse_bar_resto') is-invalid @enderror" name="adresse_bar_resto" value="{{$bar_resto->adresse_bar_resto}}" required autocomplete="adresse_bar_resto" autofocus>
                </div>

                <div class="form-group">
                    <label for="exampleInputName1"> Localisation bar & resto</label>
                    <input type="text" class="form-control p_input @error('localisation_bar_resto') is-invalid @enderror" name="localisation_bar_resto" value="{{$bar_resto->localisation_bar_resto}}" required autocomplete="localisation_bar_resto" autofocus>
                </div>

                <div class="form-group">
                    <label for="exampleInputName1">Description bar & resto</label>
                    <input type="text" class="form-control p_input @error('description_bar_resto') is-invalid @enderror" name="description_bar_resto" value="{{$bar_resto->description_bar_resto}}" required autocomplete="description_bar_resto" autofocus>
                </div>

                <div class="form-group">
                    <label for="exampleInputName1"> Contact bar & resto</label>
                    <input type="text" class="form-control p_input @error('contact_bar_resto') is-invalid @enderror" name="contact_bar_resto" value="{{$bar_resto->contact_bar_resto}}" required autocomplete="contact_bar_resto" autofocus>
                </div>

                <div class="form-group">
                    <label for="exampleTextarea1">Email bar & resto</label>
                    <input class="form-control  p_input @error('email_bar_resto') is-invalid @enderror" name="email_bar_resto" value="{{ $bar_resto->email_bar_resto }}" required autocomplete="email_bar_resto" autofocus ">
                </div>

                <div class="form-group">
                    <label for="exampleInputName1"> whatsapp bar & resto</label>
                    <input type="text" class="form-control p_input @error('whatsapp_bar_resto') is-invalid @enderror" name="whatsapp_bar_resto" value="{{$bar_resto->whatsapp_bar_resto}}" required autocomplete="whatsapp_bar_resto" autofocus>
                </div>

                <div class="form-group">
                    <label for="exampleInputName1"> site bar_resto</label>
                    <input type="text" class="form-control p_input @error('site_bar_resto') is-invalid @enderror" name="site_bar_resto" value="{{$bar_resto->site_bar_resto}}" required autocomplete="site_bar_resto" autofocus>
                </div>


                  <button type="submit" class ="btn btn-primary">Modifier</button>
            </form>
         </div>
    </div>
</div>


@endsection





