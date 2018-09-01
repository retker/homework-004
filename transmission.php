<pre>
<?php

trait TransmissionMode
{
    protected $mode;

    public function getMode()
    {
        return $this->mode;
    }

    public function setMode($mode)
    {
        $this->mode = $mode;
        if ($mode == 'forward') {
            echo 'Едем вперед' . PHP_EOL;
        } else {
            echo 'Едем назад' . PHP_EOL;
        }
    }
}

class TransmissionAuto
{
    use TransmissionMode;
}

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
        echo "Включена <b>$gear</b> передача" . PHP_EOL;
    }
}
