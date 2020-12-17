@extends('layouts.app')
@section('title')Produk Detail@endsection
@section('content')
<div class="col-md-12">
    <div class="row row-deck gutters-tiny">
        <!-- Billing Address -->
        <div class="col-md-12">
            <div class="block block-themed block-rounded">
                <div class="block-header bg-gd-primary">
                    <h3 class="block-title" style="font-size: 2rem;">{{$data->action}} Produk Detail</h3>
                    <div class="block-options">
                        {{$data->date}}
                    </div>
                </div>

                <div class="block-content">
                    <form action="{{ route('master.store',['produk_detail', 'BD-']) }}" method="post"> @csrf
                        <div class="form-group row">
                            <div class="col-12 col-sm-12 col-md-4">
                                <div class="form-material">
                                    <input type="hidden" class="form-control" id="produk_detail_id" name="produk_detail_id" value="@php echo ($data->edit) ? $data->edit->produk_detail_id: ''; @endphp">
                                    <select class="js-select2 form-control" id="produk_id" name="produk_id" required style="width: 100%;">
                                        <option>--Pilih Data--</option>
                                        @foreach($data->produk as $produk)
                                        <option value="{{$produk->produk_id}}" @php echo ($data->edit) ? ($data->edit->produk_id == $produk->produk_id) ? 'selected': '' : null; @endphp>{{$produk->produk_id}} [ {{$produk->produk_nm}} ]</option>
                                        @endforeach
                                    </select>
                                    <label for="produk_id">Kode Produk</label>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-4">
                                <div class="form-material">
                                    <select class="js-select2 form-control" id="bahanbaku_id" name="bahanbaku_id" required style="width: 100%;">
                                        <option>--Pilih Data--</option>
                                        @foreach($data->bahanbaku as $bahanbaku)
                                        <option value="{{$bahanbaku->bahanbaku_id}}" @php echo ($data->edit) ? ($data->edit->bahanbaku_id == $bahanbaku->bahanbaku_id) ? 'selected': '' : null; @endphp>{{$bahanbaku->bahanbaku_id}} [ {{$bahanbaku->bahanbaku_nm}} ]</option>
                                        @endforeach
                                    </select>
                                    <label for="bahanbaku_id">Bahan Baku</label>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-4">
                                <div class="form-material">
                                    <input type="date" class="form-control" id="produk_detail_tgl_bhn" value="@php echo ($data->edit) ? $data->edit->produk_detail_tgl_bhn: ''; @endphp" name="produk_detail_tgl_bhn" required>
                                    <label for="produk_detail_tgl_bhn">Tanggal Produksi</label>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-4">
                                <div class="form-material">
                                    <input type="number" min="0" class="form-control" id="produk_detail_jml_bhn" value="@php echo ($data->edit) ? $data->edit->produk_detail_jml_bhn: ''; @endphp" name="produk_detail_jml_bhn" required>
                                    <label for="produk_detail_jml_bhn">Jumlah</label>
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
            <h3 class="block-title" style="font-size: 2rem;">Daftar Produk Detail</h3>
        </div>
        <div class="block-content">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover table-vcenter js-dataTable-full-pagination">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 50px;">#</th>
                            <th>Produk</th>
                            <th>bahan baku</th>
                            <th>Tanggal Produksi</th>
                            <th class="text-right" style="width: 30%;">Jumlah</th>
                            <th class="text-center" style="width: 100px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no=1; $tot=0; @endphp
                        @foreach($data->list as $list)
                        <tr>
                            <td class="text-center">{{$no}}</td>
                            <td class="font-w600 text-secondary text-uppercase">
                            @foreach($data->produk as $produk)
                            @php echo ($list->produk_id == $produk->produk_id) ? $produk->produk_nm: null; @endphp
                            @endforeach
                            </td>
                            <td class="font-w600 text-uppercase text-primary">
                            @foreach($data->bahanbaku as $bahanbaku)
                            @php echo ($list->bahanbaku_id == $bahanbaku->bahanbaku_id) ? $bahanbaku->bahanbaku_nm: null; @endphp
                            @endforeach
                            </td>
                            <td class="font-w600 text-secondary text-uppercase"> @date($list->produk_detail_tgl_bhn)</td>
                            <td class="text-right text-primary"> {{$list->produk_detail_jml_bhn}}</td>
                            @php $tot=$tot+$list->produk_detail_jml_bhn; @endphp
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{ route('master',['produk_detail', $list->produk_detail_id]) }}" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a class="btn btn-sm btn-danger" data-toggle="confirmation" data-popout="true" data-title="Hapus Data ini?" href="{{ route('delete',['produk_detail', $list->produk_detail_id]) }}"><i class="fa fa-times"></i></a>
                                </div>
                            </td>
                        </tr>
                        @php $no++; @endphp @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="text-right font-w600 text-uppercase text-primary">Total :</td>
                            <td colspan="2" class="text-left font-w600 text-uppercase text-primary">{{$tot}}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection