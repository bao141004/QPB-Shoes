/<a href="index.php?act=bieudodanhmuc">Biểu đồ tài khoản</a></li>
</ol>
<div class="row">
  <div class="card mb-4 col mx-2">
    <div class="card-header">
      <i class="fas fa-table me-1"></i>
      Biểu đồ thống kê tài khoản
      <?php
      ?>
    </div>
    <div class="card-body">
      <!--Div that will hold the pie chart-->
      <div id="chart_div"></div>
    </div>
    <div class="card-footer">
      <a href="index.php?act=thongketaikhoan"> <input class="btn btn-primary my-1" type="button"
          value="Xem bảng thống kê  "></a>
    </div>
  </div>
</div>
</main>
<!--Load the AJAX API-->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

  // Load the Visualization API and the corechart package.
  google.charts.load('current', { 'packages': ['corechart'] });

  // Set a callback to run when the Google Visualization API is loaded.
  google.charts.setOnLoadCallback(drawChart);

  // Biểu đồ thống kê danh mục
  function drawChart() {
    // Create the data table.
    const data = google.visualization.arrayToDataTable([
      ['Tài khoản', 'Số lượng'],
      <?php
      foreach ($listthongketaikhoan as $key) {
        extract($key);
        echo "['Só tài khoản khách hàng có trong website là : $soluong', '$soluong']";
      }
      ?>
    ]);

    // Set chart options
    var options = {
      'title': 'Thống kê tài khoản',
      'width': 500,
      'height': 300
    };

    // Instantiate and draw our chart, passing in some options.
    var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
    chart.draw(data, options);
  }


</script>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses'],
          ['2013',  1000,      400],
          ['2014',  1170,      460],
          ['2015',  660,       1120],
          ['2016',  1030,      540]
        ]);

        var options = {
          title: 'Thống kê tài khoản',
          hAxis: {title: 'Year',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="chart_div" style="width: 1200px; height: 500px;"></div>
  </body>
</html>