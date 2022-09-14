@extends('layouts.app')
@section('css')
    {{-- <link href="{{ asset('assets/css/components/cards/card.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" /> --}}
    <link href="{{ asset('assets/css/apps/notes.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/forms/theme-checkbox-radio.css') }}" rel="stylesheet" type="text/css" />
@endsection

<title>Dashboard</title>
@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger mb-4 mt-2" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-x close" data-dismiss="alert">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg></button>
            @foreach ($errors->all() as $error)
                <p class="text-light">{{ $error }}</p>
            @endforeach
        </div>
    @endif

    @if (session()->has('success'))
        <div class="alert alert-success mb-4 mt-2" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-x close" data-dismiss="alert">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg></button>

            <p class="text-light">{{ session()->get('success') }}</p>

        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger mb-4 mt-2" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-x close" data-dismiss="alert">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg></button>

            <p class="text-light">{{ session()->get('error') }}</p>

        </div>
    @endif




    <div class=" d-flex mt-5 justify-content-end">
        <a href="#starter-kit" class="btn btn-primary" data-toggle="modal" data-target="#addNoteModal">
            <div class="">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-plus-circle">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="8" x2="12" y2="16">
                    </line>
                    <line x1="8" y1="12" x2="16" y2="12">
                    </line>
                </svg>
                <span>Add Note</span>
            </div>
        </a>
    </div>







    {{-- main content --}}
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="page-header mb-4">
                <nav class="breadcrumb-one">
                    <div class="title">
                        <h3>Notes</h3>
                    </div>

                </nav>


            </div>

            <div class="row app-notes layout-top-spacing" id="cancel-row">
                <div class="col-lg-12">
                    <div class="app-hamburger-container">
                        <div class="hamburger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-menu chat-menu d-xl-none">
                                <line x1="3" y1="12" x2="21" y2="12"></line>
                                <line x1="3" y1="6" x2="21" y2="6"></line>
                                <line x1="3" y1="18" x2="21" y2="18"></line>
                            </svg></div>
                    </div>

                    <div class="app-container">

                        <div class="app-note-container">

                            <div class="app-note-overlay"></div>

                            <div class="tab-title">
                                <div class="row">

                                    <div class="col-md-12 col-sm-12 col-12 mt-3">


                                        <p class="group-section"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-tag">
                                                <path
                                                    d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z">
                                                </path>
                                                <line x1="7" y1="7" x2="7" y2="7">
                                                </line>
                                            </svg> Tags</p>

                                        <ul class="nav nav-pills d-block group-list" id="pills-tab" role="tablist">

                                            <li class="nav-item">
                                                <a class="nav-link list-actions g-dot-primary"
                                                    id="all-notes">All notes</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link list-actions g-dot-primary"
                                                    id="note-personal">Personal</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link list-actions g-dot-warning" id="note-work">Work</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link list-actions g-dot-success" id="note-social">Social</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link list-actions g-dot-danger"
                                                    id="note-important">Important</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>


                            <div id="ct" class="note-container note-grid">

                                @foreach ($notes as $note)
                                    <div class="note-item all-notes note-{{ $note->tag }}">
                                        <div class="note-inner-content">
                                            <div class="note-content">
                                                <p class="note-title" data-noteTitle="Meeting with Kelly">
                                                    {{ $note->title }}
                                                </p>
                                                <p class="meta-time">{{ $note->created_at }}</p>
                                                <div class="note-description-content">
                                                    <p class="note-description">{{ $note->description }}</p>
                                                </div>
                                            </div>
                                            <div class="note-action">
                                                <a href="{{ route('note.delete', $note->id) }}">

                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-trash-2 delete-note">
                                                        <polyline points="3 6 5 6 21 6"></polyline>
                                                        <path
                                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                        </path>
                                                        <line x1="10" y1="11" x2="10"
                                                            y2="17">
                                                        </line>
                                                        <line x1="14" y1="11" x2="14"
                                                            y2="17">
                                                        </line>
                                                    </svg>
                                                </a>

                                            </div>

                                        </div>
                                    </div>
                                @endforeach

                            </div>

                        </div>

                    </div>



                </div>
            </div>

        </div>

    </div>
    {{-- end main content --}}
















    {{-- add note --}}
    <div class="modal fade" id="addNoteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Note</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('note.add') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" class="form-control" style="resize: none" id="" cols="30"
                                rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Tag</label>
                            <select name="tag" id="" class="form-control">
                                @foreach ($noteTypes as $type)
                                    <option value="{{ $type }}">{{ $type }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>
                                Discard</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- end add note --}}

@endsection
@section('js')
    <script src="{{ asset('assets/js/ie11fix/fn.fix-padStart.js') }}"></script>
    <script>
        var $btns = $('.list-actions').click(function() {
            if (this.id == 'all-notes') {
                var $el = $('.' + this.id).fadeIn();
                $('#ct > div').not($el).hide();
            }
            if (this.id == 'important') {
                var $el = $('.' + this.id).fadeIn();
                $('#ct > div').not($el).hide();
            } else {
                var $el = $('.' + this.id).fadeIn();
                $('#ct > div').not($el).hide();
            }
            $btns.removeClass('active');
            $(this).addClass('active');
        })
    </script>
@endsection
