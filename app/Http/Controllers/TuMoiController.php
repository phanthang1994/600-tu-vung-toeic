<?php

namespace App\Http\Controllers;

use App\Models\ChuDe;
use App\Models\TuMoi;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TuMoiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('admin.tu_moi.tu_moi');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return JsonResponse
     */
    public function fetch()
    {

        $categories = DB::table('tu_moi')
            -> leftJoin('chu_de','chu_de.ID','=','tu_moi.CHU_DE_ID')
            ->select('tu_moi.*','chu_de.CHU_DE_NAME')->get();

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
        $cats = ChuDe::select('ID',"CHU_DE_NAME")->get();
//        dd($cats);
        return response()->json([
            'categories' => $cats,
        ]);
    }
    public function creates()
    {
        $cats = ChuDe::select('ID',"CHU_DE_NAME")->get();
        //        dd($cats);
        return view('admin.tu_moi.create_tu_moi',compact('cats'));
    }

    public function create_many()
    {
        return view('admin.tu_moi.create_many');
    }
    public function upload_many()
    {
        return view('admin.tu_moi.upload_many');
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
            $file_name = date("d_m_Y").'-'.'tu_moi-'.$x.'.'.$extension;
//            dd($file_name);
            $file->move(public_path("admin/img/tu_moi"),$file_name);

//            dd($extension);
            $request->merge(['IMAGE'=> $file_name]);

        }
        if($request->has('file_upload_audio'))
        {
            $file =  $request->file_upload_audio;
            $file_name =  $file->getClientoriginalName();
            $extension = $file ->extension();
            $x = pathinfo($file_name, PATHINFO_FILENAME);
//            dd($x);
            $file_name = date("d_m_Y").'-'.'tu_moi-'.$x.'.'.$extension;
//            dd($file_name);
            $file->move(public_path("admin/audio/tu_moi"),$file_name);

//            dd($extension);
            $request->merge(['AUDIO'=> $file_name]);

        }

