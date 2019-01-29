<?php
/**
 * Created by PhpStorm.
 * User: ESG
 * Date: 28/01/2019
 * Time: 16:15
 */

// Chargement des classes
require_once('Model/manager.php');
require_once('Model/equipement.php');

function listEquipements()
{
    $equipements = new equipement();
    $listEquipements = $equipements->getListEquipements();
    if ($listEquipements === false)
    {
        throw new Exception('Impossible d\'afficher la liste des équipements !');
    }
    else
    {
        require('View/adminListEquipements.php');
    }
}


function createEquipement($name)
{
    $equipement = new equipement();
    $newEquipement = $equipement->addEquipement($name);
    if ($newEquipement === false)
    {
        throw new Exception('Impossible d\'ajouter l\'équipement!');
    }
}

function deleteEquipement($id)
{

    $equipement = new equipement();
    $deletedEquipement = $equipement->deleteEquipement($id);
    if ($deletedEquipement === false)
    {
        throw new Exception('Impossible de supprimer l\'équipement!');
    }
}

function updateEquipement($id, $name)
{
    $equipement = new equipement();
    $updatedEquipement = $equipement->updateEquipement($id, $name);
    if ($updatedEquipement === false)
    {
        throw new Exception('Impossible de modifier l\'équipement!');
    }
}