<?php
defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );

class Categories extends LA_Controller
 {
    public function __construct()
{
        parent::__construct();
        $this->load->model( 'Categories_model' );
}

    public function index()
{
        $result['status'] = $this->Categories_model->get_all_status();
        $result['categories'] = $this->Categories_model->get_all_categories();
        $this->template->load( 'template', 'categories/index',$result);
       
}

    public function insertCategory()
{
    try{
        if ( $this->input->is_ajax_request() ) {
            $this->form_validation->set_rules( 'categories_name', 'categories_name', 'required|is_unique[la_categories.categories_name]|min_length[3]',
            array(
                'required'=>'Le nom catégorie est  obligatoire',
                'min_length'=>'Le champ nom catégorie doit comporter au moins 3 caractères',
                'is_unique'=>'Nom de catégorie existe.'
            )
             );
            $this->form_validation->set_rules('fk_status_categories_id', 'Status Name ', 'trim|required',
            array(
                'required'=>"Le champ De statut est obligatoire.",
                )
            );
            if ( $this->form_validation->run() == FALSE ) {
                $data = array( 'response' => 'error', 'message' => validation_errors() );
            } else {
                $ajax_data = $this->input->post();
                $id=$this->Categories_model->insert_category( $ajax_data );
                
                if ( $id>0 ) {
                    $post=$this->Categories_model->get_category($id);
                    $data = array( 'response' => 'success', 'message' => 'Opération réussie',"post"=>$post );
                    
                } else {
                    $data = array( 'response' => 'error', 'message' => 'Opération échoue' );
                }
            }
            echo json_encode( $data );
        } else {
            echo "Aucun accès direct aux scripts n'est autorisé";
        }
    }catch(Exception $e){
        var_dump($e->getMessage());
    }
}

//     public function fetchCategories()
// {
//         if ( $this->input->is_ajax_request() ) {
//             echo json_encode($this->Categories_model->get_all_categories());
//         }
// }
//     public function deleteCategory()
// {
//      try{
//         if($this->input->is_ajax_request()){
//             $del_id=$this->input->post('del_id');
//             if($this->Categories_model->delete_category($del_id)){
//                 $data=array('responce'=>"success");

//             }else{
//                 $data=array('responce'=>"error");
//             }
//         }
//         echo json_encode($data);
//     }catch(Exception $e){
//         var_dump($e->getMessage());
//     }
// }
    public function editCategory()
{
    try{
        if($this->input->is_ajax_request()){
            $edit_id=$this->input->post('edit_id');
            if($post=$this->Categories_model->get_category($edit_id)){
                $data=array('response'=>"success","post"=>$post);

            }else{
                $data=array('response'=>"error","message"=>'échoue');
            }
        }
        echo json_encode($data);
    }catch(Exception $e){
        var_dump($e->getMessage());
    }
}
    public function updateCategory()
{
        try{
            $id=$this->input->post('edit_id');
            if ( $this->input->is_ajax_request() ) {
                $this->form_validation->set_rules( 'edit_categories_name', 'Edit Categories', 'required|callback_category_check['.$id.']|min_length[3]',
                array(
                    'required'=>'Le nom catégorie est  obligatoire.',
                    'min_length'=>'Le champ nom catégorie doit comporter au moins 3 caractères.',
                    'category_check'=>'Nom de catégorie existe.'
                )
            );
                $this->form_validation->set_rules('edit_fk_status_categories_id', 'Status Name ', 'trim|required',
                    array(
                    'required'=>"Le champ De statut est obligatoire.",
                    )
            );
                if ( $this->form_validation->run() == FALSE ) {
                    $data = array( 'response' => 'error', 'message' => validation_errors() );
                } else {
                    $data['categories_id'] = $this->input->post('edit_id');
                    $data['categories_name'] = $this->input->post('edit_categories_name');
                    $data['fk_status_categories_id'] = $this->input->post('edit_fk_status_categories_id');
                    if ( $this->Categories_model->update_category( $data ) ) {
                        $post=$this->Categories_model->get_category($data['categories_id']);
                        $data = array( 'response' => 'success', 'message' => 'Édition Réussie',"post"=>$post );
                    } else {
                        $data = array( 'response' => 'error', 'message' => 'Édition Échoue' );
                    }
                }
                echo json_encode( $data );
            } else {
                echo "Aucun accès direct aux scripts n'est autorisé";
            }
        }catch(Exception $e){
            var_dump($e->getMessage());
        }
}
public function category_check($categories_name,$categories_id)
    {
            try{  
            $data = $this->Categories_model->get_category_by_name($categories_name);
                if(!$data){
                return true;
                }
                else if($data['categories_id']== $categories_id){
                    return true;
                 }
                 else
                 {
                    return false;
                 }
                }catch(Exception $e){
                    var_dump($e->getMessage());
                }
    }
}