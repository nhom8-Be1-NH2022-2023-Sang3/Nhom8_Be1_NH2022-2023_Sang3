<?php
include "header.php";
include "sidebar.php";
?>
<div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    <div id="piechart"></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Danh mục', 'Số lượng sản phẩm'],
  <?php 
    $thongke = $products->getThongKeManu();
    $tongtk=count($thongke);
    $i=1;
    foreach($thongke as $value){
          if($i==$tongtk) $phay="";else $phay=",";
          echo "['".$value['manu_name']."',".$value['countsp']."]".$phay;
          $i+=1;
    }
  ?>
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Thống kê sản phẩm theo manufactures', 'width':1100, 'height':800};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>
</div>
  <!-- /.content-wrapper -->

<?php
  include "footer.php";
  ?>