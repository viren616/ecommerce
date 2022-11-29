

   <div class="row my-4" id="experience_div">
                            <div class="input_fields_wrap">
                                <button type="button" class="btn btn-info add_field_button my-3">
                                    <i class="fa fa-save fa-lg"></i>&nbsp;Add More Experience
                                </button>
                                <div> <textarea class="ckeditor" name="editor[]"></textarea></div>
                            </div>
                        </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.6.2/ckeditor.js"></script>

    <script>
        $(document).ready(function() {
            var max_fields = 10; //maximum input boxes allowed
            var wrapper = $(".input_fields_wrap"); //Fields wrapper
            var add_button = $(".add_field_button"); //Add button ID
            var x = 1; //initlal text box count
            $(add_button).click(function(e) { //on add input button click
                e.preventDefault();
                if (x < max_fields) { //max input box allowed
                    x++; //text box increment
                    var editorId = 'editor_' + x;
                    var html = '';
                    // <a href="#" class="remove_field">Remove</a></div>

                    html =
                        '<div > <button type="button" class="btn btn-danger remove_field my-3"> <i class="fa fa-save fa-lg"></i>&nbsp;Remove Experience </button><textarea id="' +
                        editorId + '" class="ckeditor" name="editor[]"></textarea>';
                    $(wrapper).append(html); //add input box

                    CKEDITOR.replace(editorId, {
                        height: 200,
                        uiColor: '#CCEAEE'
                    });
                }
            });
            $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            })
        });
    </script>
