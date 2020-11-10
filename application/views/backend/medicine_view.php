<?php
    $this->load->view('backend/header');
    $this->load->view('backend/sidebar'); 
?>
        <div class="page-wrapper">

            <div class="container-fluid p-t-10">

             <div class="flashmessage"></div>

                <div class="row m-b-10"> 

                    <div class="col-12">

                        <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a href="<?php echo base_url('Medicine/Create');?>" class="text-white" style="color: #409A38!important;"><i class="" aria-hidden="true"></i>Ajouter Les Médicaments</a></button>

                    </div>

                </div>
<style>
    .w-p-5{width:5%!important;}
    .w-p-10{width:10%!important;}
    .w-p-15{width:15%!important;}
    .w-p-20{width:20%!important;}
    .file_prev img {height: 44px;width: auto;max-width: 100%;margin-bottom: 0px; margin-right: 0px;margin-top: 0px;}
</style>
                <div class="row">

                    <div class="col-12">

                        <div class="card card-outline-info">

                            <div class="card-header">

                                <h4 class="m-b-0 text-white">Gérer Les Médicaments </h4>

                            </div>

                            <div class="card-body">

                                <div class="table-responsive ">

                                    <table id="myTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">

                                        <thead>

                                            <tr>
                                                <th class="w-p-20">Article</th>
                                                <th class="w-p-10">Forme </th>
                                                 <th class="w-p-10">Prix d'achat</th>
                                                 <th class="w-p-10">Prix de Vente</th>
                                                <th class="w-p-10">Date d'expiration</th>
                                                <th class="w-p-5">En Stock</th>
                                                <th class="w-p-5">Stock Total</th>
                                                <th class="w-p-5">Image</th>
                                            </tr>

                                        </thead>

                                        <tbody>

                                           <?php foreach($allSupplier as $value): ?>
                                               <tr> 
                                                <td><?php echo $value->product_name;?>(<?php echo $value->strength ?>)</td>
                                                <td><?php echo $value->form ?></td>
                                                <td><?php echo $value->trade_price ?></td>
                                                 <td><?php echo $value->mrp ?></td>
                                                <td> 
                                                <?php
                                                date_default_timezone_set("Africa/Douala");
                                                $today = strtotime(date('Y/m/d'));
                                                $expire = strtotime($value->expire_date);
                                                $date = str_replace('/', '-',$value->expire_date);
                                                $expire = strtotime($date);
                                                $a = date('Y/m/d',$expire);
                                                $b = strtotime($a);
                                                    if($today >= $b){
                                                        echo "<span style='color:red'>".$value->expire_date."</span>";
                                                    } else {
                                                        echo $value->expire_date;
                                                    }                                                    
                                                    ?></td>
                                                <td><?php echo $value->instock ?></td>
                                                <td><?php echo $value->short_stock ?></td>
                                               
                                                <td>
                                                    <?php if (empty($value->product_image)) {?>
                                                    <img src="<?php echo base_url();?>assets/images/capsules.png" alt="" height="25" class="img-rounded image_rounded">
                                                    <?php }else{?>
                                                    <img src="<?php echo base_url();?>assets/images/medicine/<?php echo $value->product_image ?>" alt="" height="25" class="img-rounded image_rounded">
                                                    <?php }?>
                                                </td>
                                                <?php } ?>
                                            </tr>
                                            <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                        </div>
<style type="text/css">
    .card-no-border .card{
        width:100%!important;
    }
</style>
            <footer class="footer"> © 2020 Wise Concept </footer>
       
        </div>

<?php 

    $this->load->view('backend/footer');

?>