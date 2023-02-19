<?php
class Attributes_values_model extends CI_Model
{
    public function getAll_Attributes_Values()
    {
        $this->db->select('*');
        $this->db->from('la_attributes_values');
        $this->db->join('la_status', 'la_attributes_values.fk_status_id  = la_status.status_id','inner');
        $this->db->join('la_attributes', 'la_attributes_values.fk_attribute_id = la_attributes.attribute_id','left');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getAll_Attributes()
    {
        $this->db->select('*');
        $this->db->from('la_attributes');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getAll_status()
    {
        $this->db->select('*');
        $this->db->from('la_status');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function save_Attribute_Value($data)
    { 
         $this->db->insert('la_attributes_values',$data);
            return $this->db->insert_id();  
    }
    public function update_Attribute_File($data,$attribute_value_id)
    {
        return $this->db->update('la_attributes_values', $data, ['attribute_value_id' => $attribute_value_id]);   
    }
    public function edit_Attribute_Value($attribute_value_id)
    {
        $query= $this->db->get_where('la_attributes_values',['attribute_value_id'=>$attribute_value_id]);
        return $query->row();
    }
    public function update_Attribute_Value($data,$attribute_value_id)
    {
        return $this->db->update('la_attributes_values', $data, ['attribute_value_id' => $attribute_value_id]);
        
    }
    

}