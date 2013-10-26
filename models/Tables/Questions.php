<?php
/**
 * Created by PhpStorm.
 * User: Lungu
 * Date: 10/26/13
 * Time: 9:10 PM
 */

class Model_Table_Questions{

  public static function getAllQuestions(){
    return Model_Sql::getInstance()->select(
      'questions',
      '*'
    );
  }

  public static function getQuestionById($id){
    return Model_Sql::getInstance()->select(
      'questions',
      '*',
      array('q_id' => $id)
    );
  }

}