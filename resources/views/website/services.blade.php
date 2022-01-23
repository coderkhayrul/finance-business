@extends('layouts.website-layout')
@section('website-content')
<!-- Page Content -->
<div class="page-heading header-text">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Our Services</h1>
                <span>We are over 20 years of experience</span>
            </div>
        </div>
    </div>
</div>

<div class="single-services">
    <div class="container">
        <div class="row" id="tabs">
            <div class="col-md-4">
                <ul>
                    <li><a href='#tabs-1'>Market Analysis <i class="fa fa-angle-right"></i></a></li>
                    <li><a href='#tabs-2'>Financial Data <i class="fa fa-angle-right"></i></a></li>
                    <li><a href='#tabs-3'>Accounting Service <i class="fa fa-angle-right"></i></a></li>
                    <li><a href='#tabs-4'>Overall Evaluation <i class="fa fa-angle-right"></i></a></li>
                </ul>
            </div>
            <div class="col-md-8">
                <section class='tabs-content'>
                    <article id='tabs-1'>
                        <img src="{{ asset('website') }}/assets/images/single_service_01.jpg" alt="">
                        <h4>Market Analysis</h4>
                        <p>Vivamus sed feugiat elit. Pellentesque pretium, massa at placerat vehicula, neque turpis
                            pulvinar tortor, eget convallis lorem odio non tortor. Donec massa est, fermentum sit amet
                            felis ac, maximus luctus elit. Vivamus aliquet, dolor id imperdiet imperdiet, dui diam
                            aliquet dui, a euismod metus enim ac velit. Vivamus eu tristique odio, vel tristique quam.
                            <br><br>Proin eu molestie risus. Etiam suscipit pretium odio, at consectetur nisi. Sed ut
                            dolor in augue cursus ultrices. Vivamus mauris turpis, auctor vel facilisis in, tincidunt
                            vel diam. Sed vitae scelerisque orci. Nunc non magna orci. Aliquam commodo mauris ante.</p>
                    </article>
                    <article id='tabs-2'>
                        <img src="{{ asset('website') }}/assets/images/single_service_02.jpg" alt="">
                        <h4>Financial Data</h4>
                        <p>Sed ut dolor in augue cursus ultrices. Vivamus mauris turpis, auctor vel facilisis in,
                            tincidunt vel diam. Sed vitae scelerisque orci. Nunc non magna orci. Aliquam commodo mauris
                            ante, quis posuere nibh vestibulum sit amet
                            <br><br>Pellentesque pretium, massa at placerat vehicula, neque turpis pulvinar tortor, eget
                            convallis lorem odio non tortor. Donec massa est, fermentum sit amet felis ac, maximus
                            luctus elit. Vivamus aliquet, dolor id imperdiet imperdiet, dui diam aliquet dui, a euismod
                            metus enim ac velit. Vivamus eu tristique odio, vel tristique quam.</p>
                    </article>
                    <article id='tabs-3'>
                        <img src="{{ asset('website') }}/assets/images/single_service_03.jpg" alt="">
                        <h4>Accounting Service</h4>
                        <p>Mauris lobortis quam id dictum dignissim. Donec pellentesque erat dolor, cursus dapibus
                            turpis hendrerit quis. Suspendisse at suscipit arcu. Nulla sed erat lectus. Nulla facilisi.
                            In sit amet neque sapien. Donec scelerisque mi at gravida efficitur. Nunc lacinia a est eu
                            malesuada. Curabitur eleifend elit sapien, sed pulvinar orci luctus eget.
                            <br><br>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos
                            himenaeos. Nunc vel ultrices nulla, ac tincidunt eros. Aenean quis tellus velit. Praesent
                            pretium justo non auctor condimentum.</p>
                    </article>
                    <article id='tabs-4'>
                        <img src="{{ asset('website') }}/assets/images/single_service_04.jpg" alt="">
                        <h4>Overall Evaluation</h4>
                        <p>Integer vehicula sapien quis dolor efficitur, eget molestie eros tempus. Curabitur
                            sollicitudin, tortor at suscipit volutpat, nisi arcu aliquet dui, vitae semper sem turpis
                            quis libero. Quisque vulputate lacinia nisl ac lobortis. Ut ultricies maximus turpis, in
                            sollicitudin ligula posuere vel.
                            <br><br>Donec finibus maximus neque, vitae egestas quam imperdiet nec. Proin nec mauris eu
                            tortor consectetur tristique. Etiam suscipit ante a odio consequat, in ornare lacus
                            suscipit. Cras ac libero massa. Quisque rhoncus velit feugiat vulputate mollis. Donec nisl
                            eros, malesuada sed nisi id, condimentum condimentum quam.</p>
                    </article>
                </section>
            </div>
        </div>
    </div>
</div>

<div class="callback-form callback-services">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>Request a <em>call back</em></h2>
                    <span>interdum nisl ac urna tempor mollis</span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="contact-form">
                    <form id="contact" action="" method="post">
                        <div class="row">
                            <div class="col-lg-4 col-md-12 col-sm-12">
                                <fieldset>
                                    <input name="name" type="text" class="form-control" id="name"
                                        placeholder="Full Name" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-4 col-md-12 col-sm-12">
                                <fieldset>
                                    <input name="email" type="text" class="form-control" id="email"
                                        pattern="[^ @]*@[^ @]*" placeholder="E-Mail Address" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-4 col-md-12 col-sm-12">
                                <fieldset>
                                    <input name="subject" type="text" class="form-control" id="subject"
                                        placeholder="Subject" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <textarea name="message" rows="6" class="form-control" id="message"
                                        placeholder="Your Message" required=""></textarea>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <button type="submit" id="form-submit" class="border-button">Send Message</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
