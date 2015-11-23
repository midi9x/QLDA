<table width="215" border="0" cellspacing="0" cellpadding="0">
  
  <tr>
  	<td height="30" class="menu" >
      <strong>NHÓM HÀNG</strong></td>
  </tr>
  <tr>
   <td height="60" style="padding-left:20px">
  <div align="left">
   <img src="/images/orange-circle-list.png" style="margin: 2px 4px;"> <a href="../admin/?m=mn&page=them-nhom-hang" class="admin-menu-left"> Thêm nhóm hàng</a> 
   	<div style="height:10px"></div>
   <img src="/images/orange-circle-list.png" style="margin: 2px 4px;"> <a href="../admin/?m=mn&page=ds-nhom-hang" class="admin-menu-left"> Danh sách nhóm hàng</a>
	</div>
    </td>
  </tr>
    <tr>
  	<td class="menu"  height="30">
      <strong> LOẠI HÀNG</strong></td>
  </tr>
  <tr>
   <td height="50" style="padding-left:20px">
  <div align="left">
   <img src="/images/orange-circle-list.png" style="margin: 2px 4px;"> <a href="../admin/?m=mn&page=them-loai-hang" class="admin-menu-left"> Thêm loại hàng</a> 
   	<div style="height:10px"></div>
   <img src="/images/orange-circle-list.png" style="margin: 2px 4px;"> <a href="../admin/?m=mn&page=ds-loai-hang" class="admin-menu-left"> Danh sách loại hàng</a>
	</div>
    </td>
  </tr> 
   <tr>
   <td class="menu" style="padding-left:20px" height="25"><strong>LOẠI HÀNG  THEO NHÓM</strong></td>
   </tr>
  <tr> 
	<td>  
    <?php
    $sql3=mysql_query("select * from nhomhang");
	while($r3=mysql_fetch_array($sql3))
	{
		$tennhom=$r3["tennhom"];$id_nhom=$r3["id_nhom"];
		echo "<tr><td>
		<div style=\"padding-left:20px;\">
		<table border=0 cellspacing=0 cellpadding=0 >
		<tr><td height=30px width=100%>	
		<img src=\"/images/orange-circle-list.png\" style=\"margin: 2px 4px;\"/> <a href='../admin/?m=mn&page=get-ds-loaihang&idn=$id_nhom'>$tennhom</a>
		</td></tr>		
		</table>
		</div></td></tr>";	
	}
	?>
    </td>
  </tr>
</table>