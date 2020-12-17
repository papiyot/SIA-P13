@extends('layouts.app')
@section('title')Produk @endsection
@section('content')
<div class="col-md-12">
    <!-- Material (floating) Register -->
    <div class="block block-themed @if(session()->has('status')) 'block-mode-hidden' @else {{$data->class}} @endif">
        <div class="block-header bg-gd-primary">
            <h3 class="block-title" style="font-size: 2rem;">{{$data->action}} Produk </h3>
            <div class="block-options">
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                    <i class="si si-refresh"></i>
                </button>
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"><i class="si si-arrow-up"></i></button>
            </div>
        </div>
        <div class="block-content">
            <form action="{{ route('master.store',['produk', 'PD-']) }}" method="post"> @csrf
                <div class="form-group row">
                    <div class="col-12 col-sm-6 col-md-4 ">
                        <div class="form-material floating">
                            <input type="hidden" class="form-control" id="produk_id" name="produk_id" value="@php echo ($data->edit) ? $data->edit->produk_id: ''; @endphp">
                            @if($data->edit)
                            <input type="hidden" class="form-control" id="produk_nm_old" name="produk_nm_old" required value="@php echo ($data->edit) ? $data->edit->produk_nm: null; @endphp">
                            @endif
                            <input type="text" class="form-control" id="produk_nm" name="produk_nm" required value="@php echo ($data->edit) ? $data->edit->produk_nm: old('produk_nm'); @endphp">
                            @if(session()->has('status')) <p class="text-danger">{{ session()->get('status') }}</p> @endif
                            <label for="produk_nm">Nama Produk</label>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 ">
                        <div class="form-material floating">
                            <input type="number" min="0" class="form-control" id="produk_harga" name="produk_harga" required value="@php echo ($data->edit) ? $data->edit->produk_harga: old('produk_harga'); @endphp">
                            <label for="produk_harga">Harga Produk</label>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 ">
                        <div class="form-material floating">
                            <input type="number" min="0" class="form-control" id="produk_stok" name="produk_stok" required value="@php echo ($data->edit) ? $data->edit->produk_stok: old('produk_stok'); @endphp">
                            <label for="produk_stok">Stok Produk</label>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 ">
                        <div class="form-material floating">
                            <input type="text" class="form-control" id="produk_satuan" name="produk_satuan" required value="@php echo ($data->edit) ? $data->edit->produk_satuan: old('produk_satuan'); @endphp">
                            <label for="produk_satuan">Satuan Produk</label>
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
            <h3 class="block-title" style="font-size: 2rem;">Daftar Produk </h3>
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
                            <td class="font-w600 text-uppercase text-primary">{{$list->produk_nm}}</td>
                            <td class="text-right" style="width: 15%;">@rp($list->produk_harga)</td>
                            <td>{{$list->produk_stok}}</td>
                            <td class="text-uppercase">{{$list->produk_satuan}}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{ route('master',['produk', $list->produk_id]) }}" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a class="btn btn-sm btn-danger" data-toggle="confirmation" data-popout="true" data-title="Hapus Data ini?" href="{{ route('delete',['produk', $list->produk_id]) }}"><i class="fa fa-times"></i></a>
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