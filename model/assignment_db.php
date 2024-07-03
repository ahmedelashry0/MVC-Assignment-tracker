<?php

function get_assignment_by_course($courseID)
{
    global $db;
    if ($courseID) {
        $query = 'SELECT A.ID, A.Description, C.courseName FROM assignments A LEFT JOIN courses C ON A.courseID = C.courseID WHERE A.courseID = :course_id ORDER BY ID';
    } else {
        $query = 'SELECT A.ID, A.Description, C.courseName FROM assignments A LEFT JOIN courses C ON A.courseID = C.courseID ORDER BY C.courseID';
    }
    $statement = $db->prepare($query);
    if ($courseID) {
        $statement->bindValue(':course_id', $courseID);
    }
    $statement->execute();
    $assignments = $statement->fetchAll();
    $statement->closeCursor();
    return $assignments;
}



function delete_assignment($assignment_id)
{
    global $db;
    $query = "DELETE FROM assignments AS A WHERE A.ID = :assignment_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':assignment_id', $assignment_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_assignment($course_id, $description)
{
    global $db;
    $query = "INSERT INTO assignments(courseID, Description) VALUES(:courseID, :description)";
    $statement = $db->prepare($query);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':courseID', $course_id);
    $statement->execute();
    $statement->closeCursor();
}