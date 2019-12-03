<?

namespace app\controllers;

class Truck{
     public function indexAction(){
      $db = self::queryDb();
        $res = mysqli_query($db, "SELECT * FROM driver");
        $data = mysqli_fetch_all($res, MYSQLI_ASSOC);
        foreach ($data as $item) {
        echo "Номер: {$item['id']} <br>";
        echo "Имя: {$item['name']} <br>";
        echo "Цена: {$item['price']} <br>";
        echo "<a href='delete?del_id={$item['id']}'>Удалить</a>";
        echo "<br>";
        echo "<a href='update?up_id={$item['id']}'>Изменить</a>";
        echo "<hr>";
        }
         echo "<a href='add'>Добавить</a>";
     }
    
    
    
    public function addAction($name, $price){
    $db = self::queryDb();
	$insert = mysqli_query($db, "INSERT INTO driver (name, price) VALUES ('$name', '$price')");
    if($insert) echo 'OK';
    else echo 'Error';
    echo mysqli_error($db);
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