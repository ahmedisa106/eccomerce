<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\DataTables\AdminDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AdminDataTable $dataTable)
    {
        $title = 'admin.admin_Panel';
        return view('admin.admins.index', compact('title'));
    }

    public function dataTable()
    {


        $admins = Admin::where('name', '!=', admin()->user()->name)->get();
        return DataTables::of($admins)
            ->addColumn('name', function ($row) {

                return ucfirst($row->name);

            })
            ->addColumn('operations', function ($row) {

                $edit = '<a class="btn btn-primary btn-sm   " href="' . route('admins.edit', $row->id) . '"><i class="la la-pencil"></i></a>';

                $delete = '<form  style="display: inline-block" action="' . route('admins.destroy', $row->id) . '" method="POST">
                       ' . csrf_field() . method_field('DELETE') . '
                                 <button onclick="return confirm(\'Are You Sure !!\')" type="submit" class=" btn-sm btn btn-danger"><i class="la la-close"></i></button>

                            </form>';

                return $delete . ' ' . $edit;

            })
            ->rawColumns(['operations' => 'operations', 'edit' => 'edit', 'delete' => 'delete'])
            ->make(true);

    }//end function


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::find($id);
        $admin->delete();
    }
}
