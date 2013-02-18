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
// checks for null input
	if (($_POST[context] == "" || $_POST[context] == "0") || ($_POST[target] == "" || $_POST[target] == "0")) {
// null input error handling
		echo "<font color=\"#FF0000\"><h4>Oops, you seem to be missing something!</h4><h4>Please enter non-zero decimal values for \"target\" and \"context,\"  then click \"Calculate\" to try again...</h4></font>";
		$target = "";
		$context = "";
		$result = "";
// default output units (radio button) form code block
		$unit_select = "<input type=\"radio\" name=\"unit\" value=\"em\" checked>em<br /><input type=\"radio\" name=\"unit\" value=\"%\">percent<br /><br />";
	} else { 
// sets value of target and context variables from HTTP POST
		$target = $_POST[target];
		$context = $_POST[context];		
// input validity check, ensuring a numeric value was entered in each input field
		if (is_numeric($target) && is_numeric($context)){
			if ($_POST[unit] == "em"){
// calculates result in em
				$result = $target / $context;
				$result .= "em";
// creates radio button form code block based on checked "unit" value from HTTP POST
				$unit_select = "<input type=\"radio\" name=\"unit\" value=\"em\" checked>em<br /><input type=\"radio\" name=\"unit\" value=\"%\">percent";
			} else {
// calculates result in percent value
				$result = (($target / $context) * 100);
				$result .= "%";
// creates radio button form code block based on checked "unit" value from HTTP POST
				$unit_select = "<input type=\"radio\" name=\"unit\" value=\"em\">em<br /><input type=\"radio\" name=\"unit\" value=\"%\" checked>percent";
			}
		} else {
// non-numeric input error handling
			$target = "";
			$context = "";
			$result = "";
			echo "<font color=\"#FF0000\"><h4>Please enter only numeric values!</h4></font>";
		}	
	}
// displays form code along with the formatted output of the calculation
	echo "<form method=\"POST\" action=\"$_SERVER[PHP_SELF]\">Target Value (px):<br /><input name=\"target\" type=\"text\" width=\"10\" value=".$target."><br /><br />Context Value (px):<br /><input name=\"context\" type=\"text\" width=\"10\" value=".$context."><br /><br /><b>Output Options:</b><br />".$unit_select."<br /><br /><input type=\"submit\" value=\"Calculate\"><input type=\"reset\" value=\"Reset\"></form><br /><b>Output: </b>".$result;
?>
	</body>
</html>
