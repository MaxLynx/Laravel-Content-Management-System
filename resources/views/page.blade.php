<!DOCTYPE html>
<html lang="en">
<head>
<title><?php
  switch($page->lang){
    case 'en': echo $page->captionEn; break;
    case 'ru': echo $page->captionRu; break;
    case 'ua': echo $page->captionUa; break;
  }
  ?></title>
<link rel="icon" href="/storage/logo.png"/>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
    box-sizing: border-box;
    background-color: #f1f1f1;
}

body {
    font-family: Arial, Helvetica, sans-serif;
}

/* Style the header */
.header {
    background-color: #f1f1f1;
    padding: 30px;
    text-align: center;
    font-size: 35px;
    color: orange;
}

/* Container for flexboxes */
.row {
    display: -webkit-flex;
    display: flex;
}

/* Create three unequal columns that sits next to each other */
.column {
  padding: 10px;
  min-height: 69vh;
}

/* Left and right column */
.column.side {
   -webkit-flex: 1;
   -ms-flex: 1;
   flex: 1;
   background-color: #aaa;
}

/* Middle column */
.column.middle {
    -webkit-flex: 2;
    -ms-flex: 2;
    flex: 2;
    background-color: #bbb;
}

/* Style the footer */
.footer {
    background-color: #f1f1f1;
    padding: 10px;
    text-align: center;
}

a {
  text-decoration: none;
  color: darkgreen;
  font-size: 2em;
  display: block;
}

/* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
@media (max-width: 600px) {
    .row {
      -webkit-flex-direction: column;
      flex-direction: column;
    }
}
</style>
</head>
<body>

<div class="header">
  <a href="/admin"><img src="/storage/logo.png" alt="Logo image"/></a>
  <h2><?php
  switch($page->lang){
    case 'en': echo $page->captionEn; break;
    case 'ru': echo $page->captionRu; break;
    case 'ua': echo $page->captionUa; break;
  }
  ?></h2>
</div>

<div class="row">
  <div class="column side">
        <?php
          foreach($pages as $one_page){
            if($one_page->parentCode == null){
            $tmp = "<a href=".'/app/'.$one_page->code.'/'.$page->lang.">";
            switch($page->lang){
              case 'en': $tmp .= $one_page->captionEn; break;
              case 'ru': $tmp .= $one_page->captionRu; break;
              case 'ua': $tmp .= $one_page->captionUa; break;
            }
            echo $tmp . "</a>";
          }
          }
        ?>
  </div>
  <div class="column middle">
  <span><i><?php
  switch($page->lang){
    case 'en': echo $page->introEn; break;
    case 'ru': echo $page->introRu; break;
    case 'ua': echo $page->introUa; break;
  }
  ?></i></span>
  <br>
  <br>
  <div>
    <img src="{{'/storage/'.$page->imageurl}}" alt="Page image"/>
  </div>
  <br>
  <?php
        if($page->containerType == 1){
          foreach($pages as $one_page){
            if($one_page->parentCode == $page->code){
            $tmp = "<a href=".'/app/'.$one_page->code.'/'.$page->lang.">";
            switch($page->lang){
              case 'en': $tmp .= $one_page->captionEn; break;
              case 'ru': $tmp .= $one_page->captionRu; break;
              case 'ua': $tmp .= $one_page->captionUa; break;
            }
            echo $tmp . "</a>";
          }
          }
        }
        else
        if($page->containerType == 2){
          foreach($pages as $one_page){
            if($one_page->parentCode == $page->code){
            $tmp = "<a href=".'/app/'.$one_page->code.'/'.$page->lang.">";
            echo $tmp . '<img border="0" alt="Child page image" src="/storage/' .
            $one_page->imageurl
            . '"></a>';
          }
          }
        }
        ?>
  <br>
  <span><?php
  switch($page->lang){
    case 'en': echo $page->textEn; break;
    case 'ru': echo $page->textRu; break;
    case 'ua': echo $page->textUa; break;
  }
  ?></span>
  </div>
  <div class="column side" style="background-color:#ccc;">
        <a href="{{'/app/'.$page->code.'/en'}}">English</a>
        <a href="{{'/app/'.$page->code.'/ru'}}">Русский</a>
        <a href="{{'/app/'.$page->code.'/ua'}}">Українська</a>
  </div>
</div>

<div class="footer">
  <p>Мельниченко Кирило, Xamarin-розробник</p>
</div>

</body>
</html>
