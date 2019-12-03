<?

namespace app\controllers;

class Update{
    
    
    public function indexAction(){
        $id = $_GET['up_id'];
            echo '<form action="update/form?up_id=',$id,'" method="post">';
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
        
        $update = mysqli_query($db, "UPDATE `driver` SET `name` = '{$_POST['name']}', `price` = '{$_POST['price']}'  WHERE `id` = {$_GET['up_id']}");
                if ($update) {
              echo "<p>Запись обновлена</p>";
            } else {
              echo '<p>Произошла ошибка: ' . mysqli_error($db) . '</p>';
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