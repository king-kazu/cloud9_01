<form action="/upload" enctype="multipart/form-data" method="post">
    @csrf
    <input type="file" name="imgpath">
    <input type="submit" value="アップロードする">
</form>