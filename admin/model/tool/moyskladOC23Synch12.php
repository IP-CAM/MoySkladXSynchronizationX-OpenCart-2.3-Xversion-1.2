<?php

class ModelToolmyskladoc23 extends Model {
    
    #TODO ошибка, что то связано с циклом возможно, что я передаю просто строку, хотя 
    #бред ошибка надо устранить 
    
    //функция для поиска в таблице uuid
    public function modelSearchUUID($uuid){
        $query = $this->db->query("SELECT product_id FROM uuid WHERE uuid_id = $uuid");
        
        return $query->row;
    }
}