<?php require_once 'third_party/header.php';?>
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
                href="exam.php?id=<?php echo $exam['e_id'];?>">
                <?php echo $exam['e_name'];?>
              </a>
            </h2>
            <p>
              <?php echo $exam['e_description'];?>
            </p>
            <p>
              <a
                href="exam.php?id=<?php echo $exam['e_id'];?>"
                class="btn btn-default pull-right">
                Begin this exam!
              </a>
            </p>
          </div>
        <?php endforeach;?>
      </div>
    <?php endif;?>
  </div>

</div><!-- /.container -->
<?php require_once 'third_party/footer.php';?>
