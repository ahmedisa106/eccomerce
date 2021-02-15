<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\request()->has('level')) {
            $level = \request('level');
        } else {
            $level = '';
        }


        $title = 'admin.admin_Panel';
        return view('admin.users.index', compact('title', 'level'));
    }


    public function dataTable()
    {


        if (\request()->has('level') && \request('level') != '') {
            $users = User::where('level', \request('level'))->get();
        } else {

            $users = User::get();
        }


        return DataTables::of($users)
            ->addColumn('checkbox', function ($row) {

                return '<input type="checkbox" name="item[]" class="item_checkbox" id="item_checkbox" value="' . $row->id . '">';
            })
            ->addColumn('name', function ($row) {

                return ucfirst($row->name);

            })
            ->addColumn('email', function ($row) {
                return $row->email;

            })
            ->addColumn('level', function ($row) {
                $class = '';
                if ($row->level == 'user') {
                    $class = 'btn-info';
                } elseif ($row->level == 'vendor') {
                    $class = 'btn-primary';
                } else {
                    $class = 'btn-dark';
                }
                return '<span class="btn ' . $class . '">' . trans('admin.' . $row->level) . '</span>';

            })
            ->addColumn('operations', function ($row) {
                $hidden_class = '';

                $edit = '<a   class="btn btn-primary btn-sm "  href="' . route('users.edit', $row->id) . '"><i class="la la-pencil"></i></a>';

                $delete = '<form   style="display: inline-block" action="' . route('users.destroy', $row->id) . '" method="POST">
                       ' . csrf_field() . method_field('DELETE') . '
                                 <button onclick="return confirm(\'Are You Sure !!\')" type="submit" class="  btn-sm btn btn-danger"><i class="la la-close"></i></button>

                            </form>';

                return $delete . ' ' . $edit;

            })
            ->rawColumns(['operations' => 'operations', 'edit' => 'edit', 'delete' => 'delete', 'checkbox' => 'checkbox', 'level' => 'level'])
            ->make(true);

    }//end function


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $title = 'admin.users_addNew';
        return view('admin.users.create', compact('title'));
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
            'email' => 'required|unique:users',
            'password' => 'required|min:5|confirmed',
            'level' => 'required|in:user,company,vendor',

        ], [
            'name.min' => trans('admin.name_min'),
            'name.required' => trans('admin.name_required'),
            'email.required' => trans('admin.email_required'),
            'email.unique' => trans('admin.email_unique'),
            'password.min' => trans('admin.password_min'),
            'password' => trans('admin.password_required'),
            'password.confirmed' => trans('admin.password_confirmed'),
            'level.required' => trans('admin.level_required')
        ]);
        $data['password'] = bcrypt(request('password'));
        User::create($data);
        session()->flash('success', trans('admin.data_stored'));
        return redirect(aurl('users'));
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
        $user = User::find($id);
        $title = 'admin.edit';
        return view('admin.users.edit', compact('user', 'title'));
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
        $user = User::find($id);

        $data = $this->validate(request(), [
            'name' => 'required|min:5',
            'email' => 'required|unique:users,email,' . $user->id,
            'password' => 'sometimes|nullable|min:5',
            'level' => 'required',

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
        $user->update($data);
        session()->flash('success', trans('admin.data_updated'));
        return redirect(aurl('users'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        session()->flash('success', trans('admin.data_deleted'));
        return redirect(aurl('users'));

    }

    public function multi_delete()
    {

        if (is_array(\request('item'))) {

            User::destroy(\request('item'));

        } else {
            $user = User::find(\request('item'));

            $user->delete();


        }
        session()->flash('success', trans('admin.data_deleted'));

        return redirect(aurl('users'));

    }//end function

}
