<?php

namespace model;

class GetHangmanWords {
    private $link;
    private $words;
    private $dbConnection;

    public function __construct(\model\DatabaseConnection $dbc){
        $this->dbConnection = $dbc;
    }
 
       /**
	 * Connects to DB using DB model and gets all the words in the DB.
	 *
	 * Should be called when a new game is initiated.
	 *
	 * @return array containing all words that can be used in the game.
	 */
    public function getWords() {
        $this->words = [];
        $this->link = $this->dbConnection->connection();
       
        // Prepare a select statement
        $sql = "SELECT * FROM words";
        $result = mysqli_query($this->link, $sql);

        while($row = mysqli_fetch_assoc($result))
        {
            array_push($this->words, $row["word"]);
        }
        return $this->words;

        mysqli_free_result($result);
        mysqli_close($this->link);
    }
}
