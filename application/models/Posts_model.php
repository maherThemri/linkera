<?php

class Posts_model extends CI_Model
 {
    public function getAll_Posts()
 {
        $this->db->select( '*' );
        $this->db->from( 'la_posts' );
        $this->db->join( 'la_status', 'la_posts.fk_status_id = la_status.status_id', 'inner' );
        $this->db->join( 'la_categories', 'la_posts.fk_categorie_id = la_categories.categories_id ', 'inner' );
        $this->db->join( 'la_attributes_values', 'la_posts.fk_attribute_value_id = la_attributes_values.attribute_value_id', 'inner' );
        $this->db->join( 'la_monetisation', 'la_posts.fk_monetisation_id = la_monetisation.monetisation_id', 'inner' );
        $this->db->join( 'la_sectors', 'la_posts.fk_sector_id = la_sectors.sector_id', 'inner' );
        $this->db->join( 'la_posts_types', 'la_posts.fk_post_type_id = la_posts_types.post_type_id', 'left' );
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAll_status()
 {
        $this->db->select( '*' );
        $this->db->from( 'la_status' );
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAll_types()
 {
        $this->db->select( '*' );
        $this->db->from( 'la_posts_types' );
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAll_categories()
 {
        $this->db->select( '*' );
        $this->db->from( 'la_categories' );
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAll_attributes_values()
 {
        $this->db->select( '*' );
        $this->db->from( 'la_attributes_values' );
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAll_monetisation()
 {
        $this->db->select( '*' );
        $this->db->from( 'la_monetisation' );
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAll_sectors()
 {
        $this->db->select( '*' );
        $this->db->from( 'la_sectors' );
        $query = $this->db->get();
        return $query->result_array();
    }

    public function save_Post( $data ) 
 {
        $this->db->insert( 'la_posts', $data );
        return $this->db->insert_id();
    }

    public function update_post( $data, $post_id )
 {
        return $this->db->update( 'la_posts', $data, [ 'post_id' => $post_id ] );

    }

    public function edit_Post( $post_id )
 {
        $this->db->join( 'la_status', 'la_posts.fk_status_id = la_status.status_id', 'inner' );
        $this->db->join( 'la_categories', 'la_posts.fk_categorie_id = la_categories.categories_id ', 'inner' );
        $this->db->join( 'la_attributes_values', 'la_posts.fk_attribute_value_id = la_attributes_values.attribute_value_id', 'inner' );
        $this->db->join( 'la_monetisation', 'la_posts.fk_monetisation_id = la_monetisation.monetisation_id', 'inner' );
        $this->db->join( 'la_sectors', 'la_posts.fk_sector_id = la_sectors.sector_id', 'inner' );
        $this->db->join( 'la_posts_types', 'la_posts.fk_post_type_id = la_posts_types.post_type_id', 'left' );
        $query = $this->db->get_where( 'la_posts', [ 'post_id'=>$post_id ] );
        return $query->row_array();
    }

    public function get_Post( $post_id )
 {
        $query = $this->db->get_where( 'la_posts', [ 'post_id'=>$post_id ] );
        return $query->result_array();
    }

    public function delete_Post( $id )
 {
        return $this->db->delete( 'la_posts', array( 'post_id' => $id ) );
    }

    public function update_post_status( $post_id, $fk_status_id ) {
        $data[ 'fk_status_id' ] = $fk_status_id;
        return $this->db->update( 'la_posts', $data, [ 'post_id' => $post_id ] );
    }
    //   ******** spout excel*******

    public function add_row( $data ) {
        return $this->db->insert( 'la_posts', $data );

    }
    #######################################   DATATABLE MODEL       ########################################

    var $table = 'la_posts';
    var $column_order = array( null, 'post_id', 'post_name', 'post_description', 'la_posts.fk_status_id', 'post_image', 'fk_post_type_id', 'post_created_at', 'post_link', 'post_price', 'fk_categorie_id', 'fk_attribute_value_id', 'fk_monetisation_id', 'fk_sector_id' );
    //set column field database for datatable orderable
    var $column_search = array( 'post_id', 'post_name', 'post_description', 'post_image', 'la_posts.fk_status_id', 'fk_post_type_id ', 'post_created_at', 'post_link', 'post_price', 'fk_categorie_id', 'fk_attribute_value_id', 'fk_monetisation_id', 'fk_sector_id' );
    //set column field database for datatable searchable
    var $order = array( 'post_id' => 'asc' );
    // default order

    private function _get_datatables_query()
 {

        $this->db->from( $this->table );

        $i = 0;

        foreach ( $this->column_search as $item ) // loop column 
 {
            if ( $_POST[ 'search' ][ 'value' ] ) // if datatable send POST for search
 {

                if ( $i === 0 ) // first loop
 {
                    $this->db->group_start();
                    // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like( $item, $_POST[ 'search' ][ 'value' ] );
                } else {
                    $this->db->or_like( $item, $_POST[ 'search' ][ 'value' ] );
                }

                if ( count( $this->column_search ) - 1 == $i ) //last loop
                $this->db->group_end();
                //close bracket
            }
            $i++;
        }

        if ( isset( $_POST[ 'order' ] ) ) // here order processing
 {
            $this->db->order_by( $this->column_order[ $_POST[ 'order' ][ '0' ][ 'column' ] ], $_POST[ 'order' ][ '0' ][ 'dir' ] );
        } else if ( isset( $this->order ) ) {
            $order = $this->order;
            $this->db->order_by( key( $order ), $order[ key( $order ) ] );
        }
    }

    function get_datatables()
 {
        $this->_get_datatables_query();
        if ( $_POST[ 'length' ] != -1 )
        $this->db->limit( $_POST[ 'length' ], $_POST[ 'start' ] );
        $this->db->select( 'post_id, post_name, fk_post_type_id, la_posts.fk_status_id, status_name, status_value, status_class,post_price, fk_categorie_id, categories_name, fk_attribute_value_id, attribute_value_name, fk_monetisation_id, monetisation_name, fk_sector_id, sector_name, fk_post_type_id, post_type_name' );
        //$this->db->from( 'la_posts' );
        $this->db->join( 'la_status', 'la_posts.fk_status_id = la_status.status_id', 'inner' );
        $this->db->join( 'la_categories', 'la_posts.fk_categorie_id = la_categories.categories_id ', 'inner' );
        $this->db->join( 'la_attributes_values', 'la_posts.fk_attribute_value_id = la_attributes_values.attribute_value_id', 'inner' );
        $this->db->join( 'la_monetisation', 'la_posts.fk_monetisation_id = la_monetisation.monetisation_id', 'inner' );
        $this->db->join( 'la_sectors', 'la_posts.fk_sector_id = la_sectors.sector_id', 'inner' );
        $this->db->join( 'la_posts_types', 'la_posts.fk_post_type_id = la_posts_types.post_type_id', 'left' );
        if ( $this->input->post( 'post_type_id' ) ) {
            $this->db->where( 'fk_post_type_id', $this->input->post( 'post_type_id' ) );
        }
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
 {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
 {
        $this->db->from( $this->table );
        return $this->db->count_all_results();
    }
}
