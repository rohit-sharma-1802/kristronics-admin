<?php

function conrvertAmountToWords($netTotal)
{
    $Amount = $netTotal;
    $main = $Amount;
    $No_0 = floor($Amount);
    $Paise = round($Amount - $No_0, 2) * 100;
    $No_1 = strlen($No_0);
    $No = 0;
    $Array = array();
    $Value = array(
        '',
        'Hundred',
        'Thousand',
        'Lakh',
        'Caror'
    );
    $Trans = array(
        '',
        'One',        'Two',        'Three',        'Four',        'Five',        'Six',        'Seven',        'Eight',        'Nine',        'Ten',
        'Eleven',        'Twelve',        'Thirteen',        'Fourteen',        'Fifteen',    'Sixteen',        'Seventeen',        'Eighteen',        'Nineteen',        'Twenty',
        'Twenty One',        'Twenty Two',        'Twenty Three',        'Twenty Four',        'Twenty Five',    'Twenty Six',        'Twenty Seven',        'Twenty Eight',        'Twenty Nine',        'Thirty',
        'Thirty One',        'Thirty Two',        'Thirty Three',        'Thirty Four',        'Thirty Five',    'Thirty Six',        'Thirty Seven',        'Thirty Eight',        'Thirty Nine',        'Forty',
        'Forty One',        'Forty Two',        'Forty Three',        'Forty Four',        'Forty Five',    'Forty Six',        'Forty Seven',        'Forty Eight',        'Forty Nine',        'Fifty',
        'Fifty One',        'Fifty Two',        'Fifty Three',        'Fifty Four',        'Fifty Five',    'Fifty Six',        'Fifty Seven',        'Fifty Eight',        'Fifty Nine',        'Sixty',
        'Sixty One',        'Sixty Two',        'Sixty Three',        'Sixty Four',        'Sixty Five',    'Sixty Six',        'Sixty Seven',        'Sixty Eight',        'Sixty Nine',        'Seventy',
        'Seventy One',        'Seventy Two',        'Seventy Three',    'Seventy Four',        'Seventy Five',    'Seventy Six',        'Seventy Seven',    'Seventy Eight',    'Seventy Nine',        'Eighty',
        'Eighty One',        'Eighty Two',        'Eighty Three',        'Eighty Four',        'Eighty Five',    'Eighty Six',        'Eighty Seven',        'Eighty Eight',        'Eighty Nine',        'Ninety',
        'Ninety One',        'Ninety Two',        'Ninety Three',        'Ninety Four',        'Ninety Five',    'Ninety Six',        'Ninety Seven',        'Ninety Eight',        'Ninety Nine'
    );
    while ($No < $No_1) {
        $No_1 = ($No == 2) ? 10 : 100;
        $No_2 = floor($No_0 % $No_1);
        $No_0 = floor($No_0 / $No_1);
        $No +=     ($No_1 == 10) ?: 2;
        if ($No_2) {
            $No_3 = (($Count = count($Array)) && $No_2 > 9) ? '' : null;
            $No_4 = ($Count == 1 &&  $Array[0]) ? '' : null;
            $Array[] = ($No_2 < 21) ? $Trans[$No_2] .
                ' ' . $Value[$Count] . $No_3 .
                ' ' . $No_4 : $Trans[floor($No_2 / 10) * 10] .
                ' ' . $Trans[$No_2 % 10] .
                ' ' . $Value[$Count] . $No_3 .
                ' ' . $No_4;
        } else $Array[] = null;
    }
    $Rupees = array_reverse($Array);
    $Rupees = implode('', $Rupees);
    $Paise = $Trans[$Paise];

return ($Rupees . ''); 
}
?>