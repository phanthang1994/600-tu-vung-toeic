<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
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
    {   $categories = Category::all();
        return view('admin.category.category',compact('categories'));
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

    public function fetch()
    {
        $categories = Category::all();
        return response()->json([
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(Request $request)
    {
        if($request->has('file_upload'))
        {
            $file =  $request->file_upload;
            $file_name =  $file->getClientoriginalName();
            $extension = $file ->extension();
            $x = pathinfo($file_name, PATHINFO_FILENAME);
            $dateTime = date('dmYHis');
            $file_name = 'category-'.$dateTime.'-'.$x.'.'.$extension;
            $file->move(public_path($this->path_file_image),$file_name);
            $request->merge(['image'=> $file_name]);

        }

        Category::create($request->all());
        return redirect()->route('category')->with('success','Thêm sản phẩm thành công');
    }
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'category_name' => 'required',
            'image' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            $fields = ["category_name","image"];
            $data = [
                "category_name"=>$request->input('category_name'),
                "image" => $request->input('image')
            ];

            Category::upsert(
                $data,$fields
            );
            $file =  $request->input('image');
            $file_name =  basename($file);
//            dd($file_name);
            return response()->json([
                'status' => 200,
                'message' => 'Student Added Successfully.'
            ]);
        }
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
     * @return JsonResponse
     */
    public function edit($category_id)
    {
        $category = Category::find($category_id);
        if ($category) {
            return response()->json([
                'status' => 200,
                'student' => $category,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Student Found.'
            ]);
        }
    }
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
     * @return JsonResponse
     */
    public function update(Request $request, $category_id)
    {
        if($request->input('image'))
        {
            if($request->has('file_upload'))
            {
                $file =  $request->file_upload;
                $file_name =  $file->getClientoriginalName();
                $extension = $file ->extension();
                $x = pathinfo($file_name, PATHINFO_FILENAME);
                $file_name = 'category-'.$x.'.'.$extension;
                $file->move(public_path("admin/img/category"),$file_name);
                $request->merge(['image'=> $file_name]);

            }
            $data =  [
                'category_name'=>$request->input('category_name'),
                "image" => $request->input('image'),

            ];
        }
        else
            $data =  [
                'category_name'=>$request->input('category_name')
            ];
        $u = Category::where('id',$category_id)->update(
            $data
        );
        if ($u)
        {
            return response()->json([
                        'status' => 200,
                        'message' => 'Student Updated Successfully.'
                    ]);
        }
        else
                return response()->json([
                    'status' => 404,
                    'message' => 'Error deleted'
                ]);
    }
    public function updates(Request $request, $category_id)
    {
        if($request->has('file_upload'))
        {
            $file =  $request->file_upload;
            $file_name =  $file->getClientoriginalName();
            $extension = $file ->extension();
            $x = pathinfo($file_name, PATHINFO_FILENAME);
            $dateTime = date('dmYHis');
            $file_name = 'category-'.$dateTime.'-'.$x.'.'.$extension;
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
     * @return \Illuminate\Http\RedirectResponse
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
