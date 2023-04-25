@extends('master.layout')

@section('content')

<div class="row">
    <div class="col-xl-12">
        <div class="container-fluid" style="position:relative;top:50px;min-height:992px;">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-xl-12 " data-aos="fade">
                  @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
        
            <form action="{{route('services.store')}}" enctype="multipart/form-data"  method="post" >
              @csrf
              <h3 class="text-center">Formulaire de service :</h3>
              <p class="text-center">Remplir  les champs s'il vous plait. </p>
              <div class="row gy-3 ">
        
                <div class="col-md-12">
                  <input type="text" name="Service" class="form-control" placeholder="Service" value="{{old('Service')}}" required>
                </div>
        
                
        
                <div class="col-md-12 text-center">
                  <button class="btn btn-warning" type="submit">Valider</button>
                </div>
        
              </div>
            </form>
          </div><!-- End Quote Form -->
        
            </div>
        </div>
    </div>
</div>







@endsection