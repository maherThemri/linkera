<!-------------------
          Start Breadcrumbs
          ------------->
          <ul class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?= base_url(). 'dashboard/index'?>">Accueil</a>
            </li>
             <li class="breadcrumb-item">
              <a href="<?= base_url().'posts/index'?>">Gestion des dossiers</a>
            </li>  
            <li class="breadcrumb-item">
              <span>Edition dossier</span>
            </li>
          </ul>
          <!--------------------
          END - Breadcrumbs
          -------------------->
<!-- ******** Edit Post******* -->
<span id="success_message" class="hide"></span>
<span id="error_message" class="hide"></span>
<div class="progress hide" id="progress">
  <div class="progress-bar progress-bar-striped progress-bar-animated " role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%" >
  </div>
</div>
<!-- <div class="row pt-3">
  <div class="col-lg-8">
    <div class="element-wrapper">
      <div class="element-box">
        <form id="edit_post_form" method="post">
          <h5 class="form-header">
            Édition Annonce
          </h5>
          <input type="hidden" value="<?= $post['post_id'] ?>"  name="post_id" id="">
          <fieldset class="form-group">
            <legend><span>Informations générales</span></legend>
            <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Titre</label><input class="form-control" data-error="Please input your Title" placeholder="Titre de l'article" required="required" type="text" value="<?= $post['post_name'] ?>" name="post_name" id="post_name">
                <div class="help-block form-text with-errors form-control-feedback" id="post_name_error" name="post_name_error"></div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
              <label for=""> Type</label>
                <select class="form-control" name="fk_post_type_id" id="fk_post_type_id">
                  <?php foreach ($types as $row): ?>
                    <option value="<?php echo $row['post_type_id'];?>"<?php if($post['fk_post_type_id'] == $row['post_type_id']){?> selected <?php } ?> >
                      <?php echo $row['post_type_name']?>
                    </option>
                  <?php endforeach;?>
                </select>
                <div class="help-block form-text with-errors form-control-feedback" id="post_type_error" name="post_type_error"></div>
              </div>
            </div>
          </div>
          <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                <label for="">Catégorie</label>
                  <select class="form-control" name="fk_categorie_id" id="fk_categorie_id">
                    <?php foreach ($categories as $row): ?>
                      <option value="<?php echo $row['categories_id'];?>"<?php if($post['fk_categorie_id'] == $row['categories_id']){?> selected <?php } ?> >
                        <?php echo $row['categories_name']?>
                      </option>
                    <?php endforeach;?>
                  </select>
                  <div class="help-block form-text with-errors form-control-feedback" id="fk_categorie_id_error" name="fk_categorie_id_error"></div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for=""> Secteur</label>
                    <select class="form-control" name="fk_sector_id" id="fk_sector_id">
                      <?php foreach ($sectors as $row): ?>
                        <option value="<?php echo $row['sector_id'];?>"<?php if($post['fk_sector_id']== $row['sector_id']){?> selected <?php } ?> >
                          <?php echo $row['sector_name']?>
                        </option>
                      <?php endforeach;?>
                    </select>
                    <div class="help-block form-text with-errors form-control-feedback" id="fk_sector_id_error" name="fk_sector_id_error"></div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label> Description</label>
              <textarea class="form-control" rows="3" id="post_description" name="post_description">
                <?= $post['post_description'] ?>
              </textarea>
              <div class="help-block form-text with-errors form-control-feedback" id="post_description_error" name="post_description_error"></div>
            </div>
          <div class="form-group row">
            <label class="col-sm-1 col-form-label">Statut</label>
            <div class="col-sm-8 mt-2">
            <?php foreach ($status as $statu) : ?>
                <div class="form-check form-check-inline">
                  <label class="form-check-label">
                    <input class="form-check-input" name="fk_status_id"id="fk_status_id" type="radio" 
                    value="<?php echo $statu['status_id'];?>"<?php if($post['fk_status_id']== $statu['status_id']){?> checked <?php } ?>>
                    <?php echo $statu['status_name']?>
                  </label>
                </div>
                <?php endforeach; ?>
                <div id="fk_status_id_error" class="help-block form-text with-errors form-control-feedback"></div>
            </div>
          </div>
        </fieldset>
          <fieldset class="form-group">
            <legend><span>Informations techniques</span></legend>
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                <label for=""> Technologies</label>
                      <select class="form-control select2" multiple="true" name="fk_attribute_value_id[]" id="fk_attribute_value_id">
                    <?php foreach ($attributes_values as $row) : ?>
                      <option value="<?php echo $row['attribute_value_id'];?>"<?php if (in_array($row['attribute_value_id'], $attributes_liste))  {?> selected <?php }?> >
                        <?= $row['attribute_value_name'] ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                  <div class="help-block form-text with-errors form-control-feedback" id="fk_attribute_values_id_error" name="fk_attribute_value_id_error"></div>
                </div>
              </div>
            </div>
          </fieldset>
          <fieldset class="form-group">
            <legend><span>Informations financières</span></legend>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="">Prix de vente</label><input class="form-control" data-error="Please input your Title" placeholder="Prix en €" required="required" type="number" value="<?= $post['post_price']?>" name="post_price" id="post_price">
                  <div class="help-block form-text with-errors form-control-feedback" id="post_price_error" name="post_price_error"></div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                <label for="">Monétisation</label>
                  <select class="form-control" name="fk_monetisation_id" id="fk_monetisation_id">
                    <?php foreach ($monetisation as $row): ?>
                      <option value="<?php echo $row['monetisation_id'];?>"<?php if($post['fk_monetisation_id'] == $row['monetisation_id']){?> selected <?php } ?> >
                        <?php echo $row['monetisation_name']?>
                      </option>
                    <?php endforeach;?>
                  </select>
                  <div class="help-block form-text with-errors form-control-feedback" id="fk_monetisation_id_error" name="fk_monetisation_id_error"></div>
                </div>
              </div>
            </div>
          </fieldset>
          
          <div class="form-buttons-w">
            <input type="submit" name="contact" id="contact" class="btn btn-success" value="Enregistrer">
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-lg-4">
    <div class="element-wrapper">
      <div class="element-box less-padding">
      <img id="new_image" alt="" src="<?= base_url() ?>uploads/posts_assets/<?= $post['post_image']?>"class="img-thumbnail"style="object-fit: cover;">
                  <div class="form-buttons-w"></div>
                  <form action="https://app.linkera.com/platform/posts/FileUpload?post_id=<?= $post['post_id'] ?>" class="myDropzone" id="mydropzone1">
                    <div class="dz-message">
                      <div>
                        <h4>Déposez une image ici.</h4><div class="text-muted"></div>
                      </div>
                    </div>
                  </form>
      </div>
    </div>
  </div>
