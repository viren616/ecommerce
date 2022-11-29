<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Home;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PDO;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data'] = DB::table('home')->get();
        return view('admin.home', $result);
    }


    public function home_delete($id)
    {
        DB::delete('delete from home where id = ?', [$id]);
        return redirect('admin/home');
    }

    public function icon_delete($id, $prof_id)
    {
        DB::delete('delete from social_icon where id = ?  ', [$id]);
        return redirect('admin/manage_home/' . $prof_id);
    }

    function manage_home($id = '')
    {
        if ($id > 0) {
            $result['icon_arr'] = DB::table('social_icon')->where('user_id', $id)->get();
            $result['data'] = DB::table('home')->find($id);
            // dd($result);
            if (isset($result['data'])) {
                $result['id'] = $result['data']->id;
                $result['name'] = $result['data']->name;
                $result['description'] = $result['data']->description;
                $result['image'] = $result['data']->image;
                $result['status'] = $result['data']->status;
                //  $result['icon_arr'] = $result['']->status;
            }
            // else {
            //     return redirect('/admin/home');
            // }
        } else {
            $result['icon_arr'][0]['id'] = '';
            $result['icon_arr'][0]['icon_name'] = '';
            $result['icon_arr'][0]['icon_link'] = '';
            $result['id'] = '';
            $result['name'] = '';
            $result['description'] = '';
            $result['image'] = '';
            $result['status'] = '';
        }
        // dd($result);
        return view('admin.manage_home', $result);
    }

    public function home_status($status, $id)
    {

        $result['count'] = DB::table('home')->get()->count();
        if ($result['count'] == 1) {
            DB::table('home')
            ->where('id', $id)
            ->update(['status' => 1]);
        } else {

            if ($status == 1) {
                DB::table('home')
                    ->where('id', $id)
                    ->update(['status' => $status]);
                DB::table('home')
                    ->where('id', '!=', $id)
                    ->update(['status' => 0]);
            } else {
                DB::table('home')
                    ->where('id', $id)
                    ->update(['status' => $status]);
                DB::update('update home set status=? where id=(select id from home where id!=? limit 1) ', [1, $id]);
            }
        }
        return redirect('admin/home');
    }

    function manage_home_process(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:home,name,' . $request->id,
            'description' => 'required',
            "icon_name.*" => "required|string|distinct"
        ]);
        
        $image_name='';
        if($request->hasFile('profile_pic')){
             if ($request->id != '') {
                $arrImage = DB::table('home')->where(['id' => $request->id])->get();
                $file = public_path() . '/storages/media/profile_pic/' . $arrImage[0]->image;
                if (@getimagesize($file)) {
                    unlink($file);
                }
             }     $image=$request->file('profile_pic');
                $ext=$image->extension();
                $image_name=time().'.'.$ext;
                $image->move('storages/media/profile_pic/', $image_name);
        }  else{
            $arrImage = DB::table('home')->where(['id' => $request->id])->get();
            $image_name= $arrImage[0]->image;
            // dd($request->all());
        }

         $data = [
            'name' => $request->name,
            'description' => $request->description,
            'image'=>$image_name,
            'status' => isset($request->id) && $request->id!='' ?1:0,
        ];

         $arricon_id = $request->pid;
        $arricon_name = $request->icon_name;
        $arricon_link = $request->icon_link;
        if ($request->id != '') {
            $fetchid = $request->id;
            DB::table('home')
                ->where('id', $request->id)
                ->update($data);
        } else {
            $fetchid = DB::table('home')
                ->insertGetId($data);
        }

  
        foreach ($arricon_name as $key => $value) {
            $social_icon_arr['user_id'] = $fetchid;
            $social_icon_arr['icon_name'] = $value;
            $social_icon_arr['icon_link'] = $arricon_link[$key];
            if ($arricon_id[$key] != '') {
                DB::table('social_icon')->where(['id' => $arricon_id[$key]])->update($social_icon_arr);
            } else {
                DB::table('social_icon')->insert($social_icon_arr);
            }
        }
          return redirect('admin/home');
    }
}
