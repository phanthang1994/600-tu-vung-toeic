<?php

namespace App\Http\Controllers;
use App\Models\ChuDe;
use App\Models\TuMoi;
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;
use Box\Spout\Reader\Exception\ReaderNotOpenedException;
use DateTime;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


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


    public function creates()
    {
        $subjects = ChuDe::select('id',"chu_de_name")->get();
        //        dd($cats);
        return view('admin.tu_moi.create_tu_moi',compact('subjects'));
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
            $currentDatetime = new DateTime();
            $formattedDatetime = $currentDatetime->format('dmyHis');
            $file =  $request->file_upload;
            $file_name =  $file->getClientoriginalName();
            $extension = $file ->extension();
            $x = pathinfo($file_name, PATHINFO_FILENAME);
            $file_name = 'tu_moi-'.$x.'-'.$formattedDatetime.'.'.$extension;
            $file->move(public_path($this->path_file_image),$file_name);
            $full_file_path = $this-> path_file_image . '/' . $file_name;
            $request->merge(['image'=> $full_file_path]);

        }
        if($request->has('file_upload_audio'))
        {
            $file =  $request->file_upload_audio;
            $file_name =  $file->getClientoriginalName();
            $extension = $file ->extension();
            $x = pathinfo($file_name, PATHINFO_FILENAME);
            $file_name = 'tu_moi-'.$x.'.'.$extension;
            $file->move(public_path($this->path_file_audio),$file_name);
            $full_file_path = $this-> path_file_audio . '/' . $file_name;
            $request->merge(['audio'=> $full_file_path]);

        }

        if(TuMoi::create($request->all()))
        {

            return redirect()->route('tu_moi')->with('success','Thêm sản phẩm thành công');
        }
        return redirect()->route('tu_moi')->with('success','Thêm sản phẩm không thành công');
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
     * @return RedirectResponse
     */
    public function updates(Request $request, $tu_moi_id)
    {
        $currentDatetime = new DateTime();
        $formattedDatetime = $currentDatetime->format('dmyHis');
//        dd($request->all());
        if($request->has('file_upload'))
        {

            $file =  $request->file_upload;
            $file_name =  $file->getClientoriginalName();
            $extension = $file ->extension();
            $x = pathinfo($file_name, PATHINFO_FILENAME);
            $file_name = 'tu_moi-'.$x.'-'.$formattedDatetime.'.'.$extension;
            $file->move(public_path($this->path_file_image),$file_name);
            $full_file_path = $this-> path_file_image . '/' . $file_name;
            $request->merge(['image'=> $full_file_path]);
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
            $file_name = 'tu_moi-'.$x.'-'.$formattedDatetime.'.'.$extension;
            $file->move(public_path($this->path_file_audio),$file_name);
            $full_file_path = $this-> path_file_image . '/' . $file_name;
            $request->merge(['audio'=> $full_file_path]);
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
     * @return RedirectResponse
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
    public function get_update_many_records(Request $request)
    {
        return view('admin.tu_moi.update_many');
    }

    //https://www.nidup.io/blog/manipulate-excel-files-in-php
    public function readExcelFile($filePath)
    {
//        dd($filePath);
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
                        $model->image = $this->path_file_image.'/'.$rowData[1];
                        $model->tu_loai = $rowData[2];
                        $model->phien_am = $rowData[3];
                        $model->vi_du = $rowData[4];
                        $model->audio = $this->path_file_audio.'/'.$rowData[5];
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
            $file_name = 'tu-moi-'. $x . '.' . $extension;
            $file->move(public_path($this->path_file_excel), $file_name);
            $request->merge(['image' => $file_name]);
            $filePath = public_path($this->path_file_excel) .'/'. $file_name;
            $filePath = str_replace('/', '\\', $filePath);
        }
        $this->readExcelFile($filePath);
        return redirect()->route('tu_moi');
    }
    public function process_update_excel($filePath)
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
                        $model = TuMoi::find($rowData[0]);
                        if ($model)
                        {
                            if ($rowData[1]!='Null')
                            $model->name = $rowData[1];
                            if ($rowData[2]!='Null')
                            $model->image = $this->path_file_image.'/'.$rowData[2];
                            if ($rowData[3]!='Null')
                            $model->tu_loai = $rowData[3];
                            if ($rowData[4]!='Null')
                            $model->phien_am = $rowData[4];
                            if ($rowData[5]!='Null')
                            $model->vi_du = $rowData[5];
                            if ($rowData[6]!='Null')
                            $model->audio = $this->path_file_audio.'/'.$rowData[6];
                            if ($rowData[7]!='Null')
                            $model->che_tu = $rowData[7];
                            if ($rowData[8]!='Null')
                            $model->cau_truc_cau = $rowData[8];
                            if ($rowData[9]!='Null')
                            $model->chu_de_id = intval($rowData[9]);
//                        dd($model);
                            $model->save();
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
    public function upload_update_excel (Request $request)
    {

        $filePath = '';
        if ($request->has('file_upload')) {
            $file = $request->file_upload;
            $file_name = $file->getClientoriginalName();
            $extension = $file->extension();
            $x = pathinfo($file_name, PATHINFO_FILENAME);
            $file_name = 'tu-moi-'. $x . '.' . $extension;
            $file->move(public_path($this->path_file_excel), $file_name);
            $request->merge(['image' => $file_name]);
            $filePath = public_path($this->path_file_excel) .'/'. $file_name;
            $filePath = str_replace('/', '\\', $filePath);
        }
        $this->process_update_excel($filePath);
        return redirect()->route('tu_moi');
    }
    public function get_many_images(){
        return view('admin.tu_moi.upload_many_image');
    }
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

        }
        if ($request->hasFile('audios')) {
            $images = $request->file('audios');

            foreach ($images as $image) {
                $imageName = $image->getClientOriginalName();
                $extension = $image ->extension();
                $x = pathinfo($imageName, PATHINFO_FILENAME);
                $file_name = $x.'.'.$extension;
                $image->move(public_path($this->path_file_audio),$file_name);
                $request->merge(['audio'=> $file_name]);
            }

            return redirect()->route('tu_moi');
        }

        return 'No images selected for upload.';
    }
    public function new_words($chu_de_id)
    {
        $new_word = DB::table('tu_moi')
            -> leftJoin('chu_de','chu_de.id','=','tu_moi.chu_de_id')
            -> where('tu_moi.chu_de_id','=',$chu_de_id)
            -> select('tu_moi.*','chu_de.chu_de_name','chu_de.description as chu_de_description','chu_de.youtube_code')->get();
//        return dd($new_word);
        return view('front_end.new_words',compact('new_word'));
    }

    public function test_types()
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
//        dd($subject);
        $subjects->getCollection()->transform(function ($result) {
            $minutes = floor($result->tu_moi_count * 2 / 60);
            $seconds = $result->tu_moi_count % 60;
            $timeToTest = sprintf("%02d:%02d", $minutes, $seconds);

            // Add the 'time_to_test' field to the result object
            $result->time_to_test = $timeToTest;
            return $result;
        });
