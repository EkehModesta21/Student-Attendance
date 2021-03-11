function ChartF() {
    let PAndP = document.querySelectorAll('.poultryAndPig');
    let eggD = document.querySelectorAll('.eggDetails');
    let feedD = document.querySelectorAll('.feedDetails');
    let feedB = document.querySelectorAll('.feedBags');
    
    this.poultryAndPigStocks = function(x1, x2, x3, x4, x5, x6, x7) {
        var ctx = document.getElementById("PandP_singelBarChart");
        if(ctx != null){
            ctx.height = 250;
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    datasets: [{
                        label: "Quantity in Stock",
                        data: [x1, x2, x3, x4, x5, x6, x7],
                        backgroundColor: [
                            "rgba(0, 123, 255,0.9)",
                            "rgba(0, 123, 255,0.75)",
                            "rgba(0, 123, 255,0.6)",
                            "rgba(0, 123, 255,0.45)",
                            "rgba(0, 123, 255,0.3)",
                            "rgba(0, 123, 255,0.15)",
                            "rgba(0,0,0,0.07)"
                        ],
                        hoverBackgroundColor: [
                            "rgba(0, 123, 255,0.9)",
                            "rgba(0, 123, 255,0.7.5)",
                            "rgba(0, 123, 255,0.6)",
                            "rgba(0, 123, 255,0.4.5)",
                            "rgba(0, 123, 255,0.3)",
                            "rgba(0, 123, 255,0.1.5)",
                            "rgba(0,0,0,0.07)"
                        ]

                    }],
                    labels: [
                        "Pig Boars",
                        "Pig Growers",
                        "pig sows",
                        "pig starters",
                        "pig weaners",
                        "Poultry Broilers",
                        "Poultry Layers"
                    ]
                },
                options: {
                    responsive: true
                }
            });
        }
    }
	this.poultryAndPigStocks2 = function(x1, x2, x3, x4, x5, x6, x7) {
        var ctx = document.getElementById("doughutChart");
        if(ctx != null){
            ctx.height = 250;
            var myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    datasets: [{
                        data: [x1, x2, x3, x4, x5, x6, x7],
                        backgroundColor: [
                            "rgba(0, 123, 255,0.9)",
                            "rgba(0, 123, 255,0.75)",
                            "rgba(0, 123, 255,0.6)",
                            "rgba(0, 123, 255,0.45)",
                            "rgba(0, 123, 255,0.3)",
                            "rgba(0, 123, 255,0.15)",
                            "rgba(0,0,0,0.07)"
                        ],
                        hoverBackgroundColor: [
                            "rgba(0, 123, 255,0.9)",
                            "rgba(0, 123, 255,0.7.5)",
                            "rgba(0, 123, 255,0.6)",
                            "rgba(0, 123, 255,0.4.5)",
                            "rgba(0, 123, 255,0.3)",
                            "rgba(0, 123, 255,0.1.5)",
                            "rgba(0,0,0,0.07)"
                        ]

                    }],
                    labels: [
                        "Pig Boars",
                        "Pig Growers",
                        "pig sows",
                        "pig starters",
                        "pig weaners",
                        "Poultry Broilers",
                        "Poultry Layers"
                    ]
                },
                options: {
                    responsive: true
                }
            });
        }
    }

    this.eggDetails = function(x1, x2, x3) {
        let ctx = document.getElementById("pieChart");
        if(ctx != null){
            ctx.height = 250;
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    datasets: [{
                        data: [x1, x2, x3],
                        backgroundColor: [
                            "rgba(0, 123, 255,0.9)",
                            "rgba(0, 123, 255,0.5)",
                            "rgba(0,0,0,0.07)"
                        ],
                        hoverBackgroundColor: [
                            "rgba(0, 123, 255,0.9)",
                            "rgba(0, 123, 255,0.5)",
                            "rgba(0,0,0,0.07)"
                        ]

                    }],
                    labels: [
                        "Large eggs",
                        "Medium eggs",
                        "Small eggs"
                    ]
                },
                options: {
                    responsive: true
                }
            });
        }
    }
    this.eggDetails2 = function(x1, x2, x3) {
        let ctx = document.getElementById("egg_singelBarChart");
        if(ctx != null){
            ctx.height = 250;
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    datasets: [{
                        label: "Quantity in Stock",
                        data: [x1, x2, x3],
                        backgroundColor: [
                            "rgba(0, 123, 255,0.9)",
                            "rgba(0, 123, 255,0.5)",
                            "rgba(0,0,0,0.07)"
                        ],
                        hoverBackgroundColor: [
                            "rgba(0, 123, 255,0.9)",
                            "rgba(0, 123, 255,0.5)",
                            "rgba(0,0,0,0.07)"
                        ]

                    }],
                    labels: [
                        "Large eggs",
                        "Medium eggs",
                        "Small eggs"
                    ]
                },
                options: {
                    responsive: true
                }
            });
        }
    }


    this.feedDetails = function(x1, x2, x3, x4, x5, x6, x7, x8, x9) {
        var ctx = document.getElementById("singelBarChart");
        if(ctx != null){
            ctx.height = 250;
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["Breeders Mash", "Broiler Finisher", "Broiler Starter", "Chicks Mash", "Finisher Ration", "Growers Mash", "Growers Ration", "Layers Mash", "Starter Ration"],
                    datasets: [{
                        label: "Quantity in Stock",
                        data: [x1, x2, x3, x4, x5, x6, x7, x8, x9],
                        borderColor: "rgba(0, 123, 255, 0.9)",
                        borderWidth: "0",
                        backgroundColor: "rgba(0, 123, 255, 0.5)"
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }
    }
    this.feedDetails2 = function(x1, x2, x3, x4, x5, x6, x7, x8, x9) {
        var ctx = document.getElementById("feedD_singelBarChart");
        if(ctx != null){
            ctx.height = 250;
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["Breeders Mash", "Broiler Finisher", "Broiler Starter", "Chicks Mash", "Finisher Ration", "Growers Mash", "Growers Ration", "Layers Mash", "Starter Ration"],
                    datasets: [{
                        label: "Quantity in Stock",
                        data: [x1, x2, x3, x4, x5, x6, x7, x8, x9],
                        borderColor: "rgba(0, 123, 255, 0.9)",
                        borderWidth: "0",
                        backgroundColor: "rgba(0, 123, 255, 0.5)"
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }
    }

    this.feedBags = function(x1, x2, x3, x4, x5, x6, x7, x8, x9) {
        var ctx = document.getElementById("lineChart");
        if(ctx != null){
            ctx.height = 235;
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["Breeders Mash", "Broiler Finisher", "Broiler Starter", "Chicks Mash", "Finisher Ration", "Growers Mash", "Growers Ration", "Layers Mash", "Starter Ration"],
                    datasets: [{
                        label: "Quantity in Stock",
                        borderColor: "rgba(0, 123, 255, 0.9)",
                        borderWidth: "1",
                        backgroundColor: "rgba(0, 123, 255, 0.5)",
                        pointHighlightStroke: "rgba(26,179,148,1)",
                        data: [x1, x2, x3, x4, x5, x6, x7, x8, x9]
                    }]
                },
                options: {
                    responsive: true,
                    tooltips: {
                        mode: 'index',
                        intersect: false
                    },
                    hover: {
                        mode: 'nearest',
                        intersect: true
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }
    }
    this.feedBags2 = function(x1, x2, x3, x4, x5, x6, x7, x8, x9) {
        var ctx = document.getElementById("feedB_singelBarChart");
        if(ctx != null){
            ctx.height = 235;
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["Breeders Mash", "Broiler Finisher", "Broiler Starter", "Chicks Mash", "Finisher Ration", "Growers Mash", "Growers Ration", "Layers Mash", "Starter Ration"],
                    datasets: [{
                        label: "Quantity in Stock",
                        borderColor: "rgba(0, 123, 255, 0.9)",
                        borderWidth: "1",
                        backgroundColor: "rgba(0, 123, 255, 0.5)",
                        pointHighlightStroke: "rgba(26,179,148,1)",
                        data: [x1, x2, x3, x4, x5, x6, x7, x8, x9]
                    }]
                },
                options: {
                    responsive: true,
                    tooltips: {
                        mode: 'index',
                        intersect: false
                    },
                    hover: {
                        mode: 'nearest',
                        intersect: true
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }
    }


    this.bck1 = function() {
        var ctx = document.getElementById("doughutChart");
        ctx.height = 200;
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [45, 25, 20, 10],
                    backgroundColor: [
                        "rgba(0, 123, 255,0.9)",
                        "rgba(0, 123, 255,0.7)",
                        "rgba(0, 123, 255,0.5)",
                        "rgba(0,0,0,0.07)"
                    ],
                    hoverBackgroundColor: [
                        "rgba(0, 123, 255,0.9)",
                        "rgba(0, 123, 255,0.7)",
                        "rgba(0, 123, 255,0.5)",
                        "rgba(0,0,0,0.07)"
                    ]

                }],
                labels: [
                    "green",
                    "green",
                    "green",
                    "green"
                ]
            },
            options: {
                responsive: true,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    }

    this.bck2 = function() {
        //polar chart
        var ctx = document.getElementById("polarChart");
        ctx.height = 200;
        var myChart = new Chart(ctx, {
            type: 'polarArea',
            data: {
                datasets: [{
                    data: [15, 18, 9, 6, 19],
                    backgroundColor: [
                        "rgba(0, 123, 255,0.9)",
                        "rgba(0, 123, 255,0.8)",
                        "rgba(0, 123, 255,0.7)",
                        "rgba(0,0,0,0.2)",
                        "rgba(0, 123, 255,0.5)"
                    ]

                }],
                labels: [
                    "green",
                    "green",
                    "green",
                    "green"
                ]
            },
            options: {
                responsive: true
            }
        });
    }

    this.bck3 = function() {
        var ctx = document.getElementById("singelBarChart");
        ctx.height = 200;
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Sun", "Mon", "Tu", "Wed", "Th", "Fri", "Sat"],
                datasets: [{
                    label: "My First dataset",
                    data: [40, 55, 75, 81, 56, 55, 40],
                    borderColor: "rgba(0, 123, 255, 0.9)",
                    borderWidth: "0",
                    backgroundColor: "rgba(0, 123, 255, 0.5)"
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    }
    this.bck4 = function() {
        let ctx = document.getElementById("pieChart");
        ctx.height = 200;
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                datasets: [{
                    data: [45, 25, 20, 10],
                    backgroundColor: [
                        "rgba(0, 123, 255,0.9)",
                        "rgba(0, 123, 255,0.7)",
                        "rgba(0, 123, 255,0.5)",
                        "rgba(0,0,0,0.07)"
                    ],
                    hoverBackgroundColor: [
                        "rgba(0, 123, 255,0.9)",
                        "rgba(0, 123, 255,0.7)",
                        "rgba(0, 123, 255,0.5)",
                        "rgba(0,0,0,0.07)"
                    ]

                }],
                labels: [
                    "green",
                    "green",
                    "green"
                ]
            },
            options: {
                responsive: true
            }
        });
    }

    this.constructor = function() {
        if (PAndP.length != ''){
            hanDler.poultryAndPigStocks(PAndP[0].innerHTML, PAndP[1].innerHTML, PAndP[2].innerHTML, PAndP[3].innerHTML, PAndP[4].innerHTML, PAndP[5].innerHTML, PAndP[6].innerHTML);
            hanDler.poultryAndPigStocks2(PAndP[0].innerHTML, PAndP[1].innerHTML, PAndP[2].innerHTML, PAndP[3].innerHTML, PAndP[4].innerHTML, PAndP[5].innerHTML, PAndP[6].innerHTML);
        }
        if (eggD.length != ''){
            hanDler.eggDetails(eggD[0].innerHTML, eggD[1].innerHTML, eggD[2].innerHTML);
            hanDler.eggDetails2(eggD[0].innerHTML, eggD[1].innerHTML, eggD[2].innerHTML);
        }
        if (feedD.length != ''){
            hanDler.feedDetails(feedD[0].innerHTML, feedD[1].innerHTML, feedD[2].innerHTML, feedD[3].innerHTML, feedD[4].innerHTML, feedD[5].innerHTML, feedD[6].innerHTML, feedD[7].innerHTML, feedD[8].innerHTML);
            hanDler.feedDetails2(feedD[0].innerHTML, feedD[1].innerHTML, feedD[2].innerHTML, feedD[3].innerHTML, feedD[4].innerHTML, feedD[5].innerHTML, feedD[6].innerHTML, feedD[7].innerHTML, feedD[8].innerHTML);
        }
        if (feedB.length != ''){
            hanDler.feedBags(feedB[0].innerHTML, feedB[1].innerHTML, feedB[2].innerHTML, feedB[3].innerHTML, feedB[4].innerHTML, feedB[5].innerHTML, feedB[6].innerHTML, feedB[7].innerHTML, feedB[8].innerHTML);
            hanDler.feedBags2(feedB[0].innerHTML, feedB[1].innerHTML, feedB[2].innerHTML, feedB[3].innerHTML, feedB[4].innerHTML, feedB[5].innerHTML, feedB[6].innerHTML, feedB[7].innerHTML, feedB[8].innerHTML);
        }
    }
}
hanDler = new ChartF();
hanDler.constructor();