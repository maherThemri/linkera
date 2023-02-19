<!-------------------
          Start Breadcrumbs
          ------------->
          <ul class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?= base_url(). 'dashboard/index'?>">Accueil</a>
            </li>
             <li class="breadcrumb-item">
              <a href="<?= base_url().'attributes_values/index'?>">Gestion des valeurs des attributs</a>
            </li> 
            <li class="breadcrumb-item">
              <span>Édition valeur d'attribut</span>
            </li>
          </ul>
          <!--------------------
          END - Breadcrumbs
          -------------------->
<!-- ******** Edit attribute_value******* -->
<div class="row pt-3 justify-content-md-center">
  <div class="col col-lg-9">
          <span id="success_message" class="hide"></span>
          <span id="error_message" class="hide"></span>
          <div class="progress hide" id="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated " role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%" ></div>
          </div>
  </div>
</div>
<div class="row justify-content-md-center">
  <div class="col col-lg-9">
    <div class="element-wrapper">
      <div class="element-box">
        <form id="edit_attribute_value_form" method="post">
        <input type="hidden" value="<?= $attribute_value->attribute_value_id ?>"  name="attribute_value_id" id="">
          <h5 class="form-header">
          Édition valeur d'attribut
          </h5> 
          <div class="form-desc"></div>
          <div class="form-group row">
            <label class="col-form-label col-sm-4" for=""> Attribut</label>
            <div class="col-sm-8">
              <select class="form-control" name="fk_attribute_id" id="fk_attribute_id">
                  <?php foreach ($attributes as $attribute): ?>
                                        <option value="<?php echo $attribute['attribute_id'];?>"<?php if($attribute_value->fk_attribute_id == $attribute['attribute_id']){?> selected <?php } ?> >
                                            <?php echo $attribute['attribute_name']?>
                                        </option>
                  <?php endforeach; ?>
                </select>
                <div id="fk_attribute_id_error" class="help-block form-text with-errors form-control-feedback"></div>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label col-sm-4" for=""> Valeur</label>
            <div class="col-sm-8">
                  <input class="form-control" data-error="Please input your attribute value of name" placeholder="Valeur d'attribut" required="required" type="text" name="attribute_value_name" id="attribute_value_name"value="<?= $attribute_value->attribute_value_name ?>">
                  <div class="help-block form-text with-errors form-control-feedback" id="attribute_value_name_error" name="attribute_value_name_error"></div>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4 col-form-label">Statut</label>
            <div class="col-sm-8 mt-2">
              <?php foreach ($status as $statu) : ?>
                <div class="form-check form-check-inline">
                <label class="form-check-label">
                  <input class="form-check-input" name="fk_status_id"id="fk_status_id" type="radio" 
                  value="<?php echo $statu['status_id'];?>"<?php if($attribute_value->fk_status_id == $statu['status_id']){?> checked <?php } ?>>
                  <?php echo $statu['status_name']?>
                </label>
                </div>
                <?php endforeach; ?>
                <div id="fk_status_id_error" class="help-block form-text with-errors form-control-feedback"></div>
            </div>
          </div>
          <div class="cell-image-list">
                                  <div class="cell-img" style="background-image: url(<?= base_url() ?>uploads/<?=$attribute_value->attribute_value_asset?>)"></div>
                                </div>
          <div class="form-group row">
              <label class="col-sm-4  col-form-label" for=""> Icône</label>
              
              <div class="col-sm-8">
                <input class="form-control" type="file" name="file" id="file">
              </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-4 activity-avatar">
                          <img alt="" name="new_image"id="new_image" src="<?= base_url() ?>uploads/attributes_values_assets/<?=$attribute_value->attribute_value_asset?>"class="avatar">
                          <!-- <input class="form-control" type="file" name="file" id="file"> -->

            </div>
          </div>
                  
          <div class="form-buttons-w text-right compact">
            <input type="submit" name="editContact" id="editContact" class="btn btn-success" value="Enregistrer">
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- <div class="col-sm-3 col-xxxl-6">
    <div class="element-wrapper">
      <div class="element-box less-padding">
      <img id="new_image" alt="" src="<?= base_url() ?>uploads/<?=$attribute_value->attribute_value_asset?>"class="img-thumbnail"style="object-fit: cover;">

      </div>
    </div>
  </div> -->
</div>
