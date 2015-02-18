<?php

/**
 * Функция для работы с шаблонами/представлением
 */

function view ($__view, $__data) {
	extract($__data);
	
	include BASEPATH . $__view;
}