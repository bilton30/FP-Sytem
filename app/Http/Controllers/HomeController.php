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
             
//         $user = Auth::user();
// // $user->assignRole('writer');
// //  $databaseName = 'seu_nome_de_banco1';
// //  Artisan::call('migrate', array('--path' => 'app/migrations', '--force' => true,'--database' => 'seu_nome_de_banco1'));
// //         // // Execute uma consulta SQL para criar o banco de dados
// //         // $resultado = DB::statement("CREATE DATABASE IF NOT EXISTS $databaseName");

// //         // if ($resultado) {
// //         //    Artisan::call('migrate', array('--path' => 'app/migrations', '--force' => true));
// //         //     return "Banco de dados criado com sucesso!";
// //         // } else {
// //         //     return "Falha ao criar o banco de dados.";
// //         // }
// // return ;
//     if($user->hasAnyRole(['Company','Admin'])){
//         if($user->hasRole('Company')){
//              return "  Company";
//         }
    
//     }else{
//       return redirect()->route('company.setup');
//     }
        $data=[];

        $data = [];
//     //     payment_type::withCount('payment')
//     //    ->withSum('payment', 'total')
//     //    ->get();
        $sumServicePayments = 0;
        $sumProductPayments = 0;
        $sumWaterPayments = 0;
        return Inertia::render('home',compact([ 'data','sumServicePayments','sumProductPayments','sumWaterPayments']));
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

