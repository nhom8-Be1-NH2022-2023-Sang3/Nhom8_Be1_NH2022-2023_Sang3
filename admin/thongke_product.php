<?php
include "header.php";
include "sidebar.php";

?>
<div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    <div class="thongke">
<h2>Bảng thống kê sản phẩm</h2>

<table>
  <tr>
    <th style="width:3%">STT</th>
    <th style="width:27%">Loại hàng</th>
    <th style="width:10%">Số lượng</th>
    <th style="width:20%">Giá cao nhất</th>
    <th style="width:20%">Giá thấp nhất</th>
    <th style="width:20%">Giá trung bình</th>

  </tr>
  <?php 
    $thongke = $products->getThongKe();
    foreach($thongke as $value):?>
  <tr>
    <td><?php echo $value['type_id']?></td>
    <td><?php echo $value['type_name']?></td>
    <td><?php echo $value['countsp']?></td>
    <td><?php echo $value['minprice']?></td>
    <td><?php echo $value['maxprice']?></td>
    <td><?php echo $value['tbprice']?></td>
  </tr>
  <?php endforeach;?>
</table>
<a href="bieudosanpham.php" class="btn btn-secondary">Xem biểu đồ</a>
</div>
</div>
  <!-- /.content-wrapper -->

<?php
  include "footer.php";
  ?>