<?php
include_once "../sql.php";

$page = $_REQUEST["id"];
$pageType = $_REQUEST["pageType"];
$editmode = $_REQUEST["editmode"];

$result = getPageContent($page, $pageType);

if ($rowcount = mysqli_num_rows($result) > 0) {

} else {
    echo "no record found";
}

while ($content = $result->fetch_assoc()) {
    if ($content['type'] == "text") {
        echo "<div class='content-div'";
        if ($editmode == "true") {
            echo "contenteditable='true' onfocus='showEditableBar(this)' onblur='saveText(this)'";
        } else {
            echo "contenteditable='false'";
        }
        echo ">" . $content['text'] . "</div>";
    } else if ($content['type'] == "h1") {
        echo "<div class='content-div content-header'";
        if ($editmode == "true") {
            echo "contenteditable='true' onfocus='showEditableBar(this)' onblur='saveText(this)'";
        } else {
            echo "contenteditable='false'";
        }
        echo ">";
        echo "<h1>" . $content['text'] . "</h1>
              </div>";
    }
}
?>