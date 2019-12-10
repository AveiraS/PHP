#!/usr/bin/php
<?php

/*
preg_replace_callback ( mixed $pattern , callable $callback , mixed $subject [, int $limit = -1 [, int &$count ]] ) : mixed

subject | Строка или массив строк для поиска и замены.
pattern | Искомый шаблон. Может быть как строкой, так и массивом строк.
callback| Вызываемая callback-функция, которой будет передан массив совпавших элементов из строки subject.
Callback-функция должна вернуть строку с заменой. Callback-функция должна быть описана так:
  handler ( array $matches ) : string

*/

function change($matches){
  return ($matches[1].strtoupper($matches[2]).$matches[3]);
}
if ($argc > 1)
{
	$line = file_get_contents($argv[1]);
  $line = preg_replace_callback("/(<.*title=\")(.*)(\">)/i", "change", $line);
  $line = preg_replace_callback("/(<.*title=\")(.*)(><span)/i", "change", $line);
  $line = preg_replace_callback("/(<div.*>)(.*)(<\/div)/i", "change", $line);
  $line = preg_replace_callback("/(<span.*>)(.*)(<div)/i", "change", $line);
	$line = preg_replace_callback("/(<a.*>)(.*)(<\/a)/i", "change", $line);
	$line = preg_replace_callback("/(<a.*>)(.*)(<img)/i", "change", $line);
	echo "$line";
}
?>