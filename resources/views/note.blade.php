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

                            <script>
                                document.addEventListener("DOMContentLoaded", function () {
                                    const searchInput = document.getElementById("search");
                                    const noteContainers = document.querySelectorAll(".note-container");

                                    searchInput.addEventListener("input", function () {
                                        const searchTerm = searchInput.value.toLowerCase();

                                        noteContainers.forEach(function (container) {
                                            const h4Note = container.querySelector("#note-name");
                                            const h6Note = container.querySelector("#note-description");
                                            const statusNote = container.querySelector("#note-status");
                                            const categoryNote = container.querySelector("#note-category");
                                            const h4Todo = container.querySelector("#todo-name");
                                            const h6Todo = container.querySelector("#todo-description");

                                            // Validate exisiting data
                                            const hasH4Note = h4Note && h4Note.textContent;
                                            const hasH6Note = h6Note && h6Note.textContent;
                                            const hasStatusNote = statusNote && statusNote.textContent;
                                            const hasCategoryNote = categoryNote && categoryNote.textContent;
                                            const hasH4Todo = h4Todo && h4Todo.textContent;
                                            const hasH6Todo = h6Todo && h6Todo.textContent;

                                            if (
                                                (hasH4Note && h4Note.textContent.toLowerCase().includes(searchTerm)) ||
                                                (hasH6Note && h6Note.textContent.toLowerCase().includes(searchTerm)) ||
                                                (hasStatusNote && statusNote.textContent.toLowerCase().includes(searchTerm)) ||
                                                (hasCategoryNote && categoryNote.textContent.toLowerCase().includes(searchTerm)) ||
                                                (hasH4Todo && h4Todo.textContent.toLowerCase().includes(searchTerm)) ||
                                                (hasH6Todo && h6Todo.textContent.toLowerCase().includes(searchTerm))
                                            ) {
                                                container.classList.remove("hidden");
                                            } else {
                                                container.classList.add("hidden");
                                            }
                                        });
                                    });
                                });
                            </script>
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

                                            <input type="hidden" name="user_id" id="user_id"
                                            value="{{ Auth::user()->id }}">

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
                    <div class="col-lg-6 mb-3 mb-md-4 note-container" id="{{ $note->id }}" style="min-height: 500px" id>
                        <div class="card h-100 p-4" style="border-top: 0.75rem solid
                            @if ($note->status == '0')
                                #1CABC4
                            @endif
                            @if ($note->status == '1')
                                #E4C662
                            @endif
                            @if ($note->status == '2')
                                #558985
                            @endif
                            @if ($note->status == '3')
                                #A16468
                            @endif
                        !important;">

                            <div class="row">

                                <div class="col-8 col-xl-9 d-flex flex-column">

                                    <h4 class="text-uppercase m-0" id="note-name">{{ $note->name }}</h4>
                                    <h6 class="text-black-50" id="note-description">{{ $note->description }}</h6>
                                    <hr class="my-4 mx-8" />
                                    <span class="badge bg-success mt-auto mb-4 align-self-start">
                                        Category:
                                        <span id="note-category">{{ $note->category }}</span>
                                    </span>

                                </div>

                                <div class="d-flex flex-column gap-1 col-4 col-xl-3 mb-4">
                                    <div class="custom-dropdown text-start no-padding border d-flex gap-2 align-items-center" name="status" id="note-status">
                                        @if ($note->status == '0')
                                            <svg width="14" height="14" viewBox="0 0 15 15" aria-label="Backlog" fill="#1CABC4" class="color-override"><path d="M13.9408 7.91426L11.9576 7.65557C11.9855 7.4419 12 7.22314 12 7C12 6.77686 11.9855 6.5581 11.9576 6.34443L13.9408 6.08573C13.9799 6.38496 14 6.69013 14 7C14 7.30987 13.9799 7.61504 13.9408 7.91426ZM13.4688 4.32049C13.2328 3.7514 12.9239 3.22019 12.5538 2.73851L10.968 3.95716C11.2328 4.30185 11.4533 4.68119 11.6214 5.08659L13.4688 4.32049ZM11.2615 1.4462L10.0428 3.03204C9.69815 2.76716 9.31881 2.54673 8.91341 2.37862L9.67951 0.531163C10.2486 0.767153 10.7798 1.07605 11.2615 1.4462ZM7.91426 0.0591659L7.65557 2.04237C7.4419 2.01449 7.22314 2 7 2C6.77686 2 6.5581 2.01449 6.34443 2.04237L6.08574 0.059166C6.38496 0.0201343 6.69013 0 7 0C7.30987 0 7.61504 0.0201343 7.91426 0.0591659ZM4.32049 0.531164L5.08659 2.37862C4.68119 2.54673 4.30185 2.76716 3.95716 3.03204L2.73851 1.4462C3.22019 1.07605 3.7514 0.767153 4.32049 0.531164ZM1.4462 2.73851L3.03204 3.95716C2.76716 4.30185 2.54673 4.68119 2.37862 5.08659L0.531164 4.32049C0.767153 3.7514 1.07605 3.22019 1.4462 2.73851ZM0.0591659 6.08574C0.0201343 6.38496 0 6.69013 0 7C0 7.30987 0.0201343 7.61504 0.059166 7.91426L2.04237 7.65557C2.01449 7.4419 2 7.22314 2 7C2 6.77686 2.01449 6.5581 2.04237 6.34443L0.0591659 6.08574ZM0.531164 9.67951L2.37862 8.91341C2.54673 9.31881 2.76716 9.69815 3.03204 10.0428L1.4462 11.2615C1.07605 10.7798 0.767153 10.2486 0.531164 9.67951ZM2.73851 12.5538L3.95716 10.968C4.30185 11.2328 4.68119 11.4533 5.08659 11.6214L4.32049 13.4688C3.7514 13.2328 3.22019 12.9239 2.73851 12.5538ZM6.08574 13.9408L6.34443 11.9576C6.5581 11.9855 6.77686 12 7 12C7.22314 12 7.4419 11.9855 7.65557 11.9576L7.91427 13.9408C7.61504 13.9799 7.30987 14 7 14C6.69013 14 6.38496 13.9799 6.08574 13.9408ZM9.67951 13.4688L8.91341 11.6214C9.31881 11.4533 9.69815 11.2328 10.0428 10.968L11.2615 12.5538C10.7798 12.9239 10.2486 13.2328 9.67951 13.4688ZM12.5538 11.2615L10.968 10.0428C11.2328 9.69815 11.4533 9.31881 11.6214 8.91341L13.4688 9.67951C13.2328 10.2486 12.924 10.7798 12.5538 11.2615Z" stroke="none"></path></svg>
                                            New
                                        @endif
                                        @if ($note->status == '1')
                                            <svg width="14" height="14" viewBox="0 0 15 15" fill="none" aria-label="In Progress" class="color-override"><rect x="1" y="1" width="12" height="12" rx="6" stroke="#E4C662" stroke-width="2" fill="none"></rect><path fill="#E4C662" stroke="none" d="M 3.5,3.5 L3.5,0 A3.5,3.5 0 0,1 3.5, 7 z" transform="translate(3.5,3.5)"></path></svg>
                                            Half
                                        @endif
                                        @if ($note->status == '2')
                                            <svg width="14" height="14" viewBox="0 0 15 15" aria-label="Done" fill="#558985" class="color-override"><path fill-rule="evenodd" clip-rule="evenodd" d="M7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0ZM11.101 5.10104C11.433 4.76909 11.433 4.23091 11.101 3.89896C10.7691 3.56701 10.2309 3.56701 9.89896 3.89896L5.5 8.29792L4.10104 6.89896C3.7691 6.56701 3.2309 6.56701 2.89896 6.89896C2.56701 7.2309 2.56701 7.7691 2.89896 8.10104L4.89896 10.101C5.2309 10.433 5.7691 10.433 6.10104 10.101L11.101 5.10104Z"></path></svg>
                                            Fin
                                        @endif
                                        @if ($note->status == '3')
                                            <svg width="14" height="14" viewBox="0 0 15 15" fill="none" aria-label="Due" class="color-override"><rect x="1" y="1" width="12" height="12" rx="6" stroke="red" stroke-width="2" fill="none"></rect><path fill="#A16468" stroke="none" d="M 3.5,3.5 L3.5,0 A3.5,3.5 0 0,1 3.5, 0 z" transform="translate(3.5,3.5)"></path></svg>
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
                            <div class="d-flex flex-column gap-3 px-1" style="height: 100%; max-height: 230px; overflow: auto;">

                                <!-- Loop Todo -->
                                @foreach ($note->todo as $todo)
                                    <div class="row align-items-start w-100 mx-0 border custom-border p-2" style="border-top: 0.5rem solid

                                    @if (date("d-m-Y", strtotime($todo->todo_deadline)) <= date("d-m-Y") && $todo->todo_status != '2')
                                        #A16468
                                    @else
                                        @if ($note->status == '2')
                                            #558985
                                        @elseif ($note->status == '3' && $todo->todo_status != '2')
                                            #A16468
                                        @else
                                            @if ($todo->todo_status == '0')
                                                #1CABC4
                                            @endif
                                            @if ($todo->todo_status == '1')
                                                #E4C662
                                            @endif
                                            @if ($todo->todo_status == '2')
                                                #558985
                                            @endif
                                            @if ($todo->todo_status == '3')
                                                #A16468
                                            @endif
                                        @endif
                                    @endif
                                    !important;">

                                        <div class="col-xxl-3 col-12 mt-3 mt-xxl-0">
                                            <span class="badge
                                            @if (date("d-m-Y", strtotime($todo->todo_deadline)) <= date("d-m-Y") && $todo->todo_status != '2')
                                                bg-danger
                                            @else
                                                bg-success
                                            @endif
                                            mb-2 align-self-start w-100">{{{ date("d-m-Y", strtotime($todo->todo_deadline)) }}}</span>

                                            <div class="custom-dropdown no-padding border d-flex gap-2 align-items-center" name="todo_status" id="todo_status"
                                                value="">
                                                @if ($todo->todo_status == '0')
                                                    <svg width="14" height="14" viewBox="0 0 15 15" aria-label="Backlog" fill="#1CABC4" class="color-override"><path d="M13.9408 7.91426L11.9576 7.65557C11.9855 7.4419 12 7.22314 12 7C12 6.77686 11.9855 6.5581 11.9576 6.34443L13.9408 6.08573C13.9799 6.38496 14 6.69013 14 7C14 7.30987 13.9799 7.61504 13.9408 7.91426ZM13.4688 4.32049C13.2328 3.7514 12.9239 3.22019 12.5538 2.73851L10.968 3.95716C11.2328 4.30185 11.4533 4.68119 11.6214 5.08659L13.4688 4.32049ZM11.2615 1.4462L10.0428 3.03204C9.69815 2.76716 9.31881 2.54673 8.91341 2.37862L9.67951 0.531163C10.2486 0.767153 10.7798 1.07605 11.2615 1.4462ZM7.91426 0.0591659L7.65557 2.04237C7.4419 2.01449 7.22314 2 7 2C6.77686 2 6.5581 2.01449 6.34443 2.04237L6.08574 0.059166C6.38496 0.0201343 6.69013 0 7 0C7.30987 0 7.61504 0.0201343 7.91426 0.0591659ZM4.32049 0.531164L5.08659 2.37862C4.68119 2.54673 4.30185 2.76716 3.95716 3.03204L2.73851 1.4462C3.22019 1.07605 3.7514 0.767153 4.32049 0.531164ZM1.4462 2.73851L3.03204 3.95716C2.76716 4.30185 2.54673 4.68119 2.37862 5.08659L0.531164 4.32049C0.767153 3.7514 1.07605 3.22019 1.4462 2.73851ZM0.0591659 6.08574C0.0201343 6.38496 0 6.69013 0 7C0 7.30987 0.0201343 7.61504 0.059166 7.91426L2.04237 7.65557C2.01449 7.4419 2 7.22314 2 7C2 6.77686 2.01449 6.5581 2.04237 6.34443L0.0591659 6.08574ZM0.531164 9.67951L2.37862 8.91341C2.54673 9.31881 2.76716 9.69815 3.03204 10.0428L1.4462 11.2615C1.07605 10.7798 0.767153 10.2486 0.531164 9.67951ZM2.73851 12.5538L3.95716 10.968C4.30185 11.2328 4.68119 11.4533 5.08659 11.6214L4.32049 13.4688C3.7514 13.2328 3.22019 12.9239 2.73851 12.5538ZM6.08574 13.9408L6.34443 11.9576C6.5581 11.9855 6.77686 12 7 12C7.22314 12 7.4419 11.9855 7.65557 11.9576L7.91427 13.9408C7.61504 13.9799 7.30987 14 7 14C6.69013 14 6.38496 13.9799 6.08574 13.9408ZM9.67951 13.4688L8.91341 11.6214C9.31881 11.4533 9.69815 11.2328 10.0428 10.968L11.2615 12.5538C10.7798 12.9239 10.2486 13.2328 9.67951 13.4688ZM12.5538 11.2615L10.968 10.0428C11.2328 9.69815 11.4533 9.31881 11.6214 8.91341L13.4688 9.67951C13.2328 10.2486 12.924 10.7798 12.5538 11.2615Z" stroke="none"></path></svg>
                                                    New
                                                @endif
                                                @if ($todo->todo_status == '1')
                                                    <svg width="14" height="14" viewBox="0 0 15 15" fill="none" aria-label="In Progress" class="color-override"><rect x="1" y="1" width="12" height="12" rx="6" stroke="#E4C662" stroke-width="2" fill="none"></rect><path fill="#E4C662" stroke="none" d="M 3.5,3.5 L3.5,0 A3.5,3.5 0 0,1 3.5, 7 z" transform="translate(3.5,3.5)"></path></svg>
                                                    Half
                                                @endif
                                                @if ($todo->todo_status == '2')
                                                    <svg width="14" height="14" viewBox="0 0 15 15" aria-label="Done" fill="#558985" class="color-override"><path fill-rule="evenodd" clip-rule="evenodd" d="M7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0ZM11.101 5.10104C11.433 4.76909 11.433 4.23091 11.101 3.89896C10.7691 3.56701 10.2309 3.56701 9.89896 3.89896L5.5 8.29792L4.10104 6.89896C3.7691 6.56701 3.2309 6.56701 2.89896 6.89896C2.56701 7.2309 2.56701 7.7691 2.89896 8.10104L4.89896 10.101C5.2309 10.433 5.7691 10.433 6.10104 10.101L11.101 5.10104Z"></path></svg>
                                                    Fin
                                                @endif
                                                @if ($todo->todo_status == '3')
                                                <svg width="14" height="14" viewBox="0 0 15 15" fill="none" aria-label="Due" class="color-override"><rect x="1" y="1" width="12" height="12" rx="6" stroke="red" stroke-width="2" fill="none"></rect><path fill="#A16468" stroke="none" d="M 3.5,3.5 L3.5,0 A3.5,3.5 0 0,1 3.5, 0 z" transform="translate(3.5,3.5)"></path></svg>
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



                                        <div class="col-xxl-6 col-12 d-flex justify-content-start mt-3 mt-xxl-0">

                                            <div class="d-flex flex-column">
                                                {{-- <span class="badge bg-success mb-2 align-self-start">{{ date("d-m-Y", strtotime($note->updated_at)) }}</span> --}}

                                                <h4 class="text-uppercase m-0" id="todo-name">{{ $todo->todo_name }}</h4>

                                                <h6 class="text-black-50  m-0" id="todo-description">{{ $todo->todo_description }}</h6>
                                            </div>

                                        </div>

                                        <div class="col-xxl-3 col-12 d-flex justify-content-end p-3 p-xxl-0 gap-1 mt-3 mt-xxl-0">

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
                @endforeach
                <!-- /Loop Note -->

            </div>

        </div>
    </section>
@endsection
