<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Main Page - Thika Waste Management</title>
    <link rel="stylesheet" href="styles.css" />
    <style>
        /* Add your existing CSS styles here */
        /* Add your existing CSS styles here */
        .container {
            width: 625px;
            /* Adjust the size as needed */
            height: 295px;
            padding: 85px;
            background-color: rgba(255,
                    255,
                    255,
                    0.8);
            /* Semi-transparent white background */
            border-radius: 10px;
            box-shadow: 0 0 6px rgba(0, 0, 0, 0.3);
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            /* Align items to the left */
        }

        .translucent-box {
            background-color: #03b0ab;
            /* Semi-transparent background */
            border-top: 1cap;
            border-radius: 12px;
            /* Rounded corners */
            padding: 10px;
            color: rgb(0, 0, 0);
            text-align: center;
            font-family: "Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande",
                "Lucida Sans", Arial, sans-serif;
            margin-bottom: 30px;
            /* Add spacing between sections */
            margin-left: 5px;
            margin-top: 1px;
            width: 100%;
            /* Make the boxes span the full width */
        }

        h3 {
            font-size: 24px;
        }

        h2 {
            font-size: 36px;
        }

        i {
            font-style: italic;
        }

        /* Style adjustments for individual sections */
        .section-container {
            display: flex;
            justify-content: space-between;
            width: 108%;
            height: 85%;
            padding-right: 10%;
            margin-bottom: 30%;
        }

        .section-container .translucent-box {
            flex-grow: 10;
            /* Equal width for both sections */
            margin-right: 10px;
            /* Add spacing between sections */
            padding: 0px;
            /* Adjust padding as needed */
            padding-bottom: 0px;
        }
    </style>
    </script>
</head>

<body>
    <header>
        <div class="icon">
            <h2 class="logo">T.W.M.S</h2>
        </div>
        <nav>
            <ul>
                <li><a id="home-link" href="#">Home</a></li>
                <li><a id="services-link" href="#">Services</a></li>
                <li><a id="pricing-link" href="#">Pricing</a></li>
                <li><a id="contact-link" href="#">Contact</a></li>
                <li><a id="mpesa-link" href="#">M-Pesa</a></li>
                <li><a href="Admin/admin-login.html">Admin</a>
                <li><a href="login.html"><b>Log out</b></a></li>

            </ul>
        </nav>
        <h1>THIKA WASTE MANAGEMENT SYSTEM</h1>
    </header>

    <main>
        <section id="home" class="content">
            <h2>About Us</h2>
            <p>
                Thika Waste Management is a leading company in waste collection and
                disposal serving the Thika town community in Kenya. We are committed
                to ensuring a cleaner and greener environment for all.
            <h3>UN's Sustainable Development Goal</h3>
            Our waste management services strongly support
            the UN's Sustainable Development 12 - Responsible Consumption and Production.
            We aim to substantially reduce waste through prevention, reduction, recycling, and reuse.
            Our services significantly decrease environmental impact by implementing safe, sustainable waste practices.
            Specifically. Our waste audits and data analytics allow clients to understand waste streams
            and identify prevention opportunities. We divert waste from landfills through recycling
            and composting programs. Our hazardous waste management ensures
            roper handling to avoid harm and contamination. Our commitment to
            safety compliance enables us to provide sustainable services that protect community health,
            conserve natural resources, reduce pollution, and maintain clean air and water.
            </p>
        </section>

        <section id="services" class="content">
            <h2>Our Services</h2>
            <p>We offer a wide range of waste management services including:</p>
            <ul>
                <li>Household Waste Collection</li>
                <li>Commercial Waste Collection</li>
                <li>Recycling Services</li>
                <li>Hazardous Waste Disposal</li>
            </ul>
        </section>

        <section id="pricing" class="content">
            <h2>Our Pricing</h2>
            <p>
                Thika Waste Management Sytem has different pricing offers for the two
                categories of waste listed below.
            </p>
        </section>

        <!-- Insert the provided code here -->

        <div class="container">
            <section class="translucent-box">
                <p>
                    We offer waste collection on weekends <br /><br />at affordable and
                    manageable rates <br /><br />
                    <b>The following are the packages</b> <br /><br />
                </p>
            </section>

            <div class="section-container">
                <section class="translucent-box">
                    <h3>RESIDENTIAL HOMES</h3>
                    <h2><b>150 kshs/=</b></h2>
                    <i>Price inclusive of tax</i>
                </section>

                <section class="translucent-box">
                    <h3>APARTMENT AND FLATS HOMES</h3>
                    <h2><b>1250 kshs/=</b></h2>
                    <i>Price inclusive of tax</i>
                </section>
            </div>
        </div>

        <!-- End of provided code -->

        <section id="contact" class="content">
            <h2>Contact Us</h2>
            <p>For inquiries and service requests, please contact us:</p>
            <ul>
                <li>Email: info@thikawaste.com</li>
                <li>Phone: +254 759 924 592</li>
                <li>Address: 123 Green Street, Thika</li>
            </ul>
        </section>

        <section id="mpesa" class="content">
            <h2>Payment Methods</h2>
            <h3>M-Pesa Payment</h3>
            <p>Make payments easily through M-Pesa <br>Use .</p>
            <form id="paymentForm" action="payment-process.php" method="POST">
                <label for="mpesa-no">M-Pesa Number:</label>
                <input type="text" id="mpesa-no" name="mpesa-no" placeholder="Enter your M-Pesa number" required /><br />

                <label for="amount">Amount:</label>
                <input type="number" id="amount" name="amount" placeholder="Enter the amount" required /><br />

                <button id="submitButton" type="submit">Make Payment</button>
            </form>
        </section>


    </main>

    <footer style="color: white; background-color: black">
        &copy; 2023 THIKA WASTE MANAGEMENT SYSTEM. All rights reserved.
    </footer>

    <script>
        // Function to scroll to a section smoothly
        function scrollToSection(sectionId) {
            const section = document.getElementById(sectionId);
            if (section) {
                window.scrollTo({
                    top: section.offsetTop,
                    behavior: "smooth",
                });
            }
        }

        // Event listener for the navigation links
        document.addEventListener("DOMContentLoaded", function() {
            const homeLink = document.getElementById("home-link");
            const servicesLink = document.getElementById("services-link");
            const pricingLink = document.getElementById("pricing-link");
            const contactLink = document.getElementById("contact-link");
            const mpesaLink = document.getElementById("mpesa-link");

            homeLink.addEventListener("click", function() {
                scrollToSection("home");
            });

            servicesLink.addEventListener("click", function() {
                scrollToSection("services");
            });

            pricingLink.addEventListener("click", function() {
                scrollToSection("pricing");
            });

            contactLink.addEventListener("click", function() {
                scrollToSection("contact");
            });

            mpesaLink.addEventListener("click", function() {
                scrollToSection("mpesa");
            });
        });
    </script>
</body>

</html>