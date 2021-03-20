@extends('layouts.template')

@section('content')


<!-- page content -->
<div class="right_col" role="main">
    <!-- top tiles -->
    <div class="row" style="display: inline-block;">
        <div class="tile_count">
            <div class="  tile_stats_count">
                <span class="count_top"><i class="fa fa-money"></i> Total Balnce</span>
                <div class="count">{{sprintf("%.2f", Auth::User()->balance)}} <span>JOD</span></div>

            </div>
        </div>
    </div>
    <!-- /top tiles -->
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Add New transaction</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a class="dropdown-item" href="#">Settings 1</a>
                                </li>
                                <li><a class="dropdown-item" href="#">Settings 2</a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content row">

                    <img class="col-4 d-none d-md-block" src="../build/images/undraw_wallet_aym5.png">
                    <form id="demo-form2" method="POST" data-parsley-validate class="form-horizontal form-label-left col-8">
                        @csrf

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="Description">Description<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="Description" name="name" required="required" class="form-control ">
                            </div>
                        </div>


                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Category</label>
                            <div class="col-md-6 col-sm-6 d-lg-flex ">
                                <select name='category' class="select2_group form-control col-lg-10">
                                    <optgroup class="green" label="Income">

                                        @foreach (Auth::User()->category->where('type','Income') as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </optgroup>
                                    <optgroup class="red" label="Expenses">
                                        @foreach (Auth::User()->category->where('type','Expenses') as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </optgroup>

                                </select>
                                <div data-toggle="modal" data-target="#exampleModal" class="btn btn-info col-md-12 col-lg-2 col-sm-12">New..</div>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="amount">Amount <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="amount" id="amount" required="required" class="form-control @if (Session::has('errors')) is-invalid @endif">
                            </div>

                        </div>

                        @if (Session::has('errors'))
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Failed <span class="required">:</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">

                                <div class="form-control alert-danger">
                                    @foreach( Session::get('errors')->all() as $err)
                                    {{$err}}
                                    @endforeach
                                </div>
                            </div>
                           
                        </div>
                        @endif


                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">

                                <button class="btn btn-primary" type="reset">Reset</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>

                    </form>

                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="demo-form2" method="POST" data-parsley-validate class="form-horizontal form-label-left">
                                        @csrf
                                        @method('PUT')

                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="categoryname">Category Name<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" id="categoryname" name="name" required="required" class="form-control ">
                                            </div>
                                        </div>


                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align">Type</label>
                                            <div class="col-md-6 col-sm-6">
                                                <select name="category" class="select2_group form-control ">

                                                    <option value="Income">Income</option>
                                                    <option value="Expenses">Expenses</option>
                                                </select>

                                            </div>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">Save changes</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @if (count(Auth::User()->transaction))
    <div class="row">
        <div class="col-md-6 col-sm-6  ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Bar graph <small>Sessions</small></h2>
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
                    <canvas id="mybarChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6  ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Donut Graph <small>Sessions</small></h2>
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
                    <canvas id="canvasDoughnut"></canvas>
                </div>
            </div>
        </div>
    </div>

@endif

    <div class="row">


        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>All transaction </h2>
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
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">

                                <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Transaction ID</th>
                                            <th>Description</th>
                                            <th>Category</th>
                                            <th>Credit</th>
                                            <th>Debit</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        @foreach (Auth::User()->transaction as $transaction)
                                        <tr>
                                            <td>{{$transaction->id}}</td>
                                            <td>{{$transaction->name}}</td>
                                            <td>{{$transaction->category->name}}</td>
                                            <td class="green">{{$transaction->credit}} JOD</td>
                                            <td class="red">{{$transaction->debit}} JOD</td>
                                            <td>{{$transaction->created_at}}</td>
                                           
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

    </div>


</div>
<!-- /page content -->
@endsection