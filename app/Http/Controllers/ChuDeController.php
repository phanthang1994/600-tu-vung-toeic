<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ChuDe;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ChuDeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $subjects = DB::table('chu_de')
            -> leftJoin('category','category.id','=','chu_de.category_id')
            ->select('chu_de.*','category.category_name')->get();
        ;
        return view('admin.chu_de.chu_de',compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return JsonResponse
     */
    public function fetch()
    {
        $categories = DB::table('chu_de')
            -> leftJoin('category','category.ID','=','chu_de.CATEGORY_ID')
            ->select('chu_de.*','category.CATEGORY_NAME')->get();
        ;
//        dd($categories);
        return response()->json([
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return JsonResponse
     */
    public function create()
    {
        $cats = Category::select('ID',"CATEGORY_NAME")->get();
//        dd($cats);
        return response()->json([
            'categories' => $cats,
        ]);
    }
    public function creates()
    {
        $cats = Category::select('ID',"CATEGORY_NAME")->get();
        //        dd($cats);
        return view('admin.chu_de.create_chu_de',compact('cats'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(Request $request)
    {
//        dd($request->all());
        if($request->has('file_upload'))
        {
            $file =  $request->file_upload;
            $file_name =  $file->getClientoriginalName();
            $extension = $file ->extension();
            $x = pathinfo($file_name, PATHINFO_FILENAME);
//            dd($x);
            $file_name = 'chu_de-'.$x.'.'.$extension;
//            dd($file_name);
            $file->move(public_path("admin/img/chu_de"),$file_name);

//            dd($extension);
            $request->merge(['IMAGE'=> $file_name]);

        }

//        dd($request->all());
        if(ChuDe::create($request->all()))
        {

            return redirect()->route('chu_de')->with('success','Thêm sản phẩm thành công');
        }
    }

    public function store(Request $request)
    {
//        dd($request->all());
        $validator = Validator::make($request->all(), [
            'chu_de_name' => 'required',
            'image' => 'required',
            'status' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            $fields = ["CHU_DE_NAME","IMAGE","CATEGORY_ID","TRANG_THAI"];
            $data = [
                "CHU_DE_NAME"=>$request->input('chu_de_name'),
                "IMAGE" => $request->input('image'),
                "CATEGORY_ID"=>$request->input('category_id'),
                "STATUS" => $request->input('status')
            ];
//            dd($data);
            ChuDe::upsert(
                $data,$fields
            );
            return response()->json([
                'status' => 200,
                'message' => 'Student Added Successfully.'
            ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show($id)
    {
        $categories = ChuDe::all();
        return response()->json([
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $chu_de_id
     * @return JsonResponse
     */
    public function edit($chu_de_id)
    {
//        dd($chu_de_id);
        $category_query = ChuDe::find($chu_de_id);
        $category_id = $category_query->CATEGORY_ID;
//        dd($category_id);
        $category_name_query = Category::find($category_id);
//        dd($category_name_query->CATEGORY_NAME);
//        $student = array();
        if ($category_query) {
            return response()->json([
                'status' => 200,
                'student' =>$category_query,
                'category_name'=>$category_name_query->CATEGORY_NAME
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Student Found.'
            ]);
        }
    }
    public function edits($chu_de_id)
    {
        $edits = DB::table('chu_de')
            -> leftJoin('category','category.id','=','chu_de.category_id')
            -> where('chu_de.id','=',$chu_de_id)
            -> select('chu_de.*','category.category_name')->get();
        $categories = Category::select('id',"category_name")->get();
//        dd($edits);
        return view('admin.chu_de.edit_chu_de',compact('edits','categories'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $category_id
     * @return JsonResponse
     */
    public function update(Request $request, $category_id)
    {
        $data =  [

            'CATEGORY_ID'=>$request->input('category_id'),
            'CHU_DE_NAME'=>$request->input('chu_de_name'),
            "IMAGE" => $request->input('image'),
        ];
        $u = ChuDe::where('ID',$category_id)->update(
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

    public function updates(Request $request, $chu_de_id)
    {

//        dd($request->all());
        if($request->has('file_upload'))
        {
            $file =  $request->file_upload;
            $file_name =  $file->getClientoriginalName();
            $extension = $file ->extension();
            $x = pathinfo($file_name, PATHINFO_FILENAME);
//            dd($x);
            $file_name = 'chu_de-'.$x.'.'.$extension;
//            dd($file_name);
            $file->move(public_path("admin/img/chu_de"),$file_name);

//            dd($extension);
            $request->merge(['image'=> $file_name]);

        }
        $data_exept = ['_token','_method','file_upload'];

        if( request()->category_id==NULL)
        {
            array_push($data_exept,'category_id');
        }
        $data = request()->except($data_exept);
        $u = ChuDe::where('id',$chu_de_id)->update(
            $data
        );
        return redirect()->route('chu_de');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $category_id
     * @return JsonResponse
     */
    public function destroy($category_id)
    {
        $r = ChuDe::find($category_id)->totalTuMoi;
        if($r>0)
        {
            return response()->json([
                'status' => 404,
                'message' => 'Có tham chiếu không thể xóa'
            ]);
        }
//        $u = Category::whereIn('id', [7,8])->delete();

        $u = ChuDe::where('id', $category_id)->delete();
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
