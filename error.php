<!doctype html>
<html lang="en" style="height: 100%;">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="http://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!--For Charts-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <link rel = "icon" href = "./manti.png" type = "image/x-icon">

    <title>ManTi - Error Page</title>
  </head>
  <body style="background-image: linear-gradient(rgba(255, 255, 255, 1), rgba(255, 225, 225, 0.9)),url('./manti.png');">
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
        <div class="container-fluid px-3">
            <a class="navbar-brand" href="#"><img src="manti_logo.png" alt="" width="40%"></a>
        </div>
    </nav>

    <div class="container p-5">
      <div class="row">
        <!-- <div class="col-12 d-flex justify-content-center" >
          <div id="curve_chart" class="p-5 w-75"></div>
        </div> -->
        <div class="col-12">
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </symbol>
                <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                </symbol>
                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </symbol>
            </svg>
            <div class="alert alert-danger bg-light d-flex align-items-center justify-content-between" role="alert">
                <div class="d-flex align-items-center justify-content-between">
                  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                  <span id="error_message" class="h5 pt-2">
                    Error Message
                  </span>
                </div>
                <a class="btn btn-primary" href="./index.php" role="button">Return to main page</a>
            </div>

            <script>
                let errMsg = document.getElementById("error_message");
                let url = document.URL;
                let error_type_string = url.substring(url.indexOf('?')+1)
                let error_type = error_type_string.substring(error_type_string.indexOf('=')+1)
                console.log(error_type)

                if(error_type == "0")
                {
                  errMsg.innerHTML = `Some error occurred.`
                }
                else if(error_type == "1")
                {
                  errMsg.innerHTML = `Email ID you are registering with already exists.`
                }
                else if(error_type == "2")
                {
                  errMsg.innerHTML = `Re-entered Password do NOT match with the entered Password.`
                }
                else if(error_type == "3")
                {
                  // errMsg.innerHTML = `Incorrect Login details (Email)`
                  errMsg.innerHTML = `Incorrect Login details.`
                }
                else if(error_type == "4")
                {
                  // errMsg.innerHTML = `Incorrect Login details (Password)`
                  errMsg.innerHTML = `Incorrect Login details.`
                }
            </script>
        </div>
      </div>
    </div>
    

    <!-- <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['', '', '', '', '', '', '', '', '', '', ''],
          ['',  2, 0, 2, 0, 2, 0, 2, 0, 2, 0],
          ['',  1, 3, 0, 0, 0, 0, 2, 3, 1, 0],
          ['',  1, 3, 0, 0, 0, 0, 2, 3, 1, 0],
          ['',  1, 8, 0, 0, 0, 0, 0, 0, 1, 0],

          ['',  0, 0, 0, 0, 0, 0, 0, 0, 0, 0],

          ['',  2, 0, 2, 0, 2, 0, 2, 0, 0, 0],
          ['',  0, 4, 1, 2, 0, 0, 0, 0, 1, 0],
          ['',  0, 3, 1, 1, 1, 1, 1, 0, 0, 0],
          ['',  0, 2, 0, 0, 0, 0, 1, 2, 3, 0],
          ['',  1, 0, 0, 0, 0, 0, 1, 0, 0, 0],

          ['',  0, 0, 0, 0, 0, 0, 0, 0, 0, 0],

          ['',  2, 0, 2, 0, 2, 0, 2, 0, 0, 0],
          ['',  0, 4, 1, 2, 0, 0, 0, 0, 1, 0],
          ['',  0, 3, 1, 1, 1, 1, 1, 0, 0, 0],
          ['',  0, 2, 0, 0, 0, 0, 1, 2, 3, 0],
          ['',  1, 0, 0, 0, 0, 0, 1, 0, 0, 0],
    
          ['',  0, 0, 0, 0, 0, 0, 0, 0, 0, 0],

          ['',  0, 2, 4, 0, 0, 0, 0, 0, 0, 0],
          ['',  0, 1, 1, 4, 1, 0, 0, 0, 0, 0],
          ['',  1, 6, 1, 0, 0, 0, 0, 0, 0, 0],
          ['',  0, 1, 1, 4, 1, 0, 0, 0, 0, 0],
          ['',  0, 2, 4, 0, 0, 0, 0, 0, 0, 0],

          ['',  0, 0, 0, 0, 0, 0, 0, 0, 0, 0],

          ['',  2, 0, 2, 0, 2, 0, 2, 0, 0, 0],
          ['',  0, 4, 1, 2, 0, 0, 0, 0, 1, 0],
          ['',  0, 3, 1, 1, 1, 1, 1, 0, 0, 0],
          ['',  0, 2, 0, 0, 0, 0, 1, 2, 3, 0],
          ['',  1, 0, 0, 0, 0, 0, 1, 0, 0, 0],

          ['',  0, 0, 0, 0, 0, 0, 0, 0, 0, 0],

          ['',  1, 1, 8, 0, 0, 0, 0, 0, 0, 0],

          ['',  0, 0, 0, 0, 0, 0, 0, 0, 0, 0],

          ['',  1, 1, 8, 0, 0, 0, 0, 0, 0, 0],
        ]);

        var options = {
          title: '',
          curveType: 'function',
          legend: { position: 'none' },
          animation:{
            duration: 800,
            easing: 'inAndOut',
            startup: true,
          },
          hAxis: { textPosition: 'none' },
          vAxis: { textPosition: 'none' },
          bar: { gap: 0 },
          isStacked: true,
          series: {
            0:{color:'#ff0000'},
            1:{color:'#ffffff'},
            2:{color:'#ff0000'},
            3:{color:'#ffffff'},
            4:{color:'#ff0000'},
            5:{color:'#ffffff'},
            6:{color:'#ff0000'},
            7:{color:'#ffffff'},
            8:{color:'#ff0000'},
            9:{color:'#ffffff'},
            },
            annotations: {
                boxStyle: {
                    strokeWidth: 0,
                }
            },
            vAxis: {
                textPosition: 'none',
                gridlines: {
                    color: 'transparent'
                }
            },
            enableInteractivity: false,
            backgroundColor: {
              fill: '#FF0000',
              fillOpacity: 0
            },
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script> -->

    <div class="container-fluid fixed-bottom navbar-dark bg-dark d-flex justify-content-between p-2">
      <div class="d-flex align-items-center text-left">
        <span class="text-white">&copy; Sarthak Keshari. All rights reserved. 2021</span>
      </div>
      <div class="d-flex align-items-center text-right">
        <span class="text-info">In case of any query kindly contact the admin - <i>srthkkeshari84@gmail.com</i></span>
      </div>
    </div>

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