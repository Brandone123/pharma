<?php
    $this->load->view('backend/header');
    $this->load->view('backend/sidebar'); 
?>

        <div class="page-wrapper">
<style>
.file_prev img {height: 44px;width: auto;max-width: 100%;margin-bottom: 0px;margin-right: 0px;margin-top: 0px;}
</style>

            <div class="container-fluid p-t-10">

            <div class="flashmessage"></div>

                <div class="row m-b-10"> 

                    <div class="col-12">

                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="<?php echo base_url('Medicine/View');?>" class="text-white" style="color: #409A38!important;"><i class="" aria-hidden="true"></i> Gérer Les Médicaments </a></button>

                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-12">

                        <div class="card card-outline-info">
                            <div class="card-header">                                
                                <h4 class="m-b-0 text-white">Nouveau Médicament <span class="pull-right"><?php date_default_timezone_set("Africa/Douala"); echo date("l jS \of F Y h:i:s A") ?></span></h4>
                            </div>
                            <div class="card-body">
                                <form action="Save" method="post" class="form-horizontal" id="formid" enctype="multipart/form-data" accept-charset="utf-8">

                                    <div class="form-body">

                                        <span class="m-t-30 m-b-40"></span>

                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">

                                                <div class="form-group row">

                                                    <label class="control-label text-right col-md-3 col-sm-12">Compagnie</label>

                                                    <div class="col-md-9 col-sm-12">
                                                       
                                                        <input type="text" class="form-control supplier_name" name="supplier_name" placeholder="Supplier Name..."  id="supplier_name" autocomplete="off"> <!-- <abbr title="(obligatoire)" style="color: red;">*</abbr> -->
                                                        <input type="hidden" class="form-control supplier" name="supplier"  id="supplier" autocomplete="off"> 
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-md-6 col-sm-12">

                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3 col-sm-12">Nom du Produit</label>
                                                    <div class="col-md-9 col-sm-12">
                                                        <input type="text" name="product_name" class="form-control product_name" placeholder="Product Name" required minlength="1"> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3 col-sm-12">Nom Générique</label>
                                                    <div class="col-md-9 col-sm-12">
                                                        <input type="text" name="generic_name" class="form-control generic_name" placeholder="Generic Name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3 col-sm-12">Code Barre</label>
                                                    <div class="col-md-9 col-sm-12">
                                                        <input type="number" name="barcode" class="form-control barcode" placeholder="" value="<?php echo rand(000000001,1500000000)?>" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3 col-sm-12">Résistance</label>
                                                    <div class="col-md-9 col-sm-12">
                                                        <input type="text" name="strength" class="form-control strength" placeholder="Strength" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3 col-sm-12">Forme</label>
                                                    <div class="col-md-9 col-sm-12">
                                                        <select name="formSelect" class="select2 formSelect" id="" style="width:100%" required>
                                                            <option></option>
                                                            <option value="Tablet">Tablette</option>
                                                            <option value="Capsules">Capsule</option>
                                                            <option value="Injection">Injection</option>
                                                            <option value="Eye Drop">Collyre</option>
                                                            <option value="Suspension">Suspension</option>
                                                            <option value="Cream">Crème</option>
                                                            <option value="Saline">Saline</option>
                                                            <option value="Inhaler">Inhalateur</option>
                                                            <option value="Powder">Poudre</option>
                                                            <option value="Spray">Vaporisant</option>
                                                            <option value="Paediatric Drop">goutte pédiatrique</option>
                                                            <option value="Nebuliser Solution">Solution de nébulisation</option>
                                                            <option value="Powder for Suspension">Poudre de Suspension</option>
                                                            <option value="Nasal Drops">Goute Nasale</option>
                                                            <option value="Eye Ointment">Pour yeux</option>
                                                        </select>

                                                    </div>

                                                </div>

                                            </div>


                                            <div class="col-md-6 col-sm-12">

                                                <div class="form-group row">

                                                    <label class="control-label text-right col-md-3 col-sm-12">Prix d'achat</label>

                                                    <div class="col-md-9 col-sm-12">

                                                        <input type="number" name="trade_price" class="form-control trade_price" placeholder="Trade Price" required>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-md-6 col-sm-12">

                                                <div class="form-group row">

                                                    <label class="control-label text-right col-md-3 col-sm-12">Prix de Vente</label>

                                                    <div class="col-md-9 col-sm-12">

                                                        <input type="number" name="mrp" class="form-control mrp" placeholder="M.R.P." required>

                                                    </div>

                                                </div>

                                            </div>
                                          
                                            <div class="col-md-6 col-sm-12">

                                                <div class="form-group row">

                                                    <label class="control-label text-right col-md-3 col-sm-12">Date d'expiration</label>

                                                    <div class="col-md-9 col-sm-12">

                                                        <input type="text" name="expire_date" class="form-control expire_date" placeholder="Expire Date" id="datepicker">

                                                    </div>

                                                </div>

                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3 col-sm-12">Qté Total</label>
                                                    <div class="col-md-9 col-sm-12">
                                                        <input type="number" name="short_stock" class="form-control short_stock" placeholder="Global Quantity" id="short_stock" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3 col-sm-12">Qté En Stock</label>
                                                    <div class="col-md-9 col-sm-12">
                                                        <input type="number" name="instock" class="form-control instock" placeholder="Quantity in Stock" id="instock" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group row">
                                                   
                                                    <label class="control-label text-right col-md-3 col-sm-3">Image</label>
                                                    <div class="col-md-7 col-sm-7">
                                                        <input type="file" name="webcam" id="user_image" class="form-control" aria-describedby="fileHelp" value="">
                                                        
                                                    </div>
                                                    <div class="col-md-2 col-sm-2">
                                                        <div class="file_prev " id="file_prev"></div>
                                                          
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3 col-sm-12">Effets secondaires</label>
                                                    <div class="col-md-9 col-sm-12">
                                                        <textarea class="form-control side_effect" name="side_effect" rows="1"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group row">
                                                    <label class="col-md-3 col-sm-12"></label>
                                                    <div class="col-md-9 col-sm-12">
                                                        <input name="favourite" class="custom-control-input favourite" value="1" type="checkbox" id="regular_customer">
                                                        <label for="regular_customer">Ajouter Comme Favori</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <hr>

                                    <div class="form-actions text-center">

                                        <div class="row">

                                            <div class=" col-md-12 ">

                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-info">Submit</button>

                                             <button type="button" class="btn btn-inverse" > <a style="color: #409A38;" href="<?php echo base_url();?>Medicine/View">Cancel</a></button>
                                                </div>   

                                                <br>
                                                <br>

                                            </div>

                                        </div>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>           

            <footer class="footer"> © 2020 Wise Concept </footer>

        </div>    
 
<script>
$("#user_image").on("change", function() {
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
<?php 

    $this->load->view('backend/footer');

?>