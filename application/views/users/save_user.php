<!-------------------
          Start Breadcrumbs
          ------------->
          <ul class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?= base_url(). 'dashboard/index'?>">Accueil</a>
            </li>
             <li class="breadcrumb-item">
              <a href="<?= base_url().'users/index'?>">Gestion Des Utilisateurs</a>
            </li> 
            <li class="breadcrumb-item">
              <span>Nouveau Compte D'utilisateur</span>
            </li>
          </ul>
          <!--------------------
          END - Breadcrumbs
          -------------------->
<!-- ******** Add User******* -->
<div class="row pt-3">
  <div class="col-sm-12">
    <div class="element-wrapper">
      <div class="element-box">
        <form id="contact_form" method="post">
          <h5 class="form-header">
            Nouveau compte utilisateur
          </h5> 
          <span id="success_message" class="hide"></span>
          <span id="error_message" class="hide"></span>
          <div class="form-desc">
          </div>
          <div class="progress hide" id="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated " role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%" ></div>
          </div>
          <fieldset class="form-group">
            <legend><span>Paramètres Du Compte</span></legend>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Prénom</label><input class="form-control" data-error="Please input your Last Name" placeholder="Prénom" required="required" type="text" name="user_lastname" id="user_lastname">
                <div class="help-block form-text with-errors form-control-feedback" id="user_lastname_error" name="user_lastname_error"></div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for=""> Nom</label><input class="form-control" data-error="Please input your First Name" placeholder="Nom" required="required" type="text" name="user_firstname" id="user_firstname">
                <div class="help-block form-text with-errors form-control-feedback" id="user_firstname_error" name="user_firstname_error"></div>
              </div>
            </div>
            
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for=""> Email</label><input class="form-control" data-error="Your email address is invalid" placeholder="Entrez l’adresse e-mail" required="required" type="email" name="user_email" id="user_email">
                <div class="help-block form-text with-errors form-control-feedback" id="user_email_error" name="user_email_error" ></div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for=""> N° Téléphone</label><input class="form-control" data-error="Please input your phone" placeholder="Entrez le numéro de téléphone" required="required" type="number" name="user_phonenumber" id="user_phonenumber">
                <div class="help-block form-text with-errors form-control-feedback" id="user_phonenumber_error" name="user_phonenumber_error"></div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Type De Compte</label>
                <select class="form-control" name="fk_type_id" id="fk_type_id">
                  <option selected disabled> Choisir</option>
                  <?php foreach ($types as $row) : ?>
                    <option value="<?= $row['type_id'] ?>">
                      <?= $row['type_user'] ?>
                    </option>
                  <?php endforeach; ?>
                </select>
                <div id="fk_type_id_error" class="help-block form-text with-errors form-control-feedback"></div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Statut De Compte</label>
                <select class="form-control" name="fk_status_id" id="fk_status_id">
                  <option selected disabled>Choisir</option>
                  <?php foreach ($status as $statu) : ?>

                    <option value="<?= $statu['status_id'] ?>">
                      <?= $statu['status_name'] ?>
                    </option>
                  <?php endforeach; ?>
                </select>
                <div id="fk_status_id_error" class="help-block form-text with-errors form-control-feedback"></div>
              </div>
            </div>

          </div>
        </fieldset>

          <fieldset class="form-group">
            <legend><span>Paramètres Du Connexion</span></legend>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for=""> Mot de passe</label><input class="form-control" data-minlength="8" placeholder="Mot de passe" required="required" type="password" name="user_password" id="user_password">
                  <div class="help-block form-text with-errors form-control-feedback" id="user_password_error" name="">
                  
                  </div>
                  <!-- <span id="user_password_error" class="text-danger"></span> -->

                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="">Confirme Mot de passe</label><input class="form-control" data-match-error="Passwords don&#39;t match" placeholder="Confirme Mot de passe" required="required" type="password" name="confirm_user_password" id="confirm_user_password">
                  <div class="help-block form-text with-errors form-control-feedback" id="confirm_user_password_error" name="confirm_user_password_error" ></div>
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
