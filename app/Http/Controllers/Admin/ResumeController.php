<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['resume'] = DB::table('resume')
            ->get();
        $result['education'] = DB::table('education')
            ->get();
        $result['experience'] = DB::table('experience')
            ->get();
        // foreach ($result['experience'] as $key => $value) {
        // $result['experience_role_desc'][$value->id] = DB::table('role_desc')
        // ->where('experience_id', $value->id)
        // ->limit(8)/
        // ->get();
        // }
        return view('admin.manage_resume', $result);
    }


    public function experience_delete($id )
    {
        DB::delete('delete from experience where id = ?  ', [$id]);
        return redirect('admin/resume');
    }

    public function education_delete($id )
    {
        DB::delete('delete from education where id = ?  ', [$id]);
        return redirect('admin/resume');
    }
   

    function manage_resume_process(Request $request)
    {

        // summary==============================================
        $data = [
            'current_address' => $request->current_address,
            'current_city' => $request->current_city,
            'current_state' => $request->current_state,
            'summary_desc' => $request->summary_description,
        ];
        DB::table('resume')->update($data);

        // experience=============================================
         $experience_id_arr = $request->experience_id;
        $field_name_arr = $request->field_name;
        $from_arr = $request->from;
        $company_name_arr = $request->company_name;
        $to_arr = $request->to;
        $ecity_arr = $request->ecity;
        $estate_arr = $request->estate;
        $description_arr = $request->experience_editor;
        foreach ($experience_id_arr as $key => $value) {

            $experience_arr['field_name'] = $field_name_arr[$key];
            $experience_arr['experience_from'] = $from_arr[$key];
            $experience_arr['experience_to'] = $to_arr[$key];
            $experience_arr['company_name'] = $company_name_arr[$key];
            $experience_arr['company_city'] = $ecity_arr[$key];
            $experience_arr['company_state'] = $estate_arr[$key];
            $experience_arr['role_description'] = $description_arr[$key];
            if ($experience_id_arr[$key] != '') {
                DB::table('experience')->where(['id' => $experience_id_arr[$key]])->update($experience_arr);
            } else {
                DB::table('experience')->insert($experience_arr);
            }

            //
        }
        // return $role_desc_arr;

        // education============================================
        $education_id_arr = $request->education_id;
        $course_name_Arr = $request->course_name;
        $college_from_Arr = $request->college_from;
        $college_to_Arr = $request->college_to;
        $college_name_Arr = $request->college_name;
        $college_city_Arr = $request->college_city;
        $college_state_Arr = $request->college_state;
        $edudescription_Arr = $request->editor;
        foreach ($course_name_Arr as $key => $value) {
            $course_name_arr['course_name'] = $value;
            $course_name_arr['college_from'] = $college_from_Arr[$key];
            $course_name_arr['college_to'] = $college_to_Arr[$key];
            $course_name_arr['college_name'] = $college_name_Arr[$key];
            $course_name_arr['college_city'] = $college_city_Arr[$key];
            $course_name_arr['college_state'] = $college_state_Arr[$key];
            $course_name_arr['description'] = $edudescription_Arr[$key];
            if ($education_id_arr[$key] != '') {
                DB::table('education')->where(['id' => $education_id_arr[$key]])->update($course_name_arr);
            } else {
                DB::table('education')->insert($course_name_arr);
            }
        }
        return redirect('admin/resume');
    }
}
