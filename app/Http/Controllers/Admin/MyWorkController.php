<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class MyWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data'] = DB::table('projects')
            ->get();
        return view('admin.mywork', $result);
    }

    public function manage_mywork(Request $request, $id = '')
    {
        if ($id > 0) {
            $res['data'] = DB::table('projects')->where('id', $id)->get();
            $imagesarr = DB::table('project_images')->where('project_id', $id)->get();
            $result['id'] = $res['data'][0]->id;
            $result['pid'] = $id;
            $result['project_category'] = $res['data'][0]->project_category;
            $result['project_name'] = $res['data'][0]->project_name;
            $result['client_name'] = $res['data'][0]->client_name;
            $result['project_from'] = $res['data'][0]->project_from;
            $result['project_to'] = $res['data'][0]->project_to;
            $result['city'] = $res['data'][0]->city;
            $result['state'] = $res['data'][0]->state;
            $result['project_url'] = $res['data'][0]->project_url;
            $result['description'] = $res['data'][0]->description;
            $result['project_images']  = $imagesarr;
        } else {
            $result['id'] = '';
            $result['pid'] = '';
            $result['project_category'] = '';
            $result['project_name'] = '';
            $result['client_name'] = '';
            $result['project_from'] = '';
            $result['project_to'] = '';
            $result['city'] = '';
            $result['state'] = '';
            $result['project_url'] = '';
            $result['description'] = '';
            $result['project_images']['0']['id']  = '';
            $result['project_images']['0']['image']  = '';
        }
        return view('admin.manage_mywork', $result);
    }

    public function image_delete($id, $pid)
    {
        DB::delete('delete from project_images where id = ?  ', [$id]);
        return redirect('admin/manage_mywork/' . $pid);
    }
    public function mywork_delete($id)
    {
        DB::delete('delete from projects where id = ?  ', [$id]);
        DB::delete('delete from project_images where project_id = ?  ', [$id]);
        return redirect('admin/mywork');
    }

    public function manage_mywork_process(Request $request)
    {


         if ($request->id > 0) {
            $image_validation = "";
        } else {
            $image_validation = "required ";
        }

        $this->validate($request, [
            'image' =>   $image_validation,
            'image.*' => 'image|mimes:jpeg,jpg,png',
        ]);


        $data = [
            "project_category" => $request->project_type,
            "project_name" => $request->project_name,
            "client_name" => $request->client_name,
            "project_from" => $request->project_from,
            "project_to" => $request->project_to,
            "city" => $request->city,
            "state" => $request->state,
            "project_url" => $request->project_url,
            "description" => $request->description,
        ];
        // return $request;
        if ($request->id > 0) {
            $pid = $request->id;
            DB::table('projects')->where('id', $request->id)->update($data);
        } else {
            $pid = DB::table('projects')->insertGetId($data);
        }

        $image_id = $request->image_id;
        foreach ($image_id as $key => $value) {
            if ($request->hasFile("image.$key")) {
                $image = $request->file('image')[$key];
                $imageName = $request->file('image')[$key]->getClientOriginalName();
                 $check = DB::table('project_images')->where('image', $imageName)
                    ->get();
                if ($image_id[$key] != '') {
                    if (!isset($check[0])) {
                        $image->move(public_path() . '/images/project_images', $imageName);
                        DB::table('project_images')->where(['id' => $image_id[$key]])->update(['project_id' => $pid, 'image' => $imageName]);
                    } else {
                        DB::table('project_images')->where(['id' => $image_id[$key]])->update(['project_id' => $pid, 'image' => $imageName]);
                    }
                } else {
                    if (!isset($check[0])) {
                        $image->move(public_path() . '/images/project_images', $imageName);
                        DB::table('project_images')->insert(['project_id' => $pid, 'image' => $imageName]);
                    } else {
                        DB::table('project_images')->insert(['project_id' => $pid, 'image' => $imageName]);
                    }
                }
            }
        }
        return redirect('admin/mywork');
    }
}
