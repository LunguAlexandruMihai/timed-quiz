<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Lungu
 * Date: 9/29/13
 * Time: 4:13 PM
 * To change this template use File | Settings | File Templates.
 */

class Model_Table_Exams{

  public static function getAllExams(){
    return Model_Sql::getInstance()->select(
      'exams',
      '*'
    );
  }

  public static function getExamById($id){
    return Model_Sql::getInstance()->select(
      'exams',
      '*',
      array('e_id' => $id)
    );
  }

}