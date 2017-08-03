<?php 
	// search auctions by name
	class return_data{
		public $item_name;
		public $cost;
		public $img;
	}

	$search = mysqli_real_escape_string($db_connect, $_POST['search']);

	$sql = ""//get img item name and cost for search parameter
	$query = mysqli_query($db_connect, $sql);
	$num_rows = mysqli_num_rows($query);
	$item = [];
	if($num_rows > 0){
		while($row = mysqli_fetch_assoc($query)){
			$item_name = $row['name'];
			$cost = $row['cost'];
			$category = $img['img'];
			$search_params = new return_data;
			$search_params -> item_name = $item_name;
			$search_params -> cost = $cost;
			$search_params -> img = $img;
			array_push($item, $search_params);
		}
	}
	else{
		echo "none";
	}

	echo json_encode($item);
	exit();
?>