</div> -->
<!-- ******************************* -->
<div class="os-tabs-w pt-2">
                      <div class="os-tabs-controls">
                      <ul class="nav nav-tabs bigger">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#tab_dossier">Dossier</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#tab_check-list">Check-list</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#tab_techniques">Techniques</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#tab_finances">Finances</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#tab_juridique">Juridique</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#tab_NDA">NDA</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#tab_media">Media</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#tab_cedant">Cédant</a>
      </li>
    </ul>
                        
  </div>
                      <div class="tab-content">
                        <div class="tab-pane active" id="tab_dossier">
                        <div class="row">
        <div class="col-lg-12">
          <div class="element-wrapper">
            <div class="element-box">
              <form id="edit_post_form" method="post">
                <input type="hidden" value="<?= $post['post_id'] ?>"  name="post_id" id="">
                <fieldset class="form-group">
                  <legend><span>Informations générales</span></legend>
                  <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Titre</label><input class="form-control" data-error="Please input your Title" placeholder="Titre de l'article" required="required" type="text" value="<?= $post['post_name'] ?>" name="post_name" id="post_name">
                      <div class="help-block form-text with-errors form-control-feedback" id="post_name_error" name="post_name_error"></div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                    <label for=""> Type</label>
                      <select class="form-control" name="fk_post_type_id" id="fk_post_type_id">
                        <?php foreach ($types as $row): ?>
                          <option value="<?php echo $row['post_type_id'];?>"<?php if($post['fk_post_type_id'] == $row['post_type_id']){?> selected <?php } ?> >
                            <?php echo $row['post_type_name']?>
                          </option>
                        <?php endforeach;?>
                      </select>
                      <div class="help-block form-text with-errors form-control-feedback" id="post_type_error" name="post_type_error"></div>
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                      <label for="">Catégorie</label>
                        <select class="form-control" name="fk_categorie_id" id="fk_categorie_id">
                          <?php foreach ($categories as $row): ?>
                            <option value="<?php echo $row['categories_id'];?>"<?php if($post['fk_categorie_id'] == $row['categories_id']){?> selected <?php } ?> >
                              <?php echo $row['categories_name']?>
                            </option>
                          <?php endforeach;?>
                        </select>
                        <div class="help-block form-text with-errors form-control-feedback" id="fk_categorie_id_error" name="fk_categorie_id_error"></div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for=""> Secteur</label>
                          <select class="form-control" name="fk_sector_id" id="fk_sector_id">
                            <?php foreach ($sectors as $row): ?>
                              <option value="<?php echo $row['sector_id'];?>"<?php if($post['fk_sector_id']== $row['sector_id']){?> selected <?php } ?> >
                                <?php echo $row['sector_name']?>
                              </option>
                            <?php endforeach;?>
                          </select>
                          <div class="help-block form-text with-errors form-control-feedback" id="fk_sector_id_error" name="fk_sector_id_error"></div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label> Description</label>
                    <textarea class="form-control" rows="3" id="post_description" name="post_description">
                      <?= $post['post_description'] ?>
                    </textarea>
                    <div class="help-block form-text with-errors form-control-feedback" id="post_description_error" name="post_description_error"></div>
                  </div>
                <div class="form-group row">
                  <label class="col-sm-1 col-form-label">Statut</label>
                  <div class="col-sm-8 mt-2">
                  <?php foreach ($status as $statu) : ?>
                      <div class="form-check form-check-inline">
                        <label class="form-check-label">
                          <input class="form-check-input" name="fk_status_id"id="fk_status_id" type="radio" 
                          value="<?php echo $statu['status_id'];?>"<?php if($post['fk_status_id']== $statu['status_id']){?> checked <?php } ?>>
                          <?php echo $statu['status_name']?>
                        </label>
                      </div>
                      <?php endforeach; ?>
                      <div id="fk_status_id_error" class="help-block form-text with-errors form-control-feedback"></div>
                  </div>
                </div>
              </fieldset>
              <div class="form-buttons-w">
                <input type="submit" name="contact" id="contact" class="btn btn-success" value="Enregistrer">
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>                  
    </div>
    <div class="tab-pane" id="tab_check-list">
      tab_check-list
    </div>
    <div class="tab-pane" id="tab_techniques">
      <div class="row">
        <div class="col-lg-12">
          <div class="element-wrapper">
            <div class="element-box">
              <form id="edit_post_form" method="post">
                <input type="hidden" value="<?= $post['post_id'] ?>"  name="post_id" id="">
                <fieldset class="form-group">
                <legend><span>Informations techniques</span></legend>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for=""> Technologies</label>
                      <select class="form-control select2" multiple="true" name="fk_attribute_value_id[]" id="fk_attribute_value_id">
                        <?php foreach ($attributes_values as $row) : ?>
                          <option value="<?php echo $row['attribute_value_id'];?>"<?php if (in_array($row['attribute_value_id'], $attributes_liste))  {?> selected <?php }?> >
                            <?= $row['attribute_value_name'] ?>
                          </option>
                        <?php endforeach; ?>
                      </select>
                      <div class="help-block form-text with-errors form-control-feedback" id="fk_attribute_values_id_error" name="fk_attribute_value_id_error"></div>
                      </div>
                    </div>
                  </div>
                </fieldset>
                <div class="form-buttons-w">
                  <input type="submit" name="contact" id="contact" class="btn btn-success" value="Enregistrer">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="tab-pane" id="tab_finances">
      <div class="row">
        <div class="col-lg-12">
          <div class="element-wrapper">
            <div class="element-box">
              <form id="edit_post_form" method="post">
                <input type="hidden" value="<?= $post['post_id'] ?>"  name="post_id" id="">
                <fieldset class="form-group">
                  <legend><span>Informations financières</span></legend>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                        <label for="">Prix de vente</label><input class="form-control" data-error="Please input your Title" placeholder="Prix en €" required="required" type="number" value="<?= $post['post_price']?>" name="post_price" id="post_price">
                        <div class="help-block form-text with-errors form-control-feedback" id="post_price_error" name="post_price_error"></div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="">Monétisation</label>
                        <select class="form-control" name="fk_monetisation_id" id="fk_monetisation_id">
                          <?php foreach ($monetisation as $row): ?>
                            <option value="<?php echo $row['monetisation_id'];?>"<?php if($post['fk_monetisation_id'] == $row['monetisation_id']){?> selected <?php } ?> >
                          <?php echo $row['monetisation_name']?>
                            </option>
                          <?php endforeach;?>
                        </select>
                        <div class="help-block form-text with-errors form-control-feedback" id="fk_monetisation_id_error" name="fk_monetisation_id_error"></div>
                      </div>
                    </div>
                  </div>
                </fieldset>
                <div class="form-buttons-w">
                  <input type="submit" name="contact" id="contact" class="btn btn-success" value="Enregistrer">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="tab-pane" id="tab_juridique">
      tab_juridique
    </div>
    <div class="tab-pane" id="tab_NDA">
      tab_NDA
    </div>
    <div class="tab-pane" id="tab_media">
      tab_media
    </div>
    <div class="tab-pane" id="tab_cedant">
      tab_cedant
    </div>                        
  </div>
</div>
