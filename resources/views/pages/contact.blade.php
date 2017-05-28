@extends('main')
@section('title', '| Contact us')

@section('content')
   <!--  <div class="container">
        <div class="row">
            <div class="col-md-12">
            <h1>Contact us</h1>
            <hr>
            <form action="{{ url('contact') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                    <label name="email">Email</label>
                    <input id="email" name="email" class="form-control">
                    </div>

                    <div class="form-group">
                    <label name="subject">Subject</label>
                    <input id="subject" name="subject" class="form-control">
                    </div>

                    <div class="form-group">
                    <label name="message">Message</label>
                    <textarea id="message" name="message" class="form-control">Type your message...</textarea>
                    </div>
                    <input type="submit" value="Send Message" class="btn btn-success">
            </form>
                
            </div>
        </div>
     </div>
 -->


<!--Section: Contact v.2-->
<section class="section" style="margin-top: 65px;">

    <!--Section heading-->
    <h1 class="section-heading text-center">Contact us</h1>
    <!--Section sescription-->
    <p class="section-description mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, error amet numquam iure provident voluptate esse quasi, veritatis totam voluptas nostrum quisquam eum porro a pariatur accusamus veniam. Quia, minima?</p>

    <div class="row">

        <!--First column-->
        <div class="col-md-8">
            <form>
                <!--First row-->
                <div class="row">
                    <!--First column-->
                    <div class="col-md-6">
                        <div class="md-form">
                            <div class="md-form">
                                <input type="text" id="form41" class="form-control">
                                <label for="form41" class="">Your name</label>
                            </div>
                        </div>
                    </div>

                    <!--Second column-->
                    <div class="col-md-6">
                        <div class="md-form">
                            <div class="md-form">
                                <input type="text" id="form52" class="form-control">
                                <label for="form52" class="">Your email</label>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/.First row-->

                <!--Second row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="md-form">
                            <input type="text" id="form51" class="form-control">
                            <label for="form51" class="">Subject</label>
                        </div>
                    </div>
                </div>
                <!--/Second row-->

                <!--Third row-->
                <div class="row">
                    <!--First column-->
                    <div class="col-md-12">

                        <div class="md-form">
                            <textarea type="text" id="form76" class="md-textarea"></textarea>
                            <label for="form76">Your message</label>
                        </div>

                    </div>
                </div>
                <!--/.Third row-->
            </form>

            <div class="center-on-small-only">
               <button class="btn btn-default" type="button">Send</button>
            </div>
        </div>
        <!--.First column-->

        <!--Second column-->
        <div class="col-md-4">
            <ul class="contact-icons">
                <li><i class="fa fa-map-marker fa-2x"></i>
                    <p>New York, NY 10012, USA</p>
                </li>

                <li><i class="fa fa-phone fa-2x"></i>
                    <p>+ 01 234 567 89</p>
                </li>

                <li><i class="fa fa-envelope fa-2x"></i>
                    <p>contact@openaug.com</p>
                </li>
            </ul>
        </div>
        <!--.Second column-->

    </div>
</section>
<!--/Section: Contact v.2-->


 

@endsection