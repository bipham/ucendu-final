function getAllTypeQuestionByLevelLessonId(e){var t=baseUrl+"/getTypeQuestionByLevelLessonId",l=e||"",s=$("#list_level"+l).val().trim();$.ajax({type:"GET",url:t,dataType:"json",data:{level_lesson_id:s},success:function(e){$("#list_type_questions"+l).empty(),type_question_options="",$.each(e.list_type_questions,function(e,t){type_question_options+='<option value="'+t.id+'">'+t.name+"</option>"}),$("#list_type_questions"+l).append(type_question_options)},error:function(e){bootbox.alert({message:"FAIL GET ALL TYPE QUESTION!",backdrop:!0})}})}function getAllTypeQuestionFullTestByLevelLessonId(e){var t=e||"";getAllTypeQuestionByLevelLessonId(e);var l=$("#list_level"+t).val().trim(),s=baseUrl+"/getListFullTestLessonUploaded/"+l;$.ajax({type:"GET",url:s,dataType:"json",success:function(e){$("#list_lesson"+t).empty(),console.log(e.all_uploaded_lessons),e.all_uploaded_lessons.length>0?($.each(e.all_uploaded_lessons,function(e,l){$("#list_lesson"+t).append('<option value="'+l.id+'">'+l.title+"</option>")}),$(".create-new-full-test").removeClass("hidden")):($("#list_lesson"+t).append('<option value="0">Pls create new test</option>'),$(".create-new-full-test").removeClass("hidden")),$(".list-ordered").html("");var l=1;jQuery.each(e.all_orders,function(e,t){$(".list-ordered").append("<li>"+t.order_lesson+"</li>"),l=t.order_lesson+1}),$("#order_lesson").val(l),$("#loading").hide()},error:function(e){bootbox.alert({message:"FAIL GET ALL LESSONS!",backdrop:!0})}})}function createNewFullTest(){var e=$("#list_level").val().trim();if(new_title=$("#new_title_full_test").val().trim(),level_user_id=$("#list_level_users").val().trim(),order_lesson=$("#order_lesson").val().trim(),limit_time=$("#limit_time").val().trim(),checkDataCreateFullTest()){var t=baseUrl+"/createNewFullTest";$.ajax({type:"GET",url:t,dataType:"json",data:{level_lesson_id:e,new_title:new_title,level_user_id:level_user_id,order_lesson:order_lesson,limit_time:limit_time},success:function(e){$("#list_lesson option[value=0]").remove(),$("#list_lesson").append('<option value="'+e.full_test_id+'" selected>'+new_title+"</option>"),$("#readingCreateNewTitleFullTest").modal("toggle"),$("#new_title_full_test").val(""),$(".create-new-full-test").addClass("hidden"),$("#loading").hide()},error:function(e){bootbox.alert({message:"Create full test FAIL!",backdrop:!0})}})}}function readURL(e){if(img_name=$("input[type=file]").val().split("\\").pop(),img_extension=img_name.substr(img_name.lastIndexOf(".")+1).toLowerCase(),img_name_no_ext=img_name.split(".")[0],-1==["png","jpg","jpeg","gif"].indexOf(img_extension))return bootbox.alert({message:"Img not true format!",backdrop:!0}),$("#imgFeature").val(""),img_name="",img_name_no_ext="",$("#image-main-preview").attr("src","#"),$("#image-main-preview").addClass("hidden-class"),void i++;if(img_name=$("input[type=file]").val().split("\\").pop(),e.files&&e.files[0]){var t=new FileReader;t.onload=function(t){$("#"+e.name+"-preview").attr("src",t.target.result).width(150),img_url=t.target.result,$("#"+e.name+"-preview").removeClass("hidden-class")},t.readAsDataURL(e.files[0])}}function checkDataCreateFullTest(){return""==new_title?(bootbox.alert({message:"Please enter new title full test!",backdrop:!0}),!1):0==order_lesson?(bootbox.alert({message:"Please enter the order lesson!",backdrop:!0}),!1):0!=limit_time||(bootbox.alert({message:"Please enter limit time!",backdrop:!0}),!1)}var new_title="";