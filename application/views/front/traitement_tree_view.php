<section id="container" class="">
  <!--main content start-->
  <section id="main-content">
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <!--breadcrumbs start -->
          <ul class="breadcrumb" style="background-color: #fff; color: #667fa0;">
            <li>
              <i class="fa fa-angle-double-right"></i>
              <?php
              if(!empty($menu) && !empty($sous_cat) && !empty($menu1) && !empty($menu2)){
              echo ascii_to_entities(ucfirst(strtolower($menu2)))."&nbsp;&nbsp;<i class=\"fa  fa-long-arrow-right\"></i>&nbsp;&nbsp;".ascii_to_entities(ucfirst(strtolower($menu1)))."&nbsp;&nbsp;<i class=\"fa  fa-long-arrow-right\"></i>&nbsp;&nbsp;".ascii_to_entities(ucfirst(strtolower($sous_cat)));
              }
              ?>
            </li>
          </ul>
          <!--breadcrumbs end -->
        </div>
      </div>
      
      <!-- CONTENT -->
      <div class="row">
        <div class="col-md-12">
          <div class="wizard" style="position: relative; margin-top: 15px;">
            <div class="widget widget-tabs widget-tabs-double widget-tabs-vertical row row-merge widget-tabs-gray">
              
              <!-- ETAPES PROCESSUS -->
              <div id="rootwizard" class="wizard">
                <!-- NBRE ETAPES PROCESSUS -->
                <div class="wizard-head hidden">
                  <ul>
                    <?php
                    $i_tab = 0;
                    foreach ($lst_proc as $val_proc) {
                    $i_tab += 1;
                    $pr_act = $lst_act[$val_proc->fte_process_id];
                    ?>
                    <li><a href="#tab<?php echo $val_proc->fte_process_id; ?>" data-toggle="tab" id="lien<?php echo $val_proc->fte_process_id; ?>"><?php echo $i_tab;?></a></li>
                    <?php
                    }
                    ?>
                    
                  </ul>
                </div>
                <!-- END NBRE ETAPES PROCESSUS -->
                
                <div class="widget">
                  
                  
                  <!-- Wizard Progress bar -->
                  
                  <!--<div class="widget-head progress" id="bar">
                    <div class="progress-bar progress-bar-primary"><strong class="step-current">1</strong> à <strong class="steps-total"><?php  echo $i_tab; ?></strong> - <strong class="steps-percent">100%</strong></div>
                  </div>-->
                  <!-- // Wizard Progress bar END -->
                  
                  <div class="widget-body">
                    <div class="tab-content">
                      
                      <?php
                      if(isset($lst_proc) && isset($lst_act)){
                      foreach ($lst_proc as $val_proc) {
                      $pr_act = $lst_act[$val_proc->fte_process_id];
                      ?>
                      <div class="tab-pane" id="tab<?php echo $val_proc->fte_process_id;?>">
                        <div class="row slim-scroll">
                          <div class="col-md-12 etape-contenu">
                            <?php echo ascii_to_entities($val_proc->text_html); ?>
                          </div>
                          <!--<div class="col-md-3">
                            consigne ou image
                          </div>-->
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-md-12">
                            <!--<ul>-->
                            <?php
                            if(!empty($pr_act)){
                            foreach ($pr_act as $val_act) {
                            if($val_act->process_redirect_id != "0"){
                            ?>
                            <!--<li>--><a href="#tab<?php echo $val_act->process_redirect_id; ?>" data-toggle="tab" class="btn btn-info pull-right action-btn" style="margin-top: 5px; margin-bottom: 5px;"  onclick="click_tab(<?php echo $val_act->process_redirect_id; ?>, <?php echo $val_act->fte_action_id; ?>)"   <?php if(!is_null($val_act->id_html) ){ echo "id=\"".$val_act->id_html."\""; }?>><?php echo ascii_to_entities($val_act->libelle); ?></a><!--</li>-->
                            
                            <?php
                            }else{
                            ?>
                            <a style="margin-top: 5px;margin-bottom: 5px;" href="<?php echo site_url('front/pont/terminer'); ?>" class="btn btn-info pull-right action-btn" <?php if(!is_null($val_act->id_html) ){ echo "id=\"".$val_act->id_html."\""; }?>><?php echo ascii_to_entities($val_act->libelle); ?></a><!--</li>-->
                            
                            <?php
                            }
                            }
                            }
                            ?>
                            <!--</ul>-->
                            <?php
                            if(isset($deb_proc)){
                            if($deb_proc == $val_proc->fte_process_id ){
                            ?>
                            
                            <?php
                            }else{
                            ?>
                            <button style="margin-top: 5px;margin-bottom: 5px;" class="btn btn-primary pull-left" onclick="abhis()"><i class="fa fa-lg fa-arrow-left"></i> ACTION PRECEDENTE</button>
                            <?php
                            }
                            }
                            ?>
                          </div>
                        </div>
                        
                      </div>
                      
                      <?php
                      }
                      }
                      ?>
                      
                    </div>
                    
                  </div>
                </div>
              </div>
              <!-- END ETAPES PROCESSUS -->
            </div>
          </div>
        </div>
      </div>
      <!-- END CONTENT -->
    </section>
  </section>
  <!--main content end-->
  <style type="text/css">
  .active .dcjq-icon{
  background: none !important;
  }
  .dcjq-icon{
  background: none !important;
  }
  ul.sidebar-menu li a.active, ul.sidebar-menu li a:hover, ul.sidebar-menu li a:focus{
  display: inline-flex !important;
  }
  #sidebar > ul > li > ul.sub > li > a{
  display: inline-flex !important;
  }
  </style>