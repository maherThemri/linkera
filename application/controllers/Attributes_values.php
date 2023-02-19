<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Attributes_values extends LA_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Attributes_values_model");
    }
    public function index()
    {
        try{
            $result['attributes_values'] = $this->Attributes_values_model->getAll_Attributes_Values();
            $this->template->load('template', 'attributes_values/index',$result);
        }
        catch(Exception $e){
            var_dump($e->getMessage());
        }
    }
    public function saveAttributeValue()
    {
        try{
            $result['status'] = $this->Attributes_values_model->getAll_status();
            $result['attributes'] = $this->Attributes_values_model->getAll_Attributes();
            $this->template->load('template', 'attributes_values/save_attribute_value',$result);
        }
        catch(Exception $e){
            var_dump($e->getMessage());
        }
       
    }
    public function addAttributeValue()
    {
        try{
            $this->form_validation->set_rules('attribute_value_name', 'attribute value name', 'trim|required|min_length[3]',
                array(
                'required'=>"Le champ Nom de valeur d'attribut est  obligatoire",
                'min_length'=>"Le champ Nom de valeur d'attribut doit comporter au moins 3 caractères.",
                // 'max_length'=>"Le champ Nom de valeur d'attribut ne peut pas dépasser 12 caractères.",
                'is_unique'=>"Le champ Nom de valeur d'attribut doit contenir une valeur unique.",

                )
            );
              
                    $this->form_validation->set_rules('fk_attribute_id', 'Attribute Name ', 'trim|required',
                array(
                    'required'=>"Le champ Nom d'attribute est obligatoire.",
                    )
            );
                    $this->form_validation->set_rules('fk_status_id', 'Status Name ', 'trim|required',
                array(
                    'required'=>"Le champ De statut est obligatoire.",
                    )
            );
            if ($this->form_validation->run()) {
                $test= $this->Attributes_values_model->save_Attribute_Value($_POST);
                
                    if ($test>0) {
                       
                        $this->load->library('upload');
                        $config = array(
                            'upload_path' => './uploads/attributes_values_assets',
                            'allowed_types' => 'gif|jpg|png|jpeg|pdf',
                            'max_size' => 2048, // 2MB
                            'encrypt_name' => true
                            );
                            $this->upload->initialize($config);
                            if ($this->upload->do_upload('file')) {
                            $file_data = $this->upload->data();
                            $param= array("attribute_value_asset" => $file_data['file_name']);
                            $this->Attributes_values_model->update_Attribute_File($param,$test);
                            } else {
                                $array = array(
                                    'warning' => "<div class='alert alert-warning'>Téléchargement d'image échoué  </div>"
                                    );
                            }
                            $array = array(
                                'success' => '<div class="alert alert-success">Opération réussite</div>'
                                );
                        }else {
                            $array = array(
                                'error' => '<div class="alert alert-danger">error</div>'
                            );
                        }    
                }
                    else
                        {
                            $array = array(
                                'error'=> true,
                                'error_message'=>'<div class="alert alert-danger">Opération a échoué</div>',
                                'attribute_value_name_error' => form_error('attribute_value_name'),
                                'fk_attribute_id_error' => form_error('fk_attribute_id'),
                                'fk_status_id_error' => form_error('fk_status_id')
                            );
                        }
                echo json_encode($array);
        }
            catch(Exception $e){
                var_dump($e->getMessage());
            }
    }
    public function editAttributeValue($attribute_value_id)
    {
        try{
                $data['attributes'] = $this->Attributes_values_model->getAll_Attributes();
                $data['status'] = $this->Attributes_values_model->getAll_status();
                $data['attribute_value'] = $this->Attributes_values_model->edit_Attribute_Value($attribute_value_id);
                $this->template->load('template', 'attributes_values/edit_attribute_value',$data);
                // var_dump($data);
                // die;
            }
                catch(Exception $e){
                    var_dump($e->getMessage());
                }
        
    }
    public function updateAttributeValue()
    {
        try{
                $attribute_value_id=$this->input->post('attribute_value_id');
                $this->form_validation->set_rules('attribute_value_name', 'attribute value name', 'trim|required|min_length[3]',
                    array(
                    'required'=>"Le champ Nom de valeur d'attribut est  obligatoire",
                    'min_length'=>"Le champ Nom de valeur d'attribut doit comporter au moins 3 caractères.",
                    // 'max_length'=>"Le champ Nom de valeur d'attribut ne peut pas dépasser 12 caractères.",
                    )
                );
                        $this->form_validation->set_rules('fk_attribute_id', 'Attribute Name ', 'trim|required',
                    array(
                        'required'=>"Le champ Nom d'attribute est obligatoire.",
                        )
                );
                        $this->form_validation->set_rules('fk_status_id', 'Status Name ', 'trim|required',
                    array(
                        'required'=>"Le champ De statut est obligatoire.",
                        )
                );
            if ($this->form_validation->run()){
                $data=[
                    'attribute_value_name'=>$this->input->post('attribute_value_name'),
                    'fk_attribute_id'=>$this->input->post('fk_attribute_id'),
                    'fk_status_id'=>$this->input->post('fk_status_id'),
                ];
                
                
                $test=$this->Attributes_values_model->update_Attribute_Value($data,$attribute_value_id);
                if ($test==true) {
                    $this->load->library('upload');
                        $config = array(
                            'upload_path' => './uploads/attributes_values_assets',
                            'allowed_types' => 'gif|jpg|png|jpeg|pdf',
                            'max_size' => 2048, // 2MB
                            'encrypt_name' => true
                            );
                            $this->upload->initialize($config);
                            if ($this->upload->do_upload('file')) {

                            $file_data = $this->upload->data();
                            $param= array("attribute_value_asset" => $file_data['file_name']);
                            $this->Attributes_values_model->update_Attribute_File($param,$attribute_value_id);
                            // $array = array(
                            //     'success1' => '<div class="alert alert-success">Opération réussite1</div>',
                            //     'file_name'=>$file_data['file_name']
                            //     );
                            } else {
                                $array = array(
                                    'warning' => "<div class='alert alert-warning'>Téléchargement d'image échoué  </div>"
                                    );
                            }
                           
                    $array = array(
                        'success' => '<div class="alert alert-success">Opération réussite</div>',
                        
                        
                        );
                        $array['file_name']='';
                        if ($_FILES['file']['name']!="") {
                            
                            $array['file_name']=$file_data['file_name'];
                        }
                }else {
                    $array = array(
                        'error' => '<div class="alert alert-danger">erroorr</div>'
                        );
                }    
            }else {
                $array = array(
                    'error'   => true,
                    'error_message'=>'<div class="alert alert-danger">Opération a échoué</div>',
                    'attribute_value_name_error' => form_error('attribute_value_name'),
                    'fk_attribute_id_error' => form_error('fk_attribute_id'),
                    'fk_status_id_error' => form_error('fk_status_id')
                    );
            }
            echo json_encode($array);
        }
        catch(Exception $e){
            var_dump($e->getMessage());
        }
    }
}