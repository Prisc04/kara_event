
@extends('master')

@section('title')
    Kara-Event| Dashboard
@endsection

@section('content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Modifier type publicite</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('admin.listetypepublicite')}}">Liste type publicite</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Modifier les types publicite</li>
                </ol>
              </nav>

            <form  method="POST" action="{{route('admin.updatetypepublicite', $type_publicite->id)}}" enctype="multipart/form-data">

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
                    <label for="exampleInputName1"> Nom type publicite</label>
                    <input type="text" class="form-control p_input @error('nom_type_publicite') is-invalid @enderror" name="nom_type_publicite" value="{{$type_publicite->nom_type_publicite}}" required autocomplete="nom_type_publicite" autofocus>
                </div>


                  <button type="submit" class ="btn btn-primary">Modifier</button>
            </form>
         </div>
    </div>
</div>


@endsection





