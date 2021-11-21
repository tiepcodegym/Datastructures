<?php

class SquareDance
{
    protected $queueMale;
    protected $queueFemale;

    public function __construct()
    {
        $this->queueMale = new SplQueue();
        $this->queueFemale = new SplQueue();
    }

    public function addDance($dance)
    {
        if ($dance->getGender() == GenderInterface::MALE) {
            $this->queueMale->enqueue($dance);
        } else {
            $this->queueFemale->enqueue($dance);
        }
    }

    public function pairDance()
    {
        $result = '';
        while (!$this->queueFemale->isEmpty() || !$this->queueMale->isEmpty()) {
            if ($this->queueMale->isEmpty()) {
                return count($this->queueFemale) . 'nu dang cho' . '<br>';
            }

            if ($this->queueFemale->isEmpty()) {
                return count($this->queueMale) . 'nam dang cho' . '<br>';
            }

            echo 'cap: ' .$this->queueMale->dequeue()->getName() . '-' . $this->queueFemale->dequeue()->getName() . '<br>';
        }


    }

    /**
     * @return SplQueue
     */
    public function getQueueFemale()
    {
        return $this->queueFemale;
    }

    /**
     * @return SplQueue
     */
    public function getQueueMale()
    {
        return $this->queueMale;
    }
}
?>