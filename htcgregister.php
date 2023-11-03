<!-- 
    Author:Andrew Hopkins
    Title htcgregister.php
    Date: 09/05/20
    Note: Form to register as a member
 -->
<!doctype html>
<html>

<head>
    <title>Hopkins' TCG</title>
    <link rel="stylesheet" href="htcgregister.css">


</head>

<body>

    <nav>

    </nav>
    <main>
        <div class="split left">
            <div class="centered">
                <img src="Wartortle.png" alt="Wartortle">
            </div>
        </div>


        </div>
        </div>
        <div class="split right">
            <div class="header">
                <h1>Register</h1>
            </div>
            <div class="centered">

                <form action="insertmember.php" method="post">
                    <input type="text" id=txt_forename name=txt_forename placeholder="First Name" required /><br />
                    <input type="text" id=txt_surname name=txt_surname placeholder="Surname" required /><br />
                    <input type="text" id=txt_street name=txt_street placeholder="Street Name" required /><br />
                    <input type="text" id=txt_town name=txt_town placeholder="Town" required /><br />
                    <input type="text" id=txt_psotcode name=txt_postcode placeholder="Postcode" required /><br />
                    <select name="sel_category" id="sel_category">
                        <option value="">Membership Category
                        <option>
                        <option value="Gold">Gold
                        <option>
                        <option value="Silver">Silver
                        <option>
                        <option value="Bronze">Bronze
                        <option><br />
                            <input type="text" id=txt_email name=txt_email placeholder="Email Address" /><br />

                            <br />
                            <button>Insert</button>
                </form>
            </div>

        </div>

    </main>
    <footer></footer>
</body>

</html>