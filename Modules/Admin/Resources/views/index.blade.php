 @extends('admin::layouts.master')

@section('content')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>

<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">Quản lí danh mục</h2>
        </div>
    </div>
</div>
        <div class="row m-t-25">
            <div class="col-sm-6 col-lg-3">
                <div class="overview-item overview-item--c1">
                    <div class="overview__inner">
                        <div class="overview-box clearfix">
                            <div class="icon">
                                <i class="zmdi zmdi-account-o"></i>
                            </div>
                            <div class="text">

                                @foreach($totalMember as $total)
                                <h2>{{$total['totalMember']}}</h2>
                                @endforeach
                                <span>Thành viên</span>
                            </div>
                        </div>
                        <div class="overview-chart">
                            <canvas id="widgetChart1"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="overview-item overview-item--c2">
                    <div class="overview__inner">
                        <div class="overview-box clearfix">
                            <div class="icon">
                                <i class="zmdi zmdi-shopping-cart"></i>
                            </div>
                            <div class="text">

                                @foreach($totalProduct as $total1)
                                    <h2>{{$total1['totalProduct']}}</h2>
                                @endforeach
                                <span>sản phẩm</span>
                            </div>
                        </div>
                        <div class="overview-chart">
                            <canvas id="widgetChart2"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="overview-item overview-item--c3">
                    <div class="overview__inner">
                        <div class="overview-box clearfix">
                            <div class="icon">
                                <i class="zmdi zmdi-calendar-note"></i>
                            </div>
                            <div class="text">
                                @foreach($totalArticle as $total)
                                    <h2>{{$total['totalArticle']}}</h2>
                                @endforeach
                                <span>Bài viết</span>
                            </div>
                        </div>
                        <div class="overview-chart">
                            <canvas id="widgetChart3"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="overview-item overview-item--c4">
                    <div class="overview__inner">
                        <div class="overview-box clearfix">
                            <div class="icon">
                                <i class="zmdi zmdi-money"></i>
                            </div>
                            <div class="text">
                                @foreach($totalRating as $total)
                                    <h2>{{$total['totalRating']}}</h2>
                                @endforeach
                                <span>Đánh giá</span>
                            </div>
                        </div>
                        <div class="overview-chart">
                            <canvas id="widgetChart4"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="au-card recent-report">
                    <div class="au-card-inner">
                        <h3 class="title-2">recent reports</h3>
                        <div class="chart-info">
                            <div class="chart-info__left">
                                <div class="chart-note">
                                    <span class="dot dot--blue"></span>
                                    <span>products</span>
                                </div>
                                <div class="chart-note mr-0">
                                    <span class="dot dot--green"></span>
                                    <span>services</span>
                                </div>
                            </div>
                            <div class="chart-info__right">
                                <div class="chart-statis">
                                    <span class="index incre">
                                        <i class="zmdi zmdi-long-arrow-up"></i>25%</span>
                                    <span class="label">products</span>
                                </div>
                                <div class="chart-statis mr-0">
                                    <span class="index decre">
                                        <i class="zmdi zmdi-long-arrow-down"></i>10%</span>
                                    <span class="label">services</span>
                                </div>
                            </div>
                        </div>
                        <div class="recent-report__chart">
                            <canvas id="recent-rep-chart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            {{--Biểu đồ doanh thu ngày, tháng--}}
            <div class="col-lg-6">
                <div class="au-card chart-percent-card">
                    <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-9">
                <h2 class="title-1 m-b-25">Đơn đặt hàng mới nhât</h2>
                <div class="table-responsive table--no-card m-b-40">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên khách hàng</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
                            <th>Ngày</th>



                        </tr>
                        </thead>

                        <tbody>
                        @foreach($transactionNews as $trans)
                            <tr>
                                <td>#{{ $trans->id }}</td>
                                <td>{{  isset($trans->tr_user_id) ? $trans->user->name : '[N\A]' }}</td>
                                <td>{{ $trans->tr_address }}</td>
                                <td>{{ $trans->tr_phone }}</td>
                                <td>{{ number_format($trans->tr_total,0,',','.') }} vnđ</td>
                                <td>
                                    @if($trans->tr_status == 1)
                                        <span  style="cursor: pointer" class="label {{$trans->getStatus($trans->tr_status)['class']}}
                                            ">{{$trans->getStatus($trans->tr_status)['name']}}</span>
                                    @else
                                        <a href="{{route('admin.get.action.transaction',[$trans->id])}}"
                                           class="label {{$trans->getStatus($trans->tr_status)['class']}}
                                               ">{{$trans->getStatus($trans->tr_status)['name']}}
                                        </a>
                                    @endif

                                </td>
                                <td>{{$trans->created_at}}</td>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-3">
                <h2 class="title-1 m-b-25">Đất nước</h2>
                <div class="au-card au-card--bg-blue au-card-top-countries m-b-40">
                    <div class="au-card-inner">
                        <div class="table-responsive">
                            <table class="table table-top-countries">
                                <tbody>
                                    <tr>
                                        <td>VIỆT NAM</td>
                                        <td class="text-right">$119,366.96</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-lg-12">
                <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                    <div class="au-card-title" >
                        <div class="bg-overlay bg-overlay--blue"></div>
                        <h3>
                            <i class="zmdi zmdi-comment-text"></i>Đánh giá mới nhất</h3>
                        <button class="au-btn-plus">
                            <i class="zmdi zmdi-plus"></i>
                        </button>
                    </div>
                    <div class="au-inbox-wrap js-inbox-wrap">
                        <div class="au-message js-list-load">
                            <div class="au-message__noti">
                                <p>Bạn có
                                    <span>2</span>

                                    đánh giá mới
                                </p>
                            </div>
                            <div class="au-message-list">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tên TV</th>
                                        <th>Sản phẩm</th>
                                        <th>Nội dung</th>
                                        <th>Rating</th>

                                    </tr>
                                    </thead>

                                    <tbody>

                                    @if(isset($ratings))
                                        <?php $stt = 1;?>
                                        @foreach($ratings as $rating)
                                            <tr>
                                                <td>{{ $stt++ }}</td>
                                                <td>
                                                    {{ isset($rating->user->name) ? $rating->user->name : '[N\A]' }}
                                                </td>
                                                <td>
                                                    <a href="">{{ isset($rating->product->pro_name) ? $rating->product->pro_name : '[N\A]' }}</a>
                                                </td>
                                                <td>
                                                    {{ $rating->ra_content }}
                                                </td>
                                                <td>
                                                    {{ $rating->ra_number }} *
                                                </td>
                                                <td></td>

                                            </tr>
                                        @endforeach
                                    @endif

                                    </tbody>
                                </table>

                            </div>
                            <div class="au-message__footer">
                                <button class="au-btn au-btn-load js-load-btn">load more</button>
                            </div>
                        </div>
                        <div class="au-chat">
                            <div class="au-chat__title">
                                <div class="au-chat-info">
                                    <div class="avatar-wrap online">
                                        <div class="avatar avatar--small">
                                            <img src="images/icon/avatar-02.jpg" alt="John Smith">
                                        </div>
                                    </div>
                                    <span class="nick">
                                        <a href="#">John Smith</a>
                                    </span>
                                </div>
                            </div>
                            <div class="au-chat__content">
                                <div class="recei-mess-wrap">
                                    <span class="mess-time">12 Min ago</span>
                                    <div class="recei-mess__inner">
                                        <div class="avatar avatar--tiny">
                                            <img src="images/icon/avatar-02.jpg" alt="John Smith">
                                        </div>
                                        <div class="recei-mess-list">
                                            <div class="recei-mess">Lorem ipsum dolor sit amet, consectetur adipiscing elit non iaculis</div>
                                            <div class="recei-mess">Donec tempor, sapien ac viverra</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="send-mess-wrap">
                                    <span class="mess-time">30 Sec ago</span>
                                    <div class="send-mess__inner">
                                        <div class="send-mess-list">
                                            <div class="send-mess">Lorem ipsum dolor sit amet, consectetur adipiscing elit non iaculis</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="au-chat-textfield">
                                <form class="au-form-icon">
                                    <input class="au-input au-input--full au-input--h65" type="text" placeholder="Type a message">
                                    <button class="au-input-icon">
                                        <i class="zmdi zmdi-camera"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="copyright">
                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        let data = "{{$viewMoney}}";
        var dataChart = JSON.parse(data.replace(/&quot;/g,'"'));

        console.log(dataChart);
        // Create the chart
        Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Biểu đồ doanh thu ngày và tháng'
            },

            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: 'Mức độ tăng trưởng'
                }

            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        numberFormat: {mode: 'currency',decimalPlaces: 0, thousandSep: 'tsep'   }
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:2f} vnđ</b>  <br/>'
            },

            series: [
                {
                    name: "Danh thu",
                    colorByPoint: true,
                    data :dataChart
                }
            ],
            drilldown: {
                series: [
                    {
                        name: "Chrome",
                        id: "Chrome",
                        data: [
                            [
                                "v65.0",
                                0.1
                            ],
                            [
                                "v64.0",
                                1.3
                            ],
                            [
                                "v63.0",
                                53.02
                            ],
                            [
                                "v62.0",
                                1.4
                            ],
                            [
                                "v61.0",
                                0.88
                            ],
                            [
                                "v60.0",
                                0.56
                            ],
                            [
                                "v59.0",
                                0.45
                            ],
                            [
                                "v58.0",
                                0.49
                            ],
                            [
                                "v57.0",
                                0.32
                            ],
                            [
                                "v56.0",
                                0.29
                            ],
                            [
                                "v55.0",
                                0.79
                            ],
                            [
                                "v54.0",
                                0.18
                            ],
                            [
                                "v51.0",
                                0.13
                            ],
                            [
                                "v49.0",
                                2.16
                            ],
                            [
                                "v48.0",
                                0.13
                            ],
                            [
                                "v47.0",
                                0.11
                            ],
                            [
                                "v43.0",
                                0.17
                            ],
                            [
                                "v29.0",
                                0.26
                            ]
                        ]
                    },
                    {
                        name: "Firefox",
                        id: "Firefox",
                        data: [
                            [
                                "v58.0",
                                1.02
                            ],
                            [
                                "v57.0",
                                7.36
                            ],
                            [
                                "v56.0",
                                0.35
                            ],
                            [
                                "v55.0",
                                0.11
                            ],
                            [
                                "v54.0",
                                0.1
                            ],
                            [
                                "v52.0",
                                0.95
                            ],
                            [
                                "v51.0",
                                0.15
                            ],
                            [
                                "v50.0",
                                0.1
                            ],
                            [
                                "v48.0",
                                0.31
                            ],
                            [
                                "v47.0",
                                0.12
                            ]
                        ]
                    },

                ]
            }
        });
    </script>

@stop
