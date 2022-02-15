@extends('layouts.admin_master')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

                    <table class="table table-bordered ">
                        <thead>
                            <th>sl</th>
                            <th>name</th>
                            <th>email</th>
                            <th>action</th>
                        </thead>
                   
                    </table>

                </div>
            </div>

        </div>
    </div>
</div>



  <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
<!-- pageheader  -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Dashboard Review </h2>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">E-Commerce Dashboard Template</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- end pageheader  -->
<!-- ============================================================== -->
<div class="ecommerce-widget">

    <div class="row">
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">

                <div class="card-body">
                    <h5 class="text-muted">Total category</h5>

                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1">{{$category}}</h1>
                    </div>

                    <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                        <span><i class="fa fa-fw fa-arrow-up"></i></span><span>5.86%</span>
                    </div>
                </div>
                <div id="sparkline-revenue"></div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-muted">Total User</h5>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1">{{$users->count()}}</h1>
                    </div>
                    <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                        <span><i class="fa fa-fw fa-arrow-up"></i></span><span>5.86%</span>
                    </div>
                </div>
                <div id="sparkline-revenue2"></div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-muted">Refunds</h5>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1">0.00</h1>
                    </div>
                    <div class="metric-label d-inline-block float-right text-primary font-weight-bold">
                        <span>N/A</span>
                    </div>
                </div>
                <div id="sparkline-revenue3"></div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-muted">Avg. Revenue Per User</h5>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1">$28000</h1>
                    </div>
                    <div class="metric-label d-inline-block float-right text-secondary font-weight-bold">
                        <span>-2.00%</span>
                    </div>
                </div>
                <div id="sparkline-revenue4"></div>
            </div>

        </div>
    </div>






</div>
</div>
</div>
<!-- ============================================================== -->
<!-- footer -->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- end footer -->
<!-- ============================================================== -->
</div>

@endsection