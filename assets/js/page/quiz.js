$(document).ready(function() {

    $('.footable').footable();

    // get data cookie
    function getCookie(cname) {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    loadDataCourseCode('select[name=courses_id]');
    function loadDataCourseCode(id) {

        $.ajax({
            url: 'function/Quiz/ViewDataSubjectID.php',
            dataType: 'json',
            success: function(response) {
              console.log(response);
              $(id).html("");
              $(id).html("<option value=''>Select</option>");
                $.each(response, function(key, val) {

                    course = '<option id='+val.student_data_id+' value="' + val.id+ '" >' + val.subject_id +'</option>';

                    $(id).append(course);
                });

            }
        })
    }


    $('#form-start-quiz').formValidation({
            framework: 'bootstrap',
            fields: {
                courses_id: {
                    validators: {
                        notEmpty: {
                            message: 'Subject is required'
                        }
                    }
                }
            } // end fields
        })



});
