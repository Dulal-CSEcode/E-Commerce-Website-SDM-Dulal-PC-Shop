<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Payment </title>

    <!--custome css file link -->
    <link rel="stylesheet" href="CSS/Payment&Otp.css">
</head>

<body>

    <div class="container">
        <form method="post" action="end.php">
            <div class="row">



                <!---------------------------------------- CREDIT CARD DETAILS PART ------------------------------------------>
                <div class="col">
                    <h3 class="title">PAYMENT DEATILS</h3>


                    <!----------------------------------CARD VARAITIES IMAGE------------------------------------------------->
                    <div class="inputbox">
                        <span> ACCEPTING CARD: </span>
                        <img src="images/visa.png" alt="credit card">
                    </div>


                    <!----------------------------------CREDIT CARD OWNER NAME------------------------------------------------->
                    <div class="inputbox">
                        <span> NAME ON CARD: </span>
                        <input type="text" placeholder="MS.J.Yukatharsana" required>
                    </div>


                    <!----------------------------------CREDIT CARD NO------------------------------------------------->
                    <div class="inputbox">
                        <span> CARD NO: </span>
                        <input type="text" placeholder="0000 0000 0000 0000" pattern="[0-9]{4} [0-9]{4} [0-9]{4} [0-9]{4}" required>
                    </div>

                    <!----------------------------------PHONE NO IN ORDER PERSON------------------------------------------------->
                    <div class="inputbox">
                        <span> ORDERER PH NO: </span>
                        <input type="text" placeholder="076 000 0000" pattern="[0-9]{3} [0-9]{3} [0-9]{4}" required>
                    </div>

                    <!----------------------------------DELIVERING AREA NAME CODE ------------------------------------------------->
                    <div class="flex">
                        <div class="inputbox">
                            <span> EXP YEAR: </span>
                            <input type="text" placeholder="2026" required>
                        </div>
                        <div class="inputbox">
                            <span> CVV: </span>
                            <input type="number" max="999" pattern="([0-9]|[0-9]|[0-9])" placeholder="000" required name="" value="">
                        </div>
                        <div class="inputbox">
                            <input type="submit" name="submit" value="CONFIRM" class="submit-btn">
                        </div>
                    </div>

                </div>
            </div>
            <!----------------------------------SUBMITTING DETAILS BTN ------------------------------------------------->
        </form>
        <script>
            // $(selecter).submit(function (e){
            //     e.preventDefault();
            //      window.location.href="end.php";
            // });
            // 
        </script>


        <script src="js/script.js"></script>
</body>


</html>