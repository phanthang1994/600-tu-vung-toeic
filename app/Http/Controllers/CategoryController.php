<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    private $path_file_image = "assets/admin/img/category";
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {    $categories = Category::orderBy('id', 'desc')->get();
        return view('admin.category.category', compact('categories'));
    }
    public function home()
    {   $categories = Category::all();
        return view('front_end.home',compact('categories'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.category.create_category');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function save(Request $request)
    {
        if($request->has('file_upload'))
        {
            $file =  $request->file_upload;
            $file_name =  $file->getClientoriginalName();
            $extension = $file ->extension();
            $x = pathinfo($file_name, PATHINFO_FILENAME);
            $file_name = 'category-'.$x.'.'.$extension;
            $file->move(public_path($this->path_file_image),$file_name);
            $full_file_path = $this-> path_file_image . '/' . $file_name;
//            dd($full_file_path);
            $request->merge(['image'=> $full_file_path]);

        }

        Category::create($request->all());
        return redirect()->route('category')->with('success','Thêm sản phẩm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $category_id
     * @return Application|Factory|View
     */
    public function edits($category_id)
    {

        $categories = DB::table('category')
            -> select('category.*')-> where('category.id','=',$category_id)->get();
//        dd($categories);
        return view('admin.category.edit_category',compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $category_id
     * @return RedirectResponse
     */
    public function updates(Request $request, $category_id)
    {
        if($request->has('file_upload'))
        {
            $file =  $request->file_upload;
            $file_name =  $file->getClientoriginalName();
            $extension = $file ->extension();
            $x = pathinfo($file_name, PATHINFO_FILENAME);
            $file_name = 'category-'.$x.'.'.$extension;
            $file->move(public_path($this->path_file_image),$file_name);
            $request->merge(['image'=> $file_name]);
            $oldest_image = $request->old_image;
            $path_to_remove=$this->path_file_image.'/'.$oldest_image;
            if(File::exists(public_path($path_to_remove)))
                File::delete(public_path($path_to_remove));

        }
        $data_exept = ['_token','_method','file_upload','old_image'];
        $data = request()->except($data_exept);
        $u = Category::where('id',$category_id)->update(
            $data
        );
        return redirect()->route('category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $category_id
     * @return RedirectResponse
     */

    public function destroy($category_id)
    {
        $r = Category::find($category_id)->totalChuDe;
        $rd = Category::find($category_id);
        if($r>0)
        {
            return redirect()->route('category')->with('Fail','Có tham chiếu');
        }
        $old_image = $rd->image;
        $path_to_remove=$this->path_file_image.'/'.$old_image;
//        dd($old_image);
        if(File::exists(public_path($path_to_remove))){
            File::delete(public_path($path_to_remove));
        }
        $u = Category::where('id', $category_id)->delete();
        return redirect()->route('category')->with('success','Thêm sản phẩm thành công');
    }


}
