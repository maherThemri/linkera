     <!-------------------
          Start Breadcrumbs
          ------------->
          <ul class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?= base_url(). 'dashboard/index'?>">Accueil</a>
            </li> 
            <li class="breadcrumb-item">
              <span>Gestion des Catégories</span>
            </li>
          </ul>
          <!--------------------
          END - Breadcrumbs
          -------------------->
          <div class="element-wrapper compact pt-3">
                <div class="element-actions">
                    <!--Button trigger modal-->
                    <button class="btn btn-primary btn-sm" data-target="#addModal" data-toggle="modal" type="button">
                        <i class="os-icon os-icon-ui-22"></i>
                        Nouvelle Catégorie
                    </button>
                </div>
                <h6 class="element-header">
                  Gestion Des Catégories 
                </h6>
          </div>
     <div class="element-wrapper">
                <div class="element-box">
                  <div class="table-responsive">
                    <table id="categories_table" width="100%" class="table table-striped table-lightfont">
                      <thead>
                        <tr><th>Id</th><th>Libellés</th><th>Statuts</th><th>Actions</th></tr>
                      </thead>
                      <tbody id="tbody_category">
                        <?php 
                        foreach ($categories as $row) :
                          if ($row['status_value'] == 1) {
                            $status_color = 'green';
                          } else {
                            $status_color = 'red';
                          }
                        ?>
                          <tr>
                            <td>
                              <span><?= $row['categories_id'] ?></span>
                            </td>
                            <td>
                                <span><?= $row['categories_name'] ?></span>
                            </td>
                            <td class="nowrap">
                                <span class="status-pill smaller  <?php echo $status_color ?>"></span><span><?= $row['status_name'] ?></span>
                            </td>
                            <td class="row-actions text-left">
                                <a href="#" class="edit_category"value="<?=$row['categories_id']?>"><i class="os-icon os-icon-ui-49"></i></a>
                                <!-- <a class="danger delete" href="#" value="<?=$row['categories_id']?>"><i class="os-icon os-icon-ui-15"></i></a> -->
                            </td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                      <tfoot>
                      <tr><th>Id</th><th>Libellés</th><th>Actions</th></tr>
                      </tfoot>
                      </table>
                  </div>
                </div>
              </div><!--------------------
              START - Color Scheme Toggler
              -------------------->
              <div class="floated-colors-btn second-floated-btn">
                <div class="os-toggler-w">
                  <div class="os-toggler-i">
                    <div class="os-toggler-pill"></div>
                  </div>
                </div>
                <span>Dark </span><span>Colors</span>
              </div>
              <!--------------------
              END - Color Scheme Toggler
              --------------------><!--------------------
              START - Demo Customizer
              -------------------->
              <div class="floated-customizer-btn third-floated-btn">
                <div class="icon-w">
                  <i class="os-icon os-icon-ui-46"></i>
                </div>
                <span>Customizer</span>
              </div>
              <div class="floated-customizer-panel">
                <div class="fcp-content">
                  <div class="close-customizer-btn">
                    <i class="os-icon os-icon-x"></i>
                  </div>
                  <div class="fcp-group">
                    <div class="fcp-group-header">
                      Menu Settings
                    </div>
                    <div class="fcp-group-contents">
                      <div class="fcp-field">
                        <label for="">Menu Position</label><select class="menu-position-selector">
                          <option value="left">
                            Left
                          </option>
                          <option value="right">
                            Right
                          </option>
                          <option value="top">
                            Top
                          </option>
                        </select>
                      </div>
                      <div class="fcp-field">
                        <label for="">Menu Style</label><select class="menu-layout-selector">
                          <option value="compact">
                            Compact
                          </option>
                          <option value="full">
                            Full
                          </option>
                          <option value="mini">
                            Mini
                          </option>
                        </select>
                      </div>
                      <div class="fcp-field with-image-selector-w">
                        <label for="">With Image</label><select class="with-image-selector">
                          <option value="yes">
                            Yes
                          </option>
                          <option value="no">
                            No
                          </option>
                        </select>
                      </div>
                      <div class="fcp-field">
                        <label for="">Menu Color</label>
                        <div class="fcp-colors menu-color-selector">
                          <div class="color-selector menu-color-selector color-bright selected"></div>
                          <div class="color-selector menu-color-selector color-dark"></div>
                          <div class="color-selector menu-color-selector color-light"></div>
                          <div class="color-selector menu-color-selector color-transparent"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="fcp-group">
                    <div class="fcp-group-header">
                      Sub Menu
                    </div>
                    <div class="fcp-group-contents">
                      <div class="fcp-field">
                        <label for="">Sub Menu Style</label><select class="sub-menu-style-selector">
                          <option value="flyout">
                            Flyout
                          </option>
                          <option value="inside">
                            Inside/Click
                          </option>
                          <option value="over">
                            Over
                          </option>
                        </select>
                      </div>
                      <div class="fcp-field">
                        <label for="">Sub Menu Color</label>
                        <div class="fcp-colors">
                          <div class="color-selector sub-menu-color-selector color-bright selected"></div>
                          <div class="color-selector sub-menu-color-selector color-dark"></div>
                          <div class="color-selector sub-menu-color-selector color-light"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="fcp-group">
                    <div class="fcp-group-header">
                      Other Settings
                    </div>
                    <div class="fcp-group-contents">
                      <div class="fcp-field">
                        <label for="">Full Screen?</label><select class="full-screen-selector">
                          <option value="yes">
                            Yes
                          </option>
                          <option value="no">
                            No
                          </option>
                        </select>
                      </div>
                      <div class="fcp-field">
                        <label for="">Show Top Bar</label><select class="top-bar-visibility-selector">
                          <option value="yes">
                            Yes
                          </option>
                          <option value="no">
                            No
                          </option>
                        </select>
                      </div>
                      <div class="fcp-field">
                        <label for="">Above Menu?</label><select class="top-bar-above-menu-selector">
                          <option value="yes">
                            Yes
                          </option>
                          <option value="no">
                            No
                          </option>
                        </select>
                      </div>
                      <div class="fcp-field">
                        <label for="">Top Bar Color</label>
                        <div class="fcp-colors">
                          <div class="color-selector top-bar-color-selector color-bright selected"></div>
                          <div class="color-selector top-bar-color-selector color-dark"></div>
                          <div class="color-selector top-bar-color-selector color-light"></div>
                          <div class="color-selector top-bar-color-selector color-transparent"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--------------------
              END - Demo Customizer
              --------------------><!--------------------
              START - Chat Popup Box
              -------------------->
              <div class="floated-chat-btn">
                <i class="os-icon os-icon-mail-07"></i><span>Demo Chat</span>
              </div>
              <div class="floated-chat-w">
                <div class="floated-chat-i">
                  <div class="chat-close">
                    <i class="os-icon os-icon-close"></i>
                  </div>
                  <div class="chat-head">
                    <div class="user-w with-status status-green">
                      <div class="user-avatar-w">
                        <div class="user-avatar">
                          <img alt="" src="<?= base_url() ?>template/assets/img/avatar1.jpg">
                        </div>
                      </div>
                      <div class="user-name">
                        <h6 class="user-title">
                          John Mayers
                        </h6>
                        <div class="user-role">
                          Account Manager
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="chat-messages">
                    <div class="message">
                      <div class="message-content">
                        Hi, how can I help you?
                      </div>
                    </div>
                    <div class="date-break">
                      Mon 10:20am
                    </div>
                    <div class="message">
                      <div class="message-content">
                        Hi, my name is Mike, I will be happy to assist you
                      </div>
                    </div>
                    <div class="message self">
                      <div class="message-content">
                        Hi, I tried ordering this product and it keeps showing me error code.
                      </div>
                    </div>
                  </div>
                  <div class="chat-controls">
                    <input class="message-input" placeholder="Type your message here..." type="text">
                    <div class="chat-extra">
                      <a href="#"><span class="extra-tooltip">Attach Document</span><i class="os-icon os-icon-documents-07"></i></a><a href="#"><span class="extra-tooltip">Insert Photo</span><i class="os-icon os-icon-others-29"></i></a><a href="#"><span class="extra-tooltip">Upload Video</span><i class="os-icon os-icon-ui-51"></i></a>
                    </div>
                  </div>
                </div>
              </div>
              <!--------------------
              END - Chat Popup Box
              -------------------->
    <!-- Add Catégorie -->
    <div  class="modal fade" id="addModal" role="dialog" tabindex="-1"data-backdrop="false">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
              Nouvelle  Catégorie
            </h5>
          </div>
          <div class="modal-body">
            <form action="" method="post" id="add_form">
              <div class="form-group">
                <label for="">Libellé</label><input class="form-control" placeholder="Saisissez le Catégorie" type="text" id="categories_name"name="categories_name">
              </div>
              <div class="form-group">
                <label for="">Statut</label>
                <select class="form-control" name="fk_status_categories_id" id="fk_status_categories_id">
                  <option selected disabled>Choisir</option>
                  <?php foreach ($status as $statu) : ?>

                    <option value="<?= $statu['status_id'] ?>">
                      <?= $statu['status_name'] ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-danger" data-dismiss="modal" type="button"> Quitter</button><button class="btn btn-success" type="button"id="add_category">Enregistrer</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <!-- !End Catégorie -->
    <!-- edit Catégorie -->
     <div  class="modal fade" id="editModal" role="dialog" tabindex="-1"data-backdrop="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                  Édition Catégorie
                </h5>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="edit_form">
                <input type="hidden" id="edit_modal_id" value="">
                <div class="form-group">
                    <label for="">Libellé</label><input class="form-control" placeholder="Saisissez le type de compte" type="text" id="edit_categories_name"name="edit_categories_name">
                </div>
                <div class=form-group>
                <label for="">Statut</label>
                <select class="form-control" name="edit_fk_status_categories_id" id="edit_fk_status_categories_id">
                  <?php foreach ($status as $statu) : ?>

                    <option value="<?= $statu['status_id'] ?>">
                      <?= $statu['status_name'] ?>
                    </option>
                  <?php endforeach; ?>
                </select>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal" type="button"> Quitter</button><button class="btn btn-success" type="button"id="update_category">Enregistrer</button>
            </div>
            </form>
            </div>
        </div>
        </div>
    <!-- !End Edit Catégorie -->