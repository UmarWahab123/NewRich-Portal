<?php
namespace App\Http\Controllers\Settings;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting\Settings;
use Illuminate\Support\Facades\Session;

class SettingsController extends Controller
{
    public function layoutmode(){
        $layoutmode="light-layout";
        if(Session::has('layoutmode')){
            $layoutmode=Session::get('layoutmode');
            if($layoutmode=="light-layout"){
             $layoutmode="dark-layout";
            }else{
             $layoutmode="light-layout";
            }
        }
        Session::put('layoutmode', $layoutmode);
        $response=array('layoutmode'=>$layoutmode);
        return json_encode($response);
    }
    public function settings(Request $request)
    {
        $data['page_title'] = "Update Settings";
        $data['results'] =  Settings::get()->first();
        //  dd(  $data['results']);
        return view('setting.index' ,compact('data'));

    }
    public function saveportalsettings(Request $request)
    {
        $id = $request->id;
        $modal = new Settings;
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
            $modal = Settings::find($id);
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
