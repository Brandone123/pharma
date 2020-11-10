<?php
    $this->load->view('backend/header');
    $this->load->view('backend/sidebar'); 
?>
        <div class="page-wrapper">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Client</h3>
                </div>
                <div class="col-md-7 align-self-center">

                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>

                        <li class="breadcrumb-item ">Client</li>
                    </ol>
                </div>
            </div>
            <div class="flashmessage"></div>
            <div class="container-fluid">
                <div class="row m-b-10"> 
                    <div class="col-12">

                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="<?php echo base_url();?>Customer/View" class="text-white"><i class="" aria-hidden="true"></i> Gérer Les Clients </a></button>

                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="<?php echo base_url();?>Customer/Regular" class="text-white"><i class="" aria-hidden="true"></i> Client Régulier </a></button>

                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="<?php echo base_url();?>Customer/Wholesale" class="text-white"><i class="" aria-hidden="true"></i> Client En Gros </a></button>

                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-12">

                        <div class="card card-outline-info">

                            <div class="card-header">

                                <h4 class="m-b-0 text-white">Editer Un Client</h4>

                            </div>

                            <div class="card-body">

                                <form action="update" method="post" class="form-horizontal" id="cmodel" enctype="multipart/form-data" accept-charset="utf-8">

                                    <div class="form-body">

                                        <hr class="m-t-0 m-b-40">

                                        <div class="row">

                                            <div class="col-md-6">

                                                <div class="form-group row">

                                                    <label class="control-label text-right col-md-3">Nom Du Client</label>

                                                    <div class="col-md-9">

                                                        <input type="text" class="form-control" value="<?php echo $customerId->c_name;?>" name="cname" placeholder="Customer name" required minlength="1">

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group row">

                                                    <label class="control-label text-right col-md-3">Numéro</label>

                                                    <div class="col-md-9">

                                                        <input type="text" class="form-control" value="<?php echo $customerId->cus_contact;?>" name="cphone" placeholder="Phone number">

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group row">

                                                    <label class="control-label text-right col-md-3">Email </label>

                                                    <div class="col-md-9">

                                                        <input type="text" class="form-control" value="<?php echo $customerId->c_email;?>" name="cemail" placeholder="Email">

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group row">

                                                    <label class="control-label text-right col-md-3">Adresse</label>

                                                    <div class="col-md-9">

                                                        <input type="text" class="form-control" value="<?php echo $customerId->c_address;?>" name="caddress" placeholder="address">

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Type de Client</label>
                                                    <div class="col-md-9">
                                                        <div class="col-md-9">
                                                            <input name="group1" value="Regular" data-value="Regular" type="radio" id="radio_1" checked="">
                                                            <label for="radio_1">Client Régulier</label>
                                                            <input name="group1" value="Wholesale" data-value="Wholesale" type="radio" id="radio_2">
                                                            <label for="radio_2">Client En Gros</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">

                                                <div class="form-group row">

                                                    <label class="control-label text-right col-md-3">Note</label>

                                                    <div class="col-md-9">

                                                        <textarea class="form-control" name="cnote" rows="3"><?php echo $customerId->c_note;?></textarea>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group row">

                                                    <label class="control-label text-right col-md-3">Image</label>

                                                    <div class="col-md-9">

                                                        <input type="file" name="img_url" class="form-control">

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                        <!--/row-->

                                    </div>

                                    <hr>

                                    <div class="form-actions">

                                        <div class="row justify-content-md-center">

                                            <div class=" col-md-offset-2 col-md-4 ">
												<input type="hide" name="id" value="<?php echo $customerId->id;?>">
                                                <button type="submit" class="btn btn-info">Submit</button>

                                                <button type="button" class="btn btn-inverse">Cancel</button>

                                            </div>

                                        </div>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

                                    <script>

                                        $(document).ready(function () {

                                            $('#cmodel input').on('change', function(e) {

                                                e.preventDefault(e);

                                                // Get the record's ID via attribute  

                                                var type = $('input[name=group1]:checked', '#cmodel').attr('data-value');

                                                if(type =='Regular'){

                                                    console.log(type);

                                                    $('#tamount').show();

                                                    $('#cregular').show();

                                                    $('#tdiscount').show();

                                                } 

                                                else if(type =='Wholesale'){

                                                    console.log(type);

                                                    $('#tamount').hide();

                                                    $('#cregular').hide();

                                                    $('#tdiscount').hide();  

                                                }

                                            });

                                        });                                                          

                                    </script>            

            <footer class="footer"> © 2020 Wise Concept </footer>

        </div>

<?php 

    $this->load->view('backend/footer');

?>