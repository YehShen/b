<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contribution</title>

    <link rel="stylesheet" href="bootstraps/css/bootstrap.min.css">
    <script type="text/javascript" scr="bootstraps/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/main.css">

</head>
<body>
    <!-- Header -->
    <?php include 'header.php';?>

    <?php
        require_once 'DBConnect/dbConnection.php';
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $con_title = mysqli_real_escape_string($conn, $_POST["title_con"]);

            if(isset($_POST["term_condi"])){
                $term_con = 1;
            }
            else{
                $term_con = 0;
            }

            if($term_con == 1){
                // For Uploading File
                $file = rand(1000,100000) . "-" .$_FILES['doc_file']['name'];
                $file_loc = $_FILES['doc_file']['tmp_name'];
                $folders = 'uploads/';
                $new_file_name = strtolower($file);
                $final_file = str_replace(' ','-',$new_file_name);


                // $target_file_file = $folders . basename($_FILES['doc_file']['name']);
                // $extension_arr_file = array('pdf', 'docx', 'doc');
                // $extension = strtolower(pathinfo($target_file_file, PATHINFO_EXTENSION));
                // Select Type For File
                // Array for File
                

                // For Uploading Image// Select Type For Image // Array for Image
                $filename_img = $_FILES['img_file']['name'];
                $folder_img = 'uploadss/';
                $target_file = $folder_img . basename($_FILES['img_file']['name']);
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $extension_arr_img = array("jpg","jpeg","png");

                // move_uploaded_file($file_loc , $folders.$final_file);
                // die();
                

                if (!in_array($imageFileType, $extension_arr_img)){
                    echo '
                    <script>
                        
                        window.location.href="contribution.php?failuploadimg";
                    </script>
                ';
                }
                else{
                    if(move_uploaded_file($file_loc , $folders.$final_file)){
                    // $try = base64_encode(file_get_contents($_FILES['doc_file']['tmp_name']));
                    $image_base64 = base64_encode(file_get_contents($_FILES['img_file']['tmp_name']));
                    $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;

                    // $file = 'data:application/'.$extension.';base64,'.$try;

                    $sql = "INSERT INTO `contribution`(`con_title`, `con_pic`, `con_doc`, `u_id`) VALUES ('$con_title', '$image', '$final_file', 3)";

                    if(mysqli_query($conn, $sql)){
                        echo '
                            <script>
                                    
                                window.location.href="contribution.php?sucess";
                            </script>
                            
                        
                        ';
                    }
                    else{
                        echo '
                        <script>
                            
                            window.location.href="contribution.php?fail";
                        </script>
                        
                        
                    ';
                    }

                    }
                    else{
                        echo '
                        <script>
                            
                            window.location.href="contribution.php?fail";
                        </script>
                        
                        
                    ';
                    }
                    

                }
            }
            else{
                echo '
                <script>
                        
                    window.location.href="contribution.php?failtermcondi";
                 </script>
                ';
            }
        }




    ?>

    <!-- Content -->
    <div class="container-lg">
        <div class="con-paneal-l">
            <h1 class="p-b-27 p-t-27">Contribution</h1>
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group mb-4">
                    <label for="titel-con">Title</label>
                    <input type="text" class="form-control" id="title-con" name="title_con" placeholder="Title"
                        value=""required >
                </div>
                <div class="form-group mb-4">
                    <label for="doc-upload">Upload Document:</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile01"
                            aria-describedby="inputGroupFileAddon01" name="doc_file" accept=".pdf, .doc" required>
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                </div>
                
                <?php 
                    if(isset($_GET["failuploadfile"])){
                        echo '
                            <label class="mb-4" style="color:red;" for="">File must be .pdf or .doc</label>
                        
                        ';
                        // alert("File must be .pdf or .doc");
                    }
                ?>

                <div class="form-group mb-4">
                    <label for="image-upload">Upload Image:</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile01"
                            aria-describedby="inputGroupFileAddon01" name="img_file" accept="image/*" required>
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                </div>

                <?php 
                    if(isset($_GET["failuploadimg"])){
                        echo '
                            <label class="mb-4" style="color:red;" for="">File must be .jpg, .jpeg, .png</label>
                        
                        ';
                        // alert("File must be .jpg, .jpeg, .png");
                    }
                ?>

                <div class="form-check  mb-4">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="term_condi" value="1">
                    <!-- <input type="checkbox" class="form-check-input" id="exampleCheck1" name="term_condi" value="1"> -->
                    <label class="form-check-label" for="exampleCheck1">By checking this, I had read the <a href="#">Terms and Conditions</a></label>
                </div>
                
                <?php 
                    if(isset($_GET["failtermcondi"])){
                        echo '
                            <label class="mb-4" style="color:red;" for="">Please tick Term and Condition</label>
                        
                        ';
                        // alert("Please tick Term and Condition");
                    }
                ?>

                <?php   
                    if(isset($_GET["sucess"])){
                        echo '
                            <label class="mb-4" style="color:red;" for="">Contribution Upload Successfully</label>
                        
                        ';
                        // alert("Contribution Upload Successfully");
                    }
                    else if(isset($_GET["fail"])){
                        echo '
                            <label class="mb-4" style="color:red;" for="">Failed to upload</label>
                        
                        ';
                        // alert("Failed to upload");

                    }

                ?>

                <div class="text-right">
                    <button type="submit" class="btn btn-primary" name="btn_Submit_Con">Submit</button>
                </div>
            </form>
        </div>

        <?php
            $re = mysqli_query($conn, "SELECT * FROM `contribution` WHERE `con_id` = 16");
            // $lol = mysqli_num_rows($re);
            $rows = mysqli_fetch_array($re);

            
            // echo '<img src="'.$rows[2].'">';

        ?>
        <a href="uploads/<?php echo $rows[3]?>" target="_blank">view file</a>

        
    </div>
    

    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    </script>
</body>
</html>