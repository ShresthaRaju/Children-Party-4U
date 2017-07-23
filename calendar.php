<!--<?php //if (!isset($_SESSION['Admin']) || !isset($_SESSION['standard'])){
	//header("location:index.php?notloggedin=login first");} ?>-->
<?php 
function makeCalendar(){
$dates = time () ; 

if (isset($_GET['day'])) {
	$day =$_GET['day'];
}else{
	$day = date('d', $dates) ;

}
if (isset($_GET['month'])) {
	$month=$_GET['month'];
}else{
	$month = date('m', $dates) ;
}
if (isset($_GET['year'])) {
	$year=$_GET['year'];
}else{
	$year = date('Y', $dates) ;
}

$first_day = mktime(0,0,0,$month, 1, $year) ;

$title = date('F', $first_day) ;
 
$day_of_week = date('D', $first_day) ; 

switch($day_of_week)
{ 
case "Sun": $blank = 0; break; 
case "Mon": $blank = 1; break; 
case "Tue": $blank = 2; break; 
case "Wed": $blank = 3; break; 
case "Thu": $blank = 4; break; 
case "Fri": $blank = 5; break; 
case "Sat": $blank = 6; break; 
 }

$days_in_month = cal_days_in_month(0, $month, $year) ;
echo "<div class='col-md-5'>";
echo "<div class='panel panel-warning'>";
echo "<div class='panel-heading'>Dates</div>";
echo "<div class='panel-body'>";
echo "<div class='table-responsive'>";
echo "<table class='table table-hover'>";
echo "<tr>
		<td><button type='button' class='btn btn-link' onclick='previousMonth($month,$year)'><i class='fa fa-chevron-left'></button></td>
		<td colspan=5 style='text-align:center;font-size:22px;'> $title $year </td>
		<td><button type='button' class='btn btn-link' onclick='nextMonth($month,$year)'><i class='fa fa-chevron-right'></button></td>
	</tr>";

echo "<tr style='background:#999; color:#fff'>
		<td>Sun</td><td>Mon</td><td>Tue</td>
		<td>Wed</td><td>Thu</td><td>Fri</td>
		<td>Sat</td>
	</tr>";
 $day_count = 1;

 echo "<tr>";

 while ( $blank > 0 ) 
 { 
 echo "<td></td>"; 
 $blank = $blank-1; 
 $day_count++;
 } 
 
$day_num = 1;

while ( $day_num <= $days_in_month ) 

{ 

$todays= $year. "-"  . $month. "-". $day_num;

include("config.php");
$query=mysqli_query($connect,"select * from tbl_booking where booked_date='$todays'");

$row=mysqli_num_rows($query);
if($row>0){
	$result=mysqli_fetch_array($query);
	echo "<td style='background:#5bc0de;color:#fff'>$day_num</td>"; 
}
else{
echo "<td>  $day_num </td>"; 
}
$day_num++; 
$day_count++;

if ($day_count > 7)

{
echo "</tr><tr>";
$day_count = 1;
}

}
while ( $day_count >1 && $day_count <=7 ) 
{ 
echo "<td> </td>"; 
$day_count++; 
} 

echo "</tr></table>"; 
echo "</div>";
echo "</div>";
echo "<div class='panel-footer'>
		<div style='height: 20px;width:20px;background: #5bc0de;float: left'></div>&nbsp;
			Booked Date
	</div>";
echo "</div>";
echo "</div>";
}

makeCalendar();
?>

<script type="text/javascript">
		function previousMonth(month, year){
			if (month==1) {
				--year;
				month=12;
			}
			document.location.href="<?php $_SERVER['PHP_SELF'];?>?month="+(month-1)+"&year="+year;
		}

		function nextMonth(month, year){
			if (month==12) {
				++year;
				month=0;
			}
			document.location.href="<?php $_SERVER['PHP_SELF'];?>?month="+(month+1)+"&year="+year;
		}
	</script>

