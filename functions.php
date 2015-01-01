<?php

add_filter( 'formatted_woocommerce_price', 'wc_indian_price_html', 100, 1 );
function wc_indian_price_html( $price ){

    $explrestunits = "" ;
    if(strlen($price)>3){
        $lastthree = substr($price, strlen($price)-3, strlen($price));
        $restunits = substr($price, 0, strlen($price)-3); // extracts the last three digits
        $restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
        $expunit = str_split($restunits, 2);
        for($i=0; $i<sizeof($expunit); $i++){
            // creates each of the 2's group and adds a comma to the end
            if($i==0)
            {
                $explrestunits .= (int)$expunit[$i].","; // if is first value , convert into integer
            }else{
                $explrestunits .= $expunit[$i].",";
            }
        }
        $thecash = $explrestunits.$lastthree;
    } else {
        $thecash = $price;
    }
    return $thecash;
}

?>
