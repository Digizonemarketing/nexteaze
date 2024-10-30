<?php  include 'sec.php' ?>

<?php

$success_message = "";
$error_message = "";

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $subject = htmlspecialchars(trim($_POST['subject']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate form fields
    if ($name && $email && $subject && $phone && $message) {
        include '../common/db.php'; // Include your database connection file

        // Check the database connection
        if ($conn->connect_error) {
            $error_message = "Database connection failed: " . $conn->connect_error;
        } else {
            // Prepare and bind the SQL statement
            $sql = "INSERT INTO messages (name, email, subject, phone, message) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);

            if ($stmt) {
                $stmt->bind_param("sssss", $name, $email, $subject, $phone, $message);

                // Execute the statement
                if ($stmt->execute()) {
                    // Redirect to the same page with a success parameter
                    header("Location: help.php?success=1");
                    exit();
                } else {
                    $error_message = "Error executing query: " . $stmt->error;
                }

                // Close the statement
                $stmt->close();
            } else {
                $error_message = "Error preparing query: " . $conn->error;
            }

            // Close the connection
            $conn->close();
        }
    } else {
        $error_message = "Please fill in all fields.";
    }
}

// Check if the query parameter is set for success
if (isset($_GET['success']) && $_GET['success'] == 1) {
    $success_message = "Message sent successfully!";
}
?>
<!DOCTYPE html>
<html lang="en">

<?php $title = 'Help & FAQ'; ?>
<?php include '../common/admin-head.php'; ?>

<body>
    <main class="page-wrapper rbt-dashboard-page">
        <div class="rbt-panel-wrapper">

            <?php include '../common/header.php'; ?>
            <?php include '../common/mobilemenu.php'; ?>
            <?php include '../common/Leftpanel.php'; ?>

            <div class="rbt-main-content mb--0 mr--0">
                <div class="rbt-daynamic-page-content center-width">
                    <div class="rbt-dashboard-content">
                        <div class="content-page pb--50">
                            <div class="chat-box-list">
                                <div class="content">
                                    
                                    <div class="single-settings-box contact-box top-flashlight light-xl leftside overflow-hidden">
                                        <h4 class="title mb--30">Contact Us Through Whatsapp</h4>
                                        <form action="">
			<div>
				<span>
					<label for="name">Name</label><br/>
					<input id="name" type="text" placeholder="Full Name">
				</span>
				<span>
					<label for="email">Email</label></br>
					<input id="email" type="email" placeholder="Email">
				</span>
			</div>
			<label for="message">Your Message</label><br/>
			<textarea name="" id="message" rows="10" placeholder="Your Message"></textarea>
			<button onclick="sendToWhatsapp()">Submit</button>
		</form>

                                    </div>

                                    <div class="single-settings-box contact-box top-flashlight light-xl leftside overflow-hidden">
                                        <h4 class="title mb--30">Contact Us</h4>

                                        <?php if (!empty($success_message)): ?>
                                            <p class="success"><?php echo htmlspecialchars($success_message); ?></p>
                                        <?php endif; ?>

                                        <?php if (!empty($error_message)): ?>
                                            <p class="error"><?php echo htmlspecialchars($error_message); ?></p>
                                        <?php endif; ?>

                                        <form action="/help" method="POST" class="rbt-profile-row rbt-default-form row row--15">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input id="name" name="name" type="text" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input id="email" name="email" type="email" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="subject">Subject</label>
                                                    <input id="subject" name="subject" type="text" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="phone">Phone</label>
                                                    <input id="phone" name="phone" type="tel" required>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="message">Message</label>
                                                    <textarea id="message" name="message" required></textarea>
                                                </div>
                                            </div>
                                            <div class="col-12 mt--20">
                                                <div class="form-group mb--0">
                                                    <button type="submit" class="btn-default">Send message</button>

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    
                                    
                                    
                                    <!-- Start FAQ Section  -->
                            <div class="row rainbow-section-gap row--20">
                                <div class="col-lg-12">
                                    <div class="rainbow-accordion-style accordion">
                                        <div class="accordion" id="accordionExamplea">
                                            <div class="accordion-item card bg-flashlight">
                                                <h2 class="accordion-header card-header" id="headingOne">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        What is Nexteaze and how does it work?
                                                    </button>
                                                </h2>
                                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExamplea">
                                                    <div class="accordion-body card-body">
                                                        Nexteaze is a comprehensive SaaS product verification platform designed to streamline product authentication and management. Our system enables businesses to generate unique verification codes, verify product authenticity, and manage code-related activities seamlessly through our intuitive interface.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion-item card bg-flashlight">
                                                <h2 class="accordion-header card-header" id="headingTwo">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        What features does Nexteaze offer?
                                                    </button>
                                                </h2>
                                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExamplea">
                                                    <div class="accordion-body card-body">
                                                        Nexteaze offers a range of features including dynamic verification code generation, customizable code prefixes and postfixes, detailed reporting and analytics, and secure code validation. Additionally, it provides subscription-based pricing plans tailored to different business needs.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion-item card bg-flashlight">
                                                <h2 class="accordion-header card-header" id="headingThree">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                        How often are updates provided for Nexteaze?
                                                    </button>
                                                </h2>
                                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExamplea">
                                                    <div class="accordion-body card-body">
                                                        Nexteaze is continuously updated to improve functionality and security. Our team works diligently to provide regular updates and enhancements, ensuring that you always have access to the latest features and improvements.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion-item card bg-flashlight">
                                                <h2 class="accordion-header card-header" id="headingFour">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                        How can I get customer support for Nexteaze?
                                                    </button>
                                                </h2>
                                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExamplea">
                                                    <div class="accordion-body card-body">
                                                        For any support inquiries, you can reach out to our customer support team via email at support@nexteaze.com. We are here to assist you with any questions or issues you may encounter.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion-item card bg-flashlight">
                                                <h2 class="accordion-header card-header" id="headingFive">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                        Is my data secure with Nexteaze?
                                                    </button>
                                                </h2>
                                                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExamplea">
                                                    <div class="accordion-body card-body">
                                                        Yes, Nexteaze prioritizes your data security. We implement robust encryption and security measures to protect your information, ensuring that your data remains safe and confidential.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion-item card bg-flashlight">
                                                <h2 class="accordion-header card-header" id="headingSix">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                                        Is Nexteaze available in multiple languages?
                                                    </button>
                                                </h2>
                                                <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExamplea">
                                                    <div class="accordion-body card-body">
                                                        Currently, Nexteaze supports several major languages, with plans to expand our language offerings in the future to accommodate a global user base.
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                                </div>
                                
                                
                            </div> <!-- end of chat-box-list -->
                        </div> <!-- end of content-page -->
                    </div> <!-- end of rbt-dashboard-content -->
                </div> <!-- end of rbt-daynamic-page-content -->
            </div> <!-- end of rbt-main-content -->
        </div> <!-- end of rbt-panel-wrapper -->
    </main>
</body>
    <script type="text/javascript">
function sendToWhatsapp(){
	let number = "+923146257174";

	let name = document.getElementById('name').value;
	let email = document.getElementById('email').value;
	let message = document.getElementById('message').value;

	var url = "https://wa.me/" + number + "?text="
	+ "Name : " +name+ "%0a"
	+ "Email : " +email+ "%0a"
	+ "Message : " +message+ "%0a%0a";

	window.open(url, '_blank').focus();
}
    </script>

</html>
