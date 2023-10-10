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

        <!-- Alert Success -->
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: inline-block">
                {{ session()->get('success') }}
                <button type="button" class="btn-close" data-bs-dissmiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <!-- /Alert Success -->

        <div class="container px-4 px-lg-5">

            <div class="row gx-4 gx-lg-5">

                <div class="col-md-10 col-lg-8 mx-auto text-center">
                    <h4 class="text-white mb-5">
                        <i class="far fa-note-sticky text-white me-1"></i>
                        What will you do today?
                    </h4>

                    <!-- What -->
                    <div class="row input-group-newsletter form-signup">

                        <div class="col">
                            <input type="text" class="form-control" name="search" id="search" placeholder="Search..."
                                aria-label="search">
                        </div>

                        <div class="col-auto">

                            <div class="wrapper">

                            </div>

                            <a class="btn btn-primary" href="#popup1">
                                <i class="fas fa-plus"></i>
                                Create Note
                            </a>

                            <!-- CreateModal -->
                            <div id="popup1" class="overlay">
                                <a class="cancel" href="#"></a>

                                <div class="popup bg-dark text-white">
                                    <h2>Create Note</h2>

                                    <div class="content">
                                        <a href="/note/create">Create</a>
                                        {{-- <form action="POST" action="{{ route('createnote') }}" enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-group my-3">
                                                <input class="form-control" type="text" name="name" id="name"
                                                    placeholder="enter name...">
                                            </div>

                                            <div class="form-group my-3">
                                                <input class="form-control" type="text" name="description" id="description"
                                                    placeholder="description...">
                                            </div>

                                            <div class="form-group text-center my-3">
                                                <input class="btn btn-outline-success" type="submit" value="Save">
                                                <input class="btn btn-outline-danger" type="reset" value="Reset">
                                            </div>

                                        </form> --}}
                                    </div>

                                </div>
                            </div>
                            <!-- /CreateModal -->

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </section>

    <!-- Card -->
    <section class="contact-section bg-black">
        <div class="container px-4 px-lg-5">

            <div class="row gx-4 gx-lg-5">

                @foreach ($note as $note)
                    <div class="col-md-6 mb-3 mb-md-4">
                        <div class="card py-4 h-100">

                            <div class="card-body">

                                <div class="row">

                                    <div class="col-2 mb-4">
                                        <select class="custom-dropdown text-start" name="status" id="status"
                                            value="{{ $note->status }}">
                                            <option value="0">New</option>
                                            <option value="1">Half</option>
                                            <option value="2">Fin</option>
                                            <option value="3">Due</option>
                                        </select>
                                    </div>

                                    <div class="col-8 text-center">

                                        <h4 class="text-uppercase m-0">{{ $note->name }}</h4>
                                        <hr class="my-4 mx-auto" />

                                    </div>
                                </div>


                                <div class="mb-3" align="center">
                                    <div class="text-center btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ route('editnote', $note->id) }}" class="btn btn-outline-warning btn-sm">
                                            <i class="fas fa-pen"></i>
                                        </a>

                                        <!-- Delete -->
                                        <form action="{{ route('destroynote', $note->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-danger btn-sm"
                                                onclick="return confirm('Delete this Data?')">
                                                <i class="fas fa-xmark"></i>
                                            </button>
                                        </form>
                                        <!-- /Delete -->

                                        {{-- <a class="btn btn-outline-danger btn-sm">
                                            <i class="fas fa-xmark"></i>
                                        </a> --}}
                                    </div>
                                </div>

                                <!-- todo -->
                                <li class="list-group-item" style="max-height: 200px; overflow: auto;">
                                    <div class="text-black-50">{{ $note->description }}</div>
                                    <br>

                                    <div class="row mb-3">

                                        {{-- @foreach ($data as $data) --}}
                                        <div class="col-2">
                                            <select class="custom-dropdown" name="status" id="status"
                                                value="">
                                                <option value="0">New</option>
                                                <option value="1">Half</option>
                                                <option value="2">Fin</option>
                                                <option value="3">Due</option>
                                            </select>
                                        </div>

                                        <div class="col-8">
                                            Test
                                            <hr>
                                        </div>

                                        <div class="col-2">

                                        </div>

                                    </div>
                                </li>
                                <!-- /todo -->
                                {{-- @endforeach --}}

                            </div>

                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section>
@endsection
