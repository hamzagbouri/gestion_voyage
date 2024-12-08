<?php
include("../database/db.php");
$query  = "SELECT * from reservation";
$allReservations = $connection-> query($query);
if(!$allReservations)
{
    echo "<script> alert('error getting clients') </script>";
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style >
 
        input[type="search"]::-webkit-search-cancel-button
        {
        -webkit-appearance:none;
        }
        td {
            border-bottom-width: 1px ;
            border-collapse: collapse;
            

        }
       
    </style>
     <script>
        tailwind.config = {
          theme: {
            screens: {
                'md': '768px',
            },
         
            extend: {
              colors: {
                primary: '#5051FA',
                borderColor: '#5f5d5d',
                bgcolor: '#F3F3F3',
                
              },
              fontFamily: {
                'title': ['Poppins','sans-serif'],
                'bigTitle':  ['"Myriad Pro"', 'sans-serif'],
              }
            }
          }
        }
      </script>
</head>
<body>
<?php include('../components/header.php')?>
<section class="p-4 w-full flex flex-col gap-8">
        <?php
            if (isset($_SESSION['error'])) {
                set_time_limit(2);  
                echo $_SESSION['error'];  
                unset($_SESSION['error']);  
            }
            ?>
            
            <div class="flex justify-between items-center px-8">
                <h1>
                    Clients
                </h1>
               <div class="flex gap-4">
                    <button class="flex gap-2 items-center border px-4 py-2 rounded-lg text-[#0E2354] ">
                        <img src="/Gestion Voyage/img/Downlaod.svg" alt="">Export
                    </button>
                    <button id="add-etd" onclick=" document.getElementById('modal').style.display = 'flex'" class="flex gap-2 items-center bg-[#4790cd] px-4 py-2 rounded-lg text-white ">
                        <img src="/Gestion Voyage/img/_Avatar add button.svg" alt="">New Client
                    </button>
               </div>
            </div>

            <div class="flex justify-between items-center px-4 border py-4 rounded-lg">
                <div class="flex gap-2">
                    <img src="/Gestion Voyage/img/Search.svg" alt="">
                    <input class="search outline-none border-none w-72 px-4 py-2 rounded-2xl" type="search" name="search-input" id="search-input" placeholder="Search Trainers by name...">
                </div>
               <div class="flex gap-4 items-center">
                    <button class="flex gap-2 items-center border px-4 py-2 rounded-lg">
                        <img src="/Gestion Voyage/img/Filters lines.svg" alt="">Filters
                    </button>
                    <div class="flex gap-2">
                        <img class="px-4 py-3 border rounded-lg cursor-pointer" src="/Gestion Voyage/img/Vector.svg" alt="">
                        <img class="px-4 py-2 border rounded-lg cursor-pointer" src="/Gestion Voyage/img/element-3.svg" alt="">
                    </div>
               </div>
            </div>
            <div>
                <table class="w-full border rounded-lg" >
                    <tr class="bg-gray-200 border-b  items-center ">
                    <td class="text-center w-10 "> <input type="checkbox" name="" id=""></td>
                      <td>&nbsp;Client Name</td>
                      <td>&nbsp;Activity Title</td>
                      <td>&nbsp;Date Reservation</td>
                      <td>&nbsp;Status</td>
                      <td>&nbsp;Action</td>
                    </tr>
                    <?php
                      foreach ($allReservations as $row2)
                      {
                        $id = htmlspecialchars($row2['id_reservation']);
                        $date_reservation = htmlspecialchars($row2['date_reservation']);
                        $status = htmlspecialchars($row2['status']);
                       

                        $getClientInfoQuery = "SELECT nom from client join reservation on client.id_client = reservation.id_client where id_reservation = $id;";
                        $resultGetClientInfoQuery = $connection->query($getClientInfoQuery);
                        $rowName = $resultGetClientInfoQuery-> fetch_assoc();
                        $nomClient = $rowName['nom'];       
                        $getActivityInfoQuery = "SELECT titre from activite join reservation on activite.id_activite = reservation.id_activite where id_reservation = $id;";
                        $resultGetActiviteInfoQuery = $connection->query($getActivityInfoQuery);
                        $rowTitle = $resultGetActiviteInfoQuery-> fetch_assoc();
                        $titleActivity = $rowTitle['titre'];                   

                        echo " <tr>
                        <td class='text-center w-10'> <input type='checkbox' name='' id='' ></td>
                        <td>&nbsp;$nomClient</td>
                        <td>&nbsp;$titleActivity</td>
                        <td>&nbsp;$date_reservation</td>
                        <td>&nbsp;$status</td>

                    <td>
                        <a href='deleteStudent.php?id= ".$row2['id_client']."'>delete</a>
                        <button >
                            edit
                        </button>
                    </td> ";
                   
                    }
                    
                    ?>
                    
                 </table>
            </div>
        </section>
    
</body>
</html>