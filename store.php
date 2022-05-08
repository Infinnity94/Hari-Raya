<?php
    require_once "koneksi.php";

    
// Define variables and initialize with empty values
$id = 0;
$nama = $pesan = "";
$nama_err = $pesan_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $input_nama = trim($_POST["nama"]);
    if(empty($input_nama)){
        $nama_err = "isi nama";
    }else{
        $nama = $input_nama;
    }
    
    $input_pesan = trim($_POST["pesan"]);
    if(empty($input_pesan)){
        $pesan_err = "isi pesan";
    }else{
        $pesan = $input_pesan;
    }


    // Check input errors before inserting in database
    if(empty($nama_err) && empty($pesan_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO pengunjung (id, nama, pesan) VALUES (?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_id, $param_nama, $param_pesan);

            // Set parameters
            $param_id = $id;
            $param_nama = $nama;
            $param_pesan = $pesan;
             

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
}
?>