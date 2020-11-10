        <aside class="left-sidebar">
            <?php $stockout = $this->medicine_model->GetStockOutproduct();
            $sortstock = $this->medicine_model->Getshortproduct();
            ?>

            <!-- Sidebar scroll-->

            <div class="scroll-sidebar">

                <nav class="sidebar-nav">

                    <ul id="sidebarnav">

                        <li class="nav-devider"></li>
                        <?php if($this->session->userdata('user_type') =='SALESMAN' || $this->session->userdata('user_type') =='SALESMAN1' || $this->session->userdata('user_type') =='SALESMAN2'){ ?>
                        <li> <a href="<?php echo base_url(); ?>dashboard/Dashboard" ><i class="fa fa-dashboard"></i><span class="hide-menu">Dashboard </span></a></li>

                        <li> <a href="<?php echo base_url();?>invoice/Pos_Create" ><i class="fa fa-pencil-square-o"></i><span class="hide-menu">Facturer <span class="hide-menu"></a></li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-medkit"></i><span class="hide-menu">Médicaments</span></a>

                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url();?>Medicine/View">Visualisé</a></li>
                            </ul>
                        </li> 
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-users"></i><span class="hide-menu">Client </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url();?>Customer/View">Gérer les Clients</a></li>
                                <li><a href="<?php echo base_url();?>Customer/Regular">Client Régulier</a></li>
                                <li><a href="<?php echo base_url();?>Customer/Wholesale">Client En Gros</a></li>
                            </ul>
                        </li>
                      
                         <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-building-o"></i><span class="hide-menu"> Inventaire </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url();?>invantory/Stock">Gérer Le Stock </a></li>
                                <li><a href="<?php echo base_url();?>invantory/Stock_short">A Court de Stock<span class="label label-rouded label-info pull-right"><?php echo count($sortstock); ?></span></a></li>
                                <li><a href="<?php echo base_url();?>invantory/Stock_out">En Rupture <span class="label label-rouded label-danger pull-right"><?php echo count($stockout); ?></span></a></li>
                                <li><a href="<?php echo base_url();?>invantory/Stock_expire_soon">Expiration Proche</a></li>
                                <li><a href="<?php echo base_url();?>invantory/Stock_expired">Médicaments Expiré</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-bar-chart-o"></i><span class="hide-menu">Rapport </span></a>

                            <ul aria-expanded="false" class="collapse">

                               <li><a href="<?php echo base_url();?>Sales/Today_report">Rapport Journalier </a></li>
                                <!-- <li><a href="<?php echo base_url();?>Sales/Sales_report">Rapport de Vente</a></li> -->

                            </ul>

                        </li>                                                                                             
                        <?php } elseif($this->session->userdata('user_type') =='ADMIN' || $this->session->userdata('user_type') =='MANAGER') {?>
                        
                        <li> <a href="<?php echo base_url(); ?>dashboard/Dashboard" ><i class="fa fa-dashboard"></i><span class="hide-menu">Dashboard </span></a></li>

                        <li> <a href="<?php echo base_url();?>invoice/Pos_Create" ><i class="fa fa-pencil-square-o"></i><span class="hide-menu">Facturer <span class="hide-menu"></a></li>

                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-medkit"></i><span class="hide-menu">Médicaments </span></a>

                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url();?>Medicine/Create">Ajouter</a></li>
                                <li><a href="<?php echo base_url();?>Medicine/View">Gérer</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-users"></i><span class="hide-menu">Client </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url();?>Customer/Create">Ajouter un client</a></li>
                                <li><a href="<?php echo base_url();?>Customer/View">Gérer les Clients</a></li>
                                <li><a href="<?php echo base_url();?>Customer/Regular">Client Régulier</a></li>
                                <li><a href="<?php echo base_url();?>Customer/Wholesale">Client En Gros</a></li>
                            </ul>
                        </li>
                      
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-building-o"></i><span class="hide-menu"> Inventaire </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url();?>invantory/Stock">Gérer Le Stock </a></li>
                                <li><a href="<?php echo base_url();?>invantory/Stock_short">A Court de Stock<span class="label label-rouded label-info pull-right"><?php echo count($sortstock); ?></span></a></li>
                                <li><a href="<?php echo base_url();?>invantory/Stock_out">En Rupture <span class="label label-rouded label-danger pull-right"><?php echo count($stockout); ?></span></a></li>
                                <li><a href="<?php echo base_url();?>invantory/Stock_expire_soon">Expiration Proche</a></li>
                                <li><a href="<?php echo base_url();?>invantory/Stock_expired">Médicaments Expiré</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-money"></i><span class="hide-menu">Les Soldes </span></a>

                            <ul aria-expanded="false" class="collapse">

                                <li><a href="<?php echo base_url();?>Customer/Balance">Solde Client</a></li>

                            </ul>

                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-adjust"></i><span class="hide-menu">Retour </span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li> <a  href="<?php echo base_url();?>sales/Sales_Return" >Retour Vente </a></li>
                        </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-bar-chart-o"></i><span class="hide-menu">Rapport </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url();?>Sales/Today_report">Rapport Journalier </a></li>
                                <li><a href="<?php echo base_url();?>Sales/Sales_report">Rapport de Vente</a></li>
                                <li><a href="<?php echo base_url();?>Sales/Sales_Return_Report">Rapport Retour Vente</a></li>
                            </ul>
                        </li>

                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">Employés </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url();?>Employee/Create">Ajouter</a></li>
                                <li><a href="<?php echo base_url();?>Employee/View">Gérer</a></li>
                            </ul>
                        </li>

                            <li> <a href="<?php echo base_url();?>Configuration/Settings"><i class="fa fa-gear"></i><span class="hide-menu">Settings </span></a></li>
                        <?php } ?>
                    </ul>

                </nav>

                <!-- End Sidebar navigation -->

            </div>

            <!-- End Sidebar scroll-->

        </aside>

