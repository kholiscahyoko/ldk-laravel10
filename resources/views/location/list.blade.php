@extends('layouts.app')
@section('content')
<!--**********************************
    Content body start
***********************************-->
<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Location</a></li>
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
                            <h4 class="card-title">List Location</h4>
                            <button type="button" class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#createModal">
                                <i class="fa fa-plus"></i>
                                Add Location
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                <li>Error Found: </li>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @elseif (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @elseif (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Material Number</th>
                                        <th>Location</th>
                                        <th>UOM</th>
                                        <th>Quantity</th>
                                        <th>PIC NRP</th>
                                        <th>PIC Name</th>
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
                                        <td>{{ $row->master_bk->material_number }}</td>
                                        <td>{{ $row->location }}</td>
                                        <td>{{ $row->uom }}</td>
                                        <td>{{ $row->qty }}</td>
                                        <td>{{ $row->pic_nrp }}</td>
                                        <td>{{ $row->pic_name }}</td>
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
                                        <th>Material ID</th>
                                        <th>Location</th>
                                        <th>UOM</th>
                                        <th>Quantity</th>
                                        <th>PIC NRP</th>
                                        <th>PIC Name</th>
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
@include('location.form.add')
@include('location.form.edit')
@include('location.form.delete')

@endsection