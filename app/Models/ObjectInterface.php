<?php
namespace App\Models;
interface ObjectInterface {
    function getAll();
    function getName($id);
    function getrelationshipdata();
}
//tried to put it on the folder, but for some reason it goes missing, and untracable to be referenced in models
?>