@extends('layout')

@section('content')
@foreach($quacks as $quack)

<div class="row g-0 bg-light position-relative">
    <div class="col-md-6 mb-md-0 p-md-4">
    <img src="{{asset('storage/uploads/' . $quack->image)}}" width="25%">
    </div>
    <div class="col-md-6 p-4 ps-md-0">
    {{$quack->content}}
    <br>
    <span>{{$quack->tags}}</span>
    <br>                                                                                
    @if (Auth::user())
    <button type="button" class="btn btn-primary">Ajouter un commentaire<a href="{{ route('comment.createComment', $quack->id)}}" class="stretched-link"></a></button>
@endif
    
    </div>
</div>
@foreach ($comment as $truc )
@if ($truc->quack_id == $quack->id)
<div class="row g-0 bg-primary position-relative">
    <div class="col-md-6 mb-md-0 p-md-4">
        <img src="{{asset('storage/uploads/' . $truc->image)}}" width="100%">
    </div>
    <div class="col-md-6 p-4 ps-md-0">
    {{$truc->content}}
    <br>
    <span>{{$truc->tags}}</span>
    <span>Le {{$comment->created_at->format('d/m/Y')}} à {{$comment->created_at->format('H:i')}}</span>
  
    </div>
</div>
@endif

@endforeach

@endforeach
@endsection