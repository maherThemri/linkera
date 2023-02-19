<?php

class Categories_model extends CI_Model
 {
    public function get_all_categories()
 {
        $this->db->select( '*' );
        $this->db->from( 'la_categories' );
        $this->db->join( 'la_status', 'la_categories.fk_status_categories_id = la_status.status_id', 'inner' );
        return  $this->db->get()->result_array();

    }

    public function get_all_status()
 {
        $this->db->select( '*' );
        $this->db->from( 'la_status' );
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insert_category( $data )
 {
        $this->db->insert( 'la_categories', $data );
        return $this->db->insert_id();
    }

    public function delete_category( $id )
 {
        return $this->db->delete( 'la_categories', array( 'categories_id' => $id ) );
    }

    public function get_category( $id ) 
 {
        $this->db->select( '*' );
        $this->db->from( 'la_categories' );
        $this->db->join( 'la_status', 'la_categories.fk_status_categories_id = la_status.status_id', 'inner' );
        $this->db->where( 'categories_id', $id );
        $query = $this->db->get();
        if ( count( $query->result() ) > 0 ) {
            return $query->row();
        }
    }

    public function update_category( $data )
 {
        return $this->db->update( 'la_categories', $data, array( 'categories_id' => $data[ 'categories_id' ] ) );
    }

    public function get_category_by_name( $categories_name )
 {
        $query = $this->db->get_where( 'la_categories', [ 'categories_name'=>$categories_name ] );
        return $query->row_array();
    }
}