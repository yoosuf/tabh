<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    protected $user;

    public function __construct(Admin $user)
    {
        $this->middleware('admin');
        $this->user = $user;
    }

    public function index(Request $request)
    {
        $limit = $request->has('limit') ? $request->get('limit') : 10;

        $data = $this->user->orderBy('id', 'desc')->paginate($limit);
        return view('admin.settings.users.index', get_defined_vars());
    }

    public function create(Request $request)
    {
        return view('admin.settings.users.create');

    }

    public function store(Request $request)
    {
        flash('Successfully updated')->success();
        return redirect()->back();
    }

    public function edit($id)
    {
        $item = Admin::findOrFail($id);
        return view('admin.settings.users.edit', get_defined_vars());
    }

    public function update($id, Request $request)
    {
        return redirect()->back()->with('status', 'Successfully updated');

    }


}
