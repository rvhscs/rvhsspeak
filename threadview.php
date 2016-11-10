<!DOCTYPE html>
<html>
  <head>
    <title>RVHS Speak - Thread View</title>
    <?php
      if (! isset($_GET["id"])) {
        header("location: /");
      }

      /*
        So we only change one file instead of all files including it.
        Helps with consistency
      */
      $incdoc = file_get_contents("inc/incdoc.php");
      $header = file_get_contents("inc/header.php");
      $footer = file_get_contents("inc/footer.php");
      echo $incdoc;
    ?>
  </head>
  <body>
    <?php
      echo $header;

      $threads = array(
        array(
          "Test thread",
          "Test Category Parent",
          array(
            array(
              "Postingforlizards",
              "Administrator",
              "This is an example post to test out the layout of the array.<br/>
              This is just to show how thread views may be layed out.",
              "Example Signature<br/>
              Signatures are cool"
            ),
            array(
              "Ethan",
              "Moderator",
              "Test Reply<br/>
              EEEEEEEEEEEEEEE"
            ),
            array(
              "Max",
              "User",
              "Another Reply",
              "Another signature!"
            )
          )
        ),
        array(
          "Boy, Fuck you Ethan",
          "Rants",
          array(
            array(
              "Postingforlizards",
              "Administrator",
              "Ethan SUcks<br/>",
              "Example Signature<br/>
              Signatures are cool"
            ),
            array(
              "Max",
              "User",
              "Yes he does",
              "Another signature!"
            ),
            array(
              "Ethan",
              "Moderator",
              "EEEEEEEEEEEEEEE"
            ),
            array(
              "Max",
              "User",
              "Get out of this thread you dick.",
              "Another signature!"
            )
          )
        )
      );

      $bdct = "";

      if (! isset($threads[$_GET["id"]])) {
        $bdct = "Thread not Found";
      } else {
        $bdct = $threads[$_GET["id"]][0];
      }
    ?>
    <div class="container-fluid">
      <h1><?php echo $bdct ?></h1>
      <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <?php if (isset($threads[$_GET["id"]])) { ?>
        <li><a href="/"><?php echo $threads[$_GET["id"]][1] ?></a></li>
        <?php } ?>
        <li class="active"><?php echo $bdct ?></li>
      </ol>
      <?php if (! isset($threads[$_GET["id"]])) { die(); } ?>
      <div class="panel panel-primary">
        <div class="panel-heading">
          <small><?php echo (string)(count($threads[$_GET["id"]][2])-1) ?> Replies in this Thread</small>
        </div>
        <div class="panel-body">
          <?php foreach($threads[$_GET["id"]][2] as $key => $post) { ?>
          <div class="row">
            <div class="col-md-2">
              <div style="padding:10px;border-right:#375a7f 2px solid;border-bottom:#375a7f 2px solid;border-radius:10px">
                <img width="64" height="64" src="img/def_avatar.png"/><br/>
                <h4><a href="#"><?php echo $post[0] ?></a></h4>
                <span><?php echo $post[1] ?></span><br>
              </div>
            </div>
            <div class="col-md-10">
              <div style="padding:10px;">
                <?php echo $post[2] ?>
                <?php if (isset($post[3])) { ?>
                <hr/>
                <small>
                  <?php echo $post[3] ?>
                </small>
                <?php } ?>
              </div>
            </div>
          </div>
          <?php
            if(isset($threads[$_GET["id"]][2][$key+1])) {
              echo "<hr/>";
            }
          } ?>
        </div>
      </div>
    </div>
    <?php
      echo $footer;
    ?>
  </body>
</html>
