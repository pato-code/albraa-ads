<?php
/**
 * Created by PhpStorm.
 * User: Pato Code
 * Date: 10/23/2018
 * Time: 11:08 PM
 */

namespace App\Http\Controllers;


use App\Model\Ad;

class GuestController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function index()
    {
        $all_add = Ad::all();
//        $all_add = $all_add->load('Admin');
//        dd($all_add);
        return view('welcome')->with(["ads" => $all_add]);
    }
}