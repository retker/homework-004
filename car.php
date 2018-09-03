<?php

require_once 'engine.php';
require_once 'TransmissionMechanic.php';

interface Movable
{
    public function move($distance, $speed, $direction);
}


abstract class A_Car implements Movable
{
    protected $engine;
    protected $transmission;
    protected $totalCoveredDistanse;
    protected $distanseFromStart;

    public function __construct($enginePower, $transmissionType)
    {
        $this->engine = new Engine($enginePower);
        $this->transmission = $transmissionType;
        if ($this->transmission = 'Mechanic') {
            $this->transmission = new TransmissionMechanic();
        } else {
            $this->transmission = new TransmissionAuto();
        }
        $this->totalCoveredDistanse = 0;
        $this->distanseFromStart = 0;
    }
}


class Car extends A_Car
{

    // Дистанция, пройденная за время вызова move
    private $dist;

    private function start()
    {
        $this->engine->on();
        $this->dist = 0;
    }

    private function stop()
    {
        $this->engine->off();
    }

    // Двигаемся
    public function move($distance, $speed, $direction = 'forward')
    {
        $this->start();
        $this->transmission->setMode($direction);
        if (($this->transmission instanceof TransmissionMechanic) && ($direction == 'forward')) {
            ($speed < 20) ? $this->transmission->setGear(1) : $this->transmission->setGear(2);
        }

        $delta = 0.0;
        while ($this->dist < $distance) {
            usleep(100000); // интервал 0.1 сек
            $this->dist += $speed * 0.1;

            // Рассчитываем нагрев двигателя
            $delta += $speed * 0.1;
            if ($delta >= 10) {
                echo "Проехали <b>$this->dist</b> метров <br>\n";
                flush();
                // Двигатель греется
                $this->engine->heat(5 * intdiv($delta, 10));
                $delta = 0.0;
            }
        }

        $this->stop();

        // Общий пробег
        $this->totalCoveredDistanse += $this->dist;

        // Расстояние от начала пути
        if ($direction == 'backward') {
            $this->distanseFromStart -= $this->dist;
        } else {
            $this->distanseFromStart += $this->dist;
        }

        echo "Находимся на расстоянии $this->distanseFromStart метров от начальной точки" . '<br>';
        echo "Общий пробег = $this->totalCoveredDistanse метров " . '<br>' . '<br>';
        flush();
    }
}
