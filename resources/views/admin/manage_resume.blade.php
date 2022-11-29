@extends('admin/layout')
@section('page_title', 'Manage Resume')
@section('resume_select', 'active')
    <script src="https://cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script>
    <style>

        hr {

    /* Set the hr color */
     background-color: #333; /* Modern Browsers */
}
    </style>
@section('container')

    <h3>Manage Resume </h3>

    <div class="row m-t-30">
        <div class="col-md-12">
            <form action="{{ route('admin.manage_resume_process') }}" enctype="multipart/form-data" method="post">

                <div class="table-data__tool">
                    <div class="table-data__tool-right ">
                        <a href=" ">
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                <i class="zmdi zmdi-back"></i>Back</button>
                        </a>
                    </div>
                </div>
                {{-- ======================== --}}
                <div class="card">
                    <div class="card-header" style="background-color:rgb(168, 161, 161) ; border: 1px solid black;color:black">Add Sumary </div>
                    <div class="card-body" style=" border: 1px solid black">

                        @csrf
                        <div class="row my-4" style=" border: 1px solid blacks">

                            <div class="form-group col-md-4">
                                <label for="current_address" class="control-label mb-1">Current Address</label>
                                <input id="current_address" name="current_address" type="text"
                                    value="{{ $resume[0]->current_address }}" class="form-control" aria-required="true"
                                    aria-invalid="false" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="current_city" class="control-label mb-1">Current City</label>
                                <input id="current_city" name="current_city" type="text "
                                    value="{{ $resume[0]->current_city }}" class="form-control" aria-required="true"
                                    aria-invalid="false" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="current_state" class="control-label mb-1">Current State</label>
                                <input id="current_state" name="current_state" type="text"
                                    value="{{ $resume[0]->current_state }}" class="form-control" aria-required="true"
                                    aria-invalid="false" required>
                            </div>
                            <div class="form-group  my-3">
                                <label for="summary_description" class="control-label mb-1">summary Description</label>
                                <textarea rows="5" style="resize: none" name="summary_description" type="text"
                                    class="form-control ckeditor" aria-required="true" aria-invalid="false"
                                    required> {{ $resume[0]->summary_desc }} </textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" style=" background-color:rgb(168, 161, 161);border: 1px solid black;color:black">Add
                        Professional Experience
                    </div>

                    <div class="card-body" style="  border: 1px solid black">
                        @php
                            $loop_count_experience = 1;
                        @endphp
                        <div class="row my-4 input_fields_wrap_exp" id="main_div">
                            @foreach ($experience as $item)
                                <div class="row col-md-12" id="second_main_div_{{ $loop_count_experience }}">
                                    <div class="form-group col-md-12 {{ $loop_count_experience++ }}">
                                        @if ($loop_count_experience == 2)
                                        <button type="button" style="float: right"
                                            class="btn btn-info my-2 add_field_button_exp">
                                            <i class="fa fa-plus fa-lg"></i>&nbsp;Add another experience
                                        </button>
                                    @else
                                        <a type="button" style="float: right" href="  {{ route('admin.experience_delete', ['id' => $item->id]) }}"
                                            class="btn btn-danger my-2">
                                            <i class="fa fa-minus fa-lg"></i>&nbsp;Remove experience
                                    </a>
                                    @endif
                                    </div>
                                    @csrf
                                    <div class="form-group col-md-4">
                                        <input type="hidden" name="experience_id[]" value="{{ $item->id }}">
                                        <label for="field_name" class="control-label mb-1">Name of field</label>
                                        <input name="field_name[]" value="{{ $item->field_name }}" type="text"
                                            class="form-control" aria-required="true" aria-invalid="false" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="from" class="control-label mb-1">From</label>
                                        <input name="from[]" type="date" value="{{ $item->experience_from }}"
                                            class="form-control" aria-required="true" aria-invalid="false" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="to" class="control-label mb-1">To</label>
                                        <input name="to[]" type="date" value="{{ $item->experience_to }}"
                                            class="form-control" aria-required="true" aria-invalid="false" required>
                                    </div>
                                    <div class="form-group col-md-4 my-3">
                                        <label for="company_name" class="control-label mb-1">Company Name</label>
                                        <input name="company_name[]" value="{{ $item->company_name }}" type="text"
                                            class="form-control" aria-required="true" aria-invalid="false" required>
                                    </div>
                                    <div class="form-group col-md-4 my-3">
                                        <label for="ecity" class="control-label mb-1">city</label>
                                        <input name="ecity[]" value="{{ $item->company_city }}" type="text"
                                            class="form-control" aria-required="true" aria-invalid="false" required>
                                    </div>
                                    <div class="form-group col-md-4 my-3">
                                        <label for="estate" class="control-label mb-1">State</label>
                                        <input name="estate[]" type="text" value="{{ $item->company_state }}"
                                            class="form-control" aria-required="true" aria-invalid="false" required>
                                    </div>
                                    <div class="form-group row col-md-12 my-4 ">
                                        <div class=" my-3 ">
                                            <label for="edescription" class="control-label ">Description of course</label>
                                            <textarea rows="5" style="resize:none" name="experience_editor[]" type="text"
                                                class="form-control  ckeditor" aria-required="true" aria-invalid="false"
                                                required>{{ $item->role_description }} </textarea>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header"  style="background-color:rgb(168, 161, 161);border: 1px solid black;color:black">Add Education </div>
                    <div class="card-body" style="border: 1px solid black">
                        @php
                            $loop_count_education = 1;
                        @endphp
                        <div class="row my-4 input_fields_wrap" id="main_education_div">
                            @foreach ($education as $item)
                                <div class="row col-md-12 " id="second_main_education_div_{{ $loop_count_education }}">
                                    <div class="form-group col-md-12 {{ $loop_count_education++ }} ">
                                        @if ($loop_count_education == 2)
                                            <button type="button" style="float: right"
                                                class="btn btn-info my-2 add_field_button">
                                                <i class="fa fa-plus fa-lg"></i>&nbsp;Add another education
                                            </button>
                                        @else
                                            <a type="button" style="float: right" href="  {{ route('admin.education_delete', ['id' => $item->id]) }}"
                                                class="btn btn-danger my-2">
                                                <i class="fa fa-minus fa-lg"></i>&nbsp;Remove education
                                        </a>

                                        @endif
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input type="hidden" name="education_id[]" value="{{ $item->id }}"
                                            class="form-control">
                                        <label for="course_name" class="control-label mb-1">Name of course</label>
                                        <input id="course_name" name="course_name[]" type="text"
                                            value="{{ $item->course_name }}" class="form-control" aria-required="true"
                                            aria-invalid="false" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="college_from" class="control-label mb-1">From</label>
                                        <input id="college_from" name="college_from[]" value="{{ $item->college_from }}"
                                            type="date" class="form-control" aria-required="true" aria-invalid="false"
                                            required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="college_to" class="control-label mb-1">To</label>
                                        <input id="college_to" name="college_to[]" type="date"
                                            value="{{ $item->college_to }}" class="form-control" aria-required="true"
                                            aria-invalid="false" required>
                                    </div>
                                    <div class="form-group col-md-4 my-3">
                                        <label for="college_name" class="control-label mb-1">College Name</label>
                                        <input name="college_name[]" value="{{ $item->college_name }}" type="text"
                                            class="form-control" aria-required="true" aria-invalid="false" required>
                                    </div>
                                    <div class="form-group col-md-4 my-3">
                                        <label for="college_city" class="control-label mb-1">city</label>
                                        <input name="college_city[]" type="text" value="{{ $item->college_city }}"
                                            class="form-control" aria-required="true" aria-invalid="false" required>
                                    </div>
                                    <div class="form-group col-md-4 my-3">
                                        <label for="college_state" class="control-label mb-1">State</label>
                                        <input name="college_state[]" value="{{ $item->college_state }}" type="text"
                                            class="form-control" aria-required="true" aria-invalid="false" required>
                                    </div>
                                    <div class="form-group row col-md-12 my-4 ">
                                        <div class=" my-3 ">
                                            <label for="edudescription" class="control-label ">Description of course</label>
                                            <textarea rows="5" style="resize:none" name="editor[]" type="text"
                                                class="form-control  ckeditor" aria-required="true" aria-invalid="false"
                                                required> {{ $item->description }}</textarea>
                                        </div>
                                    </div>
                                    </div>
                             @endforeach
                        </div>
                    </div>
                </div>
                <button type="submit" style="float: right" class="btn btn-info my-2">
                    <i class="fa fa-save fa-lg"></i>&nbsp;Save
                </button>
        </div>
        </form>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.6.2/ckeditor.js"></script>
    <script>

        $(document).ready(function() {
            var max_fields = 10; //maximum input boxes allowed
            var wrapper = $(".input_fields_wrap"); //Fields wrapper
            var wrapper_exp = $(".input_fields_wrap_exp"); //Fields wrapper
            var add_button = $(".add_field_button"); //Add button ID
            var add_button_exp = $(".add_field_button_exp"); //Add button ID
            var x = 1; //initlal text box count
            $(add_button).click(function(e) { //on add input button click
                e.preventDefault();
                if (x < max_fields) { //max input box allowed
                    x++; //text box increment
                    var editorId = 'editor_' + x;
                    var html = '';
                    // <a href="#" class="remove_field">Remove</a></div>
                    // html =
                    // '   <textarea  id="' +editorId + '"  rows="5" style="resize:none" name="editor[]"  type="text" class="form-control ckeditor" required> </textarea>'
                    html = '<div class="row col-md-12 edu_div_'+x+'" id="second_main_education_div_' + editorId +
                        '" > <hr>'
                    html +=
                        '  <div class="form-group col-md-12"> <button type="button" style="float: right" onclick="remove_education('+x+')"  class="btn btn-danger my-2">   <i class="fa fa-minus fa-lg"></i>&nbsp;Remove education </button>  </div>'
                    html +=
                        ' <div class="form-group col-md-4"> <input type="hidden" name="education_id[]"  class="form-control"><label for="course_name" class="control-label mb-1">Name of course</label> <input id="course_name" name="course_name[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required>  </div>'
                    html +=
                        ' <div class="form-group col-md-4"> <label for="college_from" class="control-label mb-1">From</label> <input id="college_from" name="college_from[]" type="date" class="form-control" aria-required="true"  aria-invalid="false" required>  </div>'
                    html +=
                        ' <div class="form-group col-md-4"> <label for="college_to" class="control-label mb-1">To</label> <input id="college_to" name="college_to[]" type="date" class="form-control" aria-required="true"  aria-invalid="false" required> </div>'
                    html +=
                        ' <div class="form-group col-md-4 my-3">  <label for="college_name" class="control-label mb-1">College Name</label>  <input id="college_name" name="college_name[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required> </div>'
                    html +=
                        ' <div class="form-group col-md-4 my-3"> <label for="_college_city" class="control-label mb-1">city</label>  <input id="college_city" name="college_city[]" type="text" class="form-control" aria-required="true"  aria-invalid="false" required> </div>'
                    html +=
                        ' <div class="form-group col-md-4 my-3"> <label for="college_state" class="control-label mb-1">State</label>  <input id="college_state" name="college_state[]" type="text" class="form-control" aria-required="true"   aria-invalid="false" required>  </div>'
                    html +=
                        ' <div class="form-group row col-md-12 my-4" id="edesc_div_1">  <div class=" col-md-12 my-3">   <label for="edudescription" class="control-label ">Description of course</label>  <textarea id="' +
                        editorId + '" class="ckeditor" name="editor[]"> </textarea>  </div> </div>   </div>'
                    // html ='  <textarea id="' +editorId + '" class="ckeditor" name="editor[]"></textarea><div>';
                    $(wrapper).append(html); //add input box

                    CKEDITOR.replace(editorId, {
                        height: 200,
                        uiColor: '#CCEAEE'
                    });
                }
            });



            $(add_button_exp).click(function(e) { //on add input button click
                e.preventDefault();
                if (x < max_fields) { //max input box allowed
                    x++; //text box increment
                    var editorId = 'editor_' + x;
                    var html = '';
                    // <a href="#" class="remove_field">Remove</a></div>
                    // html =
                    // '   <textarea  id="' +editorId + '"  rows="5" style="resize:none" name="editor[]"  type="text" class="form-control ckeditor" required> </textarea>'
             html =
                '<div class="row col-md-12 exp_div_'+x+' " id="second_main_div_' + editorId +
                '"><hr >  <div class="form-group col-md-12"> <button type="button" style="float: right"onclick="remove_experience('+x+')" class="btn btn-danger my-2"> <i class="fa fa-minus fa-lg"></i>&nbsp;Remove experience </button> </div>'
            html +=
                '  <div class="form-group col-md-4"> <input type="hidden" name="experience_id[]" > <label for="field_name" class="control-label mb-1">Name of field</label> <input id="field_name" name="field_name[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required>  </div>'
            html +=
                ' <div class="form-group col-md-4">  <label for="from" class="control-label mb-1">From</label>  <input id="from" name="from[]" type="date" class="form-control" aria-required="true"   aria-invalid="false" required>   </div>'
            html +=
                ' <div class="form-group col-md-4">  <label for="to" class="control-label mb-1">To</label>   <input id="to" name="to[]" type="date" class="form-control" aria-required="true"  aria-invalid="false" required> </div>'
            html +=
                ' <div class="form-group col-md-4 my-3">  <label for="company_name" class="control-label mb-1">Company Name</label>  <input id="company_name" name="company_name[]" type="text" class="form-control"  aria-required="true" aria-invalid="false" required>  </div>'
            html +=
                ' <div class="form-group col-md-4 my-3">  <label for="ecity" class="control-label mb-1">city</label>  <input id="ecity" name="ecity[]" type="text" class="form-control" aria-required="true"  aria-invalid="false" required> </div>'
            html +=
                ' <div class="form-group col-md-4 my-3"> <label for="estate" class="control-label mb-1">State</label> <input id="estate" name="estate[]" type="text" class="form-control" aria-required="true"  aria-invalid="false" required>  </div>'
            html+=' <div class="form-group row col-md-12 my-4 "> <div class=" my-3 "> <label for="edescription" class="control-label ">Description of course</label>   <textarea id="' +
                        editorId + '" class="ckeditor" name="experience_editor[]"> </textarea> </div> </div>'
                    // html ='  <textarea id="' +editorId + '" class="ckeditor" name="editor[]"></textarea><div>';
                    $(wrapper_exp).append(html); //add input box

                    CKEDITOR.replace(editorId, {
                        height: 200,
                        uiColor: '#CCEAEE'
                    });
                }
            });
            // $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
            //     e.preventDefault();
            //     $(this).parent('div').remove();
            //     x--;
            // })
        });


        function remove_education(id){
            $('.edu_div_'+id).remove();
            id--
            }
        function remove_experience(id){
            $('.exp_div_'+id).remove();
            id--
            }
    </script>
@endsection
