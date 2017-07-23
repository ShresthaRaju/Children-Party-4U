<?php 

$server="localhost";
$hostname="root";
$hostpassword="";

//establishing connection with the server
$connect=mysqli_connect($server,$hostname,$hostpassword) or die("Failed to establish connection...".mysqli_connect_error());

//creating database
$createDb="Create Database children_party4u";
$result=mysqli_query($connect,$createDb);
if ($result) {
	echo "Database created successfully ...";
}
else{
	echo "Error creating the database...";
}

//selecting the database
mysqli_select_db($connect,"children_party4u");

$query=array();

//creating table tbl_user with a admin
$query[1]="CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `date_of_birth` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

$query[2]="INSERT INTO `tbl_users` (`user_id`, `first_name`, `last_name`, `gender`, `date_of_birth`, `email`, `username`, `password`, `usertype`) VALUES
(1, 'Rajinda', 'Rajinda', 'Female', '1990-01-01', 'rajinda@gmail.com', 'rajinda', 'rajinda', 'Admin');";

$query[3]="ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);
";

$query[4]="ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
";

//creating table tbl_parties
$query[5]="CREATE TABLE `tbl_parties` (
  `party_id` int(11) NOT NULL,
  `party_type` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `cost_per_child` double NOT NULL,
  `length` int(11) NOT NULL,
  `max_children` int(11) NOT NULL,
  `services` text NOT NULL,
  `image_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
";

$query[6]="INSERT INTO `tbl_parties` (`party_id`, `party_type`, `description`, `cost_per_child`, `length`, `max_children`, `services`, `image_name`) VALUES
(1, 'Pirate', 'This will be a pirate themed party and will include relevant decorations.\r\n', 15, 90, 30, 'Pirate costumers and face painting.', 'admin-pirate.png'),
(2, 'Build a Bear', 'This party will show the children how to make their own bear which they will keep at the end of the party.\r\n', 30, 120, 10, 'Each child will keep the bear they have made. Optional costumes can be purchased for an additional charge.', 'admin-bears.jpeg'),
(3, 'Star Wars', 'This party will have a Star Wars theme.\r\n', 15, 90, 15, 'Each child will receive a StarWars gift as their party prize.', 'admin-starwars.jpg');";

$query[7]="ALTER TABLE `tbl_parties`
  ADD PRIMARY KEY (`party_id`);";

$query[8]="ALTER TABLE `tbl_parties`
  MODIFY `party_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;";

//creating table tbl_booking

$query[9]="CREATE TABLE `tbl_booking` (
  `booking_id` int(11) NOT NULL,
  `party_type` int(11) NOT NULL,
  `cost_per_child` double NOT NULL,
  `booked_date` date NOT NULL,
  `total_children` int(11) NOT NULL,
  `total_cost` double NOT NULL,
  `booked_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
";

$query[10]="ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `party_type` (`party_type`),
  ADD KEY `user_id` (`booked_by`);";

$query[11]="ALTER TABLE `tbl_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT;";

$query[12]="ALTER TABLE `tbl_booking`
  ADD CONSTRAINT `tbl_booking_ibfk_1` FOREIGN KEY (`party_type`) REFERENCES `tbl_parties` (`party_id`),
  ADD CONSTRAINT `tbl_booking_ibfk_2` FOREIGN KEY (`booked_by`) REFERENCES `tbl_users` (`user_id`);";


for ($i=1; $i <=12 ; $i++) { 
	$query_result=mysqli_query($connect,$query[$i]);
}
if ($query_result) {
	echo "<br/><br/>";
	echo "All the tables were created successfully...";
}

mysqli_close($connect);
 ?>