<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Manage Medicines Stock</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<script src="bootstrap/js/jquery.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="shortcut icon" href="images/icon.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/sidenav.css">
    <link rel="stylesheet" href="css/home.css">
    <script src="js/manage_medicine_stock.js"></script>
    <script src="js/validateForm.js"></script>
    <script src="js/restrict.js"></script>
  </head>
  <body>
    <!-- including side navigations -->
    <?php include("sections/sidenav.html"); ?>

    <div class="container-fluid">
      <div class="container">

        <!-- header section -->
        <?php
          require "php/header.php";
          createHeader('shopping-bag', 'Управление запасами медикаментов', 'Управление существующими запасами медикаментов');
        ?>
        <!-- header section end -->

        <!-- form content -->
        <div class="row">

          <div class="col-md-12 form-group form-inline">
            <label class="font-weight-bold" for="">Поиск :&emsp;</label>
            <input type="text" class="form-control" id="by_name" placeholder="По названию медицины" onkeyup="searchMedicineStock(this.value, 'NAME');">
            &emsp;<input type="text" class="form-control" id="by_generic_name" placeholder="По общему названию" onkeyup="searchMedicineStock(this.value, 'GENERIC_NAME');">
            &emsp;<input type="text" class="form-control" id="by_suppliers_name" placeholder="По имени поставщика" onkeyup="searchMedicineStock(this.value, 'SUPPLIER_NAME');">
            &emsp;<button class="btn btn-danger font-weight-bold" onclick="searchMedicineStock('0', 'QUANTITY');">Нет в наличии</button>
            &emsp;<button class="btn btn-warning font-weight-bold" onclick="searchMedicineStock('', 'EXPIRY_DATE');">Просроченный</button>
            &emsp;<button class="btn btn-success font-weight-bold" onclick="cancel();"><i class="fa fa-refresh"></i></button>
          </div>


          <div class="col col-md-12">
            <hr class="col-md-12" style="padding: 0px; border-top: 2px solid  #02b6ff;">
          </div>

          <div class="col col-md-12 table-responsive">
            <div class="table-responsive">
            	<table class="table table-bordered table-striped table-hover">
            		<thead>
            			<tr>
            				<th style="width: 1%;">SL.</th>
            				<th style="width: 14%;">Название лекарства</th>
                    <th style="width: 5%;">Упаковка</th>
                    <th style="width: 14%;">Общее название</th>
                    <th style="width: 10%;">Серийный ID</th>
                    <th style="width: 8%;">Ист. дата (mm/yy)</th>
            				<th style="width: 15%;">Поставщик</th>
                    <th style="width: 7%;">Кол-во.</th>
                    <th style="width: 8%;">M.R.P.</th>
                    <th style="width: 8%;">Оценка</th>
                    <th style="width: 10%;">Действие</th>
            			</tr>
            		</thead>
                <tbody id="medicines_stock_div">
                  <?php
                    require 'php/manage_medicine_stock.php';
                    if(isset($_GET['out_of_stock']))
                      echo "<script>searchMedicineStock('0', 'QUANTITY');</script>";
                    else if(isset($_GET['expired']))
                      echo "<script>searchMedicineStock('', 'EXPIRY_DATE');</script>";
                    else
                      showMedicinesStock("0");
                  ?>
            		</tbody>
            	</table>
            </div>
          </div>

        </div>
        <!-- form content end -->
        <hr style="border-top: 2px solid #ff5252;">
      </div>
    </div>
  </body>
</html>
