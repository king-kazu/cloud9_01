zz<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>画像ファイル選択</title>
  </head>
  <body>
    <h1>画像ファイル選択</h1>
    <form method="post" action="{{ route('images.store') }}" enctype="multipart/form-data">
      @csrf
      <input type="file" name="image">
      <input type="submit" value="送信">
    </form>
  </body>
</html>