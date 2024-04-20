<?php
// verzia v OOP

class QnaEngine{
    private $db_connection;
    public function __construct($db_connection)
    {
        $this->db_connection = $db_connection;
    }
    public function getQuestionsAndAnswers(){
        $query= "SELECT id, question, answer FROM qna_table";
        $result= mysqli_query($this->db_connection, $query);
        $qna_data = [];
        while ($row= mysqli_fetch_assoc($result) ){
            $qna_data[]= $row;
        }
        mysqli_free_result($result);
        return $qna_data;
    }
}