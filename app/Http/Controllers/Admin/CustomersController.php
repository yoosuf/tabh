<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Order;
use App\Entities\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->middleware('admin');
        $this->user = $user;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
      $limit = $request->has('limit') ? $request->get('limit') : 10;
      $data = $this->user->with(['primaryAddress', 'orders'])->orderBy('id', 'desc')->paginate($limit);
      return view('admin.customers.index', get_defined_vars());
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request)
    {
      return view('admin.customers.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
      $this->customerValidateRequest($request);
      //create
      flash('Successfully created')->success();
      return redirect()->route('admin.customers.edit', ['id' => $user->id]);
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id, Request $request)
    {
        $data = $this->user->findOrFail($id);
        $orders = Order::get();
        return view('admin.customers.show', get_defined_vars());
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id, Request $request)
    {
      $item = $this->user->findOrFail($id);
      $addresses = $item->addresses;
      $address = $item->primaryAddress()->get();
      return view('admin.customers.edit', get_defined_vars());
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, Request $request)
    {
      $this->customerValidateRequest($request);
      // update
      flash('Successfully updated')->success();
      return redirect()->back();
    }

    private function customerValidateRequest($request)
    {
      return $request->validate([
        'customer_name' => 'required|string|max:255',
        'customer_email' => 'required|string|email|max:255|unique:users,email,'.$request->id,
        'customer_phone' => 'nullable|max:255|unique:users,phone,'.$request->id,
        'address_name' => 'nullable|string|max:255',
        'address_phone' => 'nullable',
        'address_line_1' => 'nullable|string|max:255',
        'address_line_2' => 'nullable|string|max:255',
        'address_city' => 'nullable|string|max:255',
        'address_postcode' => 'nullable|string|max:255',
        'address_country' => 'nullable|string|max:255',
        'address_province' => 'nullable|string|max:255',
      ], [
        'customer_name.required' => 'Name is required',
        'customer_email.required' => 'Email is required',
        'customer_email.email' => 'Email must be a valid email address.',
        'customer_phone.required' => 'Phone is required',
        'address_name.required' => 'Name is required',
        'address_phone.required' => 'Phone is required',
        'address_line1.required' => 'Line 1 is required',
        'address_line2.required' => 'Line 2 is required',
        'address_city.required' => 'City is required',
        'address_postcode.required' => 'Postcode is required',
        'address_province.required' => 'Province is required',
        'address_country.required' => 'Country is required',
      ]);
    }

    private function customerCreateOrUpdate()
    {

      $user  = $this->user->create([
        'name' => $request->get('customer_name'),
        'phone' =>$request->get('customer_phone'),
        'email' => $request->get('customer_email'),
      ]);

      $address = [
        'name' => $request->get('customer_name'),
        'phone' => $request->get('customer_name'),
        'address1' => $request->get('address_address_1'),
        'address2' => $request->get('address_address_2'),
        'city' => $request->get('address_city'),
        'province' => $request->get('address_province'),
        'postcode' => $request->get('address_postcode'),
        'country' => $request->get('address_country'),
        'default' => 1,
      ];
      $user->addresses()->create($address);
    }
}
