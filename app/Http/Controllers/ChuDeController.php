<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use App\Models\ChuDe;
use App\Models\TuMoi;
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;
use Box\Spout\Reader\Exception\ReaderNotOpenedException;
use DateTime;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;

class ChuDeController extends Controller
{
    private $path_file_image = "assets/admin/img/chu_de";
    private $path_file_excel = "assets/admin/excel/chu_de";
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $subjects = DB::table('chu_de')
            ->leftJoin('category', 'category.id', '=', 'chu_de.category_id')
            ->select('chu_de.*', 'category.category_name')
            ->orderBy('id', 'desc') // Order by created_time in descending order
            ->get();

        return view('admin.chu_de.chu_de', compact('subjects'));
    }

    public function  all_courses()
    {
        $subjects = DB::table('chu_de')
            ->select(
                'chu_de.id',
                'chu_de.chu_de_name',
                'chu_de.image AS chu_de_image',
                'chu_de.so_nguoi_theo_hoc',
                'chu_de.description AS chu_de_description',
                'category.category_name AS category_name',
                'category.image AS category_image',
                'category.description AS category_description',
                DB::raw('COUNT(IFNULL(tu_moi.id, 0)) AS tu_moi_count')
            )
            ->leftJoin('category', 'category.id', '=', 'chu_de.category_id')
            ->leftJoin('tu_moi', 'chu_de.id', '=', 'tu_moi.chu_de_id')
            ->groupBy(
                'chu_de.id',
                'chu_de.chu_de_name',
                'chu_de.image',
                'chu_de.so_nguoi_theo_hoc',
                'chu_de.description',
                'category.category_name',
                'category.image',
                'category.description'
            )
            ->where(function ($query) {
                $query->whereExists(function ($subquery) {
                    $subquery->select(DB::raw(1))
                        ->from('tu_moi')
                        ->whereRaw('tu_moi.chu_de_id = chu_de.id');
                });
            })
            ->paginate(5);

        return view('front_end.courses', compact('subjects'));
    }

    public function get_many_images(){
        return view('admin.chu_de.upload_many_image');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return string
     */
    public function upload_many_images(Request $request)
    {
        if ($request->hasFile('images')) {
            $images = $request->file('images');

            foreach ($images as $image) {
                $imageName = $image->getClientOriginalName();
                $extension = $image ->extension();
                $x = pathinfo($imageName, PATHINFO_FILENAME);
                $file_name = $x.'.'.$extension;
                $image->move(public_path($this->path_file_image),$file_name);
                $request->merge(['image'=> $file_name]);
            }

            return redirect()->route('chu_de');
        }

        return 'No images selected for upload.';
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
     * @return RedirectResponse
     */
    public function save(Request $request)
    {
        if ($request->has('file_upload')) {
            $file = $request->file_upload;
            $file_name = $file->getClientOriginalName();
            $extension = $file->extension();
            $x = pathinfo($file_name, PATHINFO_FILENAME);
            $currentDatetime = new DateTime();
            $formattedDatetime = $currentDatetime->format('dmyHis');
            $file_name = 'chu_de-'.$x.'-'.$formattedDatetime.'.'.$extension;
            $file->move(public_path($this->path_file_image), $file_name);
            $full_file_path = $this-> path_file_image . '/' . $file_name;
            $request->merge(['image'=> $full_file_path]);
        }

        // Generate a random integer for so_nguoi_theo_hoc within the specified range
        $randomStudents = rand(30001, 100000);

        // Add the random integer value to the request data
        $request->merge(['so_nguoi_theo_hoc' => $randomStudents]);

        ChuDe::create($request->all());
        return redirect()->route('chu_de');
    }



    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $chu_de_id
     * @return Application|Factory|View
     */
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
     * @param $chu_de_id
     * @return RedirectResponse
     */

    public function updates(Request $request, $chu_de_id)
    {

        if($request->has('file_upload'))
        {
            $file =  $request->file_upload;
            $file_name =  $file->getClientoriginalName();
            $extension = $file ->extension();
            $x = pathinfo($file_name, PATHINFO_FILENAME);
            $currentDatetime = new DateTime();
            $formattedDatetime = $currentDatetime->format('dmyHis');
            $file_name = 'chu_de-'.$x.'-'.$formattedDatetime.'.'.$extension;
            $file->move(public_path($this->path_file_image),$file_name);
            $full_file_path = $this-> path_file_image . '/' . $file_name;
            $request->merge(['image'=> $full_file_path]);
            $oldest_image = $request->old_image;
            $path_to_remove=$this->path_file_image.'/'.$oldest_image;
            if(File::exists(public_path($path_to_remove))){
                File::delete(public_path($path_to_remove));
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
     * @return RedirectResponse
     */
    public function destroy($category_id)
    {
        $r = ChuDe::find($category_id);
        if(($r->totalTuMoi)>0)
        {
            dd('Có tham chiếu không thể xóa.');
        }
        $old_image = $r->image;
        $path_to_remove=$this->path_file_image.'/'.$old_image;
//        dd($old_image);
        if(File::exists(public_path($path_to_remove))){
            File::delete(public_path($path_to_remove));
        }
        $u = ChuDe::where('id', $category_id)->delete();
        return redirect()->route('chu_de');
    }

    public function get_excel_file(Request $request)
    {
        return view('admin.chu_de.upload_many_excel');
    }
    public function get_excel_file_updates(Request $request)
    {
        return view('admin.chu_de.update_many_excel');
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
                        $model = new ChuDe();
                        $model->chu_de_name = $rowData[0];
                        $model->image = $this-> path_file_image . '/' .$rowData[1];
                        $model->so_nguoi_theo_hoc = $rowData[2];
                        $model->category_id = intval($rowData[3]);
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
            $file_name = 'chu_de-'. $x . '.' . $extension;
            $file->move(public_path($this->path_file_excel), $file_name);
            $request->merge(['image' => $file_name]);
            $filePath = public_path($this->path_file_excel) .'/'. $file_name;
            $filePath = str_replace('/', '\\', $filePath);
        }
        $this->readExcelFile($filePath);
        return redirect()->route('chu_de');
    }
    public function readUpdateExelFile($filePath)
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
                        if ($rowData[0])
                        {
                            $chuDe = ChuDe::find($rowData[0]);
//                            dd($chuDe);
                        }
                        else continue;
                        if ($chuDe) {
                            if($rowData[1] !='Null' )
                                $chuDe->chu_de_name = $rowData[1];
                            if($rowData[2] !='Null' )
                                $chuDe->image = $rowData[2];
                            if($rowData[3] !='Null' )
                                $chuDe->so_nguoi_theo_hoc = $rowData[3];
                            if($rowData[5] !='Null' )
                                $chuDe->description = $rowData[5];
                            if($rowData[4] !='Null' )
                                $chuDe->category_id = $rowData[4];
                            if( $rowData[6] != 'Null' )
                                $chuDe->youtube_code= $rowData[6];
                            $chuDe->save();
                        }
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

    public function process_update_excel(Request $request)
    {

        $filePath = '';
        if ($request->has('file_upload')) {
            $file = $request->file_upload;
            $file_name = $file->getClientoriginalName();
            $extension = $file->extension();
            $x = pathinfo($file_name, PATHINFO_FILENAME);
            $file_name = 'chu_de-'. $x . '.' . $extension;
            $file->move(public_path($this->path_file_excel), $file_name);
            $request->merge(['image' => $file_name]);
            $filePath = public_path($this->path_file_excel) .'/'. $file_name;
            $filePath = str_replace('/', '\\', $filePath);
        }
        $this->readUpdateExelFile($filePath);
        return redirect()->route('chu_de');
    }
    public function category_detail($category_id)
    {
        $subjects = DB::table('chu_de')
            ->select(
                'chu_de.id',
                'chu_de.chu_de_name',
                'chu_de.image AS chu_de_image',
                'chu_de.so_nguoi_theo_hoc',
                'chu_de.description AS chu_de_description',
                'category.category_name AS category_name',
                'category.image AS category_image',
                'category.description AS category_description',
                DB::raw('COUNT(IFNULL(tu_moi.id, 0)) AS tu_moi_count')
            )
            ->leftJoin('category', 'category.id', '=', 'chu_de.category_id')
            ->leftJoin('tu_moi', 'chu_de.id', '=', 'tu_moi.chu_de_id')
            ->where('category.id', $category_id)
            ->groupBy(
                'chu_de.id',
                'chu_de.chu_de_name',
                'chu_de.image',
                'chu_de.so_nguoi_theo_hoc',
                'chu_de.description',
                'category.category_name',
                'category.image',
                'category.description'
            )
            ->where(function ($query) {
                $query->whereExists(function ($subquery) {
                    $subquery->select(DB::raw(1))
                        ->from('tu_moi')
                        ->whereRaw('tu_moi.chu_de_id = chu_de.id');
                });
            })
            ->paginate(5); ;
//        dd($subjects);
        return view('front_end.detail_chu_de', compact('subjects'));
    }

    public function new_words_next($chu_de_id)
    {
        // Get the category_id for the given chu_de_id
        $category_id = ChuDe::where('id', $chu_de_id)->value('category_id');
        $subjects = DB::table('chu_de')
            ->select(
                'chu_de.id',
                'chu_de.chu_de_name',
                'chu_de.image AS chu_de_image',
                'chu_de.so_nguoi_theo_hoc',
                'chu_de.description AS chu_de_description',
                'category.category_name AS category_name',
                'category.image AS category_image',
                'category.description AS category_description',
                DB::raw('COUNT(IFNULL(tu_moi.id, 0)) AS tu_moi_count')
            )
            ->leftJoin('category', 'category.id', '=', 'chu_de.category_id')
            ->leftJoin('tu_moi', 'chu_de.id', '=', 'tu_moi.chu_de_id')
            ->where('category.id', $category_id)
            ->groupBy(
                'chu_de.id',
                'chu_de.chu_de_name',
                'chu_de.image',
                'chu_de.so_nguoi_theo_hoc',
                'chu_de.description',
                'category.category_name',
                'category.image',
                'category.description'
            )
            ->where(function ($query) {
                $query->whereExists(function ($subquery) {
                    $subquery->select(DB::raw(1))
                        ->from('tu_moi')
                        ->whereRaw('tu_moi.chu_de_id = chu_de.id');
                });
            })
            ->paginate(5); ;
//        dd($subjects);
        return view('front_end.courses', compact('subjects'));
    }

    public function che_tu_for_chu_de($chu_de_id)
    {
        $results = DB::table('tu_moi')
            ->where('tu_moi.chu_de_id', $chu_de_id)
            ->rightJoin('chu_de','chu_de.id','=','tu_moi.chu_de_id')
            ->select(
                'tu_moi.*',
                'chu_de.id AS chu_de_id',
                'chu_de.chu_de_name AS chu_de_name',
                'chu_de.image AS chu_de_image',
                'chu_de.so_nguoi_theo_hoc',
                'chu_de.description AS chu_de_description'
            )
            ->get();

        return view('front_end.che_tu_for_chu_de', compact('results'));
    }
    public function che_tu()
    {
        $results = DB::table('category')
            ->select('category.*')
            ->join('chu_de', 'category.id', '=', 'chu_de.category_id')
            ->distinct()
            ->get();
        return view('front_end.che_tu', compact('results'));
    }
    public function getChuDeOptions(Request $request)
    {
        $categoryId = $request->input('category_id');
        $chuDeOptions = ChuDe::join('tu_moi', 'chu_de.id', '=', 'tu_moi.chu_de_id')
            ->where('chu_de.category_id', $categoryId)
            ->select('chu_de.*')
            ->distinct()
            ->get();

        return response()->json($chuDeOptions);
    }
    public function getTuMoiOptions(Request $request)
    {
        $chu_de_id = $request->input('chu_de_id');
        $tuMoiOptions = TuMoi::where('chu_de_id', $chu_de_id)->get(['name', 'tu_loai', 'che_tu','phien_am']);


        return response()->json($tuMoiOptions);
    }
}
