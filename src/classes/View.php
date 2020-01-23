<?php
class View
{

    public function __construct()
    {
        //add logging maybe
    }

    public function render($data = null)
    {
        $html = $this->getHeader();
        //TODO use $data when generating our HTML
        $html .= "<h1>Generating bunch of HTML</h1>";
        $html .= $this->getMain($data);
        $html .= $this->getFooter();

        echo $html;
    }

    private function getHeader()
    {
        $pagetitle = "My music page"; //TODO get title from config
        $stylefile = ""; //TODO get style from config
        $jsfile = "";
        $html = <<<MYLIMITER
<!DOCTYPE html>
<html lang="lv">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>$pagetitle</title>
<link rel="stylesheet" href="styles/$stylefile">
<script
src="https://code.jquery.com/jquery-3.4.1.min.js"
integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
crossorigin="anonymous"></script>
<script src="scripts/$jsfile" defer></script>
</head>
<body>
MYLIMITER;
        return $html;
    }

    private function getMain($data)
    {
        $allRows = $data['tracks'];
        $html = "";
        $html .= "<hr>";
        $html .= "<div class='song-container'>";
        $columnsPrinted = false; //for column names
        foreach ($allRows as $row) {
            if (!$columnsPrinted) {
                $html .= "<div class='row-column-names'>";
                foreach ($row as $key => $value) {

                    if ($key == 'Column') {
                        $key = "Kolonna";
                    }
                    $html .= "<span class='column-name'> $key </span>";
                }
                $columnsPrinted = true;
                $html .= "</div>";
            }

            if (isset($row['favorite'])) {
                $special = "song-style-" . $row['favorite'];
            } else {
                $special = "song-style-null";
            }

            $html .= "<div class='row-song $special'>";
            $html .= "<form action='index.php' method='post'>";
            $html .= "<div class='update-songs'>";
            // $html .= "<span>Title: " . $row["title"] . "</span>";

            foreach ($row as $key => $value) {

                //TODO we need to process title, artist and length seperately as special cases
                switch ($key) {
                    case 'favorite':
                        //set checked to show if we have a set value
                        $checked = $value ? "checked" : "";
                        $html .= "<input type='checkbox' class='value-$key' name='$key' value='$key' $checked></input>";
                        break;
                    case 'title':
                    case 'artist':
                    case 'length':
                        $html .= "<input class='input-value-cell value-$key' name='$key' value='$value'></input>";
                        break;
                    default:
                        $html .= "<span class='value-cell'>$value </span>";
                        break;
                }
            }
            $html .= "<button name='update' value='" . $row['id'] . "'>Update</button>";
            $html .= "</div>";
            $html .= "</form>";
            $html .= "<form action='index.php' method='post'>";
            $html .= "<button name='delete' value='" . $row['id'] . "'>Delete</button>";
            $html .= "</form>";
            $html .= "</div>";
        }
        $html .= "</div>";
        $html .= "<hr>";

        return $html;
    }

    private function getFooter()
    {
        $year = date(DATE_RFC2822); //TODO get year dynamically
        $html = "<footer>(C)$year</footer>";
        $html .= "</body>";
        $html .= "</html>";
        return $html;
    }
}
