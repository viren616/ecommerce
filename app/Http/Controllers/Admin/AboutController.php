<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
 use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\AssignOp\ShiftLeft;
class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['about'] = DB::table('about')
        ->get();
        $result['skills'] = DB::table('skills')
        ->get();
        $result['interests'] = DB::table('interest')
        ->get();

         return view('admin.manage_about' ,$result);
    }


    public function skills_delete($id )
    {
        DB::delete('delete from skills where id = ?  ', [$id]);
        return redirect('admin/about');
    }

    public function interest_delete($id )
    {
        DB::delete('delete from interest where id = ?  ', [$id]);
        return redirect('admin/about');
    }


    function manage_about_process(Request $request)
    {
         // $website='https://'.$request->website;
         $data = [
            'field_name' => $request->field_name,
            'short_desc' => $request->short_desc,
            'birthday' => $request->birthday,
            'age' => $request->age,
            'degree' => $request->degree,
            'website' => $request->website,
            'phone' => $request->phone,
            'email' => $request->email,
            'city' => $request->city,
            'freelance' => $request->freelance,
            'description' => $request->long_description,
            'happy_client' => $request->happy_clients,
            'projects' => $request->projects,
            'support' => $request->support_hour,
            'awards' => $request->awards,
        ];

        DB::table('about')->update($data);
        $arrskill_id = $request->skill_id;
        $skill_arr = $request->skill;
        $per_arr = $request->per;
          foreach ($skill_arr as $key => $value) {
             $skill_Arr['user_id'] =53;
               $skill_Arr['skill'] = $value;
               $skill_Arr['percent'] = $per_arr[$key];
              if ($arrskill_id[$key] != '') {
                  DB::table('skills')->where(['id' => $arrskill_id[$key]])->update($skill_Arr);
            } else {
                  DB::table('skills')->insert($skill_Arr);
            }
        }

        $arrinterest_id = $request->interest_id;
        $interest_arr = $request->interest;
          foreach ($interest_arr as $key => $value) {
             $interest_Arr['user_id'] =53;
               $interest_Arr['interest'] = $value;
             if ($arrinterest_id[$key] != '') {
                 DB::table('interest')->where(['id' => $arrinterest_id[$key]])->update($interest_Arr);
            } else {
                  DB::table('interest')->insert($interest_Arr);
            }
        }
         return redirect('admin/about');
    }
}
