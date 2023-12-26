@extends('layouts.app')
@section('content')
<!--**********************************
    Content body start
***********************************-->
<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Master Bahan Kimia</a></li>
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
                            <h4 class="card-title">List Master Bahan Kimia</h4>
                            @canany(['manage-master-bk'])
                            <button type="button" class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#createModal">
                                <i class="fa fa-plus"></i>
                                Add Master Bahan Kimia
                            </button>
                            @endcanany
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
                                        <th>Material Number</th>
                                        <th>Desc</th>
                                        <th>Maker</th>
                                        <th>LDK Maker</th>
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
                                            @if (!empty($row->ldk_fr_maker))
                                                <a class="badge badge-primary p-2" href="{{ Storage::url($row->ldk_fr_maker) }}" target="_blank">Show LDK</a>
                                            @else    
                                                No Doc
                                            @endif
                                        </td>
                                        <td>
                                            @switch($row->status_bk)
                                                @case(0)
                                                    @canany(['manage-master-bk'])
                                                    <button type="button" class="btn btn-xs btn-primary p-1 cta-review" data-toggle="modal" data-target="#reviewModal" onclick="document.getElementById('review_material_number').value = '{{ $row->material_number }}';document.getElementById('reviewForm').action = `/master_bk/reject/{{ $row->id }}`">Need Review</button>
                                                    @else
                                                    <span class="badge badge-primary p-2">Need Review</span>
                                                    @endcanany
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
                                            @canany(['view-master-bk'])
                                            <button type="button" class="btn btn-xs mb-1 btn-success cta-detail" data-toggle="modal" data-target="#detailModal" onclick="showModalDetail({{ $row->id }});"><i class="fa fa-eye"></i>&nbsp;Detail</button>
                                            @endcanany
                                            @canany(['manage-master-bk'])
                                            <button type="button" class="btn btn-xs btn-primary cta-edit" data-toggle="modal" data-target="#editModal" onclick="showModalEdit({{ $row->id }});"><i class="fa fa-edit"></i>Edit</button>
                                            <button type="button" class="btn btn-xs btn-danger cta-delete" data-toggle="modal" data-target="#deleteModal" onclick="showModalDelete({{ $row->id }});"><i class="fa fa-delete"></i>Delete</button>
                                            @endcanany
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
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
@canany(['view-master-bk'])
@include('master_bk.form.detail')
@endcanany
@canany(['manage-master-bk'])
@include('master_bk.form.add')
@include('master_bk.form.delete')
@include('master_bk.form.edit')
@endcanany
@canany(['manage-ldk'])
@include('master_bk.form.review')
@include('ldk.form.add')
@endcanany

@endsection