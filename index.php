<!-- Latest compiled and minified CSS & JS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<script src="//code.jquery.com/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<style type="text/css">
.page{
	background-color: #705d5d;
	color:white;
	margin-top: 20px;
	padding: 20px;
}
.submtbtn{
	background-color: #ffdc19;
	color:black;
	font-size: 1.5em;
	padding: 5px 30px;
	transition: 0.5s;
}
.submtbtn:hover{
	background-color: #ffc519;
	color:black;
	padding: 5px 35px;
}
.coloroftext{
	color:#FFC600;
}
</style>
<div class="row">
	<div class="col-lg-2"></div>
	<div class="col-lg-8 page">
		<h1>Takes a country name to see a capital of the country.</h1>
		<form action="index.php" method="GET" role="form">
			<div class="form-group">
				<label for="">Country Name : </label>
				<input type="text" class="form-control" name="country" placeholder="Input Country Name" value="<?echo $_GET['country']; ?>" required>
			</div>
			<button type="submit" class="btn btn-primary submtbtn">Submit</button> <a href='index.php'><button type="" class="btn btn-primary submtbtn">Reset</button></a>
		</form>
		<?
if ($_GET['country'] != "") {
    $country = $_GET['country'];
    echo "<p><hr>";
    $url      = "https://restcountries.eu/rest/v2/name/" . $country;
    $response = file_get_contents($url);
    $response = json_decode($response);
    $response = $response[0];
    $country  = $response->name;
    if ($response->name != "") {
    	echo "<img src='$response->flag' width='20%' style='float: right'>";
        echo "<h3>Capital of $country is <b class='coloroftext'>$response->capital</b></h3>";
        echo "<p>Region of $country is <b class='coloroftext'>$response->region ($response->subregion)</b></p>";
        echo "<p>Native Name of $country is <b class='coloroftext'>$response->nativeName</b></p>";
    } else {
        echo "<h3>Not Found, Please try agian</h3>";
    }

}
?>
	</div>
	<div class="col-lg-2"></div>
</div>
