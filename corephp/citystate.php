<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dynamic Country State City Dropdown</title>

        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="card">
              <div class="card-header">
                    <h2 class="text-success">Country State City Dropdown</h2>
                </div>
                <div class="card-body">
                 <form>
                    <div class="form-group">
                      <label for="country">Country</label>
                      <select class="form-control" id="country-dropdown" name="country">
                      <option value="">Select Country</option>
                        <?php
                        require_once "mydb.php";

                        $result = mysqli_query($conn,"SELECT * FROM countries");

                        while($row = mysqli_fetch_array($result)) {
                        ?>
                            <option value="<?php echo $row['id'];?>"><?php echo $row["name"];?></option>
                        <?php
                        }
                        ?>
                        
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="state">State</label>
                      <select class="form-control" id="state-dropdown">
                        
                      </select>
                    </div>                        

                    <div class="form-group">
                      <label for="city">City</label>
                      <select class="form-control" id="city-dropdown">
                        
                      </select>
                    </div>
 
                </div>
              </div>
            </div>
        </div> 
    </div>
  <script type="text/javascript">
    var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
</script>
    <script type="text/javascript">
jQuery(document).ready(function(){
    jQuery('select[name="country"]').on('change',function(){
        var countryID = jQuery(this).val();
        alert(countryID);
        if(countryID){
            jQuery.ajax({
                type:'POST',
                url: 'display.php',
                data:'country_id='+countryID,
                success:function(html){
                    jQuery('#state-dropdown').html(html);
                    jQuery('#city-dropdown').html('<option value="">Select state first</option>'); 
                }
            }); 
        }else{
            jQuery('#state-dropdown').html('<option value="">Select country first</option>');
            jQuery('#city-dropdown').html('<option value="">Select state first</option>'); 
        }
    });
    
/*  jQuery('#state-dropdown').on('change',function(){
        var stateID = jQuery(this).val();
        if(stateID){
            jQuery.ajax({
                type:'POST',
                url:'ajaxFile.php',
                data:'state_id='+stateID,
                success:function(html){
                    jQuery('#city-dropdown').html(html);
                }
            }); 
        }else{
            jQuery('#city-dropdown').html('<option value="">Select state first</option>'); 
        }
    });*/
});
</script>
</body>
</html>