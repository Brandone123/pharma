<?php
    $this->load->view('backend/header');
    $this->load->view('backend/sidebar'); 
?>

        <!-- ============================================================== -->

        <div class="page-wrapper">

            <!-- ============================================================== -->

            <!-- Bread crumb and right sidebar toggle -->

            <!-- ============================================================== -->


            <!-- Container fluid  -->

            <!-- ============================================================== -->

        

            <div class="container-fluid p-t-10">

                <div class="row">

                    <div class="col-lg-12">

                        <div class="card card-outline-info">

                            <div class="card-header">

                                <h4 class="m-b-0 text-white">Genaral Settings</h4>

                            </div>

                            <div class="card-body">

                                <form action="Save" method="post" enctype="multipart/form-data" accept-charset="utf-8" class="form-horizontal" >

                                    <div class="form-body">
                                        <div></div>
                                        <div class="row">
                                            
                                            <div class="col-md-6 ">

                                                <div class="form-group ">

                                                    <label class="control-label text-right p-b-10">Nom de la Compagnie</label>

                                                    <div class="">

                                                        <input type="text" name="CompanyName" class="form-control" value="<?php echo $settings->name;?>" placeholder="">

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-md-6 ">

                                                <div class="form-group ">

                                                    <label class="control-label text-right p-b-10">Titre de la Compagnie</label>

                                                    <div class="">

                                                        <input type="text" name="CompanyTitle" class="form-control" value="<?php echo $settings->sitetitle;?>" placeholder="">

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group ">

                                                    <label class="control-label text-right p-b-10">Logo</label>

                                                    <div class="">

                                                    <input type="file" name="img_url" class="form-control" value="">
                                                    <img src="<?php echo base_url();?>assets/images/<?php echo $settings->sitelogo ?>" alt="Logo" style="width:120px;height:auto;">

                                                    </div>

                                                </div>

                                            </div>
                                            <div class="col-md-6">

                                                <div class="form-group ">

                                                    <label class="control-label text-right p-b-10">Contact</label>

                                                    <div class="">

                                                        <input type="number" value="<?php echo $settings->contact;?>"  name="contact" class="form-control">

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group ">

                                                    <label class="control-label text-right p-b-10">Adresse</label>

                                                    <div class="">

                                                        <input type="text" value="<?php echo $settings->address;?>" name="address" class="form-control" placeholder="">

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group ">

                                                    <label class="control-label text-right p-b-10">Email</label>

                                                    <div class="">

                                                        <input type="text" value="<?php echo $settings->email;?>"  name="email" class="form-control">

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-md-12">

                                                <div class="form-group ">

                                                    <label class="control-label text-right p-b-10">Discription</label>

                                                    <div class="">

                                                        <textarea class="form-control" name="description" rows="6" ><?php echo $settings->description;?></textarea>

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
                                                        <input type="hidden" name="id" value="<?php echo $settings->id?>">
                                                        <button type="submit" class="btn btn-info"><a style="color: #409A38;" href="<?php echo base_url();?>Configuration/Settings">Submit</a></button>

                                                        <button type="button" class="btn btn-inverse"><a style="color: #409A38;" href="<?php echo base_url();?>dashboard/Dashboard/View">Cancel</a></button>

                                                    

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

<?php 

    $this->load->view('backend/footer');

?>