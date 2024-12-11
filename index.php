<?php
include("database/db.php");
$totalClientsQuery = "SELECT COUNT(*) as totalC from client";
$totalActiQuery = "SELECT COUNT(*) as totalA from activite";
$totalReservationQuery = "SELECT COUNT(*) as totalR from reservation";
$r1 = $connection->query($totalClientsQuery);
$r2 = $connection->query($totalActiQuery);
$r3 = $connection->query($totalReservationQuery);
if($r1)
{
  $ro1 = $r1->fetch_assoc();
  $totalClients = $ro1['totalC'];
}
if($r2)
{
  $ro2 = $r2->fetch_assoc();
  $totalActi = $ro2['totalA'];
}
if($r3)
{
  $ro3 = $r3->fetch_assoc();
  $totalRes = $ro3['totalR'];
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
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
<?php include('components/header.php')?>
    <section class="w-full h-full p-8 bg-[#f7f7f7]">
      <div class="w-full h-2/5 flex justify-around">
        <div class="w-[25%] bg-white h-4/5 drop-shadow rounded-lg flex flex-col">
          <div class="h-[10%]">
            <p class="text-center font-bold tracking text-title text-xl">Clients</p>
          </div>
          <div class="h-full flex  w-full justify-center">
            <div class="w-[50%] flex justify-center items-center">
              <img src="/Gestion Voyage/img/reserve.png" alt="">
            </div>
            <div class="w-[50%]">
            <div class="flex w-full justify-center">
              <p>Total Clients: </p>
              <p> 
                <?php
                  if(isset($totalClients))
                  echo "$totalClients";
                ?>
              </p>
            </div>
            </div>
          
          

          </div>
        </div>
        <div class="w-[25%] bg-white h-4/5 drop-shadow rounded-lg flex flex-col   ">
          <div class="h-[10%]">
            <p class="text-center font-bold tracking text-title text-xl">Clients</p>
          </div>
          <div class="h-full flex  w-full justify-center">
            <div class="w-[50%] flex justify-center items-center">
              <img src="/Gestion Voyage/img/reserve.png" alt="">
            </div>
            <div class="w-[50%]">
            <div class="flex w-full justify-center">

              <p>Total Clients: </p>
              <p> 
                <?php
                  if(isset($totalClients))
                  echo "$totalClients";
                ?>
              </p>
            </div>
            </div>
          
          

          </div>
        </div>
        <div class="w-[25%] bg-white h-4/5 drop-shadow rounded-lg flex flex-col">
          <div class="h-[10%]">
            <p class="text-center font-bold tracking text-title text-xl">Clients</p>
          </div>
          <div class="h-full flex  w-full justify-center">
            <div class="w-[50%] flex justify-center items-center">
              <img src="/Gestion Voyage/img/reserve.png" alt="">
            </div>
            <div class="w-[50%]">
            <div class="flex w-full justify-center">
              <p>Total Clients: </p>
              <p> 
                <?php
                  if(isset($totalClients))
                  echo "$totalClients";
                ?>
              </p>
            </div>
            </div>
          
          

          </div>
        </div>
       
    
       
      </div>
    </section>
</body>
</html>