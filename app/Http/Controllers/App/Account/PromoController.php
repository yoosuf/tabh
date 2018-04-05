<?php
/**
 * Created by PhpStorm.
 * User: yoosuf
 * Date: 4/2/18
 * Time: 11:39 PM
 */

namespace App\Http\Controllers\App\Account;


use App\Entities\Invite;
use App\Http\Controllers\Controller;

class PromoController extends Controller
{
    protected $invite;

    public function __construct(Invite $invite)
    {
        $this->invite = $invite;

    }


    public function index()
    {
        return view('app.account.promo_codes.index');
    }

}