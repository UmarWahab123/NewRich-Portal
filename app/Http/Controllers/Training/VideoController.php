<?php
namespace App\Http\Controllers\Training;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Training\ClassRoom;
use Illuminate\Support\Facades\Session;

class VideoController extends Controller
{
    public function settings(Request $request)
    {
        $data['page_title'] = "Update Settings";
        $data['results'] =  ClassRoom::get()->first();
        //  dd(  $data['results']);
        return view('setting.index' ,compact('data'));

    }
    public function saveportalsettings(Request $request)
    {
        $id = $request->id;
        $modal = new ClassRoom;
        $data = $request->all();
// dd($data);
        if ($request->hasfile('logo')) {
            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();

            $filename = time() . "." . $extension;
            $file->move('uploads/products/', $filename);
            $data['logo'] = '/uploads/products/' . $filename;

            $request->logo = $data['logo'];
        }
        $action = "Added";
        if ($id) {
            $action = "Updated";
            $modal = ClassRoom::find($id);
            $affected_rows = $modal->update($data);
        } else {

            $modal =  $modal::create($data);
        }
        $message=   set_message($affected_rows,'Settings',$action);
        Session::put('message', $message);
        return Redirect('/settings');

    }
}
?>
