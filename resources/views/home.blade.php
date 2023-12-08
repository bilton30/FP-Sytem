@extends('layouts.default')

@section('content')
    

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cashier</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Cashier</li>
              <li class="breadcrumb-item active">Total</li>

            </ol>
          </div>
    </section>

       <!-- Main content -->
       <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                      {{-- <h3 class="card-title">Report</h3> --}}
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body  table-responsive p-0">
                        <table class="table table-hover text-nowrap">

                        <thead>
                          <tr>
                          
                            <th>Description</th>
                            <th style="width: 150px">No Transactions</th>
                            <th style="width: 10px">Total</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                           
                            <td>{{ $item->description}} </td>
                            <td>
                                {{ $item->payment_count}}
                            </td>
                            <td><span class="badge bg-danger">  {{ number_format(floatval($item->payment_sum_total), 2, ",", ".")." MT"  }}</span></td>
                          </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->            
                </div>
            </div>
            <div class="col-md-3">
               
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title justify-content-center" >{{date('M/Y')}}</h3>
                    
                   
                  </div>
                  <div class="card-body  p-0">
                    <ul class="nav nav-pills flex-column">
                      <li class="nav-item active">
                        <a href="#" class="nav-link">
                       Pay.Whater
                          <span class="badge bg-primary float-right">{{ number_format(floatval($sumWaterPayments), 2, ",", ".")." MT"  }}</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                           Products
                           <span class="badge bg-primary  float-right">{{ number_format(floatval($sumProductPayments), 2, ",", ".")." MT"  }}</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                         Services
                         <span class="badge bg-primary  float-right">{{ number_format(floatval($sumServicePayments), 2, ",", ".")." MT"  }}</span>
                        </a>
                      </li>
                      {{-- <li class="nav-item">
                        <a href="#" class="nav-link">
                         Cashier Out
                          <span class="badge bg-warning float-right">65</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                           Cashier In
                           <span class="badge bg-warning float-right">65</span>
                        </a>
                      </li> --}}
                    </ul>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
                
              </div>
        </div>
    </div>
    </section>

@endsection

