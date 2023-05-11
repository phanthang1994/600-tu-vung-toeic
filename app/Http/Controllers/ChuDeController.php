<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ChuDe;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use function Symfony\Component\Translation\t;

class ChuDeController extends Controller
{
    private $path_file_image = "admin/img/chu_de";
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
            -> leftJoin('category','category.id','=','chu_de.category_id')
            ->select('chu_de.*','category.category_name')->get();
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
        $cats = Category::select('id',"category_name")->get();
        return response()->json([
            'categories' => $cats,
        ]);
    }
    public function creates()
    {
        $cats = Category::select('id',"category_name")->get();
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
        if($request->has('file_upload'))
        {
            $file =  $request->file_upload;
            $file_name =  $file->getClientoriginalName();
            $extension = $file ->extension();
            $x = pathinfo($file_name, PATHINFO_FILENAME);
            $dateTime = date('dmYHis');
            $file_name = 'chu_de-'.$dateTime.'-'.$x.'.'.$extension;
            $file->move(public_path($this->path_file_image),$file_name);
            $request->merge(['IMAGE'=> $file_name]);

        }
        if(ChuDe::create($request->all()))
        {

            return redirect()->route('chu_de')->with('success','Thêm sản phẩm thành công');
        }
    }

    public function store(Request $request)
    {
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
            $fields = ["chu_de_name","image","category_id","trang_thai"];
            $data = [
                "chu_de_name"=>$request->input('chu_de_name'),
                "image" => $request->input('image'),
                "category_id"=>$request->input('category_id'),
                "status" => $request->input('status')
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
        $category_query = ChuDe::find($chu_de_id);
        $category_id = $category_query->CATEGORY_ID;
        $category_name_query = Category::find($category_id);
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

            'category_id'=>$request->input('category_id'),
            'chu_de_name'=>$request->input('chu_de_name'),
            "image" => $request->input('image'),
        ];
        $u = ChuDe::where('id',$category_id)->update(
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

        if($request->has('file_upload'))
        {
            $file =  $request->file_upload;
            $file_name =  $file->getClientoriginalName();
            $extension = $file ->extension();
            $x = pathinfo($file_name, PATHINFO_FILENAME);
            $dateTime = date('dmYHis');
            $file_name = 'chu_de-'.$dateTime.'-'.$x.'.'.$extension;
            $file->move(public_path($this->path_file_image),$file_name);
            $request->merge(['image'=> $file_name]);
            $oldest_image = $request->old_image;
            $path_to_remove=$this->path_file_image.'/'.$oldest_image;
            if(File::exists(public_path($path_to_remove))){
                File::delete(public_path($path_to_remove));
            }else{
                dd('File does not exists.');
            }
        }
        if (request()->category_id==null)
        {
            $data_except = ['_token','_method','file_upload','category_id','old_image'];
            $data = request()->except($data_except);
            $u = ChuDe::where('id',$chu_de_id)->update(
                $data
            );
        }
        else
        {
            $data_except = ['_token','_method','file_upload','old_image'];
            $data = request()->except($data_except);
            $u = ChuDe::where('id',$chu_de_id)->update(
                $data
            );
        }
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
        $r = ChuDe::find($category_id);
        if(($r->totalTuMoi)>0)
        {
            return response()->json([
                'status' => 404,
                'message' => 'Có tham chiếu không thể xóa'
            ]);
        }
        $old_image = $r->image;
        $path_to_remove=$this->path_file_image.'/'.$old_image;
//        dd($old_image);
        if(File::exists(public_path($path_to_remove))){
            File::delete(public_path($path_to_remove));
        }else{
            dd('File does not exists.');
        }
        $u = ChuDe::where('id', $category_id)->delete();
    }
}
