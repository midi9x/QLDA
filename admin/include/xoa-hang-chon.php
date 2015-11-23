<?php

	echo $ma=$_POST["chon"];
	$count=count($ma);	
	if($count=='')
		echo "<script>alert('Chưa chọn hàng cần xóa!!!');window.history.go(-1);</script>";
	else
	{	
			for($i=0;$i<$count;$i++){
			echo "<script>window.confirm('Bạn chắc chắn muốn xóa sản phẩm này');</script> ";

			$sql3="Delete from hang where id_hang='$ma[$i]'";			
			$kq3=mysql_query($sql3);				
			if(!$kq3)
				echo "<script>alert('Có lỗi trong khi xóa!!!');</script>";
			else
			{
				$n+=mysql_affected_rows();
				
			}			
			}
			echo "<script>alert('Đã xóa $n sản phẩm!');window.location='../admin/?m=sp&page=ds-hang';</script>";
			//echo "$sql3";
		
	}

?>