<!DOCTYPE html>
<html lang="en">

@extends('layouts.dashboardHeader')

<script>
    var salesonly = JSON.parse({{$transactionsalesonly}});
    var failonly = JSON.parse({{$transactionfailonly}});
</script>

<body>
@section('content')
    <div class="row">
        <h1 class="page-header">Dashboard</h1>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-4 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-comments fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{$transactiontotal}}</div>
                            <div>All Transactions!</div>
                        </div>
                    </div>
                </div>
                <a href="/alltransaction">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-tasks fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge" id="sales">{{$transactionsalesonly}}</div>
                            <div>Approved Transactions!</div>
                        </div>
                    </div>
                </div>
                <a href="/salesonly">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-question-circle fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge" id="fail">{{$transactionfailonly}}</div>
                            <div>Fail Transactions!</div>
                        </div>
                    </div>
                </div>
                <a href="/failtransaction">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-8">
            <!-- /.panel -->
            <div class="col-lg-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Sales/Fail sales Ratio
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="flot-chart">
                            <div class="flot-chart-content" id="flot-pie-chart"></div>
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.panel -->

            <!-- /.panel-body -->
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-8 -->
        {{--<div class="col-lg-4">--}}
            {{--<div class="panel panel-default">--}}
                {{--<!-- /.panel-heading -->--}}
                {{--<!-- /.panel-body -->--}}
            {{--</div>--}}
            <!-- /.panel -->
            <!-- /.panel -->

            <!-- /.panel-heading -->

            <!-- /.panel-body -->
            <!-- /.panel-footer -->
        </div>
        <!-- /.panel .chat-panel -->
    </div>
    <!-- /.col-lg-4 -->
    </div>
    <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
    <!-- /#wrapper -->

</body>
@endsection
</html>
