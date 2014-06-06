
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<title>Responsive Demonstration</title>
	<link rel="stylesheet" type="text/css" href="csstype/index.css">
</head>
<body>
		<?php

$koneksi=mysqli_connect("localhost","root","","administrator");

  $posisi=isset($_GET['posisi'])? ($_GET['posisi']):'';
  $batas=isset ($_GET['batas'])? ($_GET['batas']):'';

    
  $batasan=5;
  if (isset ($_GET['batas'])){
    $batas=$_GET['batas'];
  }else{
    $batas=$batasan;
  }
  
  if (isset ($_GET['halaman'])){
    $halaman=$_GET['halaman'];
  }
  if (EMPTY($halaman)){
    $posisi=0;
    $halaman=1;
  }else{
    $posisi=intval(($halaman-1)*$batas);
  }
  
  if (EMPTY($batas)){
  $batas=intval($batasan);
  }else{
    $batas=intval($batas);
  }
  

//query satu untuk hitung table tulisan
  $sql=("select id from tulisan");
  $query = mysqli_query($koneksi,$sql);
  $jumlah = mysqli_num_rows($query);
  $jumlahlink= round ($jumlah/$batas);
  
  //echo "$jumlah";
  echo "<br/>";
  //echo "$jumlahlink";
  echo "<br/>";
  echo "<body bgcolor='aliceblue'>";
?>
  <div id="header">

</div>

  
		<div id="navigation">
			<ul>
      		<li class="active"><img src="avatar2.jpg" /></a></li>
			<li class="mode2"><img src="avatar2.jpg" /></a></li>
			<li class="mode2"><img src="news.png" /></a></li>
			<li class="mode2"><img src="message.png" /></a></li>
			<li class="mode2"><img src="avatar2.jpg" /></a></li>     
        <li>
      <select>
				<option value="Home">Home</option>
				<option value="Blog">Blog</option>
				<option value="Arsip">Arsip</option>
				<option value="About">About</option>
				<option value="Contact">Contact</option>
			</select>
  </div>

	<div id="wrapper">



    <div id="sidebar">
	<?php
  
  $display=mysqli_query($koneksi,"SELECT * FROM tulisan ORDER BY id asc LIMIT $posisi,$batas");
  
  $no=$posisi+1;
  
  while ($row = mysqli_fetch_array($display)){

 echo "<div class='artikel'>";
                        //echo $row ['id'];
                        
                        //echo $row['kategori'];
  echo "<img src=''/>";                    
  echo $row['gambar'];
  
  echo "<p align='left'>";
  echo '<h3>';
  echo $row ['judul'];
  echo '</h3>';
  echo "</p>";   
  
  //                      echo $row ['media'];

  echo "<i>";
  echo $row ['hit'];
  
  echo $row ['tanggal'];
 
  echo $cuplik_isi = substr ($row['isi'],0,150);
  echo $cuplik_isi = substr ($row['isi'],0,strpos($cuplik_isi," "));
  
  echo "$cuplik_isi";
//  echo "&nbsp<a href=artikel1.php?id=$row[id]>Baca Selengkapnya</a>";   
 echo "</p>";
 echo "</p>";
 echo "<hr>";
 echo "<div class='artik'>";
	echo "<img src='' ></img>";
 	echo "<textarea cols='56' rows='2'></textarea>";
              if ($no%2==0){
               }
                $no++;
echo "</div>";
                        //echo $row ['tag'];
                        
                        
 echo "</div>";              
}
echo "<p>";  
echo "<br>";
echo "<br>";

if($halaman > 1){
  $previous=$halaman-1;
  echo "<a href=?halaman=1&batas=$batas> << PERTAMA </a> | <a href=?halaman=$previous&batas=$batas> < Sebelumnya</a> |";
        }
  else{
  echo "<< Pertama | Sebelumnya |";
}
//kondisi untuk ternari
$angka= ($halaman >3?"...":" ");

for($i=$halaman-2; $i<$halaman; $i++){
  if($i<1)
    CONTINUE;
    $angka.="<a href=?halaman=$i&batas=$batas>$i</a>";
  }
    $angka.="$halaman";
    
for($i = $halaman+1; $i<($halaman+2); $i++){
  if ($i > $jumlahlink)
  BREAK;
  $angka.="<a href=?halaman=$i&batas=$batas>$i</a>";
}

 $angka.=($halaman + 2 < $jumlahlink?"...<a href=?halaman=$jumlahlink&batas=$batas>$jumlahlink </a>" : " ");
 echo $angka;

if ($halaman < $jumlahlink){
  $next=$halaman+1;
  echo "<a href=?halaman=$next&batas=$batas > berikutnya></a> | 
      <a href=?halaman=$jumlahlink&batas=$batas> Akhir >></a>";
}else{  
  echo "<b><font color='#660033'> Berikutnya > | Terakhir >> </font></b>";
}
  echo "<br><font color='#660033'> jumlah tulisan dalam kategori ini : $jumlahlink</font>";

  mysqli_close($koneksi);

?>
 
		</div>
		<div id="content">

    
 
</div>
       
		<div class="clear"></div>
 </div>

		<div class="footer">
			<p align="center">
				copyright © 2011 by</p>
        <img src="logo-ft.png" /> 
 
</div>
	
	
	<div class="clear"></div>
</body>
</html>
