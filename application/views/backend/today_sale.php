<?php
    $this->load->view('backend/header');
    $this->load->view('backend/sidebar'); 
?>
        <div class="page-wrapper">

            <div class="row page-titles">

                <div class="col-md-5 align-self-center">

                    <h3 class="text-themecolor">Rapport</h3>

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

                                <h4 class="m-b-0 text-white"> Rapport de vente Journalier</h4>

                            </div>

                            <div class="card-body">

                                <div class="table-responsive ">

                                    <table id="myTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">

                                        <thead>

                                            <tr>

                                                <th>Vente d'aujourd'hui</th>
                                                <th>Heure de Vente</th>
                                                <th>Numéro de Facture</th>

                                                <th>Nom du Client</th>

                                                <th>Total</th>

                                            </tr>

                                        </thead>

                                        <tfoot>

                                            <tr>

                                               <th>Vente d'aujourd'hui</th>
                                               <th>Heure de Vente</th>

                                                <th>Numéro de Facture</th>

                                                <th>Nom du Client</th>

                                                <th class="Total">Total</th>


                                            </tr>

                                        </tfoot>

                                        <tbody>

                                           <?php foreach($todaysreport as $value): ?>

                                            <tr>

                                                <td><?php echo date('l dS \o\f F Y', $value->create_date)?> </td>
                                                <td><?php echo date('h:i A',$value->sales_time); ?></td>
                                                <td><?php echo $value->invoice_no; ?></td>

                                                <td><?php if(empty($value->c_name)){ echo 'Client de Passage';} else { echo $value->c_name;} ?></td>

                                                <td>

                                                    <?php echo $value->total_amount. ' FCFA'; ?>

                                                </td>

                                            </tr>

                                            <?php endforeach; ?>

                                        </tbody>

                                    </table>

                                </div>
                                <br>
                                <br>
                                 <table id="myTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">

                                        <thead>

                                            <tr>

                                                <th>Total Revenu</th>

                                            </tr>

                                        </thead>
                                        <tbody>
                                            <tr style="color: red;">


                                                <td>
                                                <?php
                                                $sum = 0;
                                                  foreach($todaysreport as $value){ ?>
                                                    <?php
                                                    $sum += $value->total_amount;
                                                     ?> 

                                                 <?php }
                                                 echo $sum. ' FCFA' ?>   
                                                </td>
                                            </tr>
                                        </tbody>

                                    </table>
                                    
                            </div>
                             
                        </div>

                    </div>

                </div>


            </div>

                    <!-- /.modal-dialog -->

                </div>

                <!-- /.modal -->


                    <!-- /.modal-dialog -->

                </div>

            <footer class="footer"> © 2020 Wise Concept </footer>

        </div>

<?php 

    $this->load->view('backend/footer');

?>