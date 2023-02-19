<?php
class Process_check_list_model extends CI_Model
{
    public function get_all_process_check_list()
    {
        $this->db->select( 'process_check_list_id, process_name, process_check_list_value, status_name, status_value, la_process_check_list.fk_status_id' );
        $this->db->from( 'la_process_check_list' );
        $this->db->join( 'la_status', 'la_process_check_list.fk_status_id = la_status.status_id', 'inner' );
        $this->db->join( 'la_process', 'la_process_check_list.fk_process_id = la_process.process_id', 'inner' );
        return  $this->db->get()->result_array();

    }
    public function get_all_status()
    {
           $this->db->select( '*' );
           $this->db->from( 'la_status' );
           $query = $this->db->get();
           return $query->result_array();
    }
    public function get_all_process()
    {
        $this->db->select( '*' );
        $this->db->from( 'la_process' );
        $query = $this->db->get();
        return $query->result_array();
    }
    public function insert_value_process($data)
    {
        $this->db->insert( 'la_process_check_list', $data );
        return $this->db->insert_id();
    }
    public function get_process_chek_list($id)
    {
        $this->db->select( '*' );
        $this->db->from( 'la_process_check_list' );
        $this->db->join( 'la_status', 'la_process_check_list.fk_status_id = la_status.status_id', 'inner' );
        $this->db->join( 'la_process', 'la_process_check_list.fk_process_id = la_process.process_id', 'inner' );
        $this->db->where( 'process_check_list_id', $id );
        $query = $this->db->get();
        if ( count( $query->result() ) > 0 ) {
            return $query->row();
        }
    } 
    public function update_process_check_list( $data )
    {
           return $this->db->update( 'la_process_check_list', $data, array( 'process_check_list_id' => $data[ 'process_check_list_id' ] ) );
    }
    public function update_status($process_check_list_id,$fk_status_id)
    {
        $data['fk_status_id'] = $fk_status_id;
        return $this->db->update('la_process_check_list', $data, ['process_check_list_id' => $process_check_list_id]);
    }
}