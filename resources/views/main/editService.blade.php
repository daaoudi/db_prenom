@extends('master.layout')

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="container-fluid" style="position:relative;top:50px;min-height:992px;">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-md-6 " data-aos="fade">
                      @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif
            
                <form action="{{route('services.update',$service->id)}}" enctype="multipart/form-data"  method="POST" >
                  @csrf
                  @method('PUT')
                  <h3 class="text-center text-dark">Formulaire de service: {{$service->Service}} </h3>
                  
                  <div class="row gy-3 ">
            
                    <div class="col-md-12">
                      <input type="text" name="Service" value="{{$service->Service}}" class="form-control" placeholder="Service" required>
                    </div>
            
                   
            
                    <div class="col-md-12 text-center">
                      
                    
                     
                      <button class="btn btn-warning" type="submit">Modifier</button>
                    </div>
            
                  </div>
                </form>
               
              </div>
            
                </div>
            </div>
            
        </div>
    </div>


@endsection