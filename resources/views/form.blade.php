<!DOCTYPE html>
<html lang="en">
<head>
<title>Форма</title>
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
  <h2>Форма редагування контенту</h2>
</div>

<div class="row">
  <div class="column side">
        
  </div>
  <div class="column middle">
  <form id="store" method="post" action=<?php if($page->parentCode == null) {echo "/admin/create/null"; } else {echo '/admin/create/' . $page->parentCode;}?> 
  enctype="multipart/form-data">
    {{csrf_field()}}
    Код розділу:<br><textarea form="store" rows="3" cols="70" name="parentCode" value=""><?php if($page->parentCode != 'null') echo $page->parentCode; ?></textarea><br>
    Код сторінки:<br><textarea form="store" rows="3" cols="70" name="code" value=""></textarea><br>
    Заголовок англійською:<br><textarea form="store" rows="3" cols="70" name="captionEn" value=""></textarea><br>
    Заголовок російською:<br><textarea form="store" rows="3" cols="70" name="captionRu" value=""></textarea><br>
    Заголовок українською:<br><textarea form="store" rows="3" cols="70" name="captionUa" value=""></textarea><br>
    Анотація англійською:<br><textarea form="store" rows="10" cols="70" name="introEn" value=""></textarea><br>
    Анотація російською:<br><textarea form="store" rows="10" cols="70" name="introRu" value=""></textarea><br>
    Анотація українською:<br><textarea form="store" rows="10" cols="70" name="introUa" value=""></textarea><br>
    Текст англійською:<br><textarea form="store" rows="15" cols="70" name="textEn" value=""></textarea><br>
    Текст російською:<br><textarea form="store" rows="15" cols="70" name="textRu" value=""></textarea><br>
    Текст українською:<br><textarea form="store" rows="15" cols="70" name="textUa" value=""></textarea><br>
    Зображення:<bt><input type="file" name="image" /><br>
    Порядковий номер у розділі:<br><textarea form="store" rows="2" cols="70" name="orderNum" value="">0</textarea><br>
    Тип розділу:<br><select name="containerType" form="store">
                        <option
                                value="0">
                            Немає
                        </option>
                        <option
                                value="1">
                            Список
                        </option>
                        <option
                                value="2">
                            Плитка
                        </option>
                    </select><br>
    Поле для сортування у розділі:<br><select name="orderType" form="store">
                        <option
                                value="orderNum">
                            Ручне сортування
                        </option>
                        <option
                                value="code">
                            Код сторінки
                        </option>
                        <option
                                value="captionEn">
                            Англійська назва
                        </option>
                        <option
                                value="captionUa">
                            Українська назва
                        </option>
                        <option
                                value="captionRu">
                            Російська назва
                        </option>
                    </select><br><br>
    <input type="submit" value="Створити"/>
  </form>
  </div>
  <div class="column side" style="background-color:#ccc;">
        
  </div>
</div>

<div class="footer">
  <p>Мельниченко Кирило, Xamarin-розробник</p>
</div>

</body>
</html>
