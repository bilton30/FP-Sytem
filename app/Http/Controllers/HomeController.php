<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\payment_type;
use App\Models\payment;
use Inertia\Inertia;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\PermissionGeneratorController;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
        public function __construct()
    {
        $this->middleware(['auth','verified']);
   
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     
    public function index(){
             
        $user = Auth::user();
        if($user->hasAnyRole(['Company','landlord'])){
            if($user->hasRole('Company')){
                  $data = [];

        $sumServicePayments = 0;
        $sumProductPayments = 0;
        $sumWaterPayments = 0;
        return Inertia::render('home',compact([ 'data','sumServicePayments','sumProductPayments','sumWaterPayments']));
            }else {
                      $data = [];

        $sumServicePayments = 0;
        $sumProductPayments = 0;
        $sumWaterPayments = 0;
        return Inertia::render('home',compact([ 'data','sumServicePayments','sumProductPayments','sumWaterPayments']));
            }       
    }else{
      
        return redirect()->route('setup.wizard');
      }

    }

    public function cashier()
    {
        //    $data = payment::withCount('payment_type')->get();
        $data = [];
        $sumServicePayments = 0;
        $sumProductPayments = 0;
        $sumWaterPayments = 0;         
        
        // payment_type
        // return view('home');
        return view('site.report.cashier',compact([ 'data','sumServicePayments','sumProductPayments','sumWaterPayments']));
    }
    public function api(){
        return [];
    }

    public function transactions(){
        $data = [];
         $sumServicePayments = 0;
         $sumProductPayments = 0;
         $sumWaterPayments = 0  ;        
         // payment_type
         // return view('home');
         return view('site.report.transactions',compact([ 'data','sumServicePayments','sumProductPayments','sumWaterPayments']));
    }
}

