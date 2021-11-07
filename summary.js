// Instantiate a xhr(XMLHttpRequest) object
const xhr1 = new XMLHttpRequest();

// console.log(xhr);
// Open the object
let urlDoc = document.URL;
let fileNameDoc_string = urlDoc.substring(urlDoc.indexOf("?") + 1);
let fileNameDoc = fileNameDoc_string.substring(
    fileNameDoc_string.indexOf("=") + 1
);
console.log(fileNameDoc);
xhr1.open("GET", "./" + fileNameDoc + ".json", true);
// xhr1.open("GET", "./timetable.json", true);

// What to do onprogress(optional)
xhr1.onprogress = function () {
    //   console.log("On progress");
};

// What to do when response is ready
let response = "";
xhr1.onload = function () {
    if (this.status === 200) {
        response = JSON.parse(this.responseText);
    } else {
        console.log("Some error occured");
    }
};

// send the request for GET
xhr1.send();

console.log("We are done");

let startDate, endDate;

function SubmitDates(pageURL) {
    let url = pageURL;
    let fileName_string = url.substring(url.indexOf("?"));

    startDate = document.getElementById("inputDateStart").value;
    endDate = document.getElementById("inputDateEnd").value;

    console.log(startDate, endDate, typeof startDate, typeof endDate);

    if (endDate == "" || startDate == "") {
        window.location = "./home.php" + fileName_string;
    } else {
        sessionStorage.setItem("startDate", startDate);
        sessionStorage.setItem("endDate", endDate);

        document.getElementById("inputDateStart").value = "";
        document.getElementById("inputDateEnd").value = "";

        window.location = "./summary.php" + fileName_string;
    }
}

