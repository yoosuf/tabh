<?php


namespace App\Http\Controllers\Admin;


use App\Entities\Partner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PartnersController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }


    public function index(Request $request)
    {
        $limit = $request->has('limit') ? $request->get('limit') : 10;
        $data = Partner::paginate($limit);
        return view('admin.settings.partners.index', compact('data'));
    }


    public function create(Request $request)
    {

        $countries  = [];
        return view('admin.settings.partners.create', compact('countries'));
    }


    public function show($id, Request $request)
    {

    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:partners|max:255',
        ]);

    }


    public function edit($id)
    {

    }

    public function update($id, Request $request)
    {

    }

    public function destroy($id, Request $request)
    {

    }

}