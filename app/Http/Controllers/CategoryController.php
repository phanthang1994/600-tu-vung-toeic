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
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('admin.category.category');
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
//            dd($x);
            $file_name = 'category-'.$x.'.'.$extension;
//            dd($file_name);
            $file->move(public_path("assets/img/category"),$file_name);

//            dd($extension);
            $request->merge(['image'=> $file_name]);

        }

//        dd($request->all());
        if(Category::create($request->all()))
        {

            return redirect()->route('category.create')->with('success','Thêm sản phẩm thành công');
        }
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
//            dd($x);
                $file_name = 'category-'.$x.'.'.$extension;
//            dd($file_name);
                $file->move(public_path("admin/img/category"),$file_name);

//            dd($extension);
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
//            dd($x);
            $file_name = 'category-'.$x.'.'.$extension;
//            dd($file_name);
            $file->move(public_path("admin/img/category"),$file_name);

//            dd($extension);
            $request->merge(['image'=> $file_name]);

        }
        $data_exept = ['_token','_method','file_upload'];
        $data = request()->except($data_exept);
        $u = Category::where('id',$category_id)->update(
            $data
        );
        return redirect()->route('category')->with('success','Thêm sản phẩm thành công');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $category_id
     * @return JsonResponse
     */

    public function destroy($category_id)
    {
        $r = Category::find($category_id)->totalChuDe;
        if($r>0)
        {
            return response()->json([
                'status' => 404,
                'message' => 'Có tham chiếu'
            ]);
        }

        $u = Category::where('id', $category_id)->delete();
        if($u)
            return response()->json([
                        'status'=>200,
                        'message'=>'Student Deleted Successfully.'
                    ]);
            else {
                return response()->json([
                    'status'=>400,
                    'message'=>'Không thể xóa'
                ]);
            }

    }
}
