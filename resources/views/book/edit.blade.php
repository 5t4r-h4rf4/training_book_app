@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Edit Categories
                </div>
                <div class="card-body">
                    @component('components.error')

                    @endcomponent
                    <form action="{{route('book.update', ['id' => $books->id])}}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Nama Category</label>
                            <div class="col-sm-6">
                                <input value="{{$books->name}}" id="name" name="name_category" type="text" class="form-control" placeholder="Masukan Nama Category" >
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-dark mb-2" value="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
