<?php
namespace App\Http\Controllers\Training;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Training\TrainingLesson;
use App\Models\Training\TrainingResource;
use Illuminate\Support\Facades\Session;

class LessonController extends Controller
{
    public function page($training_id,$id=-1){
        $data['page_title']="Add Page";
        $tags=[];
        if($id!=-1){
            $data['page_title']="Update Page";
            $data['results'] =  TrainingLesson::where("id",$id)->first();
            $tags=explode(',', $data['results']->tags);
        }
        $data['training']=TrainingResource::where('id',$training_id)->first();
        $data['training_id']=$training_id;
        return view('training.tutorial.lessons.save',compact('data','tags'));
    }
    
    public function lessondetail(Request $request){
        $data['lead_id']=$request->lead_id;
        $data['type']=$request->type;
        $data['results']=TrainingLesson::where('id', $request->id)->first();
        $modal= view('training.tutorial.lessons.detail',compact('data'))->render();
        $response=array('response'=>$modal);
        return json_encode($response);
    }
    public function savelesson(Request $request){
        $id=$request->id;
        $data=$request->all();
        $data['tags']=!empty($request->tags) ?  implode(',',$request->tags) : '';

//        dd($data);
        $action="Added";
        if($id){
            $action="Updated";
            $affected_rows = TrainingLesson::find($id)->update($data);
        }
        else{
            $affected_rows =  TrainingLesson::create($data);
        }
        $message=   set_message($affected_rows,'Page',$action);
        Session::put('message', $message);
        return redirect('trainingdetail/'.$request->training_id);
//        $results=TrainingLesson::where('training_id', $request->training_id)->get();
//        $results= view('training.tutorial.lesson.index',compact('results'))->render();
//        $response=array('response'=>$results);
//        return json_encode($response);
    }
    public function deletelesson($id){
        $affected_rows = TrainingLesson::find($id)->delete();
        Session::put('message', set_message($affected_rows,'Page','deleted'));
        return redirect()->back();
    }
}
