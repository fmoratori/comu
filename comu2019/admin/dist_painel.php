<?
include "./mysqlconecta.php";
include "./mysqlexecuta.php";

	$sql10 = "SELECT * FROM tb_areas ORDER BY id ASC";
	$res10 = mysqlexecuta($id,$sql10);
	while($row10 = mysql_fetch_array($res10)){
	$z=$row10['id'];
    $sql_trabalhos = "SELECT * FROM tb_trabalhos WHERE `area_id` = $z AND `status`=4 ORDER BY `premio` ASC";
    $res_trabalhos = mysqlexecuta($id,$sql_trabalhos);
        $x=1;
        while($row_trabalhos = mysql_fetch_array($res_trabalhos)){
            $trabalho = $row_trabalhos['id'];
            if($x<10){
                $painel = '00'.$x;
            }
            else{
                $painel = '0'.$x;
            }
           $sql_painel = "UPDATE `fmsys_eventos`.`tb_trabalhos` SET `painel`='$painel' WHERE `id`=$trabalho";
           echo $sql_painel."<br />";
           $res_painel = mysqlexecuta($id,$sql_painel);
           $x++;
        }

    }
?>
