<!DOCTYPE html>
<html>
  <head>
    <title>RVHS Speak - Home</title>
    <!-- latest bootstrap minified css from their cdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Bootswatch theme; MIT License -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/latest/darkly/bootstrap.min.css">
    <link rel="stylesheet" href="css/global.css">
    <!-- Font Awesome -->
    <script src="https://use.fontawesome.com/49b5632243.js"></script>
  </head>
  <body>
    <?php
      // This is so that if we want to change the header, we only have to change one file instead of every file that containts the header. (or other)
      $header = file_get_contents("inc/header.php");
      $footer = file_get_contents("inc/footer.php");
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
                            <div id="forumtitle" class="col-md-7">
                              <span id="vtext">
                                <i class="fa fa-comment" aria-hidden="true"></i> &nbsp;
                                <a href="#"><?php echo $forumsdat[0]; ?></a>
                              </span>
                            </div>
                            <div class="col-md-2">
                              <span id="vtext">
                                <?php echo (string)$forumsdat[1] . ' Posts'; ?>
                              </span>
                            </div>
                            <div class="col-md-3">
                              <div>
                                <span id="vtext">
                                  <a href="#"><?php echo $forumsdat[3] ?></a><br/>
                                  By <a href="#"><?php echo $forumsdat[4]; ?></a><br/>
                                  <?php echo $forumsdat[2] . ' Ago'; ?>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>
