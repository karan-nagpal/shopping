<?php
include('dbconnect.php');
include('header.php');
include('leftnav.php');
?>
<div class="col-md-9" style="min-height:700px;">
    <!-- <div class="col-md-7 col-md-offset-2 form-group"> -->
    <div class="text-center adminform">

        <h3>Add New products</h3>
    </div>    
    <div class="col-md-7">
        <form action="proadder.php" method="post" enctype="multipart/form-data">
            <input type="text" name="pname" class="form-control adinput form-control-sm" placeholder="Product Name">
            <lable> Product Description </lable>
            <textarea type="text" name="pdesc" id="myTextarea" class="form-control adinput form-control-sm" placeholder="Product description" style="width:100% !important"> </textarea>
            <input type="text" name="price" class="form-control adinput form-control-sm" placeholder="Price">
            <input type="text" name="dprice" class="form-control adinput form-control-sm" placeholder="Discounted price">
            <select name="category" class="form-control-file adinput form-control-lg" required>
                <option value=""> Please select category</option>
                <?php
                    $catq = "select catid, name from categories";
                    $datacat = mysqli_query($conn, $catq);
                    $numrowcat = mysqli_num_rows($data);
                    if($numrowcat=0){
                        echo "ERROR";
                    }else{
                        while($rowcat = mysqli_fetch_array($datacat)){?>
                        
                        <option value="<?php echo $rowcat['catid']; ?>"><?php echo $rowcat['name']; ?></option>
                        
                        <?php
                        }
                    }

                ?>
            </select>
            <input type="submit"  value="Submit" class="btn btn-default adinputbtn" >
                </div>
                <div class="col-md-4 m-3 p-3">
                        <P> Choose Product images</p>
                    <hr>
                    <input type="file" name="pimage" class="form-control-file adinput form-control-lg"  required>
                    <hr>
                    <input type="file" name="pimage1" class="form-control-file adinput form-control-lg" >
                    <hr>
                    <input type="file" name="pimage2" class="form-control-file adinput form-control-lg" >
                    <hr>
                    <input type="file" name="pimage3" class="form-control-file adinput form-control-lg" >
                    <hr>
                    <input type="file" name="pimage4" class="form-control-file adinput form-control-lg" >
                    
                   
                </form>
            </div>
    </div>
</div>
<script>

		tinymce.init({
		    selector: '#myTextarea',
		   
		    height: 250,
		    menubar: false,//'file edit view insert format tools table help',
		    plugins: 'advlist lists',
		    toolbar: 'bold italic underline strikethrough | fontselect fontsizeselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | charmap emoticons | ltr rtl',
            
        });
</script>

<!--  selector: 'textarea#myTextarea',
    plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
    imagetools_cors_hosts: ['picsum.photos'],
    menubar: 'file edit view insert format tools table help',
    toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl', -->
<?php



include('../footer.php');
?>