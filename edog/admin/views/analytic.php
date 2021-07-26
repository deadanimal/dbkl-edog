<?php // echo '<pre>'; echo json_encode($report_data); echo '</pre>'; exit; ?>

<!-- Page Title -->
<section class="site-heading site-section-top">
    <div class="header-section dashboard">
        <div class="container-fluid">
            <h1>Analytic</h1>
        </div>
    </div>
</section>
<!-- END Page Title -->

<!-- Content -->

<section class="site-section site-content-single bg-info">

    <div class="container">

    <h1>Jumlah Permohonan Lesen Anjing = <?php echo $app_count[0]->bilangan ?> </h1>
    <br>
    <br>
<!--     
        <br><h2>Senarai Permohonan Mengikut Parlimen</h2> -->
        <div class="row">
            <div class="col-sm-12">
                <style>
                    #chartdiv {
                        width: 100%;
                        height: 500px;
                    }
                </style>
                <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
                <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
                <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
                <script>
                    am4core.ready(function() {

                        // Themes begin
                        am4core.useTheme(am4themes_animated);
                        // Themes end

                        // Create chart instance
                        var chart = am4core.create("chartdiv", am4charts.PieChart);

                        var address_count = <?php echo json_encode($address_count); ?>

                        // Title
                        var title = chart.titles.push(new am4core.Label());
                        title.text = "Senarai Permohonan Mengikut Parlimen";
                        title.fontSize = 25;
                        title.marginBottom = 15;

                        // Exporting
                        chart.exporting.menu = new am4core.ExportMenu();

                        // Add data
                        chart.data = address_count;

                        // Add and configure Series
                        var pieSeries = chart.series.push(new am4charts.PieSeries());
                        pieSeries.dataFields.value = "bilangan";
                        pieSeries.dataFields.category = "parlimen_name";
                        pieSeries.slices.template.stroke = am4core.color("#fff");
                        pieSeries.slices.template.strokeWidth = 2;
                        pieSeries.slices.template.strokeOpacity = 1;

                        // pieSeries.labels.template.text = "{category}: {value.value}";
                        pieSeries.labels.template.text = "{category}: {value.value} ( {value.percent.formatNumber('#.0')}% )";
                        // pieSeries.slices.template.tooltipText = "{category}: {value.value}";
                        // chart.legend.valueLabels.template.text = "{value.value}";

                        // This creates initial animation
                        pieSeries.hiddenState.properties.opacity = 1;
                        pieSeries.hiddenState.properties.endAngle = -90;
                        pieSeries.hiddenState.properties.startAngle = -90;

                    }); // end am4core.ready()
                </script>
                 <div id="chartdiv"></div>
            </div> 
        </div> 

        <br>
        <br>
        <!-- <h2>Statistik Permohonan Tahun Semasa</h2> -->
        <div class="row">
            <div class="col-sm-12">
                <!-- Styles -->
                <style>
                    #chartdiv2 {
                        width: 100%;
                        height: 500px;
                    }
                </style>

                <!-- Resources -->
                <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
                <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
                <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
                <script src="https://cdn.amcharts.com/lib/4/themes/kelly.js"></script>

                <!-- Chart code -->
                <script>
                    am4core.ready(function() {

                        // Themes begin
                        am4core.useTheme(am4themes_kelly);
                        am4core.useTheme(am4themes_animated);
                        // Report Data
                        var report_data = <?php echo json_encode($report_data); ?>
                        
                        var chart = am4core.create('chartdiv2', am4charts.XYChart)
                        chart.colors.step = 2;

                        chart.legend = new am4charts.Legend()
                        chart.legend.position = 'top'
                        chart.legend.paddingBottom = 20
                        chart.legend.labels.template.maxWidth = 95

                        // Title
                        var title = chart.titles.push(new am4core.Label());
                        title.text = "Statistik Permohonan Tahun Semasa";
                        title.fontSize = 25;
                        title.marginBottom = 15;


                        var xAxis = chart.xAxes.push(new am4charts.CategoryAxis())
                        xAxis.dataFields.category = 'month'
                        xAxis.renderer.cellStartLocation = 0.1
                        xAxis.renderer.cellEndLocation = 0.9
                        xAxis.renderer.grid.template.location = 0;
                        

                        var yAxis = chart.yAxes.push(new am4charts.ValueAxis());
                        yAxis.min = 0;
                       

                        function createSeries(value, name) {
                            var series = chart.series.push(new am4charts.ColumnSeries())
                            series.dataFields.valueY = value
                            series.dataFields.categoryX = 'month'
                            series.name = name

                            series.events.on("hidden", arrangeColumns);
                            series.events.on("shown", arrangeColumns);

                            var bullet = series.bullets.push(new am4charts.LabelBullet());
                            bullet.label.text = "[bold]{valueY}[/]";
                            bullet.label.verticalCenter = "center";
                            bullet.label.dy = -20;
                            bullet.label.hideOversized = false;
                            bullet.label.truncate = false;                            

                            // var bullet = series.bullets.push(new am4charts.LabelBullet())
                            // bullet.interactionsEnabled = false
                            // bullet.dy = 30;
                            // bullet.label.text = '{valueY}'
                            // bullet.label.fill = am4core.color('#ffffff')

                            return series;
                        }

                        // Add data
                        chart.data = report_data;

                        createSeries('Lulus', 'Lulus');
                        createSeries('Ditolak', 'Ditolak');
                        createSeries('Diterima', 'Diterima');

                        function arrangeColumns() {

                            var series = chart.series.getIndex(0);
                            // Exporting
                            chart.exporting.menu = new am4core.ExportMenu();
                            //test 
                            chart.scrollbarX = new am4core.Scrollbar();
                            chart.scrollbarY = new am4core.Scrollbar();
                            

                            var w = 1 - xAxis.renderer.cellStartLocation - (1 - xAxis.renderer.cellEndLocation);
                            if (series.dataItems.length > 1) {
                                var x0 = xAxis.getX(series.dataItems.getIndex(0), "categoryX");
                                var x1 = xAxis.getX(series.dataItems.getIndex(1), "categoryX");
                                var delta = ((x1 - x0) / chart.series.length) * w;
                                if (am4core.isNumber(delta)) {
                                    var middle = chart.series.length / 2;

                                    var newIndex = 0;
                                    chart.series.each(function(series) {
                                        if (!series.isHidden && !series.isHiding) {
                                            series.dummyData = newIndex;
                                            newIndex++;
                                        } else {
                                            series.dummyData = chart.series.indexOf(series);
                                        }
                                    })
                                    var visibleCount = newIndex;
                                    var newMiddle = visibleCount / 2;

                                    chart.series.each(function(series) {
                                        var trueIndex = chart.series.indexOf(series);
                                        var newIndex = series.dummyData;

                                        var dx = (newIndex - trueIndex + middle - newMiddle) * delta

                                        series.animate({
                                            property: "dx",
                                            to: dx
                                        }, series.interpolationDuration, series.interpolationEasing);
                                        series.bulletsContainer.animate({
                                            property: "dx",
                                            to: dx
                                        }, series.interpolationDuration, series.interpolationEasing);
                                    })
                                }
                            }
                        }

                    }); // end am4core.ready()
                </script>

                <!-- HTML -->
                <div id="chartdiv2"></div>
            </div>
        </div>

        <br>
        <br>
        <!-- <h2> Senarai Permohonan Mengikut Bangunan Kediaman </h2> -->
        <div class="row">
            <div class="col-md-12">
                <style>
                    #chartdiv3 {
                        width: 100%;
                        height: 500px;
                    }
                </style>

                
                <!-- Chart code -->
                <script>
                    am4core.ready(function() {

                        // Themes begin
                        am4core.useTheme(am4themes_animated);
                        // Themes end

                        // Report Data
                        var house_count = <?php echo json_encode($house_count); ?>

                        var chart = am4core.create("chartdiv3", am4charts.XYChart);

                        // Title
                        var title = chart.titles.push(new am4core.Label());
                        title.text = "Senarai Permohonan Mengikut Bangunan Kediaman";
                        title.fontSize = 25;
                        title.marginBottom = 15;

                        // Add data
                        chart.data = house_count;
              
                        chart.padding(40, 40, 40, 40);

                        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
                        categoryAxis.renderer.grid.template.location = 0;
                        categoryAxis.dataFields.category = "jenisrumah";
                        categoryAxis.renderer.minGridDistance = 60;
                        categoryAxis.renderer.inversed = true;
                        categoryAxis.renderer.grid.template.disabled = true;

                        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
                        valueAxis.min = 0;
                        valueAxis.extraMax = 0.1;
                        //valueAxis.rangeChangeEasing = am4core.ease.linear;
                        //valueAxis.rangeChangeDuration = 1500;

                        var series = chart.series.push(new am4charts.ColumnSeries());
                        series.dataFields.categoryX = "jenisrumah";
                        series.dataFields.valueY = "bilangan";
                        series.tooltipText = "{valueY.value}"
                        series.columns.template.strokeOpacity = 0;
                        series.columns.template.column.cornerRadiusTopRight = 10;
                        series.columns.template.column.cornerRadiusTopLeft = 10;
                        //series.interpolationDuration = 1500;

                        // Exporting
                        chart.exporting.menu = new am4core.ExportMenu();

                        //series.interpolationEasing = am4core.ease.linear;
                        var labelBullet = series.bullets.push(new am4charts.LabelBullet());
                        labelBullet.label.verticalCenter = "bottom";
                        labelBullet.label.dy = -10;
                        labelBullet.label.text = "{values.valueY.workingValue.formatNumber('#.')}";

                        chart.zoomOutButton.disabled = true;

                        // as by default columns of the same series are of the same color, we add adapter which takes colors from chart.colors color set
                        series.columns.template.adapter.add("fill", function(fill, target) {
                            return chart.colors.getIndex(target.dataItem.index);
                        });

                        setInterval(function() {
                            am4core.array.each(chart.data, function(item) {
                                item.visits += Math.round(Math.random() * 200 - 100);
                                item.visits = Math.abs(item.visits);
                            })
                            chart.invalidateRawData();
                        }, 2000)

                        categoryAxis.sortBySeries = series;

                    }); // end am4core.ready()
                </script>

                <!-- HTML -->
                <div id="chartdiv3"></div>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>
<!-- END  -->