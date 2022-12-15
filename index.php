<?php

use DiDom\Document;

require "./vendor/autoload.php";

$document= new Document("https://www.uonbi.ac.ke/research-news", true);


function getAllTitles($document){

    $data= "";

$content = $document->find('#content')[0];

$containerArray = $content->find('.field-content');

$posts= ($content ->find('.views-field-title'));//this should return an aray


for($i=0; $i<count($containerArray); $i++){

    // $img =$containerArray[$i]->find('.views-field-field-thumbnail::attr(href)')[0];
    
    echo "<strong> Title: </strong>" .$posts[$i]->text();
    echo "<br>";
    // echo $img;
    echo"<br><br>";

    $data = $data. 
    "<strong> Title: </strong>" .$posts[$i]->text();
     "<br>";
    // echo $img;
    "<br><br>";

}
    saveData($data);

}

getAllTitles($document);


function saveData($data) {

    if(!is_dir("Research")){
        mkdir("Research");
     }
     //create file
     $file = fopen('Research/data.txt','w');
     fwrite($file,$data);
     fwrite($file, "\n\n");
     fclose($file);
}

?>