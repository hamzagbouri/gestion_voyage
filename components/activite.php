<?php
include("../database/db.php");
$query  = "SELECT * from activite";
$allActivtites = $connection-> query($query);
if(!$allActivtites)
{
    echo "<script> alert('error getting Activities') </script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activities</title>
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
                    Activities
                </h1>
               <div class="flex gap-4">
                    <button class="flex gap-2 items-center border px-4 py-2 rounded-lg text-[#0E2354] ">
                        <img src="/Gestion Voyage/img/Downlaod.svg" alt="">Export
                    </button>
                    <button id="add-etd" onclick=" document.getElementById('modalAddActivite').style.display = 'flex'" class="flex gap-2 items-center bg-[#4790cd] px-4 py-2 rounded-lg text-white ">
                        <img src="/Gestion Voyage/img/_Avatar add button.svg" alt="">New Activity
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
                    <td class="text-center w-10 p-4"> <input type="checkbox" name="" id=""></td>
                      <td>&nbsp;Titre</td>
                      <td>&nbsp;Description</td>
                      <td>&nbsp;Price</td>
                      <td>&nbsp;Date Debut</td>
                      <td>&nbsp;Date Fin</td>
                      <td>&nbsp;Places Disponibles</td>
                      <td>&nbsp;Action</td>
                    </tr>
                    <?php
                    foreach($allActivtites as $row)
                    {
                        $titre = htmlspecialchars($row['titre']);
                        $description = htmlspecialchars($row['description']);
                        $prix = htmlspecialchars($row['prix']);
                        $date_debut = htmlspecialchars($row['date_debut']);
                        $date_fin = htmlspecialchars($row['date_fin']);
                        $places_disponibles = htmlspecialchars($row['places_disponibles']);

                        echo " <tr>
                        <td class='text-center w-10 p-4'> <input type='checkbox' name='' id='' ></td>
                        <td>&nbsp;$titre</td>
                        <td>&nbsp;$description</td>
                        <td>&nbsp;$prix</td>
                        <td>&nbsp;$date_debut</td>
                        <td>&nbsp;$date_fin</td>
                        <td>&nbsp;$places_disponibles</td>


                    <td>
                        <div class='flex items-center gap-2 pl-2'>
                        <a href='deleteStudent.php?id= ".$row['id_activite']."'><img class='h-4 w-4' src='/Gestion Voyage/img/delete.png' alt=''></a>
                        <button >
                          <img class='h-4 w-4' src='/Gestion Voyage/img/editinggh.png' alt='aa'>
                        </button>
                        </div>
                    </td> ";
                   
                    }
                    
                    ?>
                    
                 </table>
            </div>
        </section>
        <div id="modalAddActivite" class="modal bg-black bg-opacity-75 hidden items-center justify-center fixed inset-0 z-50 ">
                  <div class="w-full m-8 h-auto border border-2 border-black rounded-3xl bg-white relative z-50 md:w-1/4 ">
                    <svg class=" fill-primary absolute cursor-pointer top-0 right-0 pr-4 pt-2 w-10 h-8"    onclick="document.getElementById('modalAddActivite').style.display='none'" xmlns="http://www.w3.org/2000/svg" width="1.2rem" height="1.2rem" viewBox="0 0 24 24"><path   d="M20.48 3.512a11.97 11.97 0 0 0-8.486-3.514C5.366-.002-.007 5.371-.007 11.999c0 3.314 1.344 6.315 3.516 8.487A11.97 11.97 0 0 0 11.995 24c6.628 0 12.001-5.373 12.001-12.001c0-3.314-1.344-6.315-3.516-8.487m-1.542 15.427a9.8 9.8 0 0 1-6.943 2.876c-5.423 0-9.819-4.396-9.819-9.819a9.8 9.8 0 0 1 2.876-6.943a9.8 9.8 0 0 1 6.942-2.876c5.422 0 9.818 4.396 9.818 9.818a9.8 9.8 0 0 1-2.876 6.942z"/><path fill="#5051fa" d="m13.537 12l3.855-3.855a1.091 1.091 0 0 0-1.542-1.541l.001-.001l-3.855 3.855l-3.855-3.855A1.091 1.091 0 0 0 6.6 8.145l-.001-.001l3.855 3.855l-3.855 3.855a1.091 1.091 0 1 0 1.541 1.542l.001-.001l3.855-3.855l3.855 3.855a1.091 1.091 0 1 0 1.542-1.541l-.001-.001z"/></svg>
                 
                    <div class="flex flex-col p-4">
                    <h3 class=" flex justify-center items-center" id="modal-title">Add New Activity</h3>
                    <form id="activite-form"  method="post" action="../actionsPHP/activite/add.php" class="flex flex-col pt-16 gap-4">
                      
                  
                        <div class="flex flex-col">
                      <label for="titre-input">Titre</label>
                      <input value="" class="border border-gray-200 border-2 rounded-lg p-2" type="text" id="titre-input" name="titre-input" >
                    </div>
                    <div class="flex flex-col">
                      <label for="description-input">Description</label>
                      <input value="" class="border border-gray-200 border-2 rounded-lg p-2" type="text" id="description-input" name="description-input" >
                    </div>
                      <div class="flex flex-col">
                      <label for="date-debut-input">Date Debut</label>
                      <input value="" class="border border-gray-200 border-2 rounded-lg p-2" type="date" id="date-debut-input" name="date-debut-input"  >
                    </div>
                    <div class="flex flex-col">
                      <label for="date-fin-input">Date Fin</label>
                      <input value="" class="border border-gray-200 border-2 rounded-lg p-2" type="date" id="date-fin-input" name="date-fin-input"  >
                    </div>
                    <div class="flex flex-col">
                      <label for="prix-input">Prix</label>
                      <input value="" class="border border-gray-200 border-2 rounded-lg p-2" type="text" id="prix-input" name="prix-input" >
                    </div>
                   
                    <div class="flex flex-col">
                      <label for="places-input">Places Disponibles</label>
                      <input value="" class="border border-gray-200 border-2 rounded-lg p-2" type="text" id="places-input" name="places-input" >
                    </div>
                  
                    <button type="submit" name="submit" class="bg-blue-500 text-white rounded-lg px-4 py-2">
                        Add Activite
                    </button>                    
                  </form>
                  </div>
          
                  </div>
              </div>
        </div>
    
</body>
</html>