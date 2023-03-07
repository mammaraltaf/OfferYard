<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    /*After Admin Login We See this dashboard view*/
    public function dashboard()
    {
        return view('admin.pages.dashboard');
    }

    /*After Admin Login We See this category view*/
    public function category()
    {
        $categories = Category::all();
        return view('admin.pages.category',compact('categories'));
    }
}
