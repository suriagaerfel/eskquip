<?php

require '../../initialize.php';
require '../../database.php';



if (isset($_POST['search_submit'])) {

$query = htmlspecialchars($_POST['query']);
$queryIn = htmlspecialchars($_POST['query_in']);

if ($queryIn=='tools') {
    $table='developer_tools';
    $titleColumn='developer_toolTitle';
    $descriptionColumn='developer_toolDescription';
    $imageColumn='developer_toolIcon';
    $defaultImage=$website.'/assets/images/default-tool-icon.jpg';
    $linkColumn='developer_toolLink';
    $statusColumn = 'developer_toolStatus';
    $statusValue = 'Published';
    $sortColumn = 'developer_toolPubDate';
    $pageLink=$website.'/tools/';

}

if ($queryIn=='articles') {
    $table='writer_articles';
    $titleColumn='writer_articleTitle';
    $slugColumn='writer_articleSlug';
    $descriptionColumn='writer_articleContent';
    $imageColumn='writer_articleImage';
    $defaultImage=$website.'/assets/images/default-featured-image.jpg';
    $statusColumn = 'writer_articleStatus';
    $statusValue = 'Published';
    $sortColumn = 'writer_articlePubDate';
    $pageLink=$website.'/articles/';

}


if ($queryIn=='teacher-files') {
    $table='teacher_files';
    $titleColumn='teacher_fileTitle';
    $slugColumn='teacher_fileSlug';
    $descriptionColumn='teacher_fileDescription';
    $imageColumn='teacher_fileImage';
    $defaultImage=$website.'/assets/images/teacher-file.jpg';
    $statusColumn = 'teacher_fileStatus';
    $statusValue = 'Published';
    $sortColumn = 'teacher_filePubDate';
    $pageLink=$website.'/teacher-files/';
}

if ($queryIn=='researches') {
    $table='school_researches';
    $titleColumn='school_researchTitle';
    $slugColumn='school_researchSlug';
    $descriptionColumn='school_researchAbstract';
    $imageColumn='school_researchImage';
    $defaultImage=$website.'/assets/images/research.jpg';
    $statusColumn = 'school_researchStatus';
    $statusValue = 'Published';
    $sortColumn = 'school_researchLiveDate';
    $pageLink=$website.'/researches/';

}


if ($queryIn=='accounts') {
    $table='registrations';
    $titleColumn='registrantAccountName';
    $usernameColumn='registrantUsername';
    $descriptionColumn='registrantDescription';
    $imageColumn='registrantProfilePictureLink';
    $statusColumn = 'registrantVerificationStatus';
    $statusValue = 'Verified';
    $sortColumn = 'registrantCreatedAt';
    $pageLink=$website.'/';
    $searchedTable="";
}







// $result = $conn->query("SELECT COUNT(*) AS total FROM $table WHERE  $titleColumn LIKE '%$query%' AND $statusColumn='$statusValue' OR $descriptionColumn LIKE '%$query%' AND $statusColumn='$statusValue'");

// $totalRows = (int)$result->fetch_assoc()['total'];
// $totalPages = (int)ceil($totalRows / $resultsPerPage);

// $page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
// $page= max(1,min($page,$totalPages));

// $offset = ($page - 1) * $resultsPerPage;



if ($query && $queryIn) {
   $sqlSearch = "SELECT * FROM $table WHERE $titleColumn LIKE '%$query%' AND $statusColumn='$statusValue' OR $descriptionColumn LIKE '%$query%' AND $statusColumn='$statusValue' ORDER BY $sortColumn DESC";
   $sqlSearchResult = mysqli_query($conn,$sqlSearch);

   if ($sqlSearchResult->num_rows>0) { 

      while($result = $sqlSearchResult->fetch_assoc()){ 
         $resultTitle = $result [$titleColumn];
         $resultImage = $result [$imageColumn] ? $privateFolder.$result[$imageColumn]: $defaultImage;

         echo "<img src=$resultImage class='list-image'>";
         echo '<hr>';      
   }
 

   } else {
      echo 'No result';
      
   }
}









}