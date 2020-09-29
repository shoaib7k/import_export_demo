<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Exports\csvExport;
use App\Imports\csvImport;
use Maatwebsite\Excel\Facades\Excel;
use Redirect,Response;



class CsvFile extends Controller
{
	public function index(){
		//$data=User::latest()->paginate(10);
		//return view('csv_file_pagination',compact('data'))->with('i',(request()->input('page',1)-1)*10);
        return view('csv_file');
	}
    public function csv_export()
    {
        //return view('csv_file');
        return Excel::download(new csvExport,'sample.csv');
    }
    public function csv_import(){
    	Excel::import(new csvImport,request()->file('file'));
    	return back();
    }
    public function edit($id){
        $where=array('id'=>$id);
        $user=User::where($where)->first();
        return Response::json($user);
    }
}
