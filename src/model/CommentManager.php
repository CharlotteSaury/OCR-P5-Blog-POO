<?php

namespace src\model;

use config\Parameter;

class CommentManager extends Manager
{
	public function getComments($commentsNb = null, $status = null, $sortingDate = null)
	{
		$sql = 'SELECT comment.id AS id, 
			comment.content AS content, 
			DATE_FORMAT(comment.comment_date,\'%d-%m-%Y à %Hh%i\') AS commentDate, 
			comment.status AS status,
			user.pseudo AS userPseudo,
			post.title AS postTitle,
			post.id AS postId
			FROM comment 
			JOIN user on comment.user_id = user.id
			JOIN post on comment.post_id = post.id';

		if (isset($status) && $status == 0)
		{
			$sql.= ' WHERE comment.status = ' . $status;
		}

		if ($sortingDate != null)
		{
			$sql.= ' ORDER BY comment.comment_date ASC';
		}
		else
		{
			$sql.= ' ORDER BY comment.comment_date DESC';
		}

		if ($commentsNb !== null)
		{
			$sql.= ' LIMIT ' . $commentsNb;
		}
		
		$req = $this->dbRequest($sql);

		$req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\src\entity\Comment');
		
		$comments = $req->fetchAll();
		return $comments;
	}

	public function getPostComments($postId, $status = null)
	{
		$sql = 'SELECT post.id AS postId, 
			comment.id AS id,
			comment.content AS content, 
			DATE_FORMAT(comment.comment_date,\'%d-%m-%Y à %Hh%i\') AS commentDate, 
			comment.status AS status,
			user.id AS userId,
			user.pseudo AS userPseudo,
			user.avatar AS userAvatar
			FROM comment 
			JOIN user on comment.user_id = user.id
			JOIN post on comment.post_id = post.id';

		if ($status != null)
		{
			$sql .= ' WHERE comment.status=1 AND post.id= :id
			ORDER BY comment.comment_date DESC';
		}
		else
		{
			$sql .= ' AND post.id= :id
			ORDER BY comment.comment_date DESC';
		}

		$req = $this->dbRequest($sql, array($postId));
		$req->bindValue(':id', $postId, \PDO::PARAM_INT);
		$req->execute();

		$req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\src\entity\Comment');
		
		$comments = $req->fetchAll();
		
		return $comments;
	}

	public function addComment(Parameter $post, $userId)
	{
		$sql = 'INSERT INTO comment (post_id, user_id, content, comment_date) 
				VALUES (:postId, :userId, :content, NOW())';
		$req = $this->dbRequest($sql, array($post->get('postId'), $userId, $post->get('content')));
		$req->bindValue('postId', $post->get('postId'), \PDO::PARAM_INT);
		$req->bindValue('userId', $userId, \PDO::PARAM_INT);
		$req->bindValue('content', $post->get('content'));
		$req->execute();
	}

	public function getCommentsNb($status = null)
	{
		$sql = 'SELECT COUNT(*) AS commentsNb FROM comment';

		if ($status != null)
		{
			$sql .= ' WHERE comment.status = :status';
			$req = $this->dbRequest($sql, array($status));
			$req->bindValue('status', $status, \PDO::PARAM_INT);
			$req->execute();
		}
		else
		{
			$req = $this->dbRequest($sql);
		}

		$commentsNb = $req->fetch(\PDO::FETCH_COLUMN);
		return $commentsNb;
	}

	public function approveComment($commentId)
	{
		$sql = 'UPDATE comment SET status=1	WHERE comment.id = :commentId';

		$req = $this->dbRequest($sql, array($commentId));
		$req->bindValue('commentId', $commentId, \PDO::PARAM_INT);
		$req->execute();
	}

	public function deleteComment($commentId)
	{
		$sql = 'DELETE FROM comment	WHERE comment.id = :commentId';

		$req = $this->dbRequest($sql, array($commentId));
		$req->bindValue('commentId', $commentId, \PDO::PARAM_INT);
		$req->execute();
	}

	public function deleteCommentsFromPost($postId)
	{
		$sql = 'DELETE FROM comment	WHERE post_id = :postId';

		$req = $this->dbRequest($sql, array($postId));
		$req->bindValue('postId', $postId, \PDO::PARAM_INT);
		$req->execute();
	}
}

