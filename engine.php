<pre>
<?php

require_once 'cooler.php';

class Engine
{
    protected $power;
    protected $temperature;
    protected $cooler;

    public function __construct($power)
    {
        $this->power = $power;
        $this->temperature = 20;
        $this->cooler = new Cooler();
    }

    public function on()
    {
        echo PHP_EOL;
        echo "<b>Двигатель включен</b>" . PHP_EOL;
    }

    public function off()
    {
        echo PHP_EOL;
        echo "<b>Двигатель выключен</b>" . PHP_EOL;
    }

    public function heat($increase)
    {
        $this->temperature += $increase;
        echo "Температура двигателя = $this->temperature <per>&deg" . PHP_EOL;

        if ($this->temperature >= 90) {
            $this->cool();
        }
    }

    private function cool()
    {
        $this->cooler->on();
        $this->temperature -= 10;
        $this->cooler->off();
    }
}
