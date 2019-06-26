<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gate;
use DataTables;
use App\User;

class ArchiveController extends Controller
{
    public function index(Request $request)
    {   
        //dont allow customer to access this page
        if(!Gate::allows('isAdmin')){
            abort(404,"Unauthorized Access");
        }

        if ($request->ajax()) {
            $data = User::latest()->where([
                ['status', 'Inactive'],
                ['role', 'Customer']
                ])->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-primary btn-sm retriveUser">Retrive</a>';
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('pages.archive', compact('data'));
    }

    //IF MAKING PATCH PUT IT HERE!!!!
    public function update(Request $request, $id)
    {
        User::find($id)->update(['status' => 'Active']);
     
        return response()->json(['success'=>'User deleted successfully.']);
    }
}
