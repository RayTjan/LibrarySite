<?php
namespace App\Models;
interface ObjectInterface {
    function getAll();
    function getName($id);
    function getrelationshipdata();
}
?>