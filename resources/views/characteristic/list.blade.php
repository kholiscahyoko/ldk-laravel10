@extends('layouts.app')
@section('content')
<!--**********************************
    Content body start
***********************************-->
<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Characteristic</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">List</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">List Characteristic</h4>
                            <button type="button" class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#createModal">
                                <i class="fa fa-plus"></i>
                                Add Characteristic
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <ul>
                                <li>Error Found: </li>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @elseif (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <div>
                                    {{ session('error') }}
                                </div>
                            </div>
                        @elseif (session('success'))
                            <div class="alert alert-success alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <div>
                                    {{ session('success') }}
                                </div>
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Pictogram</th>
                                        <th>Notes</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($data as $row)
                                    <tr>
                                        <td>{{ $no++}}</td>
                                        <td>{{ $row->characteristic_name }}</td>
                                        <td>
                                            @if (!empty($row->pictogram))
                                                <img src="{{ Storage::url($row->pictogram) }}" alt="{{ $row->characteristic_name }}" class="img-thumbnail" style="max-width: 50px; border: none;">
                                            @else    
                                                No Image
                                            @endif
                                        </td>
                                        <td>{{ $row->notes }}</td>
                                        <td>{{ $row->created_at }}</td>
                                        <td>{{ $row->updated_at }}</td>
                                        <td>
                                            <button type="button" class="btn btn-xs btn-primary cta-edit" data-toggle="modal" data-target="#editModal" onclick="showModalEdit({{ $row->id }});"><i class="fa fa-edit"></i>Edit</button>
                                            <button type="button" class="btn btn-xs btn-danger cta-delete" data-toggle="modal" data-target="#deleteModal" onclick="showModalDelete({{ $row->id }});"><i class="fa fa-delete"></i>Delete</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>
<!--**********************************
    Content body end
***********************************-->
@include('characteristic.form.add')
@include('characteristic.form.edit')
@include('characteristic.form.delete')
@endsection