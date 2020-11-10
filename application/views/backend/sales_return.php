<?php
    $this->load->view('backend/header');
    $this->load->view('backend/sidebar'); 
?>
        <div class="page-wrapper">
            <div class="row page-titles">

                <div class="col-md-5 align-self-center">

                    <h3 class="text-themecolor">Retour</h3>

                </div>

                <div class="col-md-7 align-self-center">

                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>

                        <li class="breadcrumb-item ">Retour</li>

                    </ol>

                </div>

            </div>
            <div class="container-fluid">
                <div class="row m-b-10"> 
                    <div class="col-12">
                    </div>
                </div>
                <div class="row">

                    <div class="col-12">

                        <div class="card card-outline-info">

                            <div class="card-header">

                                <h4 class="m-b-0 text-white">Effectuer Un Retour de Vente&nbsp;&nbsp;&nbsp;<MARQUEE direction="left" BEHAVIOR="slide" direction="right"><small class="text-white">  <b>(NB:</b>Veuillez Supprimer La Facture après Avoir Effectuer Un Retour de Vente)</small> </MARQUEE></h4> 

                            </div>

                            <div class="card-body">

                                <div class="table-responsive ">

                                    <table id="mymTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">

                                        <thead>
                                            <tr>
                                                <th>Date Vendu</th>
                                                <th>Numéro de facture</th>
                                                <th>Nom du Client</th>
                                                <th>Prix Total</th>
                                                <?php if($this->session->userdata('user_type') =='ADMIN' || $this->session->userdata('user_type') =='MANAGER'){ ?>
                                                <th>Action</th>
                                                <?php } ?>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Date Vendu</th>
                                                <th>Numéro de facture</th>
                                                <th>Nom du Client</th>
                                                <th>Prix Total</th>
                                                <?php if($this->session->userdata('user_type') =='ADMIN' || $this->session->userdata('user_type') =='MANAGER'){ ?>
                                                <th>Action</th>
                                                <?php } ?>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                           <?php foreach($salesreport as $value): ?>
                                            <tr>
                                                <td><?php echo date('d/m/Y',$value->create_date) ?> <?php echo date('h:i A',$value->sales_time); ?></td>
                                                <td><?php echo $value->invoice_no ?></td>
                                                <?php if (empty($value->c_name )){?>
                                                <td>Client de passage</td>
                                                <?php }else {?>
                                                <td><?php echo $value->c_name ?></td>
                                                <?php }?>
                                                <td>
                                                    <?php echo $value->total_amount ?> FCFA
                                                </td>
                                                 <?php if($this->session->userdata('user_type') =='ADMIN' || $this->session->userdata('user_type') =='MANAGER'){ ?>
                                                <td class="jsgrid-align-center ">
                                                    <a href="<?php echo base_url() ?>Sales/SalesReturn?S=<?php echo base64_encode($value->sale_id) ?>" title="Edit" class="btn btn-sm btn-info waves-effect waves-light customerid"  data-id="<?php echo $value->sale_id ?>"><i class="fa fa-undo"></i></a>
                                                   <a onclick="return confirm('Etês-vous sûre de vouloir Supprimer?')" href="<?php echo base_url();?>invoice/delete?id=<?php echo $value->sale_id;?>" title="Delete" class="btn btn-sm btn-info waves-effect waves-light"><i class="fa fa-trash-o"></i></a></td>
                                                </td>  
                                                <?php } ?>                                              
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

            <footer class="footer"> © 2020 Wise Concept </footer>
        </div>
        
<script>
    $(document).ready(function() {
$('#mymTable').dataTable( {
        "aaSorting": [[0,'desc']]
    });
        });
</script>
<?php 

    $this->load->view('backend/footer');

?>