<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../dbutil/Conn.class.php');
/**
 * Description of ItemDAO
 *
 * @author anderson
 */
class ServicoDAO extends Conn {
    //put your code here
    
    /** @var PDOStatement */
    private $Read;

    /** @var PDO */
    private $Conn;

    public function dados() {

        $select = " SELECT "
                    . " SERVICO_ID AS \"idServico\" " 
                    . " , CODIGO AS \"codServico\" "
                    . " , CARACTER(DESCR) AS \"descrServico\" " 
                . " FROM "
                    . " USINAS.V_SERVICOS_IND ";
        
        $this->Conn = parent::getConn();
        $this->Read = $this->Conn->prepare($select);
        $this->Read->setFetchMode(PDO::FETCH_ASSOC);
        $this->Read->execute();
        $result = $this->Read->fetchAll();

        return $result;
    
    }


}