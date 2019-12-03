<?

namespace app\controllers;

class Delete{
    
    public function indexAction($select_id){
         $db = self::queryDb();
    if (isset($_GET['del_id'])) { 
    $delete = mysqli_query($db, "DELETE FROM `driver` WHERE `id` = {$_GET['del_id']}");
    if ($delete) {
      echo "<p>удалено</p>";
    } else {
      echo '<p>Произошла ошибка: ' . mysqli_error($db) . '</p>';
    }
  }
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