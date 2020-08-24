<?php 

class Database {

    public static function StartUp() {

        $pdo = new PDO(
            'mysql:host=localhost;dbname=ishoppers;charset=utf8',
            'admin',
            '123'
        );

        // $options = array(
	    //     // PDO::MYSQL_ATTR_SSL_CA => '/BaltimoreCyberTrustRoot.crt.pem'
	    //     PDO::MYSQL_ATTR_SSL_CA => ''
        // );
        // $pdo = new PDO(
        //     'mysql:host=ishoppers.mysql.database.azure.com;port=3306;dbname=ishoppers',
        //     'admin_johan@ishoppers',
        //     'Uniempresarial123'
        //     );

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }

}
// http://ishoppersweb-env.eba-tq5mspmz.us-east-1.elasticbeanstalk.com/?c=Producto
?>