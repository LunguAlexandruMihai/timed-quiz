<?php
/**
 * Created by PhpStorm.
 * User: Lungu
 * Date: 10/26/13
 * Time: 7:49 PM
 */
require_once 'init.php';

$all_exams = Model_Table_Exams::getAllExams();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="assets/ico/favicon.png">

  <title>Starter Template for Bootstrap</title>

  <!-- Bootstrap core CSS -->
  <link href="assets/css/bootstrap.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <style>
    body {
      padding-top: 50px;
    }
    .starter-template {
      padding: 40px 15px;
      text-align: center;
    }
  </style>

  <script src="assets/js/jquery-2.0.3.js"></script>
  <script src="assets/js/jquery-ui.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/QuizHelper.js"></script>

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.js"></script>
  <![endif]-->

  <script type="text/javascript">
    $(document).ready(function(){
      QuizHelper.Init();
    });
  </script>
</head>

<body>

<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Project name</a>
    </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</div>

<div class="container" id="exam-list">

  <div class="starter-template">
    <h1>Select Exam</h1>
  </div>
  <div class="container">
    <?php if(empty($all_exams)):?>
      <div class="alert alert-info">No exam was found!</div>
    <?php else:?>
      <div class="row">
        <?php foreach($all_exams as $exam):?>
          <div class="col-lg-4">
            <h2><a
                href="#exam[<?php echo $exam['e_id'];?>]"
                id="exam[<?php echo $exam['e_id'];?>]">
                <?php echo $exam['e_name'];?>
              </a>
            </h2>
            <p>
              <?php echo $exam['e_description'];?>
            </p>
            <p>
              <button
                href="#"
                class="btn btn-default pull-right"
                id="exam"
                exam-id="<?php echo $exam['e_id'];?>">
                Begin this exam!
              </button>
            </p>
          </div>
        <?php endforeach;?>
      </div>
    <?php endif;?>
  </div>

</div><!-- /.container -->
<div class="container" id="examination"></div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

</body>
</html>
