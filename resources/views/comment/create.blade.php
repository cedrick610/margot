@extends('layout')
@section('content')
<div class="container py-5">
    <div class="row">
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
                                <label>content</label>
                                <input type="tex" name="content" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>image</label>
                                <input type="file" name="image" class="form-control">
                               
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <label>tags</label>
                                    
                                        <div class="input-group">
                                            <input type="text" name="tags" class="form-control">
                                        </div>
                                    </div>
                                    <select name="quacks_id" class="custom-select">
                                    <option value=""> --Twitos-- </option>
                                    @foreach($quacks as $quack)
                                    <option value="{{ $quack->id }}">{{ $quack->content }}</option>
                                    @endforeach
                                </select>
                                </div>
                                <div class="col-sm-6">

                                </div>
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