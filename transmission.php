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
            echo 'Едем вперед' . '<br>';
        } else {
            echo 'Едем назад' . '<br>';
        }
    }
}
