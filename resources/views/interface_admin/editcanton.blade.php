
@extends('master')

@section('title')
    Modifier cantons
@endsection

@section('content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Modifier canton</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('admin.listecanton')}}">Liste canton</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Modifier les canton</li>
                </ol>
              </nav>

            <form  method="POST" action="{{route('admin.updateCanton', $canton->id)}}" enctype="multipart/form-data">

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
                    <label for="exampleInputName1"> Nom canton</label>
                    <input type="text" class="form-control p_input @error('nom_canton') is-invalid @enderror" name="nom_canton" value="{{$canton->nom_canton}}" required autocomplete="nom_canton" autofocus>
                </div>

                <div class="form-group">
                    <label for="exampleTextarea1">Description canton</label>
                    <input class="form-control  p_input @error('description_canton') is-invalid @enderror" name="description_canton" value="{{ $canton->description_canton }}" required autocomplete="description_canton" autofocus " id="exampleTextarea1" rows="4"></textarea>
                </div>

                <div class="form-group">
                    <div class='col-md-6'>
                        <label for="">Photo </label>
                        <div>
                            <input type="file" name="image_canton" id="image" required autocomplete="image_canton" autofocus " class="form-control p_input @error('description_canton') is-invalid @enderror" name="description_canton" value="{{ old('image_canton') }}" required autocomplete="image_canton" autofocus " rows="6">
                        </div>
                    </div>
                </div>
                  <button type="submit" class ="btn btn-primary">Modifier</button>
            </form>
         </div>
    </div>
</div>


@endsection





