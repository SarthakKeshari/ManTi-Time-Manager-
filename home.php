 <!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
            crossorigin="anonymous">

            <link rel = "icon" href = "./manti.png" type = "image/x-icon">

        <!--For Charts-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

        <title>ManTi - Home</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
            <div class="container-fluid px-3">
                <a class="navbar-brand" href="#"><img src="manti_logo.png"
                        alt="" width="40%"></a>
                <button class="btn" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasBottom"
                    aria-controls="offcanvasBottom" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>

        <div class="offcanvas offcanvas-bottom" tabindex="-1"
            id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel">
            <div class="offcanvas-header border p-1 m-1">
                <h5 class="offcanvas-title d-flex align-items-center" id="offcanvasBottomLabel"></h5>
                <!-- <button type="button" class="btn-close text-reset text-right"
                    data-bs-dismiss="offcanvas" aria-label="Close"></button> -->
                <a href="./index.php" style="text-decoration: none;">
                    <button class="btn btn-primary text-white text-right d-flex align-items-center" style="background-color: #005397; color: #005397; box-shadow: 0px 1px 1px 1px #00539740;">
                        <svg xmlns="https://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-power" viewBox="0 0 16 16">
                            <path d="M7.5 1v7h1V1h-1z"/>
                            <path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z"/>
                        </svg> &nbsp;
                            Logout
                    </button>
                </a>
            </div>
            <div class="offcanvas-body small text-center" style="background-color: rgba(0,0,0,0.1);">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <a href="https://docs.google.com/forms/d/e/1FAIpQLScBw6ZP-GivUO1S-4SibxydXVqwnNRpopwL_UpQeFZ0MmXENA/viewform" target="_blank" style="text-decoration: none;">
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary">Add your study time data for today</button>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

        </div>

        <div class="container pt-5">
            <p class="h3 text-center">My Time Record</p>
            <div class="container-fluid pt-2" id="">
                <div class="accordion accordion-flush py-1" id="daily_stat">

                </div>
            </div>
        </div>

        <div class="container-fluid fixed-bottom navbar-dark bg-dark d-flex justify-content-between p-2">
            <div class="d-flex align-items-center text-left">
                <span class="text-white">&copy; Sarthak Keshari. All rights reserved. 2021</span>
            </div>
            <form class="row g-3">
                <div class="col-auto">
                  <span class="form-control-plaintext text-light">Get Summary from</span>
                </div>
                <div class="col-auto">
                  <input type="date" class="form-control" id="inputDateStart" placeholder="Start date" required>
                </div>
                <div class="col-auto">
                    <span class="form-control-plaintext text-light">to</span>
                </div>
                <div class="col-auto">

                    <input type="date" class="form-control" id="inputDateEnd" placeholder="End date" required>
                </div>
                <div class="col-auto">
                    <a href="#" class="btn btn-primary" type="submit" role="button" data-bs-toggle="button" onclick="SubmitDates(document.URL)" target="_blank">Get Summary</a>
                </div>
              </form>
        </div>
        <br>
        <br>
        <br>
        <br>
        <script src="./dataread.js"></script>
        <script src="./summary.js"></script>

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
                        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
                        -->
    </body>
</html>