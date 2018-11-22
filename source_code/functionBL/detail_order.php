<?php
     require_once $_SERVER['DOCUMENT_ROOT'].'/database/detail_order.php';
     require_once $_SERVER['DOCUMENT_ROOT'].'/entities/detail_order.php';
     class detailOrderBL{
         function detailOrder($product,$quantityOneProduct,$priceProduct,$totalMoneyProductOrder,$idOrder){
                $detailOrder= new detailOrder();
                $detailOrderDB=new detailOrderDB();
                $detailOrder->setProduct($product);
                $detailOrder->setQuantityOneProduct($quantityOneProduct);
                $detailOrder->setPriceProduct($priceProduct);
                $detailOrder->setTotalMoneyProductOrder($totalMoneyProductOrder);
                $detailOrder->setIdOrder($idOrder);
                return $detailOrderDB->insertDetailOrder($detailOrder);

         }
         function getLstProductOrder($idOrder){
            $detailOrderDB=new detailOrderDB();
            return  $detailOrderDB->getDetailOrderFollowUser($idOrder);
         }

        
     }
     
   
?>  