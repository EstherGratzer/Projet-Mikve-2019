<?php
// Chargement des classes
require_once('Model/manager.php');
require_once('Model/mikve.php');
require_once('Model/comment.php');

function index() {
    listMikves();
}

function listMikves() // OK
{
    $mikve = new mikve();
    //if (isset($_GET['page']))
    //{
      //  $start = ($_GET['page']*2)-2;
       // $listMikves = $mikve->getListMikves($start);
    //}
    //else
    //{
        $listMikves = $mikve->getListMikves();
    //}
    //$nb_Items = $mikve->getCountItems('mikves');
    require('view/mikveList.php');
}
function showMikve() // OK
{
    if (isset($_GET['mikves_id']))
    {
        $mikves_id = $_GET['mikves_id'];
        $tables_id = 1;
        $mikve = new mikve();
        $mikveArray = $mikve->getOneMikve($mikves_id, $tables_id);
        $comment = new comment();
        $listComments = $comment->getListComments($mikves_id, 0);
        require('View/mikve.php');
    }
}
function createComment($comment, $mikves_id, $users_id) //OK
{
    $comment = new comment();
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
    $comment = new comment();
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
    $comment = new comment();
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
    $comment = new comment();
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