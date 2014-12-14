<?php 
	$file=fopen("demo.nam","r");
	$function=array("hienthi");
	$code=array();
	$i=0;
	function goiham($ham,$result){
			if($ham=="hienthi"){
				$ketqua=$result[2][0];
			}
			else $ketqua="không có hàm $ham bạn ơi thật ngại quá";
			$file=fopen("result.php","w");
				fwrite($file,$ketqua);
				fclose($file);
		}
	while(!feof($file)) {
			$code[$i]=fgets($file);
			$i++;
		}
	if(trim($code[0])=="<*nam" && trim($code[2])=="*>"){
		fclose($file);
		$parent="/(.*)\('(.*)'\)/U";
		preg_match_all($parent,$code[1],$result);
		foreach($function as $key){
			if($key==trim($result[1][0])){
				goiham(trim($result[1][0]),$result);
			}
			else {echo "hàm <b>".trim($result[1][0])."</b> admin chưa thêm mong bạn thông cảm";}
		}
	}
	else echo "sai tab mở đầu file rồi bạn ơi";
?>
