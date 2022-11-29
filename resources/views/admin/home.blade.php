@extends('admin/layout')
@section('page_title', 'Home Manager')
@section('home_select','active')
@section('container')
    <h3>Banner Manager</h3>
    <div class="row m-t-30">
        <div class="col-md-12">
            <!-- DATA TABLE-->
            <div class="table-data__tool" style="flex-direction: row">
                <div class="table-data__tool-left">
                    <div class="rs-select2--light rs-select2--md">
                        <select class="js-select2" name="property">
                            <option selected="selected">All Properties</option>
                            <option value="">Option 1</option>
                            <option value="">Option 2</option>
                        </select>
                        <div class="dropDownSelect2"></div>
                    </div>
                    <div class="rs-select2--light rs-select2--sm">
                        <select class="js-select2" name="time">
                            <option selected="selected">Today</option>
                            <option value="">3 Days</option>
                            <option value="">1 Week</option>
                        </select>
                        <div class="dropDownSelect2"></div>
                    </div>
                    <button class="au-btn-filter">
                        <i class="zmdi zmdi-filter-list"></i>filters</button>
                </div>
                <div class="table-data__tool-right" style="margin-top:0px">
                    <a href=" {{ route('admin.manage_home') }}" class="mb-2">
                        <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                            <i class="zmdi zmdi-plus"></i>Add Profile</button>
                    </a>
                    <div class="rs-select2--dark rs-select2--sm rs-select2--dark2"  >
                        <select class="js-select2" name="type">
                            <option selected="selected">Export</option>
                            <option value="">Option 1</option>
                            <option value="">Option 2</option>
                        </select>
                        <div class="dropDownSelect2"></div>
                    </div>
                </div>
            </div>
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Icons</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                             @foreach ($data as $item)
                           <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->description }}</td>
                                   @if ($item->status == 1)
                                    <td class="process">
                                        <a class="process"
                                            href="{{ route('admin.home_status',[0,'id'=> $item->id ]) }}">
                                            Active
                                        </a>
                                    </td>
                                @elseif($item->status== 0)
                                    <td class="denied">
                                        <a class="denied"
                                            href="{{ route('admin.home_status',[1,'id'=> $item->id ]) }}">
                                            Deactive
                                        </a>
                                    </td>
                                @endif
                                  <td style="padding-right: 10px;">
                                    <div class="table-data-feature">

                                        <a class="item"
                                            href="{{ route('admin.manage_home',['id'=>$item->id]) }}"
                                            data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="zmdi zmdi-edit"></i>
                                        </a>
                                        <a class="item" href="{{ route('admin.home_delete',['id'=>$item->id]) }}  "
                                            data-toggle="tooltip" id="{{ $item->id }}" data-placement="top"
                                            title="Delete">
                                            <i class="zmdi zmdi-delete"></i>
                                        </a>
                                        <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                            <i class="zmdi zmdi-more"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- END DATA TABLE-->
        </div>
    </div>
@endsection