//        dd($request->all());
//        $request->merge(['NAME'=> $request->name]);
//        dd($request->all());

        if(TuMoi::create($request->all()))
        {

            return redirect()->route('tu_moi.creates')->with('success','Thêm sản phẩm thành công');
        }
    }
    public function store(Request $request)
    {
//        dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'required',
            'phien_am' => 'required',
            'tu_loai' => 'required',
            'audio' => 'required',
            'status' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            $fields = ["NAME, PHIEN_AM","AUDIO","TU_LOAI","VI_DU",	"IMAGE",	"CHE_TU",	"CAU_TRUC_CAU",	"CHU_DE_ID","STATUS"];
            $data = [
                "NAME"=>$request->input('name'),
                "PHIEN_AM"=>$request->input('phien_am'),
                "AUDIO"=>$request->input('audio'),
                "TU_LOAI"=>$request->input('tu_loai'),
                "VI_DU"=>$request->input('vi_du'),
                "IMAGE" => $request->input('image'),
                "CHE_TU" => $request->input('che_tu'),
                "CAU_TRUC_CAU" => $request->input('cau_truc_cau'),
                "CHU_DE_ID" => $request->input('chu_de_id'),
                "STATUS" => $request->input('status')
            ];
//            dd($data);
            TuMoi::upsert(
                $data,$fields
            );
            return response()->json([
                'status' => 200,
                'message' => 'Student Added Successfully.'
            ]);
        }

    }
    public function store_many(Request $request)
    {
       request()->validate([

            'uploadFile' => 'required',

        ]);

//        dd($request->file('uploadFile'));
        $files = $request->file('uploadFile');
        foreach ($files as $file) {
//            dd($value);
            $file_name =  $file->getClientoriginalName();
            $extension = $file ->extension();
//            dd($extension);
            if($extension =='wav' || $extension== 'mp3')
            {
                $x = pathinfo($file_name, PATHINFO_FILENAME);
//            dd($x);
                $file_name = 'tu_moi-'.$x.'.'.$extension;
//            dd($file_name);
                $file->move(public_path("admin/audio/tu_moi"),$file_name);
            }
            else
            {
                $x = pathinfo($file_name, PATHINFO_FILENAME);
//            dd($x);
                $file_name = 'tu_moi-'.$x.'.'.$extension;
//            dd($file_name);
                $file->move(public_path("admin/img/tu_moi"),$file_name);
            }


        }



        return response()->json(['success'=>'Images Uploaded Successfully.']);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $tu_moi_id
     * @return JsonResponse
     */
    public function edit($tu_moi_id)
    {
//        dd($tu_moi_id);
        $tu_moi_query = TuMoi::find($tu_moi_id);
        $chu_de_id = $tu_moi_query->CHU_DE_ID;
//        dd($category_id);
        $chu_de_name_query = ChuDe::find($chu_de_id);
//        dd($category_name_query->CATEGORY_NAME);
//        $student = array();
        if ($tu_moi_query) {
            return response()->json([
                'status' => 200,
                'student' =>$tu_moi_query,
                'chu_de_name'=>$chu_de_name_query->CHU_DE_NAME
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Student Found.'
            ]);
        }
    }
    public function edits($tu_moi_id)
    {
        $edits = DB::table('tu_moi')
            -> leftJoin('chu_de','chu_de.ID','=','tu_moi.CHU_DE_ID')
            -> where('tu_moi.ID','=',$tu_moi_id)
            -> select('tu_moi.*','chu_de.CHU_DE_NAME')->get();
        $subjects = ChuDe::select('ID',"CHU_DE_NAME")->get();
        return view('admin.tu_moi.edit_tu_moi',compact('edits','subjects'));
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
            'NAME'=>$request->input('name'),
            'PHIEN_AM'=>$request->input('phien_am'),
            'AUDIO'=>$request->input('audio'),
            'TU_LOAI'=>$request->input('tu_loai'),
            'VI_DU'=>$request->input('vi_du'),
            "IMAGE" => $request->input('image'),
            "CHE_TU" => $request->input('che_tu'),
            "CAU_TRUC_CAU" => $request->input('cau_truc_cau'),
            "CHU_DE_ID" => $request->input('chu_de_id'),
            "STATUS" => $request->input('status')
        ];
//        dd($data);
        $u = TuMoi::where('ID',$category_id)->update(
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


//        dd($request->all());
        if($request->has('file_upload'))
        {
            $file =  $request->file_upload;
            $file_name =  $file->getClientoriginalName();
            $extension = $file ->extension();
            $x = pathinfo($file_name, PATHINFO_FILENAME);
//            dd($x);
            $file_name = 'tu_moi-'.$x.'.'.$extension;
//            dd($file_name);
            $file->move(public_path("admin/img/tu_moi"),$file_name);

//            dd($extension);
            $request->merge(['IMAGE'=> $file_name]);

        }
        if($request->has('file_upload_audio'))
        {
            $file =  $request->file_upload_audio;
            $file_name =  $file->getClientoriginalName();
            $extension = $file ->extension();
            $x = pathinfo($file_name, PATHINFO_FILENAME);
//            dd($x);
            $file_name = 'tu_moi-'.$x.'.'.$extension;
//            dd($file_name);
            $file->move(public_path("admin/audio/tu_moi"),$file_name);

//            dd($extension);
            $request->merge(['AUDIO'=> $file_name]);

        }
        $data_exept = ['_token','_method','file_upload','file_upload_audio'];

        if( request()->CHU_DE_ID==NULL)
        {
            array_push($data_exept,'CHU_DE_ID');
        }
        if( request()->TRANG_THAI==NULL)
        {
            array_push($data_exept,'TRANG_THAI');
        }
        $data = request()->except($data_exept);
//        dd($data);
        $u = TuMoi::where('ID',$category_id)->update(
            $data
        );
        return view('admin.tu_moi.tu_moi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        //        $u = Category::whereIn('id', [7,8])->delete();

        $u = TuMoi::where('id', $id)->delete();
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