//        dd($subject);
        return view('front_end.test_type', compact('subjects'));
    }

    public function single_test_type($chu_de_id)
    {
        $results = DB::table('chu_de')
            ->leftJoin('tu_moi', 'chu_de.id', '=', 'tu_moi.chu_de_id')
            ->select('chu_de.id',
                'chu_de.chu_de_name',
                'chu_de.image AS chu_de_image',
                'chu_de.so_nguoi_theo_hoc',
                'chu_de.description AS chu_de_description',
                DB::raw("(SELECT COUNT(id) FROM tu_moi WHERE chu_de_id = {$chu_de_id}) AS tu_moi_count")
            )
            ->where('chu_de.id', $chu_de_id)
            ->first();

        if ($results) {
            $minutes = floor($results->tu_moi_count * 2 / 60);
            $seconds = $results->tu_moi_count % 60;
            $timeToTest = sprintf("%02d:%02d", $minutes, $seconds);
            $results->time_to_test = $timeToTest;
        }

//        dd($results);
        return view('front_end.single_test_type', compact('results'));
    }
    public function test_type()
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
//        dd($subject);
        $subjects->getCollection()->transform(function ($result) {
            $minutes = floor($result->tu_moi_count * 2 / 60);
            $seconds = $result->tu_moi_count % 60;
            $timeToTest = sprintf("%02d:%02d", $minutes, $seconds);

            // Add the 'time_to_test' field to the result object
            $result->time_to_test = $timeToTest;
            return $result;
        });
