<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DatatableController extends Controller
{
    public function dataTableLogic(Request $request)
    {
        if ($request->ajax()) {
            return datatables()->of(User::select('*'))
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-bs-target="#create-modal" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="View"  class="me-1 btn btn-info btn-sm showProduct"><i class="fa-regular fa-eye"></i> View</a>';
                    $btn = $btn.'<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" onClick="editFunc({{ $id }})"  class="edit btn btn-primary btn-sm editProduct"><i class="fa-regular fa-pen-to-square"></i> Edit</a>';

                    $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct"><i class="fa-solid fa-trash"></i> Delete</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('blogs');
    }


    public function store(Request $request)
    {
        dd($request->all());
        
//        $user = new User();
//
//        $user->name = $request->input('name');
//        $user->email = $request->input('email');
//        $user->password = $request->input('password');
//        $user->save();
    }
}
