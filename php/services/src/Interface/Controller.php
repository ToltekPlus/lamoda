<?php

namespace App\Interface;

interface Controller {
    public function index(): DTO;

    public function all(): DTO;

    public function getById(string $id): DTO;
}