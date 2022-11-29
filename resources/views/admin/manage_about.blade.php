@extends('admin/layout')
@section('page_title', 'Manage About')
@section('about_select', 'active')

@section('container')

    <h3>Manage About </h3>

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
                    <form action=" {{ route('admin.manage_about_process') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="field_name" class="control-label mb-1">Field Name</label>
                                <input type="hidden" name="id" class="form-control">
                                <input id="field_name" name="field_name" type="text" class="form-control"
                                    aria-required="true" aria-invalid="false" value='{{ $about[0]->field_name }}' required>
                                @error('field_name')
                                    <div class="alert alert-danger  " role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-12 my-3">
                                <label for="short_desc" class="control-label mb-1">Shor Description</label>
                                <div>
                                    <textarea class="ckeditor" name="short_desc">{{ $about[0]->short_desc }}</textarea>
                                </div>

                                {{-- <input id="short_desc" name="short_desc" style="height: 100px" type="text"
                                    class="form-control" aria-required="true" value='{{ $about[0]->short_desc }}'
                                    aria-invalid="false" required> --}}
                                @error('short_desc')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4 my-3">
                                <label for="birthday" class="control-label mb-1">Birthday</label>
                                <input id="birthday" name="birthday" type="date" onchange="defage()"
                                    value='{{ $about[0]->birthday }}' class="form-control" aria-required="true"
                                    aria-invalid="false" required>
                            </div>
                            <div class="form-group col-md-2 my-3">
                                <label for="age" class="control-label mb-1">Age</label>
                                <input id="age" readonly name="age" type="text" class="form-control"
                                    value='{{ $about[0]->age }}' aria-required="true" aria-invalid="false" required>
                            </div>
                            {{-- <div class="form-group col-md-3 my-3">
                                <label for="degree" class="control-label mb-1">Degree</label>
                                <input id="degree" name="degree" type="text" value='{{ $about[0]->degree }}'
                                    class="form-control" aria-required="true" aria-invalid="false" required>
                                @error('degree')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                </div> @enderror
                            </div> --}}
                            <div class="form-group col-md-6 my-4" style="padding-top:20px;">
                                <div class="input-group col-md-4   ">
                                    <span class="input-group-text" id="basic-addon3">https://</span>
                                    <input id="website" name="website" class="form-control" type="text"
                                        value='{{ $about[0]->website }}'aria-describedby="basic-addon3">
                                </div>
                            </div>
                            {{-- <div class="form-group col-md-4 my-3">
                                <label for="website" class="control-label mb-1">Web Site</label>
                                <input id="website" name="website" type="text" value='{{ $about[0]->website }}'
                                    class="form-control" aria-required="true" aria-invalid="false" required>
 
                            </div> --}}
                            <div class="form-group col-md-4 my-3">
                                <label for="phone" class="control-label mb-1">Phone</label>
                                <input id="phone" name="phone" type="text" value='{{ $about[0]->phone }}'
                                    class="form-control" aria-required="true" aria-invalid="false" required>
                                @error('phone')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4 my-3">
                                <label for="email" class="control-label mb-1">Email</label>
                                <input id="email" name="email" type="text" value='{{ $about[0]->email }}'
                                    class="form-control" aria-required="true" aria-invalid="false" required>
                                @error('email')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4 my-3">
                                <label for="city" class="control-label mb-1">City</label>
                                <input id="city" name="city" type="text" value='{{ $about[0]->city }}'
                                    class="form-control" aria-required="true" aria-invalid="false" required>
                                @error('city')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="table-data__tool  my-5 col-md-6" style="flex-direction: row ">
                                <div class="table-data__tool-right" style="margin-top:0px">
                                    <span>Freelance &nbsp:</span>
                                    &nbsp
                                    <div class="rs-select2--dark rs-select2--sm rs-select2--dark2" style="width:200px">
                                        <select name='freelance' class="js-select2" id="freelance" required>
                                            @if ($about[0]->freelance == 'available')
                                                <option selected value="available">Available</option>
                                                <option value="not_available">Not Available</option>
                                            @else
                                                <option value="available">Available</option>
                                                <option selected value="not_available">Not Available</option>
                                            @endif
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                </div>
                            </div>
                            @php
                                $select1 = '';
                                $select2 = '';
                                $select3 = '';
                                $select4 = '';
                                $select5 = '';
                            @endphp
                            <div class="table-data__tool my-5 col-md-6" style="flex-direction: row;float: right; ">
                                <div class="table-data__tool-right" style="margin-top:0px">
                                    <span>Degree &nbsp:</span>
                                    &nbsp
                                    <div class="rs-select2--dark rs-select2--sm rs-select2--dark2" style="width:200px">
                                        <select name='degree' class="js-select2" id="degree" required>

                                            @if ($about[0]->degree == '10th')
                                                {{ $select1 = 'selected' }}
                                            @elseif($about[0]->degree == '12th')
                                                {{ $select2 = 'selected' }}
                                            @elseif($about[0]->degree == 'bachelor')
                                                {{ $select3 = 'selected' }}
                                            @elseif($about[0]->degree == 'master')
                                                {{ $select4 = 'selected' }}
                                            @else
                                                {{ $select5 = 'selected' }}
                                            @endif
                                            <option value="10th" {{ $select1 }}>10th</option>
                                            <option value="12th" {{ $select2 }}>12th</option>
                                            <option value="bachelor" {{ $select3 }}>Bachelor</option>
                                            <option value="master" {{ $select4 }}>Master</option>
                                            <option value="other" {{ $select5 }}>Other</option>
                                        </select>
                                        <div class="dropDownSelect2">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group  my-3">
                                <label for="long_description" class="control-label mb-1">Long description</label>
                                <textarea id="long_description" rows="5" style="resize: none" name="long_description" type="text"
                                    class="form-control ckeditor" required>{{ $about[0]->description }}</textarea>
                            </div>
                            @error('long_description')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror

                            <div class="form-group col-md-3 my-3">
                                <label for="happy_clients" class="control-label mb-1">Happy Clients</label>
                                <input id="happy_clients" name="happy_clients" type="text"
                                    value='{{ $about[0]->happy_client }}' class="form-control" aria-required="true"
                                    aria-invalid="false" required>
                                @error('happy_clients')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-3 my-3">
                                <label for="projects" class="control-label mb-1">Projects</label>
                                <input id="projects" name="projects" type="text" value='{{ $about[0]->projects }}'
                                    class="form-control" aria-required="true" aria-invalid="false" required>
                                @error('projects')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-3 my-3">
                                <label for="support_hour" class="control-label mb-1">Hours of support</label>
                                <input id="support_hour" name="support_hour" type="text"
                                    value='{{ $about[0]->support }}' class="form-control" aria-required="true"
                                    aria-invalid="false" required>
                                @error('support_hour')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-3 my-3">
                                <label for="awards" class="control-label mb-1">Awards</label>
                                <input id="awards" name="awards" type="text" value='{{ $about[0]->awards }}'
                                    class="form-control" aria-required="true" aria-invalid="false" required>
                                @error('awards')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            {{-- skills --}}
                            @php
                                $loop_counter = 1;
                            @endphp
                            <div class=" col-lg-12 my-3">
                                <div class="card">
                                    <div class="card-header" style="background-color:rgb(168, 161, 161)">Product Images
                                    </div>
                                    <div class="card-body ">
                                        <div class="row" id="skill_div">
                                            @foreach ($skills as $key => $item)
                                                <div class="col-md-3 skill_box_{{ $key }}"
                                                    id='skill_box_{{ $loop_counter }}'>
                                                    <div class="form-group has-success {{ $loop_counter++ }} ">
                                                        {{-- <input type="text" name="id" class="form-control" value="{{ $id }}"> --}}
                                                        <input type="hidden" name="skill_id[]"
                                                            value="{{ $item->id }}" class="form-control">
                                                        <label for=" skill" class="control-label mb-1">Skills</label>
                                                        <input id=" skill" name=" skill[]"
                                                            value="{{ $item->skill }}" type="text"
                                                            class="form-control cc-name valid">
                                                    </div>
                                                </div>
                                                <div class="col-md-1 skill_box_{{ $key }}"><label for="%"
                                                        class="control-label mb-1">%</label>
                                                    <input id="per" name="per[]" value="{{ $item->percent }}"
                                                        type="text" class="form-control cc-name valid">
                                                </div>
                                                @if ($loop_counter == 2)
                                                    <div class="col-md-2 skill_box_{{ $key }}">
                                                        <label for="icon_link" class="control-label"
                                                            style="color: white">Add
                                                            icon
                                                        </label>
                                                        <button type="button" onclick="add_more_skill()"
                                                            class="btn  btn-success btn-block">
                                                            <i class="fa fa-plus "></i>&nbsp;Add Skill
                                                        </button>
                                                    </div>
                                                @else
                                                    <div class="col-md-2 skill_box_{{ $key }}">
                                                        <label for="icon_link" class="control-label "
                                                            style="color: white">Add
                                                            icon
                                                        </label>
                                                        <a type="button"
                                                            {{-- href="  {{ route('admin.skills_delete', ['id' => $item->id]) }}" --}}
                                                            href=" j"
                                                            class="btn btn-danger "> <i
                                                                class="fa fa-minus "></i>&nbsp;Remove </a>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        {{-- @endforeach --}}
                                    </div>
                                </div>
                            </div>

                            {{-- interest --}}
                            <div class=" col-lg-12 my-2" id=interest_div>
                                <div class="card">
                                    @php
                                        $loop_counter_interest = 1;
                                    @endphp
                                    <div class="card-header" style="background-color:rgb(168, 161, 161)">Interest</div>
                                    <div class="card-body ">
                                        <div class="row" id='interest_box'>
                                            @foreach ($interests as $key => $item)
                                                <div class="col-md-4 my-3" class=" "
                                                    id='skill_box_{{ $loop_counter_interest }}'>
                                                    <div class="form-group has-success {{ $loop_counter_interest++ }}">
                                                        <input type="hidden" name="interest_id[]"
                                                            value="{{ $item->id }}" class="form-control">

                                                        <label for="interest" class="control-label mb-1">Interest</label>
                                                        <input id=" interest remove_skill" name=" interest[]"
                                                            value="{{ $item->interest }}" type="text"
                                                            class="form-control cc-name valid">
                                                    </div>
                                                </div>
                                                {{-- 
                                                <div class="col-md-1 my-3">
                                                    <label for="icon" class="control-label ">icon</label>
                                                    <div class="rs-select2--dark rs-select2--sm rs-select2--dark2"
                                                        style="width:100px;margin-left:-15px">
                                                        <select name='icon[]' class="js-select2" id="icon" required>
                                                            <option selected="selected" value="">icon</option>
                                                            <option value="ri-store-line">store</option>
                                                            <option value="ri-bar-chart-box-line">chart</option>
                                                            <option value="ri-calendar-todo-line">todo</option>
                                                            <option value="ri-paint-brush-line">brush</option>
                                                            <option value="ri-database-2-line">DB</option>
                                                            <option value="ri-gradienter-line">GD</option>
                                                            <option value="ri-file-list-3-line">file</option>
                                                            <option value="ri-price-tag-2-line">tag</option>
                                                            <option value="ri-disc-line">disc</option>
                                                            <option value="ri-base-station-line">station</option>
                                                            <option value="ri-fingerprint-line">fingerprint</option>
                                                        </select>
                                                        <div class="dropDownSelect2"></div>
                                                    </div>
                                                </div> --}}

                                                @if ($loop_counter_interest == 2)
                                                    <div class="col-md-2 my-3">
                                                        <label for="icon_link" class="control-label"
                                                            style="color: white">Add
                                                            icon
                                                        </label>
                                                        <button type="button" onclick="add_more_interest()"
                                                            class="btn  btn-success btn-block">
                                                            <i class="fa fa-plus "></i>&nbsp;Add interest
                                                        </button>
                                                    </div>
                                                @else
                                                    <div class="col-md-2 my-3">
                                                        <label for="icon_link" class="control-label"
                                                            style="color: white">Add
                                                            icon
                                                        </label>
                                                        <a type="button" onclick="remove()" {{-- href="  {{ route('admin.interest_delete', ['id' => $item->id]) }}" --}}
                                                            href="javascript:void(0)" class="btn btn-danger "> <i
                                                                class="fa fa-minus "></i>&nbsp;remove </a>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        {{-- @endforeach --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <button id="brand-button" type="submit" class="btn btn-lg btn-info btn-block my-5">
                    <i class="fa fa-save fa-lg"></i>&nbsp;Submit
                </button>
            </div>
            </form>
        </div>
    </div>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.6.2/ckeditor.js"></script>

    <script>
        function defage() {
            var now = new Date()
            var current_year = now.getFullYear();
            var current_month = now.getMonth();
            var DOBGet = $('#birthday').val();

            var DOB = new Date(DOBGet)
            var get_year = DOB.getFullYear();
            var get_month = DOB.getMonth();
            age = current_year - get_year;
            $('#age').val(age);
        }
    </script>
@endsection
<script>
    var counter = 1;
    var interest_counter = 1;

$(document).on('.remove_skill','click',function(){
    console.log("DFV");
})
    function add_more_skill() {
        counter++;
        var html = '';
        html =
            ' <div class="col-md-3 skill_box' + counter +
            '" >   <div class="form-group has-success">    <label for=" skills" class="control-label mb-1">Skills</label><input type="hidden" name="skill_id[]" class="form-control"> <input id=" skills" name=" skill[]" type="text" class="form-control cc-name valid"> </div> </div>';
        html +=
            '<div  class="col-md-1 skill_box' + counter +
            '"><label for="%" class="control-label mb-1">%</label> <input id="per" name="per[]" type="text" class="form-control cc-name valid"> </div>'
        html +=
            '     <div class="col-md-2 skill_box' + counter +
            '">  <label for="icon_link" class="control-label" style="color: white">Add icon  </label>  <button type="button"  onclick="remove_skill(' +
            counter +
            ')"  class="btn  btn-danger btn-block">  <i class="fa fa-minus fa-lg"></i>&nbsp;Remove   </button> </div>'
        $('#skill_div').append(html)
    }

    function remove_skill(counter) {
        $('.skill_box' + counter).remove();
        counter--;
    }


    function add_more_interest() {
        interest_counter++;
        var html = '';
        html =
            ' <div class="col-md-4  my-3 interest_box' + interest_counter + '"   id="skill_box_' + counter +
            '">   <div class="form-group has-success"> <input type="hidden" name="interest_id[]" class="form-control">   <label for="interest" class="control-label mb-1">Interest</label> <input id="interest" name="interest[]" type="text" class="form-control cc-name valid"> </div> </div>';
        html +=
            ' <div class="col-md-2  my-3 interest_box' + interest_counter +
            '">  <label for="icon_link" class="control-label" style="color: white">Add icon  </label>  <button type="button"  onclick="remove_interest(' +
            interest_counter +
            ')" class="btn  btn-danger btn-block">  <i class="fa fa-minus fa-lg"></i>&nbsp;Remove </button> </div>'
        $('#interest_box').append(html)
    }

    function remove_interest(interest_counter) {
        $('.interest_box' + interest_counter).remove();
        interest_counter--;
    }
</script>
