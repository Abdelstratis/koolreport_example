<!DOCTYPE html>
<html lang="en" dir="ltr">

  <body>
    <style type="text/css">

          body{
            font-family:  cursive;
          }

          tr th:first-child
          {
            background-color:#2A4A6D;
            border: 0;
            color: white;
          }
          tr th:nth-child(2)
          {
            background-color:#AAAAAA;
            border: 0;
            color: white;
          }
          tr th:nth-child(3)
          {
            background-color:#ED7D31;
            border: 0;
            color: white;
          }
          tr th:nth-child(4)
          {
            background-color:#4472C4;
            border: 0;
            color: white;
          }
          tr th:nth-child(5)
          {
            background-color:#2A4A6D;
            border: 0;
            color: white;
          }
          tr th:nth-child(6)
          {
            background-color:#86AECC;
            border: 0;
            color: white;
          }
          tr th:nth-child(7)
          {
            background-color:#3BC1C2;
            border: 0;
            color: white;
          }
    </style>
  </body>
</html>
<?php
//Step 1: Load KoolReport
require_once "core/autoload.php";

use \koolreport\processes\ColumnMeta;
use \koolreport\processes\Filter;

//Step 2: Creating Report class
class MyReport extends \koolreport\KoolReport
{
    protected function settings()
    {
        return array(
            "dataSources"=>array(
                "data"=>array(
                    "class"=>'\koolreport\datasources\CSVDataSource',
                    "filePath"=>"orders.csv",
                    "dataFormat"=>"table",
                    "data"=>array(
                        array("service","titre1","titre2","titre3","titre4","titre5","titre6")
                    ),
                    "colorScheme"=>array(
                        "#e7717d",
                        "#c2cad0",
                        "#c2b9b0",
                        "#7e685a",
                        "#7e685a",
                        "#7e685a",
                        "#afd275"
                    )

                )
            )
        );
    }
    protected function setup()
    {
        //Prepare data
        $this->src("data")
        ->pipe(new ColumnMeta(array(
            "age"=>array(
                "type"=>"number"
            )
        )))
        ->pipe($this->dataStore("data"));
    }
}
