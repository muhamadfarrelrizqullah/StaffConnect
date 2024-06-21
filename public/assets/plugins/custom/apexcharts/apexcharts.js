// Chart Dashboard
document.addEventListener('DOMContentLoaded', function() {
    let departementsData = JSON.parse(document.getElementById('departementChartData').value);
    let chartData = departementsData.map(function(departement) {
        return {
            x: departement.name,
            y: departement.employee_count
        };
    });
    let options = {
        series: [{
            name: 'Employees',
            data: chartData.map(data => data.y)
        }],
        chart: {
            type: 'bar',
            height: 300,
            width: 500
        },
        xaxis: {
            categories: chartData.map(data => data.x),
        },
        yaxis: {
            title: {
                text: 'Number of Employees',
                forceNiceScale: true
            },
            labels: {
                formatter: function(value) {
                    return parseInt(value);
                }
            }
        },
        plotOptions: {
            bar: {
                borderRadius: 4,
                distributed: true
            }
        },
        dataLabels: {
            enabled: false
        },
        legend: {
            position: 'bottom'
        },
        responsive: [{
            breakpoint: 768,
            options: {
                chart: {
                    height: 300,
                    width: '100%',
                    toolbar: {
                        show: false
                    }
                },
                yaxis: {
                    title: {
                        text: 'Number of Employees',
                        forceNiceScale: true
                    },
                    labels: {
                        formatter: function(value) {
                            return parseInt(value);
                        }
                    }
                },
            }
        }]
    };
    var chart = new ApexCharts(document.querySelector("#departementChart"), options);
    chart.render();
});