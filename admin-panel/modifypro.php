<?php
include('header.php');
if(!isset($_SESSION['aid'])){
    header('location:index.php');
}
include('dbconnect.php');
include('leftnav.php');

?>
<div class="col-md-10">
    <div class="col-md-6 form-group">
    <div class="col-md-12 text-center adminform">

        <h3>Modify Product</h3>
    </div> 
    <?php
        $id = $_GET['proid'];


      $cmd = "select * from products where proid = '".$id."'";
      $data = mysqli_query($conn, $cmd);
      $numrow = mysqli_num_rows($data);
      if($numrow <=0){
        echo "No data available";
      }
        while($row = mysqli_fetch_array($data)){?>
        <form action="promodifier.php" method="post" enctype="multipart/form-data">
            <input type="text" name="pname" class="form-control adinput form-control-sm" value="<?php echo $row['proname']; ?>">
            <lable> Product Description </lable>
            <textarea type="text" name="pdesc" id="myTextarea" class="form-control adinput form-control-sm"  style="width:100% !important"> <?php echo $row['descrip']; ?></textarea>
            <input type="text" name="price" class="form-control adinput form-control-sm" value="<?php echo $row['MRP']; ?>">
            <input type="text" name="dprice" class="form-control adinput form-control-sm" value="<?php echo $row['price']; ?>">
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
                        <option value="<?php echo $rowcat['catid']; ?>" <?php if($rowcat['catid']== $row['catid']){ echo "selected"; }?>><?php echo $rowcat['name']; ?></option>
                        
                        <?php
                        }
                    }

                ?>
            </select> 
            <input type="submit"  value="Submit" class="btn btn-default adinputbtn" >
                </div>
            <div class="text-center col-md-6" style="padding-top: 30px; padding-left:50px">
            <p>Choose new Image to replace images</p>
            
            <?php
            if(!$row['image']==''){?>
                <div class="col-md-3 thumbnail m-2" style="height:213px"><img src="<?php echo "../productimages/".$row['image']; ?>"  alt="pro image">
                <input type="file" name="pimage" class="form-control-file adinput form-control-lg" >
            </div>
           <?php
            }
            ?>
            <?php
            if(!$row['img1']==''){?>
                <div class=" col-md-3 thumbnail m-2" style="height:213px"><img src="<?php echo "../productimages/".$row['img1']; ?>" alt="pro image">
                <input type="file" name="pimage1" class="form-control-file adinput form-control-lg" >
            </div>
            <?php
            }
            ?>
             <?php
            if(!$row['img2']==''){?>
                <div class=" col-md-3  thumbnail m-2" style="height:213px" ><img src="<?php echo "../productimages/".$row['img2']; ?>" alt="pro image">
                <input type="file" name="pimage2" class="form-control-file adinput form-control-lg" >
            </div>
            <?php
            }
            ?>
             <?php
            if(!$row['img3']==''){?>
                <div class=" col-md-3  thumbnail m-2" style="height:213px"><img src="<?php echo "../productimages/".$row['img3']; ?>" alt="pro image" >
                <input type="file" name="pimage3" class="form-control-file adinput form-control-lg" >
            </div>
           <?php
            }
            ?>
             <?php
            if(!$row['img4']==''){?>
                <div class=" col-md-3 thumbnail m-2" style="height:213px"><img src="<?php echo "../productimages/".$row['img4']; ?>" alt="pro image"  onmouseover="mOver(this)">
                <input type="file" name="pimage4" class="form-control-file adinput form-control-lg" >
            </div>
           <?php
            }
            ?>     
            </form>
            <?php
        }
        
        ?>
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