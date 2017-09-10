<!DOCTYPE html>
<html lang="en">

<?php

$str = file_get_contents('data.json');

$json = json_decode($str, true);

?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Teach Edision</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/1-col-portfolio.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">TeachEdision</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">
    <pre>
    	<h3 style="text-align:center;">TeachEdision : Data Info</h3>
    </pre>
    <div class="form-group">
      <label for="usr" style="text-align:center;">Search:</label>
      <input type="text" class="form-control" id="usr">
    </div>
    <hr>
    <div class="row">
    
    <?php
	$i=0;
	
	$name = array("demo"=>1);
	
	
    foreach ($json as $data){
		foreach ($data  as $key => $value ){
			//echo $key.' -> '.$value.'<br>';
			if($key == "username"){
				if($value == ""){ $hval = "[no_title]";}else{ $hval = $value;}
				if(isset($name[$hval])){
					$name[$hval]+=1;
				}else{
					$name[$hval]=1;
				}
			}
			
			
			
		}//$data
		$i++;
	}//$json
	//print_r($name);
	array_shift($name);
	foreach ($name as $ename => $record){
		?>
        
        <div class="col-sm-4" style="margin-bottom:10px;">
        	
            <!-- Left-aligned -->
            	<a href="index.php?v=<?php echo $ename; ?>">
                    <div class="media">
                      <div class="media-left">
                        <img src="img_avatar1.png" class="media-object" style="width:60px">
                      </div>
                      <div class="media-body">
                        <h4 class="media-heading"><?php echo $ename;?></h4>
                        <p>Total Records : <?php echo $record;?></p>
                      </div>
                    </div>
                </a>
        
        </div>
        
        
        <?php
	}
	?>
    </div>
    <hr>
    <?php
	if(isset($_GET['v']) && !empty($_GET['v'])){
		$getname = $_GET['v'];
	?>
    <pre>
     Information :
     
     username : <?php echo $getname; ?> 
    
	
	<?php
	$i=0;
		foreach ($json as $data){
			
			foreach ($data  as $key => $value ){
				if($key == 'username'){
					if($value == $getname){
						echo '<hr>';
						$i = 1;
					}else{
						$i = 0;
					}
				}
				if($i == 1){
					echo "$key  : $value <br>";
				}
				
				
			}//$data
		}//$json
	
	}
	?>
    </pre>
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
