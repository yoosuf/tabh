<?php


namespace App\Http\Controllers\Admin;


use App\Entities\User;
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
        $data = User::paginate(10);
        return view('admin.settings.users.index', compact('data'));
    }

    public function create(Request $request)
    {

    }


    public function show($id, Request $request)
    {

    }


    public function store(Request $request)
    {

    }


    public function edit($id)
    {
        $data = User::findOrFail($id);
        return view('admin.settings.users.edit', compact('data'));
    }

    public function update($id, Request $request)
    {

    }

    public function destroy($id, Request $request)
    {

    }

}