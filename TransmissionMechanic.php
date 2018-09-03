<?php

require_once 'Transmission.php';

class TransmissionMechanic
{
    use TransmissionMode;

    protected $gear;

    public function getGear()
    {
        return $this->gear;
    }

    public function setGear($gear)
    {
        $this->gear = $gear;
        echo "Включена <b>$gear</b> передача" . '<br>';
    }
}