<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    function backup()
    {
        exec('mysqldump -uroot army > backup/'.Carbon::now()->toDateString().Carbon::now()->toTimeString().'_db_backup.sql');

        alert()->success('نسخة احتياطية','تم أخذ نسخة إحتياطية');
        return redirect()->back();
    }
}
