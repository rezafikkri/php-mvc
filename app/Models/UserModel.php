<?php

class UserModel
{
    private $nama = 'Reza Sariful Fikri';

    public function getUser(): string
    {
        return $this->nama;
    }
 }