//        dd($subjects);
        return view('front_end.test_type_detail', compact('subjects'));
    }
    public function next_test_type($chu_de_id)
    {
        $category_id = ChuDe::where('id', $chu_de_id)->value('category_id');
        return $this->test_type($category_id);
    }
    public function multiple_choice_question($id_chu_de)
    {
        $subjects = DB::table('tu_moi')
            ->where('tu_moi.chu_de_id', '=', $id_chu_de)
            ->select('tu_moi.id', 'tu_moi.name', 'tu_moi.tu_loai', 'tu_moi.image', 'tu_moi.phien_am')
            ->get();

        $questions = [];
        $tu_loai_list = $subjects->pluck('tu_loai')->all();
        $list_option = ["optionA","optionB","optionC","optionD"];
        foreach ($subjects as $subject) {
            $question = [
                'question' => $subject->name,
                'optionA' => '',
                'optionB' => '',
                'optionC' => '',
                'optionD' => '',
                'correctOption' => '',
                'optionChoiced' => '',
                'trueOrFlase' => 0,
                'valueChoiced' => '',
                'remeber' => 0,
                'image' => $subject->image,
                'phien_am' => $subject->phien_am
            ];

            $options = $this->generateRandomList($subject->tu_loai, $tu_loai_list);

            $question['optionA'] = $options[0];
            $question['optionB'] = $options[1];
            $question['optionC'] = $options[2];
            $question['optionD'] = $options[3];

            $index = array_search($subject->tu_loai, $options);
//            dd($index);

            $question['correctOption'] = $list_option[$index]; // Assign the correct option

            $questions[] = $question;
        }
//        dd($questions);
        return view('front_end.multiple_choice_question', compact('questions'));
    }
    private function generateRandomList($fixedValue,$possibleValues) {
        $items = [$fixedValue];
//        dd($fixedValue);
        $remainingValues = array_diff($possibleValues, [$fixedValue]);
        $randomValues = array_rand($remainingValues, 3);

        if (!is_array($randomValues)) {
            $randomValues = [$randomValues];
        }

        foreach ($randomValues as $randomIndex) {
            $items[] = $remainingValues[$randomIndex];
            unset($remainingValues[$randomIndex]);
        }

        shuffle($items);

        return $items;
    }
    public function free_text_question($id_chu_de)
    {
        $subjects = DB::table('tu_moi')
            ->where('tu_moi.chu_de_id', '=', $id_chu_de)
            ->select('tu_moi.id', 'tu_moi.name', 'tu_moi.tu_loai', 'tu_moi.image', 'tu_moi.phien_am')
            ->get();

        $questions = []; // Initialize an empty array for questions

        foreach ($subjects as $subject) {
            $nameParts = explode(' ', $subject->tu_loai); // Split the name by space into an array
            shuffle($nameParts); // Randomize the array

            $question = [
                'question' => $subject->name,
                'suggestion' => $nameParts,
                'correctOption' => $subject->tu_loai,
                'optionChoiced' => '',
                'trueOrFlase' => '',
                'valueChoiced' => '',
                'remeber' => '',
                'image' => $subject->image,
                'phien_am' => $subject->phien_am

            ];

            $questions[] = $question; // Add each question to the array of questions
        }

        return view('front_end.free_text_question', compact('questions'));
    }
    public function form_question($id_chu_de)
    {
        $subjects = DB::table('tu_moi')
            ->where('tu_moi.chu_de_id', '=', $id_chu_de)
            ->select('tu_moi.id', 'tu_moi.name', 'tu_moi.tu_loai', 'tu_moi.image', 'tu_moi.phien_am')
            ->get();
        $chu_de_image = DB::table('chu_de')
            ->where('chu_de.id', '=', $id_chu_de)
            ->select('chu_de.image','chu_de.chu_de_name')
            ->get();
        $questions = [];
        $tu_loai_list = $subjects->pluck('tu_loai')->all();
        $list_option = ["a","b","c","d"];
        $increase_number = 0;
        foreach ($subjects as $subject) {
            if ($increase_number!=0)
            {
                $question = [
                    'group_id'=> $subject->id,
                    'question'=> $subject->name,
                    'a'=> '',
                    'a_id'=> $subject->id+$increase_number+4,
                    'b'=> '',
                    'b_id'=> $subject->id+$increase_number+5,
                    'c'=> '',
                    'c_id'=> $subject->id+$increase_number+6,
                    'd'=> '',
                    'd_id'=> $subject->id+$increase_number+7,
                    'correctOption' => '',
                    'optionChoiced' => '',
                    'trueOrFlase' => '',
                    'valueChoiced' => '',
                    'remeber' => 0,
                    'image' => $subject->image,
                    'phien_am' => $subject->phien_am
                ];
            }
            else{
                $question = [
                    'group_id'=> $subject->id,
                    'question'=> $subject->name,
                    'a'=> '',
                    'a_id'=> $subject->id,
                    'b'=> '',
                    'b_id'=> $subject->id+1,
                    'c'=> '',
                    'c_id'=> $subject->id+2,
                    'd'=> '',
                    'd_id'=> $subject->id+3,
                    'correctOption' => '',
                    'optionChoiced' => '',
                    'trueOrFlase' => '',
                    'valueChoiced' => '',
                    'remeber' => 0,
                    'image' => $subject->image,
                    'phien_am' => $subject->phien_am
                ];
            }

            $increase_number+=4;
            $options = $this->generateRandomList($subject->tu_loai, $tu_loai_list);

            $question['a'] = $options[0];
            $question['b'] = $options[1];
            $question['c'] = $options[2];
            $question['d'] = $options[3];

            $index = array_search($subject->tu_loai, $options);
//            dd($index);

            $question['correctOption'] = $list_option[$index]; // Assign the correct option

            $questions[] = $question;
        }
//        dd($chu_de_image);
        return view('front_end.form_question',compact('questions','chu_de_image'));
    }
}
