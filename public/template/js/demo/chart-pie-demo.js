// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["Direct", "Referral", "Social"],
    datasets: [{
      data: [55, 30, 15],
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});

// test
var base_url = `<?= base_url() ?>`;

    let dataAPI = {
      status: {
        labels: [],
        dataset: [],
      }
    }

    var barChartOptions = {
      responsive: true,
      maintainAspectRatio: false,
      datasetFill: false,
      legend: {
        display: false
      },
    }

    var pieOptions = {
      maintainAspectRatio: true,
      responsive: true,
      tooltips: {
        callbacks: {
          label: function(tooltipItem, data) {
            var allData = data.datasets[tooltipItem.datasetIndex].data;
            var tooltipLabel = data.labels[tooltipItem.index];
            var tooltipData = allData[tooltipItem.index];
            var total = 0;
            for (var i in allData) {
              total += allData[i];
            }
            var tooltipPercentage = Math.round((tooltipData / total) * 100);
            return tooltipLabel + ': ' + tooltipData + ' (' + tooltipPercentage + '%)';
          }
        }
      }
    }


    //Create pie or dounut chart
    // You can switch between pie and douhnut using the method below.
    var chartStatus = new Chart($('#chartStatus').get(0).getContext('2d'), {
      type: 'doughnut',
      data: {
        labels: dataAPI.status.labels,
        datasets: [{
          data: dataAPI.status.dataset,
          backgroundColor: ['#3c8dbc', '#00c0ef', ],
        }],
        options: pieOptions,

      }
    })

    async function getDataStatus() {
      const data = await fetch(`${base_url}/Home/getDataStatus`).then(res => res.json()).then(res => res);
      dataAPI.status.labels.splice(0, dataAPI.status.labels.length)
      dataAPI.status.dataset.splice(0, dataAPI.status.dataset.length)
      for (let i in data) {
        dataAPI.status.labels.push(data[i].status);
        dataAPI.status.dataset.push(data[i].total);
      }
      chartstatus.update();
    }

    getDataStatus();
