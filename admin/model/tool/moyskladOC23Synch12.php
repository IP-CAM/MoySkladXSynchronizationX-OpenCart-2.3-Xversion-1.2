<?php

class ModelToolMoyskladOC23Synch12 extends Model {
 
    //функция для поиска в таблице uuid
    public function modelSearchUUID($uuid){
        $query = $this->db->query("SELECT product_id FROM uuid WHERE uuid_id = '$uuid' ");
        return $query->row;
    }
    
    //после удачного добавления товара в базу, заносим id  товара и uuid товара с моего 
    //склада в таблицу uuid для проверок существования товара
    public function modelInsertUUID($data){
      $this->db->query('INSERT INTO `uuid` SET product_id = ' . (int)$data["product_id"] . ', `uuid_id` = "' . $data["uuid"] . '"');  
      return true;
    }
    
    
    //обновляем информацию о товаре
    public function updateProduct($id,$data){
        $this->db->query("UPDATE " . DB_PREFIX . "product SET  quantity = '" . (int)$data['quantity'] . "',  price = '" . (float)$data['price'] . "', weight = '" . (float)$data['weight'] . "',  date_modified = NOW() WHERE product_id = '" . (int)$id['product_id'] . "'");

            if (isset($data['image'])) {
		$this->db->query("UPDATE " . DB_PREFIX . "product SET image = '" . $this->db->escape($data['image']) . "' WHERE product_id = '" . (int)$id['product_id'] . "'");
            }

            foreach ($data['product_description'] as $language_id => $value) {
 		$this->db->query("UPDATE " . DB_PREFIX . "product_description SET name = '" . $this->db->escape($value['name']) . "', description = '" . $this->db->escape($value['description']) . "'  WHERE product_id = '" . (int)$id['product_id'] . "'");
            }
            
             return true;
     }
}