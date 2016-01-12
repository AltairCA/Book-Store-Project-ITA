<?php

if(isset($_FILES['file']))
{
		$file=$_FILES['file'];
		//Check the file
		$name=$_POST['name'];
		
		
		$file_name=$file['name'];
		$file_tmp=$file['tmp_name'];
		$file_size=$file['size'];
		$file_error=$file['error'];
		$message='File Successfully Uploaded!';
		//to identify the extension_loaded
		
		$file_ext=explode('.',$file_name);
		//print_r($file_ext);
		$file_ext=strtolower(end($file_ext));
		
		$allowed=array('txt','epub','pdf');
		
		if(in_array($file_ext,$allowed))
		{
			if($file_error===0)
			{ if($file_size<=100000000)
				{$file_name_new=uniqid('',true).'.'.$file_ext;
				 $file_destination='uploads/'.$file_name_new;
				 
					if(move_uploaded_file($file_tmp,$file_destination)){
					//echo $file_destination;
					echo $message;
					echo '<br>';
					echo '<a href="webooks"> Click here to get redirected to WeBooks!</a>';
					}

					}
					}
					}
					
					else
					echo "Please choose an Epub,pdf or an text file";
					echo "<br>";
					echo $name;
					echo '<a href="user.html"> Click here to get redirected to previous site</a>';
					}
				
		
		
		
		
		
?>