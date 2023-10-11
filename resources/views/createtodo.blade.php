@extends('template')

@section('content')
    <!-- Masthead-->
    <header class="masthead">
        <div class="container d-flex h-100 align-items-center justify-content-center">
            <div class="justify-content-center">
                <div class="">

                    <!-- Todo -->
                    <section class="signup-section" id="todo">

                        <!-- Alert Success -->
                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert"
                                style="display: inline-block">
                                {{ session()->get('success') }}
                                <button type="button" class="btn-close" data-bs-dissmiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <!-- /Alert Success -->

                        <div class="container px-4 px-lg-5">

                            <div class="row gx-4 gx-lg-5">

                                <div class="bg-dark text-white">
                                    <div class="my-5 mx-4">
                                        <h2 class="my-3 text-center">Create Todo</h2>

                                        <div class="row input-group-newsletter form-signup">

                                            <form method="POST" action="{{ route('storetodo') }}" enctype="multipart/form-data">
                                                @csrf

                                                <input type="hidden" name="note_id" id="note_id" value="{{ $data->id }}">

                                                <div class="form-group my-3">
                                                    <label for="todo_name">Todo Name</label>
                                                    <input type="text" name="todo_name" id="todo_name"
                                                        class="form-control" placeholder="enter name...">
                                                </div>

                                                <div class="form-group my-3">
                                                    <label for="todo_description">Todo Description</label>
                                                    <input type="text" name="todo_description" id="todo_description"
                                                        class="form-control" placeholder="description...">
                                                </div>

                                                <div class="form-group my-3">
                                                    <label for="todo_deadline">Todo Deadline</label>
                                                    <input type="date" name="todo_deadline" id="todo_deadline"
                                                        class="form-control">
                                                </div>

                                                <div class="form-group my-3">
                                                    <label for="todo_status" class="form-label">Todo Status</label>
                                                    <select class="custom-dropdown form-select" name="todo_status" id="todo_status">
                                                        <option value="0">New</option>
                                                        <option value="1">Half</option>
                                                        <option value="2">Fin</option>
                                                        <option value="3">Due</option>
                                                    </select>
                                                </div>

                                                <div class="form-group d-flex justify-content-end">
                                                    <input class="btn btn-outline-success mx-2" type="submit" value="Save">
                                                    <input class="btn btn-outline-danger" type="reset" value="Reset">
                                                </div>

                                            </form>

                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </section>

                </div>
            </div>
        </div>
    </header>
@endsection
