@extends('layouts.app')
@section('css')
    <link href="{{ asset('assets/css/components/cards/card.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
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





    <div class=" d-flex mt-5 justify-content-end">
        <a href="#starter-kit" class="btn btn-primary" data-toggle="modal" data-target="#addNewCourse">
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
                <span>Add new Course</span>
            </div>

        </a>

    </div>



    {{-- add new course --}}
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="addNewCourse"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Add new Course</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('instructor.add_course', auth()->id()) }}" class="form" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea type="text" name="description" class="form-control" style="resize: none">
                            </textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Category</label>
                            <select name="category_id" id="" class="form-control">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for=""> Price</label>
                            <input type="number" class="form-control" name="price">
                        </div>



                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>
                                Discard</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    {{-- end new course --}}






















    <div class="col-md-12 mt-2">

        <div class="row justify-content-between p-1">

            <div class="card component-card_9 col-lg-3 col-md-4 col-sm-6 ">
                <img src="assets/img/400x300.jpg" class="card-img-top" alt="widget-card-2">
                <div class="card-body">
                    <p class="meta-date">25 Jan 2020</p>

                    <h5 class="card-title">How to Start a Blog in 5 Easy Steps.</h5>
                    <p class="card-text">Vestibulum vestibulum tortor ut eros tincidunt, ut rutrum elit volutpat.
                    </p>

                    <div class="meta-info">
                        <div class="meta-user">
                            <div class="avatar avatar-sm">
                                <span class="avatar-title rounded-circle">AG</span>
                            </div>
                            <div class="user-name">Luke Ivory</div>
                        </div>

                        <div class="meta-action">
                            <div class="meta-likes">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
                                    <path
                                        d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                    </path>
                                </svg> 51
                            </div>

                            <div class="meta-view">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg> 250
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <div class="card component-card_9 col-lg-3 col-md-4 col-sm-6 ">
                <img src="assets/img/400x300.jpg" class="card-img-top" alt="widget-card-2">
                <div class="card-body">
                    <p class="meta-date">25 Jan 2020</p>

                    <h5 class="card-title">How to Start a Blog in 5 Easy Steps.</h5>
                    <p class="card-text">Vestibulum vestibulum tortor ut eros tincidunt, ut rutrum elit volutpat.
                    </p>

                    <div class="meta-info">
                        <div class="meta-user">
                            <div class="avatar avatar-sm">
                                <span class="avatar-title rounded-circle">AG</span>
                            </div>
                            <div class="user-name">Luke Ivory</div>
                        </div>

                        <div class="meta-action">
                            <div class="meta-likes">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
                                    <path
                                        d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                    </path>
                                </svg> 51
                            </div>

                            <div class="meta-view">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg> 250
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <div class="card component-card_9 col-lg-3 col-md-4 col-sm-6 ">
                <img src="assets/img/400x300.jpg" class="card-img-top" alt="widget-card-2">
                <div class="card-body">
                    <p class="meta-date">25 Jan 2020</p>

                    <h5 class="card-title">How to Start a Blog in 5 Easy Steps.</h5>
                    <p class="card-text">Vestibulum vestibulum tortor ut eros tincidunt, ut rutrum elit volutpat.
                    </p>

                    <div class="meta-info">
                        <div class="meta-user">
                            <div class="avatar avatar-sm">
                                <span class="avatar-title rounded-circle">AG</span>
                            </div>
                            <div class="user-name">Luke Ivory</div>
                        </div>

                        <div class="meta-action">
                            <div class="meta-likes">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
                                    <path
                                        d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                    </path>
                                </svg> 51
                            </div>

                            <div class="meta-view">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg> 250
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <div class="card component-card_9 col-lg-3 col-md-4 col-sm-6 ">
                <img src="assets/img/400x300.jpg" class="card-img-top" alt="widget-card-2">
                <div class="card-body">
                    <p class="meta-date">25 Jan 2020</p>

                    <h5 class="card-title">How to Start a Blog in 5 Easy Steps.</h5>
                    <p class="card-text">Vestibulum vestibulum tortor ut eros tincidunt, ut rutrum elit volutpat.
                    </p>

                    <div class="meta-info">
                        <div class="meta-user">
                            <div class="avatar avatar-sm">
                                <span class="avatar-title rounded-circle">AG</span>
                            </div>
                            <div class="user-name">Luke Ivory</div>
                        </div>

                        <div class="meta-action">
                            <div class="meta-likes">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
                                    <path
                                        d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                    </path>
                                </svg> 51
                            </div>

                            <div class="meta-view">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg> 250
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>



    </div>
@endsection
