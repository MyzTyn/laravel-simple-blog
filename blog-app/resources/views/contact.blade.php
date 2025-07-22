@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
    <!-- Header - set the background image for the header in the line below-->
    <header class="py-5 bg-image-full"
        style="background-image: url('https://images.unsplash.com/photo-1682685797898-6d7587974771?q=80&w=2670&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div class="text-center my-5">
            <img class="img-fluid rounded-circle mb-4" src="https://dummyimage.com/150x150/6c757d/dee2e6.jpg" alt="..." />
            <h1 class="text-white fs-3 fw-bolder">Full Width Pics</h1>
            <p class="text-white-50 mb-0">Landing Page Template</p>
        </div>
    </header>
    <!-- Content section-->
    <section class="py-5">
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h2>Full Width Backgrounds</h2>
                    <p class="lead">A single, lightweight helper class allows you to add engaging, full width
                        background images to sections of your page.</p>
                    <p class="mb-0">The universe is almost 14 billion years old, and, wow! Life had no problem
                        starting here on Earth! I think it would be inexcusably egocentric of us to suggest that we're
                        alone in the universe.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Image element - set the background image for the header in the line below-->
    <div class="py-5 bg-image-full"
        style="background-image: url('https://dummyimage.com/1200x800/6c757d/dee2e6.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <!-- Put anything you want here! The spacer below with inline CSS is just for demo purposes!-->
        <div style="height: 20rem"></div>
    </div>
    <!-- Content section-->
    <section class="py-5">
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h2>Engaging Background Images</h2>
                    <p class="lead">The background images used in this template are sourced from Unsplash and are open
                        source and free to use.</p>
                    <p class="mb-0">I can't tell you how many people say they were turned off from science because of
                        a science teacher that completely sucked out all the inspiration and enthusiasm they had for the
                        course.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
