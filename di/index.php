<?php


namespace App{

    require_once __DIR__ . '/../vendor/autoload.php';

    use Monolog\Logger;
    use Monolog\Handler\StreamHandler;

    class Sample{

        const LOG_FILE_PATH = './smaple.log';
    
        private $logger = null;
    
        public function __construct()
        {
            $this->logger = new Logger('sample_log');
            $this->logger->pushHandler(new StreamHandler(self::LOG_FILE_PATH), Logger::WARNING);
        }
    
        public function doSomething()
        {
            $this->logger->info('doSomething successed!');
        }
    }

}

namespace HolidayMan{

    class HolidyManA{
        public function wakeup()
        {
            return 'Good Mornig! at 8:00';
        }
        public function shower()
        {
            return 'YEs!yes!Yes! at 8:30';
        }
        public function work()
        {
            return 'zzz....      at 10:00';
        }
        public function goHome()
        {
            return 'hyoooo!!     at 18:00';
        }
    }
}

namespace ScheduleController{

    use HolidayMan;

    class ScheduleController{
        public function view()
        {
            $holidayManA = new HolidayMan\HolidayManA();
            echo $holidayManA->wakeup();
            echo $holidayManA->shower();
            echo $holidayManA->work();
            echo $holidayManA->goHome();
        }
    }

}


namespace Main{

    use App;
    use ScheduleController;

    $sample = new App\Sample();
    $sample->doSomething();

    $manA = new ScheduleController\ScheduleController();


}



