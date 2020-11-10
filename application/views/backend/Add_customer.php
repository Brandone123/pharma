<?php
    $this->load->view('backend/header');
    $this->load->view('backend/sidebar'); 

?>
        <div class="page-wrapper">
            <div class="container-fluid p-t-10">
                <div class="flashmessage"></div>
<style>
.file_prev img {height: 44px;width: auto;max-width: 100%;margin-bottom: 0px;margin-right: 0px;margin-top: 0px;}
</style>
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
                                <h4 class="m-b-0 text-white">Nouveau Client <span class="pull-right date-display"><?php date_default_timezone_set("Africa/Douala"); echo date("l jS \of F Y h:i:s A") ?></span></h4>
                            </div>
                            <div class="card-body">

                                <form action="Save" method="post" class="form-horizontal" id="cmodel" enctype="multipart/form-data" accept-charset="utf-8">

                                    <div class="form-body">

                                        <div class="row">

                                            <div class="col-md-6">

                                                <div class="form-group row">

                                                    <label class="col-md-3"></label>

                                                    <div class="col-md-9">

                                                            <input name="ctype" value="Regular" class="ctype  customer-type" data-value="Regular" type="radio" id="radio_1" checked="">

                                                            <label for="radio_1">Client Régulier</label>

                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group row">

                                                    <label class="col-md-3"></label>

                                                    <div class="col-md-9">

                                                            <input name="ctype" class="active" class="ctype  customer-type" value="Wholesale" data-value="Wholesale" type="radio" id="radio_2">

                                                            <label for="radio_2">Client En gros</label>

                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group row">

                                                    <label class="control-label text-right col-md-3">Nom Du Client</label>

                                                    <div class="col-md-9">

                                                        <input type="text" class="form-control cname" name="cname" placeholder="Customer Name" required minlength="1" value="" required>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-md-6" id="storeneme" style="display:none">

                                                <div class="form-group row">

                                                    <label class="control-label text-right col-md-3">Pharmacy Name</label>

                                                    <div class="col-md-9">

                                                        <input type="text" class="form-control pname" name="pname" placeholder="Phrmacy Name" required minlength="1" value="" required>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group row">

                                                    <label class="control-label text-right col-md-3">Numéro</label>

                                                    <div class="col-md-9">

                                                        <input type="number" class="form-control cphone" name="cphone" placeholder="Phone Number" required>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group row">

                                                    <label class="control-label text-right col-md-3">Email </label>

                                                    <div class="col-md-9">

                                                        <input type="email" class="form-control cemail" name="cemail" placeholder="Email">

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group row">

                                                    <label class="control-label text-right col-md-3">Adresse</label>

                                                    <div class="col-md-9">

                                                        <input type="text" class="form-control caddress" name="caddress" placeholder="address">

                                                    </div>

                                                </div>

                                            </div>

                                         
                                            <div class="col-md-6">

                                                <div class="form-group row">

                                                    <label class="control-label text-right col-md-3">Note</label>

                                                    <div class="col-md-9">

                                                        <textarea class="form-control cnote" name="cnote" rows="1"></textarea>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group row">
                                                   
                                                    <label class="control-label text-right col-md-3 col-sm-12">Image</label>
                                                    <div class="col-md-7 col-sm-7">
                                                        <input type="file" name="img_url" id="img_url" class="form-control" aria-describedby="fileHelp">
                                                    </div>
                                                    <div class="col-md-2 col-sm-2">
                                                        <div class="file_prev" ></div>
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

                                                <input type="submit" name="" class="btn btn-info" value="Submit">

                                                <button type="button" class="btn btn-inverse"><a style="color: #409A38;" href="<?php echo base_url();?>Customer/View">Cancel</a></button>

                                            </div>
                                            <br>
                                                
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

                                                var type = $('input[name=ctype]:checked', '#cmodel').attr('data-value');

                                                if(type =='Regular'){

                                                    console.log(type);

                                                    $('#tamount').show();

                                                    $('#cregular').show();

                                                    $('#tdiscount').show();
                                                    $('#storeneme').hide();

                                                } 

                                                else if(type =='Wholesale'){

                                                    console.log(type);

                                                    $('#tamount').hide();

                                                    $('#cregular').hide();

                                                    $('#tdiscount').hide();  
                                                    $('#storeneme').show();  

                                                }

                                            });

                                        });                                                          
                                            
                                    </script> 
                                              
            <footer class="footer"> © 2020 Wise Concept </footer>
<script>
$("#img_url").on("change", function() {
    if (typeof FileReader == "undefined") {
        alert("Your browser doesn't support HTML5, Please upgrade your browser");
    } else {
        var container = $(".file_prev");
        //remove all previous selected files
        container.empty();

        //create instance of FileReader
        var reader = new FileReader();
        reader.onload = function(e) {
            $("<img />", {
                src: e.target.result
            }).appendTo(container);
        };
        reader.readAsDataURL($(this)[0].files[0]);
    }
});
    </script>
        </div>

<?php 

    $this->load->view('backend/footer');

?>