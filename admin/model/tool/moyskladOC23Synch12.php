<?php

class ModelToolmyskladoc23 extends Model {
    
    
    //функция для поиска в таблице uuid
    public function modelSearchUUID($uuid){
        $query = $this->db->query("SELECT product_id FROM uuid WHERE uuid_id = $uuid");
        
        return $query->row;
    }
}