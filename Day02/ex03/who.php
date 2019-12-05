#!/usr/bin/php
<?php
/*
hexdump -C /var/run/utmpx
man endutxent

unpack ( string $format , string $data [, int $offset = 0 ] ) 
format кода форматов | data упакованные данные | offset cмещение.

a	| Строка (string) с NUL-заполнением
A	| Строка (string) со SPACE-заполнением
i	| Знаковый integer (машинно-зависимый размер и порядок)
I	| Беззнаковый integer (машинно-зависимый размер и порядок)

strftime ( string $format [, int $timestamp = time() ] ) : string
Форматирует дату/время с учетом текущих настроек локали.

%b | Название месяца, в соответствии с настройками локали	(Jan до Dec)
%e | День месяца, с ведущим пробелом, если он состоит из одной цифры.
%R | То же что и "%H:%M"
*/

date_default_timezone_set('Europe/Moscow');
$file = fopen('/var/run/utmpx', 'rb');
while ($str = fread($file, 628))
{
    $tab = unpack("A256login/A4/A32tty/i/itype/Itime/i16", $str);
    if ($tab['type'] == 7)
        echo($tab['login']."   ".$tab['tty']."  ".strftime("%b %e %R", $tab['time'])."\n");
}
?>