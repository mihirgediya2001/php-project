<?php
include 'header.php';
include 'home.php';
include 'homerooms.php';
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>

</head>

<body>


    <!-- -------------------------food ------------------------ -->
    <section class="container speciality-class box-shadow-all">
        <h1 class="h-primary center">Our Speciality</h1>
        <div class="row-data" id="services">
            <div class=" box box-shadow-all">
                <a href="food.php"><img class="card-img" src="img/manchu.png" alt="manchurion"></a>
                <h2 class="h-secondary center">Chinese</h2>
                <p class="p-secondary">Traditional Chinese food has to always be fresh. Most dishes are filled with huge
                    quantities of vegetables, grass-fed meats, seafood and herbs and spices. Every ingredient is
                    handpicked for medicinal purposes. The Chinese people rarely eat canned/frozen food.
                </p>
            </div>
            <div class=" box box-shadow-all">
                <a href="food.php"><img class="card-img" class="card-img" src="img/pasta.png" alt="pasta"></a>
                <h2 class="h-secondary center">Italian</h2>
                <p class="p-secondary">The Mediterranean diet forms the basis of Italian cuisine, rich in pasta, fish,
                    fruits
                    and vegetables. Cheese, cold cuts and wine are central to Italian cuisine, and along with pizza and
                    coffee (especially espresso) form part of Italian gastronomic culture.</p>
            </div>
            <div class=" box box-shadow-all">
                <a href="food.php"><img class="card-img" src="img/mah.png" alt="maharshtrian"></a>
                <h2 class="h-secondary center">Maharashtrian</h2>
                <p class="p-secondary">The most-popular forms are bhaji, vada pav, misalpav and pav bhaji.
                    More-traditional
                    dishes are sabudana khichadi, pohe, upma, sheera and panipuri. Most Marathi fast food and snacks are
                    lacto-vegetarian.</p>
            </div>

            <div class=" box box-shadow-all">
                <a href="food.php"><img class="card-img" src="img/panner.png" alt="panner"></a>
                <h2 class="h-secondary center">Punjabi</h2>
                <p class="p-secondary">Dishes: Chhole, paneer, dal makhani and lassi are the staple food of any Punjabi
                    household. The restaurants here also serve the famous butter chicken and other dishes in both
                    vegetarian and non-vegetarian category with Punjabi flavors.

                </p>
            </div>
            <div class=" box box-shadow-all">
                <a href="food.php"><img class="card-img" src="img/dhosa.png" alt="dosa"></a>
                <h2 class="h-secondary center">South Indian</h2>
                <p class="p-secondary">The similarities among the five southern states' cuisines include the presence of
                    rice
                    as a staple food, the use of lentils and spices, dried red chilies and fresh green chillies,
                    coconut, and native fruits and vegetables including tamarind, plantain, jackfruit, snake gourd,
                    garlic, and ginger</p>
            </div>
            <div class=" box box-shadow-all">
                <a href="food.php"><img class="card-img" src="img/faluda.png" alt="faluda"></a>
                <h2 class="h-secondary center">Deserts</h2>
                <p class="p-secondary">The word dessert is derived from the French word desservir, which translates to
                    “to
                    clear the table.” This origin is apt, considering that the first use of desserts was to wash down
                    the aftertaste of a large meal with something sweet</p>
            </div>
        </div>
    </section>


    <section id="booking-hall">
        <a href="food.php"><img class="img-fluid hall-img" src="img/banquet.jpg" alt="hall" /></a>
        <div class="hall-div">
            <h1 class="h1">Best Banquet Hall For Your Party</h1>
            <button id="book-btn"><a href="bookinghall.php"> Book Now</a></button>

        </div>

    </section>



    <script>
    function forgotPopup() {
        document.getElementById('login-popup').style.display = "none";
        document.getElementById('forgot-popup').style.display = "flex";
    }
    </script>


</body>

</html>
<?php
include 'footer.php';
?>

<!-- TODO -->