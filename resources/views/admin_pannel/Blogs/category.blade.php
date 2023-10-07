@extends('admin_pannel.layouts.master')
@section('title')
OnMediums || Category
@endsection
@section('content-pannel')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <h5 class="card-header"> {{isset($edit)? 'Edit':'Add'}} Category</h5>
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
                    <form action="{{isset($edit)?route('admin.categoryUpdate',$edit->id):route('admin.categoryAdd')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-lg-6 col-xl-6 col-xxl-6 col-md-12 col-sm-12">
                            <label for="category" class="form-label">Category</label>
                            <input type="text" class="form-control" id="category" placeholder="Enter ..." aria-describedby="category" name="category" value="{{$edit->category ?? ''}}">
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
            <h5 class="card-header">List Category</h5>
            <div class="card-body">
                <table class="datatables-basic table datatable table-responsive">

                    <thead>
                        <tr>
                            <th>Sr.No</th>
                            <th>Category</th>
                            <th>Is Active</th>
                            <th>Action</th>
                        </tr>

                    </thead>
                    <tbody>
                        @forelse ($categories as $category )
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $category->category }}</td>
                            <td><label class="switch switch-primary">
                                    <input type="checkbox" class="switch-input is_active" data-id="{{$category->id}}" {{$category->is_active == 1 ? 'checked' : ''}}>
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
                                                @php $cid=Crypt::encrypt($category->id); @endphp
                                                <a class="dropdown-item" href="{{route('admin.categoryEdit',$cid)}}"><i class="me-1" data-feather="check-square"></i><span class="align-middle">Edit</span></a>
                                                <a class="dropdown-item" href="" onclick="event.preventDefault();document.getElementById('delete-form-{{ $cid }}').submit();"><i class="me-1" data-feather="message-square"></i><span class="align-middle">Delete</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <form id="delete-form-{{ $cid }}" action="{{route('admin.categoryDelete',$cid)}}" method="post" style="display: none;">
                            @csrf
                        </form>
                        @empty

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
            var newurl = "{{ url('/admin/is_active') }}/" + statusId;
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
@endpush