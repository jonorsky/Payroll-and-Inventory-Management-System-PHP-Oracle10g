<!DOCTYPE html>
<?php
  $conn = oci_connect('db2', 'project', 'localhost/XE');
  $search = "SELECT * from Subject order by SUBJ_CODE";
  $query = oci_parse($conn, $search);
  oci_execute($query);
?>

<?php
  $conn = oci_connect('db2', 'project', 'localhost/XE');
  $subjid2 = isset($_POST['updateSubjCode']) ? $_POST['updateSubjCode'] : ' ';
  $subjname2 = isset($_POST['updateSubjectName']) ? $_POST['updateSubjectName'] : ' ';
  $updateSub = "UPDATE SUBJECT set Subj_Code = '$subjid2', Subj_Name = '$subjname2' where Subj_Code = '$subjid2'";
  $Subjectquery = oci_parse($conn, $updateSub);
  oci_execute($Subjectquery);
?>
<html>
<head>
<meta charset="UTF-8">
<title>Automated Library System</title>
<meta name="description" content="Automated Library System">
<meta name="keywords" content="keyword1, keyword2, keyword3">
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>

<div id="wrapper"> 

  <div id="header"> 

    <div class="top_banner">
      <h1>Automated Library System</h1>
      <p><b><i>Online Library for Naga City Science High School</i></b></p>
    </div>

    <div class="navigation">
      <ul>
        <li><a href="HomeLoggedIn.php">Home</a></li>
        <li><a href="Records.php">Records</a></li>
		<li><a href="Editbook.php">Books</a></li>
		<li><a href="EditSubject.php">Subjects</a></li>
		<li><a href="EditBorrower.php">Borrowers</a></li>
		<li><a href="EditPublisher.php">Publisher</a></li>
		<li><a href="EditAuthor.php">Author</a></li>
		<li><a href="LogOut.php">Log Out</a></li>
      </ul>
    </div>

  </div>
  <div id="page_content"> 
    <div class="left_side_bar"> 
      <div class="col_1">
        <h1>Update Subject</h1>
        <div class="box">
        <form method ="post">
	  Subject Code<br>
	  <input type = "text" name = "updateSubjCode"><br>
	  
	  <hr>
	  Subject Name<br>
	  <input type = "text" name = "updateSubjectName"><br><br>
	  <center><input type="submit" value = "   Update   "></center><br><br>
	</form>
        </div>
      </div>
      
    </div>
    <div class="right_section">
      <div class="common_content">
        <center><h2>Search Subject</h2></center>
	<hr>
    <form method = "post"><center>
	  <table>
		<tr>
			<th>Subject Code / Name</th>
		</tr>
		<tr>
			<td><center><input type = "text" name = "searchKeyS"></center></td>
		</tr>
	  </table><br>
	  <input type="submit" value = "   Search   "><br>
	</center></form>
	<?php
     $conn = oci_connect('db2', 'project', 'localhost/XE');
     $id = isset($_POST['searchKeyS']) ? $_POST['searchKeyS'] : ' ';
     $searchB = "select * from Subject where Subj_Code = '$id' or Subj_Name = '$id'";
     $querySearch = oci_parse($conn, $searchB);
     oci_execute($querySearch);
     echo "<table>";
     echo "<tr>";
     echo "<td>SUBJ_CODE</td>";
     echo "<td>SUBJ_NAME</td>";
     echo "</tr>";
  while($row = oci_fetch_array($querySearch)){
	 echo "<tr>";
	 echo "<td>" .$row['SUBJ_CODE']. "</td><td>" .$row['SUBJ_NAME']. "</td>";
	 echo "</tr>";
  }
  echo "</table>";
  ?>
	<hr>
	<br>
	<center>
	<table>
    <tr>
    <td>SUBJ_CODE</td>
    <td>SUBJ_NAME</td>
	</tr>
	<?php while ($row = oci_fetch_array($query)): ?>
	<tr>
	<td><?php echo $row['SUBJ_CODE'];?></td>
	<td><?php echo $row['SUBJ_NAME'];?></td>
	</tr>
	<?php endwhile; ?>
	</table>
	</center>

	</div>
    </div>

    <div class="clear"></div>

    <!--start footer from here-->
    <div id="footer">Copyright &copy; 2014. Design by <a href="http://www.htmltemplates.net" target="_blank">HTML Templates</a><br>

    <!--DO NOT remove footer link-->
    <!--Template designed by--><a href="http://www.htmltemplates.net"><img src="images/footer.gif" class="copyright" alt="www.htmltemplates.net"></a></div>

    <!--/. end footer from here-->
  </div>

</div>

</body></html>