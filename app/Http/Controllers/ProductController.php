<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use function Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $products = Product::all()->sortByDesc('id');
        $userName = Auth::user()->name;

        return view('product.index', [
            'products' => $products,
            'user_name' => $userName,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProductRequest $request)
    {
        $productParameter = $request->post();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            if ($productParameter['type']) {
                $fileName = Storage::disk('s3')->put('/product', $request->file('image'));
                Storage::disk('s3')->setVisibility($fileName, 'public');
            } else {
                $fileName = $request->file('image')->store('product');
            }
            $productParameter['image'] = $fileName;
        }

        $result = Product::create($productParameter);

        if ($result) {
            return redirect()->route('product.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show(int $id)
    {
        $product = Product::find($id);

        if (\auth()->user()->can('view', $product)){
            return view('product.show', compact('product'));
        } else {
            echo "You aren't owner this product";
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        //
    }
}