function print_page() {
    startDate = new Date(sessionStorage.getItem("startDate"));
    endDate = new Date(sessionStorage.getItem("endDate"));
    let datesObj = {};

    if (startDate.getTime() > endDate.getTime()) {
        // console.log(startDate.getTime(),endDate.getTime(),startDate.getTime() > endDate.getTime())
        document.getElementById("main_div").innerHTML = `
        <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Attention!!</h4>
        <h6>End Date should be ahead of Start Date.</h6>
        <hr>
        <div class="d-flex justify-content-end">
            <a href="#" class="btn btn-primary" role="button" data-bs-toggle="button" onclick="window.location = 'home.php?${fileNameDoc_string}'">Main Page</a>
        </div>
        </div>`;
    } else {
        // console.log(response);
        let num_of_days = 1;
        while (response["day" + num_of_days] != undefined) {
            datesObj[response["day" + num_of_days]["date"]] = "day" + num_of_days;
            num_of_days++;
        }

        console.log(datesObj);
        var jsonDateEndDate =
            response["day" + (num_of_days - 1)]["date"].split("-");
        var jsonDateStartDate = response["day" + 1]["date"].split("/");
        if (
            new Date(
                +jsonDateEndDate[2],
                jsonDateEndDate[1] - 1,
                +jsonDateEndDate[0],
                05,
                30,
                00
            ).getTime() < endDate.getTime() ||
            new Date(
                +jsonDateStartDate[2],
                jsonDateStartDate[1] - 1,
                +jsonDateStartDate[0],
                05,
                30,
                00
            ).getTime() > startDate
        ) {
            // let a = new Date(+jsonDateStartDate[2], jsonDateStartDate[1] - 1, +jsonDateStartDate[0])
            // let a = (new Date(+jsonDateEndDate[2], jsonDateEndDate[1] - 1, +jsonDateEndDate[0], 05, 30, 00).getTime()<endDate.getTime());
            // let b = new Date(+jsonDateEndDate[2], jsonDateEndDate[1] - 1, +jsonDateEndDate[0], 05, 30, 00);
            // let b = (new Date(+jsonDateStartDate[2], jsonDateStartDate[1] - 1, +jsonDateStartDate[0]).getTime()>startDate);
            // document.getElementById('main_div').innerHTML = `<h1>Invalid range ${a} ${b} ${endDate}</h1>`;
            document.getElementById("main_div").innerHTML = `
            <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Attention!!</h4>
            <h6>Invalid range</h6>
            <hr>
            <div class="d-flex justify-content-end">
                <a href="#" class="btn btn-primary" role="button" data-bs-toggle="button" onclick="window.location = 'home.php?${fileNameDoc_string}'">Main Page</a>
            </div>
            </div>`;
        } else {
            document.getElementById("main_div").style =
                "background-color: #e0e0f099;";
            document.getElementById(
                "graphs_heading"
            ).innerHTML = `Graphical Analysis`;
            document.getElementById(
                "print_summary"
            ).innerHTML = `<button class="btn btn-primary btn-lg" onclick="print_summary('main_div')" id="print_button">Print/Save Summary</button>`;

            let sd = new Date(sessionStorage.getItem("startDate"));
            let ed = new Date(sessionStorage.getItem("endDate"));
            let day_count = (ed - sd) / (1000 * 60 * 60 * 24) + 1;
            // console.log(day_count);
            startDate =
                (sd.getDate() > 9 ? sd.getDate() : "0" + sd.getDate()) +
                "-" +
                (sd.getMonth() + 1 > 9
                    ? sd.getMonth() + 1
                    : "0" + (sd.getMonth() + 1)) +
                "-" +
                sd.getFullYear();
            endDate =
                (ed.getDate() > 9 ? ed.getDate() : "0" + ed.getDate()) +
                "-" +
                (ed.getMonth() + 1 > 9
                    ? ed.getMonth() + 1
                    : "0" + (ed.getMonth() + 1)) +
                "-" +
                ed.getFullYear();
            document.getElementById("head").innerHTML = `
            <h3>Study-Time Summary <br> <span class="h5">from ${startDate} to ${endDate}</span></h3>
            <span class="fw-lighter text-success">(i.e. ${day_count} day(s))</span>`;

            // Needed Variables
            let perDayTotal = []; // Total study hours per Day
            let slotsTotal = []; // Most Productive Slot overall
            let cumulativeHours = [0, 0, 0, 0]; // Number of hours stat hr=0, hr<=1, hr<=2 and hr>3
            // 0 = Sunday;
            let totalStudyDayofWeek = {
                Sunday: 0,
                Monday: 0,
                Tuesday: 0,
                Wednesday: 0,
                Thursday: 0,
                Friday: 0,
                Saturday: 0,
            }; // Most Productive Day of the week
            let datesArray = []; // Getting all the dates for which calculations are happening

            // Slots and Timings
            slots_timings = document.getElementById("slots_timings");
            let slotTable = `
            <p class="h5">Slots and Timings</p>
            <table class="table table-light table-striped">
            <thead>
            <tr>
                <th scope="col">Slot Number</th>
                <th scope="col">Slot Name</th>
            </tr>
            </thead>
            <tbody>
            `;

            let mul = 1;
            while (response["slot" + mul] != undefined) {
                slotsTotal.push(0);
                slotTable += `<tr>
                <th scope="row">Slot ${mul}</th>
                <td>${response["slot" + mul]}</td>
            </tr>`;

                mul += 1;
            }

            slotTable += `
            </tbody>
        </table>
            `;

            slots_timings.innerHTML = slotTable;

            // Needed Calculations
            let tempStartNum = sessionStorage.getItem("startDate").split("-");
            let startNum =
                datesObj[
                tempStartNum[2] + "-" + tempStartNum[1] + "-" + tempStartNum[0]
                ];
            startNum = Number(
                startNum.substring(startNum.indexOf("y") + 1, startNum.length)
            );
            // console.log(startNum+day_count-1);
            let endNum = startNum + day_count;
            let num = 1;
            while (startNum != endNum) {
                let t = 0;
                let mul = 1;
                while (response["slot" + mul] != undefined) {
                    let sh = response["day" + startNum]["slots"][mul];
                    t += sh;
                    slotsTotal[mul - 1] += sh;
                    if (sh == 0) {
                        cumulativeHours[0] += 1;
                    } else if (sh <= 1) {
                        cumulativeHours[1] += 1;
                    } else if (sh <= 2) {
                        cumulativeHours[2] += 1;
                    } else if (sh <= 3) {
                        cumulativeHours[3] += 1;
                    }
                    mul += 1;
                }

                datesArray.push(response["day" + startNum]["date"]);
                totalStudyDayofWeek[response["day" + startNum]["day"]] += t;
                perDayTotal.push(t);
                startNum += 1;
            }

            const reducer = (accumulator, curr) => accumulator + curr;

            console.log(
                datesArray,
                perDayTotal,
                slotsTotal,
                cumulativeHours,
                totalStudyDayofWeek
            );

            // const plugin = {
            //     id: 'custom_canvas_background_color',
            //     beforeDraw: (chart) => {
            //       const ctx = chart.canvas.getContext('2d');
            //       ctx.save();
            //       ctx.globalCompositeOperation = 'destination-over';
            //       ctx.fillStyle = '#ffffff90';
            //       ctx.fillRect(0, 0, chart.width, chart.height);
            //       ctx.restore();
            //     }
            //   };

            // Daily Total Study Hours
            daily_total_study = document.getElementById("daily_total_study");
            let avgStudyTime = perDayTotal.reduce(reducer) / day_count;
            daily_total_study.innerHTML = `
        <p class="h5">Daily Total Study Hours</p>
        <canvas id="daily_total_studyChart" class="bg-white"></canvas>
        <p class="text-center bg-success h6 text-white py-2">Average Study Time for the given period <br> <span class="h5"> ${avgStudyTime.toFixed(
                2
            )} Hours/Day</span></p>
        `;

            let tbar_color = [];
            for (let i = 0; i < datesArray.length; i++) {
                tbar_color.push("#3e95cd");
            }
            new Chart(document.getElementById("daily_total_studyChart"), {
                type: "horizontalBar",
                data: {
                    labels: datesArray,
                    borderWidth: 1,
                    datasets: [
                        {
                            label: "Total Hours/Day",
                            backgroundColor: tbar_color,
                            data: perDayTotal,
                        },
                    ],
                },
                // plugins: [plugin],
                options: {
                    scales: {
                        xAxes: [
                            {
                                ticks: { min: 0, max: 12, stepSize: 1, fontColor: "#000000" },
                                scaleLabel: {
                                    display: true,
                                    labelString: "Study Hours",
                                },
                            },
                        ],
                    },
                    legend: { display: true },
                },
            });

            // Cumulative Number of hours studied per slot.
            // Performance Criteria -
            // Total number of hours studied / Total number of optimum study hours(Considering 7 hours/day)
            // 0% - 40% - Very Poor
            // 40% - 75% - Poor
            // 75% - 110% - Fair
            // 110% - 125% - Good
            // 125% - 180% - Very Good
            // >180% - Excellent
            let total_opt_h = 7 * day_count;
            let total_std_h = perDayTotal.reduce(reducer);
            let performance_percent = (total_std_h / total_opt_h) * 100;

            console.log(total_opt_h, total_std_h, performance_percent);

            let perf = "";
            let perf_bg_color = "";
            if (performance_percent <= 40) {
                perf = "Very Poor";
                perf_bg_color = "danger";
            } else if (performance_percent <= 75) {
                perf = "Poor";
                perf_bg_color = "danger";
            } else if (performance_percent < 110) {
                perf = "Fair";
                perf_bg_color = "warning";
            } else if (performance_percent <= 125) {
                perf = "Good";
                perf_bg_color = "success";
            } else if (performance_percent <= 180) {
                perf = "Very Good";
                perf_bg_color = "success";
            } else {
                perf = "🎉Excellent🎉";
                perf_bg_color = "success";
            }

            num_of_hours_stats = document.getElementById("num_of_hours_stats");
            num_of_hours_stats.innerHTML = `
        <p class="h5">Cumulative Number of hours studied per slot</p>
        <canvas id="num_of_hours_statsChart" class="bg-white"></canvas>
        <p class="text-center bg-${perf_bg_color} h6 text-white py-2">Performance <br> <span class="h5"> ${perf}</span></p>
        `;

            new Chart(document.getElementById("num_of_hours_statsChart"), {
                type: "polarArea",
                data: {
                    labels: [
                        "Number of slots with study hours = 0",
                        "Number of slots with study hours > 0 and <=1",
                        "Number of slots with study hours > 1 and <=2",
                        "Number of slots with study hours >=2 and <=3",
                    ],
                    datasets: [
                        {
                            data: cumulativeHours,
                            backgroundColor: [
                                "#11111140",
                                "#FF000040",
                                "#0000FF40",
                                "#00FF0040",
                            ],
                            borderColor: ["#11111160", "#FF000060", "#0000FF60", "#11FF0060"],
                        },
                    ],
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: "bottom",
                        },
                    },
                },
                // plugins: [plugin],
            });

            // Most Productive Day of the week
            let weekDays = [
                "Sunday",
                "Monday",
                "Tuesday",
                "Wednesday",
                "Thursday",
                "Friday",
                "Saturday",
            ];
            let weekDaysTime = [];
            for (let wd = 0; wd < 7; wd++) {
                weekDaysTime.push(totalStudyDayofWeek[weekDays[wd]]);
            }
            var indexOfMaxValueWeekDaysTime = weekDaysTime.reduce(
                (iMax, x, i, arr) => (x > arr[iMax] ? i : iMax),
                0
            );
            console.log(weekDaysTime);

            day_of_week_study = document.getElementById("day_of_week_study");
            day_of_week_study.innerHTML = `
        <p class="h5">Study Hours distribution on weekly basis</p>
        <canvas id="day_of_week_studyChart" class="bg-white"></canvas>
        <p class="text-center bg-success h6 text-white py-2">Most Productive day of the week <br> <span class="h5"> ${weekDays[indexOfMaxValueWeekDaysTime]}</span></p>
        `;
            let weekbar_color = [];
            for (let i = 0; i < 7; i++) {
                weekbar_color.push(
                    "#" + Math.floor(Math.random() * (999999 - 100000) + 100000) + "99"
                );
            }
            new Chart(document.getElementById("day_of_week_studyChart"), {
                type: "bar",
                data: {
                    labels: weekDays,
                    borderWidth: 1,
                    datasets: [
                        {
                            backgroundColor: weekbar_color,
                            data: weekDaysTime,
                        },
                    ],
                },
                // plugins: [plugin],
                options: {
                    scales: {
                        yAxes: [
                            {
                                ticks: {
                                    fontColor: "#000000",
                                },
                                scaleLabel: {
                                    display: true,
                                    labelString: "Study Hours",
                                },
                            },
                        ],
                    },
                    legend: { display: true },
                },
            });

            // Most Productive Slot of a Day(approx.)
            slotLabels = [];
            let slot_bar_color = [];
            for (let i = 0; i < slotsTotal.length; i++) {
                slot_bar_color.push(
                    "#" + Math.floor(Math.random() * (999999 - 100000) + 100000) + "99"
                );
                slotLabels.push("Slot" + (i + 1));
            }
            var indexOfMaxValueSlotsTime = slotsTotal.reduce(
                (iMax, x, i, arr) => (x > arr[iMax] ? i : iMax),
                0
            );

            best_slot_study = document.getElementById("best_slot_study");
            best_slot_study.innerHTML = `
        <p class="h5">Study Hours distribution on slot basis</p>
        <canvas id="best_slot_studyChart" class="bg-white"></canvas>
        <p class="text-center bg-success h6 text-white py-2">Most Productive slot of the day <br> <span class="h5">${slotLabels[indexOfMaxValueSlotsTime]
                } i.e. ${response["slot" + (indexOfMaxValueSlotsTime + 1)]}</span></p>
        `;

            new Chart(document.getElementById("best_slot_studyChart"), {
                type: "bar",
                data: {
                    labels: slotLabels,
                    borderWidth: 1,
                    datasets: [
                        {
                            backgroundColor: slot_bar_color,
                            data: slotsTotal,
                        },
                    ],
                },
                // plugins: [plugin],
                options: {
                    scales: {
                        yAxes: [
                            {
                                ticks: {
                                    stepSize: 1,
                                    fontColor: "#000000",
                                },
                                scaleLabel: {
                                    display: true,
                                    labelString: "Study Hours",
                                },
                            },
                        ],
                    },
                    legend: { display: true },
                },
            });
        }
    }
}
