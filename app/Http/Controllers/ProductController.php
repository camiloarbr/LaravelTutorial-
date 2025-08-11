<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public static $products = [
        ["id" => "1", "name" => "TV", "description" => "Best TV", "price" => 599.99],
        ["id" => "2", "name" => "iPhone", "description" => "Best iPhone", "price" => 999.99],
        ["id" => "3", "name" => "Chromecast", "description" => "Best Chromecast", "price" => 49.99],
        ["id" => "4", "name" => "Glasses", "description" => "Best Glasses", "price" => 199.99]
    ];

    public function index(): View
    {
        $viewData = [];
        $viewData["title"] = "Products - Online Store";
        $viewData["subtitle"] = "List of products";
        $viewData["products"] = ProductController::$products;

        return view('product.index')->with("viewData", $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        
        // Find the product by ID
        $product = null;
        foreach (ProductController::$products as $p) {
            if ($p["id"] == $id) {
                $product = $p;
                break;
            }
        }

        if (!$product) {
            abort(404);
        }

        $viewData["title"] = $product["name"] . " - Online Store";
        $viewData["subtitle"] = $product["name"] . " - Product information";
        $viewData["product"] = $product;

        return view('product.show')->with("viewData", $viewData);
    }
}