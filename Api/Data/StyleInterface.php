<?php

namespace Wayne\ButtonStyle\Api\Data;

interface StyleInterface
{
    const ID =  'id';
    const COLOR = 'color';

    public function getId();
    public function setId($id);
    public function getColor();
    public function setColor($color);
}
