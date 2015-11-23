<?php
	$timkiem=$_GET["text_content"];	
?>


<?php
	$sql="select count(*) FROM hang WHERE hinhanh like '%".$timkiem."%' OR tenhang like '%".$timkiem."%' OR mota like '%".$timkiem."%'";	
	$kq=mysql_query($sql);
	//xac dinh so trang		
	$r=mysql_fetch_array($kq);		
	$numrow=$r[0];	
	//so reco cho 1 trang
	$pagesize=10;
	//tinh tong so trang
	$pagecount=ceil($numrow/$pagesize);
	//xac dinh so trang cho moi lan hien thi	
	if($pagecount>3||$pagecount==0) $segsize=3; else $segsize=$pagecount;
	//thiet lap trang hien hanh
	if(!isset($_GET["page"]))
		 $curpage=1;
	else	
		 $curpage=$_GET["page"];
	if($curpage<1)
		 $curpage=1;
	if($curpage>$pagecount) $curpage=$pagecount;
	//xac dinh so phan doan cua trang
	$numseg=($pagecount % $segsize==0)?($pagecount/$segsize):(int)($pagecount/$segsize)+1;
	//xac dinh phan doan hien hanh cua trang
	$curseg=($curpage % $segsize==0)?($curpage/$segsize):(int)($curpage/$segsize)+1; 	
?>
	
		<link rel="stylesheet" type="text/css" href="css/home-category.css" />
			<div class="full" id="home-category">
				<article class="wrap-home-category">
				<header class="title">
					<h3  class="title bold-font"><b> <a style="color:#fff;" href="/">KẾT QUẢ TÌM KIẾM VỚI TỪ KHÓA: <?php echo $timkiem; ?></a>   </b>
					</h3> 
				</header>
					<section class="home-category">
<?php
	include "connect.php";
	$sql2="select * from hang where hinhanh like '%".$timkiem."%' OR tenhang like '%".$timkiem."%' OR mota like '%".$timkiem."%' limit ".($curpage-1)*$pagesize.",$pagesize";
	$kq2=mysql_query($sql2);
	//$numrow2=mysql_num_rows($kq2);
	if(!$kq2)
	{
		echo "";
	}
	else
	{
		while($r2=mysql_fetch_array($kq2))
		{
			$id=$r2["id_hang"];
			$tensp=$r2["tenhang"];	
			$link=khongdau($tensp);
			$hinh=$r2["hinhanh"];		
			$gia=$r2["dongia"];
			if($gia==0) $s="(liên hệ)";
			else { $s=$gia; }
			?>
			


			<div class="box floatl">
						<p class="center">
							<a href="/san-pham/<?=$link;?>-<?=$id?>.html"><img src="/hinhanh/thumb/<?=$hinh?>" width="190" /></a>
						</p>
				<div class="info center">
					<p class="first-info">
						<a class="regular-font product-title" href="/san-pham/<?=$link;?>-<?=$id?>.html"><?=$tensp?></a>
						<span class="price bold-font"><b><?=$s?></b></span>
					</p>
				    <div class="regular-font more-info">
						<a href="/san-pham/<?=$link;?>-<?=$id?>.html" class="click-link"></a>
						<p class="sale"><s><?//=$s2?></s></p>
						<p class="description"><br />Giao hàng toàn quốc<br />Bảo hành từ 12 tháng
						</p>
						<a href="/index.php?page=gh&id=<?=$id?>&g=<?=$gia?>"><span class="vmz-add-to-cart pointer"></span>        </a>                        
					</div>
				</div>
			</div> 
			
			<?php
			
		}
	}
?>
				
<div class="clear"></div>
<?php	
	if($numrow==0)
		echo "<div align=\"center\">Không có sản phẩm nào phù hợp với từ khóa: $timkiem</div>";
	else{
		echo "<div align=center>Số trang :&nbsp;";
		$tk=$_REQUEST["text_content"];
		if($curseg>1)
			echo "<a href='/?page=tim-kiem&text_content=$tk&page=".(($curseg-1)*$segsize)."'><b>Previous</b></a> &nbsp;&nbsp;&nbsp;";
			$n=$curseg*$segsize<=$pagecount?$curseg*$segsize:$pagecount;
			for($i=($curseg-1)*$segsize+1;$i<=$n;$i++)
			{
				if($curpage==$i)
					echo "<a href='/?page=tim-kiem&text_content=$tk&page=".$i."'><font color='#0000FF'>[".$i."]</font></a> &nbsp;&nbsp;&nbsp;";
				else
					echo "<a href='/?page=tim-kiem&text_content=$tk&page=".$i."'>[".$i."]</a> &nbsp;&nbsp;&nbsp;";
			}
		if($curseg<$numseg)
			echo "<a href='/?page=tim-kiem&text_content=$tk&page=".(($curseg*$segsize)+1)."'><b>Next</b></a> &nbsp;&nbsp;&nbsp;";		
			echo "<br>Bạn đang ở trang: $curpage / $pagecount</div>";					
	}
?></section>
		</article>
	</div>
	 <div class="clear"></div>		