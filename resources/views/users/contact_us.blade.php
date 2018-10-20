@extends('users.layout.app')

@section('title', "HRBD Jobs | Contact Us")

@section('content')
<div id="nav_height"></div>
    <section>
        <div class="block no-padding  gray">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner2">
                            <div class="inner-title2">
                                <h3>Contact</h3>
                                <span>Keep up to date with the latest news</span>
                            </div>
                            <div class="page-breacrumbs">
                                <ul class="breadcrumbs">
                                    <li><a href="#" title="">Home</a></li>
                                    <li><a href="#" title="">Pages</a></li>
                                    <li><a href="#" title="">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="block">
            <div class="container">
                 <div class="row">
                    <div class="col-lg-6 column">
                        <div class="contact-form">
                            <h3>Keep In Touch</h3>
                            <form action="{{ route('contact.mail.send') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <span class="pf-title"></span>
                                        <div class="pf-field">
                                            <input type="text" placeholder="Full Name" name="name"/>
                                            <small class="from-text invalid-feedback text-danger">{{ $errors->first('name') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <span class="pf-title"></span>
                                        <div class="pf-field">
                                            <input type="text" placeholder="Email" name="email"/>
                                            <small class="from-text invalid-feedback text-danger">{{ $errors->first('email') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <span class="pf-title"></span>
                                        <div class="pf-field">
                                            <input type="text" placeholder="Subject" name="subject"/>
                                            <small class="from-text invalid-feedback text-danger">{{ $errors->first('subject') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <span class="pf-title"></span>
                                        <div class="pf-field">
                                            <textarea name="message" placeholder="Message"></textarea>
                                            <small class="from-text invalid-feedback text-danger">{{ $errors->first('message') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <button type="submit">Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 column">
                        <div class="contact-textinfo">
                            <h3>JobHunt Office</h3>
                            <ul>
                                <li><i class="la la-map-marker"></i><span>Jobify Inc. 555 Madison Avenue, Suite F-2 Manhattan, New York 10282 </span></li>
                                <li><i class="la la-phone"></i><span>Call Us : 0934 343 343</span></li>
                                <li><i class="la la-fax"></i><span>Fax : 0934 343 343</span></li>
                                <li><i class="la la-envelope-o"></i><span>Email : info@jobhunt.com</span></li>
                            </ul>
                            <a class="fill" href="#" title="">See on Map</a><a href="#" title="">Directions</a>
                        </div>
                    </div>
                 </div>
            </div>
        </div>
    </section>
@endsection
