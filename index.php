<!--Copyright 2019 Neil Brown

Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met:

1. Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.

2. Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
-->

<?php

$finalnumber="";

$landline = array ("113 496 0", "114 496 0", "115 496 0", "116 496 0", "117 496 0", "118 496 0", "121 496 0", "131 496 0", "141 496 0", "151 496 0", "161 496 0", "20 7946 0", "191 498 0", "28 9649 6", "29 2018 0", "1632 960");


$mobile	= "7700 900";
$freephone = "8081 570";
$premium = "909 8790";
$ukwide = "3069 990";

if(isset($_POST['SubmitButton'])){ //check if form was submitted

$type = $_POST['type'];
if ($type == "mobile") {
	$region_number = $mobile;
} else if ($type == "freephone") {
	$region_number = $freephone;
} else if ($type == "premium") {
	$region_number = $premium;
} else if ($type == "ukwide") {
	$region_number = $ukwide;
} else {

	$region = $_POST['region'];
		if ($region == "donotcare") {
			$region_rand = rand(0,11);
			$region_number=$landline[$region_rand];
		} else {
				$region_number = $landline[$region];
		}

}

$extension=rand(100,999);


$finalnumber_IDC = "+44 " . $region_number . $extension;
$finalnumber_noIDC = "0" . $region_number . $extension;
$finalnumber_invalid = "+44(0)" . $region_number . $extension;
} 
?>



<form action="" method="post">

<html>
  <head>
	<title>Ofcom number generator</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="description" content="Ofcom number generator">
<meta name="format-detection" content="telephone=no" />


</head>
<body>

  <fieldset>
    <legend><h1>UK phone number generator</h1></legend>


<p>
Generate a random UK phone number from  <a href="https://www.ofcom.org.uk/phones-telecoms-and-internet/information-for-industry/numbering/numbers-for-drama">Ofcom's "TV and drama" range</a>.
</p>


<h2>Type</h2>

<input type="radio" name="type" value="landline" checked> Landline<br>
<input type="radio" name="type" value="mobile" > Mobile<br>
<input type="radio" name="type" value="freephone"> Freephone<br>
<input type="radio" name="type" value="premium" > Premium rate services<br>
<input type="radio" name="type" value="ukwide"> UK-wide<br>
<p>
             <label><h2>Region</h2></label>
<p>(only relevant if you select "landline" above)</p>
             <select name = "region">
               <option value = "donotcare">Don't care</option>
               <option value = "0">Leeds</option>
               <option value = "1">Sheffield</option>
               <option value = "2">Nottingham</option>
               <option value = "3">Leicester</option>
               <option value = "4">Bristol</option>
               <option value = "5">Reading</option>
               <option value = "6">Birmingham</option>
               <option value = "7">Edinburgh</option>
               <option value = "8">Glasgow</option>
               <option value = "9">Liverpool</option>
               <option value = "10">Manchester</option>
               <option value = "11">London</option>
               <option value = "12">Tyneside/Durham/Sunderland</option>
               <option value = "13">Northern Ireland</option>
               <option value = "14">Cardiff</option>
               <option value = "15">No area</option>
             </select>
          </p>

<input type="submit" name="SubmitButton" value="Generate my number"/>


</fieldset>
</form>

<h1>Your random number:</h1><p>
	<ul>
	<li><?php echo $finalnumber_IDC; ?> (international)</li>
	<li><?php echo $finalnumber_noIDC; ?> (national only)</li>
	<li><?php echo $finalnumber_invalid; ?> (invalid / non-diallable)</li>
	</ul>
