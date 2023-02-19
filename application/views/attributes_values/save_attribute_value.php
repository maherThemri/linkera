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
              <span>Nouvelle valeur d'attribut</span>
            </li>
          </ul>
          <!--------------------
          END - Breadcrumbs
          -------------------->
<!-- ******** Add attribute_value******* -->
<div class="row pt-3 justify-content-md-center">
  <div class="col col-lg-9">
          <span id="success_message" class="hide"></span>
          <span id="warning_message" class="hide"></span>
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
        <form id="attribute_value_form" method="post">
          <h5 class="form-header">
            Nouvelle valeur d'attribut
          </h5> 
          
          <div class="form-desc">
          </div>
          <div class="form-group row">
            <label class="col-form-label col-sm-4" for=""> Attribut</label>
            <div class="col-sm-8">
              <select class="form-control" name="fk_attribute_id" id="fk_attribute_id">
                  <option selected disabled> Choisir l'attribut</option>
                  <?php foreach ($attributes as $row) : ?>
                    <option value="<?= $row['attribute_id'] ?>">
                      <?= $row['attribute_name'] ?>
                    </option>
                  <?php endforeach; ?>
                </select>
                <div id="fk_attribute_id_error" class="help-block form-text with-errors form-control-feedback"></div>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label col-sm-4" for=""> Valeur</label>
            <div class="col-sm-8">
                  <input class="form-control" data-error="Please input your attribute value of name" placeholder="Valeur d'attribut" required="required" type="text" name="attribute_value_name" id="attribute_value_name">
                  <div class="help-block form-text with-errors form-control-feedback" id="attribute_value_name_error" name="attribute_value_name_error"></div>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4 col-form-label">Statut</label>
            <div class="col-sm-8 mt-2">
              
              <?php foreach ($status as $statu) : ?>
                <div class="form-check form-check-inline">
                <label class="form-check-label">
                  <input class="form-check-input" name="fk_status_id"id="fk_status_id" type="radio" value="<?= $statu['status_id'] ?>">
                  <?= $statu['status_name'] ?>
                </label>
                </div>
                <?php endforeach; ?>
                <div id="fk_status_id_error" class="help-block form-text with-errors form-control-feedback"></div>
            </div>
          </div>
          <div class="form-group row">
              <label class="col-sm-4 col-form-label" for=""> Icône</label>
              <div class="col-sm-8">
                <input class="form-control" type="file" name="file" id="file">
              </div>
          </div>
          <div class="form-buttons-w text-right compact">
            <input type="submit" name="add_attribute_value" id="add_attribute_value" class="btn btn-success" value="Enregistrer">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
