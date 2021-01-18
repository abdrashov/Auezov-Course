import bsCustomFileInput from 'bs-custom-file-input';

// Hover Сообшение
$(function () {
	$('[data-tooltip="tooltip"]').tooltip()
});

// Плагин для изменение текста файла input
$(document).ready(function () {
	bsCustomFileInput.init()
})