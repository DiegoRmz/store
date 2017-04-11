<?php
	$con = mysql_connect("localhost","alejandro","brandy01");
	if (!$con){
		die("No se podido realizar la conexión a la base de datos, error: ".mysql_error."<br>");
	}
	else{ echo "Conexión establecida<BR>";
	}

	 mysql_select_db("dbferre_ajgg", $con);
	
		$sql= "CREATE TABLE tb_client(
		cli_no INT NOT NULL AUTO_INCREMENT,
		cli_status	CHAR(1) NOT NULL,
        cli_name VARCHAR(60) NOT NULL,
        cli_email VARCHAR(60) NOT NULL,
        cli_phone VARCHAR(10) NOT NULL,
        cli_movil VARCHAR(10) NOT NULL,
        cli_key VARCHAR(20) NOT NULL,
		PRIMARY KEY(cli_no),
		);";
		
		$sql= "CREATE TABLE tb_facility(
		fac_no INT NOT NULL AUTO_INCREMENT,
        cli_no INT NOT NULL,
		fac_name VARCHAR(60) NOT NULL,
        fac_street VARCHAR(70) NULL,
        fac_suburb VARCHAR(70) NULL,
        fac_town VARCHAR(70) NULL,
        fac_city VARCHAR(70) NULL,
        fac_state VARCHAR(3) NULL,
        fac_zip VARCHAR(5) NULL,
		PRIMARY KEY(fac_no),
		FOREIGN KEY (cli_no) REFERENCES tb_client(cli_no)
        );";

		$sql= "CREATE TABLE tb_department(
		dep_no	VARCHAR(3)	NOT NULL,
        dep_name	VARCHAR(60)	NOT NULL,
		PRIMARY KEY(dep_no),
		);";

		$sql= "CREATE TABLE tb_product(
        pro_stock	INT	NOT NULL,
		dep_no VARCHAR(3) NOT NULL,
		pro_sku VARCHAR(10) NOT NULL,
        pro_status	CHAR(1) NOT NULL,
        pro_name	VARCHAR(30) NOT NULL,
        pro_brand	VARCHAR(30)	NOT NULL,
        pro_model	VARCHAR(30)	NOT NULL,
        pro_image	VARCHAR(30)	NOT NULL,
        pro_description	VARCHAR(140) NOT NULL,
        pro_price	Decimal(8,2) NOT NULL,
		PRIMARY KEY(pro_sku),
		FOREIGN KEY (dep_no) REFERENCES tb_department(dep_no)
        );";
		
		$sql= "CREATE TABLE tb_header_order(
		ord_no	INT	NOT NULL AUTO_INCREMENT,
		cli_no	INT	NOT NULL,
		fac_no	INT	NOT NULL,
		ord_status	CHAR(1)	NOT NULL,
		ord_date	DATE	NOT NULL,
		ord_Total	Decimal(8,2) NOT NULL,
		PRIMARY KEY(ord_no),
		FOREIGN KEY (cli_no) REFERENCES tb_client(cli_no),
		FOREIGN KEY (fac_no) REFERENCES tb_client(fac_no)
		);";
		
		$sql= "CREATE TABLE tb_order(
		ord_no	INT	NOT NULL,
		ord_item INT	NOT NULL,
		pro_sku	INT	NOT NULL,
		ord_prdname VARCHAR(30) NOT NULL,
		ord_pices	INT	NOT NULL,
		ord_unit_price	Decimal(8,2)	NOT NULL,
		ord_total	Decimal(8,2)	NOT NULL,
		PRIMARY KEY(ord_no, ord_item),
		FOREIGN KEY (pro_sku) REFERENCES tb_product(pro_sku),
		);";
		
		
		echo $res= mysql_query($sql,$con).mysql_error();

		mysql_close($con);

		?>