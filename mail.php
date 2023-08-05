<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mail Gönder | Hoşgeldiniz</title>
</head>
<body>
    <form action="form.php" method="post" encytype="multipart/form-data">

   <input type="email" name="email" required placeholder="Emailinizi giriniz"><br>
   <input type="text" name="konu" required placeholder="Konu giriniz"><br>
    <textarea name="mesaj" id="" cols="30" rows="10" placeholder="Eposta içeriği "></textarea><br>
   <input type="file" name="dosya"><br>
  <button type="submit">Gönder</button>





    </form>
    
</body>
</html>