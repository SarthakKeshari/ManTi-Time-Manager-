<!doctype html>
<html lang="en" style="height: 100%;">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!--For Charts-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <link rel = "icon" href = "./manti.png" type = "image/x-icon">

    <title>ManTi - Login/Register</title>
  </head>
  <body style="background-image: linear-gradient(rgba(255, 255, 255, 1), rgba(255, 255, 255, 0.9)),url('./manti.png');">
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
        <div class="container-fluid px-3">
            <a class="navbar-brand" href="#"><img src="manti_logo.png" alt="" width="40%"></a>
        </div>
    </nav>

    <div class="container bg-white">
      <div class="jumbotron p-5 row" style="background-color:#00000008; box-shadow: 0px 5px 10px #00000025;">
        <div class="col-lg-4 col-sm-12 col-md-4">
          <h1 class="display-4">Analyze and Evolve!</h1>
          <p class="lead" style="color: #005397;">This is a simple website, that will help you to analyze your day to day activity and help you keep a proper track of your studies/work.</p>
          <hr class="my-4">
          <p>Get clear graphical interpretation and analysis of how much productive you are. Improve yourself and be a better being than yesterday. Click the button below and be the part of the self-evolution.</p>
          <p class="lead">
            <div class="d-flex pe-1">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary bg-white fw-bolder" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="background-color: #005397; color: #005397; box-shadow: 1px 5px 10px 1px #00539740;">
                Login/SignUp
              </button>

              <!-- Modal -->
              <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="staticBackdropLabel"></h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <nav>
                        <div class="nav nav-tabs d-flex justify-content-center" id="nav-tab" role="tablist">
                          <button class="nav-link active" id="nav-login-tab" data-bs-toggle="tab" data-bs-target="#nav-login" type="button" role="tab" aria-controls="nav-login" aria-selected="true">Login</button>
                          <button class="nav-link" id="nav-signup-tab" data-bs-toggle="tab" data-bs-target="#nav-signup" type="button" role="tab" aria-controls="nav-signup" aria-selected="false">SignUp</button>
                        </div>
                      </nav>
                      <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active p-4" id="nav-login" role="tabpanel" aria-labelledby="nav-login-tab">
                          <form method="post" action="login.php">
                            <div class="mb-3">
                              <label for="loginEmail" class="form-label">Email address</label>
                              <input type="email" class="form-control" id="loginEmail" name="loginEmail" aria-describedby="emailHelp" required>
                            </div>
                            <div class="mb-3">
                              <label for="loginPassword" class="form-label">Password</label>
                              <input type="password" class="form-control" id="loginPassword" name="loginPassword" required>
                            </div>
                            <!-- <div class="mb-3 form-check">
                              <input type="checkbox" class="form-check-input" id="rememberMe">
                              <label class="form-check-label" for="rememberMe">Remember Me</label>
                            </div> -->
                            <div class="d-grid gap-2">
                              <button type="submit" class="btn btn-primary" style="background-color: #005397;">Login</button>
                            </div>
                          </form>
                        </div>
                        <div class="tab-pane fade p-4" id="nav-signup" role="tabpanel" aria-labelledby="nav-signup-tab">
                          <p>Kindly contact admin to receive your login details - <i style="color: #005397;">srthkkeshari84@gmail.com</i></p>
                          <br>
                          <code>
                            Required details:<br>
                            Your Name - <br>
                            Your Email -  <br>
                            <br>
                            Kindly share the above information with the admin while contacting.
                          </code>
                          <!-- <form method="post" action="register.php">
                            <div class="mb-3">
                              <label for="signUpName" class="form-label">Username</label>
                              <input type="text" class="form-control" id="signUpName" name="signUpName" aria-describedby="nameHelp" required>
                            </div>
                            <div class="mb-3">
                              <label for="signUpEmail" class="form-label">Email address</label>
                              <input type="email" class="form-control" id="signUpEmail" name="signUpEmail" aria-describedby="emailHelp" required>
                            </div>
                            <div class="mb-3">
                              <label for="signUpPassword" class="form-label">Password</label>
                              <input type="password" class="form-control" name="signUpPassword" id="signUpPassword" required>
                            </div>
                            <div class="mb-3">
                              <label for="signUpRePassword" class="form-label">Re-enter Password</label>
                              <input type="password" class="form-control" name="signUpRePassword" id="signUpRePassword" required>
                            </div>
                            <div class="d-grid gap-2">
                              <button id="submit" type="submit" name="submit" class="btn btn-primary" style="background-color: #005397;" onclick="on_submit()">SignUp</button>
                            </div>
                          </form> -->
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </p>
        </div>
        <div class="col-8">
          <div id="curve_chart" class="" style="height: 100%;"></div>
        </div>
      </div>
    </div>
    

    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Day', 'Slot1', 'Slot2', 'Slot3', 'Slot4', 'Slot5', 'Slot6', 'Slot7', 'Day\'s Total'],
          ['20-10-2021',  1, 1, 1, 2, 3, 1, 2, 11],
          ['21-10-2021',  1, 0, 3, 1, 2, 1, 1, 9],
          ['22-10-2021',  2, 0, 3, 1, 0, 2, 2, 10],
          ['23-10-2021',  1, 2, 1, 0, 0, 1, 2, 7]
        ]);

        var options = {
          title: 'Daily Performance',
          curveType: 'function',
          legend: { position: 'right' },
          animation:{
            duration: 1500,
            easing: 'inAndOut',
            startup: true,
          }
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>

    <div class="container-fluid fixed-bottom navbar-dark bg-dark d-flex justify-content-between p-2">
      <div class="d-flex align-items-center text-left">
        <span class="text-white">&copy; Sarthak Keshari. All rights reserved. 2021</span>
      </div>
      <div class="d-flex align-items-center text-right">
        <span class="text-white">We'll love to hear from you &hearts; <a href="#" class="btn btn-light py-0 mx-1" role="button" data-bs-toggle="button">Give Feedback</a></span>
      </div>
    </div>

    <script type = "text/javascript" >  
        function preventBack() { window.history.forward(); }  
        setTimeout("preventBack()", 0);  
        window.onunload = function () { null }; 
    </script> 

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>