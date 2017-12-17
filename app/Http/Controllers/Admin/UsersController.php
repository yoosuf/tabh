<?php


namespace App\Http\Controllers\Admin;


use App\Entities\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }


    public function index(Request $request)
    {
        $data = Admin::paginate(10);
        return view('admin.settings.users.index', get_defined_vars());
    }

    public function create(Request $request)
    {
        return view('admin.settings.users.create');

    }


    public function show($id, Request $request)
    {

    }


    public function store(Request $request)
    {

    }


    public function edit($id)
    {
        $item = Admin::findOrFail($id);
        return view('admin.settings.users.edit', get_defined_vars());
    }

    public function update($id, Request $request)
    {

    }

    public function destroy($id, Request $request)
    {

    }

}