<?php
namespace Alexandre\Blog\Model;
require_once('Manager.php');



class PostManager extends Manager
{
	public function getPosts($start)
	{

		$db = $this -> dbConnect();

		$query = "SELECT id, titre, contenu, DATE_FORMAT(date_creation, '%d/%m/%Y à %Hh%imin%ss') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT ?, 5";
		$request = $db->prepare($query) or trigger_error($db->error."[$query]");
		$req = $request -> execture (array($start));
		$posts = $req -> fetch();
		return $posts;

	}

	public function addPost($titre,$contenu)
	{
		$db = $this -> dbConnect();

		$query = "INSERT INTO billets ( titre, contenu, date_creation) VALUES (?, ?, NOW())";
		$req = $db->prepare($query);
		$affectedPost = $req -> execute(array($titre,$contenu));
		return $affectedPost;

	}


	public function getPost($postId)
	{
		$db = $this -> dbConnect();

		$query = "SELECT id, titre, contenu, DATE_FORMAT(date_creation, '%d/%m/%Y à %Hh%imin%ss') AS date_creation_fr FROM billets WHERE id = ?";
		$req = $db->prepare($query) or trigger_error($db->error."[$query]");
		$post = $req -> execute (array($postId));
		$post = $req -> fetch();
		return $post;

	}

	

}