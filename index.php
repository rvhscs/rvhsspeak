<!DOCTYPE html>
<html>
  <head>
    <title>RVHS Speak - Home</title>
    <?php
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
    ?>
    <div class="container-fluid">
      <ol class="breadcrumb">
        <li class="active">Home</li>
      </ol>
      <div class="row">
        <div class="col-md-10">
          <?php
            // This is for testing, but this is the placeholder/template of what the array would look like
            $forums = array(
              array(
                "General",
                array(
                  array(
                    "Announcements",
                    3,
                    "3 Days",
                    "Awesome New Forum Software!",
                    "Administrator"
                  ),
                  array(
                    "General Discussion",
                    392,
                    "10 Minutes",
                    "Wow this website looks great",
                    "eatingforlizards"
                  )
                )
              ),
              array(
                "Computer Stuff",
                array(
                  array(
                    "Your Setup",
                    37,
                    "1 Day",
                    "max's minecraft setup",
                    "gopher1something2"
                  ),
                  array(
                    "Support",
                    819,
                    "2 Minutes",
                    "Help me with my new forum software",
                    "Ethan"
                  ),
                  array(
                    "Bugs",
                    0
                  )
                )
              )
            );

            if (count($forums) == 0) {
              ?>
              <div class="panel panel-primary">
                <div class="panel-body">
                  There aren't any forums to display!
                </div>
              </div>
              <?php
            }

            foreach($forums as $categorydat) {
              ?>
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title"><a href="#"><?php echo $categorydat[0]; ?></a></h3>
                </div>
                <div class="panel-body">
                  <?php
                    foreach($categorydat[1] as $forumsdat) {
                      ?>
                      <div class="panel panel-default">
                        <div class="panel-body">
                          <div class="row">
                            <div id="forumtitle" class="col-md-7 ft">
                              <span id="vtext">
                                <i id="icon" class="fa fa-comment" aria-hidden="true"></i> &nbsp;
                                <a href="#"><?php echo $forumsdat[0]; ?></a>
                              </span>
                            </div>
                            <div class="col-md-2 ft">
                              <span id="vtext">
                                <?php echo (string)$forumsdat[1] . ' Posts'; ?>
                              </span>
                            </div>
                            <div class="col-md-3">
                              <div class="ft">
                                <span id="vtext">
                                  <?php if (! isset($forumsdat[2]) || ! isset($forumsdat[3]) || ! isset($forumsdat[4])) { ?>
                                    Never
                                  <?php } else { ?>
                                    <a href="#"><?php echo $forumsdat[3] ?></a><br/>
                                    By <a href="#"><?php echo $forumsdat[4]; ?></a><br/>
                                    <?php echo $forumsdat[2] . ' Ago'; ?>
                                  <?php } ?>
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php
                    }
                  ?>
                </div>
              </div>
              <?php
            }
          ?>
        </div>
        <div class="col-md-2">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Login Here</h3>
            </div>
            <div class="panel-body">
              <div class="form-group">
                <label class="control-label" for="inputSmall">Username</label>
                <input class="form-control input-sm" type="text" id="inputSmall">

                <br/>
                <label class="control-label" for="inputSmall">Password</label>
                <input class="form-control input-sm" type="password" id="inputSmall">

                <br/>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
      echo $footer;
    ?>
  </body>
</html>
