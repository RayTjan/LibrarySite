<?php
namespace App\Models;
interface ObjectInterface {
    //get all objects
    function getAll();
    //get name
    function getName($id);
    //get BelongsTo or HasMany, depending on object
    function getrelationshipdata();
}
//tried to put it on the folder, but for some reason it goes missing, and untracable to be referenced in models
?>