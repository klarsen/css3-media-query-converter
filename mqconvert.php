<html>
  <head><title>CSS3 Media Query Converter</title></head>
	<body>
		
	<!-- 
		 **** CSS3 Media Query Converter (Marcotte Calculator) **** 
		 
		 This tool allows for the easy calculation of css element sizes in 
		 em/percent by way of the Marcotte Formula (Target / Context = Result) 
		 
		 This is useful in the creation of "device independent" responsive 
		 design stylesheets and media queries. 
		 
		 **** Licensing ****
		 
		 Copyright Kevin Larsen, 2013 
		 
		 This program is free software: you can redistribute it and/or modify
		 it under the terms of the GNU General Public License as published by
		 the Free Software Foundation, either version 3 of the License, or
		 (at your option) any later version.

		 This program is distributed in the hope that it will be useful,
		 but WITHOUT ANY WARRANTY; without even the implied warranty of
		 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
		 GNU General Public License for more details.

		You should have received a copy of the GNU General Public License
		along with this program.  If not, see <http://www.gnu.org/licenses/>.
	-->
	
		<h1>CSS3 Media Query Converter</h1>
		<h4>(Marcotte Calculator)</h4>
<?php 	
	if (($_POST[context] == "" || $_POST[context] == "0") || ($_POST[target] == "" || $_POST[target] == "0")) {
		echo "<font color='#FF0000'><h4>Oops, you seem to be missing something!</h4><h4>Please enter non-zero decimal values for \"target\" and \"context,\"  then click \"Calculate\" to try again...</h4></font>";
		$target = "";
		$context = "";
		$result = "";
		$unit_select = "<input type='radio' name='unit' value='em' checked>em<br /><input type='radio' name='unit' value=\"%\">percent<br /><br />";
	} else { 
		$target = $_POST[target];
		$context = $_POST[context];	
		if (is_numeric($target) && is_numeric($context)){
			if ($_POST[unit] == "em"){
				$result = $target / $context;
				$result .= "em";
				$unit_select = "<input type='radio' name='unit' value='em' checked>em<br /><input type='radio' name='unit' value=\"%\">percent";
			} else {
				$result = (($target / $context) * 100);
				$result .= "%";
				$unit_select = "<input type='radio' name='unit' value='em'>em<br /><input type='radio' name='unit' value=\"%\" checked>percent";
			}
		} else {
			$target = "";
			$context = "";
			$result = "";
			echo "<font color='#FF0000'><h4>Aw snap, that ain't a number! Ain't nobody got time for that!</h4></font>";
		}	
	}
	
	$form = "<form method='POST' action=\"$_SERVER[PHP_SELF]\">Target Value (px):<br /><input name='target' type='text' width='10' value=".$target."><br /><br />Context Value (px):<br /><input name='context' type='text' width='10' value=".$context."><br /><br /><b>Output Options:</b><br />".$unit_select."<br /><br /><input type='submit' value='Calculate'><input type='reset' value='Reset'></form><br />";
	
	echo $form."<b>Output: </b>".$result;
?>
	</body>
</html>
