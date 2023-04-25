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
                    <h4>Nombre des utilisateurs: {{count($req)}}</h4>
                    <table class="table table-secondary table-striped my-5">
                        <tr>
                            <th>Service</th>
                            <th>nom</th>
                            <th>adresse</th>
                            <th>ville</th>
                            <th>photo</th>
                            <th>action</th>
                        </tr>
                        @foreach($req as $re)
                        <tr>
                            <td>{{$re->service->Service}}</td>
                            <td>{{$re->nom}}</td>
                            <td>{{$re->adresse}}</td>
                            <td>{{$re->ville}}</td>
                            <td><img src="{{asset('./storage/img/'.$re->photo)}}" style="width: 90px;height:90px;" alt=""></td>
                            
                            <td>
                           
                              <button title="Modifier" class="btn btn-success"><a href="{{route('accounts.edit',$re->id)}}"><span class="material-symbols-outlined">
                                edit
                                </span></a></button>
                                <form action="{{route('accounts.destroy',$re->id)}}" style="display: inline-block;" method="post" id="{{$re->id}}">
                                @csrf
                                @method('DELETE')
                                </form>
        
                                <button title="Supprimer" class="btn btn-danger" onclick="event.preventDefault();
                                if(confirm('vous êtes sure pour la suppression ?'))
                                document.getElementById('{{$re->id}}').submit();" type="submit"><span class="material-symbols-outlined">
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