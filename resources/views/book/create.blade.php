@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Add Books
                </div>
                <div class="card-body">
                    @component('components.error')

                    @endcomponent
                    <form action="{{route('book.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Judul</label>
                            <div class="col-sm-6">
                                <input id="judul" name="judul" type="text" class="form-control" placeholder="Insert Name Here !!" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label mt-2">Tahun</label>
                            <div class="col-sm-6 mt-2">
                                <input id="tahun" name="tahun" type="text" class="form-control" placeholder="Insert Tahun Here !!" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label mt-2">Cover</label>
                            <div class="col-sm-6 mt-2">
                                <input id="cover" name="cover" type="file" class="form-control">
                            </div>
                        </div>
                        <div class="form-group mt-2">
                            <input type="submit" class="btn btn-dark mb-2" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
