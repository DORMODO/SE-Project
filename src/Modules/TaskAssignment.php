<?php

class TaskAssignment
{
    private string    $taskId;
    private string    $status;
    private string $volunteer;

    public function __construct(string $taskId, string $volunteer,  string $status)
    {
        $this->taskId      = $taskId;
        $this->volunteer = $volunteer;
        $this->status      = $status;
    }
}
