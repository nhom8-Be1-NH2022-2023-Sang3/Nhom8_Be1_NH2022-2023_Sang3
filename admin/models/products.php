<?php
class Product extends Db
{
          public function getAllProducts()
          {
          //lay du lieu
               $sql = self::$connection->prepare("SELECT * FROM products,protypes,manufactures 
               WHERE products.manu_id=manufactures.manu_id AND products.type_id=protypes.type_id  ORDER BY `id` ");
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
public function getThongKe()
          {
          //lay du lieu
               $sql = self::$connection->prepare("SELECT protypes.type_id,protypes.type_name,COUNT(products.id) as countsp,MIN(products.price) AS minprice,MAX(products.price) as maxprice ,AVG(products.price) as tbprice FROM products LEFT JOIN protypes ON products.type_id=protypes.type_id GROUP BY protypes.type_id");
               $sql -> execute();//return the object
               //chuyen du lieu thanh mang
               $data = array();
               $data = $sql -> get_result()-> fetch_all(MYSQLI_ASSOC);
               return $data;
          }
          public function getThongKeManu()
          {
          //lay du lieu
               $sql = self::$connection->prepare("SELECT manufactures.manu_id,manufactures.manu_name,COUNT(products.id) as countsp,MIN(products.price) AS minprice,MAX(products.price) as maxprice ,AVG(products.price) as tbprice FROM products LEFT JOIN manufactures ON products.manu_id=manufactures.manu_id GROUP BY manufactures.manu_id");
               $sql -> execute();//return the object
               //chuyen du lieu thanh mang
               $data = array();
               $data = $sql -> get_result()-> fetch_all(MYSQLI_ASSOC);
               return $data;
          }
public function add($name,$manu_id,$type_id,$price,$image,$description,$feature,$selling)
{
     $sql = self::$connection->prepare("INSERT INTO `products` (`name`, `manu_id`, `type_id`, `price`, `image`, `description`, `feature`, `selling`) 
     VALUES (?,?,?,?,?,?,?,?)");
     $sql->bind_param("siiissii",$name,$manu_id,$type_id,$price,$image,$description,$feature,$selling);
     return $sql -> execute();//return the object
}
public function edit($id,$name,$manu_id,$type_id,$price,$image,$description,$feature,$selling)
{
     if($image==""){
          $sql = self::$connection->prepare("UPDATE `products` SET `name`=?,`manu_id`= ?,`type_id`=?,`price`=?,`description`=?,`feature`=?,`selling`=? WHERE `id` = $id");
     $sql->bind_param("siiisii",$name,$manu_id,$type_id,$price,$description,$feature,$selling);
     }
     else
     {
          $sql = self::$connection->prepare("UPDATE `products` SET `name`=?,`manu_id`= ?,`type_id`=?,`price`=?,`image`=?,`description`=?,`feature`=?,`selling`=? WHERE `id` = $id");
     $sql->bind_param("siiissii",$name,$manu_id,$type_id,$price,$image,$description,$feature,$selling);
     }
     return $sql -> execute();//return the object
}
public function del($id)
{
     $sql = self::$connection->prepare("DELETE FROM `products` WHERE `products`.`id` = $id");
     return $sql -> execute();//return the object
}

public function phantrang($start_from){
     $sql = self::$connection->prepare( "SELECT * FROM products,protypes,manufactures 
     WHERE products.manu_id=manufactures.manu_id AND products.type_id=protypes.type_id  ORDER BY `id`  DESC LIMIT ?,9");
     $sql->bind_param("i",$start_from);
     $sql -> execute();//return the object
     //chuyen du lieu thanh mang
     $data = array();
     $data = $sql -> get_result()-> fetch_all(MYSQLI_ASSOC);
     return $data;
}
public function phantrangtheoKeyword($keyword,$start_from){
     $sql = self::$connection->prepare( "SELECT * FROM products,protypes,manufactures 
     WHERE products.manu_id=manufactures.manu_id AND products.type_id=protypes.type_id AND products.`description` LIKE ?  ORDER BY `id` 
      LIMIT ?,9");
      $keyword = "%$keyword%";
     $sql->bind_param("si",$keyword,$start_from);
     $sql -> execute();//return the object
     //chuyen du lieu thanh mang
     $data = array();
     $data = $sql -> get_result()-> fetch_all(MYSQLI_ASSOC);
     return $data;
}

}



