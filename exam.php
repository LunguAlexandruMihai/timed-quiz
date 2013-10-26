<?php
/**
 * Created by PhpStorm.
 * User: Lungu
 * Date: 10/26/13
 * Time: 8:38 PM
 */
require_once 'third_party/header.php';
/////
if(!isset($_GET['id']) || $_GET['id'] == '' || !is_numeric($_GET['id'])):
/////?>
<div class="starter-template">
  <div class="alert alert-danger">No exams was found!</div>
</div>
<?php
/////
else:
/////
$exam = Model_Table_Exams::getExamById($_GET['id']);
foreach($exam as $e){
?>
<div class="starter-template">
  <h1><?php echo $e['e_name'];?></h1>
</div>
<form action="" method="POST">
<?php
  $questions = explode(",",$e['e_questions']);
  for($id = 0;$id < count($questions);$id++){
    foreach(Model_Table_Questions::getQuestionById($questions[$id]) as $question){
      echo $question['q_id'] , " - "  , $question['q_name'] , "<br/>" ;
    }
  }
}

?>
</form>
<?php
/////
endif;
/////
require_once 'third_party/footer.php';?>