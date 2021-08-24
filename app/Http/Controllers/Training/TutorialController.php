<?php
namespace App\Http\Controllers\Training;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Training\TrainingResource;
use App\Models\Training\TrainingLesson;
use Illuminate\Support\Facades\Session;

class TutorialController extends Controller
{
    public function tutorials(Request $request)
    {
        $data['page_title'] = "Update Settings";
        $data['results'] =  TrainingResource::get();
        return view('training.tutorial.index' ,compact('data'));
    }
    public function tutorial($id=-1){
        $data['page_title']="Add Tutorial";
        $tags=[];
        if($id!=-1){
            $data['page_title']="Update Tutorial";
            $data['results'] =  TrainingResource::where("id",$id)->first();
            $tags=explode(',', $data['results']->tags);
        }
        return view('training.tutorial.save',compact('data','tags'));
    }
    public function savetutorial(Request $request)
    {
        $id = $request->id;
        $modal = new TrainingResource;
        $data = $request->all();
        $data['tags']=!empty($request->tags) ?  implode(',',$request->tags) : '';
//        dd($data);
        $action = "Added";
        if ($id) {
            $action = "Updated";
            $modal = TrainingResource::find($id);
            $affected_rows = $modal->update($data);
        } else {

            $affected_rows =  $modal::create($data);
        }
        $message=   set_message($affected_rows,'Tutorial',$action);
        Session::put('message', $message);
        return Redirect('/tutorials');
    }
    public function trainingdetail($id=-1){
        $data['results'] = TrainingResource::with('lessons')->where("id",$id)->first();
        $data['pages'] =  TrainingLesson::where("training_id",$id)->get();
        return view('training.tutorial.detail',compact('data'));
    }
    public function upload_file2(Request $request){
        // if ($request->hasfile('file')) {
            $file = $request->file('file');
            // dd(  $file);
            $extension = $file->getClientOriginalExtension();
            $filename = time() . "." . $extension;
            $file->move('uploads/tutorials/', $filename);
            $data['upload_file'] = '/uploads/tutorials/' . $filename;
            // dd($data['upload_file']);
            return response()->json(['success'=>$filename]);
            // return $filename;

        // }
    }

    public function upload_file(Request $request){
        $path=$_GET['url'];
        $path = str_replace('-', '/', $path);
        if ( !empty( $_FILES ) ) {
            $date = new \DateTime();
            $current_dir=str_replace('uploads','',getcwd());
            $tempPath = $_FILES[ 'file' ][ 'tmp_name' ];
            $name=str_replace(' ', '', $_FILES['file']['name']);
            $filename=$date->getTimestamp().'-'. $name;
//            $filename=$name;
            $uploadPath = $current_dir.$path. DIRECTORY_SEPARATOR .$filename;
//            print_r($uploadPath); exit;
            move_uploaded_file( $tempPath, $uploadPath );
            $answer = array( 'answer' => 'File transfer completed' );
            $json = json_encode( $answer );
            $newFileName = $path.'/'.$filename;
            echo $newFileName;
        } else {
            echo 'No files';
        }
    }
     public function deletefiles(Request $request){
        $ds = DIRECTORY_SEPARATOR;  // Store directory separator (DIRECTORY_SEPARATOR) to a simple variable. This is just a personal preference as we hate to type long variable name.
        $storeFolder = 'uploads';
        $fileList = $_POST['fileList'];
        $path = $_POST['path'];
        $targetPath = getcwd(). $fileList;
         $path = str_replace('/', '/', $path);
         dd(trim($fileList));
        if(isset($fileList)){
            unlink($targetPath.$fileList);
        }
    }


}
?>
