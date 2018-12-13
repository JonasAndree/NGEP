<?php
include_once "../sql.php";

$page = $_REQUEST["id"];
$pageType = $_REQUEST["pageType"];

$result = getPageContent($page, $pageType);


while ($content = $result->fetch_assoc()) {
    if ($content['type'] == "text") {
        echo "<div class='content-div content-nav'";
             echo ">"
                . $content['text'] .
             "</div>";
    } else if ($content['type'] == "h1") {
        echo "<div class='content-div content-header content-nav'";
            echo ">";
            echo "<h1>"
                    . $content['text'] .
                 "</h1>
              </div>";
    }
}
?>