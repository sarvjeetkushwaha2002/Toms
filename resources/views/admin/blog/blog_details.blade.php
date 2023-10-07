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
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class=" row pt-3">
                    <div class="row justify-content-center">
                        <div class="col-xl-8">
                            <div>
                                <div class="text-center">
                                    <div class="mb-4">
                                        <a href="{{route('blogFrontend')}}" class="badge bg-light font-size-12">
                                            <i class="bx bx-purchase-tag-alt align-middle text-muted me-1"></i> Blog
                                        </a>
                                    </div>
                                    <h4>{{$blogDetail->title ??''}}</h4>
                                    <p class="text-muted mb-4"><i class="mdi mdi-calendar me-1"></i>{{$blogDetail->created_at ??''}}</p>
                                </div>

                                <hr>
                                <div class="text-center">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div>
                                                <p class="text-muted mb-2">Categories</p>
                                                <h5 class="font-size-15">{{$blogDetail->blogcategory->category ??''}}/{{$blogDetail->blogsubcategory->sub_category ??''}}</h5>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="mt-4 mt-sm-0">
                                                <p class="text-muted mb-2">Date</p>
                                                <h5 class="font-size-15">{{$blogDetail->created_at ??''}}</h5>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="mt-4 mt-sm-0">
                                                <p class="text-muted mb-2">Post by</p>
                                                <h5 class="font-size-15">OnMediums</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                @forelse ($blogDetail->images as $k=>$blog )
                                <div class="my-5">
                                    <img src="{{asset($blog->image ??'')}}" alt="" class="img-thumbnail mx-auto d-block">
                                </div>
                                <hr>
                                <div class="mt-4">
                                    <div class="text-muted font-size-14">
                                        <p>{!! $blog->description !!}
                                        </p>
                                        <hr>
                                    </div>
                                </div>
                                @empty

                                @endforelse
                                <!-- <div class="mt-4">

                                    <div class="mt-5">
                                        <h5 class="font-size-15"><i class="bx bx-message-dots text-muted align-middle me-1"></i> Comments :</h5>

                                        <div>
                                            <div class="d-flex py-3">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar-xs">
                                                        <div class="avatar-title rounded-circle bg-light text-primary">
                                                            <i class="bx bxs-user"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h5 class="font-size-14 mb-1">Delores Williams <small class="text-muted float-end">1 hr Ago</small></h5>
                                                    <p class="text-muted">If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual</p>
                                                    <div>
                                                        <a href="javascript: void(0);" class="text-success"><i class="mdi mdi-reply"></i> Reply</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex py-3 border-top">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar-xs">
                                                        <img src="assets/images/users/avatar-2.jpg" alt="" class="img-fluid d-block rounded-circle">
                                                    </div>
                                                </div>

                                                <div class="flex-grow-1">
                                                    <h5 class="font-size-14 mb-1">Clarence Smith <small class="text-muted float-end">2 hrs Ago</small></h5>
                                                    <p class="text-muted">Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet</p>
                                                    <div>
                                                        <a href="javascript: void(0);" class="text-success"><i class="mdi mdi-reply"></i> Reply</a>
                                                    </div>

                                                    <div class="d-flex pt-3">
                                                        <div class="flex-shrink-0 me-3">
                                                            <div class="avatar-xs">
                                                                <div class="avatar-title rounded-circle bg-light text-primary">
                                                                    <i class="bx bxs-user"></i>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="flex-grow-1">
                                                            <h5 class="font-size-14 mb-1">Silvia Martinez <small class="text-muted float-end">2 hrs Ago</small></h5>
                                                            <p class="text-muted">To take a trivial example, which of us ever undertakes laborious physical exercise</p>
                                                            <div>
                                                                <a href="javascript: void(0);" class="text-success"><i class="mdi mdi-reply"></i> Reply</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="d-flex py-3 border-top">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar-xs">
                                                        <div class="avatar-title rounded-circle bg-light text-primary">
                                                            <i class="bx bxs-user"></i>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="flex-grow-1">
                                                    <h5 class="font-size-14 mb-1">Keith McCoy <small class="text-muted float-end">12 Aug</small></h5>
                                                    <p class="text-muted">Donec posuere vulputate arcu. phasellus accumsan cursus velit</p>
                                                    <div>
                                                        <a href="javascript: void(0);" class="text-success"><i class="mdi mdi-reply"></i> Reply</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="mt-4">
                                        <h5 class="font-size-16 mb-3">Leave a Message</h5>

                                        <form>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="commentname-input" class="form-label">Name</label>
                                                        <input type="text" class="form-control" id="commentname-input" placeholder="Enter name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="commentemail-input" class="form-label">Email</label>
                                                        <input type="email" class="form-control" id="commentemail-input" placeholder="Enter email">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="commentmessage-input" class="form-label">Message</label>
                                                <textarea class="form-control" id="commentmessage-input" placeholder="Your message..." rows="3"></textarea>
                                            </div>

                                            <div class="text-end">
                                                <button type="submit" class="btn btn-success w-sm">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <h5>Relaited Post</h5>
                    @php
                    $blogs =App\Models\Blog::where('category_id', $blogDetail->category_id)->where('subcategory_id', $blogDetail->subcategory_id)->where('is_active', 1)->latest()->paginate(6);
                    @endphp
                    @forelse ($blogs as $blog )
                    <div class="col-sm-3 mb-3">
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
            <!-- end card body -->
        </div>
    </div>
</div>

@endsection
@push('scripts')

@endpush