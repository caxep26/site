<h1>Элементы</h1>
<?
//Шаблон вывода списка элементов
// формат: имя элемента (раздел)
if (is_array($arResult)){
	foreach ($arResult as $element) {
		echo $element['NAME'].' ('.$element['IBLOCK_NAME'].')';
		echo "<br>";
	}
}
?>
