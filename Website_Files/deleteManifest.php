<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: login.php");
        exit();
    }

    if(!isset($_POST['delete'])){
        header("Location: ".$_SERVER['HTTP_REFERER']);
        exit();
    }

    if(!isset($_POST['title'])){
      header("Location: ".$_SERVER['HTTP_REFERER']);
      exit();
    }

    $m = new MongoClient();
    $db = $m->collections;
    $collection = $db->manifests;

    if($collection->remove(array("title" => $_POST['title'])) == TRUE) {
        $_SESSION['message'] = "deleted";
        header("Location: search.php");
        exit();
    } else {
        $_SESSION['message'] = "deletefailed";
        header("Location: search.php");
        exit();
    }
?>
