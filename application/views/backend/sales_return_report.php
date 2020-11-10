<?php
    $this->load->view('backend/header');
    $this->load->view('backend/sidebar'); 
?>

        <div class="page-wrapper">

            <div class="row page-titles">

                <div class="col-md-5 align-self-center">

                    <h3 class="text-themecolor">Ventes</h3>

                </div>

                <div class="col-md-7 align-self-center">

                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>

                        <li class="breadcrumb-item ">Rapport</li>

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

                                <h4 class="m-b-0 text-white"> Rapport Retour Vente</h4>

                            </div>

                            <div class="card-body">

                                <div class="table-responsive ">

                                    <table id="myTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">

                                        <thead>

                                            <tr>

                                                <th>Numéro de Facture</th>
                                                <th>Identifiant de Vente</th>
                                                <th>Identifiant du client</th>
                                                <th>Date de retour</th>
                                                <th>Somme Total</th>
                                                <th>Total Déduit</th>
                                            </tr>
                                        </thead>

                                        <tfoot>

                                            <tr>

                                                <th>Numéro de Facture</th>
                                                <th>Identifiant de Vente</th>
                                                <th>Identifiant du client</th>
                                                <th>Date de retour</th>
                                                <th>Somme Total</th>
                                                <th>Somme Déduite</th>

                                            </tr>

                                        </tfoot>

                                        <tbody>

                                           <?php foreach($salesreturnreport as $value): ?>

                                            <tr>

                                                <td><a href="<?php echo base_url() ?>Sales/Sales_R_History?H=<?php echo base64_encode($value->sr_id) ?>">
                                                        <?php echo $value->invoice_no ?>                      
                                                    </a></td>
                                                <td><?php echo $value->sale_id ?></td>
                                                <td><?php if(empty($value->cus_id)){ echo 'Client de Passage';} else { echo $value->cus_id;} ?></td>
                                                <td><?php echo date('d/m/Y', $value->return_date)?></td>
                                                <td>
                                                    <?php echo  $value->total_amount.' FCFA'; ?>
                                                </td>
                                                   <td>
                                                    <?php echo $value->total_deduction.' FCFA'; ?>
                                                </td>
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
                    <!-- /.modal-dialog -->

                </div>

            <footer class="footer"> © 2020 Wise Concept </footer>

        </div>

<?php 

    $this->load->view('backend/footer');

?>