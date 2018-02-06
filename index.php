<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<script src="//code.jquery.com/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<script src="jquery.easy-autocomplete.min.js"></script>
<link rel="stylesheet" href="easy-autocomplete.min.css">
<style type="text/css">
body{
	font-family: 'Raleway', sans-serif;
}
.page{
	background-color: #705d5d;
	margin-top: 20px;
	padding: 20px;
	border-bottom:10px solid #a88b8c;
}
.submtbtn{
	background-color: #ffdc19;
	color:black;
	font-size: 1.2em;
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
.page h1,label,.colorinfo{
	color:white;
}
</style>
<body>
<div class="row">
	<div class="col-lg-2"></div>
	<div class="col-lg-8 page">
		<h1>Takes a country name to see a capital of the country.</h1>
		<form action="index.php" method="POST" role="form">
			<div class="form-group">
				<label for="">Country Name : </label>
				<input type="text" class="form-control" name="country" id="basics" placeholder="Input Country Name" value="<?echo $_POST['country']; ?>" required>
			</div>
			<button type="submit" class="btn btn-primary submtbtn"'>Submit</button>
		</form>
		<?
if ($_POST['country'] != "") {
    $country = $_POST['country'];
    $country = str_replace(' ', '', $country);
    echo "<p><hr>";
    $url      = "https://restcountries.eu/rest/v2/name/" . $country;
    $response = file_get_contents($url);
    $response = json_decode($response);
    // print_r($response); // ใช้ Array
    $response = $response[0];
    $country  = $response->name;
    if ($response->name != "") {
    	echo "<img src='$response->flag' width='20%' style='float: right'>";
        echo "<div class='colorinfo'><h3>Capital of $country is <b class='coloroftext'>$response->capital</b></h3>";
        echo "<p>Region of $country is <b class='coloroftext'>$response->region ($response->subregion)</b></p>";
        echo "<p>Native Name of $country is <b class='coloroftext'>$response->nativeName</b></p>
        <br><a href='index.php'><button class='btn btn-primary submtbtn'>Reset</button></a></div>";
    } else {
        echo "<div class='colorinfo'><h3>Not Found, Please try agian</h3></div>";
    }

}
?>
	</div>
	<div class="col-lg-2"></div>
</div>
</body>
<script type="text/javascript">
var options = {
	url: "countries.json",

	getValue: "name",

	list: {
		match: {
			enabled: true
		}
	}
};

$("#basics").easyAutocomplete(options);
// 5810450440
</script>