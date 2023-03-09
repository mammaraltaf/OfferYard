<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
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

    public function categoryPost(Request $request){
        try{
            $input = $request->all();
            $validation = \Validator::make($input, [
                'title' => 'required',
                'category_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'status' => 'required',
            ]);

            if($validation->fails()){
                return redirect()->back()->withErrors($validation->errors());
            }


            if ($request->hasFile('category_image')) {
                $image = $request->file('category_image');
                $name = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
                $path = public_path('category_images');
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }
                $image->move($path, $name);
            }

            $category = new Category();
            $category->title = $input['title'];
            $category->image = $name;
            $category->status = $input['status'];
            $category->save();

            return redirect()->back()->with('success', 'Category Added Successfully');

        }
        catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function editCategory($id)
    {
        $category = Category::find($id);
        return $category;
    }

    public function updateCategory(Request $request){
        try {
            $input = $request->all();
            $categoryId = $input['category_id'];
            $validation = \Validator::make($input, [
                'category' => 'required|unique:categories,title,'.$categoryId,
                'category_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'cat_status' => 'required',
            ]);

            if($validation->fails()){
                return redirect()->back()->with('error', $validation->errors());
            }

            if ($request->hasFile('category_image')) {
                $image = $request->file('category_image');
                $name = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
                $path = public_path('category_images');
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }
                $image->move($path, $name);
            }

            Category::where('id', $categoryId)->update([
                'title' => $input['category'],
                'image' => $name,
                'status' => $input['cat_status'],
            ]);
            return redirect()->back()->with('success', 'Category Updated Successfully!');
        } catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroyCategory(Request $request)
    {
        try{
            Category::where('id', $request->id)->delete();
            return redirect()->back()->with('success', 'Category Deleted Successfully!');
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }



    public function users()
    {
        $users = User::all();
        return view('admin.pages.users',compact('users'));
    }

}
