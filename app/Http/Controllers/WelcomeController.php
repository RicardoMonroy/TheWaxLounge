<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\BranchOffice;
use App\Category;
use App\Service;

class WelcomeController extends Controller
{
    public function welcome(){
        $brand = Brand::first();
        $one_services = Service::where('category', '1')->get();
        $two_services = Service::where('category', '2')->get();
        $three_services = Service::where('category', '3')->get();
        $branch_office = BranchOffice::first();

        return view('welcome')->with(compact('brand', 'one_services', 'two_services', 'three_services', 'branch_office'));
    }
}
