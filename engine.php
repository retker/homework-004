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
        echo "<b>Двигатель включен</b>" . '<br>';
    }

    public function off()
    {
        echo PHP_EOL;
        echo "<b>Двигатель выключен</b>" . '<br>';
    }

    public function heat($increase)
    {
        $this->temperature += $increase;
        echo "Температура двигателя = $this->temperature <per>&deg" . '<br>';

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
