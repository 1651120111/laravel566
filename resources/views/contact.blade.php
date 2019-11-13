@extends('layouts.app')
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-inner">
                        <ul>
                            <li class="home">
                                <a href="index.html">Home</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>Contact-us</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->
    <!-- contact-details start -->
    <div class="main-contact-area">
        <div class="container">
            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="contact-us-area">
                        <!-- google-map-area start -->
                        <div class="google-map-area">
                            <!--  Map Section -->
                            <div id="contacts" class="map-area">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.239363421869!2d106.64759151444999!3d10.792970461840254!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175294adf5418db%3A0xb51d20822b6f0d7a!2zcDEyLCAxMTQgTsSDbSBDaMOidSwgUGjGsOG7nW5nIDEyLCBUw6JuIELDrG5oLCBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1570624036676!5m2!1svi!2s" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                            </div>

                        </div>
                        <!-- google-map-area end -->
                        <!-- contact us form start -->
                        <div class="contact-us-form">
                            <div class="sec-heading-area">
                                <h2>Mời bạn điền thông tin liên hệ</h2>
                            </div>
                            <div class="contact-form">
                                <span class="legend">Contact Information</span>
                                <form action="" method="post">
                                    @csrf
                                    <div class="form-top">
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                            <label>Họ tên<sup>*</sup></label>
                                            <input type="text" class="form-control" name="c_name" required>
                                        </div>

                                        <div class="form-group col-sm-6 col-md-6 col-lg-5">
                                            <label>Email <sup>*</sup></label>
                                            <input type="email" class="form-control" name="c_email" required>
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6 col-lg-5">
                                            <label>Tiêu đề <sup>*</sup></label>
                                            <input type="text" class="form-control" name="c_title" required>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-10">
                                            <label>Nội dung <sup>*</sup></label>
                                            <textarea class="yourmessage" name="c_content" required></textarea>
                                        </div>
                                    </div>
                                    <div class="submit-form form-group col-sm-12 submit-review">
                                        <p><sup>*</sup> Required Fields</p>
                                        <button type="submit" class="add-tag-btn">Gửi thông tin</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- contact us form end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
