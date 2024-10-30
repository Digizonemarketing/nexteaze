<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WhatsApp Floating Button</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .whatsapp-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 100;
            background-color: #25D366;
            color: white;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <!-- WhatsApp Floating Button -->
    <div class="whatsapp-btn" data-bs-toggle="modal" data-bs-target="#whatsappModal">
        <i class="bi bi-whatsapp"></i>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="whatsappModal" tabindex="-1" aria-labelledby="whatsappModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="whatsappModalLabel">Send Message to WhatsApp</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="whatsappForm">
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" rows="3" placeholder="Enter your message"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Send to WhatsApp</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">


    <script>
        document.getElementById('whatsappForm').addEventListener('submit', function (event) {
            event.preventDefault();
            const message = document.getElementById('message').value;
            const whatsappNumber = '123456789';  // Add your WhatsApp number here
            const url = `https://wa.me/${whatsappNumber}?text=${encodeURIComponent(message)}`;
            window.open(url, '_blank');
        });
    </script>
</body>
</html>
