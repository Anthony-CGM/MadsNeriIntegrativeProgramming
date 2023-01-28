$(document).ready(function () {
//CUSTOMER DASHBOARD 
    $.ajax({
        type: "GET",
        url: "/api/dashboard/title-chart",
        dataType: "json",
        success: function (data) {
            console.log(data);
            var myBarChart = "<div class='product'>";
            var ctx = document.getElementById("titleChart");
            var myBarChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: data.labels,
                    datasets: [{
                        label: 'Number of Registered Users by Roles',
                        data: data.data,
                        label: "Number of Registered Users by Roles",
                        borderColor: 'rgba(0, 0, 0, 0.8)',
                        fill: true,
                        backgroundColor: [
                            'rgba(0, 0, 0, 0.8)',
                            'rgba(197, 54, 128, 0.8)',
                            'rgba(108, 106, 246, 0.8)'
                        ],
                        borderColor: [
                            'rgba(0, 0, 0, 0.8)',
                            'rgba(197, 54, 128, 0.8)',
                            'rgba(108, 106, 246, 0.8)'
                        ],
                        borderWidth: 2
                    },
                ]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                },
            });

        },
        error: function (error) {
            console.log(error);
        }
    });//end
    
//TRANSACTION DASHBOARD
    $.ajax({
        type: "GET",
        url: "/api/dashboard/suppliesChart",
        dataType: "json",
        success: function (data) {
            console.log(data);
            var ctx = document.getElementById("suppliesChart");
            // var ctx = "<div class='product'>";
            var myBarChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: data.labels,
                    datasets: [{
                        label: 'Numbers of Supplies Ordered',
                        data: data.data,
                        backgroundColor: () => {
                             //generates random colours and puts them in string
                             var size = {
                                'width':100,
                                'height':100};
                             var colors = [];
                            for (var i = 0; i < data.data.length; i++) {
                              var letters = '0123456789ABCDEF'.split('');
                              var color = '#';
                              for (var x = 0; x < 6; x++) {
                                color += letters[Math.floor(Math.random() * 16)];
                              }
                              colors.push(color);
                            }

                            return colors;
                          },

                        borderColor: [
                            'rgba(75, 192, 192, 1)',
                            'rgba(255,99,132,1)'
                        ],
                        borderWidth: 1,
                        responsive: true,
                    }]
                },
                
            });
            
        },
        error: function (error) {
            console.log(error);
        }
    });//end
});

