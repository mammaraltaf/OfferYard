<?php

namespace App\Http\Controllers;

use App\Classes\Enums\StatusEnum;
use App\Classes\Enums\UserTypesEnum;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Moddel;
use App\Models\OfferImage;
use App\Models\PurchaseYear;
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

    /*-----------PURCHASING YEAR CRUD-----------------*/

    public function purchasingYear()
    {
        $purchasingYears = PurchaseYear::all();
        return view('admin.pages.purchasingyear',compact('purchasingYears'));
    }

    public function purchasingYearPost(Request $request)
    {
        try {
            $input = $request->all();
            $validation = \Validator::make($input, [
                'year' => 'required | max:4 | min:4 | unique:purchase_years,year'
            ]);

            if ($validation->fails()) {
                return redirect()->back()->withErrors($validation->errors());
            }

            PurchaseYear::create([
                'year' => $input['year'],
            ]);

            return redirect()->back()->with('success', 'Purchasing Year Added Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function editPurchasingYear($id)
    {
        $purchasingYear = PurchaseYear::find($id);
        return $purchasingYear;
    }

    public function updatePurchasingYear(Request $request)
    {
        try {
            $input = $request->all();
            $purchasingYearId = $input['year_id'];
            $validation = \Validator::make($input, [
                'year' => 'required | unique:purchase_years,year',
            ]);

            if ($validation->fails()) {
                return redirect()->back()->withErrors($validation->errors());
            }

            PurchaseYear::where('id', $purchasingYearId)->update([
                'year' => $input['year'],
            ]);
            return redirect()->back()->with('success', 'Purchasing Year Updated Successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroyPurchasingYear(Request $request)
    {
        try {
            PurchaseYear::where('id', $request->id)->delete();
            return redirect()->back()->with('success', 'Purchasing Year Deleted Successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    /*-----------MODEL CRUD-----------------*/
    public function models()
    {
        $models = Moddel::all();
        $categories = Category::all();
        return view('admin.pages.modeldata',compact('models','categories'));
    }

    public function getBrands($category_id)
    {
        $brands = Brand::where('category_id', $category_id)->get();
        return response()->json($brands);
    }

    public function getModel($brand_id)
    {
        $models = Moddel::where('brand_id', $brand_id)->get();
        return response()->json($models);
    }

    public function modelPost(Request $request){
        try{
            $input = $request->all();
            $validation = \Validator::make($input, [
                'category_id' => 'required',
                'brand_id' => 'required',
                'title' => 'required',
                'status' => 'required',
            ]);

            if($validation->fails()){
                return redirect()->back()->withErrors($validation->errors());
            }

            if ($request->hasFile('model_image')) {
                $image = $request->file('model_image');
                $name = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
                $path = public_path('model_images');
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }
                $image->move($path, $name);
            }
            else{
                $name = null;
            }

            Moddel::create([
                'category_id' => $input['category_id'],
                'brand_id' => $input['brand_id'],
                'title' => $input['title'],
                'image' => $name,
                'status' => $input['status'],
            ]);

            return redirect()->back()->with('success', 'Model Added Successfully');

        }
        catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function editModel($id)
    {
        $model = Moddel::find($id);
        return $model;
    }

    public function updateModel(Request $request){
        try {
            $input = $request->all();
            $modelId = $input['model_id'];
            $validation = \Validator::make($input, [
                'category_id' => 'required',
                'brand_id' => 'required',
                'title' => 'required',
                'status' => 'required',
            ]);

            if ($validation->fails()) {
                return redirect()->back()->withErrors($validation->errors());
            }

            if ($request->hasFile('model_image')) {
                $image = $request->file('model_image');
                $name = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
                $path = public_path('model_images');
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }
                $image->move($path, $name);
            }
            else{
                $name = null;
            }

            Moddel::where('id', $modelId)->update([
                'category_id' => $input['category_id'],
                'brand_id' => $input['brand_id'],
                'title' => $input['title'],
                'image' => $name,
                'status' => $input['status'],
            ]);
            return redirect()->back()->with('success', 'Model Updated Successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroyModel(Request $request)
    {
        try {
            Moddel::where('id', $request->id)->delete();
            return redirect()->back()->with('success', 'Model Deleted Successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /*-----------OFFERS CRUD-----------------*/
    public function offers()
    {
        $offers = Offer::all();
        $categories = Category::all();
        $purchaseYears = PurchaseYear::all();
        return view('admin.pages.offer',compact('offers','categories','purchaseYears'));
    }

    public function offerPost(Request $request)
    {
        try{
            $input = $request->all();
            $validation = \Validator::make($input, [
                'title' => 'required',
                'category' => 'required | exists:categories,id',
                'brand' => 'required | exists:brands,id',
                'moddel' => 'required | exists:moddels,id',
                'purchase_year' => 'required | exists:purchase_years,id',
                'price' => 'required',
                'auction_date' => 'required',
                'isPriceFixed' => 'required',
                'activeCommentSection' => 'required',
                'is_hand_to_hand' => 'required',
                'is_shipping_to_buyer' => 'required',
                'is_show_location_product' => 'required',
                'address' => 'required',
                'status' => 'required',
                'offer_image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            if($validation->fails()){
                return redirect()->back()->withErrors($validation->errors());
            }

            $offerId = Offer::create([
                'title' => $input['title'],
                'category_id' => $input['category'],
                'brand_id' => $input['brand'],
                'moddel_id' => $input['moddel'],
                'purchase_year_id' => $input['purchase_year'],
                'price' => $input['price'],
                'auction_date' => $input['auction_date'],
                'isPriceFixed' => $input['isPriceFixed'],
                'activeCommentSection' => $input['activeCommentSection'],
                'is_hand_to_hand' => $input['is_hand_to_hand'],
                'is_shipping_to_buyer' => $input['is_shipping_to_buyer'],
                'is_show_location_product' => $input['is_show_location_product'],
                'address' => $input['address'],
                'status' => $input['status'],
            ]);

            if ($request->hasFile('offer_image')){
                foreach ($request->file('offer_image') as $image) {
                    $name = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
                    $path = public_path('offer_images');
                    if (!file_exists($path)) {
                        mkdir($path, 0777, true);
                    }
                    $image->move($path, $name);

                    OfferImage::create([
                        'offer_id' => $offerId->id,
                        'image' => $name,
                    ]);
                }

            }

            return redirect()->back()->with('success', 'Offer Added Successfully');
        }
        catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

}
