<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Front;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['home'] = DB::table('social_icon')
            ->leftJoin('home', 'home.id', '=', 'social_icon.user_id')
            ->where('home.status', 1)
            ->get();

        $data['resume'] = DB::table('resume')->get();
        $data['about'] = DB::table('about')->get();
        
        $data['app'] = DB::table('projects')->where('project_category', 'App')
            ->leftJoin('project_images', 'project_images.project_id', '=', 'projects.id')
            ->get()->unique('project_id');

        $data['web_Template'] = DB::table('projects')->where('project_category', 'Web Template')
            ->leftJoin('project_images', 'project_images.project_id', '=', 'projects.id')
            ->get()->unique('project_id');

        $data['Website'] = DB::table('projects')->where('project_category', 'Website')
            ->leftJoin('project_images', 'project_images.project_id', '=', 'projects.id')
            ->get()->unique('project_id');
 
        $data['about'] = DB::table('about')
            ->get();
        $data['skill'] = DB::table('skills')
            ->get();
        $data['interest'] = DB::table('interest')
            ->get();
        $data['education'] = DB::table('education')
            ->get();
        $data['experience'] = DB::table('experience')
            ->get();
        $data['project'] = DB::table('projects')
            ->get();

          return view('Front.index', $data);
    }

    public function portfolio_details($id)
    {
         $result['data'] = DB::table('projects')
            ->where('id', $id)
            ->get();
        $result['image'] = DB::table('project_images')
            ->where('project_id', $id)
            ->get();
        return view('Front.portfolio_details', $result);
    }

    function test()
    {
        return view('front.index4');
    }
}
