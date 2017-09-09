<html>
<head>
 <title>Getting Data......</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<style>
.header h1{
font-weight: bolder;
text-align: center;
}
form,table{
  margin-top: 20px;
}
.well{
    background-color: white;
    box-shadow: 0px 0px 10px rgba(220,220,220,0.2);
  }
.well:hover{
    box-shadow: 0px 0px 10px grey;
    z-index: 10;
}
body{
  background-color: rgba(220,220,220,0.3);
}
</style>
</head>
<body>
<div class="container">
  <div class="row">
    <section class="content bgcolor-3">
      <div class="header col-lg-offset-2 col-lg-8">
        <h1>FIND YOUTUBE CHANNEL </h1>
        <h1> USING KEYWORD</h1>
            <div class="col-lg-offset-3 col-lg-6">
                  <form action ="youtube.php" method="post">
                      <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search" name="keyword">
                             <div class="input-group-btn">
                                <button class="btn btn-danger" type="submit" name="submit">Search</button>
                             </div>
                      </div>
                  </form>
            </div> 
      </div>
      <div class="well  col-lg-offset-1 col-lg-10 col-lg-offset-1">
        <table class="table table-responsive table-bordered table-striped table-centered  table-hovered">
          <thead>
            <th>ChannelName</th>
            <th>ChannelID</th>
          </thead>
          <tbody>

<?php
if (isset($_POST['submit'])){

		$search=$_POST['keyword'];	

$sp=array("CAMSAhACUBQ%253D","CAMSAhACSBRQFOoDAA%253D%253D","CAMSAhACSChQFOoDAA%253D%253D","CAMSAhACSDxQFOoDAA%253D%253D",
  "CAMSAhACSFBQFOoDAA%253D%253D","CAMSAhACSGRQFOoDAA%253D%253D","CAMSAhACSHhQFOoDAA%253D%253D","CAMSAhACSIwBUBTqAwA%253D",
  "CAMSAhACSKABUBTqAwA%253D","CAMSAhACSLQBUBTqAwA%253D","CAMSAhACSMgBUBTqAwA%253D","CAMSAhACSNwBUBTqAwA%253D",
  "CAMSAhACSPABUBTqAwA%253D","CAMSAhACSIQCUBTqAwA%253D","CAMSAhACSJgCUBTqAwA%253D","CAMSAhACSKwCUBTqAwA%253D",
  "CAMSAhACSMACUBTqAwA%253D","CAMSAhACSNQCUBTqAwA%253D","CAMSAhACSOgCUBTqAwA%253D","CAMSAhACSPwCUBTqAwA%253D",
  "CAMSAhACSJADUBTqAwA%253D","CAMSAhACSKQDUBTqAwA%253D","CAMSAhACSLgDUBTqAwA%253D","CAMSAhACSMwDUBTqAwA%253D",
  "CAMSAhACSOADUBTqAwA%253D","CAMSAhACSPQDUBTqAwA%253D","CAMSAhACSIgEUBTqAwA%253D","CAMSAhACSJwEUBTqAwA%253D");
$cu=count($sp);
		for($i=0;$i<$cu;$i++)
		{
        $url="https://www.youtube.com/results?sp=".$sp[$i]."&q=".$search; 
        $html = new DOMDocument();
		    @$html->loadHtmlFile($url);
        $xpath = new DOMXPath( $html );
        $nodelist = $xpath->query("//a[@dir='ltr']");
        foreach ($nodelist as $chid)
			    {
				    $chlid=$chid->getAttribute('data-ytid');
				    $chname=$chid->getAttribute('title');
		          if($chlid){
                echo "<tr>";
				        echo "<td>".$chname."</td>";
				        echo  "<td>".$chlid."</td>";
				        echo "</tr>";
			    }
    }
	
	}	
			
}
?>
</tbody>
</table>
</section>
</div>
</div>
</body>
</html>