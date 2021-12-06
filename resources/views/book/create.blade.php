@extends('layouts.app')

@section('css_custom')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@1.3.4/dist/select2-bootstrap4.min.css">
@endsection

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
                                <input id="judul" name="judul" type="text" class="form-control" placeholder="Insert Name Here !!" value="{{old('judul')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label mt-2">Tahun</label>
                            <div class="col-sm-6 mt-2">
                                <input id="tahun" name="tahun" type="text" class="form-control" placeholder="Insert Tahun Here !!" value="{{old('tahun')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label mt-2">Cover</label>
                            <div class="col-sm-6 mt-2">
                                <input id="cover" name="cover" type="file" class="form-control" value="{{old('cover')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label mt-2">Category</label>
                            <div class="col-sm-6 mt-2">
                                <select id="category" name="category[]" multiple class="form-control" placeholder="Insert Category Here !!" >
                                <option></option>
                                </select>
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

@section('js_custom')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        $(function(){
            $('#category').select2({
                placeholder: 'Pilih kategori',
                ajax: {
                    url: '{{ route('category.all') }}',
                    processResults: function(data){
                        return {
                            results: data.map(function(item){
                                return {
                                    id: item.id,
                                    text: item.name
                                }
                            })
                        }
                    }
                }
            })
        })
    </script>
@endsection
