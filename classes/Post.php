<?php

class POST {
  private $conn;
  private $table = "posts";

  public $id;
  public $title;
  public $content;
  public $author_id;
  public $category_id;
  public $created_at;


  public function __construct($db) {
     $this->conn = $db;
  }

  //Create New Post 
  public function create() {
    $query = "INSERT INTO " . $this->table . "SET title = :title, content = :content, author_id = :author_id, category_id = :category_id ";
    $stmt = $this->conn->prepare($query);

    // clean and bind data
    $this->title = htmlspecialchars(strip_tags($this->title));
    $this->content = htmlspecialchars(strip_tags($this->content));
    $this->author_id = htmlspecialchars(strip_tags($this->author_id));
    $this->category_id = htmlspecialchars(strip_tags($this->category_id));

    $stmt->bindParam(':title', $this->title);
    $stmt->bindParam(':content', $this->content);
    $stmt->bindParam(':author_id', $this->author_id);
    $stmt->bindParam(':category_id', $this->category_id);

    if($stmt->execute()) {
       return true;
    }

    return false;
  }

  // Fetch all posts
  public function readAll() {
    $query = "SELECT * FROM " . $this->table . "ORDER BY created_at DESC ";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt;
  }

  //Read one blog post
  public function readOne() {
    $query = "SELECT * FROM " . $this->table . "WHERE id = ? LIMIT 0, 1";
    $stmt->$this->conn->prepare($query);
    $stmt->bindParam(1, $this->id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $this->title = $row['title'];
    $this->content = $row['content'];
    $this->author_id = $row['author_id'];
    $this->category_id = $row['category_id'];
    
  }

  //Update Blog Post
  public function update() {
    $query = "UPDATE" . $this->table . "SET title = :title, content = :content, author_id = :authord_id, category_id = :category_id WHERE id = :id ";
    $stmt->$this->conn->prepare($query);

    // Clean and bind data
    $this->title = htmlspecialchars(strip_tags($this->title));
    $this->content = htmlspecialchars(strip_tags($this->content));
    $this->author_id = htmlspecialchars(strip_tags($this->author_id));
    $this->category_id = htmlspecialchars(strip_tags($this->category_id));
    $this->id = htmlspecialchars(strip_tags($this->id));

    //bind the params
    $stmt->bindParam(':title', $this->title);
    $stmt->bindParam(':content', $this->content);
    $stmt->bindParam(':author_id', $this->author_id);
    $stmt->bindParam(':category_id', $this->category_id);
    $stmt->bindParam(':id', $this->id);

    if($stmt->execute()) {
        return true;
    }

    return false;
  }

  public function delete() {
    $query = "DELETE FROM" . $this->table . "WHERE id = :id ";
    $stmt = $this->conn->prepare($query);
    $this->id = htmlspecialchars(striptags($this->id));
    $stmt->bindParam(':id', $this->id);

    if($stmt->execute()) {
       return true;
    }

    return false;
  }
  
}