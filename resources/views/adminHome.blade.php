@extends('layouts.template')
   
   @section('content')

      
        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row col-12" style="display: inline-block;" >
          <div class="tile_count">
            <div class="col-md-4 col-sm-6  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
              <div class="count">{{count($users)}}</div>
              
            </div>
            <div class="col-md-4 col-sm-6  tile_stats_count">
              <span class="count_top"><i class="fa fa-money"></i> Total users Expenses </span>
              <div class="count">
               
                {{\App\Transaction::all()->sum('debit')}} JOD</div>
              
            </div>
            <div class="col-md-4 col-sm-6  tile_stats_count">
            <span class="count_top"><i class="fa fa-money"></i> Total users Incomes </span>
              <div class="count green">{{\App\Transaction::all()->sum('credit')}} JOD</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
            
          </div>
        </div>
          <!-- /top tiles -->

          <div class="row">
            <div class="col-md-12 col-sm-12 ">
              <div class="dashboard_graph">

                <div class="row x_title">
                  <div class="col-md-6">
                    <h3>Total Incomes and Expenses <small>Graph </small></h3>
                  </div>
             
                </div>

                <div class="col-md-12 col-sm-12 ">
                  <div id="chart_plot_01" class="demo-placeholder"></div>
                </div>
             
                <div class="clearfix"></div>
              </div>
            </div>

          </div>
          <br />

          <div class="row">


          <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>All Registerd Users <small>Not An Admin</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                   

                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                          
                            <th class="column-title">ID</th>
                            <th class="column-title">Name</th>
                            <th class="column-title">E-mail </th>
                            <th class="column-title">Phone</th>
                            <th class="column-title">Birth Day </th>
                            <th class="column-title">Total expenses</th>
                            <th class="column-title">Total income</th>
                            <th class="column-title">Wallet balance</th>
                             <th class="column-title">ٌRegisterd Date</th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                            @foreach ($users as $user) 
                          <tr class="even pointer">
                           
                            <td class=" ">{{$user->id}}</td>
                            <td class=" ">{{$user->name}}</td>
                            <td class=" ">{{$user->email}}</td>
                            <td class=" ">{{$user->phone}}</td>
                            <td class=" ">{{$user->birth_date}}</td>
                            <td class="green ">{{$user->transaction->sum('credit')}} JOD</td>
                            <td class=" red">{{$user->transaction->sum('debit')}} JOD</td>
                            <td class=" ">{{$user->balance}} JOD</td>
                             <td class=" ">{{$user->created_at->format('Y-m-d')}}</td>
                            
                           
                           
                           
                          </tr>
                          
                          @endforeach
                        </tbody>
                      </table>
                    </div>
							
						
                  </div>
                </div>
              </div>

          </div>


        </div>
        <!-- /page content -->
        @endsection
