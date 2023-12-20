@extends('layouts.app')
@section('content')
<!--**********************************
    Content body start
***********************************-->
<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Master BK</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">List</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Master BK</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Material Number</th>
                                        <th>Desc</th>
                                        <th>Maker</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($data_master_bk as $row)
                                    <tr>
                                        <td>{{ $no++}}</td>
                                        <td>{{ $row->material_number }}</td>
                                        <td>{{ $row->desc_item }}</td>
                                        <td>{{ $row->maker }}</td>
                                        <td>
                                            @switch($row->status_bk)
                                                @case(0)
                                                    <span class="badge badge-primary p-2">Need Review</span>
                                                    @break
                                                @case(1)
                                                    <span class="badge badge-danger p-2">Rejected</span>
                                                    @break
                                                @case(2)
                                                    <span class="badge badge-success p-2">Active</span>
                                                    @break
                                                @default
                                                    <span class="badge badge-danger p-2">Undefined</span>
                                                    @break
                                            @endswitch
                                        </td>
                                        <td>
                                            <a href="#modalEdit{{ $row->id }}" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i>Edit</a>
                                            <a href="#modalHapus{{ $row->id }}" class="btn btn-xs btn-danger"><i class="fa fa-delete"></i>Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Material Number</th>
                                        <th>Desc</th>
                                        <th>Maker</th>
                                        <th>Status</th>
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
@endsection