<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Title</title>
    <link href="{{ asset("bootstrap/css/reset.css") }}" rel="stylesheet"/>
    <link href="{{ asset("bootstrap/css/bootstrap.min.css") }}" rel="stylesheet"/>
    <link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet"/>

    <link href="{{ asset("bootstrap/css/style2.css") }}" rel="stylesheet"/>
    <link rel="stylesheet" media="mediatype and|not|only (media feature)"
          href="{{ asset("bootstrap/css/style-media.css") }}">

    <script src="{{ "jquery/jquery.min.js" }}"></script>
    <script src="{{ "bootstrap/js/bootstrap.min.js" }}"></script>
    <script src="{{ "bootstrap/js/home.js" }}"></script>
    <script src="{{ "js/bootstrap-popover-x.js" }}"></script>

</head>
<body>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12 left-sidebar hidden_m">
                <div class="col-md-12 col-sm-12 col-xs-12 search">
                    <div class="col-md-12 col-sm-12 col-xs-12 search-box">
                        <div class="col-md-6 col-sm-6 col-xs-6 text-left label-search-box">
                            <label>条件検索</label>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6 text-right clear-search-box">
                            <button class="btn btn-default">クリア</button>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12 search-level">
                    <div class="col-md-12 col-sm-12 col-xs-12 header">
                        <div class="col-md-6 col-sm-6 col-xs-6 text-left label-search-box">
                            <label>タグ・重要度検索</label>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6 text-right clear-search-box">
                            <button class="btn btn-default">クリア</button>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 body">
                        <div class="level-item col-md-12 col-sm-12 col-xs-12">
                            <div class="item-label level-5">Level 5</div>
                            <div class="item-button col-md-12 col-sm-12 col-xs-12 item-button-level-5">
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <button>上場/廃止</button>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <button>上場/廃止</button>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <button>上場/廃止</button>
                                </div>

                            </div>
                        </div>

                        <div class="level-item col-md-12 col-sm-12 col-xs-12">
                            <div class="item-label level-4">Level 4</div>
                            <div class="item-button col-md-12 col-sm-12 col-xs-12 item-button-level-4">
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <button>上場/廃止</button>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <button>上場/廃止</button>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <button>上場/廃止</button>
                                </div>

                            </div>
                        </div>

                        <div class="level-item col-md-12 col-sm-12 col-xs-12">
                            <div class="item-label level-3">Level 3</div>
                            <div class="item-button col-md-12 col-sm-12 col-xs-12 item-button-level-3">
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <button>上場/廃止</button>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <button>上場/廃止</button>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <button>上場/廃止</button>
                                </div>

                            </div>
                        </div>

                        <div class="level-item col-md-12 col-sm-12 col-xs-12">
                            <div class="item-label level-2">Level 2</div>
                            <div class="item-button col-md-12 col-sm-12 col-xs-12 item-button-level-2">
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <button>上場/廃止</button>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <button>上場/廃止</button>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <button>上場/廃止</button>
                                </div>

                            </div>
                        </div>

                        <div class="level-item col-md-12 col-sm-12 col-xs-12">
                            <div class="item-label level-1">Level 1</div>
                            <div class="item-button col-md-12 col-sm-12 col-xs-12 item-button-level-1">
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <button>上場/廃止</button>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <button>上場/廃止</button>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <button>上場/廃止</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End Sidebar -->

            <div class="col-md-9 col-sm-9 col-xs-12 calendar">
                <div class="header">
                    <div class="pre-year">
                        <i class="glyphicon glyphicon-menu-left"></i>
                        <i class="glyphicon glyphicon-menu-left"></i>
                    </div>

                    <div class="pre-month">
                        <i class="fas fa-angle-left"></i>
                    </div>

                    <div class="current-date">
                        2018年 5日
                    </div>

                    <div class="next-month">
                        <i class="fas fa-angle-right"></i>
                    </div>

                    <div class="next-year">
                        <i class="glyphicon glyphicon-menu-right"></i>
                        <i class="glyphicon glyphicon-menu-right"></i>
                    </div>

                    <div hidden class="search-mobile">
                        <i class="fas fa-search"></i>
                        <i class="fas fa-caret-down"></i>
                        <i class="fas fa-caret-up"></i>
                    </div>
                </div>
                <div class="body">
                    <div class="col-md-12 col-sm-12 col-xs-12 event">
                        <div class="event-item" data-toggle="modal" data-target=".bs-example-modal-lg">
                            <p class="category"><span class="day">日30</span></p>
                        </div>
                        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                                    </div>
                                    <div class="modal-body">

                                        <div class="event-detail col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
                                            <div class="col-md-6 col-sm-6 col-xs-12 event-detail-top">
                                                <div class="col-md-4 col-sm-4 col-xs-4 coin-icon">
                                                    <img src="images/btc_icon.png">
                                                </div>
                                                <div class="col-md-8 col-sm-8 col-xs-8 coin-name">
                                                    Bitcoin (BTC)
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                    <button><i class="fas fa-cart-arrow-down"></i> Daidv</button>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                    <button><i class="fas fa-chart-line"></i> Daidv</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="event-item-day">
                                            <hr>
                                            <div class="event-cat col-md-2 col-sm-3 col-xs-4">
                                                daidv
                                            </div>
                                            <div class="content-event">
                                                <div class="col-md-1 col-sm-1 col-xs-4 coin-icon">
                                                    <img src="images/btc_icon.png">
                                                </div>
                                                <div class="col-md-2 col-sm-2 col-xs-8 coin-name">
                                                    <label>Bitcoin</label>
                                                    <label>(BTC)</label>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-8 coin-description">
                                                    <a href="#">dangvandai</a>
                                                </div>
                                                <div class="col-xs-12 mobile-clear"></div>
                                                <div class="col-md-2 col-sm-3 col-xs-6 cart">
                                                    <button><i class="fas fa-cart-arrow-down"></i> Daidv</button>
                                                </div>
                                                <div class="col-md-2 col-sm-3 col-xs-6 cart">
                                                    <button><i class="fas fa-chart-line"></i> Daidv</button>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="event-item-day">
                                            <hr>
                                            <div class="event-cat col-md-2 col-sm-3 col-xs-4">
                                                daidv
                                            </div>
                                            <div class="content-event">
                                                <div class="col-md-1 col-sm-1 col-xs-4 coin-icon">
                                                    <img src="images/btc_icon.png">
                                                </div>
                                                <div class="col-md-2 col-sm-2 col-xs-8 coin-name">
                                                    <label>Bitcoin</label>
                                                    <label>(BTC)</label>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-8 coin-description">
                                                    <a href="#">dangvandai</a>
                                                </div>
                                                <div class="col-xs-12 mobile-clear"></div>
                                                <div class="col-md-2 col-sm-3 col-xs-6 cart">
                                                    <button><i class="fas fa-cart-arrow-down"></i> Daidv</button>
                                                </div>
                                                <div class="col-md-2 col-sm-3 col-xs-6 cart">
                                                    <button><i class="fas fa-chart-line"></i> Daidv</button>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="event-item-day">
                                            <hr>
                                            <div class="event-cat col-md-2 col-sm-3 col-xs-4">
                                                daidv
                                            </div>
                                            <div class="content-event">
                                                <div class="col-md-1 col-sm-1 col-xs-4 coin-icon">
                                                    <img src="images/btc_icon.png">
                                                </div>
                                                <div class="col-md-2 col-sm-2 col-xs-8 coin-name">
                                                    <label>Bitcoin</label>
                                                    <label>(BTC)</label>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-8 coin-description">
                                                    <a href="#">dangvandai</a>
                                                </div>
                                                <div class="col-xs-12 mobile-clear"></div>
                                                <div class="col-md-2 col-sm-3 col-xs-6 cart">
                                                    <button><i class="fas fa-cart-arrow-down"></i> Daidv</button>
                                                </div>
                                                <div class="col-md-2 col-sm-3 col-xs-6 cart">
                                                    <button><i class="fas fa-chart-line"></i> Daidv</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <script>
