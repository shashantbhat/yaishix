<?php
require_once("includes/header.php");

if(!isset($_GET["id"])) {
    ErrorMessage::show("oops something went wrong:(");
}
$entityId = $_GET["id"];
$entity = new entity($con, $entityId);

$preview = new PreviewProvider($con, $userLoggedIn);
echo $preview->createPreviewVideo($entity);

$seasonProvider = new seasonProvider($con, $userLoggedIn);
echo $seasonProvider->create($entity);

$categoryContainers = new categoryContainers($con, $userLoggedIn);
echo $categoryContainers->showCategory($entity->get_categoryId(), "You might also like");
?>
