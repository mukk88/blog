
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>mukks blog</title>
    <link href="bootstrap.css" rel="stylesheet">
    <link href="jumbotron.css" rel="stylesheet">
    <link href="mukk.css" rel="stylesheet">
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="resize.js"></script>
    <script type="text/javascript" src="listjs.js"></script>
  </head>

  <body  style="background-color:#101010" onload="autoResize()" onresize="autoResize()">

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="tabcontainer">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="private/post.html" style = "width:120px">mukk blog!</a>
        <div class="nav-collapse collapse">
          <script src = "tabs.js" type="text/javascript"></script>
          <ul class="nav navbar-nav">
            <li id= "hometab" class="tab"><a href="javascript:switchTab('hometab', 'home');">Home</a></li>
            <li id = "poststab" class="active tab"><a href="javascript:switchTab('poststab', 'posts');">Posts</a></li>
            <li id = "imagestab" class="tab"><a href="javascript:switchTab('imagestab', 'images');">Images</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li class="nav-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div style = "display:none"  id = "home" class="container">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
          <h1>i heart belle! <img id = "profile" align = "right" src = "./uploads/me.jpg" width = "150" height = "auto"></h1>
          <h3 style = "width:800px">that really is the most important thing that i want to say right now. i know that as we continue to progress we will create many different pictures and posts so i created this site for us to store them in. 1212 :)   </h3>
          <!-- <p><a class="btn btn-primary btn-large">Learn more &raquo;</a></p> -->
      </div>

      <div class="body-content">

        <!-- Example row of columns -->
        <div class="row">
          <div class="col-lg-4">
            <h2>Travel</h2>
            <p>This is a whole bunch of text that you can use to descirbe the latest place that you visited! in time we should be able to add links to photos and stuff. what do you think about this layout? i think the button below does not work</p>
            <p><a class="btn btn-default" href="javascript:switchTab('traveltab', 'travel');">View details &raquo;</a></p>
          </div>
          <div class="col-lg-4">
            <h2>Images</h2>
            <p> perhaps here we could put a whole bunch of links that will allow us to go to different food photos. haha we can have categories of food and such. </p>
            <p><a class="btn btn-default" href="javascript:switchTab('imagestab', 'images');">View details &raquo;</a></p>
         </div>
          <div class="col-lg-4">
                <form id="upload" action="upload.php" method="POST" enctype="multipart/form-data">
                  <fieldset>
                    <legend>Upload your pictures!</legend>

                    <input type="hidden" id="MAX_FILE_SIZE" name="MAX_FILE_SIZE" value="2000000" />

                    <div>
                      <label for="fileselect">Files to upload:</label>
                      <input style = "width:100px" class = "stylebutton" type="file" id="fileselect" name="fileselect[]" multiple="multiple" />
                      <div id="filedrag">or drop files here</div>
                    </div>

                    <div id="submitbutton">
                      <button type="submit">Upload Files</button>
                    </div>

                  </fieldset>
                </form>
          </div>
        </div>
        <footer>
          <hr>
          <p>&copy; mukk :) </p>
        </footer>
      </div>

    </div> <!-- /container -->

    <div id = "posts" class = "container">

      <div id="main">

        <div class="c1">

          <div id="postslist">
            <br>
            <br>
          <h2 style="margin-left:50px;display:inline">Journal Posts</h2>    
            <input class="search searchbar" align="right" placeholder="Search posts" />
              <ul class="list">
                  <li>
                      <img src="images/gumwall.jpg" class="thumb" />
                      <h4><span class="name">Seattle!</span></h4>
                      <span style = "display:none" class="category">hashtag</span>
                      <p class="description">mukk: We only had a week together but we made it count. I was so happy that Belle could come over to visit me. I am grateful that my parents paid for her flight so that i could be with her that precious week :)</p>
                  </li>
                  <li>
                      <img src="images/loveny.jpg" class="thumb" />
                      <h4><span class="name">This is about the time i went to New York!</span> 
                      <span class="category"></span></h4>
                      <p class="description">belle: I really enjoyed myself in New York. I got to meet many new friends and people. The food was expensive. Really expensive.</p>
                  </li>
                  <li>
                      <img src="images/aus.jpg" class="thumb" />
                      <h4><span class="name">The Land Down Under</span>
                      <span class="category"></span></h4>
                      <p class="description">belle: there really is no place like australia. it was especially meaningful to me because i went with all my close friends and we did all sorts of crazy things together. this will be an exciting post haha. </p>
                  </li>
                  <li>
                      <img src="images/zoo.jpg" class="thumb" />
                      <h4><span class="name">The time i got Zoo-ified</span>
                      <span class="category"></span>
                      <p class="description">mukk: it seems so long ago that we went to the zoo together. it is at times like these that i am glad that belle managed to convince me to take a few good photos haha. maybe in the future i will learn my lesson and be more willing. maybe. </p>
                  </li>
                  <?php 
                      $dbh = new pdo( 'mysql:host=mysql.markwoo.i-xo.net;dbname=markwoo;charset=utf8',
                              'mukk88','dbPa$$w0rd', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                      $result = $dbh->query("SELECT * FROM posts");
                      foreach ($result as $row) {
                        echo "<li>";
                        echo "<img src='images/loveny.jpg' class='thumb' />";
                        echo "<h4><span id='".$row['id']."' class='name'>".$row['title']."</span>";
                        echo "<span class='category'></span>".$row['hash']."</h4>";
                        echo "<p class='description'>".$row['description']."</p>";
                        echo "<p class='main'>".$row['words']."</p>";
                        echo "</li>";
                      }

                   ?>
              </ul>
          </div>
        </div>
      </div>
      <script type="text/javascript" src="postslist.js"></script>
      <footer>
        <hr>
        <p>&copy; mukk :) </p>
      </footer>
    </div>

    <div style = "display:none"  id = "images" class = "container">
      <div class="body-content">
        <div id = "demo"></div>
        <canvas class = "canvas" id = "Chicago" height = "80" width = "1200"></canvas>
        <div class = "iframediv" style = "height:600px;overflow:hidden">
          <iframe id = "chicagoiframe" src="chicago.html" style="width:100%;height:2000px;max-width:100%;overflow-x:hidden;overflow-y:hidden;border:none;padding:0;margin:0  auto;display:block;"scrolling="no" marginheight="0" marginwidth="0"></iframe>
        </div>

        <canvas class = "canvas" id = "China" height = "80" width = "1200"></canvas>
        <div class = "iframediv" style = "height:600px;overflow:hidden">
          <iframe src="china.html" style="width:1250px; height:2000px;max-width:100%;overflow:hidden;border:none;padding:0;margin:0  auto;display:block;" marginheight="0"marginwidth="0" scrolling="no"></iframe>
        </div>

        <canvas class = "canvas" id = "China2" height = "80" width = "1200"></canvas>
        <div class = "iframediv" style = "height:600px;overflow:hidden">
          <iframe src="china2.html" style="width:1250px; height:2000px;max-width:100%;overflow:hidden;border:none;padding:0;margin:0  auto;display:block;" marginheight="0" marginwidth="0" scrolling="no"></iframe>
        </div>
      </div>
      <footer>
        <hr>
        <p>&copy; mukk :) </p>
      </footer>
    </div>

  <script src="filedrag.js"></script>
  </body>
</html>