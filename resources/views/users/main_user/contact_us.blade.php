@extends('users.layout_user.app')
@section('PageTitle')
@include('users.main_user.include.StartPageTitle')
@endsection
@section('content')
<section class="gray-bg">
    <div class="container">
        <div class="text-center mb-3 pb-3">
            <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;color:#ed8b34;">Contact</h6>
            <h1>Contact For Any Query</h1>
        </div>
        <div class="row">
            
            <div class="col-md-6 col-sm-6 wow fadeIn" data-wow-delay="0.1s">
                <iframe style="height:450px; width:100%;" class="position-relative rounded"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2330.6010977155224!2d106.67946192317459!3d10.766185034996045!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f1f188da645%3A0x3b002b177fbaa258!2zNjI5LzY2IE5ndXnhu4VuIMSQw6xuaCBDaGnhu4N1LCBQaMaw4budbmcgMiwgUXXhuq1uIDMsIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1680516100588!5m2!1svi!2s"
                    frameborder="0" style="min-height: 350px; border:0;" allowfullscreen="" aria-hidden="false"
                    tabindex="0"></iframe>   
            </div>
            
            <div class="col-md-6 col-sm-6">
                <div class="form-box">
                    <form class="c-form">
                    
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Email<sup class="cl-danger">*</sup></label>
                                <input type="email" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <label>Phone<sup class="cl-danger">*</sup></label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-12">
                                <label>Full Name<sup class="cl-danger">*</sup></label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-12">
                                <label>Message</label>
                                <textarea class="form-control height-150"></textarea>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-12">
                                <button type="button" class="btn theme-btn btn-arrow">Submit Request</button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</section>
@endsection