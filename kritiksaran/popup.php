<?php
  session_start();
  if(!isset($_SESSION['username_admin'])){
    header("location: ..\login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../tambahcss.css">
    <link rel="shortcut icon" href="../img/icon/logoremove.png" type="image/x-icon">
    <title>Edit Data Vaksin</title>
</head>
<body style="background-image: url(../img/Menu/bggg.png); background-repeat: repeat-y;">
    <?php
        include "../sidebar.html";
    ?>
    <script> alert("Halo")
             window.location.href = "crudkritiksaran.php"</script>
    
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
 	<script type="text/javascript">
 	var id_vaksin;
    var nama_vaksin;
    var vaksin;

    $(document).ready(function () {
    	$(document).ready(function(){

    		//$("#id_imun").load("prosesCrudImunisasi.php", "func_imun=ambil_data_imun");

			$.ajax({
					type : "GET",
					url: "http://localhost/Aplikasi_EPosyandu/api/Vaksin/read_one.php",
					data: {func_vaksin : "ambil_single_data", id_vaksin : "<?php echo $_GET['id_vaksin']?>"},
					cache: false,
					success: function(msg){
						data = msg;
						nama_vaksin = data['nama_vaksin'];

						//masukan ke masing - masing textfield
						$("#nama_vaksin").val(nama_vaksin);
					}
			});

    		$("#tupdate").click(function(){
    			nama_vaksin = $("#nama_vaksin").val();

    		
    			//data = "&tgl_imun="+tgl_imun+"&usia_saat_vaksin="+usia_saat_vaksin+"&tinggi_badan="+tinggi_badan+"&berat_badan="+berat_badan+"&periode="+periode;
				vaksin = {
					"nama_vaksin" : nama_vaksin
				};	

			
    			$("#loading").show();
    			$.ajax({
    			type : "POST",
    			url : "http://localhost/Aplikasi_EPosyandu/api/Vaksin/update.php",
    			data : {vaksin : vaksin, func_vaksin : "update_data_vaksin", id_vaksin: "<?php echo $_GET['id_vaksin']?>"},
    			cache : false,
    			success : function(msg){
    				if(msg.message=="vaksin was updated."){
    					alert("Data Vaksin Berhasil Diperbarui");
                        window.location.href="crudVaksin.php";
    				}else{
    					$("#status").html("ERROR. . . ");
    				}
    				$("#loading").hide();
       			}
    		});
    		});
    	});
    });
 	</script>
</body>
</html>