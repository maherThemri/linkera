<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Posts extends LA_Controller
{
    public function __construct()
  {
        parent::__construct();
        $this->load->model("Posts_model");     
  }
    public function index()
  {
      try{
        $result['types'] = $this->Posts_model->getAll_types();
        $this->template->load('template', 'posts/index',$result);
      }catch(Exception $e){
        var_dump($e->getMessage());
    }      
  }
    public function createPost()
  { 
      try{
        $result['status'] = $this->Posts_model->getAll_status();
        $result['types'] = $this->Posts_model->getAll_types();
        $result['categories'] = $this->Posts_model->getAll_categories();
        $result['attributes_values'] = $this->Posts_model->getAll_attributes_values();
        $result['monetisation'] = $this->Posts_model->getAll_monetisation();
        $result['sectors'] = $this->Posts_model->getAll_sectors();
        $this->template->load('template', 'posts/create_post',$result);
        }catch(Exception $e){
        var_dump($e->getMessage());
    }
  }
    public function FileUpload()
  {
      try{
          $this->load->library('upload');
          $config = array(
            'upload_path' => './uploads/posts_assets',
            'allowed_types' => 'gif|jpg|png|jpeg|pdf',
            'max_size' => 2048, // 2MB
            'encrypt_name' => true
          );
          $this->upload->initialize($config);
          if ($this->upload->do_upload('file')) {
            // $data=$this->Posts_model->get_Post($_GET["post_id"]);
            // var_dump($data->$post);
            // die;
            $file_data = $this->upload->data();
            $param= array("post_image" => $file_data['file_name']);
            $this->Posts_model->update_post($param,$_GET["post_id"]);
            echo json_encode(array('status' => 'success', 'post_id' => $_GET["post_id"],'file_name'=>$file_data['file_name']));
          } else {
            echo json_encode(array('status' => 'error'));
          }
        }catch(Exception $e){
          var_dump($e->getMessage());
      }
  }
      public function addPost() 
  {
        try{
            $this->form_validation->set_rules('post_name', 'Post Name', 'trim|required|min_length[3]',
                    array(
                        'required'=>'Le champ Titre est  obligatoire',
                        'min_length'=>'Le champ Titre doit comporter au moins 3 caractères.',
                    )
                );
                $this->form_validation->set_rules('post_description', 'Description', 'trim|required',
                array(
                    'required'=>'Le champ Description est  obligatoire.',
                    )
            );
            $this->form_validation->set_rules('fk_post_type_id', 'type post', 'trim|required',
                    array(
                        'required'=>"Le champ De Type est obligatoire.",
                        )
                );
                $this->form_validation->set_rules('fk_status_id', 'Status Name ', 'trim|required',
                    array(
                        'required'=>"Le champ De statut est obligatoire.",
                        )
                );
                $this->form_validation->set_rules('fk_categorie_id', 'Categorie Name ', 'trim|required',
                    array(
                        'required'=>"Le champ De Catégorie est obligatoire.",
                        )
                );
                $this->form_validation->set_rules('fk_attribute_value_id[]', 'Valeur Name ', 'trim|required',
                array(
                    'required'=>"Le champ De Téchnologie est obligatoire.",
                    )
            );
            $this->form_validation->set_rules('fk_monetisation_id', 'Monetisation Name ', 'trim|required',
                array(
                    'required'=>"Le champ De Monetisation est obligatoire.",
                    )
            );
            $this->form_validation->set_rules('fk_sector_id', 'sector Name ', 'trim|required',
                array(
                    'required'=>"Le champ De Secteur est obligatoire.",
                    )
            );
            $this->form_validation->set_rules('post_price', 'Price ', 'trim|required',
                array(
                    'required'=>"Le champ De Prix est obligatoire.",
                    )
            );
                if ($this->form_validation->run()) {
                      $data = array(
                        'post_name' => $this->input->post('post_name'),
                        'fk_post_type_id' => $this->input->post('fk_post_type_id'),
                        'post_description' => $this->input->post('post_description'),
                        'fk_status_id' => $this->input->post('fk_status_id'),
                        'fk_categorie_id' => $this->input->post('fk_categorie_id'),
                        'fk_attribute_value_id' => implode(",",$this->input->post('fk_attribute_value_id')),
                        'fk_monetisation_id' => $this->input->post('fk_monetisation_id'),
                        'fk_sector_id' => $this->input->post('fk_sector_id'),
                        'post_price' => $this->input->post('post_price')
                      );
                      //  var_dump($data);
                      //  die;
                      $result = $this->Posts_model->save_Post($data);
                      if($result>0) {
                        echo json_encode(array('status' => 'success','post_id' => $result));
                      } else {
                        echo json_encode(array('status' => 'error'));
                      }
            }else{
              echo json_encode(array(
                'status' => 'error',
                'post_name_error' => form_error('post_name'),
                'post_type_error' => form_error('fk_post_type_id'),
                'post_description_error' => form_error('post_description'),
                'fk_status_id_error' => form_error('fk_status_id'),
                'fk_categorie_id_error' => form_error('fk_categorie_id'),
                'fk_attribute_value_id_error' => form_error('fk_attribute_value_id'),
                'fk_monetisation_id_error' => form_error('fk_monetisation_id'),
                'fk_sector_id_error' => form_error('fk_sector_id'),
                'post_price_error' => form_error('post_price')
              ));
            }
          }catch(Exception $e){
            var_dump($e->getMessage());
        }
  }
    public function editPost($post_id)
  {
        $result['types'] = $this->Posts_model->getAll_types();
        $result['status'] = $this->Posts_model->getAll_status();
        $result['categories'] = $this->Posts_model->getAll_categories();
        $result['attributes_values'] = $this->Posts_model->getAll_attributes_values();
        $result['monetisation'] = $this->Posts_model->getAll_monetisation();
        $result['sectors'] = $this->Posts_model->getAll_sectors();
        $post = $this->Posts_model->edit_Post($post_id);
        $result['post'] = $post;
        $result['attributes_liste'] = explode(',',$post['fk_attribute_value_id']);
        $this->template->load('template', 'posts/edit_post',$result);
  }
    public function updatePost() 
  {
        try{
            $post_id=$this->input->post('post_id');
            $this->form_validation->set_rules('post_name', 'Post Name', 'trim|required|min_length[3]|max_length[50]',
                    array(
                        'required'=>'Le champ Titre est  obligatoire',
                        'min_length'=>'Le champ Titre doit comporter au moins 3 caractères.',
                        'max_length'=>'Le champ Titre ne peut pas dépasser 12 caractères.'
                    )
                );
                $this->form_validation->set_rules('post_description', 'Description', 'trim|required',
                array(
                    'required'=>'Le champ Description est  obligatoire.',
                    )
            );
            $this->form_validation->set_rules('fk_post_type_id', 'type post', 'trim|required',
                    array(
                        'required'=>"Le champ De Type est obligatoire.",
                        )
                );
                $this->form_validation->set_rules('fk_status_id', 'Status Name ', 'trim|required',
                    array(
                        'required'=>"Le champ De statut est obligatoire.",
                        )
                );
                $this->form_validation->set_rules('fk_categorie_id', 'Categorie Name ', 'trim|required',
                    array(
                        'required'=>"Le champ De Catégorie est obligatoire.",
                        )
                );
                $this->form_validation->set_rules('fk_attribute_value_id[]', 'Valeur Name ', 'trim|required',
                array(
                    'required'=>"Le champ De Téchnologie est obligatoire.",
                    )
            );
            $this->form_validation->set_rules('fk_monetisation_id', 'Monetisation Name ', 'trim|required',
                array(
                    'required'=>"Le champ De Monetisation est obligatoire.",
                    )
            );
            $this->form_validation->set_rules('fk_sector_id', 'sector Name ', 'trim|required',
                array(
                    'required'=>"Le champ De Secteur est obligatoire.",
                    )
            );
            $this->form_validation->set_rules('post_price', 'Price ', 'trim|required',
                array(
                    'required'=>"Le champ De Prix est obligatoire.",
                    )
            ); 
                if ($this->form_validation->run()) {
                      $data = array(
                        'post_name' => $this->input->post('post_name'),
                        'fk_post_type_id' => $this->input->post('fk_post_type_id'),
                        'post_description' => $this->input->post('post_description'),
                        'fk_status_id' => $this->input->post('fk_status_id'),
                        'fk_categorie_id' => $this->input->post('fk_categorie_id'),
                        'fk_attribute_value_id' => implode(",",$this->input->post('fk_attribute_value_id')),
                        'fk_monetisation_id' => $this->input->post('fk_monetisation_id'),
                        'fk_sector_id' => $this->input->post('fk_sector_id'),
                        'post_price' => $this->input->post('post_price')
                      );
                      $result = $this->Posts_model->update_post($data,$post_id);
                      if($result==true) {
                        $array=array(
                          'success' => '<div class="alert alert-success">Opération réussit</div>'
                        );
                      } else {
                        $array=array('status' => 'error');
                      }
            }else{
              $array=array(
                'error'   => true,
                'error_message'=>'<div class="alert alert-danger">Opération échoué</div>',
                'post_name_error' => form_error('post_name'),
                'post_type_error' => form_error('fk_post_type_id'),
                'post_description_error' => form_error('post_description'),
                'fk_status_id_error' => form_error('fk_status_id'),
                'fk_categorie_id_error' => form_error('fk_categorie_id'),
                'fk_attribute_value_id_error' => form_error('fk_attribute_value_id[]'),
                'fk_monetisation_id_error' => form_error('fk_monetisation_id'),
                'fk_sector_id_error' => form_error('fk_sector_id'),
                'post_price_error' => form_error('post_price')
              );
            }
            echo json_encode($array);
          }catch(Exception $e){
            var_dump($e->getMessage());
        }
 }
    public function deletePost()
  {
        try{
            if($this->input->is_ajax_request()){
                $del_id=$this->input->post('del_id');
                if($this->Posts_model->delete_Post($del_id)){
                    $data=array('response'=>"success");

                }else{
                    $data=array('response'=>"error");
                }
            }
            echo json_encode($data);
        }catch(Exception $e){
            var_dump($e->getMessage());
        }
  }
public function update_status() {
    try{
      $post_id = $this->input->post('post_id');
      $fk_status_id = $this->input->post('fk_status_id');
      $update_status = $this->Posts_model->update_post_status($post_id, $fk_status_id);
      if ($update_status) {
        echo 'success';
      } else {
        echo 'error';
      }
    }catch(Exception $e){
      var_dump($e->getMessage());
    }
}
// ****************datatable server side********************* 
function getLists()
    {
      try{

        $list = $this->Posts_model->get_datatables();
        
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $customers) {
            $no++;
            $row = array();
            $row[] = $customers->post_id;
            $row[] = $customers->post_name;
            $row[] = $customers->post_type_name;
            $row[] = $customers->categories_name;
            $row[] = $customers->attribute_value_name;
            $row[] = $customers->sector_name;
            $row[] = $customers->monetisation_name;
            $row[] ="<span>$customers->post_price €</span>";
            $row[] ="<button type='button' class='badge badge-$customers->status_class-inverted btn-update-status' data-id='$customers->post_id' data-status='$customers->fk_status_id'>
            $customers->status_name</button>" ;
            $row[] = "<a href='".base_url()."Posts/editPost/$customers->post_id'><i class='os-icon os-icon-ui-49'></i></a>
            <a class='danger delete_post' href='#' id='#'value='".$customers->post_id ."'><i class='os-icon os-icon-ui-15'></i></a>";
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Posts_model->count_all(),
            "recordsFiltered" => $this->Posts_model->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
      }catch(Exception $e){
        var_dump($e->getMessage());
      }
    }
}