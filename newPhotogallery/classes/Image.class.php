<?php
class Image
{
    const TARGETDIR = "images/files/";//Целевая папка
    const SMALLPATH = "images/small/";//Папка к маленьким изображениям
    

    private function imgCopyResize($filename, $imgpath, $name)
    {
	$width = 200;
	$height = 200;
	
        //header('Content-Type: image/jpeg');
	
        list($width_orig, $height_orig) = getimagesize($filename);
        $ratio_orig = $width_orig/$height_orig;
        if ($width/$height > $ratio_orig) {
        $width = $height*$ratio_orig;
        }
        else {
        $height = $width/$ratio_orig;
        }

        $image_p = imagecreatetruecolor($width, $height);
        $image = imagecreatefromjpeg($filename);
        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

        $destfile = $imgpath . basename($name);
        imagejpeg($image_p, $destfile, 100);
        imagedestroy($image_p);

        return true;
    }
    function upload()
    {
        
        $fileName = $_FILES['photo']['name'];//Имя файла
        $fileType = $_FILES['photo']['type'];//Тип файла
        $fileTmp = $_FILES['photo']['tmp_name'];//Временное имя файла
        $path = self::TARGETDIR.$fileName;//Полный путь к файлу
        $newName = 'pic_'.time().'.jpg';//Имя для обрезаной картинки
        $smallTargetDir = self::SMALLPATH;
    
      
        if ($fileType == 'image/jpeg') //Проверка на тип загружаемого изображения
        {
            if(move_uploaded_file($fileTmp, $path)) //загружаем файл в целевую папку
                {
                    echo "File ".$fileName." is successful downloaded";
                    self::imgCopyResize($path, $smallTargetDir, $newName);//обрезаем фото
                    $db = new DB("localhost", "root", "", "Photogallery");
                    $db->connection();//Подключаемся к базе
                    $sqlRecord = "INSERT INTO img(Name,Path,Tmp,smallPath) VALUES ('$fileName','$path','$fileTmp','$smallTargetDir$newName')"; //Запрос на запись
                    $rec = $db->sqlQuery($sqlRecord);//Записываем данные в таблицу
                                 
                }
            else
            {
                echo "There is an error";
            }
                   
        }
       else
       {
            echo "File type should be JPEG<br>";
            
        }
          
    }
    public function show()
    {
        $db = new DB('localhost','root', '', 'Photogallery');//создаем экземпляр класса DB
        $db->connection();// Подключаемся к базе
        $sql = "SELECT * From img";
        $res = $db ->sqlQuery($sql);//Выполняем запрос
        $array = [];
        while (($data = $res->fetch_assoc())!= false)
        {
            $array[] = $data;
          
        }
        return $array;
    }
    public function showSmall()
    {
        $Id = $_GET['id'];
        $db = new DB('localhost','root', '', 'Photogallery');
        $db -> connection();
        $sql = "SELECT `Path` FROM `img` WHERE `Id`= '$Id'"; 
        $res = $db ->sqlQuery($sql);
        $data = mysqli_fetch_assoc($res);
        return $data;
    
    }
    public function uploaded()
    {
        $Id = $_POST['photo'];
        print_r($Id);
        $db = new DB('localhost','root', '', 'Photogallery');
        $db -> connection();
        $sql = "SELECT `Path` FROM `img` WHERE `Id`= '$Id'";
        $res = $db ->sqlQuery($sql);
        $data = mysqli_fetch_assoc($res);
        return $data;
    }
}



