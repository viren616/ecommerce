<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
 use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\AssignOp\ShiftLeft;
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function manage_contact(Request  $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ];
        DB::table('contact')->insert($data);
        return $status='OK';
    }

}
