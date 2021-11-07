// console.log("Clicked fetchBtn");

// Instantiate a xhr(XMLHttpRequest) object
const xhr = new XMLHttpRequest();
// console.log(xhr);

// Open the object
let url = document.URL;
let fileName_string = url.substring(url.indexOf('?')+1)
let fileName = fileName_string.substring(fileName_string.indexOf('=')+1)
console.log(fileName)
xhr.open("GET", "./"+fileName+".json", true);

// What to do onprogress(optional)
xhr.onprogress = function () {
//   console.log("On progress");
};

// What to do when response is ready
xhr.onload = function () {
  if (this.status === 200) {
    
    if(innerWidth<1050)
    {
        document.body.innerHTML = `
        <div class="alert alert-primary" role="alert">
            <h4 class="alert-heading">Information!</h4>
            <p>Kindly open Desktop version of website on your mobile phone for viewing</p>
            <hr>
            <p class="mb-0 text-black">Website features are available for Laptops/Desktops due to Graphical Charts presentation</p>
        </div>
        `;
    }
    else
    {
        const response = JSON.parse(this.responseText);
        //   console.log(response["slot1"]);

        document.getElementById('offcanvasBottomLabel').innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-bounding-box" viewBox="0 0 16 16">
        <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z"/>
        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
      </svg>&nbsp;${response["Username"]}`;

        const daily_stat = document.getElementById("daily_stat");
        let output = ``;

        let i = 1;
        let optimumVSactualXValuesMain = [];
        let optimumVSactualYValuesOptimumMain = [];
        let optimumVSactualYValuesActualMain = [];
        while (response["day" + i] != undefined) {
            let optimumVSactualXValues = [];
            let optimumVSactualYValuesOptimum = [];
            let optimumVSactualYValuesActual = [];
        // console.log(i);
        //   console.log(response["day" + i]);
        // console.log(Object.keys(response['day'+i].slots ).length);
        output += `
            <div class="accordion-item py-1">
                <h2 class="accordion-header" id="flush-${"day" + i}">
                    <button class="shadow-sm accordion-button collapsed"
                        type="button" style="background-color:
                        gainsboro;" data-bs-toggle="collapse"
                        data-bs-target="#${"day" + i}"
                        aria-expanded="false"
                        aria-controls="${"day" + i}">
                        ${response["day" + i].date} (${response["day" + i].day})
                    </button>
                </h2>
                <div id="${"day" + i}" class="accordion-collapse
                    collapse" aria-labelledby="flush-${"day" + i}"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Slot Duration</th>
                                    <th scope="col">Hours Utilized</th>
                                    <th scope="col">Slot Note</th>
                                </tr>
                            </thead>
                            <tbody>`;
        let total_study_hours = 0;
        for (
            let j = 1;
            j <= Object.keys(response["day" + i].slots).length / 2;
            j++
        ) {
            // console.log(j);
            let indicator = "";
            let study_hours = response["day" + i]["slots"][j];
            total_study_hours += study_hours;
            optimumVSactualYValuesActual.push(total_study_hours);
            if (study_hours < 1) {
            indicator = "#FF000050";
            } else if (study_hours < 2) {
            indicator = "#FFFF0050";
            } else {
            indicator = "#00FF0050";
            }

            output += `<tr>
                                    <th scope="row">${j}</th>
                                    <td>${response["slot" + j]}</td>
                                    <td style="background-color:${indicator}">${
            response["day" + i]["slots"][j]
            }</td>
                                    <td>
                                    ${response["day" + i]["slots"]["note" + j]}
                                    </td>
                                </tr>`;
        }

        optimumVSactualYValuesActualMain.push(optimumVSactualYValuesActual)
        output += `</tbody>
                        </table>
                    </div>
                    <p class="h4 text-center pb-2">Total Study Hours = ${total_study_hours}</p>

                    <!-- Button trigger modal -->
                    <div class="d-grid gap-2 py-2 container">
                        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#${"modal" + "day" + i}">
                            Daily Stats
                        </button>
                    </div>
                        

                    <!-- Modal -->
                    <div class="modal fade" id="${"modal" + "day" + i}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Daily Stats</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div id="${"slotTable" + "day" + i}" class="py-1 pb-4">

                            </div>
                            `;

            let slotTable = `
            <table class="table table-dark table-striped">
            <thead>
            <tr>
                <th scope="col">Slot Number</th>
                <th scope="col">Slot Name</th>
            </tr>
            </thead>
            <tbody>
            `
            
            let mul = 1;
            while(response["slot" + mul] != undefined){
                optimumVSactualXValues.push("Slot "+ mul);
                optimumVSactualYValuesOptimum.push(1*mul);

                slotTable+=`<tr>
                <th scope="row">Slot ${mul}</th>
                <td>${response["slot" + mul]}</td>
            </tr>`
                
                mul+=1;
            }

            optimumVSactualXValuesMain.push(optimumVSactualXValues)
            optimumVSactualYValuesOptimumMain.push(optimumVSactualYValuesOptimum)


                slotTable+=`
            </tbody>
        </table>
            `;

            output+=slotTable;

            output+=`<div id="optimumVSactual">
                            <b>Optimum Study v/s Actual Study</b>
                            <canvas id="${"optimumVSactualChart"+"day"+i}"></canvas>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <small><i>${response["day" + i].date}, ${response["day" + i].day}</i></small>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>`;

        i += 1;
        }
        daily_stat.innerHTML = output;

        // console.log(optimumVSactualXValuesMain, optimumVSactualYValuesActualMain, optimumVSactualYValuesOptimumMain)
        
        
        let n = 1;
        while(response["day" + n] != undefined)
        {
            new Chart("optimumVSactualChart"+"day"+n, {
                type: "line",
                data: {
                labels: optimumVSactualXValuesMain[n-1],
                datasets: [{
                    label: "Optimum Study",
                    fill: false,
                    lineTension: 0,
                    backgroundColor: "rgba(0,255,0,1.0)",
                    borderColor: "rgba(0,255,0,0.1)",
                    data: optimumVSactualYValuesOptimumMain[n-1],
                },
                {
                    label: "Actual Study",
                    fill: false,
                    lineTension: 0,
                    backgroundColor: "rgba(255,0,0,1.0)",
                    borderColor: "rgba(255,0,0,0.1)",
                    data: optimumVSactualYValuesActualMain[n-1],
                    pointRadius: 4,
                    pointHoverRadius: 8
                }
                ]
                },
                options: {
                legend: {display: true},
                scales: {
                    yAxes: [{
                        ticks: {min: 0,
                            max:12,
                            stepSize: 1,
                            fontColor: "#000000",
                        },
                        scaleLabel: {
                            display: true,
                            labelString: 'Study Hours'
                        }
                    }],
                }
                }
            });

            n+=1;
        }
    }
        
    
  } else {
    console.log("Some error occured");
  }
};

// send the request for GET
xhr.send();

console.log("We are done");
