@extends('template')

@section('content')
    <!-- Masthead-->
    <header class="masthead">
        <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
            <div class="d-flex justify-content-center">
                <div class="text-center">
                    <h1 class="mx-auto my-0 text-uppercase">Toiro</h1>
                    <h2 class="text-white-50 mx-auto mt-2 mb-5">To Do List of Tomorrow</h2>

                    <a class="btn btn-primary" href="#todo">Get Started</a>

                </div>
            </div>
        </div>
    </header>

    <!-- Todo -->
    <section class="signup-section" id="todo">
        <div class="container px-4 px-lg-5">

            <div class="row gx-4 gx-lg-5">

                <div class="col-md-10 col-lg-8 mx-auto text-center">
                    <h4 class="text-white mb-5">
                        <i class="far fa-note-sticky text-white me-1"></i>
                        What will you do today?
                    </h4>

                    <!-- Form -->
                    <form class="form-signup" id="contactForm" data-sb-form-api-token="API_TOKEN">
                        <div class="row input-group-newsletter">

                            <div class="col">
                                <input type="text" class="form-control" name="search" id="search"
                                    placeholder="Search..." aria-label="search">
                            </div>

                            <div class="col-auto">

                                <div class="wrapper">

                                </div>

                                <a class="btn btn-primary" href="#popup2">
                                    <i class="fas fa-plus"></i>
                                    Create Note
                                </a>

                                <div id="popup2" class="overlay">
                                    <a class="cancel" href="#"></a>
                                    <div class="popup">
                                        <h2>What the what?</h2>
                                        <div class="content">
                                      <p>Click outside the popup to close.</p>
                                        </div>
                                    </div>
                                </div>

                            </div>


                        </div>
                    </form>

                </div>

            </div>

        </div>
    </section>

    <!-- Card -->
    <section class="contact-section bg-black">
        <div class="container px-4 px-lg-5">

            <div class="row gx-4 gx-lg-5">

                <div class="col-md-4 mb-3 mb-md-4">
                    <div class="card py-4 h-100">

                        <div class="card-body">

                            <div class="text-center">

                                <h4 class="text-uppercase m-0">Note Name</h4>
                                <div class="small text-black-50">Note Description</div>
                                <hr class="my-4 mx-auto" />

                            </div>

                            <!-- todo -->
                            <li class="list-group-item" style="max-height: 200px; overflow: auto;">

                                <div class="">
                                    Test
                                  </div>

                                <div class="row">

                                  <div class="col-8">
                                    <select class="custom-dropdown" name="status" id="status">
                                      <option value="0">New</option>
                                      <option value="1">Half</option>
                                      <option value="2">Fin</option>
                                      <option value="3">Due</option>
                                    </select>
                                  </div>

                                  {{-- <div class="col-2">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                      <a class="btn btn-outline-warning btn-sm">
                                        <i class="fas fa-pen"></i>
                                      </a>
                                      <a class="btn btn-outline-danger btn-sm">
                                        <i class="fas fa-xmark"></i>
                                      </a>
                                    </div>
                                  </div> --}}

                                </div>

                              </li>

                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section>

@endsection
