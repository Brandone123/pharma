<?php
    $this->load->view('backend/header');
    $this->load->view('backend/sidebar'); 
?>
        <div class="page-wrapper">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Expiration Proche</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item ">Stock</li>
                    </ol>
                </div>
            </div>
        
            <div class="container-fluid">
                <div class="row m-b-10"> 
                    <div class="col-12">
                         <?php if($this->session->userdata('user_type') =='ADMIN' || $this->session->userdata('user_type') =='MANAGER'){ ?>
                        <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a href="<?php echo base_url();?>Medicine/Create" class="text-white"><i class="" aria-hidden="true"></i> Ajouter Un Médicament </a></button><?php } ?>
                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="<?php echo base_url();?>invantory/Stock_out" class="text-white"><i class="" aria-hidden="true"></i>En Rupture </a></button>
                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="<?php echo base_url();?>invantory/Stock_short" class="text-white"><i class="" aria-hidden="true"></i>A Court de Stock </a></button>
                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="<?php echo base_url();?>invantory/Stock_expired" class="text-white"><i class="" aria-hidden="true"></i> Médicament expiré</a></button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Expiration Proche</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table id="myTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Nom du Médicament</th>
                                                <th>En Stock</th>
                                                <th>Date d'Expiration</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                
                                           <?php foreach($expiresoonmedicine as $value): ?>
                                            <tr>
                                                <td><?php echo $value->product_name?>(<?php echo $value->strength?>)</td>
                                                <td><?php echo $value->instock;  ?></td>
                                                <td><?php echo $value->expire_date;  ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                        </div>
        </div>
         
<?php 

    $this->load->view('backend/footer');

?>