@extends('admin/layout')
@section('page_title', 'Manage Home')
@section('home_select', 'active')

@section('container')

    <h3>Manage Home</h3>

    <div class="row m-t-30">

        <div class="col-md-12">
            <div class="table-data__tool">

                <div class="table-data__tool-right ">
                    <a href="{{ route('admin.home') }}">
                        <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                            <i class="zmdi zmdi-back"></i>Back</button>
                    </a>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Manage Home</div>
                <div class="card-body">

                    <form action="{{ route('admin.manage_home_process') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="row ">
                            <div class="form-group col-md-6">
                                <label for="name" class="control-label mb-1">Name</label>
                                <input type="hidden" name="id" class="form-control" value="{{ $id }}">
                                <input id="name" name="name" type="text" class="form-control" value="{{ $name }}"
                                    aria-required="true" aria-invalid="false" required>
                                @error('name')
                                    <div class="alert alert-danger  " role="alert">
                                        {{ $message }}
                                </div> @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="description" class="control-label mb-1">Description </label>
                                <input id="description" name="description" type="text" class="form-control"
                                    value="{{ $description }}" aria-required="true" aria-invalid="false" required>
                                @error('description')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                </div> @enderror
                            </div>
                        </div>
                        @php
                            if($image!=''){
                                $class='';
                            }else{
                                $class='required';
                            }
                        @endphp

                            
                         <div class="my-4 row">
                            <div class="form-group col-md-6">
                                <label for="description" class="control-label mb-1">Profile Pic </label>
                                <input id="profile_pic" name="profile_pic" type="file" class="form-control"
                                value="{{ $image }}"   {{ $class }}>
                                <img width="100px" height="100px" src="{{ asset('storages/media/profile_pic/'.$image) }}" alt="">
                                @error('description')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                </div> @enderror
                            </div>
                        </div>
                        <div id="icon_div">
                            @php
                                $loop_count = 1;
                            @endphp
                            @foreach ($icon_arr as $key => $value)
                                @php
                                    $value = (array) $value;
                                @endphp
                                <div class="row  col-md-12" id='social_icon_div_{{ $loop_count++ }}'>
                                    <div class="form-group col-md-6  ">
                                        <label for="icon_name" class="control-label mb-1">Icon Name</label>
                                        <input type="hidden" name="id" class="form-control" value="{{ $id }}">
                                        <input type="hidden" name="pid[]" class="form-control" value="{{ $value['id'] }}">
                                        <input id="icon_name" name="icon_name[]" value="{{ $value['icon_name'] }}"
                                            type="text" class="form-control" aria-required="true" aria-invalid="false"
                                            required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="icon_link" class="control-label mb-1">Icon Link </label>
                                        <input id="icon_link" name="icon_link[]" value="{{ $value['icon_link'] }}"
                                            type="text" class="form-control" aria-required="true" aria-invalid="false"
                                            required>
                                    </div>
                                    @if ($loop_count == 2)
                                        <div class="col-md-2">
                                            <label for="icon_link" class="control-label" style="color: white">Add icon
                                            </label>
                                            <button class="btn btn-primary" onclick="add_more()">Add more icon</button>
                                        </div>
                                    @else
                                        <div class="col-md-2">
                                            <label for="icon_link" class="control-label" style="color: white">Add icon
                                            </label>
                                            <a type="button"
                                                href="{{ route('admin.icon_delete', ['id' => $value['id'], 'profile_id' => $id]) }}"
                                                class="btn btn-danger "> <i class="fa fa-minus "></i>&nbsp;Remove </a>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                        <button id="brand-button" type="submit" class="btn btn-lg my-4 btn-info btn-block form-control">
                            <i class="fa fa-save fa-lg"></i>&nbsp;Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    var counter = 1


    function add_more() {
        counter++;
        var html = '';
        html = '<div class="row my-2 col-md-12 icon_div_'+ counter +'" id="social_icon_div_' + counter + '">'
        html +=
            ' <div class="form-group col-md-6"> <label for="icon_name"  class="control-label mb-1">Icon Name</label> <input type="hidden" name="pid[]" class="form-control" >  <input id="icon_name" name="icon_name[]" type="text" class="form-control"  aria-required="true" aria-invalid="false" required> </div>';
        html +=
            ' <div class="form-group col-md-4">   <label for="icon_link" class="control-label mb-1">Icon Link </label>  <input id="icon_link" name="icon_link[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required> </div>';
        html +=
            '  <div class="col-md-2"><label for="icon_link" class="control-label" style="color: white" >Add icon </label>   <a class="btn btn-danger" id=' +
            counter + ' onclick="remove(' + counter + ')"><i class="fa fa-minus "></i>&nbsp;Remove</a> </div>'
        html += '</div>'
        $('#icon_div').append(html)
    }

    function remove(counter) {
        $('.icon_div_' + counter).remove();
        counter--;
    }
</script>
