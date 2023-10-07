@extends('admin_pannel.layouts.master')
@section('title')
OnMediums || Sub Category
@endsection
@section('content-pannel')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <h5 class="card-header"> {{isset($edit)? 'Edit':'Add'}} Sub Category</h5>
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
                    <form action="{{isset($edit)?route('admin.subCategoryUpdate',$edit->id):route('admin.subCategoryAdd')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-lg-6 col-xl-6 col-xxl-6 col-md-12 col-sm-12 mb-2">
                            <label for="select2successpr" class="form-label">Category</label>
                            <div class="select2-primary" style="z-index: 999999999 !important;">
                                @php
                                $cat=\App\Models\Category::where('is_active',1)->get();
                                @endphp
                                <select id="select2pr" class="select2 form-select" name="category">
                                    @foreach($cat as $c)
                                    <option value="{{$c->id}}" {{isset($edit)?($edit->category_id == $c->id ? 'selected':''):''}}>{{$c->category}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-6 col-xxl-6 col-md-12 col-sm-12">
                            <label for="sub_category" class="form-label">Sub Category</label>
                            <input type="text" class="form-control" id="sub_category" placeholder="Enter ..." aria-describedby="sub_category" name="sub_category" value="{{$edit->sub_category ?? ''}}">
                        </div>
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
            <h5 class="card-header">List Sub Category</h5>
            <div class="card-body">
                <table class="datatables-basic table datatable table-responsive">

                    <thead>
                        <tr>
                            <th>Sr.No</th>
                            <th>Sub Category</th>
                            <th>Category</th>
                            <th>Is Active</th>
                            <th>Action</th>
                        </tr>

                    </thead>
                    <tbody>
                        @forelse ($sub_categories as $sub_category )
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $sub_category->sub_category }}</td>
                            <td>{{ $sub_category->category->category }}</td>
                            <td><label class="switch switch-primary">
                                    <input type="checkbox" class="switch-input is_active" data-id="{{$sub_category->id}}" {{$sub_category->is_active == 1 ? 'checked' : ''}}>
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
                                                @php $scid=Crypt::encrypt($sub_category->id); @endphp
                                                <a class="dropdown-item" href="{{route('admin.subCategoryEdit',$scid)}}"><i class="me-1" data-feather="check-square"></i><span class="align-middle">Edit</span></a>
                                                <a class="dropdown-item" href="" onclick="event.preventDefault();document.getElementById('delete-form-{{ $scid }}').submit();"><i class="me-1" data-feather="message-square"></i><span class="align-middle">Delete</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <form id="delete-form-{{ $scid }}" action="{{route('admin.subCategoryDelete',$scid)}}" method="post" style="display: none;">
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
        $(document).on('change', '.is_active', function() {
            var statusId = $(this).data('id');
            var isActive = $(this).is(':checked');
            var newurl = "{{ url('/admin/is_active-sub') }}/" + statusId;
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