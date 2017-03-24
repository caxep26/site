<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
/*
* Переменные
*
* $name - имя из GET запроса для последующей выборки
* $arSelect - Список полей которые вернет функция CIBlockElement::GetList
* $elementCount - Количество отображаемых элементов
* $arFilter - Фильтр
*
*/
$name = htmlspecialchars($_GET["name"]);
$arSelect = Array("NAME", "IBLOCK_NAME");
$elementCount = 10;
$arFilter = array("NAME" => '%'.$name.'%');


CModule::IncludeModule('iblock');
if ($this->StartResultCache(1800, $name)){
  $db_list = CIBlockElement::GetList(
                                array('NAME'=>'ASC'),
                                $arFilter,
                                false,
                                Array ("nTopCount" => $elementCount),
                                $arSelect
                              );

  while($ar_result = $db_list->GetNext()) {
    $arResult[] = array(
                    'NAME' => $ar_result['NAME'],
                    'IBLOCK_NAME' =>   $ar_result['IBLOCK_NAME']
                  );
  }
  $this->IncludeComponentTemplate();
}
?>
