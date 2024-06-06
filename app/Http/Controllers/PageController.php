<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function showHomepage()
    {
        $items = Item::orderBy("created_at", "desc")->get();

        $categories = ProductCategory::whereNotNull("category_image")->orderBy("name", "asc")->get();

        return view('index')->with([
            "items" => $items,
            "categories" => $categories
        ]);
    }

    public function showItemDetails($slug)
    {
        $item = Item::where("slug", $slug)->firstOrFail();

        return view("item-details")->with(['item' => $item]);
    }

    public function showDashboard()
    {
        $total_orders = Order::where("user_id", auth()->id())->count();
        $orders = Order::where("user_id", auth()->id())->paginate(8);

        return view("dashboard")->with([
            'total_orders' => $total_orders,
            "orders" => $orders
        ]);
    }

    public function showThankyou()
    {
        return view("thankyou");
    }

    public function showAboutUsPage()
    {
        return view('about-us');
    }


}
