@extends('layouts.app')
@section('title')Pembelian Detail@endsection
@section('content')
<div class="col-md-12">
    <div class="row row-deck gutters-tiny">
        <!-- Billing Address -->
        <div class="col-md-12">
            <div class="block block-themed block-rounded">
                <div class="block-header bg-gd-primary">
                    <h3 class="block-title" style="font-size: 2rem;">{{$data->action}} Pembelian Detail</h3>
                    <div class="block-options">
                        {{$data->date}}
                    </div>
                </div>

                <div class="block-content">
                    <form action="{{ route('master.store',['beli_detail', 'BD-']) }}" method="post"> @csrf
                        <div class="form-group row">
                            <div class="col-12 col-sm-12 col-md-4">
                                <div class="form-material">
                                    <input type="hidden" class="form-control" id="beli_detail_id" name="beli_detail_id" value="@php echo ($data->edit) ? $data->edit->beli_detail_id: ''; @endphp">
                                    <select class="js-select2 form-control" id="beli_id" name="beli_id" required style="width: 100%;">
                                        <option>--Pilih Data--</option>
                                        @foreach($data->beli as $beli)
                                        <option value="{{$beli->beli_id}}" @php echo ($data->edit) ? ($data->edit->beli_id == $beli->beli_id) ? 'selected': '' : null; @endphp>{{$beli->beli_id}} [ {{$beli->beli_id}} ]</option>
                                        @endforeach
                                    </select>
                                    <label for="beli_id">Kode beli</label>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-4">
                                <select class="js-select2 form-control" id="bahanbaku_id" name="bahanbaku_id" required style="width: 100%;">
                                    <option>--Pilih Data--</option>
                                    @foreach($data->bahanbaku as $bahanbaku)
                                    <option value="{{$bahanbaku->bahanbaku_id}}" @php echo ($data->edit) ? ($data->edit->bahanbaku_id == $bahanbaku->bahanbaku_id) ? 'selected': '' : null; @endphp>{{$bahanbaku->bahanbaku_id}} [ {{$bahanbaku->bahanbaku_nm}} ]</option>
                                    @endforeach
                                </select>
                                <label for="bahanbaku_id">Bahan Baku</label>
                            </div>
                            <div class="col-12 col-sm-12 col-md-4">
                                <div class="form-material">
                                    @php 
                                    $jumlah = ($data->edit) ? floatval($data->edit->beli_detail_harga):null; 
                                    @endphp
                                    <input type="number" min="0" class="form-control" id="beli_detail_harga" value="@php echo ($data->edit) ? $data->edit->beli_detail_harga: ''; @endphp" name="beli_detail_harga" required>
                                    <label for="beli_detail_harga">Harga</label>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-4">
                                <div class="form-material">
                                    <input type="number" min="0" class="form-control" id="beli_detail_jml" value="@php echo ($data->edit) ? $data->edit->beli_detail_jml: ''; @endphp" name="beli_detail_jml" required>
                                    <label for="beli_detail_jml">Jumlah</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row"></div>
                        <div class="dropdown-divider"></div>
                        <div class="form-group row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-alt-primary">
                                    <i class="fa fa-plus mr-5"></i> Tambah
                                </button>
                                <button type="reset" class="btn btn-alt-secondary">
                                    <i class="fa fa-minus mr-5"></i> Reset
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- END Billing Address -->

    </div>
    <div class="block block-themed block-rounded">
        <div class="block-header bg-gd-primary">
            <h3 class="block-title" style="font-size: 2rem;">Daftar Pembelian Detail</h3>
        </div>
        <div class="block-content">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover table-vcenter js-dataTable-full-pagination">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 50px;">#</th>
                            <th>beli</th>
                            <th>bahan baku</th>
                            <th>Jumlah</th>
                            <th class="text-right" style="width: 30%;">Harga</th>
                            <th class="text-center" style="width: 100px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no=1; $tot=0; @endphp
                        @foreach($data->list as $list)
                        <tr>
                            <td class="text-center">{{$no}}</td>
                            <td class="font-w600 text-secondary text-uppercase"> {{$list->beli_id}}</td>
                            <td class="font-w600 text-uppercase text-primary">
                            @foreach($data->bahanbaku as $bahanbaku)
                            @php echo ($list->bahanbaku_id == $bahanbaku->bahanbaku_id) ? $bahanbaku->bahanbaku_nm: null; @endphp
                            @endforeach
                            </td>
                            <td class="font-w600 text-secondary text-uppercase"> {{$list->beli_detail_jml}}</td>
                            <td class="text-right text-primary"> @rp($list->beli_detail_harga)</td>
                            @php $tot=$tot+$list->beli_detail_harga; @endphp
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{ route('master',['beli_detail', $list->beli_detail_id]) }}" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a class="btn btn-sm btn-danger" data-toggle="confirmation" data-popout="true" data-title="Hapus Data ini?" href="{{ route('delete',['beli_detail', $list->beli_detail_id]) }}"><i class="fa fa-times"></i></a>
                                </div>
                            </td>
                        </tr>
                        @php $no++; @endphp @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="text-right font-w600 text-uppercase text-primary">Total :</td>
                            <td colspan="2" class="text-left font-w600 text-uppercase text-primary">@rp($tot)</td>
                        </tr>
                    </tfoot>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection