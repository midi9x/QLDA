<?php
	$idl=$_GET["idl"];
	$sql="select loaihang.*,nhomhang.* from loaihang,nhomhang where loaihang.id_nhom=nhomhang.id_nhom AND loaihang.id_loai=$idl";
	$kq=mysql_query($sql);
	$r=mysql_fetch_array($kq);
	$id_nhom=$r["id_nhom"];$tennhom=$r["tennhom"];
	$id_loai=$r["id_loai"];$tenloaisp=$r["tenloaisp"];
?>	

<div style="margin-top:-10px;"></div>

<link rel="stylesheet" type="text/css" href="/css/home-category.css" />
<link rel="stylesheet" type="text/css" href="/css/category.css" />
<div class="full" id="home-category">
	<article class="wrap-home-category">
		<header class="title">
			<h3  class="title bold-font"><b> <a style="color:#fff;" href="/nhom-san-pham/<?=khongdau($tennhom)?>-<?php echo $id_nhom; ?>.html"><?php echo "$tennhom"; ?></a>   »   <a style="color:#fff;" href="/loai-san-pham/<?=khongdau($tenloaisp)?>-<?php echo $id_loai; ?>.html"><?php echo "$tenloaisp"; ?></a>   </b></h3> 
		</header>
		<section class="home-category">
		<?php     
		//Xác định tổng số bài viết
		$kq=mysql_query("select count(*) from hang where id_loai=$id_loai "); 	
        $r=mysql_fetch_array($kq);
        $numrow=$r[0];		
        //số sản phẩm được hiển thị trên mộ trang cho 1 trang
        $pagesize=10;
        //Tính tổng số trang
        $pagecount=ceil($numrow/$pagesize);			
        //Xác định số trang cho mỗi lần hiển thị
        $segsize=3;
        //Thiết lập trang hiện hành
        if(!isset($_GET["page"]))
			 $curpage=1;
        else	
        	 $curpage=$_GET["page"];
        if($curpage<1)
			 $curpage=1;
        if($curpage>$pagecount) $curpage=$pagecount;
        //Xác định số phân đoạn của trang
        $numseg=($pagecount % $segsize==0)?($pagecount/$segsize):(int)($pagecount/$segsize+1);
        //Xác định phân đoạn hiện hành của trang
        $curseg=($curpage % $segsize==0)?($curpage/$segsize):(int)($curpage/$segsize+1);   
		$k=($curpage-1)*$pagesize;
		
		//******************************** Nội Dung ***********************************************//
		$sql3="select * from hang where id_loai=$id_loai  limit $k,$pagesize";		
	
		$kq3=mysql_query($sql3);
		if(!$kq3)
			echo "";
		else
				while($r3=mysql_fetch_array($kq3))
				{
					$id=$r3["id_hang"];$tensp=$r3["tenhang"];$link=khongdau($tensp);$hinh=$r3["hinhanh"];$ghichu=$r3["ghichu"];
					$gia=$r3["dongia"];$gia2=number_format($gia,0,'','.');
					if( $gia==0) $s="(liên hệ)";	else { $s=$gia2." VND"; }			
					$giacu=$gia+250000;$giacu2=number_format($giacu,0,'','.');
					$s2=$giacu2." VND";	
					
				
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
						<p class="sale"><s><?=$s2?></s></p>
						<p class="description"><br />Giao hàng toàn quốc<br />Bảo hành từ 12 tháng
						</p>
						<a href="/index.php?page=gh&id=<?=$id?>&g=<?=$gia?>"><span class="vmz-add-to-cart pointer"></span>        </a>                        
					</div>
				</div>
			</div>     

		<?php } ?>
		</section>
	</article>
	 <div class="clear"></div>
	 </div>
	 
	 
	
<?php
//*******************************Xuất số trang*******************************************
	echo "<span class='center wp-pagenavi'>";
	if($numrow==0)
		echo "<script>alert('Dòng sản phẩm này đang được cập nhật');window.location='index.php';</script>";
	else{
    
    if($curseg>1)
        echo "<a class='page-numbers' href='?page=lsp&idl=$id_loai&page=".(($curseg-1)*$segsize)."'><b> Trang trước</b></a> &nbsp;";
        $n=$curseg*$segsize<=$pagecount?$curseg*$segsize:$pagecount;
        for($i=($curseg-1)*$segsize+1;$i<=$n;$i++)
		{
			if($curpage==$i)
				echo "<a class='page-numbers' href='?page=lsp&idl=$id_loai&page=".$i."'><font color='#0000FF'>[".$i."]</font></a> &nbsp;";
			else
				echo "<a class='page-numbers' href='?page=lsp&idl=$id_loai&page=".$i."'>[".$i."]</a> &nbsp;";
		}
        if($curseg<$numseg)
		echo "<a class='next page-numbers'  href='?page=lsp&idl=$id_loai&page=".(($curseg*$segsize)+1)."'><b>Trang sau</b></a> &nbsp;";		
	}
	 echo '</span>	';
?>

