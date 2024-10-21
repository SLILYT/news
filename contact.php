<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    echo htmlspecialchars("<b>dfdrn</b>");
    echo ("<b>dfdrn</b>");
    ?>
    <form action="işlem.php?işlem=contact" method="post">
        
        <div>
            <input type="text" placeholder="isim" name="name">
        </div>
        <div>
            <input type="text" placeholder="email" name="email">
        </div>
        <div>
          <textarea name="message" cols="30" rows="10"></textarea>
        </div>
        <div>
            <button></button>
        </div>
    </form>
</body>
</html>