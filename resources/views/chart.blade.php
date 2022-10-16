<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Biểu đồ</title>
</head>
<body>
    <div id="chart-container"></div>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    {{-- <script src="https://code.highcharts.com/10.2.1/highcharts.js"></script> --}}
    <script>
        var datas = <?php echo json_encode($datas)?>;
        Highcharts.chart('chart-container', {
            title: {
                text: 'New Product Growth, 2022'
            },
            subtitle:{
                text: 'Source: Surfside Media'
            },
            xAxis:{
                categories:['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis:{
                title: {
                    text:'Number of New Product'
                }
            },
            legend:{
                layout:'vertical',
                align:'right',
                verticalAlign:'middle'
            },
            plotOptions: {
                series:{
                    allowPointSelect:true
                }
            },
            series:[{
                name:'New Product',
                data:datas
            }],
            responsive:{
                rules:[
                    {
                        condition:{
                            maxWidth:700
                        },
                        chartOptions:{
                            legend:{
                                layout:'horizontal',
                                align:'center',
                                verticalAlign:'bottom'
                            }
                        }
                    }
                ]
            }
        })
    </script>
</body>
</html>