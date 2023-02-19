<!-------------------
          Start Breadcrumbs
          ------------->
          <ul class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?= base_url(). 'dashboard/index'?>">Accueil</a>
            </li>
            <li class="breadcrumb-item">
              <span>Gestion des dossiers</span>
            </li>
          </ul>
          <!--------------------
          END - Breadcrumbs
          -------------------->
          <div class="element-wrapper compact pt-3">
              <div class="element-actions">
                <a class="btn btn-primary btn-sm" href="<?= base_url() . 'posts/createPost' ?>">
                  <i class="os-icon os-icon-ui-22"></i>
                  <span>Nouveau dossier</span>
                </a>
              </div>
              <h6 class="element-header">
                Gestion Des dossiers
              </h6>
          </div>
          <div class="row">
  <div class="col-sm-12">
    <!--START - Recent Ticket Comments-->
    <div class="element-wrapper">
    <form class="form-inline justify-content-sm-end pb-2">
        <label for="filter_select" style="margin: 0.5rem;">Filtrer par type de dossier </label>
        <select name="search" id="filter_select" class="form-control form-control-sm rounded">
          <option value="">Tout</option>
          <?php foreach ($types as $type) : ?>
          <option value="<?= $type['post_type_id'] ?>">
          <?= $type['post_type_name'] ?>
          </option>
          <?php endforeach; ?> 
        </select>
        </form>
      <div class="element-box">
        <div class="table-responsive">
          <table width="100%" class="table table-striped table-lightfont" id="posts_table">
            <thead>
              <tr>
                <th>
                  Id
                </th>
                <th>
                  Titre 
                </th>
                <th>
                  Types
                </th>
                <th>
                  Catégories
                </th>
                <th>
                  Technologies
                </th>
                <th>
                  secteurs
                </th>
                <th>
                  monétisation
                </th>
                <th>
                  Prix
                </th>
                <th>
                  Statuts
                </th>
                <th>
                Actions
                </th>
              </tr>
            </thead>
            <tbody>
              
            </tbody>
          </table>
          
        </div>
      </div>
    </div>
    <!--END - Recent Ticket Comments-->
  </div>
</div>
<!--------------------
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
              -------------------->
<!--------------------
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
              -------------------->
<!--------------------
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