@extends('admin/layout')
@section('page_title', 'Manage Contact')
@section('contact_select', 'active')

@section('container')

    <h3>Manage Contact </h3>

    <div class="row m-t-30">
        <div class="col-md-12">
            <div class="table-data__tool">
                <div class="table-data__tool-right ">
                    <a href=" ">
                        <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                            <i class="zmdi zmdi-back"></i>Back</button>
                    </a>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Manage About </div>
                <div class="card-body">
                    <form action="{{ route('admin.manage_home_process') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="row my-4">
                            <div class="form-group col-md-6">
                                <label for="name" class="control-label mb-1">Name</label>
                                {{-- <input type="hidden" name="id" class="form-control" value="{{ $id }}"> --}}
                                <input id="name" name="name" type="text" class="form-control"
                                    aria-required="true" aria-invalid="false" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="description" class="control-label mb-1">Description </label>
                                <input id="description" name="description" type="text" class="form-control"
                                   aria-required="true" aria-invalid="false" required>
                            </div>
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

</script>
