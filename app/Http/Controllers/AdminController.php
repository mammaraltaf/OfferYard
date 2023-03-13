<?php

namespace App\Http\Controllers;

use App\Classes\Enums\StatusEnum;
use App\Classes\Enums\UserTypesEnum;
use App\Models\Brand;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\modeldb;
use App\Models\Offer;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    /*---------------DASHBOARD------------------*/
    /*After Admin Login We See this dashboard view*/
    public function dashboard()
    {
        $totalUsers = User::where('user_type', UserTypesEnum::User)->count();
        return view('admin.pages.dashboard',compact('totalUsers'));
    }

    /*---------------CATEGORY CRUD------------------*/

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


    /*---------------USER CRUD------------------*/
    public function users()
    {
        $users = User::where('user_type', UserTypesEnum::User)->get();
        return view('admin.pages.users',compact('users'));
    }

    public function userPost(Request $request){
        try{
            $input = $request->all();
            $validation = \Validator::make($input, [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'phone' => 'required',
                'status' => 'required',
            ]);

            if($validation->fails()){
                return redirect()->back()->withErrors($validation->errors());
            }

            $data = User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => \Hash::make($input['password']),
                'phone' => $input['phone'],
                'user_type' => UserTypesEnum::User,
                'status' => $input['status'],
            ]);

            return redirect()->back()->with('success', 'User Added Successfully');

        }
        catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function editUser($id)
    {
        $user = User::find($id);
        return $user;
    }

    public function updateUser(Request $request){
        try {
            $input = $request->all();
            $userId = $input['user_id'];
            $validation = \Validator::make($input, [
                'name' => 'required',
                'phone' => 'required',
                'status' => 'required',
            ]);

            if($validation->fails()){
                return redirect()->back()->with('error', $validation->errors());
            }

            User::where('id', $userId)->update([
                'name' => $input['name'],
                'phone' => $input['phone'],
                'status' => $input['status'],
            ]);
            return redirect()->back()->with('success', 'User Updated Successfully!');
        } catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroyUser(Request $request)
    {
        try{
            User::where('id', $request->id)->delete();
            return redirect()->back()->with('success', 'User Deleted Successfully!');
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    /*---------------BRAND CRUD------------------*/
    public function brands()
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.pages.brand',compact('brands','categories'));
    }

    public function brandPost(Request $request)
    {
        try {
            $input = $request->all();
            $validation = \Validator::make($input, [
                'title' => 'required',
                'brand_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'category_id' => 'required',
                'status' => 'required',
            ]);

            if ($validation->fails()) {
                return redirect()->back()->withErrors($validation->errors());
            }

            if ($request->hasFile('brand_image')) {
                $image = $request->file('brand_image');
                $name = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
                $path = public_path('brand_images');
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }
                $image->move($path, $name);
            }

            $brand = new Brand();
            $brand->title = $input['title'];
            $brand->image = $name;
            $brand->category_id = $input['category_id'];
            $brand->status = $input['status'];
            $brand->save();

            return redirect()->back()->with('success', 'Brand Added Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function editBrand($id)
    {
        $brand = Brand::find($id);
        return $brand;
    }

    public function updateBrand(Request $request)
    {
        try {
            $input = $request->all();
            $brandId = $input['brand_id'];
            $validation = \Validator::make($input, [
                'title' => 'required',
                'brand_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'status' => 'required',
            ]);

            if ($validation->fails()) {
                return redirect()->back()->withErrors($validation->errors());
            }

            if ($request->hasFile('brand_image')) {
                $image = $request->file('brand_image');
                $name = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
                $path = public_path('brand_images');
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }
                $image->move($path, $name);
            }

            Brand::where('id', $brandId)->update([
                'title' => $input['title'],
                'image' => $name,
                'status' => $input['status'],
            ]);
            return redirect()->back()->with('success', 'Brand Updated Successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroyBrand(Request $request)
    {
        try {
            Brand::where('id', $request->id)->delete();
            return redirect()->back()->with('success', 'Brand Deleted Successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function modellist()
    {
        $models = modeldb::all();
        return view('admin.pages.modeldata',compact('models'));
    }

    public function offers()
    {
        $offers = Offer::all();
        return view('admin.pages.offer',compact('offers'));
    }

}
