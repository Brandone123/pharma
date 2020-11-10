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

                                <h4 class="m-b-0 text-white">Rapport Facture</h4>

                            </div>

                            <div class="card-body">

                                <div class="table-responsive ">

                                    <table id="" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">

                                        <thead>

                                            <tr>
                                                <th>Nom du Médicament</th>

                                                <th>Quantité</th>
                                                <th>Prix Total</th>

                                            </tr>

                                        </thead>

                                        <tfoot>

                                            <tr>

                                                <th>Nom du Médicament</th>

                                                <th>Quantité</th>
                                                <th>Prix Total</th>
                                            </tr>

                                        </tfoot>

                                        <tbody>

                                           <?php foreach($invoice_details as $value): ?>

                                            <tr>

                                                <td><?php echo $value->medicine_name; ?></td>

                                                <td><?php echo $value->qty; ?></td>
                                                <td><?php echo $value->total_price; ?> FCFA</td>

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

<?php 

    $this->load->view('backend/footer');

?>