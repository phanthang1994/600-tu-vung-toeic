<?php

namespace App\Http\Controllers;
use App\Models\ChuDe;
use App\Models\TuMoi;
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;
use Box\Spout\Reader\Exception\ReaderNotOpenedException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class TuMoiController extends Controller
{
    private $path_file_image = "assets/admin/img/tu_moi";
    private $path_file_audio = "assets/admin/audio/tu_moi";
    private $path_file_excel = "assets/admin/excel/tu_moi";

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $new_words = DB::table('tu_moi')
            -> leftJoin('chu_de','chu_de.id','=','tu_moi.chu_de_id')
            ->leftJoin('category','category.id','=','chu_de.category_id')
            -> select('tu_moi.*','chu_de.chu_de_name','category.category_name')
            ->orderByDesc('tu_moi.id')
            ->get();
        return view('admin.tu_moi.tu_moi',compact('new_words'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return JsonResponse
     */
    public function fetch()
    {

        $categories = DB::table('tu_moi')
            -> leftJoin('chu_de','chu_de.id','=','tu_moi.chu_de_id')
            ->select('tu_moi.*','chu_de.chu_de_name')->get();

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
        $cats = ChuDe::select('id',"chu_de_name")->get();
//        dd($cats);
        return response()->json([
            'categories' => $cats,
        ]);
    }
    public function creates()
    {
        $subjects = ChuDe::select('id',"chu_de_name")->get();
        //        dd($cats);
        return view('admin.tu_moi.create_tu_moi',compact('subjects'));
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
        if($request->has('file_upload'))
        {
            $file =  $request->file_upload;
            $file_name =  $file->getClientoriginalName();
            $extension = $file ->extension();
            $dateTime = date('dmYHis');
            $x = pathinfo($file_name, PATHINFO_FILENAME);
            $file_name = 'tu_moi-'.$dateTime.'-'.$x.'.'.$extension;
            $file->move(public_path($this->path_file_image),$file_name);
            $request->merge(['image'=> $file_name]);

        }
        if($request->has('file_upload_audio'))
        {
            $file =  $request->file_upload_audio;
            $file_name =  $file->getClientoriginalName();
            $extension = $file ->extension();
            $x = pathinfo($file_name, PATHINFO_FILENAME);
            $dateTime = date('dmYHis');
            $file_name = 'tu_moi-'.$dateTime.'-'.$x.'.'.$extension;
            $file->move(public_path($this->path_file_audio),$file_name);
            $request->merge(['audio'=> $file_name]);

        }

        if(TuMoi::create($request->all()))
        {

            return redirect()->route('tu_moi')->with('success','Thêm sản phẩm thành công');
        }
    }
    public function store(Request $request)
    {
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
                "name"=>$request->input('name'),
                "phien_am"=>$request->input('phien_am'),
                "audio"=>$request->input('audio'),
                "tu_loai"=>$request->input('tu_loai'),
                "vi_du"=>$request->input('vi_du'),
                "image" => $request->input('image'),
                "che_tu" => $request->input('che_tu'),
                "cau_truc_cau" => $request->input('cau_truc_cau'),
                "chu_de_id" => $request->input('chu_de_id'),
//                "status" => $request->input('status')
            ];
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
     * Show the form for editing the specified resource.
     *
     * @param $tu_moi_id
     * @return Application|Factory|View
     */

    public function edits($tu_moi_id)
    {
        $new_word = DB::table('tu_moi')
            -> leftJoin('chu_de','chu_de.id','=','tu_moi.chu_de_id')
            -> where('tu_moi.id','=',$tu_moi_id)
            -> select('tu_moi.*','chu_de.chu_de_name')->get();
        $subjects = ChuDe::select('id',"chu_de_name")->get();
        return view('admin.tu_moi.edit_tu_moi',compact('new_word','subjects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $tu_moi_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updates(Request $request, $tu_moi_id)
    {
//        dd($request->all());
        if($request->has('file_upload'))
        {
            $file =  $request->file_upload;
            $file_name =  $file->getClientoriginalName();
            $extension = $file ->extension();
            $x = pathinfo($file_name, PATHINFO_FILENAME);
            $dateTime = date('dmYHis');
            $file_name = 'tu_moi-'.$dateTime.'-'.$x.'.'.$extension;
            $file->move(public_path($this->path_file_image),$file_name);
            $request->merge(['image'=> $file_name]);
            $oldest_image = $request->old_image;
            $path_to_remove=$this->path_file_image.'/'.$oldest_image;
            if(File::exists(public_path($path_to_remove))){
                File::delete(public_path($path_to_remove));
            }else{
                dd('File does not exists image.');
            }
        }

        if($request->has('file_upload_audio'))
        {
            $file =  $request->file_upload_audio;
            $file_name =  $file->getClientoriginalName();
            $extension = $file ->extension();
            $x = pathinfo($file_name, PATHINFO_FILENAME);
            $dateTime = date('dmYHis');
            $file_name = 'tu_moi-'.$dateTime.'-'.$x.'.'.$extension;
            $file->move(public_path($this->path_file_audio),$file_name);
            $request->merge(['audio'=> $file_name]);
            $oldest_audio = $request->old_audio;
            $path_audio_to_remove=$this->path_file_audio.'/'.$oldest_audio;
            if(File::exists(public_path($path_audio_to_remove))){
                File::delete(public_path($path_audio_to_remove));
            }
            else{
                dd('File does not exists audio.');
            }
        }

        if( request()->chu_de_id==NULL)
        {
            $data_except = ['_token','_method','file_upload','file_upload_audio','chu_de_id','old_image','old_audio'];
            $data = request()->except($data_except);
            $u = TuMoi::where('id',$tu_moi_id)->update(
                $data
            );
        }
        else
        {
            $data_except = ['_token','_method','file_upload','file_upload_audio','old_image', 'old_audio'];
            $data = request()->except($data_except);
            $u = TuMoi::where('id',$tu_moi_id)->update(
                $data
            );
        }
        return redirect()->route('tu_moi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $r = TuMoi::find($id);
        $old_image = $r->image;
        $path_to_remove=$this->path_file_image.'/'.$old_image;
        //dd($old_image);
        if(File::exists(public_path($path_to_remove)))
            File::delete(public_path($path_to_remove));
        $old_audio = $r->audio;
        $path_to_remove_audio=$this->path_file_image.'/'.$old_audio;
        //dd($old_image);
        if(File::exists(public_path($path_to_remove_audio))){
            File::delete(public_path($path_to_remove_audio));
        }
        $u = TuMoi::where('id', $id)->delete();
        return redirect()->route('tu_moi');
    }

    public function get_create_many_records(Request $request)
    {
        return view('admin.tu_moi.create_many');
    }
    public function post_create_many_records(Request $request)
    {
        $data = $request->input('data');
        // Process the received data as needed (e.g., save to database)
        $data1 = $request->input('data');
        echo($data1);
        return response()->json(['success' => $data]);
    }
    public function displayReadExcevlFile(Request $request)
    {
        return view('admin.tu_moi.read_excel_file');
    }
    //https://www.nidup.io/blog/manipulate-excel-files-in-php
    public function readExcelFile($filePath)
    {
        if (file_exists($filePath)) {
            # open the file
            $reader = ReaderEntityFactory::createXLSXReader();
            $reader->open($filePath);
            $isFirstRow = true;
            # read each cell of each row of each sheet
            try {
                foreach ($reader->getSheetIterator() as $sheet) {
                    foreach ($sheet->getRowIterator() as $row) {
                        if ($isFirstRow) {
                            $isFirstRow = false;
                            continue; // Skip the first row
                        }
                        $rowData = $row->toArray();
//                        echo implode(', ', $rowData) . '<br>'; // Display the row data
                        $model = new TuMoi();
                        $model->name = $rowData[0];
                        $model->image = $rowData[1];
                        $model->tu_loai = $rowData[2];
                        $model->phien_am = $rowData[3];
                        $model->vi_du = $rowData[4];
                        $model->audio = $rowData[5];
                        $model->che_tu = $rowData[6];
                        $model->cau_truc_cau = $rowData[7];
                        $model->chu_de_id = intval($rowData[8]);
//                        dd($model);
                        $model->save();
                    }
                }
            } catch (ReaderNotOpenedException $e) {
            } finally {
                $reader->close();
                unlink($filePath); // delete excel file from server
            }
        }

        header("File Not Not Found");
        echo "File Not Not Found";

    }
    public function upload_excel(Request $request)
    {

        $filePath = '';
        if ($request->has('file_upload')) {
            $file = $request->file_upload;
            $file_name = $file->getClientoriginalName();
            $extension = $file->extension();
            $x = pathinfo($file_name, PATHINFO_FILENAME);
            $dateTime = date('dmYHis');
            $file_name = 'tu-moi-' . $dateTime . '-' . $x . '.' . $extension;
            $file->move(public_path($this->path_file_image), $file_name);
            $request->merge(['image' => $file_name]);
            $filePath = public_path($this->path_file_image) .'/'. $file_name;
            $filePath = str_replace('/', '\\', $filePath);
        }
        $this->readExcelFile($filePath);
        return redirect()->route('tu_moi');
    }
}
