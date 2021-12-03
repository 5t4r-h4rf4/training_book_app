<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use function GuzzleHttp\Promise\all;

class CategoryController extends Controller
{
    public function index()
    {
        //dd(Category::select(DB::raw('name as kategori'))->get()->toArray());
        // return view('category.index', [
        //     'categories' => Category::orderBy('created_at', 'desc')->paginate(10)
        // ]);
        return view('category.index', [
            'categories' => Category::getAllCategoryWithPagination()
        ]);
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_category' => 'required|min:4|max:10|alpha_num'
        ], [
            'name_category.required' => 'Nama Category wajib diisi',
            'name_category.min' => 'Nama Category min 4 karakter',
            'name_category.max' => 'Nama Category max 10 karakter',
            'name_category.alpha_num' => 'Nama Category harus terdiri dari huruf atau angka'
        ]);



        $category = new Category();
        $category->name = $request->name_category;
        $category->slug = Str::slug($request->name_category);
        $category->save();

        return redirect()->route('category.index')->with('status', 'Category ' . $request->name_category . 'Berhasil ditambahkan');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('category.edit', [
            'category' => $category
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name_category' => 'required|min:4|max:10|alpha_num'
        ], [
            'name_category.required' => 'Nama Category wajib diisi',
            'name_category.min' => 'Nama Category min 4 karakter',
            'name_category.max' => 'Nama Category max 10 karakter',
            'name_category.alpha_num' => 'Nama Category harus terdiri dari huruf atau angka'
        ]);

        $category = Category::findOrFail($id);
        $nama_lama = $category->name;
        $category->name = $request->name_category;
        $category->slug = Str::slug($request->name_category);
        $category->save();

        return redirect()->route('category.index')->with('status', 'Category ' . $nama_lama . ' Diubah ke ' . $request->name_category . ' Berhasil');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $namaCategory = $category->name;
        $category->delete();

        return redirect()->route('category.index')->with('status', 'Category ' . $namaCategory . ' Berhasil dihapus');
    }

    public function getAllCategory()
    {
        return Category::all();
    }
}
