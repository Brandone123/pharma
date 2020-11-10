<?php
    $this->load->view('backend/header');
    $this->load->view('backend/sidebar'); 
?>
        <div class="page-wrapper">

            <div class="container-fluid p-t-10">

             <div class="flashmessage"></div>

                <div class="row m-b-10"> 

                    <div class="col-12">

                        <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a href="<?php echo base_url('Medicine/Create');?>" class="text-white"><i class="" aria-hidden="true"></i>Ajouter Un Médicament</a></button>

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

                                <h4 class="m-b-0 text-white">Gérer Les Médicaments</h4>

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
                                                <th class="w-p-10">Date d'Expiration</th>
                                                <th class="w-p-5">Stock Total</th>
                                                <th class="w-p-5">En Stock</th>
                                                
                                                <th class="w-p-5">Image</th>
                                                <?php if($this->session->userdata('user_type') =='ADMIN' || $this->session->userdata('user_type') =='MANAGER'){ ?>
                                                <th class="w-p-5">Action</th>
                                                <?php } ?>
                                            </tr>

                                        </thead>

                                        <tbody>

                                           <?php foreach($medicineList as $value): ?> 
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
                                                    <td><?php echo $value->short_stock ?></td>
                                                <td><?php echo $value->instock ?></td>
                                                
                                                <td>
                                                    <?php if (empty($value->product_image)) {?>
                                                    <img src="<?php echo base_url();?>assets/images/capsules.png" alt="" height="25" class="img-rounded image_rounded">
                                                    <?php }else{?>
                                                    <img src="<?php echo base_url();?>assets/images/medicine/<?php echo $value->product_image ?>" alt="" height="25" class="img-rounded image_rounded">
                                                    <?php }?>
                                                </td>
                                                 <?php if($this->session->userdata('user_type') =='ADMIN' || $this->session->userdata('user_type') =='MANAGER'){ ?>
                                                <td class="jsgrid-align-center ">

                                                    <a href="" title="Edit" class="btn btn-sm btn-info waves-effect waves-light medicineid"  data-id="<?php echo $value->product_id; ?>"><i class="fa fa-pencil-square-o"></i></a>
                                                   
                                                    <a onclick="return confirm('Etês-vous sûre de vouloir Supprimer?')" href="<?php echo base_url();?>medicine/delete?id=<?php echo $value->product_id;?>" title="Delete" class="btn btn-sm btn-info waves-effect waves-light"><i class="fa fa-trash-o"></i></a>
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

<!--Modal-->

                            <div class="modal fade" id="medicineModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-lg"   style="max-width:60%!important"  role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Mise à Jour</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <form action="Update" method="post" id="medicinefORM" class="form-horizontal" enctype="multipart/form-data" accept-charset="utf-8">
                                        <div class="modal-body"><div class="row">
                                            <div class="col-md-6">

                                                <div class="form-group row">

                                                    <label class="control-label text-right col-md-3">Compagnie</label>

                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control supplier_name" name="supplier_name" placeholder="Supplier Name..."  id="supplier_name" autocomplete="off"> 
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group row">

                                                    <label class="control-label text-right col-md-3">Nom du Produit</label>

                                                    <div class="col-md-9">

                                                        <input type="text" name="product_name" class="form-control" placeholder="product name" required minlength="1">

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Nom Générique</label>
                                                    <div class="col-md-9">
                                                        <input type="text" name="generic_name" class="form-control" placeholder="Generic name">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group row">

                                                    <label class="control-label text-right col-md-3">Code Barre</label>

                                                    <div class="col-md-9">

                                                        <input type="number" name="barcode" class="form-control" placeholder="Generic name">

                                                    </div>

                                                </div>

                                            </div>
                                            <div class="col-md-6">

                                                <div class="form-group row">

                                                    <label class="control-label text-right col-md-3">Résistance</label>

                                                    <div class="col-md-9">

                                                        <input type="text" name="strength" class="form-control" placeholder="Strength">

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group row">

                                                    <label class="control-label text-right col-md-3">Forme</label>

                                                    <div class="col-md-9">
                                                        <select name="form" class="select2" id="form" value="" style="width:100%">
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

                                            <div class="col-md-6">

                                                <div class="form-group row">

                                                    <label class="control-label text-right col-md-3">Prix d'achat</label>

                                                    <div class="col-md-9">

                                                        <input type="text" name="trade_price" class="form-control" placeholder="Trade Price" required>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group row">

                                                    <label class="control-label text-right col-md-3">Prix de Vente</label>

                                                    <div class="col-md-9">

                                                        <input type="text" name="mrp" class="form-control mrp" placeholder="M.R.P." >

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Date d'expiration</label>
                                                    <div class="col-md-9">
                                                        <input type="text" name="expire_date" class="form-control" placeholder="Expire Date" id="datepicker">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Qté En Stock</label>
                                                    <div class="col-md-9">
                                                        <input type="text" name="instock" class="form-control" placeholder="Quantity in Stock" id="instock">
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Qté Total</label>
                                                    <div class="col-md-9">
                                                        <input type="text" name="short_stock" class="form-control" placeholder="Global Quantity" id="short_stock">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">

                                                <div class="form-group row">

                                                    <label class="control-label text-right col-md-3">Effets secondaire</label>

                                                    <div class="col-md-9">

                                                        <textarea class="form-control" name="side_effect" rows="1"></textarea>

                                                    </div>

                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Product Image</label>
                                                    <div class="col-md-7">
                                                        <input type="file" name="product_image" id="product_image" class="form-control" placeholder="Format valide: gif|jpg|png|jpeg">
                                                    </div>
                                                    <div class="col-md-2">
                                                    <div class="file_prev">
                                                        <img src="" name="image" class="img-responsive postimg" id="image" height="35px" width="60px">
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>                                              
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3"></label>
                                                    <div class="col-md-9">
                                                      <input type="checkbox" name="favourite" class="custom-control-input" id="favourite" value='1'  >
                                                      <label for="favourite">Ajouter Comme Favori</label>
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                              <div class="modal-footer text-center">

                               <input type="hidden" name="id" value="">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                <button type="submit" class="btn btn-info">Submit</button>

                              </div>

      </form>

    </div>

  </div>

</div>
<style type="text/css">
    .card-no-border .card{
        width:100%!important;
    }
</style>
                <script type="text/javascript">
                    $('.boxsize , .mrp').on('input', function() {
                        var boxprice = parseInt($('.boxsize').val());
                        var mrp = parseInt($('.mrp').val());
                        console.log('mrp');
                        $('.totalboxprice').val((boxprice * mrp ? boxprice * mrp : 0).toFixed(2));
        
                    });
                </script>
                                <div class="modal fade bs-example-modal-md" id="" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog" style="">

                                        <div class='modal-content barcode_modal'>
                                            <!-- <span aria-hidden="true" class="modal_close">&times;</span> -->
                                            <div style="" id="printa"></div>
                                            <!-- /.modal-content -->
                                            <button type='submit' class='btn btn-info' id='print'>print</button>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                          </div>
                                        </div>
                                    
                                    </div>
                                    
                                </div>                
           <script type="text/javascript">
                $(document).ready(function () {
                    $(".medicineid").click(function (e) {
                        e.preventDefault(e);
                        // Get the record's ID via attribute  
                        var iid = $(this).attr('data-id');
                        //console.log(iid);
                         $('#medicinefORM').trigger("reset");
                         $('#medicineModal').modal('show'); 
                        $.ajax({
                            url: '<?php echo base_url();?>Medicine/GetMedicineById?id=' + iid,
                            method: 'GET',
                            data: '',
                            dataType: 'json',
                        }).done(function (response) {
                            console.log(response);
                            // Populate the form fields with the data returned from server
                            $('#medicinefORM').find('[name="id"]').val(response.mvalue.product_id).end();
                            $('#medicinefORM').find('[id="supplier"]').val(response.mvalue.supplier_id).end();
                            $('#medicinefORM').find('[name="product_name"]').val(response.mvalue.product_name).end();
                            $('#medicinefORM').find('[name="generic_name"]').val(response.mvalue.generic_name).end();
                            $('#medicinefORM').find('[name="strength"]').val(response.mvalue.strength).end();
                            $('#medicinefORM').find('[id="form"]').val(response.mvalue.form).trigger('change').end();
                            $('#medicinefORM').find('[name="box_size"]').val(response.mvalue.box_size).end();
                            $('#medicinefORM').find('[name="expire_date"]').val(response.mvalue.expire_date).end();
                            $('#medicinefORM').find('[name="trade_price"]').val(response.mvalue.trade_price).end();
                            $('#medicinefORM').find('[name="mrp"]').val(response.mvalue.mrp).end();
                            $('#medicinefORM').find('[name="box_price"]').val(response.mvalue.box_price).end();
                            $('#medicinefORM').find('[name="side_effect"]').val(response.mvalue.side_effect).end();
                            $('#medicinefORM').find('[name="instock"]').val(response.mvalue.instock).end();
                            $('#medicinefORM').find('[name="short_stock"]').val(response.mvalue.short_stock).end();
                            $('#medicinefORM').find('[name="barcode"]').val(response.mvalue.batch_no).end();
                            $('#image').attr('src','<?php echo base_url()?>assets/images/medicine/'+response.mvalue.product_image);
                        if(response.mvalue.favourite == "1") {
                        $( "input[type='checkbox']" ).prop( "checked", true );
                        } else {
                        $( "input[type='checkbox']" ).prop( "checked",false);
                        } 
                        if(response.mvalue.discount == "YES") {
                        $('#medicinefORM').find(':radio[id=discount_yes][value="YES"]').prop('checked', true).end();
                        } else if(response.mvalue.discount == "NO") {
                        $('#medicinefORM').find(':radio[id=discount_no][value="NO"]').prop('checked', true).end();
                        }                             
        				});
                    });
                });               
            </script>                  
           <script type="text/javascript">
                $(document).ready(function () {
                    $(".barcodegenerator").click(function (e) {
                        e.preventDefault(e);
                        // Get the record's ID via attribute  
                        var iid = $(this).attr('data-id');
                        //console.log(iid);
                         
                        $.ajax({
                            url: '<?php echo base_url();?>Medicine/GetBarcodeDom?id=' + iid,
                            method: 'GET',
                            data: '',
                            dataType: 'html',
                        }).done(function (response) {
                            console.log(response);
                            $('#printa').html(response);
                           // $('.bs-example-modal-md').modal('show'); 
            var mode = 'iframe'; //popup
            var close = mode == "popup";
            var options = {
                mode: mode,
                popClose: close
            };
            $("div#printArr").printArea(options);                            
        				});
                    });
                });               
            </script>                        

            <footer class="footer"> © 2020 Wise Concept </footer>
<script>
$("#product_image").on("change", function() {
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