//                            $(document).ready(function () {
//                                $('.content-event').on('click', function () {
//                                   $('.event-detail').show();
//                                });
//                                $(".bs-example-modal-lg").on("hidden.bs.modal", function () {
//                                    $('.event-detail').hide();
//
//                                });
//                            });
                        </script>
                        <div class="event-item">
                            <p class="category"><span class="day">1</span></p>
                        </div>
                        <div class="event-item">
                            <p class="category"><span class="day">1</span></p>
                        </div>
                        <div class="event-item">
                            <p class="category"><span class="day">1</span></p>
                        </div>
                        <div class="event-item">
                            <p class="category"><span class="day">1</span></p>
                        </div>
                        <div class="event-item">
                            <p class="category"><span class="day">1</span></p>
                        </div>
                        <div class="event-item">
                            <p class="category"><span class="day">1</span></p>
                        </div>
                        <div class="event-item">
                            <p class="category"><span class="day">1</span></p>
                        </div>
                        <div class="event-item">
                            <p class="category"><span class="day">1</span></p>
                        </div>
                        <div class="event-item">
                            <p class="category"><span class="day">1</span></p>
                        </div>
                        <div class="event-item">
                            <p class="category"><span class="day">1</span></p>
                        </div>
                        <div class="event-item">
                            <p class="category"><span class="day">1</span></p>
                        </div>
                        <div class="event-item">
                            <p class="category"><span class="day">1</span></p>
                        </div>
                        <div class="event-item">
                            <p class="category"><span class="day">1</span></p>
                        </div>
                        <div class="event-item">
                            <p class="category"><span class="day">1</span></p>
                        </div>
                        <div class="event-item">
                            <p class="category"><span class="day">1</span></p>
                        </div>
                        <div class="event-item">
                            <p class="category"><span class="day">1</span></p>
                        </div>
                        <div class="event-item">
                            <p class="category"><span class="day">1</span></p>
                        </div>
                        <div class="event-item">
                            <p class="category"><span class="day">1</span></p>
                        </div>
                        <div class="event-item">
                            <p class="category"><span class="day">1</span></p>
                        </div>
                        <div class="event-item">
                            <p class="category"><span class="day">1</span></p>
                        </div>
                        <div class="event-item">
                            <p class="category"><span class="day">1</span></p>
                        </div>
                        <div class="event-item">
                            <p class="category"><span class="day">1</span></p>
                        </div>
                        <div class="event-item">
                            <p class="category"><span class="day">1</span></p>
                        </div>
                        <div class="event-item">
                            <p class="category"><span class="day">1</span></p>
                        </div>
                        <div class="event-item">
                            <p class="category"><span class="day">1</span></p>
                        </div>
                        <div class="event-item">
                            <p class="category"><span class="day">1</span></p>
                        </div>
                        <div class="event-item">
                            <p class="category"><span class="day">1</span></p>
                        </div>
                        <div class="event-item">
                            <p class="category"><span class="day">1</span></p>
                        </div>
                        <div class="event-item">
                            <p class="category"><span class="day">1</span></p>
                        </div>
                        <div class="event-item">
                            <p class="category"><span class="day">1</span></p>
                        </div>
                        <div class="event-item">
                            <p class="category"><span class="day">1</span></p>
                        </div>
                        <div class="event-item">
                            <p class="category"><span class="day">1</span></p>
                        </div>
                        <div class="event-item">
                            <p class="category"><span class="day">1</span></p>
                        </div>
                        <div class="event-item">
                            <p class="category"><span class="day">1</span></p>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
</section>
</body>
</html>