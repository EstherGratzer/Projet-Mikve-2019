<?php
// Chargement des classes
require_once('Model/Manager.php');
require_once('Model/Mikves.php');
require_once('Model/Comments.php');
function createMikve($name, $address, $phoneNumber, $openingTimes, $prices_id, $equipements_id, $images_id) // OK
{
    $mikve = new Mikves();
    $affectedLines = $mikve->createMikve($name, $address, $phoneNumber, $openingTimes, $prices_id, $equipements_id, $images_id); // Appel d'une fonction de cet objet
    if ($affectedLines === false)
    {
        throw new Exception('Impossible d\'ajouter le nouveau mikve !');
    }
    else
    {
        //header('Location: index.php?action=listSubjects');
    }
}
function updateMikve($mikves_id, $name, $address, $phoneNumber, $openingTimes, $prices_id, $equipements_id, $images_id) // OK
{
    $mikve = new Mikves();
    $affectedLines = $mikve->updateMikve($mikves_id, $name, $address, $phoneNumber, $openingTimes, $prices_id, $equipements_id, $images_id);
    if ($affectedLines === false)
    {
        throw new Exception('Impossible de modifier le mikve !');
    }
    else
    {
        //header('Location: index.php?action=listSubject');
    }
}
function deleteMikve($mikves_id) // OK
{
    $mikve = new Mikves();
    $affectedLines = $mikve->deleteMikve($mikves_id);
    if ($affectedLines === false)
    {
        throw new Exception('Impossible de supprimer le mikve !');
    }
    else
    {
        //header('Location: index.php?action=listSubjects');
    }
}
function listMikves() // OK
{
    $mikve = new Mikves();
    if (isset($_GET['page']))
    {
        $start = ($_GET['page']*2)-2;
        $listMikves = $mikve->getListMikves($start);
    }
    else
    {
        $listMikves = $mikve->getListMikves(0);
    }
    //$nb_Items = $mikve->getCountItems('mikves');
    //require('view/frontend/home.php');
}
function showMikve($mikves_id) // OK
{
    $mikve = new Mikves();
    $post = $mikve->getOneMikve($mikves_id, 0);
    $comment = new Comments();
    $answers = $comment->getListComments($mikves_id, 0);
    //require('view/frontend/subject.php');
}
function createComment($comment, $mikves_id, $users_id) //OK
{
    $comment = new Comments();
    $affectedLines = $comment->createComment($comment, $mikves_id, $users_id);
    if ($affectedLines === false)
    {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else
    {
        //header('Location: index.php?action=showSubject&id='.$subjects_id);
    }
}
function updateComment($comments_id, $comment) // OK
{
    $comment = new Comments();
    $affectedLines = $comment->updateComment($comments_id, $comment);
    if ($affectedLines === false)
    {
        throw new Exception('Impossible de modifier le commentaire !');
    }
    else
    {
        //header('Location: index.php?action=showSubject&id='.$subjects_id);
    }
}
function deleteComment($mikve_id, $comments_id) // OK
{
    $comment = new Comments();
    $affectedLines = $comment->deleteComment($comments_id, 0);
    if ($affectedLines === false)
    {
        throw new Exception('Impossible de supprimer lecommentaire !');
    }
    else
    {
        //header('Location: index.php?action=showSubject&id='.$subjects_id);
    }
}
function listComments($mikves_id) //
{
    $comment = new Comments();
    if (isset($_GET['page']))
    {
        $start = ($_GET['page']*2)-2;
        $listComments = $comment->getListComments($start);
    }
    else
    {
        $listComments = $comment->getListComments(0);
    }
    //$nb_Items = $mikve->getCountItems('mikves');
    //require('view/frontend/home.php');
}