@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <caption>List of Book Category</caption>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4 col-md-3 col-lg-2">
                            <a href="{{route('category.create')}}" class="btn btn-dark btn-block-mb-2">Add Category</a>
                        </div>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success mt-2">
                            {{session('status')}}
                        </div>
                    @endif
                    <table class="table table-striped mt-2">
                        <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $key => $category)
                            <tr>
                                <th scope="row">{{ $categories->firstItem() + $key}}</th>
                                <td>{{$category->name}}</td>
                                <td>{{$category->dash}}</td>
                                <td>{{$category->created_at_with_format}}</td>
                                <td>{{$category->updated_at_with_format}}</td>
                                <td class="text-center">
                                    <a href="{{route('category.edit', ['id'=>$category->id])}}" class="btn btn-primary"><b>Edit</b></a>
                                    @component('components.delete')
                                        @slot('url')
                                            {{ route('category.delete', ['id'=>$category->id]) }}
                                        @endslot
                                        @slot('value')
                                            Hapus
                                        @endslot
                                    @endcomponent
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5">Data empty</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="float-right">
                        {{ $categories->onEachSide(1)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
