@extends('admin_pannel.layouts.master')
@section('title')
OnMediums || Blog Media
@endsection
@section('content-pannel')
<div class="row">
    @if (isset($edit))
    <div class="col-12">
        <div class="card mb-4">
            <h5 class="card-header">Edit Blog Media</h5>
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
                    <form action="{{route('admin.blogMediaUpdate',$edit->id)}}" method="post" enctype="multipart/form-data">
                        @csrf


                        <div class="col-12">
                            <img src="{{asset($edit->image ?? '')}}" alt="" srcset="" height="50px" width="50px">
                            <label class="form-label">Image</label>
                            <input type="file" id="image" class="form-control " name="image" placeholder="Enter" />
                        </div>

                        <div class="col-12">
                            <label class="form-label" for="bootstrap-maxlength-example2">Description</label>
                            <textarea id="bootstrap-maxlength-example2" class="form-control bootstrap-maxlength-example" rows="3" maxlength="255" name="description">{!! $edit->description ??'' !!}</textarea>
                        </div>
                </div>
                <div class="col-lg-6 col-xl-6 col-xxl-6 col-md-12 col-sm-12 mt-4">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endif


<div class="col-12">
    <div class="card mb-4">
        <h5 class="card-header">List Blog Media</h5>
        <div class="card-body">
            <table class="datatables-basic table datatable table-responsive">

                <thead>
                    <tr>
                        <th>Sr.No</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>

                </thead>
                <tbody>
                    @forelse ($blogMedias as $blogMedia)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td><img src="{{asset($blogMedia->image ?? '')}}" alt="" srcset="" height="50px" width="50px"></td>
                        <td>{{ $blogMedia->description ??'' }}</td>
                        <td>
                            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                                <div class="mb-1 breadcrumb-right">
                                    <div class="dropdown">
                                        <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="grid"></i></button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            @php $bid=Crypt::encrypt($blogMedia->id); @endphp
                                            <a class="dropdown-item" href="{{route('admin.blogMediaEdit',$bid)}}"><i class="me-1" data-feather="check-square"></i><span class="align-middle">Edit</span></a>
                                            <a class="dropdown-item" href="" onclick="event.preventDefault();document.getElementById('delete-form-{{ $bid }}').submit();"><i class="me-1" data-feather="message-square"></i><span class="align-middle">Delete</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <form id="delete-form-{{ $bid }}" action="{{route('admin.blogMediaDelete',$bid)}}" method="post" style="display: none;">
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
@endpush