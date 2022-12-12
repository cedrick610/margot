@extends('layout')
@section('content')
<div class="container py-5">
    <div class="row ">
        <div class="col-lg-7 mx-auto">
            <div class="bg-white rounded-lg shadow-sm p-5">
                <div class="tab-content">
                    <div id="nav-tab-card" class="tab-pane fade show active">
                        <h3> Ajouter un produit</h3>
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
                        <form method="POST" action="{{ route('comment.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <!-- <label>content</label> -->
                                <!-- <input type="text" name="content" class="form-control"> -->
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"  name="content" style="height: 100px"></textarea>
                                    <label for="floatingTextarea2"></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>image</label>
                                <input type="file" name="image" class="form-control">

                            </div>
                            <div class="form-group">
                                <label>Tags</label>
                                <input type="text" name="tags" class="form-control">
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="quack_id" value="{{$quack->id}}">
                            </div>
                            <button type="submit" class="btn btn-primary rounded-pill shadow-sm">
                                Ajouter un produit </button>
                        </form>
                        <!-- Fin du formulaire -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection