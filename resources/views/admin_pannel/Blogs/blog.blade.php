@extends('admin_pannel.layouts.master')
@section('title')
OnMediums || Blog
@endsection
@section('content-pannel')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <h5 class="card-header"> {{isset($edit)? 'Edit':'Add'}} Blog</h5>
            <div class="card-body">
                <div>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif
                </div>
                <div class="row">
                    <form action="{{isset($edit)?route('admin.blogUpdate',$edit->id):route('admin.blogAdd')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-xl-6 col-xxl-6 col-md-12 col-sm-12">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" placeholder="Enter ..." aria-describedby="title" name="title" value="{{$edit->title ?? ''}}">
                            </div>
                            <div class="col-lg-6 col-xl-6 col-xxl-6 col-md-12 col-sm-12">
                                <label for="meta_keyword" class="form-label">Meta Keyword</label>
                                <input type="text" class="form-control" id="meta_keyword" placeholder="Enter ..." aria-describedby="meta_keyword" name="meta_keyword" value="{{$edit->meta_keyword ?? ''}}">
                            </div>
                            <div class="col-lg-6 col-xl-6 col-xxl-6 col-md-12 col-sm-12">
                                <label for="meta_description" class="form-label">Meta Description</label>
                                <input type="text" class="form-control" id="meta_description" placeholder="Enter ..." aria-describedby="meta_description" name="meta_description" value="{{$edit->meta_description ?? ''}}">
                            </div>
                            <div class="col-lg-6 col-xl-6 col-xxl-6 col-md-12 col-sm-12 mb-2">
                                <label for="select2successpr" class="form-label">Category</label>
                                <div class="select2-primary" style="z-index: 999999999 !important;">
                                    @php
                                    $cat=\App\Models\Category::where('is_active',1)->get();
                                    @endphp
                                    <select id="category" class="select2 form-select" name="category">
                                        <option value="">--Select Category--</option>
                                        @foreach($cat as $c)
                                        <option value="{{$c->id}}" {{isset($edit)?($edit->category_id == $c->id ? 'selected':''):''}}>{{$c->category}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-6 col-xxl-6 col-md-12 col-sm-12 mb-2">
                                <label class="form-label" for="states">Sub Category</label>
                                <select id="sub_category" class="select2 form-select" data-allow-clear="true" name="sub_category">
                                    @if (isset($edit))
                                    @foreach($subs as $sub)
                                    <option value="{{$sub->id}}" {{$edit->subcategory_id == $sub->id ? 'selected':''}}>{{$sub->sub_category}}</option>
                                    @endforeach
                                    @else
                                    <option value="">--Select Sub_category--</option>
                                    @endif
                                </select>
                            </div>
                            <div class="col-lg-6 col-xl-6 col-xxl-6 col-md-12 col-sm-12">
                                @if (isset($edit))
                                <img src="{{asset($edit->thumbnail ?? '')}}" alt="" srcset="" height="50px" width="50px">
                                @endif
                                <label for="thumbnail" class="form-label">Thumbnail</label>
                                <input type="file" class="form-control" id="thumbnail" placeholder="Enter ..." aria-describedby="thumbnail" name="thumbnail" value="{{$edit->thumbnail ?? ''}}">
                            </div>
                        </div>
                        @if (isset($edit))

                        @else
                        <div class="row card-body mt-3 p-10 field_wrapper">
                            <div class="col-12">
                                <label class="form-label">Image 1 </label>
                                <input type="file" id="image" class="form-control " name="image[]" placeholder="Enter only on ends" required />
                            </div>

                            <div class="col-12">
                                <label class="form-label" for="bootstrap-maxlength-example2">Description 1</label>
                                <textarea id="bootstrap-maxlength-example2" class="form-control bootstrap-maxlength-example" rows="3" maxlength="255" name="description[]"></textarea>
                            </div>

                            <div class="row">
                                <div class="col-sm-1 mt-3">
                                    <a href="javascript:void(0);" class="add_button addButton btn btn-success" title="Add field">+</a>
                                </div>
                            </div>

                        </div>
                        @endif
                        <div class="col-lg-6 col-xl-6 col-xxl-6 col-md-12 col-sm-12 mt-4">
                            <button type="submit" class="btn btn-primary"> {{isset($edit)? 'Update':'Submit'}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card mb-4">
            <h5 class="card-header">List Blog</h5>
            <div class="card-body">
                <table class="datatables-basic table datatable table-responsive">

                    <thead>
                        <tr>
                            <th>Sr.No</th>
                            <th>Thumbnail</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Sub Category</th>
                            <th>Is Active</th>
                            <th>Action</th>
                        </tr>

                    </thead>
                    <tbody>
                        @forelse ($blogs as $blog )
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td><img src="{{asset($blog->thumbnail ?? '')}}" alt="" srcset="" height="50px" width="50px"></td>
                            <td>{{ $blog->title ??'' }}</td>
                            <td>{{ $blog->blogcategory->category ??'' }}</td>
                            <td>{{ $blog->blogsubcategory->sub_category ??''}}</td>
                            <td><label class="switch switch-primary">
                                    <input type="checkbox" class="switch-input is_active" data-id="{{$blog->id}}" {{$blog->is_active == 1 ? 'checked' : ''}}>
                                    <span class="switch-toggle-slider">
                                        <span class="switch-on">
                                            <i class="ti ti-check"></i>
                                        </span>
                                        <span class="switch-off">
                                            <i class="ti ti-x"></i>
                                        </span>
                                    </span>
                                </label></td>
                            <td>
                                <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                                    <div class="mb-1 breadcrumb-right">
                                        <div class="dropdown">
                                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="grid"></i></button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                @php $bid=Crypt::encrypt($blog->id); @endphp
                                                <a class="dropdown-item" href="{{route('admin.blogMediaList',$bid)}}"><i class="me-1" data-feather="check-square"></i><span class="align-middle">Step</span></a>
                                                <a class="dropdown-item" href="{{route('admin.blogEdit',$bid)}}"><i class="me-1" data-feather="check-square"></i><span class="align-middle">Edit</span></a>
                                                <a class="dropdown-item" href="" onclick="event.preventDefault();document.getElementById('delete-form-{{ $bid }}').submit();"><i class="me-1" data-feather="message-square"></i><span class="align-middle">Delete</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <form id="delete-form-{{ $bid }}" action="{{route('admin.blogDelete',$bid)}}" method="post" style="display: none;">
                            @csrf
                        </form>
                        @empty

                        <td>No Found Data !</td>
                        <td>No Found Data !</td>
                        <td>No Found Data !</td>
                        <td>No Found Data !</td>
                        <td>No Found Data !</td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')

<script>
    $(document).ready(function() {
        $(document).on('change', "#category", function() {
            $(this).find("option:selected").each(function() {
                var optionValue = $(this).attr("value");
                var newurl = "{{ url('admin/fetch-sub-category') }}/" + optionValue;
                $.ajax({
                    url: newurl,
                    method: 'get',
                    beforeSend: function() {
                        $('#sub_category').html('<option selected hidden>Fetching.......</option>');
                    },
                    success: function(p) {
                        $("#sub_category").html(p);
                    }
                });
            });
        }).change();
    });
</script>

<script>
    var addButton1 = $('.addButton');
    var wrapper1 = $('.field_wrapper');
    var i = 1;
    //Once add button is clicked
    $(addButton1).click(function() {
        var r = ++i;
        $(wrapper1).append('<div class="row card-body mt-3 p-10 field_wrapper" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">\
        <div class="col-12">\
                                <label class="form-label">Image ' + (r) + ' </label>\
                                <input type="file" id="image" class="form-control " name="image[]" placeholder="Enter only on ends" required />\
                            </div>\
                            <div class="col-12">\
                          <label class="form-label" for="bootstrap-maxlength-example2">Description ' + (r) + '</label>\
                          <textarea id="bootstrap-maxlength-example2" class="form-control bootstrap-maxlength-example" rows="3" maxlength="255" name="description[]"></textarea>\
                            </div>\
                                            <div class="row">\
                                                <div class="col-sm-1 mt-3">\
                                                <a href="javascript:new_link()" id="btn-btn" class="btn btn-danger fw-medium removeButton">-</a>\
                                                </div>\
                                            </div>\
                                        </div>'); //Add field html
    });


    //Once remove button is clicked
    $(wrapper1).on('click', '.removeButton', function(e) {
        e.preventDefault();
        $(this).closest('.field_wrapper').remove(); //Remove field html

    });
</script>

<script>
    $(document).ready(function() {
        $(document).on('change', '.is_active', function() {
            var statusId = $(this).data('id');
            var isActive = $(this).is(':checked');
            var newurl = "{{ url('/admin/is_active-blog') }}/" + statusId;
            $.ajax({
                url: newurl,
                type: 'get',
                success: function(response) {
                    location.reload();
                },
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#exampleModal').on('shown.bs.modal', function() {
            $('#select2success').select2({
                dropdownParent: $('#exampleModal')
            });
        });
    });
</script>
@endpush