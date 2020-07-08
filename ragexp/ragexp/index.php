<?php

$regexp = "!^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$!";

function parseInfo($regexp, $word)
{
    if (preg_match($regexp, $word))
        echo "+ found word '{$word}'\n";
    else
        echo "- nothing found\n";
}

function parseFile($descriptor, $regexp)
{
    if ($descriptor)
    {
        while (($word = fgets($descriptor)) !== false)
        {
            $word = substr($word, 0, -2);
            parseInfo($regexp, $word);
        }

        if (!feof($descriptor))
            echo "Error fgets()\n";
    }
    else
        echo "Error while open file\n";
}

function closeFiles($firstDescription, $secondDescription)
{
    if ($firstDescription)
        fclose($firstDescription);

    if ($secondDescription)
        fclose($secondDescription);
}

$correctNumbers = fopen("correctNumbers.txt", "r");
$uncorrectNumbers = fopen("uncorrectNumbers.txt", "r");

parseFile($correctNumbers, $regexp);
parseFile($uncorrectNumbers, $regexp);

closeFiles($correctNumbers, $uncorrectNumbers);


?>