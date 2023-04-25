@extends('master.layout')

@section('content')

<div class="row">
    <div class="col-xl-12">
        <div class="container-fluid" style="position:relative;top:150px;min-height:992px;">
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
        
              <form action="{{route('accounts.store')}}" enctype="multipart/form-data" method="post">
                @csrf
                  <div class="col-md-12">
              <label for="nom" class="form-label">Nom  :</label>
              <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom" required>
              </div>
              <div class="col-md-12">
                <label for="adresse" class="form-label">Adresse  :</label>
                <input type="text" class="form-control" name="adresse" id="adresse" placeholder="Adresse" required>
                </div>
                <div class="col-md-12">
                    <label for="ville" class="form-label">ville  :</label>
                    <input type="text" class="form-control" name="ville" id="ville" placeholder="Ville" required>
                    </div>
              <div class="col-md-12">
              <label for="photo" class="form-label">photo</label>
              <input class="form-control" name="photo" type="file" id="photo">
              </div>
              <div class="col-md-12">
                <select class="form-select" name="Service_id" id="">
                    <option selected  >choisis le nom de service</option>
                    @foreach($services as $service)
                    <option value="{{$service->id}}">{{$service->Service}}</option>
                    @endforeach
                </select>
              </div>
              
              
              
              <div class="col-12 d-grid gap-2"">
                  <button class="btn btn-warning"  type="submit">Valider</button>
              </div>
                </form>  
        
            </div>
        
        </div>
        </div>
    </div>
</div>
    
@endsection