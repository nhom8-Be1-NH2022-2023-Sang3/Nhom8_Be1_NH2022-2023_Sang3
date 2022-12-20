<?php
class Product extends Db
{
          public function getAllProducts()
          {
          //lay du lieu
               $sql = self::$connection->prepare("SELECT * FROM products ORDER BY `id` ");
               $sql -> execute();//return the object
               //chuyen du lieu thanh mang
               $data = array();
               $data = $sql -> get_result()-> fetch_all(MYSQLI_ASSOC);
               return $data;
          }
          //detail sản phẩm
          public function getDetail($id)
          {
          //lay du lieu
               $sql = self::$connection->prepare("SELECT `name`,`protypes`.`type_name`,`manufactures`.`manu_name`,`description`,`created_at` FROM `products`,`protypes`,`manufactures` WHERE `products`.`type_id` = `protypes`.`type_id`AND`products`.`manu_id` = `manufactures`.`manu_id` AND `id` = ?");
               $sql->bind_param("i",$id);
               $sql -> execute();//return the object
               //chuyen du lieu thanh mang
               $data = array();
               $data = $sql -> get_result()-> fetch_all(MYSQLI_ASSOC);
               return $data;
          }
          
// lấy theo id
public function getProductById($id)
{
     $sql = self::$connection->prepare("SELECT * FROM products WHERE id = ? ");
     $sql->bind_param("i",$id);
     $sql -> execute();//return the object
     //chuyen du lieu thanh mang
     $data = array();
     $data = $sql -> get_result()-> fetch_all(MYSQLI_ASSOC);
     return $data;
}
//lấy theo type_id
public function getProductByTypeId($type_id)
{
     $sql = self::$connection->prepare("SELECT * FROM products WHERE `type_id` = ? ");
     $sql->bind_param("i",$type_id);//kiểm tra dữ liệu của biến "i" : viết tắt interger
     $sql -> execute();//return the object
     //chuyen du lieu thanh mang
     $data = array();
     $data = $sql -> get_result()-> fetch_all(MYSQLI_ASSOC);
     return $data;
}
//lấy theo search sản phẩm
public function search($keyword)
{
     // like chứa nội dung || == bằng nội dung
     $sql = self::$connection->prepare("SELECT * FROM products WHERE 
     `description` LIKE ?");
     $keyword = "%$keyword%";
     $sql->bind_param("s",$keyword);
     $sql -> execute();//return the object
     //chuyen du lieu thanh mang
     $data = array();
     $data = $sql -> get_result()-> fetch_all(MYSQLI_ASSOC);
     return $data;
}
//lấy theo search sản phẩm theo từng loại
public function searchType_id($keyword,$type_id)
{
     $sql = self::$connection->prepare("SELECT * FROM products WHERE 
     `description` LIKE ? AND `type_id` = ?");
     $keyword = "%$keyword%";
     $sql->bind_param("si",$keyword,$type_id);
     //$sql->bind_param("i",$type_id);
     $sql -> execute();//return the object
     //chuyen du lieu thanh mang
     $data = array();
     $data = $sql -> get_result()-> fetch_all(MYSQLI_ASSOC);
     return $data;
}
//lấy theo ngày tháng
public function getProductByDate()
{
     $sql = self::$connection->prepare("SELECT * FROM `products` ORDER BY `products`.`created_at` DESC LIMIT 10; ");
     $sql -> execute();//return the object
     //chuyen du lieu thanh mang
     $data = array();
     $data = $sql -> get_result()-> fetch_all(MYSQLI_ASSOC);
     return $data;
}
//lấy theo ngày tháng và theo type_id
public function getProductByDateId($type_id)
{
     $sql = self::$connection->prepare("SELECT * FROM products WHERE `type_id` = ? ORDER BY `products`.`created_at` DESC LIMIT 5;");
     $sql->bind_param("i",$type_id);
     $sql -> execute();//return the object
     //chuyen du lieu thanh mang
     $data = array();
     $data = $sql -> get_result()-> fetch_all(MYSQLI_ASSOC);
     return $data;
}
//lấy theo selling
public function getProductBySelling()
{
     $sql = self::$connection->prepare("SELECT * FROM products WHERE `selling` = 1 ");
     $sql -> execute();//return the object
     //chuyen du lieu thanh mang
     $data = array();
     $data = $sql -> get_result()-> fetch_all(MYSQLI_ASSOC);
     return $data;
}
public function getProductBySellingId($type_id)
{
     $sql = self::$connection->prepare("SELECT * FROM products WHERE `type_id` = ? AND `selling` = 1;");
     $sql->bind_param("i",$type_id);
     $sql -> execute();//return the object
     //chuyen du lieu thanh mang
     $data = array();
     $data = $sql -> get_result()-> fetch_all(MYSQLI_ASSOC);
     return $data;
}
//----------------------khi có type_id-------------------------------------
          //hàm phân trang sản phẩm lấy theo giá khi có manu_id và có type_id
          public function phantrang($type_id,$price_min,$price_max,$manu_id,$start_from){
               $sql = self::$connection->prepare( "SELECT * FROM `products` WHERE `type_id` = ? AND ( `price` >= ? AND `price`<= ?) AND `manu_id` = ? LIMIT ?,9");
               $sql->bind_param("iiiii",$type_id,$price_min,$price_max,$manu_id,$start_from);
               $sql -> execute();//return the object
               //chuyen du lieu thanh mang
               $data = array();
               $data = $sql -> get_result()-> fetch_all(MYSQLI_ASSOC);
               return $data;
          }
          //hàm phân trang sản phẩm lấy theo giá khi không có manu_id nhưng có type_id
          public function phantrangtheoid($type_id,$price_min,$price_max,$start_from)
          {
          //lay du lieu
               $sql = self::$connection->prepare("SELECT * FROM products WHERE `type_id` = ? AND ( `price` >= ? AND `price`<= ?)  LIMIT ? ,9  ");
               $sql->bind_param("iiii",$type_id,$price_min,$price_max,$start_from);
               $sql -> execute();//return the object
               //chuyen du lieu thanh mang
               $data = array();
               $data = $sql -> get_result()-> fetch_all(MYSQLI_ASSOC);
               return $data;
          }
//----------------------khi có type_id-------------------------------------
//----------------------khi không có type_id-------------------------------------
          //hàm phân trang sản phẩm lấy theo giá khi có manu_id 
          public function phantrangNotType_id($price_min,$price_max,$manu_id,$start_from){
               $sql = self::$connection->prepare( "SELECT * FROM `products` WHERE ( `price` >= ? AND `price`<= ?) AND `manu_id` = ? LIMIT ?,9");
               $sql->bind_param("iiii",$price_min,$price_max,$manu_id,$start_from);
               $sql -> execute();//return the object
               //chuyen du lieu thanh mang
               $data = array();
               $data = $sql -> get_result()-> fetch_all(MYSQLI_ASSOC);
               return $data;
          }
          //hàm phân trang sản phẩm lấy theo giá khi không có manu_id 
          public function phantrangNotType_idtheoid($price_min,$price_max,$start_from)
          {
          //lay du lieu
               $sql = self::$connection->prepare("SELECT * FROM products WHERE `price` >= ? AND `price`<= ? LIMIT ? ,9  ");
               $sql->bind_param("iii",$price_min,$price_max,$start_from);
               $sql -> execute();//return the object
               //chuyen du lieu thanh mang
               $data = array();
               $data = $sql -> get_result()-> fetch_all(MYSQLI_ASSOC);
               return $data;
          }
//----------------------khi không có type_id-------------------------------------
public function getAllReviews($id)
{
//lay du lieu
     $sql = self::$connection->prepare("SELECT `review`.`name_reviewer`,`review`.`content`,`review`.`star` FROM `review` WHERE `review`.`id_product`= ? ");
     $sql->bind_param("i",$id);
     $sql -> execute();//return the object
     //chuyen du lieu thanh mang
     $data = array();
     $data = $sql -> get_result()-> fetch_all(MYSQLI_ASSOC);
     return $data;
}
//add review
          public function addReview( $email,$name, $content, $star,$id_product)
          {
          //lay du lieu
               $sql = self::$connection->prepare("INSERT INTO `review`(`email`, `name_reviewer`, `content`, `star`, `id_product`) VALUES (?, ?, ?, ?, ?) ");
               $sql->bind_param("sssii",$email,$name, $content, $star,$id_product);
               return $sql -> execute();//return the object
          }
//Lay gioi han san pham theo type_id
     public function getLimitByid($type_id){
    
               //lay du lieu
                    $sql = self::$connection->prepare("SELECT * FROM products WHERE `type_id` = ? AND `selling` = 1 LIMIT 0,3");
                    $sql->bind_param("i",$type_id);
                    $sql -> execute();//return the object

                    $data = array();
                    $data = $sql -> get_result()-> fetch_all(MYSQLI_ASSOC);
                    return $data;
     }
//Lay gioi han san pham theo type_id
public function getLimit(){
    
     //lay du lieu
          $sql = self::$connection->prepare("SELECT * FROM products WHERE `selling` = 1 LIMIT 0,3");
          $sql -> execute();//return the object
          //chuyen du lieu thanh mang
          $data = array();
          $data = $sql -> get_result()-> fetch_all(MYSQLI_ASSOC);
          return $data;
     
}



}



