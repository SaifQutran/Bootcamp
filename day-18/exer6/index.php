<?php
final class file
{
    private string $fileName;
    private string $fileSize;
    private string $targetPath;
    private string $afterUploadPath;
    function getFileName()
    {
        return $this->fileName;
    }
    function getFileSize()
    {
        return $this->fileSize;
    }
    function getTargetPath()
    {
        return $this->targetPath;
    }
    function getAfterUploadPath()
    {
        return $this->afterUploadPath;
    }
    function __construct($name, $fileName = '', $targetPath = 'uploads/')
    {

        $this->fileSize = $_FILES[$name]['size'];
        $this->fileName = $fileName == '' ? $_FILES[$name]['name'] : $fileName;
        $this->afterUploadPath  = $targetPath . $this->fileName;
        move_uploaded_file($_FILES[$name]['tmp_name'], $this->afterUploadPath);
    }
}
if (isset($_POST['submit'])) {
    $file = new file('image', 'test.jpg', 'uploads/');
} ?>

<head>
    <link rel="stylesheet" href="bootstrap.css">
</head>

<body>
    <form method="post" action="" enctype="multipart/form-data">
        <label for="imgInp" id="piclabel"></label>
        <input type="file" name="image" id="imgInp" placeholder="pic" accept="image/*" />
        <center>
            <input type="submit" value="Submit" name="submit" onclick="set2()" class="btn btn-primary mt-3">
        </center>
    </form>
</body>