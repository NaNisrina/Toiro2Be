@extends('template')

@section('content')
    <!-- Masthead-->
    <header class="masthead">
        <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
            <div class="d-flex justify-content-center">
                <div class="text-center">
                    <h1 class="mx-auto my-0 text-uppercase">Toiro</h1>
                    <h2 class="text-white-50 mx-auto mt-2 mb-5">To Do List of Tomorrow</h2>

                    <a class="btn btn-primary" href="#todo">Go To Todo</a>
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

                            <!-- CreateNote -->
                            <a class="btn btn-primary" href="#popup-create-note">
                                <i class="fas fa-plus"></i>
                                Create Note
                            </a>

                            <!-- CreateModal -->
                            <div id="popup-create-note" class="overlay" style="z-index: 9999">
                                <a class="cancel" href="#todo"></a>

                                <div class="popup bg-dark text-white">
                                    <h2>Create Note</h2>

                                    <div class="content">
                                        <form method="POST" action="{{ route('storenote') }}"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-group my-3">
                                                <label for="name">Name</label>
                                                <input type="text" name="name" id="name" class="form-control"
                                                    placeholder="enter name...">
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
                                                <label for="category">Category</label>
                                                <input type="text" name="category" id="category" class="form-control"
                                                    placeholder="category...">
                                            </div>

                                            <div class="form-group my-3">
                                                <input class="btn btn-outline-success" type="submit" value="Save">
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

                <!-- Loop Note -->
                @foreach ($note as $note)
                    <div class="col-md-6 mb-3 mb-md-4" id="{{ $note->id }}" style="min-height: 500px">
                        <div class="card py-4 h-100">

                            <div class="card-body">

                                <div class="row">

                                    <div class="col-9 d-flex flex-column">

                                        <h4 class="text-uppercase m-0">{{ $note->name }}</h4>
                                        <h6 class="text-black-50">{{ $note->description }}</h6>
                                        <hr class="my-4 mx-8" />
                                        {{-- <h4 class="text-black-25 m-0">{{ $note->deadline }}</h4> --}}
                                        <span class="badge bg-danger mt-auto mb-4 align-self-start">Category: {{ $note->category }}</span>

                                        {{-- <h4 class="text-black-50 mt-auto">Updated -- {{ $note->updated_at }}</h4> --}}
                                    </div>

                                    <div class="d-flex flex-column gap-1 col-3 mb-4">
                                        <div class="custom-dropdown text-start no-padding border" name="status" id="status">
                                            @if ($note->status == '0')
                                                New
                                            @endif
                                            @if ($note->status == '1')
                                                Half
                                            @endif
                                            @if ($note->status == '2')
                                                Fin
                                            @endif
                                            @if ($note->status == '3')
                                                Due
                                            @endif
                                            {{-- <option value="0" @if ($note->status == '0') selected @endif
                                                disabled>New</option>
                                            <option value="1" @if ($note->status == '1') selected @endif
                                                disabled>Half</option>
                                            <option value="2" @if ($note->status == '2') selected @endif
                                                disabled>Fin</option>
                                            <option value="3" @if ($note->status == '3') selected @endif
                                                disabled>Due</option> --}}
                                        </div>

                                        {{-- <a href="{{ route('editnote', $note->id) }}" class="btn btn-outline-warning btn-sm custom-btn"> --}}
                                        <a href="#popup-note-{{ $note->id }}"
                                            class="btn btn-outline-warning btn-sm custom-btn">
                                            <i class="fas fa-pen"></i>
                                        </a>

                                        <div id="popup-note-{{ $note->id }}" class="overlay" style="z-index: 9999">
                                            <a class="cancel" href="#{{ $note->id }}"></a>

                                            <div class="popup bg-dark text-white">
                                                <h2>Edit Note</h2>

                                                <div class="content">
                                                    <form method="POST" action="{{ route('updatenote', $note->id) }}"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group my-3">
                                                            <label for="name">Name</label>
                                                            <input type="text" name="name" id="name"
                                                                value="{{ $note->name }}" class="form-control"
                                                                placeholder="enter name...">
                                                        </div>

                                                        <div class="form-group my-3">
                                                            <label for="description">Description</label>
                                                            <input type="text" name="description" id="description"
                                                                value="{{ $note->description }}" class="form-control"
                                                                placeholder="description...">
                                                        </div>

                                                        <div class="form-group my-3">
                                                            <label for="status" class="form-label">Status</label>
                                                            <select class="custom-dropdown form-select" name="status"
                                                                id="status">
                                                                <option value="0"
                                                                    @if ($note->status == '0') selected @endif>New
                                                                </option>
                                                                <option value="1"
                                                                    @if ($note->status == '1') selected @endif>Half
                                                                </option>
                                                                <option value="2"
                                                                    @if ($note->status == '2') selected @endif>Fin
                                                                </option>
                                                                <option value="3"
                                                                    @if ($note->status == '3') selected @endif>Due
                                                                </option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group my-3">
                                                            <label for="category">Category</label>
                                                            <input type="text" name="category" id="category"
                                                                value="{{ $note->category }}" class="form-control"
                                                                    placeholder="category...">
                                                        </div>

                                                        <div class="form-group my-3">
                                                            <input class="btn btn-outline-success" type="submit"
                                                                value="Save">
                                                            <input class="btn btn-outline-danger" type="reset"
                                                                value="Reset">
                                                        </div>

                                                    </form>
                                                </div>

                                            </div>
                                        </div>

                                        <form action="{{ route('destroynote', $note->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-danger btn-sm custom-btn"
                                                onclick="return confirm('Delete this Data?')">
                                                <i class="fas fa-xmark"></i>
                                            </button>
                                        </form>
                                    </div>

                                </div>


                                <!-- CRUD Todo -->

                                <a href="#popup-create-todo-{{ $note->id }}"
                                    class="btn btn-outline-info btn-sm custom-btn mb-3">
                                    Create Todo
                                </a>

                                <!-- CreateModal -->
                                <div id="popup-create-todo-{{ $note->id }}" class="overlay" style="z-index: 9999">
                                    <a class="cancel" href="#{{ $note->id }}"></a>

                                    <div class="popup bg-dark text-white">
                                        <h2>Create Todo</h2>

                                        <div class="content">

                                            <div class="row input-group-newsletter form-signup">

                                                <form method="POST" action="{{ route('storetodo') }}"
                                                    enctype="multipart/form-data">
                                                    @csrf

                                                    <input type="hidden" name="note_id" id="note_id"
                                                        value="{{ $note->id }}">

                                                    <div class="form-group my-3">
                                                        <label for="todo_name">Todo Name</label>
                                                        <input type="text" name="todo_name" id="todo_name"
                                                            class="form-control" placeholder="enter name...">
                                                    </div>

                                                    <div class="form-group my-3">
                                                        <label for="todo_description">Todo Description</label>
                                                        <input type="text" name="todo_description"
                                                            id="todo_description" class="form-control"
                                                            placeholder="description...">
                                                    </div>

                                                    <div class="form-group my-3">
                                                        <label for="todo_deadline">Todo Deadline</label>
                                                        <input type="date" name="todo_deadline" id="todo_deadline"
                                                            class="form-control">
                                                    </div>

                                                    <div class="form-group my-3">
                                                        <label for="todo_status" class="form-label">Todo Status</label>
                                                        <select class="custom-dropdown form-select" name="todo_status"
                                                            id="todo_status">
                                                            <option value="0">New</option>
                                                            <option value="1">Half</option>
                                                            <option value="2">Fin</option>
                                                            <option value="3">Due</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group d-flex justify-content-end">
                                                        <input class="btn btn-outline-success mx-2" type="submit"
                                                            value="Save">
                                                        <input class="btn btn-outline-danger" type="reset"
                                                            value="Reset">
                                                    </div>

                                                </form>

                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <!-- /CreateModal -->

                                {{-- <form action="{{ route('createtodo', $note->id) }}" method="post">
                                    @csrf
                                    @method('POST')
                                    <button class="btn btn-outline-info btn-sm custom-btn mb-3">
                                        Create Todo
                                    </button>
                                </form> --}}

                                <!-- todo -->
                                <div class="d-flex flex-column gap-3" style="height: 100%; max-height: 230px; overflow: auto;">

                                    <!-- Loop Todo -->
                                    @foreach ($note->todo as $todo)
                                        <div class="row align-items-start w-100 mx-0">

                                            <div class="col-3">
                                                <div class="custom-dropdown no-padding border" name="todo_status" id="todo_status"
                                                    value="">
                                                    @if ($todo->todo_status == '0')
                                                        New
                                                    @endif
                                                    @if ($todo->todo_status == '1')
                                                        Half
                                                    @endif
                                                    @if ($todo->todo_status == '2')
                                                        Fin
                                                    @endif
                                                    @if ($todo->todo_status == '3')
                                                        Due
                                                    @endif
                                                    {{-- <option value="0"
                                                        @if ($todo->todo_status == '0') selected @endif>New</option>
                                                    <option value="1"
                                                        @if ($todo->todo_status == '1') selected @endif>Half</option>
                                                    <option value="2"
                                                        @if ($todo->todo_status == '2') selected @endif>Fin</option>
                                                    <option value="3"
                                                        @if ($todo->todo_status == '3') selected @endif>Due</option> --}}
                                                </div>
                                            </div>

                                            <div class="col-6 d-flex justify-content-start">



                                                <div class="d-flex flex-column">
                                                    {{-- <span class="badge bg-success mb-2 align-self-start">{{ date("d-m-Y", strtotime($note->updated_at)) }}</span> --}}
                                                    <span class="badge bg-danger mb-2 align-self-start">{{{ date("d-m-Y", strtotime($todo->todo_deadline)) }}}</span>

                                                    <h4 class="text-uppercase m-0">{{ $todo->todo_name }}</h4>

                                                    <h6 class="text-black-50  m-0">{{ $todo->todo_description }}</h6>
                                                </div>
                                            </div>

                                            <div class="col-3 d-flex justify-content-end p-0 gap-1">

                                                {{-- <a href="{{ route('edittodo', $todo->id) }}"
                                                    class="btn btn-outline-warning btn-sm custom-btn"
                                                    style="width: unset">
                                                    <i class="fas fa-pen"></i>
                                                </a>

                                                <a href="#popup-{{ $todo->id }}"
                                                    class="btn btn-outline-info btn-sm custom-btn" style="width: unset">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a> --}}

                                                <a href="#popup-todo-{{ $todo->id }}"
                                                    class="btn btn-outline-warning btn-sm custom-btn"
                                                    style="width: unset">
                                                    <i class="fas fa-pen"></i>
                                                </a>

                                                <div id="popup-todo-{{ $todo->id }}" class="overlay"
                                                    style="z-index: 9999">
                                                    <a class="cancel" href="#{{ $note->id }}"></a>

                                                    <div class="popup bg-dark text-white">
                                                        <h2>Edit Todo</h2>

                                                        <div class="content">

                                                            <form method="POST"
                                                                action="{{ route('updatetodo', $todo->id) }}"
                                                                enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="form-group my-3">
                                                                    <label for="name">Name</label>
                                                                    <input type="text" name="todo_name" id="name"
                                                                        value="{{ $todo->todo_name }}"
                                                                        class="form-control" placeholder="enter name...">
                                                                </div>

                                                                <div class="form-group my-3">
                                                                    <label for="description">Description</label>
                                                                    <input type="text" name="todo_description"
                                                                        id="description"
                                                                        value="{{ $todo->todo_description }}"
                                                                        class="form-control" placeholder="description...">
                                                                </div>

                                                                <div class="form-group my-3">
                                                                    <label for="todo_deadline">Todo Deadline</label>
                                                                    <input type="date" name="todo_deadline"
                                                                        id="todo_deadline" class="form-control"
                                                                        value="{{ $todo->todo_deadline }}">
                                                                </div>

                                                                <div class="form-group my-3">
                                                                    <label for="status"
                                                                        class="form-label">Status</label>
                                                                    <select class="custom-dropdown form-select"
                                                                        name="todo_status" id="status">
                                                                        <option value="0"
                                                                            @if ($todo->todo_status == '0') selected @endif>
                                                                            New</option>
                                                                        <option value="1"
                                                                            @if ($todo->todo_status == '1') selected @endif>
                                                                            Half</option>
                                                                        <option value="2"
                                                                            @if ($todo->todo_status == '2') selected @endif>
                                                                            Fin</option>
                                                                        <option value="3"
                                                                            @if ($todo->todo_status == '3') selected @endif>
                                                                            Due</option>
                                                                    </select>
                                                                </div>

                                                                <div class="form-group my-3">
                                                                    <input class="btn btn-outline-success" type="submit"
                                                                        value="Save">
                                                                    <input class="btn btn-outline-danger" type="reset"
                                                                        value="Reset">
                                                                </div>
                                                            </form>

                                                        </div>

                                                    </div>
                                                </div>

                                                <form action="{{ route('destroytodo', $todo->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-outline-danger btn-sm custom-btn"
                                                        onclick="return confirm('Delete this Data?')"
                                                        style="width: 45.6px">
                                                        <i class="fas fa-xmark"></i>
                                                    </button>
                                                </form>

                                            </div>

                                        </div>
                                        <!-- /todo -->
                                    @endforeach
                                    <!-- /Loop Todo -->
                                </div>

                            </div>

                        </div>
                    </div>
                @endforeach
                <!-- /Loop Note -->

            </div>

        </div>
    </section>
@endsection
