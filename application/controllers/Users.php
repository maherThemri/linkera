<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends LA_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Users_model");
        //$this->load->library('breadcrumbs');
        
    }

    public function index()
    {
        $result['users'] = $this->Users_model->getAll_Users();
        $this->template->load('template', 'users/index', $result);
        //$this->breadcrumbs->add('Gestion des Utilisateurs', base_url('Users'));
          
    }
    public function saveUser()
    {
        try{
            $result['types'] = $this->Users_model->getAll_types();
            $result['status'] = $this->Users_model->getAll_status();
            $this->template->load('template', 'users/save_user', $result);
        }catch(Exception $e){
            var_dump($e->getMessage());
        }
    }
    public function addUser()
    {
        try{
            $this->form_validation->set_rules('user_firstname', 'Firstname', 'trim|required|min_length[3]|max_length[12]',
            array(
                'required'=>'Le champ Nom est  obligatoire',
                'min_length'=>'Le champ Nom doit comporter au moins 3 caractères.',
                'max_length'=>'Le champ Nom ne peut pas dépasser 12 caractères.'
            )
        );
            $this->form_validation->set_rules('user_lastname', 'Lastname', 'trim|required|min_length[3]|max_length[12]',
            array(
                'required'=>'Le Prénom est  obligatoire',
                'min_length'=>'Le champ Prénom doit comporter au moins 3 caractères.',
                'max_length'=>'Le champ Prénom ne peut pas dépasser 12 caractères.'
            )
        );
            $this->form_validation->set_rules('user_email', 'Email', 'trim|required|valid_email|is_unique[la_users.user_email]',
            array(
                'required'=>'Le champ Email est  obligatoire.',
                'is_unique'=>'Le champ Email doit contenir une valeur unique.',
                'valid_email'=>'Le champ Email doit contenir une adresse e-mail valide.'
                )
        );
            $this->form_validation->set_rules('user_phonenumber', 'Phone Number', 'trim|required|exact_length[10]|is_unique[la_users.user_phonenumber]',
            array(
                'is_unique'=>'Le champ Numéro de téléphone doit contenir une valeur unique.',
                'required'=>'Le champ Numéro de téléphone est obligatoire',
                'exact_length'=>'Le champ Numéro de téléphone doit comporter exactement 8 caractères.'
                )
        );
            $this->form_validation->set_rules('user_password', 'Password', 'trim|required|min_length[8]',
            array(
                'required'=>'Le champ Mot de passe est obligatoire',
                'min_length'=>'Le champ Mot de passe doit comporter au moins 8 caractères.'
            )
        );
            $this->form_validation->set_rules('confirm_user_password', 'Confirm Password', 'trim|required|matches[user_password]',
            array(
                'required'=>'Le champ Confirme le mot de passe est obligatoire',
                'matches'=>'Le champ Confirmer le mot de passe ne correspond pas au champ Mot de passe.'
            )
        );
            $this->form_validation->set_rules('fk_status_id', 'Status Name ', 'trim|required',
            array(
                'required'=>"Le champ De statut est obligatoire.",
                )
        );
            $this->form_validation->set_rules('fk_type_id', 'Type User', 'trim|required',
            array(
                'required'=>'Le champ Type Utilisateur est obligatoire.',
                )
        );
            if ($this->form_validation->run()) {
                    unset($_POST['confirm_user_password']);
                    $params = $_POST;
                    $params['user_password'] = sha1($_POST['user_password']);
                    $test= $this->Users_model->save_User($params);
                    if ($test==true) {
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
                'error'   => true,
                'error_message'=>'<div class="alert alert-danger">Opération a échoué</div>',
                'user_firstname_error' => form_error('user_firstname'),
                'user_lastname_error' => form_error('user_lastname'),
                'user_email_error' => form_error('user_email'),
                'user_phonenumber_error' => form_error('user_phonenumber'),
                'user_password_error' => form_error('user_password'),
                'confirm_user_password_error' => form_error('confirm_user_password'),
                'fk_status_id_error' => form_error('fk_status_id'),
                'fk_type_id_error' => form_error('fk_type_id')
                );
            }

            echo json_encode($array);
            }catch(Exception $e){
                var_dump($e->getMessage());
            }
    }
    public function edit($user_id)
    {
        try{
            $data['types'] = $this->Users_model->getAll_types();
            $data['status'] = $this->Users_model->getAll_status();
            $data['user'] = $this->Users_model->edit_User($user_id);
            $this->template->load('template', 'users/edit',$data);
        }catch(Exception $e){
            var_dump($e->getMessage());
        }

    }
    public function update()
    {
        try{   
            $user_id=$this->input->post('user_id');
            $this->form_validation->set_rules('user_firstname', 'Firstname', 'trim|required|min_length[3]|max_length[12]',
            array(
                'required'=>'Le champ Nom est  obligatoire',
                'min_length'=>'Le champ Nom doit comporter au moins 3 caractères.',
                'max_length'=>'Le champ Nom ne peut pas dépasser 12 caractères.'
            )
        );
            $this->form_validation->set_rules('user_lastname', 'Lastname', 'trim|required|min_length[3]|max_length[12]',
            array(
                'required'=>'Le Prénom est  obligatoire',
                'min_length'=>'Le champ Prénom doit comporter au moins 3 caractères.',
                'max_length'=>'Le champ Prénom ne peut pas dépasser 12 caractères.'
            )
        );
            $this->form_validation->set_rules('user_email', 'Email', 'required|valid_email|callback_email_check['.$user_id.']',
            array(
                'required'=>'Le champ Email est  obligatoire.',
                'email_check'=>'Le champ Email doit contenir une valeur unique.',
                'valid_email'=>'Le champ Email doit contenir une adresse e-mail valide.'

                )
        );
            $this->form_validation->set_rules('user_phonenumber', 'Phone Number', 'required|exact_length[8]|callback_phonenumber_check['.$user_id.']',
            array(
                'phonenumber_check'=>'Le champ Numéro de téléphone doit contenir une valeur unique.',
                'required'=>'Le champ Numéro de téléphone est obligatoire',
                'exact_length'=>'Le champ Numéro de téléphone doit comporter exactement 8 caractères.'
                )
        );
            $this->form_validation->set_rules('fk_status_id', 'Status Name ', 'trim|required',
            array(
                'required'=>"Le champ De statut est obligatoire.",
                )
        );
            $this->form_validation->set_rules('fk_type_id', 'Type User', 'trim|required',
            array(
                'required'=>'Le champ Type Utilisateur est obligatoire.',
                )
        );
            if ($this->form_validation->run()){
                $data=[
                    'user_firstname'=>$this->input->post('user_firstname'),
                    'user_lastname'=>$this->input->post('user_lastname'),
                    'user_email'=>$this->input->post('user_email'),
                    'user_phonenumber'=>$this->input->post('user_phonenumber'),
                    'fk_status_id'=>$this->input->post('fk_status_id'),
                    'fk_type_id'=>$this->input->post('fk_type_id'),
                ];
                
                $test=$this->Users_model->update_User($data,$user_id);
                if ($test==true) {
                    $array = array(
                        'success' => '<div class="alert alert-success">Opération réussite</div>'
                        );
                }else {
                    $array = array(
                        'error' => '<div class="alert alert-danger">erroorr</div>'
                        );
                }    
            }else {
                $array = array(
                    'error'   => true,
                    'error_message'=>'<div class="alert alert-danger">Opération a échoué</div>',
                    'user_firstname_error' => form_error('user_firstname'),
                    'user_lastname_error' => form_error('user_lastname'),
                    'user_email_error' => form_error('user_email'),
                    'user_phonenumber_error' => form_error('user_phonenumber'),
                    'fk_status_id_error' => form_error('fk_status_id'),
                    'fk_type_id_error' => form_error('fk_type_id')
                    );
            }
            echo json_encode($array);
        }catch(Exception $e){
            var_dump($e->getMessage());
        }
    }

    public function email_check($user_email,$user_id)
    {
            try{  
            $data = $this->Users_model->get_user_by_email($user_email);
                if(!$data){
                return true;
                }
                else if($data['user_id']== $user_id){
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
    public function phonenumber_check($user_phonenumber,$user_id)
     {
        try{  
            $data = $this->Users_model->get_user_by_phone_number($user_phonenumber);
                if(!$data){
                return true;
                }
                else if($data['user_id']== $user_id){
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
