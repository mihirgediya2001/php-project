<?php
include 'header.php';
include 'dbcon.php';
?>
<!DOCTYPE html>
<html lang="en">

<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</head>

<body>

    <div class="container-cc">

        <div class="card-container-cc">

            <div class="front">
                <div class="image">
                    <img src="img/chip.png" alt="">
                    <img src="img/visa.png" alt="">
                </div>
                <div class="card-number-box-cc">#### #### #### ####</div>
                <div class="flexbox-cc">
                    <div class="box-cc">
                        <span>card holder</span>
                        <div class="card-holder-name">full name</div>
                    </div>
                    <div class="box-cc">
                        <span>expires</span>
                        <div class="expiration">
                            <span class="exp-month">mm</span> / <span class="exp-year">yy</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="back">
                <div class="stripe"></div>
                <div class="box-cc">
                    <span>cvv</span>
                    <div class="cvv-box-cc"></div>
                    <img src="img/visa.png" alt="">
                </div>
            </div>

        </div>

        <form action="cartpayment3.php" method="POST" onsubmit="return validateForm()">
            <div class="inputBox-cc">
                <span>card number</span>
                <input type="number" name="ccnumber" min="0000000000000001" max="9999999999999999"  onkeypress="limitKeypress(event,this.value,16)" class="card-number-input" pattern="[1-9]*" required>
            </div>
            <div class="inputBox-cc">
                <span>card holder</span>
                <input type="text" name="ccname" minLength="5" class="card-holder-input" required>
            </div>
            <div class="flexbox-cc">
                <div class="inputBox-cc">
                    <span>expiration mm</span>
                    <select name="ccmonth" id="mi" class="month-input" required>
                        <option value="month" selected disabled>month</option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                </div>
                <div class="inputBox-cc">
                    <span>expiration yy</span>
                    <select name="ccyear" id="yi" class="year-input">
                        <option value="year" selected disabled>year</option>
                        
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2026">2026</option>
                        <option value="2027">2027</option>
                        <option value="2028">2028</option>
                        <option value="2029">2029</option>
                        <option value="2030">2030</option>
                        <option value="2021">2031</option>
                        <option value="2022">2032</option>
                    </select>
                </div>
                <div class="inputBox-cc">
                    <span>cvv</span>
                    <input type="text"name="cccvv" minLength="3" maxlength="4" class="cvv-input" required>
                </div>
            </div>
            <input type="submit" name="card-purchase" value="get OTP" class="submit-btn">
        </form>

    </div>

    </form>
    </div>


    <div class="modal fade" id="expdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Missing data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Please select expiry Date.
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-danger">Ok</button>
                </div>
            </div>
        </div>
    </div>
</body>


<script>

var currentTime = new Date();
var m = currentTime.getMonth() + 1;
let y = currentTime.getFullYear();

function limitKeypress(event, value, maxLength) {
    if (value != undefined && value.toString().length >= maxLength) {
        event.preventDefault();
    }
}

    function validateForm() {
        let x = document.querySelector('.card-number-input').value;
        if (x == "") {
            alert("Name must be filled out");
            return false;
        }

        let m1 = document.querySelector('.month-input').value;
        let y1 = document.querySelector('.year-input').value;
        if(m1 == "month" || y1 == "year")
        {
            $('#expdate').modal('show');
            return false;
        }
    }
    function generate_number(number) {
        var l = number.length;
        var result = "";
        var j = 0;
        for (var i = 0; i < 19; i++) {
            if (i == 4 || i == 9 || i == 14) {
                result += ' ';
            }
            else {
                if (number[j] == undefined) {
                    result += '#';
                }
                else {
                    result += number[j];
                }
                j++;
            }

        }
        return result;
    }



    document.querySelector('.card-number-input').oninput = () => {
        var number = document.querySelector('.card-number-input').value;

        document.querySelector('.card-number-box-cc').innerText = generate_number(number);
    }

    document.querySelector('.card-holder-input').oninput = () => {
        document.querySelector('.card-holder-input').value = document.querySelector('.card-holder-input').value.replace(/[^a-z, ]/, '');
        document.querySelector('.card-holder-name').innerText = document.querySelector('.card-holder-input').value;
    }

    document.querySelector('.month-input').oninput = () => {
        document.querySelector('.exp-month').innerText = document.querySelector('.month-input').value;
    }

    document.querySelector('.year-input').oninput = () => {

        var year = document.querySelector('.year-input').value;
        document.querySelector('.exp-year').innerText = document.querySelector('.year-input').value;
        if(year == y)
        {
            if(document.querySelector('.month-input').value < m)
            {
                document.querySelector('.month-input').value = "month";
            }
            for(var i=0;i<m;i++)
            {
                var x = document.getElementById("mi").options[i].disabled = true;
            }
        }
        else 
        {
            for(var i=1;i<m;i++)
            {
                var x = document.getElementById("mi").options[i].disabled = false;
            }
        }

    }

    document.querySelector('.cvv-input').onmouseenter = () => {
        document.querySelector('.front').style.transform = 'perspective(1000px) rotateY(-180deg)';
        document.querySelector('.back').style.transform = 'perspective(1000px) rotateY(0deg)';
    }

    document.querySelector('.cvv-input').onmouseleave = () => {
        document.querySelector('.front').style.transform = 'perspective(1000px) rotateY(0deg)';
        document.querySelector('.back').style.transform = 'perspective(1000px) rotateY(180deg)';
    }

    document.querySelector('.cvv-input').oninput = () => {
        document.querySelector('.cvv-box-cc').innerText = document.querySelector('.cvv-input').value;
    }

</script>

</html>

<?php
include 'footer.php';
?>