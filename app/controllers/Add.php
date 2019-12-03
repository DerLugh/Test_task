<?

namespace app\controllers;

class Add{
    
    public function indexAction(){
        echo '<form action="add/form" method="get">';
            echo       '<table>';
            echo         '<tr>';
            echo          '<td>Имя:</td>';
            echo           '<td><input type="text" name="name" value="">';
            echo '</td>';
            echo        '</tr>';
            echo        '<tr>';
            echo         '<td>Цена:</td>';
            echo         '<td><input type="text" name="price" size="3" value=""> руб.</td>';
            echo      '</tr>';
            echo     '<tr>';
            echo        '<td colspan="2"><input type="submit" value="OK" ></td>';
            echo     '</tr>';
            echo  '</table>';
            echo ' </form>';
 
    }
    
    public function formAction(){
         $db = self::queryDb();
        $name = $_GET['name'];
        $price = $_GET['price'];
	$insert = mysqli_query($db, "INSERT INTO driver (name, price) VALUES ('$name', '$price')");
    if($insert) echo 'OK, запись добавлина';
    else echo 'Error';
    echo mysqli_error($db);
      echo "<a href='../truck'>К грузовкам</a>";
    }
    
    
    
    
    
    protected static function queryDb(){
        
        $db = mysqli_connect("5.23.49.58", "chilli_test", "QsKbSHGTWh", "chilli_test");
        if (!$db) {
        echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
        echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
        exit;
        }else{
        echo "<h1>База подключина</h1>";
        };
        mysqli_set_charset ($db, "utf8");
        return $db;
                                }
        
        
    
}