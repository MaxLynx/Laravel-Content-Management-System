<!DOCTYPE html>
<html lang="en">
<head>
<title>Список сторінок</title>
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
.adminPageLink {
  font-size: 1em;
  display: inline;
}
button {
  width: 150px;
  height: 20px;
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
  <img src="/storage/logo.png" alt="Logo image"/>
  <h2>Список сторінок</h2>
</div>

<div class="row">
  <div class="column side">
        
  </div>
  <div class="column middle">
  <?php
          if($parentCode != null){
            echo '<button form="showParent"> Вгору </button>';
            echo '<form action="/admin" method="get" id="showParent">' .
              '<input type="hidden" name="parentCode" value="' . $grandparentCode . '"/></form>'; 
            echo '<br>';
          }
          foreach($pages as $page){
            
            echo '<a class="adminPageLink" target="_blank" href="app/' . $page->code .'/ua">' . $page->captionUa . '</a>';
            echo '<button form="update' . $page->id . '"> Редагувати </button>';
            echo '<button form="delete' . $page->id . '"> Видалити </button>';
            echo '<form action="/admin/' . $page->code .'/edit" method="get" id="update' . $page->id . '"></form>';
            echo '<form action="/admin/delete/' . $page->code .'" method="post" id="delete' . $page->id . '"> ' . csrf_field() .  '</form>';
            if($page->containerType != 0){
              echo '<button form="showChildren' . $page->id . '"> Розкрити </button>';
              echo '<form action="/admin" method="get" id="showChildren' . $page->id . '">' .
              '<input type="hidden" name="parentCode" value="' . $page->code . '"/></form>';          
            }
            echo "<br>";
            
          
          }
          echo '<button form="create"> Створити </button>';
          echo '<form action="/admin/create" method="get" id="create">' .  
          '<input type="hidden" name="parentCode" value="' . $parentCode . '"/>
            </form>';
        ?>
  </div>
  <div class="column side" style="background-color:#ccc;">
        
  </div>
</div>

<div class="footer">
  <p>Мельниченко Кирило, Xamarin-розробник</p>
</div>

</body>
</html>
