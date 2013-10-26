/**
 * Created by Lungu on 10/26/13.
 */
QuizHelper = {
  Init:function(){
    $("#examination").hide();
    $("#exam").on("click",function(event){

      var exam_id = $(this).attr("exam-id");
      $("#exam-list").effect(
        'drop',
        {percent:0},
        500
      );
      $.ajax({
        url:"exam.php",
        type:"POST",
        data:{exam_id:exam_id},
        success:function(data){
          console.log("exam id:" + exam_id + " " + data);
          $("#examination").html(data).fadeIn();
        }
      })

    });
  }
};