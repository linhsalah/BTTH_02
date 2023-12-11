<?php
include_once("db_connect.php");
$commentQuery = "SELECT id, parent_id, comment, sender, date FROM comment WHERE parent_id = '0' ORDER BY id DESC";
$stmt = $conn->prepare($commentQuery);
$stmt->execute();
$comments = $stmt->fetchAll();
$commentHTML = '';
foreach($comments as $comment) {
    $commentHTML .= '
		<div class="panel panel-primary">
            <div class="panel-heading">
                By <b>'.$comment["sender"].'</b> on <i>'.$comment["date"].'</i>
            </div>
            <div class="panel-body">
                '.$comment["comment"].'
            </div>
            <div class="panel-footer" align="right">
                <button type="button" class="btn btn-primary reply" id="'.$comment["id"].'">Reply</button>
            </div>
		</div> ';
        //$commentHTML .= getCommentReply($conn, $comment["id"]);
}
// while($comment = mysqli_fetch_assoc($commentsResult)){
// 	$commentHTML .= '
// 		<div class="panel panel-primary">
// 		<div class="panel-heading">By <b>'.$comment["sender"].'</b> on <i>'.$comment["date"].'</i></div>
// 		<div class="panel-body">'.$comment["comment"].'</div>
// 		<div class="panel-footer" align="right"><button type="button" class="btn btn-primary reply" id="'.$comment["id"].'">Reply</button></div>
// 		</div> ';
// 	$commentHTML .= getCommentReply($conn, $comment["id"]);
// }
echo $commentHTML;
?>