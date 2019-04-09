<?php
	$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
  
  mysqli_select_db($con,"Instagram")or
    die("Could not select db: " . mysql_error());
    //echo "hey";
	if(isset($_POST["query"])){
		//$output[] = array("label"=>"he");
		$output = array();
		$query = $_POST["query"];
		if($query[0]!="#"){
			$query = "SELECT * from user_info where username like '%". $_POST["query"] ."%'"; 
			$result = mysqli_query($con,$query);
			if(mysqli_num_rows($result)>0){
				while($row = mysqli_fetch_array($result)){
					$output[] = array("label"=>$row["username"]);

				}
			}
			
		}else{
			$sql = "SELECT * from post";
			$result = mysqli_query($con,$sql);
			if(mysqli_num_rows($result)>0){
				while($row = mysqli_fetch_array($result)){
					$tagnameArray = explode(' ',$row['description']);
					for($j=0;$j<sizeof($tagnameArray);$j++){
						if(stripos($tagnameArray[$j],$query)!==FALSE){
							$output[] = array("label"=>$tagnameArray[$j]);
						}
					}
				}
			}
		}
		//$ans = array_unique($output);
		function unique_multidim_array($array, $key) { 
		    $temp_array = array(); 
		    $i = 0; 
		    $key_array = array(); 
		    
		    foreach($array as $val) { 
		        if (!in_array($val[$key], $key_array)) { 
		            $key_array[$i] = $val[$key]; 
		            $temp_array[$i] = $val; 
		        } 
		        $i++; 
		    } 
		    return $temp_array; 
		} 
		$ans = unique_multidim_array($output,"label");
		echo json_encode($ans); 
	}
?>