@extends('admin.layouts.master')
@section('title')
Blog
@endsection
@section('content-main')
<style>
    .small {
        display: none;
    }
</style>
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="{{route('indexDashboard')}}">Home /</a></span>Blog List</h4>
<div class="row">
    <div class="col-lg-8 col-xl-8 col-xxl-8 col-md-12 col-sm-12">
        <div class="card mb-3">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs justify-content-center " role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#form-tabs-personal" role="tab" aria-selected="false" tabindex="-1">
                            All Post
                        </button>
                    </li>
                    <!-- <li class="nav-item" role="presentation">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#form-tabs-account" role="tab" aria-selected="false" tabindex="-1">
                            Archive
                        </button>
                    </li> -->

                </ul>
            </div>

            <div class="tab-content">
                <!-- Personal Info -->
                <div class="tab-pane fade active show" id="form-tabs-personal" role="tabpanel">
                    <div class="row g-3 mb-3">
                        <div class="col mb-3">
                            @if ($blogs->isEmpty())
                            <div class="card p-1 border shadow-none">
                                No Found Data !
                            </div>
                            @else
                            <div class="card p-1 border shadow-none">
                                <div class="p-3">

                                    <h5><a href="{{route('blogDetails',$blogs->first()->slug)}}" class="text-dark">{{$blogs->first()->title ??''}}</a></h5>
                                    <p class="text-muted mb-0">{{$blogs->first()->created_at ??''}}</p>
                                </div>

                                <div class="position-relative">
                                    <a href="{{route('blogDetails',$blogs->first()->slug)}}"><img src="{{asset($blogs->first()->thumbnail ?? '')}}" alt="" class="img-thumbnail"></a>
                                </div>

                                <div class="p-3">
                                    <ul class="list-inline">
                                        <li class="list-inline-item me-3">
                                            <a href="javascript: void(0);" class="text-muted">
                                                <i class="bx bx-purchase-tag-alt align-middle text-muted me-1"> <b>{{$blogs->first()->blogcategory->category ??''}} / {{$blogs->first()->blogsubcategory->sub_category ??''}}</b></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item me-3">
                                            <a href="javascript: void(0);" class="text-muted">
                                                <!-- <i class="bx bx-comment-dots align-middle text-muted me-1"></i> 12 Comments -->
                                            </a>
                                        </li>
                                    </ul>
                                    <p>{!!$blogs->first()->images->first()->description ??''!!}</p>

                                    <div>
                                        <a href="{{route('blogDetails',$blogs->first()->slug)}}" class="text-primary">Read more <i class="mdi mdi-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="row">
                            @forelse ($blogs as $blog )
                            <div class="col-sm-6 mb-3">
                                <div class="card p-1 border shadow-none">
                                    <div class="p-3">
                                        <h5><a href="{{route('blogDetails',$blog->slug)}}" class="text-dark">{{$blog->title ??''}}</a></h5>
                                        <p class="text-muted mb-0">{{$blog->created_at ??''}}</p>
                                    </div>

                                    <div class="position-relative">
                                        <a href="{{route('blogDetails',$blog->slug)}}"><img src="{{asset($blog->thumbnail ?? '')}}" alt="" class="img-thumbnail"></a>
                                    </div>

                                    <div class="p-3">
                                        <ul class="list-inline">
                                            <li class="list-inline-item me-3">
                                                <a href="javascript: void(0);" class="text-muted">
                                                    <i class="bx bx-purchase-tag-alt align-middle text-muted me-1"> <b>{{$blog->blogcategory->category ??''}} / {{$blog->blogsubcategory->sub_category ??''}}</b></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item me-3">
                                                <a href="javascript: void(0);" class="text-muted">
                                                    <!-- <i class="bx bx-comment-dots align-middle text-muted me-1"></i> 12 Comments -->
                                                </a>
                                            </li>
                                        </ul>
                                        <p>{!! $blog->images->first()->description ??'' !!}</p>

                                        <div>
                                            <a href="{{route('blogDetails',$blog->slug)}}" class="text-primary">Read more <i class="mdi mdi-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="col mb-3">
                                <div class="card p-1 border shadow-none">
                                    No Found Data !
                                </div>
                            </div>
                            @endforelse
                            <div class="text-center">
                                <ul class="pagination justify-content-center pagination-rounded">
                                    {!!$blogs->links('pagination::bootstrap-5')!!}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-xl-4 col-xxl-4 col-md-12 col-sm-12">
        <div class="card mb-3">
            <div class="card-body p-4">
                <div class="search-box">
                    <p class="text-muted">Search</p>
                    <div class="position-relative">
                        <input type="text" class="form-control rounded bg-light border-light" placeholder="Search...">
                    </div>
                </div>

                <hr class="my-4">

                <div>
                    <p class="text-muted">Categories</p>

                    <ul class="list-unstyled fw-medium">
                        <li><a href="{{route('blogFrontend')}}" class="text-muted py-2 d-block filterCat "><i class="mdi mdi-chevron-right me-1"></i>{{strtoupper('All')}}</a>
                        </li>
                        @forelse ($categories as $category )
                        <li><a href="{{route('blogFrontend',$category->slug)}}" class="text-muted py-2 d-block filterCat"><i class="mdi mdi-chevron-right me-1"></i> {{strtoupper($category->category) ?? ''}} <span class="badge badge-soft-success badge-pill float-end ms-1 font-size-12">04</span></a>
                            <!-- <p class="text-muted ps-4"><u>Sub Categories</u></p>
                            <ul class="list-unstyled fw-medium ps-4">
                                @forelse ($category->subcategory as $subcategory )
                                <li>
                                    <a href="javascript: void(0);" class="text-muted py-2 d-block"><i class="mdi mdi-chevron-right me-1"></i> {{$subcategory->sub_category ?? ''}}</a>
                                </li>
                                @empty
                                <li>None</li>
                                @endforelse
                            </ul> -->
                        </li>
                        @empty
                        <li>None</li>
                        @endforelse
                    </ul>
                </div>
                <!-- 
                <hr class="my-4">

                <div>
                    <p class="text-muted mb-2">Popular Posts</p>

                    <div class="list-group list-group-flush">

                        <a href="javascript: void(0);" class="list-group-item text-muted py-3 px-2">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 me-3">

                                    <img src="{{asset('Upload\Blog\thumb1696512371661613896.jpg')}}" alt="" class="avatar-md  d-block rounded">
                                </div>
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="font-size-13 text-truncate">Beautiful Day with Friends</h5>
                                    <p class="mb-0 text-truncate">10 Apr, 2020</p>
                                </div>
                            </div>
                        </a>

                        <a href="javascript: void(0);" class="list-group-item text-muted py-3 px-2">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 me-3">
                                    <img src="{{asset('Upload\Blog\thumb1696512371661613896.jpg')}}" alt="" class="avatar-md  d-block rounded">
                                </div>
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="font-size-13 text-truncate">Drawing a sketch</h5>
                                    <p class="mb-0 text-truncate">24 Mar, 2020</p>
                                </div>
                            </div>
                        </a>

                        <a href="javascript: void(0);" class="list-group-item text-muted py-3 px-2">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 me-3">
                                    <img src="{{asset('Upload\Blog\thumb1696512371661613896.jpg')}}" alt="" class="avatar-md d-block rounded">
                                </div>
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="font-size-13 text-truncate">Project discussion with team</h5>
                                    <p class="mb-0 text-truncate">11 Mar, 2020</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')

@endpush