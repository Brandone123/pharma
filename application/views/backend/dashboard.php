<?php
    $this->load->view('backend/header');
    $this->load->view('backend/sidebar');                                
?>
        <div class="page-wrapper" style="color: white!important">

<!--
            <div class="row page-titles">

                <div class="col-md-5 align-self-center">

                    <h3 class="text-themecolor">Dashboard</h3>

                </div>

                <div class="col-md-7 align-self-center">

                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>

                        <li class="breadcrumb-item ">Dashboard</li>

                    </ol>

                </div>

            </div>
-->
            <style>
                .batch-d{
                    margin-top: 10px;
                }
            </style>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-12 batch-d d-flex">
                        <div class="card card-inverse card-info d-flex" style="flex: 1 1 100%;">
                            <div class="card-body" style="position: relative;">
                                <div class="d-flex">
                                    <div class="m-r-20 align-self-center">
                                        <h1 class="text-white" style="color: white!important"><i class="fa fa-user float-right"></i></h1>
                                    </div>
                                    <div class="mr-auto">
                                        <h4 class="card-title">Client <br /> En Gros</h4>
                                    </div>
                                    <h2 class="font-light text-white" style="color: white!important">
                                        <?php 
                                            $this->db->where('c_type', 'Wholesale');
                                            $query = $this->db->get('customer');
                                            echo $query->num_rows(); ;
                                        ?>
                                    </h2>
                                </div>
                                <div class="d-flex">
                                    <div class="m-r-20 align-self-center">
                                        <h1 class="text-white"  style="color: white!important"><i class="fa fa-user float-right"></i></h1>
                                    </div>
                                    <div class="mr-auto">
                                        <h4 class="card-title">Client <br /> Régulier</h4>
                                    </div>
                                    <h2 class="font-light text-white" style="color: white!important">
                                        <?php 
                                            $this->db->where('c_type', 'Regular');
                                            $query = $this->db->get('customer');
                                            echo $query->num_rows();
                                        ?>
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-12 batch-d">
                        <div class="card card-inverse card-success">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="m-r-20 align-self-center">
                                        <h1 class="text-white" style="color: white!important"><i class="fa fa-medkit float-right"></i></h1></div>
                                    <div>
                                        <h4 class="card-title">MEDICAMENTS</h4>
                                        </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 align-self-center">
                                        <h2 class="font-light text-white" style="color: white!important"><?php 
                                                        $query = $this->db->get('medicine');
                                                        echo $query->num_rows(); ;
                                                ?></h2> </div>
                                    <div class="col-8 p-t-10 p-b-20 text-right">
                                        <div class="spark-count" style="height:50px"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 batch-d">
                        <div class="card card-inverse card-danger">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="m-r-20 align-self-center">
                                        <h1 class="text-white" style="color: white!important"><i class="fa fa-handshake-o float-right"></i></h1></div>
                                    <div>
                                        <h4 class="card-title">REVENUS DU JOUR</h4>
                                        </div>
                                </div>
                                <div class="row">
                                    <div class="col-10 align-self-center">
                                        <h2 class="font-light text-white" style="color: white!important"> 
                                            <?php
                                                $sum = 0;
                                                  foreach($todaysreport as $value){ ?>
                                                    <?php
                                                    $sum += $value->total_amount; ?> 

                                                 <?php }
                                            echo $sum. ' FCFA' ?></h2> </div>
                                            <div class="col-8 p-t-10 p-b-20 text-right">
                                        <div class="" style="height:5px, width:5px"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 batch-d">
                        <div class="card card-inverse card-primary">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="m-r-20 align-self-center">
                                        <h1 class="text-white" style="color: white!important"><i class="fa fa-pencil-square-o float-right"></i></h1></div>
                                    <div>
                                        <h4 class="card-title">FACTUR&Eacute;</h4>
                                        </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 align-self-center">
                                        <h2 class="font-light text-white" style="color: white!important">
                                          
                                           <?php echo count($todaysreport); ?>
                                                </h2> </div>

                                    <div class="col-8 p-t-10 p-b-20 text-right">
                                        <div class="spark-count" style="height:50px"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                

                <!-- Row -->

                <div class="row">

                    <!-- Column -->

                    <div class="col-lg-3 col-md-6">

                        <div class="card">

                            <div class="d-flex flex-row">

                                <div class="p-10 bg-info">

                                    <h5 class="text-white box m-b-0" style="color: white!important"><i class="ti-wallet"></i></h5></div>

                                <div class="align-self-center m-l-20">

                                    <h5 class="text-muted m-b-0"><a href="<?php echo base_url(); ?>invoice/Pos_Create">Facturer</a></h5>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- Column -->

                    <!-- Column -->
                   <?php if($this->session->userdata('user_type') =='ADMIN' || $this->session->userdata('user_type') =='MANAGER'){ ?>
                    <div class="col-lg-3 col-md-6">

                        <div class="card">

                            <div class="d-flex flex-row">

                                <div class="p-10 bg-success">

                                    <h5 class="text-white box m-b-0" style="color: white!important"><i class="ti-wallet"></i></h5></div>

                                <div class="align-self-center m-l-20">

                                    <h5 class="text-muted m-b-0"><a href="<?php echo base_url(); ?>Medicine/Create">Ajouter Un Médicament</a></h5>

                                </div>

                            </div>

                        </div>

                    </div>
                    <?php } ?>
                    <!-- Column -->

                    <!-- Column -->

                    <div class="col-lg-3 col-md-6">

                        <div class="card">

                            <div class="d-flex flex-row">

                                <div class="p-10 bg-primary">

                                    <h5 class="text-white box m-b-0"  style="color: white!important"><i class="ti-wallet"></i></h5></div>

                                <div class="align-self-center m-l-20">

                                    <h5 class="text-muted m-b-0"><a href="<?php echo base_url(); ?>Customer/Create">Ajouter Un Client</a></h5>

                                </div>

                            </div>

                        </div>

                    </div>
                    <!-- Column -->

                    <div class="col-lg-3 col-md-6">

                        <div class="card">

                            <div class="d-flex flex-row">

                                <div class="p-10 bg-info">

                                    <h5 class="text-white box m-b-0" style="color: white!important"><i class="ti-wallet"></i></h5></div>

                                <div class="align-self-center m-l-20">

                                    <h5 class="text-muted m-b-0"><a href="<?php echo base_url();?>Invoice/manage_Invoice">Rapport de Vente</a></h5>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- Column -->

                    <!-- Column -->

                  

                    <!-- Column -->

                    <!-- Column -->

                    <div class="col-lg-3 col-md-6">

                        <div class="card">

                            <div class="d-flex flex-row">

                                <div class="p-10 bg-inverse">

                                    <h5 class="text-white box m-b-0" style="color: white!important"><i class="ti-wallet"></i></h5></div>

                                <div class="align-self-center m-l-20">



                                    <h5 class="text-muted m-b-0"><a href="<?php echo base_url(); ?>invantory/Stock_out">Rupture de Stock</a></h5>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- Column -->

                    <!-- Column -->


                    <!-- Column -->

                </div>

                <div class="row">

                    <div class="col-lg-4">
                    <!-- Card -->

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Les Plus Vendu</h5>
                            <div class="message-box">
                                <div class="message-widget message-scroll">
                                    <!-- Message -->
                                    <?php foreach($topselling as $value): ?>    
                                    <a href="<?php echo base_url() ?>Sales/Sales_report">

                                        <div class="user-img"><?php if(!empty($value->product_image)){ ?> <img src="<?php echo base_url() ?>assets/images/medicine/<?php echo $value->product_image?>" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> <?php } else { ?> <img src="<?php echo base_url() ?>assets/images/capsules.png" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> <?php } ?></div>

                                        <div class="mail-contnet">

                                            <h6><?php echo $value->product_name?> </h6> <span class="mail-desc"><?php echo $value->generic_name?></span> <span class="time"><?php echo $value->expire_date?></span> </div>
                                    </a>
                                    <?php endforeach;?>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Médicament à Expiration Proche</h5>
                            <div class="message-box">
                                <div class="message-widget message-scroll">
                                    <!-- Message -->
                                    <?php foreach($expiresoonmedicine as $value):?>   
                                    <a href="<?php echo base_url() ?>invantory/Stock_expire_soon">

                                        <div class="user-img"><?php if(!empty($value->product_image)){ ?> <img src="<?php echo base_url() ?>assets/images/medicine/<?php echo $value->product_image?>" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> <?php } else { ?> <img src="<?php echo base_url() ?>assets/images/capsules.png" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> <?php } ?></div>

                                        <div class="mail-contnet">

                                            <h6><?php echo $value->product_name?> </h6> <span class="mail-desc"><?php echo $value->generic_name?></span> <span class="time"><?php echo $value->expire_date?></span> </div>

                                    </a>
                                    <?php endforeach;?>

                                </div>

                            </div>                                
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Liste Courte Des Médicaments</h5>
                            <div class="message-box">
                                <div class="message-widget message-scroll">
                                    <!-- Message -->
                                    <?php foreach($sortstock as $value): ?>   
                                    <a href="<?php echo base_url() ?>invantory/Stock_short">

                                        <div class="user-img"><?php if(!empty($value->product_image)){ ?> <img src="<?php echo base_url() ?>assets/images/medicine/<?php echo $value->product_image?>" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> <?php } else { ?> <img src="<?php echo base_url() ?>assets/images/capsules.png" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> <?php } ?></div>

                                        <div class="mail-contnet">

                                            <h6><?php echo $value->product_name?> </h6> <span class="mail-desc"><?php echo $value->generic_name?></span> <span class="time"><?php echo $value->expire_date?></span> </div>

                                    </a>
                                    <?php endforeach;?>

                                </div>

                            </div>                                 
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="footer"> © 2020 Wise Concept</footer>

        </div>

<?php 

    $this->load->view('backend/footer');

?>