<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Process_check_list extends LA_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Process_check_list_model");
    }
    public function index()
    {
        try{
            $result['status'] = $this->Process_check_list_model->get_all_status();
            $result['process'] = $this->Process_check_list_model->get_all_process();
            $result['lists'] = $this->Process_check_list_model->get_all_process_check_list();
            $this->template->load('template', 'process_check_list/index',$result);
        }
        catch(Exception $e){
            var_dump($e->getMessage());
        }
    }
    public function insertProcessCheckList()
    {
        try{
            if ( $this->input->is_ajax_request() ) {
                $this->form_validation->set_rules( 'process_check_list_value', 'value process', 'required|min_length[3]',
                array(
                    'required'=>'La valeur est  obligatoire',
                    'min_length'=>'La valeur doit comporter au moins 3 caractères',
                )
                 );
                $this->form_validation->set_rules('fk_process_id', 'Process ', 'trim|required',
                array(
                    'required'=>"Le champ Du Processus est obligatoire.",
                    )
                );
                $this->form_validation->set_rules('fk_status_id', 'Status Name ', 'trim|required',
                array(
                    'required'=>"Le champ De statut est obligatoire.",
                    )
                );
                if ( $this->form_validation->run() == FALSE ) {
                    $data = array( 
                        'response' => 'error',
                        'message' => 'Opération échoue',
                        'fk_process_id_error'=>form_error('fk_process_id'),
                        'process_check_list_value_error'=>form_error('process_check_list_value')
                        );
                } else {
                    $params = $this->input->post();
                    $id=$this->Process_check_list_model->insert_value_process( $params );
                    
                    if ( $id>0 ) {
                        $post=$this->Process_check_list_model->get_process_chek_list($id);
                        $data = array( 'response' => 'success', 'message' => 'Opération réussie','post'=>$post);
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
    public function editProcessCheckList()
    {
        try{
            if($this->input->is_ajax_request()){
                $edit_id=$this->input->post('edit_id');
                if($post=$this->Process_check_list_model->get_process_chek_list($edit_id)){
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
    public function updateProcessCheckList()
    {
            try{
                $id=$this->input->post('edit_id');
                if ( $this->input->is_ajax_request() ) {
                    $this->form_validation->set_rules( 'edit_process_check_list_value', 'Edit valeurs', 'required',
                    array(
                        'required'=>'La valeur est  obligatoire.',
                    )
                );
                    $this->form_validation->set_rules('edit_fk_process_id', 'Process Name ', 'trim|required',
                        array(
                        'required'=>"Le processus est obligatoire.",
                        )
                );
                // $this->form_validation->set_rules('edit_fk_status_id', 'status Name ', 'trim|required',
                //         array(
                //         'required'=>"Le statut est obligatoire.",
                //         )
                // );
                    if ( $this->form_validation->run() == FALSE ) {
                        $data = array( 'response' => 'error', 'message' => validation_errors() );
                    } else {
                        $data['process_check_list_id'] = $this->input->post('edit_id');
                        $data['process_check_list_value'] = $this->input->post('edit_process_check_list_value');
                        $data['fk_process_id'] = $this->input->post('edit_fk_process_id');
                        // $data['fk_status_id'] = $this->input->post('edit_fk_status_id');
                        if ( $this->Process_check_list_model->update_process_check_list( $data ) ) {
                            $post=$this->Process_check_list_model->get_process_chek_list($data['process_check_list_id']);
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
    public function updateStatus()
     {
        try{
              $process_check_list_id = $this->input->post('process_check_list_id');
              $fk_status_id = $this->input->post('fk_status_id');
              $update_status = $this->Process_check_list_model->update_status($process_check_list_id, $fk_status_id);
              if ($update_status) {
                  $post=$this->Process_check_list_model->get_process_chek_list($process_check_list_id);
                  $data = array( 'response' => 'success',"post"=>$post );
              } else {
                  $data = array( 'response' => 'error' );
              }
                echo json_encode( $data );
            }catch(Exception $e){
            var_dump($e->getMessage());
        }
      }
      
}