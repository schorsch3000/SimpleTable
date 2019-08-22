<?php
require __DIR__ . '/vendor/autoload.php';
ob_start();
use \Bramus\Ansi\Ansi;
use \Bramus\Ansi\Writers\StreamWriter;
use \Bramus\Ansi\ControlSequences\EscapeSequences\Enums\SGR;
$table = new SimpleTable\Table();
$table->setUnDecorator(new \SimpleTable\UnDecorator\SymfonyConsole());
$row = $table->getEmptyRow();

$cell = $row->getEmptyCell();
$cell->setValue('aaaaa');

$row->addCell($cell);

$cell = $row->getEmptyCell();
$cell->setValue('bbbbb');
$row->addCell($cell);

$cell = $row->getEmptyCell();
$cell->setValue('ccccc');
$row->addCell($cell);

$table->addRow($row);



$row = $table->getEmptyRow();
$cell = $row->getEmptyCell();
$cell->setValue('aaa');
$cell->setPadding(\SimpleTable\Table::PAD_RIGHT);
$row->addCell($cell);
$cell = $row->getEmptyCell();
$cell->setValue('bbb');
$cell->setPadding(\SimpleTable\Table::PAD_BOTH);
$row->addCell($cell);
$cell = $row->getEmptyCell();
$row->addCell('ccc');
$cell->setPadding(\SimpleTable\Table::PAD_LEFT);
$table->addRow($row);


$row = $table->getEmptyRow();
$cell = $row->getEmptyCell();
$cell->setValue('<fg=red>aaa</>');
$row->addCell($cell);
$table->addRow($row);

echo $table,"\n\n\n";


$table=new \SimpleTable\KeyValueTable();
$table->addRow("Username","Bob");
$table->addRow("Hair Color","Green");
$table->addRow("Toe Count","9");
$table->addRow("Job","carpenter");

echo $table,"\n\n\n";




$table=new \SimpleTable\KeyValueTable();
$table->setUnDecorator(new \SimpleTable\UnDecorator\ANSI());
$table->addRow("Carl","Username");
$table->addRow('[91mRed[0m and [92mGreen[0m',"Hair Color");
$table->addRow("12","Toe Count");
$table->addRow("Clown","Job");
echo $table,"\n\n\n";




$table=new \SimpleTable\KeyValueTable();
$table->addRow("Carl","Username");
$table->addRow('[91mRed[0m and [92mGreen[0m',"Hair Color");
$table->addRow("12","Toe Count");
$table->addRow("Clown","Job");


echo $table;