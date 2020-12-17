@extends('layouts.app')
@section('title')Pembelian @endsection
@section('content')
<div class="col-md-12">
    <div class="row row-deck gutters-tiny">
        <!-- Billing Address -->
        <div class="col-md-12">
            <div class="block block-themed block-rounded">
                <div class="block-header bg-gd-primary">
                    <h3 class="block-title" style="font-size: 2rem;">{{$data->action}} Pembelian </h3>
                    <div class="block-options">
                        {{$data->date}}
                    </div>
                </div>

                <div class="block-content">
                    <form action="{{ route('master.store',['beli', 'BL-']) }}" method="post"> @csrf
                        <div class="form-group row">
                            <div class="col-12 col-sm-12 col-md-4">
                                <div class="form-material">
                                    <input type="hidden" class="form-control" id="beli_id" name="beli_id" value="@php echo ($data->edit) ? $data->edit->beli_id: ''; @endphp">
                                    <select class="js-select2 form-control" id="pemasok_id" name="pemasok_id" required style="width: 100%;">
                                        <option>--Pilih Data--</option>
                                        @foreach($data->pemasok as $pemasok)
                                        <option value="{{$pemasok->pemasok_id}}" @php echo ($data->edit) ? ($data->edit->pemasok_id == $pemasok->pemasok_id) ? 'selected': '' : null; @endphp>{{$pemasok->pemasok_id}} [ {{$pemasok->pemasok_nm}} ]</option>
                                        @endforeach
                                    </select>
                                    <label for="pemasok_id">Kode Pemasok</label>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-4">
                                <div class="form-material">
                                    @php 
                                    $jumlah = ($data->edit) ? floatval($data->edit->beli_total):null; 
                                    @endphp
                                    <input type="number" min="0" class="form-control" id="beli_total" value="@php echo ($data->edit) ? $data->edit->beli_total: ''; @endphp" name="beli_total" required>
                                    <label for="beli_total">Nominal Pembelian</label>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-4">
                                <div class="form-material">
                                    <input type="date" class="form-control" id="beli_tgl" value="@php echo ($data->edit) ? $data->edit->beli_tgl: ''; @endphp" name="beli_tgl" required>
                                    <label for="beli_tgl">Tanggal Pembelian</label>
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
            <h3 class="block-title" style="font-size: 2rem;">Daftar Pembelian</h3>
        </div>
        <div class="block-content">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover table-vcenter js-dataTable-full-pagination">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 50px;">#</th>
                            <th>Pemasok</th>
                            <th>Tanggal</th>
                            <th class="text-right" style="width: 30%;">Nominal</th>
                            <th class="text-center" style="width: 100px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no=1; $tot=0; @endphp
                        @foreach($data->list as $list)
                        <tr>
                            <td class="text-center">{{$no}}</td>
                            <td class="font-w600 text-uppercase text-primary">
                            @foreach($data->pemasok as $pemasok)
                            @php echo ($list->pemasok_id == $pemasok->pemasok_id) ? $pemasok->pemasok_nm: null; @endphp
                            @endforeach
                            </td>
                            <td class="font-w600 text-secondary text-uppercase"> @date($list->beli_tgl)</td>
                            <td class="text-right text-primary"> @rp($list->beli_total)</td>
                            @php $tot=$tot+$list->beli_total; @endphp
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{ route('master',['beli', $list->beli_id]) }}" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a class="btn btn-sm btn-danger" data-toggle="confirmation" data-popout="true" data-title="Hapus Data ini?" href="{{ route('delete',['beli', $list->beli_id]) }}"><i class="fa fa-times"></i></a>
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