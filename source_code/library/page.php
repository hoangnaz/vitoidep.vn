<style>

.div_phan_trang
{
	width:100%;
	margin:auto;
	text-align:center;
}
.div_trang
{
	width:30px;
	padding:5px 10px 5px 10px;
	text-align:center;
	background: #d9edf7;
	margin:2px;
}
.div_trang a
{
	text-decoration:none;
	color:#FFF;
	font-size:14px;

}

</style>
<?php
class pagination
{
	function findStart($limit)
	{
		if ((!isset($_GET['page'])) || ($_GET['page'] == "1"))
		{
			$start = 0;
			$_GET['page'] = 1;
		}
		else
		{
			$start = ($_GET['page']-1) * $limit;
		}
		
		return $start;
	}
	function findPages($count, $limit)
	{
		$pages = (($count % $limit) == 0) ? $count / $limit : floor($count / $limit) + 1;
		return $pages;
	}

	

	function pageList($curpage, $pages,$param2,$param="")
	{
		$page_list="";
			if(($curpage!=1)&&($curpage))
			{
				$page_list.='<span class="div_trang">'."<a href =\"".$_SERVER['PHP_SELF']."?chuyen_muc=$param2&page=1$param\" title=\"Trang đầu\">Trang đầu</a></span>";
			}
			if(($curpage-1)>0)
			{
				$page_list.='<span class="div_trang">'."<a href =\"".$_SERVER['PHP_SELF']."?chuyen_muc=$param2&page=".($curpage-1)."$param\" title=\"Về trang trước\"><<</a></span>";
			}
			/*if($curpage>2)
				$page_list.="...";*/
			$vtdau=max($curpage-2,1);
			$vtcuoi=min($curpage+2,$pages);
			
				for($i=$vtdau;$i<=$vtcuoi;$i++)
				{
					if($i==$curpage)
					{
						$page_list.='<span class="div_trang">'."<b>".$i."</b></span>";
					}
					else
					{
						$page_list.='<span class="div_trang">'."<a href ='".$_SERVER['PHP_SELF']."?chuyen_muc=$param2&page=".$i."$param' title='Trang ".$i."'>".$i."</a></span>";
					}
				}

			/*if(($curpage+2)<$pages)
				$page_list.="...";*/

			
			if(($curpage+1)<=$pages)
			{
				$page_list.='<span class="div_trang">'."<a href =\"".$_SERVER['PHP_SELF']."?chuyen_muc=$param2&page=".($curpage+1)."$param\" title=\"Đến trang sau\"> >> </a></span>";
				$page_list.='<span class="div_trang">'."<a href =\"".$_SERVER['PHP_SELF']."?chuyen_muc=$param2&page=".$pages."$param\" title=\"Đến trang cuối\"> Trang cuối </a></span>";
			}
			return $page_list;
	}

	function nextPrev($curpage,$pages)//chỉ hiển thị 2 nút Truoc và Sau
		{
			$next_prev="";
			if(($curpage-1)<=0)
			{
				$next_prev.="Về trang trước";
			}
			else
			{
				$next_prev.="<a href =\"".$_SERVER['PHP_SELF']."?page=".($curpage-1)."\">Về trang trước</a>";
			}
			$next_prev.=" | ";
			if(($curpage+1)>$pages)
			{
				$next_prev.="Đến trang sau";
			}
			else
			{
				$next_prev.="<a href =\"".$_SERVER['PHP_SELF']."?page=".($curpage+1)."\">Đến trang sau</a>";
			}
			return $next_prev;
		}
}
?>