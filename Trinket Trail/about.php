<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>About us</title>

    <?php
        require_once('stylesheets.php');
    ?>    

    <style>
        body {
            background-color: #0B0C10;
            color: #C5C6C7;
            margin-top: 50px;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            color: #66FCF1;
        }

        .card-container {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .card {
            width: 20rem; /* Aangepaste breedte */
            margin-bottom: 20px;
            border: 3px solid #66FCF1;
            background-color: #2C3539;
            color: #FFFFFF;
            border-radius: 10px;
        }

        .intro-card {
            width: 100%;
            margin-bottom: 20px;
            border: 3px solid #66FCF1;
            background-color: #2C3539;
            color: #FFFFFF;
            border-radius: 10px;
        }

        .card-img-top {
            width: 100%;
            height: 150px; /* Aangepaste hoogte */
            object-fit: cover;
            border-radius: 10px 10px 0 0; /* Afgeronde hoeken alleen aan de bovenkant */
        }

        @media (max-width: 768px) {
            .card {
                width: 100%;
            }

            .intro-card {
                width: 100%;
            }
        }
    </style>
</head>

<body>


    <div class="container">

        <?php
            require_once ("includes/nav.php");
        ?>

        <div class="row">
            <div class="col-lg-12">
                <div class="intro-card">
                    <div class="card-body">
                        <h2 class="card-title">Welcome to Our Site</h2>
                        <p class="card-text">Welcome to Trinket Trail! We are a platform with the goal of giving a second life to 
                            products that lie at home and are rarely or never used. By selling these products on our website, you 
                            not only provide them with a new opportunity but also help others who need or are enthusiastic about 
                            the product and may not be able to afford it new. Additionally, you have the opportunity to make some 
                            profit by selling your items. Explore the possibilities of reuse and selling on Trinket Trail!</p>
                    </div>
                </div>

                <div class="card-container">
                    <div class="card">
                        <img src="/assets/img/jan.jpg" class="card-img-top img-fluid">
                        <div class="card-body">
                            <p class="card-text">Hey!
                                I'm an avid gamer who loves virtual adventures and friendly competitions. When not gaming, I enjoy hands-on work with motors and cars, and strumming my guitar for relaxation. Music is a significant part of my life, allowing me to express myself. Fascinated by computers and technology, I'm always exploring the latest gadgets. These diverse passions shape me a curious explorer, eager to enjoy life's journey.</p>
                        </div>
                    </div>

                    <div class="card">
                        <img src="/assets/img/anthony.jpg" class="card-img-top img-fluid">
                        <div class="card-body">
                            <p class="card-text">Hey there!
                                I'm Anthony Verleye, an 18-year-old enthusiast diving into the world of IT Management at the Ensor Institute in Oostende. When I'm not immersed in the digital landscape, you'll find me navigating the teamwork at a local supermarket. Beyond my academic pursuits, my interests extend to the intricate world of automobiles, reflecting my fascination with their mechanics. Gaming is another passion of mine, where I find joy in virtual adventures and friendly competitions.</p>
                        </div>
                    </div>

                    <div class="card">
                        <img src="/assets/img/quinten.jpg" class="card-img-top img-fluid">
                        <div class="card-body">
                            <p class="card-text">Hey, I'm Quinten Vanhercke, a 17-year-old student passionate about gaming and technology. Engaged in a captivating project blending my love for tech and interest in online commerce. Beyond the digital realm, I have a deep affection for motorcycles, finding inspiration and relaxation in their world. Striving to strike the perfect balance between these passions in my daily life.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
