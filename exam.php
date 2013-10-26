<?php
/**
 * Created by PhpStorm.
 * User: Lungu
 * Date: 10/26/13
 * Time: 8:38 PM
 */
require_once 'init.php';
$exam = Model_Table_Exams::getExamById($_POST['exam_id']);

foreach($exam as $e){
?>
<div class="starter-template">
  <h1><?php echo $e['e_name'];?></h1>
</div>
<?php
  $questions = explode(",",$e['e_questions']);
  for($id = 0;$id < count($questions);$id++){
    foreach(Model_Table_Questions::getQuestionById($questions[$id]) as $question){
      echo $question['q_id'] , " - "  , $question['q_name'] , "<br/>" ;
    }
  }
}

?>