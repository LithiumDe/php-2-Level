<?php

class Image{
    const TARGETDIR = "images/files/";//Целевая папка
    const SMALLPATH = "images/small/";//Папка к маленьким изображениям

    public function imgCopyResize($filename, $imgpath, $name)
        {
	    $width = 200;
	    $height = 200;
		       
            list($width_orig, $height_orig) = getimagesize($filename);
            $ratio_orig = $width_orig/$height_orig;
            if ($width/$height > $ratio_orig) {
               $width = $height*$ratio_orig;
            } else {
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
        $path = TARGETDIR.$fileName;//Полный путь к файлу
        $newName = 'pic_' . time() . '.jpg';
        $smallTargetDir = SMALLPATH.$newName;
    
        print_r($fileType);
        if ($fileType == 'image/jpeg') //Проверка на тип загружаемого изображения
        {
            if(move_uploaded_file($fileTmp, $path)) //загружаем файл в целевую папку
                {
                    echo "File".$fileName." is successful downloaded <br>";
                    imgCopyResize($path, SMALLPATH, $newName);//обрезаем фото
                    $db = new DB("localhost", "root", "", "Photogallery");
                    $db->connection();//Подключаемся к базе
                    $sqlRecord = "INSERT INTO img(Name,Path,Tmp,smallPath) VALUES ('$fileName','$path','$fileTmp','$smallTargetDir')"; //Запрос на запись
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
    public function show(){
        $connect = mysqli_connect("localhost", "root", "", "HW5");//Подключаемся к базе
        $sqlGetData = "SELECT * From img ORDER BY 'num' DESC";//Запрос на чтение
                    $res = mysqli_query($connect, $sqlGetData);//Читаем данные из таблицы

                    while ($data = mysqli_fetch_assoc($res))
                    {

                        echo "<figure>
                            <a href=\"view.php?id={$data['Id']}\" target=\"_self\">
                            <img src=\"{$data['smallPath']}\" alt=\"{$data['Name']}\" >
                            </a>
                            <figcaption>Просмотров: {$data['num']}</figcaption>
                            </figure>";
                    }

                
    }
    
}

