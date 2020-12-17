@extends('layouts.app')
@section('title')Bahan Baku @endsection
@section('content')
<div class="col-md-12">
    <!-- Material (floating) Register -->
    <div class="block block-themed @if(session()->has('status')) 'block-mode-hidden' @else {{$data->class}} @endif">
        <div class="block-header bg-gd-primary">
            <h3 class="block-title" style="font-size: 2rem;">{{$data->action}} Bahan baku </h3>
            <div class="block-options">
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                    <i class="si si-refresh"></i>
                </button>
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"><i class="si si-arrow-up"></i></button>
            </div>
        </div>
        <div class="block-content">
            <form action="{{ route('master.store',['bahanbaku', 'BB-']) }}" method="post"> @csrf
                <div class="form-group row">
                    <div class="col-12 col-sm-6 col-md-4 ">
                        <div class="form-material floating">
                            <input type="hidden" class="form-control" id="bahanbaku_id" name="bahanbaku_id" value="@php echo ($data->edit) ? $data->edit->bahanbaku_id: ''; @endphp">
                            @if($data->edit)
                            <input type="hidden" class="form-control" id="bahanbaku_nm_old" name="bahanbaku_nm_old" required value="@php echo ($data->edit) ? $data->edit->bahanbaku_nm: null; @endphp">
                            @endif
                            <input type="text" class="form-control" id="bahanbaku_nm" name="bahanbaku_nm" required value="@php echo ($data->edit) ? $data->edit->bahanbaku_nm: old('bahanbaku_nm'); @endphp">
                            @if(session()->has('status')) <p class="text-danger">{{ session()->get('status') }}</p> @endif
                            <label for="bahanbaku_nm">Nama Bahan Baku</label>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 ">
                        <div class="form-material floating">
                            <input type="number" min="0" class="form-control" id="bahanbaku_harga" name="bahanbaku_harga" required value="@php echo ($data->edit) ? $data->edit->bahanbaku_harga: old('bahanbaku_harga'); @endphp">
                            <label for="bahanbaku_harga">Harga Bahan Baku</label>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 ">
                        <div class="form-material floating">
                            <input type="number" min="0" class="form-control" id="bahanbaku_stok" name="bahanbaku_stok" required value="@php echo ($data->edit) ? $data->edit->bahanbaku_stok: old('bahanbaku_stok'); @endphp">
                            <label for="bahanbaku_stok">Stok Bahan Baku</label>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 ">
                        <div class="form-material floating">
                            <input type="text" class="form-control" id="bahanbaku_satuan" name="bahanbaku_satuan" required value="@php echo ($data->edit) ? $data->edit->bahanbaku_satuan: old('bahanbaku_satuan'); @endphp">
                            <label for="bahanbaku_satuan">Satuan Bahan Baku</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row"></div>
                <div class="dropdown-divider"></div>
                <div class="form-group row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-alt-primary">
                            <i class="fa fa-plus mr-5"></i> Submit
                        </button>
                        <button type="reset" class="btn btn-alt-secondary">
                            <i class="fa fa-minus mr-5"></i> Reset
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- END Material (floating) Register -->

    <div class="block block-themed">
        <div class="block-header bg-gd-primary">
            <h3 class="block-title" style="font-size: 2rem;">Daftar Bahan Baku </h3>
        </div>
        <div class="block-content">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover table-vcenter js-dataTable-full-pagination">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>NAMA</th>
                            <th class="text-right">HARGA</th>
                            <th>STOK</th>
                            <th>SATUAN</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no=1; @endphp
                        @foreach($data->list as $list)
                        <tr>
                            <td class="text-center">{{$no}}</td>
                            <td class="font-w600 text-uppercase text-primary">{{$list->bahanbaku_nm}}</td>
                            <td class="text-right" style="width: 15%;">@rp($list->bahanbaku_harga)</td>
                            <td>{{$list->bahanbaku_stok}}</td>
                            <td class="text-uppercase">{{$list->bahanbaku_satuan}}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{ route('master',['bahanbaku', $list->bahanbaku_id]) }}" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a class="btn btn-sm btn-danger" data-toggle="confirmation" data-popout="true" data-title="Hapus Data ini?" href="{{ route('delete',['bahanbaku', $list->bahanbaku_id]) }}"><i class="fa fa-times"></i></a>
                                </div>
                            </td>
                        </tr>
                        @php $no++; @endphp @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection