<?php include('includes/header.php') ?>


    <!-- subheader begin -->
    <section id="subheader" data-speed="2" data-type="background">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h1>Contact Us</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- subheader close -->


    <div class="mapouter">

        <div class="gmap_canvas">
            <iframe width="1400" height="400" id="gmap_canvas"
                    src="https://maps.google.com/maps?q=Christ%20Palace%20Charismatic%20Church&t=&z=13&ie=UTF8&iwloc=&output=embed"
                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0">

            </iframe>
        </div>

        <style>
            .mapouter {
                position: relative;
                text-align: right;
                height: 400px;
                width: 1400px;
            }

            .gmap_canvas {
                overflow: hidden;
                background: none !important;
                height: 400px;
                width: 1400px;
            }
        </style>
    </div>

    <!-- content begin -->
    <div id="content">

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div id="contact-form-wrapper">
                        <div class="contact_form_holder">
                            <form id="contact" class="row" name="form1" method="post" action="#">


                                <input type="text" class="form-control" name="name" id="name" placeholder="Your name"/>

                                <div id="error_email" class="error">Please check your email</div>
                                <input type="text" class="form-control" name="email" id="email"
                                       placeholder="Your email"/>

                                <div id="error_message" class="error">Please check your message</div>
                                <textarea cols="10" rows="10" name="message" id="message" class="form-control"
                                          placeholder="Your message"></textarea>

                                <div id="mail_success" class="success">Thank you. Your message has been sent.</div>
                                <div id="mail_failed" class="error">Error, email not sent</div>

                                <p id="btnsubmit">
                                    <input type="submit" id="send" value="Send" class="btn btn-custom"/>
                                </p>


                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 text-center">
                    <div class="contact-info mt10">

                        <span class="title">Telephone:</span>
                        0221 800 900

                        <div class="divider-line"></div>

                        <span class="title">Church Time:</span>
                        Sunday 06:00 and 09:00<br>
                        Sunday school 08:00<br>
                        Sisters meeting: Wednesday 20:00<br>
                        Elders meeting: Friday 20:00<br>

                        <div class="divider-line"></div>

                        <span class="title">Address:</span>
                        12250 W Rose Butterfly Acres, Califoria 5580 USA

                    </div>


                </div>
            </div>
        </div>


    </div>


<?php include('includes/bottom.php'); ?>