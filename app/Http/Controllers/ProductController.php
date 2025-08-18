<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Product;

class ProductController extends Controller
{

    public function index(): View
    {
        $viewData = [];
        $viewData["title"] = "Products - Online Store";
        $viewData["subtitle"] = "List of products";
        $viewData["products"] = Product::all();

        return view('product.index')->with("viewData", $viewData);
    }

    public function show(string $id): View | RedirectResponse
    {
        $viewData = [];
        
        // Buscar el producto por ID usando Eloquent
        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('home.index');
        }

        $viewData["title"] = $product->getName() . " - Online Store";
        $viewData["subtitle"] = $product->getName() . " - Product information";
        $viewData["product"] = $product;

        return view('product.show')->with("viewData", $viewData);
    }

    public function create(): View
    {
        $viewData = []; //to be sent to the view
        $viewData["title"] = "Create product";

        return view('product.create')->with("viewData", $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        $request->validate([
            "name" => "required",
            "price" => "required|numeric|gt:0"
        ]);

        // Guardar el producto en la base de datos
        $product = new Product();
        $product->setName($request->input('name'));
        $product->setPrice($request->input('price'));
        $product->save();

        // Si la validación pasa y se guarda, redirigir a la vista de éxito
        return redirect()->route('product.success');
    }

    public function success(): View
    {
        $viewData = [];
        $viewData["title"] = "Product Created Successfully";
        $viewData["subtitle"] = "Success";

        return view('product.success')->with("viewData", $viewData);
    }
}