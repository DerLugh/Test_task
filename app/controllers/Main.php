<?

namespace app\controllers;

class Main{
     public function indexAction(){
          echo "<h1>Добро пожаловать на наш сайт!</h1>";
            echo "<a href='truck'>К грузовкам</a>";
     }
    
    public function testAction(){
         echo 'Main::test';
     }
    
    public function testPageAction(){
         echo 'Main::testPage';
     }
}