@extends('layout')
@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-7 mx-auto">
            <div class="bg-white rounded-lg shadow-sm p-5">
                <div class="tab-content">
                    <div id="nav-tab-card" class="tab-pane fade show active">
                        <h3>Editer un produit</h3>
                        <!-- Message d'information -->
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <!-- Formulaire -->
                        <form method="post" action="{{ route('comment.update', $comment->id) }}">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label>content</label>
                                <input type="text" name="content" class="form-control" value="{{ 
                                    $comment->nom }}">
                            </div>
                            <div class="form-group">
                                <label>image</label>
                                <input type="text" name="image" class="form-control" value="{{ $comment->image }}">
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>tags</label>
                                        <div class="input-group">
                                            <input type="text" name="tags" class="formcontrol" value="{{ $comment->tags }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">

                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary rounded-pill 
                            shadow-sm">Mettre à jour</button>
                        </form>
                        <!-- Fin du formulaire -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection