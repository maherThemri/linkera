<!-------------------
          Start Breadcrumbs
          ------------->
          <ul class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?= base_url(). 'dashboard/index'?>">Accueil</a>
            </li>
             <li class="breadcrumb-item">
              <a href="<?= base_url().'posts/index'?>">Gestion des Annonces</a>
            </li>  
            <li class="breadcrumb-item">
              <span>Nouvelle Annonce</span>
            </li>
          </ul>
          <!--------------------
          END - Breadcrumbs
          -------------------->
<!-- ******** Add Post******* -->
<div class="row pt-3">
  <span id="success_message" class="hide"></span>
  <span id="error_message" class="hide"></span>
  <div class="form-desc">
  </div>
  <div class="progress hide" id="progress">
  <div class="progress-bar progress-bar-striped progress-bar-animated " role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%" ></div>
  </div>
  <div class="col-lg-8">
    <div class="element-wrapper">
      <div class="element-box">
        <form id="add_post_form" method="post">
          <h5 class="form-header">
            Nouvelle Annonce
          </h5>
          <fieldset class="form-group">
            <legend><span>Informations générales</span></legend>
            <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Titre</label><input class="form-control" data-error="Please input your Title" placeholder="Titre de l'article" required="required" type="text" name="post_name" id="post_name">
                <div class="help-block form-text with-errors form-control-feedback" id="post_name_error" name="post_name_error"></div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
              <label for=""> Type</label>
            <select class="form-control" name="fk_post_type_id" id="fk_post_type_id">
                  <option selected disabled>Choisir</option>
                  <?php foreach ($types as $type) : ?>

                    <option value="<?= $type['post_type_id'] ?>">
                      <?= $type['post_type_name'] ?>
                    </option>
                  <?php endforeach; ?>
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
                    <option selected disabled>Choisir</option>
                    <?php foreach ($categories as $categorie) : ?>
                      <option value="<?= $categorie['categories_id'] ?>">
                        <?= $categorie['categories_name'] ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                  <div class="help-block form-text with-errors form-control-feedback" id="fk_categorie_id_error" name="fk_categorie_id_error"></div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for=""> Secteur</label>
                    <select class="form-control" name="fk_sector_id" id="fk_sector_id">
                      <option selected disabled>Choisir</option>
                        <?php foreach ($sectors as $row) : ?>
                          <option value="<?= $row['sector_id'] ?>">
                          <?= $row['sector_name'] ?>
                          </option>
                        <?php endforeach; ?>
                    </select>
                    <div class="help-block form-text with-errors form-control-feedback" id="fk_sector_id_error" name="fk_sector_id_error"></div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label> Description</label><textarea class="form-control" rows="3" id="post_description" name="post_description"></textarea>
              <div class="help-block form-text with-errors form-control-feedback" id="post_description_error" name="post_description_error"></div>
            </div>
          <div class="form-group row">
            <label class="col-sm-1 col-form-label">Statut</label>
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
        </fieldset>
          <fieldset class="form-group">
            <legend><span>Informations techniques</span></legend>
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="">Technologies</label>
                  <select class="form-control select2" multiple="true" name="fk_attribute_value_id[]" id="fk_attribute_value_id">
                    <?php foreach ($attributes_values as $row) : ?>
                      <option value="<?= $row['attribute_value_id'] ?>">
                        <?= $row['attribute_value_name'] ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                  <div class="help-block form-text with-errors form-control-feedback" id="fk_attribute_value_id_error" name="fk_attribute_value_id_error"></div>
                </div>
              </div>
            </div>
          </fieldset>
          <fieldset class="form-group">
            <legend><span>Informations financières</span></legend>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="">Prix de vente</label><input class="form-control" data-error="Please input your Title" placeholder="Prix en €" required="required" type="number" name="post_price" id="post_price">
                  <div class="help-block form-text with-errors form-control-feedback" id="post_price_error" name="post_price_error"></div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                <label for="">Monétisation</label>
                  <select class="form-control" name="fk_monetisation_id" id="fk_monetisation_id">
                    <option selected disabled>Choisir</option>
                      <?php foreach ($monetisation as $row) : ?>

                        <option value="<?= $row['monetisation_id'] ?>">
                          <?= $row['monetisation_name'] ?>
                        </option>
                      <?php endforeach; ?>
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
      <div class="element-box">
        <h5 class="form-header">
          Téléchargement d'une image
        </h5>
        <div class="form-desc"></div>
          <form action="https://app.linkera.com/platform/posts/FileUpload" class="myDropzone" id="mydropzone">
            <div class="dz-message">
              <div>
                <h4>Déposez une image ici.</h4>
                <div class="text-muted"></div>
              </div>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>


