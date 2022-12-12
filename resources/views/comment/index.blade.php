@extends('layout')
@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="bg-white rounded-lg shadow-sm p-5">
                <div class="tab-content">
                    <div id="nav-tab-card" class="tab-pane fade show active">
                        <h3>Liste des comments</h3>
                        @if(session()->get('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div><br />
                        @endif
                        <!-- Tableau -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">content</th>
                                    <th scope="col">image</th>
                                    <th scope="col">quicks_id</th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach($comment as $truc)
                                <tr>
                                    <td>{{$truc->id}}</td>
                                    <td>{{$truc->content}}</td>
                                    <td>{{$truc->image}}</td>
                                    <td>{{$truc->tags}}</td>
                                    <td>{{$truc->quacks_id}}</td>
                                    <td>
                                        <a href="{{ route('comment.edit', $truc->id)}}" class="btn btn-primary btn-sm">Editer</a>
                                        <form action="{{ route('comment.destroy', $truc->id)}}" method="POST" style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm"" type=" submit">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- Fin du Tableau -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection