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


        $admins = Admin::get();
        return DataTables::of($admins)
            ->addColumn('checkbox', function ($row) {

                return '<input type="checkbox" name="item[]" class="item_checkbox" id="item_checkbox" value="' . $row->id . '">';
            })
            ->addColumn('name', function ($row) {

                return ucfirst($row->name);

            })
            ->addColumn('email', function ($row) {
                return $row->email;

            })
            ->addColumn('operations', function ($row) {
                $hidden_class = '';
                if ($row->name == 'Admin') {

                    $hidden_class = 'hidden';
                }
                $edit = '<a   class="btn btn-primary btn-sm ' . $hidden_class . ' "  href="' . route('admins.edit', $row->id) . '"><i class="la la-pencil"></i></a>';

                $delete = '<form  ' . $hidden_class . ' style="display: inline-block" action="' . route('admins.destroy', $row->id) . '" method="POST">
                       ' . csrf_field() . method_field('DELETE') . '
                                 <button onclick="return confirm(\'Are You Sure !!\')" type="submit" class="  btn-sm btn btn-danger"><i class="la la-close"></i></button>

                            </form>';

                return $delete . ' ' . $edit;

            })
            ->rawColumns(['operations' => 'operations', 'edit' => 'edit', 'delete' => 'delete', 'checkbox' => 'checkbox'])
            ->make(true);

    }//end function


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $title = 'admin.AddNew';
        return view('admin.admins.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $data = $this->validate(request(), [
            'name' => 'required|min:5',
            'email' => 'required|unique:admins',
            'password' => 'required|min:5|confirmed'

        ], [
            'name.min' => trans('admin.name_min'),
            'name.required' => trans('admin.name_required'),
            'email.required' => trans('admin.email_required'),
            'email.unique' => trans('admin.email_unique'),
            'password.min' => trans('admin.password_min'),
            'password' => trans('admin.password_required'),
            'password.confirmed' => trans('admin.password_confirmed'),
        ]);
        $data['password'] = bcrypt(request('password'));
        Admin::create($data);
        session()->flash('success', trans('admin.data_stored'));
        return redirect(aurl('admins'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::find($id);
        $title = 'admin.edit';
        return view('admin.admins.edit', compact('admin', 'title'));
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
        $admin = Admin::find($id);

        $data = $this->validate(request(), [
            'name' => 'required|min:5',
            'email' => 'required|unique:admins,email,' . $admin->id,
            'password' => 'sometimes|nullable|min:5'

        ], [
            'name.min' => trans('admin.name_min'),
            'name.required' => trans('admin.name_required'),
            'email.required' => trans('admin.email_required'),
            'email.unique' => trans('admin.email_unique'),
            'password.min' => trans('admin.password_min'),

        ]);

        if ($request->has('password')) {
            $data['password'] = bcrypt(request('password'));


        }
        $admin->update($data);
        session()->flash('success', trans('admin.data_updated'));
        return redirect(aurl('admins'));
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

        if ($admin->name === 'Admin') {
            session()->flash('danger', trans('admin.admin_cant_deleted'));
            return redirect(aurl('admins'));

        }
        $admin->delete();
        session()->flash('success', trans('admin.data_deleted'));
        return redirect(aurl('admins'));

    }

    public function multi_delete()
    {

        if (is_array(\request('item'))) {

            $admins = Admin::find(\request('item'))->pluck('id')->toArray();
            if (in_array(\admin()->user()->id, $admins)) {

                session()->flash('danger', trans('admin.admin_cant_deleted'));
                return redirect()->back();
            }
            Admin::destroy(\request('item'));

        } else {
            $admin = Admin::find(\request('item'));
            if (!$admin->name == 'admin') {
                $admin->delete();
            }
            session()->flash('danger', trans('admin.admin_cant_deleted'));
        }
        session()->flash('success', trans('admin.data_deleted'));

        return redirect(aurl('admins'));

    }//end function

}
