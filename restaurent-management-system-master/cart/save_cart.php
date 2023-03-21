<?php
	session_start();

    function find_index($id)
    {
        if(isset($_SESSION['qty_array'])){
        
            $qs = count($_SESSION['qty_array']);
            
            for($x=0; $x < $qs; $x++)
            {
                if($_SESSION['qty_array'][$x][0] == $id)
                {
                    return $x; 
                }
            }
        }   
    }
	if(isset($_POST['save'])){
		foreach($_POST['indexes'] as $key){

			$_SESSION['qty_array'][find_index($key)][1] = $_POST['qty_'.$key];
		}

		$_SESSION['message'] = 'Cart updated successfully';
		header('location: ../cart.php');
	}
?>