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
        {{-- @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: inline-block">
                {{ session()->get('success') }}
                <button type="button" class="btn-close" data-bs-dissmiss="alert" aria-label="Close"></button>
            </div>
        @endif --}}
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
                            <div id="popup1" class="overlay" style="z-index: 9999">
                                <a class="cancel" href="#todo"></a>

                                <div class="popup bg-dark text-white">
                                    <h2>Create Note</h2>

                                    <div class="content">
                                        <form method="POST" action="{{ route('storenote') }}"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-group my-3">
                                                <label for="name">Name</label>
                                                <input type="text" name="name" id="name"
                                                    class="form-control" placeholder="enter name...">
                                            </div>

                                            <div class="form-group my-3">
                                                <label for="description">Description</label>
                                                <input type="text" name="description" id="description"
                                                    class="form-control" placeholder="description...">
                                            </div>

                                            <div class="form-group my-3">
                                                <label for="status" class="form-label">Status</label>
                                                <select class="custom-dropdown form-select" name="status" id="status">
                                                    <option value="0">New</option>
                                                    <option value="1">Half</option>
                                                    <option value="2">Fin</option>
                                                    <option value="3">Due</option>
                                                </select>
                                            </div>

                                            <div class="form-group my-3">
                                                <input class="btn btn-outline-success" type="submit"
                                                    value="Save">
                                                <input class="btn btn-outline-danger" type="reset" value="Reset">
                                            </div>

                                        </form>
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

                                    <div class="col-9 d-flex flex-column">

                                        <h4 class="text-uppercase m-0">{{ $note->name }}</h4>
                                        <h6 class="text-black-50">{{ $note->description }}</h6>
                                        <hr class="my-4 mx-8" />

                                    </div>

                                    <div class="d-flex flex-column gap-1 col-3 mb-4">
                                        <select class="custom-dropdown text-start no-padding" name="status" id="status"
                                            value="{{ $note->status }}">
                                            <option value="0">New</option>
                                            <option value="1">Half</option>
                                            <option value="2">Fin</option>
                                            <option value="3">Due</option>
                                        </select>

                                        <a href="{{ route('editnote', $note->id) }}" class="btn btn-outline-warning btn-sm custom-btn">
                                            <i class="fas fa-pen"></i>
                                        </a>

                                        <!-- Delete -->
                                        <form action="{{ route('destroynote', $note->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-danger btn-sm custom-btn"
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
                                <div class="d-flex flex-column gap-3" style="max-height: 200px; overflow: auto;">
                                    @foreach ($note as $data)
                                    <li class="list-group-item">

                                        <div class="row align-items-center w-100">

                                            <div class="col-3">
                                                <select class="custom-dropdown no-padding" name="status" id="status"
                                                    value="">
                                                    <option value="0"> 
                                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" aria-label="Todo" class="color-override"><rect x="1" y="1" width="12" height="12" rx="6" stroke="#e2e2e2" stroke-width="2" fill="none"></rect><path fill="#e2e2e2" stroke="none" d="M 3.5,3.5 L3.5,0 A3.5,3.5 0 0,1 3.5, 0 z" transform="translate(3.5,3.5)"></path></svg>
                                                        New
                                                    </option>
                                                    <option value="1">Half</option>
                                                    <option value="2">Fin</option>
                                                    <option value="3">Due</option>
                                                </select>
                                            </div>

                                            <div class="col-8">
                                                Test
                                            </div>

                                        </div>
                                    </li>
                                    <!-- /todo -->
                                    @endforeach
                                </div>

                            </div>

                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section>
@endsection
