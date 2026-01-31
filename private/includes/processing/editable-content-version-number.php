<?php 

$contentId='';
$workspace = '';
$contentType='';
$versionPrefix = '';

if ($pageName=='Workspace - Teacher') {
    $contentId=$fileToEdit;
    $workspace = 'teacher.php';
    $contentType = 'file';
    $versionPrefix = 'teacher_file';
}

if ($pageName=='Workspace - Writer') {
    $contentId=$articleToEdit;
    $workspace = 'writer.php';
    $contentType = 'article';
    $versionPrefix = 'writer_article';
}

if ($pageName=='Workspace - Developer') {
    $contentId=$toolToEdit;
    $workspace = 'developer.php';
    $contentType = 'tool';
    $versionPrefix = 'developer_tool';
}

if ($pageName=='School Workspace - Researches') {
    $contentId=$researchToEdit;
    $workspace = 'researches.php';
    $contentType = 'research';
    $versionPrefix = 'school_research';
}

$setVersion = isset ($_GET['version']) ? (int) $_GET['version'] : '';

if ($setVersion) {
    if ($setVersion > $latestVersion) {
    header('Location:'.$website.'/workspace/'.$workspace.'?edit=yes&'.$contentType.'='.$contentId.'&version='.$latestVersion);
    }

    if ($setVersion < $latestVersion-4) {
        header('Location:'.$website.'/workspace/'.$workspace.'?edit=yes&'.$contentType.'='.$contentId.'&version='.$latestVersion-4);
    }

    $versionNumber = $setVersion;
}



if ($versionNumber) {
    $sqlGetVersions = "SELECT * FROM {$versionPrefix}_versions WHERE {$versionPrefix}VersionForeignId = '$contentId' AND {$versionPrefix}VersionNumber = $versionNumber";

    $sqlGetVersionsResult = mysqli_query ($conn, $sqlGetVersions);
    $versions= $sqlGetVersionsResult -> fetch_assoc();

    if ($versions) {
        if ($pageName=='Workspace - Teacher') {
            $db_description = trim($versions ["{$versionPrefix}VersionDescription"]);
        }

        if ($pageName=='Workspace - Writer') {
            $db_content = trim($versions ["{$versionPrefix}VersionContent"]);
        }

        if ($pageName=='Workspace - Developer') {
            $db_description = trim($versions ["{$versionPrefix}VersionDescription"]);
        }

        if ($pageName=='School Workspace - Researches') {
            $db_abstract = trim($versions ["{$versionPrefix}VersionAbstract"]);
        }
        
    }

}

