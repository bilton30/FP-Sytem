<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\payment_type;
use App\Models\payment;
use Inertia\Inertia;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $data = payment_type::withCount('payment')
       ->withSum('payment', 'total')
       ->get();
        $sumServicePayments = payment::whereNotNull('payment_service_uid')->sum('total');
        $sumProductPayments = payment::whereNotNull('payment_product_uid')->sum('total');
        $sumWaterPayments = payment::whereNotNull('payment_water_uid')->sum('total');
        return Inertia::render('home',compact([ 'data','sumServicePayments','sumProductPayments','sumWaterPayments']));
    }

    public function cashier()
    {
        //    $data = payment::withCount('payment_type')->get();
        $data = payment_type::withCount('payment')
       ->withSum('payment', 'total')
       ->get();
        $sumServicePayments = payment::whereNotNull('payment_service_uid')->sum('total');
        $sumProductPayments = payment::whereNotNull('payment_product_uid')->sum('total');
        $sumWaterPayments = payment::whereNotNull('payment_water_uid')->sum('total');
         
        
        // payment_type
        // return view('home');
        return view('site.report.cashier',compact([ 'data','sumServicePayments','sumProductPayments','sumWaterPayments']));
    }
    public function api(){
        return address_province::with("districts.neighborhoods")->get();
    }

    public function transactions(){
        $data = payment::has('payment_type')->has('customers')->get();
         $sumServicePayments = payment::whereNotNull('payment_service_uid')->sum('total');
         $sumProductPayments = payment::whereNotNull('payment_product_uid')->sum('total');
         $sumWaterPayments = payment::whereNotNull('payment_water_uid')->sum('total');
          
         // payment_type
         // return view('home');
         return view('site.report.transactions',compact([ 'data','sumServicePayments','sumProductPayments','sumWaterPayments']));
    }
}

