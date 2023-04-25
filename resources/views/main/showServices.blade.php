@extends('master.layout')

@section('content')

<div class="row">
    <div class="col-xl-12">
        
<div class="container-fluid" style="position:relative;top:150px;min-height:992px;">

    <div class="row">
        <div class="col-xl-12">
            @if (session()->has('success'))
            <div class="alert alert-success">
             {{session()->get('success')}}
            </div>
            @endif
            <h4>Nombre de services: {{count($services)}}</h4>
            <table class="table table-secondary table-striped my-5">
                <tr>
                    <th>Service</th>
                    
                    <th>action</th>
                </tr>
                @foreach($services as $service)
                <tr>
                    <td>{{$service->Service}}</td>
                    
                    <td>
                   
                      <button title="Modifier" class="btn btn-success"><a href="{{route('services.edit',$service->id)}}"><span class="material-symbols-outlined">
                        edit
                        </span></a></button>
                        <form action="{{route('services.destroy',$service->id)}}" style="display: inline-block;" method="post" id="{{$service->id}}">
                        @csrf
                        @method('DELETE')
                        </form>

                        <button title="Supprimer" class="btn btn-danger" onclick="event.preventDefault();
                        if(confirm('vous êtes sure pour la suppression ?'))
                        document.getElementById('{{$service->id}}').submit();" type="submit"><span class="material-symbols-outlined">
                        delete
                        </span> </button>
                        
                            
                          </td>
                </tr>
                @endforeach
              </table>
        </div>
    </div>
</div>
    </div>
</div>
    
@endsection