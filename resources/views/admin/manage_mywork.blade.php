@extends('admin/layout')
@section('page_title', 'Manage Work')
@section('mywork_select', 'active')
<script src="https://cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script>
@section('container')

    <h3>Manage My work </h3>

    <div class="row m-t-30">
        <div class="col-md-12">
            <div class="table-data__tool">
                <div class="table-data__tool-right ">
                    <a href=" {{ route('admin.mywork') }}">
                        <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                            <i class="zmdi zmdi-back"></i>Back</button>
                    </a>
                </div>
            </div>
            @php
                $App = '';
                $web_template = '';
                $Website = '';
                $select = '';
            @endphp
            @error('image')
                <p>{{ $message }}</p>
            @enderror
            {{-- ======================== --}}
            <div class="card">
                <div class="card-header" style="background-color:rgb(168, 161, 161)">Add Project </div>
                <div class="card-body">
                    <form action="{{ route('admin.manage_mywork_process') }}" method="POST" enctype="multipart/form-data">
                        <div class="table-data__tool  " style="flex-direction: row ;">
                            @csrf
                            <div class="table-data__tool-right" style="margin-top:0px">
                                <span>Type of Project &nbsp:</span>
                                &nbsp
                                <div class="rs-select2--dark rs-select2--sm rs-select2--dark2" style="width:200px;">
                                    <select name='project_type' class="js-select2" id="project_type" required>
                                        @if ($project_category == 'App')
                                            {{ $App = 'selected' }}
                                        @elseif($project_category == 'Web Template')
                                            {{ $web_template = 'selected' }}
                                        @elseif ($project_category == 'Website')
                                            {{ $Website = 'selected' }}
                                        @else
                                            {{ $select = 'selected' }}
                                        @endif
                                        <option value="" {{ $select }}>Select Type</option>
                                        <option value="App" {{ $App }}>App</option>
                                        <option value="Web Template" {{ $web_template }}>Web Template</option>
                                        <option value="Website" {{ $Website }}>Website</option>

                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                            </div>

                        </div>
                        <hr>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="project_name" class="control-label mb-1">Name of Project</label>
                                <input type="hidden" id='id' name='id' value="{{ $id }}">
                                <input id="project_name" name="project_name" type="text" value="{{ $project_name }}"
                                    class="form-control" aria-required="true" aria-invalid="false" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="client_name" class="control-label mb-1">Client Name</label>
                                <input id="client_name" name="client_name" type="text" value="{{ $client_name }}"
                                    class="form-control" aria-required="true" aria-invalid="false" required>
                            </div>
                            <div class="form-group col-md-6 my-2">
                                <label for="from" class="control-label mb-1">From</label>
                                <input name="project_from" type="date" value="{{ $project_from }}"
                                    class="form-control" aria-required="true" aria-invalid="false" required>
                            </div>
                            <div class="form-group col-md-6 my-2">
                                <label for="to" class="control-label mb-1">To</label>
                                <input name="project_to" type="date" value="{{ $project_to }}"
                                    class="form-control" aria-required="true" aria-invalid="false" required>
                            </div>
                            
                             <div class="form-group col-md-4 my-3">
                                <label for="city" class="control-label mb-1">City</label>
                                <input id="city" name="city"  value="{{ $city }}"  type="text"
                                    class="form-control" aria-required="true" aria-invalid="false" required>
                            </div> 
                            
                             <div class="form-group col-md-4 my-3">
                                <label for="state" class="control-label mb-1">State</label>
                                <input id="state" name="state"   value="{{ $state }}"   type="text"
                                    class="form-control" aria-required="true" aria-invalid="false" required>
                            </div> 
                            <div class="form-group col-md-4 my-3">
                                <label for="project_url" class="control-label mb-1">Project URL</label>
                                <input id="project_url" name="project_url" type="text" value="{{ $project_url }}"
                                    class="form-control" aria-required="true" aria-invalid="false" required>
                            </div>
                             @php
                                $loop_counter = 1;
                            @endphp
                            <div class="row col-md-12 my-3">
                                <div class="row" id="skill_div">
                                    @foreach ($project_images as $key => $item)
                                        @php
                                            $images = (array) $item;
                                        @endphp
                                        <div class="col-md-4 " id='skill_box_{{ $loop_counter }}'>
                                            <div class="form-group has-success {{ $loop_counter++ }}">
                                                {{-- <input type="text" name="id" class="form-control" value="{{ $id }}"> --}}
                                                <label for="icon_link" class="control-label mb-1">Icon Link </label>
                                                <input type="hidden" id='image_id' name='image_id[]'
                                                    value="{{ $images['id'] }}">

                                                <input id="image" name="image[]" type="file"
                                                    class="form-control cc-name valid" data-val="true" aria-required="true"
                                                    value="{{ $images['image'] }}" aria-invalid="false">
                                            </div> <img src="{{ asset('/images/project_images/' . $images['image']) }}"
                                                style="width:150px;height:200px" alt="">
                                        </div>
                                        @if ($loop_counter == 2)
                                            <div class="col-md-2">
                                                <label for="icon_link" class="control-label" style="color: white">Add
                                                    icon
                                                </label>
                                                <button class="btn btn-primary" type="button" onclick="add_more_image()">Add

                                                    image</button>
                                            </div>
                                        @else
                                            <div class="col-md-2">
                                                <label for="icon_link" class="control-label" style="color: white">Add
                                                    icon
                                                </label>
                                                <a class="btn btn-danger" type="button"
                                                    href="  {{ route('admin.image_delete', ['id' => $images['id'], 'pid' => $pid]) }}">Remove
                                                    Image
                                                </a>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                             </div>
                            <div class="form-group col-md-12 my-2">
                                <label for="Description" class="control-label mb-1">Description</label>
                                <textarea name="description" id="desc" class="form-control" rows="5" style="resize: none"
                                    id="description">  {{ $description }}</textarea>
                            </div>

                            <button id="app-button" type="submit" class="btn btn-lg btn-info  my-2">
                                <i class="fa fa-save fa-lg"></i>&nbsp;Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        counter = 1;
        CKEDITOR.replace(desc);
        function add_more_image() {
            var html = '';
            counter++;

            html=' <div class="col-md-4 image_box_'+counter+' " id="image_box"> <div class="form-group has-success {{ $loop_counter++ }}">  <label for="icon_link" class="control-label mb-1">Icon Link </label>  <input type="hidden" id="image_id" name="image_id[]" > <input id="image" name="image[]" type="file"  class="form-control cc-name valid" data-val="true" aria-required="true" aria-invalid="false">  </div>  </div>'
                html+='  <div class="col-md-2 image_box_'+counter+'"> <label for="icon_link" class="control-label" style="color: white">Add  icon    </label>   <button class="btn btn-danger" onclick="remove_image('+counter+')" type="button" >Remove  Image  </button>  </div>'

             $('#skill_div').append(html);
        }

        function remove_image(counter) {
             $('.image_box_'+counter).remove();
            counter--
        }
    </script>
@endsection
