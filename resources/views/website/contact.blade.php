@extends('layouts.website-layout')
@section('website-content')

<!-- Page Content -->
<div class="page-heading header-text">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Contact Us</h1>
                <span>feel free to send us a message now!</span>
            </div>
        </div>
    </div>
</div>

<div class="contact-information">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="contact-item">
                    <i class="fa fa-phone"></i>
                    <h4>Phone</h4>
                    <p>Vivamus ut tellus mi. Nulla nec cursus elit, id vulputate nec cursus augue.</p>
                    <a href="#">090-080-0760</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="contact-item">
                    <i class="fa fa-envelope"></i>
                    <h4>Email</h4>
                    <p>Vivamus ut tellus mi. Nulla nec cursus elit, id vulputate nec cursus augue.</p>
                    <a href="#">info@company.com</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="contact-item">
                    <i class="fa fa-map-marker"></i>
                    <h4>Location</h4>
                    <p>1020 New Mountain Street<br>Forest Park, FP 11220</p>
                    <a href="#">View on Google Maps</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="callback-form contact-us">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>Send us a <em>message</em></h2>
                    <span>Suspendisse a ante in neque iaculis lacinia</span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="contact-form">
                    <form id="contact" action="" method="get">
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
                                    <button type="submit" id="form-submit" class="filled-button">Send Message</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="map">
    <!-- How to change your own map point
	1. Go to Google Maps
	2. Click on your location point
	3. Click "Share" and choose "Embed map" tab
	4. Copy only URL and paste it within the src="" field below
-->
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1772.345052317549!2d90.3776969620306!3d23.754476852677143!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b98be1da18c1%3A0x8ce2a57f56c57aa2!2z4KaG4Ka54Ka44Ka-4KaoIOCmieCmsuCnjeCmsuCmvuCmuSDgpq3gpr_gprLgpr4!5e1!3m2!1sen!2sbd!4v1642976216804!5m2!1sen!2sbd"
        width="100%" height="500px" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>

@endsection

