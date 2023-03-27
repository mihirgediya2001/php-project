<?php
	session_start();

    function find_index1($id)
    {
        if(isset($_SESSION['cart'])){
        
            $qs = count($_SESSION['cart']);
            
            for($x=0; $x < $qs; $x++)
            {
                if($_SESSION['cart'][$x] == $id)
                {
                    return $x; 
                }
            }
        }   
    }
    
    function find_index($id)
    {
        if(isset($_SESSION['qty_array'])){
        
            $qs = count($_SESSION['qty_array']);
            
            for($x=0; $x < $qs; $x++)
            {
                if($_SESSION['qty_array'][$x][0] == $id)
                {
                    print_r("$x");
                    return $x; 
                }
            }
        }   
    }
    
	//remove the id from our cart array
	$key = find_index1($_GET['id']);	
	unset($_SESSION['cart'][$key]);

	unset($_SESSION['qty_array'][find_index($_GET['id'])]);

    
	$_SESSION['cart'] = array_values($_SESSION['cart']);
	//rearrange array after unset
	$_SESSION['qty_array'] = array_values($_SESSION['qty_array']);

	$_SESSION['message'] = "Product deleted from cart";
	header('location: ../cart.php');
?>