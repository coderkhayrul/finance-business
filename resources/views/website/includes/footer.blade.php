<!-- Footer Starts Here -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-3 footer-item">
                <h4>Finance Business</h4>
                <p>Vivamus tellus mi. Nulla ne cursus elit,vulputate. Sed ne cursus augue hasellus lacinia sapien
                    vitae.</p>
                <ul class="social-icons">
                    <li><a rel="nofollow" href="https://fb.com/templatemo" target="_blank"><i
                                class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-behance"></i></a></li>
                </ul>
            </div>
            <div class="col-md-3 footer-item">
                <h4>Useful Links</h4>
                <ul class="menu-list">
                    <li><a href="#">Vivamus ut tellus mi</a></li>
                    <li><a href="#">Nulla nec cursus elit</a></li>
                    <li><a href="#">Vulputate sed nec</a></li>
                    <li><a href="#">Cursus augue hasellus</a></li>
                    <li><a href="#">Lacinia ac sapien</a></li>
                </ul>
            </div>
            <div class="col-md-3 footer-item">
                <h4>Additional Pages</h4>
                <ul class="menu-list">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">How We Work</a></li>
                    <li><a href="#">Quick Support</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>
            <div class="col-md-3 footer-item last-item">
                <h4>Contact Us</h4>
                <div class="contact-form">
                    <form id="contact footer-contact" action="" method="post">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <fieldset>
                                    <input name="name" type="text" class="form-control" id="name"
                                        placeholder="Full Name" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <fieldset>
                                    <input name="email" type="text" class="form-control" id="email"
                                        pattern="[^ @]*@[^ @]*" placeholder="E-Mail Address" required="">
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
                                    <button type="submit" id="form-submit" class="filled-button">Send
                                        Message</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="sub-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p>Copyright &copy; 2020 Financial Business Co., Ltd.

                    - Design: <a rel="nofollow noopener" href="https://templatemo.com" target="_blank">TemplateMo</a>
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript -->
<script src="{{ asset('website') }}/vendor/jquery/jquery.min.js"></script>
<script src="{{ asset('website') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Additional Scripts -->
<script src="{{ asset('website') }}/assets/js/custom.js"></script>
<script src="{{ asset('website') }}/assets/js/owl.js"></script>
<script src="{{ asset('website') }}/assets/js/slick.js"></script>
<script src="{{ asset('website') }}/assets/js/accordions.js"></script>

<script language="text/Javascript">
    cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
    function clearField(t) { //declaring the array outside of the
        if (!cleared[t.id]) { // function makes it static and global
            cleared[t.id] = 1; // you could use true and false, but that's more typing
            t.value = ''; // with more chance of typos
            t.style.color = '#fff';
        }
    }

</script>

</body>

</html>
