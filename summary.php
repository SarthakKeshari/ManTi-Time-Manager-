<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!--For Charts-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    <link rel = "icon" href = "./manti.png" type = "image/x-icon">

    <title>ManTi - Summary</title>
  </head>
  <body onload="print_page()" style="background-image: linear-gradient(rgba(255, 255, 255, 1), rgba(255, 255, 255, 0.9)),url('./manti.png');">
    <div class="text-center">
      <img src="manti_logo.png" alt="" width="15%">
    </div>
    <div class="container mb-5" id="main_div">
        <div class="text-center py-2 bg-white" id="head"></div>
        <div class="pt-5" id="slots_timings"></div>
        <br>
        <br>
        <p class="h4" id="graphs_heading"></p>
        <div class="pt-5" id="daily_total_study"></div>
        <div class="pt-5" id="num_of_hours_stats"></div>
        <div class="pt-5" id="day_of_week_study"></div>
        <div class="pt-5" id="best_slot_study"></div>
        <br>
        <br>
    </div>

    <div id="print_summary" class="d-flex justify-content-center">
      <div class="container-fluid fixed-bottom navbar-dark bg-dark d-flex justify-content-between p-2">
        <div class="d-flex align-items-center text-left">
            <span class="text-white">&copy; Sarthak Keshari. All rights reserved. 2021</span>
        </div>
      </div>
      
    </div>

    <script>
      function print_summary(divName) {
          // var printContents = document.getElementById(divName).innerHTML;
          // var originalContents = document.body.innerHTML;

          // document.body.innerHTML = printContents;
          document.getElementById('print_button').style = "display: none"
          window.print();
          document.getElementById('print_button').style = "display: block"

          // document.body.innerHTML = originalContents;
      }
    </script>
    <br>
    <br>

    <div class="container-fluid fixed-bottom navbar-dark bg-dark d-flex justify-content-between p-2">
      <div class="d-flex align-items-center text-left">
          <span class="text-white">&copy; Sarthak Keshari. All rights reserved. 2021</span>
      </div>
    </div>

    <script src="./summary.js"></script>